<?php
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li>約會專家系統</li>
            <li class="active">GT活動管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>GT活動管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="新增GT活動" onclick="location.href='singleweb_fun22_add.php'"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th width=120>圖片</th>
                            <th>活動標題</th>
                            <th>簡介</th>

                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=2710&i1=1"><span class="fa fa-arrow-down"></span></a></td>
                            <td>
                                有
                            </td>
                            <td>偽日本遊正夯！女孩浴衣體驗！</td>
                            <td>活動名稱：偽日本遊正夯！女孩浴衣體驗活動時間：2021/10/23（六）10:00~17:00集合地點：中壢火車站（確切地點請見行前通知）活動地點：蛋寶生技不老村(桃園市平鎮區金陵路三段105號)報名條件：20-40歲單身未婚女性/有穩定正當工作報名費用：700元/人（原價$1500元）💗費用包含：✅專屬巴士接送、✅日式浴衣體驗、✅蛋塔DIY體驗、✅輕食餐點、✅保險、✅活動遊戲費用活動人數：12人，最低成團人數6人</td>

                            <td>
                                <a href="singleweb_fun22_add.php?an=2710">編輯</a>
                                <a title="刪除" href="singleweb_fun22.php?st=del&an=2710">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=2711&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=2711&i1=1"><span class="fa fa-arrow-down"></span></a></td>
                            <td>
                                有
                            </td>
                            <td>迷人上海風穿搭體驗－復古女神就是妳！</td>
                            <td>活動時間：2020/10/30(六)下午14:30-17:00活動地點：桃園市報名條件：20-40歲單身未婚女性/有穩定正當工作報名費用：800/人活動人數：16人，最低成團人數10人</td>

                            <td>
                                <a href="singleweb_fun22_add.php?an=2711">編輯</a>
                                <a title="刪除" href="singleweb_fun22.php?st=del&an=2711">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=2712&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td>
                                有
                            </td>
                            <td>Ｍr.right在哪裡？愛情卡告訴妳！</td>
                            <td>活動時間：2021/10/31(日)下午16:00-18:00活動地點：台北市報名條件：20-40歲單身未婚女性/有穩定正當工作報名費用：650元/人活動人數：12人，最低成團人數3人</td>

                            <td>
                                <a href="singleweb_fun22_add.php?an=2712">編輯</a>
                                <a title="刪除" href="singleweb_fun22.php?st=del&an=2712">刪除</a>
                            </td>
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
require_once("./include/_bottom.php");
?>