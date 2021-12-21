<?php
    /*****************************************/
    //檔案名稱：ad_fun_email_list.php
    //後台對應位置：好好玩管理系統/企業委辦>發送
    //改版日期：2021.12.15
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    if($_REQUEST["st"] == "send"){
        $emails = str_replace(" ","",SqlFilter($_REQUEST["emails"],"tab"));
        if($emails == ""){
            call_alert("請在查詢框內輸入 email",0,0);
        }
        $emails = explode("\r\n",$emails);
        foreach($emails as $email){
            $email = "'".$email."'";
            if(count($emails) >= 1){                
                if($allEmail != ""){
                    $allEmail = $allEmail.",".$email;
                }else{
                    $allEmail = $email;
                }
            }
        }
        $SQL = "SELECT * FROM member_data WHERE mem_mail in (".$allEmail.")";
    }else{
        $SQL = "SELECT * FROM member_data WHERE 1=0";
    }
    $SQL = $SQL . " order by mem_auto desc";
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">好好玩信箱對照</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩信箱對照</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <form action="?st=send" method="post" name="form5" class="form-inline">
                                <td align="center"><textarea name="emails" style="width:80%;height:100px;" class="form-control"></textarea>
                                    <p><input type="submit" value="查詢" class="btn btn-info" style="width:50%;"></p>
                                </td>
                            </form>
                        </tr>
                </table>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <th>姓名</th>
                        <th>性別</th>
                        <th>生日</th>
                        <th>電話</th>
                        <th>email</th>
                        <th width=80></th>
                    </tr>
                        <?php 
                            $rs = $FunConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=6 height=200>目前沒有資料</td></tr>";
                            }else{
                                foreach($result as $re){ ?>
                                    <tr>
                                        <td align="center"><?php echo $re["mem_name"]; ?></td>
                                        <td align="center"><?php echo $re["mem_sex"]; ?></td>
                                        <td align="center"><?php echo Date_EN($re["mem_by"],1); ?></td>
                                        <td align="center"><?php echo $re["mem_mobile"]; ?></td>
                                        <td align="center"><?php echo $re["mem_mail"]; ?></td>
                                        <td align="center">
                                            <div class="btn-group">							
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <?php 
                                                        $SQL2 = "select count(log_auto) as r from log_data where log_num=".$re["mem_auto"]." and log_5='member'";
                                                        $rs2 = $FunConn->prepare($SQL2);
                                                        $rs2->execute();
                                                        $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                                        if(!$result2 || $result2["r"] == 0){
                                                            $report = 0;
                                                        }else{
                                                            $report = $result2["r"];
                                                        }                                                        
                                                    ?>
                                                    <li><a href="ad_fun_mem_detail.php?mem_auto=<?php echo $re["mem_auto"]; ?>" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                                    <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=<?php echo $re["mem_auto"]; ?>&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(<?php echo $report; ?>)</a></li>
                                                    <?php 
                                                        if($_SESSION["MM_UserAuthorization"] != "single"){ ?>
                                                            <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=<?php echo $re["mem_auto"]; ?>','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
								                            <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=<?php echo $re["mem_auto"]; ?>','','location=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                                        <? }
                                                        if($_SESSION["MM_UserAuthorization"] == "admin"){ ?>
                                                            <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=<?php echo $re["mem_auto"]; ?>','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                                        <? }
                                                    ?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                            (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=<?php echo $re["mem_auto"]; ?>&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(<?php echo $report; ?>)</a>，處理情形：<font color="#FF0000" size="2"><?php echo $re["all_type"]; ?><?php echo $re["all_type2"]; ?>　 <?php echo $re["mem_branch"]; ?><?php if($re["mem_single"] != ""){ echo SingleName($re["mem_single"],"normal");} ?></font>) 內容：<?php echo $re["all_note"]; ?>
                                        </td>
                                    </tr>
                                <?php }
                            }                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    <hr>
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>