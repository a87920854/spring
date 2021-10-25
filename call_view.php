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
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">行動電話管制表- 0910</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>行動電話管制表- 0910</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form action="call_view.asp?st=add&n=0910&n2=" method="post" target="_self" onsubmit="return chk_phone_form()" class="form-inline">
                        新增黑名單：<input id="phone_num" name="phone_num" class="form-control" type="text" pattern="^[09]{2}[0-9]{8}$" minlength="10" maxlength="10" placeholder="手機號碼" title="請輸入 09 開頭的十位數手機號碼" required>
                        <select name="beca" id="beca" required>
                            <option value="" selected>選擇原因</option>
                            <option value="空號">空號</option>
                            <option value="只要單次">只要單次</option>
                            <option value="不是單身">不是單身</option>
                            <option value="已退費">已退費</option>
                            <option value="無效名單">無效名單</option>
                            <option value="有前科（更生人）">有前科（更生人）</option>
                            <option value="同性戀">同性戀</option>
                            <option value="條件不符">條件不符</option>
                            <option value="拒絕騷擾">拒絕騷擾</option>
                            <option value="心理問題">心理問題</option>
                            <option value="生理問題">生理問題</option>
                            <option value="態度惡劣">態度惡劣</option>
                            <option value="學歷不足">學歷不足</option>
                            <option value="領有殘精障手冊">領有殘精障手冊</option>
                            <option value="春天問題">春天問題</option>
                            <option value="DMN問題">DMN問題</option>
                            <option value="公司員工">公司員工</option>
                        </select>
                        <input type="submit" class="btn btn-default" value="新增">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td width="10%" style="text-align:center">000 [台北]<br>2020-05-03 17:36</td>
                            <td width="10%" style="text-align:center">001 [台北]<br>2020-05-10 11:49</td>
                            <td width="10%" style="text-align:center">002 [台北]<br>2020-04-24 15:53</td>
                            <td width="10%" style="text-align:center">003 [台北]<br>2020-05-10 14:50</td>
                            <td width="10%" style="text-align:center">004 [台北]<br>2020-05-10 16:25</td>
                            <td width="10%" style="text-align:center">005 [台北]<br>2020-05-15 17:21</td>
                            <td width="10%" style="text-align:center">006 [台北]<br>2020-05-15 18:37</td>
                            <td width="10%" style="text-align:center">007 [桃園]<br>2020-01-15 14:59</td>
                            <td width="10%" style="text-align:center">008 [台南]<br>2019-06-07 18:29</td>
                            <td width="10%" style="text-align:center">009 [台北]<br>2020-05-15 18:37</td>
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
require_once("./include/_bottom.php")
?>