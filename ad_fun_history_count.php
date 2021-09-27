<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php")
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">歷史統計圖表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>歷史統計圖表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form action="ad_fun_history_count.php" method="post" name="form1">
                        <!--        日期範圍：<input type="text" name="y1" style="width:80px;" class="datepicker" autocomplete="off" value="2021/9/27"> ~ <input type="text" name="y2" style="width:80px;" class="datepicker" autocomplete="off" value="2021/9/27">-->
                        　　<select name="tt" id="tt" style="width:100px;">
                            <option value="0">國內活動</option>
                            <option value="1">國外旅遊</option>
                        </select>　活動：
                        <select name="s7" id="s7" style="width:100px;">
                            <option value="">請選擇</option>
                            <option value="3059">2021/11/20-桃源仙谷遇見愛｜遊賞花田+祕境探索+烤肉饗宴+拍照任務</option>
                            <option value="3058">2021/11/7-三峽傳藝輕旅｜藍染手作+客家擂茶體驗+童玩競賽+美食任務</option>
                            <option value="3051">2021/11/6-竹語茶蘆控窯趣｜古農具導覽+團體控窯+草編DIY+擂茶DIY</option>
                            <option value="3055">2021/10/24-北海岸踏浪趣｜探索金沙灣秘境＋超夯IG打卡熱點＋懷舊鐵路便當＋海灘分組遊戲</option>
                            <option value="3053">2021/10/17-宜蘭療癒輕旅行｜小動物餵食+DIY窯烤披薩+幸福手做禮+擠羊奶體驗</option>
                            <option value="3056">2021/10/3-下午茶聯誼派對｜網美之旅+拍照任務</option>
                            <option value="3054">2021/10/2-野餐派對｜網美必拍+精緻美食+桌遊Party Game+互動遊戲</option>
                            <option value="3057">2021/9/25-歡樂休閒｜密室逃脫＋下午茶 🌟</option>
                            <option value="3049">2021/9/25-愛×邂逅(7年級下午茶台北場)</option>
                            <option value="3052">2021/9/19-「粉」想見你 ‧｜玫瑰甜蜜烘焙派對</option>
                            <option value="3050">2021/9/18-愛×萌芽(8年級下午茶台北場)</option>
                            <option value="3048">2021/9/11-愛×熟成(6年級下午茶台北場)</option>
                            <option value="3047">2021/8/14-七夕遊艇特企｜夢幻微醺調酒＋專業超嗨DJ＋超閃亮耀眼戰袍</option>
                            <option value="3045">2021/8/8-大稻埕祈福半日遊｜霞海月老求姻緣＋騎行夕陽河畔＋戶外下午茶約會</option>
                            <option value="3044">2021/8/7-熟齡愛戀約會｜55-65優質三高穩重男</option>
                            <option value="3043">2021/8/1-日系午茶Dating｜療癒浮游花DIY+日式甜點套餐＋愛戀換桌約會</option>
                            <option value="3042">2021/7/31-脫單率超高爆團｜超靈驗月老祈福＋品嚐伊達邵美食＋日月潭風光遊湖</option>
                            <option value="3041">2021/7/25-微醺cheers派對｜68-78優質三高男</option>
                            <option value="3040">2021/7/24-桃園IG私房秘境｜零距離親餵小鹿+超萌斑比DIY小物+漫步向日葵迷宮</option>
                            <option value="3039">2021/7/18-烘焙DIY派對｜戀夏甜蜜愛情果</option>
                            <option value="3022">2021/7/18-好好玩FUN映日(假日場)｜桃園新光影城+無限續自助零食區+微醺休憩區+互動遊戲+美饌小食</option>
                            <option value="3046">2021/7/17-【多人線上視訊塔羅占卜】未來三個月，我的感情運勢如何？</option>
                            <option value="3038">2021/7/17-北海岸踏浪趣｜探索金沙灣秘境＋超夯IG打卡熱點＋懷舊鐵路便當＋海灘分組遊戲</option>
                            <option value="3037">2021/7/11-【多人線上視訊手相占卜】你的正緣，出現了嗎？</option>
                            <option value="3025">2021/7/11-午茶約會(熟齡場)｜Cheers!紅粉佳人遇見白馬王子</option>
                            <option value="3036">2021/7/10-如何從細節看出對方是否適合自己？</option>
                            <option value="3035">2021/7/4-【多人線上視訊主題約會】36題愛上你</option>
                            <option value="3034">2021/7/3-貼心暖男 • 遇上4D陽光男~3對3約會</option>
                            <option value="3023">2021/7/3-平溪鐵路浪漫之旅｜七彩天燈祈福+美食任務+美味輕食+貓咪地圖+漫步鐵道</option>
                            <option value="3033">2021/6/27-疫起追劇 • 妳就是我的女主角</option>
                            <option value="3014">2021/6/27-野溪沁涼烤肉｜山泉水泳池+焦香脆石板烤肉+放山桶子雞+泡茶+釣魚</option>
                            <option value="3015">2021/6/27-野溪沁涼烤肉｜山泉水泳池+焦香脆石板烤肉+放山桶子雞+泡茶+釣魚</option>
                            <option value="3032">2021/6/26-疫起party • 找到singing的你</option>
                            <option value="3031">2021/6/20-百萬年薪 • 邂逅優質菁英男</option>
                            <option value="3030">2021/6/19-疫起饗受 • 開啟美味心關係</option>
                            <option value="3026">2021/6/13-午茶約會｜Cheers!紅粉佳人遇見白馬王子</option>
                            <option value="3006">2021/6/12-福隆踏浪趣｜舊草嶺隧道+藝術沙雕展+懷舊便當+黃金海岸踏浪</option>
                            <option value="3028">2021/5/30-幸福烘培｜手作甜點好滋味</option>
                            <option value="3024">2021/5/26-好好玩FUN映日(平日場)｜桃園新光影城+無限續自助零食區+微醺休憩區+互動遊戲+美饌小食</option>
                            <option value="3027">2021/5/23-午茶相遇｜尋找心中那閃亮的星星</option>
                            <option value="3005">2021/5/23-北台灣最美單車道｜十七里海岸線+鐵馬騎行+魚鱗天梯＋大啖水桶海鮮</option>
                            <option value="3017">2021/5/16-手繪溫度插畫入門｜工具說明+色鉛筆基本技法+構圖打稿+上色教學+定色包裝</option>
                            <option value="3029">2021/5/15-挑戰一波｜密室逃脫，逃開寂寞</option>
                            <option value="3007">2021/5/8-室內野餐派對｜網美必拍+精緻美食+桌遊Party Game+互動遊戲</option>
                            <option value="3009">2021/4/25-野餐派對｜網美必拍+精緻美食+桌遊Party Game+互動遊戲</option>
                            <option value="3003">2021/4/24-季節限定｜小食．盲旅．螢火蟲</option>
                            <option value="3008">2021/4/18-野餐派對｜網美必拍+精緻美食+桌遊Party Game+互動遊戲</option>
                            <option value="3002">2021/4/11-宜蘭IG網美打卡熱點｜海潮公園+外澳飛行傘基地+傳藝中心</option>
                            <option value="3001">2021/3/28-季節限定｜紫藤花海+花海野餐+八里老街區+鐵馬騎行</option>
                            <option value="3021">2021/3/28-【安可秒殺場】日月潭一日遊｜情定湖畔·幸福相伴</option>
                            <option value="3020">2021/3/21-探索鶯歌 ‧ 城市尋寶尖山陶</option>
                            <option value="2974">2021/3/21-公主的夢幻花園</option>
                            <option value="3016">2021/3/20-手繪溫度插畫入門｜工具說明+色鉛筆基本技法+構圖打稿+上色教學+定色包裝</option>
                            <option value="3018">2021/3/14-【歡樂休閒】密室逃脫x下午茶 🌟</option>
                            <option value="3019">2021/3/14-白色情人節｜愛情電影院 ‧ 消失的情人</option>
                            <option value="2973">2021/3/6-沐浴星光池畔PARTY</option>
                            <option value="3011">2021/2/28-日系療癒浮游花 × 愛戀下午茶約會</option>
                            <option value="3013">2021/2/27-元宵暖心手作‧開運五色湯圓</option>
                            <option value="3010">2021/2/27-真新化大冒險第二梯次</option>
                            <option value="2997">2021/2/21-烘焙DIY｜莓好時光‧繽紛莓果派對</option>
                            <option value="3000">2021/2/21-竹語茶蘆控窯趣｜古農具導覽+團體控窯+草編DIY+擂茶DIY</option>
                            <option value="3004">2021/2/20-單身食玩護照-真新化大冒險第2梯次</option>
                            <option value="3012">2021/2/6-愛情塔羅 ‧ 未來命定戀情等多久</option>
                            <option value="2921">2021/1/31-Speed ​​dating 速約主題【自助旅行】</option>
                            <option value="2999">2021/1/31-三峽傳藝輕旅｜戀戀三峽×藍染幸福</option>
                            <option value="2972">2021/1/23-涼風吹撫葡萄園，紳士淑女品酒宴</option>
                            <option value="2925">2021/1/17-Speed ​​dating 速約主題【十二星座大小事】</option>
                            <option value="2998">2021/1/17-手作創意PIZZA×「皂」映心戀情</option>
                            <option value="2954">2021/1/10-幸福浴衣體驗 * 櫻花妹遇見愛</option>
                            <option value="2920">2021/1/3-Speed ​​dating 速約主題【你的童年趣事】</option>
                            <option value="2996">2021/1/3-烘焙DIY｜遇見莓好 ‧ 夢幻草莓派對</option>
                            <option value="2995">2021/1/2-新年心企劃｜ 迪士尼魔法花園尋寶</option>
                            <option value="2957">2020/12/31-一對一盲約會-以玩會友 blind date with you</option>
                            <option value="2979">2020/12/30-想婚聯誼x非誠勿擾</option>
                            <option value="2980">2020/12/27-175UP挺拔歐爸專屬！精選3對3快速約會</option>
                            <option value="2994">2020/12/26-74-84年次單身小哥哥小姐姐限定! 量身打造3對3微約會,讓你與妳幸福相遇</option>
                            <option value="2981">2020/12/26-戀戀「莓」好情人 ‧ 情定巧克力城堡</option>
                            <option value="2993">2020/12/25-《聖誕節跟我一起過吧》38-48歲 熟齡單身男女來互認一下吧！</option>
                            <option value="2992">2020/12/23-六尾七初經穩成熟想婚男</option>
                            <option value="2991">2020/12/20-《姊的新時代》讓姊姊敲敲愛上你~成為姊姊的依靠</option>
                            <option value="2990">2020/12/19-愛戶外X愛運動 陽光男孩站出來！</option>
                            <option value="2970">2020/12/19-Cheers!紅粉佳人遇見白馬王子</option>
                            <option value="2926">2020/12/19-【優質企業委辦】九芎湖採果一日輕旅行</option>
                            <option value="2989">2020/12/18-二見幸福 聯誼專場</option>
                            <option value="2988">2020/12/16-交往率高◆經濟穩定！想婚有房的他~6年級質感輕時尚專屬約會</option>
                            <option value="2931">2020/12/13-夕陽賞景豪華海釣</option>
                            <option value="2987">2020/12/13-公教醫護想結婚聯誼專場</option>
                            <option value="2986">2020/12/12-175~185cm 七、八年級高挑男孩專屬</option>
                            <option value="2985">2020/12/11-38~48 科技男孩專區</option>
                            <option value="2984">2020/12/9-31~45 輕熟女約會囉</option>
                            <option value="2983">2020/12/6-23-30歲 小資女聯誼專場</option>
                            <option value="2978">2020/12/5-七年級碩士男孩專場</option>
                            <option value="2982">2020/12/5-情定日月湖畔·祈福月老尋伴</option>
                            <option value="2977">2020/12/4-59~69 百萬靠譜優質男專屬</option>
                            <option value="2976">2020/12/2-40~50歲 熟男專場約會</option>
                            <option value="2975">2020/11/28-一對一盲約會-以書會友 blind date with you</option>
                            <option value="2960">2020/11/27-二見幸福 聯誼專場</option>
                            <option value="2885">2020/11/22-桃園市政府家庭教育中心109年度未婚青年成長營｜愛戀花現桃緣一日遊</option>
                            <option value="2924">2020/11/22-【德律科技委辦】暖心出遊控窯趣</option>
                            <option value="2961">2020/11/21-六尾七初級科技小康男</option>
                            <option value="2971">2020/11/15-55~65 百萬靠譜優質男專屬</option>
                            <option value="2969">2020/11/15-鮮肉迪迪專屬場~來吧讓姐姐愛上你</option>
                            <option value="2968">2020/11/14-25-35歲 小資女聯誼專場</option>
                            <option value="2967">2020/11/14-手作創意PIZZA×「皂」映心戀情</option>
                            <option value="2907">2020/11/14-FUN旅遊｜宜蘭網美打卡景點一日遊</option>
                            <option value="2966">2020/11/13-六年級百萬靠譜優質男專屬</option>
                            <option value="2965">2020/11/11-交往率高◆經濟穩定！有車有房的他~6、7年級質感輕時尚專屬約會3 X 3 UP↗</option>
                            <option value="2891">2020/11/11-【1111百人特企】夏日閃亮 · 微醺派對</option>
                            <option value="2964">2020/11/8-175UP愛運動男孩專屬3X3約會</option>
                            <option value="2953">2020/11/8-只想「芋」見泥 ‧ 幸福香芋烘焙派對</option>
                            <option value="2959">2020/11/7-企業負責人專屬場</option>
                            <option value="2890">2020/11/7-雙11微醺派對‧三高優質男</option>
                            <option value="2958">2020/11/6-輕熟齡聯誼 專屬質感約會</option>
                            <option value="2963">2020/11/4-59~69 百萬靠譜優質男專屬</option>
                            <option value="2962">2020/11/1-七、八年級經濟穩定男孩</option>
                            <option value="2932">2020/11/1-【德律科技委辦】暖心出遊控窯趣(活動延期至11/22)</option>
                            <option value="2955">2020/10/31-萬聖節特企｜無光時尚微醺派對</option>
                            <option value="2950">2020/10/31-7年級公務男孩約會</option>
                            <option value="2947">2020/10/30-二見幸福 聯誼專場</option>
                            <option value="2949">2020/10/28-六年級百萬靠譜優質男專屬</option>
                            <option value="2946">2020/10/25-70~75 一對一聊天專屬質感約會</option>
                            <option value="2884">2020/10/25-桃園市政府家庭教育中心109年度未婚青年成長營｜漫步夢幻森林一日遊</option>
                            <option value="2945">2020/10/24-愛戶外X愛運動 陽光男孩站出來！</option>
                            <option value="2908">2020/10/24-FUN旅遊｜桃源仙谷遇見愛</option>
                            <option value="2913">2020/10/24-【台電委辦】幸福來電．牧場之戀(100%出團名額有限)</option>
                            <option value="2944">2020/10/23-六尾七初經穩成熟想婚男</option>
                            <option value="2948">2020/10/21-59~69 百萬靠譜優質男專屬</option>
                            <option value="2943">2020/10/18-7年級科技業菁英男孩</option>
                            <option value="2905">2020/10/17-熱血特企｜如膠似漆 彈情說愛</option>
                            <option value="2927">2020/10/17-7年級百萬男孩專屬場約會</option>
                            <option value="2942">2020/10/16-65~70 經濟穩定好男孩</option>
                            <option value="2941">2020/10/14-38-48歲 熟齡單身男女 來互認一下吧！</option>
                            <option value="2940">2020/10/11-企業負責人專屬場</option>
                            <option value="2952">2020/10/11-「粉」想見你 ‧ 玫瑰甜蜜烘焙派對</option>
                            <option value="2951">2020/10/10-170~180cm 男孩專屬一對一安心高效約會</option>
                            <option value="2936">2020/10/9-想結婚有車男孩</option>
                            <option value="2935">2020/10/7-輕熟齡聯誼 專屬質感約會</option>
                            <option value="2929">2020/10/7-六年級百萬靠譜優質男專屬</option>
                            <option value="2934">2020/10/4-七年級碩士男孩專場</option>
                            <option value="2903">2020/10/3-中秋遊艇派對(100%出團即將額滿)</option>
                            <option value="2933">2020/10/3-70~75年次 一對一聊天專屬質感約會</option>
                            <option value="2928">2020/9/27-175UP挺拔歐爸專屬！精選3對3快速約會</option>
                            <option value="2883">2020/9/27-桃園市政府家庭教育中心109年度未婚青年成長營｜野趣浪漫田園一日遊</option>
                            <option value="2902">2020/9/26-愛×熟成(6年級台中場)</option>
                            <option value="2923">2020/9/26-趕快！ 妳的歐爸在呼喊妳了</option>
                            <option value="2906">2020/9/26-FUN午茶｜咖啡香醇的戀愛滋味</option>
                            <option value="2897">2020/9/20-百萬小康男嘗鮮微約會</option>
                            <option value="2901">2020/9/20-愛×熟成(6年級新竹場)</option>
                            <option value="2912">2020/9/20-幸福DIY手作×烘焙交友派</option>
                            <option value="2911">2020/9/19-【桃園、新竹出發】台中一日遊｜夢幻魔法城堡 ‧ 戀夏童話樂園</option>
                            <option value="2915">2020/9/19-今晚我想 來場約會《給彼此20分鐘的機會》 一對一聊天專屬質感約會</option>
                            <option value="2900">2020/9/13-愛×熟成(6年級桃園場)</option>
                            <option value="2899">2020/9/12-愛×熟成(6年級台北場)</option>
                            <option value="2887">2020/9/12-【新竹、桃園、台北出發】宜蘭二日特別企劃｜遇見花鹿秘境 ‧ 邂逅浪漫幸福</option>
                            <option value="2914">2020/9/12-交往率高◆經濟穩定！有車有房的他</option>
                            <option value="2910">2020/9/6-台北大稻埕半日遊｜霞海月老牽紅線~騎行浪漫河畔</option>
                            <option value="2909">2020/9/5-茉莉~茉莉 歡樂手作，幸福相聚</option>
                            <option value="2898">2020/8/30-務實穩健好對象等姊妹們來認識</option>
                            <option value="2892">2020/8/29-遇見愛情，來場完美約會</option>
                            <option value="2889">2020/8/25-【七夕百人特企】夏日閃亮 · 微醺派對</option>
                            <option value="2879">2020/8/23-七夕特企｜浪漫尋鹿 ‧ 幸福向陽</option>
                            <option value="2881">2020/8/23-FUN旅遊｜宜蘭療癒輕旅行</option>
                            <option value="2893">2020/8/22-振興經濟，也要振興自己的幸福</option>
                            <option value="2878">2020/8/22-七夕特企｜情定湖畔·月老尋伴</option>
                            <option value="2888">2020/8/16-【七夕百人特企】夏日閃亮 · 微醺派對</option>
                            <option value="2886">2020/8/15-野趣浪漫田園 ‧ 遇見美好幸福</option>
                            <option value="2867">2020/8/15-防疫特企｜暖心出遊控窯趣</option>
                            <option value="2904">2020/8/14-甜蜜手做，融在心中</option>
                            <option value="2880">2020/8/2-蓮花季特企｜漂浮大王蓮 ‧ 花漾幸福盛夏</option>
                            <option value="2872">2020/8/1-相遇84-74【陽光男邂逅活潑女】</option>
                            <option value="2882">2020/7/26-手作創意PIZZA×「皂」映心戀情</option>
                            <option value="2871">2020/7/25-相遇74-64【穩重男邂逅氣質女】</option>
                            <option value="2873">2020/7/18-紳士型男邂逅窈窕淑女</option>
                            <option value="2877">2020/7/18-野趣浪漫田園 ‧ 遇見美好幸福</option>
                            <option value="2870">2020/7/11-防疫特企｜北海岸幸福一日遊</option>
                            <option value="2876">2020/6/28-戶外實境尋寶｜《聖地》‧歷史老城區</option>
                            <option value="2868">2020/6/27-桃園一日遊｜浪漫尋鹿 ‧ 幸福向陽</option>
                            <option value="2839">2020/6/26-Single Friday‧愛情電影院</option>
                            <option value="2842">2020/6/21-瑪那熊-網路聊天技能</option>
                            <option value="2875">2020/6/21-樂園特別企劃~暢遊六福‧尋找新LOVE園</option>
                            <option value="2852">2020/6/20-歡樂桌遊派對</option>
                            <option value="2845">2020/6/20-塔羅占卜｜下半年我會脫單嗎？</option>
                            <option value="2857">2020/6/14-6月｜櫻花妹遇見愛＊春漾浴衣體驗</option>
                            <option value="2874">2020/6/13-邂逅尋寶地圖 × 狂想傳藝戀曲</option>
                            <option value="2838">2020/6/12-Single Friday‧愛情電影院</option>
                            <option value="2832">2020/6/7-網美之旅X下午茶聯誼派對X拍照任務</option>
                            <option value="2860">2020/6/7-戀夏甜蜜愛情果×烘焙DIY派對</option>
                            <option value="2864">2020/6/6-相遇60-75幸福熟齡穩重男</option>
                            <option value="2865">2020/6/6-茉莉~茉莉 歡樂煮，幸福聚</option>
                            <option value="2869">2020/6/6-季節限定｜情定水舞‧「芋」見幸福</option>
                            <option value="2856">2020/5/31-5月｜櫻花妹遇見愛＊春漾浴衣體驗</option>
                            <option value="2851">2020/5/30-歡樂桌遊派對</option>
                            <option value="2837">2020/5/29-Single Friday‧愛情電影院</option>
                            <option value="2862">2020/5/24-桃園一日遊｜花現幸福LOVE活島</option>
                            <option value="2850">2020/5/23-歡樂桌遊派對</option>
                            <option value="2844">2020/5/23-談星說愛｜公開12星座好伴侶特質</option>
                            <option value="2866">2020/5/17-防疫特企-舊城探險半日遊</option>
                            <option value="2859">2020/5/17-5‧2‧0告白蛋糕×烘焙DIY派對</option>
                            <option value="2863">2020/5/16-邂逅70-79高薪優質男</option>
                            <option value="2836">2020/5/15-Single Friday‧愛情電影院</option>
                            <option value="2831">2020/5/10-日月潭一日遊｜情定湖畔·幸福相伴</option>
                            <option value="2849">2020/5/9-歡樂桌遊派對</option>
                            <option value="2854">2020/5/9-浪漫DIY甜夏‧繽紛水果塔</option>
                            <option value="2827">2020/5/9-三峽藍染輕旅行</option>
                            <option value="2841">2020/5/3-瑪那熊-約會表達技巧</option>
                            <option value="2848">2020/5/2-歡樂桌遊派對</option>
                            <option value="2835">2020/5/1-Single Friday‧愛情電影院</option>
                            <option value="2861">2020/4/25-新竹一日遊｜螢光森林．與妳桐心</option>
                            <option value="2855">2020/4/19-4月｜櫻花妹遇見愛＊春漾浴衣體驗</option>
                            <option value="2847">2020/4/18-歡樂桌遊派對</option>
                            <option value="2853">2020/4/18-翻糖愛情 ‧ 熊熊愛你</option>
                            <option value="2834">2020/4/17-Single Friday‧愛情電影院</option>
                            <option value="2858">2020/4/12-復活節DIY手作×烘焙交友派對</option>
                            <option value="2846">2020/4/11-歡樂桌遊派對</option>
                            <option value="2843">2020/4/11-談星說愛｜分析12星座戀愛致命傷</option>
                            <option value="2802">2020/4/11-宜蘭網美打卡景點一日遊</option>
                            <option value="2830">2020/4/5-刺激鐳射槍對戰×翻滾夢幻泡泡球</option>
                            <option value="2840">2020/4/4-瑪那熊-九型人格識人術</option>
                            <option value="2833">2020/4/3-Single Friday‧愛情電影院</option>
                            <option value="2813">2020/3/29-3月｜櫻花妹遇見愛＊春漾浴衣體驗</option>
                            <option value="2815">2020/3/28-3月團拜｜月老求姻緣＊浪漫午茶約會</option>
                            <option value="2819">2020/3/27-Single Friday‧愛情電影院</option>
                            <option value="2817">2020/3/21-塔羅牌之戀×生命靈數密碼</option>
                            <option value="2801">2020/3/14-情人節特輯∣下午茶花藝DIY</option>
                            <option value="2828">2020/3/14-白色情人節｜平溪鐵路浪漫之旅</option>
                            <option value="2820">2020/3/7-繽紛夢幻彩虹蛋糕×烘焙DIY交友派對</option>
                            <option value="2821">2020/3/7-繽紛夢幻彩虹蛋糕×烘焙DIY交友派對</option>
                            <option value="2829">2020/3/1-戀愛巴士｜遇見「莓」好的你</option>
                            <option value="2818">2020/2/28-Single Friday‧愛情電影院</option>
                            <option value="2825">2020/2/23-戶外實境尋寶-淡水．1884</option>
                            <option value="2816">2020/2/22-塔羅牌之戀×生命靈數密碼</option>
                            <option value="2800">2020/2/22-出遊暖心控窯趣</option>
                            <option value="2814">2020/2/15-2月團拜｜月老求姻緣＊浪漫午茶約會</option>
                            <option value="2824">2020/2/14- 情人節 ‧ 單身燭光派對</option>
                            <option value="2799">2020/2/9-情人節特輯∣就饗幸福</option>
                            <option value="2826">2020/2/9-浪漫情人節｜戀戀內灣×美食尋愛</option>
                            <option value="2823">2020/2/9-情人節｜戀戀內灣×美食尋愛</option>
                            <option value="2822">2020/2/8-元宵節｜DIY泰式打拋豬湯圓</option>
                            <option value="2812">2020/2/2-2月｜櫻花妹遇見愛＊春漾浴衣體驗</option>
                            <option value="2810">2020/2/1-密室逃脫‧脫單密事</option>
                            <option value="2798">2020/1/19-桃源仙谷遇見愛</option>
                            <option value="2806">2020/1/19-冬季一日遊｜戀戀九芎＊幸福漫遊</option>
                            <option value="2811">2020/1/19-1月｜櫻花妹遇見愛＊春漾浴衣體驗</option>
                            <option value="2809">2020/1/18-1月團拜｜月老求姻緣＊浪漫午茶約會</option>
                            <option value="2808">2020/1/17-Single Friday‧愛情電影院</option>
                            <option value="2807">2020/1/12-戀戀夢幻草莓約會×烘焙DIY交友派對</option>
                            <option value="2805">2020/1/11-冬季一日遊｜戀戀九芎＊幸福漫遊</option>
                            <option value="2804">2020/1/4-77藝文町-日系DIY手作</option>
                            <option value="2803">2019/12/29-大溪老街盲旅｜漫漫玩 ‧ 慢慢吃</option>
                            <option value="2784">2019/12/22-12月團拜｜月老求姻緣＊浪漫午茶約會</option>
                            <option value="2792">2019/12/21-聖誕有你，讓愛同行</option>
                            <option value="2797">2019/12/21-聖誕節盲吃特企_集『食』享LOVE</option>
                            <option value="2780">2019/12/15-輕流動瑜珈×陽光綠地野餐</option>
                            <option value="2791">2019/12/8-Cheers!紅粉佳人遇見白馬王子</option>
                            <option value="2779">2019/12/8-享瘦律動有氧×陽光綠地野餐</option>
                            <option value="2795">2019/12/7-遇見幸福~愛情(郵)然而生</option>
                            <option value="2796">2019/12/1-日月潭一日遊＊情定湖畔·幸福相伴</option>
                            <option value="2783">2019/11/30-11月團拜｜月老求姻緣＊浪漫午茶約會</option>
                            <option value="2778">2019/11/24-流行MV舞蹈×陽光綠地野餐</option>
                            <option value="2790">2019/11/23-鶯歌城市尋寶＊尖山陶寶</option>
                            <option value="2794">2019/11/17-密室逃脫‧脫單密事</option>
                            <option value="2776">2019/11/17-活力飛輪有氧×陽光綠地野餐</option>
                            <option value="2793">2019/11/16-歡樂桌遊×浪漫午茶</option>
                            <option value="2789">2019/11/10-雙11光棍特別企劃＊沐浴星光游艇Party</option>
                            <option value="2772">2019/11/9-愛在中山享溫馨【企業委辦】</option>
                            <option value="2788">2019/11/3-網美IG打卡熱點＊黃金海岸踏浪趣</option>
                            <option value="2773">2019/10/27-Run or catch！</option>
                            <option value="2787">2019/10/27-萬聖節特別企劃｜密室鐳射螢光派對</option>
                            <option value="2785">2019/10/26-科技極品型男＊閃亮旋轉LOVE派對</option>
                            <option value="2786">2019/10/26-科技極品型男⭐️閃亮旋轉LOVE派對</option>
                            <option value="2782">2019/10/26-10月團拜｜月老求姻緣＊浪漫午茶約會</option>
                            <option value="2777">2019/10/20-流行MV舞蹈×陽光綠地野餐</option>
                            <option value="2771">2019/10/19-真愛小確幸x幸福做點心【企業委辦】</option>
                            <option value="2781">2019/10/12-城市戀人城市尋寶×木柵欄裡的祕密</option>
                            <option value="2775">2019/10/6-活力飛輪有氧×陽光綠地野餐</option>
                            <option value="2774">2019/9/29-愛情邱比特＊月老廟求姻緣</option>
                            <option value="2738">2019/9/29-飲室繪友x以畫會友</option>
                            <option value="2754">2019/9/29-愛想像 x 有您在身旁</option>
                            <option value="2770">2019/9/28-愛情邱比特＊月老廟求姻緣</option>
                            <option value="2753">2019/9/28-足Go幸福【市府委辦-4】</option>
                            <option value="2752">2019/9/22-真愛小確幸 x 幸福作點心</option>
                            <option value="2751">2019/9/21-足Go幸福【市府委辦-3】</option>
                            <option value="2763">2019/9/21-夏日限定｜我在小琉球＊遇見愛</option>
                            <option value="2769">2019/9/21-台南兩天一夜｜童話古城尋寶歷險記</option>
                            <option value="2768">2019/9/15-第二梯次｜手作乾燥花×花現心幸福</option>
                            <option value="2767">2019/9/14-第一梯次｜手作乾燥花×花現心幸福</option>
                            <option value="2737">2019/9/14-茉莉~茉莉~幸福開花</option>
                            <option value="2750">2019/9/14-愛在起跑點~騎向幸福未來~</option>
                            <option value="2748">2019/9/8-Painting For Love</option>
                            <option value="2766">2019/9/7-中秋特企｜炙力測驗BBQ</option>
                            <option value="2749">2019/9/7-樂見真愛 成就幸福【委辦】</option>
                            <option value="2739">2019/9/1-愛在zoha' 烘焙樂</option>
                            <option value="2762">2019/8/31-敲敲金工x敲近您的心</option>
                            <option value="2736">2019/8/31-花漾春天~愛樂烘焙趣~</option>
                            <option value="2725">2019/8/25-仲夏浴衣體驗＊櫻花妹遇見愛</option>
                            <option value="2764">2019/8/24-藍帶廚藝交友-幸福，從料理開始</option>
                            <option value="2747">2019/8/24-真愛小確幸 x 幸福作點心</option>
                            <option value="2756">2019/8/24-經濟部智慧財產局-智慧情人戀愛通告下午茶約會</option>
                            <option value="2735">2019/8/18-愛在zoha' 烘焙樂</option>
                            <option value="2746">2019/8/18-市場風雲</option>
                            <option value="2765">2019/8/17-主愛相隨</option>
                            <option value="2745">2019/8/11-Run x 珠寶盒 x 花Young</option>
                            <option value="2761">2019/8/10-幸福光合x愛的1+1</option>
                            <option value="2727">2019/8/4-京都遇見愛＊唯美日式浴衣體驗派對</option>
                            <option value="2734">2019/8/4-「羽」您同行好好玩</option>
                            <option value="2758">2019/8/4-七夕單身飛輪野餐派對</option>
                            <option value="2760">2019/8/3-密室尋情×尋尋覓覓</option>
                            <option value="2733">2019/8/3-就想「羽」您「泡」在一起</option>
                            <option value="2724">2019/8/3-大稻埕時光尋寶＊七夕煙花燦爛邂逅</option>
                            <option value="2744">2019/7/28-真愛小確幸 x 幸福作點心</option>
                            <option value="2722">2019/7/28-相遇浪漫北海岸一日遊</option>
                            <option value="2721">2019/7/27-超新超夯的足撞球</option>
                            <option value="2743">2019/7/27-揪愛騎趣約會吧【委辦】</option>
                            <option value="2742">2019/7/21-Run x 玻璃球 x 花Young</option>
                            <option value="2759">2019/7/20-藍帶廚藝交友-幸福，從料理開始</option>
                            <option value="2741">2019/7/20-Painting For Love</option>
                            <option value="2723">2019/7/14-三優陽光男＊馬卡龍女孩午茶約會</option>
                            <option value="2732">2019/7/14-飲室繪友 x 以畫會友</option>
                            <option value="2740">2019/7/14-約會就該好好玩</option>
                            <option value="2757">2019/7/13-甜蜜釣蝦聯誼</option>
                            <option value="2731">2019/7/7-愛在zoha' 烘焙樂</option>
                            <option value="2730">2019/7/6-花漾春天~愛樂烘焙趣~</option>
                            <option value="2729">2019/6/30-鐵道大富翁</option>
                            <option value="2715">2019/6/22-藍帶廚藝交友-幸福，從料理開始</option>
                            <option value="2720">2019/6/16-飲室繪友 x 以畫會友</option>
                            <option value="2728">2019/6/16-鐵道大富翁</option>
                            <option value="2719">2019/6/15-茉莉~茉莉~幸福開花</option>
                            <option value="2713">2019/6/15-科技極品型男＊時尚黑白派對</option>
                            <option value="2716">2019/6/9-鶯歌城市尋寶＊尖山陶寶</option>
                            <option value="2718">2019/6/2-愛在zoha' 烘焙樂</option>
                            <option value="2708">2019/6/1-中山好幸福，脫單擁真愛【委辦】</option>
                            <option value="2707">2019/5/31-消防老司機，幸福揪甘心【委辦】</option>
                            <option value="2717">2019/5/26- 花漾春天~愛樂烘焙趣~</option>
                            <option value="2706">2019/5/25-脫單幸福，真愛南得【委辦】 </option>
                            <option value="2712">2019/5/19-520我愛你＊邂逅『三手男』午茶約會</option>
                            <option value="2714">2019/5/18-藍帶廚藝交友-幸福，從料理開始</option>
                            <option value="2705">2019/5/18-臺中市政府相遇108─足GO幸福【委辦】</option>
                            <option value="2711">2019/5/5-初夏暖陽＊北海岸幸福一日遊</option>
                            <option value="2704">2019/4/27-臺中市政府相遇108─足GO幸福【委辦】</option>
                            <option value="2702">2019/4/25-海芋季＊情定水舞‧「芋」見幸福</option>
                            <option value="2710">2019/4/20-草地野餐PARTY＊尋找幸福彩蛋</option>
                            <option value="2701">2019/4/14-邂逅最in『三手男』午茶聯誼</option>
                            <option value="2709">2019/4/14-幸福來相”芋”漫步在雲端</option>
                            <option value="2703">2019/4/13-緣來愛在潭子【委辦】</option>
                            <option value="2700">2019/4/7-微甜約會＊幸福心手作</option>
                            <option value="2699">2019/3/31-春季賞花野餐＊「紫」想遇見你</option>
                            <option value="2690">2019/3/31-王功採蚵車摸蛤生態之旅出海趣</option>
                            <option value="2691">2019/3/31-王功採蚵車摸蛤生態之旅出海趣</option>
                            <option value="2692">2019/3/30-深澳鐵道自行車一覽山海景</option>
                            <option value="2689">2019/3/30-深澳鐵道自行車一覽山海景</option>
                            <option value="2676">2019/3/30-愛心銀髮關懷活動</option>
                            <option value="2697">2019/3/24-愛戀採果趣＊繽紛甜蜜蜜</option>
                            <option value="2696">2019/3/23-毛孩萌聯誼＊野餐LOVE派對</option>
                            <option value="2695">2019/3/17-微醺春漾Party＊古街美食Riddle</option>
                            <option value="2678">2019/3/17-漆彈×烤肉Party time!</option>
                            <option value="2694">2019/3/10-白色情人節＊愛情摩天輪~玩轉心幸福</option>
                            <option value="2698">2019/3/3-戀戀熟齡＊午茶約會</option>
                            <option value="2693">2019/3/2-邂逅魅力4D暖男＊午茶聯誼派對</option>
                            <option value="2683">2019/3/2-輕旅行-幸福藍染半日遊</option>
                            <option value="2675">2019/3/2-安妮的向日葵花海農場</option>
                            <option value="2688">2019/2/24-草莓季約會＊相遇莓好初LOVE</option>
                            <option value="2674">2019/2/17-來~城市旅遊~</option>
                            <option value="2684">2019/2/17-十七里海岸鐵馬自由行</option>
                            <option value="2686">2019/2/17-花現幸福＊遇見LOVE活島</option>
                            <option value="2673">2019/2/16-羽球同行</option>
                            <option value="2672">2019/2/9-找個好伴好過年</option>
                            <option value="2687">2019/2/2-饗約會ˍ手作幸福心饗受</option>
                            <option value="2682">2019/1/27-紅色水果戀採草莓半日</option>
                            <option value="2685">2019/1/26-藍帶廚藝交友之夜 - 幸福，從料理開始</option>
                            <option value="2681">2019/1/26-冬季戀歌~戀戀九芎＊幸福漫遊</option>
                            <option value="2680">2019/1/20-戀戀6年6班~7年5班 × 熟齡約會</option>
                            <option value="2679">2019/1/12-星座戀曲＊浪漫午茶約會</option>
                            <option value="2677">2019/1/12-大溪老街解謎趣</option>
                            <option value="2671">2018/12/30-爆紅IG打卡景點~落羽松秘境.金黃色的油菜花+季節限定紫色水果戀+爆笑鄉土劇體驗幸福戀愛趣一日遊</option>
                            <option value="2668">2018/12/23-飢餓遊戲-密室鐳射戰</option>
                            <option value="2670">2018/12/23-聖誕盲吃特企~集『食』享LOVE</option>
                            <option value="2658">2018/12/22-藍帶廚藝交友-幸福，從料理開始</option>
                            <option value="2657">2018/12/15-藍帶廚藝交友-幸福，從料理開始</option>
                            <option value="2649">2018/12/15-宜蘭未知旅程二日遊</option>
                            <option value="2667">2018/12/9-饗約會ˍ幸福心手作</option>
                            <option value="2662">2018/12/8-揪愛耶誕，幸福佳音來報到</option>
                            <option value="2663">2018/12/1-跑跑卡丁車-享受甩尾狂飆快感</option>
                            <option value="2666">2018/11/25-12星座戀曲×浪漫單身午茶約會</option>
                            <option value="2669">2018/11/17-藍帶廚藝交友-幸福，從料理開始</option>
                            <option value="2661">2018/11/17-實戰搭訕術</option>
                            <option value="2665">2018/11/17-桃園醫院未婚聯誼-幸福桃緣．微甜冬戀</option>
                            <option value="2660">2018/11/11-饗愛麒麟峰，路跑一起瘋</option>
                            <option value="2655">2018/11/11-1111單身星光池畔PARTY</option>
                            <option value="2664">2018/11/10-芬妮老師:禪繞畫初階班</option>
                            <option value="2656">2018/11/4-瑪那熊: 好自在聊天術</option>
                            <option value="2654">2018/10/31-饗約會ˍ幸福心手作</option>
                            <option value="2641">2018/10/28-大稻埕街頭大富翁實境解謎遊戲</option>
                            <option value="2651">2018/10/27-皇后森林BBQ × SINGLE 面具趴妳最Q！</option>
                            <option value="2644">2018/10/27-萬聖節特企-我要當好萊塢特效化妝師</option>
                            <option value="2659">2018/10/27-萬聖節來搞鬼</option>
                            <option value="2650">2018/10/21-12星座戀曲×浪漫單身午茶約會</option>
                            <option value="2648">2018/10/20-愛情診療室~愛情卡講座</option>
                            <option value="2646">2018/10/7-戀戀6年6班~7年5班 × 熟齡單身午茶約會</option>
                            <option value="2647">2018/10/7-戀戀6年6班~7年5班 × 熟齡單身午茶約會</option>
                            <option value="2652">2018/10/6-特企-胡搞“蝦”搞釣蝦聯誼</option>
                            <option value="2653">2018/10/6-療癒系手作多肉植物小盆栽</option>
                            <option value="2643">2018/9/30-手作愛情綻放光芒工業風美學燈飾</option>
                            <option value="2642">2018/9/29-《戴口罩 X 日式聯誼》</option>
                            <option value="2631">2018/9/29-九局下半的悸動！！</option>
                            <option value="2637">2018/9/23-花好月圓～情滿緣～</option>
                            <option value="2629">2018/9/16-心靈綠洲~園藝Fun輕鬆~</option>
                            <option value="2634">2018/9/9-自釀啤酒 DIY 體驗</option>
                            <option value="2630">2018/9/8-光之禪茶</option>
                            <option value="2645">2018/9/8-浪漫九月~我在城市遇見愛</option>
                            <option value="2633">2018/8/26-黑膠文藝復興運動-專業外拍、黑白暗房體驗、親手沖洗照片</option>
                            <option value="2638">2018/8/25-一開口撩人又聊心~</option>
                            <option value="2632">2018/8/19-豪華遊艇夜釣狂歡PARTY</option>
                            <option value="2627">2018/8/19-舊城漫漫玩~</option>
                            <option value="2636">2018/8/18-一開口撩人又聊心瑪那熊 x 海苔熊脫單講座</option>
                            <option value="2626">2018/8/18-舊城漫漫玩~</option>
                            <option value="2635">2018/8/12-藥師公會~面面俱到， 緣來是你單身舞會</option>
                            <option value="2605">2018/8/12-七夕仲夏．野餐趣</option>
                            <option value="2625">2018/8/12-攜手捐愛~幸福良緣跟著來~</option>
                            <option value="2624">2018/8/11-羽球同行好好玩~</option>
                            <option value="2611">2018/8/11-未知旅程宜蘭二日遊</option>
                            <option value="2623">2018/8/4-迷你高爾夫~GO~</option>
                            <option value="2628">2018/7/22-七月瘋多肉XD~</option>
                            <option value="2621">2018/7/22-與你同行看電影</option>
                            <option value="2587">2018/7/21-愛情聯盟VS.英雄聯盟</option>
                            <option value="2612">2018/7/15-"蝦咪"拉爽爽~</option>
                            <option value="2608">2018/7/14-夏日午後之戀×遇見理饗情人</option>
                            <option value="2588">2018/7/14-台北愛玩咖</option>
                            <option value="2579">2018/7/1- 「年齡限定場 男生73-75年次午茶約會」</option>
                            <option value="2589">2018/6/24-饗LOVE泰料理</option>
                            <option value="2585">2018/6/24- 萬里‧沙灘‧海鮮(世界淨灘日)</option>
                            <option value="2591">2018/6/24-夏日「鯨」艷「蔥」動之旅</option>
                            <option value="2606">2018/6/23-「烹」然心動，來約會吧!藍帶廚藝交友</option>
                            <option value="2590">2018/6/23-「烹」然心動，來約會吧</option>
                            <option value="2586">2018/6/23-桃緣心築．相約幸福</option>
                            <option value="2609">2018/6/16-主愛相隨</option>
                            <option value="2607">2018/6/9- 生活魔法：香檳魅力＆試飲會</option>
                            <option value="2583">2018/5/20-盲旅忙侶</option>
                            <option value="2584">2018/5/5-小食．盲旅．螢火蟲</option>
                            <option value="2575">2018/4/22-Campus制服學院Pa </option>
                            <option value="2582">2018/4/21-(愛)在緣滋原味</option>
                            <option value="2581">2018/4/14-[台北]FUN午茶-咖啡香醇的戀愛滋味</option>
                            <option value="2573">2018/4/8-賽夏文化部落體驗</option>
                            <option value="2580">2018/4/7-公主的夢幻花園</option>
                            <option value="2572">2018/3/11-皇后鎮BBQ</option>
                            <option value="2577">2018/3/11- 心約會~戀愛心理學之戀愛新模式“獵心”</option>
                            <option value="2578">2018/3/3-GO街頭搭訕真挑戰</option>
                            <option value="2571">2018/3/2-晚餐約會</option>
                            <option value="2570">2018/2/10- 約飯</option>
                            <option value="2569">2018/2/3-台中水相餐廳下午茶</option>
                            <option value="2568">2018/1/27-盲旅</option>
                            <option value="2567">2018/1/14-下午茶聯誼 (Goz Cafe 果子咖啡)</option>
                            <option value="2566">2018/1/7-BORD GAME WITH LOVE </option>
                            <option value="2560">2017/12/30- 半日銀匠體驗 打造專屬銀戒 </option>
                            <option value="2564">2017/12/24- </option>
                            <option value="2565">2017/12/24-Merry Christmas 《午茶聯誼X交換禮物X密室逃脫》</option>
                            <option value="2554">2017/12/23- </option>
                            <option value="2563">2017/12/17- </option>
                            <option value="2558">2017/12/15-九型人格愛情解碼</option>
                            <option value="2562">2017/11/26- 愛情齡距離(六年級限定)</option>
                            <option value="2556">2017/11/26- </option>
                            <option value="2553">2017/11/18- 愛情 一種視覺與美學交織的錯覺</option>
                            <option value="2557">2017/11/17-來場愛情探索 向幸福更靠近一點點！</option>
                            <option value="2549">2017/11/4- 臺式蔥爆愛情(臺安醫院)</option>
                            <option value="2555">2017/10/29- </option>
                            <option value="2551">2017/10/28-百鬼夜行之魂斷彩虹橋(Hallowen特企)</option>
                            <option value="2559">2017/10/28-殭屍還魂大冒險(史上最鬧萬聖節)</option>
                            <option value="2552">2017/10/22-愛情齡距離</option>
                            <option value="2561">2017/10/21-愛找茶</option>
                            <option value="2574">2017/10/17- 中山科學研究院</option>
                            <option value="2546">2017/10/14-郵遞愛情~限時專送</option>
                            <option value="2548">2017/10/1- 皇后鎮之烤肉餘生記</option>
                            <option value="2550">2017/9/30-愛情別再躲貓貓</option>
                            <option value="2543">2017/9/24-小酒館的愛情戲碼</option>
                            <option value="2544">2017/9/23-愛情天鵝湖畔漣漪會</option>
                            <option value="2541">2017/9/16-守護幸福 警握良緣~警護聯誼</option>
                            <option value="2547">2017/9/9-王功採蚵&鹿港小鎮(夏季限定)</option>
                            <option value="2545">2017/9/2-愛情別再躲貓貓(六年級男女)</option>
                            <option value="2540">2017/8/27-七夕遊艇派對(快樂公主號)</option>
                            <option value="2539">2017/8/20- 烘焙必修課(熔岩巧克力)</option>
                            <option value="2538">2017/8/12- 葛瑪蘭的香草餅乾(宜蘭)</option>
                            <option value="2534">2017/8/5- 貓言貓語微光饗宴</option>
                            <option value="2367">2017/7/29-76-83年次單身女生限定! 量身打造微約會,讓妳與幸福相遇</option>
                            <option value="2531">2017/7/29-假日詼諧日常下午茶</option>
                            <option value="2532">2017/7/22-小口啜一杯吻(七年級限定)</option>
                            <option value="2537">2017/7/16-愛．熟成 (六年級限定)</option>
                            <option value="2542">2017/7/8-穴道按摩紓壓法</option>
                            <option value="2536">2017/7/8-那年愛情瀑光(三峽)</option>
                            <option value="2535">2017/7/1- 謎情動物園(實境解謎&下午茶)</option>
                            <option value="2524">2017/6/25-愛在右邊第五個轉角</option>
                            <option value="2529">2017/6/24-小島旅遊-琉住愛情、球得幸福</option>
                            <option value="2533">2017/6/24-王功採蚵&鹿港小鎮(夏季限定)</option>
                            <option value="2526">2017/6/17-優質熟男熟女專屬場(Live駐唱)</option>
                            <option value="2518">2017/6/10-龜山賞鯨一日遊</option>
                            <option value="2525">2017/6/3-文青限定場月薪50k男</option>
                            <option value="2521">2017/5/27-單身青年男女熱血魂</option>
                            <option value="2523">2017/5/20- 520，我愛妳！</option>
                            <option value="2515">2017/5/18-小島情緣-花火擦出愛火[吉貝+七美望安]</option>
                            <option value="2530">2017/5/14-我&妳的愛情密語-戶外實境解謎</option>
                            <option value="2522">2017/5/13-如膠似漆 彈情說愛</option>
                            <option value="2527">2017/5/13-情繫雲莊~緣牽桐花(苗栗行)</option>
                            <option value="2520">2017/4/30-BORDING GAME WITH LOVE</option>
                            <option value="2519">2017/4/29-愛情打靶日</option>
                            <option value="2514">2017/4/22- 小資愛情~點石成金</option>
                            <option value="2528">2017/4/16-優質知識男vs文青女孩</option>
                            <option value="2509">2017/4/15-人間四月午茶會</option>
                            <option value="2516">2017/4/15-抓住草莓的尾巴</option>
                            <option value="2508">2017/4/8- </option>
                            <option value="2507">2017/3/25- 小平台大確幸下午茶(台北中山區)</option>
                            <option value="2506">2017/3/19-頂級人生宴 愛情鐵支魂</option>
                            <option value="2517">2017/3/18-BOOM出好感情，漆彈烤肉聯誼派對</option>
                            <option value="2513">2017/3/12-白色甜蜜。情人有約</option>
                            <option value="2512">2017/2/26-就是要你甜蜜蜜</option>
                            <option value="2511">2017/2/12-情人節特別企劃-木作DIY</option>
                            <option value="2505">2017/2/11-愛情的面相~緣分的走向 </option>
                            <option value="2510">2017/2/4-情人節特別企劃-玩屋特好DIY</option>
                            <option value="2504">2017/1/21-愛情枷鎖密室逃脫&下午茶</option>
                            <option value="2503">2017/1/14-甜點人生(年齡限定)</option>
                            <option value="2500">2016/12/31-單身跨年不放閃</option>
                            <option value="2502">2016/12/25-耶誕二手禮物交換大會</option>
                            <option value="2484">2016/12/18-入冬的火鍋派對</option>
                            <option value="2498">2016/12/18-高女孩&高男孩</option>
                            <option value="2497">2016/12/17-雙薪高收入找對象</option>
                            <option value="2496">2016/12/11-6年級同學會</option>
                            <option value="2492">2016/12/10-愛戀桌遊 精采尋英緣</option>
                            <option value="2494">2016/12/4-7年級同學會</option>
                            <option value="2493">2016/12/3-教師同樂會</option>
                            <option value="2452">2016/11/30-下班後的小約會</option>
                            <option value="2501">2016/11/27- 九型人格瞭解約會對象</option>
                            <option value="2489">2016/11/26-<軍公教>主題約會</option>
                            <option value="2487">2016/11/26-<台南>聖誕節派對</option>
                            <option value="2486">2016/11/26-105年中山醫學大學附設醫院【愛是~蜜糖澆吐司】男生尚有一位名額 ~</option>
                            <option value="2490">2016/11/19-[超低優惠]涼風吹撫葡萄園，紳士淑女品酒宴</option>
                            <option value="2485">2016/11/12-輕鬆上手派對桌遊</option>
                            <option value="2488">2016/11/6-驚悚懸疑災厄猛鬼屋</option>
                            <option value="2491">2016/10/29-屍速彩妝萬聖派對</option>
                            <option value="2483">2016/10/16-尋找人生的第二春</option>
                            <option value="2470">2016/10/15-中央印製廠105年度未婚聯誼活動 「北埔心旅遊 戀愛好印象」</option>
                            <option value="2482">2016/10/8-玩桌遊、認識新朋友！</option>
                            <option value="2448">2016/10/7-愛情如火燒，轟轟烈烈</option>
                            <option value="2481">2016/10/2-2016閃藥愛情 歡樂遊艇趴</option>
                            <option value="2478">2016/9/30-單身揪團抓寶貝~火速出擊!</option>
                            <option value="2480">2016/9/25-均質以上! 師字輩專屬男女約會 (台南場)</option>
                            <option value="2479">2016/9/24-為了守護世界的和平 貫徹愛與真實的邪惡 ！ </option>
                            <option value="2472">2016/9/24-[科技部]桌住你心樂遊愛情</option>
                            <option value="2468">2016/9/3-金山情人湖畔依 ~ 滬尾白宮樑緣倚</option>
                            <option value="2450">2016/8/28-熟男熟女幸福滋味</option>
                            <option value="2473">2016/8/20-105年台灣電力公司台中發電廠未婚聯誼活動</option>
                            <option value="2467">2016/8/20-古都台南 Robi In House(兔子餐廳)</option>
                            <option value="2475">2016/8/14-高階主管、海外經驗、碩博菁英、知名企業、收入優秀 客制高效約會 X 超高配對成功率!</option>
                            <option value="2469">2016/8/13-開放男生報名-德律科技聯誼活動</option>
                            <option value="2477">2016/8/13-北投分局VS台北榮總</option>
                            <option value="2466">2016/8/7-約會公務男孩 一起來date吧!</option>
                            <option value="2476">2016/8/2- </option>
                            <option value="2461">2016/7/31-交通部國道新建工程局單身聯誼(密室逃脫&下午茶) ~ 兩女同行 再享優惠 800/人 ~</option>
                            <option value="2474">2016/7/30-夕陽下的遊艇party之福爾摩斯-倫敦下的兇殺闖關</option>
                            <option value="2464">2016/7/30-[男女尚有名額]單身曬夏賽夏趴</option>
                            <option value="2463">2016/7/16-[缺女1名]幸福靠站 鐵定有緣</option>
                            <option value="2471">2016/7/14- </option>
                            <option value="2465">2016/7/9-愛情 一種生活格調 ~</option>
                            <option value="2460">2016/7/2-台中水利署水利規劃試驗所~桌住你我甜蜜遨遊</option>
                            <option value="2462">2016/6/25-二日遊6/25-26 即刻救援~炸彈危機(限女) </option>
                            <option value="2453">2016/6/25-港務(股)基隆分公司-愛情的舵手 航向幸福</option>
                            <option value="2458">2016/6/19- 小資女集結~搜刮愛情</option>
                            <option value="2459">2016/6/18-105年國家發展委員會《 愛情正在發展中... 》單身聯誼旅遊 </option>
                            <option value="2455">2016/6/17-幸福X愛情銬起來</option>
                            <option value="2447">2016/6/16-離島小旅遊~澎湖花火節[吉貝+七望三天兩夜]</option>
                            <option value="2434">2016/6/4-2016 單身聯誼下午茶 信義區篇 ~ 瘋狂人生 La Vida Loca ~</option>
                            <option value="2433">2016/6/4-2016 單身聯誼旅遊 宜蘭篇 ~ 炒一盤蔥爆愛情 ~</option>
                            <option value="2456">2016/5/28-[新竹出發]瞄準愛情~大坑一日遊</option>
                            <option value="2457">2016/5/28-交通部國道新建工程局《 愛情不停工 》聯誼旅遊 *女生尚有9位名額(5/16-23女生限定價1300) </option>
                            <option value="2454">2016/5/14-親密廚房 手作PIZZA的幸福滋味</option>
                            <option value="2449">2016/5/14-「風城之戀:愛的進行曲」</option>
                            <option value="2446">2016/4/30-2016 尋找愛情秘境~你只需要果敢勇猛</option>
                            <option value="2445">2016/4/23-2016 尋找愛情秘境~你只需要純真</option>
                            <option value="2451">2016/4/17-運動約會-戀愛動滋動滋</option>
                            <option value="2444">2016/4/16-2016 尋找愛情秘境~你只需要一點運氣</option>
                            <option value="2443">2016/4/10-2016 尋找愛情秘境~你只需要放輕鬆</option>
                            <option value="2442">2016/4/9-2016 尋找愛情秘境~你只需要勇氣</option>
                            <option value="2435">2016/3/27-復活節企劃-春天的幸福微風</option>
                            <option value="2438">2016/3/26-2016 單身聯誼下午茶 大安區篇 Brunch&Coffee Shop</option>
                            <option value="2436">2016/3/20- 2016 單身聯誼下午茶 大安區篇 走吧 談個戀愛吧 (左巴好室●好事 餐廳)</option>
                            <option value="2441">2016/3/13-白色情人之我的白馬王子</option>
                            <option value="2439">2016/2/28-大廚的寂寞Menu</option>
                            <option value="2437">2016/2/27-跨出戀愛的步伐-聯誼不忘動吃動</option>
                            <option value="2427">2016/2/21-愛情x甜蜜x幸福x美食</option>
                            <option value="2432">2016/2/20-新年走春趣~老街三訪 </option>
                            <option value="2440">2016/2/14-2016 簡單情人節 伯朗咖啡 南京一店3F</option>
                            <option value="2431">2016/1/20-終結孤單：新春限定 下班微約會 第2趴</option>
                            <option value="2430">2016/1/13-終結孤單：新春限定 下班微約會 第1趴</option>
                            <option value="2426">2016/1/10-晨間之戀-</option>
                            <option value="2425">2015/12/31-單身倒數，迎接2016</option>
                            <option value="2429">2015/12/24-終結孤單：甜蜜聖誕夜 下班晚餐微約會</option>
                            <option value="2423">2015/12/19-爵士音樂~公益聯誼室內野餐會~12/11前報名者兩人以上再減100(男女皆適用)</option>
                            <option value="2420">2015/12/5-《非誠勿擾 ~ 人海中遇見你（妳）》下午茶 ~ 女生最後兩位名額~</option>
                            <option value="2424">2015/12/5-Fun旅遊~楓中奇緣~愛進奧萬大</option>
                            <option value="2422">2015/11/28-2015 寂寞倒數 ~ 輕微小確幸單身聯誼下午茶活動</option>
                            <option value="2421">2015/11/21-2015 寂寞倒數 ~ 愛情裡的食尚蔓延-單身聯誼下午茶</option>
                            <option value="2419">2015/11/8-世界單身日特別企劃~雷射瞄準你的心 ※10/30~11/4女性同袍報名者享一槍斃命價:200元，3女同行:500元</option>
                            <option value="2416">2015/11/8-台南市護理師公會【愛情慢慢成隱 ~ 緣聚你我心田聯誼活動】 </option>
                            <option value="2415">2015/11/7-[免費，男生已滿、女生尚有名額]戀戀風城 內灣懷舊之旅</option>
                            <option value="2418">2015/10/31-萬聖節特別企劃 群魔亂舞狂歡夜－萬聖節遊艇派對</option>
                            <option value="2409">2015/10/31-萬聖節特別活動-[變裝派對~愛情來搞什麼鬼]</option>
                            <option value="2414">2015/10/31-2015 台中中龍鋼鐵股份有限公司【龍情蜜意 情堅如鋼】單身聯誼旅遊 ~ 男生已滿請勿報名，女生費用1400元，兩女同行1300/人</option>
                            <option value="2410">2015/10/24-輕鬆交友之一同樂桌遊</option>
                            <option value="2412">2015/10/17-[台北出發]--輕鬆交友之----愛情向前蔥</option>
                            <option value="2413">2015/10/17-輕鬆交友之愛情像前蔥</option>
                            <option value="2408">2015/10/3-104年成大醫院「古都新城~大城小愛」加開場~香格里拉台南遠東國際飯店-尚酒吧~</option>
                            <option value="2407">2015/10/3-行政院海岸巡防署《非誠勿擾 ~ 人海中遇見你（妳）》單身聯誼下午茶 ~ </option>
                            <option value="2417">2015/9/20-台北市醫師公會104年度單身聯誼午茶活動</option>
                            <option value="2411">2015/9/19-2015~中秋月池JazzNight&天燈祈福BBQ~如果無聊 如果不想返鄉 如果沒有情人切月餅 那就來認識新朋友一起PartyParty吧~</option>
                            <option value="2402">2015/9/5-中央印製廠未婚聯誼活動</option>
                            <option value="2406">2015/9/5-2015~愛情就是不停的戰鬥~槍林彈雨 特別企劃 ( 兩女同行1200元/人)</option>
                            <option value="2400">2015/9/5-104年行政院海巡署中部地區巡防局「中成眷屬巡情記」單身聯誼旅遊 ~女生尚有兩位名額~</option>
                            <option value="2404">2015/8/29-爆走桌遊Pa ~句點哥跟省話姐的互動特效藥 特惠價500/人~女生尚有五位名額 </option>
                            <option value="2403">2015/8/29-『古都新情 大城小愛』成大醫院單身聯誼系列三 (集合地點 :台南火車站後站)~剩最後一位女生名額</option>
                            <option value="2397">2015/8/16-[男生已滿，全為藥師]臺北市藥師公會『2015緣來是你，渴望幸福』聯誼活動</option>
                            <option value="2405">2015/8/16-仲夏童話七夕情</option>
                            <option value="2401">2015/8/15-成大醫院 104年 「古都新城~大城小愛」未婚聯誼活動系列二 ~ 8/15前女生結伴同行者900/人</option>
                            <option value="2398">2015/8/15-2015 行政院水產試驗所 ~ 漫步白宮巧遇愛 ~ 1300/人，女孩尚有名額，男孩請勿報名~</option>
                            <option value="2374">2015/8/1-[交通部]-公主的夢幻花園遊(女生前10名報名享1200優惠價)</option>
                            <option value="2390">2015/7/26-[男生剩3名][保證出團]女生只要1100(剩3名)男生通知中:嘉義區監理所-『幸福嘉愛情 監定不移』</option>
                            <option value="2389">2015/7/26-女生只要1300交通部公路總局第一區養護工程處-愛情的養份 呵護你我心</option>
                            <option value="2399">2015/7/25-成大醫院 104年 「古都新城~大城小愛」未婚聯誼活動系列一</option>
                            <option value="2382">2015/7/19-[科技部]-復科愛情~技憶幸福好滋味[滿團]</option>
                            <option value="2393">2015/7/18-海巡署東部地區巡防局 - 情定鹿野~幸福升空 (女生剩最後一位名額~)</option>
                            <option value="2375">2015/7/18-[交通部]-我們的愛情十分幸福[滿團]</option>
                            <option value="2378">2015/7/12-東元電機股份有限公司「元分具備 只欠東風」聯誼旅遊 ~ 女生1350/人，兩人同行1300/人</option>
                            <option value="2396">2015/7/5-舌尖上之愛情味蕾 ~ 創意料理與時尚鍋具之邂逅 ※前10位報名者，來即送Hello kitty全球限量版巧克力</option>
                            <option value="2394">2015/7/4-[滿團，未收到通知則未錄取]-新竹縣政府104年度「風城之戀 仲夏愛之果」</option>
                            <option value="2388">2015/7/4-行政院農業委員會林務局 104年「緣聚山林~愛情迷霧」單身聯誼旅遊 - 還剩最後1女名額</option>
                            <option value="2379">2015/7/4-[交通部]-蘭陽小確幸~戀愛微旅行[滿團]</option>
                            <option value="2383">2015/6/28-104年行政院農業委員會水產試驗所「基隆山外山~神秘情人夢」單身聯誼旅遊 (活動擇日再辦，請勿報名)</option>
                            <option value="2387">2015/6/28-2015 行政院農業委員會水產試驗所【基隆山外山~神秘情人夢】</option>
                            <option value="2392">2015/6/27-104年雲林縣政府【貓吃了愛情巧克力】單身聯誼旅遊 (男生名額已滿 請勿報名~)</option>
                            <option value="2384">2015/6/27-siyun su balay(愛)在緣滋原味[滿團]</option>
                            <option value="2371">2015/6/21-用輕鬆的心態認識新朋友！一場快速約會Speed dating ，好友、戀人，一次擁有！-新竹場</option>
                            <option value="2386">2015/6/20-[台北]FUN午茶-咖啡香醇的戀愛滋味</option>
                            <option value="2385">2015/6/14-泡泡足球同樂會</option>
                            <option value="2381">2015/6/13-經濟部標準檢驗局「標準情人-檢驗您的愛情DNA」單身聯誼旅遊</option>
                            <option value="2395">2015/6/13-臺南地檢署"鼓動文化 藝術傳情"一日遊</option>
                            <option value="2368">2015/6/13-2015 【當幾米遇到威士忌】~ 單身聯誼旅遊 </option>
                            <option value="2380">2015/6/7-[台北]FUN午茶-咖啡香醇的戀愛滋味</option>
                            <option value="2391">2015/6/7-*桃園地區-[限女生]高薪暖男的午後相約</option>
                            <option value="2377">2015/6/6-新北市中和第二分局 「和你一起~中結單身」下午茶~波麗士大人~快來逮捕我的心吧！</option>
                            <option value="2373">2015/6/6-[交通部]-童言話語細說愛情-[男女已滿]</option>
                            <option value="2372">2015/5/16-2015 ~ 就是愛ㄑ桃</option>
                            <option value="2376">2015/5/16-2015 新北市政府單身聯誼旅遊第三梯次~預見幸福向前走，苗栗尋夢一日遊~ 驚喜價900元/人，名額有限唷~</option>
                            <option value="2345">2015/5/9-2015 文思情湧 緣起不化 (關於愛的美好年代系列3) ~ 騷人墨「客」~「窯」相呼應 (苗栗三義)</option>
                            <option value="2369">2015/5/3-~ 在忘憂谷談情說愛 ~ </option>
                            <option value="2363">2015/5/2-2015 新北市政府警察局【萍水相逢‧天燈真情】 單身聯誼旅遊 (非新北市警察單位朋友請勿報名)</option>
                            <option value="2370">2015/4/26-用輕鬆的心態認識新朋友！一場快速約會Speed dating ，好友、戀人，一次擁有！男生已額滿,女生還有名額快來報名唷!</option>
                            <option value="2366">2015/4/26-2015 ~【河岸森林‧ 戀人童話】~</option>
                            <option value="2365">2015/4/25-當愛情掉進咖啡裡 - DNA CAFE ~ </option>
                            <option value="2364">2015/4/18-2015 王朝大酒店 DYNA BAR 愛情藍調特調 爵士搖擺午宴 (兩人同行價1200/人)</option>
                            <option value="2362">2015/3/29-2015 泡泡足球FunBubble 全台巡迴 台中場</option>
                            <option value="2358">2015/3/28-舌尖上之愛情味蕾 ~ 創意料理與時尚鍋具的邂逅</option>
                            <option value="2357">2015/3/22-尋找愛情DNA ~ 與WAFFLE有約 </option>
                            <option value="2361">2015/3/21-2015 泡泡足球FunBubble 全台巡迴 台北場</option>
                            <option value="2356">2015/3/21-2015 BORDING GAME WITH LOVE 桌遊聯誼第二彈 </option>
                            <option value="2348">2015/3/21-2015 文思情湧 緣起不化 (關於愛的美好年代系列6) ~ 名山「勝」水. 睹物「興」情 (苗栗三義)</option>
                            <option value="2359">2015/3/15-2015公路總局 - 西部濱海公路北區臨時工程處 ~ 花獻愛 粉紅浪漫來襲 ~ </option>
                            <option value="2355">2015/3/14-2015 王朝大酒店 DYNA BAR 愛情藍調特調 爵士搖擺午宴 (兩人同行價1300/人)</option>
                            <option value="2360">2015/3/8-2015 泡泡足球FunBubble 全台巡迴 台南場</option>
                            <option value="2354">2015/2/14-2015 情人節特別企劃~冰雪情緣單身派對</option>
                            <option value="2353">2015/2/14-0214十鼓浪漫魅力˙鐵定撼動愛情(高雄˙台南情人節專場)</option>
                            <option value="2347">2015/2/7-2015 文思情湧 緣起不化 (關於愛的美好年代系列5) ~ 白紙黑字愛情論 (南投土角厝水上旋轉&廣興紙寮)</option>
                            <option value="2352">2015/1/31-2015 Board Game With Love (桌遊聯誼) </option>
                            <option value="2346">2015/1/31-2015 文思情湧 緣起不化 (關於愛的美好年代系列4) ~ 匪「石」匪席 「壁」翼雙飛 (苗栗南庄)</option>
                            <option value="2344">2015/1/24-2015 文思情湧 緣起不化 (關於愛的美好年代系列2) ~ 愛從鼓聲若響起 (台南十鼓文創園區)</option>
                            <option value="2351">2015/1/18-今天不上班 ~ 下午茶聯誼 (Goz Cafe 果子咖啡)</option>
                            <option value="2343">2015/1/17-2015 文思情湧 緣起不化 (關於愛的美好年代系列1) ~ 尋找愛情新樂園 (台中道禾六藝&香蕉樂園)</option>
                            <option value="2338">2015/1/10-嘉義板陶窯藝術村&#12398;親密旅行 (高雄出發˙美女請入坐×2)</option>
                            <option value="2342">2014/12/28-《烘》出火花 《焙》感幸福</option>
                            <option value="2336">2014/12/27-冬意漫延「最愛瀨著你-幸福的旅行」一日遊(台南走馬瀨農場)</option>
                            <option value="2340">2014/12/20-別「聖」我，「誕」身派對 聖誕花海星空夜 聖誕節特別活動</option>
                            <option value="2341">2014/12/20-新北市政府警察局103年「築窯築情‧幸福之約」單身聯誼旅遊</option>
                            <option value="2349">2014/12/14-2015 今天不上班 下午茶聯誼 (GozCafe)</option>
                            <option value="2350">2014/12/14-今天不上班~午茶聯誼 (GozCafe 果子咖啡)</option>
                            <option value="2339">2014/12/6-魅力香蕉˙情繫碼頭˙甜品午茶聯誼(高雄專場)</option>
                            <option value="2337">2014/12/6-2014 歲末特別企劃 ~ 關於幸福的單程車票 ( 這次 幸福不再過站不停 ) 冀求幸福的人趕快行動吧！</option>
                            <option value="2335">2014/12/6- 女生們還有2位名額喔~(男生已經額滿囉!! )行政院海岸巡防署103年《為愛起腳．踢向幸福》夢幻泡泡足球 未婚聯誼活動</option>
                            <option value="2324">2014/11/30-103年台南市護理師護士公會單身聯誼旅遊 - “金”玉良緣 ~ 臻情綿”鹽”</option>
                            <option value="2332">2014/11/29-~迷走時空‧密室逃脫~(限8男8女~報名從速~)</option>
                            <option value="2334">2014/11/22- 好好玩饗約會－愛在光舍.幸福星情 (大哥大姊同樂會)PART 2</option>
                            <option value="2333">2014/11/15-2014 整個城市都是我的幸福行館 帥大叔vs熟媚女的小確幸下午茶</option>
                            <option value="2323">2014/11/8-中山醫學大學附設醫院~英倫童話‧遇見最初的你</option>
                            <option value="2322">2014/11/1-等一個人咖啡館系列 ~ 喝一口 想入啡啡 (台中花神咖啡館) </option>
                            <option value="2325">2014/11/1-等一個人咖啡館系列 ~ 嚐一口 啡你莫屬 (台北小食糖 Sugar Bistro)</option>
                            <option value="2311">2014/11/1-(暫停報名)SHINING RUN 牽手路跑緣 103年度 行政院海岸巡防署 未婚聯誼活動</option>
                            <option value="2328">2014/10/26- 好好玩饗約會－愛在光舍.幸福星情 (大哥大姊同樂會)</option>
                            <option value="2326">2014/10/25-2014 侍“寵”而嬌 ~ 單身&寵物的聚會 時間就該花在最【寵】愛的事物上 寵你所寵 ~ 愛妳所愛(10/25 一場關於男人&女人&寵物的聚會)</option>
                            <option value="2329">2014/10/25-等一個人咖啡館系列 ~ 啜一口 啡誠勿擾 (J's Cafe)</option>
                            <option value="2330">2014/10/25-(女生剩下2位名額~)103年國立成功大學附設醫院 ~ 甜蜜相約-相會香格里拉 (台南香格里拉大飯店)</option>
                            <option value="2327">2014/10/25-2014 ~ 風城古橋小情歌 ~ 女生尚有2位名額(現在女生價只要1000元唷)</option>
                            <option value="2310">2014/10/19-童夢奇緣‧密室逃脫 ~重回孩童時光~(限定10男10女~報名從速)-最後2女~~</option>
                            <option value="2318">2014/10/18-行政院農糧署【面面相趣 】等一壺緣分下午茶 </option>
                            <option value="2321">2014/10/18-103年台灣電力股份有限公司台中供電區營運處「詩情花園覓情緣」單身聯誼旅遊</option>
                            <option value="2331">2014/10/1-《Thanks Goodness, It’s Friday!》森巴搖擺樂周末！</option>
                            <option value="2320">2014/9/28-好好玩饗約會-戀戀相會 時尚曼谷(女生名額剩下6位~請趕快把握機會!)</option>
                            <option value="2316">2014/9/28-新竹大遠百威秀GOLD CLASS好好玩電影FUN映節-教師節特別企劃 強片推薦-移動迷宮</option>
                            <option value="2299">2014/9/28-知事官邸西菜館</option>
                            <option value="2287">2014/9/28-愛向陽光 今世幸福（桃園）向陽農場</option>
                            <option value="2290">2014/9/21-「甜甜花海的微小幸福」五分車的甜蜜戀曲～</option>
                            <option value="2306">2014/9/14-內政部消防署《愛情就是對號入座》特別企劃 </option>
                            <option value="2315">2014/9/14- 新竹大遠百威秀GOLD CLASS 好好玩單身FUN映節-第一場次 首推強片推薦-露西</option>
                            <option value="2313">2014/9/14-森林花園‧初見曙光 ~森林鳥花園一日遊~(9/7前女生優惠一人只要1200)</option>
                            <option value="2319">2014/9/13-I See U ˙ 預 見 幸 福 邂逅陽光午茶聯誼</option>
                            <option value="2301">2014/9/13-2014經濟部標準檢驗局「愛情沒有標準」午茶餐會 </option>
                            <option value="2307">2014/9/13-103年內政部消防署《今生金世情綿鹽》單身聯誼第一梯次特別企劃</option>
                            <option value="2312">2014/9/13-行政院海岸巡防署中部地區巡防局「鄉村趣、花園憩」單身聯誼旅遊</option>
                            <option value="2317">2014/9/1-新竹大遠百威秀GOLD CLASS好好玩電影FUN映節-教師節特別企劃 強片推薦-移動迷宮</option>
                            <option value="2309">2014/8/30-103年國立臺北科技大學【幸福旅程】單身聯誼下午茶 </option>
                            <option value="2305">2014/8/30-103年行政院農業委員會水產試驗所 - 【 隆情蜜意 嶼您同行 】單身聯誼旅遊</option>
                            <option value="2308">2014/8/30-國立成功大學103年度未婚同仁單身聯誼旅遊 ~ 情比“金”堅 ~ 盡在不“鹽”中~</option>
                            <option value="2297">2014/8/16-相遇台東 幸福升空 臺東大學單身聯誼活動(女生尚缺 8位)</option>
                            <option value="2302">2014/8/9-「戀戀香格里拉」（南部）香格里拉大飯店</option>
                            <option value="2304">2014/8/9-國立中央大學 - 十分TOUR~FUN天燈</option>
                            <option value="2294">2014/7/27-光社幸福漫遊~政大光社(文山區)</option>
                            <option value="2296">2014/7/27-男生剩下五個名額！「築窯築情 築語戀曲」回歸自然體驗焢窯樂趣～（新竹）新竹南埔生態村</option>
                            <option value="2266">2014/7/26-「愛情裊裊升空」體驗夢幻鳥園及手做PIZZA～ （新竹）森林鳥花園、好時節農莊</option>
                            <option value="2284">2014/7/26-行政院農業委員會農糧署「丈量愛情有多濃」單身聯誼旅遊 第二梯次(男生已滿)</option>
                            <option value="2303">2014/7/26-「平溪鐵道幸福十分」十分鐵道老街品嘗懷舊幸福 (北部) 平溪煤礦博物館、十分老街</option>
                            <option value="2295">2014/7/20-國立台中科技大學「愛情的面相」下午茶 女生尚有兩位名額~7/18前報名者即享700元優惠</option>
                            <option value="2255">2014/7/20-【全新型態-大力推薦】 愛旅遊約會派對 (互相分享旅遊回憶~譜出一同出遊的好情人)</option>
                            <option value="2268">2014/7/20-「愛戀亞大．幸福薩克斯~」全台最美大學搭配藍調浪漫城市之旅～ （中部）亞洲大學、薩克斯風博物館</option>
                            <option value="2314">2014/7/20-103年台北市醫師公會聯誼茶會</option>
                            <option value="2300">2014/7/19- 下驛站 幸福隧道</option>
                            <option value="2292">2014/7/19-「蜜糖花海遇見愛~」與花卉一同幸福漫遊～(高雄)橋頭糖廠、高雄花卉農園中心</option>
                            <option value="2286">2014/7/13- It's Love 義式愛~CaLACaLA義大利廚房(新店)</option>
                            <option value="2269">2014/7/13-「板陶窯藝術人文之旅~」大人氣！全台最可愛的陶藝拼貼藝術村～ （南部） 板頭村交趾拼貼藝術村</option>
                            <option value="2265">2014/7/12-「戀戀淡海同舟～」小白宮、姑娘樓歐洲風情，原住民餐廳熱情午茶～（北部）淡水小白宮、芭達桑餐廳</option>
                            <option value="2256">2014/7/12-「荔刻遇到愛～」超浪漫樂園快速秒殺相機記憶體~（中部）就是愛荔枝樂園</option>
                            <option value="2282">2014/7/12-行政院農業委員會農糧署「丈量愛情有多濃」單身聯誼旅遊 第一梯次</option>
                            <option value="2288">2014/7/10-戀戀南島嘉年華~(嘉義)松田崗休閒農場</option>
                            <option value="2253">2014/7/6-「戀戀鄉村樂”陶”陶之旅～」拼貼屬於你的浪漫愛情～（南部）板頭村交趾剪粘藝術村</option>
                            <option value="2291">2014/7/5- 愛在夏日蔓延</option>
                            <option value="2298">2014/7/5-103年度教育部人事處及所屬人士機構「愛戀臺灣，月老傳情」中區活動之【幸福蜜蜜箱愛】</option>
                            <option value="2262">2014/7/5-幸福相遇桃花源</option>
                            <option value="2293">2014/7/1-(男生已額滿)故園宮心 朗朗午後</option>
                            <option value="2264">2014/6/28-(男生已額滿)「我的食尚 你的愛～」（北部）FB時尚曼谷餐廳</option>
                            <option value="2249">2014/6/28-高雄榮總&第一科大
                                「愛你一世～幸福聯誼系列」
                                第三梯次『悠活情懷~浪漫午后戀曲』</option>
                            <option value="2257">2014/6/28-「陶醉愛情之鄉～」鄉村陶藝村讓你陶醉其中~（南部）板頭村交趾剪粘藝術村</option>
                            <option value="2259">2014/6/28-內政部消防署第三梯~愛情果實甜蜜蜜</option>
                            <option value="2285">2014/6/22-國立雲林科技大學「鄉戀愛情 拼貼戀曲」單身同仁聯誼活動</option>
                            <option value="2254">2014/6/15-「戀戀香格里拉～」（南部）香格里拉大飯店</option>
                            <option value="2270">2014/6/15-2014 南茂科技單身聯誼旅遊 ~ 限女生報名</option>
                            <option value="2271">2014/6/15-「2014愛您一世 窯旺幸福 鄉愛一生」回歸自然體驗鄉村焢窯及美景～ （新竹）南埔生態村竹語茶蘆</option>
                            <option value="2273">2014/6/15-「心築人文香戀」（北部）活動地點已改至:Squares格子美式餐廳</option>
                            <option value="2258">2014/6/14-內政部消防署第二梯次~夢幻愛情遊艇派對</option>
                            <option value="2267">2014/6/14-森林的愛情精靈</option>
                            <option value="2261">2014/6/14-長庚大學103年度未婚同仁聯誼活動第二梯次~夏日絮語幸福滿分(取消)
                            </option>
                            <option value="2260">2014/6/8-長庚大學103年度未婚同仁聯誼活動第一梯次~夏日絮語幸福滿分</option>
                            <option value="2252">2014/6/8-「蝶戀花海～心戀情海～」大溪彩虹花海置身偶像劇場景~（北部）大溪花海農場</option>
                            <option value="2263">2014/6/7-「幸福如魚得水～」用鯉魚旗送出浪漫心意並大啖12道管理鮮魚～（南部）朝露魚舖</option>
                            <option value="2251">2014/6/7-內政部消防署第一梯次~幸福農場小確幸</option>
                            <option value="2248">2014/5/31-高雄榮總&第一科大
                                「愛你一世～幸福聯誼系列」
                                第二梯次『香草戀曲~甜蜜幸福情』</option>
                            <option value="2245">2014/5/25-新竹區監理所-第三梯次~午後的幸福相戀</option>
                            <option value="2250">2014/5/24-四方尋愛~Looking For Love</option>
                            <option value="2244">2014/5/18-新竹區監理所-第二梯次~人文相戀 (女生尚有六位名額)</option>
                            <option value="2272">2014/5/17-來自星星的戀曲~螢火蟲奇緣</option>
                            <option value="2240">2014/5/17-噹噹噹~愛情列車來囉!!經濟部智慧財產局103年度未婚同仁聯誼活動</option>
                            <option value="2243">2014/5/17-新竹區監理所-第一梯次~四方尋愛
                            </option>
                            <option value="2242">2014/5/10-愛情發電機~就是對你有感覺 單身派對</option>
                            <option value="2241">2014/5/3-林務局~單身同仁聯誼活動</option>
                            <option value="2239">2014/4/26-2014 ByeBye小確幸 擁抱大確幸</option>
                            <option value="2247">2014/4/26-高雄榮總&第一科大
                                「愛你一世～幸福聯誼系列」
                                第一梯次『戀戀澄清湖~愛之旅』</option>
                            <option value="2246">2014/4/19-戀戀春天&#9829;午餐約會(限女生)</option>
                            <option value="2238">2014/4/19-南瓜馬車的甜蜜愛情</option>
                            <option value="2232">2014/3/29-一日遊~幸福採果趣，採收愛情的果實</option>
                            <option value="2236">2014/3/22-[另類聯誼]試辦~愛情向前跑~</option>
                            <option value="2233">2014/3/15-愛情上隱~晚餐輕食饗宴</option>
                            <option value="2234">2014/3/15-戀愛桌遊~伯朗遇上愛，早午餐聯誼</option>
                            <option value="2237">2014/3/8-白色情人~遊艇派對</option>
                            <option value="2235">2014/3/8-2014愛在太平洋~共織白色情人夢</option>
                            <option value="2231">2014/2/8-女生已滿[情人節午茶聯誼特別企劃]-2014愛情啟航~航向幸福的藍天</option>
                            <option value="2230">2014/1/25-討個情人好過年-走進山水畫的浪漫宜蘭</option>
                            <option value="2229">2013/12/21-單身特企-寶藍耶誕派對</option>
                            <option value="2225">2013/12/21-山林綠野‧森呼吸-蘭陽一日遊</option>
                            <option value="2226">2013/12/15-冬戀序曲I - 地中海樂章 </option>
                            <option value="2227">2013/12/1-航向愛情幸福輕航機</option>
                            <option value="2221">2013/12/1-台中[只開放男生報名]幸福童話，愛情花開</option>
                            <option value="2222">2013/11/24-戀戀秋天‧晚餐約會(限男生)</option>
                            <option value="2228">2013/11/24-愛情來了 郵不得你拒絕 </option>
                            <option value="2213">2013/11/9-幸福報到~台北晚宴party</option>
                            <option value="2216">2013/11/9-<告別單身慶典>單身快閃，幸福報到~高雄場</option>
                            <option value="2217">2013/11/9-<告別單身慶典>單身快閃，幸福報到~台南場 </option>
                            <option value="2218">2013/11/9- <告別單身慶典>單身快閃，幸福報到~台中場</option>
                            <option value="2219">2013/11/9-<告別單身慶典>單身快閃，幸福報到~台北場</option>
                            <option value="2220">2013/11/9-[新竹][桃園]單身快閃，幸福報到~套裝一日遊!</option>
                            <option value="2223">2013/10/27-戀愛萬聖遊艇趴</option>
                            <option value="2215">2013/10/19-行政院海岸巡防署海岸巡防總局南部地區巡防局102年『征服情「海」、「巡」找幸福』單身聯誼旅遊</option>
                            <option value="2204">2013/10/19-102年嘉義長庚未婚聯誼活動 【西班牙朝露愛情】</option>
                            <option value="2208">2013/10/13-幸福的愛情符號~西班牙印象 - 第三梯次單身聯誼旅遊</option>
                            <option value="2209">2013/10/5-[台中出發]~缺3男!!夏日戀曲~遇見愛情~第一梯 預約幸福在綠盈改期至10/5</option>
                            <option value="2206">2013/9/29-幸福的愛情符號~復刻印象 - 第二梯次單身聯誼午茶</option>
                            <option value="2212">2013/9/28-幸福連結讓愛甜的用心 </option>
                            <option value="2211">2013/9/28- 心動時刻甜蜜午茶(限女性)</option>
                            <option value="2203">2013/9/28-【擁抱幸福．Love戀台東ing】第二梯次</option>
                            <option value="2210">2013/9/28-[台中出發]女生已滿【夏日戀曲~遇見愛情】第二梯「異國戀曲~愛神降臨」</option>
                            <option value="2205">2013/9/15-幸福的愛情符號~時光印象 - 第一梯次單身聯誼午茶</option>
                            <option value="2200">2013/9/8-愛情花開 "洋食戀曲行"</option>
                            <option value="2202">2013/9/7-【擁抱幸福．Love戀台東ing】第一梯次 (活動暫停報名)</option>
                            <option value="2207">2013/9/7-屏東縣政府『愛情注定水噹噹、「緣」來在屏東』</option>
                            <option value="2195">2013/8/31-中央印製廠102年度未婚聯誼活動</option>
                            <option value="2201">2013/8/17-臺北市政府消防局--【鳳凰之戀 HIGH翻這一夏】</option>
                            <option value="2199">2013/8/10-移民署~情牽七夕~真愛一生</option>
                            <option value="2172">2013/8/10-桃園縣政府102年「愛戀桃花園」未婚公教同仁第四梯次聯誼活動</option>
                            <option value="2197">2013/8/3-財政部高雄國稅局未婚同仁聯誼~~緣起～高雄港</option>
                            <option value="2177">2013/8/3-【戀夏郊遊趣~幸福三樂章】第三樂章 ~【幸福饗宴】</option>
                            <option value="2161">2013/8/3-交通部第八梯-[尋找愛情的幸福劇本]建議60~65年次</option>
                            <option value="2194">2013/7/28-好好玩好友咖 之 公主的約會</option>
                            <option value="2176">2013/7/28-【戀夏郊遊趣~幸福三樂章】第二樂章 ~【香草花園戀愛派對】</option>
                            <option value="2190">2013/7/27-中央大學「夏日戀曲~尋找小確幸之旅」第二梯次</option>
                            <option value="2192">2013/7/20-雲林科大主辦【享受吧~希臘秘密旅行】
                            </option>
                            <option value="2193">2013/7/20-高雄第一科大主辦~愛情就是押對寶</option>
                            <option value="2171">2013/7/20-桃園縣政府102年「愛戀桃花園」未婚公教同仁第三梯次聯誼活動</option>
                            <option value="2196">2013/7/20-高雄市政府民政局、高雄市楠梓區公所「單身別逗『琉』『球』愛趁現在」公教人員單身聯誼活動</option>
                            <option value="2160">2013/7/6-活動延期至8/3~交通部第七梯-[魔幻時刻單身面具派對]</option>
                            <option value="2189">2013/7/6-中央大學「夏日戀曲~尋找小確幸之旅」第一梯次</option>
                            <option value="2183">2013/7/6-內政部、消防署2013愛您一生"真愛找上門"第三梯次</option>
                            <option value="2175">2013/6/29-【戀夏郊遊趣~幸福三樂章】第一樂章 ~【部落風情~甜蜜騎蹟】</option>
                            <option value="2182">2013/6/29-內政部、消防署2013愛您一生"真愛找上門"第二梯次</option>
                            <option value="2159">2013/6/29-(女生尚有2位名額)交通部第六梯次-[夏譜戀曲~幸福啟航]</option>
                            <option value="2185">2013/6/29-高雄市政府警察局「來去台東夏日戀曲」2日遊~~</option>
                            <option value="2187">2013/6/23-(女生費用300元兩人同行500元 )一段在台北城與優質男孩相遇的故事</option>
                            <option value="2148">2013/6/23-(桃園)愛戀三部曲之最終樂章～主管的約會戀曲(單身女郎限定)</option>
                            <option value="2188">2013/6/23-嘉義市政府102年「相約幸福‧甜蜜嘉分」單身聯誼活動</option>
                            <option value="2179">2013/6/22-環檢所、環訓所、海巡署合辦-【HIGH翻初夏 北埔踩街樂】</option>
                            <option value="2166">2013/6/22-102年國立東華大學單身聯誼旅遊『花東緣 ~ 情話綿』(女生尚有二位名額)</option>
                            <option value="2173">2013/6/18-法務部行政執行署及各分署暨中部地區法務機關
                                「102年法務交流暨未婚聯誼活動」
                            </option>
                            <option value="2191">2013/6/16-草食男的桃花來啦(限女性)</option>
                            <option value="2181">2013/6/16-內政部、消防署2013愛您一生"真愛找上門"第一梯次</option>
                            <option value="2186">2013/6/15-(高雄限女)中鋼企業，中宇環保工程股份有限公司圓山飯店聯誼活動!</option>
                            <option value="2178">2013/6/15-新北市淡水區中小學102年「幸福滬尾小情歌」未婚公教同仁第三梯次聯誼活動(女生尚有1位名額)</option>
                            <option value="2168">2013/6/8-桃園縣政府102年「愛戀桃花園」未婚公教同仁第二梯次聯誼活動 ~ 愛戀音符由您來譜(天秤座音樂餐廳)</option>
                            <option value="2158">2013/6/8-南投縣政府第二梯次~[愛戀車埕微加幸福] </option>
                            <option value="2138">2013/6/1-(女生還有名額)交通部第四梯次-[愛戀五分車微加幸福]</option>
                            <option value="2174">2013/6/1-新北市淡水區中小學102年「幸福滬尾小情歌」未婚公教同仁第二梯次聯誼活動</option>
                            <option value="2147">2013/5/26-(桃園)愛戀三部曲之第二樂章～工程師的約會戀曲(女生活動費用200元 限單身女郎~)</option>
                            <option value="2130">2013/5/26-(女生300元)愛你一生~精緻午茶微聯誼</option>
                            <option value="2169">2013/5/26-102年度新北市淡水區中小學第一梯次單身聯誼旅遊 ~ 幸福滬尾小情歌</option>
                            <option value="2180">2013/5/25-新竹縣政府102年度「把愛〝擺〞一起」未婚聯誼活動 </option>
                            <option value="2157">2013/5/25-南投縣政府第一梯次~[梧桐山城最晴天]</option>
                            <option value="2164">2013/5/25-高雄市政府財政局暨民政局102年「May In Love~情定水樂園」單身聯誼派對</option>
                            <option value="2163">2013/5/19-[台積電限定]102年台中榮民總醫院單身聯誼旅遊之遇見Mr.Right「幸福綠油油~夏日樂悠遊」</option>
                            <option value="2184">2013/5/19-*好評加開場*交通部第二梯-[幸福童話巧克力傳情物語]</option>
                            <option value="2152">2013/5/18-新竹林區第三梯次[歡樂派聯誼]</option>
                            <option value="2154">2013/5/18-雲林縣政府第二梯次[城市輕旅行]</option>
                            <option value="2167">2013/5/18-桃園縣政府102年「愛戀桃花園」未婚公教同仁第1梯次聯誼活動</option>
                            <option value="2140">2013/5/18-交通部第三梯次-[幸福一夏就想賴著你]
                            </option>
                            <option value="2170">2013/5/18-高雄市政府都市發展局暨高雄市立空中大學
                                102年「發現幸福時空」單身聯誼活動單身聯誼活動
                            </option>
                            <option value="2139">2013/5/11-交通部第二梯-[幸福童話巧克力傳情物語]</option>
                            <option value="2127">2013/5/11-新北市政府警察局未婚同仁聯誼活動</option>
                            <option value="2153">2013/5/11-雲林縣政府第一梯次[葵海傳情]</option>
                            <option value="2151">2013/5/5-新竹林區第二梯次[異國風聯誼]</option>
                            <option value="2149">2013/4/28-交通部第一梯[戀愛農場─鐵馬傳情]</option>
                            <option value="2150">2013/4/28-新竹林區第一梯次[保齡球換換愛]</option>
                            <option value="2146">2013/4/28-(桃園)愛戀三部曲之第一樂章～碩博士的約會戀曲(單身女郎限定)</option>
                            <option value="2141">2013/4/27-法務部調查局102年度南部地區未婚聯誼活動</option>
                            <option value="2156">2013/4/27-法務部調查局~熱情森『8』幸福愛很『大』</option>
                            <option value="2155">2013/4/27-[限女生報名]中龍鋼鐵企業公會聯誼活動</option>
                            <option value="2137">2013/4/21-(台北)精緻午茶微聯誼 女性朋友免費參加 </option>
                            <option value="2142">2013/4/20-愛上琉球，航向幸福之旅</option>
                            <option value="2134">2013/3/24-(桃園）餐會浪漫聯誼~共度浪漫午茶約會(男已滿)</option>
                            <option value="2128">2013/3/23-苗栗縣政府浪漫宜蘭2日遊</option>
                            <option value="2131">2013/3/20-(高雄)與情人有約~南瓜派對</option>
                            <option value="2132">2013/3/14-(台南)白色情人~熊寶貝童話情人餐會</option>
                            <option value="2135">2013/3/14-(新竹）【翻滾吧！愛情！】</option>
                            <option value="2129">2013/3/14-(台北)白色情人，精緻聯誼</option>
                            <option value="2133">2013/3/14-(台中）秘密旅行.遇見浪漫小確幸</option>
                            <option value="2126">2013/3/10-微浪漫 ~ 輕旅行 異國風情愛隨行 - 第二階段聯誼活動</option>
                            <option value="2124">2013/2/24-新年討個好幸福~新北三峽之旅</option>
                            <option value="2119">2013/2/2-瑪雅 - 只是愚昧傳言 , 懈逅 - 你我締結良緣 ~ Afternoon Tea Date Wi</option>
                            <option value="2108">2013/1/26-[熱烈報名中]大哥大姐~相約做公益~牽手傳播愛II</option>
                            <option value="2118">2013/1/26-屏東縣政府第一梯次--戀戀香草，幸福百分百</option>
                            <option value="2115">2013/1/13-~ AFTERNOON TEA WITH LOVE ~ ( 愛情漸漸發酵 )</option>
                            <option value="2113">2012/12/29-寂寞開始漫延 ~ 愛情唯一靈藥 (熟男熟女熱切招募中)</option>
                            <option value="2109">2012/12/23-愛情病毒蔓延台中城~瘋狂聖誕趴[南北地區有遊覽車接送]</option>
                            <option value="2107">2012/12/16-[已成團，可繼續報名]碩博士的午茶約會~</option>
                            <option value="2114">2012/12/8-北投分局vs台北榮總聯誼活動</option>
                            <option value="2106">2012/12/2-O’yes塔羅與烏克麗麗的約會</option>
                            <option value="2105">2012/12/1-相約做公益~牽手傳播愛</option>
                            <option value="2104">2012/11/25-(踴躍報名中)*~就愛你一生幸福北埔遊~*</option>
                            <option value="2103">2012/11/25-午後時光之愛情來找茶 ~ </option>
                            <option value="2084">2012/11/17-樹德科大第六梯次//大鵬灣國家風景區</option>
                            <option value="2101">2012/11/11-1111粉白派對~BYEBYE單身 牽手一生(11/8下午六點前報名參加即享個人費用600元優惠)</option>
                            <option value="2081">2012/11/3-樹德科大第五梯次//八大森林遊樂區</option>
                            <option value="1978">2012/11/3-高雄市政府第四梯次~幸福相隨</option>
                            <option value="2085">2012/11/1-樹德科大第七梯次//高雄淨園市民休閒農場</option>
                            <option value="2102">2012/10/28-萬聖節特別企劃~浪漫愛戀遊艇趴</option>
                            <option value="2090">2012/10/27-新北市警察局聯誼活動II-香格里拉休閒農場&白米木屐村</option>
                            <option value="2097">2012/10/27-101年度財政部臺北市國稅局「預約幸福‧戀戀中秋」浪漫下午茶 第二梯次</option>
                            <option value="2100">2012/10/27-101年度桃園長庚未婚聯誼活動「預約幸福‧北埔戀」</option>
                            <option value="2096">2012/10/20-101年度財政部臺北市國稅局「預約幸福‧戀戀中秋」浪漫下午茶 第一梯次</option>
                            <option value="2098">2012/10/20-國立中央大學未婚聯誼-「秋日戀曲~童話尋愛」</option>
                            <option value="2099">2012/10/14-相約石門－幸福101愛戀白沙灣婚紗廣場未婚聯誼活動</option>
                            <option value="2080">2012/10/13-樹德科大第四梯次//鹽田文化+七股潟湖生態</option>
                            <option value="2092">2012/9/30-中秋聯誼~師~情話意</option>
                            <option value="2093">2012/9/22-「2012幸福中秋愛意濃」未婚聯誼活動</option>
                            <option value="2079">2012/9/15-樹德科大第三梯次//新港香藝+板陶窯文化之旅</option>
                            <option value="2091">2012/9/15-新竹縣五峰鄉公所101年度未婚聯誼活動</option>
                            <option value="2062">2012/9/15-9/15高雄市立凱旋醫院未婚同仁聯誼活動</option>
                            <option value="2063">2012/9/9-屏東縣政府101年度第二梯次未婚公教同仁聯誼活動</option>
                            <option value="1977">2012/9/8-高雄市政府第三梯次~緣定今生</option>
                            <option value="2059">2012/8/19-七夕相逢～許我一個美麗愛情-優質單身聯誼派對</option>
                            <option value="2057">2012/8/18-移民署化妝舞會-愛上萬人迷</option>
                            <option value="2051">2012/8/18-中央印製廠101年度未婚同仁聯誼活動</option>
                            <option value="2078">2012/8/17-法務部行政執行署未婚聯誼活動</option>
                            <option value="2055">2012/8/17-20120817法務部行政執行署及各分署101年度未婚聯誼活動</option>
                            <option value="2046">2012/8/11-0811桃園縣政府衛生局暨地方稅務局101年度「戀戀午茶、遇見幸福」未婚聯誼活動第三梯次</option>
                            <option value="2053">2012/8/11-101年度教育部暨所屬機關學校[愛戀台灣,月老傳情]中山大學聯誼活動</option>
                            <option value="2054">2012/8/11-愛戀101～遇見幸福2部曲～新北市政府未婚聯誼第二梯次</option>
                            <option value="2076">2012/8/4-高雄市國稅局8/4~8/5兩天一夜「墾丁FUN假去」聯誼活動</option>
                            <option value="2052">2012/7/28-20120728壢新醫院 - 情繫鵲橋粉愛七夕</option>
                            <option value="2045">2012/7/28-0728桃園縣政府衛生局暨地方稅務局101年度「戀戀午茶、遇見幸福」未婚聯誼活動第二梯次</option>
                            <option value="2044">2012/7/21-0721桃園縣政府衛生局暨地方稅務局101年度「戀戀午茶、遇見幸福」未婚聯誼活動第一梯次</option>
                            <option value="2048">2012/7/21-0721第一梯次樹德科技大學青春飛揚 跨校聯誼-第一屆南部地區大專院校跨校聯誼</option>
                            <option value="2041">2012/7/21-101年度教育部暨所屬機關學校『愛戀台灣，月老傳情』第五梯次南區未婚同仁聯誼活動</option>
                            <option value="2075">2012/7/15-台北市醫師公會&台北市藥師公會未婚聯誼活動</option>
                            <option value="2034">2012/7/14-中央銀行未婚同仁聯誼活動「幸福101、繽紛愛戀趣」第3梯次</option>
                            <option value="2050">2012/7/14-高雄市政府警察局101年「浪漫星空 幸福啟航」未婚聯誼活動</option>
                            <option value="2047">2012/7/14-臺灣高雄地方法院檢察署101年度未婚同仁聯誼活動</option>
                            <option value="2074">2012/7/7-台中市政府聯誼活動</option>
                            <option value="2072">2012/7/7-2012/7/7桃園縣政府第四梯/白木屋旗艦店</option>
                            <option value="2021">2012/7/7-7/7龍潭鄉公所~第三梯次「幸福微笑、情定龍潭」</option>
                            <option value="2073">2012/6/30-高雄市都市發展局聯誼活動</option>
                            <option value="2071">2012/6/30-2012/6/30桃園縣政府第三梯/河岸森林公園</option>
                            <option value="2036">2012/6/30-101年度南部單身聯誼活動-愛戀台灣.從愛出發</option>
                            <option value="2031">2012/6/30-國立中央圖書館臺灣分館 愛在大板根溫泉渡假村未婚聯誼活動</option>
                            <option value="2018">2012/6/30-6/30成大醫院第二梯次~FUN鬆好心情~讓我們在”醫”起</option>
                            <option value="2038">2012/6/30-中龍鋼鐵企業工會vs 醫療業/銀行業/公家單位 「預約幸福~愛戀今夏」</option>
                            <option value="2039">2012/6/29-行政院環保署 愛戀101-幸福花海行101年度未婚同仁聯誼活動</option>
                            <option value="2033">2012/6/17-中央銀行未婚同仁聯誼活動「幸福101、繽紛愛戀趣」第2梯次</option>
                            <option value="2030">2012/6/16-屏東商業技術學院『愛戀台灣，月老傳情』南區未婚同仁聯誼活動</option>
                            <option value="2017">2012/6/16-6/16成大醫院第一梯次~FUN鬆好心情~讓我們在”醫”起</option>
                            <option value="2070">2012/6/16-2012/6/16桃園縣政府第二梯次/河岸森林公園</option>
                            <option value="2020">2012/6/16-6/16龍潭鄉公所~第二梯次「幸福微笑、情定龍潭」</option>
                            <option value="2005">2012/6/10-交通部觀光局等2機關辦理-香格里拉休閒農場</option>
                            <option value="1976">2012/6/9-高雄市政府第二梯次~情有獨鍾</option>
                            <option value="2000">2012/6/9-101年內政部、消防署暨所屬等機關-桃園地區-桃園老貝殼休閒農場</option>
                            <option value="2019">2012/6/9-6/9龍潭鄉公所~第一梯次「幸福微笑、情定龍潭」</option>
                            <option value="2040">2012/6/8-勞工保險局與臺北市政府消防局共同主辦「穿越時空～回到那些年」101年未婚同仁聯誼活動</option>
                            <option value="1982">2012/6/2-新竹林區管理處主辦-101年幸福來相戀-I Love Mr.H餐廳</option>
                            <option value="2016">2012/6/2-新北市政府警察局101年第1次未婚同仁聯誼活動</option>
                            <option value="2010">2012/6/2-6/2花開了休閒農場-初夏微幸福~愛戀三部曲等13個機關聯合辦理</option>
                            <option value="2032">2012/5/27-中央銀行未婚同仁聯誼活動「幸福101、繽紛愛戀趣」第1梯次</option>
                            <option value="1981">2012/5/26-新竹林區管理處主辦-101年幸福來相戀-桃園新屋青林農場</option>
                            <option value="2026">2012/5/26-5/26新竹縣政府~美麗人生</option>
                            <option value="2012">2012/5/26-5/26 雲林縣政府~相戀101~預約幸福-嘉義綠盈農場</option>
                            <option value="2009">2012/5/25-5/25凱薩飯店-初夏微幸福~愛戀三部曲等13個機關聯合辦理</option>
                            <option value="1994">2012/5/20-終結單身全台速配活動-520速速戀上您</option>
                            <option value="2011">2012/5/19-5/19 雲林縣政府~相戀101~預約幸福-雲林蜜蜂故事館</option>
                            <option value="1999">2012/5/19-101年內政部、消防署暨所屬等機關-三峽地區-大板根溫泉渡假村</option>
                            <option value="1980">2012/5/19-新竹林區管理處主辦-101年幸福來相戀-大溪花海農場</option>
                            <option value="2008">2012/5/18-5/18凱薩飯店-初夏微幸福~愛戀三部曲等13個機關聯合辦理</option>
                            <option value="2014">2012/5/12-護士節告別單身-白衣天使的戀愛通告</option>
                            <option value="2043">2012/5/6-交通部好評加開場~戀戀八里~單車之旅</option>
                            <option value="2004">2012/5/6-桃園國際機場等4機關辦理客家文化－戀戀單車之旅</option>
                            <option value="2003">2012/5/5-高速鐵路工程局等2機關-單車追風趣</option>
                            <option value="1998">2012/5/5-101年內政部、消防署暨所屬等機關-石門地區-石門莎蜜拉海岸咖啡</option>
                            <option value="2015">2012/5/5-愛戀101～遇見幸福2部曲～新北市政府未婚聯誼第一梯次</option>
                            <option value="2029">2012/4/27-經濟部花蓮台電2日遊</option>
                            <option value="1989">2012/4/22-交通部臺灣區國道高速公路局等3機關辦理-戀戀海灣~情定石門</option>
                            <option value="1987">2012/4/21-德律科技-幸福心旅程 宜蘭繽紛行</option>
                            <option value="2001">2012/4/15-浪漫101-愛戀午茶約會( 四月場)</option>
                            <option value="1997">2012/3/31-消防局第一大隊vs新北市政府社會局</option>
                            <option value="1974">2012/3/31-高雄市政府第一梯次~百年情緣</option>
                            <option value="1996">2012/3/24-台中場-「美式Buffet浪漫邂逅」幸福下午茶聯誼會(限女)</option>
                            <option value="1986">2012/3/11-高雄-用情相約~愛戀101單身派對</option>
                            <option value="1972">2012/2/25-台中場-「戀愛去吧」幸福下午茶聯誼會</option>
                            <option value="1970">2012/2/19-幸福101~愛戀櫻花季~三賞之旅</option>
                            <option value="1965">2012/2/18-101年就想找個伴~[香格里拉&白米木屐村]一日遊</option>
                            <option value="1968">2012/2/12-台北場-新年[心]朋友創意美墨料理-下午茶聯誼會</option>
                            <option value="1973">2012/2/11-南部聯誼來囉!賽德克戀人交響曲2日遊~2/11~12</option>
                            <option value="1971">2012/2/11-特別企劃-賽德克戀人交響晚宴</option>
                            <option value="2089">2012/1/26-樹德科大十梯次//高雄圓山飯店休閒中心</option>
                            <option value="2049">2012/1/26-(活動發燒中 歡迎報名 )樹德科技大學第十梯次青春飛揚 跨校聯誼-第一屆南部地區大專院校跨校聯誼</option>
                            <option value="1969">2012/1/15-那些年的秘密時光-下午茶</option>
                            <option value="2087">2012/1/12-樹德科大第九梯次//高雄圓山飯店休閒中心</option>
                            <option value="2116">2012/1/5-矽品科技</option>
                            <option value="1964">2011/12/31-餐會浪漫排約-終結孤單跨年饗宴</option>
                            <option value="1962">2011/12/25-聖誕情人特別企劃-愛戀糖霜情定巧克力屋DIY</option>
                            <option value="1961">2011/12/24-新竹聖誕美食聯誼</option>
                            <option value="1959">2011/12/18-嘉義長庚~「耶誕擁暖~當我們抱在一起」</option>
                            <option value="1960">2011/12/17-新北市政府未婚同仁聯誼活動-穿越時空愛上你/妳</option>
                            <option value="1952">2011/12/17-聯發科技聯誼旅遊-第三梯次[單車文化之旅]</option>
                            <option value="2086">2011/12/15-樹德科大第八梯次//澄清湖青年活動中心</option>
                            <option value="1950">2011/12/3-聯發科技聯誼旅遊-第一梯次[梧桐山城之旅]</option>
                            <option value="1951">2011/12/1-聯發科技聯誼旅遊-第二梯次[漆彈實境之旅]</option>
                            <option value="1958">2011/11/27-fun輕鬆~好好玩~戶外一日遊[香格里拉VS白米木屐村]單身旅遊</option>
                            <option value="1956">2011/11/26-兆豐國際商業銀行 第四梯次聯誼活動-[大溪花海]</option>
                            <option value="1881">2011/11/26-工研院-100年幸福物語愛情四部曲~冬季戀曲</option>
                            <option value="1955">2011/11/20-兆豐國際商業銀行 第三梯次聯誼活動-[大溪花海]</option>
                            <option value="1953">2011/11/20-老師看過來~ [楓情百分百] 聯誼活動</option>
                            <option value="1954">2011/11/19-兆豐國際商業銀行 第二梯次聯誼活動-[大溪花海]</option>
                            <option value="1948">2011/11/11-【百大企業.御守愛情】國際單身日</option>
                            <option value="1957">2011/11/5-兆豐國際商業銀行 第一梯次聯誼活動-[綠葉方舟、勝興火車站]</option>
                            <option value="1945">2011/10/29-行政院農業委員會新竹林區管理處「100年楓之戀幸福滋味」各機關同仁聯誼</option>
                            <option value="1947">2011/10/28-「高雄市政府100年度百年好合未婚聯誼－迎向幸福」</option>
                            <option value="2042">2011/10/1-台中市政府活動</option>
                            <option value="1934">2011/9/30-水產試驗所[~水樣一百浪漫遊~]聯誼活動</option>
                            <option value="1941">2011/9/25- 屏東縣政府未婚聯誼</option>
                            <option value="1942">2011/9/25-國立故宮博物院~情寄故宮~秋之交響曲</option>
                            <option value="1940">2011/9/24-行政院海巡署[艦艇情緣]未婚同仁聯誼活動-第三梯次</option>
                            <option value="1944">2011/9/24-嘉義市政府聯誼活動-秋詩篇篇幸福物語</option>
                            <option value="1943">2011/9/24-臺北市國稅局-「情定花海 真愛百年」</option>
                            <option value="1949">2011/9/18-桃園縣政府-[愛與祥和第三梯次]</option>
                            <option value="1938">2011/9/18-與名人有約～廖輝英老師之「愛情不就是看到與被看到」</option>
                            <option value="1913">2011/9/17-鼎新電腦-愛情幸運草浪漫趣～第二梯次</option>
                            <option value="1927">2011/9/17-行政院海巡署[艦艇情緣]未婚同仁聯誼活動-第二梯次</option>
                            <option value="1931">2011/9/10-2011仲夏愛之旅--未婚同仁聯誼活動--第三梯次</option>
                            <option value="1933">2011/9/4-高檢署～幸福一百「初秋的愛戀滋味」</option>
                            <option value="1937">2011/9/3-百年中秋</option>
                            <option value="1912">2011/9/3-鼎新電腦-愛情幸運草浪漫趣～第一梯次</option>
                            <option value="1935">2011/8/28-高工局~急速飆愛之仲夏戀曲</option>
                            <option value="1932">2011/8/28-石門區公所「戀戀白沙幸福之旅」</option>
                            <option value="1930">2011/8/27-2011仲夏愛之旅--未婚同仁聯誼活動--第二梯次</option>
                            <option value="1929">2011/8/20-2011仲夏愛之旅--未婚同仁聯誼活動--第一梯次</option>
                            <option value="1925">2011/8/20-行政院海巡署[艦艇情緣]未婚同仁聯誼活動-第一梯次</option>
                            <option value="1911">2011/8/20-虎尾科技大學-仲夏愛戀～幸福物語</option>
                            <option value="1909">2011/8/13-中央印製廠 印象一百～製造愛戀趣(已截止報名)</option>
                            <option value="1879">2011/8/13-工研院-100年幸福物語愛情四部曲~秋季戀曲</option>
                            <option value="1921">2011/8/13-台灣凸版VS.成大斗六分院：夏日情懷～愛戀百分百(限女生報名)</option>
                            <option value="1920">2011/8/6-強打！！百年七夕-圍城問情大會(僅開放女生報名)</option>
                            <option value="1916">2011/8/6-強打！！內政部移民署～月老情牽七夕情</option>
                            <option value="1904">2011/7/31-100年未婚同仁聯活動-國科會&公平會&通傳會-第三梯次</option>
                            <option value="1939">2011/7/30-[Happy Go~] 與名人有約～廖輝英老師之「愛情不就是看到與被看到」</option>
                            <option value="1899">2011/7/30-內政部消防署-沁夏愛情百分百【第二梯次】</option>
                            <option value="1922">2011/7/27-法務部矯正署桃園女子監獄～百分百幸福戀曲</option>
                            <option value="1903">2011/7/24-100年未婚同仁聯活動-國科會&公平會&通傳會-第二梯次</option>
                            <option value="1906">2011/7/23-中央氣象局-幸福最晴天之峨眉戀(已截止報名)</option>
                            <option value="1907">2011/7/23-中央銀行-100年幸福心旅程(已截止報名)</option>
                            <option value="1917">2011/7/20-調查局聯誼活動第一梯次-愛的啟航</option>
                            <option value="1918">2011/7/20-調查局聯誼活動第二梯次-戀戀綠盈</option>
                            <option value="1902">2011/7/17-100年未婚同仁聯活動-國科會&公平會&通傳會-第一梯次</option>
                            <option value="1891">2011/7/16-經建會-2011幸福百分百~浪漫花海季(截止報名)</option>
                            <option value="1905">2011/7/11-法務部行政執行署-初夏愛戀法中情(未開放報名中)</option>
                            <option value="1890">2011/7/9-經建會- 2011幸福百分百~天燈古道行(截止報名)</option>
                            <option value="1901">2011/7/3-100年百年好合未婚聯誼活動『擁抱幸福』-(未開放報名)</option>
                            <option value="1900">2011/7/2-2011土地銀行繽紛戀夏悠遊旅(未開放報名中)</option>
                            <option value="1908">2011/6/25-北投分局-水草愛戀百分百(未開放報名)</option>
                            <option value="1898">2011/6/25-內政部消防署-沁夏愛情百分百【第一梯次】</option>
                            <option value="1897">2011/6/24-環保署-百年好合邂逅花岩山林(截止報名)</option>
                            <option value="1910">2011/6/24-悠遊山林奮起湖幸福之旅</option>
                            <option value="1896">2011/6/11-財政部-百分百愛情山中傳奇(截止報名)</option>
                            <option value="1889">2011/6/11-經建會-2011幸福百分百~幸福好晴天(截止報名)</option>
                            <option value="1895">2011/6/10-環檢所-春天情人就是要香戀</option>
                            <option value="1878">2011/5/28-工研院-100年幸福物語愛情四部曲~夏季戀曲</option>
                            <option value="2002">2011/5/27-浪漫101-愛戀午茶約會(五月場)</option>
                            <option value="1888">2011/5/21-林口長庚&致茂電子-原味物語就是要香戀</option>
                            <option value="1893">2011/5/21-桃園縣政府-100年浪漫愛戀之大溪情緣(截止報名)</option>
                            <option value="1877">2011/5/15-『2011百年戀愛巴士幸福之旅』第八梯次之午茶物語</option>
                            <option value="1876">2011/5/14- 『2011百年戀愛巴士幸福之旅』第七梯次之午茶物語</option>
                            <option value="1885">2011/5/12-夏日情懷花海交響樂-原能會&勞保局</option>
                            <option value="1875">2011/5/7-『2011百年戀愛巴士幸福之旅』第六梯次之藝術物語</option>
                            <option value="1874">2011/4/30-『2011百年戀愛巴士幸福之旅』第五梯次之原味物語</option>
                            <option value="1892">2011/4/28-元智大學-愛情百分百邂逅之旅(人數不足，取消)</option>
                            <option value="1872">2011/4/24-『2011百年戀愛巴士幸福之旅』第四梯次之愛情物語</option>
                            <option value="1871">2011/4/23-『2011百年戀愛巴士幸福之旅』第三梯次之客家物語</option>
                            <option value="1995">2011/4/21-認識”心”朋友~來去溪湖一日遊</option>
                            <option value="1870">2011/4/17- 『2011百年戀愛巴士幸福之旅』第二梯次之陶藝物語</option>
                            <option value="1869">2011/4/16-『2011百年戀愛巴士幸福之旅』第一梯次之陶藝物語</option>
                            <option value="1884">2011/4/16-高雄市政府-100年百年好合「遇見幸福」-二日遊</option>
                            <option value="2007">2011/4/14-屏東縣政府-幸福海灣 星光愛戀</option>
                            <option value="1983">2011/4/7-高雄-愛戀101~幸福在福灣</option>
                            <option value="2035">2011/4/7-台北榮民總醫院VS合作金庫工會~宜蘭香格里拉休閒農場~白米木屐村一日遊</option>
                            <option value="1988">2011/3/17-新竹-十二寮休閒農場</option>
                            <option value="1865">2011/3/12-愛你一生一世~百年定情派對<高雄>
                            </option>
                            <option value="1866">2011/3/12-愛你一生一世~百年定情派對<台中>
                            </option>
                            <option value="1863">2011/3/12-百年單身物語定情HAPPY GO</option>
                            <option value="1966">2011/2/28-愛情釀的酒時尚品酒</option>
                            <option value="1967">2011/2/26-異國愛情邂逅之旅</option>
                            <option value="1867">2011/2/19-幸福愛情部落祭-工研院(活動人數已額滿)</option>
                            <option value="1883">2011/2/18-緯創資通-幸福部曲八里濱海行</option>
                            <option value="1868">2011/2/12-原味覺醒~懷抱濱海冬戀行 中美矽晶限女</option>
                            <option value="1864">2011/2/1-姐妹淘熱鬧出遊-台南市立醫院</option>
                            <option value="2025">2011/1/1-23傳錯的名單</option>
                            <option value="1862">2010/12/26-心動聯測巴斯達隘愛情之旅-聯測科技 第二梯次</option>
                            <option value="1860">2010/12/25-突然想愛你～浪漫皇家圓舞曲-新竹署立醫院&工研院</option>
                            <option value="1861">2010/12/23-聖誕金艷銀色戀曲-嘉義長庚醫院</option>
                            <option value="1856">2010/12/18-2010友達以上戀人狂想曲-友達光電</option>
                            <option value="1859">2010/12/11-心動聯測巴斯達隘愛情之旅-聯測科技 第一梯次</option>
                            <option value="1857">2010/11/27-相約康是美冬戀零距離</option>
                            <option value="1853">2010/11/21-瘋愛左岸就想賴著你-內政部消防署</option>
                            <option value="1843">2010/11/13-2010秋楓問情系列~第五梯次</option>
                            <option value="1842">2010/11/6-2010秋楓問情系列~第四梯次</option>
                            <option value="1855">2010/10/31-Single Halloween LOVE PARTY~~~單身萬聖節戀愛派對~~~</option>
                            <option value="1841">2010/10/30-2010秋楓問情系列~第三梯次</option>
                            <option value="1840">2010/10/23-2010秋楓問情系列~第二梯次</option>
                            <option value="1848">2010/10/16-2010月老降臨愛情幸福遊-第三梯次</option>
                            <option value="1839">2010/10/16-2010秋楓問情系列~第一梯次</option>
                            <option value="1854">2010/10/10-緣份悄悄拉近你我 香氛時尚HAPPY GO</option>
                            <option value="1852">2010/10/9-情挑古城鹿港愛戀手札-工研院</option>
                            <option value="1847">2010/10/2-2010月老降臨愛情幸福遊-第二梯次</option>
                            <option value="1849">2010/9/26-戀上巴斯達隘~遇見愛情矮靈祭四零四科技</option>
                            <option value="1845">2010/9/25-2010月老降臨愛情幸福遊-第一梯次</option>
                            <option value="1850">2010/9/17-2010古堡愛之旅-內政部兒童局</option>
                            <option value="1837">2010/9/4-夏日戀曲尋愛之旅</option>
                            <option value="1826">2010/8/29-一抹茶香~愛戀坪林之旅-亞東醫院</option>
                            <option value="1838">2010/8/28-2010茶香飄飄北縣情</option>
                            <option value="1817">2010/8/28-愛情精靈嬉遊記-AGC 集團旭硝子顯示玻璃(股)</option>
                            <option value="1834">2010/8/20-浪漫愛之旅呼叫大情聖99/8/20-台積電</option>
                            <option value="1844">2010/8/15-尋尋蜜蜜~"緣"來在這裡 七夕浪漫晚宴</option>
                            <option value="1833">2010/8/15-浪漫愛之旅呼叫大情聖99/8/15-台積電</option>
                            <option value="1824">2010/8/14-月老牽紅線七夕傳情意</option>
                            <option value="1832">2010/8/14-體驗農牧生活~就想賴著你99/8/14-台積電</option>
                            <option value="1830">2010/8/7- 一抹情緣~相遇愛情騎蹟99/8/7-台積電</option>
                            <option value="1829">2010/8/6-浪漫愛之旅呼叫大情聖99/8/6-台積電</option>
                            <option value="1835">2010/7/31-FE21' FALL IN LOVE緣定七夕情人夢-7/31</option>
                            <option value="1836">2010/7/31-FE21' FALL IN LOVE緣定七夕情人夢</option>
                            <option value="1828">2010/7/31-體驗農牧生活~就想賴著你99/7/31-台積電</option>
                            <option value="1827">2010/7/30-最“印”阿里巴巴之夜99/7/30-台積電</option>
                            <option value="1825">2010/7/25-八大精靈讓你HIGH翻天</option>
                            <option value="1819">2010/7/24-稻米農村文化~無米樂翻天99/7/24-台積電</option>
                            <option value="1822">2010/7/16-浪漫愛之旅呼叫大情聖99/7/16-台積電</option>
                            <option value="1820">2010/7/10- 一抹情緣~相遇愛情騎蹟99/7/10-台積電</option>
                            <option value="1814">2010/7/10-尋覓幸福 真愛花語之旅-中部科學園區</option>
                            <option value="1818">2010/7/3-體驗農牧生活~就想賴著你99/7/3-台積電</option>
                            <option value="1821">2010/7/2-最“印”阿里巴巴之夜99/7/2-台積電</option>
                            <option value="1831">2010/7/1-最“印”阿里巴巴之夜99/8/8-台積電</option>
                            <option value="1816">2010/6/20-一路談情愛到爆-內湖科學園區</option>
                            <option value="1823">2010/6/19-前鎮國中-教師ㄧ日遊</option>
                            <option value="1809">2010/5/29-尋覓幸福浪漫夏之戀-中鼎集團優質工程師</option>
                            <option value="1807">2010/5/16-情遊鹿港古城懷舊之旅-慈濟大林醫院</option>
                            <option value="1765">2010/5/15-2010友達以上戀人狂想曲(第二梯次)</option>
                            <option value="1806">2010/5/1-媒人情牽姻緣線-林口長庚醫院vs中華映管股份有限公司</option>
                            <option value="1812">2010/5/1-51勞動節~新好男女浪漫聯誼茶會-楠梓加工區</option>
                            <option value="1811">2010/5/1-51勞動節---5(我)1(要)i(愛)--快來電茶會派對</option>
                            <option value="1808">2010/4/24- 醉愛藍色牛仔風情宴-力成科技</option>
                            <option value="1810">2010/4/1-51勞動節~~套牢你的心我要愛</option>
                            <option value="1789">2010/3/27-愛情法老埃及情懷-彰化基督教醫院</option>
                            <option value="1790">2010/3/27-2010繽紛愛戀旅遊節-北投分局</option>
                            <option value="1764">2010/3/20-2010友達以上戀人狂想曲(第一梯次)</option>
                            <option value="1768">2010/3/14-白色情人節邂逅完美情人@桃園</option>
                            <option value="1786">2010/3/14-白色情人節~飛舞白色戀人的花海派對-台南</option>
                            <option value="1787">2010/3/14-白色情人節~飛舞白色戀人的花海派對-新竹</option>
                            <option value="1785">2010/3/14-飛舞白色戀人的花海派對-台北鄉村俱樂部下午茶</option>
                            <option value="1788">2010/3/13-白色情人節~~搖擺普普風單身派對-台中</option>
                            <option value="1760">2010/2/7-找尋真愛告別單身</option>
                            <option value="1778">2010/1/29- 享受愛情 快速聯誼 Speeding dating -Date3-</option>
                            <option value="1780">2010/1/28-迷戀五顆星-百萬俱樂部</option>
                            <option value="1783">2010/1/25- 戀愛揪茶隊-小型聯誼團PART 7</option>
                            <option value="1784">2010/1/23-0123-5分鐘快速約會@桃園</option>
                            <option value="1756">2010/1/23-踏雪尋"苺"巴斯達隘祕境之旅-高雄出發</option>
                            <option value="1779">2010/1/21-迷戀五顆星-百萬俱樂部</option>
                            <option value="1777">2010/1/20-享受愛情 快速聯誼 Speeding dating -Date2-</option>
                            <option value="1782">2010/1/20-戀愛揪茶隊-小型聯誼團PART 6</option>
                            <option value="1775">2010/1/14-迷戀五顆星-百萬俱樂部</option>
                            <option value="1776">2010/1/13-享受愛情 快速聯誼 Speeding dating -Date1-</option>
                            <option value="1781">2010/1/13- 戀愛揪茶隊-小型聯誼團PART 5</option>
                            <option value="1759">2010/1/9-0109-5分鐘快速約會@桃園</option>
                            <option value="1767">2010/1/3-單身美食探索之旅~第一站:新竹城隍廟口</option>
                            <option value="1758">2010/1/2-0102-5分鐘快速約會@桃園</option>
                            <option value="1763">2009/12/30-幸福小週末</option>
                            <option value="1766">2009/12/30-速食愛情~快速約會小型聯誼</option>
                            <option value="1748">2009/12/27-單身愛情深入無米樂-光田醫院VS中龍鋼鐵</option>
                            <option value="1757">2009/12/26-1226-5分鐘快速約會@桃園</option>
                            <option value="1753">2009/12/23-紅白戀人聖誕精靈夜-嘉義長庚醫院搭配優質工程師</option>
                            <option value="1752">2009/12/20-戀愛揪茶隊-小型聯誼團PART 4</option>
                            <option value="1744">2009/12/20-<台中出發>瘋聖誕一日遊-嘎嘎歐岸愛情祭</option>
                            <option value="1701">2009/12/20-嘎嘎歐岸聖誕愛情之旅(新竹出發)</option>
                            <option value="1737">2009/12/19-皇家圓舞曲水漾聖誕夜-台北</option>
                            <option value="1742">2009/12/19-皇家圓舞曲水漾聖誕夜-桃園</option>
                            <option value="1738">2009/12/19-皇家圓舞曲水漾聖誕夜-台南</option>
                            <option value="1751">2009/12/13-愛情揪茶隊~小型聯誼PART 3</option>
                            <option value="1743">2009/12/12-茶道美學~東方古典美人的誘人美感</option>
                            <option value="1749">2009/12/9-PMM【樂興之時】管絃樂團-落單的小精靈音樂會</option>
                            <option value="1727">2009/12/6-單身旅遊愛情練習曲-中龍鋼鐵VS光田醫院</option>
                            <option value="1734">2009/12/5-遇見愛情緣來媒人在這裡</option>
                            <option value="1695">2009/11/28-戀愛揪茶隊-小型聯誼趴Two</option>
                            <option value="1726">2009/11/28-單身旅遊愛情練習曲之旅-奇美集團</option>
                            <option value="1736">2009/11/24-幸福小週末</option>
                            <option value="1733">2009/11/22-1122台中場-當我們銬在一起~囚愛行動派對</option>
                            <option value="1696">2009/11/22-1122春天情人單身聯誼派對</option>
                            <option value="1702">2009/11/22-1122全國單身日-鑰匙與鎖的單身派對</option>
                            <option value="1735">2009/11/22-台南1122全國單身日-鑰匙與鎖的午茶派對</option>
                            <option value="1728">2009/11/22-桃園-1122全國單身日~鎖與鑰匙的面具派對</option>
                            <option value="1694">2009/11/21-戀愛揪茶隊-小型聯誼趴One</option>
                            <option value="1704">2009/11/21-單身新竹造柿之旅</option>
                            <option value="1698">2009/11/18-情約香榭夏慕尼</option>
                            <option value="1697">2009/11/15-愛的巴士~菁寮嫁妝文化節體驗之旅</option>
                            <option value="1724">2009/11/15-菁寮嫁妝文化節體驗之旅-台中出發站　</option>
                            <option value="1651">2009/11/11-Mask 1111 single party~世界單身日夢幻面具派對　</option>
                            <option value="1725">2009/11/8-情繫綠盈浪漫:慈濟潭子院區vs高鋒工業</option>
                            <option value="1654">2009/10/31-1031萬聖節萬鬼會!!!萬聖節變裝PARTY</option>
                            <option value="1746">2009/10/31-1031萬聖節萬鬼會!!!萬聖節變裝PARTY</option>
                            <option value="1708">2009/10/25-忘年之愛，更令人期待</option>
                            <option value="1755">2009/8/15-2009牛轉愛情奇蹟系列-舞動浪漫下午茶(第四梯次)</option>
                            <option value="1705">2009/7/18-2009牛轉愛情奇蹟第三梯次~舞動愛情下午茶-台北市政府</option>
                            <option value="1706">2009/6/20-2009牛轉愛情奇蹟第二梯次~相遇愛情騎蹟-台北市政府</option>
                            <option value="1754">2009/6/20-2009超級媒人在北縣-第二梯次</option>
                            <option value="1717">2009/6/13-智邦科技~戀愛巴士日月潭二日遊</option>
                            <option value="1715">2009/5/17-2009牛轉愛情奇蹟第一梯次~媒人就在你身邊-台北市政府</option>
                            <option value="1714">2009/5/2-2009超級媒人在北縣-第一梯次-台北縣政府人事處</option>
                            <option value="1713">2008/3/9-晶圓光電-鵲橋您搭好了沒?!七夕下午茶會~</option>
                            <option value="1716">2007/11/11-1111春天情人單身派對</option>
                            <option value="1718">2007/8/27-台中科學園區~七夕特別企劃，情定大甲</option>
                            <option value="1710">2007/8/25-大甲匠師故鄉情定春天-中部科學園區委辦活動</option>
                            <option value="1707">2005/12/25-日月潭聖誕營火晚會</option>
                            <option value="1774">2005/11/22-2005舞動愛情魅力行</option>
                            <option value="1711">2004/12/22-頑皮世界放電行</option>
                            <option value="1792">2004/9/10-93年中央機關未婚聯誼</option>
                            <option value="1712">2004/9/9-情挑東海岸．海洋樂翻天</option>
                            <option value="1770">2003/11/22-好好玩旅展2</option>
                            <option value="1769">2003/11/22-好好玩旅展1</option>
                            <option value="1793">2003/10/30-1030中和市公所聯誼</option>
                            <option value="1797">2003/2/14-2003愛在飛揚</option>
                            <option value="1798">2002/5/4-台電聯誼活動</option>
                        </select>

                        　<input type="submit" name="Submit" style="height:28px;margin-top:-7px;" value="查詢"> <input type="reset" name="reset" style="height:28px;margin-top:-7px;" value="清空">
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>

                        <tr>
                            <td>總統計人數：39575</td>
                        </tr>
                        <tr>
                            <td>
                                <b>性別</b> - 男：21083, 女：14843
                                <div id="pieshow1" style="height:300px;"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>

                                <b>年齡</b> - 20 歲以下：0, 21 - 30 歲：257, 31 - 40 歲：10995, 41 - 50 歲：14779, 50 歲以上：3753
                                <div id="pieshow2" style="height:800px;"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>居住地</b> -
                                基隆市：741,台北市：6392,新北市：5763,宜蘭縣：340,桃園市：3313,新竹縣：1037,新竹市：1250,苗栗縣：380,苗栗市：75,台中縣：48,台中市：1928,彰化縣：548,彰化市：186,南投縣：233,嘉義縣：427,嘉義市：335,雲林縣：935,台南縣：45,台南市：1610,高雄市：2008,屏東縣：382,花蓮縣：118,台東縣：138,澎湖縣：0,金門縣：0,馬祖：0,綠島：0,蘭嶼：0,其他：11343
                                <div id="pieshow3" style="height:800px;"></div>
                            </td>
                        </tr>
                        <script language="JavaScript">
                            var dataSet3 = [{
                                label: "基隆市",
                                data: 741,
                                color: "#ff0099"
                            }, {
                                label: "台北市",
                                data: 6392,
                                color: "#3300ff"
                            }, {
                                label: "新北市",
                                data: 5763,
                                color: "#00ffcc"
                            }, {
                                label: "宜蘭縣",
                                data: 340,
                                color: "#99ff00"
                            }, {
                                label: "桃園市",
                                data: 3313,
                                color: "#ff9900"
                            }, {
                                label: "新竹縣",
                                data: 1037,
                                color: "#ff3300"
                            }, {
                                label: "新竹市",
                                data: 1250,
                                color: "#ff0000"
                            }, {
                                label: "苗栗縣",
                                data: 380,
                                color: "#cc3366"
                            }, {
                                label: "苗栗市",
                                data: 75,
                                color: "#9966ff"
                            }, {
                                label: "台中縣",
                                data: 48,
                                color: "#666699"
                            }, {
                                label: "台中市",
                                data: 1928,
                                color: "#000066"
                            }, {
                                label: "彰化縣",
                                data: 548,
                                color: "#0066cc"
                            }, {
                                label: "彰化市",
                                data: 186,
                                color: "#006600"
                            }, {
                                label: "南投縣",
                                data: 233,
                                color: "#333333"
                            }, {
                                label: "嘉義縣",
                                data: 427,
                                color: "#ffff66"
                            }, {
                                label: "嘉義市",
                                data: 335,
                                color: "#ffcc99"
                            }, {
                                label: "雲林縣",
                                data: 935,
                                color: "#cc66cc"
                            }, {
                                label: "台南縣",
                                data: 45,
                                color: "#ff0099"
                            }, {
                                label: "台南市",
                                data: 1610,
                                color: "#3300ff"
                            }, {
                                label: "高雄市",
                                data: 2008,
                                color: "#00ffcc"
                            }, {
                                label: "屏東縣",
                                data: 382,
                                color: "#99ff00"
                            }, {
                                label: "花蓮縣",
                                data: 118,
                                color: "#ff9900"
                            }, {
                                label: "台東縣",
                                data: 138,
                                color: "#ff3300"
                            }, {
                                label: "澎湖縣",
                                data: 0,
                                color: "#cc3366"
                            }, {
                                label: "金門縣",
                                data: 0,
                                color: "#9966ff"
                            }, {
                                label: "馬祖",
                                data: 0,
                                color: "#666699"
                            }, {
                                label: "綠島",
                                data: 0,
                                color: "#000066"
                            }, {
                                label: "蘭嶼",
                                data: 0,
                                color: "#000066"
                            }];
                        </script>
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
    var dataSet = [{
            label: "男",
            data: 21083,
            color: "#0000ff"
        },
        {
            label: "女",
            data: 14843,
            color: "#ff00cc"
        }
    ];
    var dataSet2 = [{
            label: "20 歲以下",
            data: 0,
            color: "#ff66cc"
        },
        {
            label: "21 - 30 歲",
            data: 257,
            color: "#cc00ff"
        },
        {
            label: "31 - 40 歲",
            data: 10995,
            color: "#3333ff"
        },
        {
            label: "41 - 50 歲",
            data: 14779,
            color: "#0099ff"
        },
        {
            label: "50 歲以上",
            data: 3753,
            color: "#999999"
        }
    ];
    var options = {
        series: {
            pie: {
                show: true,
                label: {
                    show: true
                }
            }
        }
    };


    loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function() {
        loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function() {
            loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function() {
                loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function() {
                    loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js", function() {
                        loadScript(plugin_path + "chart.flot/jquery.flot.pie.min.js", function() {
                            loadScript(plugin_path + "chart.flot/jquery.flot.tooltip.min.js", function() {

                                $.plot($("#pieshow1"), dataSet, options);
                                $.plot($("#pieshow2"), dataSet2, options);
                                $.plot($("#pieshow3"), dataSet3, options);
                                //$.plot($("#pieshow3"), dataSet, options);
                                //$.plot($("#pieshow4"), dataSet, options);
                            });
                        });
                    });
                });
            });
        });
    });
</script>