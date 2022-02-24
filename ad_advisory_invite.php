<?php
/***************************************/
//檔案名稱：ad_advisory_invite.php
//後台對應位置：排約/記錄功能 → 諮詢預訂單
//改版日期：2022.02.17
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//判斷權限
check_page_power("ad_advisory_invite");

//麵包屑
$unitprocess = $m_home.$icon."排約/記錄功能".$icon."諮詢預訂單";

//接收值
$y = SqlFilter($_REQUEST["y"],"tab");
$m = SqlFilter($_REQUEST["m"],"tab");
$branch = SqlFilter($_REQUEST["branch"],"tab");
?>

<!-- MIDDLE -->
<section id="middle">

    <!-- 麵包屑 -->
    <header id="page-header">
        <div class="m-crumb"><i class="fa fa-folder-open-o"></i><?php echo $unitprocess;?></div>
    </header>
    <!-- /麵包屑 -->

    <div id="content" class="padding-20">
        <?php
        //判讀日期
        $y = (int)($y);
        $m = (int)($m);
        if ( $y == 0 && $m == 0 ){
            $thisdate = date("Y-m-d");
            $y = date("Y");
            $m = date("m");
        }else{
            if ( $m > 12 ){
                $y = ($y + 1);
                $m = 1;
            }
            if ( $m < 1 ){
                $y = ($y-1);
                $m = 12;
            }
            $thisdate = $y . "/" . $m . "/1";
        }
        
        //判讀當月第一天
        $strfirstday = strval(date("Y",strtotime($thisdate)))."/".strval(date("m",strtotime($thisdate)))."/1";
        
        //變數宣告
        $date_array = array("日","一","二","三","四","五","六");

        //取的當月一號星期幾
        $nweek = $date_array[date("w",strtotime($strfirstday))];
        
        //取的該月天數
        $nmonthday = date("t",strtotime($thisdate));

        //上個月
        $nprevmonth = strtotime(date('Y-m-d H:i:s', strtotime("-1 month", strtotime($thisdate))));
        
        //下個月
        $nnextmonth = strtotime(date('Y-m-d H:i:s', strtotime("+1 month", strtotime($thisdate))));
        
        //讀取該日資料
        $choiceday = strval(date("Y",$thisdate))."/".strval(date("m",$thisdate))."/".strval(date("d",$thisdate));
        $choiceday = strtotime($choiceday);
        $choiceday_1 = date('Y-m-d H:i:s', strtotime ("-1 day", strtotime($choiceday)));

        //語法
        if ( $_SESSION["MM_UserAuthorization"] == "admin"){
            $SQL = "Select Top 1000 * From ad_advisory_invite Where year(itimes)=".date("Y",strtotime($thisdate))." And month(itimes)=".date("m",strtotime($thisdate))." ";
            $branch = $branch;
        }else{
            $SQL = "Select * From ad_advisory_invite Where year(itimes)=".date("Y",strtotime($thisdate))." And month(itimes)=".date("m",strtotime($thisdate))." ";
            $branch = $_SESSION["branch"];
        }
        if ( $branch != "" ){
            $SQL .= "And (mem_branch in ('".$branch."') ";
            if ( $_SESSION["area_branch"] == "" || is_null($_SESSION["area_branch"]) ){
                $SQL .= ") ";
            }
        }

        if ( $_SESSION["area_branch"] != "" || ! is_null($_SESSION["area_branch"]) ){
            $area_branch = str_replace(",", "','", str_replace(" ","",$_SESSION["area_branch"]));
            $SQL .= "Or mem_branch in ('".$area_branch."')) ";
        }

        $SQL .= "Order By auton Desc";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
?>
        <!-- content starts -->        
        <div class="panel panel-default">
            <h2 class="pageTitle">排約/記錄功能 》諮詢預訂表</h2>

            <div class="panel-body">
                <div class="col-md-12">
                    <p>
                        <input type="button" value="新增預訂諮詢" class="btn btn-info" onclick="Mars_popup('ad_advisory_invite_add.asp','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=700,height=700,top=10,left=10');">
                        <a href="ad_advisory_invite.asp" class="btn btn-black">諮詢預訂表</a>
                        <a href="ad_advisory_invite_settime.asp" class="btn btn-green">設置諮詢時間</a>
                        <a href="ad_advisory_invite_timelist.asp" class="btn btn-blue">查詢講師時間</a>
                    </p>
                    <form id="searchform" action="ad_advisory_invite.asp" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <input type="text" class="form-control" placeholder="請輸入關鍵字" name="keyword" id="keyword">

                        <select name="branch" id="branch">
                            <option value="">請選擇</option>
                            <option value="台北">台北</option>
                            <option value="桃園">桃園</option>
                            <option value="新竹">新竹</option>
                            <option value="台中">台中</option>
                            <option value="台南">台南</option>
                            <option value="高雄">高雄</option>
                            <option value="八德">八德</option>
                            <option value="約專">約專</option>
                            <option value="迷你約">迷你約</option>
                            <option value="總管理處">總管理處</option>
                        </select>

                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td width="74%" colspan="4"><span style="font-size:x-large; color:#0793c5;font-weight:bold;"><?php echo date("Y",((strtotime($thisdate))-1911));?> 年 <?php echo date("m",strtotime($thisdate));?> 月 </span></td>
                            <td width="13%">●<a href="?y=<?php echo date("Y");?>&m=<?php echo date("m");?>&branch=<?php echo $branch;?>">本月</a></td>
                            <td width="13%" style="border:0px">▲<a href="?y=<?php echo date("Y",$nprevmonth);?>&m=<?php echo date("m",$nprevmonth);?>&branch=<?php echo $branch;?>">上一個月</a></td>
                            <td width="11%" style="border:0px">▼<a href="?y=<?php echo date("Y",$nnextmonth);?>&m=<?php echo date("m",$nnextmonth);?>&branch=<?php echo $branch;?>">下一個月</a></td>
                        </tr>
                        <tr>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期日</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期一</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期二</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期三</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期四</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期五</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期六</td>
                        </tr>
                        <?php
						    $td = 1;
                            $nweek = date("w",strtotime($strfirstday));
						    $TOK = ($nmonthday + ($nweek-1));

                            if ( count($result) > 0 ){
                                foreach($result as $re){
                                    $bb = $re["mem_branch"];
							        $dd = date("d",strtotime($re["itimes"]));
							        $ss = count(explode("<div>",("tds_".$dd)));

							        if ( $ss < 4 ){
							            ${"tds_".$dd} = ${"tds_".$dd}." <div>".$bb."　".$re["mem_name"]."</div>";
                                    }
							        ${"tdsi_".$dd} = (${"tdsi_".$dd} + 1);
                                    
                                }
                            }

						    for ( $i=0;$i<=$TOK;$i++ ){
						        $notdadd = 0;
                                $tdss = ${"tds_".$td};
                                
						        if ( $tdss != "" ){
						            $tdd = $td . "　　　　　　".${"tdsi_".$td}."筆";
						            $tdss = "<a href='ad_advisory_invite_d.php?y=".$y."&m=".$m."&d=".$td."&branch=".$branch."'>" .$tdss."</a>";
                                }else{
						            $tdd = $td;
                                }

                                $tds = "<div style='height:28px;'>".$tdd."</div><div>".$tdss."</div>";
                                //echo $tds;
                                $ii = $i % 7;
                                if ( $ii == 0 ){
                                    if ( $i == 0 ){
                                        //echo "<tr>" & vbcrlf
                                        echo "<tr><br>";
                                        $firsttr = 1;
                                    }else{
                                        echo "</tr><tr><br>";
                                        $firsttr = 0;
                                    }
                                }
                                
                                $time1 = strtotime($y."/".$m."/".$td);
                                $time2 = strtotime(date("Y/m/d"));
                                $day = ($time2 - $time1)/ (60*60*24);

                                if ( $ii == 0 || $ii == 6 ){
                                    $cc = "#fbb4b4";
                                }elseif ( $day == 0 ){
                                    $cc = "#b6effb";
                                }elseif ( $day > 0 ){
                                    $cc = "#f9f9f9";
                                }else{
                                    $cc = "#ffffff";
                                }

                                if ( $firsttr == 1 ){
                                    if ( $i == $nweek ){
                                        echo "<td style='width:14%;height:100px;background:".$cc.";'>".$tds."</td>";
                                    }elseif ( $i < $nweek ){
                                        //echo "<td></td><br>";
                                        echo "<td></td>";
                                        $notdadd = 1;
                                    }else{
                                        echo "<td style='width:14%;height:100px;background:".$cc.";'>".$tds;
                                    }
                                }else{
                                    echo "<td style='width:14%;height:100px;background:".$cc.";'>".$tds."</td>";
                                }

                                if ( $notdadd == 0 ){
                                    $td = ($td+1);
                                }
                            }

						    $ii = (6-$ii-1);
							if ( $ii > -1 ){
							    for ( $i=0;$i<=$ii;$i++ ){
                                    echo "<td></td>";
                                }
                            }
						    echo "</tr>";
						  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php require_once("./include/_bottom.php");?>