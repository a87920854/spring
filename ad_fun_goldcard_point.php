<?php 
    /*****************************************/
    //檔案名稱：ad_fun_goldcard_point.php
    //後台對應位置：好好玩管理系統/同業報名單管>報名詳細資料>金卡點數
    //改版日期：2021.12.23
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }

    if($_REQUEST["mem_num"] == ""){
        call_alert("讀取編號有誤。", "ClOsE", 0);
    }

    // 刪除
    if($_REQUEST["st"] == "del"){        
        $SQL = "delete from goldcard_point where auton = ".SqlFilter($_REQUEST["an"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL(("ad_fun_goldcard_point.php?mem_num=".SqlFilter($_REQUEST["mem_num"],"int")."&n=".SqlFilter($_REQUEST["n"],"tab")));
        }
    }

    // 送出
    if($_REQUEST["st"] == "send"){
        if(!is_numeric($_REQUEST["totalp"])){
            call_alert("點數請輸入數字。", 0, 0);
        }
        $totalp = abs(SqlFilter($_REQUEST["totalp"],"int"));
        if($_REQUEST["types"] == "red"){
            $totalp = -1*$totalp;
        }        
        $SQL =  "INSERT INTO goldcard_point (mem_num, types, totalp, logp, times) VALUES ('"
                .SqlFilter($_REQUEST["mem_num"],"int")."', '"
                .SqlFilter($_REQUEST["types"],"tab")."', '"
                .$totalp."', '"
                .SqlFilter($_REQUEST["logp"],"tab")."', '"
                .date("Y/m/d H:i:s")."')";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL(("ad_fun_goldcard_point.php?mem_num=".SqlFilter($_REQUEST["mem_num"],"int")."&n=".SqlFilter($_REQUEST["n"],"tab")));
        } 
    }


?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <STYLE TYPE="text/css">
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
            font:10pt "新細明";
            text-decoration:none;
            color: #0000FF;
        }

        a:visited {
            font:10pt "新細明";
            text-decoration:none;
            color:#0000FF;
        }

        a:active {
            font:10pt "新細明";
            text-decoration:none;
            color: #0000FF;
        }

        a:hover {
            font: 10pt "新細明";
            text-decoration: underline;
            color: #ff0000;
        }

        .style14 {
            font-size: 12px;
        }

        body {
            overflow-y: auto;
        }
    </STYLE>
    <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.ui.datepicker-zh-TW.js"></script>    
</head>

<body text="#333333" leftmargin="0" topmargin="0">
    <table width="660" border="0" cellspacing="0">
        <tr>
            <td width="660" valign="top">
                <table width="660" border="1">
                    <tr>
                        <td height="25" bgcolor="#336699">
                            <div align="center">
                                <font color="#990066" size="3"><strong>
                                        <font color="#FFFFFF"><?php echo SqlFilter($_REQUEST["n"],"tab"); ?> - 好好玩旅行社金卡俱樂部點數系統</font>
                                    </strong></font>
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="660" border="1" cellpadding="1">
                    <?php 
                        $SQL = "select * from goldcard_point where mem_num=".SqlFilter($_REQUEST["mem_num"],"int");
                        $rs = $FunConn->prepare($SQL);
                        $rs->execute();
                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                        if(!$result){
                            echo "<tr><td height=200>目前無任何點數紀錄</td></tr>";
                        }else{
                            foreach($result as $re){
                                if($re["types"] == "add"){
                                    $types = "增加";
                                }else{
                                    $types = "扣除";
                                }
                                echo "<tr><td>".$re["times"]."</td><td>".$types."</td><td>".$re["logp"]."</td><td>".$re["totalp"];
                                if($_SESSION["MM_UserAuthorization"] == "admin"){
                                    echo "　<a href=\"ad_fun_goldcard_point.php?st=del&an=".$re["auton"]."&mem_num=".SqlFilter($_REQUEST["mem_num"],"int")."&n=".SqlFilter($_REQUEST["n"],"tab")."\">刪</a>";
                                }
                                echo "</td></tr>"; 
                                $totalpa = $totalpa + $re["totalp"];                       
                            }
                            echo "<tr><td colspan=3 align='right'>總計</td><td>".$totalpa."</td></tr>";
                        }
                    ?>
                    <table width="660" border="1">
                        <tr>
                            <td height="25" bgcolor="#336699">
                                <div align="center">
                                    <font color="#990066" size="3"><strong>
                                            <font color="#FFFFFF">點數管理</font>
                                        </strong></font>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <form method="post" action="?st=send&mem_num=<?php echo SqlFilter($_REQUEST["mem_num"],"int"); ?>&n=<?php echo SqlFilter($_REQUEST["n"],"tab"); ?>" onsubmit="return chk_form()">
                        <table width="660" border="1" cellpadding="1">
                            <tr>
                                <td>
                                    <select name="types">
                                        <option value="add">增加點數</option>
                                        <option value="red">扣除點數</option>
                                    </select>
                                    <input type="text" name="totalp" id="totalp" size=15>
                                    事由：<input type="text" name="logp" id="logp" size=25>
                                    <input type="submit" value="確定">
                                </td>
                    </form>
            </td>
        </tr>
    </table>
</body>

</html>

<script language="JavaScript">
    function chk_form() {
        if (!$("#totalp").val()) {
            alert("請輸入點數。");
            $("#totalp").focus();
            return false;
        }
        return true;
    }
</script>