<?php
	error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_single_count_love.php
	//後台對應位置：名單/發送記錄>排約人次統計
	//改版日期：2021.12.3
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">排約人次統計</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>排約人次統計<?php if ( $_SESSION["lovebranch"] != "" ){ echo " - ".$_SESSION["lovebranch"];}?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <?php
                $date1 = SqlFilter($_REQUEST["date1"],"tab");
				$date2 = SqlFilter($_REQUEST["date2"],"tab");
                $showbranch = "";
                if ( $_SESSION["MM_UserAuthorization"] != "admin" ){
                    if ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
                        $showbranch = $_SESSION["lovebranch"];
                    }else{
                        $showbranch = $_SESSION["branch"];
                    }
                } ?>
                <form action="?st=search" method="post" target="_self">
                    <p><a href="ad_single_count_love2.php" class="btn btn-info">查看年度總表</a> </p>
                    <p>日期：<input type="text" name="date1" id="date1" class="datepicker" autocomplete="off" value="<?php echo $date1;?>"> ~ <input type="text" name="date2" id="date2" class="datepicker" autocomplete="off" value="<?php echo $date2;?>">
                    <p>
                        <?php
                        $shown = SqlFilter($_REQUEST["shown"],"tab");
                        $rbranch = $_POST["branch"];
                        $rbranch_array = array();
                        if ( $rbranch <> "" ){
                            $rbranch_array = implode (",", $rbranch);
                        }
                        
                        if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
                            $SQL = "Select * From branch_data Where auto_no<>12 and auto_no<>10 Order By admin_sort";
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $re){?>
                                <input type="checkbox" name="branch[]" value="<?php echo $re["admin_name"]?>"
                                <?php
                                if ( $rbranch != "" ){
                                    if ( in_array($re["admin_name"],$rbranch) ){ echo "checked";}
                                }?>
                                > <?php echo $re["admin_name"];?>
                            <?php }?>
                        <?php }else{?>
                            <input type="checkbox" name="branch[]" value="<?php echo $showbranch;?>"> <?php echo $showbranch;?></label>
                        <?php }?>
                        <label><input type="checkbox" name="shown" value="1"<?php if ( $shown == 1 ){ echo " checked";}?>> 顯示離職</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="送出" class="btn btn-default" style="margin-top:-8px">
                    </p>
                </form>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=40>NO</th>
                            <th>會館</th>
                            <th>姓名</th>
                            <th>職稱</th>
                            <th>排約次數</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ( $rbranch == "" ){
                            echo "<tr><td colspan='15'>請選擇會館</td></tr>";
                        }else{                            
                            if ( $date1 == "" || $date2 == "" ){
                                echo "<tr><td colspan='15'>請選擇日期區間</td></tr>";
                                }else{
                                if ( $date1 > $date2 ){ call_alert("起始日期不可大過結束日期。", 0, 0); }						  		
                                if ( SqlFilter($_REQUEST["shown"],"tab") == "1" ){
                                    $subSQL = "";
                                }else{
                                    $subSQL = " and p_work=1";
                                }

                                if ( $rbranch != "" ){
                                    $rbranch_array = str_replace(",", "','",$rbranch_array);
                                }

                                if ( $_SESSION["MM_UserAuthorization"] == "admin" ){                                       
                                    $SQL  = "Select personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user,";
                                    $SQL .= "personnel_data.p_job2, SUM(love_data_re.score) AS lovecount FROM personnel_data LEFT OUTER JOIN ";
                                    $SQL .= "love_data_re ON (love_data_re.all_single = personnel_data.p_user OR love_data_re.all_single2 = personnel_data.p_user) AND (love_data_re.love_time2 BETWEEN '".$date1."' AND '".$date2."') ";
                                    $SQL .= "WHERE (personnel_data.p_branch in ('".$rbranch_array."')) and p_user <> '' ".$subSQL." ";
                                    $SQL .= "GROUP BY personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user, ";
                                    $SQL .= "personnel_data.p_job2 order by lovecount desc";
                                }elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "pay" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
                                    $SQL  = "Select personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user,";
                                    $SQL .= "personnel_data.p_job2, SUM(love_data_re.score) AS lovecount FROM personnel_data LEFT OUTER JOIN ";
                                    $SQL .= "love_data_re ON (love_data_re.all_single = personnel_data.p_user OR love_data_re.all_single2 = personnel_data.p_user) AND (love_data_re.love_time2 BETWEEN '".$date1."' AND '".$date2."') ";
                                    $SQL .= "WHERE (personnel_data.p_branch in ('".$rbranch_array."')) and p_user <> '' ".$subSQL." ";
                                    $SQL .= "GROUP BY personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user, ";
                                    $SQL .= "personnel_data.p_job2 order by lovecount desc";
                                }else{
                                    $SQL  = "Select personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user,";
                                    $SQL .= "personnel_data.p_job2, SUM(love_data_re.score) AS lovecount FROM personnel_data LEFT OUTER JOIN ";
                                    $SQL .= "love_data_re ON (love_data_re.all_single = personnel_data.p_user OR love_data_re.all_single2 = personnel_data.p_user) AND (love_data_re.love_time2 BETWEEN '".$date1."' AND '".$date2."') ";
                                    $SQL .= "WHERE (personnel_data.p_user in ('".$rbranch_array."')) and p_user <> '' ".$subSQL." ";
                                    $SQL .= "GROUP BY personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user, ";
                                    $SQL .= "personnel_data.p_job2 order by lovecount desc";
                                }

                                //工程師帳號顯示SQL語法
                                //if ( $_SESSION["MM_Username"] == "TSAIWEN216" ){ echo $SQL;}

                                $rs = $SPConn->prepare($SQL);
                                $rs->execute();
                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                if ( count($result) == 0 ){
                                    echo "<tr><td colspan='15'>未有符合條件的資料</td></tr>";
                                }else{
                                    $ii = 0;
                                    foreach($result as $re){
                                        $ii++;
                                        $lovecount = $re["lovecount"];
                                        if ( $lovecount == "" || is_null($lovecount) ){
                                            $lovecount = 0;
                                        }
                                        echo "<tr>";
                                        echo "<td>".$ii."</td>";
                                        echo "<td>".$re["p_branch"]."</td>";
                                        echo "<td>".$re["p_name"]."</td>";
                                        echo "<td>".$re["p_job2"]."</td>";
                                        echo "<td>".floor($lovecount)."</td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->
<?php require_once("./include/_bottom.php");?>