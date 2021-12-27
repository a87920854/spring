<?php
    /*****************************************/ 
    //檔案名稱：funweb_fun8.php
    //後台對應位置：好好玩網站管理系統/媒體報導
    //改版日期：2021.12.27
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar_fun.php");

    //程式開始 *****
	if($_SESSION["MM_Username"] == "" ){ 
        call_alert("請重新登入。","login.php",0);
    }
    if($_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["funtourpm"] != "1"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    // 上移
    if($_REQUEST["st"] == "up_line"){
        $nowline = round(SqlFilter($_REQUEST["ad"],"int"));
        $upline = $nowline+1;
        $SQL = "update tv_data set t_desc=".$nowline." where t_desc=".$upline;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $SQL = "update tv_data set t_desc=".$upline." where t_auto=".SqlFilter($_REQUEST["t_auto"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }

    // 下移
    if($_REQUEST["st"] == "down_line"){
        $nowline = round(SqlFilter($_REQUEST["ad"],"int"));
        $upline = $nowline-1;
        $SQL = "update tv_data set t_desc=".$nowline." where t_desc=".$upline;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $SQL = "update tv_data set t_desc=".$upline." where t_auto=".SqlFilter($_REQUEST["t_auto"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }

    if($_REQUEST["st"] == "sa"){
        $SQL = "update tv_data set index_show=".SqlFilter($_REQUEST["v"],"tab")." where t_auto=".SqlFilter($_REQUEST["t"],"tab");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }

    // 刪除
    if($_REQUEST["st"] == "del"){
        $SQL = "select t_pic from tv_data where t_auto=".SqlFilter($_REQUEST["id"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            DelFile(("webfile\\funtour\\upload_image\\".$result["t_pic"]));
        }
        $SQL = "delete from tv_data where t_auto=".SqlFilter($_REQUEST["id"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=刪除中.....");
        }
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li>好好玩國內網站系統</li>
            <li class="active">媒體報導</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>媒體報導</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="新增媒體報導" onclick="location.href='funweb_fun8_add.php?act=ad'"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>

                            <th>標題</th>
                            <th width="160">圖檔</th>
                            <th>操作</th>
                        </tr>
                        <?php
                            $SQL = "SELECT * FROM tv_data order by t_desc desc";
                            $rs = $FunConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=4>目前無資料</td></tr>";
                            }else{
                                $ii = 0;
                                foreach($result as $re){
                                    if($ii == 0){
                                        $uahref = "#nu\" onclick=\"alert('無法向上');\"";
                                    }else{
                                        $uahref = "?st=up_line&ad=".$re["t_desc"]."&t_auto=".$re["t_auto"];
                                    }                                    
                                    if($ii == count($result)-1){
                                        $dahref = "#nu\" onclick=\"alert('無法向下');\"";
                                    }else{
                                        $dahref = "?st=down_line&ad=".$re["t_desc"]."&t_auto=".$re["t_auto"];
                                    }
                                    ?>
                                        <tr>
                                            <td><a href="<?php echo $uahref; ?>"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="<?php echo $dahref; ?>"><span class="fa fa-arrow-down"></span></a></td>
                                            
                                            <td><?php echo $re["t_title"]; ?></td>
                                            <td>
                                                <?php 
                                                    if($re["t_type"] == 1){ ?>
                                                        <a href="http://www.youtube.com/watch?v=<?php echo $re["t_note"]; ?>" target="_blank">點我查看(外部連結)</a>
                                                    <?php }elseif($re["t_pic"] != ""){ ?>
                                                        <a href="webfile/funtour/upload_image/<?php echo $re["t_pic"]; ?>" class='fancybox'>點我查看</a>
                                                    <?php }
                                                ?>                                                
                                            </td>     
                                            <td>
                                                <a href="funweb_fun8_add.php?act=up&id=<?php echo $re["t_auto"]; ?>">編輯</a>					
                                                <a href="javascript:Mars_popup2('funweb_fun8.php?st=del&id=<?php echo $re["t_auto"]; ?>','','width=300,height=200,top=100,left=100')">刪除</a>						
                                            </td>
                                        </tr>
                                    <?php
                                        $ii = $ii+1;
                                }                                
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
require_once("./include/_bottom.php")
?>

<script language="JavaScript">
    $(function() {

        $(".show_check").on("click", function() {
            var $this = $(this),
                $num = $this.attr("id"),
                $savediv = $("<div>儲存中</div>");
            $this.parent().append($savediv);
            if ($this.prop("checked")) $v = 1;
            else $v = 0;
            $.ajax({
                url: "funweb_fun8.php",
                data: {
                    st: "sa",
                    t: $num,
                    v: $v
                },
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });
    });
</script>