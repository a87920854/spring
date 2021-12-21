<?php 
    /*****************************************/
    //檔案名稱：ad_b2b_apply_list_fix.php
    //後台對應位置：好好玩管理系統/同業報名單管理>修改
    //改版日期：2021.12.21
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    if($_REQUEST["state"] == "add"){
        $SQL = "UPDATE love_keyin2 SET 
                t11 = ".SqlFilter($_REQUEST["t11"],"tab").",  
                t12 = ".SqlFilter($_REQUEST["t12"],"tab").", 
                t13 = ".SqlFilter($_REQUEST["t13"],"tab")."
                Where k_id in (".SqlFilter($_REQUEST["kid"],"int").")";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php");
        }
    }

    // $SQL = "select * from love_keyin2 where k_id=".SqlFilter($_REQUEST["kid"],"int");
    // $rs = $FunConn->prepare($SQL);
    // $rs->execute();
    // $result = $rs->fetch(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>好好玩旅行社</title>
    <STYLE TYPE="text/css">
        body,
        th,
        td,
        input,
        select,
        textarea,
        select,
        checkbox {
            font: 10pt 新細明體
        }

        a:link {
            font: 10pt "新細明";
            text-decoration: underline;
            color: none
        }

        a:visited {
            font: 10pt "新細明";
            text-decoration: underline;
            color: 000099
        }

        a:active {
            font: 10pt "新細明";
            text-decoration: underline;
            color: 00CC66
        }

        a:hover {
            font: 10pt 新細明;
            text-decoration: underline;
            color: ff0000
        }
    </STYLE>
</head>

<body leftmargin="0" topmargin="0">
    <form action="?state=add" method="post" name="form1">
        <table width="350" border="0" align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>好好玩旅行社資料</legend>
                        <table width="340" border="0" align="center" cellpadding="3">
                            <tr bgcolor="#FFF0E1">
                                <td colspan="2" bgcolor="#336699">&nbsp;</td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td height="100" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                    類別/狀態：<input type="text" name="t11" size=20>
                                    <br>
                                    收訂期限：<input type="text" name="t12" size=20>
                                    <br>
                                    已收金額：<input type="text" name="t13" size=20>
                                </td>
                            </tr>
                            <tr bgcolor="#FFF0E1">
                                <td colspan="2" bgcolor="#336699">
                                    <div align="center">
                                        <input name="Submit" type="submit" id="Submit2" style="font-size: 9pt" value="確定送出">
                                        <input name="kid" type="hidden" id="kid" value="<?php echo SqlFilter($_REQUEST["kid"],"int"); ?>">
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