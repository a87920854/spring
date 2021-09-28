<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php")
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_mem.php">會員管理系統</a></li>
            <li class="active">會員登入紀錄 - 編號 2077518 - 陳云晞</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員登入紀錄 - 編號 2077518 - 陳云晞 - <font color=#c22c7d>約會專家主帳號</font></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>



                    <a class="btn btn-primary" href="ad_mem_detail.php?mem_num=2077518">基本資料</a>

                    <a class="btn btn-blue" href="ad_mem_fix.php?mem_num=2077518">修改資料</a>

                    <a class="btn btn-info" href="ad_mem_service.php?mem_num=2077518">服務紀錄</a>
                    <a class="btn btn-danger" href="ad_mem_ptest.php?mem_num=2077518">心理測驗</a>
                    <a class="btn btn-warning" href="ad_mem_login_log.php?mem_num=2077518"><i class="fa fa-arrow-right" style="margin-top:3px;"></i>登入紀錄</a>
                    <a class="btn btn-dirtygreen" href="ad_important_paper.php?mem_num=2077518">紙本資料</a>

                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="92">
                                <div align="right">編號：</div>
                            </td>
                            <td width="267">2077518</td>
                            <td width="94">
                                <div align="right">身分證字號：</div>
                            </td>
                            <td width="269">A290147286</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">姓名：</div>
                            </td>
                            <td>陳云晞</td>
                            <td>
                                <div align="right">電話/手機：</div>
                            </td>
                            <td>0958006986
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="right">資料時間：</div>
                            </td>
                            <td>2021/8/19 上午 11:45:18</td>
                            <td>
                                <div align="right">更新時間：</div>
                            </td>
                            <td>2021/8/31 下午 08:08:00</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">最後登入時間：</div>
                            </td>
                            <td></td>
                            <td>
                                <div align="right">最後排約時間：</div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">處理情形：</div>
                            </td>
                            <td colspan=3>已邀約</td>
                        </tr>
                </table>

                </table>

            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>

    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>