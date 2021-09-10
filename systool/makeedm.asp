<!--#include file="../util_include.asp" -->
<!--#include file="../page_include.asp" -->
<%
if request("st") = "b" then
rr = request("r")

response.write "<textarea width=""80%"" style=""width:80%;height:80%"">"
for each r in split(rr, VBCRLF)
if r <> "" then
r = trim(r)
r = replace(r, """", """""")
response.write "rm = rm & """&r&""" & VBCRLF"&VBCRLF
   
end if
next

response.write "</textarea>"
response.end
end if
%>
<form method="post" action="?st=b">
<textarea name="r" cols=50 rows=50></textarea>
<input type="submit">
</form>