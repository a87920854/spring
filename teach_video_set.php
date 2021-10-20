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
            <li><a href="index.asp">管理系統</a></li>
            <li><a href="teach_video.asp">教學影片</a></li>
            <li class="active">授權設定</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>授權設定</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <form action="?st=add" method="post" id="form1">
                            <tr>
                                <td>
                                    請選擇要授權的會館：
                                    <select name="pay1" id="pay1" required>
                                        <option value="">請選擇</option>
                                        <option value="台北">台北</option>
                                        <option value="桃園">桃園</option>
                                        <option value="新竹">新竹</option>
                                        <option value="台中">台中</option>
                                        <option value="台南">台南</option>
                                        <option value="高雄">高雄</option>
                                        <option value="八德">八德</option>
                                        <option value="約專">約專</option>
                                        <option value="迷你約">迷你約</option>
                                        <option value="總管理處">總管理處</option>
                                    </select>
                                    　秘書：
                                    <select name="pay2" id="pay2" required>
                                        <option value="">請選擇</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    影片區域： <select name="types" id="types" required>
                                        <option value="">請選擇</option>
                                        <option value="管制區">管制區(需督導授權)</option>

                                        <option value="限制區">限制區(需總公司授權)</option>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                    授權時間： 2021-10-20 11:18 起算至 2021-10-20 13:18，共 <span style="color:red">120</span> 分鐘。
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div align="center">

                                        <input id="submit3" type="submit" value="確定授權" class="btn btn-info" style="width:50%;">
                                    </div>
                                </td>
                            </tr>
                        </form>
                    </tbody>
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

<script type="text/javascript">
    $mtu = "teach_video.";
    $(function() {
        $("#pay1").on("change", function() {
            personnel_get("pay1", "pay2");
        });
    });
</script>