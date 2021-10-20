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
	$auth_page = "non";
	
	//資料來源
	$come = SqlFilter($_REQUEST["come"],"tab");
	
	//語法
	if ( $come != "" ){
		$SQL = "Select *, d.mem_num As num2 From springclub_b2b_list('".$come."') As c Left Join member_data As d On c.mobile = d.mem_mobile And d.mem_level = 'mem'";
		if ( SqlFilter($_REQUEST["s1"],"tab") != "" ){
			$subSQL .= " And mem_username Like '%".str_replace("'", "''",SqlFilter($_REQUEST["s1"],"tab"))."%'";
		}
		$SQL .= $subSQL." Order By mem_jointime Desc";
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
							if ( $come != "" ){
								echo "<option value='".$come."'>".$come."</option>";
							}
							echo "<option value=''>請選擇</option>";
							//tabe:from_data(資料來源)
							$SQL = "Select * From from_data Where int_type=1 Order By auto_no";
							$rs = $SPConn->prepare($SQL);
							$rs->execute();
							$result=$rs->fetchAll(PDO::FETCH_ASSOC);
							foreach($result as $re){ ?>
								<option value="<?php echo $re["from_name"];?>"><?php echo $re["from_name"];?></option>
							<?php }?>
                        </select>
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=180>資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>入會日</th>
                            <th width="80">秘書</th>
                            <th width="80"></th>
                            <th width="60"></th>
                        </tr>
                    </thead>
                    <tbody>
						
                        <tr>
                            <td class="center"><%=rs("come")%><%=mem_cc%></td>
                            <td><%=num%></td>
                            <td class="center"><a href="<%=mlink%>" target="_blank"><%=rs("names")%></a>
                                <div style="float:right"><%=xv%></div>
                            </td>
                            <td class="center"><%=rs("sex")%></td>
                            <td class="center"><%=rs("mem_by")%>/<%=rs("mem_bm")%>/<%=rs("mem_bd")%><%if rs("mem_by") <> "" then response.write "　　"&(year(date)-rs("mem_by"))&" 歲" end if%></td>
                            <td class="center"><%=rs("mem_school")%></td>
                            <td class="center"><%=rs("mem_jointime")%></td>

                            <td class="center"><%=mem_single%></td>

                            <td class="center">
                                <font color=green>已認列</font>
                                <font color=red>不認列</font>
                                <font color=black>無法認列</font>
                                <font color=blue>未認列</font>
                            </td>
                            <td>

                                <a href="#re" onclick="Mars_popup('ad_b2b_fix.asp?num=<%=nums%>&ty=<%=rs("ty")%>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=180,top=200,left=150');">處理</a>

                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td colspan="6" style="BORDER-bottom: #666666 1px dotted">

                                <a href="#re" onclick="Mars_popup('ad_report.asp?mem_num=<%=nums%>&lu=<%=rs("mem_username")%>&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">

                                    <a href="javascript:Mars_popup('ad_report.asp?k_id=<%=nums%>&ty=love','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">

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