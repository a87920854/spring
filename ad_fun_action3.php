<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php")
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">好好玩國內活動 - 資料版</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩國內活動 - 資料版　未處理 - 數量：2　<a href="?vst=full&s99=">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                            <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>

                            <li><a href="ad_fun_love_f.php?t=0"><i class="icon-tag"></i> 進階搜尋</a></li>
                        </ul>
                    </div>　


                    <form id="searchform" action="ad_fun_action3.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" class="form-control">
                            <option value="s2">手機</option>
                            <option value="s1">信箱</option>
                            <option value="s4">活動</option>
                            <option value="s3">姓名</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input class="btn btn-default" type="submit" value="送出">
                    </form>


                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>出生日</th>
                            <th>手機</th>
                            <th>身份證</th>
                            <th>學歷</th>
                            <th>吃素</th>
                            <th>e-mail</th>
                            <th>工作</th>
                            <th>職稱</th>
                            <th>公布資料</th>
                            <th>備註</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="center">柯宏明</td>
                            <td class="center">男</td>
                            <td class="center">1990/3/10</td>
                            <td class="center">0986225859</td>
                            <td class="center">S124284317</td>
                            <td class="center">大學</td>
                            <td class="center">葷食</td>
                            <td class="center">endex12345601@yahoo.com.tw</td>
                            <td class="center">中油</td>
                            <td class="center">採購</td>
                            <td class="center">LINE</td>
                            <td class="center"></td>
                            <td class="center">
                                <a href="?vst=full&sear=1&ac=3056">下午茶聯誼派對｜網美之旅+拍照任務【無法成團將不另行通知】</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">吳惠芳</td>
                            <td class="center">女</td>
                            <td class="center">1990/1/29</td>
                            <td class="center">0975708358</td>
                            <td class="center">O200213450</td>
                            <td class="center">大學</td>
                            <td class="center">葷食</td>
                            <td class="center">tirahwu@hotmail.com</td>
                            <td class="center">科技業</td>
                            <td class="center">處長</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">
                                <a href="?vst=full&sear=1&ac=3055">北海岸踏浪趣｜探索金沙灣秘境＋超夯IG打卡熱點＋懷舊鐵路便當＋海灘分組遊戲【無法成團將不另行通知】</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 2 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_fun_action3.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_fun_action3.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_fun_action3.php?topage=1" selected>1</option>
                        </select></li>
                </ul>
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
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $mtu = "ad_fun_action1.";
    $(function() {});

    function chk_search_form() {
        if (!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
            return false;
        }
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        location.href = "ad_fun_action3.php?sear=1&vst=full&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>