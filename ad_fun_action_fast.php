<?php
    /*****************************************/
    //檔案名稱：ad_fun_action_fast.php
    //後台對應位置：好好玩管理系統/好好玩國外團控>出團情報
    //改版日期：2021.12.9
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }

    // 更新
    if($_REQUEST["st"] == "save_edit"){
        $dd = $_REQUEST["dd"];
	    $vv = $_REQUEST["v"];
        if($dd != ""){
            switch($_REQUEST["t"]){
                case "sp":
                    $SQL = "update travel_fast set sp='".$vv."' where auton=".$dd;
                    break;
                case "people":
                    $SQL = "update travel_fast set people='".$vv."' where auton=".$dd;
                    break;
                case "notes":
                    $SQL = "update travel_fast set notes='".$vv."' where auton=".$dd;
                    break;
            }
        }
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        echo $vv;
    }

    if($_REQUEST["st"] == "get_travel"){
        $SQL = "select dates from travel_date where ac_auto = ".SqlFilter($_REQUEST["ac_auto"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
        if($result){
            foreach($result as $re){
                $dd = $dd . $result["dates"] . ",";
            }            
        }else{
            echo "error";
        }
        if(substr($dd,-1) == ","){
            $dd = substr($dd,0,-1);
        }
        echo $dd;
    }

    if($_REQUEST["st"] == "get_travel_note"){
        $SQL = "select notes from travel_date where ac_auto = ".SqlFilter($_REQUEST["ac_auto"],"int"). " and datediff(d, dates, '".SqlFilter($_REQUEST["dates"],"tab")."') = 0";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
        if($result){
            echo $result["notes"];
        }
    }

    // 刪除
    if($_REQUEST["st"] == "del"){
        $SQL = "delete from travel_fast where auton=".SqlFilter($_REQUEST["a"],"tab");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=刪除中...");
            exit();
        }
    }

    // 新增
    if($_REQUEST["st"] == "add"){
        $SQL = "select stype, skingdom, ac_title from actionf_data where ac_auto=".SqlFilter($_REQUEST["ac_auto"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $stype = $result["stype"];
            $skingdom = $result["skingdom"];
            $ac_title = $result["ac_title"];
        }
        $people = SqlFilter($_REQUEST["people"],"tab");
        if(is_numeric($people)){
            if($people == "0"){
                $people = "即將額滿";
            }else{
                $people = "滿 ".$people." 人出團";
            }
        }else{
            $people = SqlFilter($_REQUEST["people"],"tab");
        }
        $SQL =  "INSERT INTO travel_fast (dates, stype, skingdom, sp, title, people, notes, ac_auto) VALUES ("
                .date("Y/m/d",strtotime($_REQUEST["dates"])).", "
                .$stype.", "
                .$skingdom.", "
                .SqlFilter($_REQUEST["sp"],"tab").", "
                .$ac_title.", "
                .$people.", "
                .SqlFilter($_REQUEST["notes"],"tab").", "
                .SqlFilter($_REQUEST["ac_auto"],"int").")";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("ad_fun_action_fast.php");
            exit();
        }
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action_list2.php">好好玩國外團控</a></li>
            <li class="active">出團情報</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>出團情報</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                    <tbody>
                        <tr>
                            <td>月份</td>
                            <td>出發日期</td>
                            <td>類 型</td>
                            <td>旅遊國家</td>
                            <td>重點特色</td>
                            <td>團 名</td>
                            <td>出團人數</td>
                            <td>備 註</td>
                            <td></td>
                        </tr>
                        <?php                             
                            $SQL = "select * from travel_fast order by dates asc";
                            $rs = $FunConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=8>無資料</td></tr>";
                            }else{
                                $cc = 1;
                                $msgs = "";
                                $f = $rs->RecordCount();
                                foreach($result as $re){
                                    $dates = $re["dates"];
                                    $nowmm = date("m",strtotime($dates));
                                    if($nowmm == $lastmm){
                                        $cc = $cc+1;
                                    }        
                                }
                                
                            }

                        ?>

                    </tbody>
                </table>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                    <tbody>
                        <tr>
                            <td>
                                <form id="addform" action="?st=add" method="post" target="_self" class="form-inline" onsubmit="return chk_form()">
                                    <select name="ac_auto" id="ac_auto" class="width-150">
                                        <option value="">請選擇</option>
                                        <option value="1980">LOVE旅遊-菲律賓-小島渡假-巴拉望愛純淨物語5日</option>
                                        <option value="1977">LOVE旅遊-韓國-時尚城市-小資女孩~哈韓好好玩</option>
                                        <option value="1976">LOVE旅遊-泰國-高檔精緻-94玩翻天，不去泰可惜</option>
                                        <option value="1974">LOVE旅遊-越南-時尚城市-驚芽無限~東方馬爾地夫</option>
                                        <option value="1973">LOVE旅遊-日本-時尚城市-韓日雙國-釜山關西8日</option>
                                        <option value="1971">LOVE旅遊-越南-小島渡假-富國島+東方小巴黎</option>
                                        <option value="1969">LOVE旅遊-菲律賓-小島渡假-戀上巴拉望與海共舞５日</option>
                                        <option value="1968">LOVE旅遊-中國-小島渡假-絕美絲路10日</option>
                                        <option value="1967">LOVE旅遊-土耳其-高檔精緻-迷戀土耳其奇幻之旅</option>
                                        <option value="1966">LOVE旅遊-韓國-時尚城市-特愛釜山吃到飽美食5日</option>
                                        <option value="1965">LOVE旅遊-日本-高檔精緻-相遇北陸秘境5日</option>
                                        <option value="1964">LOVE旅遊-中國-時尚城市-情繫重慶山城風情5日</option>
                                        <option value="1963">LOVE旅遊-中國-時尚城市-情繫重慶山城風情4日</option>
                                        <option value="1960">LOVE旅遊-印尼-小島渡假-巴里遇到愛一次玩雙島</option>
                                        <option value="1959">LOVE旅遊-韓國-高檔精緻-相遇韓國樂翻天5日</option>
                                        <option value="1958">LOVE旅遊-韓國-時尚城市-愛戀韓國華川鱒魚冰雪節</option>
                                        <option value="1957">LOVE旅遊-菲律賓-小島渡假-擁抱鯨鯊雙島情緣</option>
                                        <option value="1956">LOVE旅遊-日本-高檔精緻-日本之最山陽四國大蒐秘</option>
                                        <option value="1955">LOVE旅遊-歐洲-高檔精緻-童話城堡三大遊船荷比法</option>
                                        <option value="1954">LOVE旅遊-中國-情定兩岸-華人廈門約會趣情定兩岸</option>
                                        <option value="1953">LOVE旅遊-泰國-小島渡假-揪愛泰國～絕色沙美島</option>
                                        <option value="1952">LOVE旅遊-馬來西亞-小島渡假-潔淨與美的海角樂園─古晉市區躲貓貓！</option>
                                        <option value="1951">LOVE旅遊-泰國-高檔精緻-泰愛你～泰國甜心號、開心趴趴GO、5+1日</option>
                                        <option value="1950">LOVE旅遊-韓國-高檔精緻-雙城雙戀LOVE遊5日</option>
                                        <option value="1946">LOVE旅遊-菲律賓-小島渡假-超級新玩家~巴拉望一島一飯店渡假村</option>
                                        <option value="1944">LOVE旅遊-中國-時尚城市-澳港饗宴～精選四日【無購物】</option>
                                        <option value="1942">LOVE旅遊-菲律賓-小島渡假-菲要你好玩-看見心宿霧</option>
                                        <option value="1941">LOVE旅遊-越南-高檔精緻-北越~山水雙龍灣-海上公主號、萍水小舟、纜車摩天輪、五星飯店下午茶</option>
                                        <option value="1939">LOVE旅遊-韓國-高檔精緻-慢活濟州2大主題生態探索</option>
                                        <option value="1938">LOVE旅遊-宿霧-小島渡假-「宿霧」浪漫海底精靈遊</option>
                                        <option value="1937">LOVE旅遊-伊豆箱根-時尚城市- </option>
                                        <option value="1921">LOVE旅遊-馬來西亞-時尚城市-美食探索大馬尋情記 </option>
                                        <option value="1920">LOVE旅遊-首爾-時尚城市-孤單又燦爛的鬼怪之旅 </option>
                                        <option value="1919">LOVE旅遊-泰國-高檔精緻- 泰瘋癲之食尚贏家</option>
                                        <option value="1918">LOVE旅遊-首爾+釜山-時尚城市-首爾釜山雙城記之屍速列車</option>
                                        <option value="1917">LOVE旅遊-韓國首爾-時尚城市-Running love 奔跑吧愛情！</option>
                                        <option value="1915">LOVE旅遊-南韓-時尚城市-好好玩韓國聖誕奇蹟系列~遇見暖男劉大尉之旅</option>
                                        <option value="1914">LOVE旅遊-歐洲-高檔精緻-「魅力歐洲」沉醉在愛的世界中</option>
                                        <option value="1913">LOVE旅遊-菲律賓-時尚城市- 「宿霧」浪漫海底精靈遊</option>
                                        <option value="1911">LOVE旅遊-馬來西亞-時尚城市-浪漫七夕-與您愛在馬來西亞</option>
                                        <option value="1910">LOVE旅遊-海南島-小島渡假-非誠勿擾-浪漫電影場景在海南</option>
                                        <option value="1908">LOVE旅遊-日本-時尚城市-【淡季撿便宜】來去大阪初體驗</option>
                                        <option value="1905">LOVE旅遊-日本-高檔精緻-【戀愛黃金周】夢幻郵輪 熱戀沖繩</option>
                                        <option value="1902">LOVE旅遊-南韓-高檔精緻-【玩雪趣】劃破星空~雪花紛飛的南怡島~首爾奇遇篇</option>
                                        <option value="1901">LOVE旅遊-泰國-小島渡假-【世界最美愛之島】單身豔遇沙美島</option>
                                        <option value="1897">LOVE旅遊-香港-小島渡假-徜徉在愛情的郵輪情懷</option>
                                        <option value="1895">LOVE旅遊-中國-小島渡假-醞釀愛情的幸福國度～青島</option>
                                        <option value="1893">LOVE旅遊-南韓-高檔精緻-秋遊韓國愛楓了</option>
                                        <option value="1892">LOVE旅遊-希臘-高檔精緻-遺落在希臘的浪漫情懷</option>
                                        <option value="1890">LOVE旅遊-美國-小島渡假-【樂做海島人】戀戀關島咨意遊</option>
                                        <option value="1889">LOVE旅遊-菲律賓-小島渡假-【海島主人篇】玩樂步履寫下~長灘~物語</option>
                                        <option value="1887">LOVE旅遊-南韓-小島渡假-真愛濟州浪漫遊</option>
                                        <option value="1879">LOVE旅遊-新加坡、印尼-小島渡假-情定新加坡、愛在民丹島</option>
                                        <option value="1873">LOVE旅遊-美國-小島渡假-單身貴族夏威夷浪漫遊</option>
                                        <option value="1871">LOVE旅遊-馬來西亞-小島渡假-浪花一朵朵之 愛在樂浪島</option>
                                        <option value="1864">LOVE旅遊-泰國-高檔精緻-【單身愛玩樂】雲海之都~泰國華欣魅力遊</option>
                                        <option value="1859">LOVE旅遊-南韓-時尚城市-1/23讓愛自由 - 韓國華川冰雪祭</option>
                                        <option value="1983">FUN旅遊-韓國釜山-時尚城市-釜山滑出萌萌的愛5日</option>
                                        <option value="1982">FUN旅遊-日本-時尚城市-小日本愛玩大軌跡5日</option>
                                        <option value="1981">FUN旅遊-韓國首爾-時尚城市-愛韓風情人視角之旅5日</option>
                                        <option value="1979">FUN旅遊-馬來西亞+新加坡-小島渡假-馬新派對紅花奇緣5日</option>
                                        <option value="1978">FUN旅遊-泰國-時尚城市-泰愛潑水在暹羅6+1日</option>
                                        <option value="1975">FUN旅遊-澳洲-時尚城市-小資女孩~愛的抱抱</option>
                                        <option value="1972">FUN旅遊-中國-小島渡假-江西篁嶺古村16天</option>
                                        <option value="1970">FUN旅遊-中國-高檔精緻-江蘇鎮江戀愛都市15天</option>
                                        <option value="1962">FUN旅遊-中國-時尚城市-相遇在白櫻飛雪的季節</option>
                                        <option value="1961">FUN旅遊-中國-高檔精緻-雪鄉戀歌俄羅斯風情５天</option>
                                        <option value="1949">FUN旅遊-日本-時尚城市-FUN鬆九州鐵道輕旅行4日</option>
                                        <option value="1948">FUN旅遊-日本-時尚城市-FUN鬆九州鐵道輕旅行4日</option>
                                        <option value="1947">FUN旅遊-日本-小島渡假-FUN鬆遊沖繩~浪漫小希臘~瀨長島.海水與愛情神話傳說~古宇利島</option>
                                        <option value="1945">FUN旅遊-新加坡-時尚城市-新印雙國跳島遊４天</option>
                                        <option value="1943">FUN旅遊-日本-小島渡假-太陽公主號～石垣、沖繩、宮古島自主遊５日(內艙)</option>
                                        <option value="1940">FUN旅遊-新加坡-時尚城市-《玩雙國》FUN新玩時尚新加坡＋悠閒印尼巴淡島</option>
                                        <option value="1912">FUN旅遊-澳門-時尚城市-探訪愛情中迷人的【澳秘】</option>
                                        <option value="1909">FUN旅遊-日本-時尚城市-雪國。北海道浪漫風情畫</option>
                                        <option value="1907">FUN旅遊-泰國-時尚城市-潑水遇幸福 泰好玩浪漫遊</option>
                                        <option value="1906">FUN旅遊-日本-高檔精緻-春&#12398;遊 日本關東浪漫賞櫻行</option>
                                        <option value="1900">FUN旅遊-日本-高檔精緻-【朝聖趣】札幌雪祭團</option>
                                        <option value="1899">FUN旅遊-日本-高檔精緻-【賞楓團】秋天是楓的顏色~~幸福漫步輕井澤</option>
                                        <option value="1898">FUN旅遊-帛琉-小島渡假-【玩水趣】碧海藍天就是愛帛琉</option>
                                        <option value="1891">FUN旅遊-日本-小島渡假-嗨翻天-愛上沖繩的碧海藍天</option>
                                        <option value="1888">FUN旅遊-越南-小島渡假-下龍灣風情話</option>
                                        <option value="1886">FUN旅遊-日本-高檔精緻-幸福漫步輕井澤-森林浪漫小鎮</option>
                                        <option value="1883">FUN旅遊-南韓-時尚城市-來自星星的奇妙戀曲~首爾愛戀篇</option>
                                        <option value="1880">FUN旅遊-印尼-小島渡假-【享樂主義】熱情如火的峇里饗宴</option>
                                        <option value="1878">--小島渡假-情定新加坡、愛在民丹島參訪團</option>
                                        <option value="1877">--小島渡假-單身貴族綠中海浪漫遊</option>
                                        <option value="1876">--小島渡假-單身貴族美夢成真浪漫遊</option>
                                        <option value="1875">--小島渡假-單身貴族綠中海豪華遊</option>
                                        <option value="1874">--小島渡假-單身貴族雲海戀豪華浪漫遊</option>
                                        <option value="1872">--小島渡假-沙巴~美夢成真浪漫遊</option>
                                        <option value="1870">--小島渡假-冬季戀歌豪華浪漫遊</option>
                                        <option value="1868">--小島渡假-濃情澳洲浪漫遊</option>
                                        <option value="1866">--情定兩岸-"華人約會去"~去廈門約會</option>
                                        <option value="1865">--情定兩岸-"華人約會去"~去廈門約會</option>
                                        <option value="1863">--時尚城市-前往戀愛航道 ~ 東京仙履情緣 New Tokyo Love Story

                                            超鳥專案:凡是2/7前報名並繳交訂金1萬元，即享超鳥價3000扣抵。</option>
                                        <option value="1858">--時尚城市-幸福99水晶聖誕香港三日遊</option>
                                        <option value="1805">--小島渡假-單身愛情探險物語~長灘島4日</option>
                                        <option value="1803">--小島渡假-單身愛情探險物語~泰國6日(台北出發)</option>
                                        <option value="1802">--小島渡假-單身愛情探險物語~泰國6日(高雄出發)</option>
                                        <option value="1801">--時尚城市-單身愛情探險物語~韓國</option>
                                        <option value="1800">--小島渡假-單身愛情探險物語~蘇梅島5日</option>
                                        <option value="1723">--時尚城市-香港美食心靈團~半自由行3天</option>
                                        <option value="1693">--時尚城市-香港美食心靈團~半自由行(已出發)</option>
                                    </select><span id="ac_auto_div"></span>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <hr>
    
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $mtu = "ad_fun_action_list2.";
    $(function() {
        $("#ac_auto").val("");
        var $ac_auto_div = $("#ac_auto_div");
        $("#ac_auto").on("change", function() {
            $ac_auto_div.empty();
            var $tval = $(this).val();
            if (!$tval) return false;
            var $s1 = $("<select>").attr("id", "dates").attr("name", "dates");
            $s1.append($("<option></option>").attr("value", "").text("請選擇"));
            $.ajax({
                type: "POST",
                url: "ad_fun_action_fast.asp",
                data: {
                    st: "get_travel",
                    ac_auto: $tval
                },
                error: function(xhr) {},
                success: function(response) {
                    if (response == "error") {
                        alert("日期讀取錯誤或不存在日期資料。");
                        $ac_auto_div.empty();
                        $("#ac_auto").val("");
                    } else {

                        $.each(response.split(","), function(key, value) {
                            $s1.append($("<option></option>").attr("value", value).text(value));
                        });
                    }
                }
            });
            $ac_auto_div.append($s1);
            $i1 = $("<input>").attr("name", "sp").attr("id", "sp").attr("placeholder", "重點特色").addClass("form-control");
            $i2 = $("<input>").attr("name", "people").attr("id", "people").attr("placeholder", "出團人數,即將額滿輸入0").addClass("form-control");
            $i3 = $("<input>").attr("name", "notes").attr("id", "notes").attr("placeholder", "備註").css("width", "250px").addClass("form-control");
            $i4 = $("<input>").attr("type", "submit").val("新增").addClass("btn").addClass("btn-default");

            $ac_auto_div.append($i1);
            $ac_auto_div.append($i2);
            $ac_auto_div.append($i3);
            $ac_auto_div.append($i4);
            $s1.on("change", function() {
                if (!$(this).val()) return false;
                $.ajax({
                    type: "POST",
                    url: "ad_fun_action_fast.asp",
                    data: {
                        st: "get_travel_note",
                        ac_auto: $tval,
                        dates: $(this).val()
                    },
                    error: function(xhr) {},
                    success: function(response) {
                        $i3.val(response);
                    }
                });
            });
        });
    });

    function chk_form() {
        if (!$("#dates").val()) {
            alert("請選擇日期。");
            return false;
        }
        return true;
    }

    function edit_set(tt, dd) {
        var $ediv = $("#" + tt + "_" + dd);
        $ediv.data("oldhtml", $ediv.find("a").clone());
        $ediv.find("a").remove();
        $ehtml = $.trim($ediv.html());
        $ediv.empty();

        var $ninput_name = dd + "_input";
        var $ninput = $("<input>").attr("type", "text").attr("id", $ninput_name).attr("name", $ninput_name).val($ehtml);
        $ediv.append($ninput);
        $ninput.on("blur", function() {
            save_set(tt, dd);
        }).keypress(function(e) {
            var $code = (e.keyCode ? e.keyCode : e.which);
            if ($code == 13) {
                save_set(tt, dd);
            }
        });
        $ninput.focus();
    }

    function save_set(tt, dd) {
        var $ediv = $("#" + tt + "_" + dd);
        var $ninput_name = dd + "_input";
        var $sinput = $("#" + $ninput_name),
            $savemsg = $("<div>儲存中..</div>");
        if ($sinput.length > 0) {
            $ediv.append($savemsg);
            $.ajax({
                type: "POST",
                url: "ad_fun_action_fast.asp",
                data: {
                    st: "save_edit",
                    t: tt,
                    dd: dd,
                    v: $sinput.val()
                },
                error: function(xhr) {},
                success: function(response) {
                    $savemsg.remove();
                    $ediv.html(response);
                    $ediv.append($ediv.data("oldhtml"));

                }
            });
        }
    }
</script>