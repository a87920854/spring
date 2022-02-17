<?php
/*****************************************/
//檔案名稱：ad_action_add2.php
//後台對應位置：管理系統/網站活動上傳>新增(修改)網站活動>裁切照片
//改版日期：2022.2.14
//改版設計人員：Jack
//改版程式人員：Jack
/*****************************************/
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//程式開始 *****
if ($_SESSION["MM_Username"] == "") {
    call_alert("請重新登入。", "login.php", 0);
}
if($_REQUEST["st"] == "resize"){
    if($_REQUEST["a"] == ""){
        call_alert("讀取不到該活動的編號資料。".SqlFilter($_REQUEST["a"],"int"),1,1);   
    }

    $SQL = "select ac_pic2 from action_data where ac_auto = '".SqlFilter($_REQUEST["a"],"int")."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if(!$result){
        call_alert("讀取不到該活動的照片資料。", 1, 1);
    }

    $pn = $result["ac_pic2"];
    if($pn == ""){
        call_alert("讀取不到該活動的照片資料。", 1, 1);
    }

    $pw = SqlFilter($_REQUEST["pw"],"int");
    $ph = SqlFilter($_REQUEST["ph"],"int");

    // 未完待續
}

?>

<link href='css/jquery.jcrop.min.css' rel='stylesheet'>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_action_list.php">網站活動上傳</a></li>
            <li class="active">裁切照片</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>裁切照片</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable" style="font-size:12px;">
                    <tbody>
                        <tr>
                            <td height="25" bgcolor="#C9DCDC">
                                <div align="center">
                                    <font color="#990066" size="3"><strong>
                                            <font color="#000000">裁切照片</font>
                                        </strong></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                                <div id="jcrop_data">lx:0 , ly:0 , rx:0 , ry:0 , w:0 , h:0</div>
                                <div class="jcrop_div" id="jcrop_div"><img id="jcrop_img" src="upload_image/2022217162554_action_949.jpg?t=2737" style="max-width:100%"></div>
                                <form action="ad_action_add2.php?st=resize" method="post" name="form1">
                                    <input type="hidden" id="lx" name="lx">
                                    <input type="hidden" id="ly" name="ly">
                                    <input type="hidden" id="rx" name="rx">
                                    <input type="hidden" id="ry" name="ry">
                                    <input type="hidden" id="w" name="w">
                                    <input type="hidden" id="h" name="h">
                                    <input type="hidden" id="pw" name="pw">
                                    <input type="hidden" id="ph" name="ph">
                                    <input type="hidden" id="a" name="a" value="13172">
                                    <br>

                                    <input type="submit" value="確定裁切" style="height:33px;width:200px">
                            </td>
                            </form>
                        </tr>
                    </tbody>
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

<script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/jquery.jcrop.js"></script>
<script type="text/javascript">
    $("#jcrop_img").imagesLoaded(function() {
        var $nowwidth = $("#jcrop_img").width();
        $options1 = [0, 0, 456, 304];
        $options2 = 456 / 304;
        $options3 = [456, 304];
        $options4 = [900, 600];

        $("#jcrop_img").Jcrop({
            onChange: showCoords,
            onSelect: showCoords,
            setSelect: $options1,
            aspectRatio: $options2,
            minSize: $options3,
            maxSize: $options4,
            minSelect: [0, 0],
            allowSelect: false,
            bgFade: true,
            handleSize: 9,
            keySupport: true,
            cornerHandles: true,
            sideHandles: true
        }, function() {
            $("#pw").val($(".jcrop-holder img").width());
            $("#ph").val($(".jcrop-holder img").height());
        });

    });

    function showCoords(c) {
        //這邊取得的 c 就是座標相關資料，包含:  
        //c.x  --> 左上角的 x  
        //c.y  --> 左上角的 y  
        //c.x2 --> 右下角的 x  
        //c.y2 --> 右下角的 y  
        //c.w  --> 選取範圍的寬度  
        //c.h  --> 選取範圍的高度
        $("#lx").val(parseInt(c.x));
        $("#ly").val(parseInt(c.y));
        $("#rx").val(parseInt(c.x2));
        $("#ry").val(parseInt(c.y2));
        $("#w").val(parseInt(c.w));
        $("#h").val(parseInt(c.h));
        $("#pw").val($(".jcrop-holder img").width());
        $("#ph").val($(".jcrop-holder img").height());
        //$("#jcrop_data").html("lx:"+parseInt(c.x)+" , ly:"+parseInt(c.y)+" , rx:"+parseInt(c.x2)+" , ry:"+parseInt(c.y2)+" , w:"+parseInt(c.w)+" , h:"+parseInt(c.h)+" , pw:"+parseInt(c.pw)+" , ph:"+parseInt(c.ph));
    };
</script>