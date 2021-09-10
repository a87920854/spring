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

    $pdo = openpdo();
    
      //$allcity = "基隆市,台北市,新北市,宜蘭縣,桃園市,新竹縣,新竹市,苗栗縣,苗栗市,台中縣,台中市,彰化縣,彰化市,南投縣,嘉義縣,嘉義市,雲林縣,台南縣,台南市,高雄市,屏東縣,花蓮縣,台東縣,澎湖縣,金門縣,馬祖,綠島,蘭嶼";
      $allcity = "台北,桃園,新竹,台中,台南,高雄,八德,總管理處";
      $allcity = explode(",", $allcity);
      echo '<table>';
      //foreach($allcity as $cc) 
      //echo '<tr><td>會館</td><td>八德男</td><td>八德女</td><td>春天男</td><td>春天女</td><td>總</td><td>金額</td></tr>';
      echo '<tr><td>會館</td><td>男</td><td>女</td><td>總</td><td>金額</td></tr>';
    foreach($allcity as $cc) {    
    echo '<tr><td>'.$cc.'</td>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_time between '2019/01/01 00:00' and '2020/02/25 23:59' and mem_branch=? and mem_level='mem' and mem_sex = '男' and mem_come='行銷活動' and mem_come2<>'201907名單'");
    $query->execute(array($cc));
    if($dd = $query->fetch()) {
     echo '<td>'.$dd["t"].'</td>';
    }
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_time between '2019/01/01 00:00' and '2020/02/25 23:59' and mem_branch=? and mem_level='mem' and mem_sex <> '男' and mem_come='行銷活動' and mem_come2<>'201907名單'");
    $query->execute(array($cc));
    if($dd = $query->fetch()) {
     echo '<td>'.$dd["t"].'</td>';
    }
/*    $query    = $pdo->prepare("select count(*) as t from member_data where mem_time between '2019/01/01 00:00' and '2020/02/25 23:59' and mem_branch=? and mem_level='mem' and mem_sex = '男' and mem_come='行銷活動' and mem_come2<>'201907名單'");
    $query->execute(array($cc));
    if($dd = $query->fetch()) {
     echo '<td>'.$dd["t"].'</td>';
    }
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_time between '2019/01/01 00:00' and '2020/02/25 23:59' and mem_branch=? and mem_level='mem' and mem_sex <> '男' and mem_come='行銷活動' and mem_come2<>'201907名單'");
    $query->execute(array($cc));
    if($dd = $query->fetch()) {
     echo '<td>'.$dd["t"].'</td>';
    }    */
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_time between '2019/01/01 00:00' and '2020/02/25 23:59' and mem_level='mem' and mem_branch=? and mem_come='行銷活動' and mem_come2<>'201907名單'");
    $query->execute(array($cc));
    if($dd = $query->fetch()) {
     echo '<td>'.$dd["t"].'</td>';
    }    
    if($cc == "八德") $query    = $pdo->prepare("select (select sum(pay_total2) as a from pay_main where pay_user=mem_username and pay_branch = '八德') as t from member_data where not mem_username is null and mem_username <> '' and mem_time between '2019/01/01 00:00' and '2020/02/25 23:59' and mem_level='mem' and mem_branch=? and mem_come='行銷活動' and mem_come2<>'201907名單'");
    else $query    = $pdo->prepare("select (select sum(pay_total2) as a from pay_main where pay_user=mem_username and pay_branch <> '八德') as t from member_data where not mem_username is null and mem_username <> '' and mem_time between '2019/01/01 00:00' and '2020/02/25 23:59' and mem_level='mem' and mem_branch=? and mem_come='行銷活動' and mem_come2<>'201907名單'");
    $query->execute(array($cc));
    $v = 0;
    if($dd = $query->fetchAll()) {    	
    	foreach($dd as $d) $v += $d["t"];
    }
    echo '<td>'.$v.'</td>';
    
    /*
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_time between '2019/01/01 00:00' and '2020/02/25 23:59' and  mem_branch=? and mem_sex = '男' and mem_come='行銷活動' and mem_come2<>'201907名單'");
    $query->execute(array($cc));
    if($dd = $query->fetch()) {
     echo '<tr><td>'.$cc.'</td><td>八德-已入會</td><td>男</td><td>'.$dd["t"].'</td></tr>';
    }
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_time between '2019/01/01 00:00' and '2020/02/25 23:59' and  mem_branch=? and mem_sex <> '男' and mem_come='行銷活動' and mem_come2<>'201907名單'");
    $query->execute(array($cc));
    if($dd = $query->fetch()) {
     echo '<tr><td>'.$cc.'</td><td>八德-已入會</td><td>女</td><td>'.$dd["t"].'</td></tr>';
    }
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_time between '2019/01/01 00:00' and '2020/02/25 23:59' and  mem_branch=? and mem_sex = '男' and mem_come='行銷活動' and mem_come2<>'201907名單'");
    $query->execute(array($cc));
    if($dd = $query->fetch()) {
     echo '<tr><td>'.$cc.'</td><td>春天-已入會</td><td>男</td><td>'.$dd["t"].'</td></tr>';
    }
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_time between '2019/01/01 00:00' and '2020/02/25 23:59' and  mem_branch=? and mem_sex <> '男' and mem_come='行銷活動' and mem_come2<>'201907名單'");
    $query->execute(array($cc));
    if($dd = $query->fetch()) {
     echo '<tr><td>'.$cc.'</td><td>春天-已入會</td><td>女</td><td>'.$dd["t"].'</td></tr>';
    }*/
    echo '</tr>';
  }
  echo '</table>';
?>