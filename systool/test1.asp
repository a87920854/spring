<!--#include file="../util_include.asp" -->
<!--#include file="../page_include.asp" -->

<%
Dim SPCon
SPConOpen

Set rs = Server.CreateObject("ADODB.Recordset")
Set qrs = Server.CreateObject("ADODB.Recordset")
branch = "台北,桃園,新竹,台中,台南,高雄,八德"
allcity = "基隆市,台北市,新北市,宜蘭縣,桃園市,新竹縣,新竹市,苗栗縣,苗栗市,台中市,彰化縣,彰化市,南投縣,嘉義縣,嘉義市,雲林縣,台南市,高雄市,屏東縣,花蓮縣,台東縣,澎湖縣,金門縣,馬祖,綠島,蘭嶼,其他"

response.write "<table width=""100%"" border=""1"" style=""border-collapse:collapse;"" borderColor=""black"">"
  response.write "<tr><td></td>"
  for i = 3 to 7
  response.write "<td>"&i&" 月</td>"
  next
  response.write "</tr>"

  for each cc in split(allcity, ",")
  response.write "<tr><td>"&cc&"</td>"
  
  for x = 3 to 7
  vv = 0
  rs.open "select count(mem_auto) as v from member_data where YEAR(mem_time) = '2020' and Month(mem_time) = '"&x&"' and mem_area='"&cc&"' and (mem_come2 like '%2020年12星座愛情指數測驗%' or mem_come2 like '%穩定交往的秘訣%' or mem_cc = 'DMN_FB_post_member' or mem_cc = 'DMN_FB_post_memberB_20200331')", SPCon, 1, 1
  if not rs.eof then
  	vv = rs("v")
  end if
  rs.close
  response.write "<td>"&vv&"</td>"
  next
  
  response.write "</tr>"
  next
'
'for each b in split(branch, ",")
'response.write "<tr><td>"&b&"</td><td>男</td><td>女</td><td>總</td></tr>"
'for i = 1 to 12
'rs.open "SELECT sum(pay_total2) as v FROM pay_main as dba where pay_branch = '"&b&"' and pay_year=2019 and pay_month="&i&" and SUBSTRING(pay_user, 2, 1)='1'", SPCon, 1, 1
'if not rs.eof then	
'	bv = rs("v")
'end if
'rs.close
'rs.open "SELECT sum(pay_total2) as v FROM pay_main as dba where pay_branch = '"&b&"' and pay_year=2019 and pay_month="&i&" and SUBSTRING(pay_user, 2, 1)='2'", SPCon, 1, 1
'if not rs.eof then	
'	gv = rs("v")
'end if
'rs.close
'
'rs.open "SELECT sum(pay_total2) as v FROM pay_main as dba where pay_branch = '"&b&"' and pay_year=2019 and pay_month="&i&"", SPCon, 1, 1
'if not rs.eof then	
'	av = rs("v")
'end if
'rs.close
'
'	response.write "<tr>"
'					       response.write "<td>"&i&" 月</td><td>"&bv&"</td><td>"&gv&"</td><td>"&av&"</td>"
'					       
'					       response.write "</tr>"
'	
'next
'next
response.write "</table>"
set rs=nothing

%>