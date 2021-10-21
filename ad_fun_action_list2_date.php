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
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action_list2.php">好好玩國外團控</a></li>
            <li class="active">釜山滑出萌萌的愛5日 報名/花絮</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>釜山滑出萌萌的愛5日 報名/花絮</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td width=120>出發日期請從行程頁設計中增刪</td>
                    </tr>
                </table>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <th width=140>出發日期</th>
                        <th>報名人數</th>
                        <th>花絮</th>
                        <th width=80></th>
                    </tr>

                    <tr>
                        <td>2020/12/16</td>
                        <td>
                            <a href="ad_fun_action_list_singup2.php?ac=1983&da=2020/12/16">1 人</a>　(男： 正取 0 人/備取 0 人/共 0 人、女：正取 1 人/備取 0 人/共 1 人)
                        </td>
                        <td></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                <ul class="dropdown-menu pull-right">

                                    <li><a href="ad_fun_action_pic2.php?ac_auto=1983&d=2020/12/16"><i class="icon-trash"></i> 花絮</a></li>
                                    <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2_date.php?st=del&an=517&ac=1983','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                </ul>
                            </div>
                        </td>
                    </tr>


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

<script type="text/javascript">
    $mtu = "ad_fun_action_list2.";
    $(function() {

    });

    function check_add_submit() {
        if (!$("#dates").val()) {
            alert("請輸入要新增的出發日期。");
            $("#dates").focus();
            return false;
        }
        return true;
    }
</script>