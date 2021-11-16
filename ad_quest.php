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
        reURL("ad_quest.php?topage=".SqlFilter($_REQUEST["topage"],"int"));
    }

    //刪除
    if ( SqlFilter($_REQUEST["st"],"tab") == "del" ){
	    //Set rs = Server.CreateObject("ADODB.Recordset")
        $SQL_d = "Delete From quest Where auton = ".SqlFilter($_REQUEST["an"],"int");
        $rs_d = $SPConn->prepare($SQL_d);
        $rs_d->execute();
	    reURL("ad_quest.php?topage=".SqlFilter($_REQUEST["topage"],"tab"));
    }
    
    $default_sql_num = 500;
    //顯示筆數
	$default_sql_num = 500; //預設顯示筆數
	if ( SqlFilter($_REQUEST["vst"],"tab") == "full" ){
		$subSQL1 = "top ".$default_sql_num." * ";
	}else{
		$subSQL1 = "* ";
	}	

    if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
        $subSQL2 = "1=1";
    }else{
        $subSQL2 = "branch='".$_SESSION["branch"]."'";
    }

    //處理狀態
    if ( SqlFilter($_REQUEST["sear"],"tab") != 1 ){
        if ( SqlFilter($_REQUEST["s99"],"tab") != "" ){
    	    $subSQL3 = " And all_type <> '未處理'";
	        $all_type = "已處理";
	    }else{
    	    $subSQL3 = " And (all_type = '未處理' Or all_type is null)";
	        $all_type = "未處理";
        }
    }else{
	    $all_type = "資料搜尋";
    }
    
    //搜尋手機
    if ( SqlFilter($_REQUEST["s2"],"tab") != "" ){
	    $cs2 = reset_number(SqlFilter($_REQUEST["s2"],"tab"));
 	    $subSQL4 = " And k_mobile Like '%".$cs2."%'";
    }

    //搜尋姓名
    if ( SqlFilter($_REQUEST["s3"],"tab") != "" ){
	    $subSQL5 = " And k_name Like '%" . str_Replace("'", "''", SqlFilter($_REQUEST["s3"],"tab")) . "%'";
    }

    //取得總筆數
    $SQL = "Select count(auton) As total_size From quest Where ".$subSQL2.$subSQL3.$subSQL4.$subSQL5;
    echo $SQL;
    exit;
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
	$tPageSize = 50; //每頁幾筆
	$tPage = 1; //目前頁數
	if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
	$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
	if ( $tPageSize*$tPage < $total_size ){
		$page2 = $tPageSize;
	}else{
		$page2 = ($tPageSize-(($tPageSize*$tPage)-$total_size));
	}
	
	//分頁語法
	$SQL_list  = "Select ".$subSQL1."From (";
	$SQL_list .= "Select TOP ".$page2." * From (";
	$SQL_list .= "Select TOP ".($tPageSize*$tPage)." * From quest Where ".$subSQL2.$subSQL3.$subSQL4.$subSQL5." Order By times Desc, id Asc) t1 Where ".$subSQL2.$subSQL3.$subSQL4.$subSQL5." ";
	$SQL_list .= "Order By times Desc, id Asc) t2 Where ".$subSQL2.$subSQL3.$subSQL4.$subSQL5." Order By times Desc, id Asc";
	$rs_list = $SPConn->prepare($SQL_list);
	$rs_list->execute();
	$result_list=$rs_list->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<script type="text/JavaScript" src="./js/jquery-3.1.1.min.js"></script>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
	<header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">問卷報名資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">		
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>問卷報名資料 - <?php echo $all_type;?> - 數量：<?php echo $total_size." ".$count_href;?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
       	        <div class="col-md-12">       
			        <div class="btn-group">
					    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php if ( $all_type == "未處理" ){ ?>
                                <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>
                            <?php }?>
                            <?php if ( $all_type == "未處理" ){ ?>
                                <li><a href="ad_quest.asp" target="_self"><i class="icon-resize-horizontal"></i> 切換未處理</a></li>
                            <?php }?>
                        </ul>
                    </div>

                    <form id="searchform" method="post" target="_self" class="form-inline pull-left" onsubmit=" return chk_search_form();">
                        <select name="keyword_type" id="keyword_type">
                            <option value="s2">手機</option>
                            <option value="s3">姓名</option>
                        </select>
                        <input name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
				</div>

                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
				    <thead>
					    <tr>
                            <th width="2%"><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                            <th>問卷編號</th>
                            <th width="6%">姓名</th>
                            <th width="4%">性別</th>
                            <th width="6%">手機</th>
                            <th width="4%">地區</th>
                            <th width="5%">婚姻</th>
                            <th width="8%"></th>
                            <th width="12%"></th>
                            <th width="12%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ( count($result_list) == 0 ){
                            echo "<tr><td colspan='8' height='200'>目前沒有資料</td></tr>";
                        }else{
                            foreach($result_list as $re_list){ ?>
                                <tr>
                                    <td><input data-no-uniform="true" type="checkbox" name="nums" value="<?php echo $re_list["auton"];?>"></td>
                                    <td class="center"><?php echo $re_list["id"];?> - <?php echo $re_list["branch"];?></td>
                                    <td class="center">
                                        <a href="javascript:Mars_popup('ad_quest_v.php?an=<?php echo $re_list["auton"];?>','','status=yes,menubar=yes,re_listsizable=yes,scrollbars=yes,width=650,height=730,top=150,left=150');"><?php echo $re_list["name"];?></a>
                                         [<a href="ad_no_mem_s.php?mem_mobile=<?php echo $re_list["phone"];?>" target="_blank">查</a>]</td>
                                    <td class="center"><?php echo $re_list["sex"];?></td>
                                    <td class="center"><?php echo $re_list["phone"];?></td>
                                    <td class="center"><?php echo $re_list["are_lista"];?></td>     
                                    <td class="center"><?php echo $re_list["marry"];?></td>                           
                                    <td class="center"><?php echo $re_list["event"];?></td>
                                    <td class="center" align="center"><?php echo changeDate($re_list["times"]);?></td>
                                    <td class="center" align="center">
                                    <?php
                                        if ( $re_list["isc"] == 0 ){
                                            $ch = "<a href='?st=ch&an=".$re_list["auton"]."&topage=".$topage."'>轉換及處理</a>";
                                        }else{
                                            $ch = "轉換及處理";
                                        }
                                        ?>
                                        <a href="javascript:Mars_popup('ad_quest_v.php?an=<?php echo $re_list["auton"];?>','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=650,height=730,top=200,left=200');">詳細</a> | 
                                        <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ echo $ch;?> | <a href="?st=del&an=<?php echo $re_list["auton"];?>&topage=<?php echo $topage;?>">刪除</a><?php }?>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>            
            </div><?php //require_once("./include/_page.php"); ?>
        </div><!--/span-->
    </div><!--/row-->
</section>

<script type="text/javascript">
    function chk_search_form() {
        if(!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
	        return false;
        }
        if(!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
	        return false;
        }
        location.href="ad_quest.php?sear=1&vst=full&"+$("#keyword_type").val()+"="+$("#keyword").val();
        return false;
    }
</script>