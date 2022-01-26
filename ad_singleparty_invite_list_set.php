<?php
require_once("_inc.php");
require_once("./include/_function.php");

?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>約會專家</title>
    <style type="text/css">
        table td {
            font-size: 12px;
        }
    </style>
    <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="js/util.js"></script>
</head>

<body leftmargin="0" topmargin="0">
    <table width="660" border="0" align="center">
        <tr>
            <td>
                <fieldset>
                    <legend>約會專家 - 轉入會館排約預訂表</legend>
                    <table width="650" border="0" align="center" cellpadding="3">
                        <tr bgcolor="#FFF0E1">
                            <td bgcolor="#336699" colspan=2 align="center" height=20></td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" colspan=2>
                                <form style="margin:0px;" action="?st=read" method="post" id="form1" onSubmit="return chk_form1()">預訂排約人編號或手機： <input name="keyword1" type="text" id="keyword1" value="<%=keyword1%>" size="10"> 預訂排約對象編號或手機： <input name="keyword2" type="text" id="keyword2" value="<%=keyword2%>" size="10"> <input type="hidden" name="a" value="<%=request("a")%>"><input type="submit" value="讀取資料"></form>
                            </td>
                        </tr>
                        <%if request("st") = "read" then%>
                        <tr>
                            <td bgcolor="#F0F0F0" colspan=2 style="color:red">請確定排約人必須在左邊，排約對象必須在右邊，如資料相反請<a href="?st=read&keyword1=<%=keyword2%>&keyword2=<%=keyword1%>&a=<%=request("a")%>">點此交換</a></td>
                        </tr>
                        <%end if%>
                        <tr>
                            <td bgcolor="#F0F0F0" width="50%">↓↓↓預訂排約人↓↓↓</td>
                            <td bgcolor="#F0F0F0" width="50%">↓↓↓預訂排約對象↓↓↓</td>
                        </tr>
                        <form action="?st=add" method="post" id="form2" onSubmit="return chk_form()">
                            <tr>
                                <td bgcolor="#F0F0F0" width="50%">姓名： <input name="n1" type="text" id="n1" value="<%=n1%>" size="15">　性別： <select name="n2" id="n2">
                                        <option value="男" <%If n2 = "男" Then Response.write " selected" End if%>>男</option>
                                        <option value="女" <%If n2 = "女" Then Response.write " selected" End if%>>女</option>
                                    </select><br>身分證： <input name="n0" id="n0" type=text" value="<%=n0%>" size=10> 會館： <input type=text" value="<%=n1b%>" size=5 disabled><input name="n1b" type="hidden" id="n1b" value="<%=n1b%>"></td>
                                <td bgcolor="#F0F0F0" width="50%">姓名： <input name="v1" type="text" id="v1" value="<%=v1%>" size="15">　性別： <select name="v2" id="v2">
                                        <option value="男" <%If v2 = "男" Then Response.write " selected" End if%>>男</option>
                                        <option value="女" <%If v2 = "女" Then Response.write " selected" End if%>>女</option>
                                    </select><br>身分證： <input name="v0" id="v0" type=text" value="<%=v0%>" size=15> 會館： <input type=text" value="<%=v1b%>" size=5 disabled><input name="v1b" type="hidden" id="v1b" value="<%=v1b%>"></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0">年次： <input name="n3" type="text" id="n3" value="<%=n3%>" size="15">　學歷： <select name="n4" id="n4">
                                        <option value="國中" <%If n4 = "國中" Then Response.write " selected" End if%>>國中</option>
                                        <option value="高中" <%If n4 = "高中" Then Response.write " selected" End if%>>高中</option>
                                        <option value="高職" <%If n4 = "高職" Then Response.write " selected" End if%>>高職</option>
                                        <option value="專科" <%If n4 = "專科" Then Response.write " selected" End if%>>專科</option>
                                        <option value="大學" <%If n4 = "大學" Then Response.write " selected" End if%>>大學</option>
                                        <option value="碩士" <%If n4 = "碩士" Then Response.write " selected" End if%>>碩士</option>
                                        <option value="博士" <%If n4 = "博士" Then Response.write " selected" End if%>>博士</option>
                                        <option value="其他" <%If n4 = "其他" Then Response.write " selected" End if%>>其他</option>
                                    </select></td>
                                <td bgcolor="#F0F0F0">年次： <input name="v3" type="text" id="v3" value="<%=v3%>" size="15">　學歷： <select name="v4" id="v4">
                                        <option value="國中" <%If v4 = "國中" Then Response.write " selected" End if%>>國中</option>
                                        <option value="高中" <%If v4 = "高中" Then Response.write " selected" End if%>>高中</option>
                                        <option value="高職" <%If v4 = "高職" Then Response.write " selected" End if%>>高職</option>
                                        <option value="專科" <%If v4 = "專科" Then Response.write " selected" End if%>>專科</option>
                                        <option value="大學" <%If v4 = "大學" Then Response.write " selected" End if%>>大學</option>
                                        <option value="碩士" <%If v4 = "碩士" Then Response.write " selected" End if%>>碩士</option>
                                        <option value="博士" <%If v4 = "博士" Then Response.write " selected" End if%>>博士</option>
                                        <option value="其他" <%If v4 = "其他" Then Response.write " selected" End if%>>其他</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0">身高： <input name="n5" type="text" id="n5" value="<%=n5%>" size="10">　體重： <input name="n6" type="text" id="n6" value="<%=n6%>" size="10"></td>
                                <td bgcolor="#F0F0F0">身高： <input name="v5" type="text" id="v5" value="<%=v5%>" size="10">　體重： <input name="v6" type="text" id="v6" value="<%=v6%>" size="10"></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0">工作情形： <input name="n7" type="text" id="n7" value="<%=n7%>" size="20"></td>
                                <td bgcolor="#F0F0F0">工作情形： <input name="v7" type="text" id="v7" value="<%=v7%>" size="20"></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0">手機： <input name="n10" type="text" id="n10" value="<%=n10%>" size="20"></td>
                                <td bgcolor="#F0F0F0">手機： <input name="v10" type="text" id="v10" value="<%=v10%>" size="20"></td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0" colspan=2>預訂時間：
                                    <%
            	if datetime_real <> "" and isdate(datetime_real) then
            		dry = year(datetime_real)
            		drm = month(datetime_real)
            		drd = day(datetime_real)
            		drh = hour(datetime_real)            		
            	end if
            	%>
                                    <select name="n11y" id="n11y">
                                        <%
			For i = year(date) To year(date)+2
			if dry = i then
      Response.write "<option value="""&i&""" selected>"&i&"</option>"
      else
      Response.write "<option value="""&i&""">"&i&"</option>"
      end if
			Next
			Response.write "<option value="""&year(date)-1&""">"&year(date)-1&"</option>"
			%>
                                    </select> 年
                                    <select name="n11m" id="n11m">
                                        <%
			Response.write "<option value="""&month(date)&""">"&month(date)&"</option>"
			For i = 1 To 12
			if drm = i then
      Response.write "<option value="""&i&""" selected>"&i&"</option>"
      else
      Response.write "<option value="""&i&""">"&i&"</option>"
      end if
			Next
			%>
                                    </select> 年
                                    <select name="n11d" id="n11d">
                                        <%
			For i = 1 To 31
			if drd = i then
      Response.write "<option value="""&i&""" selected>"&i&"</option>"
      else
      Response.write "<option value="""&i&""">"&i&"</option>"
      end if

			Next
			%>
                                    </select> 日
                                    <select name="n11h" id="n11h">
                                        <option value="">請選擇</option>
                                        <%
				For i = 10 To 22
				if drh = i then
				response.write "<option value="""&i&""" selected>"&i&"</option>"
				else
				Response.write "<option value="""&i&""">"&i&"</option>"
			  end if
				Next
				%>
                                    </select> 時 <select name="n11mm" id="n11mm">
                                        <option value="00">00</option>
                                    </select> 分至 <%=datebranch%> 排約。
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0" colspan=2>
                                    排約人秘書：
                                    <select name="branch" id="branch" autocomplete="off">
                                        <option value="">請選擇</option>
                                        <%
			  If ran <> "" Then
			      Response.write "<option value="""&rbranch&""" selected>"&rbranch&"</option>"
			  Else

			  If session("branch") <> "" Then
          If Session("MM_UserAuthorization") = "admin" then
         For each ab in all_branchs("好好玩旅行社")
           Response.write "<option value="""&ab&""">"&ab&"</option>"
				 next
				  else
					   Response.write "<option value="""&session("branch")&""">"&session("branch")&"</option>"
				  end if
			  Else
			  Response.write "<option value="""" selected>請選擇</option>"
        End if
			  End if
				%>
                                    </select><select name="single" id="single">
                                        <%
			  If ran <> "" Then
			  Response.write "<option value="""&rsingle&""">"&SingleName(rsingle)&"</option>"
			  Else
			  Response.write "<option value="""">請選擇</option>"
			  End if
			  %>
                                    </select>　類型：<select name="types">
                                        <option value="singleparty" <%If types = "singleparty" Then Response.write " selected" End if%>>約會專家</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0" colspan=2>
                                    排約對象秘書：
                                    <select name="branch2" id="branch2" autocomplete="off">
                                        <option value="">請選擇</option>
                                        <%
			  If ran <> "" Then
			      Response.write "<option value="""&rbranch2&""" selected>"&rbranch2&"</option>"
			  Else

			  If session("branch") <> "" Then
          If Session("MM_UserAuthorization") = "admin" then
         For each ab in all_branchs("好好玩旅行社")
           Response.write "<option value="""&ab&""">"&ab&"</option>"
				 next
				  else
					   Response.write "<option value="""&session("branch")&""">"&session("branch")&"</option>"
				  end if
			  Else
			  Response.write "<option value="""" selected>請選擇</option>"
        End if
			  End if
				%>
                                    </select><select name="single2" id="single2">
                                        <%
			  If ran <> "" and rsingle2 <> "" Then
			  Response.write "<option value="""&rsingle2&""">"&SingleName(rsingle2)&"</option>"
			  Else
			  Response.write "<option value="""">請選擇</option>"
			  End if
			  %>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#F0F0F0" colspan=2>接待注意事項及備註：<br> <textarea name="n12" id="n12" style="width:95%" rows=3><%=n12%></textarea></td>
                            </tr>


                            <tr bgcolor="#FFF0E1">
                                <td bgcolor="#336699" colspan=2 align="center">
                                    <input name="mem_num1" type="hidden" id="mem_num1" value="<%=mem_num1%>">
                                    <input name="mem_num2" type="hidden" id="mem_num2" value="<%=mem_num2%>">
                                    <input name="invitea" type="hidden" id="invitea" value="<%=request("a")%>">
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
                "n11h": "小時"
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
        window.resizeTo(720, 600); <
        % If ran < > ""
        Then % >
            personnel_get("branch", "single", "<%=rsingle%>"); <
        %
        if rsingle2 < > ""
        then % >
            personnel_get("branch2", "single2", "<%=rsingle2%>"); <
        %
        else % >
            personnel_get("branch2", "single2"); <
        % end
        if % >
        <
        %
        else % >
            personnel_get("branch", "single", "<%=Session("
                MM_Username ")%>");
        personnel_get("branch2", "single2", "<%=Session("
            MM_Username ")%>"); <
        % end
        if % >
        <
        %
        if request("st") = "read"
        then % >
            <
            %
            if n2 < > ""
        then % >
            $("#n2").val("<%=n2%>"); <
        % end
        if % >
        <
        %
        if n4 < > ""
        then % >
            $("#n4").val("<%=n4%>"); <
        % end
        if % >
        <
        %
        if n8 < > ""
        then % >
            $("#n8").val("<%=n8%>"); <
        % end
        if % >
        <
        %
        if v2 < > ""
        then % >
            $("#v2").val("<%=v2%>"); <
        % end
        if % >
        <
        %
        if v4 < > ""
        then % >
            $("#v4").val("<%=v4%>"); <
        % end
        if % >
        <
        %
        if v8 < > ""
        then % >
            $("#v8").val("<%=v8%>"); <
        % end
        if % >
        <
        %
        else % >
            $("select").each(function() {
                $(this).get(0).selectedIndex = 0;
            }); <
        % end
        if % >
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
    });
</script>