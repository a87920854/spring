<?php
    /*****************************************/
    //檔案名稱：ad_fun_achievement.php
    //後台對應位置：好好玩管理系統/業務績效表
    //改版日期：2021.12.16
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
    if ($_SESSION["MM_UserAuthorization"] == "action") {
        call_alert("您沒有查看此頁的權限。", "login.php", 0);
    }

    if($_REQUEST["y1"] != ""){
        $acre_sign1 = SqlFilter($_REQUEST["y1"],"tab"). " 00:00";
        if(!chkDate($acre_sign1)){
            call_alert("起始日期有誤。", 0, 0);
        }
    }
    if($_REQUEST["y2"] != ""){
        $acre_sign2 = SqlFilter($_REQUEST["y2"],"tab"). " 23:59";
        if(!chkDate($acre_sign2)){
            call_alert("結束日期有誤。", 0, 0);
        }
    }

    if($acre_sign1 == ""){
        $acre_sign1 = date("Y/m/d"). " 00:00";        
    }
    if($acre_sign2 == ""){
        $acre_sign2 = date("Y/m/d"). " 23:59";        
    }
    
    $sqls2 = "SELECT count(log_auto) as total_size FROM log_data Where 1=1";

    if(chkDate($acre_sign1) && chkDate($acre_sign2)){
        if(strtotime($acre_sign1) > strtotime($acre_sign2)){
            call_alert("結束日期不能大於起始日期。", 0, 0);
        }
        $sqlss = $sqlss . " and log_time between '".$acre_sign1."' and '".$acre_sign2."'";
    }

    // 以姓名搜尋
    if($_REQUEST["s3"] != ""){
        $sqlss = $sqlss . " and log_username like '%" . str_replace("'", "''",SqlFilter($_REQUEST["s3"],"tab")) . "%'";
    }

    // 以會館搜尋
    if($_REQUEST["s6"] != ""){
        $sqlss = $sqlss . " and log_branch like '%" . str_replace("'", "''",SqlFilter($_REQUEST["s6"],"tab")) . "%'";
    }

    // 以秘書搜尋
    if($_REQUEST["s7"] != ""){
        $sqlss = $sqlss . " and log_single like '%" . str_replace("'", "''",SqlFilter($_REQUEST["s7"],"tab")) . "%'";
    }

    // 以log_2搜尋
    if($_REQUEST["s8"] != ""){
        $sqlss = $sqlss . " and log_2 = '" . str_replace("'", "''",SqlFilter($_REQUEST["s8"],"tab")) . "'";
    }

    // 以log_3搜尋
    if($_REQUEST["s9"] != ""){
        $sqlss = $sqlss . " and log_3 like '%" . str_replace("'", "''",SqlFilter($_REQUEST["s9"],"tab")) . "%'";
    }

    $sqls2 = $sqls2 . $sqlss;
    $rs = $FunConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if (!$result){
        $total_size = 0;
    }else{
        $total_size =  $result["total_size"];
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

    $sqls = "SELECT top 200 * FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM log_data Where 1=1";
    $sqls = $sqls . $sqlss . " order by log_auto desc ) t1 order by log_auto) t2 order by log_auto desc";

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">業務績效表 - <?php echo $acre_sign1; ?> ~ <?php echo $acre_sign2; ?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>業務績效表 - <?php echo $acre_sign1; ?> ~ <?php echo $acre_sign2; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form action="ad_fun_achievement.php" method="post" name="form1" class="form-inline">
                        回報日期：<input type="text" name="y1" class="datepicker" autocomplete="off" value="<?php echo Date_EN($acre_sign1,1); ?>"> ~ <input type="text" name="y2" class="datepicker" autocomplete="off" value="<?php echo Date_EN($acre_sign2,1); ?>">
                        　　秘書：
                        <select name="s7" id="s7" class="form-control">
                            <option value="">請選擇</option>
                            <?php 
                                $SQL = "select p_branch,p_other_name, p_user from personnel_data where p_branch='好好玩旅行社' and p_work=1";
                                $rs = $SPConn->query($SQL);
                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                if($result){
                                    foreach($result as $re){
                                        echo "<option value='".$re["p_user"]."'>".$re["p_other_name"]."</option>";
                                    }
                                }
                            ?>
                        </select>
                        　<input type="submit" name="Submit" class="btn btn-default" value="查詢">
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <?php 
                            switch($_REQUEST["st"]){
                                case "step1": ?>
                                    <tr> 
                                        <td width="131"> <div align="center" class="style3">回報日期</div></td>
                                        <td width="84"><div align="center" class="style3">類型</div></td>
                                        <td width="71"><div align="center" class="style3">姓名</div></td>
                                        <td width="55"> <div align="center" class="style3"></div></td>
                                        <td width="56"><div align="center" class="style3"></div></td>
                                        <td width="333"> <div align="center" class="style3">內容</div></td>
                                        <td width="78"> <div align="center" class="style3">處理會館</div></td>
                                        <td width="62"> <div align="center" class="style3">處理秘書</div></td>
                                        <td width="72">&nbsp;</td>
                                    </tr>                                   
                                <?php
                                    $rs = $FunConn->prepare($sqls);
                                    $rs->execute();
                                    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                    if(!$result){   
                                        echo "<tr><td colspan=9 height=200>目前沒有資料</td></tr>";
                                    }else{
                                        foreach($result as $re){
                                            if($re["log_5"] == "member"){
                                                $log_5 = "春天會員";
                                                $log_username = "<a href='#' onClick=\"Mars_popup('ad_fun_mem_detail.php?mem_au=".$re["log_num"]."','',' scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')\">".$re["log_username"]."</a>";
                                            }else{
                                                $log_5 = "排約/活動";
                                                $log_username = "<a href='#' onClick=\"Mars_popup('ad_fun_detail.php?k_id=".$re["log_num"]."','',' scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')\">".$re["log_username"]."</a>";
                                            }
                                            ?>
                                                <tr> 
                                                    <td><div align="center"><?php echo changeDate($re["log_time"]); ?></div></td>
                                                    <td><div align="center"><?php echo $log_5; ?></div></td>
                                                    <td><div align="center"><?php echo $log_username; ?></div></td>
                                                    <td><div align="center"><?php echo $re["log_2"]; ?></div></td>
                                                    <td><div align="center"><?php echo $re["log_3"]; ?></div></td>
                                                    <td><?php echo $re["log_4"]; ?></td>
                                                    <td><div align="center"><?php echo $re["log_branch"]; ?></div></td>
                                                    <td><div align="center"><?php echo $re["log_name"]; ?></div></td>
                                                    <td><div align="center"><a href="#" onClick="Mars_popup('ad_fun_report.php?k_id=<?php echo $re["log_num"]; ?>&ty=<?php echo $re["log_5"]; ?>','',' scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">查看</a></div></td>
                                                </tr>
                                            <?php
                                        }                                        
                                    }
                                    break;
                                default:
                                    $qqsql = "select p_branch,p_other_name, p_user from personnel_data where p_branch='好好玩旅行社' and p_work=1";
                                    if($_REQUEST["s7"] != ""){
                                        $qqsql = $qqsql . " and p_user='".SqlFilter($_REQUEST["s7"],"tab")."'";
                                    }
                                    $rs2 = $SPConn->query($qqsql);
                                    $result2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
                                    if($result2){
                                        foreach($result2 as $re2){
                                            $phonenum = 0;
                                            $rs3 = $FunConn->query("SELECT count(log_auto) as phonenum FROM log_data Where log_single='".$re2["p_user"]."' and log_time between '".$acre_sign1."' and '".$acre_sign2."'");
                                            $result3 = $rs3->fetch(PDO::FETCH_ASSOC);
                                            if($result3){
                                                $phonenum = $result3["phonenum"];
                                            }
                                        
                                            echo "<tr><td width=120>".$re2["p_other_name"]."</td><td><a href=\"?st=step1&s7=".$re2["p_user"]."&y1=".Date_EN($acre_sign1,1)."&y2=".Date_EN($acre_sign2,1)."\">通數：".$phonenum."</a>　";
                                            $full_log2 = [];
                                            $full_log2b = [];
                                            $rs3 = $FunConn->query("SELECT distinct log_2 FROM log_data Where log_single='".$re2["p_user"]."' and log_time between '".$acre_sign1."' and '".$acre_sign2."'");
                                            $result3 = $rs3->fetchAll(PDO::FETCH_ASSOC);                                        
                                            if($result3){
                                                $i = 0;
                                                foreach($result3 as $re3){
                                                    $full_log2[$i] = $re3["log_2"];
                                                    $full_log2b[$i] = 0;
                                                    $i = $i+1;
                                                }
                                            }
                                       
                                            $rs3 = $FunConn->query("SELECT log_2 FROM log_data Where log_single='".$re2["p_user"]."' and log_time between '".$acre_sign1."' and '".$acre_sign2."'");
                                            $result3 = $rs3->fetchAll(PDO::FETCH_ASSOC);                                        
                                            if($result3){
                                                foreach($result3 as $re3){
                                                    $log_2 = $re3["log_2"];
                                                    if($log_2 != ""){
                                                        for($g=0;$g <= count($full_log2);$g++){
                                                            if($full_log2[$g] == $log_2){
                                                                $full_log2b[$g] = $full_log2b[$g]+1;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            $resu = "";
                                            for($gg=0;$gg <= count($full_log2);$gg++){
                                                if($full_log2[$gg] != ""){
                                                    $resu = $resu . $full_log2[$gg] . " " . $full_log2b[$gg] ." 筆/";
                                                }
                                            }
                                            if(substr($resu,-1,1) == "/"){
                                                $resu = substr($resu,0,-1);
                                            }
                                            echo $resu."</td></tr>";
                                        }
                                    }
                            }                       
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->
        <?php 
            if($_REQUEST["st"] == "step1") require_once("./include/_page.php"); 
        ?>                        
    </div>
    <!--/row-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");

        });
    });
</script>