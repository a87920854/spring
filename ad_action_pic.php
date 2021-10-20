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
            <li><a href="ad_action_list.php">網站活動上傳</a></li>
            <li class="active">活動花絮</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動花絮 - 數量：0</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th colspan="9"><input type="checkbox" id="delnums"> <input id="delbutton" type="button" style="height:28px;" value="多選刪除">　<input type="button" onclick="Mars_popup('ad_action_pic_add.php?ac_auto=13415','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=500,height=300,top=150,left=150');" style="height:28px;" value="新增照片"></th>
                        </tr>
                        <tr>
                            <td colspan=8 height=200>目前沒有資料</td>
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

<script type="text/javascript">
    $mtu = "ad_action_list.";
    $(function() {

        $("#delnums").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", false);
                });
        });
        $("#delbutton").on("click", function() {
            var $dellist = [];
            $("input[name='nums']").each(function() {
                if ($(this).val() && $(this).prop("checked")) $dellist.push($(this).val());
            });
            if ($dellist.length <= 0) alert("請選擇要刪除的照片。");
            else Mars_popup('ad_action_pic.php?st=del&ac_auto=13415&ac_photo_auto=' + $dellist, '', 'status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=400,height=200,top=150,left=150');
        });
    });
</script>