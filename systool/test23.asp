<!--#include file="util_include.asp" -->
<!--#include file="page_include.asp" -->
<%
IF Session("MM_Username") = "" Then Call Alert("請重新登入。","login.html",0) End IF

Dim SPCon
SPConOpen

  if request("st") = "upload" Then


timers = right(int(timer()), 1)
pdir = server.mappath("temp_excel\")
set pfs=Server.CreateObject("Scripting.FileSystemObject")
set pfo=pfs.GetFolder(pdir)
if pfo.Size > 0 then
for each px in pfo.files
  if datediff("h", px.DateCreated, date()) > 8 then
    px.delete        
  end if
next	
end if
set pfo=nothing
set pfs=nothing

   Randomize()
   X = NOW()
   ASPUnewfname = Year(X) & Month(X) & Day(X) & Hour(X) & Minute(X) & Second(X) & "_temp_" & fix(Rnd()*1000 +1 )
   urlpath = server.mappath("temp_excel")

   Set ASPUpload = Server.CreateObject("Persits.Upload.1")
   ASPUpload.CodePage = 65001
   ASPUpload.OverwriteFiles = False 
   ASPUpload.Save
  ext = lcase(ASPUpload.Files(1).ext)
  
  if not ext = ".csv" then
	ASPUpload.Files(1).Delete
	Response.write "格式錯誤"
	Response.end
  end if

   Set ASPUploadFile = ASPUpload.Files(1)
   ASPUnewfname = ASPUnewfname&ASPUploadFile.ext
   ASPUploadFile.SaveAs urlpath & "\" & ASPUnewfname   

   set ASPUploadFile = nothing
   set ASPUpload=Nothing
   response.redirect "test23_excel.asp?n="&ASPUnewfname
   response.end
  end If
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
						<a href="test23.asp">23檢校</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid">

				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> 23檢校</h2>						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable">
              <tr><td>
              	<form action="?st=upload" method="post" enctype="multipart/form-data">
              		<input type="file" name="fileToUpload" id="fileToUpload">
              		<input type="submit" value="匯入 CSV" name="submit">
              	</form>
              </td></tr>
            </table>       
					</div>
				</div><!--/span-->
			 
			</div><!--/row-->


		<hr>
	</div><!--/.fluid-container-->

<%BOTTOM%>