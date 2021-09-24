<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action_list1.php">好好玩國內活動</a></li>
            <li class="active">新增國內活動</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增國內活動</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <form id="addform" action="?st=add" method="post" target="_self" class="form-inline" onsubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td colspan=2>來源：<select name="ac_come" id="ac_come">

                                        <option value="">請選擇</option>

                                        <option value="新開發">新開發</option>
                                        <option value="回客">回客</option>
                                        <option value="推薦">推薦</option>
                                        <option value="其他">其他</option>
                                    </select>　開發者：<select name="ac_open1" id="ac_open1">

                                        <option value="">請選擇</option>
                                        <option value="台北">台北</option>
                                        <option value="桃園">桃園</option>
                                        <option value="新竹">新竹</option>
                                        <option value="台中">台中</option>
                                        <option value="台南">台南</option>
                                        <option value="高雄">高雄</option>
                                        <option value="八德">八德</option>
                                        <option value="約專">約專</option>
                                        <option value="迷你約">迷你約</option>
                                        <option value="總管理處">總管理處</option>
                                        <option value="好好玩旅行社">好好玩旅行社</option>
                                    </select><select name="ac_open2" id="ac_open2">
                                        <option value="">請選擇</option>
                                    </select>　執行者：<select name="ac_run1" id="ac_run1">

                                        <option value="">請選擇</option>
                                        <option value="台北">台北</option>
                                        <option value="桃園">桃園</option>
                                        <option value="新竹">新竹</option>
                                        <option value="台中">台中</option>
                                        <option value="台南">台南</option>
                                        <option value="高雄">高雄</option>
                                        <option value="八德">八德</option>
                                        <option value="約專">約專</option>
                                        <option value="迷你約">迷你約</option>
                                        <option value="總管理處">總管理處</option>
                                        <option value="好好玩旅行社">好好玩旅行社</option>
                                    </select><select name="ac_run2" id="ac_run2">
                                        <option value="">請選擇</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td colspan=2><label><input type="checkbox" name="ac_show" value="1"> 前台不顯示</label>

                                    &nbsp;<label><input type="checkbox" name="sync" value="1" onchange="sync_div($(this))"> 同步至約會專家</label>

                                </td>
                            </tr>
                            <tr>
                                <td>主辦單位：<input type="text" name="sub5_auto" value="好好玩旅行社" class="form-control"></td>
                                <td>主辦單位2：<input type="text" name="ac_1" value="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>承辦單位：<input type="text" name="ac_5" value="" class="form-control"></td>
                                <td>上車地點一：<input type="text" name="ac_car1" value="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>協辦單位：<input type="text" name="ac_2" value="" class="form-control"></td>
                                <td>上車地點二：<input type="text" name="ac_car2" value="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>指導單位：<input type="text" name="ac_3" value="" class="form-control"></td>
                                <td>上車地點三：<input type="text" name="ac_car3" value="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>贙助單位：<input type="text" name="ac_4" value="" class="form-control"></td>
                                <td>上車地點四：<input type="text" name="ac_car4" value="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td colspan=2>地區會館：<select name="ac_branch" id="ac_branch">

                                        <option value="好好玩旅行社">好好玩旅行社</option>
                                    </select>　活動類別： <select name="ac_kind3" id="ac_kind3" class="form-control" required>
                                        <option value="">請選擇</option>
                                        <option value="約會活動">約會活動</option>
                                        <option value="主題活動">主題活動</option>
                                    </select>
                                    &nbsp;&nbsp;<select name="ac_kind" id="ac_kind" required>
                                        <option value="">請選擇</option>
                                        <option value="戶外踏青">戶外踏青</option>
                                        <option value="午茶約會">午茶約會</option>
                                        <option value="主題系列">主題系列</option>
                                        <option value="熟齡專區">熟齡專區</option>
                                        <option value="小資首選">小資首選</option>
                                    </select>
                                    &nbsp;&nbsp;活動地點：<select name="ac_area" id="ac_area">
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
                                        <option value="台中市">台中市</option>
                                        <option value="彰化縣">彰化縣</option>
                                        <option value="彰化市">彰化市</option>
                                        <option value="南投縣">南投縣</option>
                                        <option value="嘉義縣">嘉義縣</option>
                                        <option value="嘉義市">嘉義市</option>
                                        <option value="雲林縣">雲林縣</option>
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
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    <p><b>好好玩網站價格顯示</b></p>
                                    原價：<input type="text" name="ac_money1" id="ac_money1" value="0" class="form-control">
                                    &nbsp;&nbsp;結盟廠商價男生費用：<input type="text" name="ac_money2" id="ac_money2" value="0" class="form-control">
                                    &nbsp;&nbsp;結盟廠商價女生費用：<input type="text" name="ac_money6" id="ac_money6" value="0" class="form-control">
                                    <br>
                                    &nbsp;&nbsp;男生費用：<input type="text" name="ac_money4" id="ac_money4" value="0" class="form-control">
                                    &nbsp;&nbsp;女生費用：<input type="text" name="ac_money5" id="ac_money5" value="0" class="form-control" required>
                                    &nbsp;&nbsp;女生2人同行價：<input type="text" name="ac_money7" id="ac_money7" value="0" class="form-control">
                                </td>
                            </tr>
                            <tr class="sync_hide">
                                <td colspan=2>
                                    <p><b>約會專家網站價格顯示</b></p>
                                    約會專家價-男：<input type="number" name="si_ac_money2" id="si_ac_money2" value="0" class="form-control">
                                    &nbsp;&nbsp;約會專家價-女：<input type="number" name="si_ac_money3" id="si_ac_money3" value="0" class="form-control">
                                    &nbsp;&nbsp;春天會員價-男：<input type="number" name="si_ac_money6" id="si_ac_money6" value="0" class="form-control">
                                    &nbsp;&nbsp;春天會員價-女：<input type="number" name="si_ac_money7" id="si_ac_money7" value="0" class="form-control">
                                    <br>
                                    DMN會員價-男：<input type="number" name="si_ac_money8" id="si_ac_money8" value="0" class="form-control">
                                    &nbsp;&nbsp;DMN會員價-女：<input type="number" name="si_ac_money9" id="si_ac_money9" value="0" class="form-control">
                                    &nbsp;&nbsp;好好玩會員價-男：<input type="number" name="si_ac_money10" id="si_ac_money10" value="0" class="form-control">
                                    &nbsp;&nbsp;好好玩會員價-女：<input type="number" name="si_ac_money11" id="si_ac_money11" value="0" class="form-control">
                                    <br>
                                    結盟廠商價-男：<input type="number" name="si_ac_money4" id="si_ac_money4" value="0" class="form-control">
                                    &nbsp;&nbsp;結盟廠商價-女：<input type="number" name="si_ac_money5" id="si_ac_money5" value="0" class="form-control">

                                </td>
                            </tr>
                            <tr>

                                <td colspan=2>活動時間：<input type="text" name="ac_time1" id="ac_time1" class="datepicker" autocomplete="off" value="">　<select name="ac_time2" id="ac_time2">

                                        <option value="">請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                    </select> 時　<select name="ac_time3" id="ac_time3">

                                        <option value="">請選擇</option>

                                        <option value="00">00</option>
                                        <option value="30">30</option>
                                    </select> 分</td>
                            </tr>
                            <tr>
                                <td colspan=2>報名截止日期：<input name="deadline" id="deadline" type="text" class="datepicker" autocomplete="off" value="">　報名人數：<input type="text" name="signup" id="signup" value="0" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>餐點：<input type="text" name="ac_eat1" id="ac_eat1" value="" class="form-control">&nbsp&nbsp&nbsp請使用,做餐點區格，如：排骨飯,雞腿飯,帝王蟹</td>
                                <td>飲品：<input type="text" name="ac_eat2" id="ac_eat2" value="" class="form-control">&nbsp&nbsp&nbsp請使用,做飲品區格，如：紅茶,綠茶,奶茶</td>
                            </tr>
                            <tr>
                                <td colspan=2>活動標題：<input type="text" name="ac_title" id="ac_title" style="width:50%" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td colspan=2>首頁簡短標題：<input type="text" name="ac_index_title" id="ac_index_title" style="width:50%" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>活動特色：<textarea name="ac_note1" id="ac_note1" style="width:80%;height:150px;" class="form-control"></textarea></td>
                                <td>報名方式：<textarea name="ac_note3" id="ac_note3" style="width:80%;height:150px;" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <td>活動介紹：<textarea name="ac_note2" id="ac_note2" style="width:80%;height:150px;" class="form-control"></textarea></td>
                                <td>注意事項：<textarea name="ac_note4" id="ac_note4" style="width:80%;height:150px;" class="form-control"></textarea></td>
                            </tr>

                            <tr>
                                <td>洽詢專線：<input name="ac_msg4" type="text" id="ac_msg4" value="" class="form-control"> </td>
                            </tr>
                            <tr>
                                <td colspan=2>活動照片：
                                    <table border=1 width="100%" style="border-collapse: collapse;border:1px solid #999;">
                                        <tr>
                                            <td width="25%" align="center" height="100">
                                                <span id="ac_pic_img"></span>

                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads1" name="file_uploads1" type="file" class="file_upload_d" data-n="1"></span>
                                                    <div id="progress" class="progress progress-striped" style="display:none">
                                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                                    </div>
                                                    <div id="fileupload_show1"></div>
                                                    <input type="hidden" name="ac_pic1" id="ac_pic1" value="">
                                                </div>
                                            </td>
                                            <td width="25%" align="center">
                                                <span id="ac_pic2_img"></span>

                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads2" name="file_uploads2" type="file" class="file_upload_d" data-n="2"></span>
                                                    <div id="progress" class="progress progress-striped" style="display:none">
                                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                                    </div>
                                                    <div id="fileupload_show2"></div>
                                                    <input type="hidden" name="ac_pic2" id="ac_pic2" value="">
                                                </div>
                                            </td>
                                            <td width="25%" align="center">
                                                <span id="ac_pic3_img"></span>

                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads3" name="file_uploads3" type="file" class="file_upload_d" data-n="3"></span>
                                                    <div id="progress" class="progress progress-striped" style="display:none">
                                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                                    </div>
                                                    <div id="fileupload_show3"></div>
                                                    <input type="hidden" name="ac_pic3" id="ac_pic3" value="">
                                                </div>
                                            </td>
                                            <td width="25%" align="center">
                                                <span id="ac_pic4_img"></span>

                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads4" name="file_uploads4" type="file" class="file_upload_d" data-n="4"></span>
                                                    <div id="progress" class="progress progress-striped" style="display:none">
                                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                                    </div>
                                                    <div id="fileupload_show4"></div>
                                                    <input type="hidden" name="ac_pic4" id="ac_pic4" value="">
                                                </div>
                                            </td>

                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2 align="center"><input type="submit" name="Submit" value="確定新增" class="btn btn-info" style="width:50%;"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
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
    $mtu = "ad_fun_action_list1.";
    var $ff = [];
    var $nowffc = 0,
        $uploadc = 1;
    $(".sync_hide").hide();

    function sync_div($this) {
        if (!$this.prop("checked")) $(".sync_hide").hide();
        else $(".sync_hide").show();
    }

    function chk_form() {
        var $clist = {
                "ac_come": "來源",
                "ac_open2": "開發者",
                "ac_money1": "原價",
                "ac_area": "活動地點",
                "ac_time1": "活動時間",
                "ac_time2": "活動時間-小時",
                "ac_time3": "活動時間-分鐘",
                "ac_title": "活動標題",
                "deadline": "報名截止日期"
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
                "ac_money2": "結盟廠商價男生費用",
                "ac_money6": "結盟廠商價女生費用",
                "ac_money4": "男生費用",
                "ac_money5": "女生費用",
                "ac_money7": "女生2人同行價",
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
        if ($ff.length && $uploadc) {
            $.each($ff, function(i) {
                $(this).submit();
            });
            return false;
        }

        return true;

    }
    $(function() {

        $("#ac_open1").on("change", function() {
            personnel_get("ac_open1", "ac_open2");
        });
        $("#ac_run1").on("change", function() {
            personnel_get("ac_run1", "ac_run2");
        });
        $(".file_upload_d").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();
            var $types = $this.data("types"),
                $op = $this.data("op"),
                $n = $this.data("n");

            $this.fileupload({
                    url: "ad_fun_action_list1_add.php?st=upload&old_pic=" + $op + "&types=" + $types,
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    autoUpload: false,
                    done: function(e, data) {

                        if (data.result) {
                            var $ffc = $ff.length;
                            $("#ac_pic" + $n).val(data.result);
                            if ($ffc == $nowffc + 1) {
                                $uploadc = 0;
                                //console.log("send"+$nowffc);
                                $("#addform").submit();
                            }
                            $nowffc++;
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
                            $("#fileupload_show" + $n).html(data.files[data.files.length - 1].name);
                            $ //("#ac_pic"+$n).val(data.files[data.files.length-1].name);        	
                            var $funame = "file_uploads" + $n,
                                $fsplice = -1;
                            if ($ff.length > 0) {
                                $.each($ff, function(j) {
                                    if ($ff[j]["paramName"] == $funame) $fsplice = j;
                                });
                            }
                            if ($fsplice >= 0) $ff.splice($fsplice, 1);

                            $ff.push(data);
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });
    });
</script>