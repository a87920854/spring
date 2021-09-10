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
if(isset($_REQUEST["st"]) && $_REQUEST["st"] == 'send') {
	$list = $_REQUEST["list"];
	$newlist = [];
	foreach(explode("\n", $list) as $li) {
		
		$gp1 = explode(" ", $li, 2);
		
		if(isset($gp1[1])) {			
			$newlist[$gp1[1]] = $gp1[0];
		}
	}
	try {
	$pdo = openpdo();   	
	$qe = $pdo->prepare("select top 1 * from member_data where mem_mobile=? and mem_level='mem'"); 
	foreach($newlist as $p => $n) {		
		$p = trim($p);
		echo $n." - ".$p." => ";	
		
		$qe->execute([$p]);		
		if($q = $qe->fetch()) {
			switch($q["web_level"]) {
				case 1:
				  echo '資料認證會員('.$q["web_startime"].'~'.$q["web_endtime"].')';
				break;
				case 2:
				  echo '真人認證會員('.$q["web_startime"].'~'.$q["web_endtime"].')';
				break;
				case 3:
				  echo '璀璨會員-一年期('.$q["web_startime"].'~'.$q["web_endtime"].')';
				break;
				case 4:
				  echo '璀璨VIP會員-一年期('.$q["web_startime"].'~'.$q["web_endtime"].')';
				break;
				case 5:
				  echo '璀璨會員-二年期('.$q["web_startime"].'~'.$q["web_endtime"].')';
				break;
				case 6:
				  echo '璀璨VIP會員-二年期('.$q["web_startime"].'~'.$q["web_endtime"].')';
				break;
				
			}
			
			$web_endtime = $q["web_endtime"];
			$difftime = strtotime($web_endtime) - time();
			if($difftime > 0) {
				$web_time_diff = $difftime / 60 / 60 / 24;
				$web_time_diff = round($web_time_diff);
				echo "&nbsp;&nbsp;餘 ".$web_time_diff." 天";
			} else {
				echo '&nbsp;&nbsp;<span class="label label-danger">已過期</span>';
			}		
			
		}	else echo ' => 未入會';	
		echo "<br>";
	}
	} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
	echo 'total '.count($newlist).' row';
	
	
	exit;
$pdo = openpdo();   
    $qe = $pdo->prepare("select count(*) as t from pay_single left join personnel_data_aparty on p_branch = ps_branch and p_name = ps_sec where ps_id is null and not p_user is null"); 
    $qe->execute();
    

    unset($qe);
    unset($pdo);
    echo $size;
    exit;
}
?>
<script src="https://www.aparty.com.tw/assets/plugins/jquery/jquery-2.2.3.min.js" type="text/javascript"></script>

<form action="?st=send" method="POST">
	<textarea name="list" style="width:80%;height:500px;"></textarea>
	<input type="submit">
</form>


<script>

$(function() {
	
});
</script>