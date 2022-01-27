<?php

    /*****************************************/
    //檔案名稱：ad_secretary_group_fanpai.php
    //後台對應位置：管理系統/秘書資料>團隊管理>分配隊員
    //改版日期：2022.1.20
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

    // 新增團員
    if($_REQUEST["st"] == "add_people"){
        $an = SqlFilter($_REQUEST["an"],"int");
        $add_people = SqlFilter($_REQUEST["add_people"],"tab");        
        if($_REQUEST["add_people"] != ""){            

            $SQL = "select group_name from bgroup_list where auton=".$an;
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch();
            if($result){
                $group_name = $result["group_name"];
            }
            if($group_name != ""){
                $SQL = "update personnel_data set group_name='".$group_name."' where p_user='".$add_people."'";
                $rs = $SPConn->prepare($SQL);
                $rs->execute();
                $SQL = "update personnel_data_aparty set group_name='".$group_name."' where p_user='".$add_people."'";
                $rs = $SPConn->prepare($SQL);
                $rs->execute();
            }
        }
        reURL("ad_secretary_group_fanpai.php?an=".$an);
    }

    // 移出團員
    if($_REQUEST["st"] == "re_people"){
        $an = SqlFilter($_REQUEST["an"],"int");
        if($_REQUEST["p"] != ""){
            $pp = SqlFilter($_REQUEST["p"],"tab");
            $SQL = "update personnel_data set group_name=NULL where p_user='".$pp."'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $SQL = "update personnel_data_aparty set group_name=NULL where p_user='".$pp."'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
        }
        reURL("ad_secretary_group_fanpai.php?an=".$an);
    }
    
    $SQL = "select * from bgroup_list where auton='".SqlFilter($_REQUEST["an"],"int")."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch();
    if($result){
        $branch = $result["branch"];
        $group_name = $result["group_name"];
        $group_leader_name = $result["group_leader_name"];
        $group_leader_id = $result["group_leader_id"];       
    }else{
        call_alert("資料讀取發生錯誤。", 0, 0);
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_secretary_group.php">團隊管理</a></li>
            <li class="active">為 <?php echo $group_name; ?> 分配隊員</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>為 <?php echo $group_name; ?> 分配隊員</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form method="post" class="nomargin" action="ad_secretary_group_fanpai.php?st=add_people" onsubmit="return chk_form()">
                    <p>
                        <lable><b>新增 <?php echo $group_name; ?> 隊員：</b>
                            <select name="add_people" id="add_people">
                                <option value="">請選擇</option>
                                <?php 
                                    $SQL = "select p_user, p_other_name, group_name from personnel_data where p_branch = '".$branch."' and p_work=1 order by p_auto desc";
                                    $rs = $SPConn->prepare($SQL);
                                    $rs->execute();
                                    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                    if($result){
                                        foreach($result as $re){
                                            if($re["group_name"] != ""){
                                                echo "<option value='".$re["p_user"]."' disabled>".$re["p_other_name"]." - 已加入 ".$re["group_name"]."</option>";
                                            }else{
                                                echo "<option value='".$re["p_user"]."'>".$re["p_other_name"]." - 可選擇</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                            <input type="hidden" name="an" value="<?php echo SqlFilter($_REQUEST["an"],"int"); ?>">
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input class="btn btn-default" type="submit" value="新增隊員">
                        </lable>
                    </p>
                </form>
                </p>
                <p>隸屬會館：<?php echo $branch; ?></p>
                <p>目前 <?php echo $group_name; ?> 的團隊經理是：<?php echo $group_leader_name; ?></p>
                <p><b>在 <?php echo $group_name; ?> 中的隊員有：</b></p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <?php 
                            $SQL = "select * from personnel_data where group_name='".$group_name."' and not p_user='".$group_leader_id."'";
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if($result){
                                foreach($result as $re){
                                    echo "<tr><td>".$re["p_branch"]." - ".$re["p_other_name"]."</td><td><a href=\"?st=re_people&p=".$re["p_user"]."&an=".SqlFilter($_REQUEST["an"],"int")."\">移出</a></td></tr>";
                                }                                
                            }else{
                                echo "<tr><td>目前沒有任何隊員</td></tr>";
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

<script type="text/javascript">
    function chk_form() {
        if (!$("#add_people").val()) {
            alert("請選擇隊員。");
            return false;
        }
        return true;
    }
</script>