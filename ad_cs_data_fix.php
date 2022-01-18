<?php
/**********************************************/
//檔案名稱：ad_cs_data_fix.php
//後台對應位置：春天網站功能 > 服務滿意度調查(處理)
//改版日期：2022.1.18
//改版設計人員：Jack
//改版程式人員：Queena
/**********************************************/
require_once("_inc.php");
require_once("./include/_function.php");
$auth_limit == "5";
require_once("./include/_limit.php");

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$cs_auto = SqlFilter($_REQUEST["cs_auto"],"tab");
$all_note = SqlFilter($_REQUEST["all_note"],"tab");
$a = SqlFilter($_REQUEST["a"],"tab");

//新增
if ( $st == "add" ){
    $SQL_u = "Update cs_data Set all_note = '".$all_note."' Where cs_auto = ".$cs_auto;
    $rs_u = $SPConn->prepare($SQL_u);
    $rs_u->execute();    
    reURL("win_close.php");
    exit;
}

//讀取資料
$SQL = "Select * From cs_data Where cs_auto=".$a;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>春天會館</title>
    </head>

    <body leftmargin="0" topmargin="0">
        <form action="?st=add" method="post" name="form1">
            <table width="400" border="0" align="center">
                <tr>
                    <td>
                        <fieldset>
                            <legend>客服中心處理</legend>
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
                                                <?php if ( $re["all_type"] != "未處理" ){ echo $re_list["all_type"];}?>
                                            </strong>
                                        </font>
                                    </td>
                                </tr>
                                <tr bgcolor="#F0F0F0">
                                    <td colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                        <font color="#990066">
                                            <textarea name="all_note" cols="50" rows="7" id="all_note"><?php echo $re_list["all_note"];?></textarea>
                                        </font>
                                    </td>
                                </tr>
                                <tr bgcolor="#FFF0E1">
                                    <td colspan="2" bgcolor="#336699">
                                        <div align="center">
                                            <input name="Submit" type="submit" id="Submit" style="font-size: 9pt" value="確定送出">
                                            <font color="#990066">
                                                <strong>
                                                    <input name="cs_auto" type="hidden" id="cs_auto" value="<?php echo $a;?>">
                                                </strong>
                                            </font>
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