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
            <li class="active">排約部系統</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>排約部系統 - 數量：6　<a href="?vst=full&branch=迷你約&oby=love_time2 desc">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <form name="form1" method="post" action="ad_mem_row.php?vst=" class="form-inline">
                        <p>
                            <select name="branch" id="branch" style="width:100px;">
                                <option value="">請選擇會館</option>
                                <option value="台北">台北</option>
                                <option value="桃園">桃園</option>
                                <option value="新竹">新竹</option>
                                <option value="台中">台中</option>
                                <option value="台南">台南</option>
                                <option value="高雄">高雄</option>
                                <option value="八德">八德</option>
                                <option value="約專">約專</option>
                                <option value="迷你約" selected>迷你約</option>
                                <option value="總管理處">總管理處</option>
                            </select>

                            <select name="lovesingle" id="lovesingle">
                                <option value="">排約秘書</option>
                            </select>
                            &nbsp;排序：<select name="oby" id="oby" style="width:180px;">
                                <option value="1" selected>依最後排約時間近到遠</option>
                                <option value="2">依最後排約時間遠到近</option>
                                <option value="3">依入會時間近到遠</option>
                                <option value="4">依入會時間遠到近</option>
                                <option value="5">依年次近到遠</option>
                                <option value="6">依年次遠到近</option>
                            </select>
                            <input id="keyword" name="keyword" class="form-control2" type="text" value="" placeholder="要搜尋的關鍵字(非必填)">
                        </p>
                        <p>
                            性別：<select name="sex">
                                <option value="">不拘</option>
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                            &nbsp;
                            次數：<input type="number" id="lovesize1" name="lovesize1" class="form-control2" value="" style="width:80px"> 次以上 <input type="number" id="lovesize2" name="lovesize2" class="form-control2" value="" style="width:80px"> 次以下
                            &nbsp;
                            天數：<input type="number" id="lovetime1" name="lovetime1" class="form-control2" value="" style="width:80px"> 天以上 <input type="number" id="lovetime2" name="lovetime2" class="form-control2" value="" style="width:80px"> 天以下
                            &nbsp;
                            年收：
                            <select name="mem_money" id="mem_money" class="select2" multiple>
                                <option value="50萬以下">50萬以下</option>
                                <option value="51萬到80萬">51萬到80萬</option>
                                <option value="81萬到100萬">81萬到100萬</option>
                                <option value="101萬到199萬">101萬到199萬</option>
                                <option value="200萬以上">200萬以上</option>
                            </select>
                        </p>
                        <p>
                            排約時間：<input type="text" id="lovedate1" name="lovedate1" class="datepicker" autocomplete="off" value=""> 到 <input type="text" id="lovedate2" name="lovedate2" class="datepicker" autocomplete="off" value="">
                            &nbsp;
                            加入時間：<input type="text" id="joindate1" name="joindate1" class="datepicker" autocomplete="off" value=""> 到 <input type="text" id="joindate2" name="joindate2" class="datepicker" autocomplete="off" value="">
                        </p>
                        <p>
                            會員權益：
                            <select name="weblevel" id="weblevel" class="select2" style="width:60%;" multiple>
                                <option value="2">真人認證</option>
                                <option value="3" selected>璀璨會員-一年期</option>
                                <option value="5" selected>璀璨會員-二年期</option>
                                <option value="4" selected>璀璨VIP會員-一年期</option>
                                <option value="6" selected>璀璨VIP會員-二年期</option>
                            </select>
                        </p>
                        <p>
                            婚姻狀態：
                            <select name="marry" id="marry" class="select2" style="width:30%;" multiple>
                                <option value="未婚" selected>未婚</option>
                                <option value="離婚" selected>離婚</option>
                                <option value="離婚沒小孩" selected>離婚沒小孩</option>
                                <option value="離婚有小孩" selected>離婚有小孩</option>
                                <option value="喪偶" selected>喪偶</option>
                                <option value="已婚" selected>已婚</option>
                                <option value="保密" selected>保密</option>
                                <option value="交往中" selected>交往中</option>
                                <option value="有心儀對象" selected>有心儀對象</option>
                            </select>
                            <label><input type="checkbox" name="expired" value="1"> 排除過期</label>
                            <input type="submit" name="Submit" class="btn btn-info" value="查詢">
                        </p>
                    </form>
                </div>

                <p>
                <div style="width:20px;height:20px;background:#0000ff;display:inline-block;"></div> 1 ~ 29 天
                &nbsp;
                <div style="width:20px;height:20px;background:#009900;display:inline-block;"></div> 30 ~ 59 天
                &nbsp;
                <div style="width:20px;height:20px;background:#ffcc33;display:inline-block;"></div> 60 ~ 179 天
                &nbsp;
                <div style="width:20px;height:20px;background:#990000;display:inline-block;"></div> 180 天以上


                <div style="display:inline-block;margin-left:20px;"><a href="ad_mem_row_print.php?v=print&marry=%E6%9C%89%E5%BF%83%E5%84%80%E5%B0%8D%E8%B1%A1&marry=%E4%BA%A4%E5%BE%80%E4%B8%AD&marry=%E4%BF%9D%E5%AF%86&marry=%E5%B7%B2%E5%A9%9A&marry=%E5%96%AA%E5%81%B6&marry=%E9%9B%A2%E5%A9%9A%E6%9C%89%E5%B0%8F%E5%AD%A9&marry=%E9%9B%A2%E5%A9%9A%E6%B2%92%E5%B0%8F%E5%AD%A9&marry=%E9%9B%A2%E5%A9%9A&marry=%E6%9C%AA%E5%A9%9A&weblevel=6&weblevel=4&weblevel=5&weblevel=3&joindate2=&joindate1=&lovedate2=&lovedate1=&lovetime2=&lovetime1=&lovesize2=&lovesize1=&sex=&keyword=&oby=1&lovesingle=&branch=%E8%BF%B7%E4%BD%A0%E7%B4%84&vst=" target="_blank" class="btn btn-warning">列印本頁</a></div>


                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>入會日</th>
                            <th>卡別</th>
                            <th>次數</th>
                            <th>電話</th>
                            <th>年次</th>
                            <th>學歷</th>
                            <th>照片</th>
                            <th>會館秘書</th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center">2072192</td>
                            <td align="center"><a href="ad_mem_rowv.php?mem_num=2072192" target="_blank">康勝鈞</a></td>
                            <td align="center">男</td>
                            <td align="center">2021/7/31&nbsp;&nbsp;餘 104 天
                            </td>
                            <td align="center">無</td>

                            <td align="center">主：0&nbsp;被：1&nbsp;共：1&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1970277&lu=F126153271&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(23)</a><br>最後一次排約：2021/8/21 下午 05:00:00&nbsp;(<font color="#009900">59 day</font>)</td>
                            <td align="center">0922313415</td>
                            <td align="center">74</td>
                            <td align="center">大學<br>文化大學<br>戲劇舞台系</td>

                            <td align="center">
                                無
                            </td>

                            <td class="center">
                                <font color=green>受理：</font>迷你約 - 程立彤<br>
                                <font color=green>邀約：</font>迷你約 - 程立彤
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=2072192" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_rowv.php?mem_num=2072192#sea" target="_blank"><i class="icon-file"></i> 開始排約</a></li>
                                        <li><a href="javascript:Mars_popup('sendmail2.php?mem_sex=男&mem_mail=vickang0107@gmail.com&mem_name=康勝鈞&mem_num=2072192','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>

                                        <li><a href="#sms" onclick="Mars_popup('send_sms.php?mem_sex=男&mem_single=F227591704&mem_mobile=0922313415&mem_num=2072192','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 簡訊</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1491277</td>
                            <td align="center"><a href="ad_mem_rowv.php?mem_num=1491277" target="_blank">南尚傑</a></td>
                            <td align="center">男</td>
                            <td align="center">2021/8/11&nbsp;&nbsp;餘 114 天
                            </td>
                            <td align="center">菁英專案六個月</td>

                            <td align="center">主：20&nbsp;被：0&nbsp;共：20&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1185964&lu=A125276565&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(122)</a><br>最後一次排約：2021/3/6 下午 02:00:00&nbsp;(<font color="#990000">227 day</font>)</td>
                            <td align="center">0901169885</td>
                            <td align="center">71</td>
                            <td align="center">碩士<br><br></td>

                            <td align="center">
                                無
                            </td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 林馨彤<br>
                                <font color=green>排約：</font>林馨彤<br>
                                <font color=green>邀約：</font>台北 - 林馨彤
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1491277" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_rowv.php?mem_num=1491277#sea" target="_blank"><i class="icon-file"></i> 開始排約</a></li>
                                        <li><a href="javascript:Mars_popup('sendmail2.php?mem_sex=男&mem_mail=nan8sun8jei8@gmail.com&mem_name=南尚傑&mem_num=1491277','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>

                                        <li><a href="#sms" onclick="Mars_popup('send_sms.php?mem_sex=男&mem_single=A224876769&mem_mobile=0901169885&mem_num=1491277','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 簡訊</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2071047</td>
                            <td align="center"><a href="ad_mem_rowv.php?mem_num=2071047" target="_blank">廖家毓</a></td>
                            <td align="center">男</td>
                            <td align="center">2021/7/26&nbsp;&nbsp;餘 99 天
                            </td>
                            <td align="center">無</td>

                            <td align="center">主：0&nbsp;被：0&nbsp;共：0&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1969132&lu=H123689007&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(16)</a><br>
                                <font color="#990000">最後一次排約：無紀錄</font>
                            </td>
                            <td align="center">0989756629</td>
                            <td align="center">77</td>
                            <td align="center">碩士<br>中原大學<br>電機系</td>

                            <td align="center">
                                無
                            </td>

                            <td class="center">
                                <font color=green>受理：</font>迷你約 - 程立彤<br>
                                <font color=green>邀約：</font>迷你約 - 程立彤
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=2071047" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_rowv.php?mem_num=2071047#sea" target="_blank"><i class="icon-file"></i> 開始排約</a></li>
                                        <li><a href="javascript:Mars_popup('sendmail2.php?mem_sex=男&mem_mail=&mem_name=廖家毓&mem_num=2071047','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>

                                        <li><a href="#sms" onclick="Mars_popup('send_sms.php?mem_sex=男&mem_single=F227591704&mem_mobile=0989756629&mem_num=2071047','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 簡訊</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2074706</td>
                            <td align="center"><a href="ad_mem_rowv.php?mem_num=2074706" target="_blank">陳文鍇</a></td>
                            <td align="center">男</td>
                            <td align="center">2021/8/30&nbsp;&nbsp;餘 42 天
                            </td>
                            <td align="center">無</td>

                            <td align="center">主：0&nbsp;被：0&nbsp;共：0&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1973784&lu=A128359534&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(18)</a><br>
                                <font color="#990000">最後一次排約：無紀錄</font>
                            </td>
                            <td align="center">0912855220</td>
                            <td align="center">81</td>
                            <td align="center">大學<br>東南科技大學<br>營建室內設計系</td>

                            <td align="center">
                                無
                            </td>

                            <td class="center">
                                <font color=green>受理：</font>迷你約 - 程立彤<br>
                                <font color=green>邀約：</font>迷你約 - 程立彤
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=2074706" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_rowv.php?mem_num=2074706#sea" target="_blank"><i class="icon-file"></i> 開始排約</a></li>
                                        <li><a href="javascript:Mars_popup('sendmail2.php?mem_sex=男&mem_mail=kay50913@gmail.com&mem_name=陳文鍇&mem_num=2074706','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>

                                        <li><a href="#sms" onclick="Mars_popup('send_sms.php?mem_sex=男&mem_single=F227591704&mem_mobile=0912855220&mem_num=2074706','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 簡訊</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2077063</td>
                            <td align="center"><a href="ad_mem_rowv.php?mem_num=2077063" target="_blank">王逸凱</a></td>
                            <td align="center">男</td>
                            <td align="center">2021/8/20&nbsp;&nbsp;餘 32 天
                            </td>
                            <td align="center">VIP-三個月</td>

                            <td align="center">主：0&nbsp;被：0&nbsp;共：0&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1977127&lu=F125699278&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(15)</a><br>
                                <font color="#990000">最後一次排約：無紀錄</font>
                            </td>
                            <td align="center">0953498907</td>
                            <td align="center">72</td>
                            <td align="center">專科<br>黎明技術學院<br>電機工程系</td>

                            <td align="center">
                                無
                            </td>

                            <td class="center">
                                <font color=green>受理：</font>迷你約 - 程立彤<br>
                                <font color=green>邀約：</font>迷你約 - 程立彤
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=2077063" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_rowv.php?mem_num=2077063#sea" target="_blank"><i class="icon-file"></i> 開始排約</a></li>
                                        <li><a href="javascript:Mars_popup('sendmail2.php?mem_sex=男&mem_mail=joe6269a@yahoo.com.tw&mem_name=王逸凱&mem_num=2077063','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>

                                        <li><a href="#sms" onclick="Mars_popup('send_sms.php?mem_sex=男&mem_single=F227591704&mem_mobile=0953498907&mem_num=2077063','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 簡訊</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2079504</td>
                            <td align="center"><a href="ad_mem_rowv.php?mem_num=2079504" target="_blank">吳俊志</a></td>
                            <td align="center">男</td>
                            <td align="center">2021/8/31&nbsp;&nbsp;餘 42 天
                            </td>
                            <td align="center">無</td>

                            <td align="center">主：0&nbsp;被：0&nbsp;共：0&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1980542&lu=H123905908&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(17)</a><br>
                                <font color="#990000">最後一次排約：無紀錄</font>
                            </td>
                            <td align="center">0926255805</td>
                            <td align="center">78</td>
                            <td align="center">碩士<br>台灣大學<br>法律所</td>

                            <td align="center">
                                無
                            </td>

                            <td class="center">
                                <font color=green>受理：</font>迷你約 - 侯懿芳<br>
                                <font color=green>邀約：</font>迷你約 - 侯懿芳
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=2079504" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_rowv.php?mem_num=2079504#sea" target="_blank"><i class="icon-file"></i> 開始排約</a></li>
                                        <li><a href="javascript:Mars_popup('sendmail2.php?mem_sex=男&mem_mail=fall80926@gmail.com&mem_name=吳俊志&mem_num=2079504','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>

                                        <li><a href="#sms" onclick="Mars_popup('send_sms.php?mem_sex=男&mem_single=A225796340&mem_mobile=0926255805&mem_num=2079504','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 簡訊</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 6 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_row.php?topage=1&Submit=%E6%9F%A5%E8%A9%A2&marry=%E6%9C%89%E5%BF%83%E5%84%80%E5%B0%8D%E8%B1%A1&marry=%E4%BA%A4%E5%BE%80%E4%B8%AD&marry=%E4%BF%9D%E5%AF%86&marry=%E5%B7%B2%E5%A9%9A&marry=%E5%96%AA%E5%81%B6&marry=%E9%9B%A2%E5%A9%9A%E6%9C%89%E5%B0%8F%E5%AD%A9&marry=%E9%9B%A2%E5%A9%9A%E6%B2%92%E5%B0%8F%E5%AD%A9&marry=%E9%9B%A2%E5%A9%9A&marry=%E6%9C%AA%E5%A9%9A&weblevel=6&weblevel=4&weblevel=5&weblevel=3&joindate2=&joindate1=&lovedate2=&lovedate1=&lovetime2=&lovetime1=&lovesize2=&lovesize1=&sex=&keyword=&oby=1&lovesingle=&branch=%E8%BF%B7%E4%BD%A0%E7%B4%84&vst=>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_row.php?topage=1&Submit=%E6%9F%A5%E8%A9%A2&marry=%E6%9C%89%E5%BF%83%E5%84%80%E5%B0%8D%E8%B1%A1&marry=%E4%BA%A4%E5%BE%80%E4%B8%AD&marry=%E4%BF%9D%E5%AF%86&marry=%E5%B7%B2%E5%A9%9A&marry=%E5%96%AA%E5%81%B6&marry=%E9%9B%A2%E5%A9%9A%E6%9C%89%E5%B0%8F%E5%AD%A9&marry=%E9%9B%A2%E5%A9%9A%E6%B2%92%E5%B0%8F%E5%AD%A9&marry=%E9%9B%A2%E5%A9%9A&marry=%E6%9C%AA%E5%A9%9A&weblevel=6&weblevel=4&weblevel=5&weblevel=3&joindate2=&joindate1=&lovedate2=&lovedate1=&lovetime2=&lovetime1=&lovesize2=&lovesize1=&sex=&keyword=&oby=1&lovesingle=&branch=%E8%BF%B7%E4%BD%A0%E7%B4%84&vst=class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_row.php?topage=1&Submit=%E6%9F%A5%E8%A9%A2&marry=%E6%9C%89%E5%BF%83%E5%84%80%E5%B0%8D%E8%B1%A1&marry=%E4%BA%A4%E5%BE%80%E4%B8%AD&marry=%E4%BF%9D%E5%AF%86&marry=%E5%B7%B2%E5%A9%9A&marry=%E5%96%AA%E5%81%B6&marry=%E9%9B%A2%E5%A9%9A%E6%9C%89%E5%B0%8F%E5%AD%A9&marry=%E9%9B%A2%E5%A9%9A%E6%B2%92%E5%B0%8F%E5%AD%A9&marry=%E9%9B%A2%E5%A9%9A&marry=%E6%9C%AA%E5%A9%9A&weblevel=6&weblevel=4&weblevel=5&weblevel=3&joindate2=&joindate1=&lovedate2=&lovedate1=&lovetime2=&lovetime1=&lovesize2=&lovesize1=&sex=&keyword=&oby=1&lovesingle=&branch=%E8%BF%B7%E4%BD%A0%E7%B4%84&vst=" selected>1</option>
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

<script src="js/select2.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("#branch").on("change", function() {
            personnel_get("branch", "lovesingle");
        });


        personnel_get("branch", "lovesingle");

    });
</script>