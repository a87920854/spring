<?php
	require_once("./include/_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");
	
	$mem_num = SqlFilter($_REQUEST["mem_num"],"int");
	$mem_au = SqlFilter($_REQUEST["mem_au"],"int");
	$mem_mobile = SqlFilter($_REQUEST["mem_mobile"],"tab");

	if ( $mem_num == "" && $mem_au == "" && $mem_mobile == "" ){ call_alert("會員編號讀取有誤。", "ClOsE",0);}
	
	$st = SqlFilter($_REQUEST["st"],"tab");

	if ( $st == "addsirealinvite" ){
		$SQL_d = "Update si_real_invite Set sk_real_invite=1 Where mem_num='".$mem_num."'";
		$rs_d = $SPConn->prepare($SQL_d);
		$rs_d->execute();
		header("location:ad_mem_detail.asp?mem_num=".$mem_num);
		exit;
	}
	
	if ( $st == "proofdel" ){
		$SQL = "Select * From proof_data Where photo_auto='".SqlFilter($_REQUEST["a"],"tab")."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		if ( count($result) > 0 ){
			$path = dirname(__FILE__)."\idcard\\".$re["photo_name"];
			//刪除實體檔案
			DelFile($path);
			//刪除資料庫資料
			$SQL_d = "Delete From proof_data Where photo_auto='".SqlFilter($_REQUEST["a"],"tab")."'";
			$rs_d = $SPConn->prepare($SQL_d);
			$rs_d->execute();
		}
		header("location:ad_mem_detail.asp?mem_num=".$mem_num);
		exit;
	}
	
	//審核不通過
	if ( $st == "checknook" ){
		$SQL = "Select mem_auto,mem_username, mem_name, mem_mobile, si_errmsg From member_data Where mem_num='".$mem_num."'");
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		if ( count($result) > 0 ){
			if ( SqlFilter($_REQUEST["errmsg"],"tab") != "" ){
				$SQL_u = "Update member_data Set si_errmsg=N'".SqlFilter($_REQUEST["errmsg"],"tab")."' Where mem_num='".$mem_num."'");
				$rs_u = $SPConn->prepare($SQL_u);
				$rs_u->execute();
			}
			$mem_au = $re["mem_auto"];
			$lusername = $re["mem_username"];
			$n1 = $re["mem_name"];
			$n10 = $re["mem_mobile"];
		}
	
		if ( SqlFilter($_REQUEST["errmsg"] != "" ){
			//新增
			$SQL_i  = "Insert Into log_data(log_time,log_num,log_fid,log_username,log_name,log_branch,log_single,log_1,log_2,log_4,log_5) Values ( '";
			$SQL_i .= SqlFilter(date("Y-m-d"),"tab")."',";
			$SQL_i .= "'".SqlFilter($mem_au,"tab")."',";
			$SQL_i .= "'".SqlFilter($lusername,"tab")."',";
			$SQL_i .= "'".SqlFilter($n1,"tab")."',";
			$SQL_i .= "'".SqlFilter($_SESSION["p_other_name"],"tab")."',";
			$SQL_i .= "'".SqlFilter($_SESSION["branch"],"tab")."',";
			$SQL_i .= "'".SqlFilter($_SESSION["MM_Username"],"tab")."',";
			$SQL_i .= "'".SqlFilter($n10,"tab")."',";
			$SQL_i .= "'系統計錄',";
			$SQL_i .= "'".$_SESSION["p_other_name"]."於".date("Y-m-d")."不通過資料審核，原因：".SqlFilter($_REQUEST["errmsg"],"tab")."',";
			$SQL_i .= "'member')";
			$rs_i = $SPConn->prepare($SQL_i);
			$rs_i->execute();
			header("location:ad_mem_detail.asp?mem_num=".$mem_num);
			exit;
		}

	//審核通過
	if ( $st == "checkok" ){
		$cardid = strtoupper(str_replace(" ", "", SqlFilter($_REQUEST["cardid"],"tab")));
		$SQL = "Select mem_auto, mem_name, mem_username,mem_num,mem_passwd, si_account, mem_level,mem_mobile, web_level, web_startime, web_endtime, si_enterprise, mem_branch, mem_single From member_data Where mem_num='".$mem_num."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		if ( count($result) == 0 ){
			call_alert("會員編號讀取有誤。", 0,0);
		}else{
			$isbranch = 0;
			$rsreopen = 0;
			$canpic = 0;
			if ( is_null($re["web_level"]) == false && $re["web_level"] != 0 ){
				call_alert("此會員已審核通過。", 0,0);
			}
			if ( (integer)SqlFilter($_REQUEST["web_level"],"int") >= 2 && $re["mem_level"] == "mem" ){
				call_alert("要升級成真人認證或璀璨會員須先將會員等級變更成已入會。", 0,0);
			}
			
			$havefid = 0;
			$SQL1 = "Select mem_num, web_level From member_data Where mem_username = '".$cardid."'";
			$rs1 = $SPConn->prepare($SQL1);
			$rs1->execute();
			$result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
			if ( count($result1) > 0 ){
				foreach($result1 as $re1){
					if ( $re["mem_num"] != $re1["mem_num"] ){
						$havefid = 1;
					}
				}
			}
    
			if ( $havefid == 1 ){
				call_alert("此身分證字號重覆，請聯絡總公司處理。".$cardid, 0,0);
			}

			$mem_au = $re["mem_auto"];
			$lusername = $re["mem_username"];
			$n1 = $re["mem_name"];
			$n10 = $re["mem_mobile"];
			$mem_branch = $re["mem_branch"];
			$mem_single = $re["mem_single"];		
			
			if ( $re["mem_username"] == "" || is_null($re["mem_username"]) ){
				$subSQL1 = ",mem_username = '".$cardid."'";
				$isbranch = 1;
				$mem_username = $cardid;
			}else{
				$mem_username = $re["mem_username"];
			}
		
			if ( $re["si_account"] == "" || $re["si_account"] == "0" || is_null($re["si_account"]) ){
				$subSQL2 = ",si_account = '".$cardid."'";
			}

			if ( $re["mem_passwd"] == "" || is_null($re["mem_passwd"]) ){
				$subSQL3 = ",mem_passwd = '".substr($mem_username, -5)."'";
			}
			
			$web_level = (integer)SqlFilter($_REQUEST["web_level"],"int");

			$SQL_u  = "Update member_data Set ";
			$SQL_u .= "web_level='".$web_level."'";
			$SQL_u .= $subSQL1.$subSQL2,$subSQL3;
			$SQL_u .= ",web_startime='".strftime("%Y/%m/%d %H:%M:%S")."'";



		//rs("web_level") = web_level
		//rs("web_startime") = date()
		select case web_level
			case "1"
				rs("web_endtime") = dateadd("m", 2, date())
				timemsg = date()&"~"&dateadd("m", 2, date())
			case "2"
				rs("web_endtime") = dateadd("m", 6, date())	
				timemsg = date()&"~"&dateadd("m", 6, date())
			case "3"
				rs("web_endtime") = NULL
				timemsg = "視服務期間而定"
		end select
		
		if rs("si_enterprise") = 99 then
		  rs("si_enterprise") = 1
		end if
		rs.update
		rs.close
		
		
		rs.open "select top 1 * from log_data", SPCon, 1, 3
		rs.addnew
		rs("log_time") = now
		rs("log_num") = mem_au
		rs("log_fid") = lusername
		rs("log_username") = n1
		rs("log_name") = Session("p_other_name")
		rs("log_branch") = Session("branch")
		rs("log_single") = Session("MM_Username")
		rs("log_1") = n10
		rs("log_2") = "系統紀錄"
		if isbranch = 1 then
			branch_set = "，由審核人員設定帳號"
		else
			branch_set = ""
		end if

		rs("log_4") = Session("p_other_name")&"於"&now&"通過資料審核，並變更成"&num_lv(web_level)&" - 效期至"&timemsg&""&branch_set	
		rs("log_5") = "member"
		rs.update
		rs.close

		rs.open "select top 1 * from single_sysmsg", SPCon, 1, 3
		rs.addnew
		mem_single_name = SingleName(mem_single)
		rs("mem_num") = mem_num
		rs("msg") = mem_single_name&"您好，您的會員"&n1&" ["&mem_num&"] 資料，已由總公司審核通過，麻煩您協助進一步邀請對方到會館進行面對面認證。"
		rs("url") = "ad_no_mem.asp?fullm="&mem_num
		rs("branch") = mem_branch
		rs("single") = mem_single
		rs("singlename") = mem_single_name
		rs("times") = now
		rs("types") = "系統訊息"
		rs("types2") = "網站認證"
		rs("log_single") = Session("MM_Username")
		rs("index_show") = 1
		rs.update
		rs.close
		response.redirect "ad_mem_detail.asp?mem_num="&mem_num
	end if
	response.end
end if
	
	
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_mem.php">會員管理系統</a></li>
            <li class="active">會員詳細資料 - 編號 173134 - 鄭小姐</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員詳細資料 - 編號 173134 - 鄭小姐 - <font color=#c22c7d>約會專家主帳號</font></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">


                <p>
                    <a class="btn btn-primary" href="ad_mem_detail.php?mem_num=173134"><i class="fa fa-arrow-right" style="margin-top:3px;"></i>基本資料</a>
                    <a class="btn btn-blue" href="ad_mem_fix.asp?mem_num=2080022">修改資料</a>
                    <a class="btn btn-info" href="ad_mem_service.php?mem_num=173134">服務紀錄</a>
                    <a class="btn btn-danger" href="ad_mem_ptest.php?mem_num=173134">心理測驗</a>
                    <a class="btn btn-warning" href="ad_mem_login_log.php?mem_num=173134">登入紀錄</a>
                    <a class="btn btn-dirtygreen" href="ad_important_paper.php?mem_num=173134">紙本資料</a>

                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td colspan=4 style="font-size:150%;color:blue"><b>基本資料</b></td>
                        </tr>
                        <tr>
                            <td width="92">
                                <div align="right">權益：</div>
                            </td>
                            <td colspan=3><b>
                                    璀璨會員-一年期(~)</b>&nbsp;&nbsp;一年卡
                            </td>
                        </tr>
                        <tr>
                            <td width="92">
                                <div align="right">編號：</div>
                            </td>
                            <td width="267">173134</td>
                            <td width="94">
                                <div align="right">身分證字號：</div>
                            </td>
                            <td width="269">
                                <font color=red>不可見</font>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">姓名：</div>
                            </td>
                            <td>鄭小姐</td>
                            <td>
                                <div align="right">帳號/密碼：</div>
                            </td>
                            <td>
                                <font color=red>不可見</font>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">暱稱：</div>
                            </td>
                            <td>鄭小姐</td>
                            <td>
                                <div align="right">性別：</div>
                            </td>
                            <td>女</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">生日：</div>
                            </td>
                            <td>
                                <font color=red>不可見</font>&nbsp;&nbsp;41 歲&nbsp;&nbsp;雙魚座
                            </td>
                            <td>
                                <div align="right">手機：</div>
                            </td>
                            <td>
                                <font color=red>不可見</font>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="right">血型：</div>
                            </td>
                            <td>A</td>
                            <td>
                                <div align="right">信仰：</div>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>
                                <div align="right">學歷：</div>
                            </td>
                            <td>大學
                                &nbsp;&nbsp;&nbsp;&nbsp;

                                &nbsp;&nbsp;&nbsp;&nbsp;

                            </td>
                            <td>
                                <div align="right">身高/體重：</div>
                            </td>
                            <td>
                                159 cm/53 kg
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">職業：</div>
                            </td>
                            <td>公務/國家機關&nbsp;&nbsp;公司名稱：</td>
                            <td>
                                <div align="right">職務名稱：</div>
                            </td>
                            <td>整體造型師&nbsp;&nbsp;年資： 年</td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">經濟狀況：</div>
                            </td>
                            <td>
                            </td>
                            <td>
                                <div align="right">車房：</div>
                            </td>
                            <td><label class="checkbox"><input disabled style="width:20px;" type="checkbox" name="mem_car" id="mem_car" value="1"><i></i> 有車</label>
                                <label class="checkbox"><input disabled style="width:20px;" type="checkbox" name="mem_house" id="mem_house" value="1"><i></i> 有房</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">E-mail：</div>
                            </td>
                            <td>
                                <font color=red>不可見</font>
                            </td>
                            <td>
                                <div align="right">電話：</div>
                            </td>
                            <td>
                                <font color=red>不可見</font>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">地址：</div>
                            </td>
                            <td>居住地：台北縣　<font color=red>不可見</font>
                                <br>戶籍地：　<font color=red>不可見</font>

                            </td>
                            <td>
                                <div align="right">MSN/LINE/FB：</div>
                            </td>
                            <td>
                                <font color=red>不可見</font>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="right">個性：</div>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;
                                抽菸：&nbsp;&nbsp;&nbsp;&nbsp;
                                喝酒：&nbsp;&nbsp;&nbsp;&nbsp;
                                飲食：&nbsp;&nbsp;&nbsp;&nbsp;

                            </td>
                            <td>
                                <div align="right">婚姻狀態：</div>
                            </td>
                            <td>未婚</td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">興趣：</div>
                            </td>
                            <td colspan=3><br>其他興趣：</td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">外型：</div>
                            </td>
                            <td colspan=3></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">內在：</div>
                            </td>
                            <td colspan=3></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">資料速報：</div>
                            </td>
                            <td colspan=3></td>
                        </tr>

                        <tr>
                            <td valign="top">
                                <div align="right">自我介紹：</div>
                            </td>
                            <td colspan=3></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" disabled name="mem_photo_show" id="mem_photo_show" value="1"><i></i>前台不顯示照片</label>
                                <label class="checkbox"><input type="checkbox" disabled name="no_mail1" id="no_mail1" value="1" checked><i></i>電子信件通知</label>
                                <label class="checkbox"><input type="checkbox" disabled name="no_mail2" id="no_mail2" value="1" checked><i></i>簡訊通知</label>
                                <label class="checkbox"><input type="checkbox" disabled name="no_mail4" id="no_mail4" value="1"><i></i>約會邀請被拒絕通知</label>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">網站資料：</div>
                            </td>
                            <td colspan=3>
                                <table class="table table-bordered">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="right">類型：</div>
                            </td>
                            <td colspan=2>
                                <label class="checkbox"><input disabled type="checkbox" name="si_enterprise" id="si_enterprise" value="1"><i></i> 企業會員</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_vip" id="mem_vip" value="1" checked><i></i> 優質會員</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot" id="mem_hot" value="1"><i></i> 超人氣會員</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot_in" id="mem_hot_in" value="1"><i></i> 春天首頁超人氣會員</label>
                                <label class="checkbox"><input disabled type="checkbox" name="singleparty_hot_check" id="singleparty_hot_check" value="1"><i></i> 約專首頁推薦會員</label>
                                <br>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot3" id="mem_hot3" value="1"><i></i> 醫師、教師、律師</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot1" id="mem_hot1" value="1"><i></i> 碩博士、科技新貴</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot6" id="mem_hot6" value="1"><i></i> 百萬年薪俱樂部</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot5" id="mem_hot5" value="1"><i></i> BOSS、高階主管</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot4" id="mem_hot4" value="1"><i></i> 軍警、公務人員</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot2" id="mem_hot2" value="1"><i></i> 金融服務</label>
                            </td>

                            <td>

                            </td>
                        </tr>

                        <tr>
                            <td colspan=4>
                                <div align="left">token:<br>gcmid:</div>
                            </td>


                        <tr>
                            <td colspan=4 style="font-size:150%;color:blue"><b>擇友條件</b></td>
                        </tr>
                        <tr>
                            <td>婚況：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_marry" value="未婚" disabled><i></i>未婚</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="離婚" disabled><i></i>離婚</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="離婚沒小孩" disabled><i></i>離婚沒小孩</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="離婚有小孩" disabled><i></i>離婚有小孩</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="喪偶" disabled><i></i>喪偶</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="已婚" disabled><i></i>已婚</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="保密" disabled><i></i>保密</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="交往中" disabled><i></i>交往中</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="有心儀對象" disabled><i></i>有心儀對象</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>學歷：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_school" value="博士" disabled><i></i>博士</label><label class="checkbox"><input type="checkbox" name="sel_school" value="碩士" disabled><i></i>碩士</label><label class="checkbox"><input type="checkbox" name="sel_school" value="大學" disabled><i></i>大學</label><label class="checkbox"><input type="checkbox" name="sel_school" value="專科" disabled><i></i>專科</label><label class="checkbox"><input type="checkbox" name="sel_school" value="高職" disabled><i></i>高職</label><label class="checkbox"><input type="checkbox" name="sel_school" value="高中" disabled><i></i>高中</label><label class="checkbox"><input type="checkbox" name="sel_school" value="國中" disabled><i></i>國中</label><label class="checkbox"><input type="checkbox" name="sel_school" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>宗教：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_mem6" value="佛道教" disabled><i></i>佛道教</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="基督教" disabled><i></i>基督教</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="天主教" disabled><i></i>天主教</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="一貫道" disabled><i></i>一貫道</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="無" disabled><i></i>無</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>職業：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_job" value="公務/國家機關" disabled><i></i>公務/國家機關</label><label class="checkbox"><input type="checkbox" name="sel_job" value="司法/法務" disabled><i></i>司法/法務</label><label class="checkbox"><input type="checkbox" name="sel_job" value="軍警單位" disabled><i></i>軍警單位</label><label class="checkbox"><input type="checkbox" name="sel_job" value="自營/投資" disabled><i></i>自營/投資</label><label class="checkbox"><input type="checkbox" name="sel_job" value="電腦/網路" disabled><i></i>電腦/網路</label><label class="checkbox"><input type="checkbox" name="sel_job" value="電子/通信/電器" disabled><i></i>電子/通信/電器</label><label class="checkbox"><input type="checkbox" name="sel_job" value="教育/研究單位" disabled><i></i>教育/研究單位</label><label class="checkbox"><input type="checkbox" name="sel_job" value="醫療/護理服務業" disabled><i></i>醫療/護理服務業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="媒體傳播/出版業" disabled><i></i>媒體傳播/出版業</label><br><label class="checkbox"><input type="checkbox" name="sel_job" value="藝術/音樂/設計" disabled><i></i>藝術/音樂/設計</label><label class="checkbox"><input type="checkbox" name="sel_job" value="建築/裝修/物業" disabled><i></i>建築/裝修/物業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="營銷/業務" disabled><i></i>營銷/業務</label><label class="checkbox"><input type="checkbox" name="sel_job" value="文化/演藝/娛樂業" disabled><i></i>文化/演藝/娛樂業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="金融/證券/財會/保險" disabled><i></i>金融/證券/財會/保險</label><label class="checkbox"><input type="checkbox" name="sel_job" value="專利商標/諮詢服務業" disabled><i></i>專利商標/諮詢服務業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="生產製造業" disabled><i></i>生產製造業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="旅遊服務業" disabled><i></i>旅遊服務業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="運輸服務業" disabled><i></i>運輸服務業</label><br><label class="checkbox"><input type="checkbox" name="sel_job" value="百貨/零售業" disabled><i></i>百貨/零售業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="餐飲服務業" disabled><i></i>餐飲服務業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="美容/美髮業" disabled><i></i>美容/美髮業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="農林漁牧業" disabled><i></i>農林漁牧業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="自由業/其它" disabled><i></i>自由業/其它</label><label class="checkbox"><input type="checkbox" name="sel_job" value="在校學生" disabled><i></i>在校學生</label><label class="checkbox"><input type="checkbox" name="sel_job" value="業務/仲价業" disabled><i></i>業務/仲价業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>個性：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_mem4" value="內向" disabled><i></i>內向</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="外向" disabled><i></i>外向</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="隨和" disabled><i></i>隨和</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="嚴謹" disabled><i></i>嚴謹</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="善良熱情" disabled><i></i>善良熱情</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="陽光" disabled><i></i>陽光</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>經濟：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_money_des" value="富有" disabled><i></i>富有</label><label class="checkbox"><input type="checkbox" name="sel_money_des" value="中上" disabled><i></i>中上</label><label class="checkbox"><input type="checkbox" name="sel_money_des" value="小康" disabled><i></i>小康</label><label class="checkbox"><input type="checkbox" name="sel_money_des" value="自足" disabled><i></i>自足</label><label class="checkbox"><input type="checkbox" name="sel_money_des" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>年收入：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_money" value="50萬以下" disabled><i></i>50萬以下</label><label class="checkbox"><input type="checkbox" name="sel_money" value="51萬到80萬" disabled><i></i>51萬到80萬</label><label class="checkbox"><input type="checkbox" name="sel_money" value="81萬到100萬" disabled><i></i>81萬到100萬</label><label class="checkbox"><input type="checkbox" name="sel_money" value="101萬到199萬" disabled><i></i>101萬到199萬</label><label class="checkbox"><input type="checkbox" name="sel_money" value="200萬以上" disabled><i></i>200萬以上</label><label class="checkbox"><input type="checkbox" name="sel_money" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>年齡：</td>
                            <td colspan=3>
                                <select name="sel_y2" id="sel_y2" disabled>
                                    <option value="">不限</option>
                                    <option value="1941">1941 年/民國 30 年/ 80 歲</option>
                                    <option value="1942">1942 年/民國 31 年/ 79 歲</option>
                                    <option value="1943">1943 年/民國 32 年/ 78 歲</option>
                                    <option value="1944">1944 年/民國 33 年/ 77 歲</option>
                                    <option value="1945">1945 年/民國 34 年/ 76 歲</option>
                                    <option value="1946">1946 年/民國 35 年/ 75 歲</option>
                                    <option value="1947">1947 年/民國 36 年/ 74 歲</option>
                                    <option value="1948">1948 年/民國 37 年/ 73 歲</option>
                                    <option value="1949">1949 年/民國 38 年/ 72 歲</option>
                                    <option value="1950">1950 年/民國 39 年/ 71 歲</option>
                                    <option value="1951">1951 年/民國 40 年/ 70 歲</option>
                                    <option value="1952">1952 年/民國 41 年/ 69 歲</option>
                                    <option value="1953">1953 年/民國 42 年/ 68 歲</option>
                                    <option value="1954">1954 年/民國 43 年/ 67 歲</option>
                                    <option value="1955">1955 年/民國 44 年/ 66 歲</option>
                                    <option value="1956">1956 年/民國 45 年/ 65 歲</option>
                                    <option value="1957">1957 年/民國 46 年/ 64 歲</option>
                                    <option value="1958">1958 年/民國 47 年/ 63 歲</option>
                                    <option value="1959">1959 年/民國 48 年/ 62 歲</option>
                                    <option value="1960">1960 年/民國 49 年/ 61 歲</option>
                                    <option value="1961">1961 年/民國 50 年/ 60 歲</option>
                                    <option value="1962">1962 年/民國 51 年/ 59 歲</option>
                                    <option value="1963">1963 年/民國 52 年/ 58 歲</option>
                                    <option value="1964">1964 年/民國 53 年/ 57 歲</option>
                                    <option value="1965">1965 年/民國 54 年/ 56 歲</option>
                                    <option value="1966">1966 年/民國 55 年/ 55 歲</option>
                                    <option value="1967">1967 年/民國 56 年/ 54 歲</option>
                                    <option value="1968">1968 年/民國 57 年/ 53 歲</option>
                                    <option value="1969">1969 年/民國 58 年/ 52 歲</option>
                                    <option value="1970">1970 年/民國 59 年/ 51 歲</option>
                                    <option value="1971">1971 年/民國 60 年/ 50 歲</option>
                                    <option value="1972">1972 年/民國 61 年/ 49 歲</option>
                                    <option value="1973">1973 年/民國 62 年/ 48 歲</option>
                                    <option value="1974">1974 年/民國 63 年/ 47 歲</option>
                                    <option value="1975">1975 年/民國 64 年/ 46 歲</option>
                                    <option value="1976">1976 年/民國 65 年/ 45 歲</option>
                                    <option value="1977">1977 年/民國 66 年/ 44 歲</option>
                                    <option value="1978">1978 年/民國 67 年/ 43 歲</option>
                                    <option value="1979">1979 年/民國 68 年/ 42 歲</option>
                                    <option value="1980">1980 年/民國 69 年/ 41 歲</option>
                                    <option value="1981">1981 年/民國 70 年/ 40 歲</option>
                                    <option value="1982">1982 年/民國 71 年/ 39 歲</option>
                                    <option value="1983">1983 年/民國 72 年/ 38 歲</option>
                                    <option value="1984">1984 年/民國 73 年/ 37 歲</option>
                                    <option value="1985">1985 年/民國 74 年/ 36 歲</option>
                                    <option value="1986">1986 年/民國 75 年/ 35 歲</option>
                                    <option value="1987">1987 年/民國 76 年/ 34 歲</option>
                                    <option value="1988">1988 年/民國 77 年/ 33 歲</option>
                                    <option value="1989">1989 年/民國 78 年/ 32 歲</option>
                                    <option value="1990">1990 年/民國 79 年/ 31 歲</option>
                                    <option value="1991">1991 年/民國 80 年/ 30 歲</option>
                                    <option value="1992">1992 年/民國 81 年/ 29 歲</option>
                                    <option value="1993">1993 年/民國 82 年/ 28 歲</option>
                                    <option value="1994">1994 年/民國 83 年/ 27 歲</option>
                                    <option value="1995">1995 年/民國 84 年/ 26 歲</option>
                                    <option value="1996">1996 年/民國 85 年/ 25 歲</option>
                                    <option value="1997">1997 年/民國 86 年/ 24 歲</option>
                                    <option value="1998">1998 年/民國 87 年/ 23 歲</option>
                                    <option value="1999">1999 年/民國 88 年/ 22 歲</option>
                                    <option value="2000">2000 年/民國 89 年/ 21 歲</option>
                                    <option value="2001">2001 年/民國 90 年/ 20 歲</option>
                                </select>
                                到
                                <select name="sel_y1" id="sel_y1" disabled>
                                    <option value="">不限</option>
                                    <option value="1941">1941 年/民國 30 年/ 80 歲</option>
                                    <option value="1942">1942 年/民國 31 年/ 79 歲</option>
                                    <option value="1943">1943 年/民國 32 年/ 78 歲</option>
                                    <option value="1944">1944 年/民國 33 年/ 77 歲</option>
                                    <option value="1945">1945 年/民國 34 年/ 76 歲</option>
                                    <option value="1946">1946 年/民國 35 年/ 75 歲</option>
                                    <option value="1947">1947 年/民國 36 年/ 74 歲</option>
                                    <option value="1948">1948 年/民國 37 年/ 73 歲</option>
                                    <option value="1949">1949 年/民國 38 年/ 72 歲</option>
                                    <option value="1950">1950 年/民國 39 年/ 71 歲</option>
                                    <option value="1951">1951 年/民國 40 年/ 70 歲</option>
                                    <option value="1952">1952 年/民國 41 年/ 69 歲</option>
                                    <option value="1953">1953 年/民國 42 年/ 68 歲</option>
                                    <option value="1954">1954 年/民國 43 年/ 67 歲</option>
                                    <option value="1955">1955 年/民國 44 年/ 66 歲</option>
                                    <option value="1956">1956 年/民國 45 年/ 65 歲</option>
                                    <option value="1957">1957 年/民國 46 年/ 64 歲</option>
                                    <option value="1958">1958 年/民國 47 年/ 63 歲</option>
                                    <option value="1959">1959 年/民國 48 年/ 62 歲</option>
                                    <option value="1960">1960 年/民國 49 年/ 61 歲</option>
                                    <option value="1961">1961 年/民國 50 年/ 60 歲</option>
                                    <option value="1962">1962 年/民國 51 年/ 59 歲</option>
                                    <option value="1963">1963 年/民國 52 年/ 58 歲</option>
                                    <option value="1964">1964 年/民國 53 年/ 57 歲</option>
                                    <option value="1965">1965 年/民國 54 年/ 56 歲</option>
                                    <option value="1966">1966 年/民國 55 年/ 55 歲</option>
                                    <option value="1967">1967 年/民國 56 年/ 54 歲</option>
                                    <option value="1968">1968 年/民國 57 年/ 53 歲</option>
                                    <option value="1969">1969 年/民國 58 年/ 52 歲</option>
                                    <option value="1970">1970 年/民國 59 年/ 51 歲</option>
                                    <option value="1971">1971 年/民國 60 年/ 50 歲</option>
                                    <option value="1972">1972 年/民國 61 年/ 49 歲</option>
                                    <option value="1973">1973 年/民國 62 年/ 48 歲</option>
                                    <option value="1974">1974 年/民國 63 年/ 47 歲</option>
                                    <option value="1975">1975 年/民國 64 年/ 46 歲</option>
                                    <option value="1976">1976 年/民國 65 年/ 45 歲</option>
                                    <option value="1977">1977 年/民國 66 年/ 44 歲</option>
                                    <option value="1978">1978 年/民國 67 年/ 43 歲</option>
                                    <option value="1979">1979 年/民國 68 年/ 42 歲</option>
                                    <option value="1980">1980 年/民國 69 年/ 41 歲</option>
                                    <option value="1981">1981 年/民國 70 年/ 40 歲</option>
                                    <option value="1982">1982 年/民國 71 年/ 39 歲</option>
                                    <option value="1983">1983 年/民國 72 年/ 38 歲</option>
                                    <option value="1984">1984 年/民國 73 年/ 37 歲</option>
                                    <option value="1985">1985 年/民國 74 年/ 36 歲</option>
                                    <option value="1986">1986 年/民國 75 年/ 35 歲</option>
                                    <option value="1987">1987 年/民國 76 年/ 34 歲</option>
                                    <option value="1988">1988 年/民國 77 年/ 33 歲</option>
                                    <option value="1989">1989 年/民國 78 年/ 32 歲</option>
                                    <option value="1990">1990 年/民國 79 年/ 31 歲</option>
                                    <option value="1991">1991 年/民國 80 年/ 30 歲</option>
                                    <option value="1992">1992 年/民國 81 年/ 29 歲</option>
                                    <option value="1993">1993 年/民國 82 年/ 28 歲</option>
                                    <option value="1994">1994 年/民國 83 年/ 27 歲</option>
                                    <option value="1995">1995 年/民國 84 年/ 26 歲</option>
                                    <option value="1996">1996 年/民國 85 年/ 25 歲</option>
                                    <option value="1997">1997 年/民國 86 年/ 24 歲</option>
                                    <option value="1998">1998 年/民國 87 年/ 23 歲</option>
                                    <option value="1999">1999 年/民國 88 年/ 22 歲</option>
                                    <option value="2000">2000 年/民國 89 年/ 21 歲</option>
                                    <option value="2001">2001 年/民國 90 年/ 20 歲</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>居住區域：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_area" value="北部" disabled><i></i>北部</label><label class="checkbox"><input type="checkbox" name="sel_area" value="中部" disabled><i></i>中部</label><label class="checkbox"><input type="checkbox" name="sel_area" value="南部" disabled><i></i>南部</label><label class="checkbox"><input type="checkbox" name="sel_area" value="台北" disabled><i></i>台北</label><label class="checkbox"><input type="checkbox" name="sel_area" value="桃竹苗" disabled><i></i>桃竹苗</label><label class="checkbox"><input type="checkbox" name="sel_area" value="中彰投" disabled><i></i>中彰投</label><label class="checkbox"><input type="checkbox" name="sel_area" value="雲嘉南" disabled><i></i>雲嘉南</label><label class="checkbox"><input type="checkbox" name="sel_area" value="高屏" disabled><i></i>高屏</label><label class="checkbox"><input type="checkbox" name="sel_area" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>星座：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_star" value="牡羊座" disabled><i></i>牡羊座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="金牛座" disabled><i></i>金牛座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="雙子座" disabled><i></i>雙子座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="巨蟹座" disabled><i></i>巨蟹座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="獅子座" disabled><i></i>獅子座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="處女座" disabled><i></i>處女座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="天秤座" disabled><i></i>天秤座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="天蠍座" disabled><i></i>天蠍座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="射手座" disabled><i></i>射手座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="魔羯座" disabled><i></i>魔羯座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="水瓶座" disabled><i></i>水瓶座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="雙魚座" disabled><i></i>雙魚座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>身高：</td>
                            <td colspan=3>

                                <input type="text" name="sel_he1" id="sel_he1" class="form-control" style="width:100px;display:inline-block;" value="" disabled> - <input type="text" name="sel_he2" id="sel_he2" class="form-control" style="width:100px;display:inline-block;" value="" disabled> 公分

                            </td>
                        </tr>
                        <tr>
                            <td>身型：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_wet" value="苗條" disabled><i></i>苗條</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="普通" disabled><i></i>普通</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="豐腴" disabled><i></i>豐腴</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="有肌肉" disabled><i></i>有肌肉</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="豐滿" disabled><i></i>豐滿</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="肥胖" disabled><i></i>肥胖</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="偏瘦" disabled><i></i>偏瘦(<18)< /label><label class="checkbox"><input type="checkbox" name="sel_wet" value="中等" disabled><i></i>中等(18.1~24)</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="偏肉" disabled><i></i>偏肉(>24)</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>社交性：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_sociability" value="喜歡與多人相處" disabled><i></i>喜歡與多人相處</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="喜歡與少數人相處" disabled><i></i>喜歡與少數人相處</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="喜歡獨處" disabled><i></i>喜歡獨處</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="很熟" disabled><i></i>很熟</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="慢熟" disabled><i></i>慢熟</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>交友觀點：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_view" value="純粹擴大交友" disabled><i></i>純粹擴大交友</label><label class="checkbox"><input type="checkbox" name="sel_view" value="尋找談戀愛對象" disabled><i></i>尋找談戀愛對象</label><label class="checkbox"><input type="checkbox" name="sel_view" value="尋找依靠終身伴侶" disabled><i></i>尋找依靠終身伴侶</label><label class="checkbox"><input type="checkbox" name="sel_view" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>抽菸：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_mem7" value="是" disabled><i></i>是</label><label class="checkbox"><input type="checkbox" name="sel_mem7" value="否" disabled><i></i>否</label><label class="checkbox"><input type="checkbox" name="sel_mem7" value="偶爾" disabled><i></i>偶爾</label><label class="checkbox"><input type="checkbox" name="sel_mem7" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>喝酒：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_mem8" value="是" disabled><i></i>是</label><label class="checkbox"><input type="checkbox" name="sel_mem8" value="否" disabled><i></i>否</label><label class="checkbox"><input type="checkbox" name="sel_mem8" value="偶爾" disabled><i></i>偶爾</label><label class="checkbox"><input type="checkbox" name="sel_mem8" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>飲食：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="sel_mem22" value="全素" disabled><i></i>全素</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="鍋邊素" disabled><i></i>鍋邊素</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="奶蛋素" disabled><i></i>奶蛋素</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="吃辣" disabled><i></i>吃辣</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="不吃辣" disabled><i></i>不吃辣</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="葷食" disabled><i></i>葷食</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">忌諱：</div>
                            </td>
                            <td colspan=3> </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">擇友條件：</div>
                            </td>
                            <td colspan=3> </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="font-size:150%;color:blue"><b>其他事項</b></td>
                        </tr>
                        <tr>
                            <td>備註說明：</td>
                            <td colspan=3><textarea id="sys_note" name="sys_note" cols="100" rows="5" id="textarea" style="width:50%;height:60px" readonly></textarea> </td>
                        </tr>
                        <tr>
                            <td>會員備註：</td>
                            <td colspan=3><textarea id="tosinglenote" name="tosinglenote" cols="100" rows="5" id="textarea" style="width:50%;height:60px" readonly></textarea> </td>
                        </tr>

                        <tr>
                            <td>方便聯繫時間：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="can_call" value="星期一" disabled><i></i>星期一</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期二" disabled><i></i>星期二</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期三" disabled><i></i>星期三</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期四" disabled><i></i>星期四</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期五" disabled><i></i>星期五</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期六" disabled><i></i>星期六</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期日" disabled><i></i>星期日</label><label class="checkbox"><input type="checkbox" name="can_call" value="上午" disabled><i></i>上午</label><label class="checkbox"><input type="checkbox" name="can_call" value="下午" disabled><i></i>下午</label><label class="checkbox"><input type="checkbox" name="can_call" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>方便排約時間：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="can_love" value="星期一" disabled><i></i>星期一</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期二" disabled><i></i>星期二</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期三" disabled><i></i>星期三</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期四" disabled><i></i>星期四</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期五" disabled><i></i>星期五</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期六" disabled><i></i>星期六</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期日" disabled><i></i>星期日</label><label class="checkbox"><input type="checkbox" name="can_love" value="上午" disabled><i></i>上午</label><label class="checkbox"><input type="checkbox" name="can_love" value="下午" disabled><i></i>下午</label><label class="checkbox"><input type="checkbox" name="can_love" value="不拘" checked disabled><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>魅力處方箋01：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="recipe1" value="戀愛講堂" disabled><i></i>戀愛講堂</label><label class="checkbox"><input type="checkbox" name="recipe1" value="魅力有約" disabled><i></i>魅力有約</label><label class="checkbox"><input type="checkbox" name="recipe1" value="品味生活" disabled><i></i>品味生活</label><label class="checkbox"><input type="checkbox" name="recipe1" value="互動美學" disabled><i></i>互動美學</label>
                            </td>
                        </tr>
                        <tr>
                            <td>魅力處方箋02：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="recipe2" value="輕旅行" disabled><i></i>輕旅行</label><label class="checkbox"><input type="checkbox" name="recipe2" value="主題特別企劃" disabled><i></i>主題特別企劃</label><label class="checkbox"><input type="checkbox" name="recipe2" value="主題精緻餐會" disabled><i></i>主題精緻餐會</label><label class="checkbox"><input type="checkbox" name="recipe2" value="美味廚房" disabled><i></i>美味廚房</label><label class="checkbox"><input type="checkbox" name="recipe2" value="健康料理" disabled><i></i>健康料理</label><label class="checkbox"><input type="checkbox" name="recipe2" value="國外旅遊" disabled><i></i>國外旅遊</label>
                            </td>
                        </tr>
                        <tr>
                            <td>魅力處方箋03：</td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" name="recipe3" value="一對一排約" disabled><i></i>一對一排約</label><label class="checkbox"><input type="checkbox" name="recipe3" value="多平台排約" disabled><i></i>多平台排約</label><label class="checkbox"><input type="checkbox" name="recipe3" value="多對多約會" disabled><i></i>多對多約會</label><label class="checkbox"><input type="checkbox" name="recipe3" value="主題式約會" disabled><i></i>主題式約會</label><label class="checkbox"><input type="checkbox" name="recipe3" value="下午茶約會" disabled><i></i>下午茶約會</label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="right">會館/秘書：</div>
                            </td>
                            <td colspan=4>
                                <font color=green>受理</font>：台北-台北督導
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=green>排約</font>：
                                無
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=green>邀約</font>：
                                無
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;電訪員：0　　

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">是否入會：</div>
                            </td>
                            <td>
                                已入會
                                璀璨會員(~)
                            </td>
                            <td>
                                <div align="right">參加卡別：</div>
                            </td>
                            <td>一年卡</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">入會日期：</div>
                            </td>
                            <td>2009/2/1</td>
                            <td>
                                <div align="right">來源：</div>
                            </td>
                            <td>其他
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">資料時間：</div>
                            </td>
                            <td>2008/10/19 下午 02:42:00</td>
                            <td>
                                <div align="right">更新時間：</div>
                            </td>
                            <td>2009/2/3 下午 04:32:00</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">最後登入時間：</div>
                            </td>
                            <td></td>
                            <td>
                                <div align="right">輸入：</div>
                            </td>
                            <td>不明</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">最後排約時間：</div>
                            </td>
                            <td>2009/2/3 下午 07:30:00</td>
                            <td>
                                <div align="right">推薦人：</div>
                            </td>
                            <td>　（推薦會館秘書：　

                                ）</td>
                        </tr>


                        <tr>
                            <td valign="top">
                                <div align="right">處理情形：</div>
                            </td>
                            <td colspan=3>未處理　<a href="javascript:Mars_popup('ad_report.php?k_id=85689&lu=A000000002&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">處理內容：</div>
                            </td>
                            <td colspan=3>無　　<font color=blue>舊：</font>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4>
                                會員照片及生活照&nbsp;&nbsp;<a href="ad_photo_check.php?sear=1&vst=&s99=&s4=173134" target="_blank">前往審核</a><br>
                                <div class="lightbox" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" colspan=4>
                                <div style="text-align:center;display:inline-block;">
                                    未上傳身分證正面
                                </div>
                                <div style="text-align:center;display:inline-block;">
                                    未上傳身分證反面
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4>
                                未上傳工作證
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4>
                                此會員學歷為大學<font color=blue>應</font>上傳學歷證明文件<br>未上傳學歷證明文件
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4>
                                財力證明文件<br>
                                此會員財力為<font color=red>可不需</font>財力證明文件<br>

                            </td>
                        </tr>
                        <tr>
                            <td colspan=4>此會員目前為璀璨會員(視服務期間而定)</td>
                        </tr>
                        <tr>
                            <td colspan=4>資料效期內共主動排約 0 次、被動排約 47 次</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <form method="post" action="?st=log_send">
                        <input type="hidden" name="mem_auto" value="85689">
                        <input type="hidden" name="lusername" value="A000000002">
                        <input type="hidden" name="mem_num" value="173134">
                        <input type="hidden" name="mem_mobile" value="0900000001">
                        <input type="hidden" name="log_name" value="JACK">
                        <input type="hidden" name="log_username" value="鄭小姐">
                        <input type="hidden" name="log_branch" value="總管理處">
                        <input type="hidden" name="ty" value="member">
                        <tr>
                            <td colspan=3>預約聯絡：
                                <input type="text" style="width:120px;height:34px;" name="log_6" id="log_6" class="datepickert" placeholder="點此預約下次通話" autocomplete="off" required>
                                <select name="log_6_time1" id="log_6_time1" required>
                                    <option value="">請選擇</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option> 時
                                </select><select name="log_6_time2" id="log_6_time2">
                                    <option value="00">00</option>
                                    <option value="30">30</option>
                                </select> 分
                                &nbsp;&nbsp;內容：<input type="text" name="log_4" id="log_4" style="width:300px;height:34px;">　<input type="submit" value="送出" class="btn btn-default">
                    </form>
                    </td>
                    </tr>

                    <!--<tr><td style="color:blue">處理時間</td><td style="color:blue">處理內容</td><td style="color:blue" width="120">下次通話時間</td></tr>

<tr><td>2020/10/21 下午 05:51:00<br>澔翰</td><td>系統紀錄-由 瑪那熊 擔任講師於 2020/10/21 下午 04:00:00 在台北 諮詢[一對一諮詢] - 諮詢紀錄</td><td></td></tr><tr><td>2020/10/21 下午 05:38:00<br>秋如</td><td>系統紀錄-由 瑪那熊 擔任講師於 2020/10/21 下午 04:00:00 在台北 諮詢[一對一諮詢] - 諮詢紀錄</td><td></td></tr>-->
                </table>




                <div style="color:red">相關服務紀錄請點擊本頁面上方的[服務紀錄]按鈕查閱</div>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>

    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require("./include/_bottom.php");
?>

<script type="text/javascript">
    loadScript(plugin_path + 'bootstrap.datepicker/js/bootstrap-datepicker.min.js?v=1.1', function() {
        $(".datepickert").datepicker({
            startDate: new Date(),
            format: 'yyyy-mm-dd',
            language: 'tw'
        });
    });

    function checkok() {
        if (!$("#chk1").prop("checked")) {
            alert("請確認本人照片。");
            return false;
        }
        if (!$("#chk2").prop("checked")) {
            alert("請確認身分證正面。");
            return false;
        }
        if (!$("#chk3").prop("checked")) {
            alert("請確認身分證反面。");
            return false;
        }
        if (!$("#cardid").val()) {
            alert("請輸入圖片內的身分證字號。");
            $("#cardid").focus();
            return false;
        }

        if ($("#cardid").val().toUpperCase() != "A000000002") {
            alert("圖片內的身分證字號與會員自行輸入的身分證字號不同。");
            return false;
        }

        return true;
    }

    function checknook() {
        location.href = 'ad_mem_detail.php?st=checknook&mem_num=173134&errmsg=' + $("#si_errmsg").val();
    }
</script>