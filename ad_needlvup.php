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
                    <strong>會員升級意願 - 未處理 數量：363　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">

                    <a href="?s99=1" class="btn btn-danger pull-left margin-right-10">切換已處理</a>


                    <form id="searchform" action="ad_needlvup.php?vst=full&sear=1" method="post" class="form-inline" target="_self" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" style="width:100px;">
                            <option value="s2">手機</option>
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                        </select>
                        <input name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>

                </div>
                <div class="box-content">
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
                                <td class="center"><b>春天會館</b></td>
                                <td class="center">台灣電話流水序號開發</td>
                                <td>1419533</td>
                                <td class="center"><a href="ad_mem_detail.php?mem_num=1419533" target="_blank">鄭宇廷</a></td>
                                <td class="center">男</td>
                                <td class="center">0958019868</td>
                                <td class="center">1987/7/25　　34 歲</td>
                                <td class="center">碩士</td>
                                <td class="center">
                                    <span style="color:blue">目前為璀璨會員-一年期(2018/2/21~2019/2/21)<br>可升級璀璨VIP會員</span><br>by 2020/2/15 上午 08:35:09
                                </td>

                                <td class="center">台南 - 王佳蓁</td>

                                <td class="center">

                                    <a href="javascript:Mars_popup('ad_needlvup_report.php?a=2565&mnum=1419533','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>
                                    <br>
                                    <a href="javascript:Mars_popup('ad_report.php?mem_num=1419533&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報系統(77)</a>

                                    <br>
                                    <a href="javascript:Mars_popup2('ad_needlvup.php?st=del&a=2565','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=240,top=10,left=10');">刪除</a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center">共 363 筆、第 1 頁／共 8 頁&nbsp;&nbsp;
                    <ul class='pagination pagination-md'>
                        <li><a href=/ad_needlvup.php?topage=1>第一頁</a></li>
                        <li class='active'><a href="#">1</a></li>
                        <li><a href=/ad_needlvup.php?topage=2 class='text'>2</a></li>
                        <li><a href=/ad_needlvup.php?topage=3 class='text'>3</a></li>
                        <li><a href=/ad_needlvup.php?topage=4 class='text'>4</a></li>
                        <li><a href=/ad_needlvup.php?topage=5 class='text'>5</a></li>
                        <li><a href=/ad_needlvup.php?topage=6 class='text'>6</a></li>
                        <li><a href=/ad_needlvup.php?topage=7 class='text'>7</a></li>
                        <li><a href=/ad_needlvup.php?topage=8 class='text'>8</a></li>
                        <li><a href=/ad_needlvup.php?topage=2 class='text' title='Next'>下一頁</a></li>
                        <li><a href=/ad_needlvup.php?topage=8 class='text'>最後一頁</a></li>
                        <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="/ad_needlvup.php?topage=1" selected>1</option>
                                <option value="/ad_needlvup.php?topage=2">2</option>
                                <option value="/ad_needlvup.php?topage=3">3</option>
                                <option value="/ad_needlvup.php?topage=4">4</option>
                                <option value="/ad_needlvup.php?topage=5">5</option>
                                <option value="/ad_needlvup.php?topage=6">6</option>
                                <option value="/ad_needlvup.php?topage=7">7</option>
                                <option value="/ad_needlvup.php?topage=8">8</option>
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