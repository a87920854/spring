<?php
/***************************************/
//檔案名稱：ad_singleparty_online.php
//後台對應位置：約會專家功能->約專會員在線
//改版日期：2022.02.11
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//麵包屑
$unitprocess = $m_home.$icon."約會專家功能".$icon."約專會員在線";

//取得總筆數
$SQL = "Select count(auton) as total_size From si_online";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 || $re["total_size"] == 0 ){        
    $total_size = 0;
}else{
    $total_size = $re["total_size"];
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
$SQL_list .= "over(Order By utimes Desc) As rownumber,mnum, mname, msex, marea, mbranch, mbranch2, mip, mtimes, utimes, mem_photo ";
$SQL_list .= "From si_online Left Join member_data on mnum=mem_num ) temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage_list)." Order By utimes Desc";
$rs_list = $SPConn->prepare($SQL_list);
$rs_list->execute();
$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- MIDDLE -->
<section id="middle">

     <!-- 麵包屑 -->
     <header id="page-header">
        <div class="m-crumb"><i class="fa fa-folder-open-o"></i><?php echo $unitprocess;?></div>
    </header>
    <!-- /麵包屑 -->

    <div id="content" class="padding-20">

        <!-- content starts -->
        <div class="panel panel-default">
            <h2 class="pageTitle">約專會員在線 》目前線上：<?php echo $total_size;?> 人</h2>
            <div class="panel-body">
                <div class="col-md-12">
                    <?php
                    if ( count($result_list) > 0 ){
                        foreach($result_list as $re_list){
                            $upic = "";
                            $mem_photo = $re_list["mem_photo"];
                            if ( $mem_photo != "" && ! substr_count($mem_photo, "boy.") > 0 && ! substr_count($mem_photo, "girl.") > 0 ){
                                if ( substr_count($mem_photo, "photo/") > 0 ){
                                    $upic = "<img class=\"img-responsive\" src=\"dphoto/".$mem_photo."\">";
                                }else{
                                    $upic =  "<img class=\"img-responsive\" src=\"../photo/".$mem_photo."\">";
                                }
                            }
                            $diffm = floor(    (   strtotime(changeDate(date("Y-m-d H:i:s")))-changeDate($re_list["mtimes"])     )%86400/60      );?>
                            <div class="col-md-2">
								<section class="panel" style="border: 1px solid #ddd;">
									<div class="panel-body noradius padding-10">
										<figure class="margin-bottom-10"><?php echo $upic;?></figure>
										<!-- progress bar -->
										<h6 class="progress-head"><?php echo $re_list["mnum"];?> - <?php echo $re_list["marea"];?>&nbsp;&nbsp;<?php echo $re_list["mname"];?><span class="pull-right"><?php echo $re_list["msex"];?></span></h6>
										
										<!-- updated -->
										<ul class="list-unstyled size-13">
											<li><?php echo $re_list["mbranch"];?>會館</li>
											<li><?php echo changeDate($re_list["mtimes"]);?> 上線 <?php echo $diffm;?> m</li>																						
											<li><a href="https://www.singleparty.com.tw/profile.asp?m=<?php echo $re_list["mnum"];?>" target="_blank">約專檔案</a>&nbsp;&nbsp;<a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mnum"];?>" target="_blank">後台個人資料</a></li>
										</ul>
                                        <!-- /updated -->
									</div>
								</section>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <!--include頁碼-->
	            <?php require_once("./include/_page.php"); ?>
            </div>
        </div>
    </div>
</section>
<?php require_once("./include/_bottom.php"); ?>