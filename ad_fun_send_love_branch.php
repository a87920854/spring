
<?php
    /*****************************************/
	//檔案名稱：ad_fun_send_love_branch.php
	//後台對應位置：好好玩管理系統/好好玩國內報名>操作(發送)
	//改版日期：2021.11.16
	//改版設計人員：Jack
	//改版程式人員：Jack
	/*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    if($_REQUEST["state"] == "add"){
        $k_id = SqlFilter($_REQUEST["k_id"],"int");
        $SQL = "UPDATE love_keyin SET all_branch = '".SqlFilter($_REQUEST["branch"],"tab")."', all_single = '".SqlFilter($_REQUEST["single"],"tab")."', all_type = '已發送' WHERE k_id in ('".$k_id."')";
        $rs = $FunConn->prepare($SQL);
		$rs->execute();
        if($rs){
            reURL("win_close.php");
            exit; 
        }else{
            echo "<script language=\"javascript\">" ;
            echo "alert('資料庫讀取失敗')";
            echo "</script>";
            exit; 
        }
    }
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>好好玩旅行社</title>
    <STYLE TYPE="text/css">
        body,th,td,input,select,textarea,select,checkbox {
            font: 10pt 新細明體
        }
        a:link {
            font: 10pt "新細明";
            text-decoration: underline;
            color: none
        }
        a:visited {
            font: 10pt "新細明";
            text-decoration: underline;
            color: 000099
        }
        a:active {
            font: 10pt "新細明";
            text-decoration: underline;
            color: 00CC66
        }
        a:hover {
            font: 10pt 新細明;
            text-decoration: underline;
            color: ff0000
        }    </STYLE>
</head>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>

<body leftmargin="0" topmargin="0">
    <form action="ad_fun_send_love_branch.php?state=add" method="post" name="form1">
        <table width="350" border="0" align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>好好玩旅行社資料</legend>
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
                                            <Select name="branch" id="branch" style="height:26px;">
                                                <option value="">選擇會館</option>
                                                <?php
                                                //可視會館名稱
                                                if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" ){
                                                    $subSQL = "";
                                                }elseif ( $_SESSION["action_level"] == 2 ){
                                                    $subSQL = " And admin_name Not In ('台南','高雄','八德','約專','總管理處')";
                                                }elseif ( $_SESSION["action_level"] == 3 ){
                                                    $subSQL = " And admin_name Not In ('約專','總管理處')";
                                                }elseif ( $_SESSION["action_level"] == 1 ){
                                                    $subSQL = " And admin_name Not In ('台北','桃園','新竹','台中','八德','約專','總管理處')";
                                                }
                                                $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' ".$subSQL."Order By admin_SOrt";
                                                $rs = $SPConn->prepare($SQL);
                                                $rs->execute();
                                                $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($result as $re){ ?>
                                                    <option value="<?php echo $re["admin_name"];?>"<?php if ( SqlFilter($_REQUEST["branch"],"tab") == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
                                                <?php }?>
                                            </Select>
                                            約見人：
                                            <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" ){ ?>
                                                <Select name="single" id="single" style="height:26px;">
                                                    <option value="">請選擇</option>
                                                    <?php
                                                    if ( $_REQUEST["flag"] == "1" ){ 
                                                        $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' Order By p_desc2 Desc, lastlogintime Desc";
                                                    }else{
                                                        $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' And p_work=1 Order By p_desc2 Desc, lastlogintime Desc";
                                                    }
                                                    if ( $branch != "" ){
                                                        $rs_er = $SPConn->prepare($SQL_er);
                                                        $rs_er->execute();
                                                        $result_er=$rs_er->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach($result_er as $re_er){
                                                            if ( $re_er["p_name"] != "" ){ $p_name = $re_er["p_name"]; }
                                                            if ( $re_er["p_other_name"] != "" ){ $p_name = $re_er["p_other_name"]; }
                                                            echo "<option value='".$re_er["p_user"]."'";
                                                            echo ">".$p_name."</option>";
                                                        }
                                                    }?>
                                                </Select>
                                            <?php }?> 
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr bgcolor="#FFF0E1">
                                <td colspan="2" bgcolor="#336699">
                                    <div align="center">
                                        <input name="Submit" type="submit" id="Submit2" value="確定送出">
                                        <input name="k_id" type="hidden" id="k_id" value="<?php echo SqlFilter($_REQUEST["k_id"],"int"); ?>">
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