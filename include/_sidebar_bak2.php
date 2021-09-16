<!-- aside -->
<aside id="aside" class="no-print">
    <nav id="sideNav">
        <ul class="nav nav-list">
            <?php
                //正則取得檔名
                $nav_filename = preg_replace('/^\/|(new_springsystem\/)/', '', $_SERVER['PHP_SELF']);
                //判斷li是否active
                function nav_active($url){
                    $active = "";
                    $url == $GLOBALS["nav_filename"] ? $active = "active" : "";
                    return $active;
                }
            ?>
            
            <li class="<?php echo nav_active('index.php') ?>"><a href="index.php"><i class="main-icon fa fa-dashboard"></i><span> 個人頁面</span></a></li>
            <li class="<?php echo nav_active('ad_system_report_list.php') ?>"><a href="ad_system_report_list.php"><i class="main-icon fa fa-exchange"></i><span> 意見反映</span></a></li>
            <li class="<?php echo nav_active('ad_action_note.php') ?>"><a href="ad_action_note.php"><i class="main-icon fa fa-book"></i><span> 工作日誌</span></a></li>
            <li class="<?php echo nav_active('ad_announce.php') ?>"><a href="ad_announce.php"><i class="main-icon fa fa-bullhorn"></i><span> 公告訊息</span></a></li>

            <h3> --- 名單處理---</h3>

            <li class="<?php echo nav_active("ad_no_mem.php") ?>"><a href="ad_no_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 未入會資料</span></a></li>
            <li class="<?php echo nav_active("ad_invite.php") ?>"><a href="ad_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約見紀錄表</span></a></li>
            <li class="<?php echo nav_active("ad_action.php") ?>"><a href="ad_action.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動報名資料</span></a></li>
            <li class="<?php echo nav_active("ad_quest.php") ?>"><a href="ad_quest.php"><i class="main-icon fa fa-angle-double-right"></i><span> 問卷報名資料</span></a></li>

            <h3> --- 會員服務---</h3>

            <li class="<?php echo nav_active("ad_single_optimization.php") ?>"><a href="ad_single_optimization.php"><i class="main-icon fa fa-angle-double-right"></i><span> 優化單身資料庫</span></a></li>
            <li class="<?php echo nav_active("ad_single_atm.php") ?>"><a href="ad_single_atm.php"><i class="main-icon fa fa-angle-double-right"></i><span> 分期服務記錄</span></a></li>
            <li class="<?php echo nav_active("ad_mem.php") ?>"><a href="ad_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員管理系統</span></a></li>
            <li class="<?php echo nav_active("ad_advisory.php") ?>"><a href="ad_advisory.php"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢紀錄表</span></a></li>
            <li class="<?php echo nav_active("ad_advisory_invite.php") ?>"><a href="ad_advisory_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢預訂表</span></a></li>
            <li class="<?php echo nav_active("ad_action_service.php") ?>"><a href="ad_action_service.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員服務紀錄查詢</span></a></li>
            <li class="<?php echo nav_active("ad_mem_action_re_list.php") ?>"><a href="ad_mem_action_re_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動明細表</span></a></li>
            <li class="<?php echo nav_active("springweb_fun3.php") ?>"><a href="springweb_fun3.php"><i class="main-icon fa fa-angle-double-right"></i><span> 愛情見證</span></a></li>

            <h3> --- 其他功能---</h3>

            <li class="<?php echo nav_active("teach_video.php") ?>"><a href="teach_video.php"><i class="main-icon fa fa-angle-double-right"></i><span> 教學影片</span></a></li>
            <li class="<?php echo nav_active("ad_action_list.php") ?>"><a href="ad_action_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 網站活動上傳</span></a></li>
            <li class="<?php echo nav_active("ad_single_list.php") ?>"><a href="ad_single_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 秘書履歷</span></a></li>
            <li class="<?php echo nav_active("ad_action_list_sign_manager.php") ?>"><a href="ad_action_list_sign_manager.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動異動單列表</span></a></li>
            <li class="<?php echo nav_active("ad_action_note.php") ?>"><a href="ad_action_note.php"><i class="main-icon fa fa-angle-double-right"></i><span> 工作日誌</span></a></li>
            <li class="<?php echo nav_active("singleweb_fun6.php") ?>"><a href="singleweb_fun6.php"><i class="main-icon fa fa-angle-double-right"></i><span> 講師資料</span></a></li>

            <h3> --- 約會專家功能---</h3>

            <li class="<?php echo nav_active("ad_photo_check.php") ?>"><a href="ad_photo_check.php"><i class="main-icon fa fa-angle-double-right"></i><span> 網站照片審核<font color=red>(24)</font></span></a></li>
            <li class="<?php echo nav_active("web_mem.php?c=1") ?>"><a href="web_mem.php?c=1"><i class="main-icon fa fa-angle-double-right"></i><span> 網站認證專區</span></a></li>

            <h3> --- 好好玩管理系統---</h3>

            <li class="<?php echo nav_active("ad_fun_mem.php") ?>"><a href="ad_fun_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩會員資料</span></a></li>
            <li class="<?php echo nav_active("ad_fun_action1.php") ?>"><a href="ad_fun_action1.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內報名</span></a></li>
            <li class="<?php echo nav_active("ad_fun_action2.php") ?>"><a href="ad_fun_action2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國外報名</span></a></li>
            <li class="<?php echo nav_active("ad_fun_gmem.php") ?>"><a href="ad_fun_gmem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 金卡俱樂部(舊)</span></a></li>

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