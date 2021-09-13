<?php
 require("./include/_top.php");
 require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">會員管理系統</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>真人認證會員列表 - 數量：0　<a href="?vst=full&s13=2">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn dropdown-toggle btn-default" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="ad_register1.asp" target="_blank"><i class="icon-star"></i> 新增會員資料</a></li>
                            <li><a href="ad_mem_f.asp"><i class="icon-tag"></i> 進階搜尋</a></li>
                        </ul>
                    </div>

                    <form id="searchform" action="ad_mem.asp?vst=full&sear=1" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" style="width:100px;">
                            <option value="s2">手機</option>
                            <option value="s1">身分證字號</option>
                            <option value="s3">姓名</option>
                            <option value="s5">約會專家帳號</option>
                            <option value="s4">編號</option>

                        </select>
                        <input name="keyword" id="keyword" type="text" class="form-control" value="">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>


                    <p class="clearfix">
                        <a class="btn btn-success" href="ad_mem.asp">所有會員</a> <a class="btn btn-warning" href="?s14=1&s13=2">30天內排約</a> <a class="btn btn-success" href="ad_no_mem.asp?s15=1&sear=1">資料認證</a> <a class="btn btn-success" href="?s13=2">真人認證</a> <a class="btn btn-success" href="?s13=3">璀璨會員</a> <a class="btn btn-success" href="?s13=4">璀璨VIP會員</a>

                        <a class="btn btn-success" href="?enterprise=1">企業會員</a>


                        <select class="form-control2 pull-right" onchange="location.href='ad_mem.asp'+$(this).val()+'&s13=2'" autocomplete="off">
                            <option value="?orderby=0">預設排序</option>
                            <option value="?orderby=1">依入會時間排序</option>
                            <option value="?orderby=2">依到期時間排序</option>
                        </select>
                    </p>

                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=180>資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>待服務</th>
                            <th width=180>秘書</th>
                            <th width=60>照片</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan=10 height=200>目前沒有資料</td>
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
 require("./include/_bottom.php");
?>

<script type="text/javascript">
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
        location.href = "ad_mem.asp?sear=1&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val() + "&keyk=" + $("#keyword_type").val() + "&keyv=" + $("#keyword").val();
        return false;
    }
</script>