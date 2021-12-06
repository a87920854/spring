<?php
	error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_mem_pay_detail.php
	//後台對應位置：名單/發送記錄>分期服務記錄(收支)
	//改版日期：2021.12.3
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");

    if ( SqlFilter($_REQUEST["mem_username"],"tab") == "" ){ call_alert("會員編號讀取有誤。",0,0); }

    $auth_limit = 7;
    require_once("./include/_limit.php");
    
    //Set rs = Server.CreateObject("ADODB.Recordset")
    $mem_username = SqlFilter($_REQUEST["mem_username"],"tab");

    if ( SqlFilter($_REQUEST["st"],"tab") == "resetpay" ){
	    $reset_time = SqlFilter($_REQUEST["reset_time"],"tab");
	    if ( chkDate($reset_time) == false ){
		    call_alert("重置紀錄時間錯誤。", 0, 0);
        }
	
        $SQL = "Select Top 1 * From pay_main Where pay_user = '".$mem_username."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $re);
	    if ( count($result) == 0 ){
		    call_alert("此身分證尚未有收支紀錄因此無法插入重置紀錄。", 0, 0);
        }else{
            $uname = $re["pay_name"];
            $pay_b_year = $re["pay_b_year"];
            $pay_school = $re["pay_school"];
        }

        //新增記錄
        $SQL_i  = "Insert Into pay_main(pay_year, pay_month, pay_date, pay_times, pay_branch, pay_sec, pay_name, pay_user, pay_b_year, pay_school, pay_detail, pay_detail2) Values ( ";
        $SQL_i .= "'".date("Y",$reset_time)."',";
        $SQL_i .= "'".date("m",$reset_time)."',";
        $SQL_i .= "'".date("d",$reset_time)."',";
        $SQL_i .= "'".$reset_time."',";
        $SQL_i .= "'系統',";
        $SQL_i .= "'".$_SESSION["pname"]."',";
        $SQL_i .= "'".$uname."',";
        $SQL_i .= "'".$mem_username."',";
        $SQL_i .= "'".$pay_b_year."',";
        $SQL_i .= "'".$pay_school."',";
        $SQL_i .= "'收入重置',";
        $SQL_i .= "'".SqlFilter($_REQUEST["reset_beca"],"tab")."')";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();
    	call_alert("插入重置記錄完成。", "ad_mem_pay_detail.asp?mem_username=".$mem_username."&uname=".$uname, 0);
    }

    //取得總筆數
    $SQL = "Select count(pay_auto) As total_size From pay_main Where pay_user = '".$mem_username."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) == 0 || $re["total_size"] == 0 ) {
        $total_size = 0;
    }else{
        $total_size = $re["total_size"];
    }

	//取得分頁資料
	$tPageSize = 20; //每頁幾筆
	$tPage = 1; //目前頁數
	if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
	$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
	if ( $tPageSize*$tPage < $total_size ){
		$page2 = $tPageSize;
	}else{
		$page2 = ($tPageSize-(($tPageSize*$tPage)-$total_size));
	}

    //分頁語法
	$SQL_list  = "Select * From (";
	$SQL_list .= "Select TOP ".$page2." * From (";
	$SQL_list .= "Select TOP ".($tPageSize*$tPage)." * From pay_main Where pay_user = '".$mem_username."' Order By pay_auto Asc) t1 Where pay_user = '".$mem_username."' Order By pay_auto Desc ) t2 Where pay_user = '".$mem_username."' Order By pay_auto Desc ";
	$rs_list = $SPConn->prepare($SQL_list);
	$rs_list->execute();
	$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li><a href="ad_mem.asp">會員管理系統</a></li>
            <li class="active">收支明細 - <?php echo SqlFilter($_REQUEST["uname"],"tab");?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>收支明細 - <?php echo SqlFilter($_REQUEST["uname"],"tab");?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <?php
                    $SQL  = "Select sum(pay_total2) - sum(ap_4new) As pst From pay_main As dba Where pay_user = '".$mem_username."' AND ";
                    $SQL .= "(pay_auto > isnull((SELECT TOP 1 pay_auto FROM pay_main AS dbb WHERE (pay_detail = '收入重置') AND (pay_user = dba.pay_user) ";
                    $SQL .= "order by pay_times desc), 0))";
                    $rs = $SPConn->prepare($SQL);
                    $rs->execute();
                    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $re);
       	            if ( count($result) > 0 ){
       		            $pst = $re["pst"];
                    }       	        
       	            if ( $pst == "" || is_null($pst) ){
       		            $pst = 0;
                    }       	
       	            if ( $pst >= 120000 ){
       		            $pst = "<font color='red'>".$pst."</font>";
                    }
       	
       	            echo "<p>全省實收總計：".$pst."";
        
                    if ( $_SESSION["MM_Username"] == "KYOE" || $_SESSION["MM_Username"] == "LI6954029" ){
        	            echo "&nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle='collapse' href='#resetdiv' class='btn btn-danger btn-xs'>收入重置</a>";
                    }
                    echo "</p>";
                ?>
                <div id="resetdiv" class="collapse">
                    <p>
                    <form method="post" action="ad_mem_pay_detail.asp">
                        重置日期：<input type="text" name="reset_time" id="reset_time" placeholder="重置日期" class="datepicker" value="<?php //echo chtimed(date());?>" required>
                        <input type="text" name="reset_beca" id="reset_beca" placeholder="請輸入重置原因" class="form-control2" required>
                        <input type="hidden" name="st" value="resetpay">
                        <input type="hidden" name="mem_username" value="<?php echo $mem_username;?>">
                        <input type="submit" value="確定插入重置記錄" class="btn btn-xs btn-black">
                    </form>
                    </p>
                </div>
                <?php
	            if ( count($result_list) == 0 ){
	                echo "<tr><td colspan='10' height='200'>目前沒有資料</td></tr>";
                }else{
                    foreach($result_list as $re_list){ ?>
                        <table class="table table-striped table-bordered bootstrap-datatable input_small">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="900" border="0" align="center" cellpadding="3">
                                            <tr> 
                                                <td width="70" bgcolor="#FBE6E8"> <div align="center">編號</div></td>
                                                <td width="90" bgcolor="#FBE6E8"> <div align="center">日期</div></td>
                                                <td width="95" bgcolor="#FBE6E8"> <div align="center">服務成本</div></td>
                                                <td width="95" bgcolor="#FBE6E8"> <div align="center">受理秘書</div></td>
                                                <td width="80" bgcolor="#FBE6E8"> <div align="center">姓名</div></td>
                                                <td width="90" bgcolor="#FBE6E8"> <div align="center">身分證字號</div></td>
                                                <td width="60" bgcolor="#FBE6E8"> <div align="center">年次</div></td>
                                                <td width="72" bgcolor="#FBE6E8"> <div align="center">學歷</div></td>
                                            </tr>
                                            <tr> 
                                                <td bgcolor="#F0F0F0" style="word-break:break-all">
                                                    <div align="center"><font color="#FF0000" size="3"><?php echo $re_list["pay_auto"];?></font></div>
                                                </td>
                                                <td height="30" bgcolor="#F0F0F0" style="word-break:break-all"> 
                                                    <div align="center"><font color="#000066">
                                                        <?php echo $re_list["pay_year"];?>年<?php echo $re_list["pay_month"];?>月<?php echo $re_list["pay_date"];?>日</font>
                                                    </div>
                                                </td>
                                                <td bgcolor="#F0F0F0" style="word-break:break-all"><div align="center"><?php echo $re_list["ap_4"].$re_list["ap_4new"];?></div></td>
                                                <td bgcolor="#F0F0F0" style="word-break:break-all">
                                                    <div align="center"><font color="#000066">(<?php echo $re_list["pay_branch"];?>)<br><?php echo $re_list["pay_sec"];?></font></div>
                                                </td>
                                                <td bgcolor="#F0F0F0" style="word-break:break-all"><div align="center"><font color="#000066"><?php echo $re_list["pay_name"];?></font></div></td>
                                                <td bgcolor="#F0F0F0" style="word-break:break-all"><div align="center"><font color="#000066"><?php echo $re_list["pay_user"];?></font></div></td>
                                                <td bgcolor="#F0F0F0" style="word-break:break-all"><div align="center"><font color="#000066"><?php echo $re_list["pay_b_year"];?></font></div></td>
                                                <td bgcolor="#F0F0F0" style="word-break:break-all"><div align="center"><font color="#000066"><?php echo $re_list["pay_school"];?></font></div></td>
                                            </tr>
                                            <tr> 
                                                <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all"> 
                                                    <div align="center">摘要及說明</div></td>
                                                <td bgcolor="#D7EBFF" style="word-break:break-all"> <div align="center">應收金額</div></td>
                                                <td bgcolor="#E1FFE1" style="word-break:break-all"> <div align="center">實收金額</div></td>
                                                <td bgcolor="#FFFFD2" style="word-break:break-all"> <div align="center">現金</div></td>
                                                <td bgcolor="#FFFFD2" style="word-break:break-all"> <div align="center">超商繳費</div></td>
                                                <td bgcolor="#FFFFD2" style="word-break:break-all"> <div align="center">轉帳</div></td>
                                                <td bgcolor="#FFFFD2" style="word-break:break-all"> <div align="center">刷卡</div></td>
                                            </tr>
                                            <tr> 
                                                <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all"> 
                                                    <div align="center"><font color="#000066"><?php echo $re_list["pay_detail"];?>-<?php echo $re_list["pay_detail2"];?></font></div></td>
                                                <td bgcolor="#F0F0F0" style="word-break:break-all">
                                                    <div align="center"><font color="#000099" size="3"><?php echo $re_list["pay_total"];?></font></div>
                                                </td>
                                                <td bgcolor="#F0F0F0" style="word-break:break-all">
                                                    <div align="center"><font color="#003300" size="3"><?php echo $re_list["pay_total2"];?></font></div>
                                                </td>
                                                <td bgcolor="#F0F0F0" style="word-break:break-all"><div align="center"><font color="#000066"><?php echo $re_list["pay_cash"];?></font></div></td>
                                                <td bgcolor="#F0F0F0" style="word-break:break-all"><div align="center"><font color="#000066"><?php echo $re_list["pay_card3"];?></font></div></td>
                                                <td bgcolor="#F0F0F0" style="word-break:break-all"><div align="center"><font color="#000066"><?php echo $re_list["pay_atm"];?></font></div></td>
                                                <td bgcolor="#F0F0F0" style="word-break:break-all"><div align="center"><font color="#000066"><?php echo $re_list["pay_card"];?></font></div></td>
                                            </tr>
                                            <?php if ( $re_list["pay_atm2"] != "" || $re_list["pay_card2"] != "" || $re_list["pay_card4"] != "" ){ ?>
                                                <tr>
                                                    <td colspan=4 bgcolor="#FBE6E8"></td>
                                                    <td height="30" align="center" bgcolor="#FFFFD2" style="word-break:break-all"></td>
                                                    <td height="30" align="center" bgcolor="#FFFFD2" style="word-break:break-all"></td>
                                                    <td height="30" align="center" bgcolor="#FFFFD2" style="word-break:break-all">仲信</td>
                                                    <td height="30" align="center" bgcolor="#FFFFD2" style="word-break:break-all"></td>
                                                </tr>
                                            <?php }?>

                                            <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" || $re_list["pay_branch"] == $_SESSION["branch"] ){ ?>
                                                <tr valign="top"> 
                                                    <td colspan="4" width="50%" style="word-break:break-all">
                                                        <table width="450" border="0" align="center" cellpadding="3">
                                                            <tr bgcolor="#FFEBD7"> 
                                                                <td width="165"><div align="center">會館</div></td>
                                                                <td width="167"><div align="center">會館業績</div></td>
                                                            </tr>
                                                            <?php
                                                            $SQL = "Select * From pay_branch Where pay_auto=".$re_list["pay_auto"]." Order By pb_total Desc";
                                                            $rs = $SPConn->prepare($SQL);
                                                            $rs->execute();
                                                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                                            if ( count($result) > 0 ){
                                                                foreach($result as $re){ ?>
                                                                    <tr bgcolor="#F0F0F0"> 
                                                                        <td><div align="center"><?php echo $re["pb_reb"];?></div></td>
                                                                        <td><div align="center"><?php echo $re["pb_total"];?></div></td>
                                                                    </tr>
                                                                <?php }?>
                                                            <?php }?>
                                                        </table>
                                                        <table width="450" border="0" align="center" cellpadding="2">
                                                            <?php
                                                            $SQL = "Select * From pay_teacoupon Where pay_auto=".$re_list["pay_auto"];
                                                            $rs = $SPConn->prepare($SQL);
                                                            $rs->execute();
                                                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                                            if ( count($result) > 0 ){
                                                                echo "<tr bgcolor='#F0F0F0' align='center'><td>";
                                                                foreach($result as $re){
                                                                    $types = teacoupon_types($re["types"]);
                                                                    echo "&nbsp;&nbsp;".$types." ".$re["quantity"]." 張";
                                                                }
                                                                echo "</td></tr>";
                                                            } ?>
                                                            <?php
                                                            if ( $re["pay_month"] == date("Y") ){ ?>
                                                                <tr>
                                                                    <td bgcolor="#FBE6E8">
                                                                        <div align="center">
                                                                            <a href="javascript:;" onClick="Mars_popup('payment_list.asp?st=del&pay_auto=<?php echo $re["pay_auto"];?>','','width=300,height=200,top=30,left=30')">刪除資料</a>
                                                                            <font color="#000066">
                                                                                <a href="javascript:;" onClick="centerWindow('payment_pnot_add.asp?pay_auto=<?php echo $re["pay_auto"];?>','','490','420','')">新增押單紀錄</a>
                                                                            </font>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php }?>                                                
                                                        </table>
                                                    </td>
                                                    <td colspan="4" width="50%" style="word-break:break-all">
                                                        <div align="center">
                                                            <table width="450" border="0" align="center" cellpadding="3">
                                                                <tr bgcolor="#F0E1E1"> 
                                                                    <td width="98"><div align="center">會館</div></td>
                                                                    <td width="100"><div align="center">秘書</div></td>
                                                                    <td width="101"><div align="center">秘書業績</div></td>
                                                                </tr>
                                                                <?php
                                                                $SQL = "Select * From pay_single Where pay_auto=".$re["pay_auto"]." Order By ps_total Desc";
                                                                $rs = $SPConn->prepare($SQL);
                                                                $rs->execute();
                                                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                                                if ( count($result) > 0 ){
                                                                    foreach($result as $re){ ?>
                                                                        <tr bgcolor="#F0F0F0"> 
                                                                            <td><div align="center"><?php echo $re["ps_branch"];?></div></td>
                                                                            <td><div align="center"><?php echo $re["ps_sec"];?></div></td>
                                                                            <td><div align="center"><?php echo $re["ps_total"];?></div></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php }?>
                <?php }?>
            </div>
        </div>
        <!--/span-->
        <?php require_once("./include/_page.php"); ?>
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->
<?php require_once("./include/_bottom.php");?>