<!--#include file="../util_include.asp" -->
<%

Dim SPCon
SPConOpen

IF Request("times1") <> "" Then
t1 = Request("times1")
If Not isdate(t1) Then
Call Alert("起始日期有誤。", 0, 0)
End if
t1 = t1 & " 00:00"
End IF
IF Request("times2") <> "" Then
t2 = Request("times2")
If Not isdate(t2) Then
Call Alert("結束日期有誤。", 0, 0)
End if
t2 = t2 & " 23:59"
End If

if t1 <> "" and t2 <> "" then
	sqls = sqls & " and times between '"&t1&"' and '"&t2&"'"
	t1 = datevalue(t1)
	t2 = datevalue(t2)
end if

%>
<HTML>
<BODY>
  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=1 style="border-collapse:collapse;">       
						  <thead>
							  <tr>
								  <th>編號</th>
								  <th>姓名</th>								  
								  <th>學歷</th>
								  <th>回報</th>
							  </tr>
						  </thead>
						  <tbody>
<%
 Set rs = Server.CreateObject("ADODB.Recordset")
 Set qrs = Server.CreateObject("ADODB.Recordset")
      rs.open "select * from member_data where mem_come='行銷活動' and mem_come2='2018年12星座愛情指數測驗' order by mem_time desc", SPCon, 1, 1
      
	  If rs.eof Then
	     Response.write "<tr><td colspan=10 height=200>目前沒有資料</td></tr>"
	  Else	  
					while not rs.eof
%>
          <tr>
          	<td><%=(rs("mem_num"))%></td>
            <td><%=(rs("mem_name"))%></td>
            <td><%=(rs("mem_school"))%></td>
            <td>
            	<%
            	 qrs.open "select top 1 * from log_data where log_num='"&rs("mem_auto")&"' and log_5='member'", SPCon, 1, 1
            	 if qrs.eof then
            	 	response.write "無"
            	 else
            		while not qrs.eof
            		response.write qrs("log_time")&"："&qrs("log_2")&"-"&qrs("log_4")&" ["&qrs("log_name")&"]<br>"
            		qrs.movenext
            		wend
            	 end if
            	 qrs.close
            	%>
            </td>     
							</tr>
<%  
				    rs.MoveNext
				    wend		            
					End IF
					rs.close
%>
						  </tbody>
					  </table>
</BODY>
</HTML>
<%
Randomize()
fname = year(date)&month(date)&day(date)&hour(now())&Minute(now())&Second(now())& fix(Rnd()*999 +1 )
%>
<%'Response.ContentType = "application/vnd.ms-excel"%> 
<%'Response.AddHeader "content-disposition","attachment; filename="&fname&".xls"%>
<%  
  Response.AddHeader "content-disposition","attachment; filename="&fname&".xls"
  Response.Charset ="big5"
  Response.ContentType = "Content-Language;content=zh-tw" 
  Response.ContentType = "application/vnd.ms-excel"
%>
<script type="text/javascript">
	setTimeout(function(){ window.close(); }, 5000);
</script>