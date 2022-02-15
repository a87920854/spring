<?php
/***************************************************/
//檔案名稱：ad_mem_singleparty_consult_changetime.php
//後台對應位置：約會專家功能->情感諮詢預約(修改時間)
//改版日期：2022.02.15
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************************/

require_once("_inc.php");
require_once("./include/_function.php");

//接收值
$state = SqlFilter($_REQUEST["state"],"tab");
$an = SqlFilter($_REQUEST["an"],"tab");
$n11y = SqlFilter($_REQUEST["n11y"],"tab");
$n11m = SqlFilter($_REQUEST["n11m"],"tab");
$n11d = SqlFilter($_REQUEST["n11d"],"tab");
$n11h = SqlFilter($_REQUEST["n11h"],"tab");
$t = SqlFilter($_REQUEST["t"],"tab");

if ( $state == "add" ){
    $SQL = "Select * from si_salon_teacher_consult where auton='".$an."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    if ( count($result) > 0 ){
	    $n11 = $n11y."/".$n11m."/".$n11d;
        if ( chkDate($n11) == false ){
            call_alert("預訂時間有誤。",0,0);
	    }
        $SQL_u = "Update si_salon_teacher_consult Set tdate='".$n11."',ttime='".$n11h.":00' Where auton='".$an."'";
        $rs_u = $SPConn->prepare($SQL_u);
        $rs_u->execute();
    }
    reURL("win_close.php");
    exit;
}

if ( $an == "" ){ call_alert("資料讀取錯誤，", "ClOsE", 0); }
$SQL = "Select * from si_salon_teacher_consult where auton='".$an."'";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 ){
    call_alert("讀取錯誤。","ClOsE",0);
}else{
    $tdate = $re["tdate"];
    $ttime =$re["ttime"]; ?>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>約會專家</title>
        </head>
        <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="js/util.js"></script>
        <body leftmargin="0" topmargin="0">
            <form action="?state=add" method="post" name="form1">
                <table width="370" border="0" align="center">
                    <tr>
                        <td>
                            <fieldset>
                                <legend style="color:#fc3bf5;font-weight:bold;">約會專家資料</legend>
                                <table width="360" border="0" align="center" cellpadding="3">
                                    <tr> 
                                        <td colspan="2" bgcolor="#d9dbfd"><strong style="color: #1a218e;">▼ 請修改預約時間</strong></td>
                                    </tr>
                                    <tr bgcolor="#F0F0F0">
                                        <td height="100" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div>
                                                預約時間：<br>
                                                <select name="n11y" id="n11y">
                                                    <?php for ( $i=(date("Y")-1);$i<=(date("Y")+2);$i++ ){
                                                        echo "<option value='".$i."'";
                                                        if ( $i == date("Y") ){ echo " selected";}
                                                        echo ">".$i."</option>";
                                                    }?>
                                                </select> 年
                                                <select name="n11m" id="n11m">
                                                    <?php for ( $i=1;$i<=12;$i++ ){
                                                        echo "<option value='".$i."'";
                                                        if ( $i == date("m") ){ echo " selected";}
                                                        echo ">".$i."</option>";
                                                    }?>
                                                </select> 年
                                                <select name="n11d" id="n11d">
                                                    <?php for ( $i=1;$i<=31;$i++ ){
                                                        echo "<option value='".$i."'";
                                                        if ( $i == date("d") ){ echo " selected";}
                                                        echo ">".$i."</option>";
                                                    }?>
                                                </select> 日
                                                <select name="n11h" id="n11h">
                                                    <?php for ( $i=10;$i<=22;$i++ ){
                                                        echo "<option value='".$i."'";
                                                        if ( $i == date("H") ){ echo " selected";}
                                                        echo ">".$i."</option>";
                                                    }?>
                                                </select> 時。
                                            </div>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#FFF0E1">
                                        <td colspan="2" bgcolor="#d9dbfd">
                                            <div align="center">
                                                <input name="Submit" type="submit" id="Submit2" style="font-size: 9pt" value="確定送出">
                                                <input name="an" type="hidden" id="an" value="<?php echo $an;?>">
                                                <input name="t" type="hidden" id="t" value="<?php echo $t;?>">
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
<?php }?>