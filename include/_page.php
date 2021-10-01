<?php if( $total_size > 0) { ?>
	<div class="text-center">共 <?php echo $total_size;?> 筆、第 <?php echo $tPage;?> 頁／共 <?php echo $tPageTotal;?> 頁&nbsp;&nbsp;
		<ul class="pagination pagination-md">
			<li><a href="ad_system_report_list.php?tPage=1">第一頁</a></li>
			<?php
			$AreaNo = (int)(($tPage-1)/8);
			$sPage = 1 + ( 8 * $AreaNo );
			$ePage = 8 + ( 8 * $AreaNo);
			for( $Li=$sPage;$Li<=$ePage;$Li++){
				if( $Li > $tPageTotal ) break;
					if ($tPage == $Li){
						echo "<li class='active'><a href=\"javascript:void(0);\">".$Li."</a>";
					}else{
						echo "<li><a href=\"ad_system_report_list.php?tPage=".$Li."\">".$Li."</a>";
				}
			}?>
			<?php if ( $tPage < $tPageTotal ){?>
				<li><a href="ad_system_report_list.php?tPage=<?php echo $tPage+1;?>" class="text" title="Next">下一頁</a></li>
			<?php }?>
			
			<?php if ( $tPage != $tPageTotal ){?>
				<li><a href="ad_system_report_list.php?tPage=<?php echo $tPageTotal;?>" class='text'>最後一頁</a></li>
			<?php }?>
			<li>
				<select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
					<option value="/ad_system_report_list.php?topage=1" selected>1</option>
					<option value="/ad_system_report_list.php?topage=2">2</option>
					<option value="/ad_system_report_list.php?topage=3">3</option>
					<option value="/ad_system_report_list.php?topage=4">4</option>
					<option value="/ad_system_report_list.php?topage=5">5</option>
					<option value="/ad_system_report_list.php?topage=6">6</option>
					<option value="/ad_system_report_list.php?topage=7">7</option>
					<option value="/ad_system_report_list.php?topage=8">8</option>
				</select>
			</li>
		</ul>
	</div>
<?php }?>