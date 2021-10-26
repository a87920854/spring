<!--#include file="util_include.asp" -->
<%
IF Session("MM_UserAuthorization") <> "admin" Then Call Alert("您沒有權限","ClOsE",0) End IF

Dim SPCon
SPConOpen

set rs = Server.CreateObject("ADODB.Recordset")
rs.open "delete from guest where g_auto="&request("g_auto")&"", SPCon, 1, 3
Set rs=nothing
%>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>後台管理系統</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function closeWin(thetime) {
    setTimeout("window.close()", thetime);
}
//-->
</script>
</head>

<body leftmargin="0" topmargin="0" onLoad="closeWin('500')">
<script language="JavaScript" type="text/JavaScript">
window.opener.location.reload();
</script>
<table width="280" height="180" border="0" align="center">
  <tr>
    <td><div align="center"><img src="img/delete.gif" width="36" height="36" align="absbottom"><font color="#FF0000">資料刪除中......</font></div></td>
  </tr>
</table>
</body>
</html>
