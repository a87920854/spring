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

//
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
  	header("location:ad_photo_check.php?topage=".$p."&t=".$t);
}

//審核通過按鈕
if ( $st == "accept" && $v != "" ){
    $sendmail = 0;
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
   	
    /*if ( $sendmail == 1 ){
        sysmsg($mem_num, "您的照片已公開！", "");
        if ( $mem_mail != "" ){
            //寄信
            //notice_edm("您的照片已公開！", mem_mail, "您的照片已公開！", "您設定的照片已審核通過，並已公開於前台了！<br><br><a href=""http://www.singleparty.com.tw/mypage.asp"">▼ 確認照片請往這裡</a><br><a href=""http://www.singleparty.com.tw/member_list.asp?t=2"">▼ 馬上去尋找欣賞的對象</a><br>由衷盼望您能在約會專家裡找到理想中的對象。<br><br>今後也請多多指教。", "", mnomail)
        }
    }*/

    reURL("ad_photo_check.php?topage=".$t);
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
    $days = (strtotime($acre_sign2)-strtotime($acre_sign1))/86400;
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
$subSQL5 = " order by photo_time desc";

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
$topage = SqlFilter($_REQUEST["topage"],"tab");
if ( $topage == "" ){ $topage = 1;}
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
$SQL_list  = "Select Top ".$tPageSize." * ";
$SQL_list .= "From (Select row_number() ";
$SQL_list .= "over(".$subSQL5.") As rownumber,member_data.mem_num,mem_name,mem_branch,photo_time,mem_level,mem_sex,accept_single,types,accept,mem_nick,photo_name,photo_auto,acceptm,come,mem_note ";
$SQL_list .= "From photo_data INNER JOIN member_data ON photo_data.mem_num = member_data.mem_num Where ".$subSQL2.$subSQL3.$subSQL4." ) temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage);
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
                    <strong>網站照片審核 - <?php echo $vv;?> - 數量：<?php echo $total_size." ".$count_href;?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form id="searchform" action="ad_photo_check.php?vst=full&sear=1&t=<?php echo $t;?>" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()" style="margin:0px;">
                        <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ ?>
                            <p>
                            會館：
                            <select name="branch" id="branch" style="width:100px;">
                                <option value="">請選擇</option>
                                <?php 
                                $branch_name = get_branch('好好玩旅行社,線上諮詢');
                                $branch_array = explode(",",substr($branch_name, 0, -1));
                                for ( $b=0;$b<count($branch_array);$b++ ){ ?>
                                    <option value="<?php echo $branch_array[$b];?>"<?php if ($branch == $branch_array[$b]){?> selected<?php }?>><?php echo $branch_array[$b];?></option>
                                <?php }?>
                            </select>
                            &nbsp;&nbsp;
                        <?php }?>
                        上傳時間：
                        <input type="text" class="datepicker" autocomplete="off" name="times1" value="<?php echo $times1;?>">
                        ～
                        <input type="text" class="datepicker" autocomplete="off" name="times2" value="<?php echo $times2;?>">
                        </p>
                        <p>
                            <select name="ismem" id="ismem">
                                <option value="">顯示會員+非會員</option>
                                <option value="1"<?php if ( $ismem == "1" ){ echo " selected"; }?>>僅顯示會員</option>
                            </select>
                            &nbsp;&nbsp;
                            <select name="sex" id="sex">
                                <option value="">性別</option>
                                <option value="男"<?php if ( $sex == "男" ){ echo " selected"; }?>>男性</option>
                                <option value="女"<?php if ( $sex == "女" ){ echo " selected"; }?>>女性</option>
                            </select>
                            &nbsp;&nbsp;
                            <select name="issingle" id="issingle">
                                <option value="">顯示所有</option>
                                <option value="1"<?php if ( $issingle == "1" ){ echo " selected"; }?>>秘書上傳</option>
                            </select>
                            <select name="types" id="types">
                                <option value="">未審核</option>
                                <option value="1"<?php if ( $types == "1" ){ echo " selected"; }?>>已審核</option>
                            </select>
                        </p>
                        <p>
                            <input name="keyword" id="keyword" class="form-control" type="text" value="<?php echo $keyword;?>" placeholder="請輸入會員編號關鍵字">
                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>
                <p style="color: blue;"><strong>▼ 注意事項：審核時請確認姓名、暱稱、自介等內容是否正確，如有異常請直接審核不通過，避免詐騙或其他造成公司損害之問題。</strong></p>
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
                        <?php
                        if ( count($result_list) == 0 ){
                            echo "<tr><td colspan='10' height='200'>目前沒有資料</td></tr>";
                        }else{
                            foreach($result_list as $re_list){
                                switch ($re_list["types"]){
						            case "dmn":
						                $urlpath = "dphoto/photo";
                                        break;
					                default:
						                $urlpath = "photo";
                                        break;
                                }
                                $errimg = 0;
                                if (  ! @fopen( $urlpath."/".$re_list["photo_name"], 'r' )  || substr_count($re_list["photo_name"], ".") <= 0 ){
                                    $errimg = 1;
                                }
                                if ( $re_list["accept"] == 0 ){
					                $rtt = "未審核";
                                }elseif ( $re_list["accept"] == 1 ){
					                $rtt = "審核通過";
					                if ( $re_list["accept_single"] != "" ){
					                    $rtt = $rtt." - ".SingleName($re_list["accept_single"],"normal");
                                    }
                                }else{
					                $rtt = $re_list["acceptm"];
					                if ( $re_list["accept_single"] != "" ){
					                    $rtt = $rtt." - ".SingleName($re_list["accept_single"],"normal");
                                    }
                                } ?>
                                <tr>
                                    <td class="center"><?php echo $re_list["mem_branch"];?></td>
                                    <td class="center"><?php echo Date_EN($re_list["photo_time"],9);?></td>
                                    <td>
                                        <?php
                                            if ( $re_list["mem_level"] == "mem" ){
                                                echo "<span class='label label-info'>會員</span>";
                                            }else{
                                                echo "<span class='label label-danger'>未入會</span>";
                                            }

                                            if ( $re_list["mem_sex"] == "男" ){
                                                $picstat2 = " - 這是男生";
                                                $picstat_label = "label-black";
                                            }else{
                                                $picstat2 = " - 這是女生";
                                                $picstat_label = "label-pp";
                                            }
                                    
                                            if ( $re_list["accept"] == 1 ){
                                                $picstat = "";
                                            }else{
                                                $picstat = "<span class='label ".$picstat_label."'>待審照片".$picstat2."</span><br>";
                                            }
                                        ?>
                                        <br><br>
                                        名：<?php echo $re_list["mem_name"];?>
                                        <br>
                                        暱：<?php echo $re_list["mem_nick"];?><br>
                                        性別：<?php echo $re_list["mem_sex"];?><br>
                                        <a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_num"];?></a>
                                    </td>
                                    <td style="text-align:center">
                                        <?php echo $picstat;?><br>
                                        <a href="<?php echo $urlpath;?>/<?php echo $re_list["photo_name"];?>" class="fancybox" rel="group_<?php echo $SS;?>" title="<?php echo $rtt;?>
                                        照片<?php echo $re_list["photo_auto"];?>"><img src="<?php echo $urlpath;?>/<?php echo $re_list["photo_name"];?>" width="100" height="120"></a>
								        <?php
								        if ( $errimg == 1 || $_SESSION["MM_Username"] == "TSAIWEN216" ){
									        echo "<br><a href='?st=delpic&a=".$re_list["photo_auto"]."&p=".$topage."&t=".$t."'>刪除</a>";
                                        }?>	
								        <br>
								        <?php echo $rtt;?>
								    </td>
                                    <td style="text-align:center">
									    <?php
                                        $SQL = "Select * From photo_data Where mem_num=".$re_list["mem_num"]." and not photo_name='".$re_list["photo_name"]."'";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
									    if ( count($result) == 0 ){
										    echo "此會員目前無其他照片可供參考";
                                        }else{
										    $ixx = 0;
										    foreach($result as $re){
                                                $ixx++;
										        if ( $re["accept"] == 0 ){
											        $tt = "未審核";
                                                }elseif ( $re["accept"] == 1 ){
									  	            $tt = "審核通過";
                                                }else{
									  	            $tt = $re["acceptm"];
									            }
										        echo "<div style='display:inline-block'><span class='label label-warning'>參考照片 ".$ixx."</span><br>";
                                                echo "<a style='margin-left:5px;' href='".$urlpath."/".$re["photo_name"]."' class='fancybox' rel='group_".$SS."' title='".$tt."'>";
                                                echo "<img src='".$urlpath."/".$re["photo_name"]."' width='100' height='120'></a><br>".$tt."</div>";
                                            }
                                        }
									    ?>
								    </td>
                                    <td>
                                        <?php
									    $notes = $re_list["mem_note"];
									    if ( $notes != "" ){
										    $notes = strip_tags($notes);
										    echo $notes;
                                        }
									    ?>
                                    </td>
                                    <td class="center">
                                        <?php
									    if ( $re_list["come"] == "single"){
										    echo "秘書上傳";
                                        }
									    ?>
                                    </td>
                                    <td class="center">
                                        <?php if ( $re_list["accept"] == 0 ){ ?>
                                            <form action="?st=accept&v=-1&a=<?php echo $re_list["photo_auto"];?>&mem_num=<?php echo $re_list["mem_num"];?>&t=<?php echo $topage;?>" method="post" style="margin:0;padding:0;border:0;">
                                                <input type="button" class="btn btn-success btn-sm margin-bottom-10" value="審核通過" onclick="location.href='?st=accept&v=1&a=<?php echo $re_list["photo_auto"];?>&mem_num=<?php echo $re_list["mem_num"];?>&t=<?php echo $topage;?>'">
                                                <br>
                                                未通過理由：<input style="width:100px" type="text" name="errmsg" value="不符合照片規則"><br><input type="submit" class="btn btn-danger btn-sm" value="審核未通過">
                                            </form>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <?php require_once("./include/_page.php"); ?>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->
<?php require("./include/_bottom.php");?>