<?php 
    /*****************************************/
    //檔案名稱：funweb_fun7_add.php
    //後台對應位置：好好玩網站管理系統/首頁最新消息>新增消息
    //改版日期：2021.12.29
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    if($_REQUEST["st"] == "edit"){
        $an = SqlFilter($_REQUEST["aa"],"int");
        $n1 = SqlFilter($_REQUEST["n1"],"tab");
        if($n1 == ""){
            reURL("win_close.php?m=發生錯誤");
            exit();
        }
        if($an != ""){
            $SQL = "update web_data set n1='".$n1."',n2='".SqlFilter($_REQUEST["n2"],"tab")."' where auton=".$an." and types='oindex_marquee'";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
            if($rs){
                reURL("win_close.php?m=修改完成...");
            }
        }else{
            $SQL = "INSERT INTO web_data (n1,n2,t1,types) VALUES ('".$n1."','".SqlFilter($_REQUEST["n2"],"tab")."','".date("Y/m/d H:i:s")."','oindex_marquee')";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
            if($rs){
                reURL("win_close.php?m=新增完成...");
            }
        }
    }

    if($_REQUEST["a"] != ""){
        $SQL = "SELECT * FROM web_data where auton='".SqlFilter($_REQUEST["a"],"int")."' and types='oindex_marquee'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $n1 = $result["n1"];
            $n2 = $result["n2"];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8" />
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery.uploadify-3.1.min.js"></script>
    <link href='css/uploadify.css' rel='stylesheet'>
</head>

<body>
    <form method="post" action="?st=edit" onsubmit="return chk_form()">
        <p>活動訊息：<input type="text" name="n1" id="n1" value="<?php echo $n1; ?>" style="width:60%;"></p>
        <p>連結位置：<input type="text" name="n2" id="n2" value="<?php echo $n2; ?>" style="width:60%;">(無可免填)</p>
        <input type="hidden" name="aa" id="aa" value="<?php echo SqlFilter($_REQUEST["a"],"int") ?>">
        <div class="button">
            <div class="buttonContent"><input type="submit" value="確定送出"></div>
    </form>

    <script type="text/javascript">
        $(function() {});

        function chk_form() {
            if (!$("#n1").val()) {
                alert("最少要輸入活動訊息。");
                $("#n1").focus();
                return false;
            }
            return true;
        }
    </script>
</body>

</html>