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
            <li class="active">禮物管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>禮物管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增禮物" onclick="Mars_popup('singleweb_fun15_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th>名稱</th>
                            <th>檔名</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=21&an=35"><span class="fa fa-arrow-down"></span></a></td>
                            <td>閃耀皇冠</td>
                            <td>36.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=35','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=35">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=20&an=34"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=20&an=34"><span class="fa fa-arrow-down"></span></a></td>
                            <td>靈活海獅</td>
                            <td>35.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=34','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=34">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=19&an=33"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=19&an=33"><span class="fa fa-arrow-down"></span></a></td>
                            <td>上等好茶</td>
                            <td>34.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=33','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=33">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=18&an=32"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=18&an=32"><span class="fa fa-arrow-down"></span></a></td>
                            <td>跳舞機器人</td>
                            <td>33.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=32','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=32">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=17&an=31"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=17&an=31"><span class="fa fa-arrow-down"></span></a></td>
                            <td>七色彩虹</td>
                            <td>32.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=31','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=31">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=16&an=30"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=16&an=30"><span class="fa fa-arrow-down"></span></a></td>
                            <td>驚喜禮物盒</td>
                            <td>31.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=30','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=30">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=15&an=29"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=15&an=29"><span class="fa fa-arrow-down"></span></a></td>
                            <td>歡樂小丑</td>
                            <td>30.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=29','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=29">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=14&an=28"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=14&an=28"><span class="fa fa-arrow-down"></span></a></td>
                            <td>眨眼小恐龍</td>
                            <td>29.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=28','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=28">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=13&an=27"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=13&an=27"><span class="fa fa-arrow-down"></span></a></td>
                            <td>溫馴小獅子</td>
                            <td>28.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=27','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=27">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=12&an=15"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=12&an=15"><span class="fa fa-arrow-down"></span></a></td>
                            <td>旋轉冰淇淋</td>
                            <td>16.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=15','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=15">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=11&an=14"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=11&an=14"><span class="fa fa-arrow-down"></span></a></td>
                            <td>香醇濃咖啡</td>
                            <td>17.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=14','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=14">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=10&an=13"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=10&an=13"><span class="fa fa-arrow-down"></span></a></td>
                            <td>微醺紅酒</td>
                            <td>18.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=13','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=13">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=9&an=12"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=9&an=12"><span class="fa fa-arrow-down"></span></a></td>
                            <td>甜滋滋棒棒糖</td>
                            <td>19.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=12','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=12">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=8&an=11"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=8&an=11"><span class="fa fa-arrow-down"></span></a></td>
                            <td>透心涼沁飲</td>
                            <td>20.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=11','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=11">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=7&an=10"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=7&an=10"><span class="fa fa-arrow-down"></span></a></td>
                            <td>活力柳橙</td>
                            <td>21.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=10','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=10">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=6&an=9"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=6&an=9"><span class="fa fa-arrow-down"></span></a></td>
                            <td>新鮮葡萄</td>
                            <td>22.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=9','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=9">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=5&an=8"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=5&an=8"><span class="fa fa-arrow-down"></span></a></td>
                            <td>春風小花</td>
                            <td>23.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=8','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=8">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=4&an=7"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=4&an=7"><span class="fa fa-arrow-down"></span></a></td>
                            <td>飄揚幸運草</td>
                            <td>24.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=7','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=7">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=3&an=5"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=3&an=5"><span class="fa fa-arrow-down"></span></a></td>
                            <td>夏日椰子樹</td>
                            <td>25.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=5','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=5">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=2&an=4"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=2&an=4"><span class="fa fa-arrow-down"></span></a></td>
                            <td>穿梭火箭</td>
                            <td>26.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=4','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=4">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=1&an=3"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td>童年紙飛機</td>
                            <td>27.gif</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add.php?an=3','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=3">刪除</a>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <p><input type="button" class="btn btn-info" value="新增罐頭訊息" onclick="Mars_popup('singleweb_fun15_add2.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>名稱</th>
                            <th>檔名</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td>有機會進一步互動認識嗎？</td>
                            <td></td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add2.php?an=25','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=25">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>我們倆的興趣一樣喔！</td>
                            <td></td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add2.php?an=22','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=22">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>喜歡你甜美的笑容。</td>
                            <td></td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add2.php?an=21','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=21">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>可以和你做朋友嗎？</td>
                            <td></td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add2.php?an=20','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=20">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>照片上的你很好看！</td>
                            <td></td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add2.php?an=19','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=19">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>很高興認識你喔！</td>
                            <td></td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add2.php?an=18','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=18">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>小小心意，希望你會喜歡。</td>
                            <td></td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add2.php?an=17','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=17">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>送禮物給感覺不錯的你。</td>
                            <td></td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun15_add2.php?an=16','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun15.php?st=del&an=16">刪除</a>
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