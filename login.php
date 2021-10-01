<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="google-site-verification" content="e_P3y7ErKbaDG1q0bSUJpnFerE5UFhCmb55Rh0ghVrk" />
<title>SD CRM</title>

<!-- mobile settings -->
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

<!-- WEB FONTS -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext"	rel="stylesheet" type="text/css" />

<!-- CORE CSS -->
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- THEME CSS -->
<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
<link href="assets/css/layout.css?v=1.1" rel="stylesheet" type="text/css" />
<link href="assets/css/color_scheme/green.css?v=1.1" rel="stylesheet" type="text/css" id="color_scheme" />
</head>
<script language="JavaScript">
	//判斷表單欄位
	function sbForm(){
		if(fieldCheck0()){
		  document.form1.submit();
		}
	}
	  
	function fieldCheck0(theForm) {
		var theForm = document.form1;	
		if (theForm.f_username.value == ""  ){
			alert("請輸入您的帳號!"); 
			theForm.f_username.focus();
			return false;
		}		
	  
		if (theForm.password.value == ""  ){
			alert("請輸入您的密碼!"); 
			theForm.password.focus();
			return false;
		}	
		
		return true;
	}
</script>
<body>
	<div class="padding-15">
		<div class="login-box">
		
			<!-- login form -->
			<form class="sky-form boxed" role="form" action="tran_login.php" method="post" name="form1" id="form1" onsubmit='if(fieldCheck0(this)){return true; login(this);} else {return false;}'>
				<header class="text-center">SD CRM</header>
				<fieldset>
					<section>
						<label class="label">帳號</label>
						<label class="input">
							<i class="icon-append fa fa-user"></i>
							<input type="text" name="f_username" id="f_username" required>
							<span class="tooltip tooltip-top-right">請輸入您的帳號</span>
						</label>
					</section>

					<section>
						<label class="label">密碼</label>
						<label class="input">
							<i class="icon-append fa fa-lock"></i>
							<input type="password" name="f_passwd" id="f_passwd" required>
							<b class="tooltip tooltip-top-right">請輸入您的密碼</b>
						</label>
					</section>

					<section>
						<label class="label">臨時授權碼</label>
						<label class="input">
							<i class="icon-append fa fa-lock"></i>
							<input type="text" name="f_acceptsn" id="f_acceptsn">
							<b class="tooltip tooltip-top-right">臨時授權碼，如無免填</b>
						</label>
					</section>
				</fieldset>

				<footer>
					<button type="submit" name="Submit" class="btn btn-primary col-md-12 nomargin" value="登入">登入</button>
				</footer>
			</form>
			<!-- /login form -->
			<hr />
		</div>
	</div>

</body>
</html>