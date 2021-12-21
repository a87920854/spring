<?php
    /*****************************************/
    //檔案名稱：ad_fun_allemail_list.php
    //後台對應位置：好好玩管理系統/電子信箱列
    //改版日期：2021.12.21
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
    if ($_SESSION["MM_UserAuthorization"] != "admin") {
        if($_SESSION["funtourpm"] != "1"){
            call_alert("您沒有查看此頁的權限。", 0, 0);
        }        
    }

    // 刪除mail
    if($_REQUEST["st"] == "del"){
        $SQL = "delete from emailpaper where auton=" .SqlFilter($_REQUEST["an"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=刪除中");
        }
    }

    if($_REQUEST["y1"] != ""){
        $y1 = SqlFilter($_REQUEST["y1"],"tab"). " 00:00";
    }else{
        $y1 = date("Y")."/".date("m")."/1" . " 00:00";
    }

    if($_REQUEST["y2"] != ""){
        $y2 = SqlFilter($_REQUEST["y2"],"tab"). " 23:59";
    }else{
        $y2 = date("Y/m/d"). " 23:59";
    }
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">電子信箱列表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>電子信箱列表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>
                <form name="form1" method="post" action="?vst=full" style="font-size:13px;">
                    日期： <input type="text" name="y1" class="datepicker" autocomplete="off" style="width:120px;" value="<?php echo Date_EN($y1,1); ?>"> 至
                    <input type="text" name="y2" class="datepicker" autocomplete="off" style="width:120px;" value="<?php echo Date_EN($y2,1); ?>">　<input type="submit" name="Submit" style="height:28px;margin-top:-7px;" value="查詢">
                </form>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <?php 
                        $tsql = " between '".$y1."' and '".$y2."'";
                        $SQL = "select email as e, times as t, '電子報訂閱' as c from emailpaper where times".$tsql." UNION ALL";
                        $SQL .= " select mem_mail as e, mem_time as t, '金卡會員' as c from goldcard_data where (NOT (noemail = 1)) and ((select count(auton) from emailpaper where emailpaper.email = goldcard_data.mem_mail) <= 0) and mem_time".$tsql." UNION ALL";
                        $SQL .= " select mem_mail as e, mem_time as t, '好好玩會員' as c from member_data where (NOT (noemail = 1)) and ((select count(mem_auto) from goldcard_data where goldcard_data.mem_mail = member_data.mem_mail) <= 0) and ((select count(auton) from emailpaper where emailpaper.email = member_data.mem_mail) <= 0) and mem_time".$tsql." UNION ALL";
                        $SQL .= " select k_yn as e, k_time as t, '報名資料' as c from love_keyin as lkdb1 where (NOT (noemail = 1)) and ((select count(k_id) from love_keyin as lkdb2 where lkdb1.k_yn = lkdb2.k_yn and lkdb2.k_time > lkdb1.k_time) <= 0) and ((select count(mem_auto) from member_data where member_data.mem_mail = lkdb1.k_yn) <= 0) and ((select count(mem_auto) from goldcard_data where goldcard_data.mem_mail = lkdb1.k_yn) <= 0) and ((select count(auton) from emailpaper where emailpaper.email = lkdb1.k_yn) <= 0) and k_time".$tsql." ";
                        $SQL .= "order by t desc";

                        $rs = $FunConn->prepare($SQL);
                        $rs->execute();
                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                        $count = count($result);
                       
                        if($result){
                            echo "<p>統計共 ".$count." 筆</p>";
                            echo "<tr><th width=200>時間</th><th>信箱</th><th width=100>來源</th></tr>";
                            foreach($result as $re){
                                echo "<tr><td>".changeDate($re["t"])."</td><td>".$re["e"]."</td><td>".$re["c"]."</td></tr>";
                            }
                        }                        
                    ?>
                </table>

            </div>
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