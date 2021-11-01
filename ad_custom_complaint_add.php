<?php
	error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_job.php
	//後台對應位置：名單/發送記錄>客服中心資料(客戶申訴新增)
	//改版日期：2021.10.29
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");

    if ( SqlFilter($_REQUEST["st"],"tab") == "add" ){
        if ( SqlFilter($_REQUEST["cname"],"tab") == "" ){ call_alert("請輸入姓名。", 0, 0); }
        if ( SqlFilter($_REQUEST["cphone"],"tab") == "" ){ call_alert("請輸入手機號碼。", 0, 0); }
        if ( SqlFilter($_REQUEST["notes"],"tab") == "" ){ call_alert("請輸入內容。", 0, 0); }
	
        //程式開始
        $SQL = "Select * From ad_custom_complaint Where mem_single='".$_SESSION["MM_Username"]."' Order By times Desc";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $re);

        if ( count($result) > 0 ){
            $lasttime = date_create($re["times"]);
            if ( date_diff($lasttime, date_create(date("Y-m-d H:s:i"))) < 30   ){
                call_alert("建立案件時間過短。", "", 0);
            }
        }
        $X = date("Y-m-d H:i:s");
        $num = date("Y",strtotime($X)).date("m",$X).date("d",$X).date("h",$X).date("i",$X).date("s",$X);
        $SQL = "Select Top 1 * From ad_custom_complaint";
        $SQL_i  = "Insert Into ad_custom_complaint (num,mem_branch,mem_singlename,mem_single,fix_branch,fix_singlename,fix_single,cname,cphone,cphone2,notes,times,types) values (";
        $SQL_i .= "'".$num."',";
        $SQL_i .= "'".$_SESSION["branch"]."',";
        $SQL_i .= "'".$_SESSION["pname"]."',";
        $SQL_i .= "'".$_SESSION["MM_Username"]."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["fix_branch"],"tab")."',";
        $SQL_i .= "'".SingleName(SqlFilter($_REQUEST["fix_single"],"tab"),"normal")."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["fix_single"],"tab")."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["cname"],"tab")."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["cphone"],"tab")."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["cphone2"],"tab")."',";
        $SQL_i .= "'".str_replace("\r\n","<br>",SqlFilter($_REQUEST["notes"],"tab"))."',";
        $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
        $SQL_i .= "'main')";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();
        addreport("系統", "", "", SqlFilter($_REQUEST["cphne"],'tab'), "系統紀錄", $_SESSION["pname"]." 於 ".date("Y-m-d H:s:i")." 建立客戶申訴案件 - ".$num);
        call_alert("案件建立完成。", "ad_custom_complaint.php", 0);
}
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_custom_complaint.php">客戶申訴</a></li>
            <li class="active">建立案件</li>
        </ol>
    </header>
    <!-- /page title -->
    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>客戶申訴 - 建立案件</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <form id="searchform" action="ad_custom_complaint_add.php" method="post" class="form-inline" target="_self">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td>
                                    <font color="green">建檔：</font><?php echo $_SESSION["branch"];?> - <?php $_SESSION["pname"];?>
                                    &nbsp;&nbsp;
                                    <font color="green">處理：</font>
                                    <select name="fix_branch" id="fix_branch" required>
                                        <option value="">請選擇</option>
                                        <?php
                                        $SQL = "Select * From branch_data Where admin_sort<>99 Order By admin_SOrt";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($result as $re){ ?>
                                            <option value="<?php echo $re["admin_name"]?>"><?php echo $re["admin_name"]?></option>
                                        <?php }?>
                                    </select>
                                    <Select name="fix_single" id="fix_single" required>
                                        <option value="">請選擇</option>
                                        <?php
                                        if ( $_REQUEST["flag"] == "1" ){ 
                                            $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' Order By p_desc2 Desc, lastlogintime Desc";
                                        }else{
                                            $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' And p_work=1 Order By p_desc2 Desc, lastlogintime Desc";
                                        }
                                        if ( $branch != "" ){
                                            $rs_er = $SPConn->prepare($SQL_er);
                                            $rs_er->execute();
                                            $result_er = $rs_er->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result_er as $re_er){
                                                if ( $re_er["p_name"] != "" ){ $p_name = $re_er["p_name"]; }
                                                if ( $re_er["p_other_name"] != "" ){ $p_name = $re_er["p_other_name"]; }
                                                echo "<option value='".$re_er["p_user"]."'";
                                                if ( $single == $re_er["p_user"] ){ echo " selected";}
                                                echo ">".$p_name."</option>";
                                            }
                                        }?>
								    </Select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    姓名：<input type="text" class="form-control" name="cname" id="cname" required>
                                    &nbsp;&nbsp;
                                    手機號碼：<input type="tel" id="cphone" name="cphone" class="form-control phone" pattern="^[09]{2}[0-9]{8}$" minlength="10" maxlength="10" title="請輸入 09 開頭的十位數手機號碼" required>
                                    &nbsp;&nbsp;
                                    電話：<input type="text" class="form-control" name="cphone2" id="cphone2">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    訴求內容：<small class="text-danger">(請謹慎填寫，建立案件後訴求內容無法修改)</small>
                                    <textarea style="width:100%;height:250px;" minlength=20 name="notes" required></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td><input type="hidden" name="st" value="add"><input type="submit" value="送出申請" class="btn btn-success"></td>
                            </tr>
                    </table>
                </form>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php require_once("./include/_bottom.php"); ?>

