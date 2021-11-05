<?php
  /*****************************************/
  //檔案名稱：ad_fun_report.php
  //後台對應位置：好好玩管理系統/會員管理系統
  //改版日期：2021.10.26
  //改版設計人員：Jack
  //改版程式人員：Jack
  /*****************************************/

  require_once("_inc.php");
  require_once("./include/_function.php");

  if( $_SESSION["MM_Username"] == "" ){
    call_alert("請重新登入。","ClOsE",0);
    exit;
  }
  $ty = $_REQUEST["ty"];
  if($ty == ""){
    $ty = "lovekeyin";
  }
  if( $_REQUEST["k_id"] == "" ){
    call_alert("讀取編號有誤。","ClOsE",0);
    exit;
  }

  // 刪除功能
  if( $_REQUEST["st"] == "del" ){
    $rs = $FunConn->prepare("delete from log_data where log_auto = " . $_REQUEST["la"]);
    $rs->execute();
    $url = "ad_fun_report.asp?k_id=" . $_REQUEST["k_id"] . "&ty=" . $ty;
    reURL($url);
    exit;
  }

  // 更新
  if( $_REQUEST["st"] == "send" ){
    switch($ty){
      case "member":
        $SQL = "update member_data set all_type='" . $_REQUEST["log_2"] . "',all_type2='" . $_REQUEST["log_3"] . "' where mem_auto=" . $_REQUEST["k_id"];
        break;
      case "gmember":
        $SQL = "update goldcard_data set all_type='" . $_REQUEST["log_2"] . "',all_type2='" . $_REQUEST["log_3"] . "' where mem_auto=" . $_REQUEST["k_id"];
        break;
      default:
        $SQL = "update love_keyin set all_type='" . $_REQUEST["log_2"] . "',all_type2='" . $_REQUEST["log_3"] . "' where k_id=" . $_REQUEST["k_id"];
        break;      
    }
    $rs = $FunConn->prepare($SQL);
    $rs->execute();

    // 新增log
    $log_time = date("Y-m-d H:i:s");
    $log_num = $_REQUEST["k_id"];
    $log_username = $_REQUEST["log_username"];
    $log_name = $_REQUEST["log_name"];
    $log_branch = $_REQUEST["log_branch"];
    $log_single = $_SESSION["MM_Username"];
    $log_1 = $_REQUEST["k_mobile"];
    $log_2 = $_REQUEST["log_2"];
    if( ($_REQUEST["log_3"] != "") && ($_REQUEST["log_3"] != "請選擇") ){
      $log_3 = str_replace(" ", "", $_REQUEST["log_3"]);
    }
    $log_4 = $_REQUEST["log_4"];
    $log_5 = $_REQUEST["ty"];
    if( ($_REQUEST["log_6"] != "") && ($_REQUEST["log_6"] != "點此預約下次通話") && chkDate($_REQUEST["log_6"]) ){
      $log_6 = $_REQUEST["log_6"];
    }
    $rc = $_REQUEST["rc"];
    $SQL2 = "INSERT INTO log_data (log_time, log_num, log_username, log_name, log_branch, log_single, log_1, log_2, log_3, log_4, log_5, log_6, rc) ";
    $SQL2 .=  "VALUES (" . $log_time ."," . $log_num ."," . $log_username ."," . $log_name ."," . $log_branch ."," . $log_single ."," . $log_1 ."," . $log_2 ."," . $log_3 ."," . $log_4 ."," . $log_5 ."," . $log_6 ."," . $rc . ")";
    $rs2 =  $FunConn->prepare($SQL2);
    $rs2->execute();
    reURL("win_close.php");
    exit;
  }

  // 讀取資料
  switch($ty){
    case "member":
      $SQL = "select mem_name as r1, mem_mobile as r2, all_type as r3, all_type2 as r4 from member_data where mem_auto=" . $_REQUEST["k_id"];
      break;
    case "gmember":
      $SQL = "select mem_name as r1, mem_mobile as r2, all_type as r3, all_type2 as r4 from goldcard_data where mem_auto=" . $_REQUEST["k_id"];
      break;
    default:
      $SQL = "select k_name as r1, k_mobile as r2, all_type as r3, all_type2 as r4 from love_keyin where k_id=" . $_REQUEST["k_id"];
      break;      
  }  
  $rs = $FunConn->prepare($SQL);
  $rs->execute();
  $result = $rs->fetch(PDO::FETCH_ASSOC);
  if(!$result){
    $u_name = "不明";
  }else{
    if($result["r1"] != ""){
      $u_name = $result["r1"];
    }
    if($result["r1"] == ""){
      $u_name = "不明";
    }
    $k_mobile = $result["r2"]; 
  }
  $all_type = $result["r3"];
  $all_type2 = $result["r4"];
  
  // $rs = $FunConn->prepare("select top 1 * from log_data");
  // $rs->execute();
  // $result = $rs->fetch(PDO::FETCH_ASSOC);
  // var_dump($result);
?>

<STYLE TYPE="text/css">
  body, th, td, input, select, textarea, select, checkbox {
    font: 10pt 新細明體
  }
  table{
    margin: auto;
  }
  .a1:link {
    font: 10pt "新細明";
    text-decoration: none;
    color: #990066
  }
  .a1:visited {
    font: 10pt "新細明";
    text-decoration: none;
    color: #990066
  }
  a:link {
    font: 10pt "新細明";
    text-decoration: none;
    color: #0000FF
  }
  a:visited {
    font: 10pt "新細明";
    text-decoration: none;
    color: #0000FF
  }

  a:active {
    font: 10pt "新細明";
    text-decoration: none;
    color: #0000FF
  }
  a:hover {
    font: 10pt "新細明";
    text-decoration: underline;
    color: ff0000
  }
  .style14 {
    font-size: 12px
  }
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
            <td height="25" bgcolor="#336699">
              <div align="center">
                <font color="#990066" size="3"><strong>
                    <font color="#FFFFFF">孫偉文 - 好好玩旅行社回報系統</font>
                  </strong></font>
              </div>
            </td>
          </tr>
        </table>
        <table width="660" border="1" cellpadding="1">
          <?php 
            $rs2 = $FunConn->prepare("SELECT top 200 * FROM log_data WHERE log_num =" . $_REQUEST["k_id"] . " and log_5='" . $ty . "' order by log_time desc");
            $rs2->execute();
            $result2 = $rs2->fetchAll(PDO::FETCH_ASSOC); 
            if(!$result2){
              echo "<tr><td height=200>目前無任何回報紀錄</td></tr>";
            }else{
              foreach( $result2 as $re ){ 
                  if( $re["log_6"] != "" ){
                    $log_6 = "已預約 " . $re["log_6"] . " 聯絡";
                  }else{
                    $log_6 = "";
                  }
                ?>                
                <tr>
                  <td><?php echo $re["log_2"]; ?></td>
                  <td><?php echo $re["log_3"]; ?></td>
                  <td width=300><?php echo $re["log_6"] . $re["log_4"]; ?></td>
                  <td style="font-size:9px">
                    <?php
                      echo $re["log_name"] . "　";
                      if( $_SESSION["MM_UserAuthorization"] == "admin" ){                        
                        echo "<a href=\"?st=del&la=" . $re["log_auto"] . "&k_id=" . $_REQUEST["k_id"] . "&ty=" . $ty . "\">刪</a>";
                      }
                      echo "<br>" . changeDate($re["log_time"]) . "</td></tr>";
                    ?>
                  </td>
                </tr>              
              <?php } 
            }
          ?>
        </table>

        <table width="660" border="1">
          <tr>
            <td height="25" bgcolor="#336699">
              <div align="center">
                <font color="#990066" size="3"><strong>
                    <font color="#FFFFFF">新增回報紀錄</font>
                  </strong></font>
              </div>
            </td>
          </tr>
        </table>
        <form method="post" action="?st=send" onsubmit="return chk_form()">
          <table width="660" border="1" cellpadding="1">
            <tr>
              <td>處理情形</td>
              <td>
                <select name="log_2" id="log_2">
                  <?php require_once("./include/_fun_report_option.php"); ?>
                </select>
                <span id="log_3_div"></span><span id="log_4_div"></span><span id="log_6_div" style="display:none;"><input type="text" style="width:120px;" name="log_6" id="log_6" readonly class="datepicker" autocomplete="off" value="點此預約下次通話"></span>
              </td>
            </tr>
            <tr>
              <td>內容</td>
              <td><input type="text" name="log_4" id="log_4" size=90></textarea></td>
            </tr>
            <tr>
              <td>回報時間</td>
              <td><?php echo changeDate(date("Y/m/d H:i:s")); ?> 由 <?php echo SingleName($_SESSION["MM_Username"],"normal"); ?> (<?php echo $_SESSION["MM_Username"];?>) 回報</td>
            </tr>
            <input type="hidden" name="k_id" value="<?php echo $_REQUEST["k_id"]; ?>">
            <input type="hidden" name="k_mobile" value="<?php echo $k_mobile; ?>">
            <input type="hidden" name="log_name" value="<?php echo SingleName($_SESSION["MM_Username"],"normal"); ?>">
            <input type="hidden" name="log_username" value="<?php echo $u_name; ?>">
            <input type="hidden" name="log_branch" value="<?php echo $_SESSION["branch"]; ?>">
            <input type="hidden" name="ty" value="<?php echo $ty; ?>">
            <input type="hidden" name="rc" value="<?php echo $_REQUEST["rc"]; ?>">
          </table>
      </td>
    </tr>
    <tr>
      <td align="center"><input type="submit"></td>
      </form>
    </tr>
  </table>
</body>

</html>

<script language="JavaScript">
  $(function() {
    $("#log_6").datepicker({
      minDate: '%y-%M-%d'
    });
    $("#log_2").on("change", function() {
      var $val = $(this).val();
      $("#log_3_div").html("");
      $("#log_4_div").html("");
      $("#log_6").val("點此預約下次通話");
      $("#log_6_div").hide();
      if ($val) {
        if ($val == "有意願") {
          addnewoption3();
        }
        if ($val == "下次聯絡") {
          $("#log_6_div").show();
        }
      }
    });
    $("#log_2").val("");
  });

  function chk_form() {
    if (!$("#log_2").val()) {
      alert("請選擇處理情形1。");
      $("#log_2").focus();
      return false;
    } else {
      if ($("#log_2").val() == "下次聯絡") {
        if (!$("#log_6").val() || $("#log_6").val() == "點此預約下次通話") {
          alert("請預約下次通話。");
          return false;
        }
      }
    }
    if ($("#log_3").val() != undefined) {
      if (!$("#log_3").val() || $("#log_3").val() == "請選擇") {
        alert("請選擇處理情形2。");
        $("#log_3").focus();
        return false;
      }
    }
    return true;
  }

  function addnewoption3() {
    var $newselect = $("<select></select>"),
      $options1 = ["請選擇", "不確定時間", "考量1-3月出國", "考量4-6月出國", "考量7-9月出國", "考量10-12月出國"];
    $newselect.attr("id", "log_3");
    $newselect.attr("name", "log_3");
    $.each($options1, function(i, val) {
      $newselect.append($("<option></option>").attr("value", val).text(val));
    });
    $("#log_3_div").append($newselect);
    $newselect.on("change", function() {
      $("#log_4_div").html("");
      if ($(this).val() != "請選擇") addnewoption4();
    });
  }

  function addnewoption4(n) {
    var $newselect = $("<select></select>"),
      $options1 = ["不確定地點", "考量去東北亞(日韓)", "考量去東南亞(馬新泰菲印)", "考量去自由行", "考量去島嶼", "考量去澳洲", "考量去美加"];
    $newselect.attr("id", "log_3");
    $newselect.attr("name", "log_3");
    $.each($options1, function(i, val) {
      $newselect.append($("<option></option>").attr("value", val).text(val));
    });
    $("#log_4_div").append($newselect);
    if (n) $newselect.val(n);
  }
</script>