<?php

    /*****************************************/
    //檔案名稱：ad_fun_gmem_del.php
    //後台對應位置：好好玩管理系統/金卡俱樂部(舊)>操作(刪除)
    //改版日期：2021.12.1
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    $sql = "DELETE FROM goldcard_data WHERE mem_auto = " .SqlFilter($_REQUEST["mem_auto"],"int");
    $rs = $FunConn->prepare($sql);
    $rs->execute();
    $sql2 = "DELETE FROM goldcard_point WHERE mem_num = " .SqlFilter($_REQUEST["mem_num"],"int");
    $rs = $FunConn->prepare($sql2);
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