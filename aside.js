const aside = `
    <nav id="sideNav">
      <ul class="nav nav-list">	

        <li><a href="index.asp"><i class="main-icon fa fa-dashboard"></i><span> 個人頁面</span></a></li>
        <li><a href="ad_system_report_list.asp"><i class="main-icon fa fa-exchange"></i><span> 意見反映</span></a></li>			
        <li><a href="ad_action_note.asp"><i class="main-icon fa fa-book"></i><span> 工作日誌</span></a></li>		
        <li><a href="ad_announce.asp"><i class="main-icon fa fa-bullhorn"></i><span> 公告訊息</span></a></li>

        <h3> --- 名單處理---</h3>
          
        <li><a href="ad_no_mem.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 未入會資料</span></a></li>
        <li><a href="ad_invite.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 約見紀錄表</span></a></li>
        <li><a href="ad_action.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 活動報名資料</span></a></li>			
        <li><a href="ad_quest.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 問卷報名資料</span></a></li>            
            
        <h3> --- 會員服務---</h3>

        <li><a href="ad_single_optimization.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 優化單身資料庫</span></a></li>
        <li><a href="ad_single_atm.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 分期服務記錄</span></a></li>
        <li><a href="ad_mem.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 會員管理系統</span></a></li>
        <li><a href="ad_advisory.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢紀錄表</span></a></li>
        <li><a href="ad_advisory_invite.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢預訂表</span></a></li>
        <li><a href="ad_action_service.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 會員服務紀錄查詢</span></a></li>
        <li><a href="ad_mem_action_re_list.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 活動明細表</span></a></li>
        <li><a href="springweb_fun3.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 愛情見證</span></a></li>

        <h3> --- 其他功能---</h3>	

        <li><a href="teach_video.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 教學影片</span></a></li>
        <li><a href="ad_action_list.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 網站活動上傳</span></a></li>
        <li><a href="ad_single_list.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 秘書履歷</span></a></li>
        <li><a href="ad_action_list_sign_manager.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 活動異動單列表</span></a></li>
        <li><a href="ad_action_note.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 工作日誌</span></a></li>						
        <li><a href="singleweb_fun6.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 講師資料</span></a></li>																														
                                                            
        <h3> --- 約會專家功能---</h3>
          
        <li><a href="ad_photo_check.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 網站照片審核<font color=red>(24)</font></span></a></li>
        <li><a href="web_mem.asp?c=1"><i class="main-icon fa fa-angle-double-right"></i><span> 網站認證專區</span></a></li>
          
        <h3> --- 好好玩管理系統---</h3>

        <li><a href="ad_fun_mem.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩會員資料</span></a></li>						
        <li><a href="ad_fun_action1.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內報名</span></a></li>						
        <li><a href="ad_fun_action2.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國外報名</span></a></li>
        <li><a href="ad_fun_gmem.asp"><i class="main-icon fa fa-angle-double-right"></i><span> 金卡俱樂部(舊)</span></a></li>  
                  
      </ul>
    </nav>

    <span id="asidebg"></span>
  
`
document.getElementById('aside').innerHTML = aside;