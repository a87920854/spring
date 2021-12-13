<?php
    /*****************************************/
    //檔案名稱：ad_fun_action_fast.php
    //後台對應位置：好好玩管理系統/好好玩國外團控>出團情報
    //改版日期：2021.12.9
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

    // 刪除
    if($_REQUEST["st"] == "del"){
        $SQL = "delete from travel_fast where auton=".SqlFilter($_REQUEST["a"],"tab");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=刪除中...");
            exit();
        }
    }

    // 新增
    if($_REQUEST["st"] == "add"){
        $SQL = "select stype, skingdom, ac_title from actionf_data where ac_auto=".SqlFilter($_REQUEST["ac_auto"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $stype = $result["stype"];
            $skingdom = $result["skingdom"];
            $ac_title = $result["ac_title"];
        }
        $people = SqlFilter($_REQUEST["people"],"tab");
        if(is_numeric($people)){
            if($people == "0"){
                $people = "即將額滿";
            }else{
                $people = "滿 ".$people." 人出團";
            }
        }else{
            $people = SqlFilter($_REQUEST["people"],"tab");
        }
        $SQL =  "INSERT INTO travel_fast (dates, stype, skingdom, sp, title, people, notes, ac_auto) VALUES ('"
                .SqlFilter($_REQUEST["dates"],"tab")."', '"
                .$stype."', '"
                .$skingdom."', '"
                .SqlFilter($_REQUEST["sp"],"tab")."', '"
                .$ac_title."', '"
                .$people."', '"
                .SqlFilter($_REQUEST["notes"],"tab")."', '"
                .SqlFilter($_REQUEST["ac_auto"],"int")."')";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("ad_fun_action_fast.php");
            exit();
        }
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action_list2.php">好好玩國外團控</a></li>
            <li class="active">出團情報</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>出團情報</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                    <tbody>
                        <tr>
                            <td>月份</td>
                            <td>出發日期</td>
                            <td>類 型</td>
                            <td>旅遊國家</td>
                            <td>重點特色</td>
                            <td>團 名</td>
                            <td>出團人數</td>
                            <td>備 註</td>
                            <td></td>
                        </tr>
                        <?php                             
                            $SQL = "select * from travel_fast order by dates asc";
                            $rs = $FunConn->prepare($SQL);
                            $rs->execute();
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=8>無資料</td></tr>";
                            }else{
                                $cc = 1;
                                $msgs = "";
                                $f = $rs->rowCount();
                                $full_date = [null,null,null,null,null,null,null,null,null,null,null,null,null];
                                foreach($result as $re){
                                    $dates = Date_EN($re["dates"],1);
                                    $nowmm = date("n",strtotime($dates));
                                    if($nowmm == $lastmm){
                                        $cc = $cc+1;
                                        $full_date[$nowmm] = $cc;
                                    }else{
                                        $lastmm = $nowmm;       	
                  	                    $cc = 1;
                                    }
                                    $msgs = $msgs . "<tr><td ROWSPANS_".$nowmm."_".$cc.">".monthname($nowmm)."</td><td>".$dates."</td><td>".$re["stype"]."</td><td>".$re["skingdom"]."</td><td id='sp_".$re["auton"]."'>".$re["sp"]." <a href='#p' onclick=\"edit_set('sp', '".$re["auton"]."');\"><i class='icon-pencil'></i></a></td><td>".$re["title"]."</td><td id='people_".$re["auton"]."'>".$re["people"]." <a href='#p' onclick=\"edit_set('people', '".$re["auton"]."');\"><i class='icon-pencil'></i></a></td><td id='notes_".$re["auton"]."'>".$re["notes"]." <a href='#p' onclick=\"edit_set('notes', '".$re["auton"]."');\"><i class='icon-pencil'></i></a></td>" . PHP_EOL;
                                    $msgs = $msgs . "<td>" . PHP_EOL;
                                    $msgs = $msgs . "<div class='btn-group'>" . PHP_EOL;
                                    $msgs = $msgs . "<button class='btn btn-default dropdown-toggle' data-toggle='dropdown'>功能 <span class='caret'></span></button>" . PHP_EOL;
                                    $msgs = $msgs . "<ul class='dropdown-menu pull-right'>" . PHP_EOL;                                    
                                    $msgs = $msgs . "<li><a href=\"javascript:Mars_popup2('ad_fun_action_fast.php?st=del&a=".$re["auton"]."','','width=300,height=200,top=100,left=100')\"><i class='icon-remove-sign'></i> 刪除</a></li>" . PHP_EOL;                                    
                                    $msgs = $msgs . "</ul></div>" . PHP_EOL;
                                    $msgs = $msgs . "</td></tr>" . PHP_EOL;
                                }
                                for($i=0; $i<= count($full_date); $i++){
                                    $fvs = $full_date[$i];
                                    if($fvs > 1){
                                        $vv = "ROWSPANS_".$i."_1";           		
                                        $msgs = str_replace($vv, "class='travel_table_month' rowspan=".$fvs, $msgs);
                                        for($j=1;$j<=$fvs;$j++){
                                            $vv = "ROWSPANS_".$i."_".$j;
                                            $msgs = str_replace($vv, "style='display:none'",$msgs);
                                        }
                                    }                                    
                                }
                                echo $msgs;
                            }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                    <tbody>
                        <tr>
                            <td>
                                <form id="addform" action="?st=add" method="post" target="_self" class="form-inline" onsubmit="return chk_form()">
                                    <select name="ac_auto" id="ac_auto" class="width-150">
                                        <option value="">請選擇</option>       
                                        <?php 
                                            $SQL = "select ac_auto, ac_kind, stype, skingdom, ac_title from actionf_data order by stype desc, ac_auto desc";
                                            $rs = $FunConn->prepare($SQL);
                                            $rs->execute();
                                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                            if($result){
                                                foreach($result as $re){
                                                    echo "<option value='".$re["ac_auto"]."'>".$re["stype"]."-".$re["skingdom"]."-".$re["ac_kind"]."-".$re["ac_title"]."</option>";
                                                }                                                
                                            }
                                        ?>
                                    </select>
                                    <span id="ac_auto_div"></span>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <hr>
    
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $mtu = "ad_fun_action_list2.";
    $(function() {
        $("#ac_auto").val("");
        var $ac_auto_div = $("#ac_auto_div");
        $("#ac_auto").on("change", function() {
            $ac_auto_div.empty();
            var $tval = $(this).val();
            if (!$tval) return false;
            var $s1 = $("<select>").attr("id", "dates").attr("name", "dates");
            $s1.append($("<option></option>").attr("value", "").text("請選擇"));
            $.ajax({
                type: "POST",
                url: "ad_fun_action_fast_ajax.php",
                data: {
                    st: "get_travel",
                    ac_auto: $tval
                },
                error: function(xhr) {},
                success: function(response) {
                    if (response == "error") {
                        alert("日期讀取錯誤或不存在日期資料。");
                        $ac_auto_div.empty();
                        $("#ac_auto").val("");
                    } else {

                        $.each(response.split(","), function(key, value) {
                            $s1.append($("<option></option>").attr("value", value).text(value));
                        });
                    }
                }
            });
            $ac_auto_div.append($s1);
            $i1 = $("<input>").attr("name", "sp").attr("id", "sp").attr("placeholder", "重點特色").addClass("form-control");
            $i2 = $("<input>").attr("name", "people").attr("id", "people").attr("placeholder", "出團人數,即將額滿輸入0").addClass("form-control");
            $i3 = $("<input>").attr("name", "notes").attr("id", "notes").attr("placeholder", "備註").css("width", "250px").addClass("form-control");
            $i4 = $("<input>").attr("type", "submit").val("新增").addClass("btn").addClass("btn-default");

            $ac_auto_div.append($i1);
            $ac_auto_div.append($i2);
            $ac_auto_div.append($i3);
            $ac_auto_div.append($i4);
            $s1.on("change", function() {
                if (!$(this).val()) return false;
                $.ajax({
                    type: "POST",
                    url: "ad_fun_action_fast_ajax.php",
                    data: {
                        st: "get_travel_note",
                        ac_auto: $tval,
                        dates: $(this).val()
                    },
                    error: function(xhr) {},
                    success: function(response) {
                        $i3.val(response);
                    }
                });
            });
        });
    });

    function chk_form() {
        if (!$("#dates").val()) {
            alert("請選擇日期。");
            return false;
        }
        return true;
    }

    function edit_set(tt, dd) {
        var $ediv = $("#" + tt + "_" + dd);
        $ediv.data("oldhtml", $ediv.find("a").clone());
        $ediv.find("a").remove();
        $ehtml = $.trim($ediv.html());
        $ediv.empty();

        var $ninput_name = dd + "_input";
        var $ninput = $("<input>").attr("type", "text").attr("id", $ninput_name).attr("name", $ninput_name).val($ehtml);
        $ediv.append($ninput);
        $ninput.on("blur", function() {
            save_set(tt, dd);
        }).keypress(function(e) {
            var $code = (e.keyCode ? e.keyCode : e.which);
            if ($code == 13) {
                save_set(tt, dd);
            }
        });
        $ninput.focus();
    }

    function save_set(tt, dd) {
        var $ediv = $("#" + tt + "_" + dd);
        var $ninput_name = dd + "_input";
        var $sinput = $("#" + $ninput_name),
            $savemsg = $("<div>儲存中..</div>");
        if ($sinput.length > 0) {
            $ediv.append($savemsg);
            $.ajax({
                type: "POST",
                url: "ad_fun_action_fast_ajax.php",
                data: {
                    st: "save_edit",
                    t: tt,
                    dd: dd,
                    v: $sinput.val()
                },
                error: function(xhr) {},
                success: function(response) {
                    $savemsg.remove();
                    $ediv.html(response);
                    $ediv.append($ediv.data("oldhtml"));

                }
            });
        }
    }
</script>