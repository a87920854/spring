<?php
/*****************************************/
//檔案名稱：ad_action_list_sign.php
//後台對應位置：管理系統/網站活動上傳>活動異動單 
//改版日期：2022.2.17
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

$SQL = "select * from action_data where ac_auto='".SqlFilter($_REQUEST["ac_auto"],"int")."'";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetch(PDO::FETCH_ASSOC);
if(!$result){
    echo "暫無資料";
}
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_action_list.php">網站活動上傳</a></li>
            <li class="active">活動異動單 - <?php echo Date_EN($result["ac_time"],9) ?>&nbsp;<?php echo $result["ac_title"] ?>[<?php echo $result["ac_auto"] ?>]</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動異動單 - <?php echo Date_EN($result["ac_time"],9) ?>&nbsp;<?php echo $result["ac_branch"] ?>&nbsp;<?php echo $result["ac_title"] ?>[<?php echo $result["ac_auto"] ?>]</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><a href="ad_action_list_sign_add.php?ac_auto=<?php echo SqlFilter($_REQUEST["ac_auto"],"int"); ?>" class="btn btn-success">新增異動單</a></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=140>申請時間</th>
                            <th width=180>申請人</th>
                            <th width=160>類型</th>
                            <th>內容</th>
                            <th width=120>狀態</th>
                            <th>過程</th>
                            <th width=60></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $SQL = "select * from system_sign where types='活動異動單' and num='".SqlFilter($_REQUEST["ac_auto"],"int")."'";
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=8>暫無資料</td></tr>";
                            }else{
                                foreach($result as $re){ ?>
                                    <tr> 
                                        <td class="center"><?php echo Date_EN($re["times"],9); ?></td>    	
                                        <td class="center"><?php echo $re["branch"]; ?>-<?php echo $re["singlename"]; ?></td>      
                                        <td class="center"><?php echo $re["types"]; ?><?php if($re["types2"] != "") echo "<br>".$re["types2"] ?></td>
                                        <td class="center"><?php echo $re["notes"]; ?></td>
                                        <td class="center">
                                            <?php
                                                if($re["stat"] == 0){
                                                    if($re["needbranch"] == 1){
                                                        echo "待核准";
                                                    }else{
                                                        echo "待處理";
                                                    }
                                                    if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_username"] == $re["single"]){
                                                        $cancelbtn = 1;
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td class="center"><?php echo $re["statnote"]; ?></td>
                                        <td class="center">
                                            <?php 
                                                if($cancelbtn == 1){ ?>
                                                    <a href="#cancel" onclick="Mars_popup2('ad_system_sign_list.php?st=cancel&r=1&an=<?php echo $re['auton']; ?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=250,height=150,top=10,left=10');" class="btn btn-default">取消申請</a>
                                                <?php }
                                            ?>
                                        </td>
                                    </tr>
                                <?php }
                            }
                        ?>
                    </tbody>
                </table>



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
require_once("./include/_bottom.php");
?>