<?php
    /*****************************************/
	//檔案名稱：ad_fun_action3.php
	//後台對應位置：好好玩管理系統/好好玩國內報名->功能(切換資料版)
	//改版日期：2021.11.22
	//改版設計人員：Jack
	//改版程式人員：Jack
	/*****************************************/


    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
    if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}
    

    if( $_REQUEST["a1"] != ""){ 
        $kt1 = SqlFilter($_REQUEST["a1"],"int") . "/" . SqlFilter($_REQUEST["a2"],"int") . "/1 00:01";
        if( !chkDate($kt1) ){
            call_alert("起始日期不正確。",0,0);
        }
    }

    if($_REQUEST["b1"] != ""){
        $kt2 = SqlFilter($_REQUEST["b1"],"int"). "/" .SqlFilter($_REQUEST["b2"],"int"). "/1";
        if(chkDate($kt2)){
            $kt2 = date('Y/m/d',strtotime( $kt2.'+1 month' ));
            $kt2 = date('Y/m/d',strtotime( $kt2.'-1 day' ));
            $kt2 = $kt2 . " 23:59";
            }else{
            call_alert("起始日期不正確。",0,0);
            }
    }

    if($_REQUEST["a3"] != ""){
        $kt3 = SqlFilter($_REQUEST["a3"],"int") . "/" . SqlFilter($_REQUEST["a4"],"int") . "/1 00:01";
        if( !chkDate($kt3) ){
            call_alert("起始日期不正確。",0,0);
        }
    }
    
    if($_REQUEST["b3"] != ""){
        $kt4 = SqlFilter($_REQUEST["b3"],"int"). "/" .SqlFilter($_REQUEST["b4"],"int"). "/1";
        if(chkDate($kt4)){
            $kt4 = date('Y/m/d',strtotime( $kt4.'+1 month' ));
            $kt4 = date('Y/m/d',strtotime( $kt4.'-1 day' ));
            $kt4 = $kt4 . " 23:59";
            }else{
            call_alert("起始日期不正確。",0,0);
            }
    }

    $default_sql_num = 500; // 初始查詢數字    
    if( $_REQUEST["vst"] == "full" ){
        $sqlv = "*";
        $sqlv2 = "count(k_id)";        
    }else{
        $sqlv = "top " .$default_sql_num. " *";
        $sqlv2 = "count(k_id)";
    }

    // 權限判斷(只取全部的筆數)
    switch($_SESSION["MM_UserAuthorization"]){
        case "admin":
            $sqls2 = "SELECT ".$sqlv2." as total_size FROM love_keyin WHERE all_kind <> '國外旅遊'";
            if($_REQUEST["sear"] != "1"){
                if($_REQUEST["s99"] != ""){
                    $sqlss = $sqlss . " and all_type <> '未處理'";
	                $all_type = "已處理";
                }else{
                    $sqlss = $sqlss . " and all_type = '未處理'";
	                $all_type = "未處理";
                }
            }else{
                $all_type = "資料搜尋";
            }
            break;
        case "branch":
        case "love":
        case "pay":
            $query = $SPConn->query("SELECT * FROM personnel_data Where p_user='".$_SESSION["MM_username"]."'");
            $result = $query->fetch(PDO::FETCH_ASSOC);
	        $sqls2 = "SELECT ".$sqlv2." as total_size FROM love_keyin WHERE all_kind <> '國外旅遊' and all_branch= '".$result["p_branch"]."'";
            break;
        default:
            $sqls2 = "SELECT ".$sqlv2." as total_size FROM love_keyin Where all_kind <> '國外旅遊' and all_single = '".$_SESSION["MM_username"]."'";
            break;
    }

    if ( $_SESSION["MM_Username"] == "13085797" ){
        $sqls = "SELECT ".$sqlv." FROM love_keyin WHERE all_kind <> '國外旅遊'";
	    $sqls2 = "SELECT ".$sqlv2." as total_size FROM love_keyin WHERE all_kind <> '國外旅遊'";
        if($_REQUEST["sear"] != "1"){
            if($_REQUEST["s99"] !=""){
                $sqlss = $sqlss . " and all_type <> '未處理'";
	            $all_type = "已處理";
            }else{
                $sqlss = $sqlss . " and all_type = '未處理'";
	            $all_type = "未處理";
            }
        }else{
            $all_type = "資料搜尋";
        }
    }

    // 信箱搜尋
    if($_REQUEST["s1"] != "" ){
        $sqlss = $sqlss . " and k_yn like '%" .SqlFilter($_REQUEST["s1"],"tab")."%'";
    }
    
    // 以手機號碼搜尋
    if($_REQUEST["s2"] != "" ){
        $cs2 = reset_number(SqlFilter($_REQUEST["s2"],"int"));
        $sqlss = $sqlss . " and k_mobile like '%" .$cs2. "%'";
    }

    // 以姓名搜尋
    if($_REQUEST["s3"] != "" ){
        $sqlss = $sqlss . " and k_name like '%" .SqlFilter($_REQUEST["s3"],"tab")."%'";
    }

    // 以活動搜尋
    if($_REQUEST["s4"] != "" ){
        $sqlss = $sqlss . " and action_title like '%" .SqlFilter($_REQUEST["s4"],"tab")."%'";
    }

    // 以會館搜尋
    if($_REQUEST["s6"] != "" ){
        $sqlss = $sqlss . " and all_branch like '%" .SqlFilter($_REQUEST["s6"],"tab")."%'";
    }

    // 以秘書搜尋
    if($_REQUEST["s7"] != "" ){
        $sqlss = $sqlss . " and all_single like '%" .SqlFilter($_REQUEST["s7"],"tab")."%'";
    }

    // 以區域搜尋
    if($_REQUEST["s11"] != "" ){
        $sqlss = $sqlss . " and k_area like '%" .SqlFilter($_REQUEST["s11"],"tab")."%'";
    }

    // 以編號搜尋
    if($_REQUEST["ac"] != "" ){
        $sqlss = $sqlss . " and ac_auto like '%" .SqlFilter($_REQUEST["ac"],"int")."%'";
    }

    // 以??搜尋
    if($_REQUEST["s97"] != "" ){
        $sqlss = $sqlss . " and k_cc ='" .SqlFilter($_REQUEST["s97"],"tab")."'";
    }

    // 以時間段搜尋
    if($_REQUEST["s27"] != "" && $_REQUEST["s28"] != ""){
        $sqlss = $sqlss . " and year(k_year) between '" .SqlFilter($_REQUEST["s28"],"int")."' and '" .SqlFilter($_REQUEST["s27"],"int")."'";
    }elseif($_REQUEST["s27"] != ""){
        $sqlss = $sqlss . "and year(k_year) = '" .SqlFilter($_REQUEST["s27"],"int")."'";
    }

    // 以資料時間段搜尋
    if(chkDate($kt1) && chkDate($kt2)){        
        if(strtotime($kt1) > strtotime($kt2)){
            call_alert("結束日期不能小於起始日期。", 0, 0);
        }
        $sqlss = $sqlss . " and k_time between '".$kt1."' and '".$kt2."'";
    }

    // 以活動時間段搜尋
    if(chkDate($kt3) && chkDate($kt4)){        
        if(strtotime($kt3) > strtotime($kt4)){
            call_alert("結束日期不能小於起始日期。", 0, 0);
        }
        $sqlss = $sqlss . " and action_time between '".$kt3."' and '".$kt4."'";
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

    // 權限判斷(取資料)
    switch($_SESSION["MM_UserAuthorization"]){
        case "admin":
            $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM love_keyin WHERE all_kind <> '國外旅遊'";
            break;
        case "branch":
        case "love":
        case "pay":
            $query = $SPConn->query("SELECT * FROM personnel_data Where p_user='".$_SESSION["MM_username"]."'");
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM love_keyin WHERE all_kind <> '國外旅遊' and all_branch= '".$result["p_branch"]."'";
            break;
        default:
            $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM love_keyin Where all_kind <> '國外旅遊' and all_single = '".$_SESSION["MM_username"]."'";
            break;
    }
    // SQL
    $sqls = $sqls . $sqlss ." order by k_id desc ) t1 order by k_id) t2 order by k_id desc";

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
            <li class="active">好好玩國內活動 - 資料版</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩國內活動 - 資料版　<?php echo $all_type; ?> - 數量：<?php echo $total_sizen; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php 
                                if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_Username"] == "13085797" ){
                                    if($all_type == "未處理"){
                                        echo "<li><a href='?s99=1' target='_self'><i class='icon-resize-horizontal'></i> 切換已處理</a></li>";
                                    }
                                    if($all_type == "已處理"){
                                        echo "<li><a href='ad_fun_action1.php' target='_self'><i class='icon-resize-horizontal'></i> 切換未處理</a></li>";
                                    }
                                }                                
                            ?>
                            <li><a href="ad_fun_love_f.php?t=0"><i class="icon-tag"></i> 進階搜尋</a></li>
                        </ul>
                    </div>　


                    <form id="searchform" action="ad_fun_action3.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" class="form-control">
                            <option value="s2">手機</option>
                            <option value="s1">信箱</option>
                            <option value="s4">活動</option>
                            <option value="s3">姓名</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input class="btn btn-default" type="submit" value="送出">
                    </form>


                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>出生日</th>
                            <th>手機</th>
                            <th>身份證</th>
                            <th>學歷</th>
                            <th>吃素</th>
                            <th>e-mail</th>
                            <th>工作</th>
                            <th>職稱</th>
                            <th>公布資料</th>
                            <th>備註</th>
                            <th></th>
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
                                foreach($result as $re){ ?>
                                    <tr>
                                        <td class="center"><?php echo $re["k_name"]; ?></td>
                                        <td class="center"><?php echo $re["k_sex"]; ?></td>
                                        <td class="center"><?php echo Date_EN($re["k_year"],1); ?></td>
                                        <td class="center"><?php echo $re["k_mobile"]; ?></td>
                                        <td class="center"><?php echo $re["k_user"]; ?></td>
                                        <td class="center"><?php echo $re["k_school"]; ?></td>
                                        <td class="center"><?php echo $re["k_eat"]; ?></td>
                                        <td class="center"><?php echo $re["k_yn"]; ?></td>
                                        <td class="center"><?php echo $re["k_company"]; ?></td>
                                        <td class="center"><?php echo $re["k_company2"]; ?></td>
                                        <td class="center"><?php echo $re["k_2"]; ?></td>
                                        <td class="center"><?php echo $re["remark"]; ?></td>
                                        <td class="center">
                                            <?php
                                                if($_SESSION["MM_Username"] == "13085797" || $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch"){
                                                    echo "<a href='?vst=full&sear=1&ac=".$re["ac_auto"]."'>".$re["action_title"]."</a>";
                                                }else{
                                                    echo $re["action_title"];
                                                }                                            
                                            ?>
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


    <hr>
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    function chk_search_form() {
        if (!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
            return false;
        }
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        location.href = "ad_fun_action3.php?sear=1&vst=full&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>