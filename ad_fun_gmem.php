<?php
    /*****************************************/
    //檔案名稱：ad_fun_gmem.php
    //後台對應位置：好好玩管理系統/金卡俱樂部(舊)
    //改版日期：2021.11.30
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");
 
    //程式開始 *****
	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}

    // 接收值
    $vst = SqlFilter($_REQUEST["vst"],"tab");

    // 發信(未完成)
    if($_REQUEST["st"] == "remail"){

        if($_REQUEST["mem_sex"] == "男"){
            $bb = "先生";
        }else{
            $bb = "小姐";
        }
        $rurl = "<a href='http://www.funtour.com.tw/rm.php?v=".SqlFilter($_REQUEST["mem_auto"],"int")."'>http://www.funtour.com.tw/rm.php?v=".SqlFilter($_REQUEST["mem_auto"],"int")."</a>";
        $message = "<table width='415' border='0' cellspacing='0' cellpadding='0' style='font-size:15px;'>";
        $message = $message . "<tr><td height=20>".SqlFilter($_REQUEST["mem_name"],"tab")." ".$bb." 您好：</td></tr>";
        $message = $message . "<tr><td height=20>恭喜您成為好好玩金卡俱樂部的貴賓</td></tr>";
        $message = $message . "<tr><td height=20>請點擊以下網址完成 Email 驗證</td></tr>";
        $message = $message . "<tr><td height=20>".$rurl."</td></tr>";
        $message = $message . "<tr><td height=20>即可享有完整好好玩金卡俱樂部會員優惠服務！</td></tr>";
        $message = $message . "<tr><td height=20>祝福您早日牽手成功！</td></tr>";
        $message = $message . "<tr><td height='12'></td><td></td></tr></table>";
        $message = $message . "<a href='http://www.funtour.com.tw'><img src='http://www.funtour.com.tw/images/i_logo.jpg' border=0></a>";

        $to      = $_REQUEST["mem_mail"];
        $subject = '好好玩旅行社';        
        $headers = array(
            'From' => '好好玩旅行社 <funtour@funtour.com.tw>',
            'X-Mailer' => 'PHP/' . phpversion()
        );
        mail($to, $subject, $message, $headers);
    }

    $default_sql_num = 500; // 初始查詢數字    
    if( $_REQUEST["vst"] == "full" ){
        $sqlv = "*";
        $sqlv2 = "count(mem_auto)";        
    }else{
        $sqlv = "top " .$default_sql_num. " *";
        $sqlv2 = "count(mem_auto)";
    }

    // 權限判斷(只取全部的筆數)
    switch($_SESSION["MM_UserAuthorization"]){
        case "admin":
            $sqls2 = "SELECT ".$sqlv2." as total_size FROM goldcard_data WHERE  1 = 1";
            if($_REQUEST["sear"] != "1"){
                if($_REQUEST["s99"] != ""){
                    $sqlss = $sqlss . " and all_type <> '未處理'";
	                $all_type = "已處理";
                }else{
                    $sqlss = $sqlss . " and (all_type = '未處理' or all_type IS NULL)";
	                $all_type = "未處理";
                }
            }else{
                $all_type = "資料搜尋";
            }
            break;
        case "branch":
        case "love":
	        $sqls2 = "SELECT ".$sqlv2." as total_size FROM goldcard_data WHERE mem_branch= '".$_SESSION["branch"]."'";
            break;
        default:
            $sqls2 = "SELECT ".$sqlv2." as total_size FROM goldcard_data Where UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])."'";
            break;
    }

    // 信箱搜尋
    if($_REQUEST["s1"] != "" ){
        $sqlss = $sqlss . " and mem_mail like '%" .SqlFilter($_REQUEST["s1"],"tab")."%'";
    }
    
    // 以手機號碼搜尋
    if($_REQUEST["s2"] != "" ){
        $cs2 = reset_number(SqlFilter($_REQUEST["s2"],"int"));
	    $sqlss = $sqlss . " and mem_mobile like '%" .$cs2. "%'";
    }

    // 以姓名搜尋
    if($_REQUEST["s3"] != "" ){
        $sqlss = $sqlss . " and mem_name like N'%" .SqlFilter($_REQUEST["s3"],"tab")."%'";
    }

    // 以活動搜尋
    if($_REQUEST["s4"] != "" ){
        $sqlss = $sqlss . " and mem_num like '%" .SqlFilter($_REQUEST["s4"],"tab")."%'";
    }

    // 以身分字號搜尋
    if($_REQUEST["s5"] != "" ){
        $sqlss = $sqlss . " and mem_username like '%" .SqlFilter($_REQUEST["s6"],"tab")."%'";
    }

    // 以秘書搜尋
    if($_REQUEST["s7"] != "" ){
        $sqlss = $sqlss . " and UPPER(mem_single) like '%" .strtoupper(SqlFilter($_REQUEST["s7"],"tab"))."%'";
    }

    // 以來源搜尋
    if($_REQUEST["s8"] != "" ){
        $sqlss = $sqlss . " and mem_come like '%" .SqlFilter($_REQUEST["s8"],"tab")."%'";
    }

    // 以學校搜尋
    if($_REQUEST["s10"] != "" ){
        $sqlss = $sqlss . " and mem_school like '%" .SqlFilter($_REQUEST["s10"],"tab")."%'";
    }

    // 以區域搜尋
    if($_REQUEST["s11"] != "" ){
        $sqlss = $sqlss . " and mem_branch like '%" .SqlFilter($_REQUEST["s11"],"tab")."%'";
    }

    // 以來源2搜尋
    if($_REQUEST["s12"] != "" ){
        $sqlss = $sqlss . " and mem_tcome like '%" .SqlFilter($_REQUEST["s12"],"tab")."%'";
    }

    // 以會館搜尋
    if($_REQUEST["s13"] != "" ){
        $sqlss = $sqlss . " and mem_branch like '%" .SqlFilter($_REQUEST["s13"],"tab")."%'";
    }

    // 以秘書搜尋
    if($_REQUEST["s14"] != "" ){
        $sqlss = $sqlss . " and mem_single like '%" .SqlFilter($_REQUEST["s14"],"tab")."%'";
    }

    // 以月搜尋
    if($_REQUEST["m1"] != "" ){
        $sqlss = $sqlss . " and month(mem_by) = '" .SqlFilter($_REQUEST["m1"],"int"). "'";
    }

    // 以日搜尋
    if($_REQUEST["d1"] != "" ){
        $sqlss = $sqlss . " and day(mem_by) = '" .SqlFilter($_REQUEST["d1"],"int"). "'";
    }

    // 以性別搜尋
    if($_REQUEST["s21"] != "" ){
        $sqlss = $sqlss . " and mem_sex like '%" .SqlFilter($_REQUEST["s21"],"tab")."%'";
    }

    // 以自訂來源搜尋
    if($_REQUEST["s97"] != "" ){
        $sqlss = $sqlss . " and mem_cc ='" .SqlFilter($_REQUEST["s97"],"tab")."'";
    }

    if( $_REQUEST["s22"] != ""){ 
        $acre_sign1 = SqlFilter($_REQUEST["s22"],"int") . "/" . SqlFilter($_REQUEST["s23"],"int") . "/1";
        if( !chkDate($acre_sign1) ){
            call_alert("起始日期不正確。",0,0);
        }
    }

    if($_REQUEST["s24"] != ""){
        $acre_sign2 = SqlFilter($_REQUEST["s24"],"int"). "/" .(SqlFilter($_REQUEST["s25"],"int")+1). "/1";
        $acre_sign2 = date('Y/m/d',strtotime( $acre_sign2.'-1 day' ));
        if(!chkDate($acre_sign2)){
            call_alert("結束日期有誤。",0,0);
         }
    }

    if(chkDate($acre_sign1) && chkDate($acre_sign2)){
        if(strtotime($acre_sign1) > strtotime($acre_sign2)){
            call_alert("起始日期不能大於結束日期。", 0, 0);
        }
        $sqlss = $sqlss . " and mem_time between '".$acre_sign1."' and '".$acre_sign2."'";
    }

    // 以年搜尋
    if($_REQUEST["s27"] != "" ){
        $sqlss = $sqlss . " and year(mem_by) = '" .SqlFilter($_REQUEST["s27"],"int"). "'";
    }

    // 以處理情形搜尋
    if( $_REQUEST["a1"] != ""){ 
        $sqlss = $sqlss . " and all_type like '%" .SqlFilter($_REQUEST["a1"],"tab")."%'";
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
            $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM goldcard_data WHERE 1 = 1";
            break;
        case "branch":
        case "love":
            $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM goldcard_data WHERE mem_branch ='". $_SESSION["branch"] ."'";
            break;
        default:
            $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM goldcard_data Where UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])."'";
            break;
    }

    // SQL
    $sqls = $sqls . $sqlss ." order by mem_auto desc ) t1 order by mem_auto) t2 order by mem_auto desc";

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
            <li class="active">金卡俱樂部</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>金卡俱樂部　<?php echo $all_type; ?> - 數量：<?php echo $total_sizen; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <!--<li><a href="ad_register1.php" target="_blank"><i class="icon-star"></i> 新增會員資料</a></li>-->
                            <?php 
                                if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch"){
                                    echo "<li><a href='javascript:mutil_send();'><i class='icon-tag'></i> 多選發送</a></li>";
                                }
                                if($_SESSION["MM_UserAuthorization"] == "admin"){
                                    if($all_type == "未處理"){
                                        echo "<li><a href='?s99=1' target='_self'><i class='icon-resize-horizontal'></i> 切換已處理</a></li>";
                                    }
                                    if($all_type == "已處理"){
                                        echo "<li><a href='ad_fun_gmem.php' target='_self'><i class='icon-resize-horizontal'></i> 切換未處理</a></li>";
                                    }
                                }                                
                            ?>
                            <li><a href="ad_fun_gmem_f.php"><i class="icon-tag"></i> 進階搜尋</a></li>
                        </ul>
                    </div>　

                    <form id="searchform" action="ad_fun_gmem.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type">
                            <option value="s2">手機</option>
                            <option value="s5">身分證字號</option>
                            <option value="s1">信箱</option>
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input class="btn btn-default" type="submit" value="送出">
                    </form>

                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                            <th>資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>會館</th>
                            <th>秘書</th>
                            <th>照片</th>
                            <th width=80>證明</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $rs = $FunConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=12 height=200>目前沒有資料</td></tr>";
                            }else{
                                foreach($result as $re){ ?>
                                    <tr>
                                        <td><input data-no-uniform="true" type="checkbox" name="nums" value="<?php echo $re["mem_auto"]; ?>"></td>
                                        <td class="center">                                            
                                            <?php 
                                                $mem_su = $re["mem_su"];                                                
                                                if( $mem_su != "" ){
                                                    if(is_numeric(explode(",", $mem_su)[0])){
                                                        $mem_su = "-" . num_branch(explode(",", $mem_su)[0]) . "-" . explode(",", $mem_su)[1];
                                                    }
                                                }
                                                if($re["mem_cc"] != ""){
                                                    $mem_cc = " [" .$re["mem_cc"]."]";
                                                }else{
                                                    $mem_cc = "";
                                                }
                                                echo $re["mem_come"] . $mem_su . $mem_cc;
                                            ?>
                                        </td>
                                        <td><?php echo $re["mem_num"]; ?></td>
                                        <td class="center"><a href="ad_fun_gmem_detail.php?mem_auto=<?php echo $re["mem_auto"]; ?>" target="_blank"><?php echo $re["mem_name"]; ?></a> 
                                            <a href="ad_no_mem_s.php?mem_mobile=<?php echo $re["mem_mobile"]; ?>" target="_blank">[查]</a>　
                                            <a href="ad_mem_detail.php?mem_mobile=<?php echo $re["mem_mobile"]; ?>" target="_blank">[查春天]</a>
                                        </td>										
                                        <td class="center"><?php echo $re["mem_sex"]; ?></td>
                                        <td class="center"><?php echo Date_EN($re["mem_by"],1); ?></td>
                                        <td class="center"><?php echo $re["mem_school"]; ?></td>
                                        <td class="center"><?php echo $re["mem_branch"]; ?></td>
                                        <td class="center">
                                            <?php 
                                                $mem_single = $re["mem_single"];
                                                if($mem_single != ""){
                                                    $mem_single = SingleName($mem_single,"normal");
                                                }else{
                                                    $mem_single = "無";
                                                }
                                                echo $mem_single;
                                            ?>
                                        </td>
                                        <td class="center">
                                            <?php 
                                                
                                                if( ($re["mem_sex"] == "男" && $re["mem_photo"] != "boy.jpg" && $re["mem_photo"] != "") || ($re["mem_sex"] == "女" && $re["mem_photo"] != "girl.jpg" && $re["mem_photo"] != "")){
                                                    echo "<a href='http://www.funtour.com.tw/images/photo/" .$re["mem_photo"]. "?t=" .rand(1,9999)."' target='_blank' class='fancybox'>有</a>";                                         
                                                }else{
                                                    echo "無";
                                                }                                
                                            ?>                                           
                                        </td>
                                        <td class="center">
                                            <?php
                                                $um = "";
                                                if($re["p1"] != ""){
                                                    $um = $um . "身正,";
                                                }
                                                if($re["p2"] != ""){
                                                    $um = $um . "身反,";
                                                }
                                                if($re["p3"] != ""){
                                                    $um = $um . "工證";
                                                }
                                                if($um == ""){
                                                    $um = "無";
                                                }
                                                if( ($re["p1c"] == 0 && $re["p1"] != "") || ($re["p2c"] == 0 && $re["p2"] != "") || ($re["p3c"] == 0 && $re["p3"] != "")){
                                                    $um = $um."<font color=red>需審核</font>";
                                                }
                                                echo  $um;
                                            ?>
                                        </td>
                                        <td class="center">
                                            <?php 
                                                $rquery = $FunConn->query("select count(log_auto) as r from log_data where log_num=".$re["mem_auto"]." and log_5='gmember'");
                                                $rresult = $rquery->fetch(PDO::FETCH_ASSOC);
                                                if( !$rresult || $rresult["r"] == 0){
                                                    $report = 0;
                                                }else{
                                                    $report = $rresult["r"];
                                                }
                                                $rquery = $FunConn->query("select top 1 log_4 from log_data where log_num=".$re["mem_auto"]." and log_5='gmember' order by log_auto desc");
                                                $rresult = $rquery->fetch(PDO::FETCH_ASSOC);
                                                if(!$rresult ){
                                                    $report_text = "無";
                                                }else{
                                                    $report_text = $rresult["log_4"];
                                                }
                                                $totalp = 0;
                                                $rquery = $FunConn->query("select sum(totalp) as totalp from goldcard_point where mem_num=".$re["mem_num"]);
                                                $rresult = $rquery->fetch(PDO::FETCH_ASSOC);
                                                if($rresult){
                                                    $totalp = $rresult["totalp"];
                                                }
                                            ?>
                                            
                                            <div class="btn-group">
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">						
                                                    <li><a href="ad_fun_gmem_detail.php?mem_auto=<?php echo $re["mem_auto"]; ?>" target="_blank"><i class="icon-file"></i> 詳細</a></li>                                                       
                                                    <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=<?php echo $re["mem_auto"]; ?>&ty=gmember&rc=金卡會員','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(<?php echo $report; ?>)</a></li>
								                    <li><a href="javascript:Mars_popup('ad_fun_gmem_fix.php?mem_auto=<?php echo $re["mem_auto"]; ?>','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                                    <?php 
                                                        if($_SESSION["MM_UserAuthorization"] != "single"){
                                                            echo "<li><a href=\"javascript:Mars_popup('ad_fun_send_gbranch.php?mem_auto=".$re["mem_auto"]."','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');\"><i class='icon-arrow-right'></i> 發送</a></li>";
                                                        }
                                                        if($_SESSION["MM_UserAuthorization"] == "admin"){
                                                            echo "<li><a href=\"javascript:Mars_popup2('ad_fun_gmem_del.php?mem_auto=".$re["mem_auto"]."&mem_num=".$re["mem_num"]."','','width=300,height=200,top=100,left=100')\"><i class='icon-trash'></i> 刪除</a></li>";
                                                        }
                                                    ?>
                                                    <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=<?php echo $re["mem_mail"]; ?>','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>--> 
                                                </ul>
                                            </div>								
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" style="border-bottom: #666666 1px dotted">
                                            <?php
                                                if($re["mem_single"] != ""){
                                                    $single = SingleName($re["mem_single"],"normal");
                                                }
                                                echo changeDate($re["mem_time"])."(<a href=\"javascript:Mars_popup('ad_fun_report.php?k_id=" .$re["mem_auto"]. "&ty=gmember&rc=金卡會員','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');\">回報(".$report.")</a>，
                                                        處理情形：<font color='#FF0000' size='2'>" .$re["all_type"]. $re["all_type2"]. "　 ".$re["mem_branch"] .$single."</font>) 內容：" .$report_text."　　 ";
                                                echo "<a href=\"javascript:Mars_popup('ad_fun_goldcard_point.php?mem_num=".$re["mem_num"]."&n=".$re["mem_name"]."','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');\">設定點數</a> 　";
                                                if($totalp != ""){
                                                    if($_SESSION["MM_UserAuthorization"] == "admin"){
                                                        echo "<font color=blue>點數：</font>".$totalp;
                                                    }else{
                                                        echo "<font color=blue>點數：</font>".$totalp;
                                                    }
                                                }else{
                                                    echo "<font color=red>請通知信箱收信設定登入帳號和密碼</font> <a href=\"javascript:Mars_popup('ad_fun_gmem.php?st=remail&mem_auto=".$re["mem_auto"]."&mem_mail=".$re["mem_mail"]."&mem_name=".$re["mem_name"]."&mem_sex=".$re["mem_sex"]."','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');\">重新寄信</a>";
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

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {



        $("#selnums").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", false);
                });
        });

    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要發送的會員。");
        else Mars_popup('ad_fun_send_gbranch.php?mem_auto=' + $allnum, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
    }

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
        location.href = "ad_fun_gmem.php?sear=1&vst=full&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>