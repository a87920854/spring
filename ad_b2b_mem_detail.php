<?php
    /*****************************************/
    //檔案名稱：ad_b2b_mem.php
    //後台對應位置：好好玩管理系統/同業會員資料>詳細
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
    if($_REQUEST["auton"] == ""){
        call_alert("會員編號讀取有誤。", "ClOsE", 0);
    }

    $SQL = "select * from b2b_member where auton = ".$auton;
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if(!$result){
        call_alert("會員資料讀取有誤。", 0,0);
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_b2b_mem.php">同業會員資料</a></li>
            <li class="active">會員詳細資料 - <?php echo $result["mem_name"]; ?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員詳細資料 - <?php echo $result["mem_name"]; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                    <tbody>

                        <tr>
                            <td width="92">
                                <div align="right">編號：</div>
                            </td>
                            <td width="267"><?php echo $result["auton"]; ?></td>
                            <td width="94">
                                <div align="right">加入時間：</div>
                            </td>
                            <td width="269"><?php echo $result["mem_time"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">帳號：</div>
                            </td>
                            <td><?php echo $result["mem_user"]; ?></td>
                            <td>
                                <div align="right">密碼：</div>
                            </td>
                            <td><?php echo $result["mem_passwd"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">同業簡稱：</div>
                            </td>
                            <td><?php echo $result["mem_name2"]; ?></td>
                            <td>
                                <div align="right">公司名稱：</div>
                            </td>
                            <td><?php echo $result["mem_name3"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">聯絡人姓名：</div>
                            </td>
                            <td><?php echo $result["mem_name"]; ?></td>
                            <td>
                                <div align="right">電話：</div>
                            </td>
                            <td><?php echo $result["mem_phone"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">手機：</div>
                            </td>
                            <td><?php echo $result["mem_mobile"]; ?></td>
                            <td>
                                <div align="right">傳真：</div>
                            </td>
                            <td><?php echo $result["mem_fax"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">電子信箱：</div>
                            </td>
                            <td><?php echo $result["mem_mail"]; ?></td>
                            <td>
                                <div align="right">統一編號：</div>
                            </td>
                            <td><?php echo $result["mem_num"]; ?></td>
                        </tr>
                        <tr>
                            <td colspan=4></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">聯絡窗口：</div>
                            </td>
                            <td colspan=3>
                                <?php 
                                    if($result["mem_single"] != ""){
                                        echo SingleName($result["mem_single"],"normal"); 
                                    }else{
                                        echo "尚未分配窗口";
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">帳號狀態：</div>
                            </td>
                            <td colspan=3>
                                <?php 
                                    if($result["mem_fix"] == 1){
                                        echo "已審核通過";
                                    }else{
                                        echo "尚未審核";
                                    }                                
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>

    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>
