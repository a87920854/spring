<?php if( (${"total_size".($c+1)} > 0) || $total_size > 0 ) { ?>
	<div class="text-center">共 <?php echo $total_size;?> 筆、第 <?php echo $tPage;?> 頁／共 <?php echo $tPageTotal;?> 頁&nbsp;&nbsp;
		<ul class="pagination pagination-md">
			<li><a href="javascript:GotoPage(1,document.frmpage);">第一頁</a></li>
			<?php
			$AreaNo = (int)(($tPage-1)/8);
			$sPage = 1 + ( 8 * $AreaNo );
			$ePage = 8 + ( 8 * $AreaNo);
			for( $Li=$sPage;$Li<=$ePage;$Li++){
				if( $Li > $tPageTotal ) break;
					if ($tPage == $Li){
						echo "<li class='active'><a href=\"javascript:void(0);\">".$Li."</a>";
					}else{
						echo "<li><a href=\"javascript:GotoPage(".$Li.",document.frmpage);\">".$Li."</a>";
				}
			}?>
			<?php if ( $tPage < $tPageTotal ){?>
				<li><a href="javascript:GotoPage(<?php echo $tPage+1;?>,document.frmpage);" class="text" title="Next">下一頁</a></li>
				
			<?php }?>
			
			<?php if ( $tPage != $tPageTotal ){?>
				<li><a href="javascript:GotoPage(<?php echo $tPageTotal;?>,document.frmpage);" class='text'>最後一頁</a></li>
			<?php }?>
			<li>
				<select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
					<?php for ( $p=1;$p<=$tPageTotal;$p++ ){?>
						<option value="javascript:GotoPage(<?php echo $p;?>,document.frmpage);"<?php if ( $tPage == $p ){?> selected<?php }?>><?php echo $p;?></option>
					<?php }?>
				</select>
			</li>
		</ul>
	</div>
<?php }?>
<form name="frmpage" id="frmpage" method="post">
	<input type="hidden" name="tPage" id="tPage" value="<?php echo $tPage;?>">
	<input type="hidden" name="keyword" id="keyword" value="<?php echo $keyword;?>">
	<input type="hidden" name="branch" id="branch" value="<?php echo $branch;?>">
	<input type="hidden" name="timeend" id="timeend" value="<?php echo $timeend;?>">
	<input type="hidden" name="daysel" id="daysel" value="<?php echo $daysel;?>">
	<input type="hidden" name="	oby" id="oby" value="<?php echo $oby;?>">
	<input type="hidden" name="tr" id="tr" value="<?php echo $tr;?>">
	<input type="hidden" name="lovesize1" id="lovesize1" value="<?php echo $lovesize1;?>">
	<input type="hidden" name="lovesize2" id="lovesize2" value="<?php echo $lovesize2;?>">
	<input type="hidden" name="lovedate1" id="lovedate1" value="<?php echo $lovedate1;?>">
	<input type="hidden" name="lovedate2" id="lovedate2" value="<?php echo $lovedate2;?>">
	<input type="hidden" name="joindate1" id="joindate1" value="<?php echo $joindate1;?>">
	<input type="hidden" name="joindate2" id="joindate2" value="<?php echo $joindate2;?>">
	<input type="hidden" name="sex" id="sex" value="<?php echo $sex;?>">
</form>