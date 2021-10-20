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
            <li class="active">網站活動上傳</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>網站活動上傳 - 數量：200　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p><a href="ad_action_add.php" class="btn btn-info">新增活動</a></p>
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>
                            <input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="" placeholder="活動日期開始">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="" placeholder="活動日期結束">
                            <select name="s6" id="s6" class="form-control">
                                <option value="">請選擇會館</option>
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
                                <option value="好好玩旅行社">好好玩旅行社</option>
                            </select>
                            <input type="text" name="keyword" class="form-control" placeholder="標題/編號/內容關鍵字">
                            <input type="submit" name="Submit" class="btn btn-default" value="送出">
                        </p>
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th></th>
                            <th width=160 align="center">活動時間</th>
                            <th width=80 align="center">會館</th>
                            <th width=140 align="center">活動類型</th>
                            <th width=90 align="center">活動地點</th>
                            <th width=300 align="center">活動標題</th>
                            <th></th>
                            <th width=60 align="center">花絮</th>
                            <th width=80 align="center"></th>
                        </tr>

                        <tr>
                            <td align="center">13169</td>
                            <td class="center"><a href="upload_image/2021831201916_action_481.png" class="fancybox"><img src="upload_image/2021831201916_action_481.png" border=0 width=90 height=60></a></td>
                            <td class="center">2021-09-25 19:00<br>
                                <font color=blue size=2>活動新增(2021-08-31 20:19)</font>
                            </td>
                            <td align="center">台中</td>
                            <td class="center" style="font-size:12px;">主題活動<br>趣約會-主題特別企劃</td>
                            <td class="center">台中市</td>
                            <td class="center">實體聯誼【單身週末舞會】</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：新開發/開發者：台中威威/執行者：台中威威
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13169">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.asp?id=13396"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_action_pic.asp?ac_auto=13396" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_action_add.asp?ac_auto=13396"><i class="icon-edit"></i> 修改</a></li>
                                        <li><a href="ad_action_list_sign.asp?ac_auto=13396"><i class="icon-edit"></i> 活動異動單</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_list.asp?st=del&ac_auto=13396','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>


                        </tbody>
                </table>
            </div>
            <div class="text-center">共 200 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_action_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_action_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_action_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_action_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_action_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_action_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_action_list.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_action_list.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_action_list.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_action_list.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_action_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_action_list.php?topage=10 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_action_list.php?topage=1" selected>1</option>
                            <option value="/ad_action_list.php?topage=2">2</option>
                            <option value="/ad_action_list.php?topage=3">3</option>
                            <option value="/ad_action_list.php?topage=4">4</option>
                            <option value="/ad_action_list.php?topage=5">5</option>
                            <option value="/ad_action_list.php?topage=6">6</option>
                            <option value="/ad_action_list.php?topage=7">7</option>
                            <option value="/ad_action_list.php?topage=8">8</option>
                            <option value="/ad_action_list.php?topage=9">9</option>
                            <option value="/ad_action_list.php?topage=10">10</option>
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