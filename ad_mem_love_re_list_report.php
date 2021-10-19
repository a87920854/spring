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
            <li class="active">未回饋排約表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>未回饋排約表 - 數量：500　<a href="?vst=full&s99=">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>
                            排約日期：
                            <input type="text" class="datepicker" autocomplete="off" name="times1">
                            ～
                            <input type="text" class="datepicker" autocomplete="off" name="times2">
                            <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="請輸入身分證字號">

                        </p>
                        <p>

                            會館：
                            <select name="s6" id="s6">
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
                            <select name="s7" id="s7">
                                <option value="">請選擇</option>
                            </select>

                            &nbsp;排序：<select name="oby" id="oby">
                                <option value="1">依排約時間近到遠</option>
                                <option value="2">依排約時間遠到近</option>
                            </select>
                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                    <p>
                    <div style="width:20px;height:20px;background:#0000ff;display:inline-block;"></div> 1 ~ 29 天
                    &nbsp;
                    <div style="width:20px;height:20px;background:#009900;display:inline-block;"></div> 30 ~ 59 天
                    &nbsp;
                    <div style="width:20px;height:20px;background:#ffcc33;display:inline-block;"></div> 60 ~ 179 天
                    &nbsp;
                    <div style="width:20px;height:20px;background:#990000;display:inline-block;"></div> 180 天以上
                    &nbsp;<small>(排約回饋僅顯示 2018/01/01 後之排約資料)</small>
                    </p>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>排約日期</th>
                            <th>類型</th>
                            <th>排約人</th>
                            <th>排約人茶水費</th>
                            <th>排約對象</th>
                            <th>對象茶水費</th>
                            <th></th>
                            <th>處理會館</th>
                            <th>處理秘書</th>

                            <!--<th width="100">　</th>-->
                        </tr>

                        <tr>
                            <td align="center">
                                <font color="#009900">41 day</font>
                            </td>
                            <td align="center">2021-09-08 20:30</td>
                            <td align="center">
                                LINE排約</td>
                            <td align="center">
                                廖家慶(74)(大學)(0911997662)
                                &nbsp;&nbsp;<a href="#r" onclick="Mars_popup('ad_mem_love_re_list_reply_add.php?love_auto=262637&me=1','','width=600,height=700,top=200,left=200')">新增回饋</a>
                            </td>
                            <td align="center">(茶卷)300
                            </td>
                            <td align="center">
                                陳沛詠(77)(大學)(0966655197)
                                &nbsp;&nbsp;<a href="#r" onclick="Mars_popup('ad_mem_love_re_list_reply_add.php?love_auto=262637&me=2','','width=600,height=700,top=200,left=200')">新增回饋</a>
                            </td>
                            <td align="center">
                                (茶卷)300
                            </td>
                            <td align="center">無</td>
                            <td align="center">新竹</td>
                            <td align="center">黃亮亮/黃亮亮</td>
                            <!--
							<td align="center">
    	        
			    		<div class="btn-group">
							<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
							<ul class="dropdown-menu pull-right">
							
							<li><a href="javascript:Mars_popup('ad_mem_love_re_fix_reply.php?love_auto=262637','','width=600,height=300,top=200,left=200')"><i class="icon-edit"></i> 約後關懷</a></li>
							
                            
              </ul>
						</div>
						
   </td>-->
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_love_re_list_report.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_love_re_list_report.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_mem_love_re_list_report.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_mem_love_re_list_report.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_mem_love_re_list_report.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_mem_love_re_list_report.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_mem_love_re_list_report.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_mem_love_re_list_report.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_mem_love_re_list_report.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_mem_love_re_list_report.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_mem_love_re_list_report.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_mem_love_re_list_report.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_love_re_list_report.php?topage=1" selected>1</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=2">2</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=3">3</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=4">4</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=5">5</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=6">6</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=7">7</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=8">8</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=9">9</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=10">10</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=11">11</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=12">12</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=13">13</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=14">14</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=15">15</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=16">16</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=17">17</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=18">18</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=19">19</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=20">20</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=21">21</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=22">22</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=23">23</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=24">24</option>
                            <option value="/ad_mem_love_re_list_report.php?topage=25">25</option>
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

<script type="text/javascript">
    $(function() {
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");
        });


    });
</script>