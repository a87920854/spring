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

Function DateAdd($part, $n, $date)
{
switch($part)
{
case "y": $val = date("Y-m-d H:i:s", strtotime($date ."  $n year")); break;
case "m": $val = date("Y-m-d H:i:s", strtotime($date ."  $n month")); break;
case "w": $val = date("Y-m-d H:i:s", strtotime($date ."  $n week")); break;
case "d": $val = date("Y-m-d H:i:s", strtotime($date ."  $n day")); break;
case "h": $val = date("Y-m-d H:i:s", strtotime($date ."  $n hour")); break;
case "n": $val = date("Y-m-d H:i:s", strtotime($date ."  $n minute")); break;
case "s": $val = date("Y-m-d H:i:s", strtotime($date ."  $n second")); break;
}
return $val;
}

    $pdo = openpdo();
    
    $array1 = [
      "Google_cpc_allproducts",
      "Google_cpc_allproducts_extra",
      "SC_Google_GDN",
      "Google_GDN",
      "Springclub_Google_allproducts_GDN",
      "Springclub_allproducts_Google_GDN",
      "Springclub_Google_GDN_allproducts",
      "Springclub_allproducts_Facebook_pay",
      "springclub_facebook",
      "springclub_facebook_pay",      
      "Springclub_Google_GSP",
      "Yahoo_cpc_Asiapac",      
    ];
    
    
    echo '<table border=1 width=800 cellspacing="3">';
    
    $today = date("Y-m-d H:i:s", strtotime("2019/08/01"));
    echo '<tr>';
    echo '<td></td>';
    foreach($array1 as $aa) {
    	echo '<td>'.$aa.'</td>';    	
    }
    //echo '<td>春天會館FB</td>';
    echo '</tr>';
    for ( $i=0 ; $i<10 ; $i++ ) {
    	$nowmonth = DateAdd("m", $i, $today);
    	$start = date("Y-m-01 00:00:00", strtotime($nowmonth));
    	$end = date("Y-m-t 23:59:59", strtotime($nowmonth));
    	$showtime = date("Y-m", strtotime($nowmonth));
    	
    	echo '<tr>';
    	echo '<td>'.$showtime.'</td>';
    	foreach($array1 as $aa) {
    	$r = 0;
    	$query    = $pdo->prepare("select count(*) as t from member_data where mem_cc like '%".$aa."%' and mem_time between '".$start."' and '".$end."'");
    	//$query    = $pdo->prepare("select count(*) as t from member_data where mem_come2 = '春天會館FB' and mem_time between '".$start."' and '".$end."'");
      $query->execute();
      if($dd = $query->fetch()) $r = $dd["t"];
    	echo '<td>'.$r.'</td>';    	
      }    	
    	
    	
    	echo '</tr>';
    }
    
    /*
    echo '<tr><td colspan=2>含 call</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_come like '%call%' and mem_branch='台中' and mem_time between '2020/02/01 00:00' and '2020/02/29 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>2月</td><td>'.$dd["t"].'</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_come like '%call%' and mem_branch='台中' and mem_time between '2020/03/01 00:00' and '2020/03/31 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>3月</td><td>'.$dd["t"].'</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_come like '%call%' and mem_branch='台中' and mem_time between '2020/04/01 00:00' and '2020/04/30 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>4月</td><td>'.$dd["t"].'</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_come like '%call%' and mem_branch='台中' and mem_time between '2020/05/01 00:00' and '2020/05/31 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>5月</td><td>'.$dd["t"].'</td></tr>';
    echo '<tr><td colspan=2>所有名單</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_branch='台中' and mem_time between '2020/02/01 00:00' and '2020/02/29 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>2月</td><td>'.$dd["t"].'</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_branch='台中' and mem_time between '2020/03/01 00:00' and '2020/03/31 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>3月</td><td>'.$dd["t"].'</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_branch='台中' and mem_time between '2020/04/01 00:00' and '2020/04/30 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>4月</td><td>'.$dd["t"].'</td></tr>';
    $query    = $pdo->prepare("select count(*) as t from member_data where mem_branch='台中' and mem_time between '2020/05/01 00:00' and '2020/05/31 23:59'");
    $query->execute();
    if($dd = $query->fetch()) echo '<tr><td>5月</td><td>'.$dd["t"].'</td></tr>';
    */
    echo '</table>';

?>