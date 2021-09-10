<?php
ini_set("memory_limit","2048M");
set_time_limit(0);
function openpdo()
{
    $dsn = "sqlsrv:server=192.168.88.2,1433;Database=springclub";
    $opt = array(
    PDO::ATTR_EMULATE_PREPARES => false,
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
function chtime($str)
{
    if($chstr = strtotime($str)) {
        return date("Y-m-d", $chstr);
    } else {
        return '';
    }
}

function num_lv($n) {
	switch($n) {
		case 1:
		  return "資料認證會員";
		break;
		case 2:
		  return "真人認證會員";
		break;
		case 3:
		return "璀璨會員-一年期";
		break;
		case 4:
		return "璀璨VIP會員-一年期";
		break;
		case 5:
		return "璀璨會員-二年期";
		break;
		case 6:
		return "璀璨VIP會員-二年期";
		break;
		case 10:
		return "菁英專案-三個月";
		break;
		case 11:
		return "菁英專案-六個月";
		break;
		default:
		return "網站會員";
		break;		
	}
}

if(isset($_REQUEST["st"]) && $_REQUEST["st"] == 'send') {
   $pdo = openpdo();
   $pdo->begintransaction();

  try {
  	$note = $_REQUEST["note"];

    $qe = $pdo->prepare("select * from log_data where datediff(d, getdate(), log_time) = 0 and log_name='系統' and log_4 like '%至至%'"); 
    $qe->execute();
    $total = 0;
    if($qall = $qe->fetchAll()) {
    	foreach($qall as $q) {
    		echo $q["log_4"]."<br>";
    		$new_log_4 = str_replace('至至', '至', $q["log_4"]);
    		echo $new_log_4."<br>";
    $qe2 = $pdo->prepare("update log_data set log_4=? where log_auto=?"); 
    $qe2->execute([$new_log_4, $q["log_auto"] ]);
    //if(1==1) {
    	/*echo '<table border=1>';    	
    	
      foreach(explode("\n",$note) as $k => $qv) {
      	
      	$qe = $pdo->prepare("select mem_auto, mem_branch, mem_single, mem_username, mem_mobile, mem_num, mem_name, web_endtime, web_level, real_web_level from member_data where mem_num=?");
      	$qe->execute([ trim($qv) ]);
      	if($q = $qe->fetch()) {
      		if($q["web_level"] == 3 && $q["real_web_level"] != 10 && $q["real_web_level"] != 11) continue;
      		if($q["web_level"] == 4) continue;
      		if($q["web_level"] == 5) continue;
      		if($q["web_level"] == 6) continue;
      		echo '<tr>';
    echo '<td>'.$q["mem_num"].'</td>';
    echo '<td>'.$q["mem_name"].'</td>';
      		$web_endtime = chtime($q["web_endtime"]);
      		$newDate = new DateTime($web_endtime);
      		$newDate->sub(new DateInterval('P60D')); // P1D means a period of 1 day
          $new_web_endtime = $newDate->format('Y-m-d');
          echo '<td>'.$web_endtime.'</td>';
          echo '<td>'.$new_web_endtime.'</td>';
          
    if(!empty($q["real_web_level"])) {
    	$web_level_name = num_lv($q["real_web_level"]);    	
    } else {
    	$web_level_name = num_lv($q["web_level"]);    	
    }
    echo '<td>'.$web_level_name.'</td>';
    
    $qe2 = $pdo->prepare("update member_data set web_endtime=? where mem_num=?"); 
    $qe2->execute([$new_web_endtime, $q["mem_num"] ]);

        $qe3 = $pdo->prepare("select top 1 * from log_data where log_1=? and log_name='系統' order by log_time desc");
        $qe3->execute([ trim($q["mem_mobile"]) ]);
        if($q3 = $qe3->fetch()) {
        	 $qe4 = $pdo->prepare("delete from log_data where log_auto=?");
           $qe4->execute([ trim($q3["log_auto"]) ]);
        	echo '<td>'.$q3["log_auto"].'</td>';        	
        }
    }*/
      		
/*    $web_endtime = chtime($q["web_endtime"]);
    if($web_endtime == '') continue;
    echo '<tr>';
    echo '<td>'.$q["mem_num"].'</td>';
    echo '<td>'.$q["mem_name"].'</td>';
    echo '<td>'.$web_endtime.'</td>';
    
    $newDate = new DateTime($web_endtime);
    $newDate->add(new DateInterval('P60D')); // P1D means a period of 1 day
    $new_web_endtime = $newDate->format('Y-m-d');
    echo '<td>'.$new_web_endtime.'</td>';
    $qe2 = $pdo->prepare("update member_data set web_endtime=? where mem_num=?"); 
    $qe2->execute([$new_web_endtime, $q["mem_num"] ]);
    
    if(!empty($q["real_web_level"])) {
    	$web_level_name = num_lv($q["real_web_level"]);    	
    } else {
    	$web_level_name = num_lv($q["web_level"]);    	
    }
    echo '<td>'.$web_level_name.'</td>';
    
    if(empty($mem_single = $q["mem_single"])) $mem_single = "SYSTEM";
    $qe3 = $pdo->prepare("insert into log_data (log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) VALUES (getdate(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 
    $qe3->execute([
      $q["mem_auto"],
      $q["mem_username"],
      $q["mem_name"],
      '系統',
      $q["mem_branch"],
      $mem_single,
      $q["mem_mobile"],
      '系統紀錄 - 延長會員權益',
      '系統於 '.date("Y/m/d H:i:s").' 延長會員權益['.$web_level_name.']至 '.$web_endtime.' => '.chtime($new_web_endtime).'，原因：因應疫情關係，原會籍自動展延 60 天',
      'member'
    ]);*/
    $total++;
    echo '</tr>';
      }
      echo '</table>';
    }


   //$pdo->commit();
   echo $total;

} catch (Exception $e) {
    $pdo->rollBack();
     echo 'Caught exception: ',  $e->getMessage(), "\n";
}
 
    unset($qe);
    unset($pdo);
    echo '<br>end';
    exit;
}
?>
<script src="https://www.aparty.com.tw/assets/plugins/jquery/jquery-2.2.3.min.js" type="text/javascript"></script>
<form action="?st=send" method="POST">
	<textarea name="note" style="width:500px;height:600px;"></textarea>
	<input type="submit">
</form>

<button onclick="startajax()">start</button>

<div id="msgout"></div>

<script>
function startajax() {
		$("#msgout").html("start");
		ajax_send();
}
function ajax_send() {
	$.ajax({
  method: "POST",
  url: "test.php",
  data: {st: "send" }
})
  .done(function( msg ) {
  	$("#msgout").html($("#msgout").html()+"<br>"+msg);
    if(msg == "0") {
    	
    } else {    
    	setTimeout(function(){ 
    		ajax_send();
    	}, 600);
    }
  });
}
$(function() {
	
});
</script>