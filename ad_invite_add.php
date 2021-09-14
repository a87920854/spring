<STYLE TYPE="text/css">
  table {
    font-size: 13px;
  }

  table td {
    height: 30px;
  }

  table select {
    height: 30px;
    border: #ddd 1px solid;
    padding-left: 5px;
  }

  table input:not([type=checkbox]) {
    height: 30px;
    color: #555;
    border: #ddd 1px solid;
    padding-left: 5px;
  }

  .ttable td {
    padding: 3px;
    padding-left: 5px;
  }

  .btn {
    text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.4);
    height: 33px;
    color: #333;
    background-color: #fff;
    border: #666 1px solid !important;
    display: inline-block;
    padding: 6px 12px !important;
    ;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
  }

  .btn:hover {
    color: #000;
    background-color: #ddd;
  }
</STYLE>
<html>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/util.js"></script>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>春天會館</title>
</head>

<body leftmargin="0" topmargin="0">
  <table width="100%" border="0" align="center">
    <tr>
      <td>
        <fieldset>
          <legend>春天會館資料 - 新增約見紀錄</legend>
          <table width="100%" border="0" align="center" cellpadding="3">
            <tr bgcolor="#FFF0E1">
              <td bgcolor="#336699" colspan=2 align="center" height=20></td>
            </tr>
            <tr>
              <td bgcolor="#F0F0F0" colspan=2>
                <form style="margin:0px;" action="?st=read" method="post" id="form1" onSubmit="return chk_form1()">被約見人編號或手機： <input name="keyword" type="text" id="keyword" value="" size="20"> <input type="submit" value="讀取資料"></form>
              </td>
            </tr>
            <form action="?st=add" method="post" id="form2" onSubmit="return chk_form()">
              <tr>
                <td bgcolor="#F0F0F0">
                  開發：
                  <select name="branch" id="branch">
                    <option value="" selected>請選擇</option>
                    <option value="總管理處">總管理處</option>
                  </select>
                  <select name="single" id="single">
                    <option value="">請選擇</option>
                  </select>
                  邀約：
                  <select name="single2" id="single2">
                    <option value="">請選擇</option>
                  </select>
                </td>
                <td bgcolor="#F0F0F0">
                  受理：
                  <select name="branch3" id="branch3">
                    <option value="" selected>請選擇</option>
                    <option value="台北">台北</option>
                    <option value="桃園">桃園</option>
                    <option value="新竹">新竹</option>
                    <option value="台中">台中</option>
                    <option value="台南">台南</option>
                    <option value="高雄">高雄</option>
                    <option value="八德">八德</option>
                    <option value="約專">約專</option>
                    <option value="迷你約">迷你約</option>
                    <option value="總管理處">總管理處</option>
                  </select><select name="single3" id="single3">
                    <option value="">請選擇</option>
                  </select>&nbsp;(跨區請選擇該區督導)
                </td>
              </tr>
              <tr>
                <td bgcolor="#F0F0F0" width="50%">姓名： <input name="n1" type="text" id="n1" value="" size="15">
                  <select name="n22" id="n22">
                    <option value="">請選擇</option>
                    <option value="1">會館約見</option>
                    <option value="2">視訊約見</option>
                  </select>

                </td>
                <td bgcolor="#F0F0F0">性別： <select name="n2" id="n2">
                    <option value="男">男</option>
                    <option value="女">女</option>
                  </select></td>
              </tr>
              <tr>
                <td bgcolor="#F0F0F0">年次： <input name="n3" type="text" id="n3" value="" size="20"></td>
                <td bgcolor="#F0F0F0">學歷： <select name="n4" id="n4">
                    <option value="">請選擇</option>
                    <option value="國中">國中</option>
                    <option value="高中">高中</option>
                    <option value="高職">高職</option>
                    <option value="專科">專科</option>
                    <option value="大學">大學</option>
                    <option value="碩士">碩士</option>
                    <option value="博士">博士</option>
                    <option value="其他">其他</option>
                  </select></td>
              </tr>
              <tr>
                <td bgcolor="#F0F0F0">身高： <input name="n5" type="text" id="n5" value="" size="20"></td>
                <td bgcolor="#F0F0F0">體重： <input name="n6" type="text" id="n6" value="" size="20"></td>
              </tr>
              <tr>
                <td bgcolor="#F0F0F0">工作情形： <input name="n7" type="text" id="n7" value="" size="20"></td>
                <td bgcolor="#F0F0F0">資料來源： <select name="n8" id="n8">
                    <option value="自來">自來</option>
                    <option value="流水陌call">流水陌call</option>
                    <option value="樂得流水call">樂得流水call</option>
                    <option value="樂得系統回call">樂得系統回call</option>
                    <option value="萊優流水call">萊優流水call</option>
                    <option value="萊優Robotcall">萊優Robotcall</option>
                    <option value="手機1111">手機1111</option>
                    <option value="客人自來電">客人自來電</option>
                    <option value="訪客自來">訪客自來</option>
                    <option value="來過未參追">來過未參追</option>
                    <option value="活動宣傳">活動宣傳</option>
                    <option value="五人未入會">五人未入會</option>
                    <option value="外部A名單">外部A名單</option>
                    <option value="外部B名單">外部B名單</option>
                    <option value="外部C名單">外部C名單</option>
                    <option value="春天部落格">春天部落格</option>
                    <option value="通路王">通路王</option>
                    <option value="高接觸率流水號">高接觸率流水號</option>
                    <option value="台灣電話流水序號開發">台灣電話流水序號開發</option>
                    <option value="手機123">手機123</option>
                    <option value="手機104">手機104</option>
                    <option value="台灣推薦名單">台灣推薦名單</option>
                    <option value="舊資料再開發">舊資料再開發</option>
                    <option value="好好玩名單">好好玩名單</option>
                    <option value="Cheers雜誌報導">Cheers雜誌報導</option>
                    <option value="2016Cheers名單">2016Cheers名單</option>
                    <option value="人力銀行">人力銀行</option>
                    <option value="網站行銷">網站行銷</option>
                    <option value="春天網站">春天網站</option>
                    <option value="DMN名單">DMN名單</option>
                    <option value="DMN網站">DMN網站</option>
                    <option value="約會專家">約會專家</option>
                    <option value="迷你約">迷你約</option>
                    <option value="網站活動">網站活動</option>
                    <option value="網站排約">網站排約</option>
                    <option value="舊系統資料">舊系統資料</option>
                    <option value="台灣舊資料">台灣舊資料</option>
                    <option value="廈門舊資料">廈門舊資料</option>
                    <option value="上海舊資料">上海舊資料</option>
                    <option value="舊資料卡">舊資料卡</option>
                    <option value="520940網站名單">520940網站名單</option>
                    <option value="台灣畢冊開發">台灣畢冊開發</option>
                    <option value="彰化委外名單">彰化委外名單</option>
                    <option value="媒體報導名單">媒體報導名單</option>
                    <option value="合辦活動名單">合辦活動名單</option>
                    <option value="春天會館FB">春天會館FB</option>
                    <option value="微電影活動">微電影活動</option>
                    <option value="億捷創意回收名單">億捷創意回收名單</option>
                    <option value="行銷活動">行銷活動</option>
                    <option value="通路合作">通路合作</option>
                    <option value="FB名單">FB名單</option>
                    <option value="新書發表會">新書發表會</option>
                    <option value="購書贈送活動">購書贈送活動</option>
                    <option value="瑪那熊">瑪那熊</option>
                    <option value="活動通Accupass">活動通Accupass</option>
                    <option value="企劃活動名單">企劃活動名單</option>
                    <option value="其他">其他</option>
                  </select></td>
              </tr>
              <tr>
                <td bgcolor="#F0F0F0">電話： <input name="n9" type="text" id="n9" value="" size="20"></td>
                <td bgcolor="#F0F0F0">手機： <input name="n10" type="text" id="n10" value="" size="20"></td>
              </tr>
              <tr>
                <td bgcolor="#F0F0F0" colspan=2>已預約：
                  <select name="n11y" id="n11y">
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2020">2020</option>
                  </select> 年
                  <select name="n11m" id="n11m">
                    <option value="9">9</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select> 月
                  <select name="n11d" id="n11d">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10" selected>10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                  </select> 日
                  <select name="n11h" id="n11h">
                    <option value="">請選擇</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                  </select>
                  時 <select name="n11mm" id="n11mm">
                    <option value="00">00</option>
                    <option value="30">30</option>
                  </select> 分

                  <span id="obranch">至 待選擇</span> 參觀。
                </td>
              </tr>
              <!-- <tr>
            <td bgcolor="#F0F0F0">開放受理追蹤時間：
            	<select name="f_month" id="f_month">
            		<option value="12" selected>12 個月</option>
            		<option value="9">9 個月</option>
            		<option value="6">6 個月</option>
            		<option value="3">3 個月</option>            		
            	</select></td>
            	<td bgcolor="#F0F0F0"></td>         
          </tr>-->
              <tr>
                <td bgcolor="#F0F0F0" colspan=2>聯絡情形及接待注意事項：<br> <textarea name="n12" id="n12" style="width:95%" rows=3></textarea></td>
              </tr>
              <tr>
                <td bgcolor="#F0F0F0" colspan=2><label class="checkbox"><input type="checkbox" name="nocall" value="1">本次約見不需提醒</label>
                  <label class="checkbox"><input type="checkbox" name="helpcall" value="1">時間暫約，由邀約協助確認</label>
                </td>
              </tr>


              <tr bgcolor="#FFF0E1">
                <td bgcolor="#336699" colspan=2 align="center">
                  <input name="ran" type="hidden" id="ran" value="">
                  <input name="mem_num" type="hidden" id="mem_num" value="">
                  <input name="Submit" type="submit" id="Submit2" value="確定送出">
                </td>
              </tr>
          </table>
        </fieldset>
      </td>
    </tr>
  </table>
  </form>
</body>

</html>

<script language="JavaScript">
  function chk_form1() {
    if (!$("#keyword").val()) {
      alert("請輸入要讀取資料的被約見人編號或手機。");
      $("#keyword").focus();
      return false;
    }
    return true;
  }

  function chk_form() {
    var $allc = {
        "branch": "約見會館",
        "single": "開發秘書",
        "single2": "邀約秘書",
        "branch3": "受理會館",
        "single3": "受理秘書",
        "n1": "姓名",
        "n22": "約見類型",
        "n4": "學歷",
        "n10": "手機",
        "n11h": "小時"
      },
      $allc2 = {
        "n3": "年次",
        "n5": "身高",
        "n6": "體重",
        "n9": "電話",
        "n10": "手機",
        "n11h": "小時"
      },
      $rr = 0;
    $.each($allc, function(v, k) {
      if (!$("#" + v).val()) {
        alert("請輸入或選擇" + k + "。");
        $("#" + v).focus();
        $rr = 1;
        return false;
      }
    });
    $.each($allc2, function(v, k) {
      var $re = /^\d+$/;
      if ($("#" + v).val() && !$re.test($("#" + v).val())) {
        alert(k + "只能輸入數字。");
        $("#" + v).focus();
        $rr = 1;
        return false;
      }
    });

    if (parseInt($("#n11h").val()) < 10) {
      alert("時間過早，請確認輸入的小時為 24 小時制。");
      $("#n11h").focus();
      $rr = 1;
    }

    if ($rr) return false;
    else return true;
  }

  $(function() {
    window.resizeTo(850, 700);


    $("select").not("#n11d").each(function() {
      $(this).get(0).selectedIndex = 0;
    });

    $("#branch").on("change", function() {
      personnel_get("branch", "single");
      personnel_get("branch", "single2");
      wgo();
    });
    $("#branch3").on("change", function() {
      personnel_get("branch3", "single3");
      wgo();
    });
  });

  function wgo() {
    var $outdiv = $("#obranch"),
      $b1v = $("#branch").val(),
      $b2v = $("#branch3").val();
    if ($b1v && $b2v) {
      if ($b1v == $b2v) {
        $("#branch2").val("");
        $("#single2 option").remove();
        $("#single2").append($("<option></option>").attr("value", "").text("請選擇"));
        personnel_get("branch", "single2");
        $outdiv.html("至 " + $b1v);
        return false;
      }
      $outdiv.html("由 " + $b1v + " 約至 " + $b2v + " ");
    } else if ($b1v) {
      $outdiv.html("至 " + $b1v);
    } else {
      $("#branch").val("");
      $("#branch2").val("");
      $outdiv.html("至 待選擇");
    }
  }
</script>