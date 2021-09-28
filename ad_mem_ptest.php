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
            <li class="active">會員心理測驗 - 編號 2078498 - 黃煥諭</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員心理測驗 - 編號 2078498 - 黃煥諭 - <font color=#c22c7d>約會專家主帳號</font></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>



                    <a class="btn btn-primary" href="ad_mem_detail.php?mem_num=2078498">基本資料</a>

                    <a class="btn btn-blue" href="ad_mem_fix.php?mem_num=2078498">修改資料</a>

                    <a class="btn btn-info" href="ad_mem_service.php?mem_num=2078498">服務紀錄</a>
                    <a class="btn btn-danger" href="ad_mem_ptest.php?mem_num=2078498"><i class="fa fa-arrow-right" style="margin-top:3px;"></i>心理測驗</a>
                    <a class="btn btn-warning" href="ad_mem_login_log.php?mem_num=2078498">登入紀錄</a>
                    <a class="btn btn-dirtygreen" href="ad_important_paper.php?mem_num=2078498">紙本資料</a>

                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="92">
                                <div align="right">編號：</div>
                            </td>
                            <td width="267">2078498</td>
                            <td width="94">
                                <div align="right">身分證字號：</div>
                            </td>
                            <td width="269">L124923831</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">姓名：</div>
                            </td>
                            <td>黃煥諭</td>
                            <td>
                                <div align="right">電話/手機：</div>
                            </td>
                            <td>0910708051
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">資料時間：</div>
                            </td>
                            <td>2021/8/23 下午 01:50:52</td>
                            <td>
                                <div align="right">更新時間：</div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">最後登入時間：</div>
                            </td>
                            <td></td>
                            <td>
                                <div align="right">最後排約時間：</div>
                            </td>
                            <td>2021/8/24 下午 04:00:00</td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">處理情形：</div>
                            </td>
                            <td colspan=3>已排約</td>
                        </tr>
                </table>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td colspan="10">
                            <div align="center"><b>愛的五種語言</b></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="center">日期</div>
                        </td>
                        <td>
                            <div align="center">A</div>
                        </td>
                        <td>
                            <div align="center">B</div>
                        </td>
                        <td>
                            <div align="center">C</div>
                        </td>
                        <td>
                            <div align="center">D</div>
                        </td>
                        <td>
                            <div align="center">E</div>
                        </td>
                        <td>
                            <div align="center">會館/秘書</div>
                        </td>
                        <td>
                            <div align="center">ip</div>
                        </td>
                        <td>
                            <div align="center"></div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div align="center">2021/8/23 下午 01:55:05</div>
                        </td>
                        <td>
                            <div align="center">5</div>
                        </td>
                        <td>
                            <div align="center">9</div>
                        </td>
                        <td>
                            <div align="center">3</div>
                        </td>
                        <td>
                            <div align="center">6</div>
                        </td>
                        <td>
                            <div align="center">7</div>
                        </td>

                        <td>
                            <div align="center">台中/陳立姍</div>
                        </td>
                        <td>
                            <div align="center">211.75.220.227</div>
                        </td>
                        <td>
                            <div align="center"><a href="ad_mem_ptest_print.php?id=7713" target="_blank">查看/列印</a></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>

    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>