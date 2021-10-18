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
            <li class="active">未完成名單資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>未完成名單資料</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>網站</th>
                            <th>時間</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>手機</th>
                            <th>地區</th>
                            <th>類型</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td colspan=7>目前已無資料</td>
                        </tr>
                        <tr>
                            <td align="center"><%=web%></td>
                            <td align="center"><%=(R1("times"))%></td>
                            <td align="center"><%=(R1("name"))%>(<a href="ad_no_mem_s.php?mem_mobile=<%=(R1("mobile"))%>" target="_blank">查</a>)</td>
                            <td align="center"><%=(R1("sex"))%></td>
                            <td align="center"><%=(R1("mobile"))%></td>
                            <td align="center"><%=(R1("area"))%></td>
                            <td align="center"><%=ty%></td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="?st=trans&auton=<%=R1("auton")%>"><i class="icon-share"></i> 轉入未入會資料</a></li>                                    
                                        <li><a href="javascript:Mars_popup2('ad_nofix.php?st=del&auton='','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>								
							</td>
						</tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php")
?>