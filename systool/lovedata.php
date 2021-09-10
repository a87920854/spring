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

if(isset($_REQUEST["st"]) && $_REQUEST["st"] == "send") {
    $pdo = openpdo();
        
    $query    = $pdo->prepare("select top 500 * from love_data_re AS a LEFT OUTER JOIN member_data AS b ON a.love_user2 = b.mem_username where a.love_mobile2 is null");
    $query->execute();
    if($ddall = $query->fetchAll()) {
    	foreach($ddall as $dd) {
    		if(empty($mem_name = $dd["mem_name"])) $mem_name = "無紀錄";
    		if(empty($mem_mobile = $dd["mem_mobile"])) $mem_mobile = "unknown";
    		if(empty($mem_num = $dd["mem_num"])) $mem_num = "unknown";
    		
    		echo $mem_name."-";
    		echo $mem_mobile."-";
    		echo $mem_num."<br>";

    $uu    = $pdo->prepare("update love_data_re set love_name2=:mem_name, love_mobile2=:mem_mobile, love_mnum2=:mem_num where love_auto=:love_auto");
    $uu->execute(array('mem_name' => $mem_name, 'mem_mobile' => $mem_mobile, 'mem_num' => $mem_num, 'love_auto' => $dd["love_auto"]));
    		    	
    	}
	die("ok_1");
    }
    die("end");
}

?>

<meta charset="utf-8" />

<script src="jquery-1.8.3.js"></script>


<div id="show"></div>
<input type="button" value="start" id="ss">
<script type="text/javascript">

$(function () { 	
	
	
	$("#ss").on("click", function() {				
		$("#show").html("start");
		
		m1();
	});
});
function m1() {
	var $sd = $("#show");
	$.ajax({
  url: "<?=$_SERVER['REQUEST_URI']?>?st=send"
  }).done(function( msg ) {
    if(msg.indexOf("ok_") != -1) {    	
    	$sd.html($sd.html()+"正在輪詢, last "+msg.split("_")[1]+"<br>");
    	setTimeout(function(){ m1(); }, 2000);
    } else {
    	$sd.html("end");
    }
  });
}
</script>