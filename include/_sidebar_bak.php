<!-- aside -->
<aside id="aside" class="no-print">
    <nav id="sideNav">
        <ul class="nav nav-list">
        <?php 
            //正則取得檔名
            $nav_filename = preg_replace('/^\/|(new_springsystem\/)/', '', $_SERVER['PHP_SELF']);
            //產生li標籤function
            function nav_list( $url , $title , $icon ="fa-angle-double-right" , $num = "" ){
                $active = "";
                $url == $GLOBALS["nav_filename"] ? $active = "active" : "";
                $num ? $num = "<font color=red>(" . $num . ")</font>" : "";
                return "<li class='" . $active . "'><a href='" . $url . "'><i class='main-icon fa " . $icon . "'></i><span>" . $title . $num . "</span></a></li>";
            }
            
        
            echo nav_list("index.php","個人頁面","fa-dashboard");
            echo nav_list("ad_system_report_list.php","意見反映","fa-exchange");
            echo nav_list("ad_action_note.php","工作日誌","fa-book");
            echo nav_list("ad_announce.php","公告訊息","fa-bullhorn");

            echo "<h3> --- 名單處理 ---</h3>";

            echo nav_list("ad_no_mem.php","未入會資料");
            echo nav_list("ad_invite.php","約見紀錄表");
            echo nav_list("ad_action.php","活動報名資料");
            echo nav_list("ad_quest.php","問卷報名資料");

            echo "<h3> --- 會員服務 ---</h3>";

            echo nav_list("ad_single_optimization.php","優化單身資料庫");
            echo nav_list("ad_single_atm.php","分期服務記錄");
            echo nav_list("ad_mem.php","會員管理系統");
            echo nav_list("ad_advisory.php","諮詢紀錄表");
            echo nav_list("ad_advisory_invite.php","諮詢預訂表");
            echo nav_list("ad_action_service.php","會員服務紀錄查詢");
            echo nav_list("ad_mem_action_re_list.php","活動明細表");
            echo nav_list("springweb_fun3.php","愛情見證");

            echo "<h3> --- 其他功能 ---</h3>";

            echo nav_list("teach_video.php","教學影片");
            echo nav_list("ad_action_list.php","網站活動上傳");
            echo nav_list("ad_single_list.php","秘書履歷");
            echo nav_list("ad_action_list_sign_manager.php","活動異動單列表");
            echo nav_list("ad_action_note.php","工作日誌");
            echo nav_list("singleweb_fun6.php","講師資料");

            echo "<h3> --- 約會專家功能 ---</h3>";

            echo nav_list("ad_photo_check.php","網站照片審核", "fa-angle-double-right" , 24);
            echo nav_list("web_mem.php","網站認證專區");

            echo "<h3> --- 好好玩管理系統 ---</h3>";

            echo nav_list("ad_fun_mem.php","好好玩會員資料");
            echo nav_list("ad_fun_action1.php","好好玩國內報名");
            echo nav_list("ad_fun_action2.php","好好玩國外報名");
            echo nav_list("ad_fun_gmem.php","金卡俱樂部(舊)");
        ?>

        
        </ul>
    </nav>

    <span id="asidebg"></span>
</aside>

<!-- HEADER -->
<header id="header" class="no-print">
    <button id="mobileMenuBtn"></button>
    <span class="logo pull-left">
        <a class="brand" href="index.php"><img src="assets/images/logo.png?v=1.2" height="35"></a>
    </span>

    <div id="rightup_dropdown_showtooltip" class="pull-right margin-right-10">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> JACK[JACK0906]&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="ad_secretary_saletool.php"><i class="fa fa-rocket"></i> 推廣工具</a></li>
            <li><a href="ad_secretary_single_fix.php"><i class="fa fa-edit"></i> 個人資料</a></li>
            <li class="divider"></li>
            <li class="divider"></li>
            <li><a href="login.php?st=out"><i class="fa fa-power-off"></i> 登出</a></li>
        </ul>
    </div>

    <div class="pull-right margin-right-20 hidden-xs hidden-sm" style="line-height:50px;">推廣代號：1319&nbsp;&nbsp;&nbsp;&nbsp;連線位置：<a href="#" style="color:#fff" data-container="body" data-html="true" data-toggle="tooltip" data-placement="bottom" title="最近三次連線位置資訊<br>60.250.92.145-2021/9/7 上午 10:21:00<br>49.216.50.66-2021/9/6 下午 04:54:00<br>49.216.50.66-2021/9/6 下午 04:53:00<br>">60.250.92.145</a> (上午 11:56:06)</div>
</header>