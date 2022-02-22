<?php
/*****************************************/
//檔案名稱：ad_action_list_sign_add.php
//後台對應位置：管理系統/網站活動上傳>活動異動單>新增異動單 
//改版日期：2022.2.18
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

if($_REQUEST["st"] == "add"){
    $ac_auto = SqlFilter($_REQUEST["ac"],"int");
    if($ac_auto == ""){
        call_alert("活動資料錯誤。", 0, 0);
    }
    switch($_REQUEST["types"]){
        case "活動新增":
            $SQL = "select * from action_data where ac_auto='".$ac_auto."'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $ac_time = $result["ac_time"];
                $ac_title = $result["ac_title"];
                $notes = "活動資訊：".$ac_time." ".$ac_title."[".$ac_auto."] 申請新增";
            }else{
                call_alert("活動資料錯誤-2。", 0, 0);
            }
            break;
        case "活動修改":
            $ac_time = SqlFilter($_REQUEST["actime"],"tab")." ".SqlFilter($_REQUEST["ahr"],"tab").":".SqlFilter($_REQUEST["amin"],"tab");
            if(!chkDate($ac_time)){
                call_alert("舉行時間不正確。",1, 1);
            }
            $ac_title = SqlFilter($_REQUEST["ac_title"],"tab");
            if($ac_title == ""){
                call_alert("請輸入活動名稱。", 0, 0);
            }

            $SQL = "select * from action_data where ac_auto='".$ac_auto."'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $old_ac_time = $result["ac_time"];
                $old_ac_title = $result["ac_title"];
                $notes = "活動資訊：".$old_ac_time." ".$old_ac_title."[".$ac_auto."]";
                $ischange = 0;
                if(strtotime($old_ac_time) != strtotime($ac_time)){
                    $notes = $notes . "|o|活動日期：自 ".Date_EN($old_ac_time,9)." 修改為 ".Date_EN($ac_time,9)."";		  	 
		  	 	    $ischange = 1;
                }
                if($old_ac_title != $ac_title){
                    $notes = $notes . "|o|活動名稱：自 ".$old_ac_title." 修改為 ".$ac_title."";
		  	 	    $ischange = 1;
                }
            }else{
                call_alert("活動資料錯誤-2。", 0, 0);
            }

            if($ischange == 0){
                call_alert("活動時間和活動名稱資料沒有變化，不需要申請修改。", 0, 0);
            }
            break;
        case "活動取消":
            if($_REQUEST["n1"] == "" && $_REQUEST["n2"] == "" && $_REQUEST["n3"] == "" && $_REQUEST["n4"] == ""){
                call_alert("取消原因最少需填寫一項。", 0, 0);
            }
            $SQL = "select * from action_data where ac_auto='".$ac_auto."'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $old_ac_time = $result["ac_time"];
                $old_ac_title = $result["ac_title"];
                $notes = "活動資訊：".$old_ac_time." ".$old_ac_title."[".$ac_auto."] 申請取消";

                if($_REQUEST["n1"] != ""){
                    $notes = $notes . "|o|人數不足：".SqlFilter($_REQUEST["n1"],"tab");	
                }
                if($_REQUEST["n2"] != ""){
                    $notes = $notes . "|o|成本考量：".SqlFilter($_REQUEST["n2"],"tab");		  	 	    
                }
                if($_REQUEST["n3"] != ""){
                    $notes = $notes . "|o|天候因素：".SqlFilter($_REQUEST["n3"],"tab");		  	 	    
                }
                if($_REQUEST["n4"] != ""){
                    $notes = $notes . "|o|其他原因：".SqlFilter($_REQUEST["n4"],"tab");		  	 	    
                }
            }else{
                call_alert("活動資料錯誤-2。", 0, 0);
            }
            break;
        default:
            call_alert("請選擇類型。", 0, 0);           
    }

    $SQL = "select * from system_sign where single='".$_SESSION["MM_Username"]."' order by times desc";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $lasttime = $result["times"];
        if(strtotime("now") - strtotime($lasttime) < 30){
            call_alert("提出申請時間過短。", 0, 0);
        }
    }

    // 新增
    if($notes != ""){
        $notes = clear_left_par($notes,"|o|");
        $notes = str_replace("|o|",PHP_EOL,SqlFilter($notes,"str"));        
    }
    $statnote = "[".date("Y-m-d H:i")."] ".$_SESSION["branch"]."提出申請 - ".SqlFilter($_REQUEST["types"],"tab")."";
    if($_REQUEST["needbranch"] == "1"){
        $statnote = $statnote . "<br>[".date("Y-m-d H:i")."] 正在等候督導/經理核准";
    }
    if($_REQUEST["needmanager"] == "1" && $_REQUEST["needbranch"] == "0"){
        $statnote = $statnote . "<br>[".date("Y-m-d H:i")."] 正在等候總經理核准";
    }
    if($_REQUEST["needadmin"] == "1" && $_REQUEST["needmanager"] == "0" && $_REQUEST["needbranch"] == "0"){
        $statnote = $statnote . "<br>[".date("Y-m-d H:i")."] 正在等候管理者核准";
    }

    $SQL = "INSERT INTO system_sign (branch,singlename,single,types,types2,notes,needbranch,needmanager,needadmin,num,statnote) VALUES (
        '".$_SESSION["branch"]."',
        '".$_SESSION["pname"]."',
        '".$_SESSION["MM_Username"]."',
        '活動異動單',
        '".SqlFilter($_REQUEST["types"],"tab")."',
        '".$notes."',
        '".SqlFilter($_REQUEST["needbranch"],"tab")."',
        '".SqlFilter($_REQUEST["needmanager"],"tab")."',
        '".SqlFilter($_REQUEST["needadmin"],"tab")."',
        '".$ac_auto."',
        '".$statnote."')";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();

    call_alert("提出申請完成。", "ad_action_list_sign.php?ac_auto=".$ac_auto, 0,0);
}


$SQL = "select * from action_data where ac_auto='".SqlFilter($_REQUEST["ac_auto"],"int")."'";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetch(PDO::FETCH_ASSOC);
if($result){
    $ac_time = Date_EN($result["ac_time"],9);
    $ac_stat = $result["ac_stat"];
    $ac_auto = $result["ac_auto"];
    $ac_title = $result["ac_title"];
    $ac_branch = $result["ac_branch"];
}else{
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
            <li><a href="ad_action_list_sign.php?ac_auto=<?php echo $ac_auto; ?>">活動異動單</a></li>
            <li class="active">新增異動單 - <?php echo $ac_time; ?>&nbsp;<?php echo $ac_title; ?>[<?php echo $ac_auto; ?>]</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增異動單 - <?php echo $ac_time; ?>&nbsp;<?php echo $ac_branch; ?>&nbsp;<?php echo $ac_title; ?>[<?php echo $ac_auto; ?>]</strong> <!-- panel title -->
                </span>
            </div>


            <div class="panel-body">
                <form id="searchform" action="ad_action_list_sign_add.php" method="post" class="form-inline" target="_self">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td><label class="pull-left vcenter" style="height:34px;line-height:34px;">申請人：<?php echo $_SESSION["branch"]; ?> - <?php echo $_SESSION["pname"]; ?></label></td>
                            </tr>
                            <tr>
                                <td><label class="pull-left vcenter" style="height:34px;line-height:34px;">類型：</label>
                                    <select name="types" id="types" onchange="location.href='?ac_auto=<?php echo $ac_auto; ?>&t='+this.value+''" required>
                                        <option value="">請選擇</option>
                                        <!--<option value="活動新增"<?php if($_REQUEST["t"] == "活動新增") echo " selected"; ?>>活動新增</option>
				                        <option value="活動修改"<?php if($_REQUEST["t"] == "活動修改") echo " selected"; ?>>活動修改</option>-->
                                        <option value="活動取消"<?php if($_REQUEST["t"] == "活動取消") echo " selected"; ?>>活動取消</option>
                                        <option value="其他">其他</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                        switch($_REQUEST["t"]){
                                            case "":
                                                echo "<div>請先選擇類型後再依系統文字說明填入詳細資訊</div>";
                                                break;
                                            case "活動新增":
                                                echo "<div><textarea type='text' style='width:80%;height:200px;' class='form-control' name='notes' readonly>";
                                                echo "".$_SESSION["branch"]."-".$_SESSION["pname"]." 申請新增活動：".$ac_time." ".$ac_branch." ".$ac_title."[".$ac_auto."]";
                                                echo "</textarea></div>";     	
                                                $needbranch = 1;
                                                break;
                                            case "活動修改":
                                                echo "<div>活動日期：".$ac_time." => <input type='text' name='actime' id='actime' value='".Date_EN($ac_time,9)."' class='datepicker' autocomplete='off' required>";
                                                echo "  <input type='number' name='ahr' id='ahr' value='".date("H",strtotime($ac_time))."' class='form-control' min='1' max='24' required>";
                                                echo "  時 ";
                                                echo "  <select name='amin' id='amin' class='form-control' required>";
                                                echo "<option value='00'";
                                                if(date("i",strtotime($ac_time)) == "0" || date("i",strtotime($ac_time)) == "00") echo " selected";
                                                echo ">00</option>";
                                                        
                                                echo "<option value='15'";
                                                if(date("i",strtotime($ac_time)) == "15") echo " selected";
                                                echo ">15</option>";
                                                echo "<option value='30'";
                                                if(date("i",strtotime($ac_time)) == "30") echo " selected";
                                                echo ">30</option>";
                                                echo "<option value='45'";
                                                if(date("i",strtotime($ac_time)) == "45") echo " selected";
                                                echo ">45</option>";         
                                                echo "</select>  分</div>";
                                                echo "<hr>";
                                                echo "<div>活動名稱：".$ac_title." => <input type='text' class='form-control' name='ac_title' value='".$ac_title."' required></div>";       	
                                                $needbranch = 1;
                                                break;
                                            case "活動取消":
                                                $noshow = 0;
                                                $SQL = "SELECT * FROM ac_data_re Where acre_ck2 = 0 and acre_num = '".$ac_auto."'";
                                                $rs = $SPConn->prepare($SQL);
                                                $rs->execute();
                                                $result = $rs->fetch(PDO::FETCH_ASSOC);
                                                if($result){
                                                    echo "此活動已有收費紀錄，請將參加人員資料移至待轉方可取消。";
                                                    $noshow = 1;
                                                }
                                                if($ac_stat == 1){
                                                    echo "此活動已被取消，無法再次申請。";
                                                    $noshow = 1;
                                                }
                                                if($noshow == 0){
                                                    echo "<div>人數不足：<input type='text' style='width:80%;' class='form-control' name='n1'></div><hr>";
                                                    echo "<div>成本考量：<input type='text' style='width:80%;' class='form-control' name='n2'></div><hr>";
                                                    echo "<div>天候因素：<input type='text' style='width:80%;' class='form-control' name='n3'></div><hr>";
                                                    echo "<div>其他原因：<input type='text' style='width:80%;' class='form-control' name='n4'></div><hr>";
                                                    echo "<div>以上項目如無免填，但應最少填寫一項</div>";
                                                    
                                                    $needbranch = 1;
                                                }
                                                break;
                                            default:
                                                echo "<div>如有其他關於活動異動單的事項，請使用意見反映提出需新增的異動單事項。</div>";
                                                $needbranch = 1;
                                        }
                                        echo "<input type='hidden' name='ac_auto' value='".$ac_auto."'>";

                                        if($needbranch == 1){
                                            echo "<br><font color=red>本項需督導/經理核准</font><input type='hidden' name='needbranch' value='1'>";
                                        }
                                        if($needmanager == 1){
                                            echo "<br><font color=red>本項需總經理核准</font><input type='hidden' name='needmanager' value='1'>";
                                        }
                                        if($needadmin == 1){
                                            echo "<br><font color=red>本項需管理者核准</font><input type='hidden' name='needadmin' value='1'>";
                                        }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td><input type="hidden" name="ac" value="<?php echo $ac_auto; ?>"><input type="hidden" name="st" value="add"><input type="submit" value="送出申請" class="btn btn-success"></td>
                            </tr>
                    </table>
                </form>
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

<script type="text/javascript">
$mtu = "ad_action_list_sign";
$(function() {
});
</script>