<?php
    error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_love_detail.php
	//後台對應位置：名單/發送記錄>活動報名資料(會員詳細資料視窗)
	//改版日期：2021.10.19
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");

    $k_id = SqlFilter($_REQUEST["k_id"],"tab");
    $SQL = "Select * From love_keyin Where k_id=".$k_id;
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    //判斷是否有資料_START
    if ( count($result) == 0 ){
        call_alert("讀取資料錯誤。","ClOsE", 0);
    }else{
?>
<style type="text/css">
    body table {
        font-size: 13px;
    }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body text="#333333" leftmargin="0" topmargin="0">
    <table width="672" border="0" cellspacing="0">
        <tr>
            <td width="670" valign="top">
                <table width="670" border="1" style="border-collapse:collapse;">
                    <tr>
                        <td height="25" bgcolor="#336699">
                            <div align="center">
                                <font color="#990066" size="3">
                                    <strong>
                                        <font color="#FFFFFF">報名詳細資料</font>
                                    </strong>
                                </font>
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="670" border="1" cellpadding="3" style="border-collapse:collapse;">
                    <tr>
                        <td width="80">
                            <div align="right">姓名：</div>
                        </td>
                        <td width="246"><?php echo $re["k_name"];?></td>
                        <td width="80">
                            <div align="right">性別：</div>
                        </td>
                        <td width="246"><?php echo $re["k_sex"];?></td>
                    </tr>
                    <tr>
                        <td width="80">
                            <div align="right">身分證字號：</div>
                        </td>
                        <td width="246"><?php echo $re["k_fid"];?></td>
                        <td width="80">
                            <div align="right">生日：</div>
                        </td>
                        <td width="246"><?php echo Date_EN($re["k_bday"],1);?></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">年次：</div>
                        </td>
                        <td><?php echo $re["k_year"];?></td>
                        <td>
                            <div align="right">學歷：</div>
                        </td>
                        <td><?php echo $re["k_school"];?></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">手機：</div>
                        </td>
                        <td><?php echo $re["k_mobile"];?></td>
                        <td>
                            <div align="right">電話：</div>
                        </td>
                        <td><?php echo $re["k_phone"];?></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">地址：</div>
                        </td>
                        <td colspan="3"><?php echo $re["k_area"].$re["k_address"];?></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">E-mail：</div>
                        </td>
                        <td><?php echo $re["k_yn"];?></td>
                        <td>
                            <div align="right">婚姻狀態：</div>
                        </td>
                        <td><?php echo $re["k_marry"];?></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">LINE：</div>
                        </td>
                        <td><?php echo $re["k_line"];?></td>
                        <td>
                            <div align="right">FB 名稱：</div>
                        </td>
                        <td><?php echo $re["k_fbname"];?></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">公司名稱：</div>
                        </td>
                        <td><?php echo $re["k_company"];?></td>
                        <td>
                            <div align="right">現任職稱：</div>
                        </td>
                        <td><?php echo $re["k_company2"];?></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">職業：</div>
                        </td>
                        <td><?php echo $re["k_job"];?></td>
                        <td>
                            <div align="right">來源：</div>
                        </td>
                        <td><?php echo $re["k_come"];?></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">飲食習慣：</div>
                        </td>
                        <td><?php echo $re["k_eat"];?></td>
                        <td>
                            <div align="right">上車地點：</div>
                        </td>
                        <td><?php echo $re["ac_car"];?></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">餐點：</div>
                        </td>
                        <td><?php echo $re["k_eat1"];?></td>
                        <td>
                            <div align="right">飲品：</div>
                        </td>
                        <td><?php echo $re["k_eat2"];?></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">處理會館：</div>
                        </td>
                        <td><?php echo $re["all_branch"];?></td>
                        <td>
                            <div align="right">處理秘書：</div>
                        </td>
                        <td><?php if ( $re["all_single"] != "" ){ echo SingleName($re["all_single"],"normal"); }?></td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">處理項目：</div>
                        </td>
                        <td><?php echo $re["all_type"];?></td>
                        <td>
                            <div align="right">資料時間：</div>
                        </td>
                        <td><?php echo changeDate($re["k_time"]);?></td>
                    </tr>
                    <tr>
                        <td>同意公開：</div>
                        </td>
                        <td colspan="3"><?php echo $re["k_2"];?></td>
                    </tr>
                    <tr>
                        <td>報名備註：</div>
                        </td>
                        <td colspan="3"><?php echo $re["all_note2"];?></td>
                    </tr>
                    <tr>
                        <td>處理內容：</div>
                        </td>
                        <td colspan="3"><?php echo $re["all_note"];?></td>
                    </tr>
                </table>

                <?php if ( $re["all_kind"] == "活動" ){ //活動表格_START ?>
                    <table width="670" border="1" cellpadding="3" style="border-collapse:collapse;">
                        <?php
		  	            echo "<tr>";
                        echo "<td colspan='2' bgcolor='#336699'>";
                        echo "<div align='center'><font color='#990066' size='3'><strong><font color='#FFFFFF' size='2'>證件上傳</font></strong></font></div></td></tr>";
		                if ( $re["mem_num"] != "" ){
                            $SQL1 = "Select mem_p1,mem_p2,mem_p3,mem_p4 From member_data Where mem_num='".$re["mem_num"]."'";
                            $rs1 = $SPConn->prepare($SQL1);
                            $rs1->execute();
                            $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result1 as $re1);
		                    //rsp.open "select mem_p1,mem_p2,mem_p3,mem_p4 from member_data where mem_num='"&rs("mem_num")&"'", SPCon, 1, 1
                            if ( count($result1) == 0 ){
		  	                    echo "<tr><td>無上傳證件</td></tr>";
                            }else{
                                $p1 = $re1["mem_p1"];
                                $p2 = $re1["mem_p2"];
                                $p3 = $re1["mem_p3"];
                                $p4 = $re1["mem_p4"];
                                $chphoto = 0;
                                if ( $p1 != "" ){
		                            echo "<tr><td colspan='2'><img width='100%' src='idcard/".$p1."?rndt=".(int)(rand()*9999)."'></td></tr>";
		                            $chphoto = 1;
		                        }
		                        if ( $p2 != "" ){
		                            echo "<tr><td colspan='2'><img width='100%' src='idcard/".$p2."?rndt=".(int)(rand()*9999)."'></td></tr>";
                                    $chphoto = 1;
                                }
		                        if ( $p3 != "" ){
		                            echo "<tr><td colspan='2'><img width='100%' src='idcard/".$p3."?rndt=".(int)(rand()*9999)."'></td></tr>";
		                            $chphoto = 1;
                                }
		                        if ( $p4 != "" ){
		                            echo "<tr><td colspan='2'><img width='100%' src='idcard/".$p4."?rndt=".(int)(rand()*9999)."'></td></tr>";
		                            $chphoto = 1;
                                }

		                        if ( $chphoto == 0 ){
                                    echo "<tr><td colspan='3'>證件均未上傳</td></tr>";
                                }
                            }
                        } ?>
                        <tr>
                            <td colspan="2" bgcolor="#336699">
                                <div align="center">
                                    <strong>
                                        <font color="#FFFFFF" size="2">活動資料</font>
                                    </strong>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="76">
                                <div align="right">活動會館：</div>
                            </td>
                            <td width="570"><?php echo $re["action_branch"];?></td>
                        </tr>
                        <tr>
                            <td width="80">
                                <div align="right">價格：</div>
                            </td>
                            <td width="572"><?php echo $re["k_money"];?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">活動時間：</div>
                            </td>
                            <td><?php echo $re["action_time"];?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">活動標題：</div>
                            </td>
                            <td><?php echo $re["action_title"];?>[<?php echo $re["action_auto"];?>]</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">活動內容：</div>
                            </td>
                            <td><?php echo $re["action_note"];?></td>
                        </tr>
                    </table>
                <?php } //活動表格_END ?>

                <?php if ( $re["all_kind"] == "排約" ){ //排約表格_START ?>
                    <table width="670" border="1" cellpadding="3" style="border-collapse:collapse;">
                        <tr>
                            <td colspan="4" bgcolor="#336699">
                                <div align="center">
                                    <strong>
                                    <font color="#FFFFFF" size="2">對方排約資料</font>
                                    </strong>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">所屬會館：</div>
                            </td>
                            <td><?php echo $re["e_branch"];?></td>
                            <td><div align="right">編號：</div></td>
                            <?php
                            $SQL1 = "Select * From member_data Where mem_username='".$re["e_user"]."'";
                            $rs1 = $SPConn->prepare($SQL1);
                            $rs1->execute();
                            $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result1 as $re1);
			                if ( count($result1) == 0 || $re["e_user"] == "" ){
                                $SQL2 = "Select * From member_data Where mem_mobile='".$re["e_mobile"]."'";
                                $rs2 = $SPConn->prepare($SQL2);
                                $rs2->execute();
                                $result2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result2 as $re2);
				                if ( count($result2) == 0 ){
					                $emem_num = "";
                                }else{
				                    $emem_num = $re2["mem_num"];
                                }
                            }else{
				                $emem_num = $re1["mem_num"];
                            }

			                if ( $emem_num == "" ){
				                $emem_num = "無會員編號";
                            } ?>
                            <td><?php echo $emem_num; ?></td>
                        </tr>
                        <tr>
                            <td width="80">
                                <div align="right">姓名：</div>
                            </td>
                            <td width="237"><?php echo $re["e_name"];?></td>
                            <td width="85">
                                <div align="right">年次：</div>
                            </td>
                            <td width="234"><?php echo ($re["e_year"]-1911);?>年次</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">手機：</div>
                            </td>
                            <td><?php echo $re["e_mobile"];?></td>
                            <td>
                            <div align="right">學歷：</div>
                            </td>
                            <td><?php echo $re["e_school"];?></td>
                        </tr>
                    </table>
                <?php } //排約表格_END ?>
            </td>
        </tr>
    </table>
</body>
</html>
<?php }?>