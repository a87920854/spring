<div class="modal fade" id="ajax_load_modal" tabindex="-1">
	<div class="modal-dialog" style="min-width: 600px; width: auto;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">查看前 50 筆訊息通知</h4>
			</div>
			<div class="modal-body">
			<?php
				$SQL = "Select Count(photo_auto) As tt From photo_data Outer Apply (Select Top 1 mem_branch, mem_level From member_data Where mem_num = photo_data.mem_num) b Where mem_branch='".$_SESSION["branch"]."' And accept=0 And mem_level='mem'";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				echo "<ul class='list-unstyled list-hover'>";
				foreach($result as $re);
				if ( count($result) >= 1 ){
					if ( $re["tt"] > 0 ){ ?>
						<li><span class="label label-warning"><i class="fa fa-exclamation size-15"></i></span>系統訊息 - 照片審核 - <a href="ad_photo_check.asp">目前有 <?php echo $re["tt"];?> 筆網站照片待審核，請點此前往審核照片。</a> <small style="float:right;"><?php echo changeDate(date("Y-m-d H:m:s"));?></small></li>
			<?php
					}
				}
				switch ( $_SESSION["MM_UserAuthorization"] ){
					case "admin":
						$SQL = "Select Top 50 * From single_sysmsg Where types='系統訊息' And reads=0 Order By times Desc";
						break;
					case "branch":
						$SQL = "Select Top 50 * From single_sysmsg Where types='系統訊息' And branch='".$_SESSION["branch"]."' And reads=0 And look_for Like '%branch%' Order By times Desc";
						break;
					case "love":
						$SQL = "Select Top 50 * From single_sysmsg Where types='系統訊息' And branch='".$_SESSION["branch"]."' And reads=0 And look_for Like '%love%' Order By times Desc";
						break;
					default:
						$SQL = "Select Top 50 * From single_sysmsg Where types='系統訊息' And single='".$_SESSION["MM_Username"]."' And reads=0 Order By times Desc";
						break;
				}				
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				if ( count($result) == 0 ){ 
					echo "<li>暫無系統訊息</li>";
				}else{					
					foreach( $result as $re ){ 
						if ( $re["url"] != "" ){  $url = $re["url"]; }else{ $rl = "#";}
						$types = "";
						if ( $re["types"] != "" ){ $types = $re["types"];}
						if ( $re["types2"] != "" ){ $types = $types." - ".$re["types2"];}
						$times = $re["times"];
						$aTime = date("Y-m-d");
						$bTime = $times;
						if ( strtotime($aTime) - strtotime($bTime) > 3 ){ $block_style = " style='color:#666'"; }else{ $block_style = "";}
						if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ $towho = "&nbsp;&nbsp;收訊人：".$re["singlename"]; }else{ $towho = "";} ?>
						<li><span class="label label-warning"><i class="fa fa-exclamation size-15"></i></span><?php echo $types;?> - <a href="<?php echo $url;?>" target="_blank"><?php echo $re["msg"];?></a> <small style="float:right;"><?php echo changeDate(date("Y-m-d H:m:s"));?></small></li>
			<?		}					
				}
				echo "</ul>";
				$SQL = "Update single_sysmsg Set index_show = 0 Where types='系統訊息' And single='".$_SESSION["MM_Username"]."' And index_show=1";
				$rsu = $SPConn->prepare($SQL);
				$rsu->execute();
			?>
			</div>
			<div class="modal-footer">
				<a href="#close" class="btn btn-default" data-dismiss="modal">關閉</a>
			</div>
		</div>
	</div>
</div>