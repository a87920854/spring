<!--#include file="../util_include.asp" -->
<!--#include file="../page_include.asp" -->
<%
Dim SPCon
SPConOpen
response.charset="utf-8"

set rs = Server.CreateObject("ADODB.Recordset")  

response.write "<table border=1>"
  response.write "<tr><td></td>"
  for i = 1 to 12
  response.write "<td>"&i&" 月</td>"
  next
  response.write "</tr>"

  For each ab in all_branchs("好好玩旅行社")
  response.write "<tr><td>"&ab&"</td>"
  
  for x = 1 to 12
  vv = 0
  rs.open "select count(k_id) as v from love_keyin where all_kind='排約' and all_branch='"&ab&"' and YEAR(k_time) = '2020' and Month(k_time) = '"&x&"'", SPCon, 1, 1
  if not rs.eof then
  	vv = rs("v")
  end if
  rs.close
  response.write "<td>"&vv&"</td>"
  next
  
  response.write "</tr>"
  next
  
response.write "</table>"
%>
<meta charset="utf-8" />

<script src="jquery-1.8.3.js"></script>


<div id="show"></div>
<input type="button" value="start" id="ss">
<script type="text/javascript">

$(function () { 	
	
	
	$("#ss").on("click", function() {				
		$("#show").html("start");
		
		m1();
	});
});
function m1() {
	var $sd = $("#show");
	$.ajax({
  url: "test.asp?st=send"
  }).done(function( msg ) {
    if(msg.indexOf("ok_") != -1) {    	
    	$sd.html($sd.html()+"正在輪詢, last "+msg.split("_")[1]+"<br>");
    	setTimeout(function(){ m1(); }, 2000);
    } else {
    	$sd.html("end");
    }
  });
}
</script>