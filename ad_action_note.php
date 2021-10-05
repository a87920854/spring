<?php
	require_once("./include/_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");

	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.html",0); }

	//刪除
	if ( SqlFilter($_REQUEST["st"],"tab") == "del" ){
		$SQL = "Delete From action_log Where auton=".SqlFilter($_REQUEST["an"],"tab");
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		header(location:"reload_window.asp?m=資料刪除中...");
		exit;
	}

	//顯示筆數
	$default_sql_num = 500; //預設顯示筆數

	if ( SqlFilter($_REQUEST["vst"] == "full" ){
		$sqlv = "*";
		$sqlv2 = "count(auton)";
	}else{
		$sqlv = "top "&default_sql_num&" *";
		$sqlv2 = "count(auton)";
	}
	
	switch ($_SESSION["MM_UserAuthorization"]){
		case "admin":
			if ( $_SESSION["branch"] == "好好玩旅行社" ){
				$sqls = "Select ".$sqlv." From action_log Where types='list' and branch='".$_SESSIONsession("branch")&"'"
      sqls2 = "SELECT "&sqlv2&" as total_size FROM action_log Where types='list' and branch='"&session("branch")&"'"
      else
      sqls = "SELECT "&sqlv&" FROM action_log Where types='list'"
      sqls2 = "SELECT "&sqlv2&" as total_size FROM action_log Where types='list'"
      end if
      case "branch","manager"
      sqls = "SELECT "&sqlv&" FROM action_log Where types='list' and branch='"&session("branch")&"'"
      sqls2 = "SELECT "&sqlv2&"  as total_size FROM action_log Where types='list' and branch='"&session("branch")&"'"
	    case "action"
	  	if session("action_level") = 1 then
      sqls = "SELECT "&sqlv&" FROM action_log Where types='list' and (branch='台南' or branch='高雄') and singlelv='action'"
      sqls2 = "SELECT "&sqlv2&"  as total_size FROM action_log Where types='list' and (branch='台南' or branch='高雄') and singlelv='action'"
	  	elseif session("action_level") = 2 then
      sqls = "SELECT "&sqlv&" FROM action_log Where types='list' and (branch='台北' or branch='桃園' or branch='新竹' or branch='台中') and singlelv='action'"
      sqls2 = "SELECT "&sqlv2&"  as total_size FROM action_log Where types='list' and (branch='台北' or branch='桃園' or branch='新竹' or branch='台中') and singlelv='action'"
	  	elseif session("action_level") = 3 then
      sqls = "SELECT "&sqlv&" FROM action_log Where types='list' and not branch='好好玩旅行社' and singlelv='action'"
      sqls2 = "SELECT "&sqlv2&"  as total_size FROM action_log Where types='list' and not branch='好好玩旅行社' and singlelv='action'"
	  	else
      sqls = "SELECT "&sqlv&" FROM action_log Where types='list' and single='"&session("MM_Username")&"'"
      sqls2 = "SELECT "&sqlv2&"  as total_size FROM action_log Where types='list' and single='"&session("MM_Username")&"'"
      end if
      
      case else
      sqls = "SELECT "&sqlv&" FROM action_log Where types='list' and single='"&session("MM_Username")&"'"
      sqls2 = "SELECT "&sqlv2&"  as total_size FROM action_log Where types='list' and single='"&session("MM_Username")&"'"      
      
	  End Select

If request("d1") <> "" and request("d2") <> "" Then
sqlss = sqlss & " and dates between '"&request("d1")&" 00:00' and '"&request("d2")&" 23:59'"
End If

If request("branch") <> "" Then
 sqlss = sqlss & " and branch = '" & Replace(request("branch"), "'", "''") & "'"
End If

If request("single") <> "" Then
 sqlss = sqlss & " and single = '" & Replace(request("single"), "'", "''") & "'"
End If

If request("wtype") <> "" Then
 sqlss = sqlss & " and wtype = '" + Replace(request("wtype"), "'", "''") + "'"
End If

If request("keyword") <> "" Then
 sqlss = sqlss & " and (title like '%" + Replace(request("keyword"), "'", "''") + "%' or supplier like '%" + Replace(request("keyword"), "'", "''") + "%')"
End If
sqls = sqls & sqlss & " order by auton desc"

sqls2 = sqls2 & sqlss
%>



?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">工作日誌</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>工作日誌 - 工作項目列表 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p>
                        <a href="javascript:Mars_popup('ad_action_note_add.php','','width=710,height=400,top=200,left=200')" class="btn btn-success">新增工作日誌</a>
                        <a href="ad_action_note.php" class="btn btn-danger">工作項目列表</a>
                        <a href="ad_action_note_new.php" class="btn btn-warning">最新聯絡情形</a>

                    <form name="form1" method="post" action="?vst=full" class="form-inline" onsubmit="return chk_form()">
                        　
                        工作日期：
                        <input type="text" name="d1" id="d1" class="datepicker" autocomplete="off" value=""> 至 <input type="text" name="d2" id="d2" class="datepicker" autocomplete="off" value="">
                        <select name="branch" id="branch" class="form-control">
                            <option value="">選擇會館</option>
                            <option value="台北">台北</option>
                            <option value="桃園">桃園</option>
                            <option value="新竹">新竹</option>
                            <option value="台中">台中</option>
                            <option value="台南">台南</option>
                            <option value="高雄">高雄</option>
                            <option value="八德">八德</option>
                            <option value="約專">約專</option>
                            <option value="迷你約">迷你約</option>
                            <option value="總管理處">總管理處</option>
                            <option value="好好玩旅行社">好好玩旅行社</option>
                        </select>
                        <select name="single" id="single">
                            <option value="">請選擇</option>
                        </select>

                        <select name="wtype" id="wtype" class="form-control">
                            <option value="">工作類型</option>
                            <option value="會館事務">會館事務</option>
                            <option value="會員服務">會員服務</option>
                            <option value="廠商開發">廠商開發</option>
                            <option value="舉辦活動">舉辦活動</option>
                            <option value="活動推廣">活動推廣</option>
                            <option value="其他">其他</option>
                        </select>
                        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="請輸入要搜尋的工作項目或廠商">

                        <input type="submit" name="Submit" class="btn btn-default" value="送出">
                    </form>
                    </p>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=60>工作類型</th>
                            <th width=50>日期</th>
                            <th width=50>會館</th>
                            <th width=80>秘書</th>
                            <th>工作項目</th>
                            <th width=100>今日回報</th>
                            <th width=200>聯絡情形</th>
                            <th width=160>最後聯絡</th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center">會員服務</td>
                            <td align="center">2021/9/8</td>
                            <td align="center">八德</td>
                            <td align="center">柯婉儀</td>
                            <td align="left">◇公司上班◇<br>1.會員聯絡<br>2.相關表單維護<br>3.會員關懷<br>4.會館排約/排後關懷<br>5.會員交接-張威烈、陳宇朋</td>
                            <td align="center">
                                <a href="ad_report_list.php?s6=八德&s7=A221335725&y1=2021/9/8&y2=2021/9/8" target="_blank">26 / 27</a>
                            </td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11062','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11062','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11062','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">2021/9/8</td>
                            <td align="center">八德</td>
                            <td align="center">劉宜姍</td>
                            <td align="left">14:30~17:00訪談一男 自成交總額4萬 先付20000 再分2個月各10000尾款<br></td>
                            <td align="center">
                                <a href="ad_report_list.php?s6=八德&s7=R223400283&y1=2021/9/8&y2=2021/9/8" target="_blank">23 / 24</a>
                            </td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11061','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11061','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11061','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">其他</td>
                            <td align="center">2021/9/8</td>
                            <td align="center">高雄</td>
                            <td align="center">郭文旗</td>
                            <td align="left">搜尋 社群經營 收集名單 的行銷方法<br></td>
                            <td align="center">
                                0 / 0</td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11060','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11060','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11060','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">2021/9/8</td>
                            <td align="center">八德</td>
                            <td align="center">于庭萱 LiLy</td>
                            <td align="left">公司上班<br>1:30-2:00陌call<br>2:00-3:00練習訪談<br>3:00-6:00dmn新舊名單<br>6:00-6:30吃飯<br>6:30-9:00dmn新舊名單<br><br>公司名單通數:76<br>邀約:3<br><br><br>追蹤今日訪客到訪狀態<br><br>外館明天未接訪客再提醒<br><br>舊名單持續聯絡中，已寄訊推播<br><br>瞭解前幾日因疫情未到，或已邀約未到之訪客原因，約視訊訪談時</td>
                            <td align="center">
                                <a href="ad_report_list.php?s6=八德&s7=E224763574&y1=2021/9/8&y2=2021/9/8" target="_blank">75 / 76</a>
                            </td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11059','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11059','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11059','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">2021/9/8</td>
                            <td align="center">八德</td>
                            <td align="center">杜佳臻 Macy</td>
                            <td align="left">公司上班<br>2:10-3:40 練攤卡<br>3:50-4:30 陌call<br>4:30-6:30 dmn舊名單<br>6:30-7:00 晚餐<br>7:00-9:00 dmn舊名單<br>邀約: 1 桃園<br></td>
                            <td align="center">
                                <a href="ad_report_list.php?s6=八德&s7=F228382101&y1=2021/9/8&y2=2021/9/8" target="_blank">95 / 97</a>
                            </td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11058','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11058','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11058','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">2021/9/8</td>
                            <td align="center">八德</td>
                            <td align="center">劉宜姍</td>
                            <td align="left">邀約:1女 9/10 </td>
                            <td align="center">
                                <a href="ad_report_list.php?s6=八德&s7=R223400283&y1=2021/9/8&y2=2021/9/8" target="_blank">23 / 24</a>
                            </td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11057','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11057','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11057','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">2021/9/8</td>
                            <td align="center">八德</td>
                            <td align="center">林嘉芮 芮芮</td>
                            <td align="left">DMN 83 CALL<br>陌call 1400-1430 <br>已邀1人</td>
                            <td align="center">
                                <a href="ad_report_list.php?s6=八德&s7=H224439638&y1=2021/9/8&y2=2021/9/8" target="_blank">82 / 83</a>
                            </td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11056','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11056','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11056','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">2021/9/8</td>
                            <td align="center">八德</td>
                            <td align="center">八德督導</td>
                            <td align="left">1.推(9/12文昭)線上課程<br>2.分發名單<br>3.活動處理(報名/取消)</td>
                            <td align="center">
                                <a href="ad_report_list.php?s6=八德&s7=80662419&y1=2021/9/8&y2=2021/9/8" target="_blank">111 / 206</a>
                            </td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11055','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11055','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11055','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會員服務</td>
                            <td align="center">2021/9/7</td>
                            <td align="center">八德</td>
                            <td align="center">柯婉儀</td>
                            <td align="left">◇公司上班◇<br>1.會員聯絡<br>2.相關表單維護<br>3.會員關懷<br>4.會館排約/排後關懷<br></td>
                            <td align="center">
                                <a href="ad_report_list.php?s6=八德&s7=A221335725&y1=2021/9/7&y2=2021/9/7" target="_blank">34 / 34</a>
                            </td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11054','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11054','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11054','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">2021/9/7</td>
                            <td align="center">八德</td>
                            <td align="center">周靖雯 Bella</td>
                            <td align="left">邀約4<br><br>9/7(二)1:30~10:24</td>
                            <td align="center">
                                <a href="ad_report_list.php?s6=八德&s7=F223916876&y1=2021/9/7&y2=2021/9/7" target="_blank">92 / 93</a>
                            </td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11053','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11053','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11053','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">2021/9/7</td>
                            <td align="center">八德</td>
                            <td align="center">于庭萱 LiLy</td>
                            <td align="left">公司上班<br>1:30-2:00陌call<br>2:00-3:00上課<br>3:00-5:30dmn新舊名單<br>5:30-6:30吃飯<br>6:30-9:30dmn新舊名單<br><br>公司名單通數:77<br>邀約:2<br><br><br>追蹤今日訪客到訪狀態<br><br>外館明天未接訪客再提醒<br><br>舊名單持續聯絡中，已寄訊推播<br><br>瞭解前幾日因疫情未到，或已邀約未到之訪客原因，約視訊訪談時 </td>
                            <td align="center">
                                <a href="ad_report_list.php?s6=八德&s7=E224763574&y1=2021/9/7&y2=2021/9/7" target="_blank">77 / 77</a>
                            </td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11052','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11052','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11052','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">2021/9/7</td>
                            <td align="center">八德</td>
                            <td align="center">杜佳臻 Macy</td>
                            <td align="left">公司上班<br>2:00-2:10聽CALL<br>2:10-2:30 陌call<br>2:30-3:00上分期課<br>3:00-5:30dmn舊名單<br>5:40-6:10晚餐<br>6:10-9:00dmn舊名單<br>邀約:1<br></td>
                            <td align="center">
                                <a href="ad_report_list.php?s6=八德&s7=F228382101&y1=2021/9/7&y2=2021/9/7" target="_blank">110 / 110</a>
                            </td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11051','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11051','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11051','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會員服務</td>
                            <td align="center">2021/9/7</td>
                            <td align="center">約專</td>
                            <td align="center">珍珍</td>
                            <td align="left">1.排約<br>2.關懷<br>3.邀約經營<br>4.電訪</td>
                            <td align="center">
                                <a href="ad_report_list.php?s6=約專&s7=N220685478&y1=2021/9/7&y2=2021/9/7" target="_blank">44 / 57</a>
                            </td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_action_note_report.php?an=11050','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

                            </td>
                            <td align="center">無</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_action_note_add.php?an=11050','','width=710,height=400,top=200,left=200')"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_action_note.php?st=del&an=11050','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_action_note.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_action_note.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_action_note.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_action_note.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_action_note.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_action_note.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_action_note.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_action_note.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_action_note.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_action_note.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_action_note.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_action_note.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_action_note.php?topage=1" selected>1</option>
                            <option value="/ad_action_note.php?topage=2">2</option>
                            <option value="/ad_action_note.php?topage=3">3</option>
                            <option value="/ad_action_note.php?topage=4">4</option>
                            <option value="/ad_action_note.php?topage=5">5</option>
                            <option value="/ad_action_note.php?topage=6">6</option>
                            <option value="/ad_action_note.php?topage=7">7</option>
                            <option value="/ad_action_note.php?topage=8">8</option>
                            <option value="/ad_action_note.php?topage=9">9</option>
                            <option value="/ad_action_note.php?topage=10">10</option>
                            <option value="/ad_action_note.php?topage=11">11</option>
                            <option value="/ad_action_note.php?topage=12">12</option>
                            <option value="/ad_action_note.php?topage=13">13</option>
                            <option value="/ad_action_note.php?topage=14">14</option>
                            <option value="/ad_action_note.php?topage=15">15</option>
                            <option value="/ad_action_note.php?topage=16">16</option>
                            <option value="/ad_action_note.php?topage=17">17</option>
                            <option value="/ad_action_note.php?topage=18">18</option>
                            <option value="/ad_action_note.php?topage=19">19</option>
                            <option value="/ad_action_note.php?topage=20">20</option>
                            <option value="/ad_action_note.php?topage=21">21</option>
                            <option value="/ad_action_note.php?topage=22">22</option>
                            <option value="/ad_action_note.php?topage=23">23</option>
                            <option value="/ad_action_note.php?topage=24">24</option>
                            <option value="/ad_action_note.php?topage=25">25</option>
                        </select></li>
                </ul>
            </div>

        </div>
        <!--/span-->

    </div>
    <!--/row-->
    </div>
    <!--/.fluid-container-->
    <!-- /MIDDLE -->

    <?php
    require_once("./include/_bottom.php");
    ?>

    <script type="text/javascript">
        $(function() {

            $("#branch").on("change", function() {
                personnel_get("branch", "single");
            });

            function chk_form() {
                if ($("d1").val() || $("d2").val()) {
                    if (!$("d1").val() || !$("d2").val()) {
                        alert("請選擇起始日期和結束日期。");
                        return false;
                    }
                }
                return true;
            }
        })
    </script>