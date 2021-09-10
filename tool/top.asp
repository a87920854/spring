<%
IF Session("MM_Username") = "" Then Call Alert("請重新登入。","../login.html",0) End IF
%>
<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">   
    <title>線上作業前置準備&資源整合</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">    
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <ul class="nav">
                        	  <li><a href="index.asp">首頁</a></li>
                            <li><a href="index.asp#guest-card">訪客資料卡</a></li>
                            <!--<li><a href="index.asp#sign-paper">簽約單</a></li>
                            <li><a href="index.asp#single-paper">單身切結書</a></li>-->
                            <li><a href="index.asp#pricing-plans">收費表</a></li>
                            <!--<li><a href="index.asp#payment">刷卡付費</a></li>-->
                            <li class="dropdown">
                               <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                 輔助工具
                              </a>                            
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="prepare.asp">線上作業準備</a>
                                <a class="dropdown-item" href="index.asp#line">加LINE ID教學</a>
                                <a class="dropdown-item" href="index.asp#interview">訪談重點圖</a>
                                <a class="dropdown-item" href="index.asp#download">圖檔資料庫</a>
                              </div>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->