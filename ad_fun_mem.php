<?php
    /*****************************************/
	//檔案名稱：ad_fun_mem.php
	//後台對應位置：好好玩管理系統/會員管理系統
	//改版日期：2021.10.26
	//改版設計人員：Jack
	//改版程式人員：Jack
	/*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}
	check_page_power("ad_fun_mem");

    // 轉入未入會功能
    if( $_REQUEST["st"] == "trans" ){
        $mem_auto = $_REQUEST["mem_auto"];
        $SQL = "SELECT * FROM member_data Where mem_auto = '" .$mem_auto. "'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
        if($result){
            $query = $SPConn->query("SELECT * FROM msg_num Where m_auto=1");
            $R3 = $query->fetch(PDO::FETCH_ASSOC);    
            $mem_num = $R3["m_num"] + 1;
            // 讓msg_num table的欄位m_num + 1
            $R3 = $SPConn->exec("UPDATE msg_num SET m_num = " .$mem_num. " where m_auto = 1"); 

            $all_type = "已發送";
            $mem_level = "guest";
            if( $result["mem_sex"] == "女" ){
                $mem_photo = "girl.jpg";
            }else {
                $mem_photo = "boy.jpg";
            }
            $mem_time = date('Y-m-d H:i:s'); 
            $mem_date = $result["mem_by"];
            if( $mem_date != "" ){
                if(chkDate($mem_by)){
                    if(stristr($str,"-")){
                        list($yy,$mm,$dd) = explode("-",$mem_by);
                    }
                    if(stristr($str,"/")){
                        list($yy,$mm,$dd) = explode("/",$mem_by);
                    }
                    $mem_by = $yy;
                    $mem_bm = $mm;
                    $mem_bd = $dd;
                }
            }else{
                $mem_by = "";
                $mem_bm = "";
                $mem_bd = "";
            }
            if ($result["mem_come"] != ""){
                $mem_come = $result["mem_come"];
            }else{
                $mem_come = "好好玩旅行社";
            }
            $all_note = "由 " .$_SESSION["pname"]. " 自好好玩資料[" .$result["mem_auto"]."] 轉換";

            $RSQL = "INSERT INTO member_data(all_type, mem_level, mem_num, mem_photo, 
                    mem_time, mem_name, mem_nick, mem_sex, mem_by, mem_bm, mem_bd, mem_phone, mem_mobile, 
                    mem_mail, mem_area, mem_address, mem_star, mem_blood, mem_school, mem_job1, mem_job2,
                    mem_branch, mem_single, mem_cc, mem_come, all_note) Values ( ";
            $RSQL .= "'".$all_type."', '".$mem_level."', '".$mem_num."', '".$mem_photo."'";
            $RSQL .= "'".$mem_time."', '".$result["mem_name"]."', '".$result["mem_nick"]."'";
            $RSQL .= "'".$result["mem_sex"]."', '".$mem_by."', '".$mem_bm."', '".$mem_bd."'";
            $RSQL .= "'".$result["mem_phone"]."', '".$result["mem_mobile"]."', '".$result["mem_mail"]."'";
            $RSQL .= "'".$result["mem_area"]."', '".$result["mem_address"]."', '".$result["mem_star"]."'";
            $RSQL .= "'".$result["mem_marry"]."', '".$result["mem_blood"]."', '".$result["mem_school"]."'";
            $RSQL .= "'".$result["mem_job1"]."', '".$result["mem_job2"]."', '".$result["mem_branch"]."'";
            $RSQL .= "'".$result["mem_single"]."', '".$result["mem_cc"]."', '".$mem_come."', '".$all_note."')";
            $qresult = $SPConn->prepare($RSQL);
            $qresult = $qrs->execute();
        }
        reURL("win_close.php?m=轉換中");
        exit;
    }

    // 查詢
    if( $_REQUEST["s1"] != "" ){
        $sqlss = $sqlss. " and mem_mail like '%" .SqlFilter($_REQUEST["s1"],"tab"). "%'";
    }
    if( $_REQUEST["s2"] != "" ){
        $cs2 = reset_number(SqlFilter($_REQUEST["s2"],"int"));
	    $sqlss = $sqlss . " and mem_mobile like N'%" .$cs2. "%'";
    }
    if( $_REQUEST["s3"] != "" ){
        $sqlss = $sqlss. " and mem_name like '%" .SqlFilter($_REQUEST["s3"],"tab"). "%'";
    }
    if( $_REQUEST["s4"] != "" ){
        $sqlss = $sqlss. " and mem_auto like '%" .SqlFilter($_REQUEST["s4"],"int"). "%'";
    }
    if( $_REQUEST["s5"] != "" ){
        $sqlss = $sqlss. " and mem_username like '%" .SqlFilter($_REQUEST["s5"],"tab"). "%'";
    }

    if( $_REQUEST["s7"] != "" ){
        $sqlss = $sqlss. " and UPPER(mem_single) like '%" .strtoupper(SqlFilter($_REQUEST["s7"],"tab")). "%'";
    }
    if( $_REQUEST["s8"] != "" ){
        $sqlss = $sqlss. " and mem_come like '%" .SqlFilter($_REQUEST["s8"],"tab"). "%'";
    }
    if( $_REQUEST["s10"] != "" ){
        $sqlss = $sqlss. " and mem_school like '%" .SqlFilter($_REQUEST["s10"],"tab"). "%'";
    }
    if( $_REQUEST["s11"] != "" ){
        $sqlss = $sqlss. " and mem_area like '%" .SqlFilter($_REQUEST["s11"],"tab"). "%'";
    }
    if( $_REQUEST["s12"] != "" ){
        $sqlss = $sqlss. " and mem_branch like '%" .SqlFilter($_REQUEST["s12"],"tab"). "%'";
    }
    if( $_REQUEST["s13"] != "" ){
        $sqlss = $sqlss. " and mem_single like '%" .SqlFilter($_REQUEST["s13"],"tab"). "%'";
    }
    if( $_REQUEST["m1"] != "" ){
        $sqlss = $sqlss. " and month(mem_by) = '" .SqlFilter($_REQUEST["m1"],"tab"). "'";
    }
    if( $_REQUEST["d1"] != "" ){
        $sqlss = $sqlss. " and day(mem_by) = '" .SqlFilter($_REQUEST["d1"],"tab"). "'";
    }
    if( $_REQUEST["s21"] != "" ){
        $sqlss = $sqlss. " and mem_sex like '%" .SqlFilter($_REQUEST["s21"],"tab"). "%'";
    }
    if( $_REQUEST["s97"] != "" ){
        $sqlss = $sqlss. " and mem_cc = '" .SqlFilter($_REQUEST["s97"],"tab"). "'";
    }
    if( ($_REQUEST["s22"] != "" && $_REQUEST["s23"] == "") || ($_REQUEST["s22"] == "" && $_REQUEST["s23"] != "") ){
        call_alert("資料日期選擇起始和結束時間。",0,0);
    }
    if( $_REQUEST["s22"] != "" && $_REQUEST["s23"] != "" ){
        if( $_REQUEST["s22"] > $_REQUEST["s23"]){
            call_alert("日期請由小到大選擇。",0,0);
        }
        $s22 = SqlFilter($_REQUEST["s22"],"int"). " 00:00";
        $s23 = SqlFilter($_REQUEST["s23"],"int"). " 23:59";
    }
    if( $s22 != "" && $s23 != "" ){
        $sqlss = $sqlss. " and mem_time between '" .$s22. "' and '" .$s23. "'";
    }
    if( $_REQUEST["s27"] != "" && $_REQUEST["s28"] != "" ){
        $sqlss = $sqlss. " and year(mem_by) between '" .SqlFilter($_REQUEST["s28"],"int"). "' and '".SqlFilter($_REQUEST["s27"],"int"). "'";
    }elseif( $_REQUEST["s27"] != "" ){
        $sqlss = $sqlss & " and year(mem_by) = " .SqlFilter($_REQUEST["s27"],"int");
    }
    if( $_REQUEST["a1"] != "" ){
        $sqlss = $sqlss. " and all_type like '%" .SqlFilter($_REQUEST["a1"],"tab"). "%'";
    }
    if( $_REQUEST["ff"] == "1" ){
        $sqlss = $sqlss . " and (ff <> '' or not ff is null)";
    }

    //判斷權限並查詢SQL總筆數    
    switch ( $_SESSION["MM_UserAuthorization"] ) {
        case "admin":          
		    $allSQL = "SELECT count(mem_auto) as total_size FROM member_data WHERE  1 = 1" .$sqlss;
            break;
        case "branch":
        case "love":
		    $allSQL = "SELECT count(mem_auto) as total_size FROM member_data WHERE mem_branch= '" .$_SESSION["branch"]. "'" .$sqlss;
            break;
        default:
            $allSQL = "SELECT count(mem_auto) as total_size FROM member_data Where UPPER(mem_single) = '" .strtoupper($_SESSION["MM_username"]). "'" .$sqlss;
            break;
    }
    $rs = $FunConn->prepare($allSQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if (!$result){
        $total_size = 0;
    }else{
        if( $_REQUEST["vst"] == "full" ){
            $total_size = $result["total_size"]; //總筆數
        }else{
            if($result["total_size"] > 500 ) {
                $total_size =  500; //限制到500筆
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
    
    // 如果請求參數full則全部列出    
    if( $_REQUEST["vst"] == "full" ){
        $sqlv = "*";
    }else{
        $sqlv =  "top " .$tPageSize. " *";       
    }
    
    // 判斷權限並SQL查詢
    switch ( $_SESSION["MM_UserAuthorization"] ) {
        case "admin":
            $sqls = "SELECT " .$sqlv. " FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM member_data WHERE 1 = 1";
            break;
        case "branch":
        case "love":
            $sqls = "SELECT " .$sqlv. " FROM member_data WHERE mem_branch= '" .$_SESSION["branch"]. "'";
            break;
        default:
            $sqls = "SELECT " .$sqlv. " FROM member_data Where UPPER(mem_single) = '" .strtoupper($_SESSION["MM_username"]). "'";
            break;
    }
    
    if( $_REQUEST["ff"] == "1" ){
	    $sqls = $sqls . $sqlss ." order by ff_time desc ) t1 order by ff_time) t2 order by ff_time desc";
    }else{
        $sqls = $sqls . $sqlss ." order by mem_auto desc ) t1 order by mem_auto) t2 order by mem_auto desc";
    }

    
    if( $_REQUEST["vst"] == "full" ){
        $total_sizen = $total_size . "　<a href='?vst=n'>[查看前五百筆]</a>";
    }else{
        if( $total_size > 500 ) $total_size = 500;
        $total_sizen = $total_size . "　<a href='?vst=full'>[查看完整清單]</a>";
    }          
   
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">會員管理系統</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員管理系統 - 數量：<?php echo $total_sizen; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <!--<li><a href="ad_register1.php" target="_blank"><i class="icon-star"></i> 新增會員資料</a></li>-->
                            <?php 
                                if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch") { ?>
                                    <li><a href="javascript:mutil_send();"><i class="icon-tag"></i> 多選發送</a></li>
                            <?php } ?>              
                            <li><a href="ad_fun_mem_f.php"><i class="icon-tag"></i> 進階搜尋</a></li>
                            <?php if($_REQUEST["vst"] == "full"){ ?>
                                <li class="divider"></li>                                
								<li><a href="#e" onclick="Mars_popup('ad_fun_mem_excel.php?a=b<?php echo requestStr(); ?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-tag"></i> 匯出 Excel</a></li>
                            <?php } ?> 

                        </ul>
                    </div>　
                    <form id="searchform" action="ad_fun_mem.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type">
                            <option value="s2">手機</option>
                            <option value="s1">信箱</option>
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                            <option value="s5">身分證字號</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input class="btn btn-default" type="submit" value="送出">
                    </form>
                </div>

                <p style="clear:both">
                    <a class="btn btn-success" href="?sear=1&ff=1">同意 Match</a>
                </p>
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
                            <th width=80>證件</th>
                            <th width=80>系統來源</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                            
                            $rs = $FunConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(count($result) == 0){
                               echo "<tr><td colspan=10 height=200>目前沒有資料</td></tr>";
                            }else{
                                foreach($result as $re){?>
                                    <tr>
							            <td><input data-no-uniform="true" type="checkbox" name="nums" value="<?php $re["mem_auto"]; ?>"></td>
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
                                        <td><?php echo $re["mem_auto"];?></td>
                                        <td class="center">
                                            <a href="ad_fun_mem_detail.php?mem_auto=<?php echo $re["mem_auto"];?>" target="_blank"><?php echo $re["mem_name"];?></a>
                                            <a href="ad_no_mem_s.php?mem_mobile=<?php echo $re["mem_mobile"];?>" target="_blank">[查]</a>
                                            <a href="ad_mem_detail.php?mem_mobile=<?php echo $re["mem_mobile"];?>" target="_blank">[查春天]</a></td>
                                        <td class="center"><?php echo $re["mem_sex"];?></td>
                                        <td class="center"><?php echo Date_EN($re["mem_by"],1);?></td>
                                        <td class="center"><?php echo $re["mem_school"];?></td>
                                        <td class="center"><?php echo $re["mem_branch"];?></td>
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
                                                if($re["p1"] != "" && $re["p1e"] == "ok"){
                                                    $um = $um . "身正";
                                                }
                                                if($re["p2"] != "" && $re["p2e"] == "ok"){
                                                    $um = $um . "<br>身反";
                                                }
                                                if($re["p3"] != "" && $re["p3e"] == "ok"){
                                                    $um = $um . "<br>工證";
                                                }
                                                if($um == ""){
                                                    $um = "無";
                                                }
                                                echo  $um;
                                            ?>
                                        </td>
                                        <td class="center"><?php echo $re["mem_tcome"];?></td>
								        <td class="center">
                                        <div class="btn-group">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                            <ul class="dropdown-menu pull-right">
                                                <?php 
                                                    $rquery = $FunConn->query("select count(log_auto) as r from log_data where log_num=" .$re["mem_auto"]. " and log_5='member'");
                                                    $rresult = $rquery->fetch(PDO::FETCH_ASSOC);
                                                    if( !$rresult ){
                                                        $report = 0;
                                                    }else{
                                                        $report = $rresult["r"];
                                                    }
                                                    $rquery2 = $FunConn->query("select top 1 log_4 from log_data where log_num=" .$re["mem_auto"]. " and log_5='member' order by log_auto desc");
                                                    $rresult2 = $rquery2->fetch(PDO::FETCH_ASSOC);                                              
                                                    if( !$rresult2 ){
                                                        $report_text = "無";
                                                    }else{
                                                        $report_text = $rresult2["log_4"];
                                                    }                                                   
                                                ?>
                                                <li><a href="ad_fun_mem_detail.php?mem_auto=<?php echo $re["mem_auto"];?>" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                                <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=<?php echo $re["mem_auto"];?>&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(<?php echo $report; ?>)</a></li>
                                                <?php
                                                    if( $_SESSION["MM_UserAuthorization"] != "single" ){
                                                        echo "<li><a href=\"javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=" .$re["mem_auto"]. "','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');\"><i class='icon-arrow-right'></i> 發送</a></li>";
                                                        echo "<li><a href=\"javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=" .$re["mem_auto"]. "','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');\"><i class='icon-file'></i> 修改</a></li>";
                                                        // echo "<li><a href=\"ad_register2.php?mem_auto=" .$re["mem_auto"]. "\" target='_blank'><i class='icon-camera'></i> 照片</a></li>";
                                                    }
                                                    if( $_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["MM_UserAuthorization"] != "branch" ){
                                                        if( $re["trans_spring"] != "1" ){
                                                            echo "<li><a href=\"javascript:Mars_popup('?st=trans&mem_auto=" .$re["mem_auto"]. "','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=200,top=100,left=100');\"><i class='icon-resize-full'></i> 轉入未入會</a></li>";
                                                        }else{
                                                            echo "<li><a style='color:#ccc'><i class='icon-share' style='color:#ccc'></i> 已轉未入會</a></li>";
                                                        }
                                                    }
                                                    if( $_SESSION["MM_UserAuthorization"] == "admin" ){
                                                        echo "<li><a href=\"javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=" .$re["mem_auto"]. "','','width=300,height=200,top=100,left=100')\"><i class='icon-trash'></i> 刪除</a></li>";
                                                    }
                                                ?>             
                                                <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=<?php $re["mem_mail"]; ?>','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                        (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=<?php echo $re["mem_auto"]; ?>&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(<?php echo $report; ?>)</a>
                                        ，處理情形：
                                        <font color="#FF0000" size="2">                                            
                                            <?php 
                                                echo $re["all_type"] . $re["all_type2"] . "&nbsp;&nbsp" .$re["mem_branch"];
                                                if ($re["mem_single"] != "") {
                                                    echo SingleName($re["mem_single"],"normal"); 
                                                }
                                            ?>
                                        </font>)
                                            內容：<?php echo $report_text; ?> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <font color=blue>舊：</font>
                                            <?php echo $re["all_note"]; ?>&nbsp;&nbsp;                                            
                                            <?php
                                                if( $re["ff"] != "" ){
                                                    echo "同意Match - " .$re["ff"]." - " .changeDate(Date_EN($re["ff_time"],6)). "";
                                                } 
                                            ?>
                                        </td>
                                    </tr>
                            <?php }} ?>
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
        else Mars_popup('ad_fun_send_branch.php?mem_auto=' + $allnum, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
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
        location.href = "ad_fun_mem.php?sear=1&vst=full&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>