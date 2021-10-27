<?php
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php")
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">會員管理系統</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>所有會員列表 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="search">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn dropdown-toggle btn-default" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="ad_register1.php" target="_blank"><i class="icon-star"></i> 新增會員資料</a></li>
                            <li><a href="ad_mem_f.php"><i class="icon-tag"></i> 進階搜尋</a></li>
                        </ul>
                    </div>

                    <form id="searchform" action="ad_mem.php?vst=full&sear=1" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" style="width:100px;">
                            <option value="s2">手機</option>
                            <option value="s1">身分證字號</option>
                            <option value="s3">姓名</option>
                            <option value="s5">約會專家帳號</option>
                            <option value="s4">編號</option>

                            <option value="s6">DMN編號</option>

                            <option value="s34">IP</option>

                        </select>
                        <input name="keyword" id="keyword" type="text" class="form-control" value="">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>


                    <p class="clearfix">
                        <a class="btn btn-success" href="ad_mem.php">所有會員</a> <a class="btn btn-warning" href="?s14=1">30天內排約</a> <a class="btn btn-success" href="ad_no_mem.php?s15=1&sear=1">資料認證</a> <a class="btn btn-success" href="?s13=2">真人認證</a> <a class="btn btn-success" href="?s13=3">璀璨會員</a> <a class="btn btn-success" href="?s13=4">璀璨VIP會員</a>

                        <a class="btn btn-success" href="?branch2=1">跨區會員</a>

                        <a class="btn btn-success" href="?enterprise=1">企業會員</a>


                        <select class="form-control2 pull-right" onchange="location.href='ad_mem.php'+$(this).val()+''" autocomplete="off">
                            <option value="?orderby=0">預設排序</option>
                            <option value="?orderby=1">依入會時間排序</option>
                            <option value="?orderby=2">依到期時間排序</option>
                        </select>
                    </p>

                    <p style="clear:both">
                        <a class="btn btn-info" href="?s30=1&vst=full">百大科技</a> <a class="btn btn-info" href="?s30=2&vst=full">公教醫護</a> <a class="btn btn-info" href="?s30=3&vst=full">傳播藝術</a> <a class="btn btn-info" href="?s30=4&vst=full">餐飲服務</a> <a class="btn btn-info" href="?s30=5&vst=full">金融保險</a>
                    </p>

                </div>
                <div class="table-responsive">
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
                                <th width=200>秘書</th>
                                <th width=60>照片</th>
                                <th width=80></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr style="background-color:#f2f2f2">
                                <td class="center">網站行銷</td>
                                <td>2080591</td>
                                <td class="center"><a href="ad_mem_detail.php?mem_num=2080591" target="_blank">江汶珊</a>
                                    <div style="float:right">
                                        &nbsp;<span class="label" style="background:#ED6D09"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="個案">個案</a></span>&nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0988024276" target="_blank"> <span class="label label-info">查詢</span></a></div>
                                </td>
                                <td class="center">女</td>
                                <td class="center">1997/7/19　　24 歲</td>
                                <td class="center">大學</td>
                                <td class="center">無</td>

                                <td class="center">
                                    <font color=green>受理：</font>台中 - 陳素娟<br>
                                    <font color=green>排約：</font>陳素娟<br>
                                    <font color=green>邀約：</font>八德 - 林嘉芮 芮芮<br>
                                    <font color=green>輸入：</font>台中督導
                                </td>
                                <td class="center">
                                    無
                                </td>
                                <td class="center">
                                    <div class="btn-group" style="float:left;height:22px;font-size:12px;">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="ad_mem_detail.php?mem_num=2080591" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                            <li><a href="javascript:Mars_popup('ad_report.php?k_id=1982623&lu=N225194909&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(29)</a></li>

                                            <li><a href="ad_mem_card_print.php?mem_num=2080591" target="_blank"><i class="icon-file"></i> 貴賓諮詢卡</a></li>
                                            <li><a href="ad_mem_fix.php?mem_num=2080591" target="_blank"><i class="icon-file"></i> 修改</a></li>

                                            <li><a href="ad_register2.php?mem_num=2080591" target="_blank"><i class="icon-camera"></i> 照片</a></li>
                                            <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=女&mem_single=B221169053&mem_mail=&mem_num=2080591','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>


                                            <li><a href="ad_important_paper.php?mem_num=2080591" target="_blank"><i class="icon-camera"></i> 紙本資料</a></li>
                                            <li><a href="#sms" onclick="Mars_popup('send_sms.php?mem_sex=女&mem_single=B221169053&mem_mobile=0988024276&mem_num=2080591','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 簡訊</a></li>


                                            <li><a href="#advisory" onclick="Mars_popup('ad_advisory_invite_add.php?mem_num=2080591','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');"><i class="icon-envelope"></i> 新增預訂諮詢</a></li>



                                            <li><a href="javascript:Mars_popup('send_bday_sets.php?st=sets&mem_mobile=0988024276','','width=300,height=200,top=100,left=100')"><i class="icon-inbox"></i> 生日黑單</a></li>


                                            <li><a href="#a" onClick="Mars_popup('ad_mem_branch_fix2.php?mem_num=2080591&t=mem_single2','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-screenshot"></i> 跨區設定</a></li>
                                            <li><a href="javascript:Mars_popup2('ad_del.php?mem_auto=1982623','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr style="background-color:#f2f2f2;">
                                <td colspan="10" style="font-size: 14px;">
                                    <span style="display: inline-block; color:green; border:1px solid green; padding: 3px 10px; border-radius: 3px; margin-right: 5px">真人認證會員(2021/8/31~2021/11/30)&nbsp;&nbsp;餘 63 天</span>
                                    <span style="color:green"><a href="#r" onclick="Mars_popup('ad_report.php?k_id=1982623&lu=N225194909&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(29)</a>-<font color=red>已排約</font>&nbsp;-&nbsp;由 陳素娟/陳素娟 處理 曾彥宇(主) 與 江汶珊(被) 於 2021/9/6 下午 07:30:00 預訂排約，結果：成功</span>
                                </td>
                            </tr>

                            <tr style="background-color:#ffffff">
                                <td class="center">流水陌call</td>
                                <td>2080489</td>
                                <td class="center"><a href="ad_mem_detail.php?mem_num=2080489" target="_blank">呂庭瑋</a>
                                    <div style="float:right">
                                        &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0910675467" target="_blank"> <span class="label label-info">查詢</span></a></div>
                                </td>
                                <td class="center">男</td>
                                <td class="center">1991/10/18　　30 歲</td>
                                <td class="center">大學</td>
                                <td class="center">無</td>

                                <td class="center">
                                    <font color=green>受理：</font>桃園 - 江琳<br>
                                    <font color=green>排約：</font>彭淑慧<br>
                                    <font color=green>邀約：</font>台南 - 李梅子<br>
                                    <font color=green>輸入：</font>連督導
                                </td>
                                <td class="center">
                                    無
                                </td>
                                <td class="center">
                                    <div class="btn-group" style="float:left;height:22px;font-size:12px;">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="ad_mem_detail.php?mem_num=2080489" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                            <li><a href="javascript:Mars_popup('ad_report.php?k_id=1981527&lu=H124023781&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(7)</a></li>

                                            <li><a href="ad_mem_card_print.php?mem_num=2080489" target="_blank"><i class="icon-file"></i> 貴賓諮詢卡</a></li>
                                            <li><a href="ad_mem_fix.php?mem_num=2080489" target="_blank"><i class="icon-file"></i> 修改</a></li>

                                            <li><a href="ad_register2.php?mem_num=2080489" target="_blank"><i class="icon-camera"></i> 照片</a></li>
                                            <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=男&mem_single=H220342741&mem_mail=&mem_num=2080489','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>


                                            <li><a href="ad_important_paper.php?mem_num=2080489" target="_blank"><i class="icon-camera"></i> 紙本資料</a></li>
                                            <li><a href="#sms" onclick="Mars_popup('send_sms.php?mem_sex=男&mem_single=H220342741&mem_mobile=0910675467&mem_num=2080489','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 簡訊</a></li>


                                            <li><a href="#advisory" onclick="Mars_popup('ad_advisory_invite_add.php?mem_num=2080489','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');"><i class="icon-envelope"></i> 新增預訂諮詢</a></li>



                                            <li><a href="javascript:Mars_popup('send_bday_sets.php?st=sets&mem_mobile=0910675467','','width=300,height=200,top=100,left=100')"><i class="icon-inbox"></i> 生日黑單</a></li>


                                            <li><a href="#a" onClick="Mars_popup('ad_mem_branch_fix2.php?mem_num=2080489&t=mem_single2','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-screenshot"></i> 跨區設定</a></li>
                                            <li><a href="javascript:Mars_popup2('ad_del.php?mem_auto=1981527','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr style="background-color:#ffffff;">
                                <td colspan="10" style="font-size: 14px;">
                                    <span style="display: inline-block; color:green; border:1px solid green; padding: 3px 10px; border-radius: 3px; margin-right: 5px">真人認證會員(2021/8/31~2021/11/30)&nbsp;&nbsp;餘 63 天</span>
                                    <span style="color:green"><a href="#r" onclick="Mars_popup('ad_report.php?k_id=1982623&lu=N225194909&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(29)</a>-<font color=red>已排約</font>&nbsp;-&nbsp;由 陳素娟/陳素娟 處理 曾彥宇(主) 與 江汶珊(被) 於 2021/9/6 下午 07:30:00 預訂排約，結果：成功</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">共 200 筆、第 1 頁／共 4 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_mem.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_mem.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_mem.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_mem.php?topage=4 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem.php?topage=1" selected>1</option>
                            <option value="/ad_mem.php?topage=2">2</option>
                            <option value="/ad_mem.php?topage=3">3</option>
                            <option value="/ad_mem.php?topage=4">4</option>
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
require_once("./include/_bottom.php");
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