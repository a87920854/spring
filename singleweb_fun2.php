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
            <li class="active">操作說明</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>操作說明</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><a href="singleweb_fun2_add.php" class="btn btn-info">新增說明</a>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td width=80><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=33&t_auto=26"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>登入問題</td>
                        <td>為什麼一直無法登入？</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=26">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=26','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=32&t_auto=25"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=32&t_auto=25"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>登入問題</td>
                        <td>系統顯示帳號密碼錯誤</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=25">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=25','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=31&t_auto=24"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=31&t_auto=24"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>登入問題</td>
                        <td>查詢密碼</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=24">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=24','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=30&t_auto=23"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=30&t_auto=23"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>登入問題</td>
                        <td>帳號密碼輸入之後，仍然回到原來登入畫面</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=23">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=23','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=29&t_auto=30"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=29&t_auto=30"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>LINE、FB、會館約會</td>
                        <td>LINE ID相關問題 - iOS</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=30">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=30','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=28&t_auto=29"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=28&t_auto=29"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>LINE、FB、會館約會</td>
                        <td>LINE ID相關問題 - Android</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=29">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=29','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=27&t_auto=32"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=27&t_auto=32"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>LINE、FB、會館約會</td>
                        <td>Facebook NAME 及 ID 相關問題</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=32">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=32','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=26&t_auto=31"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=26&t_auto=31"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>LINE、FB、會館約會</td>
                        <td>輸入對方ID後，找不到對方</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=31">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=31','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=25&t_auto=33"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=25&t_auto=33"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>LINE、FB、會館約會</td>
                        <td>會館約會相關問題</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=33">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=33','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=24&t_auto=16"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=24&t_auto=16"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>LINE、FB、會館約會</td>
                        <td>為什麼我不能使用LINE、FB約會功能？</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=16">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=16','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=23&t_auto=15"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=23&t_auto=15"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>LINE、FB、會館約會</td>
                        <td>為什麼我不能使用LINE、FB、會館約會主動約人，別人卻能約我？</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=15">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=15','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=22&t_auto=34"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=22&t_auto=34"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>LINE、FB、會館約會</td>
                        <td>其它約會問題</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=34">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=34','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=21&t_auto=22"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=21&t_auto=22"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>功能問題</td>
                        <td>分頁說明</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=22">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=22','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=20&t_auto=21"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=20&t_auto=21"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>功能問題</td>
                        <td>關於送禮</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=21">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=21','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=19&t_auto=20"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=19&t_auto=20"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>功能問題</td>
                        <td>關於喜歡</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=20">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=20','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=18&t_auto=19"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=18&t_auto=19"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>功能問題</td>
                        <td>照片右下角的紅色百分比數字是什麼？</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=19">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=19','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=17&t_auto=18"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=17&t_auto=18"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>功能問題</td>
                        <td>關於訊息</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=18">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=18','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=16&t_auto=14"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=16&t_auto=14"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>功能問題</td>
                        <td>關於檢舉</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=14">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=14','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=15&t_auto=17"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=15&t_auto=17"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>功能問題</td>
                        <td>關於約會紀錄</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=17">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=17','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=14&t_auto=13"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=14&t_auto=13"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>功能問題</td>
                        <td>如何成為熱門會員?</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=13">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=13','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=13&t_auto=12"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=13&t_auto=12"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>功能問題</td>
                        <td>我想要取消E-mail通知</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=12">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=12','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=12&t_auto=11"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=12&t_auto=11"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>功能問題</td>
                        <td>約會地點設定</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=11">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=11','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=11&t_auto=10"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=11&t_auto=10"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>個人資料</td>
                        <td>自我介紹文的撰寫方法</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=10">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=10','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=10&t_auto=9"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=10&t_auto=9"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>個人資料</td>
                        <td>照片決定是否受歡迎</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=9">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=9','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=9&t_auto=8"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=9&t_auto=8"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>資料審查</td>
                        <td>審查什麼時候結束？</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=8">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=8','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=8&t_auto=7"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=8&t_auto=7"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>資料審查</td>
                        <td>為什麼個人資料會被否認?</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=7">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=7','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=7&t_auto=6"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=7&t_auto=6"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>資料審查</td>
                        <td>關於照片審查基準</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=6">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=6','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=5&t_auto=5"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=5&t_auto=5"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>資料審查</td>
                        <td>為什麼資料及照片都要審核？</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=5">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=5','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=4&t_auto=27"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                        <td width=200>資料審查</td>
                        <td>高優質俱樂部是什麼？</td>
                        <td width="200"><a href="singleweb_fun2_add.php?st=ed&a=27">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=27','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
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