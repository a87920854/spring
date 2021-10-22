<?php
    error_reporting(0); 
    //require_once("_inc.php");
    require_once("./include/_function.php");

    if ( SqlFilter($_REQUEST["m"],"tab") != "" ){
        $m = SqlFilter($_REQUEST["m"],"tab");
    }else{
        $m = "資料輸入成功";
    }
?>
<html lang="en-US">
    <head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	</head>

    <script language="JavaScript" type="text/JavaScript">
        window.opener.location.reload(true);
        function closeWin(thetime) {
            setTimeout("window.close()", thetime);
        }
    </script>
    <body onLoad="closeWin('1000')">
        <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" style="text-align: center;vertical-align: middle;"><font color="#FF0000" size="3"><strong> <?php echo $m; ?>......</strong></font></td>
            </tr>
        </table>
    </body>
</html>