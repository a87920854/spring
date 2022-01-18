<?php

    /*****************************************/
    //檔案名稱：ad_secretary_group_fanpai.php
    //後台對應位置：管理系統/秘書資料>團隊管理>分配隊員
    //改版日期：2022.1.18
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
        call_alert("您沒有查看此頁的權限。", "login.php", 0);
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li><a href="ad_secretary_group.asp">團隊管理</a></li>
            <li class="active">為 TEST 分配隊員</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>為 TEST 分配隊員</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form method="post" class="nomargin" action="ad_secretary_group_fanpai.asp?st=add_people" onsubmit="return chk_form()">
                    <p>
                        <lable><b>新增 TEST 隊員：</b>
                            <select name="add_people" id="add_people">
                                <option value="">請選擇</option>
                                <option value="jack1111">jack1111 - 可選擇</option>
                                <option value="JACK0906" disabled>JACK - 已加入 TEST</option>
                                <option value="tsaiwen216">采雯 - 可選擇</option>
                                <option value="u9033025">Zoe周羿彤老師 - 可選擇</option>
                                <option value="F121287192">董事長 - 可選擇</option>
                                <option value="202104list">202104名單 - 可選擇</option>
                                <option value="system_linepoint">LINEPOINT - 可選擇</option>
                                <option value="F555645667">TEST別名 - 可選擇</option>
                                <option value="nouse3">空號 - 可選擇</option>
                                <option value="nouse2">已結婚 - 可選擇</option>
                                <option value="nouse1">無效名單 - 可選擇</option>
                                <option value="20190719list">暫存名單 - 可選擇</option>
                                <option value="li2003avon818">會員結婚 - 可選擇</option>
                                <option value="candy8060">宜君 - 可選擇</option>
                                <option value="Q12345">瑪那熊 - 可選擇</option>
                                <option value="li2003avon">回收名單 - 可選擇</option>
                                <option value="DMNDMN">DMN名單 - 可選擇</option>
                                <option value="hannah0807">曉娟 - 可選擇</option>
                                <option value="funpm">瑜婷 - 可選擇</option>
                                <option value="sheery03130513">點點 - 可選擇</option>
                                <option value="F220902530">zoe - 可選擇</option>
                                <option value="kyoe">澔翰 - 可選擇</option>
                                <option value="single">秋如 - 可選擇</option>
                                <option value="li6954029">黎總經理 - 可選擇</option>
                            </select>
                            <input type="hidden" name="an" value="8">
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input class="btn btn-default" type="submit" value="新增隊員">
                        </lable>
                    </p>
                </form>
                </p>
                <p>隸屬會館：總管理處</p>
                <p>目前 TEST 的團隊經理是：JACK</p>
                <p><b>在 TEST 中的隊員有：</b></p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td>目前沒有任何隊員</td>
                        </tr>

                    </tbody>
                </table>

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
    require_once("./include/_bottom.php")
?>

<script type="text/javascript">
    $(function() {

    });

    function chk_form() {
        if (!$("#add_people").val()) {
            alert("請選擇隊員。");
            return false;
        }
        return true;
    }
</script>