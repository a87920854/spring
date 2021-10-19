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
            <li class="active">所有會員情感諮詢預約</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>所有會員情感諮詢預約 - 數量：6　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
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

                        <p>預約時間：
                            <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times1" value="">
                            ～
                            <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times2" value="">
                        </p>
                        <p>
                            <select name="keyword_type" id="keyword_type">
                                <option value="">請選擇</option>
                                <option value="s3">姓名</option>
                                <option value="s4">編號</option>
                            </select>
                            <input name="keyword" id="keyword" class="form-control" type="text" value="">
                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th>預約教練</th>
                            <th>預約時間</th>
                            <th>姓名</th>
                            <th>Line ID</th>
                            <th>Email</th>
                            <th>手機號碼</th>
                            <th>會館秘書</th>
                            <th>諮詢結果</th>
                            <th>狀態</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>黃宇綸</td>
                            <td>2021/8/8&nbsp;&nbsp;10:00</td>
                            <td><a href="ad_mem_detail.php?mem_num=414544" target="_blank">彭詳程</a></td>
                            <td>ponbu1121</td>
                            <td>spon5945@gmail.com</td>
                            <td>0907225594</td>
                            <td>桃園黃毓淳</td>
                            <td></td>
                            <td>
                                發起諮詢預約：2021-07-30 20:48
                                <br>
                                確認雙方時間：<a href="javascript:Mars_popup('ad_mem_singleparty_consult_changetime.php?an=31','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">修改時間</a>&nbsp;&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_mem_singleparty_consult.php?st=fixc&an=31','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">已確認</a>
                                <br>
                                諮詢完成：尚未開始&nbsp;&nbsp;<a href="javascript:Mars_popup2('ad_mem_singleparty_consult.php?st=del&an=31','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">刪</a>
                            </td>
                        </tr>

                        <tr>
                            <td>瑪那熊</td>
                            <td>2021/8/27&nbsp;&nbsp;14:00</td>
                            <td><a href="ad_mem_detail.php?mem_num=99998" target="_blank">張小天</a></td>
                            <td>hhhhh</td>
                            <td>lovekyoe@gmail.com</td>
                            <td>0988706831</td>
                            <td>台北陳紅</td>
                            <td></td>
                            <td>
                                發起諮詢預約：2021-08-24 17:31
                                <br>
                                確認雙方時間：2021-08-24 17:33
                                <br>
                                諮詢完成：尚未開始&nbsp;&nbsp;<a href="javascript:Mars_popup2('ad_mem_singleparty_consult.php?st=del&an=32','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">刪</a>
                            </td>
                        </tr>

                        <tr>
                            <td>姜沛紳</td>
                            <td>2021/3/6&nbsp;&nbsp;15:00</td>
                            <td><a href="ad_mem_detail.php?mem_num=1980038" target="_blank">賴永晏</a></td>
                            <td>ffyy43</td>
                            <td>identify8840@yahoo.com</td>
                            <td>0938662583</td>
                            <td>高雄李順慈</td>
                            <td></td>
                            <td>
                                發起諮詢預約：2021-02-28 22:40
                                <br>
                                確認雙方時間：<a href="javascript:Mars_popup('ad_mem_singleparty_consult_changetime.php?an=28','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">修改時間</a>&nbsp;&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_mem_singleparty_consult.php?st=fixc&an=28','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">已確認</a>
                                <br>
                                諮詢完成：尚未開始&nbsp;&nbsp;<a href="javascript:Mars_popup2('ad_mem_singleparty_consult.php?st=del&an=28','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">刪</a>
                            </td>
                        </tr>

                        <tr>
                            <td>瑪那熊</td>
                            <td>2021/6/28&nbsp;&nbsp;19:00</td>
                            <td><a href="ad_mem_detail.php?mem_num=99998" target="_blank">張小天</a></td>
                            <td>ddddddd</td>
                            <td>Lovesingleclub@gmail.com</td>
                            <td>0988706831</td>
                            <td>台北陳紅</td>
                            <td>已完成</td>
                            <td>
                                發起諮詢預約：2021-06-21 16:44
                                <br>
                                確認雙方時間：2021-06-21 17:56
                                <br>
                                諮詢完成：2021-06-21 17:58&nbsp;&nbsp;<a href="javascript:Mars_popup2('ad_mem_singleparty_consult.php?st=del&an=30','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">刪</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 6 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_singleparty_consult.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_singleparty_consult.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_singleparty_consult.php?topage=1" selected>1</option>
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