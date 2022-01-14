<?php
    /*****************************************/ 
    //檔案名稱：ad_secretary.php
    //後台對應位置：管理系統/秘書資料-在職
    //改版日期：2022.1.11
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    // 永久刪除
    if($_REQUEST["st"] == "fulldel"){
        echo "<table width='300'>";
        echo "<form name='form1' method='post' action='?st=fulldel2'>";
        echo "<tr><td>請輸入管理密碼：<input type='password' name='delpd'><input type='hidden' name='p_auto' value='".SqlFilter($_REQUEST["p_auto"],"int")."'></td></tr>";
        echo "<tr><td><input type='submit' value='確定送出'></td></tr>";
        echo "</form></table>";
        exit();
    }
    // 開始刪除
    if($_REQUEST["st"] == "fulldel2"){
        if($_REQUEST["delpd"] != "springclubadmin"){
            reURL("reload_window.php?m=管理密碼錯誤");
        }
        $SQL = "delete from personnel_data WHERE p_auto=".SqlFilter($_REQUEST["p_auto"],"int");
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("reload_window.php?m=刪除秘書資料...");
        }
        exit();
    }

    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
	if($_SESSION["MM_Username"] == "" ){ 
        call_alert("請重新登入。","login.php",0);
    }
    if($_SESSION["MM_UserAuthorization"] != "admin"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    // 設為離職
    if($_REQUEST["st"] == "del"){
        $SQL = "update personnel_data set p_work=0 WHERE p_auto=".SqlFilter($_REQUEST["p_auto"],"int");
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("reload_window.php?m=關閉秘書資料...");
        }
    }

    // 恢復在職
    if($_REQUEST["st"] == "rework"){
        $SQL = "update personnel_data set p_work=1 WHERE p_auto=".SqlFilter($_REQUEST["p_auto"],"int");
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("reload_window.php?m=恢復秘書資料...");
        }
    }      
    
    if($_REQUEST["keyword"] == ""){
        if($_REQUEST["work"] == "1"){
            $sqlss = $sqlss . " and p_work = 0";
            $all_type = "離職";
            $all_type2 = "?work=1";
        }else{
            $sqlss = $sqlss . " and p_work = 1";
            $all_type = "在職";
        }
    }else{
        $all_type = "搜尋";
    }

    if($_REQUEST["branch"] != ""){
        $branch = SqlFilter($_REQUEST["branch"],"tab");
        $sqlss = $sqlss . " and p_branch like '%" .str_replace("'", "''",$branch). "%'";
    }

    if($_REQUEST["keyword"] != ""){
        $keyword = SqlFilter($_REQUEST["keyword"],"tab");
        $sqlss = $sqlss . " and (p_user like '%" .str_replace("'", "''",$keyword). "%' or p_other_name like '%" .str_replace("'", "''",SqlFilter($_REQUEST["keyword"],"tab")). "%' or p_auto like '%" .str_replace("'", "''",SqlFilter($_REQUEST["keyword"],"tab")). "%' or p_name like '%" .str_replace("'", "''",SqlFilter($_REQUEST["keyword"],"tab")). "%' or p_level = '".SqlFilter($_REQUEST["keyword"],"tab")."')";
    }

    // 總數量
    $sqls2 = "SELECT count(p_auto) as total_size FROM personnel_data Where 1=1";
    $sqls2 = $sqls2 . $sqlss;

    $rs = $SPConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if(!$result || $result["total_size"] == 0){
        $total_size = 0;
    }else{
        $total_size = $result["total_size"];
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
    // sql
    $sqls = "SELECT * FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM personnel_data WHERE 1 = 1";
    $sqls = $sqls . $sqlss . " order by p_desc2 desc ) t1 order by p_desc2) t2 order by p_desc2 desc";    
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">秘書資料 - <?php echo $all_type; ?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>秘書資料 - <?php echo $all_type; ?> - 數量：<?php echo $total_size; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <div class="btn-group pull-left">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php 
                                if($_REQUEST["work"] == "1"){ ?>
                                    <li><a href="ad_secretary.php"><i class="icon-resize-full"></i> 切換至在職區</a></li>
                                <?php }else{ ?>
                                    <li><a href="ad_secretary.php?work=1"><i class="icon-resize-full"></i> 切換至離職區</a></li>
                                <?php }
                            ?>
                            <li><a href="ad_secretary_fix.php"><i class="icon-edit"></i> 新增秘書資料</a></li>
                        </ul>
                    </div>

                    <form name="form1" method="post" action="ad_secretary.php<?php echo $all_type2; ?>" class="form-inline">
                        會館：
                        <select name="branch" id="branch" style="width:100px;" class="form-control">
                            <option value="">選擇會館</option>
                            <?php
                            //可視會館名稱                            
                            $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' Order By admin_SOrt";
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $re){ ?>
                                <option value="<?php echo $re["admin_name"];?>"<?php if($_REQUEST["branch"] == $re["admin_name"]){echo "selected"; } ?>><?php echo $re["admin_name"];?></option>
                            <?php }?>
                        </select>
                        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="身分證字號 / 姓名 / 編號">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>照片</th>
                            <th>會館</th>
                            <th>姓名</th>
                            <th>別名</th>
                            <th>帳號</th>
                            <th>密碼</th>
                            <th>職務</th>
                            <th>等級</th>
                            <th></th>
                            <th width="100">　</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $rs = $SPConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=11 height=200>目前沒有資料</td></tr>";
                            }else{
                                foreach($result as $re){
                                    if($re["p_pic"] != ""){
                                        $p_pic = "<a href='upload_image/".$re["p_pic"]."' class='fancybox'><img src='upload_image/".$re["p_pic"]."' width='100' height='100' border='0'></a>";
                                    }else{
                                        $p_pic = "無";
                                    } ?>
                                    <tr> 
                                        <td align="center"><?php echo $re["p_auto"]; ?></td>
                                        <td align="center"><?php echo $p_pic; ?></td>
                                        <td align="center">
                                            <?php 
                                                echo $re["p_branch"];
                                                if($re["p_level"] == "love" || $re["p_level"] == "love_manager"){
                                                    if($re["p_lovebranch"] != "" && strpos($re["p_lovebranch"],",") > 0){
                                                        echo "<br><b>".$re["p_lovebranch"]."</b>";
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php 
                                                echo $re["p_name"];
                                                if($_REQUEST["work"] == "1"){
                                                    $rmsg = "";
                                                    $SQL2 = "select count(mem_auto) as tt from member_data where UPPER(mem_single) = '".$re["p_user"]."' and mem_level <> 'mem'";
                                                    $rs2 = $SPConn->prepare($SQL);
                                                    $rs2->execute();
                                                    $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                                    if($result2){
                                                        $guests = $result2["tt"];
                                                    }
                                                    if(!is_null($guests) && $guests > 0){
                                                        $rmsg = $rmsg. "未入會 <a href=\"ad_no_mem.php?sear=1&s7=".$re["p_user"]."\" target='_blank'>".$guests."</a> 人";
                                                    }
                                                    $SQL2 = "select count(mem_auto) as tt from member_data where UPPER(mem_single) = '".$re["p_user"]."' and mem_level = 'mem'";
                                                    $rs2 = $SPConn->prepare($SQL);
                                                    $rs2->execute();
                                                    $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                                    if($result2){
                                                        $mems = $result2["tt"];
                                                    }
                                                    if(!is_null($mems) && $mems > 0){
                                                        $rmsg = $rmsg. "會員 <a href=\"ad_mem.php?sear=1&s7=".$re["p_user"]."\" target='_blank'>".$mems."</a> 人";
                                                    }

                                                    if($rmsg != ""){
                                                        echo "<br><font color=red>".$rmsg."</font>";
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td align="center"><?php echo $re["p_other_name"]; ?></td>
                                        <td align="center"><?php echo $re["p_user"]; ?></td>
                                        <td align="center"><?php echo $re["b_year"]; ?></td>
                                        <td align="center"><?php echo $re["p_job2"]; ?></td>
                                        <td align="center"><?php echo joblv($re["p_level"],$re["action_level"]); ?></td>
                                        <td align="center">
                                            <?php 
                                                if($re["p_work"] == 1){
                                                    echo "在職";
                                                }else{
                                                    echo "離職";
                                                }
                                            ?>                                            
                                        </td>
                                        <td align="center">
                                            <div class="btn-group">
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="ad_secretary_photo.php?p_auto=<?php echo $re["p_auto"]; ?>"><i class="icon-camera"></i> 照片</a></li>
                                                    <?php 
                                                        if($_SESSION["MM_UserAuthorization"] == "admin"){
                                                            if($_REQUEST["work"] == "1"){ ?>
                                                                <li><a href="javascript:Mars_popup('ad_secretary.php?st=rework&p_auto=<?php echo $re["p_auto"]; ?>','','width=300,height=200,top=100,left=100')"><i class="icon-share-alt"></i> 恢復</a></li>
                                                            <?php }else{ ?>
                                                                <li><a href="ad_secretary_fix.php?p_auto=<?php echo $re["p_auto"]; ?>"><i class="icon-edit"></i> 修改</a></li>
                                                                <li><a href="javascript:Mars_popup2('ad_secretary.php?st=del&p_auto=<?php echo $re["p_auto"]; ?>','','width=300,height=200,top=100,left=100')"><i class="icon-ban-circle"></i> 關閉</a></li>
                                                                <li><a href="javascript:Mars_popup2('ad_secretary.php?st=fulldel&p_auto=<?php echo $re["p_auto"]; ?>','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 永久刪除</a></li>
                                                            <?php }
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>                                    
                                <?php }
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
require_once("./include/_bottom.php")
?>