<?php
//SESSION登入時間判斷
	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}
	//if ( $_SESSION["MM_UserAuthorization"] != "admin" ){ call_alert("您沒有權限", 1 ,0); } 原程式被mark
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
	<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
	<link href="assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/bootstrap.datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
	<link rel="icon" type="image/ico" href="assets/images/crm_favicon.ico">

</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper" class="clearfix">