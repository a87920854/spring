<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php")
?>

<!-- MIDDLE -->
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<noscript>
    <link rel="stylesheet" href="css/jquery.fileupload-noscript.css">
</noscript>
<noscript>
    <link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css">
</noscript>

<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_mem.php">會員管理系統</a></li>
            <li class="active">會員紙本資料 - 編號 2082100 - 陳韋杉</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員紙本資料 - 編號 2082100 - 陳韋杉 - <font color=#c22c7d>約會專家主帳號</font></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>



                    <a class="btn btn-primary" href="ad_mem_detail.php?mem_num=2082100">基本資料</a>

                    <a class="btn btn-blue" href="ad_mem_fix.php?mem_num=2082100">修改資料</a>

                    <a class="btn btn-info" href="ad_mem_service.php?mem_num=2082100">服務紀錄</a>
                    <a class="btn btn-danger" href="ad_mem_ptest.php?mem_num=2082100">心理測驗</a>
                    <a class="btn btn-warning" href="ad_mem_login_log.php?mem_num=2082100">登入紀錄</a>
                    <a class="btn btn-dirtygreen" href="ad_important_paper.php?mem_num=2082100"><i class="fa fa-arrow-right" style="margin-top:3px;"></i>紙本資料</a>

                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="92">
                                <div align="right">編號：</div>
                            </td>
                            <td width="267">2082100</td>
                            <td width="94">
                                <div align="right">身分證字號：</div>
                            </td>
                            <td width="269">M122754857</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">姓名：</div>
                            </td>
                            <td>陳韋杉</td>
                            <td>
                                <div align="right">電話/手機：</div>
                            </td>
                            <td>0906512700
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="right">資料時間：</div>
                            </td>
                            <td>2021/9/6 下午 07:12:22</td>
                            <td>
                                <div align="right">更新時間：</div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">最後登入時間：</div>
                            </td>
                            <td></td>
                            <td>
                                <div align="right">最後排約時間：</div>
                            </td>
                            <td>2021/9/6 下午 03:00:00</td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">處理情形：</div>
                            </td>
                            <td colspan=3>已排約</td>
                        </tr>
                </table>

                <table class="table table-striped table-bordered bootstrap-datatable lightbox" data-plugin-options='{"delegate": "a.popup", "gallery": {"enabled": true}}'>
                    <tbody>
                        <tr>
                            <td>合約書</td>
                            <td><a href="webfile/paper/202197203958_2082100_409405.jpg" class="popup">202197203958_2082100_409405.jpg</a></td>
                            <td>2021/9/7 下午 08:40:00</td>
                            <td>由鄭郁湘上傳</td>
                            <td><a href="javascript:Mars_popup2('ad_important_paper.php?st=del&mem_num=2082100&an=45592','','width=300,height=200,top=100,left=100')">刪除</a></td>
                        </tr>
                        <tr>
                            <td>合約書</td>
                            <td><a href="webfile/paper/202197203946_2082100_247082.jpg" class="popup">202197203946_2082100_247082.jpg</a></td>
                            <td>2021/9/7 下午 08:39:48</td>
                            <td>由鄭郁湘上傳</td>
                            <td><a href="javascript:Mars_popup2('ad_important_paper.php?st=del&mem_num=2082100&an=45591','','width=300,height=200,top=100,left=100')">刪除</a></td>
                        </tr>
                        <tr>
                            <td>單身切結書</td>
                            <td><a href="webfile/paper/20219720399_2082100_623943.jpg" class="popup">20219720399_2082100_623943.jpg</a></td>
                            <td>2021/9/7 下午 08:39:11</td>
                            <td>由鄭郁湘上傳</td>
                            <td><a href="javascript:Mars_popup2('ad_important_paper.php?st=del&mem_num=2082100&an=45590','','width=300,height=200,top=100,left=100')">刪除</a></td>
                        </tr>
                        <tr>
                            <td>貴賓諮詢卡</td>
                            <td><a href="webfile/paper/202197203838_2082100_643734.jpg" class="popup">202197203838_2082100_643734.jpg</a></td>
                            <td>2021/9/7 下午 08:38:40</td>
                            <td>由鄭郁湘上傳</td>
                            <td><a href="javascript:Mars_popup2('ad_important_paper.php?st=del&mem_num=2082100&an=45589','','width=300,height=200,top=100,left=100')">刪除</a></td>
                        </tr>
                    </tbody>
                </table>

                <br>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td>
                            <div class="col-md-6 col-xs-12">
                                <select name="photo_desc" id="photo_desc" onchange="photo_desc_change($(this))" required>
                                    <option value="">請選擇</option>
                                    <option value="合約書">合約書</option>
                                    <option value="貴賓諮詢卡">貴賓諮詢卡</option>
                                    <option value="單身切結書">單身切結書</option>
                                    <option value="通訊紀錄">通訊紀錄</option>
                                    <option value="學歷證明">學歷證明</option>
                                    <option value="收入證明">收入證明</option>
                                    <option value="房產證明">房產證明</option>
                                    <option value="自我介紹">自我介紹</option>
                                    <option value="照片">照片</option>
                                    <option value="other">其他</option>
                                </select>
                                <span id="photo_desc_other" style="display:none"><input type="text" id="photo_desc_other_input" class="form-control2" placeholder="紙本資料的正確名稱"></span>
                                <span class="btn btn-info fileinput-button"><span>點此上傳紙本資料</span><input id="fileuploads" type="file" class="fileupload" name="fileupload"></span>
                                <div id="progress" class="progress progress-striped" style="display:none">
                                    <div class="bar progress-bar progress-bar-lovepy"></div>
                                </div>
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

<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script type="text/javascript">
    function photo_desc_change($this) {
        if ($this.val() == "other") {
            $("#photo_desc_other").show();
            $("#fileuploads").attr("multiple", true);
        } else {

            $("#photo_desc_other_input").val("");
            $("#photo_desc_other").hide();
            if ($this.val() == "通訊紀錄") $("#fileuploads").attr("multiple", true);
            else $("#fileuploads").attr("multiple", false);
        }
    }
    $(function() {

        $(".fileupload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");

            $ffileu = $this.fileupload({
                    url: "ad_important_paper.php?st=upload&mem_num=2082100",
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
                            case "noallow":
                                $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                alert("不允許的檔案類型。");
                                break;
                            default:
                                location.reload();
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
                            case "noallow":
                                $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                alert("不允許的檔案類型。");
                                break;

                            default:
                                location.reload();
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
                        if (data.originalFiles[0]['size'] > 10000000) {
                            uploadErrors.push('檔案大小超過限制。');
                        }
                        if (uploadErrors.length > 0) {
                            alert(uploadErrors.join("\n"));
                        } else {
                            var $photo_desc = $("#photo_desc");
                            var $photo_desc_val = $photo_desc.val();
                            if (!$photo_desc_val) {
                                alert("請先選擇紙本資料類型。");
                                return false;
                            }
                            if ($photo_desc_val == "other") {
                                if (!$("#photo_desc_other_input").val()) {
                                    alert("請輸入正確的紙本資料名稱。");
                                    return false;
                                }
                                $photo_desc_val = $("#photo_desc_other_input").val();

                            }
                            data.url = "ad_important_paper.php?st=upload&mem_num=2082100&photo_desc=" + $photo_desc_val;

                            data.submit();
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });

    });
</script>