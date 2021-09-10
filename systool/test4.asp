<!--#include file="util_include.asp" -->
<!--#include file="page_include.asp" -->
<%
Function weekchinesename(n)
select case n
case 1
weekchinesename = "一"
case 2
weekchinesename = "二"
case 3
weekchinesename = "三"
case 4
weekchinesename = "四"
case 5
weekchinesename = "五"
case 6
weekchinesename = "六"
case 0
weekchinesename = "日"
case else
weekchinesename = "不明"
end select
end Function

IF request("st") = "send" then
SPConOpen

  start_time = FormatDateTime(Request("start_time"), 2) & " 00:00"
  end_time = FormatDateTime(Request("end_time"), 2) & " 23:59"
  fullmaxday = DateDiff("d", Request("ostart_time"), Request("end_time"))
  maxday = DateDiff("d", Request("start_time"), Request("end_time"))

  if maxday < 0 Then
    response.write "在 "&start_time&" ～ "&end_time&" 間沒有資料或日期選擇不正確。"
    response.end
  end if
  
    if maxday = 0 then
      smaxday = 1
     else
      smaxday = fullmaxday+1
     end if
     
    if Request("start_time") = Request("ostart_time") then
    response.write "<div>在 "&start_time&" ～ "&end_time&" 間統計、共 "&smaxday&" 天：</div>"
    response.write "<table id=""outtable"" width=""100%"" height=80 border=""1"" cellpadding=""3"" align=""center"" style=""line-height:20px;BORDER: #747474 1px solid;font-size:12px;border-collapse:collapse;"">"    
    response.write "<tr><td width=150>註冊時間</td>"
    response.write "<td colspan=2>我想認識他</td>"
    response.write "</tr>"
    
    response.write "<tr><td></td>"
    response.write "<td>新</td><td>總</td>"

    'response.write "<td>男</td><td>女</td>"
    response.write "</tr>"
    end if 

        set rs = Server.CreateObject("ADODB.Recordset")
          
          showdate = dateadd("d", i, start_time)
        
          
          
          rs.open "SELECT count(k_id) as tt FROM love_keyin as dba Where datediff(d, k_time, '"&showdate&"') = 0 and all_kind='排約'", SPCon, 1, 1
          if not rs.eof then
            t1 = rs("tt")
          end if
          rs.close
         
          rs.open "SELECT count(k_id) as tt FROM love_keyin as dba Where datediff(d, k_time, '"&showdate&"') = 0 and all_kind='排約' And ((SELECT count(mem_auto) FROM member_data Where mem_mobile = dba.k_mobile and datediff(s, dba.k_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where k_mobile = dba.k_mobile and datediff(s, dba.k_time, k_time) <= 0) <= 1)", SPCon, 1, 1
          if not rs.eof then
            t1a = rs("tt")
          end if
          rs.close
                 
          Response.write "<tr><td>"& showdate &"("&weekchinesename(Weekday(showdate)-1)&")</td>"
          Response.write "<td>"&t1a&"</td><td>"&t1&"</td>"'我想認識他
          
          'Response.write "<td>"&t9&"</td><td>"&t9a&"</td>"'性別
          Response.write "</tr>"
          
        set rs=nothing
        if datediff("d", showdate, end_time) = 0 then
        	response.write "<script type=""text/javascript"">button_set(1);outmsg_show(""已讀取 "&fullmaxday+1&" 筆資料完畢。"");</script>"
        else
          nowdays = forday + request("nowdays")+1
          response.write "<script type=""text/javascript"">outmsg_show(""目前讀取 "&nowdays&" / "&fullmaxday+1&" 筆資料..請稍候..<img src='img/wait_loading.gif' align='middle'>"");conutice_ajax('"&dateadd("d", forday+1, start_time)&"','"&Request("ostart_time")&"','"&Request("end_time")&"','"&nowdays&"')</script>"
        end if

response.end
end if
%>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=big5">
<script src="js/jquery-1.8.3.js" type="text/javascript"></script>
<!-- JSCal2 -->
<script src="jscal/js/jscal2.js" type="text/javascript"></script>
<script src="jscal/js/lang/tw.js" type="text/javascript"></script>
<link href="jscal/css/jscal2.css" rel="stylesheet" type="text/css" />
<link href="jscal/css/border-radius.css" rel="stylesheet" type="text/css" />
<link href="jscal/css/steel/steel.css" rel="stylesheet" type="text/css" />
<body text="#333333" leftmargin="0" topmargin="0">
<%
Dim SPCon
SPConOpen
set rs = Server.CreateObject("ADODB.Recordset")
d1 = "2015/11/1 00:00:00"
d2 = "2015/11/30 11:59:59"
          rs.open "SELECT count(mem_auto) as tt FROM member_data as dba Where mem_time between '"&d1&"' and '"&d2&"' and mem_cc like 'fb_pay%'", SPCon, 1, 1
          if not rs.eof then
            response.write ""&d1&" ~ "&d2&"  -  member fb_pay all :"&rs("tt") & "<br>"
          end if
          rs.close
  
          rs.open "SELECT count(mem_auto) as tt FROM member_data as dba Where mem_time between '"&d1&"' and '"&d2&"' and mem_cc like 'fb_pay%' And ((SELECT count(mem_auto) FROM member_data Where mem_mobile = dba.mem_mobile and datediff(s, dba.mem_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where k_mobile = dba.mem_mobile and datediff(s, dba.mem_time, k_time) <= 0) <= 1)", SPCon, 1, 1
          if not rs.eof then
            response.write ""&d1&" ~ "&d2&"  -  member fb_pay new :"&rs("tt") & "<br>"
          end if
          rs.close
          
          rs.open "SELECT count(mem_auto) as tt FROM member_data as dba Where mem_time between '"&d1&"' and '"&d2&"' and mem_cc like 'facebook_pay%'", SPCon, 1, 1
          if not rs.eof then
            response.write ""&d1&" ~ "&d2&"  -  member facebook_pay all :"&rs("tt") & "<br>"
          end if
          rs.close
  
          rs.open "SELECT count(mem_auto) as tt FROM member_data as dba Where mem_time between '"&d1&"' and '"&d2&"' and mem_cc like 'facebook_pay%' And ((SELECT count(mem_auto) FROM member_data Where mem_mobile = dba.mem_mobile and datediff(s, dba.mem_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where k_mobile = dba.mem_mobile and datediff(s, dba.mem_time, k_time) <= 0) <= 1)", SPCon, 1, 1
          if not rs.eof then
            response.write ""&d1&" ~ "&d2&"  -  member facebook_pay new :"&rs("tt") & "<br>"
          end if
          rs.close
                    
          rs.open "SELECT count(mem_auto) as tt FROM member_data as dba Where mem_time between '"&d1&"' and '"&d2&"' and mem_cc like 'Google_gdn%'", SPCon, 1, 1
          if not rs.eof then
            response.write ""&d1&" ~ "&d2&"  -  member Google_gdn all :"&rs("tt") & "<br>"
          end if
          rs.close
         
          rs.open "SELECT count(mem_auto) as tt FROM member_data as dba Where mem_time between '"&d1&"' and '"&d2&"' and mem_cc like 'Google_gdn%' And ((SELECT count(mem_auto) FROM member_data Where mem_mobile = dba.mem_mobile and datediff(s, dba.mem_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where k_mobile = dba.mem_mobile and datediff(s, dba.mem_time, k_time) <= 0) <= 1)", SPCon, 1, 1
          if not rs.eof then
            response.write ""&d1&" ~ "&d2&"  -  member Google_gdn new :"&rs("tt") & "<br>"
          end if
          rs.close
          
          rs.open "SELECT count(k_id) as tt FROM love_keyin as dba Where k_time between '"&d1&"' and '"&d2&"' and k_cc like 'fb_pay%'", SPCon, 1, 1
          if not rs.eof then
            response.write ""&d1&" ~ "&d2&"  -  event fb_pay all :"&rs("tt") & "<br>"
          end if
          rs.close
         
          rs.open "SELECT count(k_id) as tt FROM love_keyin as dba Where k_time between '"&d1&"' and '"&d2&"' and k_cc like 'fb_pay%' And ((SELECT count(mem_auto) FROM member_data Where mem_mobile = dba.k_mobile and datediff(s, dba.k_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where k_mobile = dba.k_mobile and datediff(s, dba.k_time, k_time) <= 0) <= 1)", SPCon, 1, 1
          if not rs.eof then
            response.write ""&d1&" ~ "&d2&"  -  event fb_pay new :"&rs("tt") & "<br>"
          end if
          rs.close
          
          rs.open "SELECT count(k_id) as tt FROM love_keyin as dba Where k_time between '"&d1&"' and '"&d2&"' and k_cc like 'facebook_pay%'", SPCon, 1, 1
          if not rs.eof then
            response.write ""&d1&" ~ "&d2&"  -  event facebook_pay all :"&rs("tt") & "<br>"
          end if
          rs.close
         
          rs.open "SELECT count(k_id) as tt FROM love_keyin as dba Where k_time between '"&d1&"' and '"&d2&"' and k_cc like 'facebook_pay%' And ((SELECT count(mem_auto) FROM member_data Where mem_mobile = dba.k_mobile and datediff(s, dba.k_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where k_mobile = dba.k_mobile and datediff(s, dba.k_time, k_time) <= 0) <= 1)", SPCon, 1, 1
          if not rs.eof then
            response.write ""&d1&" ~ "&d2&"  -  event facebook_pay new :"&rs("tt") & "<br>"
          end if
          rs.close
                    
          rs.open "SELECT count(k_id) as tt FROM love_keyin as dba Where k_time between '"&d1&"' and '"&d2&"' and k_cc like 'Google_gdn%'", SPCon, 1, 1
          if not rs.eof then
            response.write ""&d1&" ~ "&d2&"  -  event Google_gdn all :"&rs("tt") & "<br>"
          end if
          rs.close
         
          rs.open "SELECT count(k_id) as tt FROM love_keyin as dba Where k_time between '"&d1&"' and '"&d2&"' and k_cc like 'Google_gdn%' And ((SELECT count(mem_auto) FROM member_data Where mem_mobile = dba.k_mobile and datediff(s, dba.k_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where k_mobile = dba.k_mobile and datediff(s, dba.k_time, k_time) <= 0) <= 1)", SPCon, 1, 1
          if not rs.eof then
            response.write ""&d1&" ~ "&d2&"  -  event Google_gdn new :"&rs("tt") & "<br>"
          end if
          rs.close
%>
</body>
</html>
<script type="text/javascript">
$("#outmsg").hide();
Date.prototype.DateAdd = function(strInterval, Number)
{
var dtTmp = this;
switch (strInterval) {
case 's' :return new Date(Date.parse(dtTmp) + (1000 * Number));
case 'n' :return new Date(Date.parse(dtTmp) + (60000 * Number));
case 'h' :return new Date(Date.parse(dtTmp) + (3600000 * Number));
case 'd' :return new Date(Date.parse(dtTmp) + (86400000 * Number));
case 'w' :return new Date(Date.parse(dtTmp) + ((86400000 * 7) * Number));
case 'q' :return new Date(dtTmp.getFullYear(), (dtTmp.getMonth()) + Number*3, dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());
case 'm' :return new Date(dtTmp.getFullYear(), (dtTmp.getMonth()) + Number, dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());
case 'y' :return new Date((dtTmp.getFullYear() + Number), dtTmp.getMonth(), dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());
}
}
function conutice_ajax(n1,n2,n3,n4) {
   setTimeout(function(){
   $.ajax({
    url: 'ad_counts4.asp?st=send',
    data: {start_time: n1, ostart_time: n2, end_time: n3, nowdays: n4},
    error: function(xhr) {
      alert('Ajax request 發生錯誤');
      button_set(1);
    },
    success: function(response) {
      if($("#outtable")) $("#outtable").html($("#outtable").html()+response);
      else $("#outdiv").html(response);
    }
  })
}
  , 3000); 
}
function check_form() {
	if(!$("#start_time").val()) {
		alert("請輸入開始時段。");
		$("#start_time").focus();
		return false;
	}
	if(!$("#end_time").val()) {
		alert("請輸入結束時段。");
		$("#end_time").focus();
		return false;
	}
  if(isNaN(Date.parse($("#start_time").val()))) {
    alert("你輸入的開始時段不是日期格式。");
    $("#start_time").val("");
		$("#start_time").focus();
		return false;
  }
  if(isNaN(Date.parse($("#end_time").val()))) {
    alert("你輸入的結束時段不是日期格式。");
    $("#end_time").val("");
		$("#end_time").focus();
		return false;
  }
    button_set(0);
    if($("#outtable")) $("#outtable").html("");
    $("#outmsg").html("讀取資料中...<img src='img/wait_loading.gif' align='middle'>");
    $("#outmsg").show();
    $.ajax({
    url: 'ad_counts4.asp?st=send',
    data: {start_time: $("#start_time").val(), ostart_time: $("#start_time").val(), end_time: $("#end_time").val()},
    error: function(xhr) {
      alert('Ajax request 發生錯誤');
      button_set(1);
    },
    success: function(response) {      
      $("#outdiv").html(response);
    }
  });

	return false;
}
function outmsg_show(msg) {
$("#outmsg").html(msg);
$('html, body').animate({scrollTop: $('body').height()}, 800);
}
function button_set(n) {
if(n) {
    $(":button").attr("disabled", false);
    $(":submit").attr("disabled", false);
} else {
    $(":button").attr("disabled", true);
    $(":submit").attr("disabled", true);
}
}
function GetDateStr(AddDayCount)
{
var dd = new Date();
dd.setDate(dd.getDate()+AddDayCount);
return dd.pattern("yyyy-MM-dd");
}
Date.prototype.pattern=function(fmt) {     
    var o = {     
    "M+" : this.getMonth()+1, //月份     
    "d+" : this.getDate(), //日     
    "h+" : this.getHours()%12 == 0 ? 12 : this.getHours()%12, //小?     
    "H+" : this.getHours(), //小?     
    "m+" : this.getMinutes(), //分     
    "s+" : this.getSeconds(), //秒     
    "q+" : Math.floor((this.getMonth()+3)/3), //季度     
    "S" : this.getMilliseconds() //毫秒     
    };     
    var week = {     
    "0" : "\u65e5",     
    "1" : "\u4e00",     
    "2" : "\u4e8c",     
    "3" : "\u4e09",     
    "4" : "\u56db",     
    "5" : "\u4e94",     
    "6" : "\u516d"    
    };     
    if(/(y+)/.test(fmt)){     
        fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));     
    }     
    if(/(E+)/.test(fmt)){     
        fmt=fmt.replace(RegExp.$1, ((RegExp.$1.length>1) ? (RegExp.$1.length>2 ? "\u661f\u671f" : "\u5468") : "")+week[this.getDay()+""]);     
    }     
    for(var k in o){     
        if(new RegExp("("+ k +")").test(fmt)){     
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));     
        }     
    }     
    return fmt;     
}
var today = new Date();
var _day = 1000 * 60 * 60 * 24;

this.getThisWeekDate = getThisWeekDate;
this.getPrevWeekDate = getPrevWeekDate;
this.getThisMonthDate = getThisMonthDate;
this.getPrevMonthDate = getPrevMonthDate;
this.getThisYearDate = getThisYearDate;
this.getPrevYearDate = getPrevYearDate;

function getThisWeekDate() {
        // 第一天日期
        var firstDay = new Date(today - (today.getDay() - 1) * _day);
        // 最后一天日期
        var lastDay = new Date((firstDay * 1) + 6 * _day);
       return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
}
function getPrevWeekDate() {
        // 取上周?束日期
        var lastDay = new Date(today - (today.getDay()) * _day);
        // 取上周?始日期
        var firstDay = new Date((lastDay * 1) - 6 * _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
}
function getThisMonthDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(),today.getMonth(),1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(),today.getMonth()+1,1);
        var lastDay = new Date(nextDat-_day);
       return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
}
function getPrevMonthDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(),today.getMonth()-1,1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(),today.getMonth(),1);
        var lastDay = new Date(nextDat-_day);
       return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
}
function getThisYearDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(),0,1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear()+1,0,1);
        var lastDay = new Date(nextDat-_day);
       return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
}
function getPrevYearDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear()-1,0,1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(),0,1);
        var lastDay = new Date(nextDat-_day);
       return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
}

function fast_sel_time(flag) {
	switch(flag) {
	 case 0:
	  $("#start_time").val(GetDateStr(0));
	  $("#end_time").val(GetDateStr(0));
	 break;
	 case 1:
	  $("#start_time").val(GetDateStr(-1));
	  $("#end_time").val(GetDateStr(-1));
	 break;	
	 case 2:
	  $("#start_time").val(GetDateStr(-2));
	  $("#end_time").val(GetDateStr(-2));
	 break;
	 case 3:
	  $("#start_time").val(getThisWeekDate()[0]);
	  $("#end_time").val(getThisWeekDate()[1]);
	 break;	 
	 case 4:
	  $("#start_time").val(getPrevWeekDate()[0]);
	  $("#end_time").val(getPrevWeekDate()[1]);
	 break;
	 case 5:
	  $("#start_time").val(getThisMonthDate()[0]);
	  $("#end_time").val(getThisMonthDate()[1]);
	 break;
	 case 6:
	  $("#start_time").val(getPrevMonthDate()[0]);
	  $("#end_time").val(getPrevMonthDate()[1]);
	 break;	
	 case 7:
	  $("#start_time").val(getThisYearDate()[0]);
	  $("#end_time").val(getThisYearDate()[1]);
	 break;
	 case 8:
	  $("#start_time").val(getPrevYearDate()[0]);
	  $("#end_time").val(getPrevYearDate()[1]);
	 break;		
  }
  $("#counts_form").submit();
}
function show_start_time() {
            var TIME_CAL = new Calendar({
            				inputField: "start_time",
                    //cont: "live_time_msg",
                    weekNumbers: false,
                    trigger:"start_time",
                    bottomBar: true,
                    dateFormat: "%Y-%m-%d",
                    //min: Calendar.dateToInt(today),
                    selectionType: Calendar.SEL_SINGLE,
                    showTime: false,
                    onSelect: function() {
                      var $sv = $("#start_time").val();
                      $("#end_time").val($sv);
                    	this.hide(); 
                    	},
                    onBlur: function() { this.hide(); }
            });
            //TIME_CAL.hide();
          return TIME_CAL;
}
show_start_time();
function show_end_time() {
            var TIME_CAL = new Calendar({
            				inputField: "end_time",
                    //cont: "live_time_msg",
                    weekNumbers: false,
                    trigger:"end_time",
                    bottomBar: true,
                    dateFormat: "%Y-%m-%d",
                    //min: Calendar.dateToInt(today),
                    selectionType: Calendar.SEL_SINGLE,
                    showTime: false,
                    onSelect: function() { this.hide(); },
                    onBlur: function() { this.hide(); }
            });
            //TIME_CAL.hide();
          return TIME_CAL;
}
show_end_time();
</script>