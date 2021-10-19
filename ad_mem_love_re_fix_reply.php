<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="js/jquery-1.8.3.js"></script>
    <title>春天會館</title>
    <style type="text/css">
        table td {
            font-size: 12px;
        }
    </style>
</head>

<body leftmargin="0" topmargin="0">

    <form action="?st=add" method="post" name="form1" onsubmit="return chk_form()">
        <table width="460" border="0" align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>春天會館資料</legend>
                        <table width="460" border="0" align="center" cellpadding="3">
                            <tr bgcolor="#FFF0E1">
                                <td bgcolor="#336699">
                                    <div align="center"><strong>
                                            <font color="#FFFFFF" size="3">約後關懷</font>
                                        </strong></div>
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td bgcolor="#F0F0F0" style="word-break:break-all">
                                    <font size="2">排約人身分證：T121428596
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td bgcolor="#F0F0F0" style="word-break:break-all">
                                    <font size="2">排約對象身分證：T225534293
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td bgcolor="#F0F0F0" style="word-break:break-all">關懷內容：<input type="text" name="reply" id="reply" style="width:70%" value=""></td>
                            </tr>
                            <tr bgcolor="#FFF0E1">
                                <td bgcolor="#336699">
                                    <div align="center">
                                        <input name="Submit" type="submit" id="Submit2" style="font-size: 9pt" value="確定送出">
                                        <input name="love_auto" type="hidden" id="love_auto" value="262641">
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
    function chk_form() {
        if (!$("#reply").val()) {
            alert("請輸入回報內容。");
            $("#reply").focus();
            return false;
        }
        return true;
    }
</script>