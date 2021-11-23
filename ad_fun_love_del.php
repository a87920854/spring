<?php

    /*****************************************/
    //檔案名稱：ad_fun_love_del.php
    //後台對應位置：好好玩管理系統/好好玩國內報名>功能(刪除)
    //改版日期：2021.11.23
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }

    $SQL = "SELECT * FROM love_keyin WHERE k_id ='" . SqlFilter($_REQUEST["k_id"],"int") . "'";    
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    
    if($result){
        // 刪除本地照片檔案
        $urlpath = "funtour_image\\joinf\\";
        if($result["p1"] != ""){
            DelFile($urlpath . $result["p1"]);
        }
        if($result["p5"] != ""){
            DelFile($urlpath . $result["p2"]);
        }
        if($result["p3"] != ""){
            DelFile($urlpath . $result["p3"]);
        }

        // 刪除本筆資料
        $SQL = "DELETE FROM love_keyin WHERE k_id ='" . $_REQUEST["k_id"] . "'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }
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
                <div align="center"><img src="img/delete.gif" width="36" height="36" align="absbottom">
                    <font color="#FF0000">資料刪除中......</font>
                </div>
            </td>
        </tr>
    </table>

<script language="JavaScript" type="text/JavaScript">
    function closeWin(thetime) {
        setTimeout("window.close()", thetime);
    }
</script>
<script language="JavaScript" type="text/JavaScript">
        window.opener.location.reload();
</script>
</body>

</html>