<?php
/*****************************************************/
//檔案名稱：ad_mem_login_log_list_all.php
//後台對應位置：約會專家功能 / 會員登入紀錄 / 年度統計圖表
//改版日期：2022.02.11
//改版設計人員：Jack
//改版程式人員：Queena
/*****************************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
set_time_limit(0);

//權限判斷
$auth_limit = 6;
require_once("./include/_limit.php");
check_page_power("ad_mem_login_log_list");

//麵包屑
$unitprocess = $m_home.$icon."約會專家功能".$icon."會員登入紀錄".$icon."年度統計圖表";

//接收值
$times1 = SqlFilter($_REQUEST["times1"],"tab");
$times2 = SqlFilter($_REQUEST["times2"],"tab");
$ismem = SqlFilter($_REQUEST["ismem"],"tab");

//判斷日期
if ( $times1 != "" ){
    $acre_sign1 = $times1." 00:00";
    $vacre_sign1 = $times1;
    if ( chkDate($acre_sign1) == false ){
        call_alert("起始時間有誤。", 0, 0);
    }
}else{
    $acre_sign1 = date("Y-m-d")." 00:00";
	$vacre_sign1 = date("Y-m-d");

}
if ( $times2 != "" ){
    $acre_sign2 = $times2." 23:59";
    $vacre_sign2 = $times2;
    if ( chkDate($vacre_sign2) == false ){
        call_alert("結束時間有誤。", 0, 0);
    }
}else{
    $acre_sign2 = date("Y-m-d")." 23:59";
	$vacre_sign2 = date("Y-m-d");   
}

?>
<!-- MIDDLE -->
<section id="middle">
    
     <!-- 麵包屑 -->
     <header id="page-header">
        <div class="m-crumb"><i class="fa fa-folder-open-o"></i><?php echo $unitprocess;?></div>
    </header>
    <!-- /麵包屑 -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <span class="title elipsis">
                <strong>約會專家-會員登入紀錄-年度統計圖表</strong> <!-- panel title -->
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="ad_mem_login_log_list.php" class="btn btn-info">會員登入紀錄</a>
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="ad_mem_login_log_list_count.php" class="btn btn-info">各會館統計</a>
            </span>
            <div class="m-search-bar">
                <span class="span-group">
                    <input type="checkbox" id="ismem" name="ismem" value="1"<?php if ( $ismem == "1" ){ " checked";}?> onclick="ismem_send()"> 僅會員
                </span>
            </div>
            <span>
                <strong style="background-color: yellow; color:brown">※不重覆登入紀錄。</strong>
            </span>
            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable input_small">
                    <?php
                        //今年
					  	$years = date("Y");
					  	echo "<tr style=\"background-color: #FFDA96;\">";
					  	for ( $i=1;$i<=12;$i++ ){
					  	    echo "<td>";
					  	    if ( $i == 1 ){
					  		    echo $years." 年 ";
                            }
					  	    echo $i." 月</td>";
					    }
					    echo "</tr>";
					    echo "<tr>";
					  	for ( $i=1;$i<=12;$i++ ){
    					  	if ( $ismem == "1" ){
                                $SQL = "Select count(auton) As v From si_log_ip As dba Where year(times)=".$years." And month(times)=".$i." And (Select count(auton) From si_log_ip Where mem_num = dba.mem_num and times > dba.times) <= 1 and (select count(mem_auto) from member_data where mem_num = dba.mem_num and mem_level='mem') > 0";
                            }else{
              	                $SQL = "Select count(auton) as v from si_log_ip as dba where year(times) = ".$year." and month(times) = ".$i." and (select count(auton) from si_log_ip where mem_num = dba.mem_num and times > dba.times) <= 1";
                            }
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $re);
                            if ( count($result) == 0 ){
                                $vv = 0;
                	            ${"t".$i} = 0;
                            }else{
                	            $vv = $re["v"];
                	            ${"t".$i} = $re["v"];
                            }
                            echo "<td>".$vv."</td>";
                        }
					    echo "</tr>";
					    
                        //去年
					    $years = (date("Y")-1);
                        echo "<tr style=\"background-color: #FFDA96;\">";
					  	for ( $i=1;$i<=12;$i++ ){
					  	    echo "<td>";
					  	    if ( $i == 1 ){
					  		    echo $years." 年 ";
                            }
					  	    echo $i." 月</td>";
                        }
					    echo "</tr>";
					    echo "<tr>";
					  	for ( $i=1;$i<=12;$i++ ){
					  	    if ( $ismem == "1" ){
                                $SQL = "Select count(auton) as v from si_log_ip as dba where year(times) = ".$years." and month(times) = ".$i." and (select count(auton) from si_log_ip where mem_num = dba.mem_num and times > dba.times) <= 1 and (select count(mem_auto) from member_data where mem_num = dba.mem_num and mem_level='mem') > 0";
                            }else{
                                $SQL = "select count(auton) as v from si_log_ip as dba where year(times) = ".$years." and month(times) = ".$i." and (select count(auton) from si_log_ip where mem_num = dba.mem_num and times > dba.times) <= 1";
                            }
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $re);                            
                            if ( count($result) == 0 ){
                	            $vv = 0;
                	            ${"t2_".$i} = 0;
                            }else{
                	            $vv = $re["v"];
                                ${"t2_".$i} = $re["v"];
                            }
                            echo "<td>".$vv."</td>";
                        }
					    echo "</tr>";
					    
                        //前年
					    $years = (date("Y")-2);
                        echo "<tr style=\"background-color: #FFDA96;\">";
					  	for ( $i=1;$i<=12;$i++ ){
					  	    echo "<td>";
					  	    if ( $i == 1 ){
					  		    echo $years." 年 ";
                            }
					  	    echo $i." 月</td>";
                        }
					    echo "</tr>";
					    echo "<tr>";
					  	for ( $i=1;$i<=12;$i++ ){
					  	    if ( $ismem == "1" ){
                                $SQL1 = "Select count(auton) as v from si_log_ip as dba where year(times) = ".$years." and month(times) = ".$i." and (select count(auton) from si_log_ip where mem_num = dba.mem_num and times > dba.times) <= 1 and (select count(mem_auto) from member_data where mem_num = dba.mem_num and mem_level='mem') > 0";
                            }else{
              	                $SQL1 = "Select count(auton) as v from si_log_ip as dba where year(times) = ".$years." and month(times) = ".$i." and (select count(auton) from si_log_ip where mem_num = dba.mem_num and times > dba.times) <= 1";
                            }
                            $rs1 = $SPConn->prepare($SQL1);
                            $rs1->execute();
                            $result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result1 as $re1);
                            if ( count($result1) == 0 ){
                	            $vv = 0;
                	            ${"t3_".$i} = 0;
                            }else{
                	            $vv = $re1["v"];
                	            ${"t3_".$i}= $re1["v"];
                            }
                            echo "<td>".$vv."</td>";
                        }
					    echo "</tr>";
					?>
                </table>
                <div>
                    <div id="flot-sin" class="flot-chart">
                        <!-- FLOT CONTAINER -->
                    </div>
                </div>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->
<?php require_once("./include/_bottom.php"); ?>

<script type="text/javascript">
    function ismem_send() {
	    var $c = $("#ismem");
	    if($c.prop("checked")) location.href='ad_mem_login_log_list_count_all.php?ismem=1';
	    else location.href='ad_mem_login_log_list_count_all.php';
    }

    $mtu = "ad_mem_login_log_list";
    var $color_border_color = "#eaeaea";		/* light gray 	*/
        $color_grid_color 	= "#dddddd"			/* silver	 	*/
        $color_main 		= "#E24913";		/* red       	*/
        $color_second 		= "#6595b4";		/* blue      	*/
        $color_third 		= "#FF9F01";		/* orange   	*/
        $color_fourth 		= "#7e9d3a";		/* green     	*/
        $color_fifth 		= "#BD362F";		/* dark red  	*/
        $color_mono 		= "#000000";		/* black 	 	*/
			
        var months = ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"];

		var d = [
	    	<?php for ( $i=1;$i<=12;$i++ ){
		        if ( ${"t".$i} != 0 ){
			        if ( ceil($i) != ceil(date("m")) ){
		                echo "[".$i.", ".${"t".$i}."]";
                    }
                }
		        if ( $i != 12 ){
			        echo ",";
                }
		    }?>
		];
		var d2 = [
            <?php for ( $i=1;$i<=12;$i++ ){
                echo "[".$i.", ".${"t2_".$i}."]";
                if ( $i != 12 ){
                    echo ",";
                }
            }?>
        ];

		var d3 = [
            <?php for ( $i=1;$i<=12;$i++ ){
                echo "[".$i.", ".${"t3_".$i}."]";
                if ( $i != 12 ){
                    echo ",";
                }
            }?>
		];		

        var dataSet = [
	        { label: "今年", data: d, color: "#FF55A8" },
	        { label: "去年", data: d2, color: "#E24913" },
	        { label: "前年", data: d3, color: "#999999" }
        ];

		loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function(){
            loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function(){
                loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function(){
                    loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function(){
                        loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js", function(){
                            loadScript(plugin_path + "chart.flot/jquery.flot.pie.min.js", function(){
                                loadScript(plugin_path + "chart.flot/jquery.flot.tooltip.min.js", function(){
		                            if (jQuery("#flot-sin").length > 0) {
			                            var plot = jQuery.plot(jQuery("#flot-sin"), dataSet, {
				                            series : {
					                            lines : {
						                            show : true
					                            },
					                            points : {
						                            show : true
					                            }
				                            },
				                            grid: {
                                                hoverable: true,
                                                clickable: false,
                                                borderWidth: 1,
                                                borderColor: "#633200",
                                                backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
                                            },
				                            tooltip : true,
				                            tooltipOpts : {
					                            content : "(%s) %x 月<br/><strong>%y</strong>",
					                            defaultTheme : false
				                            },
				                            colors : [$color_second, $color_fourth],
				                            yaxes: {
      	                                        axisLabelPadding: 3,
      	                                        tickFormatter: function (v, axis) {
                                                    return $.formatNumber(v, { format: "#,###", locale: "nt" });
                                                }
                                            },
				                            xaxis: {
				                                ticks: [
                                                    [1, "一月"], [2, "二月"], [3, "三月"], [4, "四月"], [5, "五月"], [6, "六月"],
                                                    [7, "七月"], [8, "八月"], [9, "九月"], [10, "十月"], [11, "十一月"], [12, "十二月"]
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