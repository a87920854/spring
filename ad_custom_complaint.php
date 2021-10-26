<?php
	error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_custom_complaint.php
	//後台對應位置：名單/發送記錄>客服資料中心(客戶申訴)
	//改版日期：2021.10.26
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");

    if ( SqlFilter($_REQUEST["st"],"tab") == "cancel" ){
        if ( SqlFilter($_REQUEST["an"],"tab") != "" ){
            $SQL_d = "Delete From system_sign Where auton='".SqlFilter($_REQUEST["an"],"tab")."'";
            $rs_d = $SPConn->prepare($SQL_d);
            $rs_d->execute();
        }
        header("location:win_close.php?m=取消申請");
        exit;
    }
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">客戶申訴</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>客戶申訴 - 數量：4</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form id="searchform" action="ad_custom_complaint.php" method="post" target="_self" class="form-inline">
                    <a class="btn btn-info" href="ad_custom_complaint_add.php">建立案件</a>

                    <input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="" placeholder="建立日期開始">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="" placeholder="建立日期結束">

                    <select name="branch" id="branch" class="form-control">
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

                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="編號 / 姓名 / 手機" value="">
                    <input type="hidden" name="s" value="">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                    </p>
                    <p>
                        <a class="btn btn-success" href="ad_custom_complaint.php?s=1"><i class="fa fa-arrow-right"></i>未結案</a>
                        <a class="btn btn-success" href="ad_custom_complaint.php?s=2">已結案</a>
                        <a class="btn btn-success" href="ad_custom_complaint.php?s=0">所有案件</a>
                </form>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=140>建立時間</th>
                            <th width=180>案件編號</th>
                            <th width=180>客戶</th>
                            <th width=160>秘書</th>
                            <th width=120>狀態</th>
                            <th width=60></th>
                        </tr>

                        <tr>
                            <td class="center">2021-07-19 13:46</td>
                            <td class="center"><a href="ad_custom_complaint_detail.php?id=2021719134649705">2021719134649705</a></td>
                            <td class="center">周冠廷</td>
                            <td class="center">
                                <font color=green>建檔：</font>總管理處 - 曉娟
                                &nbsp;&nbsp;
                                <font color=green>處理：</font>高雄 - 高雄督導
                            </td>
                            <td class="center">處理中</td>

                            <td class="center">
                                <a href="ad_custom_complaint_detail.php?id=2021719134649705" class="btn btn-xs btn-default">詳細</a>

                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-06-08 18:37</td>
                            <td class="center"><a href="ad_custom_complaint_detail.php?id=202168183748705">202168183748705</a></td>
                            <td class="center">熊靜茹</td>
                            <td class="center">
                                <font color=green>建檔：</font>八德 - 八德督導
                                &nbsp;&nbsp;
                                <font color=green>處理：</font>八德 - 蔡佩蓁 Sunny
                            </td>
                            <td class="center">處理中</td>

                            <td class="center">
                                <a href="ad_custom_complaint_detail.php?id=202168183748705" class="btn btn-xs btn-default">詳細</a>

                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-05-29 18:09</td>
                            <td class="center"><a href="ad_custom_complaint_detail.php?id=202152918935705">202152918935705</a></td>
                            <td class="center">郭孟鑫</td>
                            <td class="center">
                                <font color=green>建檔：</font>八德 - 八德督導
                                &nbsp;&nbsp;
                                <font color=green>處理：</font>八德 - 蔡佩蓁 Sunny
                            </td>
                            <td class="center">處理中</td>

                            <td class="center">
                                <a href="ad_custom_complaint_detail.php?id=202152918935705" class="btn btn-xs btn-default">詳細</a>

                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-05-17 09:58</td>
                            <td class="center"><a href="ad_custom_complaint_detail.php?id=20215179582705">20215179582705</a></td>
                            <td class="center">吳佳諺</td>
                            <td class="center">
                                <font color=green>建檔：</font>總管理處 - 曉娟
                                &nbsp;&nbsp;
                                <font color=green>處理：</font>桃園 - 連督導
                            </td>
                            <td class="center">處理中</td>

                            <td class="center">
                                <a href="ad_custom_complaint_detail.php?id=20215179582705" class="btn btn-xs btn-default">詳細</a>

                            </td>

                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 4 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_custom_complaint.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_custom_complaint.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_custom_complaint.php?topage=1" selected>1</option>
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