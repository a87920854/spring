<?php

    /*****************************************/
    //檔案名稱：ad_fun_action_list2_add.php
    //後台對應位置：好好玩管理系統/好好玩國外團控->新增國外旅遊
    //改版日期：2021.12.13
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

    // 上傳圖片(未完成)
    if($_REQUEST["st"] == "upload"){
        $ac_pic2 = $_REQUEST["ac_pic2"];
    }

    // 新增資料
    if($_REQUEST["st"] == "add"){
        if($_REQUEST["acword1"] != ""){
            if($_REQUEST["acword2"] != ""){
                $acword = SqlFilter($_REQUEST["acword1"],"tab") . "|_|" . SqlFilter($_REQUEST["acword2"],"tab");
            }else{
                $acword = SqlFilter($_REQUEST["acword1"],"tab");
            }
        }
        $SQL =  "INSERT INTO actionf_data (ac_auto_time, ac_branch, ac_kind, ac_title, ac_pic, sub5_auto, ac_money1, ac_money2, ac_money3,
                ac_money4, ac_money5, ac_money6, ac_money7, signup, ac_car1, ac_car2, ac_car3, ac_car4, stype, skingdom, ac_word) VALUES ('"
                .date("Y-m-d H:i:s")."', '"
                .SqlFilter($_REQUEST["ac_branch"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_kind"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_title"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_pic"],"tab")."', '"
                .SqlFilter($_REQUEST["sub5_auto"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_money1"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_money2"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_money3"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_money4"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_money5"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_money6"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_money7"],"tab")."', '"
                .SqlFilter($_REQUEST["signup"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_car1"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_car2"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_car3"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_car4"],"tab")."', '"
                .SqlFilter($_REQUEST["stype"],"tab")."', '"
                .SqlFilter($_REQUEST["skingdom"],"tab")."', '"
                .$acword."')";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("ad_fun_action_list2.php");
            exit();
        }
    }

    // 修改資料
    if($_REQUEST["st"] == "edit"){
        if($_REQUEST["ac"] == ""){
            call_alert("無法讀取資料。",0,0);
        }
        if($_REQUEST["ac_word1"] != ""){
            if($_REQUEST["ac_word2"] != ""){
                $ac_word = SqlFilter($_REQUEST["ac_word1"],"tab") . "|_|" . SqlFilter($_REQUEST["ac_word2"],"tab");
            }else{
                $ac_word = SqlFilter($_REQUEST["ac_word1"],"tab");
            }
        }
        $SQL =  "UPDATE actionf_data SET 
                ac_branch       = '".SqlFilter($_REQUEST["ac_branch"],"tab")."', 
                ac_kind         = '".SqlFilter($_REQUEST["ac_kind"],"tab")."', 
                ac_title        = '".SqlFilter($_REQUEST["ac_title"],"tab")."', 
                ac_note1        = '".SqlFilter($_REQUEST["ac_note1"],"tab")."', 
                ac_note2        = '".SqlFilter($_REQUEST["ac_note2"],"tab")."', 
                ac_note3        = '".SqlFilter($_REQUEST["ac_note3"],"tab")."', 
                ac_note4        = '".SqlFilter($_REQUEST["ac_note4"],"tab")."', 
                ac_pic          = '".SqlFilter($_REQUEST["ac_pic"],"tab")."', 
                sub5_auto       = '".SqlFilter($_REQUEST["sub5_auto"],"tab")."', 
                ac_money1       = '".SqlFilter($_REQUEST["ac_money1"],"tab")."', 
                ac_money2       = '".SqlFilter($_REQUEST["ac_money2"],"tab")."', 
                ac_money3       = '".SqlFilter($_REQUEST["ac_money3"],"tab")."', 
                ac_money4       = '".SqlFilter($_REQUEST["ac_money4"],"tab")."', 
                ac_money5       = '".SqlFilter($_REQUEST["ac_money5"],"tab")."', 
                ac_money6       = '".SqlFilter($_REQUEST["ac_money6"],"tab")."', 
                ac_money7       = '".SqlFilter($_REQUEST["ac_money7"],"tab")."', 
                signup          = '".SqlFilter($_REQUEST["signup"],"tab")."', 
                ac_car1         = '".SqlFilter($_REQUEST["ac_car1"],"tab")."', 
                ac_car2         = '".SqlFilter($_REQUEST["ac_car2"],"tab")."', 
                ac_car3         = '".SqlFilter($_REQUEST["ac_car3"],"tab")."', 
                ac_car4         = '".SqlFilter($_REQUEST["ac_car4"],"tab")."', 
                stype           = '".SqlFilter($_REQUEST["stype"],"tab")."', 
                skingdom        = '".SqlFilter($_REQUEST["skingdom"],"tab")."', 
                ac_word         = '".$ac_word."'
                WHERE ac_auto   = " .SqlFilter($_REQUEST["ac"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("ad_fun_action_list2_add.php?ac=".SqlFilter($_REQUEST["ac"],"int"));
            exit();
        }
    }

    if($_REQUEST["ac"] != ""){
        $ww = "修改";
        $ww2 = "edit&ac=".SqlFilter($_REQUEST["ac"],"int");
        $SQL = "select * from actionf_data where ac_auto = ".SqlFilter($_REQUEST["ac"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            call_alert("無法讀取資料。",0,0);
        }else{
            $sub5_auto = $result["sub5_auto"];
            $ac_car1 = $result["ac_car1"];
            $ac_car2 = $result["ac_car2"];
            $ac_car3 = $result["ac_car3"];
            $ac_car4 = $result["ac_car4"];
            $ac_branch = $result["ac_branch"];
            $ac_kind = $result["ac_kind"];
            $ac_money1 = $result["ac_money1"];
            $ac_money2 = $result["ac_money2"];
            $ac_money3 = $result["ac_money3"];
            $ac_money4 = $result["ac_money4"];
            $ac_money5 = $result["ac_money5"];
            $ac_money6 = $result["ac_money6"];
            $ac_money7 = $result["ac_money7"];
            $signup = $result["signup"];
            $ac_title = $result["ac_title"];
            $ac_note1 = $result["ac_note1"];
            $ac_note2 = $result["ac_note2"];
            $ac_note3 = $result["ac_note3"];
            $ac_note4 = $result["ac_note4"];
            $ac_pic = $result["ac_pic"];
            $ac_time = $result["ac_time"];
            $stype = $result["stype"];
            $skingdom = $result["skingdom"];
            if($result["ac_word"] != ""){
                if(count(explode("|_|",$result["ac_word"])) > 0){
                    $ac_word1 = explode("|_|",$result["ac_word"])[0];
                    $ac_word2 = explode("|_|",$result["ac_word"])[1];
                }else{
                    $ac_word1 = $result["ac_word"];
                    $ac_word2 = "";
                }
            }            
        }
    }else{
        $ww = "新增";
        $ww2 = "add";
        $sub5_auto = "好好玩旅行社";
        $ac_money1 = "0";
        $ac_money2 = "0";
        $ac_money3 = "0";
        $ac_money4 = "0";
        $ac_money5 = "0";
        $ac_money6 = "0";
        $ac_money7 = "0";
        $signup = "0";
    }
?>

<!-- fileupload css -->
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
            <li><a href="ad_fun_action_list2.asp">好好玩國外團控</a></li>
            <li class="active"><?php echo $ww; ?>國外旅遊</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $ww; ?>國外旅遊</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="addform" action="?st=<?php echo $ww2; ?>" method="post" target="_self" class="form-inline" onsubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td colspan=2>主辦單位：<input type="text" name="sub5_auto" class="form-control" value="<?php echo $sub5_auto; ?>">　
                                    地區會館：
                                    <select name="ac_branch" id="ac_branch">
                                        <?php                                             
                                            $branch_arr = ['好好玩'];
                                            foreach($branch_arr as $b_ar){
                                                if($ac_branch == $b_ar){
                                                    echo "<option value='".$b_ar."' selected>".$b_ar."</option>"; 
                                                }else{
                                                    echo "<option value='".$b_ar."'>".$b_ar."</option>"; 
                                                }
                                            }
                                        ?>
                                    </select>　活動類型：<select name="ac_kind" id="ac_kind">
                                        <?php
                                            $kind_arr = ['小島渡假','時尚城市','高檔精緻','背包體驗','情定兩岸'];
                                            foreach($kind_arr as $k_ar){
                                                if($ac_kind == $k_ar){
                                                    echo "<option value='".$k_ar."' selected>".$k_ar."</option>"; 
                                                }else{
                                                    echo "<option value='".$k_ar."'>".$k_ar."</option>"; 
                                                }
                                            }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    <p>原價：<input type="text" name="ac_money1" id="ac_money1" class="form-control" value="<?php echo $ac_money1; ?>">　結盟廠商價：<input type="text" name="ac_money2" id="ac_money2" class="form-control" value="<?php echo $ac_money2; ?>">　好好玩金卡會員：<input type="text" name="ac_money3" id="ac_money3" class="form-control" value="<?php echo $ac_money3; ?>"></p>
                                    <p>男生費用：<input type="text" name="ac_money4" id="ac_money4" class="form-control" value="<?php echo $ac_money4; ?>">　女生費用：<input type="text" name="ac_money5" id="ac_money5" class="form-control" value="<?php echo $ac_money5; ?>">
                                       兩人同行：<input type="text" name="ac_money6" id="ac_money6" class="form-control" value="<?php echo $ac_money6; ?>">　早鳥價(含金卡)：<input type="text" name="ac_money7" id="ac_money7" class="form-control" value="<?php echo $ac_money7; ?>"></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    類型：
                                    <select name="stype">
                                        <?php 
                                            $stype_arr = ['LOVE旅遊','FUN旅遊'];
                                            foreach($stype_arr as $st_ar){
                                                if($stype == $st_ar){
                                                    echo "<option value='".$st_ar."' selected>".$st_ar."</option>"; 
                                                }else{
                                                    echo "<option value='".$st_ar."'>".$st_ar."</option>";
                                                }
                                            }
                                        ?> 
                                    </select>
                                    旅遊國家：<input type="text" name="skingdom" id="skingdom" class="form-control" value="<?php echo $skingdom; ?>">
                                    報名人數：<input type="text" name="signup" id="signup" class="form-control" value="<?php echo $signup; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan=2>網站相簿標題：<input name="ac_word1" id="ac_word1" type="text" class="form-control" value="<?php echo $ac_word1; ?>">　名稱：<input type="text" name="ac_word2" id="ac_word2" class="form-control" value="<?php echo $ac_word2; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan=2>活動標題(11字)：<input type="text" name="ac_title" id="ac_title" class="form-control" style="width:50%" value="<?php echo $ac_title; ?>" maxlength="11"></td>
                            </tr>
                            <!--  <tr>
                            <td>活動特色：<textarea name="ac_note1" id="ac_note1" style="width:80%;height:150px;"><?php echo $ac_note1; ?></textarea></td>
                            <td>報名方式：<textarea name="ac_note3" id="ac_note3" style="width:80%;height:150px;"><?php echo $ac_note3; ?></textarea></td>
                            </tr>
                            <tr>
                            <td>活動介紹：<textarea name="ac_note2" id="ac_note2" style="width:80%;height:150px;"><?php echo $ac_note2; ?></textarea></td>
                            <td>注意事項：<textarea name="ac_note4" id="ac_note4" style="width:80%;height:150px;"><?php echo $ac_note4; ?></textarea></td>
                            </tr>-->
                            <tr>
                                <td colspan=2>活動照片：
                                    <span id="img_div"></span>
                                    <?php 
                                        if($ac_pic != ""){
                                            $ac_pic2 = "&ac_pic2=".$ac_pic;
                                            echo "<br><a href='webfile/funtour/upload_image/".$ac_pic."' class='fancybox'><img width=300 src='webfile/funtour/upload_image/".$ac_pic."' border=0></a>";
                                        }
                                    ?>
                                    <div>
                                        <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads" type="file" class="fileupload" name="fileupload"></span>
                                        <div id="progress" class="progress progress-striped" style="display:none">
                                            <div class="bar progress-bar progress-bar-lovepy"></div>
                                        </div>
                                        <div id="fileupload_show"></div>
                                        <input type="hidden" name="ac_pic" id="ac_pic" value="<?php echo $ac_pic; ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2 align="center"><input type="submit" name="Submit" value="確定<?php echo $ww; ?>" class="btn btn-info" style="width:50%;"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>

<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script type="text/javascript">
    $mtu = "ad_fun_action_list2.";
    var $ff = "";
    $(function() {
        $(".fileupload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();

            $this.fileupload({
                    url: "ad_fun_action_list2_add.php?st=upload<?php echo $ac_pic2; ?>",
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    autoUpload: false,
                    done: function(e, data) {

                        if (data.result) {
                            $("#ac_pic").val(data.result);
                            $ff = "";
                            $("#addform").submit();
                        }
                    },
                    fail: function(e, data) {

                    },
                    progressall: function(e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $progress.show().find(".progress-bar").css(
                            'width',
                            progress + '%'
                        );
                    },
                    add: function(e, data) {
                        var uploadErrors = [];
                        var acceptFileTypes = /^image\/(gif|jpe?g|png)$/i;
                        if (data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
                            uploadErrors.push('目前僅開放上傳 gif, jpg, jpeg, png 檔案。');
                        }
                        if (data.originalFiles[0]['size'] > 5000000) {
                            uploadErrors.push('檔案大小超過限制。');
                        }
                        if (uploadErrors.length > 0) {
                            alert(uploadErrors.join("\n"));
                        }
                        if (data.files) {
                            $("#fileupload_show").html(data.files[data.files.length - 1].name);
                            //$("#ac_pic").val(data.files[data.files.length-1].name);
                            $ff = data;
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });

    });

    function chk_form() {
        var $clist = {
                "ac_money1": "原價",
                "ac_title": "活動標題",
                "ac_word1": "網站相簿標題",
                "ac_word2": "名稱"
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

        var $cnlist = {
                "ac_money1": "原價",
                "ac_money2": "結盟廠商價",
                "ac_money3": "好好玩金卡會員",
                "ac_money4": "男生費用",
                "ac_money5": "女生費用",
                "signup": "報名人數"
            },
            $rr = 0;
        var reg = /^\d+$/;
        $.each($cnlist, function(n, v) {
            if (!reg.test($("#" + n).val())) {
                alert(v + "只能輸入數字。");
                $("#" + n).focus();
                $rr = 1;
            }
            if ($rr) return false;
        });

        if ($rr) return false;

        if ($ff) {
            $ff.submit();
            return false;
        }
        return true;

    }
</script>