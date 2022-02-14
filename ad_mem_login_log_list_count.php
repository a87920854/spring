<?php
/***********************************************/
//檔案名稱：ad_mem_login_log_list_count.php
//後台對應位置：約會專家功能→會員登入紀錄→各會館統計
//改版日期：2022.02.11
//改版設計人員：Jack
//改版程式人員：Queena
/***********************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//權限判斷
$auth_limit = 6;
require_once("./include/_limit.php");
check_page_power("ad_mem_login_log_list");

//麵包屑
$unitprocess = $m_home.$icon."約會專家功能".$icon."會員登入紀錄".$icon."各會館統計";

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
            <h2 class="pageTitle">
                約會專家升級意願 》會員登入紀錄 》各會館統計
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="ad_mem_login_log_list.php" class="btn btn-info">會員登入紀錄</a>
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="ad_mem_login_log_list_count_all.php" class="btn btn-info">年度統計圖表</a>
            </h2>    
            <form id="searchform" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" target="_self" style="margin:0px;">
                <div class="m-search-bar">
                    <span class="span-group">
                        登入時間：
                        <input type="text" class="datepicker" autocomplete="off" name="times1" value="<?php echo $vacre_sign1;?>">
                        ～
                        <input type="text" class="datepicker" autocomplete="off" name="times2" value="<?php echo $vacre_sign2;?>">
                        <input type="checkbox" name="ismem" value="1"<?php if ( $ismem == "1" ){ echo " checked";}?>> 僅會員
                        <input type="submit" value="送出" class="btn btn-default">
                    </span>
                </div>
            </form>
            <span>
                <strong style="background-color: yellow; color:brown">※不重覆登入紀錄。</strong>
            </span>
            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable input_small">
                    <tr>
                        <?php
                        //會館資料
                        $SQL = "Select * From branch_data Where auto_no<>10 And auto_no<>12 Order By admin_Sort";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                        $branch_array = array();
                            foreach($result as $re){
                                array_push($branch_array,$re["admin_name"]);
                                echo "<td>".$re["admin_name"]."</td>";
                        } ?>
                        <td>合計</td>
                    </tr>
                    <tr>
                        <?php
					  	$allvv = 0;
					  	for ( $i=0;$i<count($branch_array);$i++ ){
                            if ( $ismem == "1" ){
                                $SQL = "Select count(auton) As v From si_log_ip As dba Where branch='".$branch_array[$i]."' And times Between '".$acre_sign1."' And '".$acre_sign2."' And (Select count(auton) From si_log_ip Where branch='".$branch_array[$i]."' And mem_num = dba.mem_num And times Between '".$acre_sign1."' And '".$acre_sign2."') <= 1 And (Select count(mem_auto) From member_data Where mem_num = dba.mem_num and mem_level='mem') > 0";
                            }else{
                                $SQL = "Select count(auton) As v From si_log_ip As dba Where branch='".$branch_array[$i]."' And times Between '".$acre_sign1."' and '".$acre_sign2."' And (Select count(auton) from si_log_ip where branch='".$branch_array[$i]."' And mem_num = dba.mem_num And times Between '".$acre_sign1."' And '".$acre_sign2."') <= 1";
                            }
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $re);
                            if ( count($result) == 0 ){
                			    $vv = 0;
                			    ${"t".$i} = 0;
                            }else{
                			    $vv = $re["v"];
                			    ${"t".$i} = $re["v"];
                            }
                            $allvv = $allvv+$vv;
                            echo "<td>".$vv."</td>";
                        }?>
                        <td><?php echo $allvv;?></td>
                    </tr>
                </table>
                <div>
                    <div id="pieshow" style="height:500px"></div>
                </div>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->

<?php require_once("./include/_bottom.php");?>

<script type="text/javascript">
    $mtu = "ad_mem_login_log_list";
    var dataSet = [
        { label: "台北", data: <?php echo $t0;?>, color: "#cc0033" },
        { label: "八德", data: <?php echo $t6;?>, color: "#cc00ff" },
        { label: "新竹", data: <?php echo $t2;?>, color: "#0000cc" },
        { label: "台中", data: <?php echo $t3;?>, color: "#0099ff" },
        { label: "台南", data: <?php echo $t4;?>, color: "#00cc33" },
        { label: "高雄", data: <?php echo $t5;?>, color: "#cccc66" },    
        { label: "桃園", data: <?php echo $t1;?>, color: "#492D7A" },
        { label: "約專", data: <?php echo $t7;?>, color: "#c2267d" },
        { label: "總管理處", data: <?php echo $t8;?>, color: "#000000" }    
    ];
    var options = {
        series: {
            pie: {
                show: true,
                label: {
                    show: true
                }
            }
        }
    };

    loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function(){
        loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function(){
            loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function(){
                loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function(){
                    loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js", function(){
                        loadScript(plugin_path + "chart.flot/jquery.flot.pie.min.js", function(){
                            loadScript(plugin_path + "chart.flot/jquery.flot.tooltip.min.js", function(){
                                $.plot($("#pieshow"), dataSet, options);
                            });
                        });
                    });
                });
            });
        });	
    });
</script>