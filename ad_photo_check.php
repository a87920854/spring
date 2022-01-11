<?php
/***************************************/
//檔案名稱：ad_photo_check.php
//後台對應位置：春天網站功能 > 網站照片審核
//改版日期：2022.1.11
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//頁面權限
check_page_power("ad_photo_check");

//?
$st = SqlFilter($_REQUEST["st"],"tab");
$a = SqlFilter($_REQUEST["a"],"tab");
$p = SqlFilter($_REQUEST["p"],"tab");
$t = SqlFilter($_REQUEST["t"],"tab");
$v = SqlFilter($_REQUEST["v"],"tab");
$errmsg = SqlFilter($_REQUEST["errmsg"],"tab");
if ( $st == "delpic" ){
    $SQL = "Select * From photo_data Where photo_auto=".$a;
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    //foreach($result as $re);
  	if ( count($result) > 0 ){
        if ( $re["types"] == "dmn" ){
            //刪除實體檔案
            $path = dirname(__FILE__)."\dphoto\photo\\".$re["photo_name"];
			DelFile($path);
			//刪除資料庫資料
  		    //rmfile(server.mappath("dphoto/photo/"&rs("photo_name")))
        }else{
            //刪除實體檔案
            $path = dirname(__FILE__)."\photo\\".$re["photo_name"];
            DelFile($path);
            //刪除資料庫資料
            //rmfile(server.mappath("photo/"&rs("photo_name")))
  	    }
  		$SQL_d = "Delete From photo_data Where photo_auto=".$a;
        $rs_d = $SPConn->prepare($SQL_d);
        $rs_d->execute();
    }
  	header("location:ad_photo_check.asp?topage=".$p."&t=".$t);
}

//?
if ( $st == "accept" && $v != "" ){
    $sendmail = 0;
  	//set rs = Server.CreateObject("ADODB.Recordset")
    $SQL = "Select * From photo_data Where photo_auto=".$a;
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
   	if ( count($result) > 0 ){   	
   	    $mem_num = $re["mem_num"];
   	    if ( $errmsg != "" ){
   		    $subSQL = ",acceptm = '".$errmsg."'";
        }
   	    if ( $v == "1" ){
   		    $sendmail = 1;
   		    if ( $re["types"] == "dmn" ){
   			    //set qrs = Server.CreateObject("ADODB.Recordset")
                $SQL1 = "Select mem_photo, mem_mail From member_data Where mem_num='".$mem_num;
                $rs1 = $SPConn->prepare($SQL1);
                $rs1->execute();
                $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                foreach($result1 as $re1);
   		        if ( count($result1) > 0 ){
   			        $mem_photo = $re1["mem_photo"];
   			        $mem_mail = $re1["mem_mail"];
                    //刪除資料庫資料
                    $path = dirname(__FILE__)."\dphoto\photo\\".$mem_photo;
                    DelFile($path);
                    
   			        $SQL_u = "Update member_data Set mem_photo='photo/".$re["photo_name"]."' Where mem_num=".$mem_num;
                    $rs_u = $SPConn->prepare($SQL_u);
                    $rs_u->execute();       
                }

                $SQL1 = "Select HeadPhotoURL From UserData Where UserID='".$mem_num."'";
                $rs1 = $DMNOpen->prepare($SQL1);
                $rs1->execute();
                $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                foreach($result1 as $re1);
           		if ( count($result1) > 0 ){
                    $SQL_u = "Update UserData Set HeadPhotoURL='photo/".$re["photo_name"]."' Where UserID=".$mem_num;
                    $rs_u = $DMNOpen->prepare($SQL_u);
                    $rs_u->execute();
                }
            }else{
                $SQL1 = "Select mem_photo, mem_mail, si_no_mail1 From member_data Where mem_num='".$mem_num."'";
                $rs1 = $SPConn->prepare($SQL1);
                $rs1->execute();
                $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                foreach($result1 as $re1);
                if ( count($result1) > 0 ){
                    $mem_photo = $re1["mem_photo"];
                    $mem_mail = $re1["mem_mail"];
                    $mnomail = $re1["si_no_mail1"];
                    if ( $mem_photo == "" || is_Null($mem_photo) || substr_count($mem_photo, "boy") > 0 || substr_count($mem_photo, "girl") > 0 ){
                        $SQL_u = "Update member_data Set mem_photo='".$re["photo_name"]."' Where mem_num=".$mem_num;
                        $rs_u = $SPConn->prepare($SQL_u);
                        $rs_u->execute();
                    }
                }
            }
        }

        $SQL_u = "Update photo_data Set accept=".$v.",accept_single='".$_SESSION["MM_Username"]."'".$subSQL." Where photo_auto=".$a;
        $rs_u = $SPConn->prepare($SQL_u);
        $rs_u->execute();    
    }
   	
    if ( $sendmail == 1 ){
        sysmsg($mem_num, "您的照片已公開！", "");
        if ( $mem_mail != "" ){
            //寄信
            //notice_edm("您的照片已公開！", mem_mail, "您的照片已公開！", "您設定的照片已審核通過，並已公開於前台了！<br><br><a href=""http://www.singleparty.com.tw/mypage.asp"">▼ 確認照片請往這裡</a><br><a href=""http://www.singleparty.com.tw/member_list.asp?t=2"">▼ 馬上去尋找欣賞的對象</a><br>由衷盼望您能在約會專家裡找到理想中的對象。<br><br>今後也請多多指教。", "", mnomail)
        }
    }
    header("location:ad_photo_check.php?topage=".$t);
}

$times1 = SqlFilter($_REQUEST["times1"],"tab");
$times2 = SqlFilter($_REQUEST["times2"],"tab");
if ( $times1 != "" ){
    $acre_sign1 = $times1 ." 00:00";
    $vacre_sign1 = $times1;
    if ( chkDate($acre_sign1) == false ){
        call_alert("起始時間有誤。", 0, 0);
    }
}
if ( $times2 != "" ){
    $acre_sign2 = $times2 . " 23:59";
    $vacre_sign2 = $times2;
    if ( chkDate($acre_sign2) == false ){
        call_alert("結束時間有誤。", 0, 0);
    }
}

$default_sql_num = 500;
$vst = SqlFilter($_REQUEST["vst"],"tab");
if ( $vst == "full" ){
    $subSQL1 = "*";
    $sqlv2 = "count(photo_auto)";
}else{
    $subSQL1 = "top ".$default_sql_num." *";
    $sqlv2 = "count(photo_auto)";
}
//"Select ".sqlv&" FROM photo_data INNER JOIN member_data ON photo_data.mem_num = member_data.mem_num WHERE 1=1"&b2sql
if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "count" ){
    $subSQL2 = " 1=1".$b2sql;
    //$sqls = "Select "&sqlv&" FROM photo_data INNER JOIN member_data ON photo_data.mem_num = member_data.mem_num WHERE (member_data.mem_branch='"&session("branch")&"' or member_data.mem_branch2='"&session("branch")&"')"&b2sql
    //sqls2 = "Select "&sqlv2&" as total_size FROM photo_data INNER JOIN member_data ON photo_data.mem_num = member_data.mem_num WHERE 1=1"&b2sql
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "pay" || $_SESSION["MM_UserAuthorization"] == "keyin" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $subSQL2 = "(member_data.mem_branch='".$_SESSION["branch"]."' or member_data.mem_branch2='".$_SESSION["branch"]."')".$b2sql;
    //sqls = "Select "&sqlv&" FROM photo_data INNER JOIN member_data ON photo_data.mem_num = member_data.mem_num WHERE (member_data.mem_branch='"&session("branch")&"' or member_data.mem_branch2='"&session("branch")&"')"&b2sql
    //sqls2 = "Select "&sqlv2&" as total_size FROM photo_data INNER JOIN member_data ON photo_data.mem_num = member_data.mem_num WHERE (member_data.mem_branch='"&session("branch")&"' or member_data.mem_branch2='"&session("branch")&"')"&b2sql
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" ){
    $subSQL2 = "(member_data.mem_branch='".$_SESSION["branch"]."' and mem_single='".$_SESSION["MM_Username"]."')".$b2sql;
    //sqls = "Select "&sqlv&" FROM photo_data INNER JOIN member_data ON photo_data.mem_num = member_data.mem_num WHERE (member_data.mem_branch='"&session("branch")&"' and mem_single='"&session("MM_Username")&"')"&b2sql
    //sqls2 = "Select "&sqlv2&" as total_size FROM photo_data INNER JOIN member_data ON photo_data.mem_num = member_data.mem_num WHERE (member_data.mem_branch='"&session("branch")&"' and mem_single='"&session("MM_Username")&"')"&b2sql
}

if ( chkDate($acre_sign1) && chkDate($acre_sign2) ){
    $days = (strtotime($acre_sign1)-strtotime($acre_sign2))/86400;
    if ( $days < 0 ){
        call_alert("結束時間不能大於起始時間。", 0, 0);
    }
    $subSQL3 = $subSQL3 . " and photo_data.photo_time between '".$acre_sign1."' and '".$acre_sign2."'";
}

//關鍵字
$keyword = SqlFilter($_REQUEST["keyword"],"tab");
$s4 = SqlFilter($_REQUEST["s4"],"tab");
$branch = SqlFilter($_REQUEST["branch"],"tab");
$ismem = SqlFilter($_REQUEST["ismem"],"tab");
$issingle = SqlFilter($_REQUEST["issingle"],"tab");
$sex = SqlFilter($_REQUEST["sex"],"tab");
$types = SqlFilter($_REQUEST["types"],"tab");

//關鍵字
if ( $keyword != "" ){
    $subSQL3 = $subSQL3 . " and photo_data.mem_num like '%".$keyword."%'";
}

if ( $s4 != "" ){
    $subSQL3 = $subSQL3 . " and photo_data.mem_num like '%".$s4."%'";
}

//會館
if ( $branch != "" ){
    $subSQL3 = $subSQL3 . " and mem_branch = '".$branch."'";
}

//顯示會員/非會員
if ( $ismem == "1" ){
    $subSQL3 = $subSQL3 . " and mem_level = 'mem'";
}

//顯示所有/祕書上傳
if ( $issingle == "1" ){
    $subSQL3 = $subSQL3 . " and come = 'single'";
}

//性別
if ( $sex != "" ){
    $subSQL3 = $subSQL3 . " and mem_sex = '".$sex."'";
}

//是否審核
if ( $types == "1" ){
    $vv = "已審核";
    $subSQL3 = $subSQL3 . " and accept=1";
}else{
	$vv = "未審核";
    $subSQL3 = $subSQL3 . " and accept=0";
}
			  
$subSQL4 = " and photo_data.mem_num <> 0";
$subSQL5 = " order by photo_time";

//sqls = sqls & sqlss &" and photo_data.mem_num <> 0 "
//sqls2 = sqls2 & sqlss

//取得總筆數
$SQL = "Select count(photo_auto) As total_size From photo_data INNER JOIN member_data ON photo_data.mem_num = member_data.mem_num Where ".$subSQL2.$subSQL3.$subSQL4;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result=$rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 || $re["total_size"] == 0 ) {
    $total_size = 0;
}else{
    if ( $vst == "" ){
        $total_size = 500;
    }else{
        $total_size = $re["total_size"];
    }
}

//查看清單連結文字
if ( $vst == "full" ){
    $count_href = "　<a href='?vst=n'>[查看前五百筆]</a>";
}else{
    $count_href = "　<a href='?vst=full'>[查看完整清單]</a>";
}


//取得分頁資料
$tPageSize = 50; //每頁幾筆
$tPage = 0; //目前頁數
if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
if ( $tPageSize*$tPage < $total_size ){
    $page2 = 50;
}else{
    $page2 = (50-(($tPageSize*$tPage)-$total_size));
}

//分頁語法
$SQL_list  = "Select ".$subSQL1." ";
$SQL_list .= "From (Select row_number() ";
$SQL_list .= "over(".$subSQL5." Asc) As rownumber,member_data.mem_num,mem_name ";
$SQL_list .= "From photo_data INNER JOIN member_data ON photo_data.mem_num = member_data.mem_num Where ".$subSQL2.$subSQL3.$subSQL4." ) temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage);
echo $SQL_list;
exit;
$rs_list = $SPConn->prepare($SQL_list);
$rs_list->execute();
$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);


?>
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">網站照片審核</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>網站照片審核 - 未審核 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form id="searchform" action="ad_photo_check.php?vst=full&sear=1&t=" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()" style="margin:0px;">

                        <p>
                            會館：
                            <select name="branch" id="branch" style="width:100px;">
                                <option value="">請選擇</option>
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
                            </select>
                            &nbsp;&nbsp;


                            上傳時間：
                            <input type="text" class="datepicker" autocomplete="off" name="times1" value="">
                            ～
                            <input type="text" class="datepicker" autocomplete="off" name="times2" value="">
                        </p>
                        <p>
                            <select name="ismem" id="ismem">
                                <option value="">顯示會員+非會員</option>
                                <option value="1">僅顯示會員</option>
                            </select>
                            &nbsp;&nbsp;
                            <select name="sex" id="sex">
                                <option value="">性別</option>
                                <option value="男">男性</option>
                                <option value="女">女性</option>
                            </select>
                            &nbsp;&nbsp;
                            <select name="issingle" id="issingle">
                                <option value="">顯示所有</option>
                                <option value="1">秘書上傳</option>
                            </select>
                            <select name="types" id="types">
                                <option value="">未審核</option>
                                <option value="1">已審核</option>
                            </select>
                        </p>
                        <p>
                            <input name="keyword" id="keyword" class="form-control" type="text" value="" placeholder="輸入要搜尋的關鍵字">
                            <input type="submit" value="送出" class="btn btn-default">
                    </form>
                    </p>
                </div>
                <p class="text-danger">審核時請確認姓名、暱稱、自介等內容是否正確，如有異常請直接審核不通過，避免詐騙或其他造成公司損害之問題。</p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=60>會館</th>
                            <th width=160>時間</th>
                            <th width=150>編號</th>
                            <th width=150>待審照片</th>
                            <th>其他參考照片</th>
                            <th width=300>自介</th>
                            <th width=80>來源</th>
                            <th width=120></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-09-13 17:42</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：王靖凱
                                <br>
                                暱：阿智<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2083660" target="_blank">2083660</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/2021913174131_2083660_223050.jpg" class="fancybox" rel="group_1" title="未審核照片265317"><img src="photo/2021913174131_2083660_223050.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>&#65306;&#65289;&#20320;&#22909;~&#20570;&#20491;&#33258;&#25105;&#20171;&#32057;~&#25105;&#26159;&#20856;&#22411;&#30340;&#29509;&#23376;&#24231;&#65292;&#23416;&#27511;&#28858;&#39640;&#32887;&#65292;&#33288;&#36259;&#26159;&#20828;&#39080;&#12289;&#37066;&#36938;&#21152;&#20837;&#36889;&#20491;&#24179;&#21488;&#24076;&#26395;&#33021;&#36935;&#35211;&#19981;&#37679;&#30340;&#20154;&#21487;&#20197;&#19968;&#36215;&#20998;&#20139;&#29983;&#27963;&#65292;&#22914;&#26524;&#32842;&#24471;&#20358;&#20063;&#24076;&#26395;&#21487;&#20197;&#26377;&#26356;&#36914;&#19968;&#27493;&#30340;&#30332;&#23637;^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=265317&mem_num=2083660&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=265317&mem_num=2083660&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-09-13 14:25</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：江琳是渾蛋虛偽死騙子
                                <br>
                                暱：江琳是渾蛋虛偽死騙子<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2083594" target="_blank">2083594</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/2109131425082083594_69977.png" class="fancybox" rel="group_2" title="未審核照片265314"><img src="photo/2109131425082083594_69977.png" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>混蛋虛偽死騙子混蛋虛偽死騙子混蛋虛偽死騙子混蛋虛偽死騙子混蛋虛偽死騙子混蛋虛偽死騙子混蛋虛偽死騙子混蛋虛偽死騙子混蛋虛偽死騙子混蛋虛偽死騙子混蛋虛偽死騙子混蛋虛偽死騙子混蛋虛偽死騙
                                惡劣渾蛋都在說謊</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=265314&mem_num=2083594&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=265314&mem_num=2083594&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-09-12 19:36</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：黃千珈
                                <br>
                                暱：千珈<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2083490" target="_blank">2083490</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="photo/202191219364_2083490_933559.jpg" class="fancybox" rel="group_3" title="未審核照片265290"><img src="photo/202191219364_2083490_933559.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>&#65306;&#65289;&#20320;&#22909;~&#20570;&#20491;&#33258;&#25105;&#20171;&#32057;~&#25105;&#26159;&#20856;&#22411;&#30340;&#37329;&#29275;&#24231;&#65292;&#23416;&#27511;&#28858;&#22823;&#23416;&#65292;&#33288;&#36259;&#26159;&#20570;&#33756;&#12289;&#23429;&#22312;&#23478;&#35041;&#12289;&#21654;&#21857;&#21152;&#20837;&#36889;&#20491;&#24179;&#21488;&#24076;&#26395;&#33021;&#36935;&#35211;&#19981;&#37679;&#30340;&#20154;&#21487;&#20197;&#19968;&#36215;&#20998;&#20139;&#29983;&#27963;&#65292;&#22914;&#26524;&#32842;&#24471;&#20358;&#20063;&#24076;&#26395;&#21487;&#20197;&#26377;&#26356;&#36914;&#19968;&#27493;&#30340;&#30332;&#23637;^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=265290&mem_num=2083490&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=265290&mem_num=2083490&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-09-08 14:49</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：江琳是渾蛋虛偽死騙子
                                <br>
                                暱：江琳是渾蛋虛偽死騙子<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2082462" target="_blank">2082462</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/2109081448352082462_24394.png" class="fancybox" rel="group_4" title="未審核照片265104"><img src="photo/2109081448352082462_24394.png" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>虛偽的騙子虛偽的騙子
                                從頭到結束都在騙人的江琳</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=265104&mem_num=2082462&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=265104&mem_num=2082462&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-09-07 02:47</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：Vita
                                <br>
                                暱：Vita<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2082189" target="_blank">2082189</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2109070247232082189_79849.jpeg" class="fancybox" rel="group_5" title="未審核照片265045"><img src="dphoto/photo/2109070247232082189_79849.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>❤️今晚請問想要來點什麼？</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=265045&mem_num=2082189&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=265045&mem_num=2082189&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-09-06 13:54</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：江琳是渾蛋虛偽死騙子
                                <br>
                                暱：江琳是渾蛋虛偽死騙子<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2081995" target="_blank">2081995</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/2109061354022081995_48615.png" class="fancybox" rel="group_6" title="未審核照片265013"><img src="photo/2109061354022081995_48615.png" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子騙子死騙子</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=265013&mem_num=2081995&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=265013&mem_num=2081995&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-09-04 16:08</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：戴曉慧
                                <br>
                                暱：慧慧<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2081515" target="_blank">2081515</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2109041607492081515_35546.jpg" class="fancybox" rel="group_7" title="未審核照片264905"><img src="dphoto/photo/2109041607492081515_35546.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為大學，興趣是登山、宅在家裡、繪畫加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=264905&mem_num=2081515&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=264905&mem_num=2081515&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-09-02 22:06</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：林梓萱
                                <br>
                                暱：林梓萱（ID：lsp28）<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2081168" target="_blank">2081168</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2109022205582081168_13137.jpg" class="fancybox" rel="group_8" title="未審核照片264829"><img src="dphoto/photo/2109022205582081168_13137.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為高中，興趣是做菜、郊遊、旅遊加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來可更進一步的發展^_^（Line：lsp28）</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=264829&mem_num=2081168&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=264829&mem_num=2081168&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-09-02 10:45</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：江琳是渾蛋虛偽死騙子
                                <br>
                                暱：江琳是渾蛋虛偽死騙子<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2080985" target="_blank">2080985</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/2109021045102080985_8174.png" class="fancybox" rel="group_9" title="未審核照片264794"><img src="photo/2109021045102080985_8174.png" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子說謊的騙子</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=264794&mem_num=2080985&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=264794&mem_num=2080985&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-09-01 10:41</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：江琳是渾蛋虛偽死騙子
                                <br>
                                暱：江琳是渾蛋虛偽死騙子<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2080744" target="_blank">2080744</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/2109011041212080744_95216.png" class="fancybox" rel="group_10" title="未審核照片264732"><img src="photo/2109011041212080744_95216.png" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>騙人的死騙子
                                從開始就在騙人
                                最後還惡整人
                                你個死騙子
                                虛偽的死騙子
                                虛偽做作的死騙子</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=264732&mem_num=2080744&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=264732&mem_num=2080744&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-30 17:30</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：蔡淑惠
                                <br>
                                暱：淑惠<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2080392" target="_blank">2080392</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2108301730122080392_23827.jpg" class="fancybox" rel="group_11" title="未審核照片263663"><img src="dphoto/photo/2108301730122080392_23827.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為國中，興趣是郊遊、旅遊、財經加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=263663&mem_num=2080392&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=263663&mem_num=2080392&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-29 04:45</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：钟子洋
                                <br>
                                暱：洋哥哥丶<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2079970" target="_blank">2079970</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="dphoto/photo/2108290444302079970_16587.jpg" class="fancybox" rel="group_12" title="未審核照片263566"><img src="dphoto/photo/2108290444302079970_16587.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為高中，興趣是做菜、品嘗美食、旅遊加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=263566&mem_num=2079970&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=263566&mem_num=2079970&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-28 22:26</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：崔仲輝
                                <br>
                                暱：崔仲輝<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2079924" target="_blank">2079924</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/202182822263_2079924_801830.jpg" class="fancybox" rel="group_13" title="未審核照片263552"><img src="photo/202182822263_2079924_801830.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>&#24076;&#26395;&#33021;&#20491;&#22909;&#23565;&#35937;&#36942;&#19979;&#21322;&#36649;&#23376;</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=263552&mem_num=2079924&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=263552&mem_num=2079924&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-27 11:08</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：王晏
                                <br>
                                暱：Yen<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2079479" target="_blank">2079479</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="dphoto/photo/2108271107482079479_91038.jpg" class="fancybox" rel="group_14" title="未審核照片263467"><img src="dphoto/photo/2108271107482079479_91038.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為大學，興趣是看電影、運動、財經加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=263467&mem_num=2079479&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=263467&mem_num=2079479&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-25 16:03</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：江琳是混蛋虛偽死騙子
                                <br>
                                暱：江琳是混蛋虛偽死騙子<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2079006" target="_blank">2079006</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/2108251602332079006_15641.jpg" class="fancybox" rel="group_15" title="未審核照片263358"><img src="photo/2108251602332079006_15641.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>江琳虛偽騙子江琳虛偽騙子
                                江琳虛偽騙子江琳虛偽騙子
                                江琳虛偽騙子江琳虛偽騙子
                                江琳虛偽騙子江琳虛偽騙子
                                江琳虛偽騙子江琳虛偽騙子
                                江琳虛偽騙子江琳虛偽騙子
                                江琳虛偽騙子江琳虛偽騙子
                                江琳虛偽騙子死騙子</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=263358&mem_num=2079006&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=263358&mem_num=2079006&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-23 10:27</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：王浩宇
                                <br>
                                暱：王浩宇<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2078469" target="_blank">2078469</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="dphoto/photo/2108231026352078469_69217.jpg" class="fancybox" rel="group_16" title="未審核照片262256"><img src="dphoto/photo/2108231026352078469_69217.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為大學，興趣是做菜、登山加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=262256&mem_num=2078469&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=262256&mem_num=2078469&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-19 16:47</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：王若安
                                <br>
                                暱：弱安<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2077619" target="_blank">2077619</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2108191647132077619_78664.jpg" class="fancybox" rel="group_17" title="未審核照片261970"><img src="dphoto/photo/2108191647132077619_78664.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為大學，興趣是逛街、看電影、宅在家裡加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^

                                罐頭好像寫的不錯就用這個吧😂</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=261970&mem_num=2077619&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=261970&mem_num=2077619&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-18 07:15</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：Chungwie
                                <br>
                                暱：Chungwei <br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2077235" target="_blank">2077235</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/202181871529_2077235_621960.jpeg" class="fancybox" rel="group_18" title="未審核照片261872"><img src="photo/202181871529_2077235_621960.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                <div style="display:inline-block"><span class="label label-warning">參考照片 1</span><br><a style="margin-left:5px;" href="photo/202181871357_2077235_683468.jpeg" class="fancybox" rel="group_18" title="未審核"><img src="photo/202181871357_2077235_683468.jpeg" width=100 height=120></a><br>未審核</div>
                            </td>
                            <td></td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=261872&mem_num=2077235&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=261872&mem_num=2077235&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-18 07:14</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：Chungwie
                                <br>
                                暱：Chungwei <br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2077235" target="_blank">2077235</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/202181871357_2077235_683468.jpeg" class="fancybox" rel="group_19" title="未審核照片261871"><img src="photo/202181871357_2077235_683468.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                <div style="display:inline-block"><span class="label label-warning">參考照片 1</span><br><a style="margin-left:5px;" href="photo/202181871529_2077235_621960.jpeg" class="fancybox" rel="group_19" title="未審核"><img src="photo/202181871529_2077235_621960.jpeg" width=100 height=120></a><br>未審核</div>
                            </td>
                            <td></td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=261871&mem_num=2077235&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=261871&mem_num=2077235&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-13 12:01</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：微信aksswd
                                <br>
                                暱：賴plxh<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2075914" target="_blank">2075914</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2108131200552075914_77481.jpg" class="fancybox" rel="group_20" title="未審核照片260662"><img src="dphoto/photo/2108131200552075914_77481.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>我叫西西興趣是做菜、郊遊、登山加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^可以加我賴plxh</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=260662&mem_num=2075914&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=260662&mem_num=2075914&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-09 11:55</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：蘭心
                                <br>
                                暱：lanxin520<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2074908" target="_blank">2074908</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2108091155152074908_41360.jpg" class="fancybox" rel="group_21" title="未審核照片260502"><img src="dphoto/photo/2108091155152074908_41360.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為大學，興趣是郊遊、逛街、散步加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=260502&mem_num=2074908&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=260502&mem_num=2074908&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-06 21:37</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：呂文雅
                                <br>
                                暱： ~~~文雅<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2074255" target="_blank">2074255</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2108062136572074255_6605.jpg" class="fancybox" rel="group_22" title="未審核照片260365"><img src="dphoto/photo/2108062136572074255_6605.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為碩士，興趣是郊遊、游泳、慢跑加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=260365&mem_num=2074255&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=260365&mem_num=2074255&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-08-05 08:26</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：練韋均
                                <br>
                                暱：阿練<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2073814" target="_blank">2073814</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="dphoto/photo/2108050826272073814_23759.jpg" class="fancybox" rel="group_23" title="未審核照片260287"><img src="dphoto/photo/2108050826272073814_23759.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為高職，興趣是宅在家裡加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=260287&mem_num=2073814&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=260287&mem_num=2073814&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-29 19:53</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：Jennifer
                                <br>
                                暱：Jennifer<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2071994" target="_blank">2071994</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2107291952442071994_62194.jpeg" class="fancybox" rel="group_24" title="未審核照片259961"><img src="dphoto/photo/2107291952442071994_62194.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>台北大安人愛運動多聊聊ㄅ</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=259961&mem_num=2071994&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=259961&mem_num=2071994&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-28 18:18</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：蕭勝澤
                                <br>
                                暱：沙瓦<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2071724" target="_blank">2071724</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/2021728181733_2071724_716778.jpeg" class="fancybox" rel="group_25" title="未審核照片259907"><img src="photo/2021728181733_2071724_716778.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                <div style="display:inline-block"><span class="label label-warning">參考照片 1</span><br><a style="margin-left:5px;" href="photo/2021728181713_2071724_803402.jpeg" class="fancybox" rel="group_25" title="未審核"><img src="photo/2021728181713_2071724_803402.jpeg" width=100 height=120></a><br>未審核</div>
                            </td>
                            <td>&#65306;&#65289;&#20320;&#22909;~&#20570;&#20491;&#33258;&#25105;&#20171;&#32057;~&#25105;&#26159;&#20856;&#22411;&#30340;&#22825;&#34829;&#24231;&#65292;&#23416;&#27511;&#28858;&#39640;&#32887;&#65292;&#33288;&#36259;&#26159;&#20828;&#39080;&#12289;&#36939;&#21205;&#12289;&#19978;&#23665;&#19979;&#28023;&#21152;&#20837;&#36889;&#20491;&#24179;&#21488;&#24076;&#26395;&#33021;&#36935;&#35211;&#19981;&#37679;&#30340;&#20154;&#21487;&#20197;&#19968;&#36215;&#20998;&#20139;&#29983;&#27963;&#65292;&#22914;&#26524;&#32842;&#24471;&#20358;&#20063;&#24076;&#26395;&#21487;&#20197;&#26377;&#26356;&#36914;&#19968;&#27493;&#30340;&#30332;&#23637;^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=259907&mem_num=2071724&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=259907&mem_num=2071724&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-28 18:17</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：蕭勝澤
                                <br>
                                暱：沙瓦<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2071724" target="_blank">2071724</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/2021728181713_2071724_803402.jpeg" class="fancybox" rel="group_26" title="未審核照片259906"><img src="photo/2021728181713_2071724_803402.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                <div style="display:inline-block"><span class="label label-warning">參考照片 1</span><br><a style="margin-left:5px;" href="photo/2021728181733_2071724_716778.jpeg" class="fancybox" rel="group_26" title="未審核"><img src="photo/2021728181733_2071724_716778.jpeg" width=100 height=120></a><br>未審核</div>
                            </td>
                            <td>&#65306;&#65289;&#20320;&#22909;~&#20570;&#20491;&#33258;&#25105;&#20171;&#32057;~&#25105;&#26159;&#20856;&#22411;&#30340;&#22825;&#34829;&#24231;&#65292;&#23416;&#27511;&#28858;&#39640;&#32887;&#65292;&#33288;&#36259;&#26159;&#20828;&#39080;&#12289;&#36939;&#21205;&#12289;&#19978;&#23665;&#19979;&#28023;&#21152;&#20837;&#36889;&#20491;&#24179;&#21488;&#24076;&#26395;&#33021;&#36935;&#35211;&#19981;&#37679;&#30340;&#20154;&#21487;&#20197;&#19968;&#36215;&#20998;&#20139;&#29983;&#27963;&#65292;&#22914;&#26524;&#32842;&#24471;&#20358;&#20063;&#24076;&#26395;&#21487;&#20197;&#26377;&#26356;&#36914;&#19968;&#27493;&#30340;&#30332;&#23637;^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=259906&mem_num=2071724&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=259906&mem_num=2071724&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-28 16:51</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：吳若凡
                                <br>
                                暱：jason<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2071710" target="_blank">2071710</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="dphoto/photo/2107281650522071710_25091.jpeg" class="fancybox" rel="group_27" title="未審核照片259901"><img src="dphoto/photo/2107281650522071710_25091.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為大學，興趣是運動、慢跑加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=259901&mem_num=2071710&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=259901&mem_num=2071710&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-28 11:48</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：林國興
                                <br>
                                暱：心似破碎<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2071642" target="_blank">2071642</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="dphoto/photo/2107281148092071642_54841.jpg" class="fancybox" rel="group_28" title="未審核照片259892"><img src="dphoto/photo/2107281148092071642_54841.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>我想找一個可以一起努力打拼一起吃苦然後如過意見不同意或其他方面的問題能好好溝通不輕易說放棄和分手的另一半</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=259892&mem_num=2071642&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=259892&mem_num=2071642&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-27 20:52</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：吳玉珺
                                <br>
                                暱：吳玉珺<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2070467" target="_blank">2070467</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="photo/2107272051472070467_49947.jpeg" class="fancybox" rel="group_29" title="未審核照片259876"><img src="photo/2107272051472070467_49947.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td></td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=259876&mem_num=2070467&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=259876&mem_num=2070467&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-24 21:53</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：劉小麗
                                <br>
                                暱：一粒塵埃<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2070794" target="_blank">2070794</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2107242152482070794_57912.jpg" class="fancybox" rel="group_30" title="未審核照片259728"><img src="dphoto/photo/2107242152482070794_57912.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>我叫麗麗新北人目前在台南工作因工作原因一直單身中想找一位事業有成者交往之後在考慮結婚，想了解我加我賴ztc169</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=259728&mem_num=2070794&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=259728&mem_num=2070794&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-23 19:21</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：吳玉珺
                                <br>
                                暱：西非<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2070408" target="_blank">2070408</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2107231920572070408_48285.jpeg" class="fancybox" rel="group_31" title="未審核照片259641"><img src="dphoto/photo/2107231920572070408_48285.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>我⋯喜歡輕鬆品美食但無法吃素⋯
                                喜歡電影但無法看血腥恐怖的⋯
                                喜歡四處遊玩但時不時會懶懶的沒電⋯
                                有點西裝控身高控⋯
                                初次見面剛開始可能會因為不熟悉而有點害羞安靜⋯但稍微熟悉一點會比較能輕鬆聊天⋯
                                我覺得輕鬆溝通和好相處很重要⋯
                                能互相誠實尊重是基本⋯
                                其他的等聊天之後看感覺再說⋯

                                加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=259641&mem_num=2070408&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=259641&mem_num=2070408&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-21 09:15</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：黃義隆
                                <br>
                                暱：大男孩<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2069794" target="_blank">2069794</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="dphoto/photo/2107210914382069794_67896.jpg" class="fancybox" rel="group_32" title="未審核照片259531"><img src="dphoto/photo/2107210914382069794_67896.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>&#65306;&#65289;&#20320;&#22909;~&#20570;&#20491;&#33258;&#25105;&#20171;&#32057;~&#23416;&#27511;&#28858;&#23560;&#31185;&#65292;&#33288;&#36259;&#26159;&#19978;&#23665;&#19979;&#28023;&#12289;&#36939;&#21205;&#12289;&#25955;&#27493;&#21152;&#20837;&#36889;&#20491;&#24179;&#21488;&#24076;&#26395;&#33021;&#36935;&#35211;&#19981;&#37679;&#30340;&#20154;&#21487;&#20197;&#19968;&#36215;&#20998;&#20139;&#29983;&#27963;&#65292;&#22914;&#26524;&#32842;&#24471;&#20358;&#20063;&#24076;&#26395;&#21487;&#20197;&#26377;&#26356;&#36914;&#19968;&#27493;&#30340;&#30332;&#23637;^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=259531&mem_num=2069794&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=259531&mem_num=2069794&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-16 15:07</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：劉可寧
                                <br>
                                暱：劉可寧瀨kming1026<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2068491" target="_blank">2068491</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2107161506482068491_28424.jpeg" class="fancybox" rel="group_33" title="未審核照片258301"><img src="dphoto/photo/2107161506482068491_28424.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為大學，興趣是做菜、旅遊、財經加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=258301&mem_num=2068491&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=258301&mem_num=2068491&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-16 13:20</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：林章章
                                <br>
                                暱：林章章<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2068453" target="_blank">2068453</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="dphoto/photo/2107161319342068453_87777.jpg" class="fancybox" rel="group_34" title="未審核照片258300"><img src="dphoto/photo/2107161319342068453_87777.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為高中，興趣是看電影、咖啡加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=258300&mem_num=2068453&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=258300&mem_num=2068453&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-16 12:45</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：維蜜
                                <br>
                                暱：維蜜<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2068444" target="_blank">2068444</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2107161244492068444_43129.jpg" class="fancybox" rel="group_35" title="未審核照片258298"><img src="dphoto/photo/2107161244492068444_43129.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>你好我是你的蜜蜜
                                身材163cm48kg24歲D
                                想要找一個可以和平相處的哥哥
                                單次約會零用錢可商議
                                （可長期固定約會逛街）
                                聯絡方式賴wqy25</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=258298&mem_num=2068444&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=258298&mem_num=2068444&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-14 21:53</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：薇薇
                                <br>
                                暱：籟mall0913<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2068093" target="_blank">2068093</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2107142152392068093_15648.jpg" class="fancybox" rel="group_36" title="未審核照片258217"><img src="dphoto/photo/2107142152392068093_15648.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為碩士，興趣是旅遊、買東西、繪畫加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=258217&mem_num=2068093&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=258217&mem_num=2068093&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-14 02:36</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：黃致界
                                <br>
                                暱：joevs<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2067877" target="_blank">2067877</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="dphoto/photo/2107140235592067877_71685.jpg" class="fancybox" rel="group_37" title="未審核照片258171"><img src="dphoto/photo/2107140235592067877_71685.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為國中，興趣是運動、看風景、咖啡加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^真誠與真心</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=258171&mem_num=2067877&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=258171&mem_num=2067877&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-13 10:37</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：CC
                                <br>
                                暱：Cc<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2067665" target="_blank">2067665</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2107131036442067665_19293.jpg" class="fancybox" rel="group_38" title="未審核照片258140"><img src="dphoto/photo/2107131036442067665_19293.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為大學，興趣是運動、財經、咖啡加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=258140&mem_num=2067665&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=258140&mem_num=2067665&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-12 04:00</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：楊隆盛
                                <br>
                                暱：阿盛<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2067342" target="_blank">2067342</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="dphoto/photo/2107120400272067342_84296.jpg" class="fancybox" rel="group_39" title="未審核照片257092"><img src="dphoto/photo/2107120400272067342_84296.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為高中，興趣是看電影、宅在家裡加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=257092&mem_num=2067342&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=257092&mem_num=2067342&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-07 21:16</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：a8857987
                                <br>
                                暱：約會家賴K789H<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2066030" target="_blank">2066030</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2107072115402066030_94696.jpg" class="fancybox" rel="group_40" title="未審核照片255862"><img src="dphoto/photo/2107072115402066030_94696.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為專科，興趣是看電影、旅遊、上山下海加入這個平台希望能遇見不錯的人可以一起分享生活聊得來也希望可以有更進一步的發展^_^

                                你好~想ˋ約會請加瀨K789YH</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=255862&mem_num=2066030&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=255862&mem_num=2066030&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-07 00:05</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：黃大雄
                                <br>
                                暱：金<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2065794" target="_blank">2065794</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="dphoto/photo/2107070004402065794_33716.jpg" class="fancybox" rel="group_41" title="未審核照片255811"><img src="dphoto/photo/2107070004402065794_33716.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為高中，興趣是運動、慢跑加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=255811&mem_num=2065794&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=255811&mem_num=2065794&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-06 23:53</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：純真
                                <br>
                                暱：士<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2065793" target="_blank">2065793</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="dphoto/photo/2107062353262065793_68210.jpg" class="fancybox" rel="group_42" title="未審核照片255810"><img src="dphoto/photo/2107062353262065793_68210.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為高中，興趣是登山、運動加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=255810&mem_num=2065793&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=255810&mem_num=2065793&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-05 09:50</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：test點點
                                <br>
                                暱：點<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2065312" target="_blank">2065312</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="photo/2107050949552065312_61931.jpeg" class="fancybox" rel="group_43" title="未審核照片255704"><img src="photo/2107050949552065312_61931.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為大學，興趣是逛展覽加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=255704&mem_num=2065312&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=255704&mem_num=2065312&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-05 09:32</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：test點
                                <br>
                                暱：點<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2065307" target="_blank">2065307</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="photo/2107050932052065307_48727.jpeg" class="fancybox" rel="group_44" title="未審核照片255698"><img src="photo/2107050932052065307_48727.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為大學，興趣是逛街加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=255698&mem_num=2065307&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=255698&mem_num=2065307&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-04 00:06</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：喬羽
                                <br>
                                暱：可可<br>
                                性別：女<br>
                                <a href="ad_mem_detail.php?mem_num=2064968" target="_blank">2064968</a>
                            </td>
                            <td style="text-align:center"><span class="label label-pp">待審照片 - 這是女生</span><br><br><a href="dphoto/photo/2107040006062064968_86555.jpg" class="fancybox" rel="group_45" title="未審核照片254603"><img src="dphoto/photo/2107040006062064968_86555.jpg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                此會員目前無其他照片可供參考
                            </td>
                            <td>：）你好~做個自我介紹~學歷為高職，興趣是逛街、旅遊、散步加入這個平台希望能遇見不錯的人可以一起分享生活，如果聊得來也希望可以有更進一步的發展^_^</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=254603&mem_num=2064968&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=254603&mem_num=2064968&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-03 22:22</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：Tangbin
                                <br>
                                暱：棠繽<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2064951" target="_blank">2064951</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/202173222229_2064951_921642.jpeg" class="fancybox" rel="group_46" title="未審核照片254599"><img src="photo/202173222229_2064951_921642.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                <div style="display:inline-block"><span class="label label-warning">參考照片 1</span><br><a style="margin-left:5px;" href="photo/202173221344_2064951_783703.jpeg" class="fancybox" rel="group_46" title="未審核"><img src="photo/202173221344_2064951_783703.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 2</span><br><a style="margin-left:5px;" href="photo/202173222148_2064951_648968.jpeg" class="fancybox" rel="group_46" title="未審核"><img src="photo/202173222148_2064951_648968.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 3</span><br><a style="margin-left:5px;" href="photo/202173221446_2064951_505306.jpeg" class="fancybox" rel="group_46" title="未審核"><img src="photo/202173221446_2064951_505306.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 4</span><br><a style="margin-left:5px;" href="photo/20217322202_2064951_640957.jpeg" class="fancybox" rel="group_46" title="未審核"><img src="photo/20217322202_2064951_640957.jpeg" width=100 height=120></a><br>未審核</div>
                            </td>
                            <td>&#38568;&#36935;&#32780;&#23433;&#24977;&#24863;&#35258;&#128579;</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=254599&mem_num=2064951&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=254599&mem_num=2064951&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-03 22:20</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：Tangbin
                                <br>
                                暱：棠繽<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2064951" target="_blank">2064951</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/20217322202_2064951_640957.jpeg" class="fancybox" rel="group_47" title="未審核照片254598"><img src="photo/20217322202_2064951_640957.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                <div style="display:inline-block"><span class="label label-warning">參考照片 1</span><br><a style="margin-left:5px;" href="photo/202173221344_2064951_783703.jpeg" class="fancybox" rel="group_47" title="未審核"><img src="photo/202173221344_2064951_783703.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 2</span><br><a style="margin-left:5px;" href="photo/202173222148_2064951_648968.jpeg" class="fancybox" rel="group_47" title="未審核"><img src="photo/202173222148_2064951_648968.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 3</span><br><a style="margin-left:5px;" href="photo/202173221446_2064951_505306.jpeg" class="fancybox" rel="group_47" title="未審核"><img src="photo/202173221446_2064951_505306.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 4</span><br><a style="margin-left:5px;" href="photo/202173222229_2064951_921642.jpeg" class="fancybox" rel="group_47" title="未審核"><img src="photo/202173222229_2064951_921642.jpeg" width=100 height=120></a><br>未審核</div>
                            </td>
                            <td>&#38568;&#36935;&#32780;&#23433;&#24977;&#24863;&#35258;&#128579;</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=254598&mem_num=2064951&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=254598&mem_num=2064951&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-03 22:15</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：Tangbin
                                <br>
                                暱：棠繽<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2064951" target="_blank">2064951</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/202173221446_2064951_505306.jpeg" class="fancybox" rel="group_48" title="未審核照片254597"><img src="photo/202173221446_2064951_505306.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                <div style="display:inline-block"><span class="label label-warning">參考照片 1</span><br><a style="margin-left:5px;" href="photo/202173221344_2064951_783703.jpeg" class="fancybox" rel="group_48" title="未審核"><img src="photo/202173221344_2064951_783703.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 2</span><br><a style="margin-left:5px;" href="photo/202173222148_2064951_648968.jpeg" class="fancybox" rel="group_48" title="未審核"><img src="photo/202173222148_2064951_648968.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 3</span><br><a style="margin-left:5px;" href="photo/20217322202_2064951_640957.jpeg" class="fancybox" rel="group_48" title="未審核"><img src="photo/20217322202_2064951_640957.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 4</span><br><a style="margin-left:5px;" href="photo/202173222229_2064951_921642.jpeg" class="fancybox" rel="group_48" title="未審核"><img src="photo/202173222229_2064951_921642.jpeg" width=100 height=120></a><br>未審核</div>
                            </td>
                            <td>&#38568;&#36935;&#32780;&#23433;&#24977;&#24863;&#35258;&#128579;</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=254597&mem_num=2064951&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=254597&mem_num=2064951&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-03 22:14</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：Tangbin
                                <br>
                                暱：棠繽<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2064951" target="_blank">2064951</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/202173222148_2064951_648968.jpeg" class="fancybox" rel="group_49" title="未審核照片254596"><img src="photo/202173222148_2064951_648968.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                <div style="display:inline-block"><span class="label label-warning">參考照片 1</span><br><a style="margin-left:5px;" href="photo/202173221344_2064951_783703.jpeg" class="fancybox" rel="group_49" title="未審核"><img src="photo/202173221344_2064951_783703.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 2</span><br><a style="margin-left:5px;" href="photo/202173221446_2064951_505306.jpeg" class="fancybox" rel="group_49" title="未審核"><img src="photo/202173221446_2064951_505306.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 3</span><br><a style="margin-left:5px;" href="photo/20217322202_2064951_640957.jpeg" class="fancybox" rel="group_49" title="未審核"><img src="photo/20217322202_2064951_640957.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 4</span><br><a style="margin-left:5px;" href="photo/202173222229_2064951_921642.jpeg" class="fancybox" rel="group_49" title="未審核"><img src="photo/202173222229_2064951_921642.jpeg" width=100 height=120></a><br>未審核</div>
                            </td>
                            <td>&#38568;&#36935;&#32780;&#23433;&#24977;&#24863;&#35258;&#128579;</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=254596&mem_num=2064951&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=254596&mem_num=2064951&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                        <tr>
                            <td class="center">總管理處</td>
                            <td class="center">2021-07-03 22:12</td>
                            <td>
                                <span class="label label-danger">未入會</span>
                                <br><br>
                                名：Tangbin
                                <br>
                                暱：棠繽<br>
                                性別：男<br>
                                <a href="ad_mem_detail.php?mem_num=2064951" target="_blank">2064951</a>
                            </td>
                            <td style="text-align:center"><span class="label label-black">待審照片 - 這是男生</span><br><br><a href="photo/202173221344_2064951_783703.jpeg" class="fancybox" rel="group_50" title="未審核照片254595"><img src="photo/202173221344_2064951_783703.jpeg" width=100 height=120></a>

                                <br>
                                未審核
                            </td>
                            <td style="text-align:center">
                                <div style="display:inline-block"><span class="label label-warning">參考照片 1</span><br><a style="margin-left:5px;" href="photo/202173222148_2064951_648968.jpeg" class="fancybox" rel="group_50" title="未審核"><img src="photo/202173222148_2064951_648968.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 2</span><br><a style="margin-left:5px;" href="photo/202173221446_2064951_505306.jpeg" class="fancybox" rel="group_50" title="未審核"><img src="photo/202173221446_2064951_505306.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 3</span><br><a style="margin-left:5px;" href="photo/20217322202_2064951_640957.jpeg" class="fancybox" rel="group_50" title="未審核"><img src="photo/20217322202_2064951_640957.jpeg" width=100 height=120></a><br>未審核</div>
                                <div style="display:inline-block"><span class="label label-warning">參考照片 4</span><br><a style="margin-left:5px;" href="photo/202173222229_2064951_921642.jpeg" class="fancybox" rel="group_50" title="未審核"><img src="photo/202173222229_2064951_921642.jpeg" width=100 height=120></a><br>未審核</div>
                            </td>
                            <td>&#38568;&#36935;&#32780;&#23433;&#24977;&#24863;&#35258;&#128579;</td>
                            <td class="center"></td>
                            <td class="center">

                                <form action="?st=accept&v=-1&a=254595&mem_num=2064951&t=1" method="post" style="margin:0;padding:0;border:0;">
                                    <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=254595&mem_num=2064951&t=1'">
                                    <br>
                                    未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                </form>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_photo_check.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_photo_check.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_photo_check.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_photo_check.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_photo_check.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_photo_check.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_photo_check.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_photo_check.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_photo_check.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_photo_check.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_photo_check.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_photo_check.php?topage=10 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_photo_check.php?topage=1" selected>1</option>
                            <option value="/ad_photo_check.php?topage=2">2</option>
                            <option value="/ad_photo_check.php?topage=3">3</option>
                            <option value="/ad_photo_check.php?topage=4">4</option>
                            <option value="/ad_photo_check.php?topage=5">5</option>
                            <option value="/ad_photo_check.php?topage=6">6</option>
                            <option value="/ad_photo_check.php?topage=7">7</option>
                            <option value="/ad_photo_check.php?topage=8">8</option>
                            <option value="/ad_photo_check.php?topage=9">9</option>
                            <option value="/ad_photo_check.php?topage=10">10</option>
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
require("./include/_bottom.php");
?>