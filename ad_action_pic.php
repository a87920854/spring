<?php
/*****************************************/
//檔案名稱：ad_action_pic.php
//後台對應位置：管理系統/網站活動上傳>活動花絮
//改版日期：2022.2.23
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
if($_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "single"){
    call_alert("您沒有查看此頁的權限。", "login.php", 0);
}
if($_REQUEST["ac_auto"] == ""){
    call_alert("活動編號有錯誤。",1,1);
}

// 刪除圖片
if($_REQUEST["st"] == "del"){
    $ac_photo_auto = SqlFilter($_REQUEST["ac_photo_auto"],"tab");
    $ac_photo_auto = str_replace(" ","",$ac_photo_auto);
    $SQL = "SELECT * FROM action_photo where ac_photo_auto in(".$ac_photo_auto.")";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    if($result){
        foreach($result as $rs){
            DelFile("upload_image/".$re["ac_photo_name"]);
        }
    }

    $SQL = "SELECT top 1 ac_photo_name FROM action_photo where ac_auto = ".SqlFilter($_REQUEST["ac_auto"],"int")."";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $new_acpic = "";
    }else{
        $new_acpic = "a";
    }

    $SQL = "update action_data set ac_pic = '".$new_acpic."' where ac_auto = ".SqlFilter($_REQUEST["ac_auto"],"int")."";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    reURL("reload_window.php?m=照片刪除中...");
}

// 總數量
$sqls2 = "SELECT count(ac_photo_auto) as total_size FROM action_photo Where ac_auto = ".SqlFilter($_REQUEST["ac_auto"],"int")."";
$sqls2 = $sqls2 . $sqlss;
$rs = $SPConn->prepare($sqls2);
$rs->execute();
$result = $rs->fetch(PDO::FETCH_ASSOC);
if(!$result || $result["total_size"] == 0){
    $total_size = 0;
}else{
    $total_siz = $result["total_size"];
}

$tPage = 1; //目前頁數
$tPageSize = 20; //每頁幾筆
if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
if ( $tPageSize*$tPage < $total_size ){
    $page2 = 20;
}else{
    $page2 = (20-(($tPageSize*$tPage)-$total_size));
}

// SQL
$sqls = "SELECT * FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM action_photo Where ac_auto = ".SqlFilter($_REQUEST["ac_auto"],"int"); 
$sqls = $sqls . $sqlss . " order by ac_photo_auto desc ) t1 order by ac_photo_auto ) t2 order by ac_photo_auto desc";

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_action_list.php">網站活動上傳</a></li>
            <li class="active">活動花絮</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動花絮 - 數量：<?php echo $total_siz; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th colspan="9"><input type="checkbox" id="delnums"> <input id="delbutton" type="button" style="height:28px;" value="多選刪除">　<input type="button" onclick="Mars_popup('ad_action_pic_add.php?ac_auto=13415','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=500,height=300,top=150,left=150');" style="height:28px;" value="新增照片"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $rs = $SPConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if($result){                                
                                $line = 0;
                                for($i=1;$i<=count($result);$i++){                                    
                                    $imgurl = "upload_image/" . $result[$i-1]["ac_photo_name"];
                                    if($line == 0){
                                        echo "<tr>"; 
                                    }
                                    echo "<td><input data-no-uniform='true' type='checkbox' name='nums' value='".$result[$i-1]["ac_photo_auto"]."'>".$result[$i-1]["ac_photo_auto"]."<br><a href='".$imgurl."' class='fancybox'><img src='".$imgurl."' width=200  border=0></a></td>"; 
                                    if($line == 3){                                        
                                        echo "</tr>"; 
                                        $line = 0;
                                    }else{
                                        $line = $line + 1;
                                    }
                                }
                            }else{
                                echo "<tr><td colspan=8 height=200>目前沒有資料</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- 頁碼 -->
            <?php require_once("./include/_page.php"); ?>
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
    $mtu = "ad_action_list.";
    $(function() {

        $("#delnums").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", false);
                });
        });
        $("#delbutton").on("click", function() {
            var $dellist = [];
            $("input[name='nums']").each(function() {
                if ($(this).val() && $(this).prop("checked")) $dellist.push($(this).val());
            });
            if ($dellist.length <= 0) alert("請選擇要刪除的照片。");
            else Mars_popup('ad_action_pic.php?st=del&ac_auto=13415&ac_photo_auto=' + $dellist, '', 'status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=400,height=200,top=150,left=150');
        });
    });
</script>