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
            <li><a href="ad_master_index.php">督導管理系統</a></li>
            <li class="active">行動電話管制表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>行動電話管制表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form action="call_view.php?st=add&r=2&n=&n2=" method="post" target="_self" class="form-inline">
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
                            <td colspan=10>3G門號</td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><a href="call_view.php?n=0910">0910</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0911">0911</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0912">0912</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0913">0913</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0914">0914</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0915">0915</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0916">0916</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0917">0917</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0918">0918</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0919">0919</a></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><a href="call_view.php?n=0920">0920</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0921">0921</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0922">0922</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0923">0923</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0924">0924</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0925">0925</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0926">0926</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0927">0927</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0928">0928</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0929">0929</a></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><a href="call_view.php?n=0930">0930</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0931">0931</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0932">0932</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0933">0933</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0934">0934</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0935">0935</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0936">0936</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0937">0937</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0938">0938</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0939">0939</a></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><a href="call_view.php?n=0952">0952</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0953">0953</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0954">0954</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0955">0955</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0956">0956</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0958">0958</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0960">0960</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0961">0961</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0962">0962</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0963">0963</a></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><a href="call_view.php?n=0966">0966</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0968">0968</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0970">0970</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0971">0971</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0972">0972</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0973">0973</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0974">0974</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0975">0975</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0976">0976</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0977">0977</a></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><a href="call_view.php?n=0978">0978</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0979">0979</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0980">0980</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0981">0981</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0982">0982</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0983">0983</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0984">0984</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0985">0985</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0986">0986</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0987">0987</a></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><a href="call_view.php?n=0988">0988</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0989">0989</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <tr>
                            <td colspan=10>4G門號</td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><a href="call_view.php?n=0903">0903</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0905">0905</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0906">0906</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0908">0908</a></td>
                            <td style="text-align:center"><a href="call_view.php?n=0909">0909</a></td>
                            <td colspan=5></td>
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