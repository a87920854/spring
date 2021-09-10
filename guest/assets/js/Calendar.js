var current = 
{
	'year':  new Date().getFullYear(),
	'month': new Date().getMonth() + 1,
	'date':  new Date().getDate()
};

var choose = 
{
	'year':  current.year,
	'month': current.month,
	'date':  current.date,
	'hour':  0,
	'minute':0
};
var $clickdate = 0;
$(function()
{
	drawCalendar(current);
	loaddatedata();
	$('#calendar tbody').on({click: function()
	{		
		$('#calendar tbody td.selected').removeClass('selected');		
		choose.date = parseFloat($(this).text());
		$clickdate = choose.date;
		$(this).addClass('selected');
		showList();
		$("#right-box-list").html("");
		$("#right-show-non-date").fadeIn();
	}}, "td:not(.myfun)");
	
	$('#lastMonth').click(function(){changeMonth(-1)});
	$('#year').click(     function(){changeMonth(0)});	//back to current year
	$('#nextMonth').click(function(){changeMonth(1)});
	
});

function changeMonth(changeRange)
{
	//if(changeRange == 0 && choose.year == current.year) return false;
	if(changeRange == 0) {
		if(choose.year == current.year && choose.month == current.month) return false;
		choose.year = current.year
		choose.month = current.month
	} else choose.month = choose.month += changeRange;	
	
	var lastOrNextYear = (choose.month > 12) - (choose.month < 1);	//Jump to Last Year(= -1) or Next Year(= 1) or not(= 0)
	choose.year += lastOrNextYear;
	choose.month -= 12 * lastOrNextYear;	//Last Year(0 + 12), Next Year(13 - 12)
	
	var currentYearAndMonth = (choose.year == current.year && choose.month == current.month)
	choose.date = currentYearAndMonth ? current.date : 1;
	
	drawCalendar(choose);
	loaddatedata();
}
/* 左邊補0 */
function padLeft(str, len) {
    str = '' + str;
    if (str.length >= len) {
        return str;
    } else {
        return padLeft("0" + str, len);
    }
}
function member_array(str, arr) {
	var $result = 0;
	$.map( arr, function( val, key ) {		
    if( key == str  ) $result = 1;
  });
    if($result) return true;
    return false;
}

function drawCalendar(dateJSON)
{
	$('#year').html(dateJSON.year + " 年 " + dateJSON.month + " 月 ");
	var dateEnd = new Date(dateJSON.year, dateJSON.month, 0).getDate();	//Get the end of the choosed month(28, 29, 30 or 31)
	var dayStart = new Date(dateJSON.year, (dateJSON.month - 1), 1).getDay(); //Get choosed month's first day
	
	var dateList = "<tr>";
	if(dayStart > 0)
		dateList += "<td id=\"ignoreData\" colspan=" + dayStart + "></td>";
		
	var dateCount = 1;
	var SaturdayDate = 7 - dayStart;
	while(dateCount <= dateEnd)
	{
		//dateCount++;
		$dayWeek = 0;
		var $dayWeekday = new Date(dateJSON.year, (dateJSON.month-1), dateCount); //Get choosed week day
		$dayWeek = $dayWeekday.getDay();    
    
		$ymd = dateJSON.year+"_"+padLeft(dateJSON.month, 2)+"_" + padLeft(dateCount, 2);
		if(parseFloat($dayWeek) == 6 || parseFloat($dayWeek) == 0) $cl = " class=\"weekday\"";
		else $cl = "";
		
		dateList += "<td id=\"calendar_td_"+ $ymd +"\""+$cl+">"+dateCount+"</td>";
		dateCount++;
		if(dateCount > SaturdayDate)	//new week
		{					        //Final week
			SaturdayDate = ((dateCount + 6) > dateEnd) ? dateEnd : (dateCount + 6);
			dateList += "</tr><tr>";
		}
	}
	
	dateList += "</tr>";
	$('#calendar tbody').html(dateList)
						.find('td')
						.filter(function() {return (dateJSON.year == current.year && dateJSON.month == current.month && parseFloat($(this).text()) == current.date);})
						.addClass('selected');												
	showList();	
	$("#right-box-list").html("");		
	$("#right-show-non-date").fadeIn();
	readrightdatedata();
	$clickdate = current.date;
}

function showList() {	
  $("#calendar caption").html($("#year").text() + choose.date + "日 " ); 
  $("#right-show-title h4").html($("#year").text() + choose.date + " 日 行程列表");  
  
}
function loaddatedata() {
	//開始讀資料  
  make_overlay("box-calendar");  
  $.ajax({
  method: "POST",
  url: "notice.asp",
  data: { st: "readdate", t: choose.year+"/"+padLeft(choose.month, 2)+"/" + padLeft(choose.date, 2)}
  }).done(function( msg ) {
    if(msg == "err") return false;
    else setdatedata(msg);    	
    make_overlay("remove");
  });
  
}

function setdatedata(msg) {	
	if(msg.length > 1) {
		$.each( msg.split(","), function( i, val ) {
			val1 = val.split("|")[0];
			val2 = val.split("|")[1];			
			
			$("#calendar_td_"+val1).on("click", function(e) {				
				if(parseFloat($(this).text()) == $clickdate) {					
				} else {					
					choose.date = parseFloat($(this).text());
					$clickdate = choose.date;							  
				  showList();
				  $('#calendar tbody td.selected').removeClass('selected');		
				  $(this).addClass('selected');
				  readrightdatedata();				
			  }
			}).addClass(val2).addClass("myfun");
			
    });		
	}
}
function readrightdatedata() {
	
	make_overlay("box-calendar-list");
	$.ajax({
  method: "POST",
  url: "notice.asp",
  data: { st: "readrightdatedata", t: choose.year+"/"+padLeft(choose.month, 2)+"/" + padLeft(choose.date, 2)}
  }).done(function( msg ) {
    if(msg == "err") return false;
    else if(msg) {    	
    	$("#right-show-non-date").fadeOut(function() {
    	  $("#right-box-list").hide().html(msg).fadeIn();	
    	});
      
    }
    make_overlay("remove");
  });
  
}
function prependZero(vari) {return (vari < 10) ? ("0" + vari) : vari;}
