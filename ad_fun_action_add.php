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
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action1.asp">好好玩國內報名</a></li>
            <li class="active">新增報名資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增報名資料</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="searchform" action="?st=add" method="post" target="_self" class="form-inline" onsubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td colspan=2>
                                    活動場次：
                                    <select id="ac_auto" name="ac_auto" style="width:80%;" class="form-control">
                                        <option value="">請選擇</option>
                                        <option value="3059">好好玩旅行社2021/11/20 上午 10:00:00桃源仙谷遇見愛｜遊賞花田+祕境探索+烤肉饗宴+拍照任務【無法成團將不另行通知】</option>

                                        <option value="3058">好好玩旅行社2021/11/7 上午 08:00:00三峽傳藝輕旅｜藍染手作+客家擂茶體驗+童玩競賽+美食任務【無法成團將不另行通知】</option>

                                        <option value="3051">好好玩旅行社2021/11/6 上午 08:30:00竹語茶蘆控窯趣｜古農具導覽+團體控窯+草編DIY+擂茶DIY【無法成團將不另行通知】</option>

                                        <option value="3055">好好玩旅行社2021/10/24 上午 09:00:00北海岸踏浪趣｜探索金沙灣秘境＋超夯IG打卡熱點＋懷舊鐵路便當＋海灘分組遊戲【無法成團將不另行通知】</option>

                                        <option value="3053">好好玩旅行社2021/10/17 上午 08:30:00宜蘭療癒輕旅行｜小動物餵食+DIY窯烤披薩+幸福手做禮+擠羊奶體驗【無法成團將不另行通知】</option>

                                        <option value="3056">好好玩旅行社2021/10/3 下午 02:00:00下午茶聯誼派對｜網美之旅+拍照任務【無法成團將不另行通知】</option>

                                        <option value="3054">好好玩旅行社2021/10/2 下午 02:00:00野餐派對｜網美必拍+精緻美食+桌遊Party Game+互動遊戲【無法成團將不另行通知】</option>

                                        <option value="3057">好好玩旅行社2021/9/25 下午 02:00:00歡樂休閒｜密室逃脫＋下午茶 🌟【無法成團將不另行通知】</option>

                                        <option value="3049">好好玩旅行社2021/9/25 下午 02:00:00愛×邂逅(7年級下午茶台北場)【無法成團將不另行通知】</option>

                                        <option value="3052">好好玩旅行社2021/9/19 上午 10:00:00「粉」想見你 ‧｜玫瑰甜蜜烘焙派對【無法成團將不另行通知】</option>

                                        <option value="3050">好好玩旅行社2021/9/18 下午 02:00:00愛×萌芽(8年級下午茶台北場)【無法成團將不另行通知】</option>

                                        <option value="3048">好好玩旅行社2021/9/11 下午 02:00:00愛×熟成(6年級下午茶台北場)【無法成團將不另行通知】</option>

                                        <option value="3047">好好玩旅行社2021/8/14 下午 05:00:00七夕遊艇特企｜夢幻微醺調酒＋專業超嗨DJ＋超閃亮耀眼戰袍</option>

                                        <option value="3045">好好玩旅行社2021/8/8 下午 01:00:00大稻埕祈福半日遊｜霞海月老求姻緣＋騎行夕陽河畔＋戶外下午茶約會</option>

                                        <option value="3044">好好玩旅行社2021/8/7 下午 02:00:00熟齡愛戀約會｜55-65優質三高穩重男</option>

                                        <option value="3043">好好玩旅行社2021/8/1 下午 01:00:00日系午茶Dating｜療癒浮游花DIY+日式甜點套餐＋愛戀換桌約會</option>

                                        <option value="3042">好好玩旅行社2021/7/31 上午 08:00:00脫單率超高爆團｜超靈驗月老祈福＋品嚐伊達邵美食＋日月潭風光遊湖</option>

                                        <option value="3041">好好玩旅行社2021/7/25 下午 02:00:00微醺cheers派對｜68-78優質三高男</option>

                                        <option value="3040">好好玩旅行社2021/7/24 上午 09:00:00桃園IG私房秘境｜零距離親餵小鹿+超萌斑比DIY小物+漫步向日葵迷宮</option>

                                        <option value="3039">好好玩旅行社2021/7/18 下午 01:00:00烘焙DIY派對｜戀夏甜蜜愛情果</option>

                                        <option value="3022">好好玩旅行社2021/7/18 下午 01:00:00好好玩FUN映日(假日場)｜桃園新光影城+無限續自助零食區+微醺休憩區+互動遊戲+美饌小食</option>

                                        <option value="3046">好好玩旅行社2021/7/17 下午 07:00:00【多人線上視訊塔羅占卜】未來三個月，我的感情運勢如何？</option>

                                        <option value="3038">好好玩旅行社2021/7/17 上午 09:00:00北海岸踏浪趣｜探索金沙灣秘境＋超夯IG打卡熱點＋懷舊鐵路便當＋海灘分組遊戲</option>

                                        <option value="3037">好好玩旅行社2021/7/11 下午 02:00:00【多人線上視訊手相占卜】你的正緣，出現了嗎？</option>

                                        <option value="3025">好好玩旅行社2021/7/11 下午 01:30:00午茶約會(熟齡場)｜Cheers!紅粉佳人遇見白馬王子</option>

                                        <option value="3036">好好玩旅行社2021/7/10 下午 02:00:00如何從細節看出對方是否適合自己？</option>

                                        <option value="3035">好好玩旅行社2021/7/4 下午 02:00:00【多人線上視訊主題約會】36題愛上你</option>

                                        <option value="3034">好好玩旅行社2021/7/3 下午 02:00:00貼心暖男 • 遇上4D陽光男~3對3約會</option>

                                        <option value="3023">好好玩旅行社2021/7/3 上午 11:00:00平溪鐵路浪漫之旅｜七彩天燈祈福+美食任務+美味輕食+貓咪地圖+漫步鐵道</option>

                                        <option value="3033">好好玩旅行社2021/6/27 下午 02:00:00疫起追劇 • 妳就是我的女主角</option>

                                        <option value="3014">好好玩旅行社2021/6/27 上午 09:30:00野溪沁涼烤肉｜山泉水泳池+焦香脆石板烤肉+放山桶子雞+泡茶+釣魚</option>

                                        <option value="3015">好好玩旅行社2021/6/27 上午 09:30:00野溪沁涼烤肉｜山泉水泳池+焦香脆石板烤肉+放山桶子雞+泡茶+釣魚</option>

                                        <option value="3032">好好玩旅行社2021/6/26 下午 02:00:00疫起party • 找到singing的你</option>

                                        <option value="3031">好好玩旅行社2021/6/20 下午 02:00:00百萬年薪 • 邂逅優質菁英男</option>

                                        <option value="3030">好好玩旅行社2021/6/19 下午 02:00:00疫起饗受 • 開啟美味心關係</option>

                                        <option value="3026">好好玩旅行社2021/6/13 下午 01:30:00午茶約會｜Cheers!紅粉佳人遇見白馬王子</option>

                                        <option value="3006">好好玩旅行社2021/6/12 上午 08:30:00福隆踏浪趣｜舊草嶺隧道+藝術沙雕展+懷舊便當+黃金海岸踏浪</option>

                                        <option value="3028">好好玩旅行社2021/5/30 下午 02:00:00幸福烘培｜手作甜點好滋味</option>

                                        <option value="3024">好好玩旅行社2021/5/26 下午 01:00:00好好玩FUN映日(平日場)｜桃園新光影城+無限續自助零食區+微醺休憩區+互動遊戲+美饌小食</option>

                                        <option value="3027">好好玩旅行社2021/5/23 下午 02:00:00午茶相遇｜尋找心中那閃亮的星星</option>

                                        <option value="3005">好好玩旅行社2021/5/23 上午 09:00:00北台灣最美單車道｜十七里海岸線+鐵馬騎行+魚鱗天梯＋大啖水桶海鮮</option>

                                        <option value="3017">好好玩旅行社2021/5/16 下午 01:30:00手繪溫度插畫入門｜工具說明+色鉛筆基本技法+構圖打稿+上色教學+定色包裝</option>

                                        <option value="3029">好好玩旅行社2021/5/15 下午 02:30:00挑戰一波｜密室逃脫，逃開寂寞</option>

                                        <option value="3007">好好玩旅行社2021/5/8 下午 02:00:00室內野餐派對｜網美必拍+精緻美食+桌遊Party Game+互動遊戲</option>

                                        <option value="3009">好好玩旅行社2021/4/25 下午 03:00:00野餐派對｜網美必拍+精緻美食+桌遊Party Game+互動遊戲</option>

                                        <option value="3003">好好玩旅行社2021/4/24 下午 03:30:00季節限定｜小食．盲旅．螢火蟲</option>

                                        <option value="3008">好好玩旅行社2021/4/18 下午 02:00:00野餐派對｜網美必拍+精緻美食+桌遊Party Game+互動遊戲</option>

                                        <option value="3002">好好玩旅行社2021/4/11 上午 08:30:00宜蘭IG網美打卡熱點｜海潮公園+外澳飛行傘基地+傳藝中心</option>

                                        <option value="3001">好好玩旅行社2021/3/28 上午 09:30:00季節限定｜紫藤花海+花海野餐+八里老街區+鐵馬騎行</option>

                                        <option value="3021">好好玩旅行社2021/3/28 上午 08:00:00【安可秒殺場】日月潭一日遊｜情定湖畔·幸福相伴</option>

                                        <option value="3020">好好玩旅行社2021/3/21 下午 12:00:00探索鶯歌 ‧ 城市尋寶尖山陶</option>

                                        <option value="2974">好好玩旅行社2021/3/21 上午 08:30:00公主的夢幻花園</option>

                                        <option value="3016">好好玩旅行社2021/3/20 下午 01:30:00手繪溫度插畫入門｜工具說明+色鉛筆基本技法+構圖打稿+上色教學+定色包裝</option>

                                        <option value="3018">好好玩旅行社2021/3/14 下午 02:00:00【歡樂休閒】密室逃脫x下午茶 🌟</option>

                                        <option value="3019">好好玩旅行社2021/3/14 下午 01:00:00白色情人節｜愛情電影院 ‧ 消失的情人</option>

                                        <option value="2973">好好玩旅行社2021/3/6 下午 01:30:00沐浴星光池畔PARTY</option>

                                        <option value="3011">好好玩旅行社2021/2/28 下午 01:00:00日系療癒浮游花 × 愛戀下午茶約會</option>

                                        <option value="3013">好好玩旅行社2021/2/27 下午 02:00:00元宵暖心手作‧開運五色湯圓</option>

                                        <option value="3010">好好玩旅行社2021/2/27 上午 09:30:00真新化大冒險第二梯次</option>

                                        <option value="2997">好好玩旅行社2021/2/21 上午 10:00:00烘焙DIY｜莓好時光‧繽紛莓果派對</option>

                                        <option value="3000">好好玩旅行社2021/2/21 上午 09:30:00竹語茶蘆控窯趣｜古農具導覽+團體控窯+草編DIY+擂茶DIY</option>

                                        <option value="3004">好好玩旅行社2021/2/20 上午 09:30:00單身食玩護照-真新化大冒險第2梯次</option>

                                        <option value="3012">好好玩旅行社2021/2/6 下午 02:00:00愛情塔羅 ‧ 未來命定戀情等多久</option>

                                        <option value="2921">好好玩旅行社2021/1/31 下午 02:00:00Speed ​​dating 速約主題【自助旅行】</option>

                                        <option value="2999">好好玩旅行社2021/1/31 上午 08:00:00三峽傳藝輕旅｜戀戀三峽×藍染幸福</option>

                                        <option value="2972">好好玩旅行社2021/1/23 上午 10:30:00涼風吹撫葡萄園，紳士淑女品酒宴</option>

                                        <option value="2925">好好玩旅行社2021/1/17 下午 02:00:00Speed ​​dating 速約主題【十二星座大小事】</option>

                                        <option value="2998">好好玩旅行社2021/1/17 下午 01:00:00手作創意PIZZA×「皂」映心戀情</option>

                                        <option value="2954">好好玩旅行社2021/1/10 上午 10:00:00幸福浴衣體驗 * 櫻花妹遇見愛</option>

                                        <option value="2920">好好玩旅行社2021/1/3 下午 02:00:00Speed ​​dating 速約主題【你的童年趣事】</option>

                                        <option value="2996">好好玩旅行社2021/1/3 上午 10:00:00烘焙DIY｜遇見莓好 ‧ 夢幻草莓派對</option>

                                        <option value="2995">好好玩旅行社2021/1/2 下午 12:00:00新年心企劃｜ 迪士尼魔法花園尋寶</option>

                                        <option value="2957">好好玩旅行社2020/12/31 下午 02:00:00一對一盲約會-以玩會友 blind date with you</option>

                                        <option value="2979">好好玩旅行社2020/12/30 下午 07:00:00想婚聯誼x非誠勿擾</option>

                                        <option value="2980">好好玩旅行社2020/12/27 下午 02:00:00175UP挺拔歐爸專屬！精選3對3快速約會</option>

                                        <option value="2994">好好玩旅行社2020/12/26 下午 02:00:0074-84年次單身小哥哥小姐姐限定! 量身打造3對3微約會,讓你與妳幸福相遇</option>

                                        <option value="2981">好好玩旅行社2020/12/26 上午 09:00:00戀戀「莓」好情人 ‧ 情定巧克力城堡</option>

                                        <option value="2993">好好玩旅行社2020/12/25 下午 07:00:00《聖誕節跟我一起過吧》38-48歲 熟齡單身男女來互認一下吧！</option>

                                        <option value="2992">好好玩旅行社2020/12/23 下午 07:00:00六尾七初經穩成熟想婚男</option>

                                        <option value="2991">好好玩旅行社2020/12/20 下午 02:00:00《姊的新時代》讓姊姊敲敲愛上你~成為姊姊的依靠</option>

                                        <option value="2990">好好玩旅行社2020/12/19 下午 02:00:00愛戶外X愛運動 陽光男孩站出來！</option>

                                        <option value="2970">好好玩旅行社2020/12/19 下午 01:30:00Cheers!紅粉佳人遇見白馬王子</option>

                                        <option value="2926">好好玩旅行社2020/12/19 上午 08:30:00【優質企業委辦】九芎湖採果一日輕旅行</option>

                                        <option value="2989">好好玩旅行社2020/12/18 下午 07:00:00二見幸福 聯誼專場</option>

                                        <option value="2988">好好玩旅行社2020/12/16 下午 07:00:00交往率高◆經濟穩定！想婚有房的他~6年級質感輕時尚專屬約會</option>

                                        <option value="2931">好好玩旅行社2020/12/13 下午 04:00:00夕陽賞景豪華海釣</option>

                                        <option value="2987">好好玩旅行社2020/12/13 下午 02:00:00公教醫護想結婚聯誼專場</option>

                                        <option value="2986">好好玩旅行社2020/12/12 下午 02:00:00175~185cm 七、八年級高挑男孩專屬</option>

                                        <option value="2985">好好玩旅行社2020/12/11 下午 07:00:0038~48 科技男孩專區</option>

                                        <option value="2984">好好玩旅行社2020/12/9 下午 07:00:0031~45 輕熟女約會囉</option>

                                        <option value="2983">好好玩旅行社2020/12/6 下午 02:00:0023-30歲 小資女聯誼專場</option>

                                        <option value="2978">好好玩旅行社2020/12/5 下午 02:00:00七年級碩士男孩專場</option>

                                        <option value="2982">好好玩旅行社2020/12/5 上午 08:00:00情定日月湖畔·祈福月老尋伴</option>

                                        <option value="2977">好好玩旅行社2020/12/4 下午 07:00:0059~69 百萬靠譜優質男專屬</option>

                                        <option value="2976">好好玩旅行社2020/12/2 下午 07:00:0040~50歲 熟男專場約會</option>

                                        <option value="2975">好好玩旅行社2020/11/28 下午 02:00:00一對一盲約會-以書會友 blind date with you</option>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>身分證字號：
                                    <input name="k_user" type="text" id="k_user" maxlength="10" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>姓名：
                                    <input name="k_name" type="text" id="k_name" class="form-control">
                                </td>
                                <td>性別：
                                    <select name="k_sex" id="k_sex">
                                        <option value="">請選擇</option>
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width=290>生日：<select name="y1" id="y1" style="width:80px;">
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                    </select> 年
                                    <select name="m1" id="m1" style="width:60px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select> 月
                                    <select name="d1" id="d1" style="width:60px;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select> 日
                                </td>
                                <td>飲食習慣：
                                    <select name="k_eat" id="k_eat">
                                        <option value="">請選擇</option>
                                        <option value="葷食">葷食</option>
                                        <option value="素食">素食</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>電話(公)：
                                    <input name="k_phone1" type="text" id="k_phone1" class="form-control">　(家)：<input name="k_phone2" type="text" id="k_phone2" class="form-control">　 手機：<input name="k_mobile" type="text" id="k_mobile" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>服務機關 ：
                                    <input name="k_company" type="text" id="k_company" class="form-control">
                                </td>
                                <td>現任職稱：
                                    <input name="k_company2" type="text" id="k_company2" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>地址：
                                    <select name="k_area" id="k_area">
                                        <option value="">請選擇</option>
                                        <option value="基隆市">基隆市</option>
                                        <option value="台北市">台北市</option>
                                        <option value="新北市">新北市</option>
                                        <option value="宜蘭縣">宜蘭縣</option>
                                        <option value="桃園市">桃園市</option>
                                        <option value="新竹縣">新竹縣</option>
                                        <option value="新竹市">新竹市</option>
                                        <option value="苗栗縣">苗栗縣</option>
                                        <option value="苗栗市">苗栗市</option>
                                        <option value="台中縣">台中縣</option>
                                        <option value="台中市">台中市</option>
                                        <option value="彰化縣">彰化縣</option>
                                        <option value="彰化市">彰化市</option>
                                        <option value="南投縣">南投縣</option>
                                        <option value="嘉義縣">嘉義縣</option>
                                        <option value="嘉義市">嘉義市</option>
                                        <option value="雲林縣">雲林縣</option>
                                        <option value="台南縣">台南縣</option>
                                        <option value="台南市">台南市</option>
                                        <option value="高雄市">高雄市</option>
                                        <option value="屏東縣">屏東縣</option>
                                        <option value="花蓮縣">花蓮縣</option>
                                        <option value="台東縣">台東縣</option>
                                        <option value="澎湖縣">澎湖縣</option>
                                        <option value="金門縣">金門縣</option>
                                        <option value="馬祖">馬祖</option>
                                        <option value="綠島">綠島</option>
                                        <option value="蘭嶼">蘭嶼</option>
                                        <option value="其他">其他</option>
                                    </select> <input name="k_address" type="text" id="k_address" style="width:500px;" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>E-mail：
                                    <input name="k_yn" type="text" id="k_yn" class="form-control">
                                </td>
                                <td>身高：
                                    <input name="ac_1" type="text" id="ac_1" class="form-control"> 公分　體重：<input name="ac_2" type="text" id="ac_2" class="form-control"> 公斤
                                </td>
                            </tr>
                            <tr>
                                <td>facebook帳號：
                                    <input name="ac_3" type="text" id="ac_3" class="form-control">
                                </td>
                                <td>學歷：
                                    <select name="k_school" id="k_school">
                                        <option value="">請選擇</option>
                                        <option value="高中">高中</option>
                                        <option value="專科">專科</option>
                                        <option value="大學">大學</option>
                                        <option value="碩士">碩士</option>
                                        <option value="博士">博士</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>公開資料：
                                    <input name="k_2" type="checkbox" id="k_2" value="姓名" style="width:20px;">
                                    姓名
                                    <input name="k_2" type="checkbox" id="k_2" value="手機" style="width:20px;">
                                    手機
                                    <input name="k_2" type="checkbox" id="k_2" value="信箱" style="width:20px;">
                                    信箱
                                    <input name="k_2" type="checkbox" id="k_2" value="服務單位" style="width:20px;">
                                    服務單位
                                    <input name="k_2" type="checkbox" id="k_2" value="不願意公開資料" style="width:20px;" checked>
                                    不願意公開資料
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>備註：
                                    <textarea name="remark" id="remark" cols="45" rows="5" class="form-control"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>訊息來源：
                                    <select name="k_come" id="k_come2">
                                        <option value="好好玩旅行社官方粉絲團">好好玩旅行社官方粉絲團</option>
                                        <option value="網路新聞">網路新聞</option>
                                        <option value="媒體報導">媒體報導</option>
                                        <option value="1111人力銀行">1111人力銀行</option>
                                        <option value="春天會館客服">春天會館客服</option>
                                        <option value="活動宣傳">活動宣傳</option>
                                        <option value="ＤＭ訊息">ＤＭ訊息</option>
                                        <option value="企業福委">企業福委</option>
                                        <option value="CHEERS雜誌">CHEERS雜誌</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2 align="center"><input type="submit" name="Submit" value="確定新增" style="height:28px;"></td>
                            </tr>
                            </font>
                    </table>
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

    <footer>
    </footer>
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
    $mtu = "ad_fun_action1.";

    function chk_form() {
        var $clist = {
                "ac_auto": "活動場次",
                "k_user": "身分證字號",
                "k_name": "姓名",
                "k_sex": "性別",
                "k_eat": "飲食習慣",
                "k_mobile": "手機",
                "k_area": "地址",
                "k_school": "學歷"
            },
            $rr = 0;
        $.each($clist, function(n, v) {
            if (!$("#" + n).val()) {
                alert("請輸入或選擇" + v);
                $("#" + n).focus();
                $rr = 1;
            }
            if ($rr) return false;
        });

        if ($rr) return false;
        else return true;
    }
</script>