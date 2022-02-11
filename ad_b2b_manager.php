<?php
    /*****************************************/
    //檔案名稱：ad_b2b_manager.php
    //後台對應位置：管理系統/通路管理
    //改版日期：2022.2.7
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/
    require_once("_inc.php");
    require_once("./include/_function.php");
    // 刪除視窗
    if($_REQUEST["st"] == "fulldel"){
        echo "<table width='300'>";
        echo "<form name='form1' method='post' action='?st=fulldel2'>";
        echo "<tr><td>請輸入管理密碼：<input type='password' name='delpd'><input type='hidden' name='an' value='".SqlFilter($_REQUEST["an"],"int")."'></td></tr>";
        echo "<tr><td><input type='submit' value='確定送出'></td></tr>";
        echo "</form></table>";
        exit();
    }
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }
    if($_SESSION["MM_UserAuthorization"] != "admin"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    // 刪除
    if($_REQUEST["st"] == "fulldel2"){
        if($_REQUEST["delpd"] != "springclubadmin"){
            reURL("reload_window.php?m=管理密碼錯誤。");
        }
        $SQL = "select * from b2b_manager WHERE auton='".SqlFilter($_REQUEST["an"],"int")."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $uid = $result["uid"];
            // 刪除圖檔
            if($result["qrcode"] != ""){
                DelFile(("singleparty_channel/qrcode_".$result["uid"].".jpg")); 
            }
            // 刪除資料
            $SQL = "DELETE from b2b_manager WHERE auton='".SqlFilter($_REQUEST["an"],"int")."'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
        }
        // 紀錄刪除帳號log
        $msg = "刪除帳號 - 由".$_SESSION["p_other_name"];
        $SQL = "INSERT INTO b2b_manager_log (uid, msg, times, who, whoid) VALUES ('".$uid."', '".$msg."', '".date("Y/m/d H:i:s")."', '".$_SESSION["p_other_name"]."', '".$_SESSION["MM_Username"]."')";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("reload_window.php?m=刪除資料...");
        }       
    }    
    
    if($_REQUEST["keyword"] != ""){
        $keyword = SqlFilter($_REQUEST["keyword"],"tab");
        $sqlss = $sqlss . " and (uid like '%".$keyword."%' or name like '%".$keyword."%')";
    }
    if($_REQUEST["single"] != ""){
        $single = SqlFilter($_REQUEST["single"],"tab");
        $sqlss = $sqlss . " and (csingle = '".$single."')";
    }

    // 計算總筆數
    $sqls2 = "SELECT count(auton) as total_size FROM b2b_manager Where 1=1";
    $sqls2 = $sqls2 . $sqlss;
    $rs = $SPConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);                    
    if($result){
        $total_size =  $result["total_size"];
    }else{
        $total_size = 0;
    }

    $tPage = 1; //目前頁數
    $tPageSize = 20; //每頁幾筆
    if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
    $tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
    if ( $tPageSize*$tPage < $total_size ){
        $page2 = 20;
    }else{
        $page2 = (20-(($tPageSize*$tPage)-$total_size));
    }

    // SQL
    $sqls = "SELECT * FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM b2b_manager where 1=1";
    $sqls = $sqls . $sqlss . " order by auton desc ) t1 order by auton ) t2 order by auton desc";  
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">通路管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>通路管理 - 數量：<?php echo $total_size; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>
                            <a href="ad_b2b_manager_add.php" class="btn btn-success">新增資料</a>
                            <input type="text" name="keyword" class="form-control" placeholder="名稱/代號關鍵字" value="">
                            <select name="branch" id="branch">
                                <option value="">上線會館</option>
                                <?php
                                    $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' Order By admin_SOrt";
                                    $rs = $SPConn->prepare($SQL);
                                    $rs->execute();
                                    $result=$rs->fetchAll(PDO::FETCH_ASSOC);                                
                                    foreach($result as $re){     
                                        echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";                               
                                    }                                           
                                ?>
                            </select>
                            <select name="single" id="single">
                                <option value="">請選擇</option>
                            </select>
                            <input type="submit" name="Submit" class="btn btn-default" value="送出">
                        </p>
                    </form>

                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width="60">審核</th>
                            <th>姓名</th>
                            <th>代號</th>
                            <th>類型</th>
                            <th>上線</th>
                            <th>分享連結</th>
                            <th width="100">　</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $rs = $SPConn->prepare($sqls);
                            $rs->execute();
                            $result=$rs->fetchAll(PDO::FETCH_ASSOC); 
                            if($result){
                                $SS = 0;
                                foreach($result as $re){     
                                    if($re["review"] == "1"){
                                        $review = "<span class='label label-success'>通過</span>";
                                    }elseif($re["review"] == "2"){
                                        $review = "<span class='label label-warning'>關閉</span>";
                                    }else{
                                        $review = "<span class='label label-danger'>未審</span>";
                                    }
                                    $SS = $SS + 1;
                                    ?>
                                        <tr> 
                                            <td><?php echo $review; ?></td>
                                            <td><?php echo $re["name"]; ?></td>
                                            <td><?php echo $re["uid"]; ?></td>
                                            <td><?php echo $re["lv"]; ?></td>
                                            <td>
                                                <?php
                                                    if($re["cbranch"] != ""){
                                                        echo $re["cbranch"];
                                                    }
                                                    if($re["csingle"] != ""){
                                                        echo "-".SingleName($re["csingle"],"normal");
                                                    }                                                    
                                                ?>
                                            </td>
                                            <td>
                                                https://www.singleparty.com.tw/?ch=<?php echo $re["uid"]; ?>&nbsp;
                                                <?php 
                                                    if($re["qrcode"] != ""){ ?>
                                                        <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_<?php echo $SS; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            顯示 QRCode
                                                        </a>
                                                        <div class="collapse" id="qrcodeshow_<?php echo $SS; ?>">
                                                            <img src="https://www.singleparty.com.tw/channel/<?php echo $re["qrcode"]; ?>">
                                                        </div>
                                                    <?php }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li><a href="ad_b2b_manager_add.php?an=<?php echo $re["auton"]; ?>"><i class="icon-camera"></i> 修改</a></li>                           
                                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=<?php echo $re["auton"]; ?>','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr> 
                                <?php } 
                            }else{
                                echo "<tr><td colspan=8 height=200>目前沒有資料</td></tr>";
                            }        
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- 頁碼 -->
            <?php require_once("./include/_page.php"); ?>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>

<script type="text/javascript">
    $(function() {


        $("#cbranch").on("change", function() {
            personnel_get("cbranch", "csingle");
        });
    });
</script>