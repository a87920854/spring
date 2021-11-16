<?php 
    /*****************************************/
    //檔案名稱：ad_fun_mem_execl.php
    //後台對應位置：好好玩管理系統/會員管理系統>匯出Excel
    //改版日期：2021.11.12
    //改版程式人員：jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    //程式開始 *****
	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}

    //判斷權限並設置查詢語句
    switch ( $_SESSION["MM_UserAuthorization"] ) {
        case "admin":          
		    $sqls = "SELECT * FROM member_data WHERE 1 = 1";
            break;
        case "branch":
        case "love":
		    $sqls = "SELECT * FROM member_data WHERE mem_branch= '" .$_SESSION["branch"]. "'";
            break;
        default:
            $sqls = "SELECT * FROM member_data Where UPPER(mem_single) = '" .strtoupper($_SESSION["MM_username"]). "'";
            break;
    }

    // 查詢
    if( $_REQUEST["s1"] != "" ){
        $sqlss = $sqlss. " and mem_mail like '%" .SqlFilter($_REQUEST["s1"],"tab"). "%'";
    }
    if( $_REQUEST["s2"] != "" ){
        $cs2 = reset_number(SqlFilter($_REQUEST["s2"],"int"));
	    $sqlss = $sqlss . " and mem_mobile like N'%" .$cs2. "%'";
    }
    if( $_REQUEST["s3"] != "" ){
        $sqlss = $sqlss. " and mem_name like '%" .SqlFilter($_REQUEST["s3"],"tab"). "%'";
    }
    if( $_REQUEST["s4"] != "" ){
        $sqlss = $sqlss. " and mem_auto like '%" .SqlFilter($_REQUEST["s4"],"int"). "%'";
    }
    if( $_REQUEST["s5"] != "" ){
        $sqlss = $sqlss. " and mem_username like '%" .SqlFilter($_REQUEST["s5"],"tab"). "%'";
    }

    if( $_REQUEST["s7"] != "" ){
        $sqlss = $sqlss. " and UPPER(mem_single) like '%" .strtoupper(SqlFilter($_REQUEST["s7"],"tab")). "%'";
    }
    if( $_REQUEST["s8"] != "" ){
        $sqlss = $sqlss. " and mem_come like '%" .SqlFilter($_REQUEST["s8"],"tab"). "%'";
    }
    if( $_REQUEST["s10"] != "" ){
        $sqlss = $sqlss. " and mem_school like '%" .SqlFilter($_REQUEST["s10"],"tab"). "%'";
    }
    if( $_REQUEST["s11"] != "" ){
        $sqlss = $sqlss. " and mem_area like '%" .SqlFilter($_REQUEST["s11"],"tab"). "%'";
    }
    if( $_REQUEST["s12"] != "" ){
        $sqlss = $sqlss. " and mem_branch like '%" .SqlFilter($_REQUEST["s12"],"tab"). "%'";
    }
    if( $_REQUEST["s13"] != "" ){
        $sqlss = $sqlss. " and mem_single like '%" .SqlFilter($_REQUEST["s13"],"tab"). "%'";
    }
    if( $_REQUEST["m1"] != "" ){
        $sqlss = $sqlss. " and month(mem_by) = '" .SqlFilter($_REQUEST["m1"],"tab"). "'";
    }
    if( $_REQUEST["d1"] != "" ){
        $sqlss = $sqlss. " and day(mem_by) = '" .SqlFilter($_REQUEST["d1"],"tab"). "'";
    }
    if( $_REQUEST["s21"] != "" ){
        $sqlss = $sqlss. " and mem_sex like '%" .SqlFilter($_REQUEST["s21"],"tab"). "%'";
    }
    if( $_REQUEST["s97"] != "" ){
        $sqlss = $sqlss. " and mem_cc = '" .SqlFilter($_REQUEST["s97"],"tab"). "'";
    }
    if( $_REQUEST["s22"] != "" ){
        $d1 = SqlFilter($_REQUEST["s22"],"int") . "/" . SqlFilter($_REQUEST["s23"],"int") . "/1";
        $acre_sign1 = Date_EN($d1,1);
        if(!chkDate($acre_sign1)){
            call_alert("起始日期有誤。", 0, 0);
        }
    }
    if( $_REQUEST["s24"] != "" ){
        $d2 = SqlFilter($_REQUEST["s24"],"int") . "/" . SqlFilter($_REQUEST["s25"],"int")+1 . "/1";
        $acre_sign2 = Date_EN($d2,1);
        $acre_sign2 = date('Y/m/d',strtotime( $acre_sign2.'-1 day' ));
        if(!chkDate($acre_sign2)){
            call_alert("結束日期有誤。", 0, 0);
        }
    }
    if(chkDate($acre_sign1) && chkDate($acre_sign2)){
        $acre_sign1 = date_create($acre_sign1);
        $acre_sign2 = date_create($acre_sign2);
        $diff = date_diff($acre_sign1,$acre_sign2);
        if($diff->days <= 0){
            call_alert("起始日期不能大於結束日期。", 0, 0);
        }
        $sqlss = $sqlss . " and mem_time between '" . $acre_sign1 . "' and '" . $acre_sign2 . "'";
    }

    if( $_REQUEST["s27"] != "" && $_REQUEST["s28"] != "" ){
        $sqlss = $sqlss. " and year(mem_by) between '" .SqlFilter($_REQUEST["s28"],"int"). "' and '".SqlFilter($_REQUEST["s27"],"int"). "'";
    }elseif( $_REQUEST["s27"] != "" ){
        $sqlss = $sqlss & " and year(mem_by) = " .SqlFilter($_REQUEST["s27"],"int");
    }
    if( $_REQUEST["a1"] != "" ){
        $sqlss = $sqlss. " and all_type like '%" .SqlFilter($_REQUEST["a1"],"tab"). "%'";
    }

    //組合查詢語句 
    $sqls = $sqls . $sqlss ." order by mem_auto desc";

    // 設定excel的檔案名稱
    $filename = date("Y-m-d") ."_". basename(__FILE__ ,".php");
    header('Content-type:application/vnd.ms-excel;charset=UTF-8');  //宣告網頁格式
    header('Content-Disposition: attachment; filename=' . $filename . '.xls');  //設定檔案名稱
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html>  
    <head>  
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />  
        <style id="Classeur1_16681_Styles"></style>  
    </head>  
<body>
<div id="Classeur1_16681" align=center x:publishsource="Excel">  
  <table cellSpacing=0 cellPadding=0 width="100%" border=1 style="border-collapse:collapse;">       
        <thead>
            <tr>
                <th>資料來源</th>
                <th>編號</th>
                <th>姓名</th>
                <th>性別</th>
                <th>電話</th>								  
                <th>生日</th>
                <th>EMAIL</th>
                <th>學歷</th>
                <th>會館</th>
                <th>秘書</th>
                <th width=80>系統來源</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $rs = $FunConn->prepare($sqls);
                $rs->execute();
                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                if (!$result){
                    echo "<tr><td colspan=10 height=200>目前沒有資料</td></tr>";
                }else{
                    foreach($result as $re){;
                        $mem_su = $re["mem_su"];
                        if($mem_su != ""){
                            if(is_numeric(explode(",",$mem_su)[0])){
                                $mem_su = "_" . num_branch(explode(",",$mem_su)[0]) . "_" . explode(",",$mem_su)[1];
                            }
                        }
                        if($re["mem_cc"] != ""){
                            $mem_cc = " [".$re["mem_cc"]."]";
                        }else{
                            $mem_cc = "";
                        }?>
                        <tr>
                            <td class="center"><?php echo $re["mem_come"];?><?php echo $mem_come_su;?><?php echo $mem_come_cc;?></td>
                            <td><?php echo $re["mem_auto"];?></td>
                            <td class="center"><?php echo $re["mem_name"];?></td>
                            <td class="center"><?php echo $re["mem_sex"];?></td>
                            <td class="center"><?php echo $re["mem_mobile"];?></td>
                            <td class="center"><?php echo Date_EN($re["mem_by"],1);?></td>
                            <td class="center"><?php echo $re["mem_mail"];?></td>
                            <td class="center"><?php echo $re["mem_school"];?></td>
                            <td class="center"><?php echo $re["mem_branch"];?></td>
                            <?php 
                                $mem_single = $re["mem_single"];
                                if($mem_single != ""){
                                    $mem_single = SingleName($mem_single,"normal");
                                }else{
                                    $mem_single = "無";
                                }
                            ?>
                            <td class="center"><?php echo $mem_single;?></td>								
                            <td class="center"><?php echo $re["mem_tcome"];?></td>
                        </tr>
                    
                <?php } 
                }
            ?>
		 </tbody>
	</table>
</div>
</body>
</html>
<script type="text/javascript">
	setTimeout(function(){ window.close(); }, 5000);
</script>