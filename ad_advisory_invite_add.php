

<style type="text/css">
table td {
font-size:12px;
}
</style>
<html>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/util.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>春天會館</title>
</head>

<body leftmargin="0" topmargin="0">
  <table width="660" border="0" align="center">
    <tr> 
      <td><fieldset>
        <legend>春天會館資料 - 新增預訂諮詢</legend>
        <table width="650" border="0" align="center" cellpadding="3">
          <tr bgcolor="#FFF0E1"> 
            <td bgcolor="#336699" colspan=2 align="center" height=20></td>
          </tr>
          <tr>            
            	<td bgcolor="#F0F0F0" colspan=2><form style="margin:0px;" action="?st=read" method="post" id="form1" onSubmit="return chk_form1()">諮詢對象編號/手機/身： <input name="keyword1" type="text" id="keyword1" value="" size="10"> <input type="submit" value="讀取資料">&nbsp;&nbsp;<font color=red>請先讀取資料</font></form></td>
            </td>
          </tr>
		  <form action="?st=add" method="post" id="form2" onSubmit="return chk_form()">
		  <tr>
            <td bgcolor="#F0F0F0">
			處理會館/秘書：<select name="mem_branch" id="mem_branch">
		      <option value="" selected>請選擇</option><option value="總管理處">總管理處</option>
              </select>			 
			  <select name="mem_single" id="mem_single">
			  <option value="">請選擇</option> 
			  </select>
			  </td>
            <td bgcolor="#F0F0F0">
		    講師：
			<select name="mem_wbranch" id="mem_wbranch">
		      <option value="" selected>請選擇</option><option value="台北">台北</option><option value="桃園">桃園</option><option value="新竹">新竹</option><option value="台中">台中</option><option value="台南">台南</option><option value="高雄">高雄</option><option value="八德">八德</option><option value="約專">約專</option><option value="迷你約">迷你約</option><option value="總管理處">總管理處</option>
              </select><select name="mem_who" id="mem_who">
			  <option value="">請選擇</option>
              </select></td>
          </tr>
          <tr><td bgcolor="#F0F0F0" colspan=2>類型：<select name="types" id="types">
          	<option value="一對一諮詢">一對一諮詢</option>
          	<option value="一對一造型諮詢">一對一造型諮詢</option>
          	<option value="一對一愛情諮詢">一對一愛情諮詢</option>
          	<option value="魅力解析">魅力解析</option>      
          	<option value="新會員先修">新會員先修</option>          	          	
          	<option value="戀愛選修1">戀愛選修1</option>      
          	<option value="戀愛選修2">戀愛選修2</option>      
          	<option value="戀愛選修3">戀愛選修3</option>      
          	<option value="戀愛選修4">戀愛選修4</option>      
          	<option value="戀愛選修5">戀愛選修5</option>      
          	<option value="戀愛選修6">戀愛選修6</option>        	
          	</select></td></tr>
          <tr>
            <td bgcolor="#F0F0F0" width="50%">姓名： <input name="mem_name" type="text" id="mem_name" value="" size="20" disabled></td>
			<td bgcolor="#F0F0F0">性別： <select name="mem_sex" id="mem_sex"><option value="男">男</option><option value="女">女</option></select></td>
          </tr>
         
          <tr>
            <td bgcolor="#F0F0F0">電話： <input name="mem_phone" type="text" id="mem_phone" value="" size="20" disabled></td>
			<td bgcolor="#F0F0F0">手機： <input name="mem_mobile" type="text" id="mem_mobile" value="" size="20"></td>
          </tr>
          <tr>
          	<td bgcolor="#F0F0F0" colspan=2>服務成本： <font color=red>0</font>
          		&nbsp;&nbsp;
          		新服務成本： <font color=red>0</font>
          		</td>
          </tr>
          <tr>
            <td bgcolor="#F0F0F0" colspan=2>諮詢時間：
			<select name="n11y" id="n11y">
			<option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2020">2020</option>
			</select> 年
			<select name="n11m" id="n11m"> 
			<option value="9">9</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
			</select> 年
			<select name="n11d" id="n11d">
			<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13" selected>13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
			</select> 日 <select name="n11h" id="n11h">
			  <option value="">請選擇</option>
				<option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
              </select> 時 <select name="n11mm" id="n11mm"><option value="00">00</option><option value="15">15</option><option value="30">30</option><option value="45">45</option></select> 分</td>			
          </tr>          
          <tr>
            <td bgcolor="#F0F0F0" colspan=2>備註：<br> <textarea name="notes" id="notes" style="width:95%" rows=3></textarea></td>			
          </tr>
         
          <tr>
            <td id="timelisterr" style="display:none" bgcolor="#F0F0F0" colspan=2><font color=red>這位講師在已設定在 <span id="timelisterr2"></span> 不接受諮詢預約，請另選時間。</font></td>			
          </tr>  
          
		  <tr bgcolor="#FFF0E1"> 
            <td bgcolor="#336699" colspan=2 align="center">			
			<input name="mem_num" type="hidden" id="mem_num" value="">
			<input name="n1b" type="hidden" id="n1b" value="">
			<input name="ap_4" type="hidden" id="ap_4" value="">
			<input name="ap_4new" type="hidden" id="ap_4new" value="">
			<input name="Submit" type="submit" id="submit2" value="確定送出" disabled></td>
          </tr>
        </table>
        </fieldset></td>
    </tr>
  </table>
</form>
</body>
</html>

<script language="JavaScript">
function chk_form() {
var $allc = {"mem_branch":"處理會館","mem_single":"會員秘書","mem_wbranch":"諮詢會館","mem_who":"諮詢講師","mem_name":"姓名", "mem_mobile":"手機", "n11h":"小時"},
    $allc2 = {"mem_phone":"電話", "mem_mobile":"手機", "n11h":"小時"},
    $rr = 0;
$.each($allc, function(v, k) {
   if(!$("#"+v).val()) {
     alert("請輸入或選擇"+k+"。");
	 $("#"+v).focus();
	 $rr = 1;
	 return false;
   }
});
$.each($allc2, function(v, k) {
   var $re = /^\d+$/;
   if ($("#"+v).val() && !$re.test($("#"+v).val())) {
     alert(k+"只能輸入數字。");
	 $("#"+v).focus();
	 $rr = 1;
     return false;
   }
});
  
  if($rr) return false;
  else return true;
}

$(function() {

 personnel_get("mem_branch", "mem_single", "");
 personnel_get("mem_wbranch", "mem_who", "");

 

  $("#mem_branch").on( "change", function() {  	
     personnel_get("mem_branch", "mem_single");
});
  $("#mem_wbranch").on( "change", function() {
     personnel_get("mem_wbranch", "mem_who");
     $("#n11h").val("");
	   $("#submit2").prop("disabled", true); 
});

$("#mem_who").on( "change", function() {
	$("#n11h").val("");
	$("#submit2").prop("disabled", true); 
});

$("#n11y,#n11m,#n11d,#n11h").on( "change", function() {
	if(!$(this).val()) $("#submit2").prop("disabled", true); 
	if($("#mem_wbranch").val() && $("#mem_who").val() && $("#n11h").val()) {
		$ctime = $("#n11y").val()+"/"+$("#n11m").val()+"/"+$("#n11d").val()+" "+$("#n11h").val()+":"+$("#n11mm").val();		
    $.ajax({
    url: 'ad_advisory_invite_add.asp',
    data: {st:"qtimelist", mem_who: $("#mem_who").val(), ctime: $ctime}
  }).done(function(response) {  
    	if(response) {        
      	$("#timelisterr").hide();
      	$("#submit2").prop("disabled", false);
      } else {
        $("#timelisterr").show();
        $("#timelisterr2").html(response);
        $("#submit2").prop("disabled", true); 
      }
    });
    
	}
	
	
});

});
</script>