<?php
    /*****************************************/
    //檔案名稱：ad_fun_action_singup1.php
    //後台對應位置：好好玩管理系統/好好玩國內團控/(活動名)/報名詳細資料
    //改版日期：2021.11.25
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

    $ac = SqlFilter($_REQUEST["ac"],"int"); //活動編號
    $k_id = SqlFilter($_REQUEST["id"],"int"); //會員編號

    // 更新k_pay_num, k_pay_check
    if($_REQUEST["st"] == "uppaynum"){
        if($_REQUEST["full"] == "1"){
            $k_pay_num = SqlFilter($_REQUEST["k_pay_num"],"tab");
            $k_pay_check = SqlFilter($_REQUEST["k_pay_check"],"tab");
        }
        if($_REQUEST["k_pay_num"] != ""){
            if($_REQUEST["k_pay_num"] == "none"){
                $k_pay_num = "";
            }else{
                $k_pay_num = SqlFilter($_REQUEST["k_pay_num"],"tab");
            }
        }
        if($_REQUEST["k_pay_check"] != ""){ 
            if($_REQUEST["k_pay_check"] == "none"){
                $k_pay_check = "";
            }else{
                $k_pay_check = SqlFilter($_REQUEST["k_pay_check"],"tab");
            }
        }
        $SQL = "UPDATE love_keyin SET k_pay_num = '".$k_pay_num."', k_pay_check = '".$k_pay_check."' WHERE k_id = " .$k_id;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }

    // 刪除本筆資料
    if($_REQUEST["st"] == "del"){
        $SQL = "SELECT * FROM love_keyin WHERE k_id ='" . $k_id . "'";    
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        
        if($result){
            // 刪除本地照片檔案
            $urlpath = "funtour_image\\joinf\\";
            if($result["p1"] != ""){
                DelFile($urlpath . $result["p1"]);
            }
            if($result["p5"] != ""){
                DelFile($urlpath . $result["p2"]);
            }
            if($result["p3"] != ""){
                DelFile($urlpath . $result["p3"]);
            }

            // 刪除資料
            $SQL = "DELETE FROM love_keyin WHERE k_id ='" . $k_id . "'";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
            if($rs){
                reURL("win_close.php?m=刪除中...");
                exit();
            }            
        }
    }

    // 更新k_be
    if($_REQUEST["st"] == "k_be"){
        if($_REQUEST["v"] != ""){
            $k_be = SqlFilter($_REQUEST["v"],"tab");
        }else{
            $k_be = "";        }
        $SQL = "UPDATE love_keyin SET k_be ='".$k_be."' WHERE k_id ='" . $k_id . "'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=變更中...");
            exit();
        }
    }

    // 查詢活動名稱
    $SQL = "select ac_title from action_data where ac_auto=" .$ac;
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $ac_title = $result["ac_title"];
    }else{
        call_alert("讀取資料有誤。",0,0);
    }

    // 查詢條件-姓名
    if($_REQUEST["s1"] != ""){
        $sqlss = $sqlss . " and k_name like '%" .SqlFilter($_REQUEST["s1"],"tab"). "%'";
    }
    // 查詢條件-手機號碼
    if($_REQUEST["s2"] != ""){
        $sqlss = $sqlss . " and k_mobile like '%" .reset_number(SqlFilter($_REQUEST["s2"],"tab")). "%'";
    }

    // 計算總筆數
    $total_size = 0;
    $rs = $FunConn->prepare("SELECT count(k_id) as totals FROM love_keyin WHERE ac_auto = " . $ac . $sqlss);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $total_size = $result["totals"];
    }

    $tPage = 1; //目前頁數
    $tPageSize = 50; //每頁幾筆
	if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
	$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
	if ( $tPageSize*$tPage < $total_size ){
		$page2 = 50;
	}else{
		$page2 = (50-(($tPageSize*$tPage)-$total_size));
	}

    $sqls = "SELECT * FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM love_keyin WHERE ac_auto = " .$ac;
    // $sqls = "SELECT * FROM love_keyin WHERE ac_auto = " .$ac;
    $sqls = $sqls . $sqlss . " order by k_time desc ) t1 order by k_time) t2 order by k_time desc";
    
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action_list1.php">好好玩國內團控</a></li>
            <li><?php echo $ac_title; ?></li>
            <li class="active">報名詳細資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $ac_title; ?> - 報名詳細資料</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <a href="ad_fun_action_list_padd.php?ac=<?php echo $ac; ?> " class="btn btn-info margin-bottom-10"><i class="icon-plus-sign"></i> 新增本活動的報名資料</a>
                    <form id="searchform" action="ad_fun_action_list_singup1.php?ac=<?php echo $ac; ?>&vst=full" method="post" target="_self" class="form-inline" onsubmit="return check_send_submit()">
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <td>姓名：<input name="s1" id="s1" type="text" class="form-control"></td>
                            <td>手機：<input name="s2" id="s2" type="text" class="form-control"></td>
                            <td><input type="submit" value="搜尋" class="btn btn-default"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                
                <?php 
                    $bsize = 0;
                    $bsize2 = 0;
                    $gsize = 0;
                    $gsize2 = 0;
                    $tsize = 0;

                    $SQL = "SELECT k_sex, k_be FROM love_keyin WHERE all_kind <> '國外旅遊' and ac_auto = " .$ac;
                    $rs = $FunConn->prepare($SQL);
                    $rs->execute();
                    $result = $rs->fetchAll(PDO::FETCH_ASSOC);                    
                    if($result){
                        foreach($result as $re){
                            if($re["k_sex"] == "男"){
                                if($re["k_be"] == 1){
                                    $bsize2 = $bsize2 +1;
                                }else{
                                    $bsize = $bsize +1;
                                }
                            }else{
                                if($re["k_be"] == 1){
                                    $gsize2 = $gsize2 +1;
                                }else{
                                    $gsize = $gsize +1;
                                }
                            }
                        }
                        $tsize = $gsize + $gsize2 + $bsize + $bsize2; 
                    }
                ?>

                <p><b>男：正取 <?php echo $bsize; ?>/備取 <?php echo $bsize2; ?> 人、女：正取 <?php echo $gsize; ?>/備取 <?php echo $gsize2; ?> 人、共：<?php echo $tsize; ?> 人　(備取人員將不會出現在要保明細中)</b></p>
                <p><a class="btn btn-success" href="javascript:Mars_popup('ad_fun_action_list_singup1_print.php?ac=<?php echo $ac; ?>','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i> 要保明細表</a>
                    <a class="btn btn-success" href="javascript:Mars_popup('ad_fun_action_list_singup1_print2.php?ac=<?php echo $ac; ?>','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=800,height=600,top=10,left=10');"><i class="icon-zoom-in icon-white"></i> 報名資料表</a>
                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=120>身分證字號</th>
                            <th width=160>姓名</th>
                            <th width=60>性別</th>
                            <th width=80>生日</th>
                            <th width=120>手機</th>
                            <th>Email</th>
                            <th width=130>職業</th>
                            <th width=80>後五碼</th>
                            <th width=60>正備取</th>
                            <th width=80>證件</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $rs = $FunConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);     
                            if(!$result){                               
                                echo "<tr><td colspan=11 height=200>目前沒有資料</td></tr>";
                            }else{
                                foreach($result as $re){
                                    if($re["k_be"] == 1){
                                        $k_be = "備取";
                                        $k_bev = 0;
                                    }else{
                                        $k_be = "正取";
                                        $k_bev = 1;
                                    }
                                    $gc = "";
                                    $gcc = "";
                                    $SQL = "select mem_num from goldcard_data where mem_username = '" . strtoupper($re["k_user"]) . "'";
                                    $rs = $FunConn->prepare($SQL);
                                    $rs->execute();
                                    $result2 = $rs->fetch(PDO::FETCH_ASSOC);
                                    if($result2){
                                        $gc = "金卡";
                                        $mem_num = $result2["mem_num"]; 
                                    }
                                    if($gc == "金卡"){
                                        $totalp = 0;
                                        $SQL = "select sum(totalp) as totalp from goldcard_point where mem_num =" . $mem_num;
                                        $rs = $FunConn->prepare($SQL);
                                        $rs->execute();
                                        $result3 = $rs->fetch(PDO::FETCH_ASSOC);
                                        if($result3){
                                            if($result3["totalp"] != ""){
                                                $totalp = $result3["totalp"];
                                            }
                                        }
                                    }
                                    if(strtoupper($re["all_single"]) == strtoupper($_SESSION["MM_Username"]) || $_SESSION["funtourall1"] == "1" || $_SESSION["MM_UserAuthorization"] == "admin"){
                                        $k_user = $re["k_user"];
                                        if($re["k_sex"] == "男"){
                                            $gco = "blue";
                                        }else{
                                            $gco = "red";
                                        }
                                        $k_name = "<a href=\"javascript:Mars_popup('ad_fun_detail.php?k_id=".$re["k_id"]."','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150')\"><font color=".$gco.">".$re["k_name"]."</font></a><br>".changeDate($re["k_time"]);
                                        if(chkDate($re["k_time"])){
                                            if(strtotime(Date_EN($re["k_time"],1)) == strtotime(date("Y/m/d"))){
                                                $k_name = $k_name ."<br><font color=red>new</font>";
                                            }
                                        }
                                        if($gc != ""){
                                            $gcc = "<a href=\"javascript:Mars_popup('ad_fun_goldcard_point.php?mem_num=".$mem_num."&n=".$re["k_name"]."','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');\">".$gc." ".$totalp." 點</a>";
                                        }
                                        $k_year = Date_EN($re["k_year"],1);
                                        $k_mobile = $re["k_mobile"];
                                        $k_yn = $re["k_yn"];
                                        $k_company = $re["k_company"];
                                        $bb = "<a href='#' onClick=\"Mars_popup('ad_fun_action_list_singup1.php?st=k_be&v=".$k_bev."&id=".$re["k_id"]."','','width=300,height=200,top=100,left=100')\">變</a>";
                                        $fun1 = "<li><a href=\"javascript:Mars_popup('ad_fun_detail.php?k_id=".$re["k_id"]."','','location=yes,status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=450,top=150,left=150');\"><i class='icon-file'></i> 詳細</a></li>";
                                        $fun2 = "<li><a href=\"ad_fun_action_list_padd.php?id=".$re["k_id"]."&ac=".$ac."\"><i class='icon-edit'></i> 修改</a></li>";				
                                        $k_pay_num = "<form style='border:0px;margin:0px;padding:0px;' id='searchform2' action=\"ad_fun_action_list_singup1.php?topage=".SqlFilter($_REQUEST["topage"],"tab")."&ac=".$ac."&id=".$re["k_id"]."&st=uppaynum\" method='post' target='_self' onsubmit='return save_b3($(this))'><input type='text' id='k_pay_num' name='k_pay_num' value='".$re["k_pay_num"]."' rel='".$re["k_pay_num"]."' style='width:60px;' placeholder='後五碼' onblur='save_b1($(this))'><br><input type='text' id='k_pay_check' name='k_pay_check' value='".$re["k_pay_check"]."' rel='".$re["k_pay_check"]."' style='width:60px;' placeholder='對帳金額' onblur='save_b2($(this))'><input type='submit' style='border:0px;margin:0px;padding:0px;visibility:hidden;height:0px;width:0px;'></form>";
                                        if($re["k_pay_m"] != "" || $re["k_pay_note"] != ""){
                                            $k_pay_num = $k_pay_num . "<p><a href='#' data-toggle='popover' data-content=\"金額：".$re["k_pay_m"]."<br>備註：<br>".str_replace("vbcrlf", "<br>",$re["k_pay_note"])."\" title='金額或備註'>金額或備註</a></p>";
                                        }
                                        if($re["k_come2"] != ""){
                                            $k_come2 = "<br>優惠序號：".$re["k_come2"];
                                        }else{
                                            $k_come2 = "";
                                        }
                                    }else{
                                        $k_user = mb_substr($re["k_user"], 0,1,"utf-8") . "*********";
				                        $k_name = mb_substr($re["k_name"], 0,1,"utf-8") . "ＯＯ";
                                        if($gc != ""){
                                            $gcc = $gc . " ".$totalp." 點";
                                        }else{
                                            $gcc = "";
                                        }
                                        if(chkDate($re["k_year"])){
                                            $k_year = date("Y",strtotime($re["k_year"]))."/**/**";
                                        }else{
                                            $k_year = "****/**/**";
                                        }
                                        $k_mobile = mb_substr($re["k_mobile"],0,2,"utf-8") . "********";
                                        $k_yn = "**********";
                                        $k_company = "**********";
                                        $bb = "";
                                        $fun1 = "";
                                        $fun2 = "";
                                        $k_pay_num = "";
                                        $k_come2 = "";
                                    }
                                    ?>
                                        <tr>
                                            <td class="center"><?php echo $k_user; ?></td>
                                            <td class="center"><?php echo $k_name; ?>　<?php echo $gcc; ?><?php echo $k_come2; ?></td>
                                            <td class="center"><?php echo $re["k_sex"]; ?></td>
                                            <td class="center"><?php echo $k_year; ?></td>
                                            <td class="center"><?php echo $k_mobile; ?></td>
                                            <td class="center"><?php echo $k_yn; ?></td>
                                            <td class="center"><?php echo $k_company; ?></td>
                                            <td class="center"><?php echo $k_pay_num; ?></td>
                                            <td class="center"><?php echo $k_be; ?>　<?php echo $bb; ?></td>
                                            <td class="center">
                                                <?php 
                                                    $SQL = "select p1,p2,p3,p1e,p2e,p3e from member_data where mem_num=" .$re["mem_num"];
                                                    $rs = $FunConn->prepare($SQL);
                                                    $rs->execute();
                                                    $result4 = $rs->fetch(PDO::FETCH_ASSOC);
                                                    $um = "";                                                    
                                                    if($result4){                                                        
                                                        if($result4["p1"] != "" && $result4["p1e"] == "ok"){
                                                            $um = $um . "身正";
                                                        }
                                                        if($result4["p2"] != "" && $result4["p2e"] == "ok"){
                                                            $um = $um . "<br>身反";
                                                        }
                                                        if($result4["p3"] != "" && $result4["p3e"] == "ok"){
                                                            $um = $um . "<br>工證";
                                                        }
                                                    }
                                                    if($um == ""){
                                                        $um = "無";
                                                    }
                                                    echo $um;
                                                ?>
                                            </td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                    <ul class="dropdown-menu pull-right">						
                                                        <?php echo $fun1; ?>
                                                        <?php echo $fun2; ?>
                                                        <?php 
                                                            if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["funtourall1"] == "1"){
                                                               echo "<li><a href='#' onClick=\"Mars_popup2('ad_fun_action_list_singup1.php?st=del&id=".$re["k_id"]."','','width=300,height=200,top=100,left=100')\"><i class='icon-trash'></i> 刪除</a></li>";
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
            <?php require_once("./include/_page.php"); ?>
            <?php 
                $SQL = "SELECT * FROM love_keyin WHERE ac_auto =".$ac;
                $rs = $FunConn->prepare($SQL);
                $rs->execute();
                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                if($result){
                    $allmail = "";
                    foreach($result as $re){                        
                        $allmail = $allmail . $re["k_mobile"] . ", ";                          
                    }
                    if(substr($allmail,-2) == ", "){
                        $allmail = substr($allmail,0,-2);
                    }
                }
            ?>               
            <div class="box-content">本場活動所有手機：<input type="text" style="width:80%;" value="<?php echo $allmail; ?>" onclick="this.select();"></div>

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
    $mtu = "ad_fun_action_list1.";
    $(function() {});

    function check_send_submit() {
        if ($("#s1").val() || $("#s2").val()) {} else {
            alert("請正確輸入姓名或手機。");
            return false;
        }
        return true;
    }

    function save_b1(thisv) {
        if (thisv.parent().attr("action").length) {
            if (thisv.val() == thisv.attr("rel")) return false;
            var $savediv = $("<div>儲存中</div>"),
                $vv;
            thisv.parent().append($savediv);
            if (thisv.val() == "") $vv = "none";
            else $vv = thisv.val();
            $.ajax({
                url: thisv.parent().attr("action"),
                data: {
                    k_pay_num: $vv
                },
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    thisv.attr("rel", thisv.val());
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    }

    function save_b2(thisv) {
        if (thisv.parent().attr("action").length) {
            if (thisv.val() == thisv.attr("rel")) return false;
            var $savediv = $("<div>儲存中</div>"),
                $vv;
            thisv.parent().append($savediv);
            if (thisv.val() == "") $vv = "none";
            else $vv = thisv.val();
            $.ajax({
                url: thisv.parent().attr("action"),
                data: {
                    k_pay_check: $vv
                },
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    thisv.attr("rel", thisv.val());
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    }

    function save_b3(thisv) {
        if (thisv.attr("action").length) {
            var $savediv = $("<div>儲存中</div>");
            thisv.append($savediv);
            $.ajax({
                url: thisv.attr("action") + "&full=1",
                data: thisv.serialize(),
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        return false;
    }
</script>