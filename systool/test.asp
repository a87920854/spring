<!--#include file="../util_include.asp" -->
<!--#include file="../page_include.asp" -->
<%
Dim SPCon
SPConOpen
response.charset="utf-8"
if request("st") = "send" then
	Randomize()	
	alln = "'1554170','1570603','1091038','1099385','1113372','1124433','1141782','1213230','1089278','1098160','1101493','1119351','1231798','1295771','1318033','1346395','1356203','1522908','1523771','1539883','1540433','1090275','1119370','1352097','1357768','1431659','1432727','1438928','1449667','1459394','1466936','1471448','1476557','1477617','1478635','1480367','1480442','1481630','1493051','1555338','1561707','1583196','1596808','1597228','1600970','1838688','1846915','171145','1836055'"
  set rs = Server.CreateObject("ADODB.Recordset")  
  set prs = Server.CreateObject("ADODB.Recordset")  
  rs.open "select top 100 * from member_data where mem_num in ("&alln&")", SPCon, 1, 3
  if not rs.eof then  	
  	while not rs.eof
  	ppcheck = 0
  	prs.open "select top 1 * from photo_data where mem_num="&rs("mem_num")&" and accept=1 order by photo_auto asc", SPCon, 1, 1
  	if not prs.eof then
  		ppcheck = 1
  	end if
  	prs.close
  	response.write rs("mem_num") &"-"& cpath &"-"& ppcheck&"<br>"

  	rs.movenext
  	wend
  end if
  rs.close
  
  response.write "ok_1"
response.end
end if

Set rs = Server.CreateObject("ADODB.Recordset")

rs.open "SELECT top 500 * FROM member_data as dba outer APPLY (SELECT TOP 1 log_time, log_branch, log_1, log_2, log_4, (select count(log_auto) from log_data where log_1=dba.mem_mobile and log_2 <> '系統紀錄') as logsize FROM log_data WHERE log_1 = dba.mem_mobile order by log_time desc) log_data WHERE logsize <= 0 and mem_come2 like '單身剋星_LINEPOINT%'", SPCon, 1, 3
if not rs.eof then
	while not rs.eof
	rs("mem_cc") = "LINEPOINT_無回報_210413"
	rs.update
	rs.movenext
	wend
	
end if
rs.close
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