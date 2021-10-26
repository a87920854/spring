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
            <li class="active">交友大廳會員</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>交友大廳會員</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form action="?st=add" method="post" target="_self" onsubmit="return chk_add_form()" class="form-inline" style="display:inline-block;margin:0px;">
                    <input type="text" name="num" id="num" class="form-control" placeholder="請輸入要新增的會員編號" required>&nbsp;<input type="submit" class="btn btn-info" value="新增">
                </form>
                </p>
                <div id="content" class="span10">
                    <!-- content starts -->
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <th>編號</th>
                                <th>姓名</th>
                                <th>性別</th>
                                <th>生日</th>
                                <th>學歷</th>
                                <th width=160>秘書</th>
                                <th width=60>照片</th>
                                <th width=200></th>
                            </tr>

                            <tr id="row_1821137">
                                <td>1821137</td>
                                <td class="center"><a href="ad_mem_detail.php?mem_num=1821137" target="_blank">石靖鎂</a>
                                    <div style="float:right">
                                    </div>
                                </td>
                                <td class="center">女</td>
                                <td class="center">1997/8/22　　24 歲</td>
                                <td class="center">高職</td>


                                <td class="center">
                                    <font color=green>受理：</font>桃園 - 廖盈綺
                                </td>
                                <td class="center">
                                    <a href="../photo/2019729134759_1821137_463.jpg?t=7054" class="fancybox"><img src="../photo/2019729134759_1821137_463.jpg?t=5333" width="100"></a>
                                </td>
                                <td>
                                    <a href="#r" onclick="remove($(this), '1821137')" class="btn btn-danger">移除</a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center">共 20 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                    <ul class='pagination pagination-md'>
                        <li><a href=/singleweb_fun23.php?topage=1>第一頁</a></li>
                        <li class='active'><a href="#">1</a></li>
                        <li><a href=/singleweb_fun23.php?topage=1 class='text'>最後一頁</a></li>
                        <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="/singleweb_fun23.php?topage=1" selected>1</option>
                            </select></li>
                    </ul>
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

<script language="JavaScript">
    $(function() {

    });

    function agree($this, $num) {
        $.ajax({
            url: "singleweb_fun23.php",
            data: {
                st: "agree",
                t: $num
            },
            type: "POST",
            dataType: 'text',
            success: function(msg) {
                switch (msg) {
                    case "fix":
                        $this.removeClass("btn-success").addClass("btn-info").html("取消展示").off("click").on("click", function() {
                            cancel($this, $num);
                        });
                        break;
                    default:
                        alert("error:" + msg);
                        break;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }

    function cancel($this, $num) {
        $.ajax({
            url: "singleweb_fun23.php",
            data: {
                st: "cancel",
                t: $num
            },
            type: "POST",
            dataType: 'text',
            success: function(msg) {
                switch (msg) {
                    case "fix":
                        $this.removeClass("btn-info").addClass("btn-success").html("通過").off("click").on("click", function() {
                            agree($this, $num);
                        });
                        break;
                    default:
                        alert("error:" + msg);
                        break;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }

    function remove($this, $num) {
        $.ajax({
            url: "singleweb_fun23.php",
            data: {
                st: "remove",
                t: $num
            },
            type: "POST",
            dataType: 'text',
            success: function(msg) {
                switch (msg) {
                    case "fix":
                        $("#row_" + $num).fadeOut();
                        break;
                    default:
                        alert("error:" + msg);
                        break;
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }
</script>