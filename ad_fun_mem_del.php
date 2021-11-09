<?php

    /*****************************************/
    //檔案名稱：ad_fun_mem_del.php
    //後台對應位置：好好玩管理系統/會員管理系統>操作(刪除)
    //改版日期：2021.11.8
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    $sql = "DELETE FROM member_data WHERE mem_auto = " .$_REQUEST["mem_auto"];
    $rs = $FunConn->prepare($sql);
    $rs->execute();
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>後台管理系統</title>
</head>

<body leftmargin="0" topmargin="0" onLoad="closeWin('500')">
    <table width="300" height="200" border="0" align="center">
        <tr>
            <td>
                <div align="center">
                    <img src="img/delete.gif" width="36" height="36" align="absbottom">
                    <font color="#FF0000">資料刪除中......</font>
                </div>
            </td>
        </tr>
    </table>

    <script language="JavaScript" type="text/JavaScript">
        window.opener.location.reload();   
        function closeWin(thetime) {
            setTimeout("window.close()", thetime);
        }
    </script>
</body>

</html>