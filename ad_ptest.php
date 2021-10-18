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
            <li><a href="index.php">管理系統</a></li>
            <li class="active">愛的五種語言</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>愛的五種語言 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>測驗日期：
                            <input type="text" class="datepicker" autocomplete="off" name="times1">
                            ～
                            <input type="text" class="datepicker" autocomplete="off" name="times2">
                        </p>
                        <p>

                            會員會館：
                            <select name="s6" id="s6">
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
                            <select name="s7" id="s7">
                                <option value="">請選擇</option>
                            </select>
                            　　受測會館：
                            <select name="s9" id="s9">
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

                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=120>姓名</th>
                            <th width=120>會員會館/秘書</th>
                            <th width=120>受理會館/秘書</th>

                            <td>
                                <div align="center">A</div>
                            </td>
                            <td>
                                <div align="center">B</div>
                            </td>
                            <td>
                                <div align="center">C</div>
                            </td>
                            <td>
                                <div align="center">D</div>
                            </td>
                            <td>
                                <div align="center">E</div>
                            </td>
                            <th width=150>受測時間</th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2081156" target="_blank">韓昀哲</a></td>
                            <td align="center">桃園 - 江琳</td>
                            <td align="center">約會專家 - 不明-singleparty</td>
                            <td>
                                <div align="center">8</div>
                            </td>
                            <td>
                                <div align="center">6</div>
                            </td>
                            <td>
                                <div align="center">4</div>
                            </td>
                            <td>
                                <div align="center">6</div>
                            </td>
                            <td>
                                <div align="center">6</div>
                            </td>
                            <td align="center">2021/9/8 下午 06:51:19</td>
                            <td align="center">
                                <a href="ad_mem_ptest_print.php?id=8732" target="_blank">查看/列印</a>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_ptest.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_ptest.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_ptest.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_ptest.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_ptest.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_ptest.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_ptest.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_ptest.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_ptest.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_ptest.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_ptest.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_ptest.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_ptest.php?topage=1" selected>1</option>
                            <option value="/ad_ptest.php?topage=2">2</option>
                            <option value="/ad_ptest.php?topage=3">3</option>
                            <option value="/ad_ptest.php?topage=4">4</option>
                            <option value="/ad_ptest.php?topage=5">5</option>
                            <option value="/ad_ptest.php?topage=6">6</option>
                            <option value="/ad_ptest.php?topage=7">7</option>
                            <option value="/ad_ptest.php?topage=8">8</option>
                            <option value="/ad_ptest.php?topage=9">9</option>
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

<script type="text/javascript">
    $(function() {
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");

        });
    });
</script>