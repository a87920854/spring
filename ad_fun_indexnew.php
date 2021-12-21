<?php
    /*****************************************/
    //檔案名稱：ad_fun_history_count.php
    //後台對應位置：好好玩管理系統/國內首頁最新消息
    //改版日期：2021.12.20
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
    if ($_SESSION["MM_UserAuthorization"] == "action") {
        call_alert("您沒有查看此頁的權限。", "login.php", 0);
    }

    // 刪除新聞
    if($_REQUEST["st"] == "del"){
        $SQL = "delete from web_data where types='oindex_marquee' and auton=".SqlFilter($_REQUEST["an"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("ad_fun_indexnew.php");
        }
    }

    // 新增新聞
    if($_REQUEST["st"] == "addnew"){
        if($_REQUEST["n2"] != ""){
            $n2 = SqlFilter($_REQUEST["n2"],"tab");
        }
        $SQL =  "INSERT INTO web_data (n1, n2, types, t1) VALUES ('"
                .SqlFilter($_REQUEST["n1"],"tab")."', '"
                .$n2."', 
                'oindex_marquee', '"
                .date("Y/m/d H:i:s")."')";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("ad_fun_indexnew.php");
        }
    }


?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">國內首頁最新消息</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>國內首頁最新消息</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td width="50%">訊息</td>
                            <td width="20%">連結</td>
                            <td width="20%">時間</td>
                            <td></td>
                        </tr>
                        <?php 
                            $SQL = "select * from web_data where types='oindex_marquee' order by t1 desc";
                            $rs = $FunConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if($result){
                                foreach($result as $re){ 
                                    echo "<tr>";
                                    echo "<td>".$re["n1"]."</td>";
                                    echo "<td>".$re["n2"]."</td>";
                                    echo "<td>".changeDate($re["t1"])."</td>";
                                    echo "<td><a href=\"?st=del&an=".$re["auton"]."\">刪除</a></td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>

                <br>
                <p>新增最新消息</p>
                <form id="searchform" action="ad_fun_indexnew.php?st=addnew" method="post" target="_self" onsubmit="return chk_add_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tr>
                            <td>訊息：<input type="text" name="n1" id="n1" style="width:80%;"></td>
                            <td width="30%">連結：<input type="text" name="n2" id="n2" style="width:80%;"></td>
                            <td width="5%"><input type="submit" value="新增"></td>
                        </tr>
                    </table>
                </form>
            </div>
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
    function chk_add_form() {
        if (!$("#n1").val()) {
            alert("請輸入訊息。");
            $("#n1").focus();
            return false;
        }
        return true;
    }
</script>