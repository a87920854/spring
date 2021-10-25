<?php
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li>好好玩網站管理系統</li>
            <li class="active">出團情報</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>出團情報</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="LOVE旅遊" onclick="location.href='funweb_fun1.php?t=1'"> <input type="button" class="btn btn-success" value="FUN旅遊" onclick="location.href='funweb_fun1.php'"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td>什麼是FUN旅遊?</td>
                            <td rowspan=9 width="55%">
                                <div>
                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_upload" type="file" class="fileupload" name="file_upload"></span>
                                    <div class="progress progress-striped" style="display:none">
                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                    </div>
                                </div>350 x 210<br>


                                <img src="http://www.funtour.com.tw/images/20140319/ad_fun.jpg">
                                <br><br>
                                <form action="funweb_fun1.php?st=saveimg" method="post" target="_self" onsubmit="return check_form($(this))" style="margin:0">
                                    <div class="input-append"><input type="text" name="n2" id="n2" placeholder="連接頁面" value="otravel.php?id=1940"><input type="hidden" name="t" value=""> <input type="submit" class="btn" value="儲存"></div>
                                </form>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="funweb_fun1.php?st=edit" method="post" target="_self" onsubmit="return check_form($(this))" style="margin:0">
                                    <div class="input-append"><input type="text" name="n1" id="n1" placeholder="行程名稱" value="泰愛潑水在暹羅6天"><input type="text" name="n2" id="n2" placeholder="連接頁面" value="http://www.funtour.com.tw/otravel.php?id=1978"><input type="hidden" name="t" value=""><input type="hidden" name="auton" value="224"> <input type="submit" class="btn" value="修改"> <input type="button" onclick="del_f('224')" class="btn" value="刪"></div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="funweb_fun1.php?st=edit" method="post" target="_self" onsubmit="return check_form($(this))" style="margin:0">
                                    <div class="input-append"><input type="text" name="n1" id="n1" placeholder="行程名稱" value="馬新派對紅花奇緣5日"><input type="text" name="n2" id="n2" placeholder="連接頁面" value="http://www.funtour.com.tw/otravel.php?id=1979"><input type="hidden" name="t" value=""><input type="hidden" name="auton" value="228"> <input type="submit" class="btn" value="修改"> <input type="button" onclick="del_f('228')" class="btn" value="刪"></div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="funweb_fun1.php?st=edit" method="post" target="_self" onsubmit="return check_form($(this))" style="margin:0">
                                    <div class="input-append"><input type="text" name="n1" id="n1" placeholder="行程名稱" value="愛韓風情人視角之旅5日"><input type="text" name="n2" id="n2" placeholder="連接頁面" value="http://www.funtour.com.tw/otravel.php?id=1981"><input type="hidden" name="t" value=""><input type="hidden" name="auton" value="229"> <input type="submit" class="btn" value="修改"> <input type="button" onclick="del_f('229')" class="btn" value="刪"></div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="funweb_fun1.php?st=edit" method="post" target="_self" onsubmit="return check_form($(this))" style="margin:0">
                                    <div class="input-append"><input type="text" name="n1" id="n1" placeholder="行程名稱" value="小日本愛玩大軌跡5日"><input type="text" name="n2" id="n2" placeholder="連接頁面" value="http://www.funtour.com.tw/otravel.php?id=1982"><input type="hidden" name="t" value=""><input type="hidden" name="auton" value="230"> <input type="submit" class="btn" value="修改"> <input type="button" onclick="del_f('230')" class="btn" value="刪"></div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="funweb_fun1.php?st=edit" method="post" target="_self" onsubmit="return check_form($(this))" style="margin:0">
                                    <div class="input-append"><input type="text" name="n1" id="n1" placeholder="行程名稱" value="釜山滑出萌萌的愛5日"><input type="text" name="n2" id="n2" placeholder="連接頁面" value="http://www.funtour.com.tw/otravel.php?id=1983"><input type="hidden" name="t" value=""><input type="hidden" name="auton" value="231"> <input type="submit" class="btn" value="修改"> <input type="button" onclick="del_f('231')" class="btn" value="刪"></div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="funweb_fun1.php?st=add" method="post" target="_self" onsubmit="return check_form($(this))" style="margin:0">
                                    <div class="input-append"><input type="text" name="n1" id="n1" placeholder="行程名稱"><input type="text" name="n2" id="n2" placeholder="連接頁面"><input type="hidden" name="t" value=""> <input type="submit" class="btn" value="新增"></div>
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
    $(function() {
        var $file_uploads1 = $("#file_upload"),
            $thisid = $file_uploads1.attr("id"),
            $progress = $file_uploads1.closest("div").find(".progress");
        var $imgs = $file_uploads1.closest("span").find("#cimg").val();

        $file_uploads1.fileupload({
                url: "funweb_fun1.php?st=upload&t=",
                type: "POST",
                dropZone: $file_uploads1,
                dataType: 'html',
                autoUpload: true,
                done: function(e, data) {
                    location.reload();
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
                    data.submit();
                }
            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');

    });

    function del_f(a) {
        if (confirm("是否要刪除此行？")) {
            location.href = 'funweb_fun1.php?st=del&t=&a=' + a;
        }
    }

    function check_form(f) {
        var $r = 0;
        $.each(f.find("input"), function() {
            if (!$r && $(this).attr("type") == "text") {
                if (!$(this).val()) {
                    alert("請確實輸入新增或儲存的資料。");
                    $(this).focus();
                    $r = 1;
                }
            }
        });
        if ($r) return false;
        else return true;
    }
</script>