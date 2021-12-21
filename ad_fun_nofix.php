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
    
    // 轉入春天未入會(未測試)
    if($_REQUEST["st"] == "trans"){
        $SQL = "Select * FROM mobile_reply where auton=" .SqlFilter($_REQUEST["auton"],"int");
        $rs = $FunConn->query($SQL);
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $SQL2 = "Select * from member_data where mem_mobile='".$result["mobile"]."'";
            $rs2 = $SPConn->query($SQL2);
            $result2 = $rs2->fetch();
            // 如果春天沒有會員資料則匯入春天
            if(!$result2){
                // msg_num資料表的m_num+1
                $rs2 = $SPConn->query("SELECT * FROM msg_num Where m_auto=1");
                $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                $mem_num = $result2["m_num"]+1;
                $rs2 = $SPConn->prepare("Update msg_num set m_num = ". $mem_num ." where m_auto = 1");
                $rs2->execute();
                // 開始匯入春天
                if($rs2){
                    $SQL3 = "INSERT INTO member_data (all_type, mem_level, mem_num, mem_come, mem_time,  
                            mem_name, mem_mail, mem_blood, mem_marry, mem_mobile, mem_school) VALUES (
                            '未處理', 
                            'guest', '"
                            .$mem_num."',
                            '好好玩手機未完成', '"
                            .date("Y-m-d H:i:s")."', '"
                            .$result["name"]."', '"
                            .$result["email"]."',
                            'A', 
                            '未婚', '"
                            .$result["mobile"]."',
                            '')";
                    $rs3 = $SPConn->prepare($SQL3);
                    $rs3->execute();
                    if($rs3){
                        if($result["ch"] == 1 && $result["ch2"] == 1){
                            $SQL4 = "delete mobile_reply where auton=" .SqlFilter($_REQUEST["auton"],"int");
                            $rs4 = $FunConn->prepare($SQL4);
                            $rs4->execute();
                        }else{
                            $SQL4 = "update mobile_reply set ch=1 where auton=" .SqlFilter($_REQUEST["auton"],"int");
                            $rs4 = $FunConn->prepare($SQL4);
                            $rs4->execute();
                        }
                        if($rs4){
                            reURL("ad_fun_nofix.php");
                        }else{
                            call_alert("設定失敗。",0,0);
                        }                       
                    }else{                        
                        call_alert("資料轉入失敗。",0,0);
                        exit();
                    }
                }
            }
        }
    }

    // 轉入好好玩金卡(未測試)
    if($_REQUEST["st"] == "trans2"){
        $SQL = "Select * FROM mobile_reply where auton=" .SqlFilter($_REQUEST["auton"],"int");
        $rs = $FunConn->query($SQL);
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            // 查金卡有無紀錄
            $SQL2 = "Select * from goldcard_data where mem_mobile='" .$result["mobile"]. "'";
            $rs2 = $FunConn->query($SQL2);
            $result2 = $rs->fetch();
            if(!$result2){
                // number_list的nums +1 
                $SQL2 = "select nums from number_list where types='goldcard'";
                $rs2 = $FunConn->query($SQL2);
                $result2 = $rs->fetch();
                $mem_num = $result2["nums"]+1;
                $rs2 = $SPConn->prepare("Update number_list set m_num = ". $mem_num ." where types='goldcard'");
                $rs2->execute();
                // 開始匯入金卡
                if($rs2){
                    $SQL3 = "INSERT INTO number_list (all_type, mem_level, mem_num, mem_come, mem_time,  
                            mem_name, mem_mail, mem_marry, mem_mobile, mem_school) VALUES (
                            '未處理', 
                            'guest', '"
                            .$mem_num."',
                            '好好玩手機未完成', '"
                            .date("Y-m-d H:i:s")."', '"
                            .$result["name"]."', '"
                            .$result["email"]."',
                            '未婚', '"
                            .$result["mobile"]."',
                            '')";
                    $rs3 = $SPConn->prepare($SQL3);
                    $rs3->execute();
                    if($rs3){
                        if($result["ch"] == 1 && $result["ch2"] == 1){
                            $SQL4 = "delete mobile_reply where auton=" .SqlFilter($_REQUEST["auton"],"int");
                            $rs4 = $FunConn->prepare($SQL4);
                            $rs4->execute();
                        }else{
                            $SQL4 = "update mobile_reply set ch2=1 where auton=" .SqlFilter($_REQUEST["auton"],"int");
                            $rs4 = $FunConn->prepare($SQL4);
                            $rs4->execute();
                        }
                        if($rs4){
                            reURL("ad_fun_nofix.php");
                        }else{
                            call_alert("設定失敗。",0,0);
                        }                       
                    }else{                        
                        call_alert("資料轉入失敗。",0,0);
                        exit();
                    }
                }
            }
        }
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

    // 查詢總筆數
    $sqls2 = "select count(auton) as total_size from mobile_reply";    
    $rs = $FunConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if (!$result){
        $total_size = 0;
    }else{
        $total_size = $result["total_size"]; //總筆數
    }

    $tPage = 1; //目前頁數
    $tPageSize = 20; //每頁幾筆
	if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
	$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
	if ( $tPageSize*$tPage < $total_size ){
		$page2 = 20;
	}else{
		$page2 = (20-(($tPageSize*$tPage)-$total_size));
	}

    // 測試用
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
                            $SQL = "select * from (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * from mobile_reply order by times desc ) t1 order by times) t2 order by times desc";
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
            <!-- 頁碼 -->
            <?php require_once("./include/_page.php"); ?>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>