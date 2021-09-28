<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>收支管理系統</title>
</head>

<STYLE TYPE="text/css">
    table {
        font-size: 13px;
    }

    table td {
        height: 30px;
        text-align: center;
    }

    table select {
        height: 30px;
        border: #ddd 1px solid;
        padding-left: 5px;
    }

    table input {
        height: 30px;
        color: #555;
        border: #ddd 1px solid;
        padding-left: 5px;
    }

    .ttable td {
        padding: 3px;
        padding-left: 5px;
        border: 1px solid #69899F;
    }

    .btn {
        height: 33px;
        color: #333;
        background-color: #fff;
        border: #666 1px solid !important;
        display: inline-block;
        padding: 6px 12px !important;
        ;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .btn:hover {
        color: #000;
        background-color: #ddd;
    }
</STYLE>

<body leftmargin="0" topmargin="0">

    <table width="100%" border="1" align="center" bordercolor="#F5BFC4">
        <tr>
            <td bgcolor="#FBE6E8">
                <table width="100%" border="0" cellspacing="0">
                    <tr>
                        <td>
                            <div align="center">
                                <font color="#660066" size="3">八德 - 蔡佩蓁收入區段明細表 - 2021/9/1～2021/9/28（總成績：23787）</font>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="0" align="center">
                    <tr>
                        <td><br><input type="button" class="btn" value="秘書履歷" onclick="window.close();window.opener.location.href='ad_admin_single_view.php?an=1208'">
                            &nbsp;&nbsp;<input type="button" class="btn" value="年度統計表" onclick="location.href='ad_admin_month_list_diff_view.php?an=1208&ny1=2021/9/1&ny2=2021/9/28&mode=year'">
                            &nbsp;&nbsp;<input type="button" class="btn" value="列印本頁" onclick="location.href='ad_admin_month_list_diff_view_print.php?m2w=1&ny2=2021/9/28&ny1=2021/9/1&an=1208'">
                            &nbsp;&nbsp;<input type="button" class="btn" value="回上頁" onclick="window.history.go(-1);">
                            <br>
                            <br>
                            <fieldset>

                                <legend>秘書業績明細</legend>
                                <table width="100%" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FBE6E8">
                                        <td width="50">
                                            <div align="center">編號</div>
                                        </td>
                                        <td width="65">
                                            <div align="center">日期</div>
                                        </td>
                                        <td width="40">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="55">
                                            <div align="center">受理秘書</div>
                                        </td>
                                        <td width="60">
                                            <div align="center">姓名</div>
                                        </td>
                                        <td width="30">
                                            <div align="center">性別</div>
                                        </td>
                                        <td width="120">
                                            <div align="center">摘要及說明</div>
                                        </td>
                                        <td width="50" bgcolor="#D7EBFF">
                                            <div align="center">應收</div>
                                        </td>
                                        <td width="50" bgcolor="#E1FFE1">
                                            <div align="center">實收</div>
                                        </td>
                                        <td width="40" bgcolor="#FFE6FF">
                                            <div align="center">
                                                <font color="#990066">會館</font>
                                            </div>
                                        </td>
                                        <td width="50" bgcolor="#FFE6FF">
                                            <div align="center">秘書</div>
                                        </td>
                                        <td width="50" bgcolor="#FFE6FF">
                                            <div align="center">成本</div>
                                        </td>
                                        <td width="50" bgcolor="#FFE6FF">
                                            <div align="center">業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#FF0000" size="2">244741</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font size="2">
                                                    <font color="#000066">2021/9/5</font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">八德</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">蔡佩蓁</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">李聖培</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">男</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">入會-菁英專案三個月</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">15000</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">15000</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#990066" size="2">八德</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font size="2">
                                                    <font color="#000066">蔡佩蓁</font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font size="2">
                                                    <font color="#000066">0/0</font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="left">
                                                <font size="2">
                                                    <font color="#000066">10185</font>&nbsp;&nbsp;<font color=purple>(67.90%)</font>
                                                </font>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#FF0000" size="2">244689</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font size="2">
                                                    <font color="#000066">2021/9/4</font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">八德</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">杜佳臻</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">張威烈</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">男</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">入會-菁英專案三個月</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">17000</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">17000</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#990066" size="2">八德</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font size="2">
                                                    <font color="#000066">蔡佩蓁</font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font size="2">
                                                    <font color="#000066">0/0</font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="left">
                                                <font size="2">
                                                    <font color="#000066">6800</font>&nbsp;&nbsp;<font color=purple>(40%)</font>
                                                </font>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#FF0000" size="2">244669</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font size="2">
                                                    <font color="#000066">2021/9/3</font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">八德</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">于庭萱</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">謝欣庭</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">女</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">入會-專案</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">33000</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">33000</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#990066" size="2">八德</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font size="2">
                                                    <font color="#000066">蔡佩蓁</font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font size="2">
                                                    <font color="#000066">0/0</font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="left">
                                                <font size="2">
                                                    <font color="#000066">6402</font>&nbsp;&nbsp;<font color=purple>(19.40%)</font>
                                                </font>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#FF0000" size="2">244655</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font size="2">
                                                    <font color="#000066">2021/9/4</font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">新竹</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">陳雅婷</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">彭乙澄</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">男</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">入會-無</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">1000</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">
                                                    <font size="2">
                                                        <font color="#000066">1000</font>
                                                    </font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#990066" size="2">八德</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font size="2">
                                                    <font color="#000066">蔡佩蓁</font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font size="2">
                                                    <font color="#000066">0/0</font>
                                                </font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="left">
                                                <font size="2">
                                                    <font color="#000066">400</font>&nbsp;&nbsp;<font color=purple>(40%)</font>
                                                </font>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#f4f4f4">
                                        <td align="center">合計</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td align="center">66000</td>
                                        <td align="center">66000</td>
                                        <td></td>
                                        <td></td>
                                        <td align="center">0</td>
                                        <td align="center">23787<font color=purple>(36.0%)</font>
                                        </td>
                                    </tr>

                                </table>
                                <br>

                            </fieldset>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </form>
</body>

</html>

<script type="text/javascript">
    window.resizeTo(1000, 800);
</script>