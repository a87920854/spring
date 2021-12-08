<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="JavaScript" type="text/JavaScript">
    function closeWin(thetime) {
        setTimeout("window.close()", thetime);
    }
</script>
</head>

<body leftmargin="0" topmargin="0" onLoad="closeWin('500')">
    <script language="JavaScript" type="text/JavaScript">
        window.opener.location.reload();
    </script>
    <table width="300" height="200" border="0" align="center">
        <tr>
            <td>
                <div align="center">
                    <font color="#FF0000"><?php echo $_REQUEST["m"]; ?></font>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>