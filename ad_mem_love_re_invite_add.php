<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>春天會館</title>
    <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="js/util.js"></script>

    <link href="assets/css/inputcss.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0">
    <table width="660" border="0" align="center">
        <tr>
            <td>
                <fieldset>
                    <legend>春天會館資料 - 預定排約</legend>
                    <table width="650" border="0" align="center" cellpadding="3">
                        <tr bgcolor="#FFF0E1">
                            <td bgcolor="#336699" colspan=2 align="center" height=20></td>
                        </tr>

                        <tr>
                            <td bgcolor="#F0F0F0" colspan=2>
                                <form style="margin:0px;" action="?st=read" method="post" id="form1" onSubmit="return chk_form1()">預訂排約人編號/手機/身： <input name="keyword1" type="text" id="keyword1" value="" size="10"> 預訂排約對象編號/手機/身： <input name="keyword2" type="text" id="keyword2" value="" size="10"> <input type="submit" value="讀取資料"></form>
                            </td>
                        </tr>

                        <tr>
                            <td bgcolor="#F0F0F0" width="50%">↓↓↓<font color=blue>預訂排約人</font>↓↓↓</td>
                            <td bgcolor="#F0F0F0" width="50%">↓↓↓<font color=red>預訂排約對象</font>↓↓↓</td>
                        </tr>
                        <form action="?st=add" method="post" id="form2" onSubmit="return chk_form()">
                            <tr>
                                <td bgcolor="#F0F0F0" width="50%">姓名： <input name="n1" type="text" id="n1" value="" size="15">　性別： <select name="n2" id="n2">
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select><br>身分證： <input name="n0" id="n0" type=text" value="" size=10> 會館： <input type=text" value="" size=5 disabled><input name="n1b" type="hidden" id="n1b" value=""></td>
                                <td bgcolor="#F0F0F0" width="50%">姓名： <input name="v1" type="text" id="v1" value="" size="15">　性別： <select name="v2" id="v2">
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select><br>身分證： <input name="v0" id="v0" type=text" value="" size=15> 會館： <input type=text" value="" size=5 disabled><input name="v1b" type="hidden" id="v1b" value=""></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0">年次： <input name="n3" type="text" id="n3" value="" size="15">　學歷： <select name="n4" id="n4">
                                        <option value="國中">國中</option>
                                        <option value="高中">高中</option>
                                        <option value="高職">高職</option>
                                        <option value="專科">專科</option>
                                        <option value="大學">大學</option>
                                        <option value="碩士">碩士</option>
                                        <option value="博士">博士</option>
                                        <option value="其他">其他</option>
                                    </select></td>
                                <td bgcolor="#F0F0F0">年次： <input name="v3" type="text" id="v3" value="" size="15">　學歷： <select name="v4" id="v4">
                                        <option value="國中">國中</option>
                                        <option value="高中">高中</option>
                                        <option value="高職">高職</option>
                                        <option value="專科">專科</option>
                                        <option value="大學">大學</option>
                                        <option value="碩士">碩士</option>
                                        <option value="博士">博士</option>
                                        <option value="其他">其他</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0">身高： <input name="n5" type="text" id="n5" value="" size="10">　體重： <input name="n6" type="text" id="n6" value="" size="10"></td>
                                <td bgcolor="#F0F0F0">身高： <input name="v5" type="text" id="v5" value="" size="10">　體重： <input name="v6" type="text" id="v6" value="" size="10"></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0">工作情形： <input name="n7" type="text" id="n7" value="" size="20"></td>
                                <td bgcolor="#F0F0F0">工作情形： <input name="v7" type="text" id="v7" value="" size="20"></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0">手機： <input name="n10" type="text" id="n10" value="" size="20"></td>
                                <td bgcolor="#F0F0F0">手機： <input name="v10" type="text" id="v10" value="" size="20"></td>
                            </tr>

                            <tr>
                                <td bgcolor="#F0F0F0">應收茶水費：
                                    <select name="n8" id="n8">
                                        <option value="茶卷">茶卷</option>
                                        <option value="現金">現金</option>
                                        <option value="刷卡">刷卡</option>
                                        <option value="轉帳">轉帳</option>
                                    </select>
                                    <input name="n9" type="number" id="n9" size="10" style="width:40%"> 元/
                                    <br>
                                    <select name="n8_1" id="n8_1">
                                        <option value="茶卷">茶卷</option>
                                        <option value="現金">現金</option>
                                        <option value="刷卡">刷卡</option>
                                        <option value="轉帳">轉帳</option>
                                    </select>
                                    <input name="n9_1" type="number" id="n9_1" size="10" style="width:40%"> 元(無免填)
                                </td>
                                <td bgcolor="#F0F0F0">應收茶水費：
                                    <select name="v8" id="v8">
                                        <option value="茶卷">茶卷</option>
                                        <option value="現金">現金</option>
                                        <option value="刷卡">刷卡</option>
                                        <option value="轉帳">轉帳</option>
                                    </select>
                                    <input name="v9" type="number" id="v9" size="10" style="width:40%"> 元/
                                    <br>
                                    <select name="v8_1" id="v8_1">
                                        <option value="茶卷">茶卷</option>
                                        <option value="現金">現金</option>
                                        <option value="刷卡">刷卡</option>
                                        <option value="轉帳">轉帳</option>
                                    </select>
                                    <input name="v9_1" type="number" id="v9_1" size="10" style="width:40%"> 元(無免填)
                                </td>
                            </tr>


                            <tr>
                                <td bgcolor="#F0F0F0" colspan=2>預訂時間：
                                    <select name="n11y" id="n11y">
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2020">2020</option>
                                    </select> 年
                                    <select name="n11m" id="n11m">
                                        <option value="10">10</option>
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
                                    </select> 年
                                    <select name="n11d" id="n11d">
                                        <option value="19">19</option>
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
                                    </select> 日
                                    <select name="n11h" id="n11h">
                                        <option value="">請選擇</option>
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
                                    </select>
                                    時 <select name="n11mm" id="n11mm">
                                        <option value="00">00</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>
                                    </select> 分至
                                    <select name="lovebranch" id="lovebranch" onchange="checklovebranch(this.options[this.selectedIndex].value)">
                                        <option value="">排約會館</option>
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
                                    </select>
                                    排約。
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0" colspan=2>
                                    <span id="loveareaspan" style="display:none;">
                                        約會地點：<input name="lovearea" type="text" id="lovearea" value="" size="15">
                                    </span>
                                    類型：<select name="types">
                                        <option value="member">一般排約</option>
                                        <option value="line">Line排約</option>
                                        <option value="singleparty">約會專家</option>
                                        <option value="tv">視訊排約</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0">
                                    <font color=blue>排約人</font>秘書：
                                    <select name="branch" id="branch" autocomplete="off">
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
                                    </select><select name="single" id="single">
                                        <option value="">請選擇</option>
                                    </select>
                                </td>
                                <td bgcolor="#F0F0F0">
                                    <font color=red>排約對象</font>秘書：
                                    <select name="branch2" id="branch2" autocomplete="off">
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
                                    </select><select name="single2" id="single2">
                                        <option value="">請選擇</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0">
                                    <font color=blue>排約人</font>接待注意事項及備註：<br> <textarea name="n12" id="n12" style="width:95%" rows=3></textarea>
                                </td>
                                <td bgcolor="#F0F0F0">
                                    <font color=red>排約對象</font>接待注意事項及備註：<br> <textarea name="v12" id="v12" style="width:95%" rows=3></textarea>
                                </td>
                            </tr>

                            <tr bgcolor="#FFF0E1">
                                <td bgcolor="#336699" colspan=2 align="center">
                                    <input name="ran" type="hidden" id="ran" value="">
                                    <input name="sii" type="hidden" id="sii" value="">
                                    <input name="istats" type="hidden" id="istats" value="">
                                    <input name="mem_num1" type="hidden" id="mem_num1" value="">
                                    <input name="mem_num2" type="hidden" id="mem_num2" value="">
                                    <input name="Submit" type="submit" id="Submit2" value="確定送出">
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
    function chk_form1() {
        if (!$("#keyword1").val() && !$("#keyword2").val()) {
            alert("請輸入要讀取資料的編號或手機。");
            $("#keyword1").focus();
            return false;
        }
        return true;
    }

    function chk_form() {
        var $allc = {
                "branch": "排約人會館",
                "single": "排約人秘書",
                "branch2": "排約對象會館",
                "single2": "排約對象秘書",
                "n0": "排約人身分證",
                "v0": "排約對象身分證",
                "n1": "排約人姓名",
                "v1": "排約對象姓名",
                "n3": "排約人年次",
                "v3": "排約對象年次",
                "n4": "排約人學歷",
                "v4": "排約對象學歷",
                "n10": "排約人手機",
                "v10": "排約對象手機",
                "n11h": "小時",
                "lovebranch": "排約會館"
            },
            $allc2 = {
                "n3": "排約人年次",
                "v3": "年次2",
                "n5": "排約人身高",
                "v5": "排約對象身高",
                "n6": "排約人體重",
                "v6": "排約對象體重",
                "n10": "排約人手機",
                "v10": "排約對象手機",
                "n9": "排約人應收茶水費",
                "v9": "排約對象應收茶水費",
                "n11h": "小時"
            },
            $rr = 0;
        $.each($allc, function(v, k) {
            if (!$("#" + v).val()) {
                alert("請輸入或選擇" + k + "。");
                $("#" + v).focus();
                $rr = 1;
                return false;
            }
        });
        $.each($allc2, function(v, k) {
            var $re = /^\d+$/;
            if ($("#" + v).val() && !$re.test($("#" + v).val())) {
                alert(k + "只能輸入數字。");
                $("#" + v).focus();
                $rr = 1;
                return false;
            }
        });


        if ($rr) return false;
        else return true;
    }

    $(function() {
        window.resizeTo(760, 800);

        personnel_get("branch", "single", "JACK0906");
        personnel_get("branch2", "single2", "JACK0906");

        $("select").each(function() {
            $(this).get(0).selectedIndex = 0;
        });

        $("#branch").on("change", function() {
            personnel_get("branch", "single");
        });
        $("#branch2").on("change", function() {
            personnel_get("branch2", "single2");
        });

        $("#single").on("change", function() {

            if (!$("#branch2").val()) {
                $("#branch2").val($("#branch").val()).trigger("change");

                setTimeout(function() {
                    $("#single2").val($("#single").val());
                }, 50);

            }

        });
        checklovebranch($("#lovebranch").val());
    });

    function checklovebranch(v) {
        if (v == "迷你約") {
            $("#loveareaspan").show();
        } else {
            $("#loveareaspan").hide();
        }
    }
</script>