<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li>

                <a href="ad_fun_action1.php">好好玩國內活動</a>

            </li>
            <li class="active">報名系統搜尋</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>報名系統搜尋</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="searchform" action="" method="post" target="_self" class="form-inline" onsubmit="return take_action()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td>類別：
                                    <select id="search_page">
                                        <option value="" selected>請選擇</option>
                                        <option value="ad_fun_action1.php?sear=1&vst=full">好好玩國內活動</option>
                                        <option value="ad_fun_action3.php?sear=1&vst=full">好好玩國內活動-資料版</option>
                                        <option value="ad_fun_action2.php?sear=1&vst=full">好好玩國外旅遊</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>手機：
                                    <input name="s2" type="text" id="s2" size="20" maxlength="10" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>姓名：
                                    <input name="s3" type="text" id="s3" size="20" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>信箱：
                                    <input name="s1" type="text" id="s1" size="20" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>地區：
                                    <select name="s11" id="s11">
                                        <option value="">請選擇</option>
                                        <option value="台北">台北</option>
                                        <option value="桃園">桃園</option>
                                        <option value="新竹">新竹</option>
                                        <option value="台中">台中</option>
                                        <option value="台南">台南</option>
                                        <option value="高雄">高雄</option>
                                        <option value="廈門">廈門</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td>年次：
                                    <select name="s27" id="s27">
                                        <option value="" selected>請選擇</option>
                                        <option value="2001">2001 - 20 歲</option>
                                        <option value="2000">2000 - 21 歲</option>
                                        <option value="1999">1999 - 22 歲</option>
                                        <option value="1998">1998 - 23 歲</option>
                                        <option value="1997">1997 - 24 歲</option>
                                        <option value="1996">1996 - 25 歲</option>
                                        <option value="1995">1995 - 26 歲</option>
                                        <option value="1994">1994 - 27 歲</option>
                                        <option value="1993">1993 - 28 歲</option>
                                        <option value="1992">1992 - 29 歲</option>
                                        <option value="1991">1991 - 30 歲</option>
                                        <option value="1990">1990 - 31 歲</option>
                                        <option value="1989">1989 - 32 歲</option>
                                        <option value="1988">1988 - 33 歲</option>
                                        <option value="1987">1987 - 34 歲</option>
                                        <option value="1986">1986 - 35 歲</option>
                                        <option value="1985">1985 - 36 歲</option>
                                        <option value="1984">1984 - 37 歲</option>
                                        <option value="1983">1983 - 38 歲</option>
                                        <option value="1982">1982 - 39 歲</option>
                                        <option value="1981">1981 - 40 歲</option>
                                        <option value="1980">1980 - 41 歲</option>
                                        <option value="1979">1979 - 42 歲</option>
                                        <option value="1978">1978 - 43 歲</option>
                                        <option value="1977">1977 - 44 歲</option>
                                        <option value="1976">1976 - 45 歲</option>
                                        <option value="1975">1975 - 46 歲</option>
                                        <option value="1974">1974 - 47 歲</option>
                                        <option value="1973">1973 - 48 歲</option>
                                        <option value="1972">1972 - 49 歲</option>
                                        <option value="1971">1971 - 50 歲</option>
                                        <option value="1970">1970 - 51 歲</option>
                                        <option value="1969">1969 - 52 歲</option>
                                        <option value="1968">1968 - 53 歲</option>
                                        <option value="1967">1967 - 54 歲</option>
                                        <option value="1966">1966 - 55 歲</option>
                                        <option value="1965">1965 - 56 歲</option>
                                        <option value="1964">1964 - 57 歲</option>
                                        <option value="1963">1963 - 58 歲</option>
                                        <option value="1962">1962 - 59 歲</option>
                                        <option value="1961">1961 - 60 歲</option>
                                        <option value="1960">1960 - 61 歲</option>
                                        <option value="1959">1959 - 62 歲</option>
                                        <option value="1958">1958 - 63 歲</option>
                                        <option value="1957">1957 - 64 歲</option>
                                        <option value="1956">1956 - 65 歲</option>
                                        <option value="1955">1955 - 66 歲</option>
                                        <option value="1954">1954 - 67 歲</option>
                                        <option value="1953">1953 - 68 歲</option>
                                        <option value="1952">1952 - 69 歲</option>
                                        <option value="1951">1951 - 70 歲</option>
                                        <option value="1950">1950 - 71 歲</option>
                                        <option value="1949">1949 - 72 歲</option>
                                        <option value="1948">1948 - 73 歲</option>
                                        <option value="1947">1947 - 74 歲</option>
                                        <option value="1946">1946 - 75 歲</option>
                                        <option value="1945">1945 - 76 歲</option>
                                        <option value="1944">1944 - 77 歲</option>
                                        <option value="1943">1943 - 78 歲</option>
                                        <option value="1942">1942 - 79 歲</option>
                                        <option value="1941">1941 - 80 歲</option>
                                    </select> ~ <select name="s28" id="s28">
                                        <option value="" selected>請選擇</option>
                                        <option value="2001">2001 - 20 歲</option>
                                        <option value="2000">2000 - 21 歲</option>
                                        <option value="1999">1999 - 22 歲</option>
                                        <option value="1998">1998 - 23 歲</option>
                                        <option value="1997">1997 - 24 歲</option>
                                        <option value="1996">1996 - 25 歲</option>
                                        <option value="1995">1995 - 26 歲</option>
                                        <option value="1994">1994 - 27 歲</option>
                                        <option value="1993">1993 - 28 歲</option>
                                        <option value="1992">1992 - 29 歲</option>
                                        <option value="1991">1991 - 30 歲</option>
                                        <option value="1990">1990 - 31 歲</option>
                                        <option value="1989">1989 - 32 歲</option>
                                        <option value="1988">1988 - 33 歲</option>
                                        <option value="1987">1987 - 34 歲</option>
                                        <option value="1986">1986 - 35 歲</option>
                                        <option value="1985">1985 - 36 歲</option>
                                        <option value="1984">1984 - 37 歲</option>
                                        <option value="1983">1983 - 38 歲</option>
                                        <option value="1982">1982 - 39 歲</option>
                                        <option value="1981">1981 - 40 歲</option>
                                        <option value="1980">1980 - 41 歲</option>
                                        <option value="1979">1979 - 42 歲</option>
                                        <option value="1978">1978 - 43 歲</option>
                                        <option value="1977">1977 - 44 歲</option>
                                        <option value="1976">1976 - 45 歲</option>
                                        <option value="1975">1975 - 46 歲</option>
                                        <option value="1974">1974 - 47 歲</option>
                                        <option value="1973">1973 - 48 歲</option>
                                        <option value="1972">1972 - 49 歲</option>
                                        <option value="1971">1971 - 50 歲</option>
                                        <option value="1970">1970 - 51 歲</option>
                                        <option value="1969">1969 - 52 歲</option>
                                        <option value="1968">1968 - 53 歲</option>
                                        <option value="1967">1967 - 54 歲</option>
                                        <option value="1966">1966 - 55 歲</option>
                                        <option value="1965">1965 - 56 歲</option>
                                        <option value="1964">1964 - 57 歲</option>
                                        <option value="1963">1963 - 58 歲</option>
                                        <option value="1962">1962 - 59 歲</option>
                                        <option value="1961">1961 - 60 歲</option>
                                        <option value="1960">1960 - 61 歲</option>
                                        <option value="1959">1959 - 62 歲</option>
                                        <option value="1958">1958 - 63 歲</option>
                                        <option value="1957">1957 - 64 歲</option>
                                        <option value="1956">1956 - 65 歲</option>
                                        <option value="1955">1955 - 66 歲</option>
                                        <option value="1954">1954 - 67 歲</option>
                                        <option value="1953">1953 - 68 歲</option>
                                        <option value="1952">1952 - 69 歲</option>
                                        <option value="1951">1951 - 70 歲</option>
                                        <option value="1950">1950 - 71 歲</option>
                                        <option value="1949">1949 - 72 歲</option>
                                        <option value="1948">1948 - 73 歲</option>
                                        <option value="1947">1947 - 74 歲</option>
                                        <option value="1946">1946 - 75 歲</option>
                                        <option value="1945">1945 - 76 歲</option>
                                        <option value="1944">1944 - 77 歲</option>
                                        <option value="1943">1943 - 78 歲</option>
                                        <option value="1942">1942 - 79 歲</option>
                                        <option value="1941">1941 - 80 歲</option>
                                    </select>
                                </td>
                            </tr>
                            <td>自訂來源：
                                <select name="s97" id="s97">
                                    <option value="">請選擇</option>
                                    <option value="banner_funtour_0120">banner_funtour_0120</option>
                                    <option value="banner_funtour_0202">banner_funtour_0202</option>
                                    <option value="banner_funtour_0507">banner_funtour_0507</option>
                                    <option value="banner_funtour_0528">banner_funtour_0528</option>
                                    <option value="banner_funtour_0531">banner_funtour_0531</option>
                                    <option value="blog_funtour_hokkaido">blog_funtour_hokkaido</option>
                                    <option value="blog_PhotoAds_Funtour">blog_PhotoAds_Funtour</option>
                                    <option value="blog_pofiles">blog_pofiles</option>
                                    <option value="EDM_0217title">EDM_0217title</option>
                                    <option value="EDM_0322sign">EDM_0322sign</option>
                                    <option value="EDM_1017_GlodCancel">EDM_1017_GlodCancel</option>
                                    <option value="Email_EDM_0518">Email_EDM_0518</option>
                                    <option value="Email_EDM_Angus">Email_EDM_Angus</option>
                                    <option value="facebook">facebook</option>
                                    <option value="FACEBOOK_FUNTOUR">FACEBOOK_FUNTOUR</option>
                                    <option value="facebook_funtour_0113">facebook_funtour_0113</option>
                                    <option value="facebook_funtour_domestictourism">facebook_funtour_domestictourism</option>
                                    <option value="facebook_funtour_hokkaido">facebook_funtour_hokkaido</option>
                                    <option value="facebook_macao">facebook_macao</option>
                                    <option value="facebook_pofiles">facebook_pofiles</option>
                                    <option value="facebook_poster">facebook_poster</option>
                                    <option value="fb">fb</option>
                                    <option value="FB_1018">FB_1018</option>
                                    <option value="FB_ActionLink_Funtour">FB_ActionLink_Funtour</option>
                                    <option value="FB_PhotoAds_Funtour">FB_PhotoAds_Funtour</option>
                                    <option value="fb02">fb02</option>
                                    <option value="funtor_lineat">funtor_lineat</option>
                                    <option value="funtour">funtour</option>
                                    <option value="funtour.springclub">funtour.springclub</option>
                                    <option value="funtour_app">funtour_app</option>
                                    <option value="funtour_banner">funtour_banner</option>
                                    <option value="funtour_blog">funtour_blog</option>
                                    <option value="funtour_edm_20200806">funtour_edm_20200806</option>
                                    <option value="funtour_edm_20200827">funtour_edm_20200827</option>
                                    <option value="funtour_facebook">funtour_facebook</option>
                                    <option value="funtour_facebook_20171206">funtour_facebook_20171206</option>
                                    <option value="funtour_fb_post">funtour_fb_post</option>
                                    <option value="funtour_fb02">funtour_fb02</option>
                                    <option value="funtour_home_Rightblock">funtour_home_Rightblock</option>
                                    <option value="funtour_homepage">funtour_homepage</option>
                                    <option value="funtour_lineat">funtour_lineat</option>
                                    <option value="funtour_lineat_0503">funtour_lineat_0503</option>
                                    <option value="funtour_lineat_0813">funtour_lineat_0813</option>
                                    <option value="funtour_lineat_1018">funtour_lineat_1018</option>
                                    <option value="funtour_lineat_1230">funtour_lineat_1230</option>
                                    <option value="funtour_lineat_20171205">funtour_lineat_20171205</option>
                                    <option value="funtour_lineat_dialogue">funtour_lineat_dialogue</option>
                                    <option value="funtour_lineat_homepage0505">funtour_lineat_homepage0505</option>
                                    <option value="funtour_loneat_message">funtour_loneat_message</option>
                                    <option value="funtour_mail_biweekly">funtour_mail_biweekly</option>
                                    <option value="funtour_officialwebsite">funtour_officialwebsite</option>
                                    <option value="funtour_SMS_20200728">funtour_SMS_20200728</option>
                                    <option value="funtourfb__pofiles">funtourfb__pofiles</option>
                                    <option value="LINE">LINE</option>
                                    <option value="line@">line@</option>
                                    <option value="LINE_1018">LINE_1018</option>
                                    <option value="lineat_funtour_1121">lineat_funtour_1121</option>
                                    <option value="lineat_funtour_1230">lineat_funtour_1230</option>
                                    <option value="lineat_funtour_activity1231">lineat_funtour_activity1231</option>
                                    <option value="lineat_funtour_korea1212">lineat_funtour_korea1212</option>
                                    <option value="lineat_pofiles">lineat_pofiles</option>
                                    <option value="sale-696">sale-696</option>
                                    <option value="sale-777">sale-777</option>
                                    <option value="singleparty_covid19_edm">singleparty_covid19_edm</option>
                                    <option value="singleparty_funtourevent_FB_0802">singleparty_funtourevent_FB_0802</option>
                                    <option value="singleparty_sale_logo">singleparty_sale_logo</option>
                                    <option value="sms_auto_send">sms_auto_send</option>
                                    <option value="springclub_officialwebsite_homepage">springclub_officialwebsite_homepage</option>
                                    <option value="Yahoo_cpc_Asiapac">Yahoo_cpc_Asiapac</option>
                                    <option value="憟賢末?呸PP?冽">憟賢末?呸PP?冽</option>
                                </select>
                            </td>
                            </tr>
                            <tr>
                                <td>會館：
                                    <select name="s6" id="s6">
                                        <option value="">請選擇</option>
                                        <option value="台北">台北</option>
                                        <option value="桃園">桃園</option>
                                        <option value="新竹">新竹</option>
                                        <option value="台中">台中</option>
                                        <option value="台南">台南</option>
                                        <option value="高雄">高雄</option>
                                        <option value="八德">八德</option>
                                        <option value="約專">約專</option>
                                        <option value="迷你約">迷你約</option>
                                        <option value="總管理處">總管理處</option>
                                        <option value="好好玩旅行社">好好玩旅行社</option>
                                    </select> <select name="s7" id="s7">
                                        <option value="">請選擇</option>
                                    </select> <label><input type="checkbox" id="showout"> 顯示離職</label>
                                </td>
                            </tr>
                            <tr>
                                <td>活動日期：
                                    <select name="a3">
                                        <option value="" selected>請選擇</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    年
                                    <select name="a4">
                                        <option value="">請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    月至
                                    <select name="b3">
                                        <option value="">請選擇</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    年
                                    <select name="b4">
                                        <option value="">請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    月
                                </td>
                            </tr>
                            <tr>
                                <td>資料時間：
                                    <select name="a1">
                                        <option value="" selected>請選擇</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    年
                                    <select name="a2">
                                        <option value="">請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    月至
                                    <select name="b1">
                                        <option value="">請選擇</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    年
                                    <select name="b2">
                                        <option value="">請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    月
                                </td>
                            </tr>
                            <tr>
                                <td><input type="reset" name="reset" value="清空條件" style="height:28px;">　<input type="submit" name="Submit" value="開始搜尋" style="height:28px;"></td>
                            </tr>
                            </font>
                    </table>
                </form>
                </td>
                </tr>
                </tbody>
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
    $mtu = "ad_fun_action1.";


    function take_action() {
        if (!$("#search_page").val()) {
            alert("請選擇要搜尋的類別。");
            return false;
        }
        $("#searchform").attr("action", $("#search_page").val());
        return true;
    }
    $(function() {
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");
        });
        $("#showout").on("click", function() {
            if (!$("#s6").val()) {
                alert("請先選擇會館。");
                $(this).prop("checked", false);
                return false;
            }
            if ($(this).prop("checked")) {
                personnel_get_funsend("s6", "s7", 1);
            } else {
                personnel_get_funsend("s6", "s7", 0);
            }
        });
    });
</script>