<?php
    /*****************************************/
    //檔案名稱：ad_fun_gmem.php
    //後台對應位置：好好玩管理系統/金卡俱樂部(舊)
    //改版日期：2021.11.30
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");
 
    //程式開始 *****
	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}

    $mem_auto = SqlFilter($_REQUEST["mem_auto"],"int");
    $mem_au = SqlFilter($_REQUEST["mem_au"],"int");

    if($mem_au == "" && $mem_auto == ""){
        call_alert("會員編號讀取有誤。","ClOsE",0);
    }

    if($_REQUEST["st"] == "c1_save"){
        if($_REQUEST["mem_come"] == "add"){
            if($_REQUEST["mem_come_new"] != ""){
                $SQL = "select mem_come from goldcard_data where mem_come = '" .SqlFilter($_REQUEST["mem_come_new"],"tab")."'";
                $rs = $FunConn->query($SQL);
                $result = $rs->fetch();
                if($result){
                    call_alert("這個來源已經存在。",0,0);
                }
                $SQL = "update goldcard_data set mem_come = '" .SqlFilter($_REQUEST["mem_come_new"],"tab")."' where mem_auto='" .$mem_auto. "'";
                $rs = $FunConn->prepare($SQL);
                $rs->execute();                
            }else{
                call_alert("請輸入要新增的來源。",0,0);
            }
        }else{
            $SQL = "update goldcard_data set mem_come = '" .SqlFilter($_REQUEST["mem_come"],"tab")."' where mem_auto='" .$mem_auto. "'";
            $rs = $FunConn->prepare($SQL);
            $rs->execute(); 
        }
        reURL("win_close.php?m=修改中...");
    }

    if($_REQUEST["st"] == "c1"){
        echo "<script src='js/jquery-1.8.3.js'></script>";
        $SQL = "select mem_come from goldcard_data where mem_auto='" .$mem_auto. "'";
        $rs = $FunConn->query($SQL);
        $result = $rs->fetch();
        if($result){
            echo "目前來源：".$rs["mem_come"]."<br>";
        }
        echo "<form name='form1' method='post' action='ad_fun_gmem_detail.php?st=c1_save'>";
        echo "<select name='mem_come' id='mem_come'>";
        echo "<option value=''>請選擇</option>";
        $SQL = "select distinct mem_come from goldcard_data";
        $rs = $FunConn->query($SQL);
        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
        if($result){
            foreach($result as $re){
                if($re["mem_come"] != ""){
                    echo "<option value='".$re["mem_come"]."'>".$re["mem_come"]."</option>";
                }
            }            
        }
        echo "<option value='add'>新增</option>";
        echo "</select><span id='new_div'></span>";
        echo "<br><input type='hidden' name='mem_auto' value='".$mem_auto."'><input type='submit' value='送出'>";
        echo "</form>"; 
        ?>
        <script>
            $(function() {
                $("#mem_come").on("change", function() {
                if($(this).val() == "add") {
                    $("#new_div").append($("<input>").attr("name", "mem_come_new").attr("id", "mem_come_new").attr("type", "text"));
                } else {
                $("#new_div").empty();
                }
                });
            });
        </script>
        <?php
    }

    if($_REQUEST["st"] == "opp"){
        $SQL = "update goldcard_data set p1c=0,p2c=0,p3c=0 where mem_auto = '".$mem_auto."'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("ad_fun_gmem_detail.php?mem_auto=".$mem_auto);
        }
    }

    if($_REQUEST["st"] == "cpp"){
        $SQL = "update goldcard_data set p1c=1,p2c=1,p3c=1 where mem_auto = '".$mem_auto."'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("ad_fun_gmem_detail.php?mem_auto=".$mem_auto);
        }
    }

    if($mem_auto != ""){
        $SQL = "select * from goldcard_data where mem_auto = '" .$mem_auto. "'";
    }else{
        $SQL = "select * from goldcard_data where mem_auto = '" .$mem_au. "'";
    }
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if(!$result){
        call_alert("會員資料讀取有誤。", 0,0);
    }
    if($mem_au != ""){
        $mem_auto = $result["mem_auto"];
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_gmem.php">金卡俱樂部</a></li>
            <li class="active">會員詳細資料 - 編號 <?php echo $mem_auto; ?> - <?php echo $result["mem_name"]; ?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員詳細資料 - 編號 <?php echo $mem_auto; ?> - <?php echo $result["mem_name"]; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="92">
                                <div align="right">編號：</div>
                            </td>
                            <td width="267"><?php echo $result["mem_auto"]; ?></td>
                            <td>
                                <div align="right">姓名：</div>
                            </td>
                            <td><?php echo $result["mem_name"]; ?></td>
                        </tr>
                        <tr>
                            <td width="92">
                                <div align="right">帳號：</div>
                            </td>
                            <td width="267"><?php echo $result["mem_username"]; ?></td>
                            <td>
                                <div align="right">密碼：</div>
                            </td>
                            <td><?php echo $result["mem_pd"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">性別：</div>
                            </td>
                            <td><?php echo $result["mem_sex"]; ?></td>
                            <td>
                                <div align="right">來源：</div>
                            </td>
                            <td>
                                <?php 
                                    echo $result["mem_come"]; 
                                    if($result["mem_cc"] != ""){
                                        echo "[".$result["mem_cc"]."]";
                                    }
                                    if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"]== "branch" || $_SESSION["funtourpm"] == 1){
                                        echo "<a href=\"javascript:window.open('ad_fun_gmem_detail.php?st=c1&mem_auto=".$mem_auto."','','width=300,height=200,top=300,left=300');\">修改</a>";
                                    }
                                ?>                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">生日：</div>
                            </td>
                            <td><?php echo Date_EN($result["mem_by"],1); ?></td>
                            <td>
                                <div align="right">手機：</div>
                            </td>
                            <td><?php echo $result["mem_mobile"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">E-mail：</div>
                            </td>
                            <td><?php echo $result["mem_mail"]; ?></td>
                            <td>
                                <div align="right">星座：</div>
                            </td>
                            <td><?php echo $result["mem_star"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">地址：</div>
                            </td>
                            <td colspan="3"><?php echo $result["mem_area"]; ?>　<?php echo $result["mem_address"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">職業：</div>
                            </td>
                            <td><?php echo $result["mem_job1"]; ?></td>
                            <td>
                                <div align="right">學歷：</div>
                            </td>
                            <td><?php echo $result["mem_school"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">職務名稱：</div>
                            </td>
                            <td><?php echo $result["mem_job2"]; ?></td>
                            <td>
                                <div align="right">婚姻狀態：</div>
                            </td>
                            <td><?php echo $result["mem_marry"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">會館：</div>
                            </td>
                            <td><?php echo $result["mem_branch"]; ?></td>
                            <td>
                                <div align="right">秘書：</div>
                            </td>
                            <td><?php echo SingleName($result["mem_single"],"normal"); ?>（<a href="#" class="a1" onClick="Mars_popup('ad_fun_gmem_branch_fix.php?mem_auto=<?php echo $result["mem_auto"]; ?>&mem_branch=<?php echo $result["mem_branch"]; ?>','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=400,height=250,top=100,left=100')">修改</a>）</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">加入日期：</div>
                            </td>
                            <td><?php echo changeDate($result["mem_time"]); ?></td>
                        </tr>
                        <tr>
                            <td align="right">處理情形：</td>
                            <td colspan=3><?php echo $result["all_type"]; ?></td>
                        </tr>
                        <tr>
                            <td align="right">處理內容：</td>
                            <td colspan=3><?php echo $result["all_note"]; ?></td>
                        </tr>
                        <tr>
                            <td align="right">證件：</td>
                            <td colspan=3>
                                <div>身分證影本或照片正面<?php if($result["p1c"] != 1){echo "-可傳";}else{echo "-不可傳";} ?></div>
                                <?php 
                                    if($result["p1"] != ""){
                                        echo "<div><a href='http://www.funtour.com.tw/gmf.php?st=gimg&ma=".$result["mem_auto"]."&a=p1' class='fancybox'><img height='150' src='http://www.funtour.com.tw/gmf.php?st=gimg&ma=".$result["mem_auto"]."&a=p1' border=0></a></div>";
                                    }else{
                                        echo "<div>未上傳</div>";
                                    }
                                ?>
                                <div>身分證影本或照片反面<?php if($result["p2c"] != 1){echo "-可傳";}else{echo "-不可傳";} ?></div>
                                <?php 
                                    if($result["p1"] != ""){
                                        echo "<div><a href='http://www.funtour.com.tw/gmf.php?st=gimg&ma=".$result["mem_auto"]."&a=p2' class='fancybox'><img height='150' src='http://www.funtour.com.tw/gmf.php?st=gimg&ma=".$result["mem_auto"]."&a=p2' border=0></a></div>";
                                    }else{
                                        echo "<div>未上傳</div>";
                                    }
                                ?>
                                <div>工作證影本或照片<?php if($result["p3c"] != 1){echo "-可傳";}else{echo "-不可傳";} ?></div>
                                <?php 
                                    if($result["p1"] != ""){
                                        echo "<div><a href='http://www.funtour.com.tw/gmf.php?st=gimg&ma=".$result["mem_auto"]."&a=p3' class='fancybox'><img height='150' src='http://www.funtour.com.tw/gmf.php?st=gimg&ma=".$result["mem_auto"]."&a=p3' border=0></a></div>";
                                    }else{
                                        echo "<div>未上傳</div>";
                                    }
                                ?>
                                <?php 
                                    if($result["p1c"] == 0 || $result["p2c"] == 0 || $result["p3c"] == 0){
                                        echo "<div style='color:blue'>已開放會員上傳證件　<a href='?st=cpp&mem_auto=".$mem_auto."'>關閉上傳功能並審核完成，會員將無法使用上傳功能</a></div>"	;
                                    }else{
                                        echo "<div style='color:blue'>已關閉會員上傳證件　<a href='?st=opp&mem_auto=".$mem_auto."'>開放上傳供會員重新上傳正確證件</a></div>";
                                    }
                                    $mem_username = $result["mem_username"];
                                ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <?php 
                    if($mem_username != ""){
                        $SQL = "select top 10 * from love_keyin where k_user = '".$mem_username."' and all_kind='活動' order by action_time desc";
                        $rs = $FunConn->query($SQL);
                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                        if($result){ ?>
                            <p>活動記錄</p>  
                            <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                            <tr>
                                <th>活動時間</th>
                                <th>會館</th>
                                <th>標題</th>
                                <th>姓名</th>
                                <th>性別</th>
                                <th>區域</th>
                                <th>學歷</th>
                                <th></th>
                            </tr>
                            <?php 
                                foreach($result as $re){
                                    echo "<tr>";
                                    echo "<td>".changeDate($re["action_time"])."</td>";
                                    echo "<td>".$re["action_branch"]."</td>";
                                    echo "<td>".$re["action_title"]."</td>";
                                    echo "<td>".$re["k_name"]."</td>";
                                    echo "<td>".$re["k_sex"]."</td>";
                                    echo "<td>".$re["k_area"]."</td>";
                                    echo "<td>".$re["k_school"]."</td>";
                                    echo "<td><a href=\"javascript:Mars_popup('ad_fun_detail.php?k_id=".$re["k_id"]."','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=350,top=150,left=150');\">詳細資料</a></td>";
                                    echo "</tr>";
                                }
                            ?>                            
                        <?php }
                    }
                ?>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->

    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>