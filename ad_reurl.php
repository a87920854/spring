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
            <li class="active"><a href="ad_reurl.asp">短網址管理</a></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>短網址管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form action="?st=send" method="post" id="form1" class="form-inline">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td>
                                    https://sdf.tw/<input type="text" id="link" name="link" class="form-control" value="auto" required>(auto = 自動產生)

                                    網址：<input type="text" id="url" name="url" style="width:40%;" class="form-control" placeholder="要縮短的網址" required>
                                    對應說明：<input type="text" id="memo" name="memo" style="width:25%;" class="form-control" placeholder="網址對應說明,字數限制100字">
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <input id="submit3" type="submit" value="產生短網址" class="btn btn-info" style="width:50%;">
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </form>

                <form id="searchform" action="ad_reurl.asp" method="post" target="_self" class="form-inline">
                    <select name="own" class="form-control">
                        <option value="">請選擇建立者</option>
                        <option value="CANDY8060">尹宜君</option>
                        <option value="HANNAH0807">曉娟</option>
                        <option value="KYOE">澔翰</option>
                        <option value="SHEERY03130513">欣怡</option>
                    </select>
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                </form>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="150">建立時間</th>
                            <th width="200">對應說明</th>
                            <th>短網址(點框複製)</th>
                            <th>原網址</th>
                            <th width="80">開啟次</th>
                            <th width="80">建立者</th>
                            <th></th>
                        </tr>


                        <tr>
                            <td>2021-10-22 17:34</td>
                            <td></td>
                            <td><input type="text" id="input_2733" value="https://sdf.tw/t0hrdq" onclick="oCopy(this)" readonly></td>
                            <td>https://www.datemenow.com.tw/campaign/13366?cc=slae-777</td>
                            <td>1</td>
                            <td>曉娟</td>
                            <td><a href="?st=del&an=2733" class="btn btn-xs btn-danger">刪除</a></td>
                        </tr>

                        <tr>
                            <td>2021-10-19 14:40</td>
                            <td>12生肖測驗PO文</td>
                            <td><input type="text" id="input_2732" value="https://sdf.tw/lj1ew1" onclick="oCopy(this)" readonly></td>
                            <td>https://www.springclub.com.tw/20180401/?cc=sale-696</td>
                            <td>38</td>
                            <td>欣怡</td>
                            <td><a href="?st=del&an=2732" class="btn btn-xs btn-danger">刪除</a></td>
                        </tr>

                    </tbody>
                </table>

            </div>
            <div class="text-center">共 646 筆、第 1 頁／共 13 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_reurl.asp?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_reurl.asp?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_reurl.asp?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_reurl.asp?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_reurl.asp?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_reurl.asp?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_reurl.asp?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_reurl.asp?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_reurl.asp?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_reurl.asp?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_reurl.asp?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_reurl.asp?topage=13 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_reurl.asp?topage=1" selected>1</option>
                            <option value="/ad_reurl.asp?topage=2">2</option>
                            <option value="/ad_reurl.asp?topage=3">3</option>
                            <option value="/ad_reurl.asp?topage=4">4</option>
                            <option value="/ad_reurl.asp?topage=5">5</option>
                            <option value="/ad_reurl.asp?topage=6">6</option>
                            <option value="/ad_reurl.asp?topage=7">7</option>
                            <option value="/ad_reurl.asp?topage=8">8</option>
                            <option value="/ad_reurl.asp?topage=9">9</option>
                            <option value="/ad_reurl.asp?topage=10">10</option>
                            <option value="/ad_reurl.asp?topage=11">11</option>
                            <option value="/ad_reurl.asp?topage=12">12</option>
                            <option value="/ad_reurl.asp?topage=13">13</option>
                        </select></li>
                </ul>
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
    $mtu = "ad_reurl.";

    $(function() {

    });

    function oCopy(obj) {
        obj.select(); // 选中输入框中的内容

        try {
            if (document.execCommand('copy', false, null)) {

            } else {
                alert("無法自動複製，請手動按 ctrl + c 複製，謝謝");
            }
        } catch (err) {
            alert("無法自動複製，請手動按 ctrl + c 複製，謝謝");
        }

    }
</script>