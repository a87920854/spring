<?php
    /*****************************************/ 
    //檔案名稱：ad_market1.php
    //後台對應位置：管理系統/行銷活動管理
    //改版日期：2021.12.29
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
    if($_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["funtourpm"] != "1"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    // 新增
    if($_REQUEST["st"] == "add"){
        if($_REQUEST["end_time"] != ""){
            $end_time = SqlFilter($_REQUEST["end_time"],"tab");
        }else{
            $end_time = "";
        }
        $name = SqlFilter($_REQUEST["name"],"tab");
        $SQL =  "INSERT INTO marketing_list (name, online_time, end_time, url, web, times) VALUES ('"
                .$name."', '"
                .SqlFilter($_REQUEST["online_time"],"tab")."', '"
                .$end_time."', '"
                .SqlFilter($_REQUEST["url"],"tab")."', '"
                .SqlFilter($_REQUEST["web"],"tab")."', '"
                .date("Y/m/d H:i:s")."')";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $SQL = "SELECT LAST_INSERT_ID()";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch();
        $SQL = "UPDATE marketing_list SET name = '".($name."-手機版")."' WHERE auton =".$result["auton"];
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("ad_market1.php");
        }        
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">行銷活動管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>行銷活動管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table id="rtable" class="table table-bordered bootstrap-datatable">
                    <thead>
                        <td>活動名稱</td>
                        <td>上線時間</td>
                        <td>結束時間</td>
                        <td>活動位置</td>
                        <td width="120">類別</td>
                        <td width="60"></td>
                    </thead>
                    <tbody>                        
                        <?php
                            $SQL = "select count(auton) as total_size from marketing_list";
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetch();
                            if (!$result){
                                $total_size = 0;
                            }else{
                                $total_size = $result["total_size"]; //總筆數
                            }
                            $tPage = 1; //目前頁數
                            $tPageSize = 50; //每頁幾筆
                            if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
                            $tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
                            if ( $tPageSize*$tPage < $total_size ){
                                $page2 = 50;
                            }else{
                                $page2 = (50-(($tPageSize*$tPage)-$total_size));
                            }

                            $SQL = "SELECT * FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM marketing_list order by online_time desc ) t1 order by online_time) t2 order by online_time desc";  
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=6 height=200>目前沒有資料</td></tr>";
                            }else{
                                foreach($result as $re){
                                    if($re["end_time"] != ""){
                                        $end_time = Date_EN($re["end_time"],1);
                                    }else{
                                        $end_time = "無";
                                    }
                                    if($re["url"] != ""){
                                        $url = "<a href=".$re["url"]." target='_blank'>".$re["url"]."</a>";
                                    }else{
                                        $url = "無";
                                    }
                                    echo "<tr>";
                                    echo "<td><span>".$re["name"]."</span>&nbsp;&nbsp;<span class='label label-success'>網頁版</span></td>";
                                    echo "<td>".Date_EN($re["online_time"],1)."</td>";
                                    echo "<td>".$end_time."</td>";
                                    echo "<td>".$url."</td>";
					                echo "<td>".$re["web"]."</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>

                <!-- 頁碼 -->
                <?php require_once("./include/_page.php"); ?>

                <form action="?st=add" method="post" target="_self" onsubmit="return chk_search_form()">
                    <table class="table table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td>活動名稱：<input type="text" name="name" id="name" placeholder="必填" class="form-control2" required></td>
                                <td>上線時間：<input type="text" name="online_time" id="online_time" class="datepicker" autocomplete="off" placeholder="必填" required></td>
                                <td>結束時間：<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" placeholder="選填"></td>
                                <td>活動位置：<input type="text" name="url" id="url" placeholder="選填" class="form-control2"></td>
                                <td>類別：<select name="web" id="web" required>
                                        <option value="">請選擇</option>
                                        <option value="春天會館">春天會館</option>
                                        <option value="DateMeNow">DateMeNow</option>
                                        <option value="約會專家">約會專家</option>
                                    </select></td>
                                <td><input type="submit" value="新增活動" class="btn btn-default"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
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
    $(function() {
        $("#rtable tr").each(function() {
            $span = $(this).find("span:first");
            $name = $span.html();
            if ($name && $name.indexOf("-") > 0) {
                $n1 = $name.split("-")[0];
                $n2 = $name.split("-")[1];

                $("#rtable tr").each(function() {
                    $span2 = $(this).find("span:first");
                    $name2 = $span2.html();
                    if ($name2 && $name2 == $n1) {
                        $span2.parent().append("&nbsp;<span class=\"label label-success\">" + $n2 + "</span>");
                        //console.log($name2);	
                    }

                });
                $(this).remove();
            }

        });
    });
</script>