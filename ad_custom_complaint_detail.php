<?php
	error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_custom_complaint_detail.php
	//後台對應位置：名單/發送記錄>客服中心資料(客戶申訴明細)
	//改版日期：2021.11.02
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");

    if ( SqlFilter($_REQUEST["st"],"tab") == "delmsg" ){
        if ( SqlFilter($_REQUEST["an"],"tab") != "" ){
            $log_data = 0;
            $SQL = "Select Top 1 * From ad_custom_complaint Where auton='".SqlFilter($_REQUEST["an"],"tab")."' And types='reply'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $re);
            if ( count($result) > 0 ){

                //urlpath = server.mappath("webfile/paper")
                $filename = $re["filename"];
                if ( $filename != "" ){
                    $path = dirname(__FILE__)."\Upload\\".$filename;
                    DelFile($path);
                    $log_data = 1;
                }
                //刪除記錄
                $SQL_d = "Delete From ad_custom_complaint Where auton='".SqlFilter($_REQUEST["an"],"tab")."' And types='reply'";
                $rs_d = $SPConn->prepare($SQL_d);
                $rs_d->execute();
            }

            if ( $log_data == 1 ){
                //新增    
                $SQL_i  = "Insert Into ad_custom_complaint(num, mem_branch, mem_singlename, mem_single, notes, times, types) Values ( '";
                $SQL_i .= SqlFilter($_REQUEST["num"],"tab")."',";
                $SQL_i .= "'".$_SESSION["branch"]."',";
                $SQL_i .= "'".$_SESSION["pname"]."',";
                $SQL_i .= "'".$_SESSION["MM_Username"]."',";
                $SQL_i .= "'".$_SESSION["pname"]." 刪除檔案：".$filename."',";
                $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
                $SQL_i .= "'reply')";
                $rs_i = $SPConn->prepare($SQL_i);
                $rs_i->execute();
            }
        }
        reURL("win_close.php?m=刪除中…");
        //header("location:win_close.php?m=刪除中…");
        //exit;
    }
    
    //上傳檔案*程式
    if ( SqlFilter($_REQUEST["st"],"tab") == "uf" ){

        $num = SqlFilter($_REQUEST["num"],"tab");

        //上傳檔將存入此路徑裡的 uploads 資料夾
        $upload_dir = "Upload/";
        //檔案前置名
        $ForderName = $num."_";
        //上傳檔總數
        $total_uploads = 1;
        //用迴圈讀取上傳檔案資料
        for ($i = 1; $i <= $total_uploads; $i++) {
            //上傳檔大小限制，此處限制為600KB
            $size_bytes = 3000 * 1024;
            //副檔名限制
            $limitedext = array(".pdf",".gif",".jpg",".jpeg",".png");// 副檔名限制  
            $new_file = $_FILES['Photo'.$i];
            // 讀取上傳檔名
            $file_name = $new_file['name'];
            // 把檔名中的空格替換成 "_"
            $file_name = str_replace(' ', '_', $file_name);
            // 存入暫存區的檔名
            $file_tmp = $new_file['tmp_name'];
            // 檔案大小
            $file_size = $new_file['size'];
            // 判斷檔案是否指定上傳檔案…
            if (is_uploaded_file($file_tmp)) {
                //若有上傳檔，則取出該檔案的副檔名
                $ext = strrchr($file_name,'.');
                //判斷副檔名是否符合預期
                if (!in_array(strtolower($ext),$limitedext)) {
                    //不符合預期，顯示錯誤訊息。
                    $MSG .="檔案 $i: ($file_name) 的檔案副檔名有誤（只允許GIF和JPEG檔）";
                }else{
                    //檢查檔案是否太大
                    if ($file_size > $size_bytes){
                        $MSG .="檔案 $i: ($file_name) 無法上傳，請檢查檔案是否小於 ". $size_bytes / 1024 ." KB。";
                    }else{
                        $file_name = $ForderName. strftime("%Y%m%d%H%M%S").$i.$ext;      //更改上傳的圖檔名稱.
                        //放入陣列
                        $Photo[$i] = $file_name;       //存入資料庫的 檔案存取路徑
                        if (move_uploaded_file($file_tmp,$upload_dir.$file_name)) {
                            //取得上傳圖片
                            $src = getimagesize($upload_dir.$file_name);
                            //取得來源圖片長寬
                            $PhotoW[$i] = $src[0];
                            $PhotoH[$i] = $src[1];
                        }
                    }
                }
            }
        }

        //新增 ad_custom_complaint
        $SQL_i  = "Insert Into ad_custom_complaint (num, mem_branch, mem_singlename, mem_single, notes, times, types) Values ( '";
        $SQL_i .= SqlFilter($num,"tab")."',";
        $SQL_i .= "'".$_SESSION["branch"]."',";
        $SQL_i .= "'".$_SESSION["pname"]."',";
        $SQL_i .= "'".$_SESSION["MM_Username"]."',";
        $SQL_i .= "'".$_SESSION["pname"]." 上傳檔案：".$file_name."',";
        $SQL_i .= "'".$file_name."',";
        $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
        $SQL_i .= "'reply')";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();
        reURL("ad_custom_complaint_detail.php?id=".$num);
       // header("location:ad_custom_complaint_detail.php?id=".$num);
    }

    //回報處理情形*程式
    if ( SqlFilter($_REQUEST["st"],"tab") == "sendmsg" ){	
	    if ( SqlFilter($_REQUEST["msg"],"tab") == "" ){ call_alert("請輸入內容。", 0, 0); }
	    if ( SqlFilter($_REQUEST["num"],"tab") == "" ){ call_alert("編號錯誤。", 0, 0); }

        //新增 ad_custom_complaint
        $SQL_i  = "Insert Into ad_index_data(num, mem_branch, mem_singlename, mem_single, notes, times, types) Values ( ";
        $SQL_i .= "'".SqlFilter($_REQUEST["num"],"tab")."',";
        $SQL_i .= "'".$_SESSION["branch"]."',";
        $SQL_i .= "'".$_SESSION["pname"]."',";
        $SQL_i .= "'".$_SESSION["MM_Username"]."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["msg"],"tab")."',";
        $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
        $SQL_i .= "'reply')";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();
        reURL("ad_custom_complaint_detail.php?id=".SqlFilter($_REQUEST["num"],"tab"));
        //header("location:ad_custom_complaint_detail.php?id=".SqlFilter($_REQUEST["num"],"tab"));
    }

    //結案歸檔*程式
    if ( SqlFilter($_REQUEST["st"],"tab") == "fix" ){
        if ( SqlFilter($_REQUEST["num"],"tab") == "" ){ call_alert("編號錯誤。", 0, 0); }
        $SQL = "Select Top 1 * From ad_custom_complaint Where types='main' And num='".SqlFilter($_REQUEST["num"],"tab")."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
        if ( count($result) == 0 ){
            call_alert("資料錯誤。", 0, 0);
        }else{
            $cphone = $re["cphone"];
            $num = $re["num"];
            //更新 ad_custom_complaint
            $SQL_u = "Update ad_custom_complaint Set stats=2 Where types='main' And num='".SqlFilter($_REQUEST["num"],"tab")."'";
            $rs_u = $SPConn->prepare($SQL_u);
            $rs_u->execute();
        }

        //新增結案歸檔記錄*程式
        $SQL_i  = "Insert Into ad_custom_complaint(num, mem_branch, mem_singlename, mem_single, notes, times, types) Values ( ";
        $SQL_i .= "'".SqlFilter($_REQUEST["num"],"tab")."',";
        $SQL_i .= "'".$_SESSION["branch"]."',";
        $SQL_i .= "'".$_SESSION["pname"]."',";
        $SQL_i .= "'".$_SESSION["MM_Username"]."',";
        $SQL_i .= "'".$_SESSION["pname"]." 將本案件結案歸檔',";
        $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
        $SQL_i .= "'reply')";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();        
        addreport("系統", "", "", $cphone, "系統紀錄", $_SESSION["pname"]." 於 ".chtime(date("Y-d-m H:m:i"))." 將客戶申訴案件 - ".$num." 結案歸檔");
        //header("location:win_close.php?m=結案歸檔中...");
        reURL("win_close.php?m=結案歸檔中...");
    }

    //if ( SqlFilter($_REQUEST["id"],"tab") == "" ){ call_alert("編號錯誤。", 0,0); }

    $SQL = "Select * From ad_custom_complaint Where types='main' And num='".SqlFilter($_REQUEST["id"],"tab")."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) == 0 ){
	    call_alert("案件資料錯誤。", 0,0);
    }
    $num = $re["num"];
    if ( $re["stats"] == 2 ){
	    $isfix = 1;
	    $isfixd = " disabled";
    }else{
        $isfix = 0;
        $isfixd = "";
    }
?>
<script type="text/JavaScript" src="include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_custom_complaint.php">客戶申訴</a></li>
            <li class="active">案件資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>客戶申訴 - 案件資料 -  <?php echo $re["cname"];?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p class="no-print">
                    <button class="btn btn-info" href="#replymodal" data-toggle="modal" data-target="#replymodal"<?php echo $isfixd; ?>>回報處理情形</button>
                    <button class="btn btn-info" href="#uploadmodal" data-toggle="modal" data-target="#uploadmodal"<?php echo $isfixd; ?>>上傳資料</button>
                    <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manger" ){ ?>
                        <button class="btn btn-danger" onclick="fix('<?php echo $num; ?>')"<?php echo $isfixd; ?>>結案歸檔</button>
                    <?php }?>
                    <a href="javascript:window.print();" class="btn btn-warning">列印本頁</a>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td>編號：<?php echo $re["num"]; ?>&nbsp;&nbsp;建立時間：<?php echo Date_EN($re["times"],9); ?>&nbsp;&nbsp;狀態：<?php echo custom_complaint_stats($re["stats"]) ;?></td>
                        </tr>
                        <tr>
                            <td>
          	                    <font color="green">建檔：</font><?php echo $re["mem_branch"];?> - <?php echo $re["mem_singlename"];?>
                                &nbsp;&nbsp;
                                <font color="green">處理：</font><?php echo $re["fix_branch"];?> - <?php echo $re["fix_singlename"];?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                姓名：<?php echo $re["cname"];?>
                                &nbsp;&nbsp;
                                手機號碼：<?php echo $re["cphone"];?>
                                &nbsp;&nbsp;
                                電話：<?php echo $re["cphone2"];?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                訴求內容：<small class="text-danger">(請謹慎填寫，建立案件後訴求內容無法修改)</small>
                                <div class="print-show" style="display:none;">
                                    <?php
                                    $notes = $re["notes"];
                                    echo $re["notes"];
                                    ?>
                                </div>
                                <?php
                                if ( $notes != "" ){
                                    $notes = str_replace("<br>", "\r\n", $notes);
                                }
                                ?>
                                <textarea style="width:100%;height:250px;" minlength="20" name="notes" class="no-print" readonly disabled><?php echo $notes;?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <b class="text-blue">處理情形</b>
                <table class="table table-striped table-bordered bootstrap-datatable lightbox" data-plugin-options='{"delegate": "a.popup", "gallery": {"enabled": true}}'>
                    <?php
      	            $SQL = "Select * From ad_custom_complaint Where num='".$num."' And types='reply' Order By times Desc";
                    $rs = $SPConn->prepare($SQL);
                    $rs->execute();
                    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
      	            if ( count($result) == 0 ){
                        echo "<tr><td>暫無資料</td></tr>";
                    }else{
                        foreach($result as $re){
                      		echo "<tr>";
      		                echo "<td width='160'>".Date_EN($re["times"],9)."</td>";
      		                echo "<td width='180'>".$re["mem_branch"]." - ".$re["mem_singlename"]."</td>";
                          	$filename = $re["filename"];
      	                    $msg = $re["notes"];
                            if ( $filename != "" ){
	                            if ( strstr($filename, ".pdf") > 0 ){
	                                $msg = $msg."&nbsp;&nbsp;<a href='webfile/paper/".$filename."' target='_blank'><i class='fa fa-external-link'></i></a>";
                                }else{
	                                $msg = $msg."&nbsp;&nbsp;<a href='webfile/paper/".$filename."' class='popup'><i class='fa fa-external-link'></i></a>";
                                }
                            }        
      		                echo "<td>".$msg."</td>";
                            echo "<td class='no-print' width='10%'>";
                            if ( ( date_create($re["times"]) > date_create(date("Y-m-d H:m:s"))-1 ) && $isfix == 0 ){
				                echo "<a href=javascript:Mars_popup2('ad_custom_complaint_detail.php?st=delmsg&num=".$num."&an=".$re["auton"]."','','width=300,height=200,top=100,left=100')>刪除</a>";
                            }
                            if ( $_SESSION["MM_UserAuthorization"] == "admin" && ($re["times"] < date_create(date("Y-m-d H:m:s"))-1 ) && $isfix == 0 ){
      	                        echo "<a href=javascript:Mars_popup2('ad_custom_complaint_detail.php?st=delmsg&num=".$num."&an=".$re["auton"]."','','width=300,height=200,top=100,left=100')>刪除</a>";
                            }
                            echo "</td>";
      		                echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->

    <div class="modal fade" id="replymodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="ad_custom_complaint_detail.php" method="post" class="nomargin">
					<div class="modal-header">
						<button type="button" id="send_branch_div_close1" class="close" data-dismiss="modal">×</button>
						<h4 class="modal-title">回報處理情形</h4>
					</div>
					<div class="modal-body">
						<p>處理內容：<input type="text" name="msg" id="msg" class="form-control" required></p>				          
					</div>
					<div class="modal-footer">
						<input type="hidden" name="st" value="sendmsg">
						<input type="hidden" name="num" value="<?php echo $num;?>">
						<a href="#close" class="btn btn-default" data-dismiss="modal">關閉</a>
						<button type="submit" class="btn btn-primary">送出</a>
					</div>			
			  </form>			
		    </div>
	    </div>
    </div>

    <div class="modal fade" id="uploadmodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="ad_custom_complaint_detail.php?st=uf&num=<?php echo $num;?>" class="nomargin" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" id="send_branch_div_close1" class="close" data-dismiss="modal">×</button>
						<h4 class="modal-title">上傳資料</h4>
					</div>
					<div class="modal-body">
						<p>
							<div class="fancy-file-upload">
								<i class="fa fa-upload"></i>
								<input type="file" class="form-control" name="Photo1" id="Photo1" onchange="jQuery(this).next('input').val(this.value);">
								<input type="text" class="form-control" placeholder="請選擇檔案" readonly>
								<span class="button">選擇檔案</span>
							</div>
						</p>
					</div>
					<div class="modal-footer">			
						<a href="#close" class="btn btn-default" data-dismiss="modal">關閉</a>
						<button type="submit" class="btn btn-primary">送出</a>
					</div>			
		  		</form>			
		   	</div>
	    </div>
    </div>
</section>
<!-- /MIDDLE -->

<?php require_once("./include/_bottom.php");?>

<script src="js/select2.min.js"></script>
<script language="JavaScript">
    $mtu = "ad_guest.";
    $("#mem_branch").on("change", function() {
        personnel_get("mem_branch", "mem_single");
    });
    $("#fix_branch").on("change", function() {
        personnel_get("fix_branch", "fix_single");
    });

    function fix(num){
        if (window.confirm("是否確定要結案歸檔？\n結案歸檔後的案件將無法回報處理情形並封存，請確定選擇。")) {
            Mars_popup('ad_custom_complaint_detail.php?st=fix&num=' + num,'','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=250,height=150,top=100,left=200');
        }
    }
</script>