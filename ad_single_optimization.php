<?php
	/*****************************************/
	//檔案名稱：ad_single_optimization.php
	//後台對應位置：名單/發送記錄>優化單身資料庫
	//改版日期：2021.10.8
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");
	
	$date1 = SqlFilter($_REQUEST["date1"],"tab");
	$date2 = SqlFilter($_REQUEST["date2"],"tab");
	$sex = SqlFilter($_REQUEST["sex"],"tab");
	$age1 = SqlFilter($_REQUEST["age1"],"int");
	$age2 = SqlFilter($_REQUEST["age2"],"int");
	$school = SqlFilter($_REQUEST["school"],"tab");
	$hhe = SqlFilter($_REQUEST["he"],"tab");
	$mem_money = SqlFilter($_REQUEST["mem_money"],"tab");
	$branch = SqlFilter($_REQUEST["branch"],"tab");
	$ssingle = SqlFilter($_REQUEST["single"],"tab");
	if ( $school == "" ){ $school = array();}
	if ( $mem_money == "" ){ $mem_money = array();}
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">優化單身資料庫</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>優化單身資料庫</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <form action="?st=search" method="post" target="_self" class="form-inline">
                    <p>日期：<input type="text" name="date1" id="date1" class="datepicker" autocomplete="off" value="<?php echo $date1;?>" autocomplete="off"> ~ <input type="text" name="date2" id="date2" class="datepicker" autocomplete="off" value="<?php echo $date2;?>" autocomplete="off"></p>
                    <p>性別：<input type="radio" name="sex" id="sex" value="男"<?php if ( $sex =="男" ){ echo " checked";}?>> 男 <input type="radio" name="sex" id="sex" value="女"<?php if ( $sex =="女" ){ echo " checked";}?>> 女
					<?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){?>
                        <select name="branch" id="branch">
                            <option value="">請選擇會館</option>
							<?php
							//會館顯示
							$SQL = "Select * From branch_data Where admin_sort<>99 Order By admin_sort";
							$rs = $SPConn->prepare($SQL);
							$rs->execute();
							$result=$rs->fetchAll(PDO::FETCH_ASSOC);
							foreach($result as $re){
								echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";
							} ?>
                        </select>　
                        <select name="single" id="single">
                            <option value="">請選擇秘書</option>
                        </select>
					<?php }?>
                    </p>
                    <p>年次：
                        <select name="age1" id="age1" class="form-control">
                            <option value="" selected>請選擇</option>
							<?php for ($i=(date("Y")-80);$i<=(date("Y")-17);$i++){?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
							<?php }?>
                        </select> ~
                        <select name="age2" id="age2" class="form-control">
                            <option value="" selected>請選擇</option>
                            <?php for ($i=(date("Y")-80);$i<=(date("Y")-17);$i++){?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
							<?php }?>
                        </select>
                        &nbsp;/&nbsp;身高：<select name="he" id="he" class="form-control">
                            <option value="" selected>請選擇</option>
							<?php for ($i=130;$i<=200;$i++){?>
								<option value="<?php echo $i;?>"><?php echo $i;?> cm</option>
							<?php }?>
                        </select> 以上
                    </p>
                    <p>學歷：
						<label class="inline"><input type="checkbox" name="school" id="school" value="國中"<?php if ( in_array("國中",$school) == 1 ){ echo " checked";}?>>國中</label>
                        <label class="inline"><input type="checkbox" name="school" id="school" value="高中"<?php if ( in_array("高中",$school) == 1 ){ echo " checked";}?>>高中</label>
                        <label class="inline"><input type="checkbox" name="school" id="school" value="高職"<?php if ( in_array("高職",$school) == 1 ){ echo " checked";}?>>高職</label>
                        <label class="inline"><input type="checkbox" name="school" id="school" value="專科"<?php if ( in_array("專科",$school) == 1 ){ echo " checked";}?>>專科</label>
                        <label class="inline"><input type="checkbox" name="school" id="school" value="大學"<?php if ( in_array("大學",$school) == 1 ){ echo " checked";}?>>大學</label>
                        <label class="inline"><input type="checkbox" name="school" id="school" value="碩士"<?php if ( in_array("碩士",$school) == 1 ){ echo " checked";}?>>碩士</label>
                        <label class="inline"><input type="checkbox" name="school" id="school" value="博士"<?php if ( in_array("博士",$school) == 1 ){ echo " checked";}?>>博士</label>
                    </p>
                    <p>年收入約：
                        <label class="inline"><input type="checkbox" name="mem_money" id="mem_money" value="50萬以下"<?php if ( in_array("50萬以下",$mem_money) == 1 ){ echo " checked";}?>> 50萬以下</label>
                        <label class="inline"><input type="checkbox" name="mem_money" id="mem_money" value="51萬到80萬"<?php if ( in_array("51萬到80萬",$mem_money) == 1 ){ echo " checked";}?>> 51萬到80萬</label>
                        <label class="inline"><input type="checkbox" name="mem_money" id="mem_money" value="81萬到100萬"<?php if ( in_array("81萬到100萬",$mem_money) == 1 ){ echo " checked";}?>> 81萬到100萬</label>
                        <label class="inline"><input type="checkbox" name="mem_money" id="mem_money" value="101萬到199萬"<?php if ( in_array("101萬到199萬",$mem_money) == 1 ){ echo " checked";}?>> 101萬到199萬</label>
                        <label class="inline"><input type="checkbox" name="mem_money" id="mem_money" value="200萬以上"<?php if ( in_array("200萬以上",$mem_money) == 1 ){ echo " checked";}?>> 200萬以上</label>
                    </p>
                    <p><input type="submit" value="送出" class="btn btn-default"></p>
                </form>
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th width="40">NO</th>
                            <th>入會日期</th>
                            <th>最初排約</th>
                            <th>邀約會館</th>
                            <th>邀約秘書</th>
                            <th>受理會館</th>
                            <th>受理秘書</th>
                            <th>來源</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>身高</th>
                            <th>學歷</th>
                            <th>年收</th>
                            <th>排約次數</th>
                            <th>金額</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						if ( $date1 == "" || $date2 == "" ){
							echo "<tr><td colspan='15'>請選擇日期區間</td></tr>";
						}else{
						  	if ( $date1 > $date2 ){ call_alert("起始日期不可大過結束日期。", 0, 0);}
						  	if ( $age1 > $age2 ){ call_alert("起始年次不可大過結束年次。", 0, 0);}
						  	if ( ( $age1 != "" && $age2 == "" ) || ( $age2 != "" && $age1 == "" ) ){ call_alert("年次需要選擇起始和結束。", 0, 0);}
							if ( $sex != "" ){ $subSQL1 = " And mem_sex='".$sex."'";} //性別
							if ( $age1 != "" && $age2 != "" ){ $subSQL2 = " And mem_by between '".$age1."' And '".$age2."'";} //出生年
							if ( $branch != "" ){ $subSQL3 = " And mem_branch='".$branch."'";} //會館
							if ( $ssingle != "" ){ $subSQL4 = " And mem_single='".$ssingle."'";} //祕書
							if ( $hhe != "" ){ $subSQL5 = " And mem_he>='".$hhe."'";} //身高
							if ( $school != "" ){ //學歷
								if ( count($school) > 0 ){
									$school_array = str_replace(" ", "", $school);
									$school_array = str_replace(",", "','", $school);
									$subSQL6 = " And (mem_school In ('".$school_array."'))";
								}else{
									$school_array = "";
									$subSQL6 = "";
								}
						  		
							}
							
							if ( $mem_money != "" ){ //年收入
								if ( count($mem_money) > 0 ){
									$mem_money_array = str_replace(" ", "", $mem_money);
									$mem_money_array = str_replace(",", "','", $mem_money);
									$subSQL7 = " And (mem_money In ('".$mem_money_array."'))";
								}else{
									$mem_money_array = "";
									$subSQL7 = "";
								}
							}
							
							if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
								$subSQL8 = "";
								//'qsql = qsql & " and mem_branch ='"&sessio&"'"
							}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "pay" ){
								$subSQL8 = " And mem_branch='".$_SESSION["branch"]."'";
							}else{
								$subSQL8 = " And mem_single='".$_SESSION["MM_username"]."'";
							}

							if ( $date1 != "" ){ $date1 = $date1 . " 00:00"; }
							if ( $date2 != "" ){ $date2 = $date2 . " 00:00"; }
							
							//sql = "select member_data.mem_time, member_data.mem_branch, member_data.mem_single,member_data.call_branch, member_data.call_single, member_data.mem_branch2, member_data.mem_level, member_data.mem_num, member_data.mem_photo, member_data.mem_username, member_data.mem_name, member_data.mem_sex, member_data.mem_by, member_data.mem_bm, member_data.mem_bd, member_data.mem_phone, member_data.mem_mobile, member_data.mem_mail, member_data.mem_area, member_data.mem_nick, member_data.mem_he, member_data.mem_school, member_data.mem_jy, member_data.mem_jm, member_data.mem_jd, member_data.mem_join, member_data.mem_come, member_data.mem_cc, member_data.mem_money, member_data.love_single, member_data.mem_single2,mem_jointime, (select COUNT(love_auto) from love_data_re where love_user = mem_username or love_user2 = mem_username) AS lovecount,(select top 1 love_time2 from love_data_re where love_user = mem_username or love_user2 = mem_username order by love_time2 asc) AS love_time2 from member_data where mem_level='mem' and mem_jointime between '"&date1&"' and '"&date2&"'"&qsql&" order by mem_time desc"
							$SQL  = "Select member_data.mem_time, member_data.mem_branch, member_data.mem_single,member_data.call_branch, member_data.call_single, member_data.mem_branch2, member_data.mem_level, member_data.mem_num, member_data.mem_photo, ";
							$SQL .= "member_data.mem_username, member_data.mem_name, member_data.mem_sex, member_data.mem_by, member_data.mem_bm, member_data.mem_bd, member_data.mem_phone, member_data.mem_mobile, member_data.mem_mail, member_data.mem_area, ";
							$SQL .= "member_data.mem_nick, member_data.mem_he, member_data.mem_school, member_data.mem_jy, member_data.mem_jm, member_data.mem_jd, member_data.mem_join, member_data.mem_come, member_data.mem_cc, member_data.mem_money, ";
							$SQL .= "member_data.love_single, member_data.mem_single2,mem_jointime,lovecount,lovecount2,first_love_time2,fixmoney From member_data Outer Apply (Select COUNT(love_auto) As lovecount From love_data_re Where ";
							$SQL .= "love_user = mem_username Or love_user2 = mem_username) aa outer apply (select top 1 love_time2 as first_love_time2 from love_data_re where love_user = mem_username or love_user2 = mem_username order by love_time2 asc) bb ";
							$SQL .= "outer apply (select COUNT(auton) as lovecount2 from si_invite where types <> 'branch' and stats = 8 and (mnum = mem_num or tnum = mem_num)) cc outer apply (select SUM(pay_total2) as fixmoney from pay_main where ";
							$SQL .= "pay_user = mem_username and pay_times between '".$date1."' And '".$date2."') dd where mem_level='mem' and mem_jointime between '".$date1."' and '".$date2."'";
							$SQL .= $subSQL1.$subSQL2.$subSQL3.$subSQL4.$subSQL5.$subSQL6.$subSQL7.$subSQL8." order by mem_time desc";
							$rs = $SPConn->prepare($SQL);
							$rs->execute();
							$result=$rs->fetchAll(PDO::FETCH_ASSOC);
							if ( count($result) > 0 ){
								$i = 0;
								foreach($result as $re){
									$i++;
									
									//最初排約
									if ( $re["first_love_time2"] != "" ){
										$date1 = date_create($re["first_love_time2"]);
										$date2 = date_create($re["mem_jointime"]);
										$diff = date_diff($date2,$date1);
										$diff->format("%R%a");
										if ( $diff->format("%R%a") < 0 ){
											$first_love_time2 = "<font color='red'>".date("Y-m-d",strtotime($re["first_love_time2"]))."</font>";
										}else{
											$first_love_time2 = date("Y/m/d",strtotime($re["first_love_time2"]));
											
										}
									}else{
										$first_love_time2 = "";
									}

									//邀約會館
									if ( $re["call_single"] != "" ){
										$call_single = SingleName($re["call_single"],"real");
									}else{
										$call_single = "";
									}
									
									$lovecount1 = $re["lovecount"];
									$lovecount2 = $re["lovecount2"];
									if ( empty($lovecount1) == 1 ){ $lovecount1 = 0;}
									if ( empty($lovecount2) == 1 || $lovecount2 == "" ){ $lovecount2 = 0;}
									$lovecount = $lovecount1+$lovecount2;
									
									$fixmoney = $re["fixmoney"];
									if ( empty($fixmoney) == 1 ){ $fixmoney = 0;} ?>
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo date("Y/m/d",strtotime($re["mem_jointime"]));?></td>
										<td><?php echo $first_love_time2;?></td>
										<td><?php echo $re["call_branch"];?></td>
										<td><?php echo $call_single;?></td>
										<td><?php echo $re["mem_branch"];?></td>
										<td><?php echo SingleName($re["mem_single"],"real");?></td>
										<td><?php echo $re["mem_come"];?></td>
										<td><a href="ad_mem_detail.php?mem_num=<?php echo $re["mem_num"];?>" target="_blank"><?php echo $re["mem_name"];?></a></td>
										<td><?php echo $re["mem_sex"];?></td>
										<td><?php echo $re["mem_by"];?>/<?php echo $re["mem_bm"];?>/<?php echo $re["mem_bd"];?></td>
										<td><?php echo $re["mem_he"];?></td>
										<td><?php echo $re["mem_school"];?></td>
										<td><?php echo $re["mem_money"];?></td>
										<td><?php echo $lovecount;?></td>
										<td><?php echo $fixmoney;?></td>
									</tr>
						<?php 	}
							}else{ echo "<tr><td colspan='16' style='color:red'>未有符合條件的資料</td></tr>";}
						} ?>
					
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {
        $("#branch").on("change", function() {
            personnel_get_send("branch", "single");
        });



    });
</script>