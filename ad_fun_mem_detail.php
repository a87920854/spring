<?php
    /*****************************************/
	//檔案名稱：ad_fun_mem_detail.php
	//後台對應位置：好好玩管理系統/會員管理系統/會員詳細資料
	//改版日期：2021.10.26
	//改版設計人員：Jack
	//改版程式人員：Jack
	/*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    $mem_auto = $_REQUEST["mem_auto"];
    $mem_au = $_REQUEST["mem_au"];
    $mem_num = $_REQUEST["mem_num"];

    // 會員讀取
    if( $mem_auto == "" && $mem_au == "" ){
        call_alert("會員編號讀取有誤。","ClOsE",0);
    }
    if( $_SESSION["MM_Username"] == "" ){
        call_alert("請重新登入。","login.php",0);
    }

    // 照片審查
    if( $_REQUEST["st"] == "pcheck" ){
        $SQL = "select p1,p2,p3,p1e,p2e,p3e,mem_photo,mem_photoe,mem_photot from member_data where mem_num = '" .$mem_num. "'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
        if(count($result) > 0){
            switch($_REQUEST["t"]){
                case "pic":
                    if($_REQUEST["v"] == "1"){

                    }

            }
        }
    }

    // 照片刪除
    if( $_REQUEST["st"] == "pdel" ){

    }

    // 讀取會員資料
    if($mem_auto != ""){
        $SQL = "select * from member_data where mem_auto ='" . $mem_auto . "'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
    }elseif($mem_num != ""){
        $SQL = "select * from member_data where mem_num ='" . $mem_num . "'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
    }else{
        $SQL = "select * from member_data where mem_auto ='" . $mem_au . "'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
    }

    if(!$result){
        call_alert("會員資料讀取有誤。", 0,0);
    }
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_mem.php">會員管理系統</a></li>
            <li class="active">會員詳細資料 - 編號 <?php echo $mem_auto; ?> - <?php echo $result["mem_name"]; ?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員詳細資料 - 編號 <?php echo $mem_auto; ?> - <?php echo $result["mem_name"]; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                    <tbody>

                        <tr>
                            <td width="92">
                                <div align="right">編號：</div>
                            </td>
                            <td width="267"><?php echo $result["mem_num"]; ?></td>
                            <td width="94">
                                <div align="right">身分證字號：</div>
                            </td>
                            <td width="269"><?php echo $result["mem_username"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">姓名：</div>
                            </td>
                            <td><?php echo $result["mem_name"]; ?></td>
                            <td>
                                <div align="right">密碼：</div>
                            </td>
                            <td><?php echo $result["mem_passwd"]; ?></td>
                        </tr>

                        <tr>
                            <td>
                                <div align="right">性別：</div>
                            </td>
                            <td><?php echo $result["mem_sex"]; ?></td>
                            <td>
                                <div align="right">來源：</div>
                            </td>
                            <td><?php                                 
                                $mem_su = $result["mem_su"];
                                if($mem_su != ""){
                                    if( is_numeric(explode(",", $mem_su)[0])){
                                        $mem_su = "-" . num_branch(explode(",", $mem_su)[0]) . "-" . explode(",", $mem_su)[1];
                                    }
                                }
                                if($result["mem_cc"] != ""){
                                    $mem_cc = " [" . $result["mem_cc"] . "]";
                                }else{
                                    $mem_cc = "";
                                }
                                echo $result["mem_come"]; 
                                echo $mem_su;
                                echo $mem_cc;
                            ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">生日：</div>
                            </td>
                            <td><?php echo $result["mem_by"]; ?></td>
                            <td>
                                <div align="right">手機：</div>
                            </td>
                            <td><?php echo $result["mem_mobile"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">E-mail：</div>
                            </td>
                            <td><?php echo $result["mem_mail"]; ?></td>
                            <td>
                                <div align="right">飲食習慣：</div>
                            </td>
                            <td><?php echo $result["mem_eat"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">Line ID：</div>
                            </td>
                            <td><?php echo $result["lineid"]; ?></td>
                            <td>
                                <div align="right">FACEBOOK：</div>
                            </td>
                            <td><?php echo $result["fbid"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">地址：</div>
                            </td>
                            <td><?php echo $result["mem_area"]; ?>　<?php echo $result["mem_address"]; ?></td>
                            <td>
                                <div align="right">工作縣市：</div>
                            </td>
                            <td><?php echo $result["mem_workcity"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">身高：</div>
                            </td>
                            <td><?php echo $result["mem_he"]; ?></td>
                            <td>
                                <div align="right">血型：</div>
                            </td>
                            <td><?php echo $result["mem_blood"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">體重：</div>
                            </td>
                            <td><?php echo $result["mem_we"]; ?></td>
                            <td>
                                <div align="right">星座：</div>
                            </td>
                            <td><?php echo $result["mem_star"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">職業：</div>
                            </td>
                            <td><?php echo $result["mem_job1"]; ?></td>
                            <td>
                                <div align="right">學歷：</div>
                            </td>
                            <td><?php echo $result["mem_school"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">服務機關/職務名稱：</div>
                            </td>
                            <td><?php echo $result["mem_job"]; ?><?php echo $result["mem_job2"]; ?></td>
                            <td>
                                <div align="right">婚姻狀態：</div>
                            </td>
                            <td><?php echo $result["mem_marry"]; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">會館：</div>
                            </td>
                            <td><?php echo $result["mem_branch"]; ?></td>
                            <td>
                                <div align="right">秘書：</div>
                            </td>
                            <td><?php echo SingleName($result["mem_single"],"normal"); ?>（<a href="#" class="a1" onClick="Mars_popup('ad_fun_mem_branch_fix.php?mem_auto=<?php echo $result["mem_auto"]; ?>&mem_branch=<?php echo $result["mem_branch"]; ?>','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=400,height=250,top=100,left=100')">修改</a>）</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">加入日期：</div>
                            </td>
                            <td colspan=3><?php echo changeDate($result["mem_time"]); ?></td>
                        </tr>
                        <tr>
                            <td align="right">處理情形：</td>
                            <td colspan=3><?php echo $result["all_type"]; ?></td>
                        </tr>
                        <tr>
                            <td align="right">處理內容：</td>
                            <td colspan=3>
                                <?php echo $result["mem_note"]; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>檔案審核</p>
                <table class="table table-striped table-bordered bootstrap-datatable input_small">
                    <tr>
                        <td width="33.3%">生活照</td>
                        <td width="33.3%"></td>
                        <td width="33.3%"></td>
                    </tr>
                    <tr>
                        <td><a href="http://www.funtour.com.tw/images/photo/10005268_mem_photo_741232020721115027598.jpg" class="fancybox"><img src="http://www.funtour.com.tw/images/photo/10005268_mem_photo_741232020721115027598.jpg" style="width:90%"></a><br>2020/7/21 上午 11:50:27</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;"><a href="?st=pcheck&v=1&t=pic&mem_num=10005268" class="btn btn-success">通過審核</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?st=pcheck&v=0&t=pic&mem_num=10005268" class="btn btn-danger">不通過審核</a></td>
                    </tr>
                    <tr>
                        <td width="33.3%">身分證正面</td>
                        <td width="33.3%">身分證反面</td>
                        <td width="33.3%">工作證或識別證</td>
                    </tr>
                    <tr>
                        <td><a href="http://www.funtour.com.tw/images/goldcardf/10005268_p1_3560292020721115114175.jpg" class="fancybox"><img src="http://www.funtour.com.tw/images/goldcardf/10005268_p1_3560292020721115114175.jpg" style="width:90%"></a></td>
                        <td><a href="http://www.funtour.com.tw/images/goldcardf/10005268_p2_7793842020721115133670.jpg" class="fancybox"><img src="http://www.funtour.com.tw/images/goldcardf/10005268_p2_7793842020721115133670.jpg" style="width:90%"></a></td>
                        <td><a href="http://www.funtour.com.tw/images/goldcardf/10005268_p3_8268232020721115152356.jpg" class="fancybox"><img src="http://www.funtour.com.tw/images/goldcardf/10005268_p3_8268232020721115152356.jpg" style="width:90%"></a></td>
                    </tr>
                    <tr>
                        <td style="text-align:center;"><a href="?st=pcheck&v=1&t=p1&mem_num=10005268" class="btn btn-success">通過審核</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?st=pcheck&v=0&t=p1&mem_num=10005268" class="btn btn-danger">不通過審核</a></td>
                        <td style="text-align:center;"><a href="?st=pcheck&v=1&t=p2&mem_num=10005268" class="btn btn-success">通過審核</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?st=pcheck&v=0&t=p2&mem_num=10005268" class="btn btn-danger">不通過審核</a></td>
                        <td style="text-align:center;"><a href="?st=pcheck&v=1&t=p3&mem_num=10005268" class="btn btn-success">通過審核</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?st=pcheck&v=0&t=p3&mem_num=10005268" class="btn btn-danger">不通過審核</a></td>
                    </tr>

                </table>

            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>

    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $mtu = "ad_fun_mem.";
    $(function() {

    });
</script>