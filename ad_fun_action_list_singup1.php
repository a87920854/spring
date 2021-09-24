<?php
require_once("./include/_inc.php");
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
            <li><a href="ad_fun_action_list1.php">好好玩國內團控</a></li>
            <li>桃源仙谷遇見愛｜遊賞花田+祕境探索+烤肉饗宴+拍照任務【無法成團將不另行通知】</li>
            <li class="active">報名詳細資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>桃源仙谷遇見愛｜遊賞花田+祕境探索+烤肉饗宴+拍照任務【無法成團將不另行通知】 - 報名詳細資料</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <a href="ad_fun_action_list_padd.php?ac=3059" class="btn btn-info"><i class="icon-plus-sign"></i> 新增本活動的報名資料</a>
                    <form id="searchform" action="ad_fun_action_list_singup1.php?ac=3059&vst=full" method="post" target="_self" class="form-inline" onsubmit="return check_send_submit()">
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <td>姓名：<input name="s1" id="s1" type="text" class="form-control"></td>
                            <td>手機：<input name="s2" id="s2" type="text" class="form-control"></td>
                            <td><input type="submit" value="搜尋" class="btn btn-default"></td>
                            </tr>
                        </table>
                    </form>
                </div>

                <p><b>男：正取 2/備取 0 人、女：正取 0/備取 0 人、共：2 人　(備取人員將不會出現在要保明細中)</b></p>

                <p><a class="btn btn-success" href="javascript:Mars_popup('ad_fun_action_list_singup1_print.php?ac=3059','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i> 要保明細表</a>
                    <a class="btn btn-success" href="javascript:Mars_popup('ad_fun_action_list_singup1_print2.php?ac=3059','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i> 報名資料表</a>
                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=120>身分證字號</th>
                            <th width=160>姓名</th>
                            <th width=60>性別</th>
                            <th width=80>生日</th>
                            <th width=120>手機</th>
                            <th>Email</th>
                            <th width=130>職業</th>
                            <th width=80>後五碼</th>
                            <th width=60>正備取</th>
                            <th width=80>證件</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="center">F124684344</td>
                            <td class="center"><a href="javascript:Mars_popup('ad_fun_detail.php?k_id=49760','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');">
                                    <font color="blue">陳宇新</font>
                                </a><br>2021/9/5 下午 04:38:00　</td>
                            <td class="center">男</td>
                            <td class="center">1980/4/30</td>
                            <td class="center">0907095975</td>
                            <td class="center">yuxinc85@gmail.com</td>
                            <td class="center">丰上工業股份有限公司</td>
                            <td class="center">
                                <form style="border:0px;margin:0px;padding:0px;" id="searchform2" action="ad_fun_action_list_singup1.php?topage=&ac=3059&id=49760&st=uppaynum" method="post" target="_self" onsubmit="return save_b3($(this))"><input type="text" id="k_pay_num" name="k_pay_num" value="" rel="" style="width:60px;" placeholder="後五碼" onblur="save_b1($(this))"><br><input type="text" id="k_pay_check" name="k_pay_check" value="0" rel="0" style="width:60px;" placeholder="對帳金額" onblur="save_b2($(this))"><input type="submit" style="border:0px;margin:0px;padding:0px;visibility:hidden;height:0px;width:0px;"></form>
                            </td>
                            <td class="center">正取　<a href="#" onClick="Mars_popup('ad_fun_action_list_singup1.php?st=k_be&v=1&id=49760','','width=300,height=200,top=100,left=100')">變</a></td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_fun_detail.php?k_id=49760','','location=yes,status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_padd.php?id=49760&ac=3059"><i class="icon-edit"></i> 修改</a></li>
                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list_singup1.php?st=del&id=49760','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">K122009507</td>
                            <td class="center"><a href="javascript:Mars_popup('ad_fun_detail.php?k_id=49757','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');">
                                    <font color="blue">鍾欣儒</font>
                                </a><br>2021/9/1 下午 02:19:00　</td>
                            <td class="center">男</td>
                            <td class="center">1985/7/17</td>
                            <td class="center">0973231973</td>
                            <td class="center">Shin-Ru.Chung@quantatw.com</td>
                            <td class="center">廣達電腦</td>
                            <td class="center">
                                <form style="border:0px;margin:0px;padding:0px;" id="searchform2" action="ad_fun_action_list_singup1.php?topage=&ac=3059&id=49757&st=uppaynum" method="post" target="_self" onsubmit="return save_b3($(this))"><input type="text" id="k_pay_num" name="k_pay_num" value="" rel="" style="width:60px;" placeholder="後五碼" onblur="save_b1($(this))"><br><input type="text" id="k_pay_check" name="k_pay_check" value="0" rel="0" style="width:60px;" placeholder="對帳金額" onblur="save_b2($(this))"><input type="submit" style="border:0px;margin:0px;padding:0px;visibility:hidden;height:0px;width:0px;"></form>
                            </td>
                            <td class="center">正取　<a href="#" onClick="Mars_popup('ad_fun_action_list_singup1.php?st=k_be&v=1&id=49757','','width=300,height=200,top=100,left=100')">變</a></td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_fun_detail.php?k_id=49757','','location=yes,status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_padd.php?id=49757&ac=3059"><i class="icon-edit"></i> 修改</a></li>
                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list_singup1.php?st=del&id=49757','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 2 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_fun_action_list_singup1.php?topage=1&ac=3059>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_fun_action_list_singup1.php?topage=1&ac=3059 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_fun_action_list_singup1.php?topage=1&ac=3059" selected>1</option>
                        </select></li>
                </ul>
            </div>

            <div class="box-content">本場活動所有手機：<input type="text" style="width:80%;" value="0973231973,0907095975" onclick="this.select();"></div>

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
    $mtu = "ad_fun_action_list1.";
    $(function() {});

    function check_send_submit() {
        if ($("#s1").val() || $("#s2").val()) {} else {
            alert("請正確輸入姓名或手機。");
            return false;
        }
        return true;
    }

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
</script>