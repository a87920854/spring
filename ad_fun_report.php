

<STYLE TYPE="text/css">
        <!-- body,th,td,input,select,textarea,select,checkbox {font:10pt 新細明體}
         .a1:link {font: 10pt "新細明"; text-decoration: none;color:#990066}
         .a1:visited      {font: 10pt "新細明"; text-decoration: none; color: #990066}
        -->
		a:link {font: 10pt "新細明"; text-decoration: none;color:#0000FF}
        a:visited      {font: 10pt "新細明"; text-decoration: none; color: #0000FF}
        a:active       {font: 10pt "新細明"; text-decoration: none; color: #0000FF}
        a:hover        {font: 10pt "新細明"; text-decoration: underline; color: ff0000}
   .style14 {font-size: 12px}
body {
overflow-y: auto;
}
</STYLE>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script src="js/jquery-ui.min.js"></script>
<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.ui.datepicker-zh-TW.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body text="#333333" leftmargin="0" topmargin="0">
<table width="660" border="0" cellspacing="0">
  <tr> 
    <td width="660" valign="top">
        <table width="660" border="1">

          <tr> 
            <td height="25" bgcolor="#336699"><div align="center"><font color="#990066" size="3"><strong> 
			<font color="#FFFFFF">孫偉文 - 好好玩旅行社回報系統</font></strong></font></div></td>
          </tr>
      </table>
        <table width="660" border="1" cellpadding="1">
<tr><td>未接</td><td></td><td width=300></td><td style="font-size:9px">台南督導　<a href="?st=del&la=17340&k_id=3820&ty=member">刪</a><br>2021/6/12 下午 08:07:00</td></tr><tr><td>未接</td><td></td><td width=300></td><td style="font-size:9px">台南督導　<a href="?st=del&la=17339&k_id=3820&ty=member">刪</a><br>2021/6/12 下午 08:06:00</td></tr>

      </table>

        <table width="660" border="1">
          <tr> 
            <td height="25" bgcolor="#336699"><div align="center"><font color="#990066" size="3"><strong> 
            <font color="#FFFFFF">新增回報紀錄</font></strong></font></div></td>
          </tr>
      </table>
	  <form method="post" action="?st=send" onsubmit="return chk_form()">
<table width="660" border="1" cellpadding="1">
<tr><td>處理情形</td><td>
              <select name="log_2" id="log_2">
              <option value="">請選擇</option><option value="有意願">有意願</option><option value="無意願">無意願</option><option value="下次聯絡">下次聯絡</option><option value="未接">未接</option><option value="停話">停話</option><option value="PASS春天">PASS春天</option><option value="勿再聯絡">勿再聯絡</option>
              </select>
			  <span id="log_3_div"></span><span id="log_4_div"></span><span id="log_6_div" style="display:none;"><input type="text" style="width:120px;" name="log_6" id="log_6" readonly class="datepicker" autocomplete="off" value="點此預約下次通話"></span>
</td></tr>
<tr><td>內容</td><td><input type="text" name="log_4" id="log_4" size=90></textarea></td></tr>
<tr><td>回報時間</td><td>2021/9/27 下午 01:51:04 由 JACK(JACK0906) 回報</td></tr>
<input type="hidden" name="k_id" value="3820">
<input type="hidden" name="k_mobile" value="0955707121">
<input type="hidden" name="log_name" value="JACK">
<input type="hidden" name="log_username" value="孫偉文">
<input type="hidden" name="log_branch" value="總管理處">
<input type="hidden" name="ty" value="member">
<input type="hidden" name="rc" value="">
</table>
    </td>
  </tr>
  <tr><td align="center"><input type="submit"></td></form></tr>
</table>
</body>
</html>

<script language="JavaScript">
$(function() {
$("#log_6").datepicker({
minDate:'%y-%M-%d'
});
$("#log_2").on("change", function() {
    var $val = $(this).val();
	$("#log_3_div").html("");
	$("#log_4_div").html("");
	$("#log_6").val("點此預約下次通話");
	$("#log_6_div").hide();
    if($val) {	   
       if($val == "有意願") {
       addnewoption3();
	   }
	   if($val == "下次聯絡") {
	   $("#log_6_div").show();
	   }
    }
});
$("#log_2").val("");
});
function chk_form() {
if(!$("#log_2").val()) {
alert("請選擇處理情形1。");
$("#log_2").focus();
return false;
} else {
if($("#log_2").val() == "下次聯絡") {
  if(!$("#log_6").val() || $("#log_6").val() == "點此預約下次通話") {
   alert("請預約下次通話。");
   return false;
  }
}
}
if($("#log_3").val() != undefined) {
if(!$("#log_3").val() || $("#log_3").val() == "請選擇") {
alert("請選擇處理情形2。");
$("#log_3").focus();
return false;
}
}
return true;
}
function addnewoption3() {
       var $newselect = $("<select></select>"),
       $options1 = ["請選擇","不確定時間","考量1-3月出國","考量4-6月出國","考量7-9月出國","考量10-12月出國"];
       $newselect.attr("id", "log_3");
       $newselect.attr("name", "log_3");
       $.each( $options1, function( i, val ) {
         $newselect.append($("<option></option>").attr("value", val).text(val));
       });
	   $("#log_3_div").append($newselect);	   
       $newselect.on("change", function() {	      
	      $("#log_4_div").html("");
          if($(this).val() != "請選擇") addnewoption4();
       });
}
function addnewoption4(n) {
       var $newselect = $("<select></select>"),
       $options1 = ["不確定地點","考量去東北亞(日韓)","考量去東南亞(馬新泰菲印)","考量去自由行","考量去島嶼","考量去澳洲","考量去美加"];
       $newselect.attr("id", "log_3");
       $newselect.attr("name", "log_3");
       $.each( $options1, function( i, val ) {
         $newselect.append($("<option></option>").attr("value", val).text(val));
       });	   
	   $("#log_4_div").append($newselect);
	   if(n) $newselect.val(n);
}
</script>