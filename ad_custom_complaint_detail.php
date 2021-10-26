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
            <li><a href="ad_custom_complaint.php">客戶申訴</a></li>
            <li class="active">案件資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>客戶申訴 - 案件資料 - 周冠廷</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p class="no-print">
                    <button class="btn btn-info" href="#replymodal" data-toggle="modal" data-target="#replymodal">回報處理情形</button>

                    <button class="btn btn-info" href="#uploadmodal" data-toggle="modal" data-target="#uploadmodal">上傳資料</button>


                    <button class="btn btn-danger" onclick="fix('2021719134649705')">結案歸檔</button>


                    <a href="javascript:window.print();" class="btn btn-warning">列印本頁</a>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td>編號：2021719134649705&nbsp;&nbsp;建立時間：2021-07-19 13:46&nbsp;&nbsp;狀態：處理中</td>
                        </tr>
                        <tr>
                            <td>
                                <font color=green>建檔：</font>總管理處 - 曉娟
                                &nbsp;&nbsp;
                                <font color=green>處理：</font>高雄 - 高雄督導
                            </td>
                        </tr>
                        <tr>
                            <td>
                                姓名：周冠廷
                                &nbsp;&nbsp;
                                手機號碼：0982795510
                                &nbsp;&nbsp;
                                電話：0916770275
                            </td>
                        </tr>

                        <tr>
                            <td>
                                訴求內容：<small class="text-danger">(請謹慎填寫，建立案件後訴求內容無法修改)</small>
                                <div class="print-show" style="display:none;">
                                    &#27492;&#26371;&#21729;&#28858;&#39640;&#38596;&#26371;&#21729;&#65292;&#20358;&#38651;&#35498;&#24819;&#30693;&#36947;&#35299;&#32004;&#30340;&#27969;&#31243;&#65292;<br>&#22240;&#28858;&#36319;&#31061;&#26360;&#25552;&#21040;&#24819;&#35299;&#32004;&#65292;&#31192;&#26360;&#21482;&#35498;&#38656;&#35201;&#20184;&#40848;&#22823;&#30340;&#36949;&#32004;&#37329;&#23601;&#21547;&#31946;&#24118;&#36942;&#20063;&#27794;&#24460;&#32396;&#34389;&#29702;&#21205;&#20316;<br>2/28&#20837;&#26371;&#19981;&#21040;&#19968;&#20491;&#26376;&#30340;&#26178;&#38291;&#36319;&#31061;&#26360;&#25552;&#36215;&#24819;&#35299;&#32004;&#65292;&#20294;&#37117;&#27794;&#19979;&#25991;<br><br>&#36864;&#36027;&#21407;&#22240;&#65306;&#35258;&#24471;&#33258;&#24049;&#20351;&#29992;&#24615;&#19981;&#22823;&#12289;&#27794;&#25214;&#21040;&#23565;&#35937;&#12289;&#32769;&#24107;&#19978;&#35506;&#30340;&#20839;&#23481;&#27604;&#36611;&#27794;&#24171;&#21161;&#65292;&#25152;&#20197;&#19981;&#24819;&#27599;&#20491;&#26376;&#20184;$3000&#36027;&#29992;<br>
                                </div>
                                <textarea style="width:100%;height:250px;" minlength=20 name="notes" class="no-print" readonly disabled>&#27492;&#26371;&#21729;&#28858;&#39640;&#38596;&#26371;&#21729;&#65292;&#20358;&#38651;&#35498;&#24819;&#30693;&#36947;&#35299;&#32004;&#30340;&#27969;&#31243;&#65292;
&#22240;&#28858;&#36319;&#31061;&#26360;&#25552;&#21040;&#24819;&#35299;&#32004;&#65292;&#31192;&#26360;&#21482;&#35498;&#38656;&#35201;&#20184;&#40848;&#22823;&#30340;&#36949;&#32004;&#37329;&#23601;&#21547;&#31946;&#24118;&#36942;&#20063;&#27794;&#24460;&#32396;&#34389;&#29702;&#21205;&#20316;
2/28&#20837;&#26371;&#19981;&#21040;&#19968;&#20491;&#26376;&#30340;&#26178;&#38291;&#36319;&#31061;&#26360;&#25552;&#36215;&#24819;&#35299;&#32004;&#65292;&#20294;&#37117;&#27794;&#19979;&#25991;

&#36864;&#36027;&#21407;&#22240;&#65306;&#35258;&#24471;&#33258;&#24049;&#20351;&#29992;&#24615;&#19981;&#22823;&#12289;&#27794;&#25214;&#21040;&#23565;&#35937;&#12289;&#32769;&#24107;&#19978;&#35506;&#30340;&#20839;&#23481;&#27604;&#36611;&#27794;&#24171;&#21161;&#65292;&#25152;&#20197;&#19981;&#24819;&#27599;&#20491;&#26376;&#20184;$3000&#36027;&#29992;

          	</textarea>

                            </td>
                        </tr>


                </table>
                <b class="text-blue">處理情形</b>
                <table class="table table-striped table-bordered bootstrap-datatable lightbox" data-plugin-options='{"delegate": "a.popup", "gallery": {"enabled": true}}'>
                    <tr>
                        <td>暫無資料</td>
                    </tr>
                </table>

                </form>
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

<script src="js/select2.min.js"></script>
<script language="JavaScript">
    $mtu = "ad_guest.";
    $("#mem_branch").on("change", function() {
        personnel_get("mem_branch", "mem_single");
    });
    $("#fix_branch").on("change", function() {
        personnel_get("fix_branch", "fix_single");
    });

    function fix(num){
        if (window.confirm("是否確定要結案歸檔？\n結案歸檔後的案件將無法回報處理情形並封存，請確定選擇。")) {
            Mars_popup('ad_custom_complaint_detail.php?st=fix&num=' + num,'','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=250,height=150,top=100,left=200');
        }
    }
</script>