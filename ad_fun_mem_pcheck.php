<?php
    /*****************************************/
	//檔案名稱：ad_fun_mem_pcheck.php
	//後台對應位置：好好玩管理系統/好好玩證件審核
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
            <li class="active">好好玩證件審核</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩證件審核</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                    <tbody>
                        <?php
                            $SQL = "select * from member_data where (p1 <> '' and p1e IS NULL) or (p2 <> '' and p2e IS NULL) or (p3 <> '' and p3e IS NULL)";
                            $rs = $FunConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td>暫無需審核之證件</td></tr>";
                            }else{ 
                                foreach($result as $re){?>
                                    <tr>
                                        <td><?php echo $re["mem_num"]; ?></td><td><?php echo $re["mem_name"]; ?></td>
                                        <td><a href="ad_fun_mem_detail.php?mem_num=<?php echo $re["mem_num"]; ?>">進入審核</a></td>
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