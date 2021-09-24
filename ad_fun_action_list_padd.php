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


            <li><a href="ad_fun_action_list1.php">好好玩國內團控</a></li>
            <li><a href="ad_fun_action_list_singup1.php?ac=3059">桃源仙谷遇見愛｜遊賞花田+祕境探索+烤肉饗宴+拍照任務【無法成團將不另行通知】</a></li>


            <li class="active">新增報名資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>桃源仙谷遇見愛｜遊賞花田+祕境探索+烤肉饗宴+拍照任務【無法成團將不另行通知】新增報名資料</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">

                <form id="addform" action="?st=add" method="post" target="_self" class="form-inline" onsubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                        <tbody>
                            <tr>
                                <td>姓名：<input type="text" name="k_name" id="k_name" value="" class="form-control"></td>
                                <td>性別：<select name="k_sex" id="k_sex">
                                        <option value="">請選擇</option>
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>

                                    　婚姻：
                                    <select name="k_marry" id="k_marry" style="font-size: 9pt">
                                        <option value="">請選擇</option>
                                        <option value="未婚">未婚</option>
                                        <option value="已婚">已婚</option>
                                        <option value="二春">二春</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>身分證字號：<input type="text" name="k_user" id="k_user" class="form-control" value=""></td>
                                <td>生日：
                                    <select name="k_year1" id="k_year1">
                                        <option value="">請選擇</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                    </select> 年
                                    <select name="k_year2" id="k_year2">
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
                                    </select> 月
                                    <select name="k_year3" id="k_year3">
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
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select> 日

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>星座：<select name="k_star" id="k_star">
                                        <option value="">請選擇</option>
                                        <option value="水瓶座">水瓶座</option>
                                        <option value="雙魚座">雙魚座</option>
                                        <option value="牡羊座">牡羊座</option>
                                        <option value="金牛座">金牛座</option>
                                        <option value="雙子座">雙子座</option>
                                        <option value="巨蟹座">巨蟹座</option>
                                        <option value="獅子座">獅子座</option>
                                        <option value="處女座">處女座</option>
                                        <option value="天秤座">天秤座</option>
                                        <option value="天蠍座">天蠍座</option>
                                        <option value="射手座">射手座</option>
                                        <option value="魔羯座">魔羯座</option>
                                    </select> </td>
                                <td>工作縣市：
                                    <select name="mem_workcity" id="mem_workcity">
                                        <option value="">請選擇</option>
                                        <option value="基隆市">基隆市</option>
                                        <option value="台北市">台北市</option>
                                        <option value="新北市">新北市</option>
                                        <option value="宜蘭縣">宜蘭縣</option>
                                        <option value="桃園市">桃園市</option>
                                        <option value="新竹縣">新竹縣</option>
                                        <option value="新竹市">新竹市</option>
                                        <option value="苗栗縣">苗栗縣</option>
                                        <option value="苗栗市">苗栗市</option>
                                        <option value="台中市">台中市</option>
                                        <option value="彰化縣">彰化縣</option>
                                        <option value="彰化市">彰化市</option>
                                        <option value="南投縣">南投縣</option>
                                        <option value="嘉義縣">嘉義縣</option>
                                        <option value="嘉義市">嘉義市</option>
                                        <option value="雲林縣">雲林縣</option>
                                        <option value="台南市">台南市</option>
                                        <option value="高雄市">高雄市</option>
                                        <option value="屏東縣">屏東縣</option>
                                        <option value="花蓮縣">花蓮縣</option>
                                        <option value="台東縣">台東縣</option>
                                        <option value="澎湖縣">澎湖縣</option>
                                        <option value="金門縣">金門縣</option>
                                        <option value="馬祖">馬祖</option>
                                        <option value="綠島">綠島</option>
                                        <option value="蘭嶼">蘭嶼</option>
                                        <option value="其他">其他</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>飲食習慣：<select name="k_eat" id="k_eat">
                                        <option value="">請選擇</option>
                                        <option value="葷食">葷食</option>
                                        <option value="素食">素食</option>
                                    </select></td>
                                <td>電話(公)：<input type="text" name="k_phone1" value="" class="form-control">　(家)：<input type="text" name="k_phone2" class="form-control" value="">　手機：<input type="text" name="k_mobile" id="k_mobile" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>服務機關：<input type="text" name="k_company" class="form-control" value=""></td>
                                <td>現任職稱：<input type="text" name="k_company2" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td colspan=2>地址：
                                    <select name="k_area" id="k_area">
                                        <option value="" SELECTED>請選擇</option>
                                        <option value="基隆市">基隆市</option>
                                        <option value="台北市">台北市</option>
                                        <option value="新北市">新北市</option>
                                        <option value="宜蘭縣">宜蘭縣</option>
                                        <option value="桃園市">桃園市</option>
                                        <option value="新竹縣">新竹縣</option>
                                        <option value="新竹市">新竹市</option>
                                        <option value="苗栗縣">苗栗縣</option>
                                        <option value="苗栗市">苗栗市</option>
                                        <option value="台中縣">台中縣</option>
                                        <option value="台中市">台中市</option>
                                        <option value="彰化縣">彰化縣</option>
                                        <option value="彰化市">彰化市</option>
                                        <option value="南投縣">南投縣</option>
                                        <option value="嘉義縣">嘉義縣</option>
                                        <option value="嘉義市">嘉義市</option>
                                        <option value="雲林縣">雲林縣</option>
                                        <option value="台南縣">台南縣</option>
                                        <option value="台南市">台南市</option>
                                        <option value="高雄市">高雄市</option>
                                        <option value="屏東縣">屏東縣</option>
                                        <option value="花蓮縣">花蓮縣</option>
                                        <option value="台東縣">台東縣</option>
                                        <option value="澎湖縣">澎湖縣</option>
                                        <option value="金門縣">金門縣</option>
                                        <option value="馬祖">馬祖</option>
                                        <option value="綠島">綠島</option>
                                        <option value="蘭嶼">蘭嶼</option>
                                        <option value="其他">其他</option>
                                    </select>
                                    　<input name="k_address" type="text" id="k_address" class="form-control" value="" style="width:60%;">
                                </td>
                            </tr>
                            <tr>
                                <td>E-mail：<input name="k_yn" id="k_yn" type="text" class="form-control" value=""></td>
                                <td>facebook帳號：<input name="ac_3" type="text" class="form-control" value=""> ＬＩＮＥ：<input name="lineid" id="lineid" type="text" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>身高：<input name="ac_1" id="ac_1" type="text" class="form-control" value="0"></td>
                                <td>體重：<input name="ac_2" id="ac_2" type="text" class="form-control" value="0"></td>
                            </tr>
                            <tr>
                                <td>學歷：<select name="k_school" id="k_school">
                                        <option value="">請選擇</option>
                                        <option value="高中">高中</option>
                                        <option value="專科">專科</option>
                                        <option value="大學">大學</option>
                                        <option value="碩士">碩士</option>
                                        <option value="博士">博士</option>
                                    </select></td>
                                <td>訊息來源：<select name="k_come" id="k_come">
                                        <option value="">請選擇</option>
                                        <option value="2014國際旅展">2014國際旅展</option>
                                        <option value="好好玩旅行社官方粉絲團">好好玩旅行社官方粉絲團</option>
                                        <option value="網路新聞">網路新聞</option>
                                        <option value="媒體報導">媒體報導</option>
                                        <option value="1111人力銀行">1111人力銀行</option>
                                        <option value="春天會館客服">春天會館客服</option>
                                        <option value="活動宣傳">活動宣傳</option>
                                        <option value="ＤＭ訊息">ＤＭ訊息</option>
                                        <option value="企業福委">企業福委</option>
                                        <option value="CHEERS雜誌">CHEERS雜誌</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>餐點：<select name="k_eat1">
                                        <option value="" disabled>無餐點</option>
                                    </select></td>
                                <td>飲品：<select name="k_eat2">
                                        <option value="" disabled>無飲品</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td colspan=2>公開資料：
                                    <input name="k_2" type="checkbox" id="k_2" value="姓名">
                                    姓名
                                    <input name="k_2" type="checkbox" id="k_2" value="手機">
                                    手機
                                    <input name="k_2" type="checkbox" id="k_2" value="信箱">
                                    信箱
                                    <input name="k_2" type="checkbox" id="k_2" value="服務單位">
                                    服務單位
                                    <input name="k_2" type="checkbox" id="k_2" value="不願意公開資料" checked>
                                    不願意公開資料
                                </td>
                            </tr>

                            <tr>
                                <td colspan=2>備註：<textarea name="remark" id="remark" class="form-control" style="width:70%;height:80px;"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan=2>報名時間：2021/9/24 下午 03:11:18<input type="hidden" name="ac" value="3059"></td>
                            </tr>
                            <tr>
                                <td colspan=2 align="center"><input type="submit" name="Submit" value="確定新增" class="btn btn-info" style="width:50%;"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
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
    $mtu = "ad_fun_action_list1.";

    $(function() {});

    function chk_form() {
        var $rr = 0;

        var $clist = {
            "k_name": "姓名",
            "k_sex": "性別",
            "k_user": "身分證字號",
            "k_year1": "生日-年",
            "k_year2": "生日-月",
            "k_year3": "生日-日",
            "k_mobile": "手機",
            "k_come": "訊息來源"
        };

        $.each($clist, function(n, v) {
            if (!$("#" + n).val()) {
                alert("請輸入或選擇" + v);
                $("#" + n).focus();
                $rr = 1;
                return false;
            }
        });

        if ($rr == 0) {

            var $cnlist = {
                "ac_1": "身高",
                "ac_2": "體重"
            };

            var reg = /^\d+$/;
            $.each($cnlist, function(n, v) {
                if (!reg.test($("#" + n).val())) {
                    alert(v + "只能輸入數字。");
                    $("#" + n).focus();
                    $rr = 1;
                    return false;
                }
            });
        }

        if ($rr) return false;
        else return true;

    }
</script>