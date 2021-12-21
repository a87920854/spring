<?php 
    /*****************************************/
    //檔案名稱：ad_fun_enterprise_service_send_branch.php
    //後台對應位置：好好玩管理系統/企業委辦>發送
    //改版日期：2021.12.14
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/
    require_once("_inc.php");
    require_once("./include/_function.php");
    
    if($_REQUEST["state"] == "add"){
      $an = SqlFilter($_REQUEST["an"],"int");
      $all_single = SqlFilter($_REQUEST["single"],"tab");
      $SQL = "UPDATE enterprise_service SET all_branch = '好好玩旅行社', all_single = '".$all_single."', all_type = '已發送' WHERE auton = " .$an;
      $rs = $FunConn->prepare($SQL);
      $rs->execute();
      if($rs){
        reURL("win_close.php");
        exit();
      }    
    }

?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>好好玩旅行社</title>
  <style TYPE="text/css">
    body,
    th,
    td,
    input,
    select,
    textarea,
    select,
    checkbox {
      font: 10pt 新細明體
    }

    a:link {
      font: 10pt "新細明";
      text-decoration: underline;
      color: none
    }

    a:visited {
      font: 10pt "新細明";
      text-decoration: underline;
      color: 000099
    }

    a:active {
      font: 10pt "新細明";
      text-decoration: underline;
      color: 00CC66
    }

    a:hover {
      font: 10pt 新細明;
      text-decoration: underline;
      color: ff0000
    }
  </style>
</head>

<body leftmargin="0" topmargin="0">
  <form action="?state=add" method="post" name="form1">
    <table width="350" border="0" align="center">
      <tr>
        <td>
          <fieldset>
            <legend>好好玩旅行社資料</legend>
            <table width="340" border="0" align="center" cellpadding="3">
              <tr bgcolor="#FFF0E1">
                <td colspan="2" bgcolor="#336699">&nbsp;</td>
              </tr>
              <tr bgcolor="#F0F0F0">
                <td height="100" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                  <div align="center">
                    <p>
                      <font color="#990066" size="3">請分配處理人員</font>
                    </p>
                    <p>處理人員：
                      <select name="single" id="single">
                        <option value="">請選擇</option>
                        <?php 
                          $SQL = "select p_user, p_name, p_other_name from personnel_data where p_branch = '好好玩旅行社' and p_work=1 order by p_desc2 desc";
                          $rs = $SPConn->prepare($SQL);
                          $rs->execute();
                          $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                          if($result){
                            foreach($result as $re){
                              if($re["p_name"] != ""){
                                $p_name = $re["p_name"];
                              }
                              if($re["p_other_name"] != ""){
                                $p_name = $re["p_other_name"];
                              }
                              echo "<option value='".$re["p_user"]."'>".$p_name."</option>";
                            }
                          }
                        ?>
                      </select>
                    </p>
                  </div>
                </td>
              </tr>
              <tr bgcolor="#FFF0E1">
                <td colspan="2" bgcolor="#336699">
                  <div align="center">
                    <input name="Submit" type="submit" id="Submit2" value="確定送出">
                    <input name="an" type="hidden" id="an" value="<?php echo SqlFilter($_REQUEST["an"],"int"); ?>">
                  </div>
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