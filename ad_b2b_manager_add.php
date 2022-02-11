<?php
    /*****************************************/
    //檔案名稱：ad_b2b_manager_add.php
    //後台對應位置：管理系統/通路管理>新增(修改)通路管理
    //改版日期：2022.2.7
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/
    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");
    // 製作EDM內容用
    require_once("./include/_b2b_manager_email.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }
    if($_SESSION["MM_UserAuthorization"] != "admin"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    // 寄信fuction(待測試，需要用外掛PHPMailer，因要加附件)
    function EmailTo_Singleparty($to, $subject, $mailbody, $file){
        $to      = $_REQUEST["mem_mail"];
        $subject = '好好玩旅行社';        
        $headers = array(
            'From' => '好好玩旅行社 <funtour@funtour.com.tw>',
            'X-Mailer' => 'PHP/' . phpversion()
        );
        mail($to, $subject, $mailbody, $headers);
    }

    // 製造QRcode功能
    function SaveFileFromUrl($uid){
        $uid = trim($uid);
        $url = "http://chart.apis.google.com/chart?cht=qr&chl=https://www.singleparty.com.tw/?ch=".$uid."&chs=250x250";
        $output = "singleparty_channel/qrcode_".$uid.".jpg";
        file_put_contents($output, file_get_contents($url));    
    }

    if($_REQUEST["st"] == "addsave"){
        $an = SqlFilter($_REQUEST["an"],"int");
        $uid = SqlFilter($_REQUEST["uid"],"tab");
        $uid = str_replace(" ","",$uid);
        $ubday1 = SqlFilter($_REQUEST["ubday1"],"tab");
        $ubday2 = SqlFilter($_REQUEST["ubday2"],"tab");
        $ubday3 = SqlFilter($_REQUEST["ubday3"],"tab");
        $phone = chk_mobile($_REQUEST["phone"]);

        if($phone == ""){
            call_alert("手機號碼有誤。",0,0);
        }

        $ubday = $ubday1."/".$ubday2."/".$ubday3;
        $makeqrcode = 0;
        
        if($_REQUEST["review"] == "1"){
            $review = 1;
        }elseif($_REQUEST["review"] == "2"){
            $review = 2;
        }else{
            $review = 0;
        }

        if($an != ""){
            $SQL = "SELECT * FROM b2b_manager Where auton = ".$an."";
        }else{
            $SQL = "select top 1 * from b2b_manager where phone='".$phone."'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                call_alert("此手機號碼重覆，請重新輸入。", 0, 0);
            }

            $SQL = "SELECT top 1 * FROM b2b_manager where uid='".$uid."'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                call_alert("代號重複。", 0, 0);
            }
        }        
        
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            // 新增
            if($_REQUEST["lv"] == "通路"){
                $qrcode = "qrcode_".$uid.".jpg";
                $makeqrcode = 1;
	            $makenew = 1;
            }
            $SQL =  "INSERT INTO b2b_manager (uid,name,upd,phone,sex,email,area,marry,bday,address,lineid,come,lv,cbranch,csingle,review,times,qrcode) VALUES ('"
                    .$uid."','"
                    .SqlFilter($_REQUEST["name"],"tab")."','"
                    .SqlFilter($_REQUEST["upd"],"tab")."','"
                    .$phone."','"
                    .SqlFilter($_REQUEST["sex"],"tab")."','"
                    .SqlFilter($_REQUEST["email"],"tab")."','"
                    .SqlFilter($_REQUEST["area"],"tab")."','"
                    .SqlFilter($_REQUEST["marry"],"tab")."','"
                    .$ubday."','"
                    .SqlFilter($_REQUEST["address"],"tab")."','"
                    .SqlFilter($_REQUEST["lineid"],"tab")."','"
                    .SqlFilter($_REQUEST["come"],"tab")."','"
                    .SqlFilter($_REQUEST["lv"],"tab")."','"
                    .SqlFilter($_REQUEST["branch"],"tab")."','"
                    .SqlFilter($_REQUEST["single"],"tab")."','"
                    .$review."','"
                    .date("Y/m/d H:i:s")."','"
                    .$qrcode."')";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
        }else{
            // 更新
            if($_REQUEST["lv"] == "通路"){
                if($review == 1){
                    if($result["qrcode"] == "" || is_null($result["qrcode"])){
                        $qrcode = "qrcode_".$uid.".jpg";
                    }
                }
            }         
            $SQL =  "UPDATE b2b_manager SET 
                    uid = '".$result["uid"]."', 
                    name = '".SqlFilter($_REQUEST["name"],"tab")."', 
                    upd = '".SqlFilter($_REQUEST["upd"],"tab")."', 
                    phone = '".$phone."',
                    sex = '".SqlFilter($_REQUEST["sex"],"tab")."',
                    email = '".SqlFilter($_REQUEST["email"],"tab")."',
                    area = '".SqlFilter($_REQUEST["area"],"tab")."',
                    marry = '".SqlFilter($_REQUEST["marry"],"tab")."',
                    bday = '".$ubday."',
                    address = '".SqlFilter($_REQUEST["address"],"tab")."',
                    lineid = '".SqlFilter($_REQUEST["lineid"],"tab")."',
                    come = '".SqlFilter($_REQUEST["come"],"tab")."',
                    lv = '".SqlFilter($_REQUEST["lv"],"tab")."',
                    cbranch = '".SqlFilter($_REQUEST["branch"],"tab")."',
                    csingle = '".SqlFilter($_REQUEST["single"],"tab")."',
                    review = '".$review."',
                    qrcode = '".$qrcode."'
                    WHERE auton = ".$an."";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();

            // 更新日誌
            if($rs){
                $chlog = "";
                if($result["name"] != $_REQUEST["name"]){
                    $chlog = $chlog."[姓名]".$result["name"]."=>".SqlFilter($_REQUEST["name"],"tab");
                }
                if($result["phone"] != $phone){
                    $chlog = $chlog."[電話]".$result["phone"]."=>".$phone;
                }
                if($result["review"] != $review){
                    $chlog = $chlog."[審核]".$result["review"]."=>".$review;
                    if($_REQUEST["email"] != "" && $result["review"] != 2){               
                        if($review == 1){   
                            //寄通過信(寄信功能待測試)                 
                            // EmailTo_Singleparty($_REQUEST["email"], "斜槓紅娘審核通過通知", go_b2b_manager(1), "C:\inetpub\wwwroot\important_file\singleparty\channel\斜槓紅娘條款同意書.docx");
                            $chlog = $chlog."(寄出通過信至 ".$_REQUEST["email"].")";
                        }else{
                            //寄不通過信(寄信功能待測試)
                            // EmailTo_Singleparty($_REQUEST["email"], "斜槓紅娘審核通過通知", go_b2b_manager(0), "");
                            $chlog = $chlog."(寄出未通過信至 ".$_REQUEST["email"].")";
                        }
                    }
                }
            }            
        }
        
        //製造QRcode
        if($makeqrcode == 1){
            SaveFileFromUrl($uid);
        }

        // 更新日誌(建立)
        if($makenew == 1){
            $msg = "後台建立帳號 - 由 ".$_SESSION["p_other_name"];
            $SQL = "INSERT INTO b2b_manager_log (uid,msg,times,who,whoid) VALUES ('".$uid."', '".$msg."', '".date("Y/m/d H:i:s")."', '".$_SESSION["p_other_name"]."', '".$_SESSION["MM_Username"]."')";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
        }

        // 更新日誌(修改)
        if($chlog != ""){
            $msg = $_SESSION["p_other_name"]."於".date("Y-m-d H:i:s")."修改資料".$chlog."";
            $SQL = "INSERT INTO b2b_manager_log (uid,msg,times,who,whoid) VALUES ('".$uid."', '".$msg."', '".date("Y/m/d H:i:s")."', '".$_SESSION["p_other_name"]."', '".$_SESSION["MM_Username"]."')";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
        }

        reURL("ad_b2b_manager.php");
    }
    
    if($_REQUEST["an"] != ""){
        $tt = "修改";
        $tt2 = "?st=addsave";
        $an = SqlFilter($_REQUEST["an"],"int");
        $SQL = "SELECT * FROM b2b_manager where auton=".$an."";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $uid = $result["uid"];
            $names = $result["name"];
            $upd = $result["upd"];
            $come = $result["come"];
            $lv = $result["lv"];
            $cbranch = $result["cbranch"];
            $csingle = $result["csingle"];
            $phone = $result["phone"];
            $bday = $result["bday"];
            $sex = $result["sex"];
            $email = $result["email"];
            $area = $result["area"];
            $marry = $result["marry"];
            $address = $result["address"];
            $uiddiabled = " disabled";
            $bday1 = date("Y",strtotime($bday));
            $bday2 = date("m",strtotime($bday));
            $bday3 = date("d",strtotime($bday));
            $lineid = $result["lineid"];
            $workstat = $result["workstat"];
            $same = $result["same"];
            $review = $result["review"];
            $regip = $result["regip"];
            $times = $result["times"];
        }        
    }else{
        $tt = "新增";
        $tt2 = "?st=addsave";
        $uiddiabled = " required";
        $review = 0;
    }
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_b2b_manager.php">通路管理</a></li>
            <li class="active"><?php echo $tt; ?>通路管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $tt; ?>通路管理</strong> <!-- panel title -->
                </span>
            </div>
             <div class="panel-body">
                <form name="form1" method="post" action="ad_b2b_manager_add.php<?php echo $tt2; ?>" class="form-inline" onsubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <thead>
                            <tr>
                                <td>
                                    *真實姓名： <input name="name" type="text" id="name" value="<?php echo $names; ?>" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    代號：<input name="uid" type="text" id="uid" value="<?php echo $uid; ?>" class="form-control" pattern="^[A-Za-z0-9]+$" <?php echo $uiddiabled; ?>>&nbsp;&nbsp;<small>會公開,勿用敏感資料</small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    *密碼：<input name="upd" type="text" id="upd" value="<?php echo $upd; ?>" class="form-control" required> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    *手機：<input name="phone" type="tel" id="phone" value="<?php echo $phone; ?>" class="form-control" pattern="^[09]{2}[0-9]{8}$" minlength="10" maxlength="10" title="請輸入 09 開頭的十位數手機號碼" required> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    *生日：西元
                                    <select name="ubday1" id="ubday1" required>
                                        <?php 
                                            for($i=date("Y")-20;$i>=date("Y")-90;$i--){
                                                echo  "<option value=".$i."";
                                                if($i == $bday1) echo " selected";
                                                echo ">".$i."</option>";
                                            }
                                        ?>
                                    </select>
                                    年
                                    <select name="ubday2" id="ubday2" required>
                                        <?php 
                                            for($i=1;$i<=12;$i++){
                                                if($i == $bday2){
                                                    echo "<option value='".$i."' selected>".$i."</option>";
                                                }else{
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                    月
                                    <select name="ubday3" id="ubday3" required>
                                        <?php 
                                            for($i=1;$i<=31;$i++){
                                                if($i == $bday3){
                                                    echo "<option value='".$i."' selected>".$i."</option>";
                                                }else{
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                }
                                            }
                                        ?>
                                    </select> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    性別：
                                    <label class="radio">
                                        <input type="radio" name="sex" value="男" <?php if($sex == "男") echo "CHECKED"; ?>>
                                        <i></i>男
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="sex" value="女" <?php if($sex == "女") echo "CHECKED"; ?>>
                                        <i></i>女
                                    </label> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    電子信箱：<input name="email" type="email" id="email" value="<?php echo $email; ?>" class="form-control"> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    居住地區：
                                    <select name="area" id="area">
                                        <option value="">請選擇</option>
                                        <?php
                                            $areaArry = array("新北市", "台北市", "基隆市", "宜蘭縣", "桃園市", "新竹縣", "新竹市", "苗栗縣", "苗栗市", "台中市", "彰化縣", "彰化市", "南投縣", "嘉義縣", 
                                                    "嘉義市", "雲林縣", "台南市", "高雄市", "屏東縣", "花蓮縣", "台東縣", "澎湖縣", "金門縣", "馬祖", "綠島", "蘭嶼", "其他");
                                            foreach($areaArry as $ar){
                                                if($ar == $area){
                                                    echo "<option value=" .$ar. " selected>" .$ar. "</option>";
                                                }else{
                                                    echo "<option value=" .$ar. ">" .$ar. "</option>";
                                                }
                                            }
                                        ?> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    婚姻狀態：
                                    <select name="marry" id="marry">
                                        <option value="">請選擇</option>
                                        <?php 
                                            $marryArry = array("未婚","離婚","喪偶","已婚","交往中","有心儀對象"); 
                                            foreach($marryArry as $ma){
                                                if($ma == $result["mem_marry"]){
                                                    echo "<option value=" .$ma. " selected>" .$ma. "</option>";
                                                }else{
                                                    echo "<option value=" .$ma. ">" .$ma. "</option>";
                                                }
                                            }
                                        ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    LINE ID：<input name="lineid" type="text" id="lineid" value="<?php echo $lineid; ?>" class="form-control"> 　
                                </td>
                            </tr>

                            <tr>
                                <td>

                                    地址：<input name="address" type="text" id="address" value="<?php echo $address; ?>" class="form-control" style="width:80%"> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    *類型：
                                    <select name="lv" id="lv" class="form-control" required>
                                        <option value="">請選擇</option>
                                        <option value="通路"<?php if($lv == "通路") echo " selected"; ?>>通路</option>
                                        <option value="講師"<?php if($lv == "講師") echo " selected"; ?>>講師</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    上線：
                                    <select name="branch" id="branch">
                                        <option value="">請選擇</option>
                                        <?php
                                            $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' Order By admin_SOrt";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);                                
                                            foreach($result as $re){
                                                if($cbranch == $re["admin_name"]){
                                                    echo "<option value='".$re["admin_name"]."' selected>".$re["admin_name"]."</option>";  
                                                }else{
                                                    echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";  
                                                }
                                                                             
                                            }                                           
                                        ?>
                                    </select>
                                    <select name="single" id="single">
                                        <option value="">請選擇</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    工作狀態：<?php echo $workstat; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    是否任職交友/婚友業：<?php echo $same; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="radio"><input type="radio" name="review" id="review" value="1"<?php if($review == 1) echo " checked"; ?>><i></i> 審核通過</label>
                                    <label class="radio"><input type="radio" name="review" id="review" value="0"<?php if($review == 0) echo " checked"; ?>><i></i> 審核不通過</label>
                                    <label class="radio"><input type="radio" name="review" id="review" value="2"<?php if($review == 2) echo " checked"; ?>><i></i> 關閉帳號</label>
                                    <br>
                                    <font color=red><small>請不要隨意更改此選項，會寄出信件通知</small></font>
                                </td>
                            </tr>
                            <?php  
                                if($_REQUEST["an"] != ""){ ?>
                                     <tr>
                                        <td>註冊資訊：<?php echo $regip; ?> on <?php echo Date_EN($times,9); ?></td>
                                    </tr>
                                <?php }
                            ?>
                            <tr>
                                <td colspan="2">
                                    <div align="center">
                                        <?php 
                                            if($_REQUEST["an"] != ""){ ?>
                                                <input type="submit" name="Submit" class="btn btn-info" value="確定修改" style="width:50%;">
                                                <input type="hidden" id="an" name="an" value="<?php echo $an; ?>">
                                                <input type="hidden" id="come" name="come" value="<?php echo $come; ?>">
                                            <?php }else{ ?>
                                                <input type="submit" name="Submit" class="btn btn-info" value="確定新增" style="width:50%;">
                                            <?php }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </form>

                <?php 
                    if($_REQUEST["an"] != ""){
                        $SQL = "select * from b2b_manager_log where uid='".$uid."' order by times desc";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                        if($result){
                            echo "<table class='table table-striped table-bordered bootstrap-datatable'>";
                            foreach($result as $re){
                                echo "<tr><td width=160>".Date_EN($re["times"],9)."</td><td>".$re["msg"]."</td><td>".$re["who"]."</td></tr>";
                            }
                            echo "</table>";
                        }   
                    }
                ?>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>

<script type="text/javascript">

</script>