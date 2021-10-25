<?php
    error_reporting(0); 
    /*****************************************/
    //檔案名稱：ad_dmn_business.php
    //後台對應位置：名單/發送記錄>DMN企業專區
    //改版日期：2021.10.22
    //改版設計人員：Jack
    //改版程式人員：Queena
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    $auth_limit = 5;
    require_once("./include/_limit.php");

    //新增處理狀況
    if ( SqlFilter($_REQUEST["st"],"tab") == "add" ){
        $id = SqlFilter($_REQUEST["id"],"tab");
        $SQL_u = "Update business_contact Set all_note='".SqlFilter($_REQUEST["all_note"],"tab")."' Where id='".$id."'";

        $rs_u = $DMNConn->prepare($SQL_u);
        $rs_u->execute();
        header("location:win_close.php");
        exit;
    }

    //取得資料
    $SQL = "Select * from business_contact where id=".SqlFilter($_REQUEST["id"],"tab");
    $rs = $DMNConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>DateMeNow</title>
    </head>
    <body leftmargin="0" topmargin="0">
        <form action="?st=add" method="post" name="form1">
            <table width="400" border="0" align="center">
                <tr>
                    <td>
                        <fieldset>
                            <legend>DMN企業專區處理</legend>
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
                                            if ( $re["all_type"] != "未處理" ){
                                                echo $re["all_type"];
                                            }?>
                                            </strong>
                                        </font>
                                    </td>
                                </tr>
                                <tr bgcolor="#F0F0F0">
                                    <td colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                        <font color="#990066">
                                            <textarea name="all_note" cols="50" rows="7" id="all_note"><?php $re["all_note"];?></textarea>
                                        </font>
                                    </td>
                                </tr>
                                <tr bgcolor="#FFF0E1">
                                    <td colspan="2" bgcolor="#336699">
                                        <div align="center">
                                            <input name="Submit" type="submit" id="Submit" style="font-size: 9pt" value="確定送出">
                                            <font color="#990066"><strong>
                                                    <input name="id" type="hidden" id="id" value="<?php echo SqlFilter($_REQUEST["id"],"tab");?>">
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