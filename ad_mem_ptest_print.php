<?php
/************************************************/
//檔案名稱：ad_ptest.php
//後台對應位置：春天網站功能 > 愛的五種語言(查看列印)
//改版日期：2022.1.19
//改版設計人員：Jack
//改版程式人員：Queena
/************************************************/
require_once("_inc.php");
require_once("./include/_function.php");

//接收值
$id = SqlFilter($_REQUEST["id"],"tab");

//判斷ID
if ( $id == "" ){ call_alert("讀取錯誤。","ClOsE",0);}

$SQL = "Select * From ptest Where auton='".$id."'";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);

if ( count($result) == 0 ){
    call_alert("讀取錯誤。",0, 0);
}else{
    $Pa = $re["pa"];
    $Pb = $re["pb"];
    $Pc = $re["pc"];
    $Pd = $re["pd"];
    $Pe = $re["pe"];
    $names = $re["mem_name"];
    $times = $re["times"];
    for ( $i=1;$i<=30;$i++ ){
        ${"qq".$i} = $re["q".$i];
    }
}

//新增temp資料
$SQL = "Select Top 1 * From ptest_temp Where id='".$id."'";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) > 0 ){
    $SQL_d = "Delete From ptest_temp Where id='".$id."'";
    $rs_d = $SPConn->prepare($SQL_d);
    $rs_d->execute();    
}

for ( $i=1;$i<=5;$i++ ){
    if ( $i == 1 ){ $i_txt = "a";}
    if ( $i == 2 ){ $i_txt = "b";}
    if ( $i == 3 ){ $i_txt = "c";}
    if ( $i == 4 ){ $i_txt = "d";}
    if ( $i == 5 ){ $i_txt = "e";}

    $SQL_i = "Insert Into ptest_temp (n1,n2,id) Values ('".strtoupper($i_txt)."','".${"P".$i_txt}."','".$id."')";
    $rs_i = $SPConn->prepare($SQL_i);
    $rs_i->execute();
}    
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>心理測驗</title>
    <style>
        table {
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
            border-top: 1px solid #000;
            border-left: 1px solid #000;
            page-break-inside: auto
        }

        td {
            padding: 2px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
        }

        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        thead {
            display: table-header-group
        }

        tfoot {
            display: table-footer-group
        }
    </style>
</head>

<body>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $names;?>&nbsp;&nbsp;&nbsp;&nbsp;(<?php echo $times;?>)</p>
    <table>
        <tr>
            <td rowspan="2" align="center">1</td>
            <td><input type="radio"<?php if ( $qq1 == "A" ){ echo " checked";}?>> A. 我喜歡收到寫滿讚美與肯定的小紙條</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq1 == "E" ){ echo " checked";}?>> E. 我喜歡被擁抱的感覺</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">2</td>
            <td><input type="radio"<?php if ( $qq2 == "B" ){ echo " checked";}?>> B. 我喜歡和在我心目中佔有特殊地位的人獨處</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq2 == "D" ){ echo " checked";}?>> D. 每當有人給我實際的幫助，我就會覺得他是愛我的</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">3</td>
            <td><input type="radio"<?php if ( $qq3 == "C" ){ echo " checked";}?>> C. 我喜歡收到禮物</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq3 == "B" ){ echo " checked";}?>> B. 我有空就喜歡去探訪朋友和所愛的人</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">4</td>
            <td><input type="radio"<?php if ( $qq4 == "D" ){ echo " checked";}?>> D. 有人幫我做事，我就覺得被愛</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq4 == "E" ){ echo " checked";}?>> E. 有人觸碰我的身體，我就會覺得被愛</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">5</td>
            <td><input type="radio"<?php if ( $qq5 == "E" ){ echo " checked";}?>> E. 當我所愛、所景仰的人攬著我的肩膀，我就會有被愛的感覺</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq5 == "C" ){ echo " checked";}?>> C. 當我所愛、所景仰的人送我禮物，我就會有被愛的感覺</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">6</td>
            <td><input type="radio"<?php if ( $qq6 == "B" ){ echo " checked";}?>> B. 我喜歡和朋友或所愛的人到處走走</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq6 == "E" ){ echo " checked";}?>> E. 我喜歡和在我心目中有特殊地位的人擊掌或牽手</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">7</td>
            <td><input type="radio"<?php if ( $qq7 == "C" ){ echo " checked";}?>> C. 愛的具體象徵(禮物)對我很重要</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq7 == "A" ){ echo " checked";}?>> A. 受到別人的肯定讓我有被愛的感覺</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">8</td>
            <td><input type="radio"<?php if ( $qq8 == "E" ){ echo " checked";}?>> E. 我喜歡和我所喜歡的人促膝長談</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq8 == "A" ){ echo " checked";}?>> A. 我喜歡聽到別人說我很漂亮，很迷人或很有氣質</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">9</td>
            <td><input type="radio"<?php if ( $qq9 == "B" ){ echo " checked";}?>> B. 我喜歡和好友及所愛的人在一起</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq9 == "C" ){ echo " checked";}?>> C. 我喜歡收到朋友或所愛的人贈送的禮物</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">10</td>
            <td><input type="radio"<?php if ( $qq10 == "A" ){ echo " checked";}?>> A. 我喜歡聽到別人接納我的話</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq10 == "D" ){ echo " checked";}?>> D. 如果有人幫我的忙，我會知道他是愛我的</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">11</td>
            <td><input type="radio"<?php if ( $qq11 == "B" ){ echo " checked";}?>> B. 我喜歡和朋友與所愛的人一起做同一件事</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq11 == "A" ){ echo " checked";}?>> A. 我喜歡聽到別人對我說友善的話</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">12</td>
            <td><input type="radio"<?php if ( $qq12 == "D" ){ echo " checked";}?>> D. 別人的表現要比他的語言更能感動我</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq12 == "E" ){ echo " checked";}?>> E. 被擁抱讓我覺德與對方很親近，也覺得自己很重要</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">13</td>
            <td><input type="radio"<?php if ( $qq13 == "A" ){ echo " checked";}?>> A. 我珍惜別人的讚美，盡量避免受到批評 </td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq13 == "C" ){ echo " checked";}?>> C. 送我許多小禮物比送我一份大禮物更能感動我</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">14</td>
            <td><input type="radio"<?php if ( $qq14 == "B" ){ echo " checked";}?>> B. 當我和人聊天或一起做事時，我會覺得與他很親近 </td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq14 == "E" ){ echo " checked";}?>> E. 朋友或所愛的人若常常與我有身體的接觸，我會覺得與他很親近</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">15</td>
            <td><input type="radio"<?php if ( $qq15 == "A" ){ echo " checked";}?>> A. 我喜歡聽到別人稱讚我的成就</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq15 == "D" ){ echo " checked";}?>> D. 當別人勉強自己為我做一件事，我會覺得他很愛我</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">16</td>
            <td><input type="radio"<?php if ( $qq16 == "E" ){ echo " checked";}?>> E. 我喜歡朋友或所愛的人走過我身邊時，故意用身體觸碰我的感覺</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq16 == "B" ){ echo " checked";}?>> B. 我喜歡別人聽我說話，而且表現興趣十足的樣子</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">17</td>
            <td><input type="radio"<?php if ( $qq17 == "D" ){ echo " checked";}?>> D. 當朋友或所愛的人幫助我完成工作，我會覺得被愛</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq17 == "C" ){ echo " checked";}?>> C. 我很喜歡收到朋友或所愛的人送的禮物</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">18</td>
            <td><input type="radio"<?php if ( $qq18 == "A" ){ echo " checked";}?>> A. 我喜歡聽到別人稱讚我的外表 </td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq18 == "B" ){ echo " checked";}?>> B. 當別人願意體諒我的感受時，我會有被愛的感覺</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">19</td>
            <td><input type="radio"<?php if ( $qq19 == "E" ){ echo " checked";}?>> E. 在我心目中有特殊地位的人觸碰我的身體時，我覺得有安全感 </td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq19 == "D" ){ echo " checked";}?>> D. 服務的行動讓我覺得被愛</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">20</td>
            <td><input type="radio"<?php if ( $qq20 == "D" ){ echo " checked";}?>> D. 我很感激在我心目中有特殊地位的人為我付出那麼多 </td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq20 == "C" ){ echo " checked";}?>> C. 我喜歡收到在我心目中有特殊地位的人送我的禮物 </td>
        </tr>

        <tr>
            <td rowspan="2" align="center">21</td>
            <td><input type="radio"<?php if ( $qq21 == "B" ){ echo " checked";}?>> B. 我很喜歡被呵護備至的感覺</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq21 == "D" ){ echo " checked";}?>> D. 我很喜歡被人服務的感覺</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">22</td>
            <td><input type="radio"<?php if ( $qq22 == "C" ){ echo " checked";}?>> C. 有人送我生日禮物時，我會覺得被愛極受重視</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq22 == "A" ){ echo " checked";}?>> A. 有人在我生日那天對我說出特別的話，我會覺得被愛</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">23</td>
            <td><input type="radio"<?php if ( $qq23 == "C" ){ echo " checked";}?>> C. 有人送我禮物，我就知道他有想到我的需要</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq23 == "D" ){ echo " checked";}?>> D. 有人幫我做家事，我會覺得被愛</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">24</td>
            <td><input type="radio"<?php if ( $qq24 == "B" ){ echo " checked";}?>> B. 我很感激有人耐心聽我說話而且不插嘴</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq24 == "C" ){ echo " checked";}?>> C. 我很感激有人記得某個特別的日子並且送我禮物</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">25</td>
            <td><input type="radio"<?php if ( $qq25 == "D" ){ echo " checked";}?>> D. 我喜歡知道我所愛的人因為關心我，幫我做家事或買麵包等</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq25 == "B" ){ echo " checked";}?>> B. 我喜歡和在我心目中有特殊地位的人一起去逛街、旅行</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">26</td>
            <td><input type="radio"<?php if ( $qq26 == "E" ){ echo " checked";}?>> E. 我喜歡和最親近的人牽手、擁抱、親吻</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq26 == "C" ){ echo " checked";}?>> C. 有人不為了特別理由而送我禮物，我會覺得很開心</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">27</td>
            <td><input type="radio"<?php if ( $qq27 == "A" ){ echo " checked";}?>> A. 我喜歡聽到有人向我表示感謝</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq27 == "B" ){ echo " checked";}?>> B. 與人交談時，我喜歡對方注視我的眼睛</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">28</td>
            <td><input type="radio"<?php if ( $qq28 == "C" ){ echo " checked";}?>> C. 朋友或所愛的人送的禮物，我會特別珍惜</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq28 == "E" ){ echo " checked";}?>> E. 朋友或所愛的人觸碰我的身體那種感覺真好</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">29</td>
            <td><input type="radio"<?php if ( $qq29 == "A" ){ echo " checked";}?>> A. 有人熱心做我所要求的事時，我會覺得被愛</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq29 == "D" ){ echo " checked";}?>> D. 聽到別人對我表示感激，我會覺得被愛</td>
        </tr>

        <tr>
            <td rowspan="2" align="center">30</td>
            <td><input type="radio"<?php if ( $qq30 == "E" ){ echo " checked";}?>> E. 我每天都需要身體的接觸</td>
        </tr>
        <tr>
            <td><input type="radio"<?php if ( $qq30 == "A" ){ echo " checked";}?>> A. 我每天都需要肯定的言語(如:別人表達感激我的付出和努力)</td>
        </tr>

    </table>
    <table style="margin-bottom: 5px;">
        <tr>
            <td align="center"></td>
            <td align="center">A</td>
            <td align="center">B</td>
            <td align="center">C</td>
            <td align="center">D</td>
            <td align="center">E</td>
        </tr>
        <tr>
            <td align="center">總計</td>
            <td align="center"><?php echo $Pa;?> 個</td>
            <td align="center"><?php echo $Pb;?> 個</td>
            <td align="center"><?php echo $Pc;?> 個</td>
            <td align="center"><?php echo $Pd;?> 個</td>
            <td align="center"><?php echo $Pe;?> 個</td>
        </tr>
    </table>
    <table>
        <!--結果A-->
        <?php
        $text_a  = "<tr>";
        $text_a .= "<td width='100'><h2>A：".$Pa." 個</h2></td>";
        $text_a .= "<td>";
        $text_a .= "<h4>愛的語言之一：肯定的言詞</h4>";
        $text_a .= "<p>";
        $text_a .= "感性地表達愛的方式之一，是用讚揚的字句。口頭的讚揚或欣賞式的話語，乃是「愛」的有力溝通工具，最好以簡單、坦率的肯定字句來表達。例如：<br>";
        $text_a .= "「你穿那套西裝，看起來很帥！」<br>";
        $text_a .= "「哇！妳穿這件洋裝，好看極了！」<br>";
        $text_a .= "「我真感謝你今天晚上幫忙洗碗。」<br>";
        $text_a .= "鼓勵的話語<br>";
        $text_a .= "仁慈的話語<br>";
        $text_a .= "謙遜的話語<br>";
        $text_a .= "各種的用語";
        $text_a .= "</p>";
        $text_a .= "</td>";
        $text_a .= "</tr>";
        ?>
        <!--結果B-->
        <?php
        $text_b  = "<tr>";
        $text_b .= "<td><h2>B：".$Pb." 個</h2></td>";
        $text_b .= "<td>";
        $text_b .= "<h4>愛的語言之二：精心的時刻</h4>";
        $text_b .= "<p>";
        $text_b .= "精心時刻的中心思想，是同在一起。我不是單指接近，同在一起乃跟彼此注意力的焦點有關。<br>";
        $text_b .= "就是給予某人不分散的注意力，那是愛的一種有力、情緒的傳達工具。<br>";
        $text_b .= "精心時刻並非指必須用所有共處的時間，凝視對方；而是應該說兩人同心一起做些什?，並且給予對方全部的注意力。<br>";
        $text_b .= "例如：和他一起打網球或看電影，如果以真實的精心時刻，焦點不在於打球或看電影，而是在花時間共處的事實，最主要是在情感層次上發生的事。傳達了我們關心對方，喜歡跟對方在一起及喜歡一起做些什?。<br><br>";
        $text_b .= "精心的會話<br>";
        $text_b .= "如同肯定的言語，精心時刻之語言，也有很多種用語，最普遍的用語之一是精心的會話，具有同理心的對話：兩個人在友善、不受干擾的環境下，分享彼此的經驗、思想、感覺和願望。<br>";
        $text_b .= "精心的會話跟第一種愛的語言是很不同的，肯定言詞的焦點是我們在說什?，而精心的會話的焦點是我們在聽什?。<br><br>";
        $text_b .= "學習傾聽的藝術<br>";
        $text_b .= "１當對方說話的時候，保持眼光的接觸<br>";
        $text_b .= "２不要一邊聽對方說話，一邊做別的事<br>";
        $text_b .= "３注意聽的感覺<br>";
        $text_b .= "４觀察肢體語言<br>";
        $text_b .= "５避免打斷說話、插話<br><br>";
        $text_b .= "精心的活動<br>";
        $text_b .= "一個精心的活動之必要成分是<br>";
        $text_b .= "１至少有一人想做這活動<br>";
        $text_b .= "２另外一個人也願意做這個活動<br>";
        $text_b .= "３你們同時都知道為何要一同做活動：藉此同在一起的機會";
        $text_b .= "</p>";
        $text_b .= "</td>";
        $text_b .= "</tr>";
        ?>
        <!--結果C-->
        <?php
        $text_c  = "<tr>";
        $text_c .= "<td>";
        $text_c .= "<h2>C：".$Pc." 個</h2>";
        $text_c .= "</td>";
        $text_c .= "<td>";
        $text_c .= "<h4>愛的語言之三：接受禮物</h4>";
        $text_c .= "<p>";
        $text_c .= "禮物是一件可以拿在手裡，說：「你看，他想到了我」。必然是想到了什麼人，才給他禮物。禮物本身是那思想的象徵，是否值錢並無關緊要，重要的是你想到了他，只在心裡的想法不算數，你的思想要經由禮物實際地表達出來，而且把禮物當成（念想或愛）的表示送出去才算數。<br>";
        $text_c .= "對於主要愛的語言是接受禮物的人，禮物的價錢並不重要，事實上，這是最容易學的愛的語言之一。<br>";
        $text_c .= "禮物可以是買來的、找到的、或者自製的。<br>";
        $text_c .= "把自己當作禮物，有一種無形的禮物，有時候勝過那可以拿在手裡的禮物，當對方需要你的時候，你就在那裡陪伴，這對主要愛的語言是接受禮物的人，傳達了愛的信息。尤其是在最重要的時刻，你能在場，將是最動人的禮物。";
        $text_c .= "</p>";
        $text_c .= "</td>";
        $text_c .= "</tr>";
        ?>
        <!--結果D-->
        <?php
        $text_d  = "<tr>";
        $text_d .= "<td>";
        $text_d .= "<h2>D：".$Pd." 個</h2>";
        $text_d .= "</td>";
        $text_d .= "<td>";
        $text_d .= "<h4>愛的語言之四：服務的行動</h4>";
        $text_d .= "<p>";
        $text_d .= "所謂的服務的行動，是指對方想要你做的事，你設法藉著替他服務，而使他高興；藉著替他做事，表示你對他的愛。<br>";
        $text_d .= "例：做一餐飯、把餐具擺在桌上、洗碗．．．．．<br>";
        $text_d .= "那些服務需投資思想、計劃、時間、努力及精力。如果是以正面的精神來完成，那就真是愛的表現。<br>";
        $text_d .= "藉由替對方做事，來表達彼此的愛。<br>";
        $text_d .= "我們可以請求對方什?事，可是絕不可以要求任何事。請求會引導愛，而要求卻阻礙了愛的流通。";
        $text_d .= "</p>";
        $text_d .= "</td>";
        $text_d .= "</tr>";
        ?>
        <!--結果E-->
        <?php
        $text_e  = "<tr>";
        $text_e .= "<td>";
        $text_e .= "<h2>E：".$Pe." 個</h2>";
        $text_e .= "</td>";
        $text_e .= "<td>";
        $text_e .= "<h4>愛的語言之五：身體的接觸</h4>";
        $text_e .= "<p>";
        $text_e .= "身體的接觸是溝通情感的一種方式，在兒童發展方面，擁抱、有人親吻嬰孩比那些長期沒人理會沒能接受身體接觸的嬰孩，在情緒發展上會來得健康。<br>";
        $text_e .= "很多人主要的愛語是身體的接觸，在情緒方面，他們渴望對方伸出手來撫摸他們，用手指梳理頭髮、撫摸背部、牽手、擁抱．．．．．是他們情感的救生索。<br>";
        $text_e .= "例如：當對方為了某些難過哭泣時，如果愛的主要語言是身體的接觸，這時候擁抱、用手拍拍背等，比任何安慰或關心話語來得更有意義。";
        $text_e .= "</p>";
        $text_e .= "</td>";
        $text_e .= "</tr>";
        ?>
        <?php
        $SQL  = "Select * From ptest_temp Where id='".$id."' Order By n2 Desc";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
        if ( count($result) == 0 ){
            	call_alert("排序錯誤。",0, 0);
        }else{
            foreach($result as $re){
            	switch ( $re["n1"]){
                    case "B":
            		    echo $text_b;
                        break;
            		case "C":
            		    echo $text_c;
                        break;
            		case "D":
            		    echo $text_d;
                        break;
            		case "E":
            		    echo $text_e;
                        break;
            	    default:
            		    echo $text_a;
                        break;
                }
            }
        }
        $SQL_d = "Delete From ptest_temp Where id='".$id."'";
        $rs_d = $SPConn->prepare($SQL_d);
        $rs_d->execute();
        ?>

        
    </table>
</body>
</html>