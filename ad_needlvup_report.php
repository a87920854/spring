

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>春天會館</title>
</head>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<body leftmargin="0" topmargin="0">
<form action="?state=add" method="post" name="form1" onsubmit="return chk_form()">
  <table width="350" border="0" align="center">
    <tr> 
      <td><fieldset>
        <legend>春天會館資料</legend>
        <table width="340" border="0" align="center" cellpadding="3">
          <tr bgcolor="#FFF0E1"> 
            <td colspan="2" bgcolor="#336699">&nbsp;</td>
          </tr>
          <tr bgcolor="#F0F0F0"> 
            <td height="100" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all"><div align="left"> 
                <p><font color="#990066" size="3">請輸入處理結果</font></p>
                <p><input type="text" style="width:90%" name="msg" id="msg"></p>
              </td>
          </tr>
          <tr bgcolor="#FFF0E1"> 
            <td colspan="2" bgcolor="#DA5893"> 
              <div align="center"> 
                <input name="Submit" type="submit" id="Submit2" style="font-size: 9pt" value="確定送出">
                <input name="a" type="hidden" id="a" value="2565">
                <input name="k_id" type="hidden" id="k_id" value="1114394">
                <input name="lu" type="hidden" id="lu" value="E123436754">
                <input name="log_username" type="hidden" id="log_username" value="鄭宇廷">
                <input name="log_branch" type="hidden" id="log_branch" value="台南">
                <input name="k_mobile" type="hidden" id="k_mobile" value="0958019868">
                <input name="web_level" type="hidden" id="web_level" value="3">
              </div></td>
          </tr>
        </table>
        </fieldset></td>
    </tr>
  </table>
</form>
</body>
</html>
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
