<!--#include file="../util_include.asp" -->
<!--#include file="../page_include.asp" -->
<%
Dim SPCon
SPConOpen
response.charset="utf-8"
set rs = server.CreateObject("ADODB.Recordset")
set qrs = server.CreateObject("ADODB.Recordset")
branch = "高雄"
oldname = "張善絨"
newname = "張善羢"
rs.open "update pay_del set pay_sec='"&newname&"' where pay_sec='"&oldname&"' and pay_branch='"&branch&"'", SPCon, 1, 3
rs.open "update pay_main set pay_sec='"&newname&"' where pay_sec='"&oldname&"' and pay_branch='"&branch&"'", SPCon, 1, 3
rs.open "update pay_single set ps_sec='"&newname&"' where ps_sec='"&oldname&"' and ps_branch='"&branch&"'", SPCon, 1, 3

set rs=nothing


%>
