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
            <li class="active">配對信產生器</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>配對信產生器</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div style="height:200px;">
                    <br><br><br>
                    <a href="?sextype=1" class="btn btn-info">發送給男生</a>&nbsp;&nbsp;&nbsp;<a href="?sextype=0" class="btn btn-warning">發送給女生</a>
                </div>

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
    $(function() {
        $(".vnum").on("click", function() {
            var $this = $(this),
                $thisid = $this.data("num"),
                $thisnum = $("#" + $thisid + "num"),
                $thisphoto = $("#" + $thisid + "photo"),
                $thisarea = $("#" + $thisid + "area"),
                $thisdata = $("#" + $thisid + "data"),
                $thisnumv = $("#" + $thisid);
            if (!$thisnumv.val()) {
                alert("請輸入編號。");
                $thisnumv.focus();
                return false;
            }

            $.ajax({
                url: "singleweb_fun21.php?st=read&num=" + $thisnumv.val(),
            }).done(function(msg) {
                if (msg == "err") {
                    alert("會員資料錯誤");
                } else {
                    if (msg.indexOf("|") <= 0) alert("會員資料分析錯誤");
                    else {
                        var $v1 = msg.split("|")[0],
                            $v2 = msg.split("|")[1],
                            $v3 = msg.split("|")[2];
                        $thisnum.val($thisnumv.val());
                        if ($v1.indexOf("photo/") >= 0) {
                            $("#" + $thisid + "photov").val("https://www.singleparty.com.tw/dphoto/" + $v1);
                            $thisphoto.attr("src", "https://www.singleparty.com.tw/dphoto/" + $v1);
                        } else {
                            $("#" + $thisid + "photov").val("https://www.singleparty.com.tw/photo/" + $v1);
                            $thisphoto.attr("src", "https://www.singleparty.com.tw/photo/" + $v1);
                        }
                        $thisarea.val($v2);
                        $thisdata.val($v3.replace(/<br\s*[\/]?>/gi, "\n"));
                        //	relaod_data($("#"+$thisid+"div"), $v1, $v2, $v3, $thisnum.val());
                    }
                }
            });
        });
    });

    function rndget(s) {
        var $outmsg = $("#rndgetmsg");
        $outmsg.html("開始讀取");

        $.ajax({
            url: "singleweb_fun21.php?st=rndget&sex=" + s,
        }).done(function(msg) {
            if (msg == "err") {
                $outmsg.html("讀取失敗或已無數據");
            } else if (msg.indexOf(",") <= 0) {
                $outmsg.html("讀取失敗或已無數據");
            } else {
                $outmsg.html("正在接收數據");

                setTimeout(function() {
                    $outmsg.html("數據渲染");
                    $.each(msg.split(","), function(index, value) {
                        if ($("#v" + (index + 1)).length > 0) {
                            $("#v" + (index + 1)).val(value);
                        }

                        setTimeout(function() {
                            $outmsg.html("數據載入");
                            $(".vnum").each(function(ii, vv) {
                                $thisid = $(this).data("num");

                                if ($("#" + $thisid).val()) $(this).trigger("click");

                            });

                            setTimeout(function() {
                                var d = new Date();
                                $outmsg.html("載入完成 - " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds());
                            }, 2000);
                        }, 1000);

                    });
                }, 1000);
            }
        });

    }
</script>