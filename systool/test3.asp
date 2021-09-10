<!--#include file="../util_include.asp" -->
<!--#include file="../page_include.asp" -->
<%
Dim SPCon
SPConOpen
singleid = "li2003avon811"
set rs = Server.CreateObject("ADODB.Recordset")  
set qrs = Server.CreateObject("ADODB.Recordset")     
rs.open "select top 500 * from member_data where tt=0 and mem_single='"&singleid&"'", SPCon, 1, 3
if not rs.eof then
while not rs.eof

qrs.open "select top 1 * from log_data", SPCon, 1, 3
qrs.addnew
qrs("log_time") = now
qrs("log_num") = rs("mem_auto")
qrs("log_fid") = rs("mem_username")
qrs("log_username") = rs("mem_name")
qrs("log_name") = "年紀小名單"
qrs("log_branch") = rs("mem_branch")
qrs("log_single") = singleid
qrs("log_1") = rs("mem_mobile")
qrs("log_2") = "年紀太小"
qrs("log_4") = "因轉送 "&rs("mem_branch")&"-年紀小名單 而自動更新狀態為年紀太小"
qrs("log_5") = "member"
qrs.update
qrs.close
rs("tt") = 1
rs("all_type") = "年紀太小"
response.write rs("mem_num")
rs.update
rs.movenext
wend
end if
rs.close

%>