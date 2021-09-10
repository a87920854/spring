

<style type="text/css">
table td {
font-size:12px;
}
</style>
<html>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/util.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>春天會館</title>
</head>

<body leftmargin="0" topmargin="0">
  <table width="660" border="0" align="center">
    <tr> 
      <td><fieldset>
        <legend>春天會館資料 - 查詢服務成本</legend>
        <form action="?st=add" method="post" id="form2" onSubmit="return chk_form()">		       
        <table width="650" border="0" align="center" cellpadding="3">
          <tr bgcolor="#FFF0E1"> 
            <td bgcolor="#336699" colspan=2 align="center" height=20></td>
          </tr>
          <tr>
          	
            <td bgcolor="#F0F0F0" width="50%" height=80>請輸入要查詢的編號/手機/身分證： <input name="keyword" type="text" id="keyword" value="" size="20">&nbsp;&nbsp;&nbsp;&nbsp;<input name="Submit" type="submit" id="Submit2" value="確定送出"></td>			
          
          </tr>
        </table>
        </form>
        </fieldset></td>
    </tr>
  </table>
</body>
</html>

<script language="JavaScript">
$(function() {
$("#keyword").focus();
});
function chk_form() {
	if(!$("#keyword").val()) {
		alert("請輸入關鍵字。");
		$("#keyword").focus();
		return false;
	}
	return true;
}
</script>