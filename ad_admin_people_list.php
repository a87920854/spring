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

            <li class="active">近階人事資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>近階人事資料</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full" class="form-inline">

                        <select name="branch" id="branch" class="form-control">
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
                            <option value="總管理處">總管理處</option>
                            <option value="好好玩旅行社">好好玩旅行社</option>
                        </select> <select name="keyword_type" id="keyword_type" class="form-control">
                            <option value="s2">姓名</option>
                            <option value="s3">身分證字號</option>
                            <option value="s1">流水號</option>
                            <option value="m1">本月生日</option>
                            <option value="m2">下月生日</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input type="hidden" name="q" value="">
                        <input type="submit" name="Submit" class="btn btn-default" value="查詢">
                    </form>
                </div>

                <p><a href="?q=0" class="btn btn-success">前往所有</a>　<a href="javascript:Mars_popup('ad_admin_people_list_print.php','','toolbar=yes,location=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=760,height=450,top=130,left=130');" class="btn btn-info">列印本頁</a></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <th>會館</th>
                        <th>姓名</th>
                        <th>身分證字號</th>
                        <th>職稱</th>

                        <th>流水號</th>
                        <th>別名</th>
                        <th>出生日期</th>
                        <th>離職日</th>
                        <th>到職日</th>

                        <th width=80></th>

                        </tr>
                        <tr>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1717" target="_blank">徐采雯</a></td>
                            <td>F223916509</td>
                            <td>工程師</td>

                            <td>1717</td>
                            <td>徐采雯</td>
                            <td>66/2/16</td>
                            <td>0/0/0</td>
                            <td>110/9/1</td>

                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="people_pay_view.php?p_auto=1717" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('people_fix.php?p_auto=1717','','toolbar=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=760,height=450,top=130,left=130');"><i class="icon-pencil"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup('people_add2.php?p_auto=1717','','status=yes,scrollbars=yes,width=760,height=450,top=30,left=30');"><i class="icon-plus-sign"></i> 扶養眷屬</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_admin_people_list.php?st=del&p_auto=1717','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">共 1639 筆、第 1 頁／共 33 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_admin_people_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_admin_people_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_admin_people_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_admin_people_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_admin_people_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_admin_people_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_admin_people_list.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_admin_people_list.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_admin_people_list.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_admin_people_list.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_admin_people_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_admin_people_list.php?topage=33 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_admin_people_list.php?topage=1" selected>1</option>
                            <option value="/ad_admin_people_list.php?topage=2">2</option>
                            <option value="/ad_admin_people_list.php?topage=3">3</option>
                            <option value="/ad_admin_people_list.php?topage=4">4</option>
                            <option value="/ad_admin_people_list.php?topage=5">5</option>
                            <option value="/ad_admin_people_list.php?topage=6">6</option>
                            <option value="/ad_admin_people_list.php?topage=7">7</option>
                            <option value="/ad_admin_people_list.php?topage=8">8</option>
                            <option value="/ad_admin_people_list.php?topage=9">9</option>
                            <option value="/ad_admin_people_list.php?topage=10">10</option>
                            <option value="/ad_admin_people_list.php?topage=11">11</option>
                            <option value="/ad_admin_people_list.php?topage=12">12</option>
                            <option value="/ad_admin_people_list.php?topage=13">13</option>
                            <option value="/ad_admin_people_list.php?topage=14">14</option>
                            <option value="/ad_admin_people_list.php?topage=15">15</option>
                            <option value="/ad_admin_people_list.php?topage=16">16</option>
                            <option value="/ad_admin_people_list.php?topage=17">17</option>
                            <option value="/ad_admin_people_list.php?topage=18">18</option>
                            <option value="/ad_admin_people_list.php?topage=19">19</option>
                            <option value="/ad_admin_people_list.php?topage=20">20</option>
                            <option value="/ad_admin_people_list.php?topage=21">21</option>
                            <option value="/ad_admin_people_list.php?topage=22">22</option>
                            <option value="/ad_admin_people_list.php?topage=23">23</option>
                            <option value="/ad_admin_people_list.php?topage=24">24</option>
                            <option value="/ad_admin_people_list.php?topage=25">25</option>
                            <option value="/ad_admin_people_list.php?topage=26">26</option>
                            <option value="/ad_admin_people_list.php?topage=27">27</option>
                            <option value="/ad_admin_people_list.php?topage=28">28</option>
                            <option value="/ad_admin_people_list.php?topage=29">29</option>
                            <option value="/ad_admin_people_list.php?topage=30">30</option>
                            <option value="/ad_admin_people_list.php?topage=31">31</option>
                            <option value="/ad_admin_people_list.php?topage=32">32</option>
                            <option value="/ad_admin_people_list.php?topage=33">33</option>
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