<?php

    /*****************************************/
    //檔案名稱：ad_fun_action_list1_print.php
    //後台對應位置：好好玩管理系統/好好玩國內團控>列印本頁
    //改版日期：2021.12.8
    //改版程式人員：jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
      call_alert("請重新登入。", "login.php", 0);
    }

    // 起始日期
    if($_REQUEST["acre_sign1"] != "" && chkDate($_REQUEST["acre_sign1"])){
      $acre_sign1 = SqlFilter($_REQUEST["acre_sign1"],"tab");      
    }else{
      call_alert("請先選擇起始日期後按查詢再列印。", 0, 0);
    }

    // 結束日期
    if($_REQUEST["acre_sign2"] != "" && chkDate($_REQUEST["acre_sign2"])){
      $acre_sign2 = SqlFilter($_REQUEST["acre_sign2"],"tab");      
    }else{
      call_alert("請先選擇結束日期後按查詢再列印。", 0, 0);
    }

    // 日期範圍不能超過兩個月
    if(strtotime($acre_sign1."+2 month") <= strtotime($acre_sign2)){
      call_alert("日期範圍不能超過兩個月。", 0, 0);
    }  
      
    $sqlv = "*";
    $sqlv2 = "count(ac_auto)";
    switch($_SESSION["MM_UserAuthorization"]){
      case "admin":
        $sqls = "SELECT ".$sqlv." FROM action_data Where 1=1";
        $sqls2 = "SELECT ".$sqlv2." as total_size FROM action_data Where 1=1";
        break;
      default:
        $sqls = "SELECT ".$sqlv." FROM action_data Where ac_branch='".$_SESSION["branch"]."'";
        $sqls2 = "SELECT ".$sqlv2." as total_size FROM action_data Where ac_branch='".$_SESSION["branch"]."'";
        break;
    }

    if(chkDate($acre_sign1) && chkDate($acre_sign2)){
      // 結束日期不能大於起始日期
      if(strtotime($acre_sign1) > strtotime($acre_sign2)){
        call_alert("結束日期不能大於起始日期。", 0, 0);
      }
      $acre_sign = $acre_sign1 ." ~ ". $acre_sign2;
      $sqlss = $sqlss . " and ac_time between '".$acre_sign1."' and '".$acre_sign2."'";
    }
    
    // 以會館搜尋
    if($_REQUEST["s6"] != ""){
      $sqlss = $sqlss . " and ac_branch like '%" + str_replace("'", "''",SqlFilter($_REQUEST["s6"],"tab")) + "%'";
    }

    $sqls = $sqls . $sqlss . " order by ac_time desc";
    $sqls2 = $sqls2 . $sqlss;
?>

<html>
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <style>
  table {
    font-size:12px;
  }
</style>
</head>

<body>

  <table width="100%" border="1" style="border-collapse:collapse;" borderColor="black">
    <tbody>
      <tr>
        <td colspan=8><i class="icon-user"></i> 好好玩國內團控 - <?php echo $acre_sign; ?></td>
      </tr>
      <tr>
        <th>會館</th>
        <th>活動時間</th>
        <th>活動標題</th>
        <th></th>
      </tr>
      <?php 
        $rs = $FunConn->prepare($sqls);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
        if(!$result){
          echo "<tr><td colspan=9 height=200>目前沒有資料</td></tr>";
        }else{
          foreach($result as $re){ ?>
            <tr> 
                <td> 
                  <div align="center"><?php echo $re["ac_branch"]; ?></div></td>
                <td> 
                  <div align="center"><?php echo changeDate($re["ac_time"]); ?></div></td>
                <td> 
                  <div align="center"><?php echo $re["ac_title"]; ?></div></td>
                <td> 
                  來源：<?php echo $re["ac_come"]; ?>　開發者：<?php echo $re["ac_open1"]; ?><?php echo SingleName($re["ac_open2"],"normal"); ?>　執行者：<?php echo $re["ac_run1"]; ?><?php echo SingleName($re["ac_run2"],"normal"); ?>
                </td>
            </tr
          <?php }
        }
      ?>
    </tbody>
  </table>
  <script type="text/javascript">
    window.print();
    //window.close();
  </script>
</body>

</html>