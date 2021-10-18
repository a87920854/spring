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
            <li class="active">會員登入狀態</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>所有會員登入狀態 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <form id="searchform" action="ad_mem_login.php?vst=full&sear=1" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type">
                            <option value="s2">手機</option>
                            <option value="s1">身分證字號</option>
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                        </select>
                        <input name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>
                <p style="clear:both">
                    <a class="btn btn-success" href="?s77=1">近一個月</a>
                    <a class="btn btn-success" href="?s77=2">近二個月</a>
                    <a class="btn btn-success" href="?s77=3">近三個月</a>
                    <a class="btn btn-success" href="?s77=4">近四個月</a>
                    <a class="btn btn-success" href="?s77=5">近五個月</a>
                    <a class="btn btn-success" href="?s77=6">近六個月</a>
                    <a class="btn btn-success" href="?s77=7">近七個月</a>
                    <a class="btn btn-success" href="?s77=8">近八個月</a>
                    <a class="btn btn-success" href="?s77=9">近九個月</a>
                    <a class="btn btn-success" href="?s77=10">近十個月</a>
                    <a class="btn btn-success" href="?s77=11">近十一個月</a>
                    <a class="btn btn-success" href="?s77=12">十二個月以上</a>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=180>資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>登入時間</th>
                            <th width=180>秘書</th>
                            <th width=60>照片</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="center">春天網站</td>
                            <td>99998</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=99998" target="_blank">張小天</a>
                                <div style="float:right"></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1990/1/1　　31 歲</td>
                            <td class="center">大學</td>
                            <td class="center">
                                2021/10/15 下午 04:34:56&nbsp&nbsp&nbsp15 分前
                            </td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 陳紅<br>
                                <font color=green>邀約：</font>台北 - 上傳
                            </td>
                            <td class="center"><a href="../photo/201931114559_99998_598095.jpg?t=7211" target="_blank" class="fancybox">有</a></font>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=99998" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=495029&lu=99998&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(156)</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=99998" target="_blank"><i class="icon-file"></i> 修改</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2019/1/1~2022/2/9)</span>
                            </td>
                            <td colspan="6" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_report.php?k_id=495029&lu=99998&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(156)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>) 內容：由 暫存名單/瑜婷 處理 test浩瀚2(主) 與 張小天(被) 於 2021/7/20 下午 10:00:00 預訂排約，結果：成功　　<font color=blue>舊：</font>[2020-08-17 16:31]愛情實驗室-不合格[2020-08-17 16:31]愛情實驗室-合格[2020-08-17 16:36]愛情實驗室-不合格[2020-08-17 16:37]愛情實驗室-合格[2020-08-17 16:37]愛情實驗室-合格[2020-08-17 17:11]愛情實驗室-不合格[2020-08-17 17:14]愛情實驗室-不合格[2020-08-17 17:14]愛情實驗室-不合格[2020-08-17 17:24]愛情實驗室-合格[2020-08-17 17:25]愛情實驗室-合格[2020-08-17 17:27]愛情實驗室-合格[2020-08-17 17:27]愛情實驗室-合格[2020-08-17 17:27]愛情實驗室-不合格[2020-08-18 13:53]愛情實驗室-不合格[2020-08-22 17:00]愛情實驗室-合格[2020-09-02 14:18]愛情實驗室-合格[2021-01-28 17:14]愛情實驗室-不合格</td>
                            <td colspan=3>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_login.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_login.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_mem_login.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_mem_login.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_mem_login.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_mem_login.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_mem_login.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_mem_login.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_mem_login.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_mem_login.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_mem_login.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_mem_login.php?topage=10 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_login.php?topage=1" selected>1</option>
                            <option value="/ad_mem_login.php?topage=2">2</option>
                            <option value="/ad_mem_login.php?topage=3">3</option>
                            <option value="/ad_mem_login.php?topage=4">4</option>
                            <option value="/ad_mem_login.php?topage=5">5</option>
                            <option value="/ad_mem_login.php?topage=6">6</option>
                            <option value="/ad_mem_login.php?topage=7">7</option>
                            <option value="/ad_mem_login.php?topage=8">8</option>
                            <option value="/ad_mem_login.php?topage=9">9</option>
                            <option value="/ad_mem_login.php?topage=10">10</option>
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



    });

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
        location.href = "ad_mem_login.php?sear=1&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>