<?php
	/*****************************************/
	//檔案名稱：ad_job_send_branch.php
	//後台對應位置：名單/發送記錄>徵人資料 → 發送
	//改版日期：2021.10.19
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	
	if ( SqlFilter($_REQUEST["state"] == "add" ){
		$an = SqlFilter($_REQUEST["an"],"tab");
		$SQL = "Select * From job Where auton='".$an."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		$SQL_u = "Update job Set all_branch='".SqlFilter($_REQUEST["pay1"],"tab")."' Where auton='".$an."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		header("location:win_close.php");
		exit;
	}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>春天會館</title>
</head>
<body leftmargin="0" topmargin="0">
    <form action="?state=add" method="post" name="form1">
        <table width="350" border="0" align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>春天會館資料</legend>
                        <table width="340" border="0" align="center" cellpadding="3">
                            <tr bgcolor="#FFF0E1">
                                <td colspan="2" bgcolor="#336699">&nbsp;</td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td height="100" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                    <div align="center">
                                        <p>
                                            <font color="#990066" size="3">請分配會館及秘書</font>
                                        </p>
                                        <p>會館：
                                            <select name="pay1" id="pay1" style="height:28px;">
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
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr bgcolor="#FFF0E1">
                                <td colspan="2" bgcolor="#336699">
                                    <div align="center">
                                        <input name="Submit" type="submit" id="Submit2" style="font-size: 9pt" value="確定送出">
                                        <input name="an" type="hidden" id="an" value="223">
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