<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">約見紀錄表-列表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>約見紀錄表-列表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">

                    <p><input type="button" value="新增約見紀錄" class="btn btn-info" onclick="Mars_popup('ad_invite_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');">　<a href="ad_invite.php?y=2021&m=9&branch=" class="btn btn-success">一般模式</a></p>

                    <div class="input-append">
                        <form class="form-inline" id="searchform" action="ad_invite_list.php" method="post" target="_self" onsubmit="return chk_search_form()">
                            <input type="text" class="form-control" name="keyword" id="keyword">

                            <input type="submit" value="送出" class="btn btn-default">
                        </form>
                        <label><input type="checkbox" name="onlyme" id="onlyme" value="1"> 只顯示自己</label>


                    </div>
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>

                            <tr>

                                <td width="70%"><strong>110 年9月 </strong></td>

                                <td width="10%">●<a href="?y=2021&m=9&branch=">本月</a></td>
                                <td width="13%" style="border:0px">▲<a href="?y=2021&m=8&branch=">上一個月</a></td>
                                <td width="11%" style="border:0px">▼<a href="?y=2021&m=10&branch=">下一個月</a></td>

                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">1 (三)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=1"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">2 (四)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=2"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">3 (五)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=3"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">4 (<font color=green><b>六</b></font>)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=4"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">5 (<font color=red><b>日</b></font>)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=5"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">6 (一)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=6"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">7 (二)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=7"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">8 (三)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=8"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">9 (四)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=9"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">10 (五)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=10"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">11 (<font color=green><b>六</b></font>)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=11"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">12 (<font color=red><b>日</b></font>)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=12"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">13 (一)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=13"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">14 (二)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=14"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">15 (三)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=15"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">16 (四)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=16"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">17 (五)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=17"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">18 (<font color=green><b>六</b></font>)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=18"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">19 (<font color=red><b>日</b></font>)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=19"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">20 (一)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=20"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">21 (二)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=21"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">22 (三)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=22"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">23 (四)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=23"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">24 (五)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=24"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">25 (<font color=green><b>六</b></font>)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=25"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">26 (<font color=red><b>日</b></font>)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=26"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">27 (一)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=27"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">28 (二)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=28"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">29 (三)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=29"></a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4 style="height:auto;background:;">
                                    <div style="width:50px;float:left;">30 (四)</div>
                                    <div style="float:left;"><a href="ad_invite_d.php?y=2021&m=9&d=30"></a></div>
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
</section>
<!-- /MIDDLE -->

<?php
require("./include/_bottom.php");
?>

<script language="JavaScript">
    $mtu = "ad_invite.";
    $(function() {
        $("#onlyme").on("change", function() {
            if ($(this).prop("checked")) location.href = "ad_invite_list.php?onlyme=1&y=2021&m=9";
            else location.href = "ad_invite_list.php?onlyme=0&y=2021&m=9";
        });
    });

    function chk_search_form() {
        if (!$("#keyword").val() && !$("#branch").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        if ($("#keyword").val()) {
            $("#searchform").attr("action", "ad_invite_slist.php");
        }
        return true;
    }
</script>