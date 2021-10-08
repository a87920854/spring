<!-- HEADER -->
<header id="header" class="no-print">
    <button id="mobileMenuBtn"></button>
    <span class="logo pull-left">
        <a class="brand" href="index.php"><img src="assets/images/logo.png?v=1.2" height="35"></a>
    </span>
    <div id="rightup_dropdown_showtooltip" class="pull-right margin-right-10">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION["p_other_name"];?>[<?php echo $_SESSION["MM_Username"]?>]&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="ad_secretary_saletool.php"><i class="fa fa-rocket"></i> 推廣工具</a></li>
            <li><a href="ad_secretary_single_fix.php"><i class="fa fa-edit"></i> 個人資料</a></li>
            <li class="divider"></li>
				<?php
				if ( $_SESSION["branch"] != "好好玩旅行社" || $_SESSION["funtourpm"] == "1" ){
					if ( ( $_SESSION["MM_UserAuthorization"] != "single" && $_SESSION["MM_UserAuthorization"] != "action" && $_SESSION["MM_UserAuthorization"] != "love" ) || $_SESSION["funtourpm"] == "1" || $_SESSION["singleweb"] == "1" ){
						
						//黎總經理
						if ( $_SESSION["MM_UserAuthorization"] == "admin" && $_SESSION["branch"] != "好好玩旅行社" ){ 
							echo "<li><a href='ad_admin_index.php'><i class='fa fa-arrow-circle-right'></i> 黎總經理</a></li>";
							echo "<li class='divider'></li>";
						}
						
						//督導管理系統
						if ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "admin" && $_SESSION["branch"] != "好好玩旅行社" ){
							echo "<li><a href='ad_master_index.php'><i class='fa fa-arrow-circle-o-right'></i> 督導管理系統</a></li>";
						}
						
						//春天網站
						if ($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["funtourpm"] == "1" ){
							echo "<li class='divider'></li>";
							if ( $_SESSION["branch"] != "好好玩旅行社" || $_SESSION["funtourpm"] == "1" ){
								echo "<li><a href='springweb_index.php'><i class='fa fa-angle-double-right'></i> 春天網站</a></li>";
							}
							echo "<li><a href='funweb_index.php'><i class='fa fa-angle-double-right'></i> 好好玩網站</a></li>";
						}
						
						//好好玩/春天活動網站
						if ($_SESSION["funtourpm"] == "1" ){
							echo "<li><a href='funspring_index.asp'><i class='fa fa-angle-double-right'></i> 好好玩/春天活動網站</a></li>";
						}
						
						//DateMeNow網站
						if ( $_SESSION["dmnweb"] == "1" ){
							echo "<li><a href='dmnweb_index.asp'><i class='fa fa-angle-double-right'></i> DateMeNow網站</a></li>";
						}

						//約會專家
						if ( $_SESSION["singleweb"] == "1" ){
							echo "<li><a href='singleweb_index.asp'><i class='fa fa-angle-double-right'></i> 約會專家</a></li>";
						}
						
						if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
							echo "<li><a href='ad_reurl.asp'><i class='fa fa-angle-double-right'></i> 短網址管理</a></li>";
						}
						
						//會計部
						if ( $_SESSION["MM_UserAuthorization"] == "pay" || $_SESSION["MM_UserAuthorization"] == "paytop" || $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["branch"] != "好好玩旅行社" ){
							echo "<li><a href='payment_pay_branch.asp'><i class='fa fa-angle-double-right'></i> 會計部</a></li>";
						}
					}
				} ?>
						
            <li class="divider"></li>
            <li><a href="tran_login.php?st=out"><i class="fa fa-power-off"></i> 登出</a></li>
        </ul>
    </div>
    <div class="pull-right margin-right-20 hidden-xs hidden-sm" style="line-height:50px;">推廣代號：<?php echo $_SESSION["pauto"]?>&nbsp;&nbsp;&nbsp;&nbsp;連線位置：<a href="#" style="color:#fff" data-container="body" data-html="true" data-toggle="tooltip" data-placement="bottom" title="最近三次連線位置資訊<br><?php echo $_SESSION["lastip"];?>"><?php echo $_SESSION["ip"];?></a> (<?php echo changeTime($_SESSION["logintime"])?>)</div>
</header>
<!-- //HEADER -->