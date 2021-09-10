<!--#include file="../util_include.asp" -->
<!--#include file="../page_include.asp" -->
<%
Server.ScriptTimeout = 9000
Dim funCon
FunConOpen
if request("st") = "b" then
set rs = Server.CreateObject("ADODB.Recordset")
'on error resume next
rs.open "SELECT * FROM action_data WHERE ac_auto = '2473'", funCon, 1, 1
if not rs.eof then
	
	ac_auto = rs("ac_auto")
	ac_branch = rs("ac_branch")
	ac_title = rs("ac_title")
	ac_note = rs("ac_note1")
	ac_time = rs("ac_time")
end if
rs.close
rr = request("r")

total = 0
th = 0
for each r in split(rr, VBCRLF)
if r <> "" then
r = trim(r)
r = replace(r, " ", "")
r1 = split(r, "	")(0)
r2 = split(r, "	")(1)
r3 = split(r, "	")(2)
r4 = split(r, "	")(3)
r5 = split(r, "	")(4)
'r6 = split(r, "	")(5)

  k_mobile = r2
  if k_mobile <> "" then
	k_mobile = replace(k_mobile, "-", "")
	if left(k_mobile, 1) = "9" then
		k_mobile = "0"&k_mobile
	end if
	
	if len(r3)=8 then
		r3 = replace(r3, ".", "")
		r31 = left(r3, 2)+1911
		r32 = mid(r3, 3, 2)
		r33 = right(r3, 2)
		r3 = r31 &"/"&r32 &"/"&r33
	end if

response.write ac_title&"<br>"
response.write "<b>1</b>-"&r1&"<Br>"
response.write "<b>2</b>-"&k_mobile&"<Br>"
response.write "<b>3</b>-"&r3&"<Br>"
response.write "<b>4</b>-"&r4&"<Br>"
response.write "<b>5</b>-"&r5&"<Br>"
response.write "<b>6</b>-"&r6&"<Br>"
response.write "-----------------<br>"

'response.write err.description
'response.end	
 
	  rs.Open "SELECT top 1 * FROM love_keyin", funCon, 1, 3
    rs.addnew	  
	  rs("k_name") = r1
	  'rs("k_yn") = r2
	  rs("k_mobile") = k_mobile
	  'rs("k_sex") = r4
	  rs("k_user") = r5
	  rs("k_year") = r3
	  if r4 <> "" then
	  rs("lineid") = r4
	  end if
	  rs("action_branch") = ac_branch
	  rs("action_title") = ac_title
	  rs("action_note") = ac_note
  	rs("action_time") = ac_time
  	rs("ac_auto") = ac_auto
	  rs("all_kind") = "活動"
	  rs("all_type") = "未處理"		 
	  rs("k_time") = now()
    rs("k_come") = "系統匯入"
    
    	
	  rs.update
	  rs.close
    

end if
end if
next


set rs=nothing
response.end
end if
%>
<form method="post" action="?st=b">
<textarea name="r" cols=50 rows=50></textarea>
<input type="submit">
</form>