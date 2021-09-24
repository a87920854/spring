<?php
	//菁英榜日期
	$qdate1 = date("Y/m/d",strtotime("-8 day"));
	$qdate2 = date("Y/m/d",strtotime("-1 day"));
	
	//每週更新資料，如果沒有寫入日期沒有八天前的就刪除 types=index_top_week後再select更新寫入top資料
	$SQL = "SELECT * From ad_index_data Where types='index_top_week' And datediff(d, times, '".$qdate2."') = 0";
	$rs_top = $SPConn->prepare($SQL);
	$rs_top->execute();
	$result_top=$rs_top->fetchAll(PDO::FETCH_ASSOC);
	if ( count($result_top) == 0 ){
		//因為資料庫不同步，為了有資料此段程式暫時註解，上線時要取消註解
		/*$SQL = "Delete ad_index_data Where types='index_top_week'";
		$rsd = $SPConn->prepare($SQL);
		$rsd->execute();*/
		$SQL  = "Select Top 5 Sum(ps_total) As singles, p_branch, p_other_name, p_user, b_year, b_month, b_date, j_year, j_month, j_date, p_job2 ";
		$SQL .= "From single_search Where ps_times between '".$qdate2."' And '".$qdate2."' Group By ";
		$SQL .= "p_branch, p_other_name, p_user, b_year, b_month, b_date, j_year, j_month, j_date, p_job2 ORDER BY singles DESC";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		$i=0;
		if ( count($result) > 0 ){
			foreach($result as $re){
				$i=$i++;			
				//save ad_index_data
				$SQL  = "Insert Into ad_index_data(no, n1, n2, n3, n4, types, times, times2) Values ( '";
				$SQL .= SqlFilter($i,"int")."',";
				$SQL .= "'".SqlFilter($re["p_branch"],"str")."',";
				$SQL .= "'".SqlFilter($re["p_other_name"],"str")."',";
				$SQL .= "'".SqlFilter($re["singles"],"str")."',";
				$SQL .= "'".SqlFilter($re["p_user"],"str")."',";
				$SQL .= "'index_top_week',";
				$SQL .= "'".SqlFilter($qdate1,"str")."',";
				$SQL .= "'".SqlFilter($qdate2,"str")."')";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
			}
		}
	}
?>
<div class="weekly_rank">
    <div class="weekly_rank_title animated zoomInDown">
        <img src="img/index_top_week_title_new.png">
        <p><?php echo $qdate1;?> ~ <?php echo $qdate2;?></p>
    </div>
    <div class="weekly_rank_row">
	
		<?php //精英榜 query
			$SQL = "Select * From ad_index_data Where ad_index_data.types='index_top_week' Order By no Asc";
			$rs = $SPConn->prepare($SQL);
			$rs->execute();
			$result=$rs->fetchAll(PDO::FETCH_ASSOC);
			$i=0;
			foreach( $result as $re ){
				$i++; ?>
				<div class="weekly_rank_col">
					<div class="weekly_rank_box animated bounceInDown">
						<img src="img/index_top_week_no<?php echo $i;?>_new.png">
						<div class="weekly_rank_txt">
							<p class="weekly_rank_location"><?php echo $re["n1"];?></p>
							<p class="weekly_rank_name"><?php echo $re["n2"];?></p>
							<p class="weekly_rank_num"><?php echo FormatCurrency($re["n3"]);?></p>
						</div>
					</div>
				</div>
		<?php }?>
    </div>
</div>