<?php
require_once("./include/_function.php");

	// $arr = [1,2,3,4,5];
	// $date1=date_create("2013/03/15");
	// $date2=date_create("2013/12/12");
	// $diff=date_diff($date1,$date2);

	// // echo $diff->days; 

	// // echo Date_EN("2014-10-18 11:17:23",2);
	// $t='2018-04-26 16:30:17.287';
	// echo $t.'<br>';
	// echo date("Y/m/d",strtotime($t)).'<br>';

	$mystring = "This is a PHP program.";

	if (strpos($mystring, "program.") !== false) {
		echo("True");
	}

?>