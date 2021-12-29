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
            <li>DateMeNow網站系統</li>
            <li class="active">網站會員</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>網站會員</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form action="?st=x" method="post" target="_self" onsubmit="return chk_s_form()" class="form-inline" style="display:inline-block;margin:0px;">
                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="請輸入要搜尋的會員編號">&nbsp;<input type="submit" class="btn btn-warning" value="搜尋網站會員">
                </form>&nbsp;&nbsp;&nbsp;
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>照片</th>
                            <th>ID</th>
                            <th>暱稱</th>
                            <th>性別</th>
                            <th>年次</th>
                            <th>城市</th>
                            <th>職業</th>
                            <th>學歷</th>
                            <th>星座</th>
                            <th>身高</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td>
                                無
                            </td>
                            <td>2091001</td>
                            <td></td>
                            <td>女</td>
                            <td>1986</td>
                            <td>新北市</td>
                            <td>旅遊服務業</td>
                            <td>大學</td>
                            <td></td>
                            <td>167</td>
                            <td>
                                <a title="刪除" href="#d" onclick="Mars_popup2('dmnweb_fun12.php?st=del&an=193354','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">共 95336 筆、第 1 頁／共 1907 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/dmnweb_fun12.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/dmnweb_fun12.php?topage=2 class='text'>2</a></li>
                    <li><a href=/dmnweb_fun12.php?topage=3 class='text'>3</a></li>
                    <li><a href=/dmnweb_fun12.php?topage=4 class='text'>4</a></li>
                    <li><a href=/dmnweb_fun12.php?topage=5 class='text'>5</a></li>
                    <li><a href=/dmnweb_fun12.php?topage=6 class='text'>6</a></li>
                    <li><a href=/dmnweb_fun12.php?topage=7 class='text'>7</a></li>
                    <li><a href=/dmnweb_fun12.php?topage=8 class='text'>8</a></li>
                    <li><a href=/dmnweb_fun12.php?topage=9 class='text'>9</a></li>
                    <li><a href=/dmnweb_fun12.php?topage=10 class='text'>10</a></li>
                    <li><a href=/dmnweb_fun12.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/dmnweb_fun12.php?topage=1907 class='text'>最後一頁</a></li>
                    <li>
                        <select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/dmnweb_fun12.php?topage=1" selected>1</option>
                            <option value="/dmnweb_fun12.php?topage=2">2</option>
                            <option value="/dmnweb_fun12.php?topage=3">3</option>
                            <option value="/dmnweb_fun12.php?topage=4">4</option>
                            <option value="/dmnweb_fun12.php?topage=5">5</option>
                            <option value="/dmnweb_fun12.php?topage=6">6</option>
                            <option value="/dmnweb_fun12.php?topage=7">7</option>
                            <option value="/dmnweb_fun12.php?topage=8">8</option>
                            <option value="/dmnweb_fun12.php?topage=9">9</option>
                            <option value="/dmnweb_fun12.php?topage=10">10</option>
                        </select>
                    </li>
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

<script language="JavaScript">

    function chk_s_form() {
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的會員編號。");
            $("#keyword").focus();
            return false;
        }
        return true;
    }
</script>