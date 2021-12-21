<?php 
    /*****************************************/
    //檔案名稱：ad_fun_enterprise_service_fix.php
    //後台對應位置：好好玩管理系統/企業委辦>處理
    //改版日期：2021.12.15
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/
    require_once("_inc.php");
    require_once("./include/_function.php");

    //程式開始 *****
    if($_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["MM_UserAuthorization"] != "branch"){
        call_alert("您沒有權限。",0,0);
    }

    if($_REQUEST["st"] == "add"){
        $an = SqlFilter($_REQUEST["an"],"int");
        $all_note = SqlFilter($_REQUEST["all_note"],"tab");
        $SQL = "UPDATE enterprise_service SET all_branch = '".$all_note."' WHERE auton = " .$an;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php");
            exit();
        }
    }

    $SQL = "SELECT * from enterprise_service where auton=" .SqlFilter($_REQUEST["an"],"int");
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>好好玩旅行社</title>
</head>

<body leftmargin="0" topmargin="0">

    <form action="?st=add" method="post" name="form1">
        <table width="400" border="0" align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>企業委辦處理</legend>
                        <table width="390" border="0" align="center" cellpadding="3">
                            <tr bgcolor="#FFF0E1">
                                <td colspan="2" bgcolor="#336699">
                                    <div align="center">
                                        <font color="#FFFFFF" size="3">請填寫處理情形</font>
                                    </div>
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                    <font color="#990066">
                                        <strong>
                                            <?php 
                                                if($result["all_type"] != "未處理"){
                                                    echo $result["all_type"];
                                                }                                    
                                            ?>
                                        </strong>
                                    </font>
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                    <font color="#990066">
                                        <textarea name="all_note" cols="50" rows="7" id="all_note"><?php echo $result["all_note"]; ?></textarea>
                                    </font>
                                </td>
                            </tr>
                            <tr bgcolor="#FFF0E1">
                                <td colspan="2" bgcolor="#336699">
                                    <div align="center">
                                        <input name="Submit" type="submit" id="Submit" style="font-size: 9pt" value="確定送出">
                                        <font color="#990066"><strong>
                                                <input name="an" type="hidden" id="an" value="18">
                                            </strong></font>
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