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
    check_page_power("ad_action");

    if ( SqlFilter($_REQUEST["st"],"tab") == "trans" ){
        $SQL = "Select * From love_keyin Where all_kind = '活動' And k_id='".SqlFilter($_REQUEST["k_id"],"tab")."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
        if ( count($result) > 0 ){
		    //R2.open "Select top 1 * from member_data where 1=0", SPCon, 1, 3
		    //if R2.eof then
            $SQL1 = "Select * From msg_num Where m_auto = 1";
            $rs1 = $SPConn->prepare($SQL1);
            $rs1->execute();
            $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
            foreach($result1 as $re1);
            $mem_num = ($re["m_num"] + 1);
            $SQL_u = "Update msg_num Set m_num = ". $mem_num ." Where m_auto = 1";
            $rsu = $SPConn->prepare($SQL_u);
            $rsu->execute();
            if ( $re["k_sex"] == "女"){ $mem_photo = "girl.jpg"; }else{ $mem_photo = "boy.jpg"; }

            //新增 member_data
            $SQL_i  = "Insert Into member_data(";
            $SQL_i .= "all_type, mem_level, mem_num, mem_photo, mem_come, mem_come, mem_come2, mem_come6, mem_come6_name, mem_cc, mem_time, mem_name, mem_sex, mem_blood, mem_marry";
            $SQL_i .= "mem_by, mem_bm, mem_bd, mem_area, mem_mail, mem_job2, mem_msn, mem_school, mem_branch, mem_single, all_note) Values (";
            $SQL_i .= "'已發送',";
            $SQL_i .= "'guest',";
            $SQL_i .= "'".$mem_num."',";
            $SQL_i .= "'".$mem_photo."',";
            if ( $re["k_come"] != "" ){
                $SQL_i .= "'".$re["k_come"]."',";
                if ( $re["k_come"] != "委外活動23" ){
                    $SQL_i .= "'通路合作',";
                    $SQL_i .= "'活動報名',";
                    $SQL_i .= "'pr23',";
                    $SQL_i .= "'貳叁公關',";
                }else{
                    $SQL_i .= "'',";
                    $SQL_i .= "'',";
                    $SQL_i .= "'',";
                    $SQL_i .= "'',";
                }
            }else{
                $SQL_i .= "'網站活動',";
            }
            $SQL_i .= "'".$re["k_cc"]."',";
            $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
            $SQL_i .= "'".$re["k_name"]."',";
            $SQL_i .= "'".$re["k_sex"]."',";
            $SQL_i .= "'A',";
            if ( $re["k_marry"] != "" ){
                $SQL_i .= "'".$re["k_marry"]."',";
            }else{
                $SQL_i .= "'未婚',";
            }
            if ( chkDate($re["k_bday"]) ){
                $SQL_i .= "'".date("Y",$re["k_bday"])."',";
                $SQL_i .= "'".date("m",$re["k_bday"])."',";
                $SQL_i .= "'".date("d",$re["k_bday"])."',";
            }else{
                $SQL_i .= "'',";
                $SQL_i .= "'',";
                $SQL_i .= "'',";
            }
            $SQL_i .= "'".$re["k_area"]."',";
            $SQL_i .= "'".$re["k_yn"]."',";
            $SQL_i .= "'".$re["k_job"]."',";
            $SQL_i .= "'".$re["k_line"]."',";
            $SQL_i .= "'".$re["k_school"]."',";
            $SQL_i .= "'".$re["all_branch"]."',";
            $SQL_i .= "'".$re["all_single"]."',";
            $SQL_i .= "'由".$_SESSION["pname"]."自 活動報名資料[".$re["k_id"]."] 轉換',";
            $rs_i = $SPConn->prepare($SQL_i);
            $rs_i->execute();
            //Update love_kyein
            $SQL_u = "Update love_keyin Set k_trans = 1";
            $rs_u = $SPConn->prepare($SQL_u);
            $rs_u->execute();
        }
    }
    reURL("ad_action.php?a=b".SqlFilter("st","tab"));

    $default_sql_num = 200;
    
    //top組合語法
    if ( SqlFilter($_REQUEST["vst"],"tab") == "full" ){
        $subSQL1 = "*";
        //sqlv2 = "count(k_id)"
    }else{
        $subSQL1 = "Top ".$default_sql_num." *";
    }

    if ( ( SqlFilter($_REQUEST["a1"],"tab") != "" && SqlFilter($_REQUEST["b1"],"tab") == "" ) || ( SqlFilter($_REQUEST["a1"],"tab") == "" && SqlFilter($_REQUEST["b1"],"tab") != "" ) ) {
        call_alert("日期選擇起始和結束時間。",0,0);
    }
    if ( SqlFilter($_REQUEST["a1"],"tab") > SqlFilter($_REQUEST["b1"],"tab" )){ call_alert("日期請由小到大選擇",0,0); }
    if ( SqlFilter($_REQUEST["a1"],"tab") != "" ){
        $a1 = SqlFilter($_REQUEST["a1"],"tab") &" 00:00";
    }else{
        $a1 = "1900/1/1";
    }

    if ( SqlFilter($_REQUEST["b1"],"tab") != "" ){
        $b1 = SqlFilter($_REQUEST["b1"],"tab") ." 23:59";
    }else{
        $b1 = "2020/12/31";
    }

    //Select ".$subSQL1." From love_keyin As dba Where
    if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
        $subSQL2 = " all_kind = '活動'";
	    if ( SqlFilter($_REQUEST["sear"],"tab") != "1" ){
            if ( SqlFilter($_REQUEST["s99"],"tab") != "" ){
                $subSQL3 = " And all_type <> '未處理'";
	            $all_type = "已處理";
            }else{
                $subSQL3 = " And all_type = '未處理'";
	            $all_type = "未處理";
            }
        }else{
	        $all_type = "資料搜尋";
	    }
    }elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" ) {	  
        $subSQL2 = "all_kind = '活動' And all_branch = '".$_SESSION["branch"]."'";
    }elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
	    $subSQL2 = "all_kind = '活動' and all_single = '".$_SESSION["MM_username"]."'";
    }

    if ( SqlFilter($_REQUEST["s2"],"tab") != "" ){
        $cs2 = reset_number(SqlFilter($_REQUEST["s2"],"tab"));
        $subSQL3 = " And k_mobile Like '%".$cs2."%'";
    }

    if ( SqlFilter($_REQUEST["s3"],"tab") != "" ){
        $subSQL4 = " And k_name Like '%" . str_Replace("'", "''", SqlFilter($_REQUEST["s3"],"tab")) . "%'";
    }

    if ( SqlFilter($_REQUEST["s7"],"tab") != "" ){
        $subSQL5 = " And all_single Like '%" . str_Replace("'", "''", SqlFilter($_REQUEST["s7"],"tab")) . "%'";
    }

    if ( SqlFilter($_REQUEST["s6"],"tab") != "" ){
        $subSQL6 = " And all_branch Like '%" . str_Replace("'", "''", SqlFilter($_REQUEST["s6"],"tab")) . "%'";
    }

    if ( SqlFilter($_REQUEST["s8"],"tab") != "" ){
        $subSQL6 = " And k_sex Like '%" . str_Replace("'", "''", SqlFilter($_REQUEST["s8"],"tab")) . "%'";
    }

    if ( SqlFilter($_REQUEST["s95"],"tab") != "" ){
        $subSQL7 = " And action_title = '" . str_Replace("'", "''", SqlFilter($_REQUEST["s95"],"tab")) . "'";
    }

    if ( SqlFilter($_REQUEST["s97"],"tab") != "" ){
        $subSQL8 = " And k_cc = '" . str_Replace("'", "''", SqlFilter($_REQUEST["s97"],"tab")) . "'";
    }

    if ( SqlFilter($_REQUEST["a1"],"tab") != "" ){
        $subSQL7 = " And k_time between '".$a1."' And '".$b1."'";
    }

    if ( SqlFilter($_REQUEST["stt"],"tab") != "" ){
        $subSQL7 = " And all_type = '".SqlFilter($_REQUEST["stt"],"tab")."'";
    }

    if ( SqlFilter($_REQUEST["s9"],"tab") != "" ){
        $subSQL7 = " And k_come = '".SqlFilter($_REQUEST["s9"],"tab")."'";
    }

    if ( SqlFilter($_REQUEST["sv"],"tab") != "" ){
	    $sv = SqlFilter($_REQUEST["sv"],"tab");
	    if ( substr_count($sv, "-") > 0 ){
            $sv_array = explode("-",$sv);
		    $sv1 = $sv_array[0];
		    $sv2 = $sv_array[1];
		    $sv3 = $sv_array[2];
	        $sqlss = $sqlss . " And action_branch = '". $sv1. "'";
	        $sqlss = $sqlss . " And action_title = '" . $sv2. "'";
	        //sqlss = sqlss & " and datediff(d, action_time, '"&sv3&"')=0"	
        }
    }

    if ( SqlFilter($_REQUEST["nodouble"],"tab") == "1" ){
	    switch ( $_SESSION["MM_UserAuthorization"] ){
		    case "admin":
		        $sqlss = $sqlss . " And (SELECT count(k_id) FROM love_keyin as dbb Where (all_kind = '活動') AND (k_mobile = dba.k_mobile)) <= 1";
                break;
		    case "branch":
		        $sqlss = $sqlss . " And (SELECT count(k_id) FROM love_keyin as dbb Where (all_kind = '活動') AND (k_mobile = dba.k_mobile) and (all_branch = '".$_SESSION["branch"]."')) <= 1";
                break;
	        default:
	            $sqlss = $sqlss . " And (SELECT count(k_id) FROM love_keyin as dbb Where (all_kind = '活動') AND (k_mobile = dba.k_mobile) and (all_branch = '".$_SESSION["branch"]."') and (all_single = '".$_SESSION["MM_username"]."')) <= 1";
                break;
        }
    }

    if ( SqlFilter($_REQUEST["sear"],"tab") != "1" ){
        if ( SqlFilter($_REQUEST["ty"],"tab") == "1" ){
	        $sqlss = $sqlss . " And action_kind = '網站活動'";
	        $tit = "網站活動";
        }else{
	        $sqlss = $sqlss . " and (action_kind <> '網站活動' or action_kind is null)";
	        $tit = "會館活動";
        }
    }else{
	    $tit = "所有活動";
    }

    switch (SqlFilter($_REQUEST["orderby"],"tab")){
        case "1":   //依資料時間排序
            $sqls = $sqls . $sqlss ." order by k_time desc";
            break;
        case "2":   //依督導發送排序
            $sqls = $sqls . $sqlss ." order by send_time desc";
            break;
        default:
            $sqls = $sqls . $sqlss ." order by k_id desc";
            break;
    }
    $sqls2 = $sqls2 . $sqlss;
?>
<!-- MIDDLE -->
<section id="middle">

    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">活動報名資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會館活動報名資料　 - 數量：0　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                            <li><a href="ad_love_f.php"><i class="icon-tag"></i> 進階搜尋</a></li>
                            <li><a href="javascript:event_search();"><i class="icon-tag"></i> 活動搜尋</a></li>
                            <li><a href="ad_action_single_add.php"><i class="icon-tag"></i> 新增參加人員</a></li>
                        </ul>
                    </div>　

                    <form id="searchform" action="ad_love.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" class="form-control">
                            <option value="s2">手機</option>
                            <option value="s3">姓名</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <p style="clear:both">

                    <a class="btn btn-success" href="ad_action.php?ty=1">網站活動</a> <a class="btn btn-success" href="ad_action.php?ty=0" disabled>會館活動</a>
                    <select class="form-control2 pull-right" onchange="location.href='ad_action.php'+$(this).val()+''" autocomplete="off">
                        <option value="?orderby=0">預設排序</option>
                        <option value="?orderby=1">依資料時間排序</option>
                        <option value="?orderby=2">依督導發送排序</option>
                    </select>
                </p>
                <table class="table table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>手機</th>
                            <th>地區</th>
                            <th>活動會館</th>
                            <th>參加活動</th>
                            <th>處理</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan=8 height=200>目前沒有資料</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->

</section>
<!-- /MIDDLE -->

<?php
require("./include/_bottom.php");
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

        $("#search_div_send").on("click", function() {
            var $sv = $("#search_div_event");
            if (!$sv.val()) {
                alert("請選擇活動。");
                $sv.focus();
            } else {
                location.href = "ad_action.php?sear=1&vst=full&sv=" + $sv.val();
            }
        });

    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要發送的會員。");
        else Mars_popup('ad_send_love_branch_mutil.php?k_id=' + $allnum, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
    }

    function mutil_del() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else mem_del($allnum);
    }

    function mem_del(m) {
        if (window.confirm("是否確定刪除？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $.each(m, function(i, val) {
                    $("#showtr_" + val + ",#showtr_" + val + "_2").remove();
                });
            } else {
                $s1 = m;
                $s2 = $("#showtr_" + m + ",#showtr_" + m + "_2").remove();
            }

            $.ajax({
                url: "ad_love_del.php",
                data: {
                    t: "n",
                    k_id: $s1
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    $s2;
                    myApp.hidePleaseWait();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        } else alert("請重新選擇。");
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
        location.href = "ad_action.php?sear=1&vst=full&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }

    function event_search() {
        $("#search_div").modal("show");
    }
</script>