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
            <li><a href="ad_master_index.php">督導管理系統</a></li>
            <li class="active">小組管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>小組管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="建立一個新小組" onclick="Mars_popup('team_manager_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=500,height=250,top=10,left=10');"></p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>隸屬會館</th>
                            <th>小組名稱</th>
                            <th>小組組長</th>
                            <th>小組目標</th>
                            <th>成立時間</th>
                            <th>人數</th>
                            <th width=130></th>
                        </tr>
                        <tr>
                            <td>迷你約</td>
                            <td>迷你約</td>
                            <td>周羽潔</td>
                            <td>$50</td>
                            <td>2021/7/2 下午 04:00:56</td>
                            <td>
                                <lable>2 人 <input type="button" class="btn btn-default" value="分配組員" onclick="location.href='team_fanpai.php?an=78'"></lable>
                            </td>
                            <td>
                                <lable><input type="button" class="btn btn-default" value="修改" onclick="Mars_popup('team_manager_add.php?an=78','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=500,height=250,top=10,left=10');"></lable>
                                <lable><input type="button" class="btn btn-danger" value="刪除" onclick="Mars_popup2('team_manager.php?st=del&an=78','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=200,height=200,top=10,left=10');"></lable>
                            </td>
                        </tr>
                         <tr>
                            <td>台中</td>
                            <td>台中吳組</td>
                            <td>吳秋芬</td>
                            <td>$400,000</td>
                            <td>2017/9/3 下午 05:18:54</td>
                            <td>
                                <lable>2 人 <input type="button" class="btn btn-default" value="分配組員" onclick="location.href='team_fanpai.php?an=56'"></lable>
                            </td>
                            <td>
                                <lable><input type="button" class="btn btn-default" value="修改" onclick="Mars_popup('team_manager_add.php?an=56','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=500,height=250,top=10,left=10');"></lable>
                                <lable><input type="button" class="btn btn-danger" value="刪除" onclick="Mars_popup2('team_manager.php?st=del&an=56','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=200,height=200,top=10,left=10');"></lable>
                            </td>
                        </tr>
                        <tr>
                            <td>台中</td>
                            <td>台中童組</td>
                            <td>劉倪芳</td>
                            <td>$600,000</td>
                            <td>2017/9/3 下午 05:15:52</td>
                            <td>
                                <lable>3 人 <input type="button" class="btn btn-default" value="分配組員" onclick="location.href='team_fanpai.php?an=55'"></lable>
                            </td>
                            <td>
                                <lable><input type="button" class="btn btn-default" value="修改" onclick="Mars_popup('team_manager_add.php?an=55','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=500,height=250,top=10,left=10');"></lable>
                                <lable><input type="button" class="btn btn-danger" value="刪除" onclick="Mars_popup2('team_manager.php?st=del&an=55','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=200,height=200,top=10,left=10');"></lable>
                            </td>
                        </tr>
                        <tr>
                            <td>台中</td>
                            <td>台中熊雪枝</td>
                            <td>熊雪枝</td>
                            <td>$400,000</td>
                            <td>2017/9/3 下午 05:10:33</td>
                            <td>
                                <lable>2 人 <input type="button" class="btn btn-default" value="分配組員" onclick="location.href='team_fanpai.php?an=54'"></lable>
                            </td>
                            <td>
                                <lable><input type="button" class="btn btn-default" value="修改" onclick="Mars_popup('team_manager_add.php?an=54','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=500,height=250,top=10,left=10');"></lable>
                                <lable><input type="button" class="btn btn-danger" value="刪除" onclick="Mars_popup2('team_manager.php?st=del&an=54','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=200,height=200,top=10,left=10');"></lable>
                            </td>
                        </tr>                        

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 25 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/team_manager.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/team_manager.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/team_manager.php?topage=1" selected>1</option>
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