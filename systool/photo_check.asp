<!--#include file="../util_include.asp" -->
<!--#include file="../page_include.asp" -->
<%
response.end
Dim SPCon
SPConOpen

if request("st") = "fix" then
	mem_num = request("mem_num")
  set rs = Server.CreateObject("ADODB.Recordset")

  rs.open "select * from photo_data where mem_num = '"&mem_num&"'", SPCon, 1, 3
  if not rs.eof then
  	while not rs.eof
  	
  	if rs("types") = "dmn" then
  		rmfile(server.mappath("dphoto\"&rs("photo_name")))
  	else
      rmfile(server.mappath("photo\"&rs("photo_name")))  		
  	end if
  	rs.delete
  	
  	rs.movenext
  	wend
  end if
  rs.close
  
  rs.open "select * from member_data where mem_num = '"&mem_num&"'", SPCon, 1, 3
  if not rs.eof then
  
  if instr(rs("mem_photo"), "photo/") > 0 then
    rmfile(server.mappath("dphoto\"&rs("mem_photo")))
  else
    rmfile(server.mappath("photo\"&rs("mem_photo")))
  end if
  
  if rs("mem_sex") = "女" then
  	rs("mem_photo") = "girl.jpg"
  elseif rs("mem_sex") = "男" then
    rs("mem_photo") = "boy.jpg"
  else
  	rs("mem_photo") = NULL
  end if
  rs("si_no_mail2") = 1
  rs.update
  
  end if
response.write "1"
response.end

end if
%>
<link id="bs-css" href="../css/bootstrap-cerulean.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../css/charisma-app.css" rel="stylesheet">
<link href='../css/jquery.fancybox.css' rel='stylesheet'>
<script src="../js/jquery-1.8.3.js"></script>
<script src="../js/jquery.fancybox.js"></script>
<script src="../js/util.js?v=2"></script>
<center>
<table class="table table-striped table-bordered bootstrap-datatable" style="width:80%">
<%
set rs = Server.CreateObject("ADODB.Recordset")
rs.open "select * from member_data where (mem_level = 'mem') AND (mem_photo <> '') AND (CHARINDEX('boy', mem_photo) <= 0) AND (CHARINDEX('girl', mem_photo) <= 0) or si_no_mail2 = 1 order by mem_auto desc", SPCon, 1, 1
if not rs.eof then

Call PageView(rs.RecordCount,50,rs)
				    SS = 0				    
				    Do While Not rs.EOF AND SS < 50
					SS = SS + 1
mem_photo = rs("mem_photo")
response.write "<tr>"
if rs("si_no_mail2") = 1 then
response.write "<td>已修正</td>"
else
	
response.write "<td>"
if instr(mem_photo, "photo/") > 0 then
response.write "<a href=""../dphoto/"&mem_photo&""" class=""fancybox""><img src=""../dphoto/"&mem_photo&""" height=80></a>"
else
response.write "<a href=""../photo/"&mem_photo&""" class=""fancybox""><img src=""../photo/"&mem_photo&""" height=80></a>"
end if
response.write "</td>"
end if

response.write "<td>"&rs("mem_name")&"/"&rs("mem_nick")&"</td>"
response.write "<td>"&rs("mem_num")&"</td>"

if rs("si_no_mail2") = 1 then
response.write "<td>已修正</td>"
else
response.write "<td><a href=""#g"" id=""btn_"&rs("mem_num")&""" onclick=""fixphoto('"&rs("mem_num")&"')"" class=""btn btn-info"">刪照片</a></td>"
end if
response.write "</tr>"

 rs.MoveNext
				    Loop
					End IF
rs.close
%>

	
</table>
<%Call PageCss(1,9,"text")%>
</center>

<script type="text/javascript">
$(function () { 	

  $(".fancybox").fancybox();
});

function fixphoto(mn) {
	if(confirm("是否要確定刪除 "+mn+" 的照片?")) {
		fixphotoyes(mn);
	} else {
		return false;
	}
}
function fixphotoyes(mn) {
	var $btn = $("#btn_"+mn);
	$btn.html("修正中..");

	$.ajax({
  url: "photo_check.asp?st=fix&mem_num="+mn
  }).done(function( msg ) {
    $btn.parent("td").html("已修正");
    $btn.remove();
  });
}
</script>