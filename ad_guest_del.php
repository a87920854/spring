<?php
    error_reporting(0); 
    /*****************************************/
    //檔案名稱：ad_quest.php
    //後台對應位置：名單/發送記錄>客服中心記錄
    //改版日期：2021.10.25
    //改版設計人員：Jack
    //改版程式人員：Queena
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    $auth_limit = 6;
    require_once("./include/_limit.php");

    $SQL_d = "Delete From guest Where g_auto=".SqlFilter($_REQUEST["g_auto"],"int");
    $rs_d = $SPConn->prepare($SQL_d);
    $rs_d->execute();
?>
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
