<style type="text/css">
    table td {
        font-size: 12px;
    }
</style>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>春天會館</title>
    <link href="assets/css/inputcss.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0" style="overflow:auto">
    <form action="?st=add" method="post" id="form1" class="form-inline" onSubmit="return chk_form()">
        <table width="690" border="0" align="center">
            <tr>
                <td>
                    <table width="680" border="0" align="center" cellpadding="3">
                        <tr bgcolor="#FFF0E1">
                            <td bgcolor="#336699">
                                <div align="center"><strong>
                                        <font color="#FFFFFF" size="3">新增工作日誌</font>
                                    </strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0">日期：

                                <select name="ay" id="ay" class="form-control">
                                    <option value="2021" selected>2021</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                                年
                                <select name="am" id="am" class="form-control">
                                    <option value="9" selected>9</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                月
                                <select name="ad" id="ad" class="form-control">
                                    <option value="9" selected>9</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                日　(本項新增後無法修改，請確實選擇本工作項目的開始執行日期)
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0">會館： 總管理處　秘書： JACK</td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0">工作類型： <select name="wtype" id="wtype" class="form-control">
                                    <option value="會館事務">會館事務</option>
                                    <option value="會員服務">會員服務</option>
                                    <option value="廠商開發">廠商開發</option>
                                    <option value="舉辦活動">舉辦活動</option>
                                    <option value="活動推廣">活動推廣</option>
                                    <option value="其他">其他</option>
                                </select>　(請回報需新增的工作類型名稱給工程師)
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0">廠商名稱： <input name="supplier" id="supplier" type="text" value="" style="width:40%;"></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" valign="top">工作內容： <textarea name="title" id="title" style="width:80%;height:100px"></textarea></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0">新增時間： 2021/9/9 上午 11:47:14</td>
                        </tr>
                        <tr bgcolor="#FFF0E1">
                            <td bgcolor="#336699">
                                <div align="center">
                                    <input name="Submit" type="submit" id="Submit2" value="確定送出">
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
    <script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
    <script src="js/util.js?v=1.4"></script>


    <script language="JavaScript">
        function chk_form() {
            window.resizeTo(850, 700);

            if (!$("#ay").val()) {
                alert("請選擇年。");
                $("#ay").focus();
                return false;
            }
            if (!$("#am").val()) {
                alert("請選擇月。");
                $("#am").focus();
                return false;
            }
            if (!$("#ad").val()) {
                alert("請選擇日。");
                $("#ad").focus();
                return false;
            }

            if (!$("#wtype").val()) {
                alert("請選擇工作類型。");
                $("#wtype").focus();
                return false;
            }
            if (!$("#title").val()) {
                alert("請輸入工作項目名稱。");
                $("#title").focus();
                return false;
            }

            return true;
        }
    </script>
</body>

</html>