<?php
    /*****************************************/
    //檔案名稱：ad_b2b_mem.php
    //後台對應位置：好好玩管理系統/同業會員資料>修改
    //改版日期：2021.12.21
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/
    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }
    $auton = SqlFilter($_REQUEST["auton"],"int");
    if($_REQUEST["auton"] == "" && $_REQUEST["st"] != "add" && $_REQUEST["st"] != "ad"){
        call_alert("會員編號讀取有誤。", "ClOsE", 0);
    }

    // 修改
    if($_REQUEST["st"] == "ed"){
        $SQL =  "UPDATE b2b_member SET 
                mem_passwd  = '".SqlFilter($_REQUEST["mem_passwd"],"tab")."', 
                mem_name2   = '".SqlFilter($_REQUEST["mem_name2"],"tab")."', 
                mem_name3   = '".SqlFilter($_REQUEST["mem_name3"],"tab")."', 
                mem_name    = '".SqlFilter($_REQUEST["mem_name"],"tab")."', 
                mem_phone   = '".SqlFilter($_REQUEST["mem_phone"],"tab")."', 
                mem_mobile  = '".SqlFilter($_REQUEST["mem_mobile"],"tab")."', 
                mem_fax     = '".SqlFilter($_REQUEST["mem_fax"],"tab")."', 
                mem_mail    = '".SqlFilter($_REQUEST["mem_mail"],"tab")."', 
                mem_num     = '".SqlFilter($_REQUEST["mem_num"],"tab")."' 
                where auton = ".$auton;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            call_alert("修改成功。", ("ad_b2b_mem_fix.php?auton=".$auton),0);
        }
    }

    // 新增
    if($_REQUEST["st"] == "ad"){
        $SQL = "select top 1 * from b2b_member where mem_user = '".SqlFilter($_REQUEST["mem_user"],"tab")."'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch();
        if($result){
            call_alert("此帳號已被使用。", 0,0);
        }else{
            $SQL =  "INSERT INTO b2b_member (mem_user, mem_passwd, mem_name, mem_name2, mem_name3, mem_phone, mem_mobile, mem_fax, mem_mail, mem_num, mem_time) VALUES ('"
                .SqlFilter($_REQUEST["mem_user"],"tab")."', '"
                .SqlFilter($_REQUEST["mem_passwd"],"tab")."', '"
                .SqlFilter($_REQUEST["mem_name"],"tab")."', '"
                .SqlFilter($_REQUEST["mem_name2"],"tab")."', '"
                .SqlFilter($_REQUEST["mem_name3"],"tab")."', '"
                .SqlFilter($_REQUEST["mem_phone"],"tab")."', '"
                .SqlFilter($_REQUEST["mem_mobile"],"tab")."', '"
                .SqlFilter($_REQUEST["mem_fax"],"tab")."', '"
                .SqlFilter($_REQUEST["mem_mail"],"tab")."', '"
                .SqlFilter($_REQUEST["mem_num"],"tab")."', '"
                .date("Y/m/d H:i:s")."')";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
            if($rs){
                call_alert("新增成功。", "ad_b2b_mem.php",0);
            }
        }        
    }

    if($_REQUEST["st"] != "add"){
        $SQL = "select * from b2b_member where auton = ".$auton;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            call_alert("會員資料讀取有誤。", 0,0);
        }else{
            $tt = "修改會員詳細資料 - ".$result["mem_name"];
            $auton = $result["auton"];
            $mem_time = $result["mem_time"];
            $mem_user = $result["mem_user"];
            $mem_passwd = $result["mem_passwd"];
            $mem_name2 = $result["mem_name2"];
            $mem_name3 = $result["mem_name3"];
            $mem_name = $result["mem_name"];
            $mem_phone = $result["mem_phone"];
            $mem_mobile = $result["mem_mobile"];
            $mem_fax = $result["mem_fax"];
            $mem_mail = $result["mem_mail"];
            $mem_num = $result["mem_num"];
            $bb = "修改";
            $cc = "ed";
        }
    }else{
        $tt = "新增會員";
        $mem_user = "<input type='text' name='mem_user'>";
        $bb = "新增";
        $cc = "ad";
    }
    
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_b2b_mem.php">同業會員資料</a></li>
            <li class="active"> <?php echo $tt; ?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong> <?php echo $tt; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form action="?st=ed" class="form-inline" method="post" target="_self">
                    <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                        <tbody>

                            <tr>
                                <td width="92">
                                    <div align="right">編號：</div>
                                </td>
                                <td width="267"><?php echo $auton; ?><input type="hidden" name="auton" value="<?php echo $auton; ?>"></td>
                                <td width="94">
                                    <div align="right">加入時間：</div>
                                </td>
                                <td width="269"><?php echo $mem_time; ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="right">帳號：</div>
                                </td>
                                <td><?php echo $mem_user; ?></td>
                                <td>
                                    <div align="right">密碼：</div>
                                </td>
                                <td><input type="text" name="mem_passwd" value="<?php echo $mem_passwd; ?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="right">同業簡稱：</div>
                                </td>
                                <td><input type="text" name="mem_name2" value="<?php echo $mem_name2; ?>"></td>
                                <td>
                                    <div align="right">公司名稱：</div>
                                </td>
                                <td><input type="text" name="mem_name3" value="<?php echo $mem_name3; ?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="right">聯絡人姓名：</div>
                                </td>
                                <td><input type="text" name="mem_name" value="<?php echo $mem_name; ?>"></td>
                                <td>
                                    <div align="right">電話：</div>
                                </td>
                                <td><input type="text" name="mem_phone" value="<?php echo $mem_phone; ?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="right">手機：</div>
                                </td>
                                <td><input type="text" name="mem_mobile" value="<?php echo $mem_mobile; ?>"></td>
                                <td>
                                    <div align="right">傳真：</div>
                                </td>
                                <td><input type="text" name="mem_fax" value="<?php echo $mem_fax; ?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="right">電子信箱：</div>
                                </td>
                                <td><input type="text" name="mem_mail" value="<?php echo $mem_mail; ?>"></td>
                                <td>
                                    <div align="right">統一編號：</div>
                                </td>
                                <td><input type="text" name="mem_num" value="<?php echo $mem_num; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan=4 align="center"><input type="submit" value="確定修改" class="btn btn-info" style="width:50%;"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>

    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>
