<?php
    /*****************************************/ 
    //檔案名稱：ad_market2.php
    //後台對應位置：管理系統/行銷活動統計
    //改版日期：2022.1.3
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
	if($_SESSION["MM_Username"] == "" ){ 
        call_alert("請重新登入。","login.php",0);
    }

    $marking_list = $_REQUEST["marking_list"];
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">行銷活動統計</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>行銷活動統計</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form action="?st=send" method="post" name="counts_form" id="counts_form" onsubmit="return check_form()">
                    <p>請選擇時段：<input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="<?php echo SqlFilter($_REQUEST["start_time"],"tab"); ?>">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="<?php echo SqlFilter($_REQUEST["end_time"],"tab"); ?>">　<select id="fasttime" onchange="fast_sel_time($(this).val())">
                            <option value="">快速選擇</option>
                            <option value="0">今天</option>
                            <option value="1">昨天</option>
                            <option value="2">前天</option>
                            <option value="3">本周</option>
                            <option value="4">上周</option>
                            <option value="5">本月</option>
                            <option value="6">上月</option>
                            <option value="7">今年</option>
                            <option value="8">去年</option>
                        </select></p>

                    <!--<a data-toggle="collapse" href="#marking_action_list" data-parent="#menu_group" class="btn btn-info">活動選擇</a>--><input id="send_submit" type="submit" class="btn btn-default margin-bottom-20" value="送出">
                    <div class="" id="marking_action_list">
                        <div>
                            <!--<label><input type="checkbox" id="allcheckbox"> 全選</label>
						  	<label><input type="checkbox" id="allcheckbox2"> 春天會館全選</label>
						  	<label><input type="checkbox" id="allcheckbox3"> DateMeNow全選</label>
						  	<label><input type="checkbox" id="allcheckbox4"> 約會專家全選</label>-->
                        </div>
                        <?php 
                            if($_REQUEST["st"] == "send"){
                                $stime = Date_EN(SqlFilter($_REQUEST["start_time"],"tab"),2) . " 00:00";
                                $etime = Date_EN(SqlFilter($_REQUEST["end_time"],"tab"),2) . " 23:59";
                                
                                if(count($marking_list) > 0 && count($marking_list) < 30){
                                    $marking_list = implode(",",$marking_list);
                                }else{
                                    call_alert("最多選擇 30 個活動。", 0, 0); 
                                }                                

                                $marking_listv = str_replace(",","','",$marking_list);
                                $marking_listv = "'".$marking_listv."'";

                                echo "<ul class='nav nav-tabs'>";
                                echo "<li class='nav-item active'>";
                                echo "<a class='nav-link' data-toggle='tab' href='#tab1'>結果</a>";
                                echo "</li>";
                                echo "<li class='nav-item'>";
                                echo "<a class='nav-link' data-toggle='tab' href='#tab2'>活動選擇</a>";
                                echo "</li>";
                                echo "</ul>";
                                echo "<div class='tab-content'>";

                                echo "<div id='tab1' class='tab-pane fade in active'>";
                                echo "<table class='table table-striped table-bordered bootstrap-datatable'>";
                                $SQL = "select * from marketing_list where auton in (".$marking_listv.") order by online_time desc";
                                $rs = $SPConn->prepare($SQL);
                                $rs->execute();
                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                if($result){
                                    echo "<tr><td>NO</td><td>活動名稱</td><td>上線日期</td><td>統計日期</td>";
                                    echo "<td>所有(男)</td><td>新(男)</td><td>所有(女)</td><td>新(女)</td><td>總名單數</td>";
                                    echo "<td>成交(男)</td><td>成交(男)金額</td><td>成交(女)</td><td>成交(女)金額</td><td>總成交數</td><td>總成交金額</td><td></td>";
                                    echo "</tr>";
                                    $num = 1;                                    
                                    for($i=1;$i<=11;$i++){
                                        ${"line".$i} = 0;
                                    }
                                    foreach($result as $re){
                                        $web = $re["web"];
                                        echo "<tr>";
                                        echo "<td>".$num."</td>";
                                        if($re["url"] != ""){
                                            $names = "<a href=\"".$re["url"]."\" target='_blank'>".$re["name"]."</a>";
                                        }else{
                                            $names = $re["name"];
                                        }
                                        echo "<td>".$names."</td>";
                                        echo "<td>".Date_EN($re["online_time"],1);
                                        if($re["end_time"] != ""){
                                            echo " - ".Date_EN($re["end_time"],1);
                                        }
                                        echo "</td>";
                                        echo "<td>".$stime." 至 ".$etime."</td>";
                                        if($re["web"] == "春天會館"){
                                            $vsql = " and mem_branch <> '八德'";
            	                            $vsql2 = " and all_branch <> '八德'";
                                            $subsql = "mem_come='行銷活動' and mem_come2='".$re["name"]."'";
                                        }elseif($re["web"] == "約會專家"){
                                            $vsql = "";
            	                            $vsql2 = "";
                                            $subsql = "mem_come='行銷活動' and mem_come2='".$re["name"]."'";
                                        }elseif($re["web"] == "迷你約"){
                                            $vsql = " and mem_branch = '迷你約'";
                                            $vsql2 = " and all_branch = '迷你約'";
                                            $subsql = "mem_come='迷你約' and mem_come2 like '%".$re["name"]."%'";
                                        }else{
                                            $vsql = " and mem_branch = '八德'";
            	                            $vsql2 = " and all_branch = '八德'";
                                            $subsql = "mem_come='行銷活動' and mem_come2='".$re["name"]."'";
                                        }
                                        $total1 = 0;
                                        $total2 = 0;
                                        $total3 = 0;
                                        $total_boy = 0;
                                        $total_girl = 0;
                                        // 所有男
                                        echo "<td>";
                                        $SQL2 = "select count(mem_auto) as vvt from member_data where ".$subsql." and mem_time between '".$stime."' and '".$etime."' and mem_sex='男'".$vsql;
                                        $rs2 = $SPConn->prepare($SQL2);
                                        $rs2->execute();
                                        $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                        if($result2){
                                            $vvt = $result2["vvt"];
                                        }else{
                                            $vvt = 0;
                                        }
                                        $total1 = $total1 + $vvt;
                                        $line1 = $line1 + $vvt;
                                        echo $vvt."</td>";
                                        // 所有新男
                                        echo "<td>";
                                        $SQL2 = "select count(mem_auto) as vvt from member_data as dba where ".$subsql." and mem_time between '".$stime."' and '".$etime."' and mem_sex='男'".$vsql." And ((SELECT count(mem_auto) FROM member_data Where mem_mobile = dba.mem_mobile".$vsql." and datediff(s, dba.mem_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where k_mobile = dba.mem_mobile".$vsql2.") <= 0)";
                                        $rs2 = $SPConn->prepare($SQL2);
                                        $rs2->execute();
                                        $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                        if($result2){
                                            $vvt = $result2["vvt"];
                                        }else{
                                            $vvt = 0;
                                        }
                                        $line2 = $line2 + $vvt;
                                        echo $vvt."</td>";
                                        // 所有女
                                        echo "<td>";
                                        $SQL2 = "select count(mem_auto) as vvt from member_data where ".$subsql." and mem_time between '".$stime."' and '".$etime."' and mem_sex='女'";
                                        $rs2 = $SPConn->prepare($SQL2);
                                        $rs2->execute();
                                        $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                        if($result2){
                                            $vvt = $result2["vvt"];
                                        }else{
                                            $vvt = 0;
                                        }
                                        $total1 = $total1 + $vvt;
                                        $line3 = $line3 + $vvt;
                                        echo $vvt."</td>";
                                        // 所有新女
                                        echo "<td>";
                                        $SQL2 = "select count(mem_auto) as vvt from member_data as dba where ".$subsql." and mem_time between '".$stime."' and '"
                                                .$etime."' and mem_sex='女'".$vsql." And ((SELECT count(mem_auto) FROM member_data Where mem_mobile = dba.mem_mobile".$vsql." and datediff(s, dba.mem_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where k_mobile = dba.mem_mobile".$vsql2.") <= 0)";
                                        $rs2 = $SPConn->prepare($SQL2);
                                        $rs2->execute();
                                        $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                        if($result2){
                                            $vvt = $result2["vvt"];
                                        }else{
                                            $vvt = 0;
                                        }
                                        $line4 = $line4 + $vvt;
                                        echo $vvt."</td>";
                                        echo "<td>".$total1."</td>";
                                        
                                        $line5 = $line5 + $total1;

                                        // 成交男
                                        echo "<td>";
                                        $SQL2 = "select count(mem_auto) as vvt from member_data where ".$subsql." and mem_time between '".$stime."' and '".$etime."' and mem_sex='男' and mem_level='mem'".$vsql;
                                        $rs2 = $SPConn->prepare($SQL2);
                                        $rs2->execute();
                                        $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                        if($result2){
                                            $vvt = $result2["vvt"];
                                        }else{
                                            $vvt = 0;
                                        }
                                        $total2 = $total2 + $vvt;
                                        $line6 = $line6 + $vvt;
                                        echo $vvt."</td>";

                                        // 成交男金額
                                        $total_boy = 0;
                                        $SQL2 = "select mem_num, vv from member_data outer apply (select SUM(pay_total2) as vv from pay_main where pay_user <> '' and pay_user=mem_username and pay_time > mem_time) pay_main where mem_come='行銷活動' and mem_sex='男' and mem_come2='".$re["name"]."' and mem_level='mem' and mem_time between '".$stime."' and '".$etime."'";
                                        $rs2 = $SPConn->prepare($SQL2);
                                        $rs2->execute();
                                        $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                        if($result2){
                                            foreach($result2 as $re2){
                                                if($re2["vv"] != ""){
                                                    $total_boy = $total_boy + round($re2["vv"]);
                                                }
                                            }
                                        }else{
                                            $total_boy = 0;
                                        }
                                        $line7 = $line7 + $total_boy;
                                        echo "<td>".$total_boy."</td>";

                                        // 成交女
                                        echo "<td>";
                                        $SQL2 = "select count(mem_auto) as vvt from member_data where ".$subsql." and mem_time between '".$stime."' and '".$etime."' and mem_sex='女' and mem_level='mem'".$vsql;
                                        $rs2 = $SPConn->prepare($SQL2);
                                        $rs2->execute();
                                        $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                        if($result2){
                                            $vvt = $result2["vvt"];
                                        }else{
                                            $vvt = 0;
                                        }
                                        $total2 = $total2 + $vvt;
                                        $line8 = $line8 + $vvt;
                                        echo $vvt."</td>";

                                        // 成交女金額
                                        $total_girl = 0;
                                        $SQL2 = "select mem_num, vv from member_data outer apply (select SUM(pay_total2) as vv from pay_main where pay_user <> '' and pay_user=mem_username and pay_time > mem_time) pay_main where mem_come='行銷活動' and mem_sex='女' and mem_come2='".$re["name"]."' and mem_level='mem' and mem_time between '".$stime."' and '".$etime."'".$vsql;
                                        $rs2 = $SPConn->prepare($SQL2);
                                        $rs2->execute();
                                        $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                        if($result2){
                                            foreach($result2 as $re2){
                                                if($re2["vv"] != ""){
                                                    $total_girl = $total_girl + round($re2["vv"]);
                                                }
                                            }
                                        }else{
                                            $total_girl = 0;
                                        }
                                        $line9 = $line9 + $total_girl;
                                        echo "<td>".$total_girl."</td>";
                                        $line10 = $line10 + $total2;
                                        echo "<td>".$total2."</td>";

                                        $total3 = 0;
                                        $SQL2 = "select mem_num, vv from member_data outer apply (select SUM(pay_total2) as vv from pay_main where pay_user <> '' and pay_user=mem_username and pay_time > mem_time) pay_main where ".$subsql." and mem_level='mem' and mem_time between '".$stime."' and '".$etime."'".$vsql;
                                        $rs2 = $SPConn->prepare($SQL2);
                                        $rs2->execute();
                                        $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                        if($result2){
                                            foreach($result2 as $re2){
                                                if($re2["vv"] != ""){
                                                    $total3 = $total3 + round($re2["vv"]);
                                                }
                                            }
                                        }else{
                                            $total3 = 0;
                                        }
                                        $line11 = $line11 + $total3;
                                        echo "<td>".$total3."</td>";
                                        echo "<td><a href=\"ad_market3.php?start_time=".$stime."&end_time=".$etime."&an=".$re["auton"]."\">開統</a></td>";
                                        echo "</tr>";
                                        $num = $num + 1;
                                    }
                                    echo "<tr><td>總計</td><td></td><td></td><td></td>";
                                    echo "<td>".$line1."</td><td>".$line2."</td><td>".$line3."</td><td>".$line4."</td><td>".$line5."</td>";
                                    echo "<td>".$line6."</td><td>".$line7."</td><td>".$line8."</td><td>".$line9."</td><td>".$line10."</td><td>".$line11."</td><td></td>";
                                    echo "</tr>";
                                    echo "</table>";
                                    echo "</div>";
                                    
                                    echo "<div id='tab2' class='tab-pane fade in'>";
                                    $SQL = "select * from marketing_list where web='".$web."' order by web asc, online_time desc";
                                    $rs = $SPConn->prepare($SQL);
                                    $rs->execute();
                                    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                    if($result){
                                        echo "<div id='tab1' class='tab-pane fade in active'>";
						  	            echo "<label><input type='checkbox' id='allcheckbox2'> 全選</label>";
                                        foreach($result as $re){
                                            if(member_array($marking_list,$re["auton"]) == 1){
                                                echo "<p><label><input type='checkbox' name='marking_list[]' data-web='".$re["web"]."' value='".$re["auton"]."' checked> [".$re["web"]."] ".$re["online_time"]." - ".$re["name"]."</label></p>";
                                            }else{
                                                echo "<p><label><input type='checkbox' name='marking_list[]' data-web='".$re["web"]."' value='".$re["auton"]."'> [".$re["web"]."] ".$re["online_time"]." - ".$re["name"]."</label></p>";
                                            }
                                        }
                                        echo "</div>";
                                    }
                                    echo "</div>";
                                    echo "</div>";
                                }
                            }else{ ?>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item active">
                                        <a class="nav-link" data-toggle="tab" href="#tab1">春天會館</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab2">DateMeNow</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab3">約會專家</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab4">迷你約</a>
                                    </li>
                                </ul>
                                <div class="tab-content" style="padding-top:20px;">
                                    <?php 
                                        // 春天會館
                                        $SQL = "select * from marketing_list where web='春天會館' order by web asc, online_time desc";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                        if($result){
                                            echo "<div id='tab1' class='tab-pane fade in active'>";
						  	                echo "<label><input type='checkbox' id='allcheckbox2'> 全選</label>";
                                            foreach($result as $re){
                                                if(member_array($marking_list,$re["auton"]) == 1){
                                                    echo "<p><label><input type='checkbox' name='marking_list[]' data-web='".$re["web"]."' value='".$re["auton"]."' checked> [".$re["web"]."] ".Date_EN($re["online_time"],1)." - ".$re["name"]."</label></p>";
                                                }else{
                                                    echo "<p><label><input type='checkbox' name='marking_list[]' data-web='".$re["web"]."' value='".$re["auton"]."'> [".$re["web"]."] ".Date_EN($re["online_time"],1)." - ".$re["name"]."</label></p>";
                                                }
                                            }
                                            echo "</div>";
                                        }

                                        // DMN
                                        $SQL = "select * from marketing_list where web='DateMeNow' order by web asc, online_time desc";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                        if($result){
                                            echo "<div id='tab2' class='tab-pane fade in active'>";
						  	                echo "<label><input type='checkbox' id='allcheckbox3'> 全選</label>";
                                            foreach($result as $re){
                                                if(member_array($marking_list,$re["auton"]) == 1){
                                                    echo "<p><label><input type='checkbox' name='marking_list[]' data-web='".$re["web"]."' value='".$re["auton"]."' checked> [".$re["web"]."] ".Date_EN($re["online_time"],1)." - ".$re["name"]."</label></p>";
                                                }else{
                                                    echo "<p><label><input type='checkbox' name='marking_list[]' data-web='".$re["web"]."' value='".$re["auton"]."'> [".$re["web"]."] ".Date_EN($re["online_time"],1)." - ".$re["name"]."</label></p>";
                                                }
                                            }
                                            echo "</div>";
                                        }

                                        // 約會專家
                                        $SQL = "select * from marketing_list where web='約會專家' order by web asc, online_time desc";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                        if($result){
                                            echo "<div id='tab3' class='tab-pane fade in active'>";
						  	                echo "<label><input type='checkbox' id='allcheckbox4'> 全選</label>";
                                            foreach($result as $re){
                                                if(member_array($marking_list,$re["auton"]) == 1){
                                                    echo "<p><label><input type='checkbox' name='marking_list[]' data-web='".$re["web"]."' value='".$re["auton"]."' checked> [".$re["web"]."] ".Date_EN($re["online_time"],1)." - ".$re["name"]."</label></p>";
                                                }else{
                                                    echo "<p><label><input type='checkbox' name='marking_list[]' data-web='".$re["web"]."' value='".$re["auton"]."'> [".$re["web"]."] ".Date_EN($re["online_time"],1)." - ".$re["name"]."</label></p>";
                                                }
                                            }
                                            echo "</div>";
                                        }

                                        // 迷你約
                                        $SQL = "select * from marketing_list where web='迷你約' order by web asc, online_time desc";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                        if($result){
                                            echo "<div id='tab4' class='tab-pane fade in active'>";
						  	                echo "<label><input type='checkbox' id='allcheckbox5'> 全選</label>";
                                            foreach($result as $re){
                                                if(member_array($marking_list,$re["auton"]) == 1){
                                                    echo "<p><label><input type='checkbox' name='marking_list[]' data-web='".$re["web"]."' value='".$re["auton"]."' checked> [".$re["web"]."] ".Date_EN($re["online_time"],1)." - ".$re["name"]."</label></p>";
                                                }else{
                                                    echo "<p><label><input type='checkbox' name='marking_list[]' data-web='".$re["web"]."' value='".$re["auton"]."'> [".$re["web"]."] ".Date_EN($re["online_time"],1)." - ".$re["name"]."</label></p>";
                                                }
                                            }
                                            echo "</div>";
                                        }
                                    ?>
                                </div>
                            </div>
                            
                        <?php }
                        ?>
                    </form>
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

<script type="text/javascript">
    $(function() {

        $("#allcheckbox").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='marking_list[]']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='marking_list']").each(function() {
                    $(this).prop("checked", false);
                });
        });

        $("#allcheckbox2").on("click", function() {
            $("#allcheckbox3, #allcheckbox4, input[name='marking_list']").prop("checked", false);
            if ($(this).prop("checked"))
                $("input[name='marking_list[]']").each(function() {
                    if ($(this).data("web") == "春天會館") $(this).prop("checked", true);
                });
            else
                $("input[name='marking_list[]']").each(function() {
                    if ($(this).data("web") == "春天會館") $(this).prop("checked", false);
                });
        });

        $("#allcheckbox3").on("click", function() {
            $("#allcheckbox2, #allcheckbox4, input[name='marking_list']").prop("checked", false);
            if ($(this).prop("checked"))
                $("input[name='marking_list[]']").each(function() {
                    if ($(this).data("web") == "DateMeNow") $(this).prop("checked", true);
                });
            else
                $("input[name='marking_list[]']").each(function() {
                    if ($(this).data("web") == "DateMeNow") $(this).prop("checked", false);
                });
        });

        $("#allcheckbox4").on("click", function() {
            $("#allcheckbox2, #allcheckbox3, input[name='marking_list']").prop("checked", false);
            if ($(this).prop("checked"))
                $("input[name='marking_list[]']").each(function() {
                    if ($(this).data("web") == "約會專家") $(this).prop("checked", true);
                });
            else
                $("input[name='marking_list[]']").each(function() {
                    if ($(this).data("web") == "約會專家") $(this).prop("checked", false);
                });
        });
        $("#allcheckbox5").on("click", function() {		
            $("#allcheckbox2, #allcheckbox3, #allcheckbox4, input[name='marking_list']").prop("checked", false);
            if($(this).prop("checked")) 
                $("input[name='marking_list[]']").each(function() {
                    if($(this).data("web") == "迷你約") $(this).prop("checked", true);
                });
            else
                $("input[name='marking_list[]']").each(function() {
                    if($(this).data("web") == "迷你約") $(this).prop("checked", false);
                });
        });

    });
    Date.prototype.DateAdd = function(strInterval, Number) {
        var dtTmp = this;
        switch (strInterval) {
            case 's':
                return new Date(Date.parse(dtTmp) + (1000 * Number));
            case 'n':
                return new Date(Date.parse(dtTmp) + (60000 * Number));
            case 'h':
                return new Date(Date.parse(dtTmp) + (3600000 * Number));
            case 'd':
                return new Date(Date.parse(dtTmp) + (86400000 * Number));
            case 'w':
                return new Date(Date.parse(dtTmp) + ((86400000 * 7) * Number));
            case 'q':
                return new Date(dtTmp.getFullYear(), (dtTmp.getMonth()) + Number * 3, dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());
            case 'm':
                return new Date(dtTmp.getFullYear(), (dtTmp.getMonth()) + Number, dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());
            case 'y':
                return new Date((dtTmp.getFullYear() + Number), dtTmp.getMonth(), dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());
        }
    }

    function check_form() {
        if (!$("#start_time").val()) {
            alert("請輸入開始時段。");
            $("#start_time").focus();
            return false;
        }
        if (!$("#end_time").val()) {
            alert("請輸入結束時段。");
            $("#end_time").focus();
            return false;
        }
        if (isNaN(Date.parse($("#start_time").val()))) {
            alert("你輸入的開始時段不是日期格式。");
            $("#start_time").val("");
            $("#start_time").focus();
            return false;
        }
        if (isNaN(Date.parse($("#end_time").val()))) {
            alert("你輸入的結束時段不是日期格式。");
            $("#end_time").val("");
            $("#end_time").focus();
            return false;
        }
        if ($("input[name='marking_list[]']:checked").length <= 0) {
            alert("請選擇活動。");
            $("#marking_action_list").collapse("show");
            return false;
        }
        return true;
    }

    function GetDateStr(AddDayCount) {
        var dd = new Date();
        dd.setDate(dd.getDate() + AddDayCount);
        return dd.pattern("yyyy-MM-dd");
    }
    Date.prototype.pattern = function(fmt) {
        var o = {
            "M+": this.getMonth() + 1, //月份     
            "d+": this.getDate(), //日     
            "h+": this.getHours() % 12 == 0 ? 12 : this.getHours() % 12, //小?     
            "H+": this.getHours(), //小?     
            "m+": this.getMinutes(), //分     
            "s+": this.getSeconds(), //秒     
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度     
            "S": this.getMilliseconds() //毫秒     
        };
        var week = {
            "0": "\u65e5",
            "1": "\u4e00",
            "2": "\u4e8c",
            "3": "\u4e09",
            "4": "\u56db",
            "5": "\u4e94",
            "6": "\u516d"
        };
        if (/(y+)/.test(fmt)) {
            fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        }
        if (/(E+)/.test(fmt)) {
            fmt = fmt.replace(RegExp.$1, ((RegExp.$1.length > 1) ? (RegExp.$1.length > 2 ? "\u661f\u671f" : "\u5468") : "") + week[this.getDay() + ""]);
        }
        for (var k in o) {
            if (new RegExp("(" + k + ")").test(fmt)) {
                fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
            }
        }
        return fmt;
    }
    var today = new Date();
    var _day = 1000 * 60 * 60 * 24;

    this.getThisWeekDate = getThisWeekDate;
    this.getPrevWeekDate = getPrevWeekDate;
    this.getThisMonthDate = getThisMonthDate;
    this.getPrevMonthDate = getPrevMonthDate;
    this.getThisYearDate = getThisYearDate;
    this.getPrevYearDate = getPrevYearDate;

    function getThisWeekDate() {
        // 第一天日期
        var firstDay = new Date(today - (today.getDay() - 1) * _day);
        // 最后一天日期
        var lastDay = new Date((firstDay * 1) + 6 * _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getPrevWeekDate() {
        // 取上周?束日期
        var lastDay = new Date(today - (today.getDay()) * _day);
        // 取上周?始日期
        var firstDay = new Date((lastDay * 1) - 6 * _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getThisMonthDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(), today.getMonth() + 1, 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getPrevMonthDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(), today.getMonth() - 1, 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(), today.getMonth(), 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getThisYearDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(), 0, 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear() + 1, 0, 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getPrevYearDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear() - 1, 0, 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(), 0, 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function fast_sel_time(flag) {
        switch (flag) {
            case "0":
                $("#start_time").val(GetDateStr(0));
                $("#end_time").val(GetDateStr(0));
                break;
            case "1":
                $("#start_time").val(GetDateStr(-1));
                $("#end_time").val(GetDateStr(-1));
                break;
            case "2":
                $("#start_time").val(GetDateStr(-2));
                $("#end_time").val(GetDateStr(-2));
                break;
            case "3":
                $("#start_time").val(getThisWeekDate()[0]);
                $("#end_time").val(getThisWeekDate()[1]);
                break;
            case "4":
                $("#start_time").val(getPrevWeekDate()[0]);
                $("#end_time").val(getPrevWeekDate()[1]);
                break;
            case "5":
                $("#start_time").val(getThisMonthDate()[0]);
                $("#end_time").val(getThisMonthDate()[1]);
                break;
            case "6":
                $("#start_time").val(getPrevMonthDate()[0]);
                $("#end_time").val(getPrevMonthDate()[1]);
                break;
            case "7":
                $("#start_time").val(getThisYearDate()[0]);
                $("#end_time").val(getThisYearDate()[1]);
                break;
            case "8":
                $("#start_time").val(getPrevYearDate()[0]);
                $("#end_time").val(getPrevYearDate()[1]);
                break;
        }
    }
</script>