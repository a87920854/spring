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
            <li>會計部系統</li>
            <li class="active">排約業績</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>排約業績</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <!--<input type="button" onclick="Mars_popup('payment_pay_love_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=530,height=290,top=150,left=150');" value="新增排約業績" class="btn btn-info">-->
                        <a href="payment_pay_love_sum.php" class="btn btn-warning">彙總結算</a>


                        <select name="branch" style="width:100px;">
                            <option value="" selected>會館</option>
                            <option value="台北">台北</option>
                            <option value="桃園">桃園</option>
                            <option value="新竹">新竹</option>
                            <option value="台中">台中</option>
                            <option value="台南">台南</option>
                            <option value="高雄">高雄</option>
                            <option value="八德">八德</option>
                            <option value="約專">約專</option>
                            <option value="迷你約">迷你約</option>
                            <option value="總管理處" selected>總管理處</option>
                            <option value="好好玩旅行社">好好玩旅行社</option>
                        </select>
                        <input type="text" name="s1" class="form-control" placeholder="編號">　
                        <input type="submit" name="Submit" class="btn btn-default" value="查詢">
                    </form>
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <th>編號</th>
                                <th>日期</th>
                                <th>收款會館</font>
                                </th>
                                <th>業績會館</th>
                                <th>業績秘書</th>
                                <th>現金</th>
                                <th>茶卷</th>
                                <th>刷卡</th>
                                <th>轉帳</th>
                                <th>總金額</th>
                                <th></th>
                            </tr>

                            <tr>
                                <td>235686</td>
                                <td>2021年2月28日</td>
                                <td>總管理處</td>
                                <td>總管理處</td>
                                <td>張利</td>
                                <td>2700</td>
                                <td>900</td>
                                <td>0</td>
                                <td></td>

                                <td>3600</td>
                                <td>
                                </td>
                            </tr>

                            <tr>
                                <td>235685</td>
                                <td>2021年2月28日</td>
                                <td>總管理處</td>
                                <td>總管理處</td>
                                <td>唐慧琳</td>
                                <td>800</td>
                                <td>300</td>
                                <td>0</td>
                                <td></td>

                                <td>1100</td>
                                <td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center">共 183 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                    <ul class='pagination pagination-md'>
                        <li><a href=/payment_pay_love.php?topage=1>第一頁</a></li>
                        <li class='active'><a href="#">1</a></li>
                        <li><a href=/payment_pay_love.php?topage=2 class='text'>2</a></li>
                        <li><a href=/payment_pay_love.php?topage=3 class='text'>3</a></li>
                        <li><a href=/payment_pay_love.php?topage=4 class='text'>4</a></li>
                        <li><a href=/payment_pay_love.php?topage=5 class='text'>5</a></li>
                        <li><a href=/payment_pay_love.php?topage=6 class='text'>6</a></li>
                        <li><a href=/payment_pay_love.php?topage=7 class='text'>7</a></li>
                        <li><a href=/payment_pay_love.php?topage=8 class='text'>8</a></li>
                        <li><a href=/payment_pay_love.php?topage=9 class='text'>9</a></li>
                        <li><a href=/payment_pay_love.php?topage=10 class='text'>10</a></li>
                        <li><a href=/payment_pay_love.php?topage=2 class='text' title='Next'>下一頁</a></li>
                        <li><a href=/payment_pay_love.php?topage=10 class='text'>最後一頁</a></li>
                        <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="/payment_pay_love.php?topage=1" selected>1</option>
                                <option value="/payment_pay_love.php?topage=2">2</option>
                                <option value="/payment_pay_love.php?topage=3">3</option>
                                <option value="/payment_pay_love.php?topage=4">4</option>
                                <option value="/payment_pay_love.php?topage=5">5</option>
                                <option value="/payment_pay_love.php?topage=6">6</option>
                                <option value="/payment_pay_love.php?topage=7">7</option>
                                <option value="/payment_pay_love.php?topage=8">8</option>
                                <option value="/payment_pay_love.php?topage=9">9</option>
                                <option value="/payment_pay_love.php?topage=10">10</option>
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
require_once("./include/_bottom.php")
?>

<script type="text/javascript">
    $(function() {

        $("#search_send").on("click", function(event) {
            if (!$("#keyword").val()) {
                $("#keyword").focus();
                alert("請輸入要搜尋的關鍵字。");
                return false;
            }
            if (!$("#keyword_type").val()) {
                alert("have error。");
                return false;
            }
            location.href = "payment_list.php?sear=1&vst=full&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        });

    });
</script>