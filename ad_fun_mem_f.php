<?php
    /*****************************************/
	//檔案名稱：ad_fun_mem_f.php
	//後台對應位置：好好玩管理系統/好好玩會員資料->功能(進階搜尋)
	//改版日期：2021.11.23
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
        call_alert("您沒有查看此頁的權限。", "login.php", 0);
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_mem.php">會員管理系統</a></li>
            <li class="active">會員資料搜尋</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員資料搜尋</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="searchform" action="ad_fun_mem.php?vst=full" class="form-inline" method="post" target="_self">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td>手機：
                                    <input name="s2" type="text" id="s2" class="form-control" size="20" maxlength="10">
                                </td>
                            </tr>
                            <tr>
                                <td>姓名：
                                    <input name="s3" type="text" id="s3" class="form-control" size="20">
                                </td>
                            </tr>
                            <tr>
                                <td>編號：
                                    <input name="s4" type="text" id="s4" class="form-control" size="20">
                                </td>
                            </tr>
                            <tr>
                                <td>信箱：
                                    <input name="s1" type="text" id="s1" class="form-control" size="20">
                                </td>
                            </tr>
                            <tr>
                                <td>年次：
                                    <select name="s27" id="s27">
                                        <option value="" selected>請選擇</option>
                                        <?php
                                            for($i=20 ;$i <= 80; $i++){
                                                echo "<option value='".(date("Y")-$i)."'>".(date("Y")-$i)." - ".$i." 歲</option>";
                                            }
                                        ?>                                        
                                    </select> ~ <select name="s28" id="s28">
                                        <option value="" selected>請選擇</option>
                                        <?php 
                                            for($i=20 ;$i <= 80; $i++){
                                                echo "<option value='".(date("Y")-$i)."'>".(date("Y")-$i)." - ".$i." 歲</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>加入日期： <input type="text" name="s22" class="datepicker" autocomplete="off"> ~ <input type="text" name="s23" class="datepicker" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>性別：
                                    <select name="s21" id="s21">
                                        <option value="">請選擇</option>
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>來源：
                                    <select name="s8" id="s8">
                                        <option value="">請選擇</option>
                                        <option value="好好玩旅行社官方粉絲團">好好玩旅行社官方粉絲團</option>
                                        <option value="網路新聞">網路新聞</option>
                                        <option value="媒體報導">媒體報導</option>
                                        <option value="1111人力銀行">1111人力銀行</option>
                                        <option value="春天會館客服">春天會館客服</option>
                                        <option value="活動宣傳">活動宣傳</option>
                                        <option value="ＤＭ訊息">ＤＭ訊息</option>
                                        <option value="企業福委">企業福委</option>
                                        <option value="CHEERS雜誌">CHEERS雜誌</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>自訂來源：
                                    <select name="s97" id="s97">
                                        <option value="">請選擇</option>
                                        <?php 
                                            $SQL = "select distinct mem_cc from member_data where not mem_cc is null and mem_cc <> ''";
                                            $rs = $FunConn->prepare($SQL);
                                            $rs->execute();
                                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                            if($result){
                                                foreach($result as $re){
                                                    echo "<option value='".$re["mem_cc"]."'>".trim($re["mem_cc"])."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>學歷：
                                    <select name="s10" id="s10">
                                        <option value="">請選擇</option>
                                        <option value="國中">國中</option>
                                        <option value="高中">高中</option>
                                        <option value="高職">高職</option>
                                        <option value="專科">專科</option>
                                        <option value="大學">大學</option>
                                        <option value="碩士">碩士</option>
                                        <option value="博士">博士</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>地區：
                                    <select name="s11" id="s11">
                                        <option value="">請選擇</option>
                                        <?php                                            
                                            $SQL = "Select * From branch_data Where admin_name Not In ('線上諮詢') Order By admin_sort";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $re){ ?>
                                                <option value="<?php echo $re["admin_name"];?>"<?php if ( SqlFilter($_REQUEST["branch"],"tab") == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
                                        <?php }?>
                                    </select>
                            </tr>
                            <tr>
                                <td>會館：
                                    <select name="branch" id="branch">
                                        <option value="">請選擇</option>
                                        <?php   
                                            foreach($result as $re){ ?>
                                                <option value="<?php echo $re["admin_name"];?>"<?php if ( SqlFilter($_REQUEST["branch"],"tab") == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
                                        <?php }?>
                                    </select> <select name="single" id="single">
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
                                                    if ( $single == $re_er["p_user"] ){ echo " selected";}
                                                    echo ">".$p_name."</option>";
                                                }
                                            }
                                        ?>
                                    </select> <input style="width:2%;" data-no-uniform="true" type="checkbox" id="showout"> 顯示離職
                                </td>
                            </tr>
                            <tr>
                                <td>生日：
                                    <select name="m1" id="m1">
                                        <option value="">請選擇</option>
                                        <?php 
                                            for($i=1;$i<=12;$i++){
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                        ?>
                                    </select>
                                    月
                                    <select name="d1" id="d1">
                                        <option value="">請選擇</option>
                                        <?php 
                                            for($i=1;$i<=31;$i++){
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                        ?>
                                    </select>
                                    日
                                </td>
                            </tr>
                            <tr>
                                <td>處理情形：
                                    <select name="a1" id="a1">
                                        <option value="">請選擇</option>
                                        <option value="">請選擇</option>
                                        <option value="有意願">有意願</option>
                                        <option value="無意願">無意願</option>
                                        <option value="下次聯絡">下次聯絡</option>
                                        <option value="未接">未接</option>
                                        <option value="停話">停話</option>
                                        <option value="PASS春天">PASS春天</option>
                                        <option value="勿再聯絡">勿再聯絡</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>秘書：
                                    <select name="s7" id="s7" data-rel="chosen">
                                        <option value="">請選擇</option>
                                        <?php 
                                            $SQL = "select p_user, p_other_name, p_branch from personnel_data where p_work=1 order by p_branch";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                            if($result){
                                                foreach($result as $re){
                                                    echo "<option value='".$re["p_user"]."'>".$re["p_branch"]." - ".$re["p_other_name"]."</option>";
                                                }
                                            }
                                        ?>   
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="reset" name="reset" value="清空條件" style="height:28px;">　<input type="submit" name="Submit" value="開始搜尋" style="height:28px;"></td>
                            </tr>
                    </table>
                </form>
                </td>
                </tr>
                </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>

    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script language="JavaScript">
    $(function() {       
        $("#showout").on("click", function() {
            if (!$("#branch").val()) {
                alert("請先選擇會館。");
                $(this).prop("checked", false);
                return false;
            }
            if ($(this).prop("checked")) {
                personnel_get_funsend("branch", "single", 1);
            } else {
                personnel_get_funsend("branch", "single", 0);
            }
        });
    });
</script>