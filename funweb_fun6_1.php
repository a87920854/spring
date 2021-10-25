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
						<li><a href="funweb_fun6.php">首頁設置</a></li>						
						<li class="active">左上大圖BANNER</li>
					</ol>
				</header>
				<!-- /page title -->

			<div id="content" class="padding-20">
			<!-- content starts -->	
			<div class="panel panel-default">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>左上大圖BANNER</strong> <!-- panel title -->
							</span>
						</div>

       <div class="panel-body"> 
       	       	
					<p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('funweb_fun6_1_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
						<table class="table table-striped table-bordered bootstrap-datatable">
						  <tbody>
			<tr>
			    <th width="70"></th>
				<th>圖片</th>
				<th>連結位置</th>
				<th width="160">資料時間</th>
				<th>操作</th>
			</tr>
			
			<tr>
			    <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=201&i1=18"><span class="fa fa-arrow-down"></span></a></td>
				<td><a href="http://www.funtour.com.tw/images/upload/index_banner_201.jpg" class="fancybox"><img src="http://www.funtour.com.tw/images/upload/index_banner_201.jpg" border=0 height=40></a></td>
				<td>https://www.singleparty.com.tw?cc=funtour</td>
				<td>2017/6/14 下午 04:41:11</td>
				<td>
					<a href="javascript:Mars_popup('funweb_fun6_1_add.php?an=201','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
					<a title="刪除" href="funweb_fun6_1.php?st=del&an=201">刪除</a>						
				</td>
			</tr>
				    
			<tr>
			    <td><a href="?st=mup&an=223&i1=17"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=223&i1=17"><span class="fa fa-arrow-down"></span></a></td>
				<td><a href="http://www.funtour.com.tw/images/upload/index_banner_223.jpg" class="fancybox"><img src="http://www.funtour.com.tw/images/upload/index_banner_223.jpg" border=0 height=40></a></td>
				<td>https://www.singleparty.com.tw?cc=funtour</td>
				<td>2019/3/18 下午 02:11:30</td>
				<td>
					<a href="javascript:Mars_popup('funweb_fun6_1_add.php?an=223','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
					<a title="刪除" href="funweb_fun6_1.php?st=del&an=223">刪除</a>						
				</td>
			</tr>
				    
			<tr>
			    <td><a href="?st=mup&an=85&i1=6"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=85&i1=6"><span class="fa fa-arrow-down"></span></a></td>
				<td><a href="http://www.funtour.com.tw/images/upload/index_banner_85.jpg" class="fancybox"><img src="http://www.funtour.com.tw/images/upload/index_banner_85.jpg" border=0 height=40></a></td>
				<td>media.php</td>
				<td>2015/7/27 下午 02:13:43</td>
				<td>
					<a href="javascript:Mars_popup('funweb_fun6_1_add.php?an=85','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
					<a title="刪除" href="funweb_fun6_1.php?st=del&an=85">刪除</a>						
				</td>
			</tr>
				    
			<tr>
			    <td><a href="?st=mup&an=84&i1=4"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
				<td><a href="http://www.funtour.com.tw/images/upload/index_banner_84.jpg" class="fancybox"><img src="http://www.funtour.com.tw/images/upload/index_banner_84.jpg" border=0 height=40></a></td>
				<td>word_list.php</td>
				<td>2015/7/27 下午 02:13:34</td>
				<td>
					<a href="javascript:Mars_popup('funweb_fun6_1_add.php?an=84','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
					<a title="刪除" href="funweb_fun6_1.php?st=del&an=84">刪除</a>						
				</td>
			</tr>
				    

						  </tbody>
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