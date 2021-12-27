<?php
    /*****************************************/ 
    //檔案名稱：funweb_fun8_add.php
    //後台對應位置：好好玩網站管理系統/媒體報導->新增/修改媒體報導
    //改版日期：2021.12.27
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
	if($_SESSION["MM_Username"] == "" ){ 
        call_alert("請重新登入。","login.php",0);
    }
    if($_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["funtourpm"] != "1"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    // 上移
    if($_REQUEST["st"] == "up_line"){
        $nowline = round(SqlFilter($_REQUEST["ad"],"int"));
        $upline = $nowline+1;
        $SQL = "update tv_data set t_desc=".$nowline." where t_desc=".$upline;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $SQL = "update tv_data set t_desc=".$upline." where t_auto=".SqlFilter($_REQUEST["t_auto"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }

    // 下移
    if($_REQUEST["st"] == "down_line"){
        $nowline = round(SqlFilter($_REQUEST["ad"],"int"));
        $upline = $nowline-1;
        $SQL = "update tv_data set t_desc=".$nowline." where t_desc=".$upline;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $SQL = "update tv_data set t_desc=".$upline." where t_auto=".SqlFilter($_REQUEST["t_auto"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }

    // 新增
    if($_REQUEST["acts"] == "ad"){
        $SQL = "select top 1 t_desc from tv_data order by t_desc desc";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $ltd = $result["t_desc"] + 1;
        }

        if($_REQUEST["t_note"] != ""){
            $t_note = SqlFilter($_REQUEST["t_note"],"tab");
            $t_note = str_replace(PHP_EOL,"<br>",$t_note);
        }
        if($_REQUEST["t_type"] == "1"){
            $t_type = 1;
        }else{
            $t_type = 0;
        }
        $SQL =  "INSERT INTO tv_data (t_time, t_title, t_note, t_pic, t_url, t_type, t_name, t_where, t_come, t_desc) VALUES ('"
                .date("Y/m/d H:i:s")."', '"
                .SqlFilter($_REQUEST["t_title"],"tab")."', '"
                .$t_note."', '"
                .SqlFilter($_REQUEST["t_pic"],"tab")."', '"
                .SqlFilter($_REQUEST["t_url"],"tab")."', '"
                .$t_type."', '"
                .SqlFilter($_REQUEST["t_name"],"tab")."', '"
                .SqlFilter($_REQUEST["t_where"],"tab")."', '"
                .SqlFilter($_REQUEST["t_come"],"tab")."', '"
                .$ltd."')";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("funweb_fun8.php");
            exit();
        }
    }

    //上傳
    if($_REQUEST["acts"] == "up"){
        if($_REQUEST["t_note"] != ""){
            $t_note = SqlFilter($_REQUEST["t_note"],"tab");
            $t_note = str_replace(PHP_EOL,"<br>",$t_note);
        }
        if($_REQUEST["t_note2"] != ""){
            $t_note = SqlFilter($_REQUEST["t_note2"],"tab");
        }
        if($_REQUEST["t_type"] == "1"){
            $t_type = 1;
        }else{
            $t_type = 0;
        }
        $SQL =  "UPDATE tv_data SET 
                t_title = '".SqlFilter($_REQUEST["t_title"],"tab")."', 
                t_note  = '".$t_note."', 
                t_pic   = '".SqlFilter($_REQUEST["t_pic"],"tab")."', 
                t_url   = '".SqlFilter($_REQUEST["t_url"],"tab")."', 
                t_type  = '".$t_type."', 
                t_name  = '".SqlFilter($_REQUEST["t_name"],"tab")."', 
                t_where = '".SqlFilter($_REQUEST["t_where"],"tab")."', 
                t_come  = '".SqlFilter($_REQUEST["t_come"],"tab")."', 
                t_descs = '".SqlFilter($_REQUEST["t_descs"],"tab")."'  
                where t_auto='".SqlFilter($_REQUEST["pid"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("funweb_fun8.php");
        }
    }


?>

<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li>好好玩國內網站系統</li>
            <li><a href="funweb_fun8.php">媒體報導</a></li>
            <li class="active">新增/修改媒體報導</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增/修改媒體報導</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="mform" method="post" action="funweb_fun8_add.php" class="form-inline" onSubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td width="150" align="left" valign="middle">媒體報導大標</td>
                                <td><input name="t_title" id="t_title" value="" class="form-control" required></td>
                            </tr>
                            <tr>
                            <tr>
                                <td width="150" align="left" valign="middle">媒體報導類型</td>
                                <td><select name="t_type" id="t_type" onchange="ctype()">
                                        <option value="">請選擇</option>
                                        <option value="0">文章</option>
                                        <option value="1">影音</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">媒體名稱</td>
                                <td><input name="t_name" id="t_name" value=""></td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">媒體來源</td>
                                <td><input name="t_where" id="t_where" value=""></td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">來源出處</td>
                                <td><input name="t_come" id="t_come" value=""></td>
                            </tr>

                    </table>
                    <input name="t_pic" id="t_pic" type="hidden" value=""><input name="acts" id="acts" type="hidden" value="ad"><input name="pid" type="hidden" id="pid" value="">
                    <table id="div1" class="table table-striped table-bordered bootstrap-datatable" style="display:none">


                        <tr>
                            <td align="left" valign="middle">上傳圖檔</td>
                            <td>

                                <div id="img_div">

                                </div>
                                <div>
                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input data-no-uniform="true" id="file_uploads" type="file" class="fileupload" name="fileupload"></span>
                                    <div id="progress" class="progress progress-striped" style="display:none">
                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                    </div>
                                </div>
                                <div id="fileupload_show"></div>
                                <br>
                                取得 youtube 縮圖：http://img.youtube.com/vi/連結位置/1.jpg<br>
                                　　　　　　　　　 http://img.youtube.com/vi/連結位置/2.jpg<br>
                                　　　　　　　　　 http://img.youtube.com/vi/連結位置/3.jpg<br>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="middle">內文</td>
                            <td><textarea name="t_note" style="width:80%;height:150px;"></textarea></td>
                        </tr>
            </div>
            <tr>
        </div>
        <tr>
            <td colspan=2 align="center">
                <input type="submit" value="確認送出" class="btn btn-info" style="width:50%;">
            </td>
        </tr>

        </table>
        <table id="div2" class="table table-striped table-bordered bootstrap-datatable" style="display:none">
            <tr>
                <td align="left" valign="middle">Youtube 位置</td>
                <td><input name="t_note2" id="t_note2" value=""></td>
            </tr>
            <tr>
                <td align="left" valign="middle">影片下方說明</td>
                <td><input name="t_descs" id="t_descs" value=""></td>
            </tr>

            <tr>
                <td colspan=2 align="center">
                    <input type="submit" value="確認送出" class="btn btn-info" style="width:50%;">
                </td>
            </tr>

        </table>
        </tbody>
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
require_once("./include/_bottom.php")
?>

<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script language="JavaScript">
    var $fsend = 0;
    var $ff;

    function chk_form() {
        if (!$ff || $fsend) return true;
        if ($ff && !$fsend) {
            $ff.submit();
            return false;
        }
        return false;
    }

    function ctype() {
        if ($("#t_type").val() == "0") {
            $("#div1").show();
            $("#div2").hide();
        } else {
            $("#div1").hide();
            $("#div2").show();

        }

    }

    $(function() {

        $(".fileupload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();

            $this.fileupload({
                    url: "funweb_fun8_add.php?st=upload&t_pic=",
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    autoUpload: false,
                    done: function(e, data) {

                        if (data.result) {
                            $("#t_pic").val(data.result);
                            $("#img_div").find("img").remove();
                            $("#img_div").append($("<img width=60 src='webfile/funtour/upload_image/" + data.result + "' border=0></img>"));
                            $fsend = 1;
                            $("#mform").submit();
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
                            $ff = data;
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
    });
</script>