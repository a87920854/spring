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
            <li><a href="teach_video.php">教學影片</a></li>
            <li class="active">授權及影片播放記錄</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>授權及影片播放記錄 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form name="form1" method="post" class="form-inline" action="?vst=full">
                        　 記錄時間： <input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="">
                        <select name="branch" id="branch">
                            <option value="">所有會館</option>
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
                        <select name="ty" id="ty">
                            <option value="">所有類型</option>
                            <option value="1">授權設定</option>
                            <option value="2">影片播放</option>
                        </select>
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>記錄</th>

                            <th width=100>區域</th>
                            <th width=200>記錄人</th>
                            <th width=180>日期</th>
                        </tr>

                        <tr>
                            <td align="center">陳妍瑀[F227296026]暫停播放一般區 - 2021-08-07-19-39-54-4003-台中宇婕串聯邀約樂得開發72大女護理服務業到高雄會館7455.mp3[2400] - 2021/9/8 下午 07:25:59/ip:59.124.171.187</td>
                            <td align="center">一般區</td>
                            <td align="center">新竹-陳妍瑀[F227296026]</td>
                            <td align="center">2021/9/8 下午 07:25:59</td>
                        </tr>

                        <tr>
                            <td align="center">陳妍瑀[F227296026]開始播放一般區 - 2021-08-07-19-39-54-4003-台中宇婕串聯邀約樂得開發72大女護理服務業到高雄會館7455.mp3[2400] - 2021/9/8 下午 07:24:59/ip:59.124.171.187</td>
                            <td align="center">一般區</td>
                            <td align="center">新竹-陳妍瑀[F227296026]</td>
                            <td align="center">2021/9/8 下午 07:25:00</td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/teach_video_log.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/teach_video_log.php?topage=2 class='text'>2</a></li>
                    <li><a href=/teach_video_log.php?topage=3 class='text'>3</a></li>
                    <li><a href=/teach_video_log.php?topage=4 class='text'>4</a></li>
                    <li><a href=/teach_video_log.php?topage=5 class='text'>5</a></li>
                    <li><a href=/teach_video_log.php?topage=6 class='text'>6</a></li>
                    <li><a href=/teach_video_log.php?topage=7 class='text'>7</a></li>
                    <li><a href=/teach_video_log.php?topage=8 class='text'>8</a></li>
                    <li><a href=/teach_video_log.php?topage=9 class='text'>9</a></li>
                    <li><a href=/teach_video_log.php?topage=10 class='text'>10</a></li>
                    <li><a href=/teach_video_log.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/teach_video_log.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/teach_video_log.php?topage=1" selected>1</option>
                            <option value="/teach_video_log.php?topage=2">2</option>
                            <option value="/teach_video_log.php?topage=3">3</option>
                            <option value="/teach_video_log.php?topage=4">4</option>
                            <option value="/teach_video_log.php?topage=5">5</option>
                            <option value="/teach_video_log.php?topage=6">6</option>
                            <option value="/teach_video_log.php?topage=7">7</option>
                            <option value="/teach_video_log.php?topage=8">8</option>
                            <option value="/teach_video_log.php?topage=9">9</option>
                            <option value="/teach_video_log.php?topage=10">10</option>
                            <option value="/teach_video_log.php?topage=11">11</option>
                            <option value="/teach_video_log.php?topage=12">12</option>
                            <option value="/teach_video_log.php?topage=13">13</option>
                            <option value="/teach_video_log.php?topage=14">14</option>
                            <option value="/teach_video_log.php?topage=15">15</option>
                            <option value="/teach_video_log.php?topage=16">16</option>
                            <option value="/teach_video_log.php?topage=17">17</option>
                            <option value="/teach_video_log.php?topage=18">18</option>
                            <option value="/teach_video_log.php?topage=19">19</option>
                            <option value="/teach_video_log.php?topage=20">20</option>
                            <option value="/teach_video_log.php?topage=21">21</option>
                            <option value="/teach_video_log.php?topage=22">22</option>
                            <option value="/teach_video_log.php?topage=23">23</option>
                            <option value="/teach_video_log.php?topage=24">24</option>
                            <option value="/teach_video_log.php?topage=25">25</option>
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
    $mtu = "teach_video.";
    $(function() {
        $("#pay1").on("change", function() {
            personnel_get("pay1", "pay2");
        });
    });
</script>