<?php
    /*****************************************/
    //檔案名稱：ad_b2b_mem.php
    //後台對應位置：好好玩管理系統/同業會員資料
    //改版日期：2021.12.21
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

    // 修改
    if($_REQUEST["st"] == "fix"){
        $SQL = "update b2b_member set mem_fix=".SqlFilter($_REQUEST["v"],"tab")."'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=變更中...");
        }
    }

    // 刪除
    if($_REQUEST["st"] == "del"){
        $SQL = "delete from b2b_member where auton=".SqlFilter($_REQUEST["auton"],"int")."'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=刪除中...");
        }
    }

    $default_sql_num = 500;

    if($_REQUEST["vst"] == "full"){
        $sqlv = "*";
        $sqlv2 = "count(auton)";
    }else{
        $sqlv = "top ".$default_sql_num." *";
        $sqlv2 = "count(auton)";
    }

	$sqls2 = "SELECT ".$sqlv2." as total_size FROM b2b_member WHERE 1=1";

    if($_REQUEST["s1"] != ""){
        $sqlss = $sqlss . " and (mem_name2 like '%".SqlFilter($_REQUEST["s1"],"tab")."%' or mem_name3 like '%".SqlFilter($_REQUEST["s1"],"tab")."%')";
    }

    if($_REQUEST["s2"] != ""){
        $cs2 = reset_number(SqlFilter($_REQUEST["s2"],"tab"));
        $sqlss = $sqlss . " and (mem_phone like '%".$cs2."%' or mem_mobile like '%".$cs2."%')";
    }

    if($_REQUEST["s3"] != ""){
        $sqlss = $sqlss . " and mem_name like N'%".SqlFilter($_REQUEST["s3"],"tab")."%'";
    }
    // 總筆數
    $sqls2 = $sqls2 . $sqlss;

    $rs = $FunConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if (!$result){
        $total_size = 0;
    }else{
        if( $_REQUEST["vst"] == "full" ){
            $total_size = $result["total_size"]; //總筆數
        }else{
            if($result["total_size"] > 500 ) {
                $total_size =  500; //限制到500筆
            }else{
                $total_size =  $result["total_size"];
            }   
        }
    }	
    $tPage = 1; //目前頁數
    $tPageSize = 50; //每頁幾筆
	if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
	$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
	if ( $tPageSize*$tPage < $total_size ){
		$page2 = 50;
	}else{
		$page2 = (50-(($tPageSize*$tPage)-$total_size));	}

    // sql
    $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM b2b_member WHERE 1 = 1";
    $sqls = $sqls . $sqlss ." order by auton desc ) t1 order by auton) t2 order by auton desc";

    if($_SESSION["MM_UserAuthorization"] == "pay"){
        $total_size = 10;
    }
    
    if( $_REQUEST["vst"] == "full" ){
        $total_size = $total_size . "　<a href='?vst=n'>[查看前五百筆]</a>";
    }else{
        if( $total_size > 500 ) $total_size = 500;
        $total_size = $total_size . "　<a href='?vst=full'>[查看完整清單]</a>";
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">同業會員資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>同業列表 - 數量：<?php echo $total_size; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="ad_b2b_mem_fix.php?st=add" target="_blank"><i class="icon-star"></i> 新增同業資料</a></li>
                        </ul>
                    </div>　

                    <form id="searchform" action="ad_b2b_mem.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" class="form-control">
                            <option value="s2">手機</option>
                            <option value="s1">公司名稱</option>
                            <option value="s3">姓名</option>
                        </select>
                        <input name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" class="btn btn-default" value="送出">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th>同業簡稱</th>
                            <th>統一編號</th>
                            <th>姓名</th>
                            <th>帳號</th>
                            <th>密碼</th>
                            <th>手機</th>
                            <th>電子信箱</th>
                            <th>業務窗口</th>
                            <th>審核</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $rs = $FunConn->prepare($sqls);                            
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=10 height=200>目前沒有資料</td></tr>";
                            }else{ 
                                foreach($result as $re){ ?>
                                    <tr>
                                        <td class="center"><?php echo $re["mem_name2"]; ?></td>
                                        <td><?php echo $re["mem_num"]; ?></td>
                                        <td class="center"><a href="ad_b2b_mem_detail.php?auton=<?php echo $re["auton"]; ?>" target="_blank"><?php echo $re["mem_name"]; ?></a></td>
                                        <td class="center"><?php echo $re["mem_user"]; ?></td>
                                        <td class="center"><?php echo $re["mem_passwd"]; ?></td>
                                        <td class="center"><?php echo $re["mem_mobile"]; ?></td>
                                        <td class="center"><?php echo $re["mem_mail"]; ?></td>
								        <td class="center">
                                            <?php 
                                                if($re["mem_fix"] == 1){
                                                    if($re["mem_single"] != ""){
                                                        echo $re["mem_name4"]."　<a href=\"javascript:Mars_popup('ad_b2b_mem_send.php?auton=".$re["auton"]."','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');\">修改</a>";
                                                    }else{
                                                        echo "<a href=\"javascript:Mars_popup('ad_b2b_mem_send.php?auton=".$re["auton"]."','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');\">配發窗口</a>";
                                                    }
                                                }else{
                                                    echo "未審無窗口";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if($re["mem_fix"] == 1){
                                                    echo "審核通過<br><a href=\"javascript:Mars_popup('ad_b2b_mem.asp?st=fix&v=0&auton=".$re["auton"]."','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=200,height=150,top=10,left=10');\">變更未審</a>";
                                                }else{
                                                    echo "<font color=red>尚未審核<br><a href=\"javascript:Mars_popup('ad_b2b_mem.php?st=fix&v=1&auton=".$re["auton"]."','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=200,height=150,top=10,left=10');\">變更已審</a></font>";
                                                }
                                            ?>
                                        </td>
                                        <td class="center">
                                            <div class="btn-group">
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="ad_b2b_mem_detail.php?auton=<?php echo $re["auton"]; ?>" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                                    <?php 
                                                        if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch"){
                                                            echo "<li><a href='ad_b2b_mem_fix.php?auton=".$re["auton"]."'><i class='icon-file'></i> 修改</a></li>";
                                                        }
                                                        if($_SESSION["MM_UserAuthorization"] == "admin"){
                                                            echo "<li><a href=\"javascript:Mars_popup2('ad_b2b_mem.php?st=del&auton=".$re["auton"]."','','width=300,height=200,top=100,left=100')\"><i class='icon-trash'></i> 刪除</a></li>";
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            }
                        ?>                      
                    </tbody>
                </table>
            </div>
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
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    function chk_search_form() {
        if (!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
            return false;
        }
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        location.href = "ad_b2b_mem.php?sear=1&vst=<?php echo SqlFilter($_REQUEST["vst"],"tab"); ?>&s99=<?php echo SqlFilter($_REQUEST["s99"],"tab"); ?>&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>