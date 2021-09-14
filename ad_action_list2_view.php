<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_action_list.php">網站活動上傳</a></li>
            <li class="active">網站活動團控 - 實體聯誼【單身週末舞會】[13169]</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>網站活動上傳 - 2021-09-25 19:00 - 實體聯誼【單身週末舞會】[13169]</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">

                <p><a href="ad_action_list2_add.php?id=13169" class="btn btn-danger">新增參加人員</a>&nbsp;

                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td colspan=8>暫無資料</td>
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
require("./include/_bottom.php");
?>

<script type="text/javascript">
    $mtu = "ad_action_list.";
    $(function() {


        $(".show_check").on("click", function() {
            var $this = $(this),
                $num = $this.val(),
                $savediv = $("<div>儲存中</div>");
            $this.parent().append($savediv);
            if ($this.prop("checked")) $v = 1;
            else $v = 0;
            $.ajax({
                url: "ad_action_list2_view.php",
                data: {
                    st: "isbe",
                    t: $num,
                    v: $v
                },
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });
    });

    function save_b1(thisv) {
        if (thisv.parent().attr("action").length) {
            if (thisv.val() == thisv.attr("rel")) return false;
            var $savediv = $("<div>儲存中</div>"),
                $vv;
            thisv.parent().append($savediv);
            if (thisv.val() == "") $vv = "none";
            else $vv = thisv.val();
            $.ajax({
                url: thisv.parent().attr("action"),
                data: {
                    k_pay_num: $vv
                },
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    thisv.attr("rel", thisv.val());
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    }

    function save_b2(thisv) {
        if (thisv.parent().attr("action").length) {
            if (thisv.val() == thisv.attr("rel")) return false;
            var $savediv = $("<div>儲存中</div>"),
                $vv;
            thisv.parent().append($savediv);
            if (thisv.val() == "") $vv = "none";
            else $vv = thisv.val();
            $.ajax({
                url: thisv.parent().attr("action"),
                data: {
                    k_pay_check: $vv
                },
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    thisv.attr("rel", thisv.val());
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    }

    function save_b3(thisv) {
        if (thisv.attr("action").length) {
            var $savediv = $("<div>儲存中</div>");
            thisv.append($savediv);
            $.ajax({
                url: thisv.attr("action") + "&full=1",
                data: thisv.serialize(),
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    }

    function save_b4(thisv) {
        if (thisv.attr("action").length) {
            var $savediv = $("<div>儲存中</div>");
            thisv.append($savediv);
            $.ajax({
                url: thisv.attr("action"),
                data: thisv.serialize(),
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    }

    function save_b5(thisv) {
        if (thisv.parent().attr("action").length) {
            if (thisv.val() == thisv.attr("rel")) return false;
            var $savediv = $("<div>儲存中</div>"),
                $vv;
            thisv.parent().append($savediv);
            if (thisv.val() == "") $vv = "none";
            else $vv = thisv.val();
            $.ajax({
                url: thisv.parent().attr("action"),
                data: {
                    msg: $vv
                },
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    thisv.attr("rel", thisv.val());
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    }
</script>