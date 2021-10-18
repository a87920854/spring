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
            <li class="active">徵人資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>徵人資料　未處理 - 數量：35</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <p><a class="btn btn-info btn-sm" href="ad_job.php">未處理</a>&nbsp;&nbsp;<a class="btn btn-primary btn-sm" href="ad_job.php?s99=1">已處理</a></p>

                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tr>
                            <td>&#24352;晶</td>
                            <td>1971</td>
                            <td>台北市</td>
                            <td>碩士</td>
                            <td>0988220098</td>
                            <td>AA286877@Gmail.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台北</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=223','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=223','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=223','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>黃承彥</td>
                            <td>1988</td>
                            <td>花蓮縣</td>
                            <td>高中</td>
                            <td>0958102009</td>
                            <td></td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台北</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=221','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=221','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=221','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>吳東浩</td>
                            <td>1990</td>
                            <td>台中市</td>
                            <td>高職</td>
                            <td>0962031371</td>
                            <td>qqua11482@gmail.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=220','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=220','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=220','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>蔡品萱</td>
                            <td>1963</td>
                            <td>台北市</td>
                            <td>高職</td>
                            <td>0983826806</td>
                            <td>ott871227@yahoo.com.tw</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台北</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=218','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=218','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=218','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>孫</td>
                            <td>1959</td>
                            <td>台北市</td>
                            <td>大學</td>
                            <td>0905238798</td>
                            <td></td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台北</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=217','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=217','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=217','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>施克強兒子</td>
                            <td>1993</td>
                            <td>台北市</td>
                            <td>大學</td>
                            <td>0921616888</td>
                            <td>kevin820429@yahoo.com.tw</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台北</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=215','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=215','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=215','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>王安妮</td>
                            <td>1969</td>
                            <td>台中市</td>
                            <td>碩士</td>
                            <td>0913196393</td>
                            <td>vivi6393@yahoo.com.tw</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=212','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=212','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=212','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>李奎諺</td>
                            <td>1983</td>
                            <td>台中市</td>
                            <td>碩士</td>
                            <td>0906335343</td>
                            <td>lkyalonso@gmail.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=210','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=210','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=210','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>許哲維</td>
                            <td>1992</td>
                            <td>台中市</td>
                            <td>大學</td>
                            <td>0966590615</td>
                            <td>jhewei61@gmail.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=209','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=209','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=209','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>陳葶栩</td>
                            <td>1969</td>
                            <td>台北市</td>
                            <td>碩士</td>
                            <td>0958780896</td>
                            <td>vivin0530@hotmail.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台北</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=207','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=207','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=207','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>陳慶賓</td>
                            <td>1981</td>
                            <td>南投縣</td>
                            <td>高中</td>
                            <td>0931550169</td>
                            <td></td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=200','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=200','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=200','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>黃桂玲</td>
                            <td>1972</td>
                            <td>台中市</td>
                            <td>高中</td>
                            <td>0933424000</td>
                            <td>s0933424000@yahoo.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=194','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=194','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=194','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>陳膺錡</td>
                            <td>1976</td>
                            <td>彰化縣</td>
                            <td>高中</td>
                            <td>0909599792</td>
                            <td>a0909599792@gmail.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=185','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=185','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=185','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>簡淑鈴</td>
                            <td>1954</td>
                            <td>南投縣</td>
                            <td>大學</td>
                            <td>0963189637</td>
                            <td>shuling4009@gmail.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=182','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=182','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=182','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>楊啟輝</td>
                            <td>1986</td>
                            <td>台中市</td>
                            <td>專科</td>
                            <td>0980876950</td>
                            <td>qz751215@gmail.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=181','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=181','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=181','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>黃欣怡</td>
                            <td>1993</td>
                            <td>台中市</td>
                            <td>高職</td>
                            <td>0958577485</td>
                            <td>Zx2014Cv@yahoo.com.tw</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=179','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=179','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=179','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>詹肇嘉</td>
                            <td>1965</td>
                            <td>彰化縣</td>
                            <td>高中</td>
                            <td>0973526098</td>
                            <td></td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=177','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=177','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=177','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>張月霞</td>
                            <td>1997</td>
                            <td>南投縣</td>
                            <td>國中</td>
                            <td>0968522510</td>
                            <td>s0968522510@ijl.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=176','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=176','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=176','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>林易靖</td>
                            <td>1992</td>
                            <td>台中市</td>
                            <td>專科</td>
                            <td>0978051889</td>
                            <td>ma1245678@yahoo.com.tw</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=175','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=175','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=175','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>黃惠儀</td>
                            <td>1975</td>
                            <td>台中市</td>
                            <td>高中</td>
                            <td>0922200550</td>
                            <td>shin814@kimo.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=172','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=172','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=172','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>王致豪</td>
                            <td>1998</td>
                            <td>台中市</td>
                            <td>國中</td>
                            <td>0979530229</td>
                            <td>wch901120@yahoo.com.tw</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=158','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=158','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=158','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>楊宗熙</td>
                            <td>1996</td>
                            <td>台中市</td>
                            <td>高中</td>
                            <td>0973610058</td>
                            <td>young.cc8888@gmail.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=156','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=156','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=156','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>吳俐賢</td>
                            <td>1989</td>
                            <td>台中市</td>
                            <td>大學</td>
                            <td>0975971793</td>
                            <td>hsien.angel.wu@gmail.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=152','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=152','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=152','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>陳秀萍</td>
                            <td>1990</td>
                            <td>台中市</td>
                            <td>大學</td>
                            <td>0909894319</td>
                            <td></td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=145','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=145','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=145','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>施婉琳</td>
                            <td>1988</td>
                            <td>台中市</td>
                            <td>高職</td>
                            <td>0977348211</td>
                            <td>a780722@hyahoo.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=142','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=142','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=142','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>陳瑩純</td>
                            <td>1975</td>
                            <td>台中市</td>
                            <td>專科</td>
                            <td>0975830855</td>
                            <td>a333842@yahoo.com.tw</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=134','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=134','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=134','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>李易蓉</td>
                            <td>1986</td>
                            <td>台中市</td>
                            <td>大學</td>
                            <td>0965822093</td>
                            <td>rosy00308@gmail.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=133','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=133','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=133','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>金佑宣</td>
                            <td>1983</td>
                            <td>台中市</td>
                            <td>高職</td>
                            <td>0986532625</td>
                            <td>z11771@yahoo.com.tw</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=131','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=131','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=131','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>丁柔羽</td>
                            <td>1996</td>
                            <td>台中市</td>
                            <td>高中</td>
                            <td>0968032935</td>
                            <td>rebaby520@yahoo.com.tw</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=128','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=128','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=128','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>張嘉凌</td>
                            <td>1994</td>
                            <td>台中市</td>
                            <td>大學</td>
                            <td>0983059098</td>
                            <td>e8307862004@yahoo.com.tw</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=127','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=127','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=127','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>林怡平</td>
                            <td>1967</td>
                            <td>台中市</td>
                            <td>高職</td>
                            <td>0983165690</td>
                            <td></td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=122','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=122','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=122','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>林捷瑞</td>
                            <td>1991</td>
                            <td>台中市</td>
                            <td>高職</td>
                            <td>0985248702</td>
                            <td>new9a080904@gmail.com.tw</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=120','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=120','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=120','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>林家宏</td>
                            <td>1997</td>
                            <td>台中市</td>
                            <td>高中</td>
                            <td>0976436538</td>
                            <td></td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=118','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=118','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=118','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>楊騏銘</td>
                            <td>1987</td>
                            <td>台中市</td>
                            <td>大學</td>
                            <td>0981485431</td>
                            <td>gary19870107@gmail.com</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=115','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=115','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=115','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>黃尚閎</td>
                            <td>1987</td>
                            <td>桃園縣</td>
                            <td>高職</td>
                            <td>0936949779</td>
                            <td>werasnu@yahoo.com.tw</td>
                            <td width="30%">
                                <font color="#FF0000" size="2">處理情形：
                                    (未處理)</font>

                                <br>
                            </td>
                            <td class="center">台中</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=63','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=63','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_job_fix.php?an=63','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>
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
require_once("./include/_bottom.php")
?>