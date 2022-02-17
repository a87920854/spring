<?php
/**************************************/
//檔案名稱：ad_singleparty_level.php
//後台對應位置：約會專家功能->會員權益表
//改版日期：2022.02.15
//改版設計人員：Jack
//改版程式人員：Queena
/**************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//麵包屑
$unitprocess = $m_home.$icon."約會專家功能".$icon."情感諮詢預約";

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$msg = SqlFilter($_REQUEST["msg"],"tab");

//新增
if ( $st == "add" ){
    $SQL_i  = "Insert Into si_levelmsg(msg, times, owner, ownername) Values ( ";
    $SQL_i .= "'".$msg."',";
    $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
    $SQL_i .= "'".$_SESSION["MM_Username"]."',";
    $SQL_i .= "'".$_SESSION["pname"]."')";
    $rs_i = $SPConn->prepare($SQL_i);
    $rs_i->execute();
    reURL("ad_singleparty_level.php");
    exit;
}
?>
<!-- MIDDLE -->
<section id="middle">

    <!-- 麵包屑 -->
    <header id="page-header">
        <div class="m-crumb"><i class="fa fa-folder-open-o"></i><?php echo $unitprocess;?></div>
    </header>
    <!-- /麵包屑 -->

    <div id="content" class="padding-20">

        <!-- content starts -->
        <div class="panel panel-default">
            <h2 class="pageTitle">約會專家升級意願 》會員權益表</h2>
            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable table-center btable">
                    <tr>
                        <th><b class="text-blue">男生權益</b></th>
                        <th>網站會員</th>
                        <th colspan=4>資料認證會員</th>
                        <th>到期-璀璨會員</th>
                        <th>璀璨會員</th>
                        <th>到期-璀璨VIP會員</th>
                        <th>璀璨VIP會員</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>到期-資料認證變網站會員</td>
                        <td>資料認證</td>
                        <td>到期-真人認證變資料認證</td>
                        <td>真人認證</td>
                        <td>到期變真人認證權限</td>
                        <td></td>
                        <td>到期變真人認證權限</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>註冊</td>
                        <td>線上註冊</td>
                        <td></td>
                        <td>線上註冊</td>
                        <td></td>
                        <td>線上註冊</td>
                        <td></td>
                        <td>線上註冊</td>
                        <td></td>
                        <td>線上註冊</td>
                    </tr>
                    <tr>
                        <td>單身驗證</td>
                        <td>X</td>
                        <td>X</td>
                        <td>線上驗證</td>
                        <td>X</td>
                        <td>專人驗證</td>
                        <td>專人驗證</td>
                        <td>專人驗證</td>
                        <td>專人驗證</td>
                        <td>專人驗證</td>
                    </tr>
                    <tr>
                        <td>現場排約</td>
                        <td>X</td>
                        <td>X</td>
                        <td>被動排約</td>
                        <td>X</td>
                        <td>主動排約<br>優先被動排約</td>
                        <td>主動排約<br>優先被動排約</td>
                        <td>主/被動排約</td>
                        <td>主動排約<br>優先被動排約</td>
                        <td>主/被動排約</td>
                    </tr>
                    <tr>
                        <td>網路送禮</td>
                        <td>X</td>
                        <td>3次/天</td>
                        <td>3次/天</td>
                        <td>3次/天</td>
                        <td>5次/天</td>
                        <td>5次/天</td>
                        <td>無限制</td>
                        <td>5次/天</td>
                        <td>無限制</td>
                    </tr>
                    <tr>
                        <td>網路留言</td>
                        <td>X</td>
                        <td>X</td>
                        <td>3次/天<br>(罐頭訊息)</td>
                        <td>3次/天<br>(罐頭訊息)</td>
                        <td>自由留言</td>
                        <td>10次/天<br>(自由留言)</td>
                        <td>自由留言</td>
                        <td>10次/天<br>(自由留言)</td>
                        <td>自由留言</td>
                    </tr>
                    <tr>
                        <td>喜歡</td>
                        <td>X</td>
                        <td>X</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>隱藏</td>
                        <td>X</td>
                        <td>X</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>交換Line</td>
                        <td>X</td>
                        <td>X</td>
                        <td>X</td>
                        <td>X</td>
                        <td>接受被邀請約會</td>
                        <td>接受被邀請約會</td>
                        <td>接受被邀請約會</td>
                        <td>接受被邀請約會</td>
                        <td>擁有主被動權</td>
                    </tr>
                    <tr>
                        <td>交換FB</td>
                        <td>X</td>
                        <td>X</td>
                        <td>X</td>
                        <td>X</td>
                        <td>接受被邀請約會</td>
                        <td>接受被邀請約會</td>
                        <td>接受被邀請約會</td>
                        <td>接受被邀請約會</td>
                        <td>擁有主被動權</td>
                    </tr>
                    <tr>
                        <td>會館約會</td>
                        <td>X</td>
                        <td>X</td>
                        <td>X</td>
                        <td>X</td>
                        <td>主被動皆可</td>
                        <td>主被動皆可</td>
                        <td>主被動皆可</td>
                        <td>主被動皆可</td>
                        <td>主被動皆可</td>
                    </tr>
                    <tr>
                        <td>約會攻略</td>
                        <td>X</td>
                        <td>X</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>戀愛課程</td>
                        <td>X</td>
                        <td>X</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>備註</td>
                        <td>現場排約<br>需出示單身證件</td>
                        <td></td>
                        <td>現場排約<br>需出示單身證件</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>

                <table class="table table-striped table-bordered bootstrap-datatable table-center gtable">
                    <tr>
                        <th><b class="text-red">女生權益</b></th>
                        <th>網站會員</th>
                        <th>資料認證會員</th>
                        <th>真人會員</th>
                        <th>璀璨會員</th>
                        <th>璀璨VIP會員</th>
                    </tr>
                    <tr>
                        <td>註冊</td>
                        <td>線上註冊</td>
                        <td>線上註冊</td>
                        <td>線上註冊</td>
                        <td>線上註冊</td>
                        <td>線上註冊</td>
                    </tr>
                    <tr>
                        <td>單身驗證</td>
                        <td>X</td>
                        <td>線上驗證</td>
                        <td>專人驗證</td>
                        <td>專人驗證</td>
                        <td>專人驗證</td>
                    </tr>
                    <tr>
                        <td>現場排約</td>
                        <td>X</td>
                        <td>主/被動排約</td>
                        <td>主/被動排約</td>
                        <td>主/被動排約</td>
                        <td>主/被動排約</td>
                    </tr>
                    <tr>
                        <td>網路送禮</td>
                        <td>X</td>
                        <td>無限制</td>
                        <td>無限制</td>
                        <td>無限制</td>
                        <td>無限制</td>
                    </tr>
                    <tr>
                        <td>網路留言</td>
                        <td>X</td>
                        <td>自由留言</td>
                        <td>自由留言</td>
                        <td>自由留言</td>
                        <td>自由留言</td>
                    </tr>
                    <tr>
                        <td>喜歡</td>
                        <td>X</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>隱藏</td>
                        <td>X</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>交換Line</td>
                        <td>X</td>
                        <td>擁有主被動權</td>
                        <td>擁有主被動權</td>
                        <td>擁有主被動權</td>
                        <td>擁有主被動權</td>
                    </tr>
                    <tr>
                        <td>交換FB</td>
                        <td>X</td>
                        <td>擁有主被動權</td>
                        <td>擁有主被動權</td>
                        <td>擁有主被動權</td>
                        <td>擁有主被動權</td>
                    </tr>
                    <tr>
                        <td>會館約會</td>
                        <td>X</td>
                        <td>主被動皆可</td>
                        <td>主被動皆可</td>
                        <td>主被動皆可</td>
                        <td>主被動皆可</td>
                    </tr>
                    <tr>
                        <td>約會攻略</td>
                        <td>X</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>戀愛課程</td>
                        <td>X</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>備註</td>
                        <td>現場排約<br>需出示單身證件</td>
                        <td>現場排約<br>需出示單身證件</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

<?php require_once("./include/_bottom.php");?>