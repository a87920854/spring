<?php
    /*****************************************/
    //檔案名稱：ad_action_add.php
    //後台對應位置：管理系統/網站活動上傳>新增(修改)網站活動
    //改版日期：2022.2.14
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/
    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    if($_REQUEST["st"] == "upload"){
        $old_pic = SqlFilter($_REQUEST["old_pic"],"tab");
        $ext = pathinfo($_FILES["fileupload"]["name"][$i], PATHINFO_EXTENSION); //附檔名  
        $fileName = date("Y").date("n").date("j").date("H").date("i").date("s")."_action_".rand(1,999).".".$ext; //檔名
        $jpegpath = "upload_image/".$fileName;
        list($width,$height) = getimagesize($_FILES['image']['tmp_name']);
        if($width < 500){
            echo "nowidth";
            DelFile($jpegpath);
            exit();
        }

        $exif = exif_read_data($str);
        if(!empty($exif['Orientation'])) {
        switch($exif['Orientation']) {
            case 8:
                $image = imagerotate($image,90,0);
                break;
            case 3:
                $image = imagerotate($image,180,0);
                break;
            case 6:
                $image = imagerotate($image,-90,0);
                break;
            }
        }
    }
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_action_list.php">網站活動上傳</a></li>
            <li class="active">修改網站活動</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>修改網站活動</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form action="?st=add&ac_auto=13415" method="post" id="addform" class="form-inline" onSubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td colspan=2><span class="text-red"><i class="fa fa-star"></i></span> 來源：<select name="ac_come" id="ac_come" required>

                                        <option value="新開發">新開發</option>

                                        <option value="新開發">新開發</option>
                                        <option value="回客">回客</option>
                                        <option value="推薦">推薦</option>
                                        <option value="其他">其他</option>
                                    </select>
                                    &nbsp;&nbsp;<span class="text-red"><i class="fa fa-star"></i></span> 開發者：<select name="ac_open1" id="ac_open1" required>

                                        <option value="台北">台北</option>
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
                                    </select><select name="ac_open2" id="ac_open2" required>
                                        <option value="">請選擇</option>
                                    </select>
                                    &nbsp;&nbsp;<span class="text-red"><i class="fa fa-star"></i></span> 執行者：<select name="ac_run1" id="ac_run1" required>

                                        <option value="台北">台北</option>
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
                                    </select><select name="ac_run2" id="ac_run2" required>
                                        <option value="">請選擇</option>
                                    </select>

                                    &nbsp;&nbsp;講師：<select name="ac_teacher_auton" id="ac_teacher_auton">
                                        <option value="">請選擇</option>
                                        <option value="53">游文慈</option>
                                        <option value="52">游文昭</option>
                                        <option value="13">瑪那熊</option>
                                        <option value="51">Zoe老師</option>
                                        <option value="5">安東尼</option>
                                        <option value="6">姜沛紳</option>
                                        <option value="43">薰Stellla</option>
                                        <option value="42">嚴雋凱(Rich)</option>
                                        <option value="40">芬達</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    <label><input type="checkbox" name="ac_show" value="1"> 前台不顯示</label>
                                    <label><input type="checkbox" name="needidcardt" value="1"> 需輸入身分證字號</label>
                                    <label><input type="checkbox" name="needidcard" value="1"> 需上傳身分證</label>
                                    <label><input type="checkbox" name="event210725" value="1"> 好好玩講師列表</label>
                                    <label><input type="checkbox" name="crossarea" value="1"> 跨區活動</label>
                                    <!--<label><input type="checkbox" name="needworkcard" value="1" > 需上傳工作證</label>        	-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-red"><i class="fa fa-star"></i></span> 主辦單位：<input type="text" name="ac_1" value="台北春天會館" class="form-control" required>
                                    &nbsp;&nbsp;協辦單位：<input type="text" name="ac_2" value="" class="form-control">
                                    &nbsp;&nbsp;指導單位：<input type="text" name="ac_3" value="" class="form-control">
                                    &nbsp;&nbsp;贙助單位：<input type="text" name="ac_4" value="" class="form-control">
                                    &nbsp;&nbsp;承辦廠商：<input type="text" name="ac_support" value="" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    上車地點一：<input type="text" name="ac_car1" value="" class="form-control">
                                    &nbsp;&nbsp;上車地點二：<input type="text" name="ac_car2" value="" class="form-control">
                                    &nbsp;&nbsp;上車地點三：<input type="text" name="ac_car3" value="" class="form-control">
                                    &nbsp;&nbsp;上車地點四：<input type="text" name="ac_car4" value="" class="form-control">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span class="text-red"><i class="fa fa-star"></i></span> 承辦會館：<select name="ac_branch" id="ac_branch" class="form-control" required>
                                        <option value="台北" selected>台北</option>
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
                                    </select>
                                    <span id="issingleparty_div" style="display:none">
                                        &nbsp;&nbsp;
                                        <input type="checkbox" name="springclub_show" value="spring"> 春天
                                        <input type="checkbox" name="springclub_show" value="dmn"> DMN
                                    </span>

                                    &nbsp;&nbsp;<span class="text-red"><i class="fa fa-star"></i></span> 活動類別： <select name="ac_kind3" id="ac_kind3" class="form-control" autocomplete="off" required>
                                        <option value="">請選擇</option>
                                        <option value="約會活動">約會活動</option>
                                        <option value="主題活動" selected>主題活動</option>
                                    </select>
                                    &nbsp;&nbsp;<select name="ac_kind" id="ac_kind" class="form-control" autocomplete="off" required>
                                        <option value="">請選擇</option>
                                    </select>
                                    <select name="ac_kind2" id="ac_kind2" class="form-control" autocomplete="off" required>
                                        <option value="">請選擇</option>
                                    </select>
                                    &nbsp;&nbsp;歸屬：<select class="form-control" name="ac_tag" id="ac_tag">
                                        <option value="">如無免選</option>
                                        <option value="委外活動23">委外活動23</option>
                                    </select>


                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-red"><i class="fa fa-star"></i></span> 活動標題(15字)： <input name="ac_title" type="text" id="ac_title" class="form-control" value="週末桌遊電影約" maxlength="15" style="width:70%" required>

                                </td>
                            </tr>



                            <tr>
                                <td><span class="text-red"><i class="fa fa-star"></i></span> 活動時間：<input type="text" name="actime" id="actime" value="2021/10/17" class="datepicker" autocomplete="off" required>
                                    <input type="number" name="ahr" id="ahr" value="11" class="form-control" min="1" max="24" required>
                                    時
                                    <select name="amin" id="amin" class="form-control" required>
                                        <option value="00">00</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>
                                    </select>
                                    分
                                </td>
                            </tr>
                            <tr>
                                <td>報名截止日期：<input name="deadline" id="deadline" type="text" class="datepicker" autocomplete="off" value=""></td>
                            </tr>

                            <tr>
                                <td>
                                    <small>(填 0 顯示電洽，不填寫不顯示)</small>
                                    <br>
                                    約會專家價-男：<input type="number" name="ac_money2" id="ac_money2" value="" class="form-control">
                                    &nbsp;&nbsp;約會專家價-女：<input type="number" name="ac_money3" id="ac_money3" value="" class="form-control">
                                    &nbsp;&nbsp;春天會員價-男：<input type="number" name="ac_money6" id="ac_money6" value="550" class="form-control">
                                    &nbsp;&nbsp;春天會員價-女：<input type="number" name="ac_money7" id="ac_money7" value="400" class="form-control">
                                    <br>
                                    DMN會員價-男：<input type="number" name="ac_money8" id="ac_money8" value="" class="form-control">
                                    &nbsp;&nbsp;DMN會員價-女：<input type="number" name="ac_money9" id="ac_money9" value="" class="form-control">
                                    &nbsp;&nbsp;好好玩會員價-男：<input type="number" name="ac_money10" id="ac_money10" value="" class="form-control">
                                    &nbsp;&nbsp;好好玩會員價-女：<input type="number" name="ac_money11" id="ac_money11" value="" class="form-control">
                                    <br>
                                    結盟廠商價-男：<input type="number" name="ac_money4" id="ac_money4" value="" class="form-control">
                                    &nbsp;&nbsp;結盟廠商價-女：<input type="number" name="ac_money5" id="ac_money5" value="" class="form-control">

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span class="text-red"><i class="fa fa-star"></i></span> 活動地點： <select class="form-control" name="ac_area" id="ac_area" required>
                                        <option value="">請選擇</option>
                                        <option value="台北市" selected>台北市</option>
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
                                    &nbsp;&nbsp;報名人數：<input name="ac_msg2" type="text" id="ac_msg2" value="" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>餐點：<input type="text" name="ac_eat1" id="ac_eat1" value="" class="form-control">&nbsp&nbsp&nbsp請使用,做餐點區格，如：排骨飯,雞腿飯,帝王蟹<br>
                                    飲品：<input type="text" name="ac_eat2" id="ac_eat2" value="" class="form-control">&nbsp&nbsp&nbsp請使用,做飲品區格，如：紅茶,綠茶,奶茶</td>
                            </tr>

                            <tr>
                                <td>
                                    <table class="nomargin nopadding" style="width:100%;">
                                        <tr>
                                            <td><span class="text-red"><i class="fa fa-star"></i></span>活動特色：(請輸入至少50字)<br><textarea name="ac_note" id="ac_note" style="width:80%;height:150px;" minlength="50" class="form-control" required>&#36319;&#26149;&#22825;&#26371;&#39208;&#30340;&#26379;&#21451;&#20497;&#19968;&#36215;&#36629;&#39686;&#25171;&#26700;&#36938;&#12289;&#30475;&#38651;&#24433;&#21543;&#65281;&#36889;&#27425;&#25105;&#20497;&#23559;&#21069;&#24448;&#26700;&#36938;&#21654;&#21857;&#24215;&#25171;3&#23567;&#26178;&#30340;&#26700;&#36938;&#65292;&#20877;&#21040;&#24494;&#39080;&#24291;&#22580;&#22283;&#36051;&#24433;&#22478;&#27427;&#36062;&#29467;&#27602;2&#65292;&#35731;&#25105;&#20497;&#19968;&#36215;&#24230;&#36942;&#36889;&#29980;&#34588;&#19981;&#23396;&#21934;&#30340;&#26143;&#26399;&#22825;&#19979;&#21320;&#65281;</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>報名方式：<br><textarea name="ac_note2" id="ac_note2" style="width:80%;height:150px;" class="form-control"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-red"><i class="fa fa-star"></i></span>活動介紹：(請輸入至少100字)<br><textarea name="ac_content" id="ac_content" style="width:80%;height:150px;" minlength="100" class="form-control" required>&#27963;&#21205;&#65306;&#36913;&#26085;&#26700;&#36938;&#38651;&#24433;&#32004;
&#26085;&#26399;&#65306;1017&#65288;&#26085;&#65289;
&#26178;&#38291;&#65306;11301630
&#22320;&#40670;&#65306;&#38597;&#20856;&#23068;&#21654;&#21857;&#12289;&#24494;&#39080;&#22283;&#36051;&#24433;&#22478;
&#22320;&#22336;&#65306;&#21335;&#20140;&#26481;&#36335;&#19977;&#27573;256&#24055;20&#24324;4&#34399;1&#27155;
&#20839;&#23481;&#65306;&#20808;&#22312;&#26700;&#36938;&#21654;&#21857;&#24307;&#29609;&#65292;&#32080;&#26463;&#21435;&#30475;&#29467;&#27602;2
&#36027;&#29992;&#65306;&#30007;&#29983;550&#20803;&#12289;&#22899;&#29983;400&#20803;
&#21654;&#21857;&#24307;&#26377;&#39184;&#40670;&#65292;&#21487;&#33258;&#36027;&#22312;&#24215;&#20839;&#29992;&#39184;</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>注意事項：<br><textarea name="ac_note3" id="ac_note3" style="width:80%;height:150px;" class="form-control"></textarea></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    洽詢專線：<input name="ac_msg4" type="text" id="ac_msg4" value="" class="form-control">
                                    &nbsp;&nbsp;聯絡人：<select name="ac_con1" id="ac_con1">

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
                                    </select><select name="ac_con2" id="ac_con2">
                                        <option value="">請選擇</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td colspan=2>活動照片：<font color=red>至少 518 x 345</font>
                                    <table border=1 width="100%" style="border-collapse: collapse;border:1px solid #999;">
                                        <tr>
                                            <td width="25%" align="center">
                                                <span id="ac_pic2_img"></span>

                                                <a href="?st=delp&v=ac_pic2&ac=13415">刪除</a>
                                                <br><a href="upload_image/20211019162017_action_156.jpg" class="fancybox"><img width=300 src="upload_image/20211019162017_action_156.jpg" border=0></a>

                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads2" name="file_uploads2" type="file" class="file_upload_d" data-n="2" data-op="20211019162017_action_156.jpg"></span>
                                                    <div id="progress" class="progress progress-striped" style="display:none">
                                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                                    </div>
                                                    <div id="fileupload_show2"></div>
                                                    <input type="hidden" name="ac_pic2" id="ac_pic2" value="20211019162017_action_156.jpg">
                                                </div>
                                            </td>
                                            <!--
	    <td width="25%" align="center">
      <span id="ac_pic3_img"></span>
			
			<div>
			<span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads3" name="file_uploads3" type="file" class="file_upload_d" data-n="3" ></span>
		  <div id="progress" class="progress progress-striped" style="display:none"><div class="bar progress-bar progress-bar-lovepy"></div></div>
      <div id="fileupload_show3"></div>
      <input type="hidden" name="ac_pic3" id="ac_pic3" value="">
      </div>   
	    </td>
	    <td width="25%" align="center">
      <span id="ac_pic4_img"></span>
			
			<div>
			<span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads4" name="file_uploads4" type="file" class="file_upload_d" data-n="4" ></span>
		  <div id="progress" class="progress progress-striped" style="display:none"><div class="bar progress-bar progress-bar-lovepy"></div></div>
      <div id="fileupload_show4"></div>
      <input type="hidden" name="ac_pic4" id="ac_pic4" value="">  
      </div> 
	    </td>
	    <td width="25%" height="100" align="center">
      <span id="ac_pic5_img"></span>
			
			<div>
			<span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads5" name="file_uploads5" type="file" class="file_upload_d" data-n="5" ></span>
		  <div id="progress" class="progress progress-striped" style="display:none"><div class="bar progress-bar progress-bar-lovepy"></div></div>
      <div id="fileupload_show5"></div>
      <input type="hidden" name="ac_pic5" id="ac_pic5" value="">
      </div>
	    </td>
	    -->
                                        </tr>
                                    </table>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <div align="center">
                                        <input type="hidden" id="goresize" name="goresize" value="0">
                                        <input id="submit3" type="submit" value="確定修改" class="btn btn-info" style="width:50%;">
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
    $mtu = "ad_action_list.";
    var $ff = [];
    var $nowffc = 0,
        $uploadc = 1;

    function chk_form() {
        if ($ff.length && $uploadc) {
            $.each($ff, function(i) {
                $(this).submit();
            });
            return false;
        }
        return true;
    }


    $(function() {


        personnel_get("ac_open1", "ac_open2", "A130353266");

        personnel_get("ac_run1", "ac_run2", "A130353266");

        $("#ac_open1").on("change", function() {
            personnel_get("ac_open1", "ac_open2");
        });
        $("#ac_run1").on("change", function() {
            personnel_get("ac_run1", "ac_run2");
        });
        $("#ac_con1").on("change", function() {
            personnel_get_action("ac_con1", "ac_con2");
        });

        $(".file_upload_d").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();
            var $op = $this.data("op"),
                $n = $this.data("n");

            $this.fileupload({
                    url: "ad_action_add.php?st=upload&old_pic=" + $op,
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    autoUpload: false,
                    done: function(e, data) {

                        if (data.result) {

                            switch (data.result) {
                                case "nowidth":
                                    $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                    alert("上傳的照片寬度過小，請上傳大於 500 px 的照片。");
                                    break;
                                case "noext":
                                    $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                    alert("上傳的照片無副檔名請確認後再上傳。");
                                    break;
                                default:
                                    var $ffc = $ff.length;
                                    $("#ac_pic" + $n).val(data.result);
                                    if ($ffc == $nowffc + 1) {
                                        $uploadc = 0;
                                        //console.log("send"+$nowffc);
                                        $("#goresize").val("1");
                                        $("#addform").submit();
                                    }
                                    $nowffc++;
                                    break;
                            }

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
                            console.log($ff);
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });


        var $allkind = {
            "心約會": "戀愛講堂,魅力有約,品味生活,互動美學",
            "趣約會": "輕旅行,主題特別企劃,國外旅遊",
            "饗約會": "主題精緻餐會,美味廚房,健康料理",
            "愛約會": "一對一排約,多平台排約",
            "揪約會": "多對多約會,主題式約會,下午茶約會",
            "戀愛會客室": "與名人有約,一對一個人解析諮詢,一對一整體造型諮詢,一對一愛情諮詢,約後一對一諮詢",
            "好好玩類型": "戶外踏青,午茶約會,主題系列,熟齡專區,小資首選"
        };

        $("#ac_kind").on("change", function() {
            var $os = $("#ac_kind2"),
                $this = $(this);
            $os.find("option").remove();
            $os.append($("<option></option>").attr("value", "").text("請選擇"));
            $.each($allkind, function($key, $item) {
                if ($key == $this.val()) {
                    $.each($item.split(","), function($v1, $v2) {
                        $os.append($("<option></option>").attr("value", $v2).text($v2));
                    });
                }
            });

        });

        $("#ac_branch").on("change", function() {
            var $os = $("#ac_kind"),
                $this = $(this);
            $os.find("option").remove();

            if ($this.val() == "好好玩旅行社") {
                $os.append($("<option></option>").attr("value", "好好玩類型").text("好好玩類型"));
            } else {
                $os.append($("<option></option>").attr("value", "心約會").text("心約會"));
                $os.append($("<option></option>").attr("value", "趣約會").text("趣約會"));
                $os.append($("<option></option>").attr("value", "饗約會").text("饗約會"));
                $os.append($("<option></option>").attr("value", "愛約會").text("愛約會"));
                $os.append($("<option></option>").attr("value", "揪約會").text("揪約會"));
                $os.append($("<option></option>").attr("value", "戀愛會客室").text("戀愛會客室"));
            }
            $("#ac_kind").trigger("change");

            if ($this.val() == "約專") {
                $("#issingleparty_div").show();
            } else {
                $("#issingleparty_div").hide();
            }

        });

        $("#ac_teacher_auton").on("change", function() {
            var $this = $(this),
                $event210725 = $("input[name='event210725']");

            if ($this.val() == "51" ||
                $this.val() == "52" ||
                $this.val() == "53" ||
                $this.val() == "13"
            ) {
                $event210725.prop("checked", true);
            } else {
                $event210725.prop("checked", false);
            }

        });


        $("#ac_branch").val("台北").trigger("change");
        $("#ac_kind").val("趣約會").trigger("change");
        $("#ac_kind2").val("主題特別企劃");


    });
</script>