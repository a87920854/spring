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
						<li>好好玩網站管理系統</li>				
						<li class="active">首頁最新消息</li>
					</ol>
				</header>
				<!-- /page title -->

			<div id="content" class="padding-20">
			<!-- content starts -->	
			<div class="panel panel-default">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>首頁最新消息</strong> <!-- panel title -->
							</span>
						</div>

       <div class="panel-body">        	
						<p><a href="#a" onclick="Mars_popup('funweb_fun7_add.php', 'fun7add', 'width=600,height=300,top=200,left=300')" class="btn btn-info">新增消息</a></p>
						<table class="table table-striped table-bordered bootstrap-datatable">
					  暫無消息
					  </table>
					</div>
				</div><!--/span-->
			</div><!--/row-->
		
	</div><!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>

