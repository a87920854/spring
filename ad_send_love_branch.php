<?php
    error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_send_love_branch.php
	//後台對應位置：名單/發送記錄>活動報名記錄(修改分配會館)
	//改版日期：2021.11.25
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");

    $k_id = SqlFilter($_REQUEST["k_id"],"tab");
    $st = SqlFilter($_REQUEST["str"],"tab");

    if ( $st == "add" ){
        $SQL = "Select * From love_keyin Where k_id in (".$k_id.")";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
        if ( count($result) > 0 ){
            foreach($result as $re){
                if ( $re["all_branch"] <> "" then
     	old_branch = rs("all_branch")
     end if
	   rs("all_branch") = Request("pay1")
     if rs("all_single") <> "" then
     	old_single = rs("all_single")
     end if
	   rs("all_single") = Request("pay2")
	   rs("all_type") = "已發送"
	   rs("send_time") = now()
	   
	   old_mobile = rs("k_mobile")
	   new_branch = rs("all_branch")
	   new_single = rs("all_single")
	   
	
qrs.open "select top 1 * from log_data", SPCon, 1, 3
qrs.addnew
qrs("log_time") = now
qrs("log_num") = rs("k_id")
qrs("log_username") = rs("k_name")
qrs("log_name") = Session("p_other_name")
qrs("log_branch") = Session("branch")
qrs("log_single") = Session("MM_Username")
qrs("log_1") = rs("k_mobile")
qrs("log_2") = "系統紀錄"
if old_branch <> "" or old_single <> "" then
qrs("log_4") = Session("p_other_name")&"於"&now&"將本筆資料[活動]自 "&old_branch&" - "&SingleName(old_single)&" 轉送給 "&rs("all_branch")&"-"&SingleName(rs("all_single"))&""
else
qrs("log_4") = Session("p_other_name")&"於"&now&"將本筆資料[活動]發送給 "&rs("all_branch")&"-"&SingleName(rs("all_single"))&""
end if
qrs("log_5") = "lovekeyin"
qrs.update
qrs.close
	
	rs.update
	rs.movenext
	Wend
	End if	
	rs.close

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>春天會館</title>
</head>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/util.js"></script>

<body leftmargin="0" topmargin="0">
    <form action="?st=add" method="post" name="form1">
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
                                            <select name="pay1" id="pay1">
                                                <option value="">請選擇</option>
                                                <option value="">"&ab&"</option>
                                                <option value=""></option>
                                            </select>
                                            　約見人：
                                            <select name="pay2" id="pay2">
                                                <option value="">請選擇</option>
                                            </select>
                                        </p>

                                        <p><label><input type="checkbox" name="changelog" id="changelog" value="1">同時轉移回報記錄</label></p>
                                    </div>

                                </td>
                            </tr>
                            <tr bgcolor="#FFF0E1">
                                <td colspan="2" bgcolor="#336699">
                                    <div align="center">
                                        <input name="Submit" type="submit" id="Submit2" value="確定送出">
                                        <input name="k_id" type="hidden" id="k_id" value="">
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

<script language="JavaScript">
    <!--
    $(function() {
        <
        %
        if rs("all_branch") < > ""
        then % >
            $("#pay1").val("<%=rs("
                all_branch ")%>");
        personnel_get("pay1", "pay2", "<%=rs("
            all_single ")%>");

        $("#pay1").on("change", function() {
            personnel_get_send("pay1", "pay2");
        });
    });
    -->
</script>