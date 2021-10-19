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
            <li class="active">預約聯絡表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>預約聯絡表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <p><a href="ad_mem_reservation_list.php?y=2021&m=10" class="btn btn-info">列表模式</a>
                        <label class="checkbox" style="padding-left:24px;"><input type="checkbox" id="om" value="1"><i></i>只顯示自己</label>
                    </p>
                    <form class="form-inline" id="searchform" action="ad_mem_reservation_slist.php" method="post" target="_self" onsubmit="return chk_search_form()">


                        <select name="branch" id="branch">
                            <option value="">不拘</option>
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

                        <input type="text" class="form-control" name="keyword" id="keyword">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="74%" colspan=4><strong>110 年10月 </strong></td>
                            <td width="13%">●<a href="?y=2021&m=10">本月</a></td>
                            <td width="13%" style="border:0px">▲<a href="?y=2021&m=9&branch=">上一個月</a></td>
                            <td width="11%" style="border:0px">▼<a href="?y=2021&m=11&branch=">下一個月</a></td>
                        </tr>
                        <tr>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期日</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期一</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期二</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期三</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期四</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期五</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期六</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">1　　　　　　55筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/1&t2=2021/10/1">
                                        <div>新竹　張</div>
                                        <div>八德　熊健富</div>
                                        <div>高雄　陳</div>
                                        <div>高雄　康</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">2　　　　　　7筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/2&t2=2021/10/2">
                                        <div>八德　黃紹哲</div>
                                        <div>新竹　王</div>
                                        <div>八德　范國彰</div>
                                        <div>八德　劉富軒</div>
                                    </a></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">3　　　　　　7筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/3&t2=2021/10/3">
                                        <div>台北　龔鈺雅</div>
                                        <div>新竹　李</div>
                                        <div>八德　葡萄巧克力</div>
                                        <div>八德　汪秋男</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">4　　　　　　7筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/4&t2=2021/10/4">
                                        <div>桃園　莊秀媚</div>
                                        <div>高雄　陳聖樺</div>
                                        <div>新竹　陳蕙玲</div>
                                        <div>高雄　何</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">5　　　　　　4筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/5&t2=2021/10/5">
                                        <div>新竹　陳威勝</div>
                                        <div>八德　施偉傑</div>
                                        <div>台北　吳復華</div>
                                        <div>高雄　許証淳</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">6</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">7　　　　　　9筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/7&t2=2021/10/7">
                                        <div>新竹　林</div>
                                        <div>八德　林筱萍</div>
                                        <div>新竹　詹天賜</div>
                                        <div>台北　鍾憲明0968006100</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">8　　　　　　17筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/8&t2=2021/10/8">
                                        <div>高雄　張竣瑋</div>
                                        <div>高雄　劉</div>
                                        <div>高雄　SinShongChen</div>
                                        <div>高雄　周</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">9　　　　　　11筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/9&t2=2021/10/9">
                                        <div>八德　Eri</div>
                                        <div>高雄　黃</div>
                                        <div>八德　Eason伊森(135)</div>
                                        <div>高雄　梁瀚中</div>
                                    </a></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">10　　　　　　14筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/10&t2=2021/10/10">
                                        <div>高雄　劉峰昇</div>
                                        <div>八德　陸芯皓</div>
                                        <div>八德　李思嘉</div>
                                        <div>八德　楊</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">11　　　　　　1筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/11&t2=2021/10/11">
                                        <div>台中　許[詠麟]</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">12　　　　　　3筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/12&t2=2021/10/12">
                                        <div>高雄　莊</div>
                                        <div>高雄　胡</div>
                                        <div>高雄　鮑紹良</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">13　　　　　　2筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/13&t2=2021/10/13">
                                        <div>新竹　范</div>
                                        <div>高雄　江</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">14　　　　　　3筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/14&t2=2021/10/14">
                                        <div>八德　王瑋婷</div>
                                        <div>新竹　林</div>
                                        <div>八德　高衍</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">15　　　　　　15筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/15&t2=2021/10/15">
                                        <div>台北　張凱威</div>
                                        <div>高雄　蕭</div>
                                        <div>高雄　曾</div>
                                        <div>高雄　黄</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">16　　　　　　2筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/16&t2=2021/10/16">
                                        <div>桃園　李詩菁</div>
                                        <div>八德　陳仕源</div>
                                    </a></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">17　　　　　　1筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/17&t2=2021/10/17">
                                        <div>八德　胡記綸</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">18</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">19</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">20　　　　　　1筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/20&t2=2021/10/20">
                                        <div>新竹　陳</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">21　　　　　　4筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/21&t2=2021/10/21">
                                        <div>高雄　張</div>
                                        <div>台南　許先生</div>
                                        <div>桃園　蔡婉翎</div>
                                        <div>八德　王文卿</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">22　　　　　　5筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/22&t2=2021/10/22">
                                        <div>八德　徐仁邦</div>
                                        <div>台南　周先生</div>
                                        <div>八德　賴家禾</div>
                                        <div>高雄　鄭</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">23　　　　　　2筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/23&t2=2021/10/23">
                                        <div>八德　曾文爵</div>
                                        <div>桃園　龔先生</div>
                                    </a></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">24　　　　　　8筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/24&t2=2021/10/24">
                                        <div>新竹　黃</div>
                                        <div>八德　Daniel Wu</div>
                                        <div>八德　吳常茂</div>
                                        <div>八德　張富銓</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">25　　　　　　2筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/25&t2=2021/10/25">
                                        <div>八德　徐漢宇</div>
                                        <div>高雄　李育修</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">26</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">27　　　　　　2筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/27&t2=2021/10/27">
                                        <div>八德　吳定紘</div>
                                        <div>台北　黃明恩</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">28　　　　　　7筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/28&t2=2021/10/28">
                                        <div>新竹　曾</div>
                                        <div>高雄　林</div>
                                        <div>新竹　陳</div>
                                        <div>高雄　林軒宇</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">29　　　　　　5筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/29&t2=2021/10/29">
                                        <div>台北　林嵩偉</div>
                                        <div>八德　李靜采</div>
                                        <div>台北　李弘煜</div>
                                        <div>新竹　劉</div>
                                    </a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">30　　　　　　1筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/30&t2=2021/10/30">
                                        <div>台北　葉尚承</div>
                                    </a></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">31　　　　　　5筆</div>
                                <div><a href="ad_mem_reservation_v.php?t1=2021/10/31&t2=2021/10/31">
                                        <div>八德　小翠</div>
                                        <div>高雄　吳</div>
                                        <div>高雄　吳</div>
                                        <div>新竹　賴</div>
                                    </a></div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>


                    </tbody>
                </table>
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

<script language="JavaScript">
    function chk_search_form() {
        if (!$("#branch").val() && !$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        return true;
    }
    $(function() {
        var $curr = $(location).attr("search"),
            $path = $(location).attr("pathname");
        $("#om").on("change", function() {
            if ($(this).prop("checked")) {
                location.href = $path + ($curr ? $curr + "&om=1" : "?om=1");
            } else {
                location.href = $path + ($curr ? $curr.replace("&om=1", "").replace("?om=1", "") : "");
            }
        });
    });
</script>