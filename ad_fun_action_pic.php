<?php

    /*****************************************/
    //檔案名稱：ad_fun_action_pic.php
    //後台對應位置：好好玩管理系統/好好玩國內團控/活動花絮
    //改版日期：2021.12.2
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}   
    if($_REQUEST["ac_auto"] == ""){ call_alert("活動編號有錯誤。",1,1);}

    $ac_auto = SqlFilter($_REQUEST["ac_auto"],"int");

    // 刪除照片
    if($_REQUEST["st"] == "del"){
        $ac_photo_auto = str_replace(" ","",$_REQUEST["ac_photo_auto"]);
        $SQL = "SELECT * FROM action_photo where ac_photo_auto in(" .$ac_photo_auto . ")";
        $rs = $FunConn->query($SQL);
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            var_dump($result);
            $SQL = "DELETE FROM action_photo where ac_photo_auto in(" .$ac_photo_auto . ")";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
            if($rs){
                DelFile("webfile\\funtour\\upload_image\\".$result["ac_photo_name"]);
                reURL("reload_window.php?m=照片刪除中...");
                exit();
            }            
        }
    }

    $sqls = "SELECT * FROM action_photo Where ac_auto = ".$ac_auto;
    $sqls2 = "SELECT count(ac_photo_auto) as total_size FROM action_photo Where ac_auto = ".$ac_auto;

    $sqls = $sqls . $sqlss . " order by ac_photo_auto desc";
    $sqls2 = $sqls2 . $sqlss;

    $rs = $FunConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $total_size = $result["total_size"];
    }else{
        $total_size = 0;
    }


?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action_list1.php">好好玩國內團控</a></li>
            <li class="active">活動花絮</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動花絮 - 數量：<?php echo $total_size; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th colspan="9"><input type="checkbox" id="delnums"> <input id="delbutton" type="button" style="height:28px;" value="多選刪除">　<input type="button" onclick="Mars_popup('ad_fun_action_pic_add.php?ac_auto=<?php echo $ac_auto; ?>','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=500,height=300,top=150,left=150');" style="height:28px;" value="新增照片"></th>
                        </tr>
                        <?php 
                            $rs = $FunConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if($result){                                
                                $line = 0;
                                for($i=1;$i<=count($result);$i++){
                                    // $imgurl = "webfile/funtour/upload_image/" . $result[$i-1]["ac_photo_name"];
                                    $imgurl = "Upload/" . $result[$i-1]["ac_photo_name"];
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
    $mtu = "ad_fun_action_list1.";
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
            else Mars_popup('ad_fun_action_pic.php?st=del&ac_auto=<?php echo $ac_auto; ?>&ac_photo_auto=' + $dellist, '', 'status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=400,height=200,top=150,left=150');
        });
    });
</script>