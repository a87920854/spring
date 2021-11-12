<?php
    error_reporting(0); 
    /*****************************************/
    //檔案名稱：ad_quest.php
    //後台對應位置：名單/發送記錄>問卷報名資料
    //改版日期：2021.11.12
    //改版設計人員：Jack
    //改版程式人員：Queena
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    $default_sql_num = 500;

    if ( SqlFilter($_REQUEST["st"],"tab") == "ch" ){
	    //Set rs = Server.CreateObject("ADODB.Recordset")
	    //Set qrs = Server.CreateObject("ADODB.Recordset")
	    //rs.open "select * from quest where auton="&request("an")&"", SPCon, 1, 3
        $SQL = "Select * From quest Where auton = ".SqlFilter($_REQUEST["an"],"int");
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
	    if ( count($result) > 0 ){
            $SQL2 = "Select * From member_data Where mem_mobile='".$re["phone"]."'";
            $rs2 = $SPConn->prepare($SQL2);
            $rs2->execute();
            $result2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
            if ( count($result2) == 0 ){
                $SQL3 = "Select * From msg_num Where m_auto = 1";
                $rs3 = $SPConn->prepare($SQL3);
                $rs3->execute();
                foreach ($result3 as $re3);
                $mem_num = ($re3["m_num"] + 1);
                //Update msg_num
       		    $SQL_u = "Update msg_num Set m_num = ". $mem_num ." Where m_auto = 1";
                $rs_u = $SPConn->prepare($SQL_u);
                $rs_u->execute();
  			    if ( $re["sex"] == "女" ){
  				    $mem_photo = "girl.jpg";
                }else{
  				    $mem_photo = "boy.jpg";
                }
  
                //Insert member_data
                $SQL_i  = "Insert Into member_data(";
                $SQL_i .= "all_type, mem_level, mem_num, mem_photo, mem_come, mem_time, mem_name, mem_sex, mem_by, mem_bm, mem_bd, mem_blood, mem_marry, mem_mail, mem_mobile, ";
                $SQL_i .= "mem_area, mem_school, mem_job2, mem_p1, mem_p2, mem_p3 ) Values (";
                $SQL_i .= "'未處理',";
                $SQL_i .= "'guest',";
                $SQL_i .= "'".$mem_num."',";
                $SQL_i .= "'".$mem_photo."',";
                $SQL_i .= "'問卷(".$re["id"]."-".$re["auton"].")',";
                $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
                $SQL_i .= "'".$re["name"]."',";
                $SQL_i .= "'".$re["sex"]."',";
                if ( chkDate($re["bday"]) ){
                    $SQL_i .= "'".date("Y",$re["bday"])."',";
                    $SQL_i .= "'".date("m",$re["bday"])."',";
                    $SQL_i .= "'".date("d",$re["bday"])."',";
                }else{
                    $SQL_i .= "'',";
                    $SQL_i .= "'',";
                    $SQL_i .= "'',";
                }
                $SQL_i .= "'A',";
                $SQL_i .= "'".$re["marry"]."',";
                $SQL_i .= "'".$re["email"]."',";
                $SQL_i .= "'".$re["phone"]."',";
                $SQL_i .= "'".$re["area"]."',";
                $SQL_i .= "'".$re["school"]."',";
                $SQL_i .= "'".$re["job2"]."',";
                $SQL_i .= "'".$re["p1"]."',";
                $SQL_i .= "'".$re["p2"]."',";
                $SQL_i .= "'".$re["p3"]."')";
                $rs_i = $SPConn->prepare($SQL_i);
                $rs_i->execute();
                //Update quest
                $SQL_u = "Update quest Set isc = 1, all_type = '已處理' where auton = ".SqlFilter($_REQUEST["an"],"int");
                $rs_u = $SPConn->prepare($SQL_u);
                $rs_u->execute();
            }
        }
        reURL("ad_quest.php?topage=".SqlFilter($_REQUEST["topage"],"tab"));
    }

    //刪除
    if ( SqlFilter($_REQUEST["st"],"tab") == "del" ){
	    //Set rs = Server.CreateObject("ADODB.Recordset")
        $SQL_d = "Delete From quest Where auton = ".SqlFilter($_REQUEST["an"],"int");
        $rs_d = $SPConn->prepare($SQL_d);
        $rs_d->execute();
	    reURL("ad_quest.asp?topage=".SqlFilter($_REQUEST["topage"],"tab"));
    }
    
If request("vst") = "full" Then
  sqlv = "*"
  sqlv2 = "count(auton)"
Else
  sqlv = "top "&default_sql_num&" *"
  sqlv2 = "count(auton)"
End If

IF Request("a1") <> "" Then
	kt1 = Request("a1")&"/"&Request("a2")&"/1"
	If Not isdate(kt1) Then
  		Call Alert("起始日期不正確。",0,0)
	End if
End IF

IF Request("b1") <> "" Then
	kt2 = Request("b1")&"/"&Request("b2")&"/1"
	If isdate(kt2) Then
		kt2 = dateadd("d",-1,dateadd("m",1,kt2))
	Else
		Call Alert("結束日期不正確。",0,0)
	End if
End If

IF Session("MM_UserAuthorization") = "admin" then
	sqls = "SELECT "&sqlv&" FROM quest WHERE 1=1"
	sqls2 = "SELECT "&sqlv2&" as total_size FROM quest WHERE 1=1"
else
    sqls = "SELECT "&sqlv&" FROM quest WHERE branch='"&session("branch")&"'"
	sqls2 = "SELECT "&sqlv2&" as total_size FROM quest WHERE branch='"&session("branch")&"'"	  	
end if

If Not request("sear") = "1" then
	If request("s99") <> "" then
    	sqlss = sqlss & " and all_type <> '未處理'"
	    all_type = "已處理"
	Else
    	sqlss = sqlss & " and (all_type = '未處理' or all_type is null)"
	    all_type = "未處理"
    End If
Else
	all_type = "資料搜尋"
End if
	 
If request("s2") <> "" Then
	cs2 = reset_number(request("s2"))
 	sqlss = sqlss & " and k_mobile like '%"&cs2&"%'"
End If

If request("s3") <> "" Then
	sqlss = sqlss & " and k_name like '%" + Replace(request("s3"), "'", "''") + "%'"
End If

If request("s7") <> "" Then
	sqlss = sqlss & " and all_single like '%" + Replace(request("s7"), "'", "''") + "%'"
End If

If request("s6") <> "" Then
	sqlss = sqlss & " and all_branch like '%" + Replace(request("s6"), "'", "''") + "%'"
End If

If isdate(kt1) And isdate(kt2) Then
	If datediff("d", kt1, kt2) < 0 Then
		Call Alert("結束日期不能小於起始日期。", 0, 0)
	End if
 	sqlss = sqlss & " and times between '"&kt1&"' and '"&kt2&"'"
End If

sqls = sqls & sqlss &" order by times desc, id asc"
sqls2 = sqls2 & sqlss





?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">客服中心</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>客服中心　未處理 - 數量：84</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <div class="col-md-12 padding-bottom-10">
                    <div class="btn-group margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>
                        </ul>
                    </div>

                    <a class="btn btn-info" href="?c=0" disabled>春天/DMN 客服中心 (<?php echo $total_size1;?>)</a>
                    &nbsp;&nbsp;<a class="btn btn-info" href="?c=1">約專客服中心 (<?php echo $total_size2;?>)</a>
                    &nbsp;&nbsp;<a class="btn btn-info" href="?c=2">約專會員檢舉 (<?php echo $total_size3;?>)</a>
                    &nbsp;&nbsp;<a class="btn btn-info" href="ad_custom_complaint.asp">客戶申訴</a>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>年次</th>
                            <th>學歷</th>
                            <th>地區</th>
                            <th>手機</th>
                            <th>E-mail</th>
                            <th>留言內容</th>
                            <th>會館</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td class="center">魏家珍</td>
                            <td class="center">女</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">新北市</td>
                            <td class="center">0901008011</td>
                            <td class="center">Naomi.weiaiosc@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">您好<br><br>我們主要是提供華人地區唯一系統性的兩性關係課程(線上課程為主）。90％以上的學員都是單身朋友，由臺灣的曾國銘老師在2014年成立。今年因為老師返台定居臺灣，想要開發台灣市場，不曉得有沒有合作機會。<br><br>謝謝。<br><br>我們的Line官方帳號@aiosc<br>大陸網站為www.aiosc.com<br><br>魏家珍0901-008-011<br>LineID:aioscb2b<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2020/5/4 下午 07:03:10
                            </td>
                            <td class="center">總管理處</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=10977','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=10977','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=10977','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">艾以思諮詢顧問有限公司</td>
                            <td class="center">女</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">新北市</td>
                            <td class="center">0901008011</td>
                            <td class="center">Naomi.weiaiosc@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">您好<br><br>我們主要是提供華人地區唯一系統性的兩性關係課程(線上課程為主）。90％以上的學員都是單身朋友，由臺灣的曾國銘老師在2014年成立。今年因為老師返台定居臺灣，想要開發台灣市場，不曉得有沒有合作機會。<br><br>謝謝。<br><br>我們的Line官方帳號@aiosc<br>大陸網站為www.aiosc.com<br><br>魏家珍0901-008-011<br>LineID:aioscb2b<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2020/5/4 下午 06:46:22
                            </td>
                            <td class="center">總管理處</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=10975','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=10975','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=10975','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">林有為</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">台北市</td>
                            <td class="center">0981524241</td>
                            <td class="center">elson0711@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">你好我這邊是廿一世紀數位科技股份有限公司希望提供給貴公司無卡分期的服務讓消費者不用信用卡就可享受分期能夠多一個支付的選擇<br>提升銷售業績期待能有當面介紹的機會謝謝<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2020/3/10 下午 01:48:42
                            </td>
                            <td class="center">總管理處</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=9904','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=9904','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=9904','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">唐育晨</td>
                            <td class="center">女</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">新北市</td>
                            <td class="center">0931790099</td>
                            <td class="center">tc111015@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">今天晚上接到高小姐來電，說明陳姊有找到不錯的對象希望我能過去排約，有在電話中說明後來有參加另外一間會館。<br>當初是看了單位文宣且思考很久才決定到會館聽聽內容是甚麼，我在後續聽的過程陸續落淚，我一直很想知道為什麼，今天的電話讓我明白了。<br><br>整個過程讓人覺得處於落弱勢，沒有傾聽需求，我當初到會館時就有表達如果真的會想要也不會馬上答應，我光報名之後人到會館就思考一段時間了，每個人的步伐不同，當時那麼迫切的逼迫我，真的覺得對我是有幫助嗎?還是要衝量?後來我會覺得既然你都說了你們很好，是否也請讓人花點時間了解你們，而不是馬上逼迫人。<br><br>剛剛的電話讓我覺得以關心之名，囑咐我要小心外面形形色色的會館。但聽起來不太舒服耶，我總覺得又回到上次在小房間內被壓著說話的感覺，有點負面。我有說明下個禮拜有事無法前往，也不知道我付的那兩千塊是否就這樣沒有消息無法排約。(雖然電話剛開始我說了很多婉拒的理由，但後來覺得要來信反應一下，因為真的不太舒服，聽完心情很糟)<br><br>不管幾歲，如果過了沒有市場的30歲，那也就算了，因為是自己選擇的，也會覺得每個人個性不一樣很難馬上知道對方是甚麼個性用甚麼方式介紹會館。但對來的人多點鼓勵嘛，即將會與各種優秀異性排約，有機會從中遇到聊得來的人。這樣的緣分，不是會牽得很輕鬆嗎?<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2019/11/7 下午 10:33:13
                            </td>
                            <td class="center">總管理處</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=7816','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=7816','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=7816','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">簡又新</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">台北市</td>
                            <td class="center">0989630210</td>
                            <td class="center">ryanjian.pg@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">Dear：<br>您好，我來自熊貓王國香港控股有限公司的企劃人員，我叫簡又新。<br>本公司有著很棒的品牌故事，創作能力也極佳，旗下有胖豆&#24651;SweetCafe分別駐於台北市大同區一家、高雄左營旗艦店一家，大陸鄭州店一家，12月在韓國明洞商業區及弘大商圈會在各一家，接下來會持續找尋在全球各適合的點開胖豆&#24651;SweetCafe。在胖豆&#24651;SweetCafe當中有熊貓主題牆配合APP，透過AR擴充實境可以尋找熊貓，找到各式相框，為你我留下深刻回憶。<br>正因為有著這麼不錯的店，想要推薦給您，讓更多的學生，可以來我們這，透過聯誼、團遊、聚會等活動...更加深刻學子間的情誼。<br>這是我們臉書專頁：<br>https://zh-tw.facebook.com/2017Pandaland/<br>請您相信我們，我們正是一個從熊貓文創可以串聯文娛生態的品牌。<br>若公司希望進一步了解的話，歡迎與我聯絡。<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2018/11/23 下午 04:34:34
                            </td>
                            <td class="center">總管理處</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=3589','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=3589','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=3589','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">洪嘉鴻</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">台北市</td>
                            <td class="center">0987105213</td>
                            <td class="center">triton@skyway.com.tw</td>
                            <td style="word-break: break-all;min-width:300px;">您好!<br><br>敝公司為天擎旅行社，以後會規劃一系列的海外單身聯誼行程，也會精選情人節行程，不知道可否與貴單位合作，一起來服務有情男女，謝謝~~~<br><br>以下為這次的行程：<br>https://www.skyway.com.tw/C/tour/tw/IBR4D-SKYWAY-08NOV#2018/11/08<br><br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2018/9/4 下午 05:47:13
                            </td>
                            <td class="center">總管理處</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=3533','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=3533','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=3533','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">黃佳雯</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">0926951050</td>
                            <td class="center">chgarti810@1758play.com</td>
                            <td style="word-break: break-all;min-width:300px;">異業合作-您好，<br><br>我們是新興的旅遊平台「FunRoad奮路鳥」，想與貴公司洽談異業合作。<br>主要異業合作的內容為：<br><br>1.提供低價的旅遊行程供您購買採用，用以舉辦活動、旅遊團。<br>2.協助我們曝光旅遊行程廣告，達到成團即可參與成員團費抽成。<br>(曝光的廣告主題皆與貴公司相關，如：單身限定的交友團等等，絕不突兀或牴觸)<br><br>若您有意願，請您回覆信件或撥打02-8226-3999分機217黃小姐<br><br>我們會盡速與您主動連繫接洽詳細合作詳情！<br><br>謝謝！<br><br><br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2018/2/7 下午 03:14:42
                            </td>
                            <td class="center">總管理處</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=3271','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=3271','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=3271','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">jessen</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">高雄市</td>
                            <td class="center">0966417755</td>
                            <td class="center">chloe.jessen@yahoo.com</td>
                            <td style="word-break: break-all;min-width:300px;">已知至少有兩個女生經歷過。<br><br>中文姓名:曾辰瑋<br>英文:David，Chen-WeiTseng或是TsengChenWei<br>生日：1986年4月18日。<br>https://www.facebook.com/davidcwtseng<br><br>此人本是台灣基隆七堵人，現長居南非開普敦。<br>稱南非政府經濟顧問，碩士。<br>在無數國外約會網站上活躍。<br>每年會回台灣度假(大約三月與四月間)並參加各大相親婚顧活動。<br><br>在之前的婚姻中，或和女性正式交往期間，&#27809;間斷上約會網站或在社交媒體上同時和多個女生曖昧約會。<br>用家庭婚姻承諾誘惑女生與他發生關係，厭煩後隨之拋棄回到南非消失人間。<br><br>此人在2014-2017年間在南非曾經有過一段三年的婚姻。對象是當年剛剛剛成年的穆斯林印度太太。涉及家庭暴力。<br>最後前妻和家人向當地法院同時對此人與其母親王基培兩人申請人身安全保護令後離婚（附件)。<br><br>有怪異的戀母情結。家庭背景複雜。<br>此人現居高雄的母親，極度寵愛兒子。不管是在南非或每年回來台灣，媽媽都會為此人安排參加相親活動物色新女生，兒子也會同時跟數個女生曖昧交往。<br>當兒子在和其中一個女生變得比較親密之後，媽媽就會變得嫉妒，開始控制並馬上去南非和兒子一起生活一段時間，期間洗腦兒子並拆散兩人，<br>之後在南非或台灣再次鼓勵並積極安排兒子相親或結交新的對象，也會為兒子安排飯店解決需求。<br><br>媽媽號稱虔誠基督徒，兒子卻極端並崇拜伊斯蘭教，在女生面前稱自己是無神論者或虔誠基督徒，配合女生喜好。<br><br>希望各位同仁注意此人，不讓此人再有機會參與各位的相親活動，不要再讓無辜渴望愛的單身女生受害。<br><br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2018/2/3 上午 01:13:35
                            </td>
                            <td class="center">總管理處</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=3269','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=3269','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=3269','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">黃小泉</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">台北市</td>
                            <td class="center">0932855556</td>
                            <td class="center">chuan007569@chyp.com.tw</td>
                            <td style="word-break: break-all;min-width:300px;">a123681166密碼進不去<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2018/1/30 下午 04:42:44
                            </td>
                            <td class="center">台北</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=3265','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=3265','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=3265','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">吳修維</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">新北市</td>
                            <td class="center">0939801228</td>
                            <td class="center">henry3626@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">想請教以下幾個關於1對1排約問題<br>1.1對1排約的費用？<br>2.1對1排約的配對方式？<br>3.有無輔導機制提高成功率？<br>4.目前1對1會員男女人數與年齡分佈？<br>5.透過1對1排約成功步入婚姻的人數或成功率？<br>6.有無退費機制、保證排約次數與其他對消費者的保障？<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2017/7/10 上午 09:30:36
                            </td>
                            <td class="center">台北</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=3137','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=3137','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=3137','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">007</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">桃園縣</td>
                            <td class="center">0979156229</td>
                            <td class="center">ll00xx00xll@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">+.)(+().<br><br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2017/1/28 上午 12:54:00
                            </td>
                            <td class="center"></td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=3036','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=3036','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=3036','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">chen</td>
                            <td class="center">女</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">新竹市</td>
                            <td class="center">0910000839</td>
                            <td class="center">gneice@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">檢舉參加團體聯誼王建國男67年次<br>相關證據>><br>爆料公社的貼文:<br>https://m.facebook.com/groups/1035885209777446?view=permalink&id=1446141015418528<br>貓咪也瘋狂俱樂部的貼文:<br>https://m.facebook.com/groups/216997641653096?view=permalink&id=1483749381644576<br>請主辦單位善盡篩選職責,保護女生的權益<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2017/1/5 下午 07:57:00
                            </td>
                            <td class="center">總管理處</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=3033','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=3033','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=3033','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">賀建中</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">台北市</td>
                            <td class="center">0921125283</td>
                            <td class="center">y120354563@yahoo.com.te</td>
                            <td style="word-break: break-all;min-width:300px;">目前分居中，不符合貴單位要求<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/12/31 下午 04:02:00
                            </td>
                            <td class="center">桃園</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=3027','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=3027','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=3027','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">謝忠興</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">桃園縣</td>
                            <td class="center">0937161567</td>
                            <td class="center">z7601262000@yahoo.com.tw</td>
                            <td style="word-break: break-all;min-width:300px;">目前12/15、16有休假，是否能排約？<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/12/13 下午 08:15:00
                            </td>
                            <td class="center">桃園</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=3010','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=3010','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=3010','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">謝名浩</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">桃園市</td>
                            <td class="center">0918179911</td>
                            <td class="center">s228book@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">想了解一下服務內容<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/12/5 上午 09:10:00
                            </td>
                            <td class="center">桃園</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=3006','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=3006','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=3006','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">羅晨銘</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">桃園縣</td>
                            <td class="center">0910942371</td>
                            <td class="center">cgahero@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">我是貴公司會員，去年7月至8月間繳費迄今，排約次數屈指可數，屢有數月未曾排約等情，前於4月時有向貴公司電話反應，稍做改善又故態復萌，貴公司欺人之甚，莫過於此！<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/10/1 下午 10:25:00
                            </td>
                            <td class="center">桃園</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=2861','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=2861','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=2861','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">Jack</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">高雄市</td>
                            <td class="center">0912345678</td>
                            <td class="center">ano@gov.cc</td>
                            <td style="word-break: break-all;min-width:300px;">你們的電話行銷人員水準有夠低落，打了三次想說特別接起來跟貴司說不需要，結果電話行銷人員立該掛電話，一點素質都沒有<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/9/20 下午 02:18:00
                            </td>
                            <td class="center">總管理處</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=2851','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=2851','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=2851','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">保留</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">台南市</td>
                            <td class="center">0912345678</td>
                            <td class="center">St930902@yahoo.com.tw</td>
                            <td style="word-break: break-all;min-width:300px;">意圖使男女與他人為性交或猥褻之行為，而引誘、容留或媒介以營利者，<br>處五年以下有期徒刑，得併科十萬元以下罰金。以詐術犯之者，亦同。<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/8/14 上午 11:56:00
                            </td>
                            <td class="center"></td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=2788','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=2788','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=2788','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">周梓為</td>
                            <td class="center">男</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">台南市</td>
                            <td class="center">0926389633</td>
                            <td class="center">cheoziwei@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">沒時間<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/7/29 上午 09:27:00
                            </td>
                            <td class="center">桃園</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=2782','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=2782','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=2782','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">林小姐</td>
                            <td class="center">女</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">台北市</td>
                            <td class="center">0900000000</td>
                            <td class="center">0000@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">不要太過分了！<br>業務人員隨意拿到別人個資打電話來推銷，<br>手機接通後也沒詢問是否打擾了，劈頭就要介紹聯誼活動。<br>聽到我說已婚後馬上就掛電話，一句抱歉打擾或是感謝回答都沒說，太沒禮貌了吧！<br>不要沒有賺頭就認為騷擾別人都沒關係。<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/6/4 下午 03:44:00
                            </td>
                            <td class="center"></td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=2275','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=2275','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=2275','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">F</td>
                            <td class="center">男</td>
                            <td class="center">65</td>
                            <td class="center">大學</td>
                            <td class="center"></td>
                            <td class="center">123456789</td>
                            <td class="center">abc@abc.abc</td>
                            <td style="word-break: break-all;min-width:300px;">同一個人的照片放不同的名字,再騙啊...<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/3/25 上午 10:04:00
                            </td>
                            <td class="center"></td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=2257','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=2257','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=2257','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">Jenny</td>
                            <td class="center">女</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">其他</td>
                            <td class="center">0923229995</td>
                            <td class="center">jlaikc@gmail.com</td>
                            <td style="word-break: break-all;min-width:300px;">想請問在國外也能參加春天會館會員嗎？我很希望能進一步認識一位已是會員的林先生。他的微笑讓我覺得很貼心，在個人資料上寫的話我也非常認同。我沒有台灣手機的號碼好像不行加入會員。請求建議，謝謝！<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/3/22 下午 02:51:00
                            </td>
                            <td class="center"></td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=2255','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=2255','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=2255','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">茹茹</td>
                            <td class="center">女</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">桃園市</td>
                            <td class="center">0953112385</td>
                            <td class="center">tiffany2533@yahoo.com.tw</td>
                            <td style="word-break: break-all;min-width:300px;">不好意思請問可以幫我將我的資料刪除嗎<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/3/8 下午 10:05:00
                            </td>
                            <td class="center">桃園</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=2252','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=2252','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=2252','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">夢思</td>
                            <td class="center">女</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center">其他</td>
                            <td class="center">0903033043</td>
                            <td class="center">meili_shenhua0@yahoo.co.jp</td>
                            <td style="word-break: break-all;min-width:300px;">您好，我想&#35831;&#38382;一下<br>我&#29616;在日本工作，女性，&#21333;身。希望登&#38470;&#36149;公司的相信网站&#21442;加活&#21160;，是否可以&#20174;日本直接登&#38470;网站和&#32564;&#36153;？希望&#32473;予&#24110;助，非常感&#35874;！<br>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/2/6 下午 01:59:00
                            </td>
                            <td class="center">總管理處</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_guard_send_branch.asp?g_auto=2243','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_guest_del.asp?g_auto=2243','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_guest_fix.asp?g_auto=2243','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="text-center">共 84 筆、第 1 頁／共 2 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_guest.asp?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_guest.asp?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_guest.asp?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_guest.asp?topage=2 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_guest.asp?topage=1" selected>1</option>
                            <option value="/ad_guest.asp?topage=2">2</option>
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

