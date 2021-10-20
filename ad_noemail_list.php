<?php
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">不願收到廣告信</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>不願收到廣告信</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                不願收到廣告信　<a href="ad_noemail_list.php?st=cut">自行輸入不願收到</a><br><br>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>

                        <tr>
                            <form action="?st=send" method="post" name="form5">
                                <td>請直接輸入要排除的信箱，每一個信箱地址一行。<br><textarea name="emails" style="width:80%;height:500px;"></textarea><br><input type="submit" value="送出"></td>
                            </form>
                        </tr>
                </table>

            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    <hr>
    </div>
    <!--/.fluid-container-->

</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>