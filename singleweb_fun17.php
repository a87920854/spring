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
            <li class="active">首頁推薦會員</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>首頁推薦會員</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

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

                            <tr id="row_1348063">
                                <td>1348063</td>
                                <td class="center"><a href="ad_mem_detail.php?mem_num=1348063" target="_blank">蘇孟霖</a>
                                    <div style="float:right">
                                        &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span></div>
                                </td>
                                <td class="center">男</td>
                                <td class="center">1987/8/22　　34 歲</td>
                                <td class="center">碩士</td>


                                <td class="center">
                                    <font color=green>受理：</font>台南 - 杜佳倩<br>
                                    <font color=green>排約：</font>顏琇<br>
                                    <font color=green>邀約：</font>台南 - 杜佳倩<br>
                                    <font color=blue>輸入：</font>張素慈
                                </td>
                                <td class="center">
                                    <a href="../photo/20211018101447_1348063_997280.jpeg?t=7054" class="fancybox"><img src="../photo/20211018101447_1348063_997280.jpeg?t=5333" width="100"></a>
                                </td>
                                <td>
                                    <a href="#r" onclick="agree($(this), '1348063')" class="btn btn-success">通過</a><a href="#r" onclick="remove($(this), '1348063')" class="btn btn-danger">移除</a>

                                </td>
                            </tr>

                            <tr id="row_719957">
                                <td>719957</td>
                                <td class="center"><a href="ad_mem_detail.php?mem_num=719957" target="_blank">劉明諺</a>
                                    <div style="float:right">
                                        &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span></div>
                                </td>
                                <td class="center">男</td>
                                <td class="center">1980/9/27　　41 歲</td>
                                <td class="center">大學</td>


                                <td class="center">
                                    <font color=green>受理：</font>台南 - 錢淑華<br>
                                    <font color=green>排約：</font>金雪娟<br>
                                    <font color=green>邀約：</font>八德 - 蔡佩蓁 Sunny
                                </td>
                                <td class="center">
                                    <a href="../photo/20211011142155_719957_158810.jpg?t=5794" class="fancybox"><img src="../photo/20211011142155_719957_158810.jpg?t=2895" width="100"></a>
                                </td>
                                <td>
                                    <a href="#r" onclick="agree($(this), '719957')" class="btn btn-success">通過</a><a href="#r" onclick="remove($(this), '719957')" class="btn btn-danger">移除</a>

                                </td>
                            </tr>

                            <tr id="row_2086723">
                                <td>2086723</td>
                                <td class="center"><a href="ad_mem_detail.php?mem_num=2086723" target="_blank">李堃寧</a>
                                    <div style="float:right">
                                        &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span></div>
                                </td>
                                <td class="center">男</td>
                                <td class="center">1985/6/7　　36 歲</td>
                                <td class="center">大學</td>


                                <td class="center">
                                    <font color=green>受理：</font>台南 - 杜佳倩<br>
                                    <font color=green>排約：</font>顏琇<br>
                                    <font color=green>邀約：</font>台南 - 杜佳倩<br>
                                    <font color=blue>輸入：</font>台南督導
                                </td>
                                <td class="center">
                                    <a href="../photo/2021102125410_2086723_868679.jpg?t=3019" class="fancybox"><img src="../photo/2021102125410_2086723_868679.jpg?t=7746" width="100"></a>
                                </td>
                                <td>
                                    <a href="#r" onclick="agree($(this), '2086723')" class="btn btn-success">通過</a><a href="#r" onclick="remove($(this), '2086723')" class="btn btn-danger">移除</a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center">共 98 筆、第 1 頁／共 2 頁&nbsp;&nbsp;
                    <ul class='pagination pagination-md'>
                        <li><a href=/singleweb_fun17.php?topage=1>第一頁</a></li>
                        <li class='active'><a href="#">1</a></li>
                        <li><a href=/singleweb_fun17.php?topage=2 class='text'>2</a></li>
                        <li><a href=/singleweb_fun17.php?topage=2 class='text' title='Next'>下一頁</a></li>
                        <li><a href=/singleweb_fun17.php?topage=2 class='text'>最後一頁</a></li>
                        <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="/singleweb_fun17.php?topage=1" selected>1</option>
                                <option value="/singleweb_fun17.php?topage=2">2</option>
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
            url: "singleweb_fun17.php",
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
            url: "singleweb_fun17.php",
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
            url: "singleweb_fun17.php",
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