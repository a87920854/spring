<?php
    /*****************************************/
    //檔案名稱：ad_fun_action_list_singup2.php
    //後台對應位置：好好玩管理系統/同業報名單管>報名詳細資料
    //改版日期：2021.12.22
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

    $ac_auto = SqlFilter($_REQUEST["ac"],"int");
    $dates = SqlFilter($_REQUEST["da"],"tab");

    // 更新
    if($_REQUEST["st"] == "uppaynum"){
        if($_REQUEST["k_pay_check"] == "1"){
            $k_pay_check = 1;
        }else{
            $k_pay_check = 0;
        }
        $SQL = "update love_keyin set k_pay_num='".SqlFilter($_REQUEST["k_pay_num"],"tab")."', k_pay_check='".$k_pay_check."' Where k_id = '".SqlFilter($_REQUEST["id"],"int")."'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            $url = "ad_fun_action_list_singup2.php?topage=".SqlFilter($_REQUEST["topage"],"tab")."&ac=".SqlFilter($_REQUEST["ac"],"int")."&da=".SqlFilter($_REQUEST["da"],"tab");
            reURL($url);
        }
    }

    // 刪除
    if($_REQUEST["st"] == "del"){
        $SQL = "DELETE FROM love_keyin WHERE all_kind='國外旅遊' and k_id = '".SqlFilter($_REQUEST["id"],"int")."'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=刪除中...");
        }
    }

    // 更新2
    if($_REQUEST["st"] == "k_be"){
        $SQL = "UPDATE love_keyin SET k_be = '".SqlFilter($_REQUEST["v"],"tab")."' WHERE all_kind='國外旅遊' and k_id = '".SqlFilter($_REQUEST["id"],"int")."'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=變更中...");
        }
    }

    $SQL = "select ac_title from actionf_data where ac_auto=".$ac_auto;
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $ac_title = $result["ac_title"];
    }    

    if($_REQUEST["s1"] != ""){
        $sqlss = $sqlss . " and k_name like '%".SqlFilter($_REQUEST["s1"],"tab")."%'";
    }

    if($_REQUEST["s2"] != ""){
        $cs2 = reset_number(SqlFilter($_REQUEST["s2"],"tab"));
        $sqlss = $sqlss . " and k_mobile like '%".$cs2."%'";
    }    
    
    // 總數量
    $sqls2 =  "SELECT sum(sizes) as totals FROM love_keyin WHERE all_kind='國外旅遊' and datediff(d, action_time, '".$dates."') = 0 and ac_auto = " . $ac_auto . $sqlss;
    $rs = $FunConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if (!$result){
        $total_size = 0;
    }else{
        $total_size =  $result["totals"];
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

    // Sql
    $sqls = "SELECT * FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM love_keyin WHERE all_kind='國外旅遊' and ac_auto = " .$ac_auto." and datediff(d, action_time, '".$dates."') = 0";
    $sqls = $sqls . $sqlss ." order by k_sex, k_time desc ) t1 order by k_sex, k_time) t2 order by k_sex, k_time desc";
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action_list2_date.php?ac=<?php echo $ac_auto; ?>"><?php echo $ac_title; ?></a></li>
            <li class="active">報名詳細資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo Date_EN($dates,1); ?> - <?php echo $ac_title; ?> - 報名詳細資料 - 數量：<?php echo $total_size; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">

                    <a href="ad_fun_action_list_padd.php?a=b&ac=1902&da=2015/3/13" class="btn btn-info">新增本活動報名資料</a>

                    <form id="searchform" action="ad_fun_action_list_singup2.php?ac=1902&da=2015/3/13" method="post" target="_self" class="form-inline" onsubmit="return check_send_submit()">
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <td>姓名：<input name="s1" type="text" class="form-control"></td>
                            <td>手機：<input name="s2" type="text" class="form-control"></td>
                            <td><input type="submit" value="搜尋" class="btn btn-default"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <?php 
                    $gsize = 0;
                    $gsize2 = 0;
                    $bsize =0;
                    $bsize2 =0;
                    $SQL = "SELECT sum(sizes) as totals FROM love_keyin WHERE all_kind='國外旅遊' and k_sex='女' and k_be = 0 and datediff(d, action_time, '".$dates."') = 0 and ac_auto = " . $ac_auto . $sqlss;
                    $rs = $FunConn->prepare($SQL);
                    $rs->execute();
                    $result = $rs->fetch();
                    if($result){
                        $gsize = $result["totals"];
                    }

                    $SQL = "SELECT sum(sizes) as totals FROM love_keyin WHERE all_kind='國外旅遊' and k_sex='女' and k_be = 1 and datediff(d, action_time, '".$dates."') = 0 and ac_auto = " . $ac_auto . $sqlss;
                    $rs = $FunConn->prepare($SQL);
                    $rs->execute();
                    $result = $rs->fetch();
                    if($result){
                        $gsize2 = $result["totals"];
                    }

                    $SQL = "SELECT sum(sizes) as totals FROM love_keyin WHERE all_kind='國外旅遊' and k_sex='男' and k_be = 0 and datediff(d, action_time, '".$dates."') = 0 and ac_auto = " . $ac_auto . $sqlss;
                    $rs = $FunConn->prepare($SQL);
                    $rs->execute();
                    $result = $rs->fetch();
                    if($result){
                        $bsize = $result["totals"];
                    }

                    $SQL = "SELECT sum(sizes) as totals FROM love_keyin WHERE all_kind='國外旅遊' and k_sex='男' and k_be = 1 and datediff(d, action_time, '".$dates."') = 0 and ac_auto = " . $ac_auto . $sqlss;
                    $rs = $FunConn->prepare($SQL);
                    $rs->execute();
                    $result = $rs->fetch();
                    if($result){
                        $bsize2 = $result["totals"];
                    }
                ?>
                <p><b>男：正取 <?php echo $bsize; ?>/備取 <?php echo $bsize2; ?>人、女：正取 <?php echo $gsize; ?>/備取 <?php echo $gsize2; ?>人、共：<?php echo $total_size; ?> 人　(備取人員將不會出現在列印資料中)</b></p>

                <p><a class="btn btn-success" href="javascript:Mars_popup('ad_fun_action_list_singup2_print.php?ac=<?php echo $ac_auto; ?>&da=<?php echo Date_EN($dates,1); ?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i>要保明細表</a>
                    <a class="btn btn-success" href="javascript:Mars_popup('ad_fun_action_list_singup2_print2.php?ac=<?php echo $ac_auto; ?>&da=<?php echo Date_EN($dates,1); ?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i>開票名單</a>
                    <a class="btn btn-success" href="javascript:Mars_popup('ad_fun_action_list_singup2_print3.php?ac=<?php echo $ac_auto; ?>&da=<?php echo Date_EN($dates,1); ?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i>總表</a>
                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=30>來源</th>
                            <th width=30>人數</th>
                            <th width=30>狀態</th>
                            <th width=80>出發日期</th>
                            <th width=80>身分證字號</th>
                            <th width=160>姓名</th>
                            <th width=60>性別</th>
                            <th width=80>生日</th>
                            <th width=80>學歷</th>
                            <th width=120>手機</th>
                            <th width=60>正備取</th>
                            <th>處理人員</th>
                            <th>訂金<br>尾款</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $rs = $FunConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=11 height=200>目前沒有資料</td></tr>";
                            }else{
                                foreach($result as $re){
                                    if($re["b2b"] == 1){
                                        $ccome = "同業";
                                    }else{
                                        $ccome="一般";
                                    }
                                    $gc = "";
					                $gcc = "";
                                    $SQL2 = "select mem_num from goldcard_data where mem_username = '".strtoupper($re["k_user"])."'";
                                    $rs2 = $FunConn->prepare($SQL2);
                                    $rs2->execute();
                                    $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                    if($result2){
                                        $gc = "金卡";
                                        $mem_num = $result2["mem_num"];
                                    }

                                    if($re["k_be"] == 1){
                                        $k_be = "備取";
					                    $k_bev = 0;
                                    }else{
                                        $k_be = "正取";
					                    $k_bev = 1;
                                    }

                                    if($gc == "金卡"){
                                        $totalp = 0;
                                        $SQL2 = "select sum(totalp) as totalp from goldcard_point where mem_num='".$mem_num."'";
                                        $rs2 = $FunConn->prepare($SQL2);
                                        $rs2->execute();
                                        $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                        if($result2){
                                            $totalp = $result2["totalp"];
                                        }
                                    }

                                    if($totalp == "" || is_null($totalp)){
                                        $totalp = 0;
                                    }
                                    $SQL2 = "select count(log_auto) as r from log_data where log_num=".$re["k_id"]." and log_5='lovekeyin'";
                                    $rs2 = $FunConn->prepare($SQL2);
                                    $rs2->execute();
                                    $result2 = $rs2->fetch();
                                    if(!$result2 || $result2["r"] == 0){
                                        $report = 0;
                                    }else{
                                        $report = $result2["r"];
                                    }

                                    $k_sex = $re["k_sex"];
                                    if(strtoupper($re["all_single"]) == strtoupper($_SESSION["MM_Username"]) || $_SESSION["funtourall2"] == "1" || $_SESSION["MM_UserAuthorization"] == "admin"){
                                        $k_user = $re["k_user"];
                                        if($k_sex == "男"){
                                            $gco = "blue";
                                        }else{
                                            $gco = "red";
                                        }
                                        $k_name = "<a href=\"javascript:Mars_popup('ad_fun_detail.php?k_id=".$re["k_id"]."','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');\"><font color='".$gco."'>".$re["k_name"]." ".$re["ename"]."</font></a>";
                                        if($gc != ""){
                                            $gcc = "<br><a href=\"javascript:Mars_popup('ad_fun_goldcard_point.php?mem_num=".$mem_num."&n=".$re["k_name"]."','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');\">".$gc." ".$totalp." 點</a>";
                                        }
                                        $k_year = $re["k_year"];
                                        $k_mobile = $re["k_mobile"];
                                        $k_money = $re["k_money"];
                                        $k_company = $re["k_company"];
                                        $bb = "<a href='#' onClick=\"Mars_popup('ad_fun_action_list_singup2.php?st=k_be&v=".$k_bev."&id=".$re["k_id"]."','','width=300,height=200,top=100,left=100')\">變</a>";
                                        $fun1 = "<li><a href=\"javascript:Mars_popup('ad_fun_detail.php?k_id=".$re["k_id"]."','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');\"><i class='icon-file'></i> 詳細</a></li>";
                                        $fun2 = "<li><a href=\"ad_fun_action_list_padd.php?a=b&id=".$re["k_id"]."&ac=".SqlFilter($_REQUEST["ac"],"int")."&da=".Date_EN($dates,1)."\"><i class='icon-edit'></i> 修改</a></li>";
                                        $fun3 = "<li><a href=\"javascript:Mars_popup('ad_fun_report.php?k_id=".$re["k_id"]."&ty=lovekeyin','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');\"><i class='icon-list-alt'></i> 回報(".$report.")</a></li>";
                                        $fun4 = "<li><a href='#' onClick=\"Mars_popup('ad_fun_action_list_singup2_change.php?id=".$re["k_id"]."&ac=".$re["ac_auto"]."','change_win','width=450,height=300,top=400,left=400')\"><i class='icon-refresh'></i> 轉日/轉團</a></li>";
                                        if($re["k_pay_num"] == "1"){
                                            $k_pay_check1 = " checked";
                                        }else{
                                            $k_pay_check1 = "";
                                        }
                                        if($re["k_pay_check"] == 1){
                                            $k_pay_check2 = " checked";
                                        }else{
                                            $k_pay_check2 = "";
                                        }
                                        $k_pay_num = "<form style='border:0px;margin:0px;padding:0px;' id='searchform2' action=\"ad_fun_action_list_singup2.php?topage=".SqlFilter($_REQUEST["topage"],"tab")."&ac=".SqlFilter($_REQUEST["ac"],"int")."&da=".Date_EN($dates,1)."&id=".$re["k_id"]."&st=uppaynum\" method='post' target='_self'><input type='checkbox' name='k_pay_num' value='1' data-no-uniform='true'".$k_pay_check1." onclick=\"$(this).parent().submit()\"> 訂金<br><input type='checkbox' name='k_pay_check' value='1' data-no-uniform='true'".$k_pay_check2." onclick=\"$(this).parent().submit()\"> 尾款 <input type='submit' style='display:none'></form>";
                                        if($re["k_come2"] != ""){
                                            $k_come2 = "<br>優惠序號：".$re["k_come2"];
                                        }else{
                                            $k_come2 = "";
                                        }
                                    }else{
                                        $k_user = substr($re["k_user"],0,1) . "*********";
				                        $k_name = substr($re["k_name"],0,1) . "ＯＯ";
                                        if($gc != ""){
                                            $gcc = $gc . " ".$totalp." 點";
                                        }else{
                                            $gcc = "";
                                        }

                                        if(chkDate($re["k_year"])){
                                            $k_year = date("Y",strtotime($re["k_year"]))."/**/**";
                                        }else{
                                            $k_year = "無資料";
                                        }
                                        $k_mobile = substr($re["k_mobile"],0,2) . "********";
                                        $k_money = "**********";
                                        $k_company = "**********";
                                        $bb = "";
                                        $fun1 = "";
                                        $fun2 = "";
                                        $fun3 = "";
                                        $fun4 = "";
                                        $k_pay_num = "";
                                        $k_come2 = "";
                                    }
                                    $is_local = "";
                                    if($re["is_local"] == 1){
                                        $is_local = "<br><font color=blue>後臺輸入</font>";
                                    }
                                    ?>
                                        <tr>
                                            <td class="center"><?php echo $ccome; ?></td>
                                            <td class="center"><?php echo $re["sizes"]; ?></td>
                                            <td class="center"><?php echo $re["b2bkind"]; ?></td>
                                            <td class="center"><?php echo Date_EN($re["action_time"],1); ?></td>
                                            <td class="center"><?php echo $k_user; ?></td>
                                            <td class="center"><?php echo $k_name; ?>　<?php echo $gcc; ?><?php echo $k_come2; ?></td>
                                            <td class="center"><?php echo $k_sex; ?></td>
                                            <td class="center"><?php echo Date_EN($k_year,1); ?></td>
                                            <td class="center"><?php echo $re["k_school"]; ?></td>
                                            <td class="center"><?php echo $k_mobile; ?></td>
                                            <td class="center"><?php echo $k_be; ?>　<?php echo $bb; ?></td>
                                            <td class="center">
                                                <?php 
                                                    if($re["all_branch"] != ""){
                                                        echo $re["all_branch"];
                                                    }
                                                    if($re["all_single"] != ""){
                                                        echo " - ".SingleName($re["all_single"],"normal");
                                                    }
                                                    echo $is_local;
                                                ?>
                                            </td>
                                            <td class="center"><?php echo $k_pay_num; ?></td>
                                            <td class="center">
                                                <div class="btn-group">							
                                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <?php
                                                            echo $fun1;
                                                            if($re["all_type"] != "未處理"){
                                                                echo $fun3;
                                                            }
                                                            echo $fun2;
                                                            echo $fun4;
                                                            if($_SESSION["MM_UserAuthorization"] == "admin"){
                                                                echo "<li><a href='#' onClick=\"Mars_popup2('ad_fun_action_list_singup2.php?st=del&id=".$re["k_id"]."','','width=600,height=200,top=100,left=100')\"><i class='icon-trash'></i> 刪除</a></li>";
                                                            }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </td>	
                                        </tr>
                                        <tr>
                                            <td colspan="15" style="BORDER-bottom: #666666 1px dotted">
                                                <?php 
                                                    if($re["k_come"] != ""){
                                                        echo "訊息來源：".$re["k_come"];
                                                    }
                                                    if($re["k_cc"] != ""){
                                                        $k_cc = $re["k_cc"];
                                                        if(explode("sale-",$k_cc) > 0){
                                                            echo "推廣：".SingleName(explode("-",$k_cc)[1],"auto")."　";
                                                        }
                                                        echo "廣告來源：".$re["k_cc"];
                                                    }else{
                                                        $k_cc = "";
                                                    }
                                                ?>
                                                報名時間：<?php echo changeDate($re["k_time"]); ?>　(<a href="javascript:Mars_popup('ad_fun_report.php?k_id=<?php echo $re["k_id"]; ?>&ty=lovekeyin','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(<?php echo $report; ?>)</a>，處理情形：<font color="#FF0000" size="2"><?php echo $re["all_type"]; ?><?php echo $re["all_type2"]; ?>　 <?php echo $re["all_branch"]; ?><?php if($re["all_single"] != "") echo SingleName($re["all_single"],"normal") ?></font>) 內容：<?php echo $re["all_note"] ?>;
                                            </td>
                                        </tr>
                                    <?php
                                }
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


    <hr>
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>

<script type="text/javascript">
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