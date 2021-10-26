<?php
    error_reporting(0); 
    /*****************************************/
    //檔案名稱：ad_guest_send_branch.php
    //後台對應位置：名單/發送記錄>客服中心記錄(發送)
    //改版日期：2021.10.26
    //改版設計人員：Jack
    //改版程式人員：Queena
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    if ( SqlFilter($_REQUEST["state"],"tab") == "add" ){
        $g_auto = SqlFilter($_REQUEST["g_auto"],"int");
        $SQL_u = "Update guest Set all_branch=N'".SqlFilter($_REQUEST["pay1"],"tab")."' Where g_auto=".$g_auto;
        $rs_u = $SPConn->prepare($SQL_u);
        $rs_u->execute();
        header("location:win_close.php");
    }

    //會館資料
    $SQL = "Select * From branch_data Where auto_no<>3 And auto_no<>10 Order By Sort";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>春天會館</title>
    </head>
    <body leftmargin="0" topmargin="0">
        <form action="?state=add" method="post" name="form1">
            <table width="350" border="0" align="center">
                <tr>
                    <td>
                        <fieldset>
                            <legend>春天會館資料</legend>
                            <table width="340" border="0" align="center" cellpadding="3">
                                <tr bgcolor="#FFF0E1">
                                    <td colspan="2" bgcolor="#336699">&nbsp;</td>
                                </tr>
                                <tr bgcolor="#F0F0F0">
                                    <td height="100" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                        <div align="center">
                                            <p>
                                                <font color="#990066" size="3">請分配會館及秘書</font>
                                            </p>
                                            <p>會館：
                                                <select name="pay1" id="pay1" style="height:28px;">
                                                    <option value="">請選擇</option>
                                                    <?php
                                                    foreach($result as $re){
                                                        echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";
                                                    } ?>
                                                </select>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr bgcolor="#FFF0E1">
                                    <td colspan="2" bgcolor="#336699">
                                        <div align="center">
                                            <input name="Submit" type="submit" id="Submit2" style="font-size: 9pt" value="確定送出">
                                            <input name="g_auto" type="hidden" id="g_auto" value="<?php echo SqlFilter($_REQUEST["g_auto"],"int");?>">
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