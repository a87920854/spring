<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">教學影片</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>教學影片</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>

                </p>
                <br><br>
                <div class="col-md-4 text-center">
                    <a href="teach_video_list.php?t=0"><img src="img/folder2.png" style="width:70%">
                        <div>一般區</div>
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    <a href="teach_video_list.php?t=1"><img src="img/folder1.png" style="width:70%">
                        <div>管制區(需督導授權)</div>
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    <a href="teach_video_list.php?t=2"><img src="img/folder3.png" style="width:70%">
                        <div>限制區(需總公司授權)</div>
                    </a>
                </div>

                <div class="clearfix" style="padding-bottom:30px;"></div>

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
require("./include/_bottom.php");
?>