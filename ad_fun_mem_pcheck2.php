<?php
    /*****************************************/
	//檔案名稱：ad_fun_mem_pcheck2.php
	//後台對應位置：好好玩管理系統/好好玩生活照審核
	//改版日期：2021.11.11
	//改版設計人員：Jack
	//改版程式人員：Jack
	/*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">好好玩生活照審核</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩生活照審核</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                    <tbody>
                        <?php
                            $SQL = "select * from member_data where (mem_photo <> '' and mem_photoe IS NULL)";
                            $rs = $FunConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td>暫無需審核之生活照</td></tr>";
                            }else{ 
                                foreach($result as $re){?>
                                    <tr>
                                        <td><?php echo $re["mem_num"]; ?></td><td><?php echo $re["mem_name"]; ?></td>
                                        <td><?php echo changeDate($re["mem_photot"]); ?></td>
                                        <td><a href="ad_fun_mem_detail.php?mem_num=<?php echo $re["mem_num"]; ?>" target="_blank">進入審核</a></td>
                                    </tr>                                    
                                <?php }
                            }
                        ?>
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

