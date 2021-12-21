<?php
    /*****************************************/
    //檔案名稱：ad_fun_history_count.php
    //後台對應位置：好好玩管理系統/歷史統計圖表
    //改版日期：2021.12.20
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }

    if($_REQUEST["y1"] != ""){
        $acre_sign1 = SqlFilter($_REQUEST["y1"],"tab"). " 00:00";
        if(!chkDate($acre_sign1)){
            call_alert("起始日期有誤。", 0, 0);
        }
    }
    if($_REQUEST["y2"] != ""){
        $acre_sign2 = SqlFilter($_REQUEST["y2"],"tab"). " 23:59";
        if(!chkDate($acre_sign2)){
            call_alert("結束日期有誤。", 0, 0);
        }
    }

    if($acre_sign1 == ""){
        $acre_sign1 = date("Y/m/d"). " 00:00";        
    }
    if($acre_sign2 == ""){
        $acre_sign2 = date("Y/m/d"). " 23:59";        
    }

    if(chkDate($acre_sign1) && chkDate($acre_sign2)){
        if(strtotime($acre_sign1) > strtotime($acre_sign2)){
            call_alert("結束日期不能大於起始日期。", 0, 0);
        }
        $sqlss = $sqlss . " and log_time between '".$acre_sign1."' and '".$acre_sign2."'";
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">歷史統計圖表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>歷史統計圖表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form action="ad_fun_history_count.php" method="post" name="form1">
                        <!--        日期範圍：<input type="text" name="y1" style="width:80px;" class="datepicker" autocomplete="off" value="<?php echo Date_EN($acre_sign1,1); ?>"> ~ <input type="text" name="y2" style="width:80px;" class="datepicker" autocomplete="off" value="<?php echo Date_EN($acre_sign2,1); ?>">-->
                        　　<select name="tt" id="tt" style="width:100px;">
                            <option value="0">國內活動</option>
                            <option value="1">國外旅遊</option>
                        </select>　
                        <?php 
                            if($_REQUEST["tt"] != ""){ ?>
                                活動：
                                <select name="s7" id="s7" style="width:100px;">
                                    <option value="">請選擇</option>
                                    <?php 
                                        if($_REQUEST["tt"] == 0){
                                            $qsql = "select ac_auto, ac_time, ac_title from action_data";
  	                                        $qsql2 = "select count(k_id) as ts from love_keyin where all_kind <> '國外旅遊'";
                                        }else{
                                            $qsql = "select ac_auto, ac_time, ac_title from actionf_data";
  	                                        $qsql2 = "select count(k_id) as ts from love_keyin where all_kind = '國外旅遊'";
                                        }
                                        $qsql = $qsql . " order by ac_time desc";
                                        $rs = $FunConn->prepare($qsql);
                                        $rs->execute();
                                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                        if($result){
                                            foreach($result as $re){
                                                if($re["ac_time"] != ""){
                                                    echo "<option value='".$re["ac_auto"]."'>".Date_EN($re["ac_time"],1)."-".$re["ac_title"]."</option>";
                                                }    
                                            }
                                        }
                                    ?>
                                </select>
                            <?php }
                        ?>                        
                        <input type="submit" name="Submit" style="height:28px;margin-top:-7px;" value="查詢"> <input type="reset" name="reset" style="height:28px;margin-top:-7px;" value="清空">
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <?php 
                            if($_REQUEST["tt"] != ""){
                                $tt1 = 0;
                                $tt2 = 0;
                                $tt3 = 0;
                                $tt4 = 0;
                                $tt5 = 0;
                                $tt6 = 0;
                                $tt7 = 0;
                                $tt8 = 0;
                                $rs = $FunConn->prepare($qsql2);
                                $rs->execute();
                                $result = $rs->fetch(PDO::FETCH_ASSOC);
                                if($result){    
                                    $tt1 = $result["ts"];
                                }
                                $rs = $FunConn->prepare(($qsql2." and k_sex='男'"));
                                $rs->execute();
                                $result = $rs->fetch(PDO::FETCH_ASSOC);
                                if($result){    
                                    $tt2 = $result["ts"];
                                }
                                $rs = $FunConn->prepare(($qsql2." and k_sex='女'"));
                                $rs->execute();
                                $result = $rs->fetch(PDO::FETCH_ASSOC);
                                if($result){    
                                    $tt3 = $result["ts"];
                                } ?>
                                <tr>
                                    <td>總統計人數：<?php echo $tt1; ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>性別</b> - 男：<?php echo $tt2; ?>, 女：<?php echo $tt3; ?>
                                        <div id="pieshow1" style="height:300px;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php 
                                            $rs = $FunConn->prepare(($qsql2." and datediff(d, k_year, '".(date("Y")-20)."/12/31') < 0"));
                                            $rs->execute();
                                            $result = $rs->fetch(PDO::FETCH_ASSOC);
                                            if($result){    
                                                $tt4 = $result["ts"];
                                            }
                                            $rs = $FunConn->prepare(($qsql2." and k_year between '".(date("Y")-30)."/12/31' and '".(date("Y")-21)."/1/1'"));
                                            $rs->execute();
                                            $result = $rs->fetch(PDO::FETCH_ASSOC);
                                            if($result){    
                                                $tt5 = $result["ts"];
                                            }
                                            $rs = $FunConn->prepare(($qsql2." and k_year between '".(date("Y")-40)."/12/31' and '".(date("Y")-31)."/1/1'"));
                                            $rs->execute();
                                            $result = $rs->fetch(PDO::FETCH_ASSOC);
                                            if($result){    
                                                $tt6 = $result["ts"];
                                            }
                                            $rs = $FunConn->prepare(($qsql2." and k_year between '".(date("Y")-50)."/12/31' and '".(date("Y")-41)."/1/1'"));
                                            $rs->execute();
                                            $result = $rs->fetch(PDO::FETCH_ASSOC);
                                            if($result){    
                                                $tt7 = $result["ts"];
                                            }
                                            $rs = $FunConn->prepare(($qsql2." and datediff(d, k_year, '".(date("Y")-50)."/12/31') > 0"));
                                            $rs->execute();
                                            $result = $rs->fetch(PDO::FETCH_ASSOC);
                                            if($result){    
                                                $tt8 = $result["ts"];
                                            }
                                        ?>
                                        <b>年齡</b> - 20 歲以下：<?php echo $tt4; ?>, 21 - 30 歲：<?php echo $tt5; ?>, 31 - 40 歲：<?php echo $tt6; ?>, 41 - 50 歲：<?php echo $tt7; ?>, 50 歲以上：<?php echo $tt8; ?>
                                        <div id="pieshow2" style="height:800px;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>居住地</b> -
                                        <?php 
                                            $allcity = ['基隆市','台北市','新北市','宜蘭縣','桃園市','新竹縣','新竹市','苗栗縣','苗栗市','台中縣','台中市','彰化縣','彰化市','南投縣','嘉義縣','嘉義市','雲林縣','台南縣','台南市','高雄市','屏東縣','花蓮縣','台東縣','澎湖縣','金門縣','馬祖','綠島','蘭嶼'];
                                            $allnum = 0;
                                            $citystr = "";
                                            foreach($allcity as $city){
                                                $rs = $FunConn->prepare(($qsql2." and k_area='".$city."'"));
                                                $rs->execute();
                                                $result = $rs->fetch(PDO::FETCH_ASSOC);
                                                if($result){    
                                                    echo $city . "：" .$result["ts"]. ",";
                                                    $allnum = $allnum + $result["ts"];
                                                }
                                            }
                                            echo "其他：".($tt1 - $allnum);
                                        ?>                                
                                        <div id="pieshow3" style="height:800px;"></div>
                                    </td>
                                </tr>
                                <script language="JavaScript">                            
                                    var dataSet3 = [
                                        <?php 
                                            $allcolor = ['ff0099','3300ff','00ffcc','99ff00','ff9900','ff3300','ff0000','cc3366','9966ff','666699','000066','0066cc','006600','333333','ffff66','ffcc99','cc66cc','ff0099','3300ff','00ffcc','99ff00','ff9900','ff3300','cc3366','9966ff','666699','000066','000066'];
                                            $color = 0;
                                            foreach($allcity as $city){
                                                $rs = $FunConn->prepare(($qsql2." and k_area='".$city."'"));
                                                $rs->execute();
                                                $result = $rs->fetch(PDO::FETCH_ASSOC);
                                                if($result){    
                                                    echo "{ label: '".$city."', data: ".$result["ts"].", color: '#".$allcolor[$color]."' },";
                                                    $color++;
                                                }
                                            }
                                        ?>
                                    ];
                                </script>

                            <?php }                                 
                        ?>
                        
                    </tbody>
                </table>

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
require_once("./include/_bottom.php");
?>

<script language="JavaScript">
    var dataSet = [{
            label: "男",
            data: <?php echo $tt2; ?>,
            color: "#0000ff"
        },
        {
            label: "女",
            data: <?php echo $tt3; ?>,
            color: "#ff00cc"
        }
    ];
    var dataSet2 = [{
            label: "20 歲以下",
            data: <?php echo $tt4; ?>,
            color: "#ff66cc"
        },
        {
            label: "21 - 30 歲",
            data: <?php echo $tt5; ?>,
            color: "#cc00ff"
        },
        {
            label: "31 - 40 歲",
            data: <?php echo $tt6; ?>,
            color: "#3333ff"
        },
        {
            label: "41 - 50 歲",
            data: <?php echo $tt7; ?>,
            color: "#0099ff"
        },
        {
            label: "50 歲以上",
            data: <?php echo $tt8; ?>,
            color: "#999999"
        }
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


    loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function() {
        loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function() {
            loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function() {
                loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function() {
                    loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js", function() {
                        loadScript(plugin_path + "chart.flot/jquery.flot.pie.min.js", function() {
                            loadScript(plugin_path + "chart.flot/jquery.flot.tooltip.min.js", function() {

                                $.plot($("#pieshow1"), dataSet, options);
                                $.plot($("#pieshow2"), dataSet2, options);
                                $.plot($("#pieshow3"), dataSet3, options);
                                //$.plot($("#pieshow3"), dataSet, options);
                                //$.plot($("#pieshow4"), dataSet, options);
                            });
                        });
                    });
                });
            });
        });
    });
</script>