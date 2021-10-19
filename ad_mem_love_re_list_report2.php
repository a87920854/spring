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
            <li class="active">排約回饋表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>排約回饋表 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <form action="ad_mem_love_re_list_report2.php" class="form-inline" method="post" name="form1">
                        <p>
                            回報日期： <input type="text" name="y1" id="y1" class="datepicker" autocomplete="off" value="">　～　<input type="text" name="y2" id="y2" class="datepicker" autocomplete="off" value="">
                        </p>
                        <p>
                            會館：
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
                            <input name="s3" class="form-control" type="text" placeholder="姓名或身分證字號">
                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <td width="131">
                                <div align="center" class="style3">回饋日期</div>
                            </td>
                            <td width="55">
                                <div align="center" class="style3"></div>
                            </td>
                            <td width="56">
                                <div align="center" class="style3"></div>
                            </td>
                            <td width="333">
                                <div align="center" class="style3">內容</div>
                            </td>
                            <td width="78">
                                <div align="center" class="style3">處理會館</div>
                            </td>
                            <td width="62">
                                <div align="center" class="style3">處理秘書</div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="center">2021/9/8 下午 08:31:33</div>
                            </td>
                            <td>
                                <div align="center">
                                    范芸瑄(88)(高中)(0975482142)
                                </div>
                            </td>

                            <td>
                                <div align="center">&nbsp;&nbsp;<a href="#r" onclick="Mars_popup('ad_mem_love_re_list_reply.php?love_auto=262624&me=1','','width=600,height=600,top=200,left=200')" style="color:blue">回饋表</a></div>
                            </td>

                            <td>
                                <div align="center"></div>
                            </td>
                            <td>
                                <div align="center">約專</div>
                            </td>
                            <td>
                                <div align="center">珍珍</div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="center">2021/9/8 下午 08:30:57</div>
                            </td>
                            <td>
                                <div align="center">
                                    戴碧持(84)(碩士)(0916680401)
                                </div>
                            </td>

                            <td>
                                <div align="center">&nbsp;&nbsp;<a href="#r" onclick="Mars_popup('ad_mem_love_re_list_reply.php?love_auto=262624&me=1','','width=600,height=600,top=200,left=200')" style="color:blue">回饋表</a></div>
                            </td>

                            <td>
                                <div align="center"></div>
                            </td>
                            <td>
                                <div align="center">約專</div>
                            </td>
                            <td>
                                <div align="center">珍珍</div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="center">2021/9/8 下午 04:54:45</div>
                            </td>
                            <td>
                                <div align="center">
                                    黃鈺婷(81)(大學)(0983273152)
                                </div>
                            </td>

                            <td>
                                <div align="center">&nbsp;&nbsp;<a href="#r" onclick="Mars_popup('ad_mem_love_re_list_reply.php?love_auto=262505&me=1','','width=600,height=600,top=200,left=200')" style="color:blue">回饋表</a></div>
                            </td>

                            <td>
                                <div align="center">9/6秦先生聊天OK,有加L,可互動</div>
                            </td>
                            <td>
                                <div align="center">台北</div>
                            </td>
                            <td>
                                <div align="center">王英華</div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="center">2021/9/8 下午 04:53:58</div>
                            </td>
                            <td>
                                <div align="center">
                                    黃鈺婷(81)(大學)(0983273152)
                                </div>
                            </td>

                            <td>
                                <div align="center">&nbsp;&nbsp;<a href="#r" onclick="Mars_popup('ad_mem_love_re_list_reply.php?love_auto=262504&me=1','','width=600,height=600,top=200,left=200')" style="color:blue">回饋表</a></div>
                            </td>

                            <td>
                                <div align="center">9/6林先生聊天OK,有加L,已有L互動</div>
                            </td>
                            <td>
                                <div align="center">台北</div>
                            </td>
                            <td>
                                <div align="center">王英華</div>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_love_re_list_report2.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_love_re_list_report2.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_mem_love_re_list_report2.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_mem_love_re_list_report2.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_mem_love_re_list_report2.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_mem_love_re_list_report2.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_mem_love_re_list_report2.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_mem_love_re_list_report2.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_mem_love_re_list_report2.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_mem_love_re_list_report2.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_mem_love_re_list_report2.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_mem_love_re_list_report2.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_love_re_list_report2.php?topage=1" selected>1</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=2">2</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=3">3</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=4">4</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=5">5</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=6">6</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=7">7</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=8">8</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=9">9</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=10">10</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=11">11</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=12">12</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=13">13</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=14">14</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=15">15</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=16">16</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=17">17</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=18">18</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=19">19</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=20">20</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=21">21</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=22">22</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=23">23</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=24">24</option>
                            <option value="/ad_mem_love_re_list_report2.php?topage=25">25</option>
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