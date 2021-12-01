<?php

/*****************************************/
//檔案名稱：ad_fun_mem_fix.php
//後台對應位置：好好玩管理系統/金卡俱樂部(舊)>操作(修改)
//改版日期：2021.11.8
//改版設計人員：Jack
//改版程式人員：Jack
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");

$mem_auto = SqlFilter($_REQUEST["mem_auto"], "int");


$sql = "SELECT * FROM goldcard_data Where mem_auto=" . $mem_auto;
$rs = $FunConn->prepare($sql);
$rs->execute();
$result = $rs->fetch(PDO::FETCH_ASSOC);

// 修改資料
if ($_REQUEST["state"] == "add") {
    $mem_by = SqlFilter($_REQUEST["mem_by"], "int") . "/" . SqlFilter($_REQUEST["mem_bm"], "int") . "/" . SqlFilter($_REQUEST["mem_bd"], "int");
    // $mem_mobile = reset_number($_REQUEST["mem_mobile"]);
    if (!chkDate($mem_by)) {
        call_alert("出生年月日期不正確。", 1, 1);
    }
    if($_SESSION["MM_UserAuthorization"] == "admin"){
        $username = SqlFilter($_REQUEST["mem_username"], "tab");
    }else{
        $username = $result["mem_username"];  
    }

    $sql2 = "UPDATE goldcard_data SET
                mem_username ='"    . $username . "',
                mem_passwd = '"     . SqlFilter($_REQUEST["mem_passwd"], "tab") . "',
                mem_name = '"       . SqlFilter($_REQUEST["mem_name"], "tab") . "',
                mem_sex = '"        . SqlFilter($_REQUEST["mem_sex"], "tab") . "',
                mem_by = '"         . $mem_by . "',
                mem_phone = '"      . SqlFilter($_REQUEST["mem_phone"], "tab") . "',
                mem_mail = '"       . SqlFilter($_REQUEST["mem_mail"], "tab") . "',
                mem_msn = '"        . SqlFilter($_REQUEST["mem_msn"], "tab") . "',
                mem_address = '"    . SqlFilter($_REQUEST["mem_address"], "tab") . "',
                mem_area = '"       . SqlFilter($_REQUEST["mem_area"], "tab") . "',
                mem_star = '"       . SqlFilter($_REQUEST["mem_star"], "tab") . "',
                mem_school = '"     . SqlFilter($_REQUEST["mem_school"], "tab") . "',
                mem_job1 = '"       . SqlFilter($_REQUEST["mem_job1"], "tab") . "',
                mem_job2 = '"       . SqlFilter($_REQUEST["mem_job2"], "tab") . "',
                mem_marry = '"      . SqlFilter($_REQUEST["mem_marry"], "tab") . "',
                mem_uptime = '"     . date("Y-m-d H:i:s") . "'                
                Where mem_auto = '" . $mem_auto . "'";
    $rs2 = $FunConn->prepare($sql2);
    $rs2->execute();

    if ($rs2) {
        reURL("win_close.php");
        exit;
    } else {
        echo "<script language=\"javascript\">";
        echo "alert('資料庫讀取失敗')";
        echo "</script>";
        exit;
    }
}
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <STYLE TYPE="text/css">
        body {
            overflow-y: auto;
        }

        table {
            font-size: 13px;
        }
    </STYLE>
</head>

<body text="#333333" leftmargin="0" topmargin="0">

    <table width="652" border="0" cellspacing="0" style="margin:auto">
        <tr>
            <td width="650" valign="top">
                <form action="ad_fun_mem_fix.php?state=add" method="post" name="form5" onSubmit="VF_form5();return false;">
                    <table width="650" border="1">
                        <tr>
                            <td height="25" bgcolor="#336699">
                                <div align="center">
                                    <font color="#990066" size="3"><strong>
                                            <font color="#FFFFFF">修改資料</font>
                                        </strong></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>姓名：
                                <input name="mem_name" type="text" id="mem_name" style="font-size: 9pt" value="<?php echo $result["mem_name"]; ?>" size="15">
                                <font color="#999999">（請填入中文姓名）</font>
                            </td>
                        </tr>
                        <tr>
                            <td>帳號：
                                <?php echo $result["mem_username"]; ?>
                                <?php 
                                    if($_SESSION["MM_UserAuthorization"] == "admin"){ ?>
                                        <input name="mem_username" type="text" id="mem_username" style="font-size: 9pt" value="<?php echo $result["mem_username"]; ?>" size="15">
                                    <?php }
                                ?>                                
                                密碼：<font color="#999999">
                                    <input name="mem_pd" type="text" id="mem_pd" style="font-size: 9pt" value="<?php echo $result["mem_pd"]; ?>" size="15" maxlength="8">
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td>性別：
                                <input type="radio" name="mem_sex" value="男" <?php if ($result["mem_sex"] == "男") echo "checked"; ?>>
                                男
                                <input type="radio" name="mem_sex" value="女" <?php if ($result["mem_sex"] == "女") echo "checked"; ?>>
                                女<font color="#999999">（請謹慎選擇）</font>
                            </td>
                        </tr>
                        <tr>
                            <td>出生年月日：西元
                                <select name="mem_by" id="mem_by" style="font-size: 9pt">
                                    <?php
                                    $year = date("Y", strtotime($result["mem_by"])); //出生年
                                    for ($i = date("Y") - 20; $i >= date("Y") - 70; $i--) {
                                        if ($result["mem_by"] != "" && $i == $year) {
                                            echo "<option value=" . $i . " selected>" . $i . "</option>";
                                        } else {
                                            echo "<option value=" . $i . ">" . $i . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                年
                                <select name="mem_bm" id="mem_bm" style="font-size: 9pt">
                                    <?php
                                    $month = date("m", strtotime($result["mem_by"])); //出生月
                                    for ($i = 1; $i <= 12; $i++) {
                                        if ($result["mem_by"] != "" && $i == $month) {
                                            echo "<option value=" . $i . " selected>" . $i . "</option>";
                                        } else {
                                            echo "<option value=" . $i . ">" . $i . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                月
                                <select name="mem_bd" id="mem_bd" style="font-size: 9pt">
                                    <?php
                                    $day = date("d", strtotime($result["mem_by"])); //出生日
                                    for ($i = 1; $i <= 31; $i++) {
                                        if ($result["mem_by"] != "" && $i == $day) {
                                            echo "<option value=" . $i . " selected>" . $i . "</option>";
                                        } else {
                                            echo "<option value=" . $i . ">" . $i . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                日　星座：<font size="2">
                                    <select name="mem_star" id="select" style="font-size: 9pt">
                                        <option value=''>請選擇</option>
                                        <?php
                                        $star = array("水瓶座", "雙魚座", "牡羊座", "金牛座", "雙子座", "巨蟹座", "獅子座", "處女座", "天秤座", "天蠍座", "射手座", "魔羯座");
                                        foreach ($star as $st) {
                                            if ($st == $result["mem_star"]) {
                                                echo "<option value=" . $st . " selected>" . $st . "</option>";
                                            } else {
                                                echo "<option value=" . $st . ">" . $st . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td>手機：<?php echo $result["mem_mobile"]; ?>　　
                                電話： <font color="#999999"><input name="mem_phone" type="text" id="mem_phone" style="font-size: 9pt" value="<?php echo $result["mem_phone"]; ?>" size="15"></font>
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail：
                                <input name="mem_mail" type="text" id="mem_mail" style="font-size: 9pt" value="<?php echo $result["mem_mail"]; ?>" size="35">
                            </td>
                        </tr>
                        <tr>
                            <td>地區：<font size="2">
                                    <select name="mem_area" id="mem_area" style="font-size: 9pt">
                                        <option value="">請選擇</option>
                                        <?php
                                        $area = array(
                                            "新北市", "台北市", "基隆市", "宜蘭縣", "桃園市", "新竹縣", "新竹市", "苗栗縣", "苗栗市", "台中市", "彰化縣", "彰化市", "南投縣", "嘉義縣",
                                            "嘉義市", "雲林縣", "台南市", "高雄市", "屏東縣", "花蓮縣", "台東縣", "澎湖縣", "金門縣", "馬祖", "綠島", "蘭嶼", "其他"
                                        );
                                        foreach ($area as $ar) {
                                            if ($ar == $result["mem_area"]) {
                                                echo "<option value=" . $ar . " selected>" . $ar . "</option>";
                                            } else {
                                                echo "<option value=" . $ar . ">" . $ar . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </font>地址：
                                <input name="mem_address" type="text" id="mem_address" style="font-size: 9pt" value="<?php echo $result["mem_address"]; ?>" size="60">
                            </td>
                        </tr>
                        <tr>
                            <td>學歷：<font size="2">
                                    <?php
                                    $school = array("國中", "高中", "高職", "專科", "大學", "碩士", "博士", "其他");
                                    foreach ($school as $sc) {
                                        if ($sc == $result["mem_school"]) {
                                            echo "<input type='radio' name='mem_school' value='" . $sc . "' checked>" . $sc . " ";
                                        } else {
                                            echo "<input type='radio' name='mem_school' value='" . $sc . "'>" . $sc . " ";
                                        }
                                    }
                                    ?>
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td>職業：<font size="2">
                                    <select name="mem_job1" id="mem_job1" style="font-size: 9pt">
                                        <?php
                                        $job1 = array(
                                            "公務/國家機關", "司法/法務", "軍警單位", "自營/投資", "電腦/網路", "電子/通信/電器", "教育/研究單位", "醫療/護理服務業", "媒體傳播/出版業", "藝術/音樂/設計", "建築/裝修/物業", "營銷/業務",
                                            "文化/演藝/娛樂業", "金融/證券/財會/保險", "專利商標/諮詢服務業", "生產製造業", "旅遊服務業", "運輸服務業", "百貨/零售業", "餐飲服務業", "美容/美髮業", "農林漁牧業", "自由業/其它", "在校學生", "業務/仲价業",
                                        );
                                        foreach ($job1 as $jo) {
                                            if ($jo == $result["mem_job1"]) {
                                                echo "<option value=" . $jo . " selected>" . $jo . "</option>";
                                            } else {
                                                echo "<option value=" . $jo . ">" . $jo . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </font>　職務名稱：
                                <input name="mem_job2" type="text" id="mem_job2" style="font-size: 9pt" value="<?php echo $result["mem_job2"]; ?>" size="20" maxlength="8">
                            </td>
                        </tr>
                        <tr>
                            <td>婚姻狀態：
                                <?php
                                $marry = array("未婚", "已婚", "離婚", "喪偶", "保密", "交往中");
                                foreach ($marry as $ma) {
                                    if ($ma == $result["mem_marry"]) {
                                        echo "<input type='radio' name='mem_marry' value='" . $ma . "' checked>" . $ma . " ";
                                    } else {
                                        echo "<input type='radio' name='mem_marry' value='" . $ma . "'>" . $ma . " ";
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="center">
                                    <input name="Submit3" type="submit" value="確定修改" style="font-size: 9pt">
                                    <input name="mem_auto" type="hidden" id="mem_auto" value="<?php echo $_REQUEST["mem_auto"]; ?>">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>

<script LANGUAGE="JavaScript" src="checkform.js"></script>
<script language="JavaScript" type="text/JavaScript">
function VF_form5(){ //v2.0
    // start_of_saved_settings
    // type,checkbox,name,s1,isChecked,errMsg,a123
    // type,text,name,mem_address,required,true,errMsg,a123
    // type,text,name,mem_mail,required,true,isEmail,errMsg,a123
    // type,text,name,mem_mobile,required,true,isNum,errMsg,a123
    // type,radio-g,name,mem_sex,isChecked,errMsg,a123
    // type,text,name,mem_name,required,true,errMsg,a123
    // type,password,name,mem_ckpasswd,required,true,isEqualTo,mem_passwd,errMsg,a123
    // type,password,name,mem_passwd,required,true,isEqualTo,mem_ckpasswd,errMsg,a123
    // type,text,name,mem_username,required,true,errMsg,a123
    // end_of_saved_settings
    var theForm = document.form5;
	var numRE = /^\d+$/;
	var emailRE = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
	var rFlg_mem_sex = false;
	var rFlg_mem_school = false;
	var rFlg_mem_blood = false;
	var sFlg_mem_star = false;
	var sFlg_mem_area = false;
	var errMsg = "";
	var setfocus = "";

	for(var r8=0;r8<theForm['mem_sex'].length;r8++){if(theForm['mem_sex'][r8].checked)rFlg_mem_sex=true;}
	for(var r6=0;r6<theForm['mem_school'].length;r6++){if(theForm['mem_school'][r6].checked)rFlg_mem_school=true;}
	for(var r5=0;r5<theForm['mem_blood'].length;r5++){if(theForm['mem_blood'][r5].checked)rFlg_mem_blood=true;}
	for(var s4=0;s4<theForm['mem_star'].length;s4++){if(theForm['mem_star'].options[s4].selected){if(theForm['mem_star'].options[s4].text==theForm['mem_star'].options[0].text)sFlg_mem_star=true;}}
	for(var s0=0;s0<theForm['mem_area'].length;s0++){if(theForm['mem_area'].options[s0].selected){if(theForm['mem_area'].options[s0].text==theForm['mem_area'].options[0].text)sFlg_mem_area=true;}}

	if (!rFlg_mem_school){
		errMsg = "學歷沒有選擇";
		setfocus = "['mem_school'][0]";
	}
	if (!rFlg_mem_blood){
		errMsg = "血型沒有選擇";
		setfocus = "['mem_blood'][0]";
	}
	if (sFlg_mem_star){
		errMsg = "星座沒有選擇";
		setfocus = "['mem_star']";
	}
	if (theForm['mem_nick'].value == ""){
		errMsg = "暱稱沒有填";
		setfocus = "['mem_nick']";
	}
	if (sFlg_mem_area){
		errMsg = "地區沒有選擇";
		setfocus = "['mem_area']";
	}
	if (theForm['mem_address'].value == ""){
		errMsg = "地址沒有填";
		setfocus = "['mem_address']";
	}
	if (!rFlg_mem_sex){
		errMsg = "性別沒有選擇";
		setfocus = "['mem_sex'][0]";
	}
	if (theForm['mem_name'].value == ""){
		errMsg = "姓名沒有填";
		setfocus = "['mem_name']";
	}
	if (errMsg != ""){
		alert(errMsg);
		eval("theForm" + setfocus + ".focus()");
	}else {
        theForm.submit();
    }
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function NM_changeCase(){
	if(document.getElementById){var args=NM_changeCase.arguments;
	for(var i=0;i<args.length;i=i+2){var obj=MM_findObj(args[i]);
	if(obj){(args[i+1])?obj.value=obj.value.toLowerCase():obj.value=obj.value.toUpperCase();}}}
}
//-->

han = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.,-+ ";
zen = "ＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺ０１２３４５６７８９．，－＋　";
function toZenkakuNum(motoText){
	str = "";
	for (i=0; i<motoText.length; i++)
	{
		c = motoText.charAt(i);
		n = zen.indexOf(c,0);
		if (n >= 0) c = han.charAt(n);
		str += c;
	}
	return str;
}
</script>
</body>

</html>