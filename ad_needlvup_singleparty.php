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
            <li><a href="index.php">管理系統</a></li>
            <li class="active">會員升級意願</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員升級意願 - 未完成 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <p><a href="#" class="btn btn-success" disabled>未完成</a>&nbsp;<a href="ad_needlvup_singleparty.php?s99=1" class="btn btn-info">已完成</a></p>

                    <form id="searchform" action="ad_needlvup_singleparty.php?vst=full&sear=1" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" style="width:100px;">
                            <option value="s2">手機</option>
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                        </select>
                        <input name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=60>升級來源</th>
                            <th width=180>資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>電話</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>會員權益</th>
                            <th>秘書</th>
                            <th>處理結果</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="center"><b>約會專家</b></td>
                            <td class="center">約會專家</td>
                            <td>2082091</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2082091" target="_blank">林囿村</a></td>
                            <td class="center">男</td>
                            <td class="center">0983046642</td>
                            <td class="center">1990/12/27　　31 歲</td>
                            <td class="center">國中</td>
                            <td class="center">
                                <span style="color:blue">目前為網站會員(無)<br>可升級資料認證會員,真人認證,璀璨會員,璀璨VIP會員</span><br>by 2021/9/6 下午 07:33:26
                            </td>

                            <td class="center">無</td>

                            <td class="center">

                                <a href="javascript:Mars_popup('ad_needlvup_report.php?a=5757&mnum=2082091','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>
                                <br>
                                <a href="javascript:Mars_popup('ad_report.php?mem_num=2082091&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報系統(6)</a>

                                <br>
                                <a href="javascript:Mars_popup2('ad_needlvup_singleparty.php?st=del&a=5757','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=240,top=10,left=10');">刪除</a>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_needlvup_singleparty.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_needlvup_singleparty.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_needlvup_singleparty.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_needlvup_singleparty.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_needlvup_singleparty.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_needlvup_singleparty.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_needlvup_singleparty.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_needlvup_singleparty.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_needlvup_singleparty.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_needlvup_singleparty.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_needlvup_singleparty.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_needlvup_singleparty.php?topage=10 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_needlvup_singleparty.php?topage=1" selected>1</option>
                            <option value="/ad_needlvup_singleparty.php?topage=2">2</option>
                            <option value="/ad_needlvup_singleparty.php?topage=3">3</option>
                            <option value="/ad_needlvup_singleparty.php?topage=4">4</option>
                            <option value="/ad_needlvup_singleparty.php?topage=5">5</option>
                            <option value="/ad_needlvup_singleparty.php?topage=6">6</option>
                            <option value="/ad_needlvup_singleparty.php?topage=7">7</option>
                            <option value="/ad_needlvup_singleparty.php?topage=8">8</option>
                            <option value="/ad_needlvup_singleparty.php?topage=9">9</option>
                            <option value="/ad_needlvup_singleparty.php?topage=10">10</option>
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
    $(function() {



    });

    function chk_search_form() {
        if (!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
            return false;
        }
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        location.href = "ad_needlvup_singleparty.php?sear=1&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>