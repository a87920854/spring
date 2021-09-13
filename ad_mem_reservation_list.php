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
            <li class="active">預約聯絡表-列表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>預約聯絡表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <form class="form-inline" id="searchform" action="ad_mem_reservation_slist.asp" method="post" target="_self" onsubmit="return chk_search_form()">
                        <a href="ad_mem_reservation.asp?y=2021&m=9" class="btn btn-info">一般模式</a>&nbsp;&nbsp;
                        <input type="text" class="form-control" name="keyword" id="keyword">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="70%"><strong>110 年9月 </strong></td>
                            <td width="10%">●<a href="?y=2021&m=9">本月</a></td>
                            <td width="10%" style="border:0px">▲<a href="?y=2021&m=8&branch=">上一個月</a></td>
                            <td width="10%" style="border:0px">▼<a href="?y=2021&m=10&branch=">下一個月</a></td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">1 (三)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/1&t2=2021/9/1"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">2 (四)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/2&t2=2021/9/2"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">3 (五)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/3&t2=2021/9/3"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">4 (<font color=green><b>六</b></font>)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/4&t2=2021/9/4"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">5 (<font color=red><b>日</b></font>)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/5&t2=2021/9/5"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">6 (一)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/6&t2=2021/9/6"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">7 (二)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/7&t2=2021/9/7"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">8 (三)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/8&t2=2021/9/8"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">9 (四)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/9&t2=2021/9/9"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">10 (五)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/10&t2=2021/9/10"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">11 (<font color=green><b>六</b></font>)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/11&t2=2021/9/11"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">12 (<font color=red><b>日</b></font>)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/12&t2=2021/9/12"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">13 (一)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/13&t2=2021/9/13"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">14 (二)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/14&t2=2021/9/14"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">15 (三)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/15&t2=2021/9/15"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">16 (四)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/16&t2=2021/9/16"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">17 (五)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/17&t2=2021/9/17"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">18 (<font color=green><b>六</b></font>)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/18&t2=2021/9/18"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">19 (<font color=red><b>日</b></font>)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/19&t2=2021/9/19"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">20 (一)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/20&t2=2021/9/20"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">21 (二)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/21&t2=2021/9/21"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">22 (三)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/22&t2=2021/9/22"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">23 (四)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/23&t2=2021/9/23"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">24 (五)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/24&t2=2021/9/24"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">25 (<font color=green><b>六</b></font>)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/25&t2=2021/9/25"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">26 (<font color=red><b>日</b></font>)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/26&t2=2021/9/26"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">27 (一)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/27&t2=2021/9/27"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">28 (二)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/28&t2=2021/9/28"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">29 (三)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/29&t2=2021/9/29"></a></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4 style="height:auto;background:;">
                                <div style="width:50px;float:left;">30 (四)</div>
                                <div style="float:left;"><a href="ad_fav.asp?t1=2021/9/30&t2=2021/9/30"></a></div>
                            </td>
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
<!-- /MIDDLE -->

<?php
 require("./include/_bottom.php");
?>


<script language="JavaScript">
    $mtu = "ad_mem_reservation.";

    function chk_search_form() {
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        return true;
    }
</script>