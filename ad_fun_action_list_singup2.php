<?php
    /*****************************************/
    //檔案名稱：ad_fun_action_list_singup2.php
    //後台對應位置：好好玩管理系統/同業報名單管>報名詳細資料
    //改版日期：2021.12.22
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

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
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action_list2_date.asp?ac=1902">【玩雪趣】劃破星空~雪花紛飛的南怡島~首爾奇遇篇</a></li>
            <li class="active">報名詳細資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>2015/3/13 - 【玩雪趣】劃破星空~雪花紛飛的南怡島~首爾奇遇篇 - 報名詳細資料 - 數量：5</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">

                    <a href="ad_fun_action_list_padd.asp?a=b&ac=1902&da=2015/3/13" class="btn btn-info">新增本活動報名資料</a>

                    <form id="searchform" action="ad_fun_action_list_singup2.asp?ac=1902&da=2015/3/13" method="post" target="_self" class="form-inline" onsubmit="return check_send_submit()">
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <td>姓名：<input name="s1" type="text" class="form-control"></td>
                            <td>手機：<input name="s2" type="text" class="form-control"></td>
                            <td><input type="submit" value="搜尋" class="btn btn-default"></td>
                            </tr>
                        </table>
                    </form>
                </div>

                <p><b>男：正取 2/備取 人、女：正取 3/備取 人、共：5 人　(備取人員將不會出現在列印資料中)</b></p>

                <p><a class="btn btn-success" href="javascript:Mars_popup('ad_fun_action_list_singup2_print.asp?ac=1902&da=2015/3/13','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i> 要保明細表</a>
                    <a class="btn btn-success" href="javascript:Mars_popup('ad_fun_action_list_singup2_print2.asp?ac=1902&da=2015/3/13','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i> 開票名單</a>
                    <a class="btn btn-success" href="javascript:Mars_popup('ad_fun_action_list_singup2_print3.asp?ac=1902&da=2015/3/13','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i> 總表</a>
                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=30>來源</th>
                            <th width=30>人數</th>
                            <th width=30>狀態</th>
                            <th width=80>出發日期</th>
                            <th width=80>身分證字號</th>
                            <th width=160>姓名</th>
                            <th width=60>性別</th>
                            <th width=80>生日</th>
                            <th width=80>學歷</th>
                            <th width=120>手機</th>
                            <th width=60>正備取</th>
                            <th>處理人員</th>
                            <th>訂金<br>尾款</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="center">一般</td>
                            <td class="center">1</td>
                            <td class="center"></td>
                            <td class="center">2015/3/13</td>
                            <td class="center">A224875128</td>
                            <td class="center"><a href="javascript:Mars_popup('ad_fun_detail.asp?k_id=33830','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');">
                                    <font color="red">陳怡惠 </font>
                                </a>　</td>
                            <td class="center">女</td>
                            <td class="center">1978/7/28</td>
                            <td class="center">專科</td>
                            <td class="center">0953203952</td>
                            <td class="center">正取　<a href="#" onClick="Mars_popup('ad_fun_action_list_singup2.asp?st=k_be&v=1&id=33830','','width=300,height=200,top=100,left=100')">變</a></td>
                            <td class="center">
                                好好玩旅行社 - 小傑
                            </td>
                            <td class="center">
                                <form style="border:0px;margin:0px;padding:0px;" id="searchform2" action="ad_fun_action_list_singup2.asp?topage=&ac=1902&da=2015/3/13&id=33830&st=uppaynum" method="post" target="_self"><input type="checkbox" name="k_pay_num" value="1" data-no-uniform="true" onclick="$(this).parent().submit()"> 訂金<br><input type="checkbox" name="k_pay_check" value="1" data-no-uniform="true" onclick="$(this).parent().submit()"> 尾款 <input type="submit" style="display:none"></form>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_fun_detail.asp?k_id=33830','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.asp?k_id=33830&ty=lovekeyin','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(1)</a></li>
                                        <li><a href="ad_fun_action_list_padd.asp?a=b&id=33830&ac=1902&da=2015/3/13"><i class="icon-edit"></i> 修改</a></li>
                                        <li><a href="#" onClick="Mars_popup('ad_fun_action_list_singup2_change.asp?id=33830&ac=1902','change_win','width=450,height=300,top=400,left=400')"><i class="icon-refresh"></i> 轉日/轉團</a></li>
                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list_singup2.asp?st=del&id=33830','','width=600,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="15" style="BORDER-bottom: #666666 1px dotted">

                                報名時間：2015/3/3 下午 04:30:00　(<a href="javascript:Mars_popup('ad_fun_report.asp?k_id=33830&ty=lovekeyin','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(1)</a>，處理情形：<font color="#FF0000" size="2">已發送考量4-6月出國, 不確定地點　 好好玩旅行社小傑</font>) 內容：</td>
                        </tr>

                        <tr>
                            <td class="center">一般</td>
                            <td class="center">1</td>
                            <td class="center"></td>
                            <td class="center">2015/3/13</td>
                            <td class="center"></td>
                            <td class="center"><a href="javascript:Mars_popup('ad_fun_detail.asp?k_id=33423','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');">
                                    <font color="red">黃嘉萍 </font>
                                </a>　<br><a href="javascript:Mars_popup('ad_fun_goldcard_point.asp?mem_num=10000278&n=黃嘉萍','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">金卡 0 點</a></td>
                            <td class="center">女</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">0911959568</td>
                            <td class="center">正取　<a href="#" onClick="Mars_popup('ad_fun_action_list_singup2.asp?st=k_be&v=1&id=33423','','width=300,height=200,top=100,left=100')">變</a></td>
                            <td class="center">
                                好好玩旅行社 - 小傑
                            </td>
                            <td class="center">
                                <form style="border:0px;margin:0px;padding:0px;" id="searchform2" action="ad_fun_action_list_singup2.asp?topage=&ac=1902&da=2015/3/13&id=33423&st=uppaynum" method="post" target="_self"><input type="checkbox" name="k_pay_num" value="1" data-no-uniform="true" onclick="$(this).parent().submit()"> 訂金<br><input type="checkbox" name="k_pay_check" value="1" data-no-uniform="true" onclick="$(this).parent().submit()"> 尾款 <input type="submit" style="display:none"></form>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_fun_detail.asp?k_id=33423','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.asp?k_id=33423&ty=lovekeyin','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(1)</a></li>
                                        <li><a href="ad_fun_action_list_padd.asp?a=b&id=33423&ac=1902&da=2015/3/13"><i class="icon-edit"></i> 修改</a></li>
                                        <li><a href="#" onClick="Mars_popup('ad_fun_action_list_singup2_change.asp?id=33423&ac=1902','change_win','width=450,height=300,top=400,left=400')"><i class="icon-refresh"></i> 轉日/轉團</a></li>
                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list_singup2.asp?st=del&id=33423','','width=600,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="15" style="BORDER-bottom: #666666 1px dotted">

                                報名時間：2014/11/27 下午 03:16:00　(<a href="javascript:Mars_popup('ad_fun_report.asp?k_id=33423&ty=lovekeyin','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(1)</a>，處理情形：<font color="#FF0000" size="2">有意願考量1-3月出國, 考量去東北亞(日韓)　 好好玩旅行社小傑</font>) 內容：</td>
                        </tr>

                        <tr>
                            <td class="center">一般</td>
                            <td class="center">1</td>
                            <td class="center"></td>
                            <td class="center">2015/3/13</td>
                            <td class="center">U221340116</td>
                            <td class="center"><a href="javascript:Mars_popup('ad_fun_detail.asp?k_id=32808','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');">
                                    <font color="red">詹伊穎 </font>
                                </a>　<br><a href="javascript:Mars_popup('ad_fun_goldcard_point.asp?mem_num=10002441&n=詹伊穎','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">金卡 2900 點</a></td>
                            <td class="center">女</td>
                            <td class="center">1982/4/16</td>
                            <td class="center">大學</td>
                            <td class="center">0922172829</td>
                            <td class="center">正取　<a href="#" onClick="Mars_popup('ad_fun_action_list_singup2.asp?st=k_be&v=1&id=32808','','width=300,height=200,top=100,left=100')">變</a></td>
                            <td class="center">
                                好好玩旅行社 - 小傑
                            </td>
                            <td class="center">
                                <form style="border:0px;margin:0px;padding:0px;" id="searchform2" action="ad_fun_action_list_singup2.asp?topage=&ac=1902&da=2015/3/13&id=32808&st=uppaynum" method="post" target="_self"><input type="checkbox" name="k_pay_num" value="1" data-no-uniform="true" onclick="$(this).parent().submit()"> 訂金<br><input type="checkbox" name="k_pay_check" value="1" data-no-uniform="true" onclick="$(this).parent().submit()"> 尾款 <input type="submit" style="display:none"></form>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_fun_detail.asp?k_id=32808','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.asp?k_id=32808&ty=lovekeyin','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>
                                        <li><a href="ad_fun_action_list_padd.asp?a=b&id=32808&ac=1902&da=2015/3/13"><i class="icon-edit"></i> 修改</a></li>
                                        <li><a href="#" onClick="Mars_popup('ad_fun_action_list_singup2_change.asp?id=32808&ac=1902','change_win','width=450,height=300,top=400,left=400')"><i class="icon-refresh"></i> 轉日/轉團</a></li>
                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list_singup2.asp?st=del&id=32808','','width=600,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="15" style="BORDER-bottom: #666666 1px dotted">
                                訊息來源：好好玩旅行社官方粉絲團
                                報名時間：2014/10/5 下午 08:21:00　(<a href="javascript:Mars_popup('ad_fun_report.asp?k_id=32808&ty=lovekeyin','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">已發送　 好好玩旅行社小傑</font>) 內容：</td>
                        </tr>

                        <tr>
                            <td class="center">一般</td>
                            <td class="center">1</td>
                            <td class="center"></td>
                            <td class="center">2015/3/13</td>
                            <td class="center">F123742687</td>
                            <td class="center"><a href="javascript:Mars_popup('ad_fun_detail.asp?k_id=33795','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');">
                                    <font color="blue">張家祥 </font>
                                </a>　</td>
                            <td class="center">男</td>
                            <td class="center">1976/1/17</td>
                            <td class="center">碩士</td>
                            <td class="center">0917150961</td>
                            <td class="center">正取　<a href="#" onClick="Mars_popup('ad_fun_action_list_singup2.asp?st=k_be&v=1&id=33795','','width=300,height=200,top=100,left=100')">變</a></td>
                            <td class="center">
                                好好玩旅行社 - 小傑
                            </td>
                            <td class="center">
                                <form style="border:0px;margin:0px;padding:0px;" id="searchform2" action="ad_fun_action_list_singup2.asp?topage=&ac=1902&da=2015/3/13&id=33795&st=uppaynum" method="post" target="_self"><input type="checkbox" name="k_pay_num" value="1" data-no-uniform="true" onclick="$(this).parent().submit()"> 訂金<br><input type="checkbox" name="k_pay_check" value="1" data-no-uniform="true" onclick="$(this).parent().submit()"> 尾款 <input type="submit" style="display:none"></form>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_fun_detail.asp?k_id=33795','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.asp?k_id=33795&ty=lovekeyin','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(1)</a></li>
                                        <li><a href="ad_fun_action_list_padd.asp?a=b&id=33795&ac=1902&da=2015/3/13"><i class="icon-edit"></i> 修改</a></li>
                                        <li><a href="#" onClick="Mars_popup('ad_fun_action_list_singup2_change.asp?id=33795&ac=1902','change_win','width=450,height=300,top=400,left=400')"><i class="icon-refresh"></i> 轉日/轉團</a></li>
                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list_singup2.asp?st=del&id=33795','','width=600,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="15" style="BORDER-bottom: #666666 1px dotted">

                                報名時間：2015/2/20 下午 05:55:00　(<a href="javascript:Mars_popup('ad_fun_report.asp?k_id=33795&ty=lovekeyin','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(1)</a>，處理情形：<font color="#FF0000" size="2">有意願考量1-3月出國, 考量去東北亞(日韓)　 好好玩旅行社小傑</font>) 內容：</td>
                        </tr>

                        <tr>
                            <td class="center">一般</td>
                            <td class="center">1</td>
                            <td class="center"></td>
                            <td class="center">2015/3/13</td>
                            <td class="center">R122427359</td>
                            <td class="center"><a href="javascript:Mars_popup('ad_fun_detail.asp?k_id=33794','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');">
                                    <font color="blue">朱敬寰 </font>
                                </a>　<br><a href="javascript:Mars_popup('ad_fun_goldcard_point.asp?mem_num=10002017&n=朱敬寰','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">金卡 2900 點</a></td>
                            <td class="center">男</td>
                            <td class="center">1970/8/3</td>
                            <td class="center">碩士</td>
                            <td class="center">0972833872</td>
                            <td class="center">正取　<a href="#" onClick="Mars_popup('ad_fun_action_list_singup2.asp?st=k_be&v=1&id=33794','','width=300,height=200,top=100,left=100')">變</a></td>
                            <td class="center">
                                好好玩旅行社 - 小傑
                            </td>
                            <td class="center">
                                <form style="border:0px;margin:0px;padding:0px;" id="searchform2" action="ad_fun_action_list_singup2.asp?topage=&ac=1902&da=2015/3/13&id=33794&st=uppaynum" method="post" target="_self"><input type="checkbox" name="k_pay_num" value="1" data-no-uniform="true" onclick="$(this).parent().submit()"> 訂金<br><input type="checkbox" name="k_pay_check" value="1" data-no-uniform="true" onclick="$(this).parent().submit()"> 尾款 <input type="submit" style="display:none"></form>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_fun_detail.asp?k_id=33794','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.asp?k_id=33794&ty=lovekeyin','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(1)</a></li>
                                        <li><a href="ad_fun_action_list_padd.asp?a=b&id=33794&ac=1902&da=2015/3/13"><i class="icon-edit"></i> 修改</a></li>
                                        <li><a href="#" onClick="Mars_popup('ad_fun_action_list_singup2_change.asp?id=33794&ac=1902','change_win','width=450,height=300,top=400,left=400')"><i class="icon-refresh"></i> 轉日/轉團</a></li>
                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list_singup2.asp?st=del&id=33794','','width=600,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="15" style="BORDER-bottom: #666666 1px dotted">

                                報名時間：2015/2/20 下午 04:23:00　(<a href="javascript:Mars_popup('ad_fun_report.asp?k_id=33794&ty=lovekeyin','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(1)</a>，處理情形：<font color="#FF0000" size="2">有意願考量1-3月出國, 考量去東北亞(日韓)　 好好玩旅行社小傑</font>) 內容：</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 5 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_fun_action_list_singup2.asp?topage=1&da=2015/3/13&ac=1902>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_fun_action_list_singup2.asp?topage=1&da=2015/3/13&ac=1902 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_fun_action_list_singup2.asp?topage=1&da=2015/3/13&ac=1902" selected>1</option>
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
    function check_send_submit() {
        if (($("#s21").val() && !$("#s22").val()) || ($("#s22").val() && !$("#s21").val())) {
            alert("請正確選擇活動時間的兩個區間時間。");
            return false;
        }
        if ($("#s21").val() && $("#s22").val()) {
            if ($("#s21").val() > $("#s22").val()) {
                alert("起始活動時間不可以比結束活動時間大。");
                return false;
            }
        }

        return true;
    }
</script>