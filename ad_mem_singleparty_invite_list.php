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
            <li class="active">所有會員約會紀錄</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>所有會員約會紀錄 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
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

                        <p>
                            <select name="types">
                                <option value="">所有類型</option>
                                <option value="branch">會館約會</option>
                                <option value="fb">FB約會</option>
                                <option value="line">LINE約會</option>


                            </select>
                            發起時間：
                            <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times1" value="">
                            ～
                            <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times2" value="">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <label style="display:inline"><input type="checkbox" data-no-uniform="true" name="nostats0" value="1"> 排除邀約中</label>
                            <label style="display:inline"><input type="checkbox" data-no-uniform="true" name="nowait" value="1"> 排除過期</label>
                        </p>
                        <p>
                            <input name="keyword" id="keyword" class="form-control" type="text" placeholder="姓名/編號" value="">
                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th></th>
                            <th>類型</th>
                            <th>發起日期</th>
                            <th>排約人</th>
                            <th>排約對象</th>
                            <th>約會會館</th>
                            <th>約會時間</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>49656</td>
                            <td>LINE約會</td>
                            <td>2021-09-09 01:47</td>
                            <td><a href="ad_mem_detail.php?mem_num=2079903" target="_blank">台北 - 許宏澤</a>&nbsp;&nbsp;
                                &nbsp;&nbsp;璀璨會員-一年期&nbsp;&nbsp;餘 314 天</td>
                            <td><a href="ad_mem_detail.php?mem_num=1909223" target="_blank">台北 - 蔡佩雯</a>&nbsp;&nbsp;
                                璀璨VIP會員-二年期&nbsp;&nbsp;餘 241 天</td>
                            <td></td>
                            <td></td>
                            <td>
                                邀約中-過期
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_singleparty_invite_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_singleparty_invite_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_mem_singleparty_invite_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_mem_singleparty_invite_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_mem_singleparty_invite_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_mem_singleparty_invite_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_mem_singleparty_invite_list.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_mem_singleparty_invite_list.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_mem_singleparty_invite_list.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_mem_singleparty_invite_list.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_mem_singleparty_invite_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_mem_singleparty_invite_list.php?topage=10 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_singleparty_invite_list.php?topage=1" selected>1</option>
                            <option value="/ad_mem_singleparty_invite_list.php?topage=2">2</option>
                            <option value="/ad_mem_singleparty_invite_list.php?topage=3">3</option>
                            <option value="/ad_mem_singleparty_invite_list.php?topage=4">4</option>
                            <option value="/ad_mem_singleparty_invite_list.php?topage=5">5</option>
                            <option value="/ad_mem_singleparty_invite_list.php?topage=6">6</option>
                            <option value="/ad_mem_singleparty_invite_list.php?topage=7">7</option>
                            <option value="/ad_mem_singleparty_invite_list.php?topage=8">8</option>
                            <option value="/ad_mem_singleparty_invite_list.php?topage=9">9</option>
                            <option value="/ad_mem_singleparty_invite_list.php?topage=10">10</option>
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