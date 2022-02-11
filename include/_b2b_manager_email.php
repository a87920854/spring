<?php
    function go_b2b_manager($t){
        $rm = "";
        switch($t){
            // 通過
            case 1:
                $rm = $rm . "<center><table width='800' height='auto' border='0' style='display:block;' cellpadding='0' cellspacing='0'>" . PHP_EOL;
                $rm = $rm . "<tr>" . PHP_EOL;
                $rm = $rm . "		<td><h1>恭喜您，斜槓紅娘的線上申請已經審核通過！</h1></td>" . PHP_EOL;
                $rm = $rm . "</tr>" . PHP_EOL;
                $rm = $rm . "<tr>" . PHP_EOL;
                $rm = $rm . "		<td><br><b>成為收入多元的斜槓人之前，請先閱讀以下兩點</b><br></td>" . PHP_EOL;
                $rm = $rm . "</tr>" . PHP_EOL;
                $rm = $rm . "<tr>" . PHP_EOL;
                $rm = $rm . "		<td><font color=red>※</font>登入斜槓紅娘後台系統啟用帳號即表示您同意本合約條款內容(詳見附件)</td>" . PHP_EOL;
                $rm = $rm . "<tr>" . PHP_EOL;
                $rm = $rm . "		<td><font color=red>※</font>若有人透過您推廣的連結成功加入會員，我們會mail通知請您上傳以下資料至系統後台：" . PHP_EOL;
                $rm = $rm . "<br>1. 銀行帳戶資料，供日後推廣獎金匯款之用。<br>2. 身分證正反面照片，供報稅之用。" . PHP_EOL;
                $rm = $rm . "</td>" . PHP_EOL;
                $rm = $rm . "</tr>" . PHP_EOL;
                $rm = $rm . "<tr>" . PHP_EOL;
                $rm = $rm . "		<td><br><b>簡單三個步驟，輕鬆開啟您不一樣的斜槓生活</b><br></td>" . PHP_EOL;
                $rm = $rm . "</tr>" . PHP_EOL;
                $rm = $rm . "<tr>" . PHP_EOL;
                $rm = $rm . "		<td><br><br>步驟1. <br>使用下方網址登入斜槓紅娘後台系統<br><a href='https://www.singleparty.com.tw/slash/mg/login'>https://www.singleparty.com.tw/slash/mg/login</a></td>" . PHP_EOL;
                $rm = $rm . "</tr>" . PHP_EOL;
                $rm = $rm . "<tr>" . PHP_EOL;
                $rm = $rm . "		<td><br><br>步驟2. <br>輸入註冊時建立的代號與密碼，進行登入</td>" . PHP_EOL;
                $rm = $rm . "</tr>" . PHP_EOL;
                $rm = $rm . "<tr>" . PHP_EOL;
                $rm = $rm . "		<td><br><br>步驟3. <br>分享您專屬的連結給朋友或想要認識對象的單身男女</td>" . PHP_EOL;
                $rm = $rm . "</tr>" . PHP_EOL;
                $rm = $rm . "<tr>" . PHP_EOL;
                $rm = $rm . "		<td align='center'><p><br><br><br>只要透過您專屬的連結註冊成為會員，您就會得到獎金</p><p>分享越多機會越多！</p><p>現在開始，跟我們一起為夢想中的生活而努力吧！</p></td>" . PHP_EOL;
                $rm = $rm . "</tr>" . PHP_EOL;
                $rm = $rm . "<tr>" . PHP_EOL;
                $rm = $rm . "		<td><br>關於約會專家 >> <a href='https://www.singleparty.com.tw/aboutus.asp'>https://www.singleparty.com.tw/aboutus.asp</a></td>" . PHP_EOL;
                $rm = $rm . "</tr>" . PHP_EOL;
                $rm = $rm . "<tr>" . PHP_EOL;
                $rm = $rm . "		<td>關於斜槓紅娘 >> <a href='https://www.singleparty.com.tw/slash/'>https://www.singleparty.com.tw/slash/</a></td>" . PHP_EOL;
                $rm = $rm . "</tr>" . PHP_EOL;
                $rm = $rm . "<tr>" . PHP_EOL;
                $rm = $rm . "		<td style='font-size:70%;'><br><br><br><br>此為系統自動通知信，請勿直接回信。<br>若有任何問題<a href='https://www.singleparty.com.tw/contact.asp'>請點此聯繫客服</a>，留下您的問題，我們會盡快與您聯繫。</td>" . PHP_EOL;
                $rm = $rm . "</tr>" . PHP_EOL;
                $rm = $rm . "</table></center>";
                break;
            // 不通過    
            default:
                $rm = $rm . "<center><table width='800' height='auto' border='0' style='display:block;' cellpadding='0' cellspacing='0'>" . PHP_EOL;
                $rm = $rm . "	<tr>" . PHP_EOL;
                $rm = $rm . "		<td><h1>很抱歉，斜槓紅娘的線上申請審核未通過！</h1></td>" . PHP_EOL;
                $rm = $rm . "	</tr>" . PHP_EOL;
                $rm = $rm . "	<tr>" . PHP_EOL;
                $rm = $rm . "		<td><br>您的申請資格未符合標準，但是歡迎您使用約會專家的交友服務，謝謝您。<br></td>" . PHP_EOL;
                $rm = $rm . "	</tr>" . PHP_EOL;
                $rm = $rm . "	<tr>" . PHP_EOL;
                $rm = $rm . "		<td style='font-size:70%;'><br><br><br><br>此為系統自動通知信，請勿直接回信。<br>若有任何問題<a href='https://www.singleparty.com.tw/contact.asp'>請點此聯繫客服</a>，留下您的問題，我們會盡快與您聯繫。</td>" . PHP_EOL;
                $rm = $rm . "	</tr>" . PHP_EOL;    
                $rm = $rm . "</table></center>";
        }
        return $rm;
    }
?>