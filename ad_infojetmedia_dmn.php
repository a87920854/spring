<?php
	error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_infojetmedia_dmn.php
	//後台對應位置：名單/發送記錄>DMN億捷創意
	//改版日期：2021.11.3
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");

    //判斷權限
    $auth_limit = "2";
    require_once("./include/_limit.php");

    //更新狀態
    if ( SqlFilter($_REQUEST["st"],"tab") == "double" ){
        $SQL_u = "Update infojetmedia_dmn Set stat=2 Where auton=".SqlFilter($_REQUEST["auton"],"tab");
        $rs_u = $SPConn->prepare($SQL_u);
        $rs_u->execute();
        reURL("ad_infojetmedia_dmn.php");
        exit;
    }

    if ( SqlFilter($_REQUEST["st"],"tab") == "trans" ){
        $SQL = "Select * From infojetmedia_dmn Where auton=".SqlFilter($_REQUEST["auton"],"int");
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $re);
        if ( count($result) > 0 ){                
            $SQL1 = "Select * From msg_num Where m_auto=1";
            $rs1 = $SPConn->prepare($SQL1);
            $rs1->execute();
            $result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
            foreach($result1 as $re1);
            $mem_num = $re1["m_num"] + 1;
            $SQL_u = "Update msg_num set m_num = ". $mem_num ." Where m_auto = 1";
            $rs_u = $SPConn->prepare($SQL_u);
            $rs_u->execute();
            if ( $re["sex"] == "女" ){
                $mem_photo = "girl.jpg";
            }else{
                $mem_photo = "boy.jpg";
            }

            //INSERT member_data
            $SQL_i  = "Insert Into ad_index_data(all_type, mem_level, mem_num, mem_photo, mem_come, mem_cc, mem_time, mem_name, mem_sex, mem_blood, mem_marry, mem_mobile, mem_by, ";
            $SQL_i .= "mem_bm, mem_bd, mem_area, mem_mail, mem_school, all_note) Values ( ";
            $SQL_i .= "'未處理',";
            $SQL_i .= "'guest',";
            $SQL_i .= "'".$mem_num."',";
            $SQL_i .= "'".$mem_photo."',";
            $SQL_i .= "'億捷創意-DMN',";
            $SQL_i .= "'".$re["regc"]."',";
            $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
            $SQL_i .= "'".$re["names"]."',";
            $SQL_i .= "'".$re["sex"]."',";
            $SQL_i .= "'A',";
            $SQL_i .= "'未婚',";
            $SQL_i .= "'".$re["mobile"]."',";
            if ( chkDate($re["age"]) ){
                $SQL_i .= "'".date("Y",$re["age"])."',";
                $SQL_i .= "'".date("m",$re["age"])."',";
                $SQL_i .= "'".date("d",$re["age"])."',";
            }else{
                $SQL_i .= "'',";
                $SQL_i .= "'',";
                $SQL_i .= "'',";
            }
            $SQL_i .= "'".$re["city"]."',";
            if ( $re["email"] != "" ){
                $SQL_i .= "'".$re["email"]."',";
            }else{
                $SQL_i .= "'',";
            }
            $SQL_i .= "'".$re["school"]."',";
            $SQL_i .= "'".$re["times"]."- 自 DateMeNow-億捷創意 轉換')";
            $rs_i = $SPConn->prepare($SQL_i);
            $rs_i->execute();
            $mem_auto = mysql_insert_id();
            echo $mem_auto;
            exit;
            
            //UPDATE msg_num
            $SQL_u = "Update msg_num Set mem_auto=".$mem_auto.",stat=1";
            $rs_u = $SPConn->prepare($SQL_u);
            $rs_u->execute();
        }
        reURL("ad_infojetmedia_dmn.asp");
        exit;
    }
    
    //刪除資料
    if ( SqlFilter($_REQUEST["st"],"tab") == "del" ){
        $SQL_d = "Delete From infojetmedia_dmn Where auton=".SqlFilter($_REQUEST["auton"],"int");
        $rs_d = $SPConn->prepare($SQL_d);
        $rs_d->execute();
        reURL("win_close.asp?m=資料刪除中");
        exit;
    }

    //程式
    $stat = SqlFilter($_REQUEST["stat"],"tab");
    switch ($stat){
	    case "2":
            $subSQL = "stat = 2";
            $d1 = "";
            $d2 = "";
            $d3 = "disabled";
            break;
	    case "1":
	        $subSQL = "stat = 1";
	        $d1 = "";
	        $d2 = "disabled";
	        $d3 = "";
            break;
        default:
	        $subSQL = "stat = 0";
	        $d1 = "disabled";
	        $d2 = "";
	        $d3 = "";
            break;
    }

    /*if request("vst") = "full" then
    	sqls = "1 = 1"
    end if*/

    if ( SqlFilter($_REQUEST["times1"],"tab") != "" ){
        $t1 = SqlFilter($_REQUEST["times1"],"tab");
        if ( chkDATE($t1) == false){
            call_alert("起始日期有誤。", 0, 0);
        }
        $t1 = $t1 . " 00:00";
    }

    if ( SqlFilter($_REQUEST["times2"],"tab") != "" ){
        $t2 = SqlFilter($_REQUEST["times2"],"tab");
        if ( chkDate($t2) == false ){
            call_alert("結束日期有誤。", 0, 0);
        }
        $t2 = $t2 . " 23:59";
    }

    if ( $t1 != "" && $t2 != "" ){
	    $subSQL = " And times Between '".$t1."' And '".$t2."'";
	    //$t1 = datevalue($t1);
	    //$t2 = datevalue($t2);
    }

    //取得總筆數
    $SQL = "Select count(auton) As total_size From infojetmedia_dmn Where ".$subSQL;
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
    $tPageSize = 50; //每頁幾筆
    $tPage = 1; //目前頁數
    if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
    $tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
    if ( $tPageSize*$tPage < $total_size ){
        $page2 = 50;
    }else{
        $page2 = (50-(($tPageSize*$tPage)-$total_size));
    }

    //分頁語法
    $SQL  = "Select * From (";
    $SQL .= "Select TOP ".$page2." * From (";
    $SQL .= "Select TOP ".($tPageSize*$tPage)." * From infojetmedia_dmn Where ".$subSQL." Order By times Desc) t1 Where ".$subSQL." Order By times Desc ) t2 Where ".$subSQL." Order By times Desc ";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">DateMeNow-億捷創意</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>DateMeNow-億捷創意 - 數量：<?php echo $total_size;?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <p>
                        <span class="text-status">目前資料狀態 </span> ▶&nbsp;
                        <a href="ad_infojetmedia_dmn.php" class="btn btn-info<?php if ( $stat == "" ){?> btn-active<?php }?>"<?php if ( $stat == "" ){?> disabled<?php }?>>未處理</a>
                        <a href="ad_infojetmedia_dmn.php?stat=1" class="btn btn-info<?php if ( $stat == 1 ){?> btn-active<?php }?>"<?php if ( $stat == 1 ){?> disabled<?php }?>>已處理</a>
                        <a href="ad_infojetmedia_dmn.php?stat=2" class="btn btn-info<?php if ( $stat == 2 ){?> btn-active<?php }?>"<?php if ( $stat == 2 ){?> disabled<?php }?>>重複</a>
                    </p>
                    <p>
                        <form name="form1" method="post" action="?vst=full&stat=0" style="margin:0px;">
                            &nbsp;&nbsp;日期：
                            <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times1" value="">
                            ～
                            <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times2" value="">
                            <input type="submit" name="Submit" style="height:28px;margin-top:-7px;" value="查詢">
                        </form>
                    </p>
                    <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                        <thead>
                            <tr>
                                <th width="12%">時間</th>
                                <th width="8%">姓名</th>
                                <th width="3%">性別</th>
                                <th width="8%">生日</th>
                                <th width="6%">學歷</th>
                                <th width="6%">手機</th>
                                <th width="10%">Email</th>
                                <th width="8%">地區</th>
                                <th width="15%">註冊來源</th>
                                <th width="12%">註冊時間</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ( count($result) == 0 ){
                                echo "<tr><td colspan='10'>目前已無資料</td></tr>";
                            }else{
                                foreach($result as $re){
	                                $mobile = $re["mobile"];
	                                $havee = 0;
                                    $SQL1 = "Select Top 1 * From member_data Where mem_branch = '八德' And mem_mobile='".$mobile."'";
                                    $rs1 = $SPConn->prepare($SQL1);
                                    $rs1->execute();
                                    $result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
                                    if ( count($result1) > 0 ){
		                                $havee = 1;
                                    }
	                                $SQL1 = "Select Top 1 * From love_keyin Where all_branch = '八德' And k_mobile='".$mobile."'";
                                    $rs1 = $SPConn->prepare($SQL1);
                                    $rs1->execute();
                                    $result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
                                    if ( count($result1) > 0 ){
		                                $havee = 1;
                                    } ?>
                                <tr>
                                    <td align="center"><?php echo changeDate($re["times"]);?></td>
                                    <td align="center"><?php echo $re["names"];?><?php if ( $stat !=1 ){?>(<a href="ad_no_mem_s.asp?mem_mobile=<?php echo $mobile;?>" target="_blank">查</a>)<?php }?></td>
                                    <td align="center"><?php echo $re["sex"];?></td>
                                    <td align="center"><?php echo $re["age"];?></td>
                                    <td align="center"><?php echo $re["school"];?></td>
                                    <td align="center"><?php echo $mobile;?></td>
                                    <td align="center"><?php echo $re["email"];?></td>
                                    <td align="center"><?php echo $re["city"];?></td>
                                    <td align="center"><?php echo $re["regc"];?></td>
                                    <td align="center"><?php echo $re["regt"];?></td>
                                    <td align="center">
                                    <?php if ( $stat == 0 ){ ?>
                                        <div class="btn-group">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                            <ul class="dropdown-menu pull-right">
                                                <?php if ( $havee == 1 && SqlFilter($_REQUEST["stat"],"tab") != "1" ){?>
                                                    <li><a href="?st=double&auton=<?php echo $re["auton"];?>"><i class="icon-share"></i> 此電話重複</a></li>
                                                <?php }elseif ( SqlFilter($_REQUEST["stat"],"tab") != "1" ){ ?>
                                                    <li><a href="?st=trans&auton=<?php echo $re["auton"];?>"><i class="icon-share"></i> 轉入未入會資料</a></li>
                                                <?php }?>
                                                <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=<?php echo $re["auton"];?>','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                            </ul>
                                        </div>
                                    <?php }elseif ( $stat == 1 ){
                                        $reports = get_report_num($mobile);
                                        if ( substr_count($reports, "|+|") > 0 ){
                                            $reports_array = explode("|+|", $reports);
                                            $report = $reports_array[0];
                                            $report_text = $reports_array[1];
                                        }else{
                                            $report = 0;
                                            $report_text = "無";
                                        }
                                    ?>
                                        <a href="javascript:Mars_popup('ad_report.php?k_id=<?php echo $re["mem_auto"];?>&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(<?php echo $report;?>)</a>
                                    <?php }?>
                                    </td>
                                </tr>
                            <?php }}?>
                        </tbody>
                    </table>
                </div>
                <?php require_once("./include/_page.php"); ?>
            </div>
            <!--/span-->
        </div>
        <!--/row-->
    </div>
</section>
<!-- /MIDDLE -->

<?php require_once("./include/_bottom.php");?>