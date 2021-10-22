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
            <li>春天網站系統</li>
            <li class="active">天公疼好人</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>天公疼好人</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form name="form1" method="post" action="?t=2&st=search" onsubmit="return chk_form()" style="border:0;margin:0;padding:0">
                    <select name="marrys" id="marrys" style="width:80px;">
                        <option value="">請選擇</option>
                        <option value="單身,無交往對象">單身,無交往對象</option>
                        <option value="單身,有交往對象">單身,有交往對象</option>
                        <option value="已婚">已婚</option>
                    </select>
                    <input type="text" name="time1" id="time1" class="datepicker" autocomplete="off" style="width:80px;" placeholder="開始時間" value=""> - <input type="text" name="time2" id="time2" class="datepicker" autocomplete="off" style="width:80px;" placeholder="結束時間" value="">
                    <input type="submit" class="btn" value="查詢" style="margin-top:-10px;">
                </form>
                </p>
                <table class="table table-bordered bootstrap-datatable">

                    <tr>
                        <th width=20><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                        <th width=20></th>
                        <th colspan=8><a href="javascript:mutil_send();" class="btn">多選轉換</a>　<a href="javascript:mutil_del();" class="btn">多選刪除</a></th>
                    </tr>
                    <tr id="showtr_24" style="background:#ffffff">
                        <td rowspan=2><input data-no-uniform="true" type="checkbox" name="nums" value="24"></td>
                        <td>1</td>
                        <td width=30>轉換成功</td>
                        <td colspan=2><a href="http://www.springclub.com.tw/20150415v.php?an=24" target="_blank">http://www.springclub.com.tw/20150415v.php?an=24</a></td>
                        <td width=80>林桂四[springclub_officialwebsite_homepage_God]</td>
                        <td width=80>四哥</td>
                        <td>0906677277</td>
                        <td width="30" rowspan=2><a href="javascript:;" onClick="Mars_popup2('?st=del&a=24','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr style="background:#ffffff">
                        <td width=60 colspan=2>a0906677277@gmail.ccom</td>
                        <td width=60>單身,無交往對象</td>
                        <td width=60>票數：2　<a href="#edit_votes_24" class="fancybox">修改</a></td>
                        <td width=60>台北市</td>
                        <td><a href="#notes_24" class="fancybox">留言內容</a>　<a href="#address_24" class="fancybox">查看地址</a></td>
                        <td width=160>2015/5/24 下午 06:41:00</td>
                    </tr>
                    <div id="notes_24" class="hide">做志工服&amp;#21153;<br></div>
                    <div id="address_24" class="hide">台北市　台北市大安&#21306;敦化南路一段</div>
                    <div id="edit_votes_24" class="hide">
                        <form action="?st=editvotes&an=24" method="POST" onsubmit="return chk_form2('24')">票數：<input type="text" name="votes" id="votes_24" value="2"><br><input type="submit" value="修改"></form>
                    </div>
                    <tr id="showtr_23" style="background:#f9f9f9">
                        <td rowspan=2><input data-no-uniform="true" type="checkbox" name="nums" value="23"></td>
                        <td>2</td>
                        <td width=30>轉換成功</td>
                        <td colspan=2><a href="http://www.springclub.com.tw/20150415v.php?an=23" target="_blank">http://www.springclub.com.tw/20150415v.php?an=23</a></td>
                        <td width=80>陳志昇</td>
                        <td width=80>阿昇</td>
                        <td>0985662893</td>
                        <td width="30" rowspan=2><a href="javascript:;" onClick="Mars_popup2('?st=del&a=23','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr style="background:#f9f9f9">
                        <td width=60 colspan=2>thomasayah@yahoo.com.tw</td>
                        <td width=60>單身,無交往對象</td>
                        <td width=60>票數：7　<a href="#edit_votes_23" class="fancybox">修改</a></td>
                        <td width=60>台中市</td>
                        <td><a href="#notes_23" class="fancybox">留言內容</a>　<a href="#address_23" class="fancybox">查看地址</a></td>
                        <td width=160>2015/4/29 下午 09:33:00</td>
                    </tr>
                    <div id="notes_23" class="hide">在一次偶然的上學途中，遇見了妳，大家都還很陌生的情況下，慢慢的認識了彼此，然而放學後，都會相約一起放學，那是一種奇妙的感覺，從陌生演變到認識，本來簡單的打招呼，轉變成什麼話都可以聊，然後晚上相約去逛逛夜市，然後交往，雖然不是真的交往，而是曖昧，我們保持著朋友跟戀人之間的距離，也就是有達以上戀人未滿，持續了快2年多，直到畢業後，才發現原來妳有男朋友了，然後就慢慢的恢復陌生人的樣子，彼此再也沒有話聊，畢業後，我就開始找工作，等當兵，當兵時間也是沒有你的消息，退伍後終究還是沒有妳的消息，直到4年後，居然聽到妳消息，在台北過的還不錯，很替妳開心，我偶爾還是會去回想讀書時段的甜美回憶，心中還是很感謝妳，在讀書這段期間，給我的感情還有陪伴，現在只能埋藏在心中，不讓任何人知道，開始朝著美好未來前進。</div>
                    <div id="address_23" class="hide">台中市　霧峰區吉峰路123之2號</div>
                    <div id="edit_votes_23" class="hide">
                        <form action="?st=editvotes&an=23" method="POST" onsubmit="return chk_form2('23')">票數：<input type="text" name="votes" id="votes_23" value="7"><br><input type="submit" value="修改"></form>
                    </div>
                    <tr id="showtr_22" style="background:#ffffff">
                        <td rowspan=2><input data-no-uniform="true" type="checkbox" name="nums" value="22"></td>
                        <td>3</td>
                        <td width=30>轉換成功</td>
                        <td colspan=2><a href="http://www.springclub.com.tw/20150415v.php?an=22" target="_blank">http://www.springclub.com.tw/20150415v.php?an=22</a></td>
                        <td width=80>何</td>
                        <td width=80>ㄚ蒼</td>
                        <td>0918217911</td>
                        <td width="30" rowspan=2><a href="javascript:;" onClick="Mars_popup2('?st=del&a=22','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr style="background:#ffffff">
                        <td width=60 colspan=2>a0021320@hotmail.com</td>
                        <td width=60>單身,無交往對象</td>
                        <td width=60>票數：45　<a href="#edit_votes_22" class="fancybox">修改</a></td>
                        <td width=60>台中市</td>
                        <td><a href="#notes_22" class="fancybox">留言內容</a>　<a href="#address_22" class="fancybox">查看地址</a></td>
                        <td width=160>2015/4/29 下午 07:53:00</td>
                    </tr>
                    <div id="notes_22" class="hide">雖然剛開始談不上喜歡 更不用說有愛情 但彼此都有相同的想法 同樣的默契 維持這朋友的關係與感覺 即使不需跨越這界線 還是能擁有許多美好。<br>那天....<br>妳說..妳需要離開一陣子<br>我知道妳有不得已的苦衷 我也無力挽留妳 即使傷心也需顧作鎮定 就算難過 也要強顏歡笑 為彼此互相勉力祝福著<br>身在遠方的妳 也要過的幸福快樂。</div>
                    <div id="address_22" class="hide">台中市　大里區塗城路735巷5弄20號</div>
                    <div id="edit_votes_22" class="hide">
                        <form action="?st=editvotes&an=22" method="POST" onsubmit="return chk_form2('22')">票數：<input type="text" name="votes" id="votes_22" value="45"><br><input type="submit" value="修改"></form>
                    </div>
                    <tr id="showtr_20" style="background:#f9f9f9">
                        <td rowspan=2><input data-no-uniform="true" type="checkbox" name="nums" value="20"></td>
                        <td>4</td>
                        <td width=30>轉換成功</td>
                        <td colspan=2><a href="http://www.springclub.com.tw/20150415v.php?an=20" target="_blank">http://www.springclub.com.tw/20150415v.php?an=20</a></td>
                        <td width=80>黃明進[springclub_officialwebsite_homepage_God]</td>
                        <td width=80>羽小境</td>
                        <td>0927625685</td>
                        <td width="30" rowspan=2><a href="javascript:;" onClick="Mars_popup2('?st=del&a=20','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr style="background:#f9f9f9">
                        <td width=60 colspan=2>antony0116@hotmail.com</td>
                        <td width=60>單身,有交往對象</td>
                        <td width=60>票數：149　<a href="#edit_votes_20" class="fancybox">修改</a></td>
                        <td width=60>台南市</td>
                        <td><a href="#notes_20" class="fancybox">留言內容</a>　<a href="#address_20" class="fancybox">查看地址</a></td>
                        <td width=160>2015/4/22 下午 03:00:00</td>
                    </tr>
                    <div id="notes_20" class="hide">在一次偶然的機會下，結識了一位和我一樣喜歡為美食嚐鮮而四處趴趴走的林小姐…<br>最初，彼此會為了品嚐美食，以及如何尋找新旅遊景點，而隨時隨地用通訊軟體討論，即使在我下班後，累翻正想好好休憩時，也是隨call隨到(因為彼此住處相隔不遠)。<br>當然~除了美食旅遊景點話題外，有時還會聊到因婚姻大事，家裡面給壓力，而毫不保留地向彼此訴苦解悶，況且，林小姐也曾經說過，和其他想追求愛慕她的男生比較起來，跟我相處聊聊天反而更能讓她忘記憂愁和壓力!<br>也就因為如此，我對林小姐的感覺由相知相惜，到慢慢昇華為愛慕之情，所以，當時只要她說她想要什麼事物以及極難入手的限量展覽門票時，我必二話不說~使命必達，以滿足她所有需求!!<br>我和林小姐就這樣維持這曖昧關係持續一年多，直到我身旁一摯友點醒了我，讓我下定決心在美妙地聖誕節夜晚，跟她告白~表明內心心意，結果是~當晚在燈光美氣氛佳的聖誕大餐前，我被拒絕發好人卡了！她說我人很好且也很照顧幫忙她不少事務，讓她由衷地感謝老天爺讓我們相識，但她配不上我這好朋友!之後，她便人間蒸發從我身旁消失的無影無蹤!<br></div>
                    <div id="address_20" class="hide">台南市　成功路515號8樓</div>
                    <div id="edit_votes_20" class="hide">
                        <form action="?st=editvotes&an=20" method="POST" onsubmit="return chk_form2('20')">票數：<input type="text" name="votes" id="votes_20" value="149"><br><input type="submit" value="修改"></form>
                    </div>
                    <tr id="showtr_19" style="background:#ffffff">
                        <td rowspan=2><input data-no-uniform="true" type="checkbox" name="nums" value="19"></td>
                        <td>5</td>
                        <td width=30 style="color:blue">未轉換</td>
                        <td colspan=2><a href="http://www.springclub.com.tw/20150415v.php?an=19" target="_blank">http://www.springclub.com.tw/20150415v.php?an=19</a></td>
                        <td width=80>曾雪莉[springclub_officialwebsite_homepage_God]</td>
                        <td width=80>小不點</td>
                        <td>0988521476</td>
                        <td width="30" rowspan=2><a href="javascript:;" onClick="Mars_popup2('?st=del&a=19','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr style="background:#ffffff">
                        <td width=60 colspan=2>sheery03130513@gmail.com</td>
                        <td width=60>單身,無交往對象</td>
                        <td width=60>票數：12　<a href="#edit_votes_19" class="fancybox">修改</a></td>
                        <td width=60>新北市</td>
                        <td><a href="#notes_19" class="fancybox">留言內容</a>　<a href="#address_19" class="fancybox">查看地址</a></td>
                        <td width=160>2015/4/22 上午 11:32:00</td>
                    </tr>
                    <div id="notes_19" class="hide">你是個很棒的女孩,但…我們真的不適合,我們還是比較適合當朋友~~~這是什麼爛梗! 〒_〒<br>那麼幹嘛要許諾讓我記一輩子,幹嘛要動不動就對我好,幹嘛要動不動....幹嘛要讓我不知不覺愛上你,然後才告訴我,我們還是比較適合當朋友。<br>曾經愛得濃烈，也愛得心碎滿地。但後來想開了，也許這是從女孩到女人，必走過顛簸的愛情路。現在得我還是相信愛，還是享受愛的瘋狂，只是再一次又一次的心碎之後，早學會了要把自己撿回來好好疼愛，他不要了，我還要呢!<br>再見壞男人，「謝謝你不愛我，我才知道自己值得更好的人。」<br><br><br><br><br><br></div>
                    <div id="address_19" class="hide">新北市　中和區</div>
                    <div id="edit_votes_19" class="hide">
                        <form action="?st=editvotes&an=19" method="POST" onsubmit="return chk_form2('19')">票數：<input type="text" name="votes" id="votes_19" value="12"><br><input type="submit" value="修改"></form>
                    </div>
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
    $(function() {

        $("input[name='nums']").prop("checked", false);
        $("#selnums").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", false);
                });
        });
    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要轉換的資料。");
        else mem_send($allnum);
    }

    function mutil_del() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else mem_del($allnum);
    }

    function mem_del(m) {
        if (window.confirm("是否確定刪除？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $.each(m, function(i, val) {
                    $("#showtr_" + val).remove();
                });
            } else {
                $s1 = m;
                $s2 = $("#showtr_" + m).remove();
            }

            $.ajax({
                url: "springweb_fun10.php",
                data: {
                    st: "del",
                    a: $s1
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    $s2;
                    myApp.hidePleaseWait();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        } else alert("請重新選擇。");
    }

    function mem_send(m) {
        if (window.confirm("是否確定轉換？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $s1.split(",").length;
                //$s2 = $.each(m, function(i, val) { $("#showtr_"+val).remove(); }); 
            } else {
                $s1 = m;
                $s2 = 1;
                //$s2 = $("#showtr_"+m).remove();
            }
            $.ajax({
                url: "springweb_fun10.php",
                data: {
                    st: "trans",
                    a: $s1
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    //$s2;
                    myApp.hidePleaseWait();
                    alert($s2 + "筆資料轉換完成。");
                    location.reload();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        } else alert("請重新選擇。");
    }

    function chk_form2(an) {
        if (!$("#votes_" + an).val()) {
            alert("請輸入票數。");
            $("#votes_" + an).focus();
            return false;
        }
        if (!$.isNumeric($("#votes_" + an).val())) {
            alert("票數只能是數字。");
            $("#votes_" + an).focus();
            return false;
        }
    }

    function chk_form() {
        if (!$("#marrys").val() && !$("#time1").val() && !$("#time2").val()) {
            alert("請選擇婚姻狀態。");
            return false;
        }
        if (($("#time1").val() && !$("#time2").val()) || ($("#time2").val() && !$("#time1").val())) {
            alert("開始時間和結束時間必須都要有日期。");
            return false;
        }
        return true;
    }
</script>