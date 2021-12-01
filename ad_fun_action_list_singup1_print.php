<?php 
	/*****************************************/
    //檔案名稱：ad_fun_action_list_singup1_print.php
    //後台對應位置：好好玩管理系統/好好玩國內團控/(活動名)/報名詳細資料->要保明細表
    //改版日期：2021.11.26
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

	//程式開始 *****
	if ($_SESSION["MM_Username"] == "") {
		call_alert("請重新登入。", "login.php", 0);
	}

	$SQL = "select ac_title from action_data where ac_auto=" .SqlFilter($_REQUEST["ac"],"int");
	$rs = $FunConn->prepare($SQL);
	$rs->execute();
	$result = $rs->fetch(PDO::FETCH_ASSOC);
	if($result){
		$ac_title = $result["ac_title"];
	}else{
		call_alert("讀取資料有誤。",0,0);
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SD CRM</title>
	<style>
		table {
			font-size: 12px;
		}
	</style>
</head>

<body>
	<b><?php echo $ac_title; ?> - 要保明細表</b>
	<br><br>

	<table width="100%" border="1" style="border-collapse:collapse;" borderColor="black">
		<tbody>
			<tr>
				<td>編號</td>
				<td>要／被保險人<br>姓 名</td>
				<td>被保險人<br>身分證號碼</td>
				<td>被保險人<br>生年月日</td>
				<td>編號</td>
				<td>要／被保險人<br>姓 名</td>
				<td>被保險人<br>身分證號碼</td>
				<td>被保險人<br>生年月日</td>
			</tr>
			<?php 
				$SQL = "SELECT * FROM love_keyin WHERE k_be = 0 and ac_auto = " .SqlFilter($_REQUEST["ac"],"int"). " order by k_time desc";
				$rs = $FunConn->prepare($SQL);
				$rs->execute();
				$result = $rs->fetchAll(PDO::FETCH_ASSOC);
				if($result){											
					for($i=0;$i<count($result);$i+=2){	
						echo "<tr>";
						echo "<td>".($i+1)."</td><td>".$result[$i]["k_name"]."</td><td>".$result[$i]["k_user"]."</td><td>".Date_EN($result[$i]["k_year"],1)."</td>";	
						if($i+2 != count($result)+1){
							echo "<td>".($i+2)."</td><td>".$result[$i+1]["k_name"]."</td><td>".$result[$i+1]["k_user"]."</td><td>".Date_EN($result[$i+1]["k_year"],1)."</td>";
						}
						echo "</tr>";				
					}
				}else{
					call_alert("讀取資料有誤。",0,0);
				}
			?>
		</tbody>
	</table>
	<script type="text/javascript">
		//window.print();
		//window.close();
	</script>
</body>

</html>