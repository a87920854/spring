<!--#include file="../util_include.asp" -->
<!--#include file="../page_include.asp" -->
<%
'IF Session("MM_Username") = "" Then Call Alert("請重新登入。","login.html",0) End IF
'check_page_power("teach_video")

Dim SPCon
SPConOpen
Set rs = Server.CreateObject("ADODB.Recordset")

%>
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						春天網站管理系統 <span class="divider">/</span>
					</li>
					<li>
						<a href="teach_video.asp">教學影片</a> <span class="divider">/</span>
					</li>
					<li>
						檔案大小
					</li>
				</ul>
			</div>
			
			<div class="row-fluid">

				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> 檔案大小</h2>
					</div>
					<div class="box-content">
					<p><input type="button" class="btn" value="回目錄頁" style="width:150px;height:28px;" onclick="location.href='teach_video.asp'">
					</p>
					<table class="table table-striped table-bordered bootstrap-datatable">
						<tbody>
				 <%
           set fs=Server.CreateObject("Scripting.FileSystemObject")
           set fo=fs.GetFolder(server.mappath("..\teach_video\"))
           Response.Write "<tr><td colspan=3>Total: "&ConvertSize(fo.Size) & "</td></tr>"
           on error resume next
             'create an ADODB.Recordset and call it rsFSO
           Set rsFSO = Server.CreateObject("ADODB.Recordset")
  
  Const adInteger = 3
  Const adDate = 7
  Const adVarChar = 200           
           'create the various rows of the recordset
  With rsFSO.Fields
    .Append "Name", adVarChar, adVarChar
    .Append "DateCreated", adDate
    .Append "Size", adInteger
  End With
  
 
  rsFSO.Open()
           
           for each File in fo.Files
            'hide any file that begins with the character to exclude
    
      rsFSO.AddNew
      'response.write filename&"|"&File.DateCreated&"-"&File.Size&"<Br>"
      rsFSO("Name") = File.Name
      rsFSO("DateCreated") = File.DateCreated
      rsFSO("Size") = File.Size
      rsFSO.Update
    

           next
           rsFSO.Sort = "Size Desc"
         
           set fo=nothing
           set fs=nothing   
           
           rsFSO.MoveFirst()
           While Not rsFSO.EOF
           response.write "<tr><td>"&rsFSO("Name")&"</td><td>"&rsFSO("Size")&"</td><td>"&rsFSO("DateCreated")&"</td></tr>"
           rsFso.MoveNext()
           Wend
            rsFSO.close()
           Set rsFSO = Nothing
					%>
					

							
							
						</tbody>
					</table>
					
					<div class="clearfix" style="padding-bottom:30px;"></div>

		      </div>
				</div><!--/span-->
			</div><!--/row-->
		
	</div><!--/.fluid-container-->
<%BOTTOM%>

<script language="JavaScript">
$(function() {
$(".fancybox").fancybox();
});
</script>