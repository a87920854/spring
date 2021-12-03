<?php
    /*****************************************/
    //檔案名稱：ad_fun_action_list1.php
    //後台對應位置：好好玩管理系統/好好玩國內團控
    //改版日期：2021.12.1
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

    $default_sql_num = 500; // 初始查詢數字    
    if( $_REQUEST["vst"] == "full" ){
        $sqlv = "*";
        $sqlv2 = "count(ac_auto)";        
    }else{
        $sqlv = "top " .$default_sql_num. " *";
        $sqlv2 = "count(ac_auto)";
    }

    // 只取全部的筆數
    $sqls2 = "SELECT ".$sqlv2." as total_size FROM action_data WHERE  1=1";


    // 活動類型搜尋
    if($_REQUEST["s1"] != "" ){
        $sqlss = $sqlss . " and ac_kind = '" .SqlFilter($_REQUEST["s1"],"tab")."'";
    }    

    // 活動標題搜尋
    if($_REQUEST["s3"] != "" ){
        $sqlss = $sqlss . " and ac_title like '%" .SqlFilter($_REQUEST["s3"],"tab")."%'";
    }

    // 開發者搜尋
    if($_REQUEST["s5"] != "" ){
        $sqlss = $sqlss . " and ac_open2 = '" .SqlFilter($_REQUEST["s5"],"tab")."'";
    }


    if( $_REQUEST["s21"] != "" && $_REQUEST["s22"] != "" ){
        if( chkDate($_REQUEST["s21"]) && chkDate($_REQUEST["s22"]) ){
            $kt1 = SqlFilter($_REQUEST["s21"],"tab"). " 00:00";
            $kt2 = SqlFilter($_REQUEST["s22"],"tab"). " 23:59"; 
        }        
    }

    // 以活動時間段搜尋
    if(chkDate($kt1) && chkDate($kt2)){        
        if(strtotime($kt1) > strtotime($kt2)){
            call_alert("結束日期不能小於起始日期。", 0, 0);
        }
        $sqlss = $sqlss . " and ac_time between '".$kt1."' and '".$kt2."'";
    }

    // 特殊使用者搜尋
    if(strtoupper($_SESSION["MM_Username"]) == "V221540975"){
        $sqlss = $sqlss . " and ac_run2 = '".$_SESSION["MM_Username"]."'";
    }

    // 總筆數SQL
    $sqls2 = $sqls2 . $sqlss;
    // 查詢總筆數
    $rs = $FunConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if (!$result){
        $total_size = 0;
    }else{
        if( $_REQUEST["vst"] == "full" ){
            $total_size = $result["total_size"]; //總筆數
        }else{
            if($result["total_size"] > 500 ) {
                $total_size =  500;
            }else{
                $total_size =  $result["total_size"];
            }  
        }
    }

    $tPage = 1; //目前頁數
    $tPageSize = 50; //每頁幾筆
	if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
	$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
	if ( $tPageSize*$tPage < $total_size ){
		$page2 = 50;
	}else{
		$page2 = (50-(($tPageSize*$tPage)-$total_size));
	}

    // SQL
    $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM action_data WHERE 1=1";
    $sqls = $sqls . $sqlss ." order by ac_time desc ) t1 order by ac_time) t2 order by ac_time desc";

    if($_REQUEST["vst"] == "full"){
        $total_sizen = $total_size . "　<a href='?vst=n&s99=".$_REQUEST["s99"]."'>[查看前五百筆]</a>";
    }else{
        if( $total_size > 500 ) $total_size = 500;
        $total_sizen = $total_size . "　<a href='?vst=full&s99=".$_REQUEST["s99"]."'>[查看完整清單]</a>";
    }
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">好好玩國內團控</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩國內團控 - 數量：<?php echo $total_sizen; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <a href="ad_fun_action_list1_add.php" class="btn btn-info margin-bottom-10"><i class="icon-plus-sign"></i> 新增國內活動</a>
                    <a href="ad_fun_action_list1_print.php?acre_sign1=&acre_sign2=" class="btn btn-info margin-bottom-10"><i class="icon-plus-sign"></i> 列印本頁</a>


                    <form id="searchform" action="ad_fun_action_list1.php?vst=full" method="post" target="_self" class="form-inline" onsubmit="return check_send_submit()">
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <tr>
                                <td><select name="s1">
                                        <option value="">活動類型</option>
                                        <option value="戶外活動">戶外活動</option>
                                        <option value="主題派對">主題派對</option>
                                        <option value="午茶聯誼">午茶聯誼</option>
                                        <option value="特別企劃">特別企劃</option>
                                    </select>
                                    &nbsp;&nbsp;
                                    <select name="s5">
                                        <option value="">開發者</option>
                                        <?php 
                                            $SQL = "select distinct ac_open2 from action_data where ac_open2 <> ''";
                                            $rs = $FunConn->prepare($SQL);
                                            $rs->execute();
                                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                            if($result){
                                                foreach($result as $re){
                                                    echo "<option value='".$re["ac_open2"]."'>".SingleName($re["ac_open2"],"normal")."</option>";
                                                }                                                
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td>活動時間：<input name="s21" id="s21" type="text" class="datepicker" autocomplete="off">～<input name="s22" id="s22" type="text" class="datepicker" autocomplete="off"></td>
                                <td>活動標題：<input name="s3" type="text" class="form-control"></td>
                                <td><input type="submit" value="搜尋" class="btn btn-default"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th width=180>活動時間</th>
                            <th width=70>活動類型</th>
                            <th width=70>活動地點</th>
                            <th width=300>活動標題</th>
                            <th></th>
                            <th width=40>花絮</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $rs = $FunConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=8 height=200>目前沒有資料</td></tr>";
                            }else{
                                foreach($result as $re){
                                    $sql = "select count(ac_photo_auto) as tt from action_photo where ac_auto = ".$re["ac_auto"];
                                    $rs2 = $FunConn->query($sql);
                                    $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                    if($result2){
                                        $ac_photo_size = $result2["tt"];
                                    }
                                    if($re["ac_pic"] != ""){
                                        $ac_pic =  "<a href='webfile/funtour/upload_image/".$re["ac_pic"]."' class='fancybox'><img src='webfile/funtour/upload_image/".$re["ac_pic"]."' border=0 width=90 height=60></a>";
                                    }
                                ?>
                                    <tr>
                                        <td class="center"><?php echo $re["ac_auto"]; ?></td>
                                        <td class="center"><?php echo $ac_pic ?></td>
                                        <td class="center"><?php echo changeDate($re["ac_time"]); ?></td>
                                        <td class="center"><?php echo $re["ac_kind"]; ?></td>
                                        <td class="center"><?php echo $re["ac_area"]; ?></td>
                                        <td class="center"><?php echo $re["ac_title"]; ?></td>
                                        <td class="center">
                                            <font color="blue">
                                                來源：<?php echo $re["ac_come"]; ?>　開發者：<?php echo $re["ac_open1"]; ?><?php echo SingleName($re["ac_open2"],"normal"); ?>　執行者：<?php echo $re["ac_run1"]; ?><?php echo SingleName($re["ac_run2"],"normal"); ?>
                                            </font>                                            
                                            <?php 
                                                $bsize  = 0;
                                                $bsize2 = 0;
                                                $gsize  = 0;
                                                $gsize2 = 0;
                                                $tsize  = 0;
                                                $sql = "SELECT k_sex, k_be FROM love_keyin WHERE all_kind <> '國外旅遊' and ac_auto = ".$re["ac_auto"];
                                                $rs2 = $FunConn->query($sql);
                                                $result2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
                                                if($result2){
                                                    foreach($result2 as $re2){                                                    
                                                        if($re2["k_sex"] == "男"){
                                                            if($re2["k_sex"] == 1){
                                                                $bsize2 = $bsize2 + 1;
                                                            }else{
                                                                $bsize = $bsize + 1;
                                                            }
                                                        }else{
                                                            if($re2["k_be"] == 1){
                                                                $gsize2 = $gsize2 + 1;
                                                            }else{
                                                                $gsize = $gsize + 1;
                                                            }
                                                        }
                                                    }
                                                    $tsize = $gsize + $gsize2 + $bsize + $bsize2;
                                                }
                                            ?>
                                            <br><br>
                                            <a href="ad_fun_action_list_singup1.php?ac=<?php echo $re["ac_auto"]; ?>">男：正取 <?php echo $bsize; ?>/備取 <?php echo $bsize2; ?> 人、女：正取 <?php echo $gsize; ?>/備取 <?php echo $gsize2; ?> 人、共：<?php echo $tsize; ?> 人</a>
                                        </td>
                                        <td class="center">
                                            <?php 
                                                if($ac_photo_size > 0){
                                                    echo "<a href='ad_fun_action_pic.asp?ac_auto=".$re["ac_auto"]."' target='_blank'>有</a>";
                                                }else{
                                                    echo "無";
                                                }
                                            ?>
                                        </td>
                                        <td class="center">
                                            <div class="btn-group">
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="http://funtour.com.tw/eventdetail.asp?id=<?php echo $re["ac_auto"]; ?>" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                                    <li><a href="ad_fun_action_list_singup1.php?ac=<?php echo $re["ac_auto"]; ?>"><i class="icon-file"></i> 報名資料</a></li>
                                                    <?php 
                                                        if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["funtourall1"] == "1" || strtoupper($_SESSION["MM_Username"]) == "V221540975"){ ?>
                                                            <li><a href="ad_fun_action_pic.php?ac_auto=<?php echo $re["ac_auto"]; ?>" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                                            <li><a href="ad_fun_action_list1_add.php?ac=<?php echo $re["ac_auto"]; ?>"><i class="icon-edit"></i> 修改</a></li>
                                                        <?php }
                                                        if($_SESSION["MM_UserAuthorization"] == "admin"){ ?>
                                                            <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=<?php echo $re["ac_auto"]; ?>','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                                        <?php }
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
    $(function() {

    });

    function check_send_submit() {
        if (($("#s21").val() && !$("#s22").val()) || ($("#s22").val() && !$("#s21").val())) {
            alert("請正確選擇活動時間的兩個區間時間。");
            return false;
        }
        if ($("#s21").val() && $("#s22").val()) {
            if ($("#s21").val() > $("#s22").val()) {
                alert("起始活動時間不可以比結束活動時間大。");
                return false;
            }
        }

        return true;
    }
</script>