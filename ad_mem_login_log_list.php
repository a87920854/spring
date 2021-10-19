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
            <li class="active">約會專家-會員登入紀錄</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>約會專家-所有會員登入紀錄 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="ad_mem_login_log_list_count.php" class="btn btn-info">各會館統計</a>
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <form id="searchform" action="?vst=full&sear=1" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()" style="margin:0px;">

                        <p>會館：
                            <select name="s6" id="s6" style="width:100px;">
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
                            <select name="s7" id="s7" style="width:100px;">
                                <option value="">請選擇</option>
                            </select>
                        </p>

                        <p>性別：
                            <select name="s8" id="s8" style="width:100px;">
                                <option value="">請選擇</option>
                                <option value="男">男生</option>
                                <option value="女">女生</option>
                            </select>
                            登入時間：
                            <input type="text" class="datepicker" autocomplete="off" name="times1" value="">
                            ～
                            <input type="text" class="datepicker" autocomplete="off" name="times2" value="">
                        </p>
                        <p>
                            <select name="keyword_type" id="keyword_type">
                                <option value="">請選擇</option>
                                <option value="s3">姓名</option>
                                <option value="s4">編號</option>
                            </select>
                            <input name="keyword" id="keyword" class="form-control" type="text" value="">
                            <input type="submit" value="送出" class="btn btn-default">
                    </form>
                    </p>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>會館</th>
                            <th>秘書</th>
                            <th>位置</th>
                            <th>時間</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><a href="ad_mem_detail.php?mem_num=2043182" target="_blank">2043182</a></td>
                            <td>約專示範帳號-女</td>
                            <td>女</td>
                            <td>約專</td>
                            <td>張茹茵</td>
                            <td>60.250.92.145</td>
                            <td>2021/10/18 下午 03:07:19</td>
                        </tr>

                        <tr>
                            <td><a href="ad_mem_detail.php?mem_num=914853" target="_blank">914853</a></td>
                            <td>廖瑜婷</td>
                            <td>女</td>
                            <td>台北</td>
                            <td>台北督導</td>
                            <td>60.250.92.145</td>
                            <td>2021/10/18 下午 02:55:57</td>
                        </tr>

                        <tr>
                            <td><a href="ad_mem_detail.php?mem_num=1503490" target="_blank">1503490</a></td>
                            <td>測試-尹宜君</td>
                            <td>女</td>
                            <td>總管理處</td>
                            <td>宜君</td>
                            <td>60.250.92.145</td>
                            <td>2021/10/18 下午 02:29:35</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_login_log_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_login_log_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_mem_login_log_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_mem_login_log_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_mem_login_log_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_mem_login_log_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_mem_login_log_list.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_mem_login_log_list.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_mem_login_log_list.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_mem_login_log_list.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_mem_login_log_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_mem_login_log_list.php?topage=10 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_login_log_list.php?topage=1" selected>1</option>
                            <option value="/ad_mem_login_log_list.php?topage=2">2</option>
                            <option value="/ad_mem_login_log_list.php?topage=3">3</option>
                            <option value="/ad_mem_login_log_list.php?topage=4">4</option>
                            <option value="/ad_mem_login_log_list.php?topage=5">5</option>
                            <option value="/ad_mem_login_log_list.php?topage=6">6</option>
                            <option value="/ad_mem_login_log_list.php?topage=7">7</option>
                            <option value="/ad_mem_login_log_list.php?topage=8">8</option>
                            <option value="/ad_mem_login_log_list.php?topage=9">9</option>
                            <option value="/ad_mem_login_log_list.php?topage=10">10</option>
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
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");

        });
    });

    function chk_search_form() {

        /*  if(!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
        	return false;
          }
          if(!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
        	return false;
          }*/
        return true;
    }
</script>