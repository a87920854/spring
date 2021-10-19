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
            <li class="active">廠商認列表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>廠商認列表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form id="searchform" action="?" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <select name="come" id="come">

                            <option value="">請選擇</option>
                            <option value="流水陌call">流水陌call</option>
                            <option value="樂得流水call">樂得流水call</option>
                            <option value="樂得系統回call">樂得系統回call</option>
                            <option value="萊優流水call">萊優流水call</option>
                            <option value="萊優Robotcall">萊優Robotcall</option>
                            <option value="手機1111">手機1111</option>
                            <option value="客人自來電">客人自來電</option>
                            <option value="訪客自來">訪客自來</option>
                            <option value="來過未參追">來過未參追</option>
                            <option value="活動宣傳">活動宣傳</option>
                            <option value="五人未入會">五人未入會</option>
                            <option value="外部A名單">外部A名單</option>
                            <option value="外部B名單">外部B名單</option>
                            <option value="外部C名單">外部C名單</option>
                            <option value="春天部落格">春天部落格</option>
                            <option value="通路王">通路王</option>
                            <option value="高接觸率流水號">高接觸率流水號</option>
                            <option value="台灣電話流水序號開發">台灣電話流水序號開發</option>
                            <option value="手機123">手機123</option>
                            <option value="手機104">手機104</option>
                            <option value="台灣推薦名單">台灣推薦名單</option>
                            <option value="舊資料再開發">舊資料再開發</option>
                            <option value="好好玩名單">好好玩名單</option>
                            <option value="Cheers雜誌報導">Cheers雜誌報導</option>
                            <option value="2016Cheers名單">2016Cheers名單</option>
                            <option value="人力銀行">人力銀行</option>
                            <option value="網站行銷">網站行銷</option>
                            <option value="春天網站">春天網站</option>
                            <option value="DMN名單">DMN名單</option>
                            <option value="DMN網站">DMN網站</option>
                            <option value="約會專家">約會專家</option>
                            <option value="迷你約">迷你約</option>
                            <option value="網站活動">網站活動</option>
                            <option value="網站排約">網站排約</option>
                            <option value="舊系統資料">舊系統資料</option>
                            <option value="台灣舊資料">台灣舊資料</option>
                            <option value="廈門舊資料">廈門舊資料</option>
                            <option value="上海舊資料">上海舊資料</option>
                            <option value="舊資料卡">舊資料卡</option>
                            <option value="520940網站名單">520940網站名單</option>
                            <option value="台灣畢冊開發">台灣畢冊開發</option>
                            <option value="彰化委外名單">彰化委外名單</option>
                            <option value="媒體報導名單">媒體報導名單</option>
                            <option value="合辦活動名單">合辦活動名單</option>
                            <option value="春天會館FB">春天會館FB</option>
                            <option value="微電影活動">微電影活動</option>
                            <option value="億捷創意回收名單">億捷創意回收名單</option>
                            <option value="行銷活動">行銷活動</option>
                            <option value="通路合作">通路合作</option>
                            <option value="FB名單">FB名單</option>
                            <option value="新書發表會">新書發表會</option>
                            <option value="購書贈送活動">購書贈送活動</option>
                            <option value="瑪那熊">瑪那熊</option>
                            <option value="活動通Accupass">活動通Accupass</option>
                            <option value="企劃活動名單">企劃活動名單</option>
                            <option value="其他">其他</option>
                        </select>
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
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
                            <th>入會日</th>
                            <th width=80>秘書</th>
                            <th width=80></th>
                            <th width=60></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan=10 height=200>請選擇來源</td>
                        </tr>
                        <tr>
                            <td class="center"><%=rs("come")%><%=mem_cc%></td>
                            <td><%=num%></td>
                            <td class="center"><a href="<%=mlink%>" target="_blank"><%=rs("names")%></a>
                                <div style="float:right"><%=xv%></div>
                            </td>
                            <td class="center"><%=rs("sex")%></td>
                            <td class="center"><%=rs("mem_by")%>/<%=rs("mem_bm")%>/<%=rs("mem_bd")%><%if rs("mem_by") <> "" then response.write "　　"&(year(date)-rs("mem_by"))&" 歲" end if%></td>
                            <td class="center"><%=rs("mem_school")%></td>
                            <td class="center"><%=rs("mem_jointime")%></td>

                            <td class="center"><%=mem_single%></td>

                            <td class="center">
                                <font color=green>已認列</font>
                                <font color=red>不認列</font>
                                <font color=black>無法認列</font>
                                <font color=blue>未認列</font>
                            </td>
                            <td>

                                <a href="#re" onclick="Mars_popup('ad_b2b_fix.php?num=<%=nums%>&ty=<%=rs("ty")%>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=180,top=200,left=150');">處理</a>

                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td colspan="6" style="BORDER-bottom: #666666 1px dotted">

                                <a href="#re" onclick="Mars_popup('ad_report.php?mem_num=<%=nums%>&lu=<%=rs("mem_username")%>&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">

                                    <a href="javascript:Mars_popup('ad_report.php?k_id=<%=nums%>&ty=love','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">

                                        回報(0)</a>，處理情形：<font color="#FF0000" size="2">XX</font>)
                                    <font color=red>不認列原因：</font>
                            </td>
                            <td colspan=3>

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
require_once("./include/_bottom.php")
?>