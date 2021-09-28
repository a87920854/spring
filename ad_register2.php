<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php")
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_mem.php">會員管理系統</a></li>
            <li class="active">照片處理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>照片處理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable" style="font-size:12px;">
                    <tbody>
                        <tr>
                            <td>
                                <a href="ad_register1.php">繼續新增會員</a>
                            </td>
                        </tr>
                        <tr>
                            <td height="25" bgcolor="#C9DCDC">
                                <div align="center">
                                    <font color="#990066" size="3"><strong>
                                            <font color="#000000">上傳照片</font>
                                        </strong></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>＊照片圖檔只限
                                gif,jpg 或 png 格式，每張照片檔案最少需 800px 以上，公開相片不能包括任何裸露照、不雅照、風景照、非本人照。所有相片都要經過審核，審核時間需至少三個工作天。請不要在照片上顯示任何相關聯絡資訊，以保護您的隱私安全。</font>上傳後請務必進行裁切動作！ </td>
                        </tr>
                        <style>
                            .lovepy_my_uploadpic img {
                                max-height: 200px;
                            }

                            .imgdiv {
                                height: 350px;
                            }

                            .lovepy_my_uploadpic1 .lovepy_my_uploadpic2 {
                                width: 100%;
                                height: 25px;
                                line-height: 25px;
                                display: block;
                                margin: 0 auto;
                                text-align: center;
                                color: #fff;
                                background-color: rgba(0, 0, 0, 0.6);
                            }

                            .lovepy_my_uploadpic1 a:hover {
                                opacity: .8;
                                filter: Alpha(Opacity=80);
                            }
                        </style>
                        <tr>
                            <td style="height:500px;">
                                <div class="col-md-3 imgdiv">
                                    <div class="lovepy_my_uploadpic">
                                        <div class="lovepy_my_uploadpic1">
                                            <img src="img/lovepy_noimg.jpg"><br><span class="lovepy_my_uploadpic2">等待上傳</span><br><a class="btn btn-warning btn-xs lovepy_my_setfirst">尚未上傳</a>
                                            <span class="btn btn-info fileinput-button btn-xs"><span>上傳檔案</span><input data-no-uniform="true" id="fileupload705547" type="file" class="fileupload" name="fileupload"><input type="hidden" id="cimg" value=""></span>
                                            <div id="progress" class="progress progress-striped" style="display:none">
                                                <div class="bar progress-bar progress-bar-lovepy"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 imgdiv">
                                    <div class="lovepy_my_uploadpic">
                                        <div class="lovepy_my_uploadpic1">
                                            <img src="img/lovepy_noimg.jpg"><br><span class="lovepy_my_uploadpic2">等待上傳</span><br><a class="btn btn-warning btn-xs lovepy_my_setfirst">尚未上傳</a>
                                            <span class="btn btn-info fileinput-button btn-xs"><span>上傳檔案</span><input data-no-uniform="true" id="fileupload533424" type="file" class="fileupload" name="fileupload"><input type="hidden" id="cimg" value=""></span>
                                            <div id="progress" class="progress progress-striped" style="display:none">
                                                <div class="bar progress-bar progress-bar-lovepy"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 imgdiv">
                                    <div class="lovepy_my_uploadpic">
                                        <div class="lovepy_my_uploadpic1">
                                            <img src="img/lovepy_noimg.jpg"><br><span class="lovepy_my_uploadpic2">等待上傳</span><br><a class="btn btn-warning btn-xs lovepy_my_setfirst">尚未上傳</a>
                                            <span class="btn btn-info fileinput-button btn-xs"><span>上傳檔案</span><input data-no-uniform="true" id="fileupload579519" type="file" class="fileupload" name="fileupload"><input type="hidden" id="cimg" value=""></span>
                                            <div id="progress" class="progress progress-striped" style="display:none">
                                                <div class="bar progress-bar progress-bar-lovepy"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 imgdiv">
                                    <div class="lovepy_my_uploadpic">
                                        <div class="lovepy_my_uploadpic1">
                                            <img src="img/lovepy_noimg.jpg"><br><span class="lovepy_my_uploadpic2">等待上傳</span><br><a class="btn btn-warning btn-xs lovepy_my_setfirst">尚未上傳</a>
                                            <span class="btn btn-info fileinput-button btn-xs"><span>上傳檔案</span><input data-no-uniform="true" id="fileupload289563" type="file" class="fileupload" name="fileupload"><input type="hidden" id="cimg" value=""></span>
                                            <div id="progress" class="progress progress-striped" style="display:none">
                                                <div class="bar progress-bar progress-bar-lovepy"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 imgdiv">
                                    <div class="lovepy_my_uploadpic">
                                        <div class="lovepy_my_uploadpic1">
                                            <img src="img/lovepy_noimg.jpg"><br><span class="lovepy_my_uploadpic2">等待上傳</span><br><a class="btn btn-warning btn-xs lovepy_my_setfirst">尚未上傳</a>
                                            <span class="btn btn-info fileinput-button btn-xs"><span>上傳檔案</span><input data-no-uniform="true" id="fileupload301948" type="file" class="fileupload" name="fileupload"><input type="hidden" id="cimg" value=""></span>
                                            <div id="progress" class="progress progress-striped" style="display:none">
                                                <div class="bar progress-bar progress-bar-lovepy"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 imgdiv">
                                    <div class="lovepy_my_uploadpic">
                                        <div class="lovepy_my_uploadpic1">
                                            <img src="img/lovepy_noimg.jpg"><br><span class="lovepy_my_uploadpic2">等待上傳</span><br><a class="btn btn-warning btn-xs lovepy_my_setfirst">尚未上傳</a>
                                            <span class="btn btn-info fileinput-button btn-xs"><span>上傳檔案</span><input data-no-uniform="true" id="fileupload774740" type="file" class="fileupload" name="fileupload"><input type="hidden" id="cimg" value=""></span>
                                            <div id="progress" class="progress progress-striped" style="display:none">
                                                <div class="bar progress-bar progress-bar-lovepy"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 imgdiv">
                                    <div class="lovepy_my_uploadpic">
                                        <div class="lovepy_my_uploadpic1">
                                            <img src="img/lovepy_noimg.jpg"><br><span class="lovepy_my_uploadpic2">等待上傳</span><br><a class="btn btn-warning btn-xs lovepy_my_setfirst">尚未上傳</a>
                                            <span class="btn btn-info fileinput-button btn-xs"><span>上傳檔案</span><input data-no-uniform="true" id="fileupload14018" type="file" class="fileupload" name="fileupload"><input type="hidden" id="cimg" value=""></span>
                                            <div id="progress" class="progress progress-striped" style="display:none">
                                                <div class="bar progress-bar progress-bar-lovepy"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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
    $(function() {

        $(".fileupload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();

            $this.fileupload({
                    url: "ad_register2.php?st=upload&mem_num=2082523&img=" + $imgs,
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    done: function(e, data) {
                        switch (data.result) {
                            case "nowidth":
                                $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                alert("上傳的照片寬度過小，請上傳大於 800 px 的照片。");
                                break;
                            case "noext":
                                $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                alert("上傳的照片無副檔名請確認後再上傳。");
                                break;
                            default:
                                location.href = "ad_register2_corp.php?mem_num=2082523&a=" + data.jqXHR.responseText;
                                break;
                        }
                    },
                    fail: function(e, data) {
                        switch (data.result) {
                            case "nowidth":
                                $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                alert("上傳的照片寬度過小，請上傳大於 800 px 的照片。");
                                break;
                            case "noext":
                                $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                alert("上傳的照片無副檔名請確認後再上傳。");
                                break;
                            default:
                                location.href = "ad_register2_corp.php?mem_num=2082523&a=" + $dv;
                                break;
                        }
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
                        } else {
                            data.submit();
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });

    });
</script>