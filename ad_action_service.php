<?php
/*****************************************/
//檔案名稱：ad_action_service.php
//後台對應位置：名單/發送記錄>會員服務紀錄查詢
//改版日期：2021.12.30
//改版設計人員：Jack
//改版程式人員：Queena
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

check_page_power("ad_action_service");

//sqlv = "*"
//sqlv2 = "count(mem_auto)"

$branch = SqlFilter($_REQUEST["branch"],"tab");

$subSQL = " (mem_branch= '".$_SESSION["branch"]."' Or ','+mem_branch2+',' Like '%,".$_SESSION["branch"].",%')";
//b2sql = "(mem_branch= '"&session("branch")&"' or ','+mem_branch2+',' LIKE '%,"&session("branch")&",%')"	

if ( $_SESSION["MM_UserAuthorization"] == "admin" ){  
    if ( $branch != "" ){
        $subSQL = " And (mem_branch= '".$branch."' Or ','+mem_branch2+',' Like '%,".$branch.",%')";
    }else{
        $subSQL = "";
    }
    //sqls = "SELECT "&sqlv&" FROM member_data WHERE mem_level = 'mem'"&b2sql
	//sqls2 = "SELECT "&sqlv2&" as total_size FROM member_data WHERE mem_level = 'mem'"&b2sql	   	    
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "teacher" ){
    //sqls = "SELECT "&sqlv&" FROM member_data WHERE mem_level = 'mem' and "&b2sql
    //sqls2 = "SELECT "&sqlv2&" as total_size FROM member_data WHERE mem_level = 'mem' and "&b2sql
    $branch = $_SESSION["branch"];
}else{
    exit;
    //sqls = ""
	//sqls2 = ""
}
      
$keyword_type = SqlFilter($_REQUEST["keyword_type"],"tab");
$keyword = SqlFilter($_REQUEST["keyword"],"tab");
      
switch ($keyword_type){
    case "s2":
        $subSQL = $subSQL . " And mem_mobile = '".$keyword."'";
        break;
    case "s17":
        $subSQL = $subSQL . " And mem_phone = '".$keyword."'";
        break;
    case "s3":
        $subSQL = $subSQL . " And mem_name Like N'%".$keyword."%'";
        break;
    case "s4":
      	$subSQL = $subSQL . " And mem_num = '".$keyword."'";
        break;
    case "s5":
        $subSQL = $subSQL . " And si_account = '".$keyword."'";
        break;
    case "s6":
      	$subSQL = $subSQL . " And mem_username = '".$keyword."'";
        break;
    case "s22":
        $subSQL = $subSQL . " And mem_mail = '".$keyword."'";
        break;
    default:
        $subSQL = $subSQL . " And 1 = 0";
}

//取得總筆數
$SQL = "Select count(mem_auto) As total_size From member_data Where mem_level = 'mem'".$subSQL;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result=$rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 || $re["total_size"] == 0 ) {
    $total_size = 0;
}else{
    $total_size = $re["total_size"];
}

//取得分頁資料
$tPageSize = 50; //每頁幾筆
$tPage = 1; //目前頁數
if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
if ( $tPageSize*$tPage < $total_size ){
    $page2 = 50;
}else{
    $page2 = (50-(($tPageSize*$tPage)-$total_size));
}

//分頁語法
$SQL_list  = "Select * From (";
$SQL_list .= "Select TOP ".$page2." * From (";
$SQL_list .= "Select TOP ".($tPageSize*$tPage)." * From member_data Where mem_level = 'mem'".$subSQL." Order By times Desc) t1 Where mem_level = 'mem'".$subSQL." Order By times Asc) t2 Where mem_level = 'mem'".$subSQL1." Order By times Desc ";
$rs_list = $SPConn->prepare($SQL_list);
$rs_list->execute();
$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);
echo $SQL_list;
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">會員服務紀錄查詢</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員服務紀錄查詢</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p style="clear:both">
                <form id="searchform" action="ad_action_service.php" method="post" target="_self" onsubmit="return chk_search_form()" class="form-inline pull-left">
                    <select name="keyword_type" id="keyword_type" class="form-control">
                        <option value="s2">手機</option>
                        <option value="s17">電話</option>
                        <option value="s3">姓名</option>
                        <option value="s4">編號</option>
                        <option value="s5">約會專家帳號</option>
                        <option value="s6">身分證字號</option>
                        <option value="s22">電子信箱</option>
                    </select>
                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                </form>

                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th width=50>編號</th>
                            <th>姓名</th>
                            <th width=50>性別</th>
                            <th>生日</th>
                            <th width=60>學歷</th>
                            <th width=180>秘書</th>
                            <th width=60>照片</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ( count($result_list) == 0 ){
	  	                    if ( $branch == "" ){
	  		                    echo "<tr><td colspan='10' height='200'>請先選擇會館</td></tr>";
                            }elseif ( $keyword_type == "" ){
	   	                        echo "<tr><td colspan='10' height='200'>請輸入條件</td></tr>";
                            }else{
	                            echo "<tr><td colspan='10' height='200'>目前沒有資料或不屬於".$branch."會館</td></tr>";
	                        }	   
                        }else{
	                        foreach($result_list as $re_list){
					            $xv = "<a href='ad_no_mem_s.asp?mem_mobile=".$re_list["mem_mobile"]."' target='_blank'> <span class='label label-info'>查詢</span></a>";
					            if ( $re_list["mem_cc"] != "" ){
					                $mem_cc = $re_list["mem_cc"];
					                if ( substr_count($mem_cc, "sale-") > 0 ){
					  	               // $mem_cc = "推廣：".SingleName_auto(split($mem_cc, "-")(1))
                                    }
						            $mem_cc = " [".$mem_cc."]";
                                }else{
						            $mem_cc = "";
                                }
					
					            if ( $re_list["mem_lc"] != "" ){
						            $mem_cc = $mem_cc." [lc:".$re_list["mem_lc"]."]";
                                }
                        ?>
                                <tr>
                                    <td>
                                        <?php
                                        $wbl = "";
                                        $wbla = $re_list["web_startime"]."~".$re_list["web_endtime"];
                                        switch ( $re_list["web_level"] ){
                                            case 1:
                                                $wbl = "資料認證會員(".$wbla.")";
                                                break;
                                            case 2:
                                                $wbl = "真人認證會員";
                                                break;
                                            case 3:
                                                $wbl = "璀璨會員-一年期";
                                                break;
                                            case 4:
                                                $wbl = "璀璨VIP會員-一年期";
                                                break;
                                            case 5:
                                                $wbl = "璀璨會員-二年期";
                                                break;
                                            case 6:
                                                $wbl = "璀璨VIP會員-二年期" ;
                                        }
                                        if ( $wbl != "" ){ echo "<span style='color:blue'>".$wbl."(".$wbla.")</span>";}
                                        ?>
                                    </td>
                                    <td><?php echo $re_list["mem_num"];?></td>
                                    <td class="center"><a href="ad_mem_service.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_name"];?></a></td>
                                    <td class="center"><?php echo $re_list["mem_sex"];?></td>
                                    <td class="center"><?php echo $re_list["mem_by"]."/".$re_list["mem_bm"]."/".$re_list["mem_bd"];?>&nbsp;&nbsp;<?php echo (date("Y")-$re_list["mem_my"]);?> 歲</td>
                                    <td class="center"><?php echo $re_list["mem_school"];?></td>
                                    <?php
								    if ( $re_list["mem_branch"] != "" ){
								        $mem_single = "<font color='green'>受理：</font>".$re_list["mem_branch"] . " - " . SingleName($re_list["mem_single"],"normal");
                                    }else{
								 	    $mem_single = "";
                                    }
								 
								    if ( $re_list["love_single"] != "" ){
								        $love_single = "<br><font color='green'>排約：</font>".SingleName($re_list["love_single"],"normal");
                                    }else{
								        $love_single = "";
                                    }

								    if ( $re_list["call_branch"] != "" ){
								        $call_single = "<br><font color='green'>邀約：</font>".$re_list["call_branch"] . " - " . SingleName($re_list["call_single"],"tab");
                                    }else{
								        $call_single = "";
                                    }
								    ?>
                                    <td class="center"><?php echo $mem_single.$love_single.$call_single;?></td>
                                    <td class="center">
                                        <?
									    $mem_photo = $re_list["mem_photo"];
									
									    if ( ( $re_list["mem_sex"] == "男" && $mem_photo != "boy.jpg")  || ( $re_list["mem_sex"] == "女" && $mem_photo != "girl.jpg" ) ){
									        if (substr_count($mem_photo, "photo/") > 0 ){
									            if ( $_REQUEST["s30"] != "" ){
									                echo "<a href='dphoto/".$mem_photo."?t=".(int)(rand()*9999)."' class='fancybox'><img src='dphoto/".$mem_photo."?t=".(int)(rand()*9999)."' width='100'></a>";
                                                }else{
									                echo "<a href='dphoto/".$mem_photo."?t=".(int)(rand()*9999)."' class='fancybox'>有</a>";
                                                }
                                            }else{
									            if ( $_REQUEST["s30"] != "" ){
									                echo "<a href='../photo/".$mem_photo."?t=".(int)(rand()*9999)."' class='fancybox'><img src='../photo/".$mem_photo."?t=".(int)(rand()*9999)."' width='100'></a>";
                                                }else{
									                echo "<a href='../photo/".$mem_photo."?t=".(int)(rand()*9999)."' class='fancybox'>有</a>";
									            }
								            }
                                        }else{
								  	        echo "無";
								        }
									    ?>
                                    </td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="ad_mem_service.php?mem_num=102880" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!--include頁碼-->
	        <?php require_once("./include/_page.php"); ?>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->
<?php require_once("./include/_bottom.php");?>

<script type="text/javascript">
    function chk_search_form() {

        return true;
    }
</script>