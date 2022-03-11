<?php

/*****************************************/
//檔案名稱：ad_fun_action_list2_set.php
//後台對應位置：好好玩管理系統/好好玩國外團控 > 行程頁設計
//改版日期：2022.2.24
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
if($_REQUEST["st"] == "add"){
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
        $SQL = "INSERT INTO travel_date (ac_auto,dates) VALUES ('".$ac_auto."','".Date_EN(SqlFilter($_REQUEST["dates"],"tab"),1)."')";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }
    reURL("ad_fun_action_list2_date.php?ac=".$ac_auto);
}

// 讀取活動標題
$SQL = "select ac_title from actionf_data where ac_auto=".$ac_auto."";
$rs = $FunConn->prepare($SQL);
$rs->execute();
$result = $rs->fetch(PDO::FETCH_ASSOC);
if(!$result){
    call_alert("讀取資料有誤。",0,0);
}else{
    $ac_title = $result["ac_title"];
}

// 讀取資料
$SQL = "select * from travel_data where ac_auto=".$ac_auto."";
$rs = $FunConn->prepare($SQL);
$rs->execute();
$result = $rs->fetch(PDO::FETCH_ASSOC);
if($result){
    for($i=1;$i<=24;$i++){
        ${"t".$i} = $result["t".$i];
    }
}

?>

<!-- fileupload css09 -->
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action_list2.php">好好玩國外團控</a></li>
            <li class="active"><?php echo $ac_title; ?> 行程頁設計</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $ac_title; ?> 行程頁設計</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                即時預覽：<a href="http://www.funtour.com.tw/otravel.php?id=<?php echo $ac_auto; ?>" target="_blank">http://www.funtour.com.tw/otravel.php?id=<?php echo $ac_auto; ?></a>
                <br><br>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td width=160>行程標題(大字1行)</td>
                        <td><input name="t18" id="t18" type="text" value="<?php echo trim($t18); ?>" style="width:60%"><br><input type="button" id="t18save" style="height:30px;" value="儲存(第一優先)"></td>
                    </tr>
                    <tr>
                        <td width=160>行程標題<br>(小字可2行,斷行用\r)</td>
                        <td><input name="t19" id="t19" type="text" value="<?php echo trim($t19); ?>" style="width:60%"><br><input type="button" id="t19save" style="height:30px;" value="儲存"></td>
                    </tr>
                    <tr>
                        <td width=160>旅遊天數</td>
                        <td><input name="t23" id="t23" type="text" value="<?php echo trim($t23); ?>" style="width:60%"><br><input type="button" id="t23save" style="height:30px;" value="儲存"></td>
                    </tr>
                    <tr>
                        <td width=160>負責窗口</td>
                        <td><input name="t24" id="t24" type="text" value="<?php echo trim($t24); ?>" style="width:60%"><br><input type="button" id="t24save" style="height:30px;" value="儲存"></td>
                    </tr>
                    <tr>
                        <td width=160>行程特色展示照片<br>(最少7張)<br>(寬350長不限)</td>
                        <td>
                            <input type="button" onclick="Mars_popup('ad_fun_action_list2_pic_add.php?id=<?php echo $ac_auto; ?>&t=top','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=500,height=300,top=150,left=150');" class="btn btn-danger" value="點此上傳">
                            <div id="reload_showtopdiv">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width=160>行程特色文字</td>
                        <td>
                            <input style="width:250px;height:30px;" type="button" id="t21set" value="設定行程特色文字">
                            <a href="#" class="btn btn-danger" data-toggle="popover" title="行程特色文字" data-content="<?php if(strlen($t21) > 0) echo htmlspecialchars($t21); ?>">預覽</a>
                            <div style="display:none;" id="t21div">
                                <textarea class="editor" id="t21" name="t21"><?php echo $t21; ?></textarea>
                                <br><input style="width:250px;height:30px;" type="button" id="t21save" value="儲存行程特色文字">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width=160>SEO文字</td>
                        <td>
                            <input style="width:250px;height:30px;" type="button" id="t22set" value="設定SEO文字">
                            <a href="#" class="btn btn-danger" data-toggle="popover" data-toggle="popover" title="SEO" data-content="<?php if(strlen($t22) > 0) echo htmlspecialchars($t22); ?>">預覽</a>
                            <div style="display:none;" id="t22div">
                                <textarea class="editor" id="t22" name="t22"><?php echo $t22; ?></textarea>
                                <br><input style="width:250px;height:30px;" type="button" id="t22save" value="儲存SEO文字">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width=160>出團資訊及報名</td>
                        <td>
                            <table id="start_table" width="90%" border="1" cellspacing="0" cellpadding="0" align="left" style="border-collapse:collapse;">
                                <tr class="head">
                                    <td width=28>　</td>
                                    <td height=30>出 發 日 期</td>
                                    <td>行 程 名 稱</td>
                                    <td>天 數</td>
                                    <td>售 價</td>
                                    <td>同業價</td>
                                    <td>備 註</td>
                                    <td>線 上 報 名</td>
                                </tr>
                                <?php 
                                    $SQL = "select * from travel_date where ac_auto='".$ac_auto."' order by dates asc";
                                    $rs = $FunConn->prepare($SQL);
                                    $rs->execute();
                                    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                    if(!$result){
                                        echo "<tr><td></td><td height=40><input name='t1[]' type='text' style='width:80px;' class='datepicker'  autocomplete='off'></td><td><input name='t2[]' type='text' style='width:100px;'></td><td> <input name='t3[]' type='text' style='width:30px;'> 天</td><td><textarea name='t4[]' style='width:120px;'></textarea></td><td> NT <input name='t7[]' type='text' style='width:100px;'> </td><td><textarea name='t5[]' style='width:100px;'></textarea></td><td><input data-no-uniform='true' name='t6[]' type='checkbox' value='1'> 可報名<br><input data-no-uniform='true' name='t6[]' type='checkbox' value='0'> 不可報名<br><input data-no-uniform='true' name='t6[]' type='checkbox' value='2'> 前台不顯示</td></tr>";
                                    }else{
                                        $g = 0;
                                        foreach($result as $re){
                                            $dates = Date_EN($re["dates"],1);
                                            if($re["can"] == 1){
                                                $cck1 = "checked";
                                                $cck2 = "";
                                                $cck3 = "";
                                            }elseif($re["can"] == 2){
                                                $cck1 = "";
                                                $cck2 = "";
                                                $cck3 = "checked";
                                            }else{
                                                $cck1 = "";
                                                $cck2 = "checked";
                                                $cck3 = "";
                                            }

                                            if($g == 0){
                                                $t1head = "<tr><td></td>";
                                            }else{
                                                $t1head = "<tr id='start_tr_".($g+1)."'><td><a href=\"javascript:delline_j('start_tr_".($g+1)."','".$re["auton"]."')\">刪行</a></td>";
                                            }

                                            if($re["keep"] == "1"){
                                                $cck4 = "checked";
                                            }else{
                                                $cck4 = "";
                                            }

                                            echo $t1head."<td><input type='hidden' name='auton[]' value='".$re["auton"]."'><input name='t1[]' type='text' style='width:80px;' class='datepicker' autocomplete='off' value='".$dates."'></td><td><input name='t2[]' type='text' style='width:100px;' value='".$re["tname"]."'></td><td> <input name='t3[]' type='text' style='width:30px;' value='".$re["day"]."'> 天</td><td><textarea name='t4[]' style='width:120px;'>".$re["money"]."</textarea> </td><td> NT <input name='t7[]' type='text' style='width:100px;' value='".$re["b2b_money"]."'> </td><td><textarea name='t5[]' type='text' style='width:120px;'>".$re["notes"]."</textarea></td><td><input data-no-uniform='true' name='t6[]' type='checkbox' value='1' ".$cck1."> 可報名<br><input data-no-uniform='true' name='t6[]' type='checkbox' value='0' ".$cck2."> 不可報名<br><input data-no-uniform='true' name='t6[]' type='checkbox' value='2' ".$cck3."> 前台不顯示<br><input data-no-uniform='true' name='t8[]' type='checkbox' value='1' onclick=\"set_t8($(this), '".$re["auton"]."')\" ".$cck4."> 下線</td></tr>";
                                            $g = $g+1;
                                        }
                                    }
                                ?>
                            </table>
                            <div style="clear:both">
                                <div style="text-align: center;">
                                    <input id="start_add" type="button" value="新增一行">　　<input type="button" id="t1save" style="height:30px;" value="儲存">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width=160>行程內容</td>
                        <td>

                            <div id="day_table_out">
                                <?php 
                                    $SQL = "select * from travel_text where ac_auto='".$ac_auto."' order by typen asc";
                                    $rs = $FunConn->prepare($SQL);
                                    $rs->execute();
                                    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                    if($result){
                                        foreach($result as $re){ ?>
                                            <div>
                                                第<?php echo $re["typen"]; ?>天　<?php echo $re["day_title1"]; ?>　<?php echo $re["day_title2"]; ?>　<?php echo $re["day_title3"]; ?>　<a href="javascript:Mars_popup('ad_fun_action_list2_set_ajax.php?st=dayadd&id=<?php echo $ac_auto; ?>&an=<?php echo $re["auton"]; ?>','dayadd','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');" class="btn btn-danger btn-xs" data-toggle="popover"  data-toggle="popover" title="第<?php echo $re["typen"]; ?>天-行程內容" data-content="<?php if(strlen($re["day_note"]) > 0) echo htmlspecialchars($re["day_note"]); ?>">行程內容</a>
                                                <a href="javascript:Mars_popup('ad_fun_action_list2_set_ajax.php?st=dayadd&id=<?php echo $ac_auto; ?>&an=<?php echo $re["auton"]; ?>','dayadd','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');" class="btn btn-success btn-xs" >修改</a>
                                                <a href="javascript:Mars_popup2('ad_fun_action_list2_set_ajax.php?st=daydel&id=<?php echo $ac_auto; ?>&an=<?php echo $re["auton"]; ?>'','daydel','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=200,height=100,top=10,left=10');" class="btn btn-danger btn-xs" >刪除</a><hr>
                                            </div>
                                        <?php }
                                    }
                                ?>
                                <br>
                                <input style="width:250px;height:30px;" type="button" id="dayadd" value="新增行程內容" onclick="Mars_popup('ad_fun_action_list2_set_ajax.php?st=dayadd&id=<?php echo $ac_auto; ?>','dayadd','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width=160>參考航班</td>
                        <td>
                            <table id="air_table" width="90%" border="1" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;text-align:center">
                                <tr class="head">
                                    <td width=50>　</td>
                                    <td>航 段</td>
                                    <td>日 期</td>
                                    <td>出 發 地 / 目 的 地</td>
                                    <td>航 空 公 司</td>
                                    <td>飛 行 時 間</td>
                                </tr>
                                <?php 
                                    if($t12 != ""){
                                        for($i=12;$i<=16;$i++){
                                            ${"t".$i."arr"} = explode(",",${"t".$i});
                                        }
                                        $g = 0;
                                        for($g=0;$g<count($t12arr);$g++){
                                            if($g==0){
                                                $t12head = "<tr><td></td>";
                                            }else{
                                                $t12head = "<tr id='start_air_tr_".($g+1)."'><td><a href=\"javascript:delline('start_air_tr_".($g+1)."')\">刪行</a></td>";
                                            } ?>
                                            <?php echo $t12head; ?>
                                                <td height=40>
                                                    <select name="t12[]">
                                                        <?php 
                                                            if(trim($t12arr[$g]) != ""){
                                                                echo "<option value='".trim($t12arr[$g])."'>".trim($t12arr[$g])."</optio>";
                                                            }else{
                                                                echo "<option value=''>請選擇</option>";
                                                            }
                                                        ?>                                                        
                                                        <option value="去程航班">去程航班</option>
                                                        <option value="回程航班">回程航班</option>                                            
                                                    </select>
                                                </td>
                                                <td>
                                                    <input name="t13[]" type="text" size=20 value="<?php echo trim($t13arr[$g]); ?>">
                                                </td>
                                                <td>
                                                    <input name="t14[]" type="text" size=20 value="<?php echo trim($t14arr[$g]); ?>">
                                                </td>
                                                <td>
                                                    <input name="t15[]" type="text" size=20 value="<?php echo trim($t15arr[$g]); ?>">
                                                </td>
                                                <td>
                                                    <input name="t16[]" type="text" size=20 value="<?php echo trim($t16arr[$g]); ?>">
                                                </td>
                                            </tr>
                                        <?php }
                                    }else{ ?>
                                        <tr class="note"><td></td><td height=40><select name="t12"><option value="">請選擇</option><option value="去程航班">去程航班</option><option value="回程航班">回程航班</option></select></td><td><input type="text" name="t13[]" size=20 class="datepicker" autocomplete="off"></td><td> <input name="t14[]" type="text" size=20> </td><td><input name="t15[]" type="text" size=20> </td><td><input name="t16[]" type="text" size=20> </td></tr>
                                    <?php }
                                ?>
                            </table>
                            <div style="clear:both">
                                <div style="text-align: center;">
                                    <input id="start_add_air" type="button" value="新增一行">　　<input type="button" id="t12save" style="height:30px;" value="儲存">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width=160>注意事項</td>
                        <td>
                            <input style="width:250px;height:30px;" type="button" id="t20set" value="設定注意事項">
                            <a href="#" class="btn btn-danger" data-toggle="popover" data-toggle="popover" title="注意事項" data-content="<?php if(strlen($t20) > 0) echo  htmlspecialchars($t20); ?>">預覽</a>
                            <div style="display:none;" id="t20div">
                                <textarea class="editor" id="t20" name="t20"><?php echo $t20; ?></textarea>
                                <br><input style="width:250px;height:30px;" type="button" id="t20save" value="儲存注意事項">
                            </div>
                        </td>
                    </tr>
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

<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    $mtu = "ad_fun_action_list2.";
    $(function() {

        reload_day_upload('showtopdiv');



        tinymce.init({
            selector: ".editor",
            plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
            ],

            toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontsizeselect forecolor backcolor | code preview",
            toolbar2: "cut copy paste | searchreplace | bullist numlist | undo redo | link unlink image media | inserttime | table",

            menubar: false,
            toolbar_items_size: 'small',
            language: 'zh_TW',
            height: 200
        });


        $("#t18save").on("click", function(event) {
            var $vval = $("#t18").val();
            if ($vval) {
                $newform = $("<form></form>").attr("method", "post");
                $newform.append("<input type=\"text\" name=\"vv\" value=\"" + $vval + "\">");
                $newform.append("<input type=\"text\" name=\"st\" value=\"uptext\">");
                $newform.append("<input type=\"text\" name=\"ss\" value=\"t18\">");
                $newform.append("<input type=\"text\" name=\"id\" value=\"<?php echo $ac_auto; ?>\">");
                $newform.attr("action", "ad_fun_action_list2_set_ajax.php").appendTo("body").submit().remove();
            }
        });

        $("#t19save").on("click", function(event) {
            var $vval = $("#t19").val();
            if ($vval) {
                $newform = $("<form></form>").attr("method", "post");
                $newform.append("<input type=\"text\" name=\"vv\" value=\"" + $vval + "\">");
                $newform.append("<input type=\"text\" name=\"st\" value=\"uptext\">");
                $newform.append("<input type=\"text\" name=\"ss\" value=\"t19\">");
                $newform.append("<input type=\"text\" name=\"id\" value=\"<?php echo $ac_auto; ?>\">");
                $newform.attr("action", "ad_fun_action_list2_set_ajax.php").appendTo("body").submit().remove();
            }
        });

        $("#t23save").on("click", function(event) {
            var $vval = $("#t23").val();
            if ($vval) {
                $newform = $("<form></form>").attr("method", "post");
                $newform.append("<input type=\"text\" name=\"vv\" value=\"" + $vval + "\">");
                $newform.append("<input type=\"text\" name=\"st\" value=\"uptext\">");
                $newform.append("<input type=\"text\" name=\"ss\" value=\"t23\">");
                $newform.append("<input type=\"text\" name=\"id\" value=\"<?php echo $ac_auto; ?>\">");
                $newform.attr("action", "ad_fun_action_list2_set_ajax.php").appendTo("body").submit().remove();
            }
        });

        $("#t24save").on("click", function(event) {
            var $vval = $("#t24").val();
            if ($vval) {
                $newform = $("<form></form>").attr("method", "post");
                $newform.append("<input type=\"text\" name=\"vv\" value=\"" + $vval + "\">");
                $newform.append("<input type=\"text\" name=\"st\" value=\"uptext\">");
                $newform.append("<input type=\"text\" name=\"ss\" value=\"t24\">");
                $newform.append("<input type=\"text\" name=\"id\" value=\"<?php echo $ac_auto; ?>\">");
                $newform.attr("action", "ad_fun_action_list2_set_ajax.php").appendTo("body").submit().remove();
            }
        });

        $("#t1save").on("click", function(event) {
            $newform = $("<form></form>").attr("method", "post");
            $newform.append($("#start_table"));
            $newform.append("<input type=\"text\" name=\"st\" value=\"updates\">");
            $newform.append("<input type=\"text\" name=\"id\" value=\"<?php echo $ac_auto; ?>\">");
            $newform.attr("action", "ad_fun_action_list2_set_ajax.php").appendTo("body").submit().remove();
        });

        $("#t12save").on("click", function(event) {
            $newform = $("<form></form>").attr("method", "post");
            $newform.append($("#air_table"));
            $newform.append("<input type=\"text\" name=\"st\" value=\"upfull\">");
            $newform.append("<input type=\"text\" name=\"id\" value=\"<?php echo $ac_auto; ?>\">");
            $newform.attr("action", "ad_fun_action_list2_set_ajax.php").appendTo("body").submit().remove();
        });


        $("#t21set").on("click", function(event) {
            $("#t21div").show();
            $(this).remove();
        });

        $("#t21save").on("click", function(event) {
            var $vval = tinyMCE.get("t21").getContent();
            if ($vval) {
                $newform = $("<form></form>").attr("method", "post");
                $newform.append("<textarea name=\"vv\">" + $vval + "</textarea>");
                $newform.append("<input type=\"text\" name=\"st\" value=\"uptextarea\">");
                $newform.append("<input type=\"text\" name=\"ss\" value=\"t21\">");
                $newform.append("<input type=\"text\" name=\"id\" value=\"<?php echo $ac_auto; ?>\">");
                $newform.attr("action", "ad_fun_action_list2_set_ajax.php").appendTo("body").submit().remove();
            }
        });
        $("#t22set").on("click", function(event) {
            $("#t22div").show();
            $(this).remove();
        });
        $("#t20set").on("click", function(event) {
            $("#t20div").show();
            $(this).remove();
        });
        $("#t20save").on("click", function(event) {
            var $vval = tinyMCE.get("t20").getContent();
            if ($vval) {
                $newform = $("<form></form>").attr("method", "post");
                $newform.append("<textarea name=\"vv\">" + $vval + "</textarea>");
                $newform.append("<input type=\"text\" name=\"st\" value=\"uptextarea\">");
                $newform.append("<input type=\"text\" name=\"ss\" value=\"t20\">");
                $newform.append("<input type=\"text\" name=\"id\" value=\"<?php echo $ac_auto; ?>\">");
                $newform.attr("action", "ad_fun_action_list2_set_ajax.php").appendTo("body").submit().remove();
            }
        });
        $("#t22save").on("click", function(event) {
            var $vval = tinyMCE.get("t22").getContent();
            if ($vval) {
                $newform = $("<form></form>").attr("method", "post");
                $newform.append("<textarea name=\"vv\">" + $vval + "</textarea>");
                $newform.append("<input type=\"text\" name=\"st\" value=\"uptextarea\">");
                $newform.append("<input type=\"text\" name=\"ss\" value=\"t22\">");
                $newform.append("<input type=\"text\" name=\"id\" value=\"<?php echo $ac_auto; ?>\">");
                $newform.attr("action", "ad_fun_action_list2_set_ajax.php").appendTo("body").submit().remove();
            }
        });

        $("#start_add").on("click", function(event) {
            var $start_tableline = $("#start_table tr").length;
            var $oldhtmls = $("#start_table").html();
            var $addhtmls = "<tr id=\"start_tr_" + $start_tableline + "\"><td><a href=\"javascript:delline('start_tr_" + $start_tableline + "')\">刪行</a></td><td height=40><input type=\"hidden\" name=\"auton[]\" value=\"0\"><input name=\"t1[]\" type=\"text\" style=\"width:80px;\" class=\"ndatepicker\"></td><td><input name=\"t2[]\" type=\"text\" style=\"width:100px;\"></td><td> <input name=\"t3[]\" type=\"text\" style=\"width:30px;\"> 天</td><td> NT <input name=\"t4[]\" type=\"text\" style=\"width:100px;\"> </td><td> NT <input name=\"t7[]\" type=\"text\" style=\"width:100px;\"> </td><td><input name=\"t5[]\" type=\"text\" style=\"width:100px;\"></td><td><input data-no-uniform=\"true\" name=\"t6[]\" type=\"checkbox\" value=\"1\" checked> 可報名<br><input data-no-uniform=\"true\" name=\"t6[]\" type=\"checkbox\" value=\"0\"> 不可報名<br><input data-no-uniform=\"true\" name=\"t6[]\" type=\"checkbox\" value=\"2\"> 前台不顯示</td></tr>";
            $("#start_table").append($addhtmls);
            $(".ndatepicker").datepicker({
                dateFormat: 'yy/mm/dd'
            });
        });

        $("#start_add_air").on("click", function(event) {
            var $start_tableline_air = $("#start_add_air tr").length;
            var $addhtmls2 = "<tr id=\"start_air_tr_" + $start_tableline_air + "\"><td><a href=\"#del\" onclick=\"delline('start_air_tr_" + $start_tableline_air + "')\">刪行</a></td><td height=40><select name=\"t12[]\"><option value=\"\">請選擇</option><option value=\"去程航班\">去程航班</option><option value=\"回程航班\">回程航班</option></select></td><td><input type=\"text\" name=\"t13[]\" size=20 class=\"ndatepicker\"></td><td> <input name=\"t14[]\" type=\"text\" size=20> </td><td><input name=\"t15[]\" type=\"text\" size=20></td><td><input name=\"t16[]\" type=\"text\" size=20></td></tr>";
            $("#air_table").append($addhtmls2);
            $(".ndatepicker").datepicker({
                dateFormat: 'yy/mm/dd'
            });
        });

    });

    function set_t8(th, a) {
        var $n = 0;
        var $savemsg = $("<div>儲存中..</div>");
        if (th.prop("checked")) $n = 1;
        th.parent().append($savemsg);
        $.ajax({
            url: 'ad_fun_action_list2_set_ajax.php',
            data: {
                st: "t8set",
                auton: a,
                v: $n
            },
            error: function(xhr) {
                alert('Ajax request 發生錯誤1');
            },
            success: function(response) {
                $savemsg.remove();
            }
        });
    }

    function delline(trd) {
        if (!trd) return;
        if (trd.substr(0, 10) == "day_table_") {
            $trdnum = trd.split("_")[2];
            if ($("#reload_day_upload" + $trdnum + " img").length > 0) {
                alert("請先將該日行程內的照片刪除。");
                return;
            }

        }
        $("#" + trd).remove();
    }

    function delline_j(trd, a) {
        if (!trd) return;
        $.ajax({
            url: 'ad_fun_action_list2_set_ajax.php',
            data: {
                st: "del_date",
                a: a
            },
            error: function(xhr) {
                alert('Ajax request 發生錯誤1');
            },
            success: function(response) {
                $("#" + trd).remove();
            }
        });
    }

    function reload_day_upload(dd) {
        var $sdiv = $("#reload_" + dd);
        if (dd.substr(0, 10) == "day_upload") $sts = "reload_day_upload";
        else $sts = dd;
        $.ajax({
            url: 'ad_fun_action_list2_set_ajax.php',
            data: {
                st: $sts,
                types: dd,
                id: '<?php echo $ac_auto; ?>'
            },
            error: function(xhr) {
                alert('Ajax request 發生錯誤1');
            },
            success: function(response) {
                $sdiv.html(response);
            }
        });
    }

    function delpic_j(an, dd) {
        if (!an) return false;
        $.ajax({
            url: 'ad_fun_action_list2_set_ajax.php',
            data: {
                st: 'delpic',
                an: an
            },
            error: function(xhr) {
                alert('Ajax request 發生錯誤');
            },
            success: function(response) {
                reload_day_upload(dd);
            }
        });
    }
</script>