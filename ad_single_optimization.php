<?php
include("top.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">優化單身資料庫</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>優化單身資料庫</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <form action="?st=search" method="post" target="_self" class="form-inline">
                    <p>日期：<input type="text" name="date1" id="date1" class="datepicker" autocomplete="off" value="" autocomplete="off"> ~ <input type="text" name="date2" id="date2" class="datepicker" autocomplete="off" value="" autocomplete="off"></p>
                    <p>性別：<input type="radio" name="sex" id="sex" value="男"> 男 <input type="radio" name="sex" id="sex" value="女"> 女

                    </p>
                    <p>年次：
                        <select name="age1" id="age1" class="form-control">
                            <option value="" selected>請選擇</option>
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
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                        </select> ~
                        <select name="age2" id="age2" class="form-control">
                            <option value="" selected>請選擇</option>
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
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                        </select>
                        &nbsp;&nbsp;身高：<select name="he" id="he" class="form-control">
                            <option value="" selected>請選擇</option>
                            <option value="130">130 cm</option>
                            <option value="131">131 cm</option>
                            <option value="132">132 cm</option>
                            <option value="133">133 cm</option>
                            <option value="134">134 cm</option>
                            <option value="135">135 cm</option>
                            <option value="136">136 cm</option>
                            <option value="137">137 cm</option>
                            <option value="138">138 cm</option>
                            <option value="139">139 cm</option>
                            <option value="140">140 cm</option>
                            <option value="141">141 cm</option>
                            <option value="142">142 cm</option>
                            <option value="143">143 cm</option>
                            <option value="144">144 cm</option>
                            <option value="145">145 cm</option>
                            <option value="146">146 cm</option>
                            <option value="147">147 cm</option>
                            <option value="148">148 cm</option>
                            <option value="149">149 cm</option>
                            <option value="150">150 cm</option>
                            <option value="151">151 cm</option>
                            <option value="152">152 cm</option>
                            <option value="153">153 cm</option>
                            <option value="154">154 cm</option>
                            <option value="155">155 cm</option>
                            <option value="156">156 cm</option>
                            <option value="157">157 cm</option>
                            <option value="158">158 cm</option>
                            <option value="159">159 cm</option>
                            <option value="160">160 cm</option>
                            <option value="161">161 cm</option>
                            <option value="162">162 cm</option>
                            <option value="163">163 cm</option>
                            <option value="164">164 cm</option>
                            <option value="165">165 cm</option>
                            <option value="166">166 cm</option>
                            <option value="167">167 cm</option>
                            <option value="168">168 cm</option>
                            <option value="169">169 cm</option>
                            <option value="170">170 cm</option>
                            <option value="171">171 cm</option>
                            <option value="172">172 cm</option>
                            <option value="173">173 cm</option>
                            <option value="174">174 cm</option>
                            <option value="175">175 cm</option>
                            <option value="176">176 cm</option>
                            <option value="177">177 cm</option>
                            <option value="178">178 cm</option>
                            <option value="179">179 cm</option>
                            <option value="180">180 cm</option>
                            <option value="181">181 cm</option>
                            <option value="182">182 cm</option>
                            <option value="183">183 cm</option>
                            <option value="184">184 cm</option>
                            <option value="185">185 cm</option>
                            <option value="186">186 cm</option>
                            <option value="187">187 cm</option>
                            <option value="188">188 cm</option>
                            <option value="189">189 cm</option>
                            <option value="190">190 cm</option>
                            <option value="191">191 cm</option>
                            <option value="192">192 cm</option>
                            <option value="193">193 cm</option>
                            <option value="194">194 cm</option>
                            <option value="195">195 cm</option>
                            <option value="196">196 cm</option>
                            <option value="197">197 cm</option>
                            <option value="198">198 cm</option>
                            <option value="199">199 cm</option>
                            <option value="200">200 cm</option>
                        </select> 以上
                    </p>
                    <p>學歷：<label class="inline"><input type="checkbox" name="school" id="school" value="國中"> 國中</label>
                        <label class="inline"><input type="checkbox" name="school" id="school" value="高中"> 高中</label>
                        <label class="inline"><input type="checkbox" name="school" id="school" value="高職"> 高職</label>
                        <label class="inline"><input type="checkbox" name="school" id="school" value="專科"> 專科</label>
                        <label class="inline"><input type="checkbox" name="school" id="school" value="大學"> 大學</label>
                        <label class="inline"><input type="checkbox" name="school" id="school" value="碩士"> 碩士</label>
                        <label class="inline"><input type="checkbox" name="school" id="school" value="博士"> 博士</label>
                    </p>
                    <p>年收入約：
                        <label class="inline"><input type="checkbox" name="mem_money" id="mem_money" value="50萬以下"> 50萬以下</label>
                        <label class="inline"><input type="checkbox" name="mem_money" id="mem_money" value="51萬到80萬"> 51萬到80萬</label>
                        <label class="inline"><input type="checkbox" name="mem_money" id="mem_money" value="81萬到100萬"> 81萬到100萬</label>
                        <label class="inline"><input type="checkbox" name="mem_money" id="mem_money" value="101萬到199萬"> 101萬到199萬</label>
                        <label class="inline"><input type="checkbox" name="mem_money" id="mem_money" value="200萬以上"> 200萬以上</label>
                    </p>
                    <p><input type="submit" value="送出" class="btn btn-default"></p>
                </form>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=40>NO</th>
                            <th>入會日期</th>
                            <th>最初排約</th>
                            <th>邀約會館</th>
                            <th>邀約秘書</th>
                            <th>受理會館</th>
                            <th>受理秘書</th>
                            <th>來源</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>身高</th>
                            <th>學歷</th>
                            <th>年收</th>
                            <th>排約次數</th>
                            <th>金額</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan=15>請選擇日期區間</td>
                        </tr>

                    </tbody>
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
include("bottom.php");
?>

<script type="text/javascript">
    $(function() {
        $("#branch").on("change", function() {
            personnel_get_send("branch", "single");
        });



    });
</script>