<?php

    /*****************************************/
    //檔案名稱：ad_secretary_group.php
    //後台對應位置：管理系統/秘書資料>團隊管理
    //改版日期：2022.1.18
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
    if ($_SESSION["MM_UserAuthorization"] != "admin") {
        call_alert("您沒有查看此頁的權限。", "login.php", 0);
    }

    if($_REQUEST["st"] == "del"){
        $SQL = "select * from bgroup_list where auton=".SqlFilter($_REQUEST["an"],"int");
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $group_name = $result["group_name"];
        }
        $rs = $SPConn->prepare($SQL);
        $rs->execute("DELETE from bgroup_list where auton=".SqlFilter($_REQUEST["an"],"int"));
        if($group_name != ""){           
            $rs = $SPConn->prepare("update personnel_data_aparty set group_name=NULL where group_name='".$group_name."'");
            $rs->execute();
            $rs = $SPConn->prepare("update personnel_data set group_name=NULL where group_name='".$group_name."'");
            $rs->execute();
            reURL("win_close.php?m=團隊資料刪除中");
        }
    }
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">團隊管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>團隊管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="建立一個新團隊" onclick="Mars_popup('ad_secretary_group_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=500,height=250,top=10,left=10');"></p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <?php 
                            switch($_SESSION["MM_UserAuthorization"]){
                                case "admin":
                                    $sqls = "SELECT * FROM bgroup_list WHERE 1=1";
                                    if($_REQUEST["branch"] != ""){
                                        $sqls = $sqls . " and branch='".SqlFilter($_REQUEST["branch"],"tab")."'";
                                    }
                                    break;
                                case "branch":
                                    $sqls = "SELECT * FROM bgroup_list WHERE branch='".SqlFilter($_REQUEST["branch"],"tab")."'";
                                    break;
                            }
                            $sqls = $sqls . " order by times desc";
                            $rs = $SPConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if($result){
                                echo "<tr><th>隸屬會館</th><th>團隊名稱</th><th>團隊組長</th><th>成立時間</th><th>人數</th><th width=130></th></tr>";
                                foreach($result as $re){
                                    $rs = $SPConn->prepare("select count(p_auto) as tt from personnel_data_aparty where group_name='".$re["group_name"]."'");
                                    $rs->execute();
                                    $result2 = $rs->fetch(PDO::FETCH_ASSOC);
                                    if($result2){
                                        $bp = $result2["tt"]." 人";
                                    }else{
                                        $bp = "0 人";
                                    }                                   
                                    echo "<tr><td>".$re["branch"]."</td><td>".$re["group_name"]."</td><td>".$re["group_leader_name"]."</td><td>".Date_EN($re["times"],7)."</td><td><lable>".$bp."  <input type='button' class='btn btn-default' value='分配隊員' onclick=\"location.href='ad_secretary_group_fanpai.php?an=".$re["auton"]."'\"></lable></td><td><lable><input type='button' class='btn btn-default' value='修改' onclick=\"Mars_popup('ad_secretary_group_add.php?an=".$re["auton"]."','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=500,height=250,top=10,left=10');\"></lable>";
                                    if($_SESSION["MM_UserAuthorization"] == "admin"){
                                        echo "<lable><input type='button' class='btn btn-danger' value='刪除' onclick=\"Mars_popup2('ad_secretary_group.php?st=del&an=".$re["auton"]."','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=200,height=200,top=10,left=10');\"></lable>";
                                    }
                                    echo "</td></tr>";
                                }                                
                            }else{
                                echo "<tr><td height='300'>目前還沒有任何團隊。</td></tr>";
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
    require_once("./include/_bottom.php")
?>