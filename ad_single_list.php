<?php
	/*****************************************/
	//檔案名稱：ad_single_list.php
	//後台對應位置：名單/發送記錄>祕書履歷
	//改版日期：2021.10.18
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");
	set_time_limit(0); 
	check_page_power("ad_single_list");

	if ( $_SESSION["MM_UserAuthorization"] == "admin"){
		$branch = SqlFilter($_REQUEST["branch"],"tab");
		if ( $branch != "" ){
			$subSQL = "And p_branch ='".$branch."'";
			if ( $branch == "迷你約"){ //2022.01.10 因迷你約業績掛在八德，若以迷你約的帳號登入則需看到原迷你約的資料
				$branch = "八德";
				$subSQL = $subSQL. " and team_name='迷你約' ";
			}            
		}
		$SQL  = "Select * From personnel_data_aparty Outer Apply (Select Count(mem_auto) As nob From member_data As dba Where mem_single=personnel_data_aparty.p_user And mem_level='guest' And mem_time >= '2015/01/01' And (";
		$SQL .= "Select Count(log_auto) From log_data Where log_1 = dba.mem_mobile And log_single=dba.mem_single) < 1) mm Where q_year = 0 ".$subSQL;
	}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
		$branch = $_SESSION["branch"];
		if ( $branch == "迷你約" ){ //2022.01.10 因迷你約業績掛在八德，若以迷你約的帳號登入則需看到原迷你約的資料
            $branch = "八德";
            $subSQL = " and team_name='迷你約' ";
		}
	    $SQL  = "Select * From personnel_data_aparty Outer Apply (Select Count(mem_auto) As nob From member_data As dba Where mem_single=personnel_data_aparty.p_user And mem_level='guest' And mem_time >= '2015/01/01' And (";
		$SQL .= "Select Count(log_auto) From log_data Where log_1 = dba.mem_mobile And log_single=dba.mem_single) < 1) mm Where q_year = 0 And p_branch ='".$branch."'".$subSQL;
	}elseif ( $_SESSION["MM_UserAuthorization"] == "manager" ){
		$SQL1 = "Select p_user From personnel_data_aparty Where team_name='".$_SESSION["team_name"]."'";
		$rs1 = $SPConn->prepare($SQL1);
		$rs1->execute();
		$result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
		if ( count($select1) > 0 ){
			//dim allgroupid()
			$counter = 0;
			foreach($result1 as $re1){
				//ReDim Preserve allgroupid(counter)
				//allgroupid(counter) = ars("p_user")
				$counter = ($counter + 1);
			}
		}
		/*if ( isarray(allgroupid) ){
			//allgroupidstr = join(allgroupid, "','")
			$branch = $_SESSION["branch"];
			$SQL  = "Select * From personnel_data_aparty Outer Apply (Select Count(mem_auto) As nob From member_data As dba Where mem_single=personnel_data_aparty.p_user And mem_level='guest' And mem_time >= '2015/01/01' And (";
			$SQL .= "Select Count(log_auto) From log_data Where log_1 = dba.mem_mobile And log_single=dba.mem_single) < 1) mm Where q_year = 0 And p_branch ='".$branch."' And p_user in ('".$allgroupidstr."')";
		}else{
			Call Alert("小組組員資料錯誤。"&session("team_name"), 0, 0);
		}*/
	}else{
		header("location:ad_single_view.asp?st=my");
	}

	if ( SqlFilter($_REQUEST["keyword_type"],"tab") == "s1" && SqlFilter($_REQUEST["keyword"],"tab") != "" ){
		$subSQL .= " And p_auto Like '%".str_replace(SqlFilter($_REQUEST["keyword"],"tab"), "'", "''")."%'";
	}
	
	if ( SqlFilter($_REQUEST["keyword_type"],"tab") == "s2" && SqlFilter($_REQUEST["keyword"],"tab") != "" ){
		$subSQL .= " And p_name Like '%".str_replace(SqlFilter($_REQUEST["keyword"],"tab"), "'", "''")."%'";
	}
	
	if ( SqlFilter($_REQUEST["keyword_type"],"tab") == "s3" && SqlFilter($_REQUEST["keyword"],"tab") != "" ){
		$subSQL .= " And p_user Like '%".str_replace(SqlFilter($_REQUEST["keyword"],"tab"), "'", "''")."%'";
	}

	$SQL .= $subSQL." Order By p_branch desc, q_year asc, p_auto Desc";
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">秘書履歷</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>秘書履歷</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12 margin-bottom-10">
                    <form action="?st=search" method="post" target="_self" class="form-inline">
						<?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){?>
							<select name="branch" id="branch">
								<option value="">請選擇會館</option>
								<?php
								if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
									$SQL1 = "Select admin_name From branch_data Where admin_name<>'好好玩旅行社'";
									$rs1 = $SPConn->prepare($SQL1);
									$rs1->execute();
									$result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
									foreach($result1 as $re1){
										echo "<option value='".$re1["admin_name"]."'";
										if ( $branch == $re1["admin_name"] ){ echo " selected";}
										echo ">".$re1["admin_name"]."</option>";
									}
								}else{
									echo "<option value='".$_SESSION["branch"]."'>".$_SESSION["branch"]."</option>";
								}
								?>
							</select>
						<?php }?>
						<select name="keyword_type" id="keyword_type">
                            <option value="s2">姓名</option>
                            <option value="s3">身分證字號</option>
                            <option value="s1">流水號</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" type="text" class="form-control">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
						<?php
						if ( $branch == "" && SqlFilter($_REQUEST["sear"],"tab") != "1" ){
							echo "<tr><td>請最少選擇會館。</td></tr>";
						}else{
							$rs = $SPConn->prepare($SQL);
							$rs->execute();
							$result = $rs->fetchAll(PDO::FETCH_ASSOC); ?>
							<tr>
								<th>會館</th>
								<th>姓名</th>
								<th>別名</th>
								<th>職稱</th>
								<th>流水號</th>
								<th>尚未開發</th>
								<th width="80"></th>
							</tr>
							<?php foreach($result as $re){ ?>
								<tr>
									<td><?php echo $re["p_branch"];?></td>
									<td><?php echo $re["p_name"];?></td>
									<td><?php echo $re["p_other_name"];?></td>
									<td><?php echo $re["p_job2"];?></td>
									<td><?php echo $re["p_auto"];?></td>
									<td><a href="ad_no_mem.php?s=nokaifa&u=<?php echo $re["p_user"];?>"><?php echo $re["nob"];?></a></td>
									<td><a href="ad_single_view.php?an=<?php echo $re["p_auto"];?>">履歷</a></td>
								</tr>
							<?php }?>
						<?php }?>
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
require("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {
        $("#search_send").on("click", function(event) {
            if (!$("#keyword").val() && !$("#branch").val()) {
                $("#keyword").focus();
                alert("請輸入要搜尋的關鍵字。");
                return false;
            }
            if (!$("#keyword_type").val()) {
                alert("have error。");
                return false;
            }
            location.href = "ad_single_list.php?sear=1&vst=full&branch=" + $("#branch").val() + "&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        });


    });
</script>