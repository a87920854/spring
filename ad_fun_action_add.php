<?php
    /*****************************************/
	//檔案名稱：ad_fun_action_add.php
	//後台對應位置：好好玩管理系統/好好玩國內報名->新增報名資料
	//改版日期：2021.11.19
	//改版設計人員：Jack
	//改版程式人員：Jack
	/*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
    if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}
    
    if($_REQUEST["st"] == "add"){
        if($_REQUEST["ac_auto"] != ""){
            $ac_auto = SqlFilter($_REQUEST["ac_auto"],"int");
            $SQL = "select * from action_data where ac_auto = " .$ac_auto;
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $action_branch = $result["ac_branch"];
                $action_title = $result["ac_title"];
                $action_note = $result["ac_note1"];
                $action_time = $result["ac_time"];  
            }
        }
        $SQL =  "INSERT INTO love_keyin (k_time, k_come, k_area, k_name, k_sex, k_mobile, 
                k_yn, k_year, k_school, k_phone1, k_phone2, k_company, k_company2, k_address, k_2, 
                k_user, k_eat, action_branch, action_title, action_note, action_time, ac_auto, all_kind, 
                all_type, ac_1, ac_2, ac_3, remark, is_local) VALUES ('"
                .date("Y/m/d")."', '"
                .SqlFilter($_REQUEST["k_come"],"tab")."', '"
                .SqlFilter($_REQUEST["k_area"],"tab")."', '"
                .SqlFilter($_REQUEST["k_name"],"tab")."', '"
                .SqlFilter($_REQUEST["k_sex"],"tab")."', '"
                .SqlFilter($_REQUEST["k_mobile"],"tab")."', '"
                .SqlFilter($_REQUEST["k_yn"],"tab")."', '"
                .SqlFilter($_REQUEST["y1"],"int")."/"
                .SqlFilter($_REQUEST["m1"],"int")."/"
                .SqlFilter($_REQUEST["d1"],"int"). "', '"
                .SqlFilter($_REQUEST["k_school"],"tab")."', '"
                .SqlFilter($_REQUEST["k_phone1"],"tab")."', '"
                .SqlFilter($_REQUEST["k_phone2"],"tab")."', '"
                .SqlFilter($_REQUEST["k_company"],"tab")."', '"
                .SqlFilter($_REQUEST["k_company2"],"tab")."', '"
                .SqlFilter($_REQUEST["k_address"],"tab")."', '"
                .SqlFilter($_REQUEST["k_2"],"tab")."', '"
                .SqlFilter(strtoupper(str_replace("'","",$_REQUEST["k_user"])),"tab")."', '"
                .SqlFilter($_REQUEST["k_eat"],"tab")."', '"
                .$action_branch."', '"
                .$action_title."', '"
                .$action_note."', '"
                .$action_time."', '"
                .$ac_auto."', "
                ."'活動', "
                ."'未處理', '"
                .SqlFilter($_REQUEST["ac_1"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_2"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_3"],"tab")."', '"
                .SqlFilter($_REQUEST["remark"],"tab")."', "
                ."'1'"
                .")";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("ad_fun_action_add.php");     
        }
    }
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action1.php">好好玩國內報名</a></li>
            <li class="active">新增報名資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增報名資料</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="searchform" action="?st=add" method="post" target="_self" class="form-inline" onsubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td colspan=2>
                                    活動場次：
                                    <select id="ac_auto" name="ac_auto" style="width:80%;" class="form-control">
                                        <option value="">請選擇</option>
                                        <?php
                                            $SQL = "SELECT * FROM action_data Where ac_time between '".date("Y/m/d",strtotime('-300 day'))."' and '".date("Y/m/d",strtotime('+2 year'))."' ORDER BY ac_time DESC";
                                            $rs = $FunConn->prepare($SQL);
                                            $rs->execute();
                                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                            if($result){
                                                foreach($result as $re){
                                                    echo "<option value='".$re["ac_auto"]."'>".$re["ac_branch"].changeDate($re["ac_time"]).$re["ac_title"]."</option>";
                                                } 
                                            }                                            
                                        ?>                                                                
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>身分證字號：
                                    <input name="k_user" type="text" id="k_user" maxlength="10" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>姓名：
                                    <input name="k_name" type="text" id="k_name" class="form-control">
                                </td>
                                <td>性別：
                                    <select name="k_sex" id="k_sex">
                                        <option value="">請選擇</option>
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width=400>生日：<select name="y1" id="y1" style="width:80px;">
                                        <?php
                                            for($i=date("Y")-70; $i <= date("Y")-20; $i++ ){
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                        ?>                               
                                    </select> 年
                                    <select name="m1" id="m1" style="width:80px;">
                                        <?php
                                            for($i=1;$i<=12;$i++){
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                        ?>
                                    </select> 月
                                    <select name="d1" id="d1" style="width:80px;">
                                        <?php
                                            for($i=1;$i<=31;$i++){
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                        ?>
                                    </select> 日
                                </td>
                                <td>飲食習慣：
                                    <select name="k_eat" id="k_eat">
                                        <option value="">請選擇</option>
                                        <option value="葷食">葷食</option>
                                        <option value="素食">素食</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>電話(公)：
                                    <input name="k_phone1" type="text" id="k_phone1" class="form-control">　(家)：<input name="k_phone2" type="text" id="k_phone2" class="form-control">　 手機：<input name="k_mobile" type="text" id="k_mobile" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>服務機關 ：
                                    <input name="k_company" type="text" id="k_company" class="form-control">
                                </td>
                                <td>現任職稱：
                                    <input name="k_company2" type="text" id="k_company2" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>地址：
                                    <select name="k_area" id="k_area">
                                        <option value="">請選擇</option>
                                        <option value="基隆市">基隆市</option>
                                        <option value="台北市">台北市</option>
                                        <option value="新北市">新北市</option>
                                        <option value="宜蘭縣">宜蘭縣</option>
                                        <option value="桃園市">桃園市</option>
                                        <option value="新竹縣">新竹縣</option>
                                        <option value="新竹市">新竹市</option>
                                        <option value="苗栗縣">苗栗縣</option>
                                        <option value="苗栗市">苗栗市</option>
                                        <option value="台中縣">台中縣</option>
                                        <option value="台中市">台中市</option>
                                        <option value="彰化縣">彰化縣</option>
                                        <option value="彰化市">彰化市</option>
                                        <option value="南投縣">南投縣</option>
                                        <option value="嘉義縣">嘉義縣</option>
                                        <option value="嘉義市">嘉義市</option>
                                        <option value="雲林縣">雲林縣</option>
                                        <option value="台南縣">台南縣</option>
                                        <option value="台南市">台南市</option>
                                        <option value="高雄市">高雄市</option>
                                        <option value="屏東縣">屏東縣</option>
                                        <option value="花蓮縣">花蓮縣</option>
                                        <option value="台東縣">台東縣</option>
                                        <option value="澎湖縣">澎湖縣</option>
                                        <option value="金門縣">金門縣</option>
                                        <option value="馬祖">馬祖</option>
                                        <option value="綠島">綠島</option>
                                        <option value="蘭嶼">蘭嶼</option>
                                        <option value="其他">其他</option>
                                    </select> <input name="k_address" type="text" id="k_address" style="width:500px;" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>E-mail：
                                    <input name="k_yn" type="text" id="k_yn" class="form-control">
                                </td>
                                <td>身高：
                                    <input name="ac_1" type="text" id="ac_1" class="form-control"> 公分　體重：<input name="ac_2" type="text" id="ac_2" class="form-control"> 公斤
                                </td>
                            </tr>
                            <tr>
                                <td>facebook帳號：
                                    <input name="ac_3" type="text" id="ac_3" class="form-control">
                                </td>
                                <td>學歷：
                                    <select name="k_school" id="k_school">
                                        <option value="">請選擇</option>
                                        <option value="高中">高中</option>
                                        <option value="專科">專科</option>
                                        <option value="大學">大學</option>
                                        <option value="碩士">碩士</option>
                                        <option value="博士">博士</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>公開資料：
                                    <input name="k_2" type="checkbox" id="k_2" value="姓名" style="width:20px;">
                                    姓名
                                    <input name="k_2" type="checkbox" id="k_2" value="手機" style="width:20px;">
                                    手機
                                    <input name="k_2" type="checkbox" id="k_2" value="信箱" style="width:20px;">
                                    信箱
                                    <input name="k_2" type="checkbox" id="k_2" value="服務單位" style="width:20px;">
                                    服務單位
                                    <input name="k_2" type="checkbox" id="k_2" value="不願意公開資料" style="width:20px;" checked>
                                    不願意公開資料
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>備註：
                                    <textarea name="remark" id="remark" cols="45" rows="5" class="form-control"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>訊息來源：
                                    <select name="k_come" id="k_come2">
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
                                <td colspan=2 align="center"><input type="submit" name="Submit" value="確定新增" style="height:28px;"></td>
                            </tr>
                            </font>
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

<script type="text/javascript">
    $mtu = "ad_fun_action1.";

    function chk_form() {
        var $clist = {
                "ac_auto": "活動場次",
                "k_user": "身分證字號",
                "k_name": "姓名",
                "k_sex": "性別",
                "k_eat": "飲食習慣",
                "k_mobile": "手機",
                "k_area": "地址",
                "k_school": "學歷"
            },
            $rr = 0;
        $.each($clist, function(n, v) {
            if (!$("#" + n).val()) {
                alert("請輸入或選擇" + v);
                $("#" + n).focus();
                $rr = 1;
            }
            if ($rr) return false;
        });

        if ($rr) return false;
        else return true;
    }
</script>