<!--#include file="../util_include.asp" -->
<!--#include file="../page_include.asp" -->
<%
Server.ScriptTimeout = 9000
response.charset="utf-8"
Dim SPCon
SPConOpen
if request("st") = "b" then
	if request("come3") = "" then
		response.write "請選擇素材名稱"
	  response.end
  end if
set rs = Server.CreateObject("ADODB.Recordset")

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


  if r3 <> "" then
	r3 = replace(r3, "-", "")
	if left(r3, 1) = "9" then
		r3 = "0"&r3
	end if
	if not left(r3, 2) = "09" then
		response.write "匯入電話資料有誤-"&r3&"<br>"
	response.end
	end if
  
  if isdate(r4) then
  	r4 = FormatDateTime(r4, 2)
  	r41 = year(r4)
  	r42 = month(r4)
  	r43 = day(r4)
  	
  end if

response.write r1&"<br>"
response.write r2&"<br>"
response.write r3&"<br>"
response.write r4&"<br>"
response.write r5&"<br>"
response.write "----------------<br>"
 
	rs.Open "SELECT top 1 * FROM member_data where mem_mobile='"&r3&"' and mem_branch='八德'", SPCon, 1, 3
	if rs.eof then
    Set numrs = Server.CreateObject("ADODB.Recordset")
    numrs.open "select * from msg_num where m_auto=1", SPCon, 1, 3
    mem_num = numrs("m_num")+1
    numrs("m_num") = mem_num    
    numrs.update
	  set numrs=nothing
  rs.addnew	  
  rs("mem_num") = mem_num
  rs("mem_name") = r2
  if r41 <> "" then
  rs("mem_by") = r41
  end if	
  if r42 <> "" then
  rs("mem_bm") = r42
  end if	
  if r43 <> "" then
  rs("mem_bd") = r43
  end if
  'if r4 = "女" then
  '	sex = "女"
  '	rs("mem_photo") = "girl.jpg"
  'else
  '	sex = "男"
  '	rs("mem_photo") = "boy.jpg"
  'end if
  'rs("mem_sex") = sex
  rs("mem_mobile") = r3
  rs("mem_mail") = r1
  'rs("mem_msn") = r6
  rs("mem_area") = r5
  'rs("mem_address") = r72
  rs("mem_come") = "FB名單"
  rs("mem_come2") = "DateMeNowFB"
  rs("mem_time") = now()
  rs("mem_level") = "guest"
  if request("come3") <> "" then
  	rs("mem_cc") = request("come3")
  end if
  
	rs.update
else
			errphone = r3&","&errphone
  end if
	rs.close

end if
end if
next

if errphone <> "" then
  if right(errphone, 1) = "," then
  	errphone = right(errphone, len(errphone)-1)
  end if	
  response.write "重覆的手機號碼："&errphone
end if

set rs=nothing
response.end
end if
%>
<br><br>
<form method="post" action="?st=b">
<select name="come3" height=35 required>
	<option value="">請選擇素材名稱</option>
	<option value="brand">brand</option>
	<option value="introduction">introduction</option>
	<option value="workdate">workdate</option>
</select>
<br>
<br>
<textarea name="r" cols=50 rows=30></textarea>
<input type="submit">
</form>