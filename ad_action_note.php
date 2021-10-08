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
		header("location:reload_window.asp?m=資料刪除中...");
		exit;
	}

	//顯示筆數
	$default_sql_num = 500; //預設顯示筆數
	if ( SqlFilter($_REQUEST["vst"],"tab") == "full" ){
		$subSQL1 = "top ".$default_sql_num." * ";
	}else{
		$subSQL1 = "* ";
	}	

	if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
		if ( $_SESSION["branch"] == "好好玩旅行社" ){
			$subSQL2 = "branch='".$_SESSION["branch"]."'";
		}else{
			$subSQL2 = "";
		}
	}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" ){
		$subSQL2 = "branch='".$_SESSION["branch"]."'";
	}elseif ( $_SESSION["MM_UserAuthorization"] == "action" ){
	  	if ( $_SESSION["action_level"] == 1 ){
			$subSQL2 = "(branch='台南' Or branch='高雄') And singlelv='action'";
		}elseif ( $_SESSION["action_level"] == 2 ){
			$subSQL2 = "(branch='台北' Or branch='桃園' Or branch='新竹' Or branch='台中') And singlelv='action'";
		}elseif ( $_SESSION["action_level"] == 3 ){
			$subSQL2 = "Not branch='好好玩旅行社' And singlelv='action'";
		}else{
			$subSQL2 = "single='".$_SESSION["MM_Username"]."'";
		}
	}else{
		$subSQL2 = "single='".$_SESSION["MM_Username"]."'";
	}

	if ( SqlFilter($_REQUEST["d1"],"tab") != "" && SqlFilter($_REQUEST["d2"],"tab") != "" ){
		$d1 = SqlFilter($_REQUEST["d1"],"tab");
		$d2 = SqlFilter($_REQUEST["d2"],"tab");
		$subSQL3 = " And dates Between '".$d1." 00:00' And '".$d2." 23:59'";
	}

	if ( SqlFilter($_REQUEST["branch"],"tab") != "" ){
		$branch = SqlFilter($_REQUEST["branch"],"tab");
		$subSQL4 = " And Branch='".str_replace("'", "''", $branch)."'";
	}

	if ( SqlFilter($_REQUEST["single"],"tab") != "" ){
		$single = SqlFilter($_REQUEST["single"],"tab");
		$subSQL5 = " and single='" . str_replace("'", "''", $single)."'";
	}

	if ( SqlFilter($_REQUEST["wtype"],"tab") != "" ){
		$wtype = SqlFilter($_REQUEST["wtype"],"tab");
		$subSQL6 = " And wtype='".str_replace("'", "''", $wtype)."'";
	}

	if ( SqlFilter($_REQUEST["keywOrd"],"tab") != "" ){
		$keywOrd = SqlFilter($_REQUEST["keywOrd"],"tab");
		$subSQL7 = $sqlss." And (title Like '%".str_replace("'", "''", $keywOrd)."%' Or supplier Like '%".str_replace("'", "''", $keywOrd)."%')";
	}
	
	//取得總筆數
	$SQL = "Select count(auton) As total_size From action_log Where types='list'".$subSQL2.$subSQL3.$subSQL4.$subSQL5.$subSQL6.$subSQL7;
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
	$tPageSize = 20; //每頁幾筆
	$tPage = 1; //目前頁數
	if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
	$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
	if ( $tPageSize*$tPage < $total_size ){
		$page2 = 20;
	}else{
		$page2 = (20-(($tPageSize*$tPage)-$total_size));
	}
	
	$SQL_list  = "Select ".$subSQL1."From (";
	$SQL_list .= "Select TOP ".$page2." * From (";
	$SQL_list .= "Select TOP ".($tPageSize*$tPage)." * From action_log Where types='list'".$subSQL2.$subSQL3.$subSQL4.$subSQL5.$subSQL6.$subSQL7." Order By auton Desc) t1 Where types='list'".$subSQL2.$subSQL3.$subSQL4.$subSQL5.$subSQL6.$subSQL7." ";
	$SQL_list .= "Order By auton Desc) t2 Where types='list'".$subSQL2.$subSQL3.$subSQL4.$subSQL5.$subSQL6.$subSQL7." Order By auton Desc";
	$rs_list = $SPConn->prepare($SQL_list);
	$rs_list->execute();
	$result_list=$rs_list->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/JavaScript" src="./include/script.js"></script>
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
                    <strong>工作日誌 - 工作項目列表 - 數量：<?php echo $total_size.$count_href;?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p>
                        <a href="javascript:Mars_popup('ad_action_note_add.php','','width=710,height=400,top=200,left=200')" class="btn btn-success">新增工作日誌</a>
                        <a href="ad_action_note.php" class="btn btn-danger">工作項目列表</a>
                        <a href="ad_action_note_new.php" class="btn btn-warning">最新聯絡情形<?php echo $_SESSION["MM_UserAuthorization"];?></a>
						<form name="fOrm1" method="post" action="?vst=full" class="fOrm-inline" onsubmit="return chk_fOrm()">
							工作日期：
							<input type="text" name="d1" id="d1" class="datepicker" autocomplete="off" value="<?php echo SqlFilter($_REQUEST["d1"],"tab");?>"> 至 <input type="text" name="d2" id="d2" class="datepicker" autocomplete="off" value="<?php echo SqlFilter($_REQUEST["d2"],"tab");?>">
							<Select name="branch" id="branch" class="fOrm-control">
								<option value="">選擇會館</option>
								<?php
								//可視會館名稱
								if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" ){
									$subSQL = "";
								}elseif ( $_SESSION["action_level"] == 2 ){
									$subSQL = " And admin_name Not In ('台南','高雄','八德','約專','總管理處')";
								}elseif ( $_SESSION["action_level"] == 3 ){
									$subSQL = " And admin_name Not In ('約專','總管理處')";
								}elseif ( $_SESSION["action_level"] == 1 ){
									$subSQL = " And admin_name Not In ('台北','桃園','新竹','台中','八德','約專','總管理處')";
								}
								$SQL = "Select * From branch_data Where admin_sOrt<>99 ".$subSQL."Order By admin_SOrt";
								$rs = $SPConn->prepare($SQL);
								$rs->execute();
								$result=$rs->fetchAll(PDO::FETCH_ASSOC);
								fOreach($result as $re){ ?>
									<option value="<?php echo $re["admin_name"];?>"<?php if ( SqlFilter($_REQUEST["branch"],"tab") ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
								<?php }?>
							</Select>
							<?php if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" ){ ?>
								<Select name="single" id="single" class="fOrm-control">
									<option value="">請選擇</option>
								</Select>
							<?php }?>
							
							<Select name="wtype" id="wtype" class="fOrm-control">
								<option value="">工作類型</option>
								<?php
									//工作類型
									$SQL = "Select * From wOrk_type Order By SOrt";
									$rs = $SPConn->prepare($SQL);
									$rs->execute();
									$result=$rs->fetchAll(PDO::FETCH_ASSOC);
									fOreach($result as $re){ ?>
										<option value="<?php echo $re["name"]?>"><?php echo $re["name"]?></option>
									<?php }?>
							</Select>
							<input type="text" name="keywOrd" id="keywOrd" class="fOrm-control" placeholder="請輸入要搜尋的工作項目或廠商">

							<input type="submit" name="Submit" class="btn btn-default" value="送出">
						</form>
                    </p>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th width="6%" style="text-align:center;">工作類型</th>
                            <th width="6%" style="text-align:center;">日期</th>
                            <th width="5%" style="text-align:center;">會館</th>
                            <th width="8%" style="text-align:center;">秘書</th>
                            <th>工作項目</th>
                            <th width="6%" style="text-align:center;">今日回報</th>
                            <th width="8%" style="text-align:center;">聯絡情形</th>
                            <th width="6%" style="text-align:center;">最後聯絡</th>
                            <th width="6%">&nbsp;</th>
                        </tr>
					</thead>

					<tbody>
						<?
						if ( count($result_list) == 0 ){
							echo "<tr><td colspan='8' height='200'>目前沒有資料</td></tr>";
						}else{
							foreach($result_list as $re_list){?>
								<tr>
									<td align="center"><?php echo $re_list["wtype"];?></td>
									<td align="center"><?php echo date("Y/m/d",strtotime($re_list["dates"]));?></td>
									<td align="center"><?php echo $re_list["branch"]?></td>
									<td align="center"><?php echo $re_list["single_name"];?></td>
									<td align="left"><?php echo $re_list["title"]?></td>
									<td align="center">
										<a href="ad_report_list.php?s6=八德&s7=A221335725&y1=2021/9/8&y2=2021/9/8" target="_blank">26 / 27</a>
									</td>
									<td align="center">
										<a href="javascript:Mars_popup('ad_action_note_repOrt.php?an=11062','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">沒有聯絡紀錄</a>

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
						<?php }}?>
                        </tbody>
                </table>
            </div>
            <?php require_once("./include/_page.php"); ?>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    </div>
    <!--/.fluid-container-->
    <!-- /MIDDLE -->

    <?php require_once("./include/_bottom.php"); ?>
    <script type="text/javascript">
        /*$(function() {

            $("#branch").on("change", function() {
                personnel_get("branch", "single");
            });

            function chk_fOrm() {
                if ($("d1").val() || $("d2").val()) {
                    if (!$("d1").val() || !$("d2").val()) {
                        alert("請選擇起始日期和結束日期。");
                        return false;
                    }
                }
                return true;
            }
        })*/
    </script>