<?php
    /*****************************************/
    //檔案名稱：ad_fun_nofix.php
    //後台對應位置：好好玩管理系統/好好玩手機未完成名單
    //改版日期：2021.12.13
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
    if($_SESSION["MM_UserAuthorization"] == "action"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }
    
    // 轉入春天未入會
    if($_REQUEST["st"] == "trans"){
        $SQL = "Select * FROM mobile_reply where auton=" .SqlFilter($_REQUEST["auton"],"int");
        $rs = $FunConn->query($SQL);
        $result = $rs->fetch();
        if($result){
            $SQL2 = "Select * from member_data where mem_mobile='".$result["mobile"]."'";
            $rs2 = $SPConn->query($SQL2);
            $result2 = $rs2->fetch();
            // 如果春天沒有會員資料則匯入春天
            if(!$result2){
                
            }
        }
    }

    // 轉入好好玩金卡
    if($_REQUEST["st"] == "trans2"){
        $SQL = "";
    }

    // 刪除
    if($_REQUEST["st"] == "del"){
        $SQL = "DELETE FROM mobile_reply where auton=" .SqlFilter($_REQUEST["auton"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=刪除中...");
            exit(); 
        }
    }

    // 若已有好好玩資料便刪除本筆名單
    $SQL = "select * from mobile_reply order by times desc";
    $rs = $FunConn->query($SQL); 
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    if($result){
        foreach($result as $re){
            // 若有好好玩會員資料則刪除本筆名單
            $SQL2 = "SELECT mem_mobile FROM member_data Where mem_mobile='".$re["mobile"]."'";
            $rs2 = $FunConn->query($SQL2);
            $result2 = $rs2->fetch();
            if($result2){
                $SQL2 = "DELETE FROM mobile_reply where mobile='".$re["mobile"]."'";
                $rs2 = $FunConn->prepare($SQL2);
                $rs2->execute();
            }
            // 若有好好玩金卡則刪除本筆名單
            $SQL3 = "SELECT mem_mobile FROM goldcard_data Where mem_mobile='".$re["mobile"]."'";
            $rs3 = $FunConn->query($SQL3);
            $result3 = $rs3->fetch();
            if($result3){
                $SQL3 = "DELETE FROM mobile_reply where mobile='".$re["mobile"]."'";
                $rs3 = $FunConn->prepare($SQL3);
                $rs3->execute();
            } 
        }
    }

    if($_REQUEST["st"] == "add"){
        $SQL = "INSERT INTO mobile_reply (times, name, mobile, email, types) VALUES ('2021/12/13', 'jack', '0926275129', 'a87920854@gmail.com', '55')";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }
    
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">好好玩手機未完成名單</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩手機未完成名單</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>時間</th>
                            <th>姓名</th>
                            <th>手機</th>
                            <th>信箱</th>
                            <th>類型</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php         
                            // 查詢好好玩手機未完成名單
                            $SQL = "select * from mobile_reply order by times desc";
                            $rs = $FunConn->query($SQL);
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=6>目前已無資料</td></tr>";
                            }else{ 
                                foreach($result as $re){   
                                    ?>
                                        <tr>
                                            <td align="center"><?php echo Date_EN($re["times"],1); ?></td>
                                            <td align="center"><?php echo $re["name"]; ?></td>
                                            <td align="center"><?php echo $re["mobile"]; ?></td>
                                            <td align="center"><?php echo $re["email"]; ?></td>
                                            <td align="center"><?php echo $re["types"]; ?></td>
                                            <td align="center">
                                                <div class="btn-group">
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <?php 
                                                            if($_SESSION["MM_UserAuthorization"] != "single"){
                                                                if($re["ch"] == 1){
                                                                    echo "<li><i class='icon-share'></i> 已轉春天未入會</li>";
                                                                }else{
                                                                    echo "<li><a href='?st=trans&auton=".$re["auton"]."'><i class='icon-share'></i> 轉入春天未入會</a></li>"; 
                                                                }
                                                                if($re["ch2"] == 1){
                                                                    echo "<li><i class='icon-share'></i> 已轉好好玩金卡</li>";
                                                                }else{
                                                                    echo "<li><a href='?st=trans2&auton=".$re["auton"]."'><i class='icon-share'></i> 轉入好好玩金卡</a></li>"; 
                                                                }                                                        
                                                            }
                                                            if($_SESSION["MM_UserAuthorization"] == "admin"){
                                                                echo "<li><a href=\"javascript:Mars_popup2('ad_fun_nofix.php?st=del&auton=".$re["auton"]."','','width=300,height=200,top=100,left=100')\"><i class='icon-trash'></i> 刪除</a></li>";
                                                            }
                                                        ?>
                                                    </ul>
                                                </div>								
                                            </td>
                                        </tr>
                                    <?php 
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>