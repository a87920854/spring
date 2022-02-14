<?php
/******************************************/
//檔案名稱：ad_singleparty_guestbook.php
//後台對應位置：約會專家功能->會員留言互動
//改版日期：2022.02.10
//改版設計人員：Jack
//改版程式人員：Queena
/******************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//權限判斷
$auth_limit = 6;
require_once("./include/_limit.php");

//麵包屑
$unitprocess = $m_home.$icon."約會專家功能".$icon."會員留言互動";

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$v = SqlFilter($_REQUEST["v"],"tab");
$a = SqlFilter($_REQUEST["a"],"tab"); //auton
$keyword_type = SqlFilter($_REQUEST["keyword_type"],"tab");
$keyword = SqlFilter($_REQUEST["keyword"],"tab");
$vst = SqlFilter($_REQUEST["vst"],"tab");

//遮蔽留言
if ( $st == "del" ){
    $SQL_u = "Update si_guestbook Set del=".$v." Where auton=".$a;
    $rs_u = $SPConn->prepare($SQL_u);
    $rs_u->execute();
	reURL("win_close.php?m=設定中....");
    exit;
}
//刪除留言
if ( $st == "del2" ){
    $SQL_d = "Delete si_guestbook Where auton=".$a;
    $rs_d = $SPConn->prepare($SQL_d);
    $rs_d->execute();
    reURL("win_close.php?m=刪除中....");
    exit;
}

//篩選條件(姓名)
if ( $keyword_type == "s3" ){
    $subSQL1 .= "And (tname Like '%".str_Replace("'", "''", $keyword)."%' Or mname Like '%".str_Replace("'", "''", $keyword)."%')";
}
//篩選條件(編號)
if ( $keyword_type == "s4" ){
    $subSQL1 .= "And (tnum Like '%".str_Replace("'", "''", $keyword)."%' Or mnum Like '%".str_Replace("'", "''", $keyword)."%')";
}

//取得總筆數
$SQL = "Select count(auton) As total_size From si_guestbook Where 1=1 ".$subSQL1;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result=$rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 || $re["total_size"] == 0 ) {
    $total_size = 0;
}else{
    $total_size = $re["total_size"];
}

//查看清單連結文字
if ( $vst == "full" ){
    $count_href = "　<a href=\"javascript:full_btn('n');\" class='btn btn-success'>查看前五百筆</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href=\"javascript:full_btn('full');\" class='btn btn-success'>查看完整清單</a>";
}

//取得分頁資料
$tPageSize = 50; //每頁幾筆
$tPage = 1; //目前頁數
$tPage_list = 0;
if ( $_REQUEST["tPage"] > 1 ){ 
    $tPage = $_REQUEST["tPage"];
    $tPage_list = ($tPage-1);
}
$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數

//分頁語法
$SQL_list  = "Select Top ".$tPageSize." * ";
$SQL_list .= "From (Select row_number() ";
$SQL_list .= "over(Order By times Desc) As rownumber,mnum,mname,tnum,tname,notes,times,auton,del ";
$SQL_list .= "From si_guestbook Where 1=1 ".$subSQL1." ) temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage_list);
$rs_list = $SPConn->prepare($SQL_list);
$rs_list->execute();
$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <div class="m-crumb"><i class="fa fa-folder-open-o"></i><?php echo $unitprocess;?></div>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <h2 class="pageTitle">約會專家升級意願 》會員留言互動 》資料列表 [ <i style="color: #76192e;">共計 <?php echo $total_size."筆資料</i> ]"; if ( $total_size >= 500 ){ echo $count_href;}?></h2>
            <form id="searchform" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" target="_self" class="form-inline">
                <div class="m-search-bar">
                    <span class="span-group">
                        <select name="keyword_type" id="keyword_type">
                            <option value="s3"<?php if ( $keyword_type == "s3" ){?> selected<?php }?>>姓名</option>
                            <option value="s4"<?php if ( $keyword_type == "s4" ){?> selected<?php }?>>編號</option>
                        </select>
                    </span>
                    <span class="span-group">
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" value="<?php echo $keyword;?>">
                        <input type="submit" value="送出" class="btn btn-default">
                    </span>
                </div>
                <input type="hidden" name="vst" id="vst" value="">
            </form>
            <span>
                <strong style="background-color: yellow; color:brown">※排序欄位：留言時間(由遠到近)。</strong>
            </span>   
            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr style="background-color: #FFDA96;">
                            <th width="12%">時間</th>
                            <th width="12%">發送</th>
                            <th width="12%">接收</th>
                            <th>訊息</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( count($result_list) == 0 ){?>
                            <tr><td colspan="10" height="200">目前沒有資料</td></tr>
                        <?php }else{
                            foreach($result_list as $re_list){
                                $mname = "<a href=\"ad_mem_detail.php?mem_num=".$re_list["mnum"]."\">".$re_list["mname"]."</a>";
					            $tname = "<a href=\"ad_mem_detail.php?mem_num=".$re_list["tnum"]."\">".$re_list["tname"]."</a>"; ?>
                                <tr>
								    <td><?php echo changeDate($re_list["times"]);?></td>								  
								    <td><?php echo $mname;?>[<?php echo $re_list["mnum"];?>]</td>
								    <td><?php echo $tname;?>[<?php echo $re_list["tnum"];?>]</td>
								    <td>
                                        <?php
								  	    if ( $re_list["del"] == 1 ){
								  		    echo "<s>".$re_list["notes"]."</s>";
                                        }else{
								  		    echo str_replace("|n|", "<br>", $re_list["notes"]);
                                        }
								  	    ?>
                                    </td>
								    <td>
                                        <?php if ( $re_list["del"] == 1 ){?>
                                            <a href="javascript:Mars_popup('?st=del&v=0&a=<?php echo $re_list["auton"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=10,left=10');">取消遮蔽</a>
                                        <?php }else{?>
                                            <a href="javascript:Mars_popup('?st=del&v=1&a=<?php echo $re_list["auton"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=10,left=10');">違規遮蔽留言</a>
                                        <?php }?>
                                        <br>
                                        <a href="javascript:Mars_popup2('?st=del2&a=<?php echo $re_list["auton"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=10,left=10');">刪除</a>
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

<?php require_once("./include/_bottom.php"); ?>

<script language="JavaScript">
    function full_btn(vst_val){
        document.getElementById("vst").value = vst_val;
        searchform.submit();
    }
</script>