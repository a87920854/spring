<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>SD CRM - 會員簡訊服務系統</title>
</head>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/util.js"></script>
<script type="text/javascript" src="js/jquery.maxlength.js?v=1.1"></script>
<STYLE TYPE="text/css">
  body,th,td,input,select,textarea,select,checkbox {font:10pt 新細明體}
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

<body leftmargin="0" topmargin="0">
    <form action="?state=send" method="post" name="form1" onsubmit="return chk_form()">
        <table width="650" border="0" align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>會員簡訊服務系統</legend>
                        <table width="600" border="0" align="center" cellpadding="3">
                            <tr>
                                <td>
                                    <textarea id="sms_note" name="sms_note" style="width:100%;height:160px;" placeholder="請輸入簡訊內容"></textarea>
                                    <br>
                                    <select id="sms_select" name="sms_select" style="width:100%;height:30px;">
                                        <option value="">快選簡訊</option>
                                        <option value="感謝您加入春天會館會員，您的活動秘書為詹明錡，即日起我們將竭誠的為你服務，並預祝你單身而來牽手而回 (簡訊請勿回傳">1. 感謝您加入春天會館會員，您的活動秘書為詹明錡，即日起我們將竭誠的為你服務，並預祝你單身而來牽手而回 (簡訊請勿回傳</option>
                                        <option value="經過第一次排約後是否緊張又興奮！若有任何排約的想法，請洽詢您的活動秘書詹明錡或電洽春天會館台北(02)2381-1348 (簡訊請勿回傳">2. 經過第一次排約後是否緊張又興奮！若有任何排約的想法，請洽詢您的活動秘書詹明錡或電洽春天會館台北(02)2381-1348 (簡訊請勿回傳</option>
                                        <option value="李銘瑋您好，邀請您參加最新一季聯誼活動，詳情 http://goo.gl/PogJvm 或洽詢您的活動秘書詹明錡 (簡訊請勿回傳">3. 李銘瑋您好，邀請您參加最新一季聯誼活動，詳情 http://goo.gl/PogJvm 或洽詢您的活動秘書詹明錡 (簡訊請勿回傳</option>
                                        <option value="李銘瑋好久不見，我是您的活動秘書詹明錡，最近還好嗎?記得有空時來春天會館找我們(簡訊請勿回傳">4. 李銘瑋好久不見，我是您的活動秘書詹明錡，最近還好嗎?記得有空時來春天會館找我們(簡訊請勿回傳</option>
                                        <option value="李銘瑋您好，多次致電給您未能聯繫上，歡迎您於營業時間來電-春天會館台北(02)2381-1348 或洽詢您的活動秘書詹明錡 (簡訊請勿回傳">5. 李銘瑋您好，多次致電給您未能聯繫上，歡迎您於營業時間來電-春天會館台北(02)2381-1348 或洽詢您的活動秘書詹明錡 (簡訊請勿回傳</option>
                                    </select>
                                </td>
                            </tr>
                            <tr bgcolor="#FFF0E1">
                                <td colspan="4" bgcolor="#336699">
                                    <div align="center">
                                        <input name="mem_num" type="hidden" id="mem_num" value="2077585">
                                        <input name="Submit" type="submit" id="Submit2" style="height:30px;" value="確定送出">
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
<script type="text/javascript">
    $(function() {
        $("#sms_note").maxlength({
            maxCharacters: 70,
            slider: false
        });

        $("#sms_select").on("change", function() {
            $("#sms_note").val($(this).val());
            $("#sms_note").focus().trigger("keyup");
        });
    });

    function chk_form() {
        if (!$("#sms_note").val()) {
            alert("請輸入要發送的簡訊內容。");
            $("#sms_note").focus();
            return false;
        }
        return true;
    }
</script>