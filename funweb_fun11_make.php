<?php
    /*****************************************/
    //檔案名稱：funweb_fun12_downloas.php
    //後台對應位置：好好玩網站管理系統/活動配對信>產生配對信
    //改版日期：2021.12.28
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    if ($_REQUEST["st"] == "make") {
        if ($_REQUEST["v1data"] != "") {
            $v1data = str_replace("\r\n", "<br>", SqlFilter($_REQUEST["v1data"], "tab"));
        }
        if ($_REQUEST["v2data"] != "") {
            $v2data = str_replace("\r\n", "<br>", SqlFilter($_REQUEST["v2data"], "tab"));
        }
        if ($_REQUEST["v3data"] != "") {
            $v3data = str_replace("\r\n", "<br>", SqlFilter($_REQUEST["v3data"], "tab"));
        }
        if ($_REQUEST["v4data"] != "") {
            $v4data = str_replace("\r\n", "<br>", SqlFilter($_REQUEST["v4data"], "tab"));
        }
        if ($_REQUEST["v5data"] != "") {
            $v5data = str_replace("\r\n", "<br>", SqlFilter($_REQUEST["v5data"], "tab"));
        }

        // 產生html並下載
        header("Content-Type: application/octet-stream");
        $ua = $_SERVER["HTTP_USER_AGENT"];
        $filename = "EDM_funtour_".date("Y-m-d").".html"; //生成的文件名 
        $encoded_filename = urlencode($filename); 
        $encoded_filename = str_replace("+", "%20", $encoded_filename); 
        if (preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT']) ) { 
            header('Content-Disposition: attachment; filename="'.$encoded_filename.'"');
        } elseif (preg_match("/Firefox/", $_SERVER['HTTP_USER_AGENT'])) {
            // header('Content-Disposition: attachment; filename*="utf8' .$filename.'"');
            header('Content-Disposition: attachment; filename*="'.$filename.'"');
        } else {
            header('Content-Disposition: attachment; filename="'.$filename.'"');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>好好玩旅行社雙週快報</title>
</head>
<body style="margin: 0; padding: 0;background-color: #e6e6e6;">
		<table cellspacing="0" cellpadding="0" border="0" width="800" align="center" style="background-color: #f5f5f5;">
				<tr>
					<td width="800">
						<a href="https://www.funtour.com.tw/?cc=funtour_mail_biweekly" target="_blank" style="text-decoration: none;">
							<img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_header.png" alt="好好玩旅行社_雙週快報" style="vertical-align:middle;display:block;">
						</a>
					</td>
				</tr>
				<tr>
					<td style="background-color: #e7601c;">
						<p style="color: #fff; font-size: 20px; font-weight: bold; text-align: center; margin: 10px auto; line-height: 1;">
							<?php echo SqlFilter($_REQUEST["t1"],"tab"); ?>
						</p>
					</td>
				</tr>
				<tr>
					<td width="800">
						<a href="https://www.funtour.com.tw/eventdetail.asp?id=<?php echo SqlFilter($_REQUEST["v1num"],"tab"); ?>&cc=funtour_mail_biweekly" target="_blank" style="text-decoration: none;">
							<img border="0" src="<?php echo SqlFilter($_REQUEST["t2"],"tab"); ?>" alt="" style="vertical-align:middle;display:block; max-width: 100%;">
						</a>
					</td>
				</tr>				
				<tr>
					<td>
						<table cellspacing="0" cellpadding="0" border="0" width="800" align="center" style="">
							<tr>
								<td width="42">&nbsp;</td>
								<td width="474">
									<p style="color: #e7601c; font-size: 16px;">
										<?php echo $v1data; ?>
									</p>
								</td>
								<td width="42">&nbsp;</td>
								<td width="200">
									<a href="https://www.funtour.com.tw/eventdetail.asp?id=<?php echo SqlFilter($_REQUEST["v1num"],"tab"); ?>&cc=funtour_mail_biweekly" target="_blank" style="text-decoration: none;">
										<img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_button.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">
									</a>									
								</td>
								<td width="42">&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="800" height="20">&nbsp;</td>
				</tr>
				<tr>
					<td width="800">
						<table cellspacing="0" cellpadding="0" border="0" width="800" align="left" style="">
							<tr>
								<td width="42">&nbsp;</td>
								<td width="350">
									<table cellspacing="0" cellpadding="0" border="0" width="350" align="left">
										<tr>
											<td>
												<a href="https://www.funtour.com.tw/eventdetail.asp?id=<?php echo SqlFilter($_REQUEST["v2num"],"tab"); ?>&cc=funtour_mail_biweekly" target="_blank" style="text-decoration: none;">
													<img border="0" src="https://www.funtour.com.tw/webfile/upload_image/<?php echo SqlFilter($_REQUEST["v2photov"],"tab"); ?>" alt="" style="vertical-align:middle;display:block; max-width: 100%;">
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<p style="color: #e7601c; font-size: 16px;">
													<?php echo $v2data; ?>
												</p>
											</td>
										</tr>
										<tr>
											<td>
												<a href="https://www.funtour.com.tw/eventdetail.asp?id=<?php echo SqlFilter($_REQUEST["v2num"],"tab"); ?>&cc=funtour_mail_biweekly" target="_blank" style="text-decoration: none;">
													<img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_button.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">
												</a>
											</td>
										</tr>
									</table>
								</td>
								<td width="16">&nbsp;</td>
								<td width="350">
									<table cellspacing="0" cellpadding="0" border="0" width="350" align="left">
										<tr>
											<td>
												<a href="https://www.funtour.com.tw/eventdetail.asp?id=<?php echo SqlFilter($_REQUEST["v3num"],"tab"); ?>&cc=funtour_mail_biweekly" target="_blank" style="text-decoration: none;">
													<img border="0" src="https://www.funtour.com.tw/webfile/upload_image/<?php echo SqlFilter($_REQUEST["v3photov"],"tab"); ?>" alt="" style="vertical-align:middle;display:block; max-width: 100%;">
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<p style="color: #e7601c; font-size: 16px;">
													<?php echo $v3data; ?>
												</p>
											</td>
										</tr>
										<tr>
											<td>
												<a href="https://www.funtour.com.tw/eventdetail.asp?id=<?php echo SqlFilter($_REQUEST["v3num"],"tab"); ?>&cc=funtour_mail_biweekly" target="_blank" style="text-decoration: none;">
													<img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_button.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">
												</a>
											</td>
										</tr>
									</table>
								</td>
								<td width="42">&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="800" height="40">&nbsp;</td>
				</tr>	
				<tr>
					<td width="800">
						<table cellspacing="0" cellpadding="0" border="0" width="800" align="left" style="">
							<tr>
								<td width="42">&nbsp;</td>
								<td width="350">
									<table cellspacing="0" cellpadding="0" border="0" width="350" align="left">
										<tr>
											<td>
												<a href="https://www.funtour.com.tw/eventdetail.asp?id=<?php echo SqlFilter($_REQUEST["v4num"],"tab"); ?>&cc=funtour_mail_biweekly" target="_blank" style="text-decoration: none;">
													<img border="0" src="https://www.funtour.com.tw/webfile/upload_image/<?php echo SqlFilter($_REQUEST["v4photov"],"tab"); ?>" alt="" style="vertical-align:middle;display:block; max-width: 100%;">
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<p style="color: #e7601c; font-size: 16px;">
													<?php echo $v4data; ?>
												</p>
											</td>
										</tr>
										<tr>
											<td>
												<a href="https://www.funtour.com.tw/eventdetail.asp?id=<?php echo SqlFilter($_REQUEST["v4num"],"tab"); ?>&cc=funtour_mail_biweekly" target="_blank" style="text-decoration: none;">
													<img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_button.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">
												</a>
											</td>
										</tr>
									</table>
								</td>
								<td width="16">&nbsp;</td>
								<td width="350">
									<table cellspacing="0" cellpadding="0" border="0" width="350" align="left">
										<tr>
											<td>
												<a href="https://www.funtour.com.tw/eventdetail.asp?id=<?php echo SqlFilter($_REQUEST["v5num"],"tab"); ?>&cc=funtour_mail_biweekly" target="_blank" style="text-decoration: none;">
													<img border="0" src="https://www.funtour.com.tw/webfile/upload_image/<?php echo SqlFilter($_REQUEST["v5photov"],"tab"); ?>" alt="" style="vertical-align:middle;display:block; max-width: 100%;">
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<p style="color: #e7601c; font-size: 16px;">
													<?php echo $v5data; ?>
												</p>
											</td>
										</tr>
										<tr>
											<td>
												<a href="https://www.funtour.com.tw/eventdetail.asp?id=<?php echo SqlFilter($_REQUEST["v5num"],"tab"); ?>&cc=funtour_mail_biweekly" target="_blank" style="text-decoration: none;">
													<img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_button.png" alt="" style="vertical-align:middle;display:block; max-width: 100%;">
												</a>
											</td>
										</tr>
									</table>
								</td>
								<td width="42">&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="800" height="75">&nbsp;</td>
				</tr>				
				<tr>
					<td width="800">
						<a href="https://www.funtour.com.tw/events.asp?cc=funtour_mail_biweekly" target="_blank" style="display:block;font-size: 15px; line-height: 1.7; text-align: center;  color: #777; text-decoration: none;">
							<img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_more.png" alt="看更多精彩好玩的活動" style="vertical-align:middle;display:block;">
						</a>
					</td>
				</tr>
				<tr>
					<td width="800">
						<table cellspacing="0" cellpadding="0" border="0" width="800" height="90" align="center" style="font-size: 0; line-height: 0;">
							<tr>
								<td width="303">
									<a href="https://www.facebook.com/funtourfans" target="_blank" style="display:block;font-size: 15px; line-height: 1.7; text-align: center;  color: #777; text-decoration: none;">
										<img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_facebook.png" alt="facebook" width="300" height="90" alt="" style="vertical-align:middle;display:block;">
									</a>
								</td>
								<td width="98">
									<a href="https://www.instagram.com/funtoursingle/" target="_blank" style="display:block;font-size: 15px; line-height: 1.7; text-align: center;  color: #777; text-decoration: none;">
										<img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_ig.png" alt="ig" width="100" height="90" alt="" style="vertical-align:middle;display:block;">
									</a>
								</td>
								<td width="98">
									<a href="https://www.youtube.com/user/Funtour520" target="_blank" style="display:block;font-size: 15px; line-height: 1.7; text-align: center;  color: #777; text-decoration: none;">
										<img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_youtube.png" alt="youtube" width="100" height="90" alt="" style="vertical-align:middle;display:block;">
									</a>
								</td>
								<td width="303">
									<a href="https://lin.ee/woEWLuq" target="_blank" style="display:block;font-size: 15px; line-height: 1.7; text-align: center;  color: #777; text-decoration: none;">
										<img border="0" src="https://www.funtour.com.tw/images/edms/biweekly2020/images/funtourspringclub_line.png" alt="line" width="300" height="90" alt="" style="vertical-align:middle;display:block;">
									</a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="800">
						<a href="https://www.funtour.com.tw/?cc=funtour_mail_biweekly" target="_blank" style="display:block;font-size: 15px; line-height: 3; text-align: center;  color: #fff; text-decoration: none;background-color:#4d4d4d;">Copyright &copy; 好好玩旅行社有限公司 All Rights Reserve.</a>
					</td>
				</tr>
				<tr>
					<td width="800">
						<a href="_unsub_" target="_blank" style="display:block;font-size: 11px; line-height: 2; text-align: center; color: #777;background-color: #fff;">如您想要取消訂閱各項行程優惠電子報，請按此處反應→</a>
					</td>
				</tr>
		</table>
</body>
</html>