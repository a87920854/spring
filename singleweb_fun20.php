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
            <li class="active">EDM推薦會員</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>EDM推薦會員</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div id="content" class="span10">
                    <p>
                        <a class="btn btn-success" href="?sex=2">男生</a>
                        <a class="btn btn-pink" href="?sex=1">女生</a>
                        <a class="btn btn-info" href="singleweb_fun20.php">全部</a>
                    </p>
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

                            <tr id="row_1944557">
                                <td>1944557</td>
                                <td class="center"><a href="ad_mem_detail.php?mem_num=1944557" target="_blank">黃仁亨</a>
                                    <div style="float:right">
                                        &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span></div>
                                </td>
                                <td class="center">男</td>
                                <td class="center">1995/5/27　　26 歲</td>
                                <td class="center">高職</td>


                                <td class="center">
                                    <font color=green>受理：</font>台南 - 吳琪雅<br>
                                    <font color=green>排約：</font>顏琇<br>
                                    <font color=green>邀約：</font>台南 - 吳琪雅<br>
                                    <font color=blue>輸入：</font>台南督導
                                </td>
                                <td class="center">
                                    <a href="../photo/20218815506_1944557_781475.jpg?t=7054" class="fancybox"><img src="../photo/20218815506_1944557_781475.jpg?t=5333" width="100"></a>
                                </td>
                                <td>
                                    <a href="#r" onclick="remove($(this), '1944557')" class="btn btn-danger">移除</a>

                                </td>
                            </tr>

                            <tr id="row_1944014">
                                <td>1944014</td>
                                <td class="center"><a href="ad_mem_detail.php?mem_num=1944014" target="_blank">楊紹平</a>
                                    <div style="float:right">
                                        &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span></div>
                                </td>
                                <td class="center">男</td>
                                <td class="center">1978/6/1　　43 歲</td>
                                <td class="center">高中</td>


                                <td class="center">
                                    <font color=green>受理：</font>台北 - 詹明錡<br>
                                    <font color=green>排約：</font>陳紅<br>
                                    <font color=green>邀約：</font>高雄 - 蕭雪麗<br>
                                    <font color=blue>輸入：</font>吳主任
                                </td>
                                <td class="center">
                                    <a href="../photo/202072722832_1944014_519543.JPG?t=5794" class="fancybox"><img src="../photo/202072722832_1944014_519543.JPG?t=2895" width="100"></a>
                                </td>
                                <td>
                                    <a href="#r" onclick="remove($(this), '1944014')" class="btn btn-danger">移除</a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center">共 627 筆、第 1 頁／共 13 頁&nbsp;&nbsp;
                    <ul class='pagination pagination-md'>
                        <li><a href=/singleweb_fun20.php?topage=1>第一頁</a></li>
                        <li class='active'><a href="#">1</a></li>
                        <li><a href=/singleweb_fun20.php?topage=2 class='text'>2</a></li>
                        <li><a href=/singleweb_fun20.php?topage=3 class='text'>3</a></li>
                        <li><a href=/singleweb_fun20.php?topage=4 class='text'>4</a></li>
                        <li><a href=/singleweb_fun20.php?topage=5 class='text'>5</a></li>
                        <li><a href=/singleweb_fun20.php?topage=6 class='text'>6</a></li>
                        <li><a href=/singleweb_fun20.php?topage=7 class='text'>7</a></li>
                        <li><a href=/singleweb_fun20.php?topage=8 class='text'>8</a></li>
                        <li><a href=/singleweb_fun20.php?topage=9 class='text'>9</a></li>
                        <li><a href=/singleweb_fun20.php?topage=10 class='text'>10</a></li>
                        <li><a href=/singleweb_fun20.php?topage=2 class='text' title='Next'>下一頁</a></li>
                        <li><a href=/singleweb_fun20.php?topage=13 class='text'>最後一頁</a></li>
                        <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="/singleweb_fun20.php?topage=1" selected>1</option>
                                <option value="/singleweb_fun20.php?topage=2">2</option>
                                <option value="/singleweb_fun20.php?topage=3">3</option>
                                <option value="/singleweb_fun20.php?topage=4">4</option>
                                <option value="/singleweb_fun20.php?topage=5">5</option>
                                <option value="/singleweb_fun20.php?topage=6">6</option>
                                <option value="/singleweb_fun20.php?topage=7">7</option>
                                <option value="/singleweb_fun20.php?topage=8">8</option>
                                <option value="/singleweb_fun20.php?topage=9">9</option>
                                <option value="/singleweb_fun20.php?topage=10">10</option>
                                <option value="/singleweb_fun20.php?topage=11">11</option>
                                <option value="/singleweb_fun20.php?topage=12">12</option>
                                <option value="/singleweb_fun20.php?topage=13">13</option>
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
            url: "singleweb_fun20.php",
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
            url: "singleweb_fun20.php",
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
            url: "singleweb_fun20.php",
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