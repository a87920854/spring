<?php
	//SESSION登入時間判斷
	if ( $action != "login" ){
		if ( $_SESSION["MM_Username"] == "" ){
			echo "<script language=\"javascript\">" ;
			echo "alert('請重新登入');";
			echo "location.href='login.php';";
			echo "</script>";
			exit;
		}
	}
?>
<!doctype html>
<html lang="en-US">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>SD CRM</title>

	<!-- mobile settings -->
	<meta name="viewport" content="width=device-width, maximum-scale=5, minimum-scale=1.0, initial-scale=1, user-scalable=0" />

	<!-- WEB FONTS -->
	<!-- CORE CSS -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- THEME CSS -->
	<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/layout.css?v1.04" rel="stylesheet" type="text/css" />
	<link href="assets/css/color_scheme/orange.css?v1.03" rel="stylesheet" type="text/css" id="color_scheme" />
	<link href="assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/bootstrap.datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/manage.css" rel="stylesheet" type="text/css" />
	<link rel="icon" type="image/ico" href="assets/images/crm_favicon.ico">

</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper" class="clearfix">