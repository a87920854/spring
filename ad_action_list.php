<?php
    /*****************************************/
    //檔案名稱：ad_action_list.php
    //後台對應位置：管理系統/網站活動上傳
    //改版日期：2022.2.8
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/
    require_once("_inc.php");
    require_once("./include/_function.php");
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

    // 刪除 (刪除圖檔待測試)
    if($_REQUEST["st"] == "del"){
        $ac_auto = SqlFilter($_REQUEST["ac_auto"],"int");
        $SQL = "select ac_pic, ac_pic2, ac_pic3, ac_pic4, ac_pic5 FROM action_data WHERE ac_auto=".$ac_auto."";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            if($result["ac_pic2"] != ""){
                DelFile(("upload_image/".$result["ac_pic2"]));
            }
            if($result["ac_pic3"] != ""){
                DelFile(("upload_image/".$result["ac_pic3"]));
            }
            if($result["ac_pic4"] != ""){
                DelFile(("upload_image/".$result["ac_pic4"]));
            }
            if($result["ac_pic5"] != ""){
                DelFile(("upload_image/".$result["ac_pic5"]));
            }
            if($result["ac_pic"] != "a"){
                $SQL = "select * from action_photo where ac_auto=".$ac_auto."";
                $rs = $SPConn->prepare($SQL);
                $rs->execute();
                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                if($result){
                    foreach($result as $re){
                        DelFile(("upload_image/".$re["ac_photo_name"]));
                    }
                }
            }
            // 刪除資料
            $SQL = "DELETE FROM action_photo WHERE ac_auto=".$ac_auto."";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $SQL = "DELETE FROM action_data WHERE ac_auto=".$ac_auto."";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();            
        }
        // 刪除system_sign
        $SQL = "DELETE FROM system_sign WHERE types='活動異動單' and num='".$ac_auto."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        reURL("reload_window.php?m=資料刪除中...");
    }

    //起始日期
    if($_REQUEST["start_time"] != ""){
        $start_time = SqlFilter($_REQUEST["start_time"],"tab") . " 00:00";
        $start_time2 = SqlFilter($_REQUEST["start_time"],"tab");
        if(!chkDate($start_time)){
            call_alert("活動日期有誤。", 0, 0);
        }
    }
    //結束日期
    if($_REQUEST["end_time"] != ""){
        $end_time = SqlFilter($_REQUEST["end_time"],"tab") . " 23:59";
        $end_time2 = SqlFilter($_REQUEST["end_time"],"tab");
        if(!chkDate($start_time)){
            call_alert("活動日期有誤。", 0, 0);
        }
    }

    $default_sql_num = 200;
    if($_REQUEST["vst"] == "full"){
        $sqlv = "*";
        $sqlv2 = "count(ac_auto)";
    }else{
        $sqlv = "top ".$default_sql_num." *";
        $sqlv2 = "count(ac_auto)";
    }

    switch($_SESSION["MM_UserAuthorization"]){
        case "admin":            
            $sqls2 = "SELECT ".$sqlv2."  as total_size FROM action_data Where 1=1";
            break;
        case "count":            
            $sqls2 = "SELECT ".$sqlv2."  as total_size FROM action_data Where ac_branch='八德'";
            break;
        default:            
            $sqls2 = "SELECT ".$sqlv2."  as total_size FROM action_data Where 1=1";
            if($_SESSION["MM_Username"] == "V221540975"){                
                $sqls2 = "SELECT ".$sqlv2."  as total_size FROM action_data Where (ac_run2='".$_SESSION["MM_Username"]."')";
            }
    }

    if(chkDate($start_time) && chkDate($end_time)){
        $sqlss = $sqlss . " and ac_time between '".$start_time."' and '".$end_time."'";
    }

    if($_REQUEST["s6"] != ""){
        $sqlss = $sqlss . " and ac_branch = '" . str_replace("'", "''",SqlFilter($_REQUEST["s6"],"tab")) . "'";
    }

    if($_REQUEST["keyword"] != ""){
        $sqlss = $sqlss . " and (ac_title like '%".SqlFilter($_REQUEST["keyword"],"tab")."%' or ac_note like '%".SqlFilter($_REQUEST["keyword"],"tab")."%' or ac_auto like '%".SqlFilter($_REQUEST["keyword"],"tab")."%')";
    }

    //計算總筆數
    $sqls2 = $sqls2 . $sqlss;
    $rs = $SPConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);                    
    if($result){
        $total_size =  $result["total_size"];
        if($_REQUEST["vst"] == "full"){            
            $total_sizen = $total_size . "　<a href='?vst=n'>[查看前兩百筆]</a>";
        }else{            
            if($total_size > 200){
                $total_size = 200;
            }
            $total_sizen = $total_size . "　<a href='?vst=full'>[查看完整清單]</a>";
        }  
    }else{
        $total_size = 0;
    }

    $tPage = 1; //目前頁數
    $tPageSize = 20; //每頁幾筆
    if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
    $tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
    if ( $tPageSize*$tPage < $total_size ){
        $page2 = 20;
    }else{
        $page2 = (20-(($tPageSize*$tPage)-$total_size));
    }
    
    switch($_SESSION["MM_UserAuthorization"]){
        case "admin":
            $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM action_data Where 1=1";            
            break;
        case "count":
            $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM action_data Where ac_branch='八德'";            
            break;
        default:
            $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM action_data Where 1=1";            
            if($_SESSION["MM_Username"] == "V221540975"){
                $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM action_data Where (ac_run2='".$_SESSION["MM_Username"]."')";                
            }
    }
    // SQL
    $sqls = $sqls . $sqlss . " order by ac_auto desc ) t1 order by ac_auto ) t2 order by ac_auto desc"; 

    
    
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">網站活動上傳</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>網站活動上傳 - 數量：<?php echo $total_sizen; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p><a href="ad_action_add.php" class="btn btn-info">新增活動</a></p>
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>
                            <input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="<?php echo $start_time2; ?>" placeholder="活動日期開始">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="<?php echo $end_time2; ?>" placeholder="活動日期結束">
                            <select name="s6" id="s6" class="form-control">
                                <option value="">請選擇會館</option>
                                <?php
                                    $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' Order By admin_SOrt";
                                    $rs = $SPConn->prepare($SQL);
                                    $rs->execute();
                                    $result=$rs->fetchAll(PDO::FETCH_ASSOC);                                
                                    foreach($result as $re){
                                        if($_REQUEST["s6"] == $re["admin_name"]){
                                            echo "<option value='".$re["admin_name"]."' selected>".$re["admin_name"]."</option>";     
                                        }else{
                                            echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";     
                                        }
                                                                 
                                    }                                           
                                ?>
                            </select>
                            <input type="text" name="keyword" class="form-control" placeholder="標題/編號/內容關鍵字">
                            <input type="submit" name="Submit" class="btn btn-default" value="送出">
                        </p>
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th></th>
                            <th width=160 align="center">活動時間</th>
                            <th width=80 align="center">會館</th>
                            <th width=140 align="center">活動類型</th>
                            <th width=90 align="center">活動地點</th>
                            <th width=300 align="center">活動標題</th>
                            <th></th>
                            <th width=60 align="center">花絮</th>
                            <th width=80 align="center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $rs = $SPConn->prepare($sqls);
                            $rs->execute();
                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                            if($result){
                                foreach($result as $re){
                                    if($re["ac_pic2"] != ""){
                                        $ac_pic2 = "<a href='upload_image/".$re["ac_pic2"]."' class='fancybox'><img src='upload_image/".$re["ac_pic2"]."' border=0 width=90 height=60></a>";
                                    }else{
                                        $ac_pic2 = "無";
                                    }
                                    if($re["ac_stat"] == 1){
                                        $ac_stat = "<br><font color=red size=2>活動取消(".Date_EN($re["ac_stat_time"],9).")</font>";
                                    }elseif($re["ac_stat"] == 2){
                                        $ac_stat = "<br><font color=blue size=2>活動新增(".Date_EN($re["ac_stat_time"],9).")</font>";
                                    }else{
                                        $ac_stat = "";
                                    } 
                                    ?>
                                    <tr> 
                                        <td align="center"><?php echo $re["ac_auto"]; ?></td>  	
                                        <td class="center"><?php echo $ac_pic2; ?></td>
                                        <td class="center"><?php echo Date_EN($re["ac_time"],9).$ac_stat; ?></td>
                                        <td align="center"><?php echo $re["ac_branch"]; ?></td>
                                        <td class="center" style="font-size:12px;"><?php echo $re["ac_kind3"]; ?><br><?php echo $re["ac_kind"]; ?>-<?php echo $re["ac_kind2"]; ?></td>
                                        <td class="center"><?php echo $re["ac_area"]; ?></td>
                                        <td class="center"><?php echo $re["ac_title"]; ?></td>
                                        <td class="center" style="font-size:12px;">
                                            <font color="blue">
                                                來源：<?php echo $re["ac_come"]; ?>/開發者：<?php echo $re["ac_open1"]; ?><?php echo SingleName($re["ac_open2"],"normal"); ?>/執行者：<?php echo $re["ac_run1"]; ?><?php echo SingleName($re["ac_run2"],"normal"); ?>
                                                <?php
                                                    if($re["ac_teacher_auton"] != ""){
                                                        echo "<br>講師：".$re["ac_teacher_name"]."";
                                                    }
                                                ?>
                                            </font>
                                            <?php
                                                $bsize = 0;
                                                $bsize2 = 0;
                                                $gsize =0;
                                                $gsize2 = 0;
                                                $tsize = 0;
                                                $SQL = "SELECT k_sex, isbe FROM love_keyin WHERE all_kind='活動' and action_auto = " . $re["ac_auto"];
                                                $rs = $SPConn->prepare($SQL);
                                                $rs->execute();
                                                $result2=$rs->fetchAll(PDO::FETCH_ASSOC);
                                                if($result2){
                                                    foreach($result2 as $re2){
                                                        if($re2["k_sex"] == "男"){
                                                            if($re2["isbe"] == 0){
                                                                $bsize2 = $bsize2 + 1;
                                                            }else{
                                                                $bsize = $bsize +1;
                                                            }
                                                        }else{
                                                            if($re2["isbe"] == 0){
                                                                $gsize2 = $gsize2 + 1;
                                                            }else{
                                                                $gsize = $gsize+1;
                                                            }
                                                        }
                                                    }
                                                    $tsize = $gsize+$gsize2+$bsize+$bsize2;
                                                }
                                            ?>
                                            <br><br><a href="ad_action_list2_view.php?id=<?php echo $re["ac_auto"]; ?>">男：正取 <?php echo $bsize; ?>/備取 <?php echo $bsize2; ?> 人、女：正取 <?php echo $gsize; ?>/備取 <?php echo $gsize2; ?> 人、共：<?php echo $tsize; ?> 人</a>
                                        </td>
                                        <td align="center">
                                            <?php
                                                if($re["ac_pic"] != "a"){
                                                    echo "<a href='ad_action_pic.php?ac_auto=".$re["ac_auto"]."' target='_blank'>有</a>";
                                                }else{
                                                    echo "無";
                                                }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <div class="btn-group">
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">								
                                                    <li><a href="ad_action_list2_view.php?id=<?php echo $re["ac_auto"]; ?>"><i class="icon-file"></i> 報名資料</a></li>
                                                    <?php 
                                                        if($re["ac_branch"] == $_SESSION["branch"] || $_SESSION["MM_UserAuthorization"] == "admin"){ ?>
                                                            <li><a href="ad_action_pic.php?ac_auto=<?php echo $re["ac_auto"]; ?>" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                                            <li><a href="ad_action_add.php?ac_auto=<?php echo $re["ac_auto"]; ?>"><i class="icon-edit"></i> 修改</a></li>
                                                            <li><a href="ad_action_list_sign.php?ac_auto=<?php echo $re["ac_auto"]; ?>"><i class="icon-edit"></i> 活動異動單</a></li>
                                                        <?php }
                                                        if($_SESSION["MM_UserAuthorization"] == "admin" || ((strtotime("now")-strtotime($re["ac_auto_time"]) / (60*60*24)) <= 3 && $re["ac_branch"] == $_SESSION["branch"]) ){ ?>
                                                            <li><a href="javascript:Mars_popup2('ad_action_list.php?st=del&ac_auto=<?php echo $re["ac_auto"]; ?>','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                                        <?php }
                                                    ?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            }else{
                                echo "<tr><td colspan=10 height=200>目前沒有資料</td></tr>";
                            }
                        ?>
                    </tbody>
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