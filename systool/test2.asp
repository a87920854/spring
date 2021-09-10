<!--#include file="../util_include.asp" -->
<!--#include file="../page_include.asp" -->
<%
'Dim SPCon
'SPConOpen
'response.charset="utf-8"
'set rs = server.CreateObject("ADODB.Recordset")
'
'rs.open "SELECT count(mem_auto) as tt FROM member_data where not del_mask is null and all_type='空號'", SPCon, 1, 1
'if not rs.eof then	
'	'while not rs.eof
'  
'    
'  'rs.movenext
'  'wend
'  response.write rs("tt")
'end if
'rs.close
'
'
'set rs=nothing
'
if request("st") = "send" then
response.charset="big5"
set fs = Server.CreateObject("Scripting.FileSystemObject")
uploadpath = server.MapPath("test/new.txt")

response.write uploadpath&"<br>"

if not fs.fileexists(uploadpath) then
  fs.createtextfile(uploadpath)
  response.write "檔案建立成功"
else
  response.write "已存在"
end if
response.end
	   Randomize()
   X = NOW()
   ASPUnewfname = "xx"&Year(X) & Month(X) & Day(X) & Hour(X) & Minute(X) & Second(X) & fix(Rnd()*99 +1 )
      
   'urlpath = server.mappath("../temp_img")
   urlpath = server.mappath("test/")
   response.write urlpath&"<br>"
   Set ASPUpload = Server.CreateObject("Persits.Upload.1")
   ASPUpload.CodePage = 65001
   ASPUpload.OverwriteFiles = False 
   ASPUpload.Save

   Set ASPUploadFile = ASPUpload.Files(1)
   ASPUnewfname = ASPUnewfname&ASPUploadFile.ext
   ASPUploadFile.SaveAs urlpath & "\" & ASPUnewfname   

   set ASPUploadFile = nothing
   set ASPUpload=Nothing
    	
	response.write ASPUnewfname
  response.end
	
response.end
end if
%>
<form method="post" action="?st=send" enctype="multipart/form-data">
<input type="file" name="filesent">
<input type="submit" value="Send File">