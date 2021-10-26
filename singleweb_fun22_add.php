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
            <li>約會專家系統</li>
            <li><a href="singleweb_fun16.php">GT活動管理</a></li>
            <li class="active">新增GT活動</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增GT活動</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form action="?st=add" method="post" id="form1" class="form-inline">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td>
                                    活動名稱：<input name="d1" type="text" id="d1" value="" style="width:80%" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    時間：<input type="text" name="t1" id="t1" value="" class="datepicker" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    地點：<input name="d3" type="text" id="d3" value="" style="width:80%" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    類型：<input name="d2" type="text" id="d2" value="" style="width:80%" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    價錢：<input name="d4" type="text" id="d4" value="" style="width:80%" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    主旨： <textarea type="text" name="n3" id="n3" class="form-control" style="width:80%;height:100px;font-size:13px;" rows=4 required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    簡介： <textarea type="text" name="n1" id="n1" class="form-control" style="width:80%;height:100px;font-size:13px;" rows=4 required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    特色： <textarea type="text" name="n2" id="n2" class="form-control" style="width:80%;height:100px;font-size:13px;" rows=4 required></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="col-md-12 margin-bottom-10">圖片：

                                    </div>

                                    建立活動後方可上傳圖片

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="center">

                                        <input id="submit3" type="submit" value="確定新增" class="btn btn-info" style="width:50%;">
                                    </div>
                                </td>
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
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script type="text/javascript">
    $mtu = "singleweb_fun22.";

    $(function() {

        $("#file_uploads").fileupload({
                url: "singleweb_fun22_add.php?st=upload&an=",
                type: "POST",
                dropZone: $(this),
                dataType: 'html',
                autoUpload: false,
                done: function(e, data) {
                    //	console.log(data);
                    if (data.result) {
                        //	console.log(data.result);	
                        location.reload();
                    }
                },
                fail: function(e, data) {
                    console.log(data);
                },
                progressall: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $(this).closest("div").find(".progress").show().find(".progress-bar").css(
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
                        data.submit();
                    }
                }
            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');

    });
</script>