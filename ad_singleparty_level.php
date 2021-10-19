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
            <li>約會專家功能</li>
            <li class="active">會員權益表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員權益表</strong> <!-- panel title -->
                </span>
            </div>

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
                        <td>3次/天<br>
                            (罐頭訊息)</td>
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
                <!--
					  
					  <p></p>
					  <p><form action="?st=add" method="post" target="_self" class="form-inline">
						<input id="keyword" name="msg" id="msg" class="form-control" type="text" style="width:60%;" required>
						<input type="submit" value="新增記錄" class="btn btn-default">
						</form></p>
						
										-->
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