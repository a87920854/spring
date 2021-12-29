<?php
    /*****************************************/
    //檔案名稱：funweb_fun12.php
    //後台對應位置：好好玩網站管理系統/活動配對信
    //改版日期：2021.12.28
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    // ajax
    if ($_REQUEST["st"] == "read") {
        $SQL = "select ac_pic, ac_note1 from action_data where ac_auto='" . SqlFilter($_REQUEST["num"], "int") . "'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo "err";
            exit();
        } else {
            echo $result["ac_pic"] . "||" . $result["ac_note1"];
            exit();
        }
    }

    require_once("./include/_top.php");
    require_once("./include/_sidebar_fun.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }
    if ($_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["funtourpm"] != "1") {
        call_alert("您沒有查看此頁的權限。", "login.php", 0);
    }


?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li>好好玩網站管理系統</li>
            <li class="active">活動配對信</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動配對信</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <form action="funweb_fun11_make.php?st=make" method="post">

                    <table cellspacing="0" cellpadding="0" border="0" width="800" align="center" style="background-color: #f5f5f5;">
                        <tr>
                            <td width="800">

                                <img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_header.png" alt="好好玩旅行社_雙週快報" style="vertical-align:middle;display:block;">

                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #e7601c;">
                                <p style="font-size: 20px; font-weight: bold; text-align: center; margin: 10px auto; line-height: 1;">
                                    <input type="text" name="t1" id="t1" value="小編精選">
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td width="800">
                                <img id="t2img" border="0" src="" alt="" style="vertical-align:middle;display:none; max-width: 100%;">
                                <br>
                                <input type="text" style="width:100%;" name="t2" id="t2" placeholder="示意圖圖片位置" onblur="reload_t2()"><br><br>
                                <img id="v1img" border="0" src="assets/images/funweb_fun11_noimg.png" style="display:none">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table cellspacing="0" cellpadding="0" border="0" width="800" align="center" style="">
                                    <tr>
                                        <td width="42">&nbsp;</td>
                                        <td width="474">
                                            <p style="color: #e7601c; font-size: 16px;">
                                                <textarea type="text" id="v1data" name="v1data" style="width:100%;height:70px;">活動描述1</textarea>
                                            </p>
                                        </td>
                                        <td width="42">&nbsp;</td>
                                        <td width="200">

                                            <img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_button.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">

                                        </td>
                                        <td width="42">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="42">&nbsp;</td>
                                        <td>
                                            <input type="hidden" id="v1photov" name="v1photov"><input type="hidden" name="v1num" id="v1num"><input type="text" name="v1" id="v1" style="width:80px;" placeholder="活動編號1"><input type="button" class="btn vnum" value="讀" style="margin-top:-8px;" data-num="v1">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="800" height="20">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="800">
                                <table cellspacing="0" cellpadding="0" border="0" width="800" align="left" style="">
                                    <tr>
                                        <td width="42">&nbsp;</td>
                                        <td width="350">
                                            <table cellspacing="0" cellpadding="0" border="0" width="350" align="left">
                                                <tr>
                                                    <td>

                                                        <img id="v2img" border="0" src="assets/images/funweb_fun11_noimg.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="color: #e7601c; font-size: 16px;">
                                                            <textarea type="text" id="v2data" name="v2data" style="width:100%;height:70px;">活動描述2</textarea>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_button.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="16">&nbsp;</td>
                                        <td width="350">
                                            <table cellspacing="0" cellpadding="0" border="0" width="350" align="left">
                                                <tr>
                                                    <td>

                                                        <img id="v3img" border="0" src="assets/images/funweb_fun11_noimg.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="color: #e7601c; font-size: 16px;">
                                                            <textarea type="text" id="v3data" name="v3data" style="width:100%;height:70px;">活動描述3</textarea>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_button.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">

                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="42">&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <br>
                                            <input type="hidden" id="v2photov" name="v2photov"><input type="hidden" name="v2num" id="v2num"><input type="text" name="v2" id="v2" style="width:80px;" placeholder="活動編號2"><input type="button" class="btn vnum" value="讀" style="margin-top:-8px;" data-num="v2">
                                        </td>
                                        <td></td>
                                        <td>
                                            <br>
                                            <input type="hidden" id="v3photov" name="v3photov"><input type="hidden" name="v3num" id="v3num"><input type="text" name="v3" id="v3" style="width:80px;" placeholder="活動編號3"><input type="button" class="btn vnum" value="讀" style="margin-top:-8px;" data-num="v3">
                                        </td>
                                        <td></td>
                                    </tr>



                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="800" height="40">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="800">
                                <table cellspacing="0" cellpadding="0" border="0" width="800" align="left" style="">
                                    <tr>
                                        <td width="42">&nbsp;</td>
                                        <td width="350">
                                            <table cellspacing="0" cellpadding="0" border="0" width="350" align="left">
                                                <tr>
                                                    <td>

                                                        <img id="v4img" border="0" src="assets/images/funweb_fun11_noimg.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="color: #e7601c; font-size: 16px;">
                                                            <textarea type="text" id="v4data" name="v4data" style="width:100%;height:70px;">活動描述4</textarea>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_button.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">

                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="16">&nbsp;</td>
                                        <td width="350">
                                            <table cellspacing="0" cellpadding="0" border="0" width="350" align="left">
                                                <tr>
                                                    <td>

                                                        <img id="v5img" border="0" src="assets/images/funweb_fun11_noimg.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="color: #e7601c; font-size: 16px;">
                                                            <textarea type="text" id="v5data" name="v5data" style="width:100%;height:70px;">活動描述5</textarea>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_button.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">

                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="42">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <br>
                                            <input type="hidden" id="v4photov" name="v4photov"><input type="hidden" name="v4num" id="v4num"><input type="text" name="v4" id="v4" style="width:80px;" placeholder="活動編號4"><input type="button" class="btn vnum" value="讀" style="margin-top:-8px;" data-num="v4">
                                        </td>
                                        <td></td>
                                        <td>
                                            <br>
                                            <input type="hidden" id="v5photov" name="v5photov"><input type="hidden" name="v5num" id="v5num"><input type="text" name="v5" id="v5" style="width:80px;" placeholder="活動編號5"><input type="button" class="btn vnum" value="讀" style="margin-top:-8px;" data-num="v5">
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td width="800" height="75">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="800">

                                <img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_more.png" alt="看更多精彩好玩的活動" style="vertical-align:middle;display:block;">

                            </td>
                        </tr>
                        <tr>
                            <td width="800">
                                <table cellspacing="0" cellpadding="0" border="0" width="800" height="90" align="center" style="font-size: 0; line-height: 0;">
                                    <tr>
                                        <td width="303">
                                            <a href="https://www.facebook.com/funtourfans" target="_blank" style="display:block;font-size: 15px; line-height: 1.7; text-align: center;  color: #777; text-decoration: none;">
                                                <img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_facebook.png" alt="facebook" width="300" height="90" alt="" style="vertical-align:middle;display:block;">
                                            </a>
                                        </td>
                                        <td width="98">
                                            <a href="https://www.instagram.com/funtoursingle/" target="_blank" style="display:block;font-size: 15px; line-height: 1.7; text-align: center;  color: #777; text-decoration: none;">
                                                <img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_ig.png" alt="ig" width="100" height="90" alt="" style="vertical-align:middle;display:block;">
                                            </a>
                                        </td>
                                        <td width="98">
                                            <a href="https://www.youtube.com/user/Funtour520" target="_blank" style="display:block;font-size: 15px; line-height: 1.7; text-align: center;  color: #777; text-decoration: none;">
                                                <img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_youtube.png" alt="youtube" width="100" height="90" alt="" style="vertical-align:middle;display:block;">
                                            </a>
                                        </td>
                                        <td width="303">
                                            <a href="https://lin.ee/woEWLuq" target="_blank" style="display:block;font-size: 15px; line-height: 1.7; text-align: center;  color: #777; text-decoration: none;">
                                                <img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_line.png" alt="line" width="300" height="90" alt="" style="vertical-align:middle;display:block;">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="800">
                                <a href="https://www.funtour.com.tw/" target="_blank" style="display:block;font-size: 15px; line-height: 3; text-align: center;  color: #fff; text-decoration: none;background-color:#4d4d4d;">Copyright &copy; 好好玩旅行社有限公司 All Rights Reserve.</a>
                            </td>
                        </tr>
                        <tr>
                            <td width="800">
                                <a href="#" target="_blank" style="display:block;font-size: 11px; line-height: 2; text-align: center; color: #777;background-color: #fff;">如您想要取消訂閱各項行程優惠電子報，請按此處反應→</a>
                            </td>
                        </tr>
                    </table>

                    <hr>
                    <input id="send_submit" type="submit" value="產生配對信" class="btn btn-lg btn-danger">
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

<script type="text/javascript">
    $(function() {
        $(".vnum").on("click", function() {
            var $this = $(this),
                $thisid = $this.data("num"),
                $thisphoto = $("#" + $thisid + "img"),
                $thisphotov = $("#" + $thisid + "photov"),
                $thisnum = $("#" + $thisid + "num"),
                $thisdata = $("#" + $thisid + "data"),
                $thisnumv = $("#" + $thisid);
            if (!$thisnumv.val()) {
                alert("請輸入編號。");
                $thisnumv.focus();
                return false;
            }
            $.ajax({
                url: "funweb_fun11.php?st=read&num=" + $thisnumv.val(),
            }).done(function(msg) {
                if (msg == "err") {
                    alert("資料錯誤");
                } else {
                    if (msg.indexOf("|") <= 0) alert("資料分析錯誤");
                    else {
                        var $v1 = msg.split("||")[0],
                            $v2 = msg.split("||")[1];
                        $thisnum.val($thisnumv.val());
                        $thisphoto.attr("src", "https://www.funtour.com.tw/webfile/upload_image/" + $v1);
                        $thisphotov.val($v1);
                        $thisdata.val($v2);
                    }
                }
            });
        });
    });

    function reload_t2() {
        if ($("#t2").val()) {
            $("#t2img").attr("src", $("#t2").val()).show();
        }
    }
</script>