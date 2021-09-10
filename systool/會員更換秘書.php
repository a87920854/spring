<?php
include("phplib/dblib.php");
ini_set("memory_limit","2048M");

$pdo = new DB();
$Asingle = "D220941571";
$Bsingle = "D221429903";
$Bsinglename = "黃秋淑";
    
   try {
		$pdo->autocommit();

    $qe = $pdo->prepare("select * from member_data where mem_level='mem' and mem_single=?");
    $qe->execute([ $Asingle ]);
    if($qall = $qe->fetchAll()) {
    	foreach($qall as $q) {
    		echo $q["mem_num"]."-".$q["mem_name"];
    		$q1res = $pdo->update('member_data', ['mem_single' => $Bsingle], 'mem_auto=:ma', ['ma'=>$q["mem_auto"]]);
    		if(!$q1res) break;    		
    		$q2res = $pdo->update('log_data', ['log_single' => $Bsingle], 'log_single=:Asingle and log_1=:log_1', ['Asingle'=>$Asingle, 'log_1'=>$q["mem_mobile"]]);
    		$ad = [
    		  'log_time' => date("Y-m-d H:i:s"),
    		  'log_num' => $q["mem_auto"],
    		  'log_fid' => $q["mem_username"],
    		  'log_username' => $q["mem_name"],
    		  'log_name' => "系統",
    		  'log_branch' => $q["mem_branch"],
    		  'log_single' => $Bsingle,
    		  'log_1' => $q["mem_mobile"],
    		  'log_2' => '系統紀錄',
    		  'log_4' => "系統於".date("Y-m-d H:i")."將本筆資料自 台南 - ".$Bsinglename." 轉送給台南 - 杜佳倩",
    		  'log_5' => 'member'    		  
    		];
    		echo "-".$q1res."-";
        $q2res = $pdo->insert('log_data', $ad);
        echo "-".$q2res."-";
    		echo "<br>";
    	}
    }

echo 'end';
	  $pdo->commit();

    } catch(PDOException $e) {     
		$pdo->rollBack();   
        echo '<p class="bg-danger">'.$e->getMessage().'</p>';
        exit;
    }
    unset($qe);
    unset($pdo);    
    exit;