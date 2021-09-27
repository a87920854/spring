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
			<li>春天網站系統</li>
			<li><a href="springweb_fun3.php">愛情見證</a></li>
			<li class="active">新增/修改愛情見證</li>
		</ol>
	</header>
	<!-- /page title -->

	<div id="content" class="padding-20">
		<!-- content starts -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>新增/修改愛情見證</strong> <!-- panel title -->
				</span>
			</div>

			<div class="panel-body">
				<form name="mform" method="post" action="springweb_fun3_add.php" class="form-inline" onSubmit="return chkform()">
					<table class="table table-striped table-bordered bootstrap-datatable">
						<tbody>
							<tr>
								<td width="150" align="left" valign="middle">相識時間</td>
								<td><input name="n1" id="n1" value="" class="form-control"></td>
								<td width="150" align="left" valign="middle">結婚時間</td>
								<td><input name="n2" id="n2" value="" class="form-control"></td>
							</tr>
							<tr>
								<td width="150" align="left" valign="middle">新郎</td>
								<td><input name="n3" id="n3" value="" class="form-control"></td>
								<td width="150" align="left" valign="middle">新娘</td>
								<td><input name="n4" id="n4" value="" class="form-control"></td>
							</tr>
							<tr>
								<td width="150" align="left" valign="middle">愛情見證標題</td>
								<td colspan=3><input style="width:80%;" class="form-control" name="ac_title" id="ac_title" value=""></td>
							</tr>
							<tr>
								<td align="left" valign="middle">內容</td>
								<td colspan=3><textarea name="ac_note1" id="ac_note1" class="form-control" style="width:80%;height:150px;"></textarea></td>
							</tr>


							<tr>
								<td width="150" align="left" valign="middle"></td>
								<td colspan=4>
									<label class="checkbox"><input type="checkbox" name="shows" id="shows" value="1"><i></i> 春網前台顯示</label>
									<label class="checkbox"><input type="checkbox" name="shows2" id="shows2" value="1"><i></i> 業務展示系統顯示</label>

									<label class="checkbox"><input type="checkbox" name="sign" id="sign" value="1"><i></i> 簽約</label>

								</td>
							</tr>

							<tr>
								<td align="left" valign="middle">建立時間</td>
								<td colspan=4>2021/9/13 下午 04:55:02</td>
							</tr>
							<tr>
								<td align="left" valign="middle">建立人</td>
								<td colspan=4></td>
							</tr>
							<tr>
								<td colspan=3 align="center"><input name="acts" id="acts" type="hidden" value="ad"><input name="pid" type="hidden" id="pid" value="">
									<input type="submit" value="確認送出" class="btn btn-info" style="width:50%;">
								</td>
							</tr>
						</tbody>
					</table>
				</form>
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

<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script language="JavaScript">
	$mtu = "springweb_fun3.";
	$(function() {
		reload_pic_div();

		var $file_uploads2 = $("#file_uploads2"),
			$thisid = $file_uploads2.attr("id"),
			$progress2 = $file_uploads2.closest("div").find(".progress");
		var $imgs = $file_uploads2.closest("span").find("#cimg").val();

		$file_uploads2.fileupload({
				url: "springweb_fun3_add.php?st=upload&ac_auto=",
				type: "POST",
				dropZone: $file_uploads2,
				dataType: 'html',
				autoUpload: true,
				done: function(e, data) {

					if (data.result) {
						$progress2.find(".progress-bar").css("width", "0").parent().hide();
						reload_pic_div();
					}
				},
				fail: function(e, data) {

				},
				progressall: function(e, data) {
					var progress = parseInt(data.loaded / data.total * 100, 10);
					$progress2.show().find(".progress-bar").css(
						'width',
						progress + '%'
					);
				},
				add: function(e, data) {
					var uploadErrors = [];
					var acceptFileTypes = /^image\/(gif|jpe?g|png)$/i;
					if (data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
						uploadErrors.push('目前僅開放上傳 gif, jpg, jpeg, png 檔案。');
					}
					if (data.originalFiles[0]['size'] > 5000000) {
						uploadErrors.push('檔案大小超過限制。');
					}
					if (uploadErrors.length > 0) {
						alert(uploadErrors.join("\n"));
					}
					data.submit();
				}
			}).prop('disabled', !$.support.fileInput)
			.parent().addClass($.support.fileInput ? undefined : 'disabled');

	});


	function reload_pic_div() {
		var $pic_div = $("#pic_div");
		$pic_div.html("讀取中...");
		$.ajax({
			type: "POST",
			url: "springweb_fun3_add.php",
			data: {
				st: "pic_div",
				ac_auto: ""
			},
			error: function(xhr) {},
			success: function(response) {
				$pic_div.html(response);

				$(".vurl_link").bind("keypress", function(e) {
					if (e.which == 13) {
						var $an = $(this).data("auton");
						vurl_save($an, $(this));
					}
				});

			}
		});
	}

	function vurl_save(an, ob) {
		if (!an) return false;
		var $val = ob.val();
		if ($val == ob.data("val")) return false;
		ob.val("儲存中...");
		ob.prop("disabled", true);
		$.ajax({
			url: "springweb_fun3_add.php",
			data: {
				st: "vurl",
				an: an,
				val: $val,
				ac: ""
			},
			type: "POST",
			dataType: 'text',
			success: function(msg) {
				var $dd = $("<div>儲存成功。</div>");
				ob.parent().append($dd);
				setTimeout(function() {
					$dd.remove();
					ob.val($val);
					ob.data("val", $val);
					ob.prop("disabled", false);
				}, 600);
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		});
	}

	function set_first(a) {
		$.ajax({
			type: "POST",
			url: "springweb_fun3_add.php",
			data: {
				st: "pic_first",
				ac_auto: "",
				pa: a
			},
			error: function(xhr) {},
			success: function(response) {
				reload_pic_div();
			}
		});
	}

	function set_del(a) {
		if (confirm("是否確定刪除此圖片？")) {
			$.ajax({
				type: "POST",
				url: "springweb_fun3_add.php",
				data: {
					st: "pic_del",
					ac_auto: "",
					pa: a
				},
				error: function(xhr) {},
				success: function(response) {
					reload_pic_div();
				}
			});
		}
	}
</script>