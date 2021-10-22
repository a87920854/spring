<?php
	/*****************************************/
	//檔案名稱：ad_job_fix.php
	//後台對應位置：名單/發送記錄>徵人資料>處理
	//改版日期：2021.10.22
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");

    //判斷權限
    $auth_limit = 2;
    require_once("./include/_limit.php");

    if ( SqlFilter($_REQUEST["st"],"tab") == "add" ){
	    $an = SqlFilter($_REQUEST["an"],"tab");
        //更新資料庫[JOB]
        $SQL_u  = "Update job Set ";
        $SQL_u .= "all_note='".SqlFilter($_REQUEST["all_note"],"tab")."',";
        $SQL_u .= "ftime='".strftime("%Y/%m/%d %H:%M:%S")."' ";
        $SQL_u .= "Where auton='".$an."'";
        $rs_u = $SPConn->prepare($SQL_u);
        $rs_u->execute();
        header("location:win_close.php");
        exit;
    }

    $SQL = "Select * From job Where auton='".SqlFilter($_REQUEST["an"],"tab")."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
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
                            <legend>徵人處理</legend>
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
                                            <?php if ( $re["all_type"] != "未處理" ){ echo $re["all_type"]; }?>
                                            </strong>
                                        </font>
                                    </td>
                                </tr>
                                <tr bgcolor="#F0F0F0">
                                    <td colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                        <font color="#990066">
                                            <textarea name="all_note" cols="50" rows="7" id="all_note"><?php echo $re["all_note"]; ?></textarea>
                                        </font>
                                    </td>
                                </tr>
                                <tr bgcolor="#FFF0E1">
                                    <td colspan="2" bgcolor="#336699">
                                        <div align="center">
                                            <input name="Submit" type="submit" id="Submit" style="font-size: 9pt" value="確定送出">
                                            <font color="#990066"><strong>
                                                    <input name="an" type="hidden" id="an" value="<?php echo SqlFilter($_REQUEST["an"],"tab"); ?>">
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