<?php
    error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_job.php
	//後台對應位置：名單/發送記錄>徵人資料
	//改版日期：2021.10.19
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");
    check_page_power("ad_action");

    $ty = SqlFilter($_REQUEST["ty"],"tab");

    if ( SqlFilter($_REQUEST["st"],"tab") == "trans" ){
        $SQL = "Select * From love_keyin Where all_kind = '活動' And k_id='".SqlFilter($_REQUEST["k_id"],"tab")."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
        if ( count($result) > 0 ){
		    //R2.open "Select top 1 * from member_data where 1=0", SPCon, 1, 3
		    //if R2.eof then
            $SQL1 = "Select * From msg_num Where m_auto = 1";
            $rs1 = $SPConn->prepare($SQL1);
            $rs1->execute();
            $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
            foreach($result1 as $re1);
            $mem_num = ($re["m_num"] + 1);
            $SQL_u = "Update msg_num Set m_num = ". $mem_num ." Where m_auto = 1";
            $rsu = $SPConn->prepare($SQL_u);
            $rsu->execute();
            if ( $re["k_sex"] == "女"){ $mem_photo = "girl.jpg"; }else{ $mem_photo = "boy.jpg"; }

            //新增 member_data
            $SQL_i  = "Insert Into member_data(";
            $SQL_i .= "all_type, mem_level, mem_num, mem_photo, mem_come, mem_come, mem_come2, mem_come6, mem_come6_name, mem_cc, mem_time, mem_name, mem_sex, mem_blood, mem_marry";
            $SQL_i .= "mem_by, mem_bm, mem_bd, mem_area, mem_mail, mem_job2, mem_msn, mem_school, mem_branch, mem_single, all_note) Values (";
            $SQL_i .= "'已發送',";
            $SQL_i .= "'guest',";
            $SQL_i .= "'".$mem_num."',";
            $SQL_i .= "'".$mem_photo."',";
            if ( $re["k_come"] != "" ){
                $SQL_i .= "'".$re["k_come"]."',";
                if ( $re["k_come"] != "委外活動23" ){
                    $SQL_i .= "'通路合作',";
                    $SQL_i .= "'活動報名',";
                    $SQL_i .= "'pr23',";
                    $SQL_i .= "'貳叁公關',";
                }else{
                    $SQL_i .= "'',";
                    $SQL_i .= "'',";
                    $SQL_i .= "'',";
                    $SQL_i .= "'',";
                }
            }else{
                $SQL_i .= "'網站活動',";
            }
            $SQL_i .= "'".$re["k_cc"]."',";
            $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
            $SQL_i .= "'".$re["k_name"]."',";
            $SQL_i .= "'".$re["k_sex"]."',";
            $SQL_i .= "'A',";
            if ( $re["k_marry"] != "" ){
                $SQL_i .= "'".$re["k_marry"]."',";
            }else{
                $SQL_i .= "'未婚',";
            }
            if ( chkDate($re["k_bday"]) ){
                $SQL_i .= "'".date("Y",$re["k_bday"])."',";
                $SQL_i .= "'".date("m",$re["k_bday"])."',";
                $SQL_i .= "'".date("d",$re["k_bday"])."',";
            }else{
                $SQL_i .= "'',";
                $SQL_i .= "'',";
                $SQL_i .= "'',";
            }
            $SQL_i .= "'".$re["k_area"]."',";
            $SQL_i .= "'".$re["k_yn"]."',";
            $SQL_i .= "'".$re["k_job"]."',";
            $SQL_i .= "'".$re["k_line"]."',";
            $SQL_i .= "'".$re["k_school"]."',";
            $SQL_i .= "'".$re["all_branch"]."',";
            $SQL_i .= "'".$re["all_single"]."',";
            $SQL_i .= "'由".$_SESSION["pname"]."自 活動報名資料[".$re["k_id"]."] 轉換',";
            $rs_i = $SPConn->prepare($SQL_i);
            $rs_i->execute();
            //Update love_kyein
            $SQL_u = "Update love_keyin Set k_trans = 1";
            $rs_u = $SPConn->prepare($SQL_u);
            $rs_u->execute();
        }
        reURL("ad_action.php?a=b".SqlFilter("st","tab"));
    }

    $default_sql_num = 500;
    
    //top組合語法
    if ( SqlFilter($_REQUEST["vst"],"tab") == "full" ){
        $subSQL1 = "*";
    }else{
        $subSQL1 = "Top ".$default_sql_num." *";
    }

    if ( ( SqlFilter($_REQUEST["a1"],"tab") != "" && SqlFilter($_REQUEST["b1"],"tab") == "" ) || ( SqlFilter($_REQUEST["a1"],"tab") == "" && SqlFilter($_REQUEST["b1"],"tab") != "" ) ) {
        call_alert("日期選擇起始和結束時間。",0,0);
    }
    if ( SqlFilter($_REQUEST["a1"],"tab") > SqlFilter($_REQUEST["b1"],"tab" )){ call_alert("日期請由小到大選擇",0,0); }
    if ( SqlFilter($_REQUEST["a1"],"tab") != "" ){
        $a1 = SqlFilter($_REQUEST["a1"],"tab") &" 00:00";
    }else{
        $a1 = "1900/1/1";
    }

    if ( SqlFilter($_REQUEST["b1"],"tab") != "" ){
        $b1 = SqlFilter($_REQUEST["b1"],"tab") ." 23:59";
    }else{
        $b1 = "2020/12/31";
    }

    //Select ".$subSQL1." From love_keyin As dba Where
    if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
        $subSQL2 = " And all_kind = '活動'";
	    if ( SqlFilter($_REQUEST["sear"],"tab") != "1" ){
            if ( SqlFilter($_REQUEST["s99"],"tab") != "" ){
                $subSQL3 = " And all_type <> '未處理'";
	            $all_type = "已處理";
            }else{
                $subSQL3 = " And all_type = '未處理'";
	            $all_type = "未處理";
            }
        }else{
	        $all_type = "資料搜尋";
	    }
    }elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" ) {	  
        $subSQL2 = "all_kind = '活動' And all_branch = '".$_SESSION["branch"]."'";
    }elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
	    $subSQL2 = "all_kind = '活動' and all_single = '".$_SESSION["MM_username"]."'";
    }

    if ( SqlFilter($_REQUEST["s2"],"tab") != "" ){
        $cs2 = reset_number(SqlFilter($_REQUEST["s2"],"tab"));
        $subSQL3 = " And k_mobile Like '%".$cs2."%'";
    }

    if ( SqlFilter($_REQUEST["s3"],"tab") != "" ){
        $subSQL4 = " And k_name Like '%" . str_Replace("'", "''", SqlFilter($_REQUEST["s3"],"tab")) . "%'";
    }

    if ( SqlFilter($_REQUEST["s7"],"tab") != "" ){
        $subSQL5 = " And all_single Like '%" . str_Replace("'", "''", SqlFilter($_REQUEST["s7"],"tab")) . "%'";
    }

    if ( SqlFilter($_REQUEST["s6"],"tab") != "" ){
        $subSQL6 = " And all_branch Like '%" . str_Replace("'", "''", SqlFilter($_REQUEST["s6"],"tab")) . "%'";
    }

    if ( SqlFilter($_REQUEST["s8"],"tab") != "" ){
        $subSQL6 = " And k_sex Like '%" . str_Replace("'", "''", SqlFilter($_REQUEST["s8"],"tab")) . "%'";
    }

    if ( SqlFilter($_REQUEST["s95"],"tab") != "" ){
        $subSQL7 = " And action_title = '" . str_Replace("'", "''", SqlFilter($_REQUEST["s95"],"tab")) . "'";
    }

    if ( SqlFilter($_REQUEST["s97"],"tab") != "" ){
        $subSQL8 = " And k_cc = '" . str_Replace("'", "''", SqlFilter($_REQUEST["s97"],"tab")) . "'";
    }

    if ( SqlFilter($_REQUEST["a1"],"tab") != "" ){
        $subSQL7 = " And k_time between '".$a1."' And '".$b1."'";
    }

    if ( SqlFilter($_REQUEST["stt"],"tab") != "" ){
        $subSQL7 = " And all_type = '".SqlFilter($_REQUEST["stt"],"tab")."'";
    }

    if ( SqlFilter($_REQUEST["s9"],"tab") != "" ){
        $subSQL7 = " And k_come = '".SqlFilter($_REQUEST["s9"],"tab")."'";
    }

    if ( SqlFilter($_REQUEST["sv"],"tab") != "" ){
	    $sv = SqlFilter($_REQUEST["sv"],"tab");
	    if ( substr_count($sv, "-") > 0 ){
            $sv_array = explode("-",$sv);
		    $sv1 = $sv_array[0];
		    $sv2 = $sv_array[1];
		    $sv3 = $sv_array[2];
	        $subSQL8 = $sqlss . " And action_branch = '". $sv1. "' And action_title = '" . $sv2. "'";
        }
    }

    if ( SqlFilter($_REQUEST["nodouble"],"tab") == "1" ){
	    switch ( $_SESSION["MM_UserAuthorization"] ){
		    case "admin":
		        $subSQL9 = " And (SELECT count(k_id) FROM love_keyin as dbb Where (all_kind = '活動') AND (k_mobile = dba.k_mobile)) <= 1";
                break;
		    case "branch":
		        $subSQL9 = " And (SELECT count(k_id) FROM love_keyin as dbb Where (all_kind = '活動') AND (k_mobile = dba.k_mobile) and (all_branch = '".$_SESSION["branch"]."')) <= 1";
                break;
	        default:
	            $subSQL9 = " And (SELECT count(k_id) FROM love_keyin as dbb Where (all_kind = '活動') AND (k_mobile = dba.k_mobile) and (all_branch = '".$_SESSION["branch"]."') and (all_single = '".$_SESSION["MM_username"]."')) <= 1";
                break;
        }
    }

    if ( SqlFilter($_REQUEST["sear"],"tab") != "1" ){
        if ( SqlFilter($_REQUEST["ty"],"tab") == "1" ){
	        $subSQL10 = " And action_kind = '網站活動'";
	        $tit = "網站活動";
        }else{
	        $subSQL10 = " and (action_kind <> '網站活動' or action_kind is null)";
	        $tit = "會館活動";
        }
    }else{
	    $tit = "所有活動";
    }

    switch (SqlFilter($_REQUEST["orderby"],"tab")){
        case "1":   //依資料時間排序
            $subSQL11 = " order by k_time ";
            break;
        case "2":   //依督導發送排序
            $subSQL11 = " order by send_time ";
            break;
        default:
            $subSQL11 = " order by k_id ";
            break;
    }
    //$sqls2 = $sqls2 . $sqlss;

	//取得總筆數
	$SQL = "Select count(k_id) As total_size From love_keyin Where 1=1 ".$subSQL2.$subSQL3.$subSQL4.$subSQL5.$subSQL6.$subSQL7.$subSQL8.$subSQL9.$subSQL10;
	$rs = $SPConn->prepare($SQL);
	$rs->execute();
	$result=$rs->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $re);
	if ( count($result) == 0 || $re["total_size"] == 0 ) {
		$total_size = 0;
	}else{
		$total_size = $re["total_size"];
	}

    //查看清單連結文字
	if ( SqlFilter($_REQUEST["vst"],"tab") == "full" ){
		$count_href = "　<a href='?vst=n'>[查看前五百筆]</a>";
	}else{
		if ( $total_size > 500 ){ $total_size = 500;}
		$count_href = "　<a href='?vst=full'>[查看完整清單]</a>";
    }

	//取得分頁資料
	$tPageSize = 30; //每頁幾筆
	$tPage = 1; //目前頁數
	if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
	$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
	if ( $tPageSize*$tPage < $total_size ){
		$page2 = 30;
	}else{
		$page2 = (30-(($tPageSize*$tPage)-$total_size));
	}

    //分頁語法
	$SQL_list  = "Select ".$subSQL1." From (";
	$SQL_list .= "Select TOP ".$page2." * From (";
	$SQL_list .= "Select TOP ".($tPageSize*$tPage)." * From love_keyin Where 1=1".$subSQL2.$subSQL3.$subSQL4.$subSQL5.$subSQL6.$subSQL7.$subSQL8.$subSQL9.$subSQL10.$subSQL11."Desc) t1 Where 1=1".$subSQL2.$subSQL3.$subSQL4.$subSQL5.$subSQL6.$subSQL7.$subSQL8.$subSQL9.$subSQL10.$subSQL11."Asc) t2 Where 1=1".$subSQL2.$subSQL3.$subSQL4.$subSQL5.$subSQL6.$subSQL7.$subSQL8.$subSQL9.$subSQL10.$subSQL11."Desc";
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
            <li class="active">活動報名資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <div class="panel panel-default">
            <div class="panel-heading">
                <!-- panel title -->
                <span class="title elipsis">
                    <strong><?php echo $tit; ?>報名資料<?php echo $all_type; ?>　 - 數量：<?php echo $total_size; ?>
                    <a href="?vst=full">[查看完整清單]</a></strong>
                </span>
                <!-- /panel title -->
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                            <li><a href="ad_love_f.php"><i class="icon-tag"></i> 進階搜尋</a></li>
                            <li><a href="javascript:event_search();"><i class="icon-tag"></i> 活動搜尋</a></li>
                            <li><a href="ad_action_single_add.php"><i class="icon-tag"></i> 新增參加人員</a></li>
                        </ul>
                    </div>　

                    <form id="searchform" action="ad_love.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" class="form-control">
                            <option value="s2"<?php if ( SqlFilter($_REQUEST["s2"],"tab") != "" ){ echo " selected";}?>>手機</option>
                            <option value="s3"<?php if ( SqlFilter($_REQUEST["s3"],"tab") != "" ){ echo " selected";}?>>姓名</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <p style="clear:both">
                    <span class="text-status">搜尋關鍵字：<?php echo SqlFilter($_REQUEST["s3"],"tab");?></span>&nbsp;▶&nbsp;
                    <a class="btn btn-info<?php if ( $ty == "" ){ echo " btn-active";} ?>" <?php if ( $ty == "" ){?> style="cursor:auto;"<?php }?> href="ad_action.php">會館活動</a>
					<a class="btn btn-info<?php if ( $ty == 1 ){ echo " btn-active";} ?>" <?php if ( $ty == 1 ){?> style="cursor:auto;"<?php }?> href="ad_action.php?ty=1">網站活動</a>
                    
                    <select class="form-control2 pull-right" onchange="location.href='ad_action.php'+$(this).val()+''" autocomplete="off">
                        <option value="?orderby=0">預設排序</option>
                        <option value="?orderby=1">依資料時間排序</option>
                        <option value="?orderby=2">依督導發送排序</option>
                    </select>
                </p>
                <table class="table table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th width="2%"><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                            <th width="20%">姓名</th>
                            <th width="3%">性別</th>
                            <th width="5%" style="text-align: center;">手機</th>
                            <th width="5%" style="text-align: center;">地區</th>
                            <th width="5%">活動會館</th>
                            <th>參加活動</th>
                            <th width="5%">處理</th>
                            <th width="5%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ( count($result_list) == 0 ){
                            echo "<tr><td colspan='8' height='200'>目前沒有資料</td></tr>";
                        }else{
                            $ci = 0;
                            foreach($result_list as $re_list){
                                if ( $ci == 0 ){
						            $bgc = "#f2f2f2";
						            $ci = 1;
                                }else{
						            $bgc = "#ffffff";
						            $ci = 0;
                                } ?>
                                <tr id="showtr_<?php echo $re_list["k_id"];?>" style="background-color:<?php echo $bgc;?>">
							        <td><input data-no-uniform="true" type="checkbox" name="nums" value="<?php echo $re_list["k_id"];?>"></td>
								    <td class="center"><?php echo $ismem;?><a href="#c" onclick="Mars_popup('ad_love_detail.php?k_id=<?php echo $re_list["k_id"];?>','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=350,top=150,left=150');"><?php echo $re_list["k_name"];?></a>
                                        <?php
                                        $doub = "";
                                        if ( $re_list["k_mobile"] != "" And $re_list["k_mobile"] != "0912345678" ){
			                                $check_double = 0;
                                            $SQL = "Select count(mem_auto) As cc From member_data Where mem_mobile = '".$re_list["k_mobile"]."'";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $re);
			                                if ( count($result) > 0 ){
				                                if ( $re["cc"] > 0 ){
                                                    $check_double = 1;
                                                }
			                                }
                                            
                                            $SQL  = "Select count(k_id) As cc From love_keyin Where all_kind='活動' And k_mobile='".$re_list["k_mobile"]."' ";
                                            $SQL .= "And Not k_id = '".$re_list["k_id"]."'";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $re);                                            
			                                if ( count($result) > 0 ){
				                                if ( $re["cc"] > 0 ){
				                                    $check_double = 1;
                                                }
			                                }
                                        }			
			                            if ( $check_double == 1 ){
			                                $doub = " <span class='label label-warning'><a href='ad_no_mem_s.php?mem_mobile=".$re_list["k_mobile"]."' target='_blank' style='color:white;'>重</a></span>";
                                        } ?>
								        <div style="float:right">
                                            <?php echo $doub;?>
                                            <a href="ad_no_mem_s.php?mem_mobile=<?php echo $re_list["k_mobile"];?>" target="_blank"><span class="label label-info">查</span></a>
								            <?php
								            $isfav = 0;
                                            switch ($_SESSION["MM_UserAuthorization"]){								
								                case "admin":
                                                    $SQL = "Select count(mem_auto) As favb From member_data Where mem_mobile = '".$re_list["k_mobile"]."' And mem_fav = 1";
                                                    break;
								                case "branch":
								                    $SQL = "Select count(mem_auto) As favb From member_data Where mem_mobile = '".$re_list["k_mobile"]."' And mem_branch='".$_SESSION["branch"]."' And mem_fav = 1";
                                                    break;
								                default:
									                $SQL = "Aelect count(mem_auto) As favb From member_data Where mem_mobile = '".$re_list["k_mobile"]."' And mem_single='".$_SESSION["MM_Username"]."' And mem_fav = 1";
                                            }
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
			                                if ( count($result) > 0 ){
			          	                        if ( $re["favb"] >= 1 ){
			          	                            echo "<span class='label fav_tag_".$re_list["k_mobile"]."' style='background:red'><a href='#' style='color:white;' data-toggle='tooltip' title='關注名單'>關</a></span> ";
			                                      	$isfav = 1;
                                                  }
                                            }			          
								            $SQL = "Select beca From call_list Where fn = '".$re_list["k_mobile"]."' And types='val'";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $re);
                                            if ( count($result) > 0 ){                                            
								                echo "<span class='label' style='background:black'><a href='#m' data-toggle='tooltip' data-original-title='".$re["beca"]."' style='color:white;'>黑</a></span>";
							                }

								            if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" ){                
                                                if ( $ddoub != "" ){
									                echo "<a href='#c' onclick=alert('暫停使用') style='color:white;' data-toggle='tooltip' title='".$ddoub."'>";
                                                }else{
									                echo "<a href='#c' onclick=alert('暫停使用')>";
								                }
								
								                if ( $re_list["k_area"] != "" ){
				                                    $k_area = $re_list["k_area"];
                                                }else{
				                                    $k_area = "不明";
			                                    }
								                echo "<span class='label label-success'>".$k_area."</span>";
								                echo "</a>";
                                            } ?>
								        </div>
								    </td>
                                    <td style="text-align: center;"><?php echo $re_list["k_sex"];?></td>
                                    <td style="text-align: center;"><?php echo $re_list["k_mobile"];?></td>
                                    <td style="text-align: center;"><?php echo $k_area;?></td>
                                    <td style="text-align: center;"><?php echo $re_list["action_branch"];?></td>
                                        <?php
                                        /*if ( $re_list["action_time"] != "" ){
                                            if ( chkDate($re_list["action_time"]) ){
                                                $at = date_create_from_format( "Y-m-d" , $re_list["action_time"] );
                                            }else{
                                                
                                            }
                                        }*/
                                        $at = date("Y/m/d",strtotime($re_list["action_time"]));
                                        if ( $re_list["isbe"] == 1 ){
                                            $isbe = "<span class='label label-warning' style='background-color:blue'>正取</span>";
                                        }else{
                                            $isbe = "";
                                        } ?>
								    <td class="center"><?php echo $at;?>-<?php echo $re_list["action_title"];?><?php echo $isbe;?></td>
								    <td class="center"><?php echo $re_list["all_branch"];?>-<?php echo SingleName($re_list["all_single"],"normal");?></td>
								    <td class="center">
		                                <?php
		                                $reports = get_report_num($re_list["k_mobile"]);
		                                if ( substr_count($reports, "|+|") > 0 ){
                                            $reports_array = explode("|+|",$reports);
		                                    $report = $reports_array[0];
		                                    $report_text = $reports_array[1];
                                        }else{
		   	                                $report = 0;
		   	                                $report_text = "無";
		                                } ?>
			    		                <div class="btn-group">							
							                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
							                <ul class="dropdown-menu pull-right">
								                <li><a href="javascript:Mars_popup('ad_love_detail.php?k_id=<?php echo $re_list["k_id"];?>','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=350,top=150,left=150');"><i class="icon-file"></i> 詳細</a></li>
								                
                                                <?php if ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "admin" ){ ?>
								                    <li><a href="javascript:Mars_popup('ad_send_love_branch.php?k_id=<?php echo $re_list["k_id"];?>','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=400,height=250,top=200,left=200');"><i class="icon-file"></i> 修改處理祕書</a></li>
                								<?php }?>
								                
                                                <?php if ( $re_list["all_type"] != "未處理" ){ ?>
								                    <li><a href="javascript:Mars_popup('ad_report.php?k_id=<?php $re_list["k_id"];?>&ty=love','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(<?php echo $report;?>)</a></li>
                                                <?php }?>
								                
                                                <?php if ( $_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["MM_UserAuthorization"] != "branch" ){ ?>
								                    <?php if ( $re_list["k_trans"] != "1" ){?>
							                            <li><a href="?st=trans&k_id=<?php echo $re_list["k_id"];?>"><i class="icon-share"></i> 轉入未入會</a></li>
                                                        <!--原始程式<li><a href="?st=trans&k_id=<%=rs("k_id")&strRequest("k_id")%>"><i class="icon-share"></i> 轉入未入會</a></li>-->
							                        <?php }else{?>
							                            <li><a style="color:#ccc"><i class="icon-share" style="color:#ccc"></i> 已轉未入會</a></li>
							                        <?php }?>
                                                <?php }?>

                                                <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){?>
								                    <li><a href="#" onClick="Mars_popup2('ad_love_del.php?k_id=<?php echo $re_list["k_id"];?>','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
								                <?php }?>
							                </ul>
						                </div>								
								    </td>
							    </tr>
                                <tr style="background-color:<?php echo $bgc; ?>">
                                    <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                        <?php echo date("Y-m-d H:i",strtotime($re_list["k_time"]));?>&nbsp;&nbsp;
                                        <?php
                                        if ( $_SESSION["MM_UserAuthorization"] != "single" ){					
                                            if ( $re_list["k_cc"] != "" ){
					                            $k_cc = $re_list["k_cc"];
					                            if ( substr_count($k_cc, "sale-") > 0 ){
                                                    $k_cc_array = explode($k_cc,"-");
					  	                            $k_cc = "推廣：".SingleName($k_cc_array[1],"auto");
                                                }
						                        $k_cc = " [".$k_cc."]";
                                            }else{
						                        $k_cc = "";
					                        }
					                        echo $k_cc;
					                        if ( $re_list["k_come"] != "" ){
						                        $k_come = " [".$re_list["k_come"]."]　";
                                            }else{
						                        $k_come = "";
					                        }
					                        echo $k_come;
                                        }?>
			                            (<a href="javascript:Mars_popup('ad_report.php?k_id=<?php echo $re_list["k_id"];?>&ty=love','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(<?php echo $report;?>)</a>，
                                        處理情形：<font color="#FF0000" size="2"><?php echo $re_list["all_type"].$re_list["all_branch"];?>
                                        <?php if ( $re_list["all_single"] != "" ){ echo SingleName($re_list["all_single"],"normal");} ?></font>)
                                        內容：<?php echo $report_text;?>
                                        <font color="blue">備註：</font><?php echo $re_list["all_note"];?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
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

<script type="text/javascript">
    $(function() {


        $("#selnums").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", false);
                });
        });

        $("#search_div_send").on("click", function() {
            var $sv = $("#search_div_event");
            if (!$sv.val()) {
                alert("請選擇活動。");
                $sv.focus();
            } else {
                location.href = "ad_action.php?sear=1&vst=full&sv=" + $sv.val();
            }
        });

    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要發送的會員。");
        else Mars_popup('ad_send_love_branch_mutil.php?k_id=' + $allnum, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
    }

    function mutil_del() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else mem_del($allnum);
    }

    function mem_del(m) {
        if (window.confirm("是否確定刪除？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $.each(m, function(i, val) {
                    $("#showtr_" + val + ",#showtr_" + val + "_2").remove();
                });
            } else {
                $s1 = m;
                $s2 = $("#showtr_" + m + ",#showtr_" + m + "_2").remove();
            }

            $.ajax({
                url: "ad_love_del.php",
                data: {
                    t: "n",
                    k_id: $s1
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    $s2;
                    myApp.hidePleaseWait();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        } else alert("請重新選擇。");
    }

    function chk_search_form() {
        if (!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
            return false;
        }
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        location.href = "ad_action.php?sear=1&vst=full&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }

    function event_search() {
        $("#search_div").modal("show");
    }
</script>
