<?php
ini_set("memory_limit","2048M");
function openpdo()
{
    $dsn = "sqlsrv:server=192.168.88.2,1433;Database=springclub";
    $opt = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    return new PDO($dsn,'spring','28212342', $opt);
}
$c1 = "春天部落格,通路王,Cheers雜誌報導,2016Cheers名單,網站行銷,春天網站,網站活動,網站排約,媒體報導名單B,春天會館FB,微電影活動,億捷創意回收名單,行銷活動,FB名單,新書發表會,購書贈送活動,瑪那熊,活動通Accupass";
$c2 = "流水陌call,樂得流水call,樂得系統回call,萊優流水call,萊優Robotcall,手機1111,客人自來電,訪客自來,來過未參追,活動宣傳,五人未入會,外部A名單,外部B名單,外部C名單,高接觸率流水號,
台灣電話流水序號開發,手機123,手機104,台灣推薦名單,舊資料再開發,好好玩名單,人力銀行,舊系統資料,台灣舊資料,廈門舊資料,上海舊資料,舊資料卡,520940網站名單,台灣畢冊開發,
彰化委外名單,合辦活動名單,通路合作,企劃活動名單,其他";
$area = "基隆市,台北市,新北市,宜蘭縣,桃園市,新竹縣,新竹市,苗栗縣,苗栗市,台中市,彰化縣,彰化市,南投縣,嘉義縣,嘉義市,雲林縣,台南市,高雄市,屏東縣,花蓮縣,台東縣,澎湖縣,金門縣,馬祖,綠島,蘭嶼,其他";
$c3 = ["行銷活動"];
$c1 = explode(",", $c1);
$c2 = explode(",", $c2);
$area = explode(",", $area);
$ab = ["台北", "桃園", "新竹", "台中", "台南", "高雄", "八德", "約專", "總管理處", "好好玩旅行社"];

$pdo = openpdo();
echo '<table border=1>';
echo '<tr><td colspan=2>行銷名單</td></tr>';
    foreach($area as $bb) {
    //$qe = $pdo->prepare("select count(*) as t from member_data where mem_come in ('".implode($c3, "','")."') and mem_branch <> '八德' and mem_area=? and mem_time between '2020/12/01 00:00' and '2021/02/28 23:59'"); 
    $qe = $pdo->prepare("select count(*) as t from member_data where mem_come2 like '單身剋星_LINEPOINT%' and mem_time between '2020/12/01 00:00:00' and '2021/02/28 23:59:59' and mem_area = ?");
    $qe->execute([ $bb ]);    
    if($qt = $qe->fetch()) $size = $qt["t"];
    else $size = 0;
    echo '<tr><td>'.$bb.'</td><td>'.$size.'</td></tr>';
    }    
echo '</table>';
//echo '<p>'.implode($c1, ",").'</p>';
echo '<br>';
/*
echo '<table border=1>';
echo '<tr><td colspan=2>非行銷名單</td></tr>';
    foreach($area as $bb) {
    $qe = $pdo->prepare("select count(*) as t from member_data where mem_come in ('".implode($c2, "','")."') and mem_branch <> '八德' and mem_area=? and mem_time between '2020/12/01 00:00' and '2021/02/28 23:59'"); 
    $qe->execute([ $bb ]);    
    if($qt = $qe->fetch()) $size = $qt["t"];
    else $size = 0;
    echo '<tr><td>'.$bb.'</td><td>'.$size.'</td></tr>';
    }    
echo '</table>';
echo '<p>'.implode($c2, ",").'</p>';*/
    unset($qe);
    unset($pdo);    
    exit;