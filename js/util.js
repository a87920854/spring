$(function () {    
    if (ismsie()) $(".modal").removeClass("fade");
   // var $table_responsive_table = $("<div>").addClass("table-responsive");	 
   //$("table").wrap($table_responsive_table);
   
});
function ismsie() {

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer, return version number
            return true;
        else return false;
}
var myApp;
myApp = myApp || (function () {
    var pleaseWaitDiv = $('<div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"></div><div class="modal-body"><div class="progress"><div class="progress-bar progress-bar-striped active" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">處理中...</div></div></div></div></div></div></div>');
    return {
        showPleaseWait: function() {
            pleaseWaitDiv.modal();
        },
        hidePleaseWait: function () {
            pleaseWaitDiv.modal('hide');
        },

    };
})();
var $pay2timer = 0;
var $pay2timern = 1;

function personnel_get(v, p, r) {
  var $val = $("#"+v).val(),
      $pay2 = $("#"+p);
	  $pay2_o = $("#"+p+" option");
  $pay2_o.remove();  

  $pay2.append($("<option></option>").attr("value", "").text("載入資料中-"+$pay2timern+" 秒"));
  if($val) {
  clearInterval($pay2timer);
  $pay2timern = 1;
  $pay2timer = setInterval(function(){ $pay2timern++;$pay2.find("option:first").text("載入資料中-"+$pay2timern+" 秒"); }, 1000);
    $.ajax({
	 type: "POST",
     url: "ad_ajax.asp",
     data: {st: "get_personnel", branch: $val},
	 error: function(xhr) {},
	 success: function(response) {
	  if(response == "error") {
       alert("秘書名單錯誤。");
       $pay2.find("option:first").attr("value", "").text("載入失敗");
	  } else {	  	
	  	clearInterval($pay2timer);
	  	$pay2.find("option:first").attr("value", "").text("請選擇");
	    $.each(response.split(","),function(key, value){
          $pay2.append($("<option></option>").attr("value", value.split("|_|")[0]).text(value.split("|_|")[1]));
        });
		if(r) $pay2.val(r);
	  }
     }
    });
  } else {
  	$("#"+p+" option").remove();
  	$pay2.append($("<option></option>").attr("value", "").text("請選擇"));	  	
  }
}


function personnel_get_action(v, p, r) {
  var $val = $("#"+v).val(),
      $pay2 = $("#"+p);
	  $pay2_o = $("#"+p+" option");
  $pay2_o.remove();  

  $pay2.append($("<option></option>").attr("value", "").text("載入資料中-"+$pay2timern+" 秒"));
  if($val) {
  clearInterval($pay2timer);
  $pay2timern = 1;
  $pay2timer = setInterval(function(){ $pay2timern++;$pay2.find("option:first").text("載入資料中-"+$pay2timern+" 秒"); }, 1000);
    $.ajax({
	 type: "POST",
     url: "ad_ajax.asp",
     data: {st: "get_personnel_action", branch: $val},
	 error: function(xhr) {},
	 success: function(response) {
	  if(response == "error") {
       alert("秘書名單錯誤。");
       $pay2.find("option:first").attr("value", "").text("載入失敗");
	  } else {	  	
	  	clearInterval($pay2timer);
	  	$pay2.find("option:first").attr("value", "").text("請選擇");
	    $.each(response.split(","),function(key, value){
          $pay2.append($("<option></option>").attr("value", value).text(value));
        });
		if(r) $pay2.val(r);
	  }
     }
    });
  } else {
  	$("#"+p+" option").remove();
  	$pay2.append($("<option></option>").attr("value", "").text("請選擇"));	  	
  }
}
function personnel_get_onlyname(v, p, r) {
  var $val = $("#"+v).val(),
      $pay2 = $("#"+p);
	  $pay2_o = $("#"+p+" option");
  $pay2_o.remove();  

  $pay2.append($("<option></option>").attr("value", "").text("載入資料中-"+$pay2timern+" 秒"));
  if($val) {
  clearInterval($pay2timer);
  $pay2timern = 1;
  $pay2timer = setInterval(function(){ $pay2timern++;$pay2.find("option:first").text("載入資料中-"+$pay2timern+" 秒"); }, 1000);
    $.ajax({
	 type: "POST",
     url: "ad_ajax.asp",
     data: {st: "get_personnel", branch: $val},
	 error: function(xhr) {},
	 success: function(response) {
	  if(response == "error") {
       alert("秘書名單錯誤。");
       $pay2.find("option:first").attr("value", "").text("載入失敗");
	  } else {	  	
	  	clearInterval($pay2timer);
	  	$pay2.find("option:first").attr("value", "").text("請選擇");
	    $.each(response.split(","),function(key, value){
          $pay2.append($("<option></option>").attr("value", value.split("|_|")[1]).text(value.split("|_|")[1]));
        });
		if(r) $pay2.val(r);
	  }
     }
    });
  } else {
  	$("#"+p+" option").remove();
  	$pay2.append($("<option></option>").attr("value", "").text("請選擇"));	  	
  }
}
function personnel_get_find(v, p, r) {
  var $val = $("#"+v).val(),
      $pay2 = $("#"+p);
	  $pay2_o = $("#"+p+" option");
  $pay2_o.remove();
  
  $pay2.append($("<option></option>").attr("value", "").text("載入資料中-"+$pay2timern+" 秒"));
  if($val) {  	
  clearInterval($pay2timer);
  $pay2timern = 1;
  $pay2timer = setInterval(function(){ $pay2timern++;$pay2.find("option:first").text("載入資料中-"+$pay2timern+" 秒"); }, 1000);
    $.ajax({
	 type: "POST",
     url: "ad_ajax.asp",
     data: {st: "get_personnel_find", branch: $val},
	 error: function(xhr) {},
	 success: function(response) {
	  if(response == "error") {
       alert("秘書名單錯誤。");
       $pay2.find("option:first").attr("value", "").text("載入失敗");
	  } else {
	  	clearInterval($pay2timer);
	  	$pay2.find("option:first").attr("value", "").text("請選擇");
	    $.each(response.split(","),function(key, value){
          if(value.split("|_|")[0] == "no") $op = $("<option></option>").attr("value", value.split("|_|")[0]).text(value.split("|_|")[1]);
          else $op = $("<option></option>").attr("value", value.split("|_|")[0]).text(value.split("|_|")[1]);
          
          $pay2.append($op);
          
        });
		if(r) $pay2.val(r);
	  }
     }
    });
  } else {
  	$("#"+p+" option").remove();
  	$pay2.append($("<option></option>").attr("value", "").text("請選擇"));	  	
  }
}
function personnel_get_funsend(v, p, r) {
  var $val = $("#"+v).val(),
      $pay2 = $("#"+p);
	  $pay2_o = $("#"+p+" option");
  $pay2_o.remove();
  
  $pay2.append($("<option></option>").attr("value", "").text("載入資料中-"+$pay2timern+" 秒"));
  if($val) {  	
  clearInterval($pay2timer);
  $pay2timern = 1;
  $pay2timer = setInterval(function(){ $pay2timern++;$pay2.find("option:first").text("載入資料中-"+$pay2timern+" 秒"); }, 1000);
    $.ajax({
	 type: "POST",
     url: "ad_ajax.asp",
     data: {st: "get_personnel", branch: $val, flag:r},
	 error: function(xhr) {},
	 success: function(response) {
	  if(response == "error") {
       alert("秘書名單錯誤。");
       $pay2.find("option:first").attr("value", "").text("載入失敗");
	  } else {
	  	clearInterval($pay2timer);
	  	$pay2.find("option:first").attr("value", "").text("請選擇");
	    $.each(response.split(","),function(key, value){
          $pay2.append($("<option></option>").attr("value", value.split("|_|")[0]).text(value.split("|_|")[1]));
        });
	  }
     }
    });
  } else {
  	$("#"+p+" option").remove();
  	$pay2.append($("<option></option>").attr("value", "").text("請選擇"));	  	
  }
}
function personnel_get_send(v, p) {
  var $val = $("#"+v).val(),
      $pay2 = $("#"+p);
	  $pay2_o = $("#"+p+" option");
  $pay2_o.remove();
  
  $pay2.append($("<option></option>").attr("value", "").text("載入資料中-"+$pay2timern+" 秒"));  
  if($val) {
  clearInterval($pay2timer);
  $pay2timern = 1;
  $pay2timer = setInterval(function(){ $pay2timern++;$pay2.find("option:first").text("載入資料中-"+$pay2timern+" 秒"); }, 1000);

    $.ajax({
	 type: "POST",
     url: "ad_ajax.asp",
     data: {st: "get_personnel", branch: $val},
	 error: function(xhr) {},
	 success: function(response) {
	  if(response == "error") {
       alert("秘書名單錯誤。");
       $pay2.find("option:first").attr("value", "").text("載入失敗");
	  } else {
	  	clearInterval($pay2timer);
	  	$("#"+p+" option").remove();
	  	$pay2.append($("<option></option>").attr("value", "").text("請選擇"));	  	
	    $.each(response.split(","),function(key, value){
          $pay2.append($("<option></option>").attr("value", value.split("|_|")[0]).text(value.split("|_|")[1]));
        });
		$("#"+p+" option:eq(1)").attr("selected", "selected");
	  }
     }
    });
  } else {
  	$("#"+p+" option").remove();
  	$pay2.append($("<option></option>").attr("value", "").text("請選擇"));	  	
  }
}
function personnel_get_invite(v, p, r) {
  var $val = $("#"+v).val(),
      $pay2 = $("#"+p);
	  $pay2_o = $("#"+p+" option");
  $pay2_o.remove();
  //$pay2.append($("<option></option>").attr("value", "").text("請選擇"));
  if($val) {
    $.ajax({
	 type: "POST",
     url: "ad_ajax.asp",
     data: {st: "get_personnel", branch: $val, invite: "1"},
	 error: function(xhr) {},
	 success: function(response) {
	  if(response == "error") {
       alert("秘書名單錯誤。");
	  } else {       
	    $.each(response.split(","),function(key, value){
          $pay2.append($("<option></option>").attr("value", value.split("|_|")[0]).text(value.split("|_|")[1]));
        });
		if(r) $pay2.val(r);
	  }
     }
    });
  } else $pay2.append($("<option></option>").attr("value", "").text("請選擇"));
}
function pay_personnel_get_old0305(v, p, r) {
  var $val = $("#"+v).val(),
      $pay2 = $("#"+p);
	  $pay2_o = $("#"+p+" option");
    $pay2_o.remove();  
  
  $pay2.append($("<option></option>").attr("value", "").text("載入資料中-"+$pay2timern+" 秒"));
  if($val) {
  clearInterval($pay2timer);  
  $pay2timern = 1;
  $pay2timer = setInterval(function(){ $pay2timern++;$pay2.find("option:first").text("載入資料中-"+$pay2timern+" 秒"); }, 1000);
    $.ajax({
	 type: "POST",
     url: "ad_ajax.asp",
     data: {st: "get_pay_personnel", branch: $val},
	 error: function(xhr) {},
	 success: function(response) {
	  if(response == "error") {
       alert("秘書名單錯誤。");
       $pay2.find("option:first").attr("value", "").text("載入失敗");
	  } else {
	  	clearInterval($pay2timer);
	  	$pay2.find("option:first").attr("value", "").text("請選擇");
	    $.each(response.split(","),function(key, value){
          $pay2.append($("<option></option>").attr("value", value.split("|_|")[0]).text(value.split("|_|")[1]));
        });
		if(r) $pay2.val(r);
	  }
     }
    });
  } else {
  	$("#"+p+" option").remove();
  	$pay2.append($("<option></option>").attr("value", "").text("請選擇"));	  	
  }
}
function pay_personnel_get(v, p, r) {
  var $val = $("#"+v).val(),
      $pay2 = $("#"+p);
	  $pay2_o = $("#"+p+" option");
    $pay2_o.remove();  
  
  $pay2.append($("<option></option>").attr("value", "").text("載入資料中-"+$pay2timern+" 秒"));
  if($val) {
  clearInterval($pay2timer);  
  $pay2timern = 1;
  $pay2timer = setInterval(function(){ $pay2timern++;$pay2.find("option:first").text("載入資料中-"+$pay2timern+" 秒"); }, 1000);
    $.ajax({
	 type: "POST",
     url: "ad_ajax.asp",
     data: {st: "get_pay_personnel", branch: $val},
	 error: function(xhr) {},
	 success: function(response) {
	  if(response == "error") {
       alert("秘書名單錯誤。");
       $pay2.find("option:first").attr("value", "").text("載入失敗");
	  } else {
	  	clearInterval($pay2timer);
	  	$pay2.find("option:first").attr("value", "").text("請選擇");
	    $.each(response.split(","),function(key, value){
          $pay2.append($("<option></option>").attr("value", value.split("|_|")[0]).text(value.split("|_|")[1]));
        });
		if(r) $pay2.val(r);
	  }
     }
    });
  } else {
  	$("#"+p+" option").remove();
  	$pay2.append($("<option></option>").attr("value", "").text("請選擇"));	  	
  }
}
function pay_personnel_get2(v, p, r) {
  var $val = $("#"+v).val(),
      $pay2 = $("#"+p);
	  $pay2_o = $("#"+p+" option");
  $pay2_o.remove();  
  $pay2.append($("<option></option>").attr("value", "").text("載入資料中-"+$pay2timern+" 秒"));
    
  if($val) {
  clearInterval($pay2timer);
  $pay2timern = 1;
  $pay2timer = setInterval(function(){ $pay2timern++;$pay2.find("option:first").text("載入資料中-"+$pay2timern+" 秒"); }, 1000);
    $.ajax({
	 type: "POST",
     url: "ad_ajax.asp",
     data: {st: "get_pay_personnel2", branch: $val},
	 error: function(xhr) {},
	 success: function(response) {
	  if(response == "error") {
       alert("秘書名單錯誤。");
       $pay2.find("option:first").attr("value", "").text("載入失敗");
	  } else {
	  	clearInterval($pay2timer);
	  	$pay2.find("option:first").attr("value", "").text("請選擇");
	    $.each(response.split(","),function(key, value){
          $pay2.append($("<option></option>").attr("value", value.split("|_|")[0]).text(value.split("|_|")[1]));
        });
		if(r) $pay2.val(r);
	  }
     }
    });
  } else {
  	$("#"+p+" option").remove();
  	$pay2.append($("<option></option>").attr("value", "").text("請選擇"));	  	
  }
}

function centerWindow(theURL,winName,width,height,features) {
    var window_width = width;
    var window_height = height;
    var edfeatures= features;
    var window_top = (screen.height-window_height)/2;
    var window_left = (screen.width-window_width)/2;
    newWindow=window.open(''+ theURL + '',''+ winName + '','width=' + window_width + ',height=' + window_height + ',top=' + window_top + ',left=' + window_left + ',features=' + edfeatures + '');
    newWindow.focus();
}
function Mars_popup(theURL,winName,features) { //【火星人】Version 1.0
	if(winName == '') winName = '_blank';
  window.open(theURL,winName,features);
}
function Mars_popup2(theURL,winName,features) { //【火星人】Version 1.0
	if(winName == '') winName = '_blank';
  if (window.confirm("確定刪除")==true) {
  window.open(theURL,winName,features);
   }else{
  alert("重新選擇");
 }
}
function bmicount() {
	var mem_he = $("#mem_he"), mem_we = $("#mem_we"), mem_wet = $("#mem_wet"), mem_bmi = $("#mem_bmi");
	mem_bmi.val("0");
	if($.isNumeric(mem_he.val()) && $.isNumeric(mem_we.val())) {		
		he = parseFloat(mem_he.val());
		we = parseFloat(mem_we.val());
		if(he <= 0 || we <= 0) mem_bmi.val("0");
		else {
			he /= 100;
			he *= he;
			bmi = we/he;
			bmi = bmi.toFixed(1);
			mem_bmi.val(bmi);
			bmicount_changewet(bmi, mem_wet);
	  }
	}
}
function bmicount_changewet(bmi, cn) {
	if(bmi <= 18) cn.val("偏瘦");
	else if(bmi > 18 && bmi < 24) cn.val("中等");
	else if(bmi >= 24) cn.val("偏肉");
}