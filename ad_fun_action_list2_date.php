<?php
/*****************************************/
//檔案名稱：ad_fun_action_list2_date.php
//後台對應位置：好好玩管理系統/好好玩國外團控 > 報名/花絮
//改版日期：2022.2.23
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

$ac_auto = SqlFilter($_REQUEST["ac"],"int");

// 刪除
if($_REQUEST["st"] == "del"){
    $SQL = "delete from travel_date where auton=".SqlFilter($_REQUEST["an"],"int")." and ac_auto=".$ac_auto."";
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    reURL("win_close.php?m=刪除中...");
}

// 新增
if($_REQUEST["st"] == "add"){
    $SQL = "select top 1 * from travel_date where dates='".SqlFilter($_REQUEST["dates"],"tab")."' and ac_auto=".$ac_auto."";
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if(!$result){
        $dates = Date_EN(SqlFilter($_REQUEST["dates"],"tab"),1);
        $SQL = "INSERT INTO travel_date (ac_auto,dates) VALUES ('".$ac_auto."','".$dates."')";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }
    reURL("ad_fun_action_list2_date.php?ac=".$ac_auto);
}

$SQL = "select ac_title from actionf_data where ac_auto=".$ac_auto."";
$rs = $FunConn->prepare($SQL);
$rs->execute();
$result = $rs->fetch(PDO::FETCH_ASSOC);
if($result){
    $ac_title = $result["ac_title"];
}else{
    call_alert("讀取資料有誤。",0,0);
}

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action_list2.php">好好玩國外團控</a></li>
            <li class="active"><?php echo $ac_title; ?> 報名/花絮</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $ac_title; ?> 報名/花絮</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td width=120>出發日期請從行程頁設計中增刪</td>
                    </tr>
                </table>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <th width=140>出發日期</th>
                        <th>報名人數</th>
                        <th>花絮</th>
                        <th width=80></th>
                    </tr>
                    <?php 
                        $SQL = "select t1 from travel_data where ac_auto=".$ac_auto."";
                        $rs = $FunConn->prepare($SQL);
                        $rs->execute();
                        $result = $rs->fetch(PDO::FETCH_ASSOC);
                        if($result){
                            $t1all = $result["t1"];
                        }

                        if($t1all != ""){
                            if(count(explode(",",$t1all)) >= 0){
                                foreach(explode(",",$t1all) as $t1s){
                                    $t1s = trim($t1s);
                                    if(chkDate($t1s)){
                                        $SQL = "select top 1 * from travel_date where dates='".$t1s."' and ac_auto=".$ac_auto."";
                                        $rs = $FunConn->prepare($SQL);
                                        $rs->execute();
                                        $result = $rs->fetch(PDO::FETCH_ASSOC);
                                        if(!$result){                                            
                                            $SQL = "INSERT INTO travel_date (ac_auto,dates) VALUES ('".$ac_auto."','".Date_EN($t1s,1)."')";
                                            $rs = $FunConn->prepare($SQL);
                                            $rs->execute();
                                        }
                                    }
                                }
                            }
                        }

                        $SQL = "select * from travel_date where ac_auto=".$ac_auto." order by dates desc";
                        $rs = $FunConn->prepare($SQL);
                        $rs->execute();
                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                        if($result){
                            foreach($result as $re){
                                $dates = Date_EN($re["dates"],1);
                                $dates2 = $dates;
                                $a1 = 0;
                                $a2 = 0;
                                $a3 = 0;
                                $b1 = 0;
                                $b2 = 0;
                                $b3 = 0;
                                $aa = 0;
                                $SQL = "select k_sex,sizes, k_be from love_keyin where ac_auto=".$ac_auto." and all_kind='國外旅遊' and datediff(d, action_time, '".$dates."') = 0";
                                $rs = $FunConn->prepare($SQL);
                                $rs->execute();
                                $result2 = $rs->fetchAll(PDO::FETCH_ASSOC);
                                if($result){
                                    foreach($result2 as $re2){
                                        if($re2["k_sex"] == "男"){
                                            if($re["k_be"] == 1){
                                                $a2 = $a2+1;
                                            }else{
                                                $a1 = $a1+1;
                                            }
                                            $a3 = $a3+1;
                                        }else{
                                            if($re["k_be"] == 1){
                                                $b2 = $b2+1;
                                            }else{
                                                $b1 = $b1+1;
                                            }
                                            $b3 = $b3+1;
                                        }
                                        $aa = $aa + $re2["sizes"];                                        
                                    }
                                }

                                if($re["keep"] == "1"){
                                    $dates = "<s>".$dates."</s>";
                                }
                                ?>
                                <tr>
                                    <td><?php echo $dates; ?></td>
                                    <td>
                                        <?php echo "<a href='ad_fun_action_list_singup2.php?ac=".$ac_auto."&da=".$dates2."'>" .$aa. " 人</a>"; ?>　(男： 正取 <?php echo $a1; ?> 人/備取 <?php echo $a2; ?> 人/共 <?php echo $a3; ?> 人、女：正取 <?php echo $b1; ?> 人/備取 <?php echo $b2; ?> 人/共 <?php echo $b3; ?> 人)
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                            <ul class="dropdown-menu pull-right">
                                                <?php 
                                                    if($_SESSION["MM_UserAuthorization"] == "admin"){ ?>
                                                        <li><a href="ad_fun_action_pic2.php?ac_auto=<?php echo $ac_auto; ?>&d=<?php echo $dates2; ?>"><i class="icon-trash"></i> 花絮</a></li>
								                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2_date.php?st=del&an=<?php echo $re["auton"]; ?>&ac=<?php echo $ac_auto; ?>','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                                    <?php }
                                                ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                        }

                    ?>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    <hr>
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $mtu = "ad_fun_action_list2.";
    $(function() {

    });

    function check_add_submit() {
        if (!$("#dates").val()) {
            alert("請輸入要新增的出發日期。");
            $("#dates").focus();
            return false;
        }
        return true;
    }
</script>