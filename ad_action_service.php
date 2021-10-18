<?php
	/*****************************************/
	//檔案名稱：ad_action_service.php
	//後台對應位置：名單/發送記錄>會員服務紀錄查詢
	//改版日期：2021.10.18
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php")
	
	//程式開始 *****
	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}
	check_page_power("ad_action_service");

  sqlv = "*"
  sqlv2 = "count(mem_auto)"

 if request("branch") <> "" then
 	branch = request("branch")
 end if
 
 b2sql = "(mem_branch= '"&session("branch")&"' or ','+mem_branch2+',' LIKE '%,"&session("branch")&",%')"	

	  Select case Session("MM_UserAuthorization")
      case "admin"
      if branch <> "" then
      b2sql = " and (mem_branch= '"&branch&"' or ','+mem_branch2+',' LIKE '%,"&branch&",%')"	
      else
      b2sql = ""
      end if
      sqls = "SELECT "&sqlv&" FROM member_data WHERE mem_level = 'mem'"&b2sql
	    sqls2 = "SELECT "&sqlv2&" as total_size FROM member_data WHERE mem_level = 'mem'"&b2sql	   	    
	  case "branch","love","action","teacher"
      sqls = "SELECT "&sqlv&" FROM member_data WHERE mem_level = 'mem' and "&b2sql
	    sqls2 = "SELECT "&sqlv2&" as total_size FROM member_data WHERE mem_level = 'mem' and "&b2sql
	    branch = session("branch")
	  case else
	  response.end
	  	sqls = ""
	  	sqls2 = ""
      End Select
      
      keyword_type = request("keyword_type")
      
      select case keyword_type
      	case "s2"
      	  sqlss = sqlss & " and mem_mobile = '"&request("keyword")&"'"	
      	case "s17"
      	  sqlss = sqlss & " and mem_phone = '"&request("keyword")&"'"	
      	case "s3"
      	  sqlss = sqlss & " and mem_name like N'%"&request("keyword")&"%'"	
      	case "s4"
      	  sqlss = sqlss & " and mem_num = '"&request("keyword")&"'"	
      	case "s5"
      	  sqlss = sqlss & " and si_account = '"&request("keyword")&"'"	
      	case "s6"
      	  sqlss = sqlss & " and mem_username = '"&request("keyword")&"'"	
      	case "s22"
      	  sqlss = sqlss & " and mem_mail = '"&request("keyword")&"'"	
        case else
        	sqlss = sqlss & " and 1=0"
      end select

sqls = sqls & sqlss

%>

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">會員服務紀錄查詢</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員服務紀錄查詢</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p style="clear:both">
                <form id="searchform" action="ad_action_service.php" method="post" target="_self" onsubmit="return chk_search_form()" class="form-inline pull-left">

                    <select name="keyword_type" id="keyword_type" class="form-control">
                        <option value="s2">手機</option>
                        <option value="s17">電話</option>
                        <option value="s3">姓名</option>
                        <option value="s4">編號</option>
                        <option value="s5">約會專家帳號</option>
                        <option value="s6">身分證字號</option>
                        <option value="s22">電子信箱</option>
                    </select>
                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                </form>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th></th>
                            <th width=50>編號</th>
                            <th>姓名</th>
                            <th width=50>性別</th>
                            <th>生日</th>
                            <th width=60>學歷</th>
                            <th width=180>秘書</th>
                            <th width=60>照片</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>102880</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=102880" target="_blank">方毓廷</a></td>
                            <td class="center">男</td>
                            <td class="center">1980/9/28&nbsp;&nbsp;41 歲</td>
                            <td class="center">碩士</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=102880" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>102702</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=102702" target="_blank">許心如</a></td>
                            <td class="center">女</td>
                            <td class="center">1983/2/6&nbsp;&nbsp;38 歲</td>
                            <td class="center">專科</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                <a href="../photo/102702_1.jpg?t=4094" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=102702" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>104736</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=104736" target="_blank">林宜瑾</a></td>
                            <td class="center">女</td>
                            <td class="center">1985/8/27&nbsp;&nbsp;36 歲</td>
                            <td class="center">專科</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 台北督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=104736" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>106292</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=106292" target="_blank">藍安筠</a></td>
                            <td class="center">女</td>
                            <td class="center">1978/1/14&nbsp;&nbsp;43 歲</td>
                            <td class="center">高職</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 陳美琴
                            </td>
                            <td class="center">
                                <a href="../photo/106292_2.jpg?t=2341" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=106292" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>106662</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=106662" target="_blank">劉怡君</a></td>
                            <td class="center">女</td>
                            <td class="center">1979/11/16&nbsp;&nbsp;42 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=106662" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>106663</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=106663" target="_blank">張美華</a></td>
                            <td class="center">女</td>
                            <td class="center">1981/1/6&nbsp;&nbsp;40 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 陳美琴
                            </td>
                            <td class="center">
                                <a href="../photo/106663.jpg?t=397" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=106663" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>106944</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=106944" target="_blank">梁小燕</a></td>
                            <td class="center">女</td>
                            <td class="center">1972/6/8&nbsp;&nbsp;49 歲</td>
                            <td class="center">高中</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 陳美琴
                            </td>
                            <td class="center">
                                <a href="../photo/106944_1.jpg?t=2212" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=106944" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>150570</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=150570" target="_blank">張綵盈</a></td>
                            <td class="center">女</td>
                            <td class="center">1981/2/8&nbsp;&nbsp;40 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=150570" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>167688</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=167688" target="_blank">陳卉綺</a></td>
                            <td class="center">女</td>
                            <td class="center">1980/10/27&nbsp;&nbsp;41 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 陳美琴
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=167688" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>172544</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=172544" target="_blank">李卉嫆</a></td>
                            <td class="center">女</td>
                            <td class="center">1979/6/4&nbsp;&nbsp;42 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 台北督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=172544" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>172545</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=172545" target="_blank">陳睿涵</a></td>
                            <td class="center">女</td>
                            <td class="center">1988/12/5&nbsp;&nbsp;33 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 台北督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=172545" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>172820</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=172820" target="_blank">吳芳霓</a></td>
                            <td class="center">女</td>
                            <td class="center">1985/5/19&nbsp;&nbsp;36 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 台北督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=172820" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>174585</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=174585" target="_blank">蘇婉瑄</a></td>
                            <td class="center">女</td>
                            <td class="center">1982/4/14&nbsp;&nbsp;39 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 陳美琴
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=174585" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>177486</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=177486" target="_blank">范雅涵</a></td>
                            <td class="center">女</td>
                            <td class="center">1981/7/21&nbsp;&nbsp;40 歲</td>
                            <td class="center">碩士</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 陳美琴
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=177486" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>178386</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=178386" target="_blank">胡佐依</a></td>
                            <td class="center">女</td>
                            <td class="center">1982/10/16&nbsp;&nbsp;39 歲</td>
                            <td class="center">專科</td>

                            <td class="center">
                                <font color=green>受理：</font>台中 - 台中督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=178386" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>178413</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=178413" target="_blank">郭珮琪</a></td>
                            <td class="center">女</td>
                            <td class="center">1967/9/10&nbsp;&nbsp;54 歲</td>
                            <td class="center">專科</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 台北督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=178413" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>187060</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=187060" target="_blank">祝志良</a></td>
                            <td class="center">男</td>
                            <td class="center">1975/7/29&nbsp;&nbsp;46 歲</td>
                            <td class="center">高職</td>

                            <td class="center">
                                <font color=green>受理：</font>台中 - 陳素娟
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=187060" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>191978</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=191978" target="_blank">劉姿妙</a></td>
                            <td class="center">女</td>
                            <td class="center">1981/11/9&nbsp;&nbsp;40 歲</td>
                            <td class="center">高中</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=191978" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>192186</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=192186" target="_blank">徐千惠</a></td>
                            <td class="center">女</td>
                            <td class="center">1978/12/21&nbsp;&nbsp;43 歲</td>
                            <td class="center">專科</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                <a href="../photo/192186.jpg?t=5692" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=192186" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>193927</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=193927" target="_blank">謝孟純</a></td>
                            <td class="center">女</td>
                            <td class="center">1986/8/7&nbsp;&nbsp;35 歲</td>
                            <td class="center">專科</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=193927" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>203163</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=203163" target="_blank">林婷婷</a></td>
                            <td class="center">女</td>
                            <td class="center">1989/8/4&nbsp;&nbsp;32 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 台北督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=203163" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>205189</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=205189" target="_blank">陳瀅筑</a></td>
                            <td class="center">女</td>
                            <td class="center">1983/12/2&nbsp;&nbsp;38 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 陳美琴
                            </td>
                            <td class="center">
                                <a href="../photo/205189.jpg?t=7849" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=205189" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>211479</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=211479" target="_blank">林慧君</a></td>
                            <td class="center">女</td>
                            <td class="center">1981/10/11&nbsp;&nbsp;40 歲</td>
                            <td class="center">碩士</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=211479" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>221348</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=221348" target="_blank">劉欣宜</a></td>
                            <td class="center">女</td>
                            <td class="center">1981/9/19&nbsp;&nbsp;40 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台中 - 賴語蓁
                            </td>
                            <td class="center">
                                <a href="../photo/boy.jpg?t=5455" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=221348" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>235291</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=235291" target="_blank">朱霈宜</a></td>
                            <td class="center">女</td>
                            <td class="center">1988/7/5&nbsp;&nbsp;33 歲</td>
                            <td class="center">高職</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=235291" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>235796</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=235796" target="_blank">陳尚億</a></td>
                            <td class="center">男</td>
                            <td class="center">1983/1/19&nbsp;&nbsp;38 歲</td>
                            <td class="center">專科</td>

                            <td class="center">
                                <font color=green>受理：</font>台中 - 江慧
                            </td>
                            <td class="center">
                                <a href="../photo/235796_1.jpg?t=4785" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=235796" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>236035</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=236035" target="_blank">高向良</a></td>
                            <td class="center">女</td>
                            <td class="center">1982/7/2&nbsp;&nbsp;39 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 桃園會館
                            </td>
                            <td class="center">
                                <a href="../photo/236035_1.jpg?t=7234" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=236035" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>238910</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=238910" target="_blank">楊曉菁</a></td>
                            <td class="center">女</td>
                            <td class="center">1979/5/22&nbsp;&nbsp;42 歲</td>
                            <td class="center">高職</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 台北督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=238910" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>246459</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=246459" target="_blank">陳涵琳</a></td>
                            <td class="center">女</td>
                            <td class="center">1979/11/12&nbsp;&nbsp;42 歲</td>
                            <td class="center">專科</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                <a href="../photo/246459.jpg?t=7944" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=246459" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>246592</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=246592" target="_blank">黃蕙萍</a></td>
                            <td class="center">女</td>
                            <td class="center">1981/11/16&nbsp;&nbsp;40 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                <a href="../photo/246592.jpg?t=3512" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=246592" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>277411</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=277411" target="_blank">吳盈盈</a></td>
                            <td class="center">女</td>
                            <td class="center">1985/2/19&nbsp;&nbsp;36 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹
                            </td>
                            <td class="center">
                                <a href="../photo/277411.jpg?t=8085" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=277411" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>288900</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=288900" target="_blank">吳彥穎</a></td>
                            <td class="center">女</td>
                            <td class="center">1981/9/16&nbsp;&nbsp;40 歲</td>
                            <td class="center">碩士</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 台北督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=288900" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>291274</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=291274" target="_blank">王兆玉</a></td>
                            <td class="center">女</td>
                            <td class="center">1990/1/1&nbsp;&nbsp;31 歲</td>
                            <td class="center">高職</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 台北督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=291274" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>293101</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=293101" target="_blank">徐宗萱</a></td>
                            <td class="center">女</td>
                            <td class="center">1982/3/6&nbsp;&nbsp;39 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=293101" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>295040</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=295040" target="_blank">蔡宜君</a></td>
                            <td class="center">女</td>
                            <td class="center">1987/3/10&nbsp;&nbsp;34 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=295040" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>298613</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=298613" target="_blank">陳曦</a></td>
                            <td class="center">女</td>
                            <td class="center">1982/11/23&nbsp;&nbsp;39 歲</td>
                            <td class="center">專科</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 桃園會館
                            </td>
                            <td class="center">
                                <a href="../photo/298613.jpg?t=7412" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=298613" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>304905</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=304905" target="_blank">徐筱嵐</a></td>
                            <td class="center">女</td>
                            <td class="center">1986/8/9&nbsp;&nbsp;35 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 台北督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=304905" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>305120</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=305120" target="_blank">吳采融</a></td>
                            <td class="center">女</td>
                            <td class="center">1984/2/25&nbsp;&nbsp;37 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 桃園會館
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=305120" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>312293</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=312293" target="_blank">彭婕妤</a></td>
                            <td class="center">女</td>
                            <td class="center">1982/2/12&nbsp;&nbsp;39 歲</td>
                            <td class="center">碩士</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=312293" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>326543</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=326543" target="_blank">鄭玉梅</a></td>
                            <td class="center">女</td>
                            <td class="center">1986/10/5&nbsp;&nbsp;35 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=326543" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>332433</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=332433" target="_blank">劉國維</a></td>
                            <td class="center">男</td>
                            <td class="center">1982/11/23&nbsp;&nbsp;39 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台中 - 台中督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=332433" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>332434</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=332434" target="_blank">劉國維</a></td>
                            <td class="center">男</td>
                            <td class="center">1982/11/23&nbsp;&nbsp;39 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台中 - 台中督導
                            </td>
                            <td class="center">
                                <a href="../photo/332434_1.jpg?t=9667" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=332434" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>337996</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=337996" target="_blank">劉玲宜</a></td>
                            <td class="center">女</td>
                            <td class="center">1980/11/17&nbsp;&nbsp;41 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹
                            </td>
                            <td class="center">
                                <a href="../photo/337996_1.jpg?t=4070" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=337996" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>348193</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=348193" target="_blank">黃雅萍</a></td>
                            <td class="center">女</td>
                            <td class="center">1984/2/11&nbsp;&nbsp;37 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                <a href="../photo/348193.jpg?t=1739" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=348193" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>356719</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=356719" target="_blank">林志清</a></td>
                            <td class="center">男</td>
                            <td class="center">1974/11/21&nbsp;&nbsp;47 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台中 - 賴語蓁
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=356719" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>367260</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=367260" target="_blank">吳益昌</a></td>
                            <td class="center">男</td>
                            <td class="center">1965/10/21&nbsp;&nbsp;56 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台中 - 亞芳
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=367260" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>402029</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=402029" target="_blank">黃仕良</a></td>
                            <td class="center">男</td>
                            <td class="center">1978/4/9&nbsp;&nbsp;43 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>新竹 - 王敏之
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=402029" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>405236</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=405236" target="_blank">李租鳴</a></td>
                            <td class="center">男</td>
                            <td class="center">1969/12/13&nbsp;&nbsp;52 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>高雄 - 高雄督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=405236" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>405969</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=405969" target="_blank">楊士萍</a></td>
                            <td class="center">女</td>
                            <td class="center">1984/9/16&nbsp;&nbsp;37 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台南 - 杜佳倩
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=405969" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>407132</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=407132" target="_blank">劉恭廷</a></td>
                            <td class="center">男</td>
                            <td class="center">1971/11/7&nbsp;&nbsp;50 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>高雄 - 林錦雯
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=407132" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 55 筆、第 1 頁／共 2 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_action_service.php?topage=1&keyword=&keyword_type=s2>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_action_service.php?topage=2&keyword=&keyword_type=s2 class='text'>2</a></li>
                    <li><a href=/ad_action_service.php?topage=2&keyword=&keyword_type=s2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_action_service.php?topage=2&keyword=&keyword_type=s2 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_action_service.php?topage=1&keyword=&keyword_type=s2" selected>1</option>
                            <option value="/ad_action_service.php?topage=2&keyword=&keyword_type=s2">2</option>
                        </select></li>
                </ul>
            </div>

        </div>
        <!--/span-->

    </div>
    <!--/row-->

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    function chk_search_form() {

        return true;
    }
</script>