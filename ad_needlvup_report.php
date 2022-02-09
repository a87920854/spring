<?php
/***************************************/
//檔案名稱：ad_needlvup.php
//後台對應位置：春天網站功能 > 會員升級意願
//改版日期：2022.1.13
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************/
require_once("_inc.php");
require_once("./include/_function.php");

//接收值
$state = SqlFilter($_REQUEST["state"],"tab");
$msg = SqlFilter($_REQUEST["msg"],"tab");
$a = SqlFilter($_REQUEST["a"],"tab");
$k_id = SqlFilter($_REQUEST["k_id"],"tab");
$lu = SqlFilter($_REQUEST["lu"],"tab");
$log_username = SqlFilter($_REQUEST["log_username"],"tab");
$log_branch = SqlFilter($_REQUEST["log_branch"],"tab");
$k_mobile = SqlFilter($_REQUEST["k_mobile"],"tab");
$web_level = SqlFilter($_REQUEST["web_level"],"tab");
$mnum = SqlFilter($_REQUEST["mnum"],"tab");

//新增回報
if ( $state == "add" ){
    $SQL_u = "Update needlvup Set fix=1, msg='".$msg."' Where auton=".$a;
    $rs_u = $SPConn->prepare($SQL_u);
    $rs_u->execute();
    $result_u = $rs_u->fetchAll(PDO::FETCH_ASSOC);
    $log_name = SingleName($_SESSION["MM_Username"],"normal");

    //新增回報
    $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) Values ( ";
    $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
    $SQL_i .= "'".$k_id."',";
    $SQL_i .= "'".$lu."',";
    $SQL_i .= "'".$log_username."',";
    $SQL_i .= "'".$log_name."',";
    $SQL_i .= "'".$log_branch."',";
    $SQL_i .= "'".$_SESSION["MM_Username"]."',";
    $SQL_i .= "'".$k_mobile."',";
    $SQL_i .= "'系統紀錄',";
    $SQL_i .= "'".$log_name."處理".$log_username."(".$web_level.")的升級要求，處理結果：".$msg."',";
    $SQL_i .= "'member')";
    $rs_i = $SPConn->prepare($SQL_i);
    $rs_i->execute();

    reURL("win_close.php");
    exit;
}

$SQL = "Select * From member_data Where mem_num='".$mnum."'";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) > 0 ){
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>春天會館</title>
</head>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<body leftmargin="0" topmargin="0">
    <form action="?state=add" method="post" name="form1" onsubmit="return chk_form()">
        <table width="350" border="0" align="center">
            <tr> 
                <td>
                    <fieldset>
                        <legend style="color:#fc3bf5;font-weight:bold;">春天會館資料</legend>
                        <table width="340" border="0" align="center" cellpadding="3">
                            <tr> 
								<td colspan="2" bgcolor="#d9dbfd"><strong style="color: #1a218e;">▼ 請輸入處理結果</strong></td>
							</tr>
                            <tr bgcolor="#F0F0F0"> 
								<td height="100" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
									<div align="center"> 
										<p>
											<textarea name="Text1" cols="40" rows="7" id="msg" name="msg"></textarea>
											<!--<input type="text" style="width:90%" name="msg" id="msg">-->
										</p>
									</div>
								</td>
							</tr>
                            <tr>
                                <td colspan="2" bgcolor="#d9dbfd"> 
                                    <div align="center"> 
                                        <input name="Submit" type="submit" id="Submit2" style="font-size: 9pt" value="確定送出">
                                        <input name="a" type="hidden" id="a" value="<?php echo $a;?>">
                                        <input name="k_id" type="hidden" id="k_id" value="<?php echo $re["mem_auto"];?>">
                                        <input name="lu" type="hidden" id="lu" value="<?php echo $re["mem_username"];?>">
                                        <input name="log_username" type="hidden" id="log_username" value="<?php echo $re["mem_name"];?>">
                                        <input name="log_branch" type="hidden" id="log_branch" value="<?php echo $re["mem_branch"];?>">
                                        <input name="k_mobile" type="hidden" id="k_mobile" value="<?php echo $re["mem_mobile"];?>">
                                        <input name="web_level" type="hidden" id="web_level" value="<?php echo $re["web_level"];?>">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php }?>
<script language="JavaScript">

$(function() {
});
function chk_form() {
	if(!$("#msg").val()) {
		alert("請輸入處理結果");
		$("#msg").focus();
		return false;
	}
	return true;
}

</script>