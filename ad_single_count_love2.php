<?php
	error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_single_count_love2.php
	//後台對應位置：名單/發送記錄>排約人次統計(年度總表)
	//改版日期：2021.12.6
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");

    $st = SqlFilter($_REQUEST["st"],"tab");
    if ( $st == "send"){
        $yy = SqlFilter($_REQUEST["yy"],"tab");
        $branch = SqlFilter($_REQUEST["branch"],"tab");
        $shown = SqlFilter($_REQUEST["shown"],"tab");
        $ii = intval($_REQUEST["ii"]);
        if ( $topage == 1 ){
            $ii = 1;
            echo "<table id='outtable' width='100%' height='80' align='center' class='table table-striped table-bordered bootstrap-datatable'>";
            echo "<tr>";
            echo "<th width='40'>NO</th>";
            echo "<th>會館</th>";
            echo "<th>姓名</th>";
            echo "<th>職稱</th>";
            echo "<th>".$yy."年一月</th>";
            for ( $i=2;$i<=12;$i++ ){
                echo "<th>".monthname($i)."</th>";
            }
            echo "<th>排約次數</th>";
            echo "</tr>";
        }

        if ( $shown == "1" ){
            //qsql = ""
            $subSQL = "";
        }else{
            //qsql = " and p_work=1";
            $subSQL = " And p_work = 1";
        }

        $oldbranch = $branch;
        if ( $branch != "" ){
            $branch = str_replace(",", "','", $branch);
            $subSQL = $subSQL." And (personnel_data.p_branch in ('".$branch."'))";
        }else{
            echo "<tr><td colspan='8'>請選擇會館</td></tr>";
            exit;
        }

        if ( $_SESSION["MM_UserAuthorization"] == "admin" ){        
            $SQL  = "Select personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user,personnel_data.p_job2, lovecount FROM personnel_data ";
            $SQL .= "outer APPLY (select sum(score) as lovecount from love_data_re where (love_data_re.all_single = personnel_data.p_user OR ";
            $SQL .= "love_data_re.all_single2 = personnel_data.p_user) AND (love_data_re.love_time2 BETWEEN '".$yy."/1/1  00:00' AND '".$yy."/12/31 23:59')) love_data_re ";
            $SQL .= "WHERE p_user <> '' and lovecount > 0 and p_work=1".$subSQL."  order by lovecount desc";
        }elseif ( $_SESSION["MM_UserAuthorization"] == "love" ){
            $SQL  = "Select personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user,personnel_data.p_job2, lovecount FROM personnel_data ";
            $SQL .= "outer APPLY (select sum(score) as lovecount from love_data_re where (love_data_re.all_single = personnel_data.p_user OR ";
            $SQL .= "love_data_re.all_single2 = personnel_data.p_user) AND (love_data_re.love_time2 BETWEEN '".$yy."/1/1  00:00' AND '".$yy."/12/31 23:59')) love_data_re ";
            $SQL .= "WHERE p_user <> '' and lovecount > 0 and  p_work=1".$subSQL."  order by lovecount desc";
        }elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" ||  $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
            $SQL  = "Select personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user,personnel_data.p_job2, lovecount FROM personnel_data ";
            $SQL .= "outer APPLY (select sum(score) as lovecount from love_data_re where (love_data_re.all_single = personnel_data.p_user OR ";
            $SQL .= "love_data_re.all_single2 = personnel_data.p_user) AND (love_data_re.love_time2 BETWEEN '".$yy."/1/1  00:00' AND '".$yy."/12/31 23:59')) love_data_re ";
            $SQL .= "WHERE (personnel_data.p_branch = '".$_SESSION["branch"]."') and p_user <> '' and lovecount > 0 and  p_work=1  order by lovecount desc";
        }else{
            $SQL  = "Select personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user,personnel_data.p_job2, lovecount FROM personnel_data ";
            $SQL .= "outer APPLY (select sum(score) as lovecount from love_data_re where (love_data_re.all_single = personnel_data.p_user OR ";
            $SQL .= "love_data_re.all_single2 = personnel_data.p_user) AND (love_data_re.love_time2 BETWEEN '".$yy."/1/1  00:00' AND '".$yy."/12/31 23:59')) love_data_re WHERE ";
            $SQL .= "(personnel_data.p_user = '".$_SESSION["MM_username"]."') and p_user <> '' and lovecount > 0 and  p_work=1  order by lovecount desc";
        }

        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
        if ( count($result) > 0 ){
            $ii = 0;
            foreach($result as $re){
                $ii++;
                echo "<tr>";
                echo "<td>".$ii."</td>";
                echo "<td>".$re["p_branch"]."</td>";
                echo "<td>".$re["p_name"]."</td>";	
                echo "<td>".$re["p_job2"]."</td>";
                for ( $i=1;$i<=12;$i++){
                    $fday = $yy."/".$i."/1 00:00";
                    //echo  $fday;
                    //$lday = date("m", 1, $fday ) - 1 ." 23:59";
                    $lday = date("m",date($fday,strtotime('+1 mouth')))." 23:59";
                    $SQL_s  = "Select Sum(score) As ls From love_data_re Where love_data_re.love_time2 Between '".$fday."' And '".$lday."' ";
                    $SQL_s .= "And (love_data_re.all_single = '".$re["p_user"]."' Or love_data_re.all_single2 = '".$re["p_user"]."')";
                    $rs_s = $SPConn->prepare($SQL_s);
                    $rs_s->execute();
                    $result_s=$rs_s->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result_s as $re_s);
                    if ( count($result_s) > 0 ) {
                        $ls = $re_s["ls"];
                    }else{
                        $ls = 0;
                    }
                    echo "<td>".$ls."</td>";
                }
                $lovecount = $re_s["lovecount"];
                if ( $lovecount == "" || is_null($lovecount) ){
                    $lovecount = 0;
                }
                echo "<td>".$lovecount."</td>";
                echo "</tr>";
            }
            
        }
        if ( $topage == $TotalPage ){
            echo "<script type='text/javascript'>button_set(1);outmsg_show('已讀取 ".$TotalPage." 資料完畢。');</script>";
        }else{
            echo "<script type='text/javascript'>outmsg_show('目前讀取 ".$topage." / ".$TotalPage." 資料..請稍候..<img src='img/wait_loading.gif' align='middle'>');conutice_ajax('".$yy."','".$oldbranch."','".$shown."','".$ii."', '".$topage."')</script>";
        }
        exit;
    }
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">排約人次統計-總表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>排約人次統計 - 總表<?php if ( $_SESSION["lovebranch"] != "" ){ echo " - ".$_SESSION["lovebranch"]; }?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <?php
                $date1 = date("Y")."/1/1";
                $date2 = date("Y")."/12/31";
                $showbranch = "";

                if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
                    $showbranch = get_branch("好好玩旅行社,線上諮詢");
                }elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
                    $showbranch = $_SESSION["lovebranch"];
                }elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" || $_SESSION["MM_UserAuthorization"] == "manager" ){
                    $showbranch = $_SESSION["branch"];
                }

                if ( $showbranch == "" ){ $showbranch = $_SESSION["branch"];}
                $showbranch = clear_left_par($showbranch, ",");
                ?>

                <form id="sform" action="?st=search" method="post" target="_self" onsubmit="return sends()">
                    <p>
                        <select name="yy" id="yy">
                            <?php
							for ( $i=2014;$i<=date("Y");$i++){
                                echo "<option value='".$i."'";
                                if ( $i == date("Y") ){ echo " selected";}
                                echo ">".$i." 年</option>";
                            }
                            ?>	
                        </select>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
							$rbranch = $_REQUEST["branchs"];
							if ( $rbranch != "" ){
							    $rbranch = trim(str_replace($rbranch, " ", ""));
                            }
                            $showbranch_array = explode(",", substr($showbranch, 0, -1));
                        
                            for ( $a=1;$a<count($showbranch_array);$a++ ){
                                echo "<label><input type='checkbox' name='branchs' id='branchs' value='".$showbranch_array[$a-1]."'>&nbsp;".$showbranch_array[$a-1]." </label>&nbsp;&nbsp;";
                            }
						?>
                        <label><input type="checkbox" name="shown" value="1"> 顯示離職</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="送出" class="btn btn-default" style="margin-top:-8px">
                    </p>
                </form>

                <div id="outdiv"></div>
                <div id="outmsg" height=20 style="font-size:12px;display:none">讀取資料中...<img src='img/wait_loading.gif' align='middle'></div>			
            </div>
        </div><!--/span--> 
    </div><!--/row-->
		
</section><!--/.fluid-container-->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $mtu = "ad_single_count_love";
    $(function() {

    });

    function sends() {
        $cbx_group = $("input:checkbox[name='branchs']");
        if (!$cbx_group.is(":checked")) {
            alert("請選擇會館。");
            return false;
        }

        $bv = $("input:checkbox[name='branchs']:checked").map(function(_, el) {
            return $(el).val();
        }).get().join(",");
        button_set(0);
        if ($("#outtable")) $("#outtable").html("");
        $("#outmsg").html("讀取資料中...<img src='img/wait_loading.gif' align='middle'>");
        $("#outmsg").show();
        $.ajax({
            url: 'ad_single_count_love2.php?st=send',
            data: {
                yy: $("#yy").val(),
                branch: $bv,
                shown: $("#shown").val()
            },
            error: function(xhr) {
                console.log(xhr);
                alert('Ajax request 發生錯誤');
                button_set(1);
            },
            success: function(response) {
                alert(response)
                $("#outdiv").html(response);
            }
        });

        return false;
    }

    function outmsg_show(msg) {
        $("#outmsg").html(msg);
        //$('html, body').animate({scrollTop: $('body').height()}, 200);
    }

    function button_set(n) {
        if (n) {
            $(":button").attr("disabled", false);
            $(":submit").attr("disabled", false);
        } else {
            $(":button").attr("disabled", true);
            $(":submit").attr("disabled", true);
        }
    }

    function conutice_ajax(n1, n2, n3, n4, n5) {
        setTimeout(function() {
            $.ajax({
                url: 'ad_single_count_love2.php?st=send',
                data: {
                    yy: n1,
                    branch: n2,
                    shown: n3,
                    ii: n4,
                    topage: parseInt(n5) + 1
                },
                error: function(xhr) {
                    alert('Ajax request 發生錯誤');
                    button_set(1);
                },
                success: function(response) {
                    if ($("#outtable")) $("#outtable").append(response);
                    else $("#outdiv").html(response);
                }
            })
        }, 1000);
    }
</script>