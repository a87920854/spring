<?php
    /*****************************************/
    //檔案名稱：ad_fun_report_list.php
    //後台對應位置：好好玩管理系統/好好玩旅行社回報紀錄表
    //改版日期：2021.12.14
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

    // 檢查權限查詢-總筆數
    switch($_SESSION["MM_UserAuthorization"]){
        case "admin":
            $sqls2 = "SELECT count(log_auto) as total_size FROM log_data Where 1=1";
            break;
        case "branch":
            $sqls2 = "SELECT count(log_auto) as total_size FROM log_data Where log_branch= '".$_SESSION["branch"]."'";
            break;
        default:
            $sqls2 = "SELECT count(log_auto) as total_size FROM log_data Where log_single = '".$_SESSION["MM_username"]."'";
    }

    if($_REQUEST["y1"] != ""){
        $acre_sign1 = SqlFilter($_REQUEST["y1"],"tab")."/".SqlFilter($_REQUEST["m1"],"tab")."/".SqlFilter($_REQUEST["d1"],"tab")." 00:00";
        if(!chkDate($acre_sign1)){
            call_alert("起始日期有誤。", 0, 0);
        }
    }

    if($_REQUEST["y2"] != ""){
        $acre_sign2 = SqlFilter($_REQUEST["y2"],"tab")."/".SqlFilter($_REQUEST["m2"],"tab")."/".SqlFilter($_REQUEST["d2"],"tab")." 23:59";
        if(!chkDate($acre_sign2)){
            call_alert("結束日期有誤。", 0, 0);
        }
    }

    // 以回報日期搜尋
    if(chkDate($acre_sign1) && chkDate($acre_sign2)){
        if(strtotime($acre_sign1) > strtotime($acre_sign2)){
            call_alert("結束日期不能大於起始日期。", 0, 0);
        }
        $sqlss = $sqlss . " and log_time between '".$acre_sign1."' and '".$acre_sign2."'";
    }

    // 以姓名搜尋
    if($_REQUEST["s3"] != ""){
        $sqlss = $sqlss . " and log_username like '%" . str_replace("'", "''", SqlFilter($_REQUEST["s3"],"tab")) . "%'";
    }

    // 以會館搜尋
    if($_REQUEST["s6"] != ""){
        $sqlss = $sqlss . " and log_branch like '%" . str_replace("'", "''", SqlFilter($_REQUEST["s6"],"tab")) . "%'";
    }

    // 以秘書搜尋
    if($_REQUEST["s7"] != ""){
        $sqlss = $sqlss . " and log_single like '%" . str_replace("'", "''", SqlFilter($_REQUEST["s7"],"tab")) . "%'";
    }

    // 以處理情搜尋
    if($_REQUEST["s8"] != ""){
        $sqlss = $sqlss . " and log_2 = '" . str_replace("'", "''", SqlFilter($_REQUEST["s8"],"tab")) . "'";
    }

    // 以處理情搜尋2
    if($_REQUEST["s9"] != ""){
        $sqlss = $sqlss . " and log_3 like '%" . str_replace("'", "''", SqlFilter($_REQUEST["s9"],"tab")) . "%'";
    }

    // 總筆數SQL
    $sqls2 = $sqls2 . $sqlss;
    // 查詢總筆數
    $rs = $FunConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if (!$result){
        $total_size = 0;
    }else{
        switch($_SESSION["MM_UserAuthorization"]){
            case "admin":
                $total_size =  200;
                break;
            case "branch":
                $total_size =  200;
                break;
            default:
                $total_size =  $result["total_size"];
        }
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

    // 檢查權限查詢-每筆資料
    switch($_SESSION["MM_UserAuthorization"]){
        case "admin":
            $sqls = "SELECT top ".$total_size." * FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM log_data Where 1=1";
            break;
        case "branch":
            $sqls = "SELECT top ".$total_size." * FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM log_data Where log_branch= '".$_SESSION["branch"]."'";
            break;
        default:
            $sqls = "SELECT * FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM log_data Where log_single = '".$_SESSION["MM_username"]."'";
    }
    // SQL
    $sqls = $sqls . $sqlss ." order by log_auto desc ) t1 order by log_auto) t2 order by log_auto desc";

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">好好玩旅行社回報紀錄表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩旅行社回報紀錄表 - 數量：<?php echo $result["total_size"]; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form action="ad_fun_report_list.php" method="post" name="form1" class="form-inline">
                        <p>回報日期：
                            <select name="y1" style="width:80px;">
                                <option value="" selected>請選擇</option>
                                <?php 
                                    for($i=date("Y");$i>=2000;$i--){
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                ?>
                            </select>
                            年
                            <select name="m1" style="width:80px;">
                                <option value="">請選擇</option>
                                <?php 
                                    for($i=1;$i<=12;$i++){
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                ?>
                            </select>
                            月
                            <select name="d1" style="width:80px;">
                                <option value="">請選擇</option>
                                <?php 
                                    for($i=1;$i<=31;$i++){
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                ?>
                            </select>
                            日~
                            <select name="y2" style="width:80px;">
                                <option value="" selected>請選擇</option>
                                <?php 
                                    for($i=date("Y");$i>=2000;$i--){
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                ?>
                            </select>
                            年
                            <select name="m2" style="width:80px;">
                                <option value="">請選擇</option>
                                <?php 
                                    for($i=1;$i<=12;$i++){
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                ?>
                            </select>
                            月
                            <select name="d2" style="width:80px;">
                                <option value="">請選擇</option>
                                <?php 
                                    for($i=1;$i<=31;$i++){
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                ?>
                            </select>
                            日
                        </p>
                        <p>會館：
                            <select name="s6" id="branch">
                                <option value="">請選擇</option>
                                <?php
                                    //可視會館名稱
                                    if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" ){
                                        $subSQL = "";
                                    }elseif ( $_SESSION["action_level"] == 2 ){
                                        $subSQL = " And admin_name Not In ('台南','高雄','八德','約專','總管理處')";
                                    }elseif ( $_SESSION["action_level"] == 3 ){
                                        $subSQL = " And admin_name Not In ('約專','總管理處')";
                                    }elseif ( $_SESSION["action_level"] == 1 ){
                                        $subSQL = " And admin_name Not In ('台北','桃園','新竹','台中','八德','約專','總管理處')";
                                    }
                                    $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' ".$subSQL."Order By admin_SOrt";
                                    $rs = $SPConn->prepare($SQL);
                                    $rs->execute();
                                    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($result as $re){ ?>
                                        <option value="<?php echo $re["admin_name"];?>"<?php if ( SqlFilter($_REQUEST["branch"],"tab") == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
                                <?php }?>
                            </select>
                            秘書：
                            <select name="s7" id="single">
                                <option value="">請選擇</option>
                                <?php
                                    if ( $_REQUEST["flag"] == "1" ){ 
                                        $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' Order By p_desc2 Desc, lastlogintime Desc";
                                    }else{
                                        $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' And p_work=1 Order By p_desc2 Desc, lastlogintime Desc";
                                    }
                                    if ( $branch != "" ){
                                        $rs_er = $SPConn->prepare($SQL_er);
                                        $rs_er->execute();
                                        $result_er=$rs_er->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($result_er as $re_er){
                                            if ( $re_er["p_name"] != "" ){ $p_name = $re_er["p_name"]; }
                                            if ( $re_er["p_other_name"] != "" ){ $p_name = $re_er["p_other_name"]; }
                                            echo "<option value='".$re_er["p_user"]."'";
                                            echo ">".$p_name."</option>";
                                        }
                                }?>
                            </select>
                            姓名：
                            <input name="s3" type="text" class="form-control">
                        </p>
                        <p>
                            處理情形：<select name="s8">
                                <?php fun_report_option(); ?>
                            </select>
                            <select name="s9">
                                <option value="">請選擇</option>
                                <option value="不確定時間">不確定時間</option>
                                <option value="考量1-3月出國">考量1-3月出國</option>
                                <option value="考量4-6月出國">考量4-6月出國</option>
                                <option value="考量7-9月出國">考量7-9月出國</option>
                                <option value="考量10-12月出國">考量10-12月出國</option>
                                <option value="不確定地點">不確定地點</option>
                                <option value="考量去東北亞(日韓)">考量去東北亞(日韓)</option>
                                <option value="考量去東南亞(馬新泰菲印)">考量去東南亞(馬新泰菲印)</option>
                                <option value="考量去自由行">考量去自由行</option>
                                <option value="考量去島嶼">考量去島嶼</option>
                                <option value="考量去澳洲">考量去澳洲</option>
                                <option value="考量去美加">考量去美加</option>
                            </select>
                            　<input type="submit" name="Submit" style="height:28px;margin-top:-7px;" value="查詢"> <input type="reset" name="reset" style="height:28px;margin-top:-7px;" value="清空">
                        </p>
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <td width="131">
                                <div align="center" class="style3">回報日期</div>
                            </td>
                            <td width="84">
                                <div align="center" class="style3">類型</div>
                            </td>
                            <td width="71">
                                <div align="center" class="style3">姓名</div>
                            </td>
                            <td width="55">
                                <div align="center" class="style3"></div>
                            </td>
                            <td width="56">
                                <div align="center" class="style3"></div>
                            </td>
                            <td width="333">
                                <div align="center" class="style3">內容</div>
                            </td>
                            <td width="78">
                                <div align="center" class="style3">處理會館</div>
                            </td>
                            <td width="62">
                                <div align="center" class="style3">處理秘書</div>
                            </td>
                            <td width="72">&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $rs = $FunConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=9 height=200>目前沒有資料</td></tr>";                                
                            }else{ 
                                foreach($result as $re){      
                                ?>
                                    <tr>
                                        <td> <div align="center"><?php echo changeDate($re["log_time"]); ?></div></td>
                                        <td>
                                            <div align="center">
                                                <?php 
                                                    if($re["log_5"] == "member"){
                                                        $log_5 = "春天會員";
                                                    }else{
                                                        $log_5 = "排約/活動";
                                                    }
                                                    echo $log_5."<br>".$re["rc"];
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div align="center">
                                                <?php 
                                                    if($re["log_5"] == "gmember"){
                                                        $log_username = "<a href='#' onClick=\"Mars_popup('ad_fun_gmem_detail.php?mem_au=".$re["log_num"]."','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')\">".$re["log_username"]."</a>";
                                                    }elseif($re["log_5"] == "member"){
                                                        $log_username = "<a href='#' onClick=\"Mars_popup('ad_fun_mem_detail.php?mem_au=".$re["log_num"]."','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')\">".$re["log_username"]."</a>";
                                                    }else{
                                                        $log_username = "<a href='#' onClick=\"Mars_popup('ad_fun_detail.php?k_id=".$re["log_num"]."','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')\">".$re["log_username"]."</a>";
                                                    }
                                                    echo $log_username;
                                                ?>
                                            </div>
                                        </td>
                                        <td><div align="center"><?php echo $re["log_2"]; ?></div></td>                                        
                                        <td><div align="center"><?php echo $re["log_3"]; ?></div></td>
                                        <td><?php echo $re["log_4"]; ?></td>
                                        <td><div align="center"><?php echo $re["log_branch"]; ?></div></td>
                                        <td><div align="center"><?php echo $re["log_name"]; ?></div></td>
                                        <td><div align="center"><a href="#" onClick="Mars_popup('ad_fun_report.php?k_id=<?php echo $re["log_num"]; ?>&ty=<?php echo $re["log_5"]; ?>','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">查看</a></div></td>
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
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>