<?php
/****************************************/
//檔案名稱：ad_bday_set.php
//後台對應位置：春天網站功能 > 生日簡訊(內容)
//改版日期：2022.1.18
//改版設計人員：Jack
//改版程式人員：Queena
/****************************************/
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$note = strip_tags(str_replace("\r\n","<br>",SqlFilter($_REQUEST["notes"],"tab")));

if ( $st == "send" ){
    $SQL = "Select * From text_data Where items='birthday'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    if ( count($result) > 0 ){  
        //更新
        $SQL_u = "Update text_data Set notes='".$note."' Where items='birthday'";
        $rs_u = $SPConn->prepare($SQL_u);
        $rs_u->execute();
    }
    reURL("ad_bday_set.php");
    exit;
}
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">生日簡訊內容</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>生日簡訊內容</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                    <input type="button" class="btn btn-info btn-active" value="簡訊內容" style="color:black;" disabled>&nbsp&nbsp
                    <input type="button" class="btn btn-warning" value="發送紀錄" onclick="location.href='ad_bday_set_send.php'">
                </p>
                <p>每日早上 10:00 發送生日簡訊給會員</p>
                <form name="form1" method="post" action="?st=send">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <?php
                        $SQL = "Select * From text_data Where items='birthday'";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                        foreach($result as $re);
                        if ( count($result) > 0 ){                        
                            $notes = $re["notes"];
                        }
                        ?>
                        <textarea name="notes" id="notes" style="width:60%;height:200px;"><?php echo $notes;?></textarea>
                        <!--<p>$NAME代表會員名字</p>-->
                        <p>
                            <input type="submit" class="btn btn-primary" style="width:50%;" value="修改">
                        </p>
                    </table>
                </form>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->

<?php require_once("./include/_bottom.php");?>

<script type="text/javascript">
    function chk_form() {
        if(!$("#notes").val()) {
            alert("請輸入簡訊內容。");
            $("#notes").focus();
            return false;
        }	
        return true;
    }
</script>