<?php
/*****************************************/
//檔案名稱：ad_mem_service.php
//後台對應位置：名單/發送記錄>會員服務紀錄明細
//改版日期：2022.01.03
//改版設計人員：Jack
//改版程式人員：Queena
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

function ch_star($sc){
    $star_icon = "<i class='fa fa-star text-danger'></i>";
    if ( $sc != "" ){
  	    $sc = (int)($sc);
  	    for ( $i=1;$i<=$sc;$i++ ){
  	        $ch_star = $ch_star.$star_icon;
        }
    }
    $ch_star = $ch_star." ".$sc;
}

$st = SqlFilter($_REQUEST["sc"],"tab");
$a = SqlFilter($_REQUEST["a"],"tab");
$mnum = SqlFilter($_REQUEST["mnum"],"tab");

if ( $st == "readsi" ){
    $SQL = "Select * From si_invite_eval Where invite_auton='".$a."' And mnum='".$mnum."' Oorder By auton Desc";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
	if ( $result > 0 ){
        echo "<div class='lightbox-ajax'><div class='lightbox-ajax-body'>";
		echo "<table width='300'>";
		$allsc = 0;
		$allval = 1;
		foreach($result as $re){
		    if ( $re["opt"] == "note" ){
			    $eval_note =$re["eval_note"];
            }else{		
			    echo "<tr><td>".$re["opt"]."：".ch_star($re["val"])." 顆星</td></tr>";
			    $allsc = $allsc+$re["val"];
			    $allval = $allval+1;
            }
        }
		
		if ( $allsc > 0 && $allval > 1 ){
		    $allsc = $allsc / $allval;
		    echo "<tr><td>平均分數：".ch_star($allsc)."</td></tr>";
        }
	  
	    if ( $eval_note != "" ){
	  	    echo "<tr><td>意見回饋：".$eval_note."</td></tr>";
        }
		echo "</table>";
		echo "</div></div>";
    }
    exit;
}

if ( $st == "readreply" ){
    $SQL = "Select love_user, love_user2 From love_data_re Where love_auto='".$a."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) > 0 ){
		$love_user = $re["love_user"];
		$love_user2 = $re["love_user2"];
	}
    echo "<div class='lightbox-ajax'><div class='lightbox-ajax-body'>";
	$leftcont = "無";
	$rightcont = "無";
	
    if ( $love_user != "" || $love_user2 != "" ){
        $SQL = "Select * From love_data_re_reply Where love_auto='".$a."' And me='".$love_user."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $re);
        if ( count($result) > 0 ){
		    $leftcont  = "<font color='blue'>".$re["me_name"]."</font><br>外在容貌：".$re["q1"]."<br>特質：".$re["q2"]."<br>好感：".$re["q3"]."<br>繼續連繫：".$re["q4"];
            $leftcont .= $re["q6"]."<br>其它：<br>".$re["q5"];
        }
		
        $SQL = "Select * From love_data_re_reply Where love_auto='".$a."' And me='".$love_user2."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $re);
	    if ( count($result) > 0 ){
		    $rightcont  = "<font color='red'>".$re["me_name"]."</font><br>外在容貌：".$re["q1"]."<br>特質：".$re["q2"]."<br>好感：".$re["q3"]."<br>繼續連繫：".$re["q4"];
            $rightcont .= $re["q6"]."<br>其它：<br>".$re["q5"];
        }
    }
	
	echo "<table>";
    echo "<tr><td valign='top' style='border-right:1px #eee solid;padding-right:10px;'>".$leftcont."</td>";
	echo "<td valign='top' style='padding-left:10px;'>".$rightcont."</td></tr>";
	echo "</table>";
	echo "</div></div>";
    exit;
}

$mem_num = SqlFilter($_REQUEST["mem_num"],"tab");
$mem_au = SqlFilter($_REQUEST["mem_au"],"tab");
$mem_mobile = SqlFilter($_REQUEST["mem_mobile"],"tab");

if ( $mem_num == "" && $mem_au == "" && $mem_mobile == "" ){ call_alert('會員編號讀取有誤。', 'ClOsE',0); }
if ( $_SESSION["MM_Username"] == "" ){ call_alert('請重新登入。','ClOsE',0); }

if ( $mem_num != "" ){
    $SQL = "Select * From member_data Where mem_num = '".$mem_num."'";
}elseif ( $mem_mobile != "" ){
    $SQL = "Select * From member_data Where mem_mobile = '".$mem_mobile."'";
}else{
    $SQL = "Select * From member_data Where mem_auto = ".$mem_au;
}

$rs = $SPConn->prepare($SQL);
$rs->execute();
$result=$rs->fetchAll(PDO::FETCH_ASSOC);
if ( count($result) == 0 ){ call_alert('會員資料讀取有誤或無此會員。', 0,0); }
foreach($result as $re);

$this_single = strtoupper($_SESSION["MM_Username"]);
$this_branch = $_SESSION["branch"];
$lovebranch = $_SESSION["lovebranch"];
$mem_num = $re["mem_num"];
$dmn_num = $re["dmn_num"];
$mem_branch = $re["mem_branch"];
$mem_branch2 = $re["mem_branch2"];
$mem_single = strtoupper($re["mem_single"]);
$mem_single2 = strtoupper($re["mem_single2"]);
$love_single = strtoupper($re["love_single"]);
$call_branch = $re["call_branch"];
$call_single = strtoupper($re["call_single"]);
$cansee = 0;
$allcansee = 0;
$block_msg = "<font color='red'>不可見</font>";

if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $cansee = 1;
    $allcansee = 1;
}elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $cmem_branch = ",".$mem_branch.",";
    $cmem_branch2 = ",".$mem_branch2.",";
    $ccall_branch = ",".$call_branch.",";
    $lovebranch = ",".$lovebranch.",";    
    if ( instr($lovebranch, $cmem_branch) > 0 || instr($lovebranch, $cmem_branch2) > 0 || instr($lovebranch, $ccall_branch) > 0 ){
        $cansee = 1;
    }
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" ){
    if ( $this_branch == $mem_branch || $this_branch == $mem_branch2 || $this_branch == $call_branch ){
        $cansee = 1;
    }
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "keyin" || $_SESSION["MM_UserAuthorization"] == "manager" ){
    if ( $this_single == $mem_single || $this_single == $mem_single2 || $this_single == $love_single || $this_single == $call_single ){
        $cansee = 1;
    }
}else{
    $cansee = 0;
}

if ( $re["mem_level"] == "mem" ){
	$mem_lv = "會員";
}else{
	$mem_lv = "未入會";
}

if ( $mem_branch == "八德" ){
	$bfont = "<font color='green'>DateMeNow</font>";
}else{
	$bfont = "<font color='red'>春天會館</font>";
}

if ( $mem_branch == "" || is_null($mem_branch) ){
	$bfont = "";
}

if ( $re["si_account"] != "0" ){
	$bfont = "<font color='#c22c7d'>約會專家主帳號</font>";
}

$mem_username = $re["mem_username"];

if ( ( $mem_username == "" || is_null($mem_username) ) && ( $re["mem_username_last"] != "" ) ){
	$mem_username = $re["mem_username_last"];
}
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_mem.php">會員管理系統</a></li>
            <li class="active"><?php $mem_lv;?>服務紀錄 - 編號 <?php echo $mem_num;?> - <?php echo $re["mem_name"];?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20" style="background-color: gray; cursor:pointer"> 
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $mem_lv;?>服務紀錄 - 編號 <?php echo $mem_num;?> - <?php echo $re["mem_name"];?> - <?php echo $bfont;?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <?php $n = "1"; require("./include/_mem_menu.php");?>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td width="92">
                                <div align="right">編號：</div>
                            </td>
                            <td width="267"><?php echo $re["mem_num"];?></td>
                            <td width="94">
                                <div align="right">身分證字號：</div>
                            </td>
                            <td width="269">
                                <font color=red>
                                <?php
          	                    if ( $cansee == 1 || $allcansee == 1 ){
          	                        echo $mem_username;
                                }else{
                                    echo $block_msg;
                                }
                                ?>
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">姓名：</div>
                            </td>
                            <td><?php echo $re["mem_name"];?></td>
                            <td>
                                <div align="right">電話/手機：</div>
                            </td>
                            <td>
                                <font color="red">
                                <?php
          	                    if ( $cansee == 1 || $allcansee == 1 ){          	
          	                        if ( $re["mem_phone"] != "" ){ echo $re["mem_phone"]."/";}
          	                        echo $re["mem_mobile"];
                                }else{
                                    echo $block_msg;
                                }
                                ?>
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">資料時間：</div>
                            </td>
                            <td><?php echo $re["mem_time"];?></td>
                            <td>
                                <div align="right">更新時間：</div>
                            </td>
                            <td><?php echo $re["mem_uptime"];?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">最後登入時間：</div>
                            </td>
                            <td><?php echo $re["last_login"];?></td>
                            <td>
                                <div align="right">最後排約時間：</div>
                            </td>
                            <td><?php echo $re["love_time2"];?></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">處理情形：</div>
                            </td>
                            <td colspan="3"><?php echo $re["all_type"];?></td>
                        </tr>
                        <?php
                        $SQL1  = "Select mem_branch, ISNULL(SUM(CASE WHEN types='free' THEN quantity END), 0) As freeq, ";
                        $SQL1 .= "ISNULL(SUM(CASE WHEN types='free' and quantity > 0 THEN quantity END), 0) AS allfreeq, ";
                        $SQL1 .= "ISNULL(SUM(CASE WHEN types='normal' THEN quantity END), 0) AS normalq, ";
                        $SQL1 .= "ISNULL(SUM(CASE WHEN types='normal' and quantity > 0 THEN quantity END), 0) AS allnormalq ";
                        $SQL1 .= "FROM pay_teacoupon Where tc_user='".$mem_username."' Group By mem_branch";
                        $rs1 = $SPConn->prepare($SQL1);
                        $rs1->execute();
                        $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                        if ( count($result1) > 0 ){
                            echo "<tr><td></td><td colspan='3'>";
                            foreach($result1 as $re1){
            	                if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
            	                    echo $re1["mem_branch"]."：免費茶卷 ".$re1["freeq"]." / ".$re1["allfreeq"]." 張&nbsp;&nbsp;";
                                    echo "付費茶卷 ".$re1["normalq"]." / ".$re1["allnormalq"]." 張<br>";
                                }else{
            	    	            if ( $_SESSION["lovebranch"] != "" ){
          		                        $lovebranch = $_SESSION["lovebranch"];
                                    }else{
          		                        $lovebranch = $_SESSION["branch"];
                                    }          	        
          	                        if ( substr_count($lovebranch, $re1["mem_branch"]) > 0 ){
          	        	                echo $re1["mem_branch"]."：免費茶卷 ".$re1["freeq"]." / ".$re1["allfreeq"]." 張&nbsp;&nbsp;";
                                        echo "付費茶卷 ".$re1["normalq"]." / ".$re1["allnormalq"]." 張<br>";
                                    }
                                }
                            }
                            echo "</td></tr>";
            	        } ?>
                    </tbody>
                </table>
                <p>
                    <a href="javascript:Mars_popup('ad_report.php?k_id=<?php echo $re["mem_auto"]?>&lu=<?php echo $mem_username;?>&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報紀錄</a>
                    <a href="#ac_data">參加活動統計</a>&nbsp;&nbsp;<a href="#love_data">排約列表</a>&nbsp;&nbsp;<a href="#p" onclick="Mars_popup('ad_mem_service_print.php?mem_num=<?php echo $re["mem_num"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">列印本頁</a>
                </p>

                <?php
                $SQL1 = "Select * From cs_data Where mem_num = '".$mem_num."' Order By cs_auto Desc";
                $rs1 = $SPConn->prepare($SQL1);
                $rs1->execute();
                $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                if ( count($result1) > 0 ){ ?>
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tr>
  	                        <td colspan="3"><div align="center"><b>客戶滿意度</b><a href="ad_cs_data.php" target="_blank">查詢列表</a></div></td>    
                        </tr>
                        <tr>
                            <td width="12%"><div align="center">日期</div></td>
                            <td width="11%"><div align="center">滿意度</div></td>
                            <td><div align="center">內容</div>
                            <div align="center"></div></td>
                        </tr>
                        <?php foreach($result1 as $re1){ ?>
                            <tr>
                                <td><div align="center"><?php echo $re1["cs_time"];?></div></td>
                                <td><div align="center"><?php echo $re1["cs_ck"];?></div></td>
                                <td><%=ars("cs_note")%></td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php }?>

                <?php
                $SQL1 = "Select * From ad_advisory Where mem_num = '".$mem_num."' Order By auton Desc";
                $rs1 = $SPConn->prepare($SQL1);
                $rs1->execute();
                $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                if ( count($result1) > 0 ){ ?>
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tr>
                            <td colspan="10">
                                <div align="center"><b>咨詢紀錄</b></div>
                            </td>
                        </tr>
                        <tr>
                            <th>咨詢時間</th>
                            <th>咨詢類型</th>
                            <th>咨詢對象</th>
                            <th>咨詢費</th>
                            <th>剩餘成本</th>
                            <th>新剩餘成本</th>
                            <th>會員會館秘書</th>
                            <th>講師會館</th>
                            <th>咨詢講師</th>
                            <th>備註</th>
                            <th>紀錄時間</th>
                        </tr>
                        <?php
                        foreach($result1 as $re1){
                            $all_branch = "";
                            $all_single = "";
                            $SQL2 = "Select * From ac_data_re Where acre_auto='".$re1["acre_auto"]."'";
                            $rs2 = $SPConn->prepare($SQL2);
                            $rs2->execute();
                            $result2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
                            if ( count($result2) > 0 ){
                                $all_branch = $re2["all_branch"];
                                $all_single = SingleName($re2["all_single"],"normal");
                            }else{
                                $all_branch = $re1["mem_branch"];
                                $all_single = SingleName($re1["mem_single"],"normal");
                            }?>
                            <tr>
                                <td align="center"><?php $re1["itimes"];?></td>
                                <td align="center"><?php $re1["types"];?></td>
                                <td align="center"><?php $re1["mem_name"];?></td>
                                <td align="center">
                                    <?php
                                    if ( $re1["pay_money"] > 0 ){
                                        echo "現金：".$re1["pay_money"]." 元";
                                    }
                                    if ( $re1["pay_money2"] > 0 ){
                                        echo "刷卡：".$re1["pay_money2"]." 元";
                                    }
                                    if ( $re1["pay_money3"] > 0 ){
                                        echo "抵用卷：".$re1["pay_money3"]." 元";
                                    }
                                    if ( $re1["pay_money4"] > 0 ){
                                        echo "新抵用卷：".$re1["pay_money4"]." 元";
                                    }?>
                                </td>
                                <td align="center"><?php echo $re1["last_money"]." 元";?></td>
                                <td align="center"><?php echo $re1["last_money2"]." 元";?> 元</td>
                                <td align="center"><?php echo $re["mem_branch"];?> / <?php echo SingleName($re1["mem_single"],"normal");?></td>
                                <td align="center"><?php echo $all_branch;?> / <?php echo $all_single;?></td>
                                <td align="center"><?php echo $re1["mem_wbranch"];?></td>
                                <td align="center"><?php echo SingleName($re1["mem_who"],"normal");?></td>
                                <td align="center"><?php echo $re1["notes"];?></td>   
	                            <td align="center"><?php echo $re1["times"];?></td>   
                            </tr>
                        <?php }?>
                    </table>
                <?php }?>

                <?php
                $SQL1 = "Select * From si_salon_teacher_consult Where mem_num = '".$mem_num."' And stat=2 Order By auton Desc";
                $rs1 = $SPConn->prepare($SQL1);
                $rs1->execute();
                $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                if ( count($result1) > 0 ){ ?>
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tr>
                            <td colspan="10">
                                <div align="center"><b>情感諮詢紀錄</b></div>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>預約教練</th>
                            <th>預約時間</th>
                            <th>姓名</th>    
                            <th>諮詢結果</th>    
                            <th>狀態</th>        
                        </tr>
                        <?php 
                        $ix = 0;
                        foreach($result1 as $re1){
                            $ix++; ?>
                            <tr>
                                <td align="center"><?php echo $ix;?></td>  
                                <td align="center"><?php echo $re1["tname"];?></td>  
                                <td align="center"><?php echo $re1["tdate"];?>&nbsp;&nbsp;<?php echo $re1["ttime"];?></td>
                                <td align="center"><?php echo $re1["mname"];?></td>
                                <td align="center">
                                    <?php
                                    if ( $re1["notes"] != "" ){
                                        echo strip_tags($re1["notes"]);
                                    }?>
                                </td>    
                                <td align="center">
                                    <?php
                                    if ( chkDate($re1["t3"]) ){
                                        echo chtime($re1["t3"]) ." 完成";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php }?>
                    </table>
                <?php }?>


































                <?php
                $SQL1 = "Select * From si_salon_teacher_consult Where mem_num = '".$mem_num."' And stat=2 Order By auton Desc";
                $rs1 = $SPConn->prepare($SQL1);
                $rs1->execute();
                $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                if ( count($result1) > 0 ){ ?>
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tr>
                            <td colspan="8">
                                <div align="center"><b>活動明細表</b></div>
                            </td>
                        </tr>
                        <tr>
                            <td width="12%"><div align="center">報名日期</div></td>
                            <td width="12%"><div align="center">活動日期</div></td>
                            <td width="120"><div align="center">活動類型</div></td>
                            <td><div align="center">地區和活動名稱</div></td>
                            <td width="16%"><div align="center">收費金額</div></td>
                            <td width="5%"><div align="center">處理會館</div></td>
                            <td width="5%"><div align="center">處理秘書</div></td>
                            <td width="5%"><div align="center">狀態</div></td>
                        </tr>
                        <tr>
                            <td><div align="center">2021/4/20 下午 02:05:00<br></div></td>
                            <td>
                                <div align="center">2021/4/17 下午 03:00:00</div>
                            </td>
                            <td>趣約會 - 主題特別企劃</td>
                            <td>
                                <div align="center">(台北)問問塔羅牌，戀愛解惑專班<br>
                                    <font color="#FF0000">(非會員 許家芸)</font>
                                </div>
                            </td>
                            <td>
                                <div align="center">(現金)400</div>
                            </td>
                            <td>
                                <div align="center">台北</div>
                            </td>
                            <td>
                                <div align="center">
                                    Ethan
                                </div>
                            </td>
                            <td>
                                <div align="center">
                                    已報名
                                </div>
                            </td>
                        </tr>

                        


                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>

    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->

</section>
<!-- /MIDDLE -->

<?php
require("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {

        //if(typeof($.fn.popover) != 'undefined'){
        /*
$(".cpopover").popover({
    html: true,
    placement: 'left',
    trigger: 'manual',    
    content: function() {
      return $.ajax({method: "POST",url: 'ad_mem_service.php?st=readreply&a='+$(this).data("loveauto"),
                     dataType: 'html',
                     async: false}).responseText;
    }
  }).click(function(e) {  	
    $(this).popover('toggle');
  });
  
$(".cpopover2").popover({
    html: true,
    placement: 'left',
    trigger: 'manual',    
    content: function() {
    	var $th = $(this).data("href");    	
      return $.ajax({method: "POST",url: $th,
                     dataType: 'html',
                     async: false}).responseText;
    }
  }).click(function(e) {  	
    $(this).popover('toggle');
  });*/
        //}
    });
</script>