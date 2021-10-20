<?php
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_b2b_manager.php">通路管理</a></li>
            <li class="active">修改通路管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>修改通路管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <form name="form1" method="post" action="ad_b2b_manager_add.php?st=addsave" class="form-inline" onsubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <thead>
                            <tr>
                                <td>
                                    *真實姓名： <input name="name" type="text" id="name" value="蘇品嘉" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    代號：<input name="uid" type="text" id="uid" value="igagamm" class="form-control" pattern="^[A-Za-z0-9]+$" disabled>&nbsp;&nbsp;<small>會公開,勿用敏感資料</small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    *密碼：<input name="upd" type="text" id="upd" value="ww12022324" class="form-control" required> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    *手機：<input name="phone" type="tel" id="phone" value="0920517889" class="form-control" pattern="^[09]{2}[0-9]{8}$" minlength="10" maxlength="10" title="請輸入 09 開頭的十位數手機號碼" required> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    *生日：西元
                                    <select name="ubday1" id="ubday1" required>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992" selected>1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                        <option value="1989">1989</option>
                                        <option value="1988">1988</option>
                                        <option value="1987">1987</option>
                                        <option value="1986">1986</option>
                                        <option value="1985">1985</option>
                                        <option value="1984">1984</option>
                                        <option value="1983">1983</option>
                                        <option value="1982">1982</option>
                                        <option value="1981">1981</option>
                                        <option value="1980">1980</option>
                                        <option value="1979">1979</option>
                                        <option value="1978">1978</option>
                                        <option value="1977">1977</option>
                                        <option value="1976">1976</option>
                                        <option value="1975">1975</option>
                                        <option value="1974">1974</option>
                                        <option value="1973">1973</option>
                                        <option value="1972">1972</option>
                                        <option value="1971">1971</option>
                                        <option value="1970">1970</option>
                                        <option value="1969">1969</option>
                                        <option value="1968">1968</option>
                                        <option value="1967">1967</option>
                                        <option value="1966">1966</option>
                                        <option value="1965">1965</option>
                                        <option value="1964">1964</option>
                                        <option value="1963">1963</option>
                                        <option value="1962">1962</option>
                                        <option value="1961">1961</option>
                                        <option value="1960">1960</option>
                                        <option value="1959">1959</option>
                                        <option value="1958">1958</option>
                                        <option value="1957">1957</option>
                                        <option value="1956">1956</option>
                                        <option value="1955">1955</option>
                                        <option value="1954">1954</option>
                                        <option value="1953">1953</option>
                                        <option value="1952">1952</option>
                                        <option value="1951">1951</option>
                                        <option value="1950">1950</option>
                                        <option value="1949">1949</option>
                                        <option value="1948">1948</option>
                                        <option value="1947">1947</option>
                                        <option value="1946">1946</option>
                                        <option value="1945">1945</option>
                                        <option value="1944">1944</option>
                                        <option value="1943">1943</option>
                                        <option value="1942">1942</option>
                                        <option value="1941">1941</option>
                                        <option value="1940">1940</option>
                                        <option value="1939">1939</option>
                                        <option value="1938">1938</option>
                                        <option value="1937">1937</option>
                                        <option value="1936">1936</option>
                                        <option value="1935">1935</option>
                                        <option value="1934">1934</option>
                                        <option value="1933">1933</option>
                                        <option value="1932">1932</option>
                                        <option value="1931">1931</option>
                                    </select>
                                    年
                                    <select name="ubday2" id="ubday2" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6" selected>6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    月
                                    <select name="ubday3" id="ubday3" required>
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
                                        <option value="23" selected>23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    性別：<label class="radio"><input type="radio" name="sex" value="男">
                                        <i></i>男</label>
                                    <label class="radio"><input CHECKED name="sex" type="radio" value="女">
                                        <i></i>女</label> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    電子信箱：<input name="email" type="email" id="email" value="" class="form-control"> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    居住地區：
                                    <select name="area" id="area">
                                        <option value="">請選擇</option>
                                        <option value="新北市">新北市</option>
                                        <option value="台北市">台北市</option>
                                        <option value="基隆市">基隆市</option>
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
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    婚姻狀態：
                                    <select name="marry" id="marry">
                                        <option value="">請選擇</option>
                                        <option value="未婚">未婚</option>
                                        <option value="離婚">離婚</option>
                                        <option value="喪偶">喪偶</option>
                                        <option value="已婚">已婚</option>
                                        <option value="交往中">交往中</option>
                                        <option value="有心儀對象">有心儀對象</option>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    LINE ID：<input name="lineid" type="text" id="lineid" value="" class="form-control"> 　
                                </td>
                            </tr>

                            <tr>
                                <td>

                                    地址：<input name="address" type="text" id="address" value="" class="form-control" style="width:80%"> 　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    *類型：
                                    <select name="lv" id="lv" class="form-control" required>
                                        <option value="">請選擇</option>
                                        <option value="通路">通路</option>
                                        <option value="講師" selected>講師</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    上線：
                                    <select name="cbranch" id="cbranch">
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
                                    </select><select name="csingle" id="csingle">
                                        <option value="">請選擇</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    工作狀態：
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    是否任職交友/婚友業：　
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="radio"><input type="radio" name="review" id="review" value="1" checked><i></i> 審核通過</label>
                                    <label class="radio"><input type="radio" name="review" id="review" value="0"><i></i> 審核不通過</label>
                                    <label class="radio"><input type="radio" name="review" id="review" value="2"><i></i> 關閉帳號</label>
                                    <br>
                                    <font color=red><small>請不要隨意更改此選項，會寄出信件通知</small></font>
                                </td>
                            </tr>

                            <tr>
                                <td>註冊資訊： on 2021-10-07 15:19</td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <div align="center">

                                        <input type="submit" name="Submit" class="btn btn-info" value="確定修改" style="width:50%;">
                                        <input type="hidden" id="an" name="an" value="39">
                                        <input type="hidden" id="come" name="come" value="">

                                    </div>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </form>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td width=160>2021-10-07 15:20</td>
                        <td>點點於2021-10-07 15:20修改資料[審核]0=>1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width=160>2021-10-07 15:19</td>
                        <td>點點於2021-10-07 15:19修改資料[審核]1=>0</td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>

<script type="text/javascript">
    $mtu = "ad_b2b_manager.";
    $(function() {

        $("#cbranch").on("change", function() {
            personnel_get("cbranch", "csingle");
        });

    });
</script>