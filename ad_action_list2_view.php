<?php
    /*****************************************/
    //檔案名稱：ad_action_list2_view.php
    //後台對應位置：管理系統/網站活動上傳>報名資料
    //改版日期：2022.2.10
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/
    require_once("_inc.php");
    require_once("./include/_function.php");     

    if($_REQUEST["st"] == "istell"){
        if($_REQUEST["v"] == "1"){
            $SQL2 = "UPDATE love_keyin SET istell='".$ist."' Where k_id = ".SqlFilter($_REQUEST["id"],"int")."";
    		$txt = "已通知";
        }else{
            $SQL2 = "UPDATE love_keyin SET istell=NULL Where k_id = ".SqlFilter($_REQUEST["id"],"int")."";
    		$txt = "取消通知";
        }
        $SQL = "SELECT * FROM love_keyin Where k_id = ".SqlFilter($_REQUEST["id"],"int")."";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){            
            $mem_num = $result["mem_num"];
            $k_name = $result["k_name"];
            $k_mobile = $result["k_mobile"];
            $action_auto = $result["action_auto"];
            $action_branch = $result["action_branch"];
            $action_time = $result["action_time"];
            $action_title = $result["action_title"];            
            $rs = $SPConn->prepare($SQL2);
            $rs->execute();
        }
        $singlenames = SingleName($_SESSION["MM_Username"],"normal");
        $log_4 = "由 ".$singlenames." 設定 ".$k_name." 在[".$action_auto."]".$action_branch." - ".$action_time." - ".$action_title." ".$txt;
        $SQL =  "INSERT INTO log_data (log_time,log_num,log_username,log_name,log_branch,log_single,log_1,log_2,log_4,log_5,log_service) VALUES (
                '".date("Y/m/d H:i:s")."', 
                '".$mem_num."', 
                '".$k_name."', 
                '".$singlenames."', 
                '".$_SESSION["branch"]."', 
                '".$_SESSION["MM_Username"]."', 
                '".$k_mobile."', 
                '系統紀錄', 
                '".$log_4."', 
                'member', 
                '1')";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        reURL("win_close.php?m=變更中...");               
    }

    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }
    if($_SESSION["MM_UserAuthorization"] != "admin"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    // 接收值
    $vst = SqlFilter($_REQUEST["vst"],"tab");
    
    // 刪除
    if($_REQUEST["st"] == "del"){
        $SQL = "delete from love_keyin where all_kind='活動' and k_id='".SqlFilter($_REQUEST["id"],"int")."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        reURL("win_close.php?m=刪除中..");
    }

    // 更新
    if($_REQUEST["st"] == "uppaynum"){
        $SQL = "select k_pay_num, k_pay_m from love_keyin Where k_id = ".SqlFilter($_REQUEST["id"],"int")."";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            if($_REQUEST["full"] == "1"){
                $k_pay_num = SqlFilter($_REQUEST["k_pay_num"],"tab");
                $k_pay_m = SqlFilter($_REQUEST["k_pay_m"],"tab");
                $SQL = "UPDATE love_keyin SET k_pay_num='".$k_pay_num."', k_pay_m='".$k_pay_m."' Where k_id = ".SqlFilter($_REQUEST["id"],"int")."";                
            }else{
                if($_REQUEST["k_pay_num"] != ""){
                    if($_REQUEST["k_pay_num"] == "none"){
                        $k_pay_num = "";
                    }else{
                        $k_pay_num = SqlFilter($_REQUEST["k_pay_num"],"tab");
                    }
                    $SQL = "UPDATE love_keyin SET k_pay_num='".$k_pay_num."' Where k_id = ".SqlFilter($_REQUEST["id"],"int")."";   
                } 
                if($_REQUEST["k_pay_m"] != ""){
                    if($_REQUEST["k_pay_m"] == "none"){
                        $k_pay_m = "";
                    }else{
                        $k_pay_m = SqlFilter($_REQUEST["k_pay_m"],"tab");
                    }
                    $SQL = "UPDATE love_keyin SET k_pay_m='".$k_pay_m."' Where k_id = ".SqlFilter($_REQUEST["id"],"int")."";   
                }               
            }
                   
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
        }
    }

    if($_REQUEST["st"] == "istell2"){
        $SQL = "select istell2 from love_keyin Where k_id = ".SqlFilter($_REQUEST["id"],"int")."";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            if($_REQUEST["msg"] == "none"){
                $istell2 = NULL;
            }else{
                $istell2 = SqlFilter($_REQUEST["msg"],"tab");
            }
            $SQL = "UPDATE love_keyin SET istell2 = '".$istell2."' Where k_id = ".SqlFilter($_REQUEST["id"],"int")."";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
        }
    }

    if($_REQUEST["st"] == "k_be"){
        $SQL = "SELECT * FROM love_keyin Where k_id = ".SqlFilter($_REQUEST["id"],"int")."";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $mem_num = $result["mem_num"];
            $k_name = $result["k_name"];
            $k_mobile = $result["k_mobile"];
            $action_auto = $result["action_auto"];
            $action_branch = $result["action_branch"];
            $action_time = $result["action_time"];
            $action_title = $result["action_title"];
            //更新isbe
            $SQL = "UPDATE love_keyin SET isbe='".SqlFilter($_REQUEST["v"],"tab")."' Where k_id = ".SqlFilter($_REQUEST["id"],"int")."";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
        }

        if($_REQUEST["v"] == "1"){
            $k_be = "正取";
        }else{
            $k_be = "備取";
        }

        // 新增log
        $singlenames = SingleName($_SESSION["MM_Username"],"normal");
        $log_4 = "由 ".$singlenames." 設定 ".$k_name." 在[".$action_auto."]".$action_branch." - ".$action_time." - ".$action_title." 中為 ".$k_be."";
        $SQL =  "INSERT INTO log_data (log_time,log_num,log_username,log_name,log_branch,log_single,log_1,log_2,log_4,log_5,log_service) VALUES (
                '".date("Y/m/d H:i:s")."',
                '".$mem_num."',
                '".$k_name."',
                '".$singlenames."',
                '".$_SESSION["branch"]."',
                '".$_SESSION["MM_Username"]."',
                '".$k_mobile."',
                '系統紀錄',
                '".$log_4."',
                'member','1')";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();

        reURL("win_close.php?m=變更中...");
    }

    $SQL = "select * from action_data where ac_auto='".SqlFilter($_REQUEST["id"],"int")."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $cansee = 0;
        if($_SESSION["MM_UserAuthorization"] == "admin"){
            $cansee = 1;
        }
        if($result["ac_branch"] == $_SESSION["branch"]){
            $cansee = 1;
        }
    }else{
        echo "暫無資料";
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_action_list.php">網站活動上傳</a></li>
            <li class="active">網站活動團控 - <?php echo $result["ac_title"]; ?>[<?php echo SqlFilter($_REQUEST["id"],"int"); ?>]</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>網站活動上傳 - <?php echo Date_EN($result["ac_time"],9) ?> - <?php echo $result["ac_title"]; ?>[<?php echo SqlFilter($_REQUEST["id"],"int"); ?>]</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">

                <p><a href="ad_action_list2_add.php?id=<?php echo SqlFilter($_REQUEST["id"],"int"); ?>" class="btn btn-danger">新增參加人員</a>&nbsp;
                    <?php 
                        if($cansee == 1){ ?>
                            <a href="#p" onclick="Mars_popup('ad_action_list2_view_print.php?s=p<?php echo requestStr(); ?>','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');" class="btn btn-info">列印本頁</a>
                            <a class="btn btn-success" href="javascript:Mars_popup('ad_action_list2_view_print2.php?ac=<?php echo SqlFilter($_REQUEST["id"],"int"); ?>','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i> 要保明細表</a>
                            <a class="btn btn-success" href="javascript:Mars_popup('ad_action_list2_view_print3.php?ac=<?php echo SqlFilter($_REQUEST["id"],"int"); ?>','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i> 報名資料表</a>
                            <a href="ad_action_list2_upcsv.php?id=<?php echo SqlFilter($_REQUEST["id"],"int"); ?>" class="btn btn-warning">匯入 CSV 檔案</a>&nbsp;<small><a href="ad_announce_view.php?id=252" target="_blank">匯入教學</a></small>
                        <?php }
                    ?>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <?php 
                        $boys = 0;
                        $girls = 0;
                        //男生數量
                        $SQL = "select count(k_id) as tt from love_keyin where all_kind='活動' and action_auto='".$result["ac_auto"]."' and k_sex='男'";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result2 = $rs->fetch(PDO::FETCH_ASSOC);
                        if($result2){
                            $boys = $result2["tt"];
                        }
                        //女生數量
                        $SQL = "select count(k_id) as tt from love_keyin where all_kind='活動' and action_auto='".$result["ac_auto"]."' and k_sex='女'";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result2 = $rs->fetch(PDO::FETCH_ASSOC);
                        if($result2){
                            $girls = $result2["tt"];
                        }

                        //計算總人數
                        $SQL = "select count(k_id) as total_size from love_keyin where all_kind='活動' and action_auto='".$result["ac_auto"]."'";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result2 = $rs->fetch(PDO::FETCH_ASSOC);
                        if($result2){
                            $total_size = $result2["total_size"]; 
                        }else{
                            $total_size = 0;
                        }
                        
                        $tPage = 1; //目前頁數
                        $tPageSize = 30; //每頁幾筆
                        if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
                        $tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
                        if ( $tPageSize*$tPage < $total_size ){
                            $page2 = 30;
                        }else{
                            $page2 = (30-(($tPageSize*$tPage)-$total_size));
                        }
                       
                        //搜尋本次活動                           
                        $SQL = "SELECT * FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM love_keyin WHERE all_kind='活動' and action_auto='".$result["ac_auto"]."' order by k_time desc ) t1 order by k_time ) t2 order by k_time desc" ;
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result2 = $rs->fetchAll(PDO::FETCH_ASSOC);
                        if(!$result2){
                            echo "<tr><td colspan=8>暫無資料</td></tr>";
                        }else{ ?>
                            <thead>
                                <tr>
                                    <td colspan=14>男：<?php echo $boys; ?> 人、女： <?php echo $girls; ?>人、共： <?php echo $boys+$girls; ?>人 (備取人員將不會出現在要保明細中)</td>
                                </tr>
                                <tr>
                                    <th>會員</th>
                                    <th>姓名</th>
                                    <th>性別</th>
                                    <th>手機</th>
                                    <th>Email</th>
                                    <th>地區</th>
                                    <th>活動會館</th>
                                    <th width=150>通知</th>
                                    <th width=80>後五碼</th>
                                    <th width=80>正備取</th>
                                    <th width=80>證件</th>
                                    <th>來源</th>
                                    <th width="250">報名時間</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                                                                       
                                    foreach($result2 as $re2){
                                        $mlabel = "";                                        
                                        $SQL = "select mem_level, mem_branch from member_data where mem_mobile='".$re2["k_mobile"]."' and mem_level='mem'";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result3 = $rs->fetchAll(PDO::FETCH_ASSOC);
                                        if($result3){
                                            foreach($result3 as $re3){
                                                if($re3["mem_branch"] == "八德"){
                                                    $mlabel = "<span class='label label-success'>DateMeNow</span>";
                                                }
                                                if($re3["mem_branch"] != "八德"){
                                                    $mlabel = "<span class='label label-warning'>春天會館</span>";
                                                }
                                                if($re3["mem_branch"] == "約專"){
                                                    $mlabel = "<span class='label' style='background:#c22c7d'>約會專家</span>";
                                                }
                                                if($re3["mem_branch"] == "迷你約"){
                                                    $mlabel = "<span class='label' style='background:#fccfae'>迷你約</span>";
                                                }
                                            }
                                        }

                                        if($mlabel == ""){
                                            $SQL = "select mem_level, mem_branch from member_data where mem_mobile='".$re2["k_mobile"]."' and si_account <> ''";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result3 = $rs->fetch(PDO::FETCH_ASSOC);
                                            if($result3){
                                                $mlabel = $mlabel ."<span class='label' style='background:#c22c7d'>約會專家</span>";
                                                if($result3["mem_level"] == "guest"){
                                                    $mlabel = $mlabel."<br><span style='color:darkblue'>(非會員)</span>";
                                                }
                                                $mem_num = $result3["mem_num"];
                                            }
                                        }

                                        if($mlabel == ""){
                                            $mlabel = "<span class='label label-info'>非會員</span>";
                                        }

                                        $qcansee = 0;
                                        if($re2["all_branch"] == $_SESSION["branch"]){
                                            $qcansee = 1;
                                        }

                                        $SQL = "select k_year from love_keyin where k_id=".$re2["k_id"]." and k_year is not null";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result3 = $rs->fetch(PDO::FETCH_ASSOC);
                                        if($result3){
                                           $mem_by = $result3["k_year"];
                                        }
                                        if($mem_by == 0){
                                            $mem_by = "未填寫";
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $mlabel; ?></td>
                                            <?php 
                                                if($cansee == 0 && $qcansee == 0){ ?>
                                                    <td align="center">
                                                        <?php echo mb_substr ($re2["k_name"],0,1,"utf8")."○○"; ?>
                                                        <br>(年次：<?php echo $mem_by; ?>)
                                                    </td>
                                                    <td align="center"><?php echo $re2["k_sex"]; ?></td>
                                                    <td align="center">**********</td>
                                                    <td align="center">**********</td>
                                                    <td class="center"><?php echo $re2["k_area"]; ?></td>
                                                    <td class="center"><?php echo $re2["action_branch"]; ?></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                    <td class="center"></td>
                                                <?php }else{ ?>                                                    
                                                    <td align="center"><a href="#c" onclick="Mars_popup('ad_love_detail.php?k_id=<?php echo $re2["k_id"]; ?>','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=350,top=150,left=150');"><?php echo $re2["k_name"]; ?></a><br>(年次：<?php echo $mem_by; ?>)</td>  	
                                                    <td align="center"><?php echo $re2["k_sex"]; ?></td>
                                                    <td class="center"><?php echo $re2["k_mobile"]; ?></td>
                                                    <td class="center"><?php echo $re2["k_yn"]; ?></td>
                                                    <td class="center"><?php echo $re2["k_area"]; ?></td>
                                                    <td class="center"><?php echo $re2["action_branch"]; ?></td>
                                                    <td class="center">
                                                        <?php 
                                                            if($re2["action_time"] != ""){
                                                                if(chkDate($re2["action_time"])){
                                                                    $at = Date_EN($re2["action_time"],7);
                                                                }else{
                                                                    $at = $re2["action_time"];
                                                                }
                                                            }
                                                            if($re2["isbe"] == 1){
                                                                $k_be = "正取";
                                                                $k_bev = 0;
                                                            }else{
                                                                $k_be = "備取";
					                                            $k_bev = 1;
                                                            }
                                                            $k_pay_num = "<form style='border:0px;margin:0px;padding:0px;' id='searchform2' action='ad_action_list2_view.php?topage=".SqlFilter($_REQUEST["topage"],"tab")."&ac=".SqlFilter($_REQUEST["id"],"int")."&id=".$re2["k_id"]."&st=uppaynum' method='post' target='_self' onsubmit='return save_b3($(this))'><input type='text' id='k_pay_num' name='k_pay_num' value='".$re2["k_pay_num"]."' rel='".$re2["k_pay_num"]."' style='width:60px;' placeholder='後五碼' onblur=\"save_b1($(this))\"><br><input type='text' id='k_pay_m' name='k_pay_m' value='".$re2["k_pay_m"]."' rel='".$re2["k_pay_m"]."' style='width:60px;' placeholder='對帳金額' onblur=\"save_b2($(this))\"><input type='submit' style='border:0px;margin:0px;padding:0px;visibility:hidden;height:0px;width:0px;'></form>";
					                                        $bb = "<a href='#' onClick=\"Mars_popup('ad_action_list2_view.php?st=k_be&v=".$k_bev."&id=".$re2["k_id"]."','','width=300,height=200,top=100,left=100')\">變</a>";

                                                            if($re2["istell"] != ""){
                                                                echo "<font color=blue>已通知</font>";
                                                                echo "&nbsp;&nbsp;<a href='#' onClick=\"Mars_popup('ad_action_list2_view.php?st=istell&v=2&id=".$re2["k_id"]."','','width=300,height=200,top=100,left=100')\"><i class='fa fa-remove color-red'></i></a>";
                                                            }else{
                                                                echo "<input type='checkbox' onClick=\"Mars_popup('ad_action_list2_view.php?st=istell&v=1&id=".$re2["k_id"]."','','width=300,height=200,top=100,left=100')\">";
                                                            }                                                            
                                                            echo "<form style='border:0px;margin:0px;padding:0px;' id='searchform3' action=\"ad_action_list2_view.php?topage=".SqlFilter($_REQUEST["topage"],"tab")."&ac=".SqlFilter($_REQUEST["id"],"int")."&id=".$re2["k_id"]."&st=istell2\" method='post' target='_self' onsubmit=\"return save_b4($(this))\"><input type='text' id='msg' name='msg' value='".$re2["istell2"]."' rel='".$re2["istell2"]."' style='width:150px;' placeholder='備註' onblur=\"save_b5($(this))\"><input type='submit' style='border:0px;margin:0px;padding:0px;visibility:hidden;height:0px;width:0px;'></form>";
                                                        ?>
                                                    </td>
                                                    <td class="center"><?php echo $k_pay_num; ?></td>								
                                                    <td class="center"><?php echo $k_be; ?>　<?php echo $bb; ?></td>								
                                                    <td class="center">
                                                        <?php
                                                            $um = "";
                                                            $SQL = "select mem_p1,mem_p2,mem_p3 from member_data where mem_num='".$re2["mem_num"]."'";
                                                            $rs->execute();
                                                            $result3 = $rs->fetch(PDO::FETCH_ASSOC);
                                                            if($result3){
                                                                if($result3["mem_p1"] != ""){
                                                                    $um = $um . "身正";
                                                                }

                                                                if($result3["mem_p2"] != ""){
                                                                    $um = $um . "<br>身反";
                                                                }

                                                                if($result3["mem_p3"] != ""){
                                                                    $um = $um . "<br>工證";
                                                                }
                                                            }
                                                            if($um == ""){
                                                                $um = "無";
                                                            }
                                                            echo $um;
                                                        ?>
                                                    </td>
                                                    <td class="center"><?php echo $re2["k_come"]; ?></td>								
                                                    <td><?php echo changeDate($re2["k_time"]); ?></td>
                                                    <td class="center">
                                                        <div class="btn-group">
                                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
							                                <ul class="dropdown-menu pull-right">
                                                                <?php 
                                                                    if($cansee == 1){
                                                                        echo "<li><a href='ad_action_list2_add.php?kid=".$re2["k_id"]."&id=".SqlFilter($_REQUEST["id"],"int")."'><i class='icon-edit'></i> 修改</a></li>";
                                                                    }
                                                                    if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["funtourall1"] == "1"){ ?>
                                                                        <li><a href="#" onClick="Mars_popup2('ad_action_list2_view.php?st=del&id=<?php echo $re2["k_id"]; ?>','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                                                    <?php }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                <?php }
                                            ?>
                                        </tr>
                                    <?php }
                                    
                                ?>
                            </tbody>
                        <?php }
                    ?>
                    
                </table>
            </div>
            <!-- 頁碼 -->
            <?php require_once("./include/_page.php"); ?> 
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $mtu = "ad_action_list.";
    $(function() {

        $(".show_check").on("click", function() {
            var $this = $(this),
                $num = $this.val(),
                $savediv = $("<div>儲存中</div>");
            $this.parent().append($savediv);
            if ($this.prop("checked")) $v = 1;
            else $v = 0;
            $.ajax({
                url: "ad_action_list2_view.php",
                data: {
                    st: "isbe",
                    t: $num,
                    v: $v
                },
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });
    });

    function save_b1(thisv) {
        if (thisv.parent().attr("action").length) {
            if (thisv.val() == thisv.attr("rel")) return false;
            var $savediv = $("<div>儲存中</div>"),
                $vv;
            thisv.parent().append($savediv);
            if (thisv.val() == "") $vv = "none";
            else $vv = thisv.val();
            $.ajax({
                url: thisv.parent().attr("action"),
                data: {
                    k_pay_num: $vv
                },
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    thisv.attr("rel", thisv.val());
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        console.log($vv);
        return false;
    }

    function save_b2(thisv) {
        if (thisv.parent().attr("action").length) {
            if (thisv.val() == thisv.attr("rel")) return false;
            var $savediv = $("<div>儲存中</div>"),
                $vv;
            thisv.parent().append($savediv);
            if (thisv.val() == "") $vv = "none";
            else $vv = thisv.val();
            $.ajax({
                url: thisv.parent().attr("action"),
                data: {
                    k_pay_m: $vv
                },
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    thisv.attr("rel", thisv.val());
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        console.log($vv);     
        return false;
    }

    function save_b3(thisv) {
        if (thisv.attr("action").length) {
            var $savediv = $("<div>儲存中</div>");
            thisv.append($savediv);
            $.ajax({
                url: thisv.attr("action") + "&full=1",
                data: thisv.serialize(),
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    }

    function save_b4(thisv) {
        if (thisv.attr("action").length) {
            var $savediv = $("<div>儲存中</div>");
            thisv.append($savediv);
            $.ajax({
                url: thisv.attr("action"),
                data: thisv.serialize(),
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    }

    function save_b5(thisv) {
        if (thisv.parent().attr("action").length) {
            if (thisv.val() == thisv.attr("rel")) return false;
            var $savediv = $("<div>儲存中</div>"),
                $vv;
            thisv.parent().append($savediv);
            if (thisv.val() == "") $vv = "none";
            else $vv = thisv.val();
            $.ajax({
                url: thisv.parent().attr("action"),
                data: {
                    msg: $vv
                },
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    thisv.attr("rel", thisv.val());
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    }
</script>