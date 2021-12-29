<?php
    /*****************************************/ 
    //檔案名稱：funweb_fun12.php
    //後台對應位置：好好玩網站管理系統/活動列表上方大圖
    //改版日期：2021.12.28
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar_fun.php");

    //程式開始 *****
	if($_SESSION["MM_Username"] == "" ){ 
        call_alert("請重新登入。","login.php",0);
    }
    if($_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["funtourpm"] != "1"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    // 圖片上移
    if($_REQUEST["st"] == "mup"){
        $nowline = round(SqlFilter($_REQUEST["i1"],"int"));
        $upline = $nowline+1;
        $SQL = "update web_data set i1=".$nowline." where types='".SqlFilter($_REQUEST["t"],"tab")."' and i1=".$upline;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $SQL = "update web_data set i1=".$upline." where types='".SqlFilter($_REQUEST["t"],"tab")."' and auton=".SqlFilter($_REQUEST["an"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("funweb_fun12.php");
        }
    }

    // 圖片下移
    if($_REQUEST["st"] == "mdo"){
        $nowline = round(SqlFilter($_REQUEST["i1"],"int"));
        $upline = $nowline-1;
        $SQL = "update web_data set i1=".$nowline." where types='".SqlFilter($_REQUEST["t"],"tab")."' and i1=".$upline;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $SQL = "update web_data set i1=".$upline." where types='".SqlFilter($_REQUEST["t"],"tab")."' and auton=".SqlFilter($_REQUEST["an"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("funweb_fun12.php");
        }
    }

    // 刪除圖片(待測試)
    if($_REQUEST["st"] == "del"){
        $SQL = "select n1 from web_data where auton=".SqlFilter($_REQUEST["an"],"int")." and types='".SqlFilter($_REQUEST["t"],"tab")."'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            DelFile(("../funtour/images/upload/".$result["n1"]));
            $SQL = "delete from web_data where auton=".SqlFilter($_REQUEST["an"],"int")." and types='".SqlFilter($_REQUEST["t"],"tab")."'";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
            if($rs){
                reURL("funweb_fun12.php");
            }
        }        
    }
    
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li>好好玩網站管理系統</li>
            <li class="active">活動列表上方大圖</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動列表上方大圖</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('funweb_fun12_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70">電腦版</th>
                            <th>圖片</th>
                            <th>連結位置</th>
                            <th width="160">資料時間</th>
                            <th>操作</th>
                        </tr>
                        <?php 
                            $SQL = "SELECT * FROM web_data where types='new_event_banner' order by i1 desc";
                            $rs = $FunConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=5>目前無資料</td></tr>";
                            }else{
                                $ii = 0;
                                foreach($result as $re){
                                    if($ii == 0){
                                        $uahref = "#nu\" onclick=\"alert('無法向上');\"";
                                    }else{
                                        $uahref = "?st=mup&t=new_event_banner&an=".$re["auton"]."&i1=".$re["i1"];
                                    }                                    
                                    if($ii == count($result)-1){
                                        $dahref = "#nu\" onclick=\"alert('無法向下');\"";
                                    }else{
                                        $dahref = "?st=mdo&t=new_event_banner&an=".$re["auton"]."&i1=".$re["i1"];
                                    }
                                    $imgurl = "https://www.funtour.com.tw/images/upload/".$re["n1"]."?t=".rand(1,9999);
                                    ?>
                                        <tr>
                                            <td><a href="<?php echo $uahref; ?>"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="<?php echo $dahref; ?>"><span class="fa fa-arrow-down"></span></a></td>
                                            <td><a href="<?php echo $imgurl; ?>" class="fancybox"><img src="<?php echo $imgurl; ?>" border=0 height=40></a></td>
                                            <td><?php echo $re["n2"]; ?></td>
                                            <td><?php echo Date_EN($re["t1"],9); ?></td>
                                            <td>
                                                <a href="javascript:Mars_popup('funweb_fun12_add.php?an=<?php echo $re["auton"]; ?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                                <a title="刪除" href="funweb_fun12.php?st=del&t=new_event_banner&an=<?php echo $re["auton"]; ?>">刪除</a>						
                                            </td>
                                        </tr>
                                    <?php 
                                    $ii = $ii+1;    
                                }
                            }
                        ?>
                    </tbody>
                </table>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70">手機版</th>
                            <th>圖片</th>
                            <th>連結位置</th>
                            <th width="160">資料時間</th>
                            <th>操作</th>
                        </tr>
                        <?php 
                            $SQL = "SELECT * FROM web_data where types='new_event_banner_m' order by i1 desc";
                            $rs = $FunConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=5>目前無資料</td></tr>";
                            }else{
                                $ii = 0;
                                foreach($result as $re){
                                    if($ii == 0){
                                        $uahref = "#nu\" onclick=\"alert('無法向上');\"";
                                    }else{
                                        $uahref = "?st=mup&t=new_event_banner_m&an=".$re["auton"]."&i1=".$re["i1"];
                                    }                                    
                                    if($ii == count($result)-1){
                                        $dahref = "#nu\" onclick=\"alert('無法向下');\"";
                                    }else{
                                        $dahref = "?st=mdo&t=new_event_banner_m&an=".$re["auton"]."&i1=".$re["i1"];
                                    }
                                    $imgurl = "https://www.funtour.com.tw/images/upload/".$re["n1"]."?t=".rand(1,9999);
                                    ?>
                                        <tr>
                                            <td><a href="<?php echo $uahref; ?>"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="<?php echo $dahref; ?>"><span class="fa fa-arrow-down"></span></a></td>
                                            <td><a href="<?php echo $imgurl; ?>" class="fancybox"><img src="<?php echo $imgurl; ?>" border=0 height=40></a></td>
                                            <td><?php echo $re["n2"]; ?></td>
                                            <td><?php echo Date_EN($re["t1"],9); ?></td>
                                            <td>
                                                <a href="javascript:Mars_popup('funweb_fun12_add.php?an=<?php echo $re["auton"]; ?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                                <a title="刪除" href="funweb_fun12.asp?st=del&t=new_event_banner_m&an=<?php echo $re["auton"]; ?>">刪除</a>						
                                            </td>
                                        </tr>
                                    <?php 
                                    $ii = $ii+1;    
                                }
                            }
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
require_once("./include/_bottom.php")
?>