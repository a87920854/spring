<!--#include file="util_include.asp" -->
<!--#include file="page_include.asp" -->
<%
IF Session("MM_Username") = "" Then Call Alert("請重新登入。","login.html",0) End IF

if request("n") = "" then Call Alert("讀取錯誤。", 0,0) End IF
Dim SPCon
SPConOpen
allcity = "基隆市,台北市,新北市,宜蘭縣,桃園市,新竹縣,新竹市,苗栗縣,苗栗市,台中市,彰化縣,彰化市,南投縣,嘉義縣,嘉義市,雲林縣,台南市,高雄市,屏東縣,花蓮縣,台東縣,澎湖縣,金門縣,馬祖,綠島,蘭嶼,其他"

if request("st") = "add" And request("totals") <> "" And request("n") <> "" Then
	totals = CInt(request("totals"))
	totals = totals-1
If totals >= 0 Then
  action_branch = ""
  set rs = Server.CreateObject("ADODB.Recordset")
  rs.open "select * from action_data where ac_auto='5937'", SPCon, 1, 1
  if not rs.eof then
  	action_branch = rs("ac_branch")
    action_title = rs("ac_title")
    action_note = rs("ac_note")
    action_time = rs("ac_time")  	
  end if
  rs.close
  
  if action_branch <> "" then
  For i = 0 To totals  
    For g = 1 To 21      
      execute("n"&g&"v = Split(request(""n"&g&"""),"","")(i)")
      execute("n"&g&"v = trim(n"&g&"v)")
      execute("response.write ""n"&g&"v-""&n"&g&"v&""<br>""")
	  next

    rs.Open "SELECT top 1 * FROM love_keyin",SPCon,1,3
    rs.addnew
    	  
	  rs("k_name") = n5v
	  rs("k_area") = n21v
	  rs("k_sex") = n6v
	  rs("k_mobile") = n16v	  
	  if isdate(n7v) then
	  rs("k_bday") = n7v
	  rs("k_year") = year(n7v)
	  end if
	  rs("k_job") = n10v
	  rs("k_school") = n11v
	  rs("k_marry") = n12v
	  if n19v <> "" then
	  rs("k_line") = n19v
	  end if
	  rs("action_branch") = action_branch
	  rs("action_title") = action_title
	  rs("action_note") = action_note
  	rs("action_time") = action_time
	  rs("all_kind") = "活動"
	  rs("all_note") = "貳參公關活動匯入"
	  rs("k_come") = "委外活動23"	  
	  rs("send_time") = now()
    rs.update
    rs.close
	  
      
	  
  Next  
  end if
  set rs=Nothing
response.end
end if

  fpath = server.mappath("temp_excel\"&request("fpath"))
  rmfile(fpath)
  
  response.redirect "test23.asp"
response.end
End if
%>
			<%TOP%>
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						管理系統 <span class="divider">/</span>
					</li>
					<li>
						<a href="test23.asp">23 - 效對 Excel</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid">

				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> 23 - 效對 Excel</h2>						
					</div>
					<div class="box-content">
						<%
						fpath = server.mappath("temp_excel\"&request("n"))
						set rs = Server.CreateObject("ADODB.Recordset")
						Set fs=Server.CreateObject("Scripting.FileSystemObject")
            Set f=fs.OpenTextFile(fpath, 1)  '打開文本文件
            Response.write "<form id=""applyform"" action=""?st=add"" method=""post"" target=""_self"">"
            response.write "<table class=""table table-striped table-bordered bootstrap-datatable"">"
            Response.Write "<tr><td>報名順序</td><td>會員別</td><td>正/備取</td><td>身分證字號</td><td>姓名</td><td>性別</td><td>生日</td><td>星座</td><td>服務單位</td><td>職稱</td><td>學歷</td><td>婚姻</td><td>素食</td><td>身高</td><td>體重</td><td>行動電話</td><td>居住縣市</td></tr>"
            ii = 0
            
            do while f.AtEndOfStream = false
	strs=f.ReadLine
	splitstr=split(strs,",")  '分割一行的字符串  
  
  if not ii = 0 and splitstr(4) <> "" then
  	
	Response.Write("<tr>")	
	
	err = 0
	sch = 0
	for i =0 to ubound(splitstr)
  vals = trim(splitstr(i))
  
  vals = replace(vals, " ", "")
  vals = replace(vals, "'", "")
  
  if i = 6 then
    if not isdate(vals) then    	
	  		err = 1
	  		errmsg = "出生日期錯誤"
    end if	
    v5y = ""
    if instr(vals, "/") > 0 then
    	v5y = split(vals, "/")(0)
    	if len(v5y) < 3 then
    		vals = cint(v5y)+1911&right(vals, len(vals)-len(v5y))
    	end if    	
    end if
    
  end if
  
  if i = 5 then
    if not vals = "男" and not vals = "女" then
	  		err = 1
	  		errmsg = "性別錯誤，請輸入男/女"
    end if  	
  end if
  
  mmobile = ""
  ss = "95%;"
  	mcn = 0
  	lcn = 0
  	
	  if i = 15 then
	  	if vals <> "" then
	  		vals = replace(vals, "_", "")
	  		vals = replace(vals, "-", "")
	  		vals = replace(vals, " ", "")	
	  		vals = replace(vals, "'", "")	  		
	  		vals = trim(vals)
	  	end if
	  	
	  	if not left(vals, 1) = "0" then
	  		vals = "0"&vals
	  	end if

	  	if not left(vals, 2) = "09" then
	  		err = 1
	  		errmsg = "行動電話非09開頭"
	  	end if	  	
	  	
	  	if not len(vals) = 10 then
	  		err = 1
	  		errmsg = "行動電話非10碼"
	  	end if
	  	
	  
	  end if
	  
	  

	  if i = 20 then
	  	ccc = 0
	  	for each cc in split(allcity, ",")
	  	  if vals = cc then
	  	  	ccc = 1
	  	  end if
	    next
	  	
	  	if ccc = 0 then
	  		err = 1
	  		errmsg = "地區不在目前系統地區中"
	  	end if
	  end if
	 

	 response.Write("<td>"&i&"")   '建立表格列
   Response.Write "<input type=""text"" name=""n"&i+1&""" id=""n"&i+1&""" value=""" & vals & """ style=""width:"&ss&";"">"
   response.Write("</td>")
   
   if i >= 20 then
   	exit for
   end if   
  next
  
  Response.Write("</tr>")
  
  if err = 1 then
  	response.write "<tr><td colspan=20 style=""color:red"">上行有問題 - "&errmsg&"</td></tr>"    
  else
  	response.write "<tr><td colspan=20 style=""color:green"">上行通過檢驗"&mmobile&"</td></tr>"  	
  end if
  end if
  ii = ii+1
  
loop

if err = 0 then
Response.write "<tr><input type=""hidden"" name=""totals"" value=""" & ii-1 & """><input type=""hidden"" name=""n"" value=""" & request("n") & """><td colspan=18 align=""left""><input type=""button"" value=""匯入"" onclick=""sendform()""></td></tr>"
end if

response.write "</form>"
Response.Write("</table>")
f.Close
Set f=Nothing
Set fs=Nothing
set rs=nothing
						%>     
					</div>
				</div><!--/span-->
			 
			</div><!--/row-->


		<hr>
	</div><!--/.fluid-container-->

<%BOTTOM%>
<script>
function sendform() {
  $("#applyform").submit();
	return true;
}

</script>