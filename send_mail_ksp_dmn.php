<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>DateMeNow</title>
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
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/util.js"></script>

<body leftmargin="0" topmargin="0">
    <form action="send_mail_ksp_dmn.asp?state=send" method="post" name="form1">
        <table width="650" border="0" align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>DateMeNow開發信</legend>
                        <table width="600" border="0" align="center" cellpadding="3">
                            <tr bgcolor="#FFF0E1">
                                <td colspan="5" bgcolor="#336699">
                                    <font color="white" size="3">請選擇樣式</font>
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td height="100" bgcolor="#F0F0F0">
                                    <label>
                                        <div><input type="radio" name="sendtype" value="1" checked>1</div>
                                        <div><img style="" display:block; float:left;"" src="https://www.datemenow.com.tw/images/kedm/edm_1.jpg" border=0 width=200></div>
                                    </label>
                                </td>
                                <td height="100" bgcolor="#F0F0F0">
                                    <label>
                                        <div><input type="radio" name="sendtype" value="2">2</div>
                                        <div><img style="" display:block; float:left;"" src="https://www.datemenow.com.tw/images/kedm/edm_2.jpg" border=0 width=200></div>
                                    </label>
                                </td>
                                <td height="100" bgcolor="#F0F0F0">
                                    <label>
                                        <div><input type="radio" name="sendtype" value="3">3</div>
                                        <div><img style="" display:block; float:left;"" src="https://www.datemenow.com.tw/images/kedm/edm_3.jpg" border=0 width=200></div>
                                    </label>
                                </td>
                                <td height="100" bgcolor="#F0F0F0">
                                    <label>
                                        <div><input type="radio" name="sendtype" value="99">4</div>
                                        <div><img style="" display:block; float:left;"" src="https://www.singleparty.com.tw/edm/20190501/sample.jpg" border=0 width=200></div>
                                    </label>
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td height="100" bgcolor="#F0F0F0">
                                    <label>
                                        <div><input type="radio" name="sendtype" value="6">6</div>
                                        <div><img style="" display:block; float:left;"" src="https://www.datemenow.com.tw/images/kedm/edm_6.jpg" border=0 width=200></div>
                                    </label>
                                </td>
                                <td height="100" bgcolor="#F0F0F0">
                                    <label>
                                        <div><input type="radio" name="sendtype" value="7">7</div>
                                        <div><img style="" display:block; float:left;"" src="https://www.datemenow.com.tw/images/kedm/edm_7.jpg" border=0 width=200></div>
                                    </label>
                                </td>

                            </tr>
                            <tr bgcolor="#FFF0E1">
                                <td colspan="5" bgcolor="#336699">
                                    <div align="center">
                                        <input name="mem_mail" type="hidden" id="mem_mail" value="jghyt0210@gmail.com">
                                        <input name="mem_auto" type="hidden" id="mem_auto" value="1984634">
                                        <input name="Submit" type="submit" id="Submit2" style="font-size: 9pt" value="確定送出">
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