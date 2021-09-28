<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>春天會館</title>
</head>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/util.js"></script>
<link href="assets/css/inputcss.css" rel="stylesheet" type="text/css" />

<body leftmargin="0" topmargin="0">
    <form action="ad_mem_branch_fix.asp?state=add" method="post" name="form1">
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

                                        <p>
                                            <font size="2">會館：
                                                <select name="pay1" id="pay1" style="font-size: 9pt">
                                                    <option value="">請選擇</option>
                                                    <option value="台北">台北</option>
                                                    <option value="桃園">桃園</option>
                                                    <option value="新竹">新竹</option>
                                                    <option value="台中">台中</option>
                                                    <option value="台南">台南</option>
                                                    <option value="高雄">高雄</option>
                                                    <option value="八德">八德</option>
                                                    <option value="約專">約專</option>
                                                    <option value="迷你約">迷你約</option>
                                                    <option value="總管理處">總管理處</option>
                                                    <option value="好好玩旅行社">好好玩旅行社</option>
                                                </select>
                                                　秘書：
                                                <select name="pay2" id="pay2" style="font-size: 9pt">
                                                    <option value="">請選擇</option>
                                                </select>
                                            </font>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr bgcolor="#FFF0E1">
                                <td colspan="2" bgcolor="#DA5893">
                                    <div align="center">
                                        <input name="Submit" type="submit" id="Submit2" style="font-size: 9pt" value="確定送出">
                                        <input name="mem_num" type="hidden" id="mem_num" value="2078498">
                                        <input name="t" type="hidden" id="t" value="mem_single2">
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
    $(function() {

        $("#pay1").val("");
        personnel_get("pay1", "pay2", "");
        if ($("#pay4").length) $("#pay4").val("");

        $("#pay1").on("change", function() {
            personnel_get("pay1", "pay2");
        });

    });
</script>