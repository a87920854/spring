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

    $mem_auto = SqlFilter($_REQUEST["mem_auto"],"int");
    $mem_au = SqlFilter($_REQUEST["mem_au"],"tab");
    $mem_num = SqlFilter($_REQUEST["mem_num"],"int");

    // 會員讀取
    if( $mem_auto == "" && $mem_au == "" && $mem_num == ""){
        call_alert("會員編號讀取有誤。","ClOsE",0);
    }
    if( $_SESSION["MM_Username"] == "" ){
        call_alert("請重新登入。","login.php",0);
    }

    // 照片審查
    if( $_REQUEST["st"] == "pcheck" ){        
        switch($_REQUEST["t"]){
            case "pic":
                $key = "mem_photoe";
                if($_REQUEST["v"] == "1"){
                    $val = "ok";
                }else{
                    $val = "err";
                }
                break;
            case "p1":
                $key = "p1e";
                if($_REQUEST["v"] == "1"){
                    $val = "ok";
                }else{
                    $val = "err";
                }
                break;
            case "p2":
                $key = "p2e";
                if($_REQUEST["v"] == "1"){
                    $val = "ok";
                }else{
                    $val = "err";
                }
                break;
            case "p3":
                $key = "p3e";
                if($_REQUEST["v"] == "1"){
                    $val = "ok";
                }else{
                    $val = "err";
                }
                break;
        }
        $SQL = "UPDATE member_data SET " .$key. " = '" .$val. "' where mem_num = '" .$mem_num. "'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }

    // 刪除照片
    if( $_REQUEST["st"] == "pdel" ){
        $rs = $FunConn->prepare("select p1,p2,p3,p1e,p2e,p3e,mem_photo,mem_photoe,mem_photot from member_data where mem_num = '" .$mem_num. "'"); 
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $urlpath = dirname(__FILE__) . "\\images\\goldcardf\\";
            switch($_REQUEST["t"]){
                case "pic":
                    $mem_photo = null;
                    $mem_photoe = null;
                    $pic = $result["mem_photo"];
                    $urlpath = dirname(__FILE__) . "\\images\\photo\\";
                    $SQL =  "UPDATE member_data SET mem_photo = '" .$mem_photo. "', mem_photoe = '" .$mem_photoe. "' where mem_num = '" .$mem_num. "'";
                    break;
                case "p1":
                    $p1 = null;
                    $p1e = null;
                    $pic = $result["p1"];
                    $SQL =  "UPDATE member_data SET p1 = '" .$p1. "', p1e = '" .$p1e. "' where mem_num = '" .$mem_num. "'";
                    break;
                case "p2":
                    $p2 = null;
                    $p2e = null;
                    $pic = $result["p2"];
                    $SQL =  "UPDATE member_data SET p2 = '" .$p2. "', p2e = '" .$p2e. "' where mem_num = '" .$mem_num. "'";
                    break;
                case "p3":
                    $p3 = null;
                    $p3e = null;
                    $pic = $result["p3"];
                    $SQL =  "UPDATE member_data SET p2 = '" .$p3. "', p3e = '" .$p3e. "' where mem_num = '" .$mem_num. "'";
                    break;
            }
            $rs2 = $FunConn->prepare($SQL); 
            $rs2->execute();
    
            if($rs2){
                DelFile($urlpath . $pic ); //刪除照片實際檔案位置
            }
        }
        reURL("ad_fun_mem_detail.php?mem_num=" . $mem_num);
        exit;
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
            <li class="active">會員詳細資料 - 編號 <?php echo $mem_auto;?> - <?php echo $result["mem_name"]; ?></li>
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
                            <td><?php echo Date_EN($result["mem_by"],1); ?></td>
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
                            <td><?php echo $result["mem_job"]; ?>/<?php echo $result["mem_job2"]; ?></td>
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
                    <?php 
                        echo "<tr>";
                        if($result["mem_photo"] != ""){
                            echo "<td><a href='http://www.funtour.com.tw/images/photo/" . $result["mem_photo"] . "' class='fancybox'><img src='http://www.funtour.com.tw/images/photo/" . $result["mem_photo"] . "' style='width:90%'></a><br>" . changeDate(Date_EN($result["mem_photot"], 6)) . "</td>";
                        }else{
                            echo "<td colspan=3>未上傳</td>";
                        }     
                        echo "</tr>";

                        echo "<tr>";
                        if($result["mem_photo"] != ""){
                            if($result["mem_photoe"] == "ok"){
                                echo "<td style='text-align:center;color:green'>審核通過<br><a href='#e' onClick=\"Mars_popup('ad_fun_mem_detail.asp?st=pdel&t=pic&mem_num=" . $result["mem_num"] . "','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=400,height=250,top=100,left=100')\">刪除開放重傳</a></td>";
                            }elseif($result["mem_photoe"] == "err"){
                                echo "<td style='text-align:center;color:red'>不通過</td>";
                            }else{
                                echo "<td style='text-align:center;'><a href='?st=pcheck&v=1&t=pic&mem_num=" . $result["mem_num"] . "' class='btn btn-success'>通過審核</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='?st=pcheck&v=0&t=pic&mem_num=" . $result["mem_num"] . "' class='btn btn-danger'>不通過審核</a></td>";
                            }
                        }else{
                            echo "<td></td>";
                        }
                        echo "</tr>"
                    ?>
                    <tr>
                        <td width="33.3%">身分證正面</td>
                        <td width="33.3%">身分證反面</td>
                        <td width="33.3%">工作證或識別證</td>
                    </tr>
                    <?php
                        echo "<tr>"; 
                        if($result["p1"] != ""){
                            echo "<td><a href='http://www.funtour.com.tw/images/goldcardf/" . $result["p1"] . "' class='fancybox'><img src='http://www.funtour.com.tw/images/goldcardf/" . $result["p1"] . "' style='width:90%'></a></td>";
                        }else{
                            echo "<td>未上傳</td>";
                        }

                        if($result["p2"] != ""){
                            echo "<td><a href='http://www.funtour.com.tw/images/goldcardf/" . $result["p2"] . "' class='fancybox'><img src='http://www.funtour.com.tw/images/goldcardf/" . $result["p2"] . "' style='width:90%'></a></td>";
                        }else{
                            echo "<td>未上傳</td>";
                        }

                        if($result["p3"] != ""){
                            echo "<td><a href='http://www.funtour.com.tw/images/goldcardf/" . $result["p3"] . "' class='fancybox'><img src='http://www.funtour.com.tw/images/goldcardf/" . $result["p3"] . "' style='width:90%'></a></td>";
                        }else{
                            echo "<td>未上傳</td>";
                        }
                        echo "</tr>";

                        echo "<tr>"; 
                        if($result["p1"] != ""){
                            if($result["p1e"] == "ok"){
                                echo "<td style='text-align:center;color:green'>審核通過<br><a href='#e' onClick='Mars_popup('ad_fun_mem_detail.asp?st=pdel&t=p1&mem_num=" . $result["mem_num"] . "','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=400,height=250,top=100,left=100')'>刪除開放重傳</a></td>";
                            }elseif($result["p1e"] == "err"){
                                echo "<td style='text-align:center;color:red'>不通過</td>";
                            }else{
                                echo "<td style='text-align:center;'><a href='?st=pcheck&v=1&t=p1&mem_num=" . $result["mem_num"] . "' class='btn btn-success'>通過審核</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='?st=pcheck&v=0&t=p1&mem_num=" . $result["mem_num"] . "' class='btn btn-danger'>不通過審核</a></td>";
                            }                            
                        }else{
                            echo "<td></td>";
                        }

                        if($result["p2"] != ""){
                            if($result["p2e"] == "ok"){
                                echo "<td style='text-align:center;color:green'>審核通過<br><a href='#e' onClick='Mars_popup('ad_fun_mem_detail.asp?st=pdel&t=p2&mem_num=" . $result["mem_num"] . "','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=400,height=250,top=100,left=100')'>刪除開放重傳</a></td>";
                            }elseif($result["p2e"] == "err"){
                                echo "<td style='text-align:center;color:red'>不通過</td>";
                            }else{
                                echo "<td style='text-align:center;'><a href='?st=pcheck&v=1&t=p2&mem_num=" . $result["mem_num"] . "' class='btn btn-success'>通過審核</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='?st=pcheck&v=0&t=p2&mem_num=" . $result["mem_num"] . "' class='btn btn-danger'>不通過審核</a></td>";
                            }                            
                        }else{
                            echo "<td></td>";
                        }

                        if($result["p3"] != ""){
                            if($result["p3e"] == "ok"){
                                echo "<td style='text-align:center;color:green'>審核通過<br><a href='#e' onClick='Mars_popup('ad_fun_mem_detail.asp?st=pdel&t=p3&mem_num=" . $result["mem_num"] . "','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=400,height=250,top=100,left=100')'>刪除開放重傳</a></td>";
                            }elseif($result["p3e"] == "err"){
                                echo "<td style='text-align:center;color:red'>不通過</td>";
                            }else{
                                echo "<td style='text-align:center;'><a href='?st=pcheck&v=1&t=p3&mem_num=" . $result["mem_num"] . "' class='btn btn-success'>通過審核</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='?st=pcheck&v=0&t=p3&mem_num=" . $result["mem_num"] . "' class='btn btn-danger'>不通過審核</a></td>";
                            }                            
                        }else{
                            echo "<td></td>";
                        }
                        echo "</tr>";
                    ?>
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