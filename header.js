const header = `
    <button id="mobileMenuBtn"></button>
    <span class="logo pull-left">
        <a class="brand" href="index.asp"><img src="assets/images/logo.png?v=1.2" height="35"></a>					
    </span>

    <div id="rightup_dropdown_showtooltip" class="pull-right margin-right-10">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> JACK[JACK0906]&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="ad_secretary_saletool.asp"><i class="fa fa-rocket"></i> 推廣工具</a></li>
            <li><a href="ad_secretary_single_fix.asp"><i class="fa fa-edit"></i> 個人資料</a></li>		
            <li class="divider"></li>
            <li class="divider"></li>
            <li><a href="login.asp?st=out"><i class="fa fa-power-off"></i> 登出</a></li>
        </ul>
    </div>


    <div class="pull-right margin-right-20 hidden-xs hidden-sm" style="line-height:50px;">推廣代號：1319&nbsp;&nbsp;&nbsp;&nbsp;連線位置：<a href="#" style="color:#fff" data-container="body" data-html="true" data-toggle="tooltip" data-placement="bottom" title="最近三次連線位置資訊<br>60.250.92.145-2021/9/7 上午 10:21:00<br>49.216.50.66-2021/9/6 下午 04:54:00<br>49.216.50.66-2021/9/6 下午 04:53:00<br>">60.250.92.145</a> (上午 11:56:06)</div>
`

document.getElementById('header').innerHTML = header;