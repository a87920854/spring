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
            <li>好好玩管理系統</li>
            <li><a href="ad_b2b_mem.php">同業會員資料</a></li>
            <li class="active"> 修改會員詳細資料 - 劉小華2</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong> 修改會員詳細資料 - 劉小華2</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form action="?st=ed" class="form-inline" method="post" target="_self">
                    <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                        <tbody>

                            <tr>
                                <td width="92">
                                    <div align="right">編號：</div>
                                </td>
                                <td width="267">1<input type="hidden" name="auton" value="1"></td>
                                <td width="94">
                                    <div align="right">加入時間：</div>
                                </td>
                                <td width="269"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="right">帳號：</div>
                                </td>
                                <td>123123</td>
                                <td>
                                    <div align="right">密碼：</div>
                                </td>
                                <td><input type="text" name="mem_passwd" value="123123"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="right">同業簡稱：</div>
                                </td>
                                <td><input type="text" name="mem_name2" value="劉小華1"></td>
                                <td>
                                    <div align="right">公司名稱：</div>
                                </td>
                                <td><input type="text" name="mem_name3" value="劉小華3"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="right">聯絡人姓名：</div>
                                </td>
                                <td><input type="text" name="mem_name" value="劉小華2"></td>
                                <td>
                                    <div align="right">電話：</div>
                                </td>
                                <td><input type="text" name="mem_phone" value="22225988"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="right">手機：</div>
                                </td>
                                <td><input type="text" name="mem_mobile" value="0912345678"></td>
                                <td>
                                    <div align="right">傳真：</div>
                                </td>
                                <td><input type="text" name="mem_fax" value="22225988"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="right">電子信箱：</div>
                                </td>
                                <td><input type="text" name="mem_mail" value="aaabbb@msn.com"></td>
                                <td>
                                    <div align="right">統一編號：</div>
                                </td>
                                <td><input type="text" name="mem_num" value="123456789"></td>
                            </tr>
                            <tr>
                                <td colspan=4 align="center"><input type="submit" value="確定修改" class="btn btn-info" style="width:50%;"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>

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

<script type="text/javascript">
    $mtu = "ad_b2b_mem.";
</script>