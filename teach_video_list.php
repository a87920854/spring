<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<style>
    .video_div {
        border: 1px solid #ccc;
        margin: 5px;
        padding: 5px;
    }

    .va:visited {
        color: #E45C04;
    }
</style>
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="teach_video.php">教學影片</a></li>
            <li class="active">教學影片 - 一般區</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>教學影片 - 一般區</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p><input type="button" class="btn btn-info" value="回目錄頁" onclick="location.href='teach_video.php'">
                        &nbsp;&nbsp;<a href="?t=0&tt=1" class="btn btn-success">開發</a>
                        &nbsp;&nbsp;<a href="?t=0&tt=2" class="btn btn-success">邀約</a>
                        &nbsp;&nbsp;<a href="?t=0&tt=3" class="btn btn-success">訪談</a>
                        &nbsp;&nbsp;<a href="?t=0&tt=6" class="btn btn-success">排約</a>
                        &nbsp;&nbsp;<a href="?t=0&tt=7" class="btn btn-success">企劃</a>
                        &nbsp;&nbsp;<a href="?t=0&tt=4" class="btn btn-success">教育訓練</a>
                        &nbsp;&nbsp;<a href="?t=0&tt=8" class="btn btn-success">行銷</a>
                        &nbsp;&nbsp;<a href="?t=0&tt=5" class="btn btn-success">未分類</a>
                        &nbsp;&nbsp;<a href="?t=0&tt=0" class="btn btn-success">全部</a>

                    </p>
                    <p>
                    <form id="searchform" action="?t=0" method="post" class="form-inline" target="_self">
                        <input type="text" name="keyword" class="form-control" value="" placeholder="標題搜尋" required>
                        <input type="submit" class="btn btn-default" value="送出">
                    </form>
                    </p>
                </div>
                <div class="row">

                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2414">
                                <div style="text-align:center">一般區 - 總管理處<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">maggie邀約案例A014.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2413">
                                <div style="text-align:center">一般區 - 高雄<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">海妮疫情初線上分享邀約重點A020.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2412">
                                <div style="text-align:center">一般區 - 總管理處<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">Maggie邀約案例A016.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2411">
                                <div style="text-align:center">一般區 - 高雄<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-19-17-13-28-7015-高雄海妮串聯邀約順慈樂得開發81碩女老師到台北會館參觀0340.mp3</div>
                            </a>

                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2410">
                                <div style="text-align:center">一般區 - 台中<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-18-21-05-35-4003-台中宇婕提醒邀約樂得開發72大女護理服務業到高雄會館7455.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2409">
                                <div style="text-align:center">一般區 - 高雄<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-18-19-18-24-7008-高雄心祈串聯邀約64大男電子業到台北會館參觀6375.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2408">
                                <div style="text-align:center">一般區 - 台南<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-14-15-54-09-6012-台南淑華串聯邀約約專行銷名單67大男市府助理到台南會館4221.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2407">
                                <div style="text-align:center">一般區 - 高雄<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-17-15-45-00-7003-高雄順慈樂得開發81碩女老師住北部0340.mp3</div>
                            </a>

                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2406">
                                <div style="text-align:center">一般區 - 台南<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-15-12-31-37-6007-台南佳倩串聯邀約84大男職軍到會館參觀1912.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2405">
                                <div style="text-align:center">一般區 - 台北<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-11-20-27-36-2008-台北玉涵串聯邀約樂得開發74大男銷售到台南會館4390.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2404">
                                <div style="text-align:center">一般區 - 八德<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-11-20-01-57-2002-八德Sunny串聯邀約行銷名單64碩女學校行政新竹視訊7188.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2403">
                                <div style="text-align:center">一般區 - 八德<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-10-20-09-56-2006-八德靖雯串聯Line詢問64碩女銀行業0724.mp3</div>
                            </a>

                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2402">
                                <div style="text-align:center">一般區 - 桃園<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-10-15-32-22-3108-桃園可涵串聯邀約行銷名單75大男自營冷氣到台北會館1545.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2401">
                                <div style="text-align:center">一般區 - 桃園<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-10-15-27-16-3108-桃園可涵串聯邀約行銷名單75大男自營冷氣到台北會館1545.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2400">
                                <div style="text-align:center">一般區 - 台中<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-07-19-39-54-4003-台中宇婕串聯邀約樂得開發72大女護理服務業到高雄會館7455.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2399">
                                <div style="text-align:center">一般區 - 桃園<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-06-15-24-45-3107-桃園毓淳持續經營邀約2017舊行銷名單77大男自營廚具會館參觀8285.mp3</div>
                            </a>

                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2398">
                                <div style="text-align:center">一般區 - 台中<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-03-14-12-09-4003-台中宇婕樂得開發72大女護理師住高雄7455.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2397">
                                <div style="text-align:center">一般區 - 八德<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-08-02-19-53-15-2006-八德靖雯串聯邀約108年舊行銷名單72大男自營工程到約專會館0797.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2396">
                                <div style="text-align:center">一般區 - 台北<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-07-31-20-19-08-2006-台北玉涵串聯樂得開發74大男銷售4390.mp3</div>
                            </a>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="video_div">
                            <a class="va" href="teach_video_view.php?an=2395">
                                <div style="text-align:center">一般區 - 八德<br>邀約<br>

                                    <img src="img/audio_play.png" style="height:200px;">

                                </div>
                                <div style="text-align:center; white-space:nowrap;overflow:hidden">2021-07-27-14-38-52-2007-八德lily串聯邀約舊行銷名單73大男量販店台北視訊訪談1079.mp3</div>
                            </a>

                        </div>
                    </div>

                </div>

                <div class="clearfix"></div>
            </div>
            <div class="text-center">共 1208 筆、第 1 頁／共 61 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/teach_video_list.php?topage=1&t=0>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/teach_video_list.php?topage=2&t=0 class='text'>2</a></li>
                    <li><a href=/teach_video_list.php?topage=3&t=0 class='text'>3</a></li>
                    <li><a href=/teach_video_list.php?topage=4&t=0 class='text'>4</a></li>
                    <li><a href=/teach_video_list.php?topage=5&t=0 class='text'>5</a></li>
                    <li><a href=/teach_video_list.php?topage=6&t=0 class='text'>6</a></li>
                    <li><a href=/teach_video_list.php?topage=7&t=0 class='text'>7</a></li>
                    <li><a href=/teach_video_list.php?topage=8&t=0 class='text'>8</a></li>
                    <li><a href=/teach_video_list.php?topage=9&t=0 class='text'>9</a></li>
                    <li><a href=/teach_video_list.php?topage=10&t=0 class='text'>10</a></li>
                    <li><a href=/teach_video_list.php?topage=2&t=0 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/teach_video_list.php?topage=61&t=0 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/teach_video_list.php?topage=1&t=0" selected>1</option>
                            <option value="/teach_video_list.php?topage=2&t=0">2</option>
                            <option value="/teach_video_list.php?topage=3&t=0">3</option>
                            <option value="/teach_video_list.php?topage=4&t=0">4</option>
                            <option value="/teach_video_list.php?topage=5&t=0">5</option>
                            <option value="/teach_video_list.php?topage=6&t=0">6</option>
                            <option value="/teach_video_list.php?topage=7&t=0">7</option>
                            <option value="/teach_video_list.php?topage=8&t=0">8</option>
                            <option value="/teach_video_list.php?topage=9&t=0">9</option>
                            <option value="/teach_video_list.php?topage=10&t=0">10</option>
                            <option value="/teach_video_list.php?topage=11&t=0">11</option>
                            <option value="/teach_video_list.php?topage=12&t=0">12</option>
                            <option value="/teach_video_list.php?topage=13&t=0">13</option>
                            <option value="/teach_video_list.php?topage=14&t=0">14</option>
                            <option value="/teach_video_list.php?topage=15&t=0">15</option>
                            <option value="/teach_video_list.php?topage=16&t=0">16</option>
                            <option value="/teach_video_list.php?topage=17&t=0">17</option>
                            <option value="/teach_video_list.php?topage=18&t=0">18</option>
                            <option value="/teach_video_list.php?topage=19&t=0">19</option>
                            <option value="/teach_video_list.php?topage=20&t=0">20</option>
                            <option value="/teach_video_list.php?topage=21&t=0">21</option>
                            <option value="/teach_video_list.php?topage=22&t=0">22</option>
                            <option value="/teach_video_list.php?topage=23&t=0">23</option>
                            <option value="/teach_video_list.php?topage=24&t=0">24</option>
                            <option value="/teach_video_list.php?topage=25&t=0">25</option>
                            <option value="/teach_video_list.php?topage=26&t=0">26</option>
                            <option value="/teach_video_list.php?topage=27&t=0">27</option>
                            <option value="/teach_video_list.php?topage=28&t=0">28</option>
                            <option value="/teach_video_list.php?topage=29&t=0">29</option>
                            <option value="/teach_video_list.php?topage=30&t=0">30</option>
                            <option value="/teach_video_list.php?topage=31&t=0">31</option>
                            <option value="/teach_video_list.php?topage=32&t=0">32</option>
                            <option value="/teach_video_list.php?topage=33&t=0">33</option>
                            <option value="/teach_video_list.php?topage=34&t=0">34</option>
                            <option value="/teach_video_list.php?topage=35&t=0">35</option>
                            <option value="/teach_video_list.php?topage=36&t=0">36</option>
                            <option value="/teach_video_list.php?topage=37&t=0">37</option>
                            <option value="/teach_video_list.php?topage=38&t=0">38</option>
                            <option value="/teach_video_list.php?topage=39&t=0">39</option>
                            <option value="/teach_video_list.php?topage=40&t=0">40</option>
                            <option value="/teach_video_list.php?topage=41&t=0">41</option>
                            <option value="/teach_video_list.php?topage=42&t=0">42</option>
                            <option value="/teach_video_list.php?topage=43&t=0">43</option>
                            <option value="/teach_video_list.php?topage=44&t=0">44</option>
                            <option value="/teach_video_list.php?topage=45&t=0">45</option>
                            <option value="/teach_video_list.php?topage=46&t=0">46</option>
                            <option value="/teach_video_list.php?topage=47&t=0">47</option>
                            <option value="/teach_video_list.php?topage=48&t=0">48</option>
                            <option value="/teach_video_list.php?topage=49&t=0">49</option>
                            <option value="/teach_video_list.php?topage=50&t=0">50</option>
                            <option value="/teach_video_list.php?topage=51&t=0">51</option>
                            <option value="/teach_video_list.php?topage=52&t=0">52</option>
                            <option value="/teach_video_list.php?topage=53&t=0">53</option>
                            <option value="/teach_video_list.php?topage=54&t=0">54</option>
                            <option value="/teach_video_list.php?topage=55&t=0">55</option>
                            <option value="/teach_video_list.php?topage=56&t=0">56</option>
                            <option value="/teach_video_list.php?topage=57&t=0">57</option>
                            <option value="/teach_video_list.php?topage=58&t=0">58</option>
                            <option value="/teach_video_list.php?topage=59&t=0">59</option>
                            <option value="/teach_video_list.php?topage=60&t=0">60</option>
                            <option value="/teach_video_list.php?topage=61&t=0">61</option>
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

<script language="JavaScript">
    $mtu = "teach_video.";
</script>