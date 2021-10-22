<?php

/*****************************************/
//檔案名稱：ad_b2b_list.php
//後台對應位置：名單/發送記錄>廠商認列表
//改版日期：2021.10.18
//改版設計人員：Jack
//改版程式人員：Queena
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//程式開始*****

//查看此頁權限
$auth_limit = "2";
require_once("./include/_limit.php");

//資料來源變數
$come = SqlFilter($_REQUEST["come"], "tab");

//語法
if ($come != "") {
    $SQL = "Select *, d.mem_num As num2 From springclub_b2b_list('" . $come . "') As c Left Join member_data As d On c.mobile = d.mem_mobile And d.mem_level = 'mem'";
    if (SqlFilter($_REQUEST["s1"], "tab") != "") {
        $subSQL .= " And mem_username Like '%" . str_replace("'", "''", SqlFilter($_REQUEST["s1"], "tab")) . "%'";
    }
    $SQL .= $subSQL . " Order By mem_jointime Desc";
    echo $SQL;
    //;
}
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">廠商認列表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>廠商認列表</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form id="searchform" action="?" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <select name="come" id="come">
                            <?php
                            if ($come != "") {
                                echo "<option value='" . $come . "'>" . $come . "</option>";
                            }
                            echo "<option value=''>請選擇</option>";
                            //**tabe:from_data(資料來源)**
                            $SQL = "Select * From from_data Where int_type=1 Order By auto_no";
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $re) { ?>
                                <option value="<?php echo $re["from_name"]; ?>"><?php echo $re["from_name"]; ?></option>
                            <?php } ?>
                        </select>
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width="10%">資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>入會日</th>
                            <th width="6%">秘書</th>
                            <th width="6%">&nbsp;</th>
                            <th width="6%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ( $come == "" ){
	                        echo "<tr><td colspan='10' height='200'>請選擇來源</td></tr>";
                        }else{
                            //Set rs = Server.CreateObject("ADODB.Recordset")
                            $SQL  = "Select *, d.mem_num as num2 From springclub_b2b_list('".$come."') As c Left Join member_data As d On c.mobile = d.mem_mobile ";
                            $SQL .= "And d.mem_level = 'mem'";
                            if ( SqlFilter($_REQUEST["s1"],"tab") != "" ){
                                $subSQL = " And mem_username Like '%".str_replace("'", "''", SqlFilter($_REQUEST["s1"],"tab"))."%'";
                            }
                            $SQL = $SQL.$subSQL." Order By mem_jointime Desc";
                            echo $SQL;

			            	//取得總筆數
                            $SQL  = "Select count(*) As total_size From springclub_b2b_list('".$come."') As c Left Join member_data As d On c.mobile = d.mem_mobile ";
                            $SQL .= "And d.mem_level = 'mem'".$subSQL1;

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

                            $SQL = "Select * From ";
$SQL .= "(Select Top ".$page2." * From ";
$SQL .= "(Select Top ".($tPageSize*$tPage)." * From springclub_b2b_list('".$come."') As c Left Join member_data As d On c.mobile = d.mem_mobile And d.mem_level = 'mem' Order By mem_jointime Asc) t1 Order By mem_jointime Desc ) t2 Order By mem_jointime Desc";

                            echo $SQL;
                            exit;
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                            if ( count($result) == 0 ){
                                echo "<tr><td colspan='10' height='200'>目前沒有資料</td></tr>";
                            }else{
	                            //Set qrs = Server.CreateObject("ADODB.Recordset")
                                /*
				    SS = 0
				    Do While Not rs.EOF AND SS < 50
					SS = SS + 1
					on error resume next
'	        if Session("MM_UserAuthorization") = "admin" or Session("MM_UserAuthorization") = "branch" then
					xv = "<a href=""ad_no_mem_s.asp?mem_mobile="&rs("mobile")&""" target=""_blank""> <span class=""label label-info"">查詢</span></a>"
'				  end if
					if rs("mem_cc") <> "" then
					  mem_cc = rs("mem_cc")
					  if instr(mem_cc, "sale-") > 0 then					  						  	
					  	mem_cc = "推廣："&SingleName_auto(split(mem_cc, "-")(1))
					  end if
						mem_cc = " ["&mem_cc&"]"
					
					else
						mem_cc = ""
					end if

		      if rs("ty") = "member" then
						mlink = "ad_mem_detail.asp?mem_num="&rs("num2")&""
						num = "名單["&rs("num2")&"]"
						nums = rs("num2")
					else
						mlink = "ad_love_detail.asp?k_id="&rs("num")&""
						num = "活動["&rs("num")&"]"
						nums = rs("num")
					end if*/
                            }}

					
?>

                        <tr>
                            <td class="center"><?php echo $re["come"];?><?php echo $mem_cc;?></td>
                            <td><?php echo $num;?></td>
                            <td class="center"><a href="<?php echo $mlink;?>" target="_blank"><?php echo $re["names"];?></a>
                                <div style="float:right"><?php echo $xv;?></div>
                            </td>
                            <td class="center"><?php echo $re["sex"];?></td>
                            <td class="center"><?php echo $re["mem_by"];?>/<?php echo $re["mem_bm"];?>/<?php echo $re["mem_bd"];?>
                            <?php if ( $re["mem_by"] != "" ){ echo "　　".(date("Y")-strftime(date($re["mem_by"])))." 歲";} ?></td>
                            <td class="center"><?php echo $re["mem_school"];?></td>
                            <td class="center"><?php echo $re["mem_jointime"];?></td>
                            <td class="center"><?php echo $mem_single;?></td>
                            <td class="center">
                                <font color="green">已認列</font>
                                <font color="red">不認列</font>
                                <font color="black">無法認列</font>
                                <font color="blue">未認列</font>
                            </td>
                            <td>
                                <a href="#re" onclick="Mars_popup('ad_b2b_fix.asp?num=<?php echo $nums;?>&ty=<?php echo $re["ty"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=180,top=200,left=150');">處理</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td colspan="6" style="BORDER-bottom: #666666 1px dotted">
                                <a href="#re" onclick="Mars_popup('ad_report.asp?mem_num=<?php echo $nums;?>&lu=<?php echo $re["mem_username"];?>&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">
                                    <a href="javascript:Mars_popup('ad_report.asp?k_id=<?php echo $nums;?>&ty=love','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">

                                        回報(0)</a>，處理情形：<font color="#FF0000" size="2">XX</font>)
                                    <font color=red>不認列原因：</font>
                            </td>
                            <td colspan=3>

                            </td>
                        </tr>
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