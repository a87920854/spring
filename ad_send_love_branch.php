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