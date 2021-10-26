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
            <li>DateMeNow網站系統</li>
            <li class="active">選單-交友企劃</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>選單-交友企劃</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form action="?st=add" method="post" target="_self" class="form-inline" style="display:inline-block;margin:0px;">
                    <input type="text" name="d1" id="d1" class="form-control" placeholder="選單文字" required>
                    <input type="text" name="d2" id="d2" class="form-control" placeholder="選單連結" required>
                    &nbsp;<input type="submit" class="btn btn-warning" value="新增">
                </form>&nbsp;&nbsp;&nbsp;
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th></th>
                            <th>文字</th>
                            <th>連結</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=568&i1=4"><span class="fa fa-arrow-down"></span></a></td>
                            <td>自選約會</td>
                            <td>/landing</td>
                            <td>
                                <a title="刪除" href="?st=del&an=568">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=563&i1=3"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=563&i1=3"><span class="fa fa-arrow-down"></span></a></td>
                            <td>上班族不能不約會</td>
                            <td>https://www.datemenow.com.tw/event180310.php</td>
                            <td>
                                <a title="刪除" href="?st=del&an=563">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=562&i1=2"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=562&i1=2"><span class="fa fa-arrow-down"></span></a></td>
                            <td>戀愛分析量表</td>
                            <td>https://www.datemenow.com.tw/180610/</td>
                            <td>
                                <a title="刪除" href="?st=del&an=562">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=561&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td>大家都在穩定交往的秘訣?</td>
                            <td>https://www.datemenow.com.tw/200510/</td>
                            <td>
                                <a title="刪除" href="?st=del&an=561">刪除</a>
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
require_once("./include/_bottom.php")
?>