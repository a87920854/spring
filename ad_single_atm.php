<?php
	/*****************************************/
	//檔案名稱：ad_single_atm.php
	//後台對應位置：名單/發送記錄>分期服務記錄
	//改版日期：2021.10.15
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php")
?>
<!--jquery select-->
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">申辦分期會員服務記錄表</li>
        </ol>
    </header>
    <!-- /page title -->
    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>申辦分期會員服務記錄表</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
				<?php
				$date1 = $_REQUEST["date1"];
				$date2 = $_REQUEST["date2"];
				$sex = $_REQUEST["sex"];
				$branch = $_REQUEST["branch"];
				$ssingle = $_REQUEST["single"];
				?>
                <form action="?st=search" method="post" target="_self" class="form-inline">
                    <p>日期：<input type="text" name="date1" id="date1" class="datepicker" autocomplete="off" value="<?php echo $date1?>" autocomplete="off"> ~ <input type="text" name="date2" id="date2" class="datepicker" autocomplete="off" value="<?php echo $date2?>" autocomplete="off"></p>
                    <p>性別：
                        <label><input type="radio" name="sex" id="sex" value="男"<?php if ( $sex == "男" ){ echo " checked";}?>> 男</label>
                        <label><input type="radio" name="sex" id="sex" value="女"<?php if ( $sex == "女" ){ echo " checked";}?>> 女</label>
                        &nbsp;&nbsp;
						<?php if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "pay" ){ ?>
							<select name="branch" id="branch">
								<option value="">請選擇會館</option>
								<?php
								if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
									$SQL = "Select admin_name From branch_data Where admin_name<>'好好玩旅行社'";
									$rs = $SPConn->prepare($SQL);
									$rs->execute();
									$result=$rs->fetchAll(PDO::FETCH_ASSOC);
									foreach($result as $re){
										echo "<option value='".$re["admin_name"]."'";
										if ( $branch == $re["admin_name"] ){ echo " selected";}
										echo ">".$re["admin_name"]."</option>";
									}
								}else{
									echo "<option value='".$_SESSION["branch"]."'>".$_SESSION["branch"]."</option>";
								}
								?>
							</select>　
							<select name="single" id="single">
								<option value="">請選擇秘書</option>
								<?php
								if ( $_REQUEST["flag"] == "1" ){ 
									$SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' Order By p_desc2 Desc, lastlogintime Desc";
								}else{
									$SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' And p_work=1 Order By p_desc2 Desc, lastlogintime Desc";
								}
								if ( $branch != "" ){
									$rs_er = $SPConn->prepare($SQL_er);
									$rs_er->execute();
									$result_er=$rs_er->fetchAll(PDO::FETCH_ASSOC);
									foreach($result_er as $re_er){
										if ( $re_er["p_name"] != "" ){ $p_name = $re_er["p_name"]; }
										if ( $re_er["p_other_name"] != "" ){ $p_name = $re_er["p_other_name"]; }
										echo "<option value='".$re_er["p_user"]."'";
										if ( $ssingle == $re_er["p_user"] ){ echo " selected";}
										echo ">".$p_name."</option>";
									}
								}?>								
							</select>
						<?php }?>
                        &nbsp;&nbsp;<input type="submit" value="送出" class="btn btn-default">
                    </p>
                </form>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width="40">NO</th>
                            <th>入會日期</th>
                            <th>邀約會館</th>
                            <th>邀約秘書</th>
                            <th>受理會館</th>
                            <th>受理秘書</th>
                            <th>來源</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>備註</th>
                            <th>排約次數</th>
                            <th>金額</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						if ( $_REQUEST["date1"] == "" || $_REQUEST["date2"] == "" ){
							echo "<tr><td colspan='15'>請選擇日期區間</td></tr>";
						}else{
						  	$subSQL = "";
						  	if ( $date1 > $date2 ){ call_alert("起始日期不可大過結束日期。", 0, 0);}					  		
						  	if ( $sex != "" ){
						  		$subSQL = $subSQL . " And mem_sex='".$sex."'";
							}
						  	if ( $branch != "" ){
								$subSQL = $subSQL . " And mem_branch='".$branch."'";
							}
						  	if ( $ssingle != "" ){
								$subSQL = $subSQL . " And (mem_single='".$ssingle."' Or call_single='".$ssingle."')";
						  	}
							if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
								//subSQL = subSQL & " and mem_branch ='"&sessio&"'"
							}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "pay" ){
								$subSQL = $subSQL . " And (mem_branch ='".$_SESSION["branch"]."' Or call_branch ='".$_SESSION["branch"]."')";
							}else{      
								$subSQL = $subSQL . " And (mem_single ='".$_SESSION["MM_username"]."' Or call_single='".$_SESSION["MM_username"]."')";
							}

						  	if ( $date1 != "" ){
								$date1 = $date1 ." 00:00";
							}
						  	if ( $date2 != "" ){
						  	  	$date2 = $date2 ." 23:59";
							}
							
						  	//sql = "select member_data.mem_time, member_data.mem_branch, member_data.mem_single,member_data.call_branch, member_data.call_single, member_data.mem_branch2, member_data.mem_level, member_data.mem_num, member_data.mem_photo, member_data.mem_username, member_data.mem_name, member_data.mem_sex, member_data.mem_by, member_data.mem_bm, member_data.mem_bd, member_data.mem_phone, member_data.mem_mobile, member_data.mem_mail, member_data.mem_area, member_data.mem_nick, member_data.mem_he, member_data.mem_school, member_data.mem_jy, member_data.mem_jm, member_data.mem_jd, member_data.mem_join, member_data.mem_come, member_data.mem_cc, member_data.mem_money, member_data.love_single, member_data.mem_single2,mem_jointime, (select COUNT(love_auto) from love_data_re where love_user = mem_username or love_user2 = mem_username) AS lovecount,(select top 1 love_time2 from love_data_re where love_user = mem_username or love_user2 = mem_username order by love_time2 asc) AS love_time2 from member_data where mem_level='mem' and mem_jointime between '"&date1&"' and '"&date2&"'"&qsql&" order by mem_time desc"
					  		//sql = "select member_data.mem_time, member_data.mem_branch, member_data.mem_single,member_data.call_branch, member_data.call_single, member_data.mem_branch2, member_data.mem_level, member_data.mem_num, member_data.mem_photo, member_data.mem_username, member_data.mem_name, member_data.mem_sex, member_data.mem_by, member_data.mem_bm, member_data.mem_bd, member_data.mem_phone, member_data.mem_mobile, member_data.mem_mail, member_data.mem_area, member_data.mem_nick, member_data.mem_he, member_data.mem_school, member_data.mem_jy, member_data.mem_jm, member_data.mem_jd, member_data.mem_join, member_data.mem_come, member_data.mem_cc, member_data.mem_money, member_data.love_single, member_data.mem_single2,mem_jointime,lovecount,lovecount2,first_love_time2,fixmoney from member_data outer apply (select COUNT(love_auto) as lovecount from love_data_re where love_user = mem_username or love_user2 = mem_username) aa outer apply (select top 1 love_time2 as first_love_time2 from love_data_re where love_user = mem_username or love_user2 = mem_username order by love_time2 asc) bb outer apply (select COUNT(auton) as lovecount2 from si_invite where types <> 'branch' and stats = 8 and (mnum = mem_num or tnum = mem_num)) cc outer apply (select SUM(pay_total2) as fixmoney from pay_main where pay_user = mem_username and pay_times between '"&date1&"' and '"&date2&"') dd where mem_level='mem' and mem_jointime between '"&date1&"' and '"&date2&"'"&qsql&" order by mem_time desc"
						  	$SQL  = "Select * From member_data Outer Apply (Select Count(love_auto) As lovecount From love_data_re Where love_user = mem_username Or love_user2 = mem_username) aa ";
							$SQL .= "Outer Apply (Select Count(auton) As lovecount2 From si_invite Where types <> 'branch' And stats = 8 And (mnum = mem_num Or tnum = mem_num)) cc";
							$SQL .= "Right Join (Select Sum(pay_total2) As fixmoney, pay_user, Max(pay_atm2) As pay_atm2 From pay_main Where (pay_atm2 <> '' And pay_user <> '' And pay_user <> '0') Group By pay_user) pp ";
							$SQL .= "On pay_user = mem_username Where mem_time between '".$date1."' And '".$date2."'".$subSQL."";
							//echo $SQL;
							//exit;
						  	$rs = $SPConn->prepare($SQL);
							$rs->execute();
							$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						  	if ( count($result) == 0 ){
								echo "<tr><td colspan='15'>未有符合條件的資料</td></tr>";
							}else{
								$ii = 0;
						  	    foreach($result as $re){
									$ii = $ii + 1;
									echo "<tr>";
									echo "<td>".$ii."</td>";
									echo "<td>".$re["mem_jointime"]."</td>";
									echo "<td>".$re["call_branch"]."</td>";
									if ( $re["call_single"] != "" ){
										echo "<td>".SingleName_real($re["call_single"])."</td>";
									}else{
										echo "<td></td>";
									}
									echo "<td>".$re["mem_branch"]."</td>";
									echo "<td>".SingleName_real($re["mem_single"])."</td>";
									echo "<td>".$re["mem_come"]."</td>";
									echo "<td><a href='ad_mem_detail.php?mem_num=".$re["mem_num"]."' target='_blank'>".$re["mem_name"]."</a>";
									echo " <a href='ad_mem_pay_detail.php?mem_username=".$re["pay_user"]."&uname=".$re["mem_name"]."' class='btn btn-xs btn-warning'>收支</a>";
									echo "</td>";
									echo "<td>".$re["mem_sex"]."</td>";
									echo "<td>".$re["mem_by"]."/".$re["mem_bm"]."/".$re["mem_bd"]."</td>";
									echo "<td>".$re["pay_atm2"]."</td>";
									$lovecount = $re["lovecount"];
									$lovecount2 = $re["lovecount2"];
									if ( empty($lovecount) || $lovecount == "" ){
										$lovecount = 0;
									}
									if ( empty($lovecount2) || $lovecount2 == "" ){
										$lovecount2 = 0;
									}
									echo "<td>".($lovecount+$lovecount2)."</td>";
									$fixmoney = $re["fixmoney"];
									if ( empty($fixmoney) || $fixmoney == "" ){
										$fixmoney = 0;
									}
									echo "<td>".$fixmoney."</td>";
									echo "</tr>";
								}
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
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
 /*   $(function() {
        $("#branch").on("change", function() {
            personnel_get_send("branch", "single");
        });
    });*/
</script>