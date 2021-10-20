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
            <li class="active">網站活動團控 - 三峽傳藝一日輕旅行[13399]</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>網站活動上傳 - 2021-11-07 08:00 - 三峽傳藝一日輕旅行[13399]</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">

                <p><a href="ad_action_list2_add.php?id=13399" class="btn btn-danger">新增參加人員</a>&nbsp;

                    <a href="#p" onclick="Mars_popup('ad_action_list2_view_print.php?s=p&id=13399','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');" class="btn btn-info">列印本頁</a>
                    <a class="btn btn-success" href="javascript:Mars_popup('ad_action_list2_view_print2.php?ac=13399','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i> 要保明細表</a>
                    <a class="btn btn-success" href="javascript:Mars_popup('ad_action_list2_view_print3.php?ac=13399','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i> 報名資料表</a>
                    <a href="ad_action_list2_upcsv.php?id=13399" class="btn btn-warning">匯入 CSV 檔案</a>&nbsp;<small><a href="ad_announce_view.php?id=252" target="_blank">匯入教學</a></small>

                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <td colspan=13>男：1 人、女： 0人、共： 1人 (備取人員將不會出現在要保明細中)</td>
                        </tr>
                        <tr>
                            <th>會員</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>手機</th>
                            <th>Email</th>
                            <th>地區</th>
                            <th>活動會館</th>
                            <th width=150>通知</th>
                            <th width=80>後五碼</th>
                            <th width=80>正備取</th>
                            <th width=80>證件</th>
                            <th>來源</th>
                            <th width="250">報名時間</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td><span class="label label-warning">春天會館</span></td>

                            <td align="center"><a href="#c" onclick="Mars_popup('ad_love_detail.php?k_id=243383','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=350,top=150,left=150');">劉柏均</a></td>
                            <td align="center">男</td>
                            <td class="center">0963433479</td>
                            <td class="center">y007449@yahoo.com.tw</td>


                            <td class="center">苗栗縣</td>
                            <td class="center">新竹</td>

                            <td class="center">
                                <input type="checkbox" onClick="Mars_popup('ad_action_list2_view.php?st=istell&v=1&id=243383','','width=300,height=200,top=100,left=100')">
                                <form style="border:0px;margin:0px;padding:0px;" id="searchform3" action="ad_action_list2_view.php?topage=&ac=13399&id=243383&st=istell2" method="post" target="_self" onsubmit="return save_b4($(this))"><input type="text" id="msg" name="msg" value="" rel="" style="width:150px;" placeholder="備註" onblur="save_b5($(this))"><input type="submit" style="border:0px;margin:0px;padding:0px;visibility:hidden;height:0px;width:0px;"></form>

                            </td>
                            <td class="center">
                                <form style="border:0px;margin:0px;padding:0px;" id="searchform2" action="ad_action_list2_view.php?topage=&ac=13399&id=243383&st=uppaynum" method="post" target="_self" onsubmit="return save_b3($(this))"><input type="text" id="k_pay_num" name="k_pay_num" value="" rel="" style="width:60px;" placeholder="後五碼" onblur="save_b1($(this))"><br><input type="text" id="k_pay_check" name="k_pay_check" value="" rel="" style="width:60px;" placeholder="對帳金額" onblur="save_b2($(this))"><input type="submit" style="border:0px;margin:0px;padding:0px;visibility:hidden;height:0px;width:0px;"></form>
                            </td>
                            <td class="center">備取　<a href="#" onClick="Mars_popup('ad_action_list2_view.php?st=k_be&v=1&id=243383','','width=300,height=200,top=100,left=100')">變</a></td>
                            <td class="center">
                                身正<br>身反
                            </td>


                            <td class="center">約會專家</td>

                            <td>2021/10/10 上午 10:03:07</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_add.php?kid=243383&id=13399"><i class="icon-edit"></i> 修改</a></li>
                                        <li><a href="#" onClick="Mars_popup2('ad_action_list2_view.php?st=del&id=243383','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
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