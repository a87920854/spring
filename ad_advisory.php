<?php
 require("./include/_top.php");
 require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">諮詢紀錄表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>諮詢紀錄表 - 數量：2　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <a href="#o" class="btn btn-info btn-sm" onclick="Mars_popup('ad_advisory_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');">新增諮詢紀錄</a>&nbsp;&nbsp;
                    <!--<a href="#o" class="btn btn-success btn-sm" onclick="Mars_popup('ad_advisory_del.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');">活動取款/退費</a>&nbsp;&nbsp;-->
                    <a href="#o" class="btn btn-primary btn-sm" onclick="Mars_popup('ad_advisory_print.php?a=b','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=700,height=700,top=10,left=10');">列印紀錄</a>&nbsp;&nbsp;
                    <a href="#o" class="btn btn-warning btn-sm" onclick="Mars_popup('ad_advisory_query.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');">查詢服務成本</a><br>
                    　
                    <form action="ad_advisory.php?vst=full" method="post" name="form1" class="form-inline">
                        <p>諮詢時間： <input type="text" name="time1" id="time1" class="datepicker" autocomplete="off" value=""> 到 <input type="text" name="time2" id="time2" class="datepicker" autocomplete="off" value="">
                            紀錄時間： <input type="text" name="qtime1" id="qtime1" class="datepicker" autocomplete="off" value=""> 到 <input type="text" name="qtime2" id="qtime2" class="datepicker" autocomplete="off" value="">
                            <input name="keyword" id="keyword" type="text" class="form-control">
                        </p>
                        <p>
                            會館：
                            <select name="s6" id="s6" class="form-control">
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
                            <select name="s7" id="s7" class="form-control">
                                <option value="">請選擇</option>
                            </select>
                            &nbsp;&nbsp;講師：
                            <select name="s8" id="s8" class="form-control">
                                <option value="">請選擇</option>
                                <option value="cooper.wu">吳哈克</option>
                                <option value="Q12345">瑪那熊</option>
                                <option value="D120674564">安東尼</option>
                                <option value="C220093239">金雪娟</option>
                                <option value="E222367725">吳琪雅</option>
                                <option value="E220126780">王心祈</option>
                                <option value="E223522640">張善羢</option>
                                <option value="T220370271">姜秀鳳</option>
                                <option value="H221182963">蔡美鳳</option>
                                <option value="tp23811348">台北KEYIN</option>
                                <option value="O200093878">Cherry</option>
                                <option value="E223863682">葉咏佳 </option>
                                <option value="E221888770">洪秀麗 </option>
                                <option value="j2022273744">彭淑慧</option>
                                <option value="89867482">台北督導</option>
                                <option value="S222482308">張美珠</option>
                                <option value="T123827391">阿樂</option>
                                <option value="A221143987">張茹茵</option>
                                <option value="12345678">嚴雋凱</option>
                                <option value="M122437155">威威</option>
                                <option value="C220578291">易珊</option>
                                <option value="O100241729">趙達岳</option>
                                <option value="">不明</option>
                                <option value="97348077">台中督導</option>
                                <option value="X220282965">謝宛萍</option>
                                <option value="D221429903">杜佳倩</option>
                                <option value="D220036977">洪秀琳</option>
                                <option value="A129483299">黃子豪</option>
                                <option value="B222808415">曹羽均</option>
                                <option value="E124017799">謝文豪</option>
                                <option value="H123763437">小八</option>
                                <option value="80662419">八德督導</option>
                                <option value="B290038087">劉咪秀</option>
                                <option value="R222349969">顏琇</option>
                                <option value="S221372241">趙素蕙</option>
                                <option value="S221146616">王玉芳</option>
                                <option value="L122925364">陳譽中</option>
                                <option value="R222746986">張維津</option>
                                <option value="J122099279">阿綸</option>
                                <option value="A130353266">Ethan</option>
                                <option value="16922467">新竹督導</option>
                                <option value="T220352344">劉明英</option>
                                <option value="Q220171748">柯宥如 Maggie</option>
                                <option value="T123456789">諮詢老師</option>
                                <option value="H123898293">史丹利</option>
                                <option value="E221248276">侯安琪</option>
                                <option value="E224004114">怡君</option>
                                <option value="S122624117">姜沛紳</option>
                                <option value="O200289687">賴怡安</option>
                                <option value="S123592187">江孟樺</option>
                                <option value="T200141587">賴姐</option>
                                <option value="E222330988">李淑惠</option>
                            </select>

                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>諮詢時間</th>
                            <th>諮詢類型</th>
                            <th>諮詢對象</th>
                            <th>諮詢費</th>
                            <th>剩餘成本</th>
                            <th>新剩餘成本</th>
                            <th>會員會館秘書</th>
                            <th>講師會館</th>
                            <th>諮詢講師</th>
                            <th>紀錄時間</th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center">2020/10/21 下午 04:00:00</td>
                            <td align="center">一對一諮詢</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=173134" target="_blank">黃金品[173134]</a></td>
                            <td align="center">現金：699 元</td>
                            <td align="center">0 元</td>
                            <td align="center">0 元</td>
                            <td align="center">總管理處/張利 Liz</td>
                            <td align="center">台北</td>
                            <td align="center">瑪那熊</td>
                            <td align="center">2020/10/21 下午 05:51:54</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/3/15 上午 10:00:00</td>
                            <td align="center">一對一造型諮詢</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=738767" target="_blank">林紹鈞[738767]</a></td>
                            <td align="center">新抵用卷：1800 元</td>
                            <td align="center">0 元</td>
                            <td align="center">3200 元</td>
                            <td align="center">總管理處/柯宥如 Maggie</td>
                            <td align="center">八德</td>
                            <td align="center">八德督導</td>
                            <td align="center">2020/3/17 下午 06:18:22</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 2 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_advisory.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_advisory.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_advisory.php?topage=1" selected>1</option>
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
 require("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");
        });
        $("#member_query_button").on("click", function() {
            if (!$("#qkword").val()) {
                alert("請輸入要查詢的會員相關資料，如姓名、電話等。");
                $("#qkword").focus();
                return false;
            }
            Mars_popup('ad_mem_love_re_list.php?st=query_member&qkword=' + $("#qkword").val(), '', 'width=500,height=250,top=250,left=250');
        });
    });
</script>