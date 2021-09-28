<?php
require_once("./include/_inc.php");
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
            <li class="active">秘書履歷</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>秘書履歷</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12 margin-bottom-10">
                    <form action="?st=search" method="post" target="_self" class="form-inline">

                        <select name="branch" id="branch">
                            <option value="" selected>會館</option>
                            <option value="台北" selected>台北</option>
                            <option value="桃園">桃園</option>
                            <option value="新竹">新竹</option>
                            <option value="台中">台中</option>
                            <option value="台南">台南</option>
                            <option value="高雄">高雄</option>
                            <option value="八德">八德</option>
                            <option value="約專">約專</option>
                            <option value="迷你約">迷你約</option>
                            <option value="總管理處">總管理處</option>
                            <option value="好好玩旅行社">好好玩旅行社</option>
                        </select> <select name="keyword_type" id="keyword_type">
                            <option value="s2">姓名</option>
                            <option value="s3">身分證字號</option>
                            <option value="s1">流水號</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" type="text" class="form-control">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>會館</th>
                            <th>姓名</th>
                            <th>別名</th>
                            <th>職稱</th>
                            <th>流水號</th>
                            <th>尚未開發</th>
                            <th width=80></th>
                        </tr>
                        <tr>
                            <td>台北</td>
                            <td>陳玉涵</td>
                            <td>陳玉涵</td>
                            <td>諮詢顧問</td>
                            <td>1679</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=A225553998">199</a></td>
                            <td><a href="ad_single_view.php?an=1679">履歷</a></td>
                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>許凱甯</td>
                            <td>許凱甯</td>
                            <td>諮詢顧問</td>
                            <td>1678</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=F226722661">1</a></td>
                            <td><a href="ad_single_view.php?an=1678">履歷</a></td>
                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>陳鍠志</td>
                            <td>陳鍠志</td>
                            <td>假日櫃台</td>
                            <td>1659</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=F126382405">0</a></td>
                            <td><a href="ad_single_view.php?an=1659">履歷</a></td>
                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>李至喬</td>
                            <td>李至喬</td>
                            <td>愛情顧問</td>
                            <td>1635</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=A227850285">204</a></td>
                            <td><a href="ad_single_view.php?an=1635">履歷</a></td>
                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>張棟崴</td>
                            <td>張棟崴</td>
                            <td>企劃</td>
                            <td>1620</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=A130353266">7</a></td>
                            <td><a href="ad_single_view.php?an=1620">履歷</a></td>
                        </tr>
                        <tr>
                            <td>台北</td>
                            <td>許凱涵</td>
                            <td>許凱涵</td>
                            <td>假日櫃台</td>
                            <td>1479</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=A226907749">0</a></td>
                            <td><a href="ad_single_view.php?an=1479">履歷</a></td>

                        </tr>
                        <tr>
                            <td>台北</td>
                            <td>黃映晴</td>
                            <td>黃映晴</td>
                            <td>櫃台</td>
                            <td>1463</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=A226446198">0</a></td>
                            <td><a href="ad_single_view.php?an=1463">履歷</a></td>

                        </tr>
                        <tr>
                            <td>台北</td>
                            <td>林馨彤</td>
                            <td>林馨彤</td>
                            <td>愛情顧問</td>
                            <td>1298</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=A224876769">11</a></td>
                            <td><a href="ad_single_view.php?an=1298">履歷</a></td>

                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>崔慶三</td>
                            <td>崔慶三</td>
                            <td>客戶部經理</td>
                            <td>1124</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=A121165794">0</a></td>
                            <td><a href="ad_single_view.php?an=1124">履歷</a></td>

                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>林美智</td>
                            <td>林美智</td>
                            <td>櫃台</td>
                            <td>962</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=R220021682">0</a></td>
                            <td><a href="ad_single_view.php?an=962">履歷</a></td>

                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>黃玉卿</td>
                            <td>黃玉卿</td>
                            <td>清潔人員</td>
                            <td>932</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=F222015414">0</a></td>
                            <td><a href="ad_single_view.php?an=932">履歷</a></td>

                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>余宗嶼</td>
                            <td>余宗嶼</td>
                            <td>督導</td>
                            <td>875</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=E222962846">0</a></td>
                            <td><a href="ad_single_view.php?an=875">履歷</a></td>

                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>黃明儀</td>
                            <td>黃明儀</td>
                            <td>客戶部經理</td>
                            <td>624</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=J220528313">1</a></td>
                            <td><a href="ad_single_view.php?an=624">履歷</a></td>

                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>吳嘉齡</td>
                            <td>吳嘉齡</td>
                            <td>會計</td>
                            <td>524</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=G220011142">0</a></td>
                            <td><a href="ad_single_view.php?an=524">履歷</a></td>

                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>春天網站</td>
                            <td>春天網站</td>
                            <td>其他</td>
                            <td>407</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=SPRINGCLUBNET1">0</a></td>
                            <td><a href="ad_single_view.php?an=407">履歷</a></td>

                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>詹善宇</td>
                            <td>詹善宇</td>
                            <td>諮詢顧問</td>
                            <td>374</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=F220056613">827</a></td>
                            <td><a href="ad_single_view.php?an=374">履歷</a></td>

                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>王英華</td>
                            <td>王英華</td>
                            <td>愛情顧問</td>
                            <td>264</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=C200302406">1</a></td>
                            <td><a href="ad_single_view.php?an=264">履歷</a></td>

                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>高語鍹</td>
                            <td>高語鍹</td>
                            <td>資深客戶經理</td>
                            <td>180</td>
                            <td><a href="ad_no_mem.php?s=nokaifa&u=J220390453">5318</a></td>
                            <td><a href="ad_single_view.php?an=180">履歷</a></td>

                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 18 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_single_list.php?topage=1&keyword=&keyword_type=s2&branch=%E5%8F%B0%E5%8C%97&st=search>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_single_list.php?topage=1&keyword=&keyword_type=s2&branch=%E5%8F%B0%E5%8C%97&st=search class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_single_list.php?topage=1&keyword=&keyword_type=s2&branch=%E5%8F%B0%E5%8C%97&st=search" selected>1</option>
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
    $(function() {
        $("#search_send").on("click", function(event) {
            if (!$("#keyword").val() && !$("#branch").val()) {
                $("#keyword").focus();
                alert("請輸入要搜尋的關鍵字。");
                return false;
            }
            if (!$("#keyword_type").val()) {
                alert("have error。");
                return false;
            }
            location.href = "ad_single_list.php?sear=1&vst=full&branch=" + $("#branch").val() + "&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        });


    });
</script>