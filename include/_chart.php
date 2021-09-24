<script type="text/javascript">
	var $color_border_color = "#eaeaea"; /* light gray 	*/
	$color_grid_color = "#dddddd" /* silver	 	*/
	$color_main = "#E24913"; /* red       	*/
	$color_second = "#6595b4"; /* blue      	*/
	$color_third = "#FF9F01"; /* orange   	*/
	$color_fourth = "#7e9d3a"; /* green     	*/
	$color_fifth = "#BD362F"; /* dark red  	*/
	$color_mono = "#000000"; /* black 	 	*/

	var months = ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"];

	var d = [
		<?php
			for( $i=1;$i<=12;$i++ ){
				if ( $re_y["m".$i] != 0 ){
					if ( intval($i) != intval(date("m")) ){
						echo "[".$i.", ".$re_y["m".$i]."]";
						if ( $i != 12 ){ echo ","; }
					}
				}
			}
		?>
		];
		var d2 = [
		<?php
			for( $i=1;$i<=12;$i++ ){
				echo "[".$i.", ".$re_by["m".$i]."]";
				if ( $i != 12 ){ echo ","; }
			}
		?>
		];	
	var dataSet = [{
			label: "年度業績表",
			data: d,
			color: "#FF55A8"
		},
		{
			label: "去年業績表",
			data: d2,
			color: "#999999"
		}
	];

	loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function() {
		loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function() {
			loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function() {
				loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function() {
					loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js",
						function() {
							loadScript(plugin_path +
								"chart.flot/jquery.flot.pie.min.js",
								function() {
									loadScript(plugin_path +
										"chart.flot/jquery.flot.tooltip.min.js",
										function() {

											if (jQuery("#flot-sin").length >
												0) {
												var plot = jQuery.plot(jQuery(
														"#flot-sin"),
													dataSet, {
														series: {
															lines: {
																show: true
															},
															points: {
																show: true
															}
														},
														grid: {
															hoverable: true,
															clickable: false,
															borderWidth: 1,
															borderColor: "#633200",
															backgroundColor: {
																colors: [
																	"#ffffff",
																	"#EDF5FF"
																]
															}
														},
														tooltip: true,
														tooltipOpts: {
															content: "(%s) %x 月<br/><strong>%y</strong>",
															defaultTheme: false
														},
														colors: [
															$color_second,
															$color_fourth
														],
														yaxes: {
															axisLabelPadding: 3,
															tickFormatter: function(
																v, axis
															) {
																return $
																	.formatNumber(
																		v, {
																			format: "#,###",
																			locale: "nt"
																		}
																	);
															}
														},
														xaxis: {
															ticks: [
																[1, "一月"],
																[2, "二月"],
																[3, "三月"],
																[4, "四月"],
																[5, "五月"],
																[6, "六月"],
																[7, "七月"],
																[8, "八月"],
																[9, "九月"],
																[10, "十月"],
																[11, "十一月"],
																[12, "十二月"]
															]
														}
													});

											}
										});
								});
						});
				});
			});
		});
	});
</script>