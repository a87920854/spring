<?php

/*****************************************/
//檔案名稱：ad_fun_action_list2_set_ajax.php
//後台對應位置：好好玩管理系統/好好玩國外團控/行程頁設計 > 新增(修改)行程內容
//改版日期：2022.2.25
//改版設計人員：Jack
//改版程式人員：Jack
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");

// ajax
if($_REQUEST["st"] == "showtopdiv" || $_REQUEST["st"] == "showtopdiv2" || $_REQUEST["st"] == "reload_day_upload"){
    switch($_REQUEST["st"]){
        case "showtopdiv":
            $dd = "top";
            break;
        case "showtopdiv2":
            $dd = "top_text";
            break;
        default:
            $dd = SqlFilter($_REQUEST["types"],"tab");
    }

    $SQL = "select * from travel_photo where ac_auto=".SqlFilter($_REQUEST["id"],"int")." and types='".$dd."'";
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    if($result){
        foreach($result as $re){
            if($_REQUEST["st"] == "reload_day_upload"){
                $sts = $dd;
            }else{
                $sts = SqlFilter($_REQUEST["st"],"tab");
            }
            echo "<div style='float:left' align=center><img src='funtour_image/travel/".$re["photo_name"]."' border=0 width=130 height=80><br><a href=\"javascript:delpic_j('".$re["auton"]."', '".$sts."')\">刪</a></div>";
        }        
    }
    exit();
}

// 刪除圖片(待測)
if($_REQUEST["st"] == "delpic"){
    $SQL = "select * from travel_photo where auton=".SqlFilter($_REQUEST["an"],"int")."";
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        DelFile("funtour_image/travel/".$result["photo_name"]);
        $SQL = "DELETE FROM travel_photo where auton=".SqlFilter($_REQUEST["an"],"int")."";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }
    exit();
}

// 上傳圖片(待測)
if($_REQUEST["st"] == "upload"){
    $ac_auto = SqlFilter($_REQUEST["id"],"int");
    $tt = SqlFilter($_REQUEST["t"],"tab");

    if ($_FILES['fileupload']['error'] === UPLOAD_ERR_OK){
        $urlpath = "funtour_image/travel"; 
        $ext = pathinfo($_FILES["fileupload"]["name"][$i], PATHINFO_EXTENSION); //附檔名      
        $fileName = date("Y").date("n").date("j").date("H").date("i").date("s")."_".$ac_auto."_".rand(1,999).".".$ext; //檔名
        move_uploaded_file($_FILES["fileupload"]["tmp_name"][$i],($urlpath.$fileName)); //儲存檔案
    }else {
        echo '錯誤代碼：' . $_FILES['fileupload']['error'] . '<br/>';
    }

    switch($tt){
        case "top":
            $types = "top";
            $msize = "350";
            break;
        case "top_text":
            $types = "top_text";
            $msize = "580";
            break;
        default:
            if($tt != ""){
                $types = $tt;
                $msize = "200";
            }else{
                $types = "err";
                $msize = "130";
            }
    }
    // 更新圖片尺寸
    ResizeFile($urlpath, $fileName, $msize, $fileName);

    $SQL = "INSERT INTO travel_photo (ac_auto,photo_name,times,types) VALUES ('".$ac_auto."', '" .$fileName."', GetDate(), '".$types."')";
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    exit();
}

// 刪除data
if($_REQUEST["st"] == "del_date"){
    $SQL = "delete from travel_date where auton=".SqlFilter($_REQUEST["a"],"int")."";
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    exit();
}

// 上傳(修改)文字內容
if($_REQUEST["st"] == "uptextarea"){
    $SQL = "select top 1 * from travel_data where ac_auto=".SqlFilter($_REQUEST["id"],"int")."";
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if(!$result){
        $SQL = "INSERT INTO travel_data (ac_auto,times,".SqlFilter($_REQUEST["ss"],"tab").") VALUES ('".SqlFilter($_REQUEST["id"],"int")."','".date("Y/m/d H:i:s")."','".SqlFilter($_REQUEST["vv"],"tab")."')";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }else{
        $SQL = "UPDATE travel_data SET ".SqlFilter($_REQUEST["ss"],"tab")."='".SqlFilter($_REQUEST["vv"],"tab")."' WHERE ac_auto=".SqlFilter($_REQUEST["id"],"int")."";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }
    reURL("ad_fun_action_list2_set.php?ac=".SqlFilter($_REQUEST["id"],"int"));
    exit();
}

// 上傳(修改)文字
if($_REQUEST["st"] == "uptext"){
    $SQL = "select top 1 * from travel_data where ac_auto=".SqlFilter($_REQUEST["id"],"int")."";
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if(!$result){
        $SQL = "INSERT INTO travel_data (ac_auto,times,".SqlFilter($_REQUEST["ss"],"tab").") VALUES ('".SqlFilter($_REQUEST["id"],"int")."','".date("Y/m/d H:i:s")."','".SqlFilter($_REQUEST["vv"],"tab")."')";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }else{
        $SQL = "UPDATE travel_data SET ".SqlFilter($_REQUEST["ss"],"tab")."='".SqlFilter($_REQUEST["vv"],"tab")."' WHERE ac_auto=".SqlFilter($_REQUEST["id"],"int")."";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }
    reURL("ad_fun_action_list2_set.php?ac=".SqlFilter($_REQUEST["id"],"int"));
    exit();
}

// 更新出團資訊及報名活動的上下線
if($_REQUEST["st"] == "t8set"){
    $auton = SqlFilter($_REQUEST["auton"],"tab");
    $SQL = "update travel_date set keep=".SqlFilter($_REQUEST["v"],"tab")." where auton=".$auton."";
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    exit();
}

// 更新(新增)出團資訊及報名
if($_REQUEST["st"] == "updates"){
    $auton = $_REQUEST["auton"]; // 陣列物件
    for($i=1;$i<=8;$i++){
        // 陣列物件
        ${"t".$i} = $_REQUEST["t".$i];
    }

    if($auton != ""){
        if(count($auton) > 0){
            // 如果出團資訊及報名有多行
            for($i=0;$i<count($auton);$i++){
                $SQL = "select * from travel_date where auton=".trim($auton[$i])."";
                $rs = $FunConn->prepare($SQL);
                $rs->execute();
                $result = $rs->fetch(PDO::FETCH_ASSOC);
                if(!$result){
                    // 插入第二行以後的資料
                    if(strlen($t1[$i]) > 0){
                        if(trim($t6[$i]) == "1"){
                            $can = 1;
                        }elseif(trim($t6[$i]) == "2"){
                            $can = 2;
                        }else{
                            $can = 0;
                        }
                        $SQL = "INSERT INTO travel_date (ac_auto,dates,tname,day,money,b2b_money,notes,can) VALUES ('".SqlFilter($_REQUEST["id"],"int")."','".trim($t1[$i])."','".trim($t2[$i])."','".trim($t3[$i])."','".trim($t4[$i])."','".trim($t7[$i])."','".trim($t5[$i])."','".$can."')";
                        $rs = $FunConn->prepare($SQL);
                        $rs->execute();

                        if($_REQUEST["id"] != ""){
                            $SQL = "update travel_fast set notes='".trim($t5[$i])."' where ac_auto='".SqlFilter($_REQUEST["id"],"int")."' and datediff(d, dates, '".trim($t1[$i])."') = 0";
                            $rs = $FunConn->prepare($SQL);
                            $rs->execute();
                        }
                    }
                }else{
                    // 更新第一行的資料
                    if(strlen($t1[$i]) > 0){
                        if(trim($t6[$i]) == "1"){
                            $can = 1;
                        }elseif(trim($t6[$i]) == "2"){
                            $can = 2;
                        }else{
                            $can = 0;
                        }
                        $SQL = "UPDATE travel_date SET ac_auto='".SqlFilter($_REQUEST["id"],"int")."', dates='".trim($t1[$i])."', tname='".trim($t2[$i])."', day='".trim($t3[$i])."', money='".trim($t4[$i])."', b2b_money='".trim($t7[$i])."', notes='".trim($t5[$i])."', can='".$can."' WHERE auton=".trim($auton[$i])."";
                        $rs = $FunConn->prepare($SQL);
                        $rs->execute();

                        if($_REQUEST["id"] != ""){
                            $SQL = "update travel_fast set notes='".trim($t5[$i])."' where ac_auto='".SqlFilter($_REQUEST["id"],"int")."' and datediff(d, dates, '".trim($t1[$i])."') = 0";
                            $rs = $FunConn->prepare($SQL);
                            $rs->execute();
                        }
                    }
                }
            }
        }else{
            // 如果出團資訊及報名只有一行
            $SQL = "select top 1 * from travel_date where auton=".$auton[0]."";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                // 更新資料
                if(strlen($t1[0]) > 0){
                    if(trim($t6[0]) == "1"){
                        $can = 1;
                    }elseif(trim($t6[0]) == "2"){
                        $can = 2;
                    }else{
                        $can = 0;
                    }
                    $SQL = "UPDATE travel_date SET ac_auto='".SqlFilter($_REQUEST["id"],"int")."', dates='".trim($t1[0])."', tname='".trim($t2[0])."', day='".trim($t3[0])."', money='".trim($t4[0])."', b2b_money='".trim($t7[0])."', notes='".trim($t5[0])."', can='".$can."' WHERE auton=".trim($auton[0])."";
                    $rs = $FunConn->prepare($SQL);
                    $rs->execute();

                    if($_REQUEST["id"] != ""){
                        $SQL = "update travel_fast set notes='".trim($t5[0])."' where ac_auto='".SqlFilter($_REQUEST["id"],"int")."' and datediff(d, dates, '".trim($t1[0])."') = 0";
                        $rs = $FunConn->prepare($SQL);
                        $rs->execute();
                    }
                }
            }else{
                // 插入資料
                if(strlen($t1[0]) > 0){
                    if(trim($t6[0]) == "1"){
                        $can = 1;
                    }elseif(trim($t6[0]) == "2"){
                        $can = 2;
                    }else{
                        $can = 0;
                    }
                    $SQL = "INSERT INTO travel_date (ac_auto,dates,tname,day,money,b2b_money,notes,can) VALUES ('".SqlFilter($_REQUEST["id"],"int")."','".trim($t1[0])."','".trim($t2[0])."','".trim($t3[0])."','".trim($t4[0])."','".trim($t7[0])."','".trim($t5[0])."','".$can."')";
                    $rs = $FunConn->prepare($SQL);
                    $rs->execute();

                    if($_REQUEST["id"] != ""){
                        $SQL = "update travel_fast set notes='".trim($t5[0])."' where ac_auto='".SqlFilter($_REQUEST["id"],"int")."' and datediff(d, dates, '".trim($t1[0])."') = 0";
                        $rs = $FunConn->prepare($SQL);
                        $rs->execute();
                    }

                }                
            }
        }
    }else{
        // 如果空白則插入資料
        if(strlen($t1[0]) > 0){
            if(trim($t6[0]) == "1"){
                $can = 1;
            }elseif(trim($t6[0]) == "2"){
                $can = 2;
            }else{
                $can = 0;
            }
            $SQL = "INSERT INTO travel_date (ac_auto,dates,tname,day,money,b2b_money,notes,can) VALUES ('".SqlFilter($_REQUEST["id"],"int")."','".trim($t1[0])."','".trim($t2[0])."','".trim($t3[0])."','".trim($t4[0])."','".trim($t7[0])."','".trim($t5[0])."','".$can."')";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();

            if($_REQUEST["id"] != ""){
                $SQL = "update travel_fast set notes='".trim($t5[0])."' where ac_auto='".SqlFilter($_REQUEST["id"],"int")."' and datediff(d, dates, '".trim($t1[0])."') = 0";
                $rs = $FunConn->prepare($SQL);
                $rs->execute();
            }
        }  
    }
    reURL("ad_fun_action_list2_set.php?ac=".SqlFilter($_REQUEST["id"],"int"));
    exit();
}

// 更新(新增)參考航班
if($_REQUEST["st"] == "upfull"){
    $SQL = "select * from travel_data where ac_auto=".SqlFilter($_REQUEST["id"],"int")."";
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $t12 = implode(",",array_map("trim",$_REQUEST["t12"]));
        $t13 = implode(",",array_map("trim",$_REQUEST["t13"]));
        $t14 = implode(",",array_map("trim",$_REQUEST["t14"]));
        $t15 = implode(",",array_map("trim",$_REQUEST["t15"]));
        $t16 = implode(",",array_map("trim",$_REQUEST["t16"]));
        $SQL = "UPDATE travel_data SET t12='".$t12."', t13='".$t13."', t14='".$t14."', t15='".$t15."', t16='".$t16."' where ac_auto=".SqlFilter($_REQUEST["id"],"int")."";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }
    reURL("ad_fun_action_list2_set.php?ac=".SqlFilter($_REQUEST["id"],"int"));
    exit();
}

// 新增行程內容
if($_REQUEST["st"] == "dayadd"){
    if($_REQUEST["an"] != ""){
        $SQL = "select * from travel_text where ac_auto='".SqlFilter($_REQUEST["id"],"int")."' and auton=".SqlFilter($_REQUEST["an"],"int")."";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $typen = $result["typen"];
            $day_title1 = $result["day_title1"];
            $day_title2 = $result["day_title2"];
            $day_title3 = $result["day_title3"];
            $day_note = $result["day_note"];  	
        }
    }
    if(!is_numeric($typen) && !is_null($typen)){
        $typen = 1;
    } ?>

    <html>

    <head>

        <link href="assets/plugins/bootstrap/css/bootstrap.min.css?v=1.5" rel="stylesheet" type="text/css" />
        <!-- THEME CSS -->
        <link href="assets/css/essentials.css?v=2.1" rel="stylesheet" type="text/css" />
        <link href="assets/css/layout.css?v=4.4" rel="stylesheet" type="text/css" />
        <link href="assets/css/color_scheme/green.css?v=1.8" rel="stylesheet" type="text/css" id="color_scheme" />
        <STYLE TYPE="text/css">
            table {
                font-size: 13px;
            }

            table td {
                height: 30px;
            }

            table select {
                height: 30px;
                border: #ddd 1px solid;
                padding-left: 5px;
            }

            table input {
                height: 30px;
                color: #555;
                border: #ddd 1px solid;
                padding-left: 5px;
            }

            .ttable td {
                padding: 3px;
                padding-left: 5px;
            }

            .btn {
                text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.4);
                height: 33px;
                color: #333;
                background-color: #fff;
                border: #666 1px solid !important;
                display: inline-block;
                padding: 6px 12px !important;
                ;
                margin-bottom: 0;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                -ms-touch-action: manipulation;
                touch-action: manipulation;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background-image: none;
                border: 1px solid transparent;
                border-radius: 4px;
            }

            .btn:hover {
                color: #000;
                background-color: #ddd;
            }
        </STYLE>
    </head>

    <body>
        <div id="content" class="padding-20">
            <form id="mform" name="mform" method="post" action="?st=dayadd_save" onsubmit="return chk_form()">
                <table width="100%" border="1" cellspacing="0" cellpadding="0" align="center" class="ttable" style="border-collapse:collapse;text-align:left">
                    <tr>
                        <td height=30>第
                            <select id="typen" name="typen">
                                <option value="">請選擇</option>
                                <?php 
                                    for($i=1;$i<30;$i++){
                                        if($i == round($typen)){
                                            $cc = " selected";
                                        }else{
                                            $cc = "";
                                        }
                                        echo "<option value='".$i."'".$cc.">".$i."</option>";
                                    }
                                ?>
                            </select>天
                        </td>
                    </tr>
                    <tr>
                        <td height=30>地點：<input id="day_title1" name="day_title1" type="text" value="<?php echo $day_title1; ?>">　　住宿：<input id="day_title2" name="day_title2" type="text" value="<?php echo $day_title2; ?>"></td>
                    </tr>
                    <tr>
                        <td height=30>餐點：<input id="day_title3" name="day_title3" type="text" value="<?php echo $day_title3; ?>"></td>
                    </tr>
                    <tr>
                        <td height=30><textarea id="day_note" name="day_note" style="width:100%;height:350px;" required><?php echo $day_note; ?></textarea></td>
                    </tr>

                </table>
                <input type="hidden" name="an" value="<?php echo SqlFilter($_REQUEST["an"],"int"); ?>">
                <input type="hidden" name="id" value="<?php echo SqlFilter($_REQUEST["id"],"int"); ?>">
                <br>
                <center><input type="submit" class="btn btn-info" value="送出"></center>
            </form>
        </div>
        <script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
        <script type="text/javascript" src="js/util.js?v=2.2"></script>
        <script type="text/javascript" src="assets/plugins/ueditor_funtour_travel/ueditor.config.js?v=1.1"></script>
        <script type="text/javascript" src="assets/plugins/ueditor_funtour_travel/ueditor.all.min.js?v=2.0"></script>
        <script type="text/javascript">
            $(function() {

                window.resizeTo(850, 700);

                var ue = UE.getEditor("day_note", {

                    toolbars: [
                        [
                            'bold', //加粗     
                            'italic', //斜体
                            'underline', //下划线
                            'strikethrough', //删除线
                            'subscript', //下标
                            'fontborder', //字符边框
                            'superscript', //上标
                            'formatmatch', //格式刷        
                            'justifyleft', //居左对齐
                            'justifyright', //居右对齐
                            'justifycenter', //居中对齐
                            'justifyjustify', //两端对齐
                            'forecolor', //字体颜色
                            'backcolor', //背景色
                            'fontfamily', //字体        
                            'fontsize', //字号
                            'lineheight', //行间距
                            'paragraph', //段落格式
                            '|',
                            'undo', //撤销
                            'redo', //重做
                            'source', //源代码
                            '|',
                            'removeformat', //清除格式
                        ],
                        [

                            'horizontal', //分隔线
                            '|',
                            'date', //日期
                            'time', //时间
                            'link', //超链接        
                            '|',

                            'insertparagraphbeforetable', //"表格前插入行"
                            'inserttable', //插入表格
                            'insertrow', //前插入行
                            'insertcol', //前插入列
                            'mergeright', //右合并单元格
                            'mergedown', //下合并单元格
                            'deleterow', //删除行
                            'deletecol', //删除列
                            'splittorows', //拆分成行
                            'splittocols', //拆分成列
                            'splittocells', //完全拆分单元格
                            'deletecaption', //删除表格标题        
                            'inserttitle', //插入标题
                            'mergecells', //合并多个单元格
                            'deletetable', //删除表格
                            '|',




                            'simpleupload', //单图上传
                            'insertimage', //多图上传
                            '|',
                            'spechars', //特殊字符
                            'searchreplace', //查询替换                        
                            'insertorderedlist', //有序列表
                            'insertunorderedlist', //无序列表        
                            'scrawl', //涂鸦
                            '|',
                            'selectall', //全选
                            'print', //打印
                            'preview', //预览
                            'cleardoc', //清空文档    
                        ]

                    ]


                });
            });

            function chk_form() {
                var $clist = {
                        "typen": "第幾天",
                        "day_title1": "地點",
                        "day_title2": "住宿",
                        "day_title3": "餐點"
                    },
                    $rr = 0;
                $.each($clist, function(n, v) {
                    if (!$("#" + n).val()) {
                        alert("請輸入或選擇" + v);
                        $("#" + n).focus();
                        $rr = 1;
                        return false;
                    }
                });
                if ($rr) return false;
                else return true;
            }
        </script>
    </body>

    </html>

<?php }
    // 儲存行程內容
    if($_REQUEST["st"] == "dayadd_save"){
        if($_REQUEST["an"] != "" && is_numeric($_REQUEST["an"])){
            $SQLS = "where ac_auto='".SqlFilter($_REQUEST["id"],"int")."' and auton='".SqlFilter($_REQUEST["an"],"int")."'";
            $SQL = "select * from travel_text ".$SQLS;
        }else{
            $SQLS = "where ac_auto='".SqlFilter($_REQUEST["id"],"int")."' and typen='".SqlFilter($_REQUEST["typen"],"int")."'";
            $SQL = "select * from travel_text ";
        }
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            $day_note = str_replace("<!DOCTYPE html><html><head></head><body>", "",$_REQUEST["day_note"]);
            $day_note = str_replace("</body></html>", "",$day_note);
            $SQL = "INSERT INTO travel_text (ac_auto, day_title1, day_title2, day_title3, day_note, typen) VALUES ('".SqlFilter($_REQUEST["id"],"int")."','".SqlFilter($_REQUEST["day_title1"],"tab")."','".SqlFilter($_REQUEST["day_title2"],"tab")."','".SqlFilter($_REQUEST["day_title3"],"tab")."','".$day_note."','".SqlFilter($_REQUEST["typen"],"tab")."')";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
        }else{
            if($_REQUEST["an"] != ""){
                $ttt = ", typen='".SqlFilter($_REQUEST["typen"],"tab")."'";
            }
            $day_note = str_replace("<!DOCTYPE html><html><head></head><body>", "",$_REQUEST["day_note"]);
            $day_note = str_replace("</body></html>", "",$day_note);
            $SQL = "UPDATE travel_text SET ac_auto='".SqlFilter($_REQUEST["id"],"int")."', day_title1='".SqlFilter($_REQUEST["day_title1"],"tab")."', day_title2='".SqlFilter($_REQUEST["day_title2"],"tab")."', day_title3='".SqlFilter($_REQUEST["day_title3"],"tab")."', day_note='".$day_note."'".$ttt." ".$SQLS;
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
        }
        reURL("win_close.php");
        exit();
    }

    // 刪除行程
    if($_REQUEST["st"] == "daydel" && $_REQUEST["an"] != "" && is_numeric($_REQUEST["an"])){
        $SQL = "delete from travel_text where ac_auto='".SqlFilter($_REQUEST["id"],"int")."' and auton='".SqlFilter($_REQUEST["an"],"int")."'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        reURL("win_close.asp?m=行程刪除中");
        exit();
    }
?>