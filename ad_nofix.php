<?php
    error_reporting(0); 
    /*****************************************/
    //檔案名稱：ad_job.php
    //後台對應位置：名單/發送記錄>徵人資料
    //改版日期：2021.10.19
    //改版設計人員：Jack
    //改版程式人員：Queena
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    $auth_limit = 7;
    require_once("./include/_limit.php");

    if ( SqlFilter($_REQUEST["st"],"tab") == "trans" ){
	    //Set R1 = Server.CreateObject("ADODB.Recordset")
	    //Set R2 = Server.CreateObject("ADODB.Recordset")
	    $SQL = "Select * From join_log Where auton = ".SqlFilter($_REQUEST["auton"],"int");
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
        if ( count($result) > 0 ){
            $SQL1 = "Select * From member_data Where mem_mobile='".$re["mobile"]."'";
            $rs1 = $SPConn->prepare($SQL1);
            $rs1->execute();
            $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
            if ( count($result1) == 0 ){
                $SQL2 = "Select * From msg_num Where m_auto = 1";
                $rs2 = $SPConn->prepare($SQL2);
                $rs2->execute();
                $result2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
                $mem_num = ($re2["m_num"] + 1);
                $SQL_u = "Update msg_num Set m_num = ". $mem_num ." Where m_auto = 1";
                $rs_u = $SPConn->prepare($SQL_u);
                $rs_u->execute();
                if ( $re["sex"] == "女" ){ $mem_photo = "girl.jpg"; }else{ $mem_photo = "boy.jpg";}
                $come2 = "";

                switch ( $re["ty"] ){
  	                case "join":
  	                    $come = "春天網站";
  	                    $come2 = "春網註冊未成";
  	                    $come5 = "春天會館";
                        break;
  	                case "sd":
                        $come = "春天網站";
                        $come2 = "春網排約未成";
                        $come5 = "春天會館";
                        break;
  	                case "index":
                        $come = "春天網站";
                        $come2 = "首頁戀愛咨詢";
                        $come5 = "春天會館";
                        break;
  	                case "mini":
                        $come = "春天網站";
                        $come2 = "singleparty";
                        $come5 = "春天會館";
                        break;
  	                case "login":
                        $come = "春天網站";
                        $come2 = "會員登入頁";
                        $come5 = "春天會館";
                        break;
  	                case "dmn_index":
                        $come = "DMN網站";
                        $come2 = "首頁免費註冊";
                        $come5 = "DateMeNow";
                        break;
  	                case "dmn_login":
                        $come = "DMN網站";
                        $come2 = "會員登入頁";
                        $come5 = "DateMeNow";
                        break;
  	                default:
                        $come = "不明";
                }
                
                //Insert member_data
                $SQL_i  = "Insert Into member_data( all_type, mem_level, mem_num, mem_photo, mem_come, mem_come2, mem_come5, mem_time, mem_name, mem_sex, mem_blood, mem_marry, mem_mobile, ";
                $SQL_i .= "mem_area, mem_school, mem_cc ) Values (";
                $SQL_i .= "'未處理',";
                $SQL_i .= "'guest',";
                $SQL_i .= "'".$mem_num."',";
                $SQL_i .= "'".$mem_photo."',";
                $SQL_i .= "'".$come."',";
                $SQL_i .= "'".$come2."',";
                $SQL_i .= "'".$come5."',";
                $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
                $SQL_i .= "'".$re["name"]."',";
                $SQL_i .= "'".$re["sex"]."',";
                $SQL_i .= "'A',";
                $SQL_i .= "'未婚',";
                $SQL_i .= "'".$re["mobile"]."',";
                $SQL_i .= "'".$re["area"]."',";
                $SQL_i .= "'".$re["cc"]."')";
                $rs_i = $SPConn->prepare($SQL_i);
                $rs_i->execute();
            }
        }
        reURL("ad_nofix.asp");
        exit;
    }

    //刪除
    if ( SqlFilter($_REQUEST["st"],"tab") == "del" ){
        $SQL_d = "Delect From join_log Where auton = ".SqlFilter($_REQUEST["auton"],"int");
        $rs_d = $SPConn->prepare($SQL_d);
        $rs_d->execute();        
        reURL("win_close.asp?m=資料刪除中");
        exit;
    }

    //取得總筆數
    $SQL = "Select count(auton) As total_size From join_log";
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
	$SQL .= "Select TOP ".($tPageSize*$tPage)." * From join_log Order By times Desc) t1 Order By times Asc ) t2 Order By times Desc ";
	$rs = $SPConn->prepare($SQL);
	$rs->execute();
	$result = $rs->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">未完成名單資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>未完成名單資料</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>網站</th>
                            <th>時間</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>手機</th>
                            <th>地區</th>
                            <th>類型</th>
                            <th></th>
                        </tr>
                        <?php
                        if ( count($result) == 0 ){ //if R1.eof then
                            echo "<tr><td colspan='7'>目前已無資料</td></tr>";
                        }else{
                            foreach ($result as $re){ //while not R1.eof
                                //R2.open "SELECT k_mobile FROM love_keyin Where k_mobile='"&R1("mobile")&"'", SPCon, 1, 1
                                $SQL2 = "Select k_mobile From love_keyin Where k_mobile='".$re["mobile"]."'";
                                $rs2 = $SPConn->prepare($SQL2);
                                $rs2->execute();
                                $result2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
                                if ( count($result2) > 0 ){ //if not R2.eof then
                                    //R3.open "DELETE FROM join_log where mobile='"&R1("mobile")&"'", SPCon, 1, 3
                                    $SQL_d = "Delect From join_log Where mobile = '".$re["mobile"]."'";
                                    $rs_d = $SPConn->prepare($SQL_d);
                                    $rs_d->execute();
                                }
                                //R2.open "SELECT mem_mobile FROM member_data Where mem_mobile='"&R1("mobile")&"'", SPCon, 1, 1
                                $SQL2 = "Select mem_mobile From member_data Where mem_mobile = '".$re["mobile"]."'";
                                $rs2 = $SPConn->prepare($SQL2);
                                $rs2->execute();
                                $result2 = $rs2->fetchAll(PDO::FETCH_ASSOC);                                
                                if ( count($result2) > 0 ){ //if not R2.eof then
                                    //R3.open "DELETE FROM join_log where mobile='"&R1("mobile")&"'", SPCon, 1, 3
                                    $SQL_d = "Delect From join_log Where mobile = '".$re["mobile"]."'";
                                    $rs_d = $SPConn->prepare($SQL_d);
                                    $rs_d->execute();
                                }
                            }

                            //if R1.eof and R1.RecordCount <= 0 then
                            if ( count($result) == 0 ){
                                echo "<tr><td colspan='6'>目前無資料</td></tr>";
                            }else{
                                foreach ($result as $re){ //while not R1.eof
                                    $nono = 0;
                                    switch ( $re["ty"] ){
                                        case "join":
                                            $ty = "註冊未完成";
                                            break;
                                        case "sd":
                                            $ty = "排約未完成";
                                            break;
                                        case "index":
                                            $ty = "戀愛咨詢";
                                            break;
                                        case "mini":
                                            $ty = "singleparty";
                                            break;
                                        case "login":
                                            $ty = "會員登入頁";
                                            break;
                                        case "dmn_index":
                                            $ty = "首頁免費註冊";
                                            break;
                                        case "dmn_login":
                                            $ty = "會員登入頁";
                                            break;
                                        default:
                                            $ty = "不明";
                                    }
                          
                                    if ( $re["web"] == "dmn" ){
                                        $web = "DateMeNow";
                                    }else{
                                        $web = "春天會館";
                                    }
                                    ?>
                                    <tr>
                                        <td align="center"><?php echo $web;?></td>
                                        <td align="center"><?php echo $re["times"];?></td>
                                        <td align="center"><?php echo $re["name"];?>(<a href="ad_no_mem_s.php?mem_mobile=<?php echo $re["mobile"];?>" target="_blank">查</a>)</td>
                                        <td align="center"><?php echo $re["sex"];?></td>
                                        <td align="center"><?php echo $re["mobile"];?></td>
                                        <td align="center"><?php echo $re["area"];?></td>
                                        <td align="center"><?php echo $ty;?></td>
                                        <td align="center">
                                            <div class="btn-group">
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="?st=trans&auton=<?php echo $re["auton"];?>"><i class="icon-share"></i> 轉入未入會資料</a></li>                                    
                                                    <li><a href="javascript:Mars_popup2('ad_nofix.php?st=del&auton='','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                                </ul>
                                            </div>								
                                        </td>
                                    </tr>
                                <?php }?>
                            <?php }?>                
                        <?php }?>  
                    </tbody>
                </table>
            </div>
            <?php require_once("./include/_page.php");?>            
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->
<?php require_once("./include/_bottom.php");?>