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
            <li class="active">排約人次統計</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>排約人次統計</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <form action="?st=search" method="post" target="_self">
                    <p><a href="ad_single_count_love2.php" class="btn btn-info">查看年度總表</a> </p>
                    <p>日期：<input type="text" name="date1" id="date1" class="datepicker" autocomplete="off" value="2021/08/01"> ~ <input type="text" name="date2" id="date2" class="datepicker" autocomplete="off" value="2021/09/28">
                    <p>
                        <label><input type="checkbox" name="branch" value="台北" checked> 台北</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="桃園"> 桃園</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="新竹"> 新竹</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="台中"> 台中</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="台南"> 台南</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="高雄"> 高雄</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="八德"> 八德</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="約專"> 約專</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="迷你約"> 迷你約</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="總管理處"> 總管理處</label>&nbsp;&nbsp;
                        <label><input type="checkbox" name="shown" value="1"> 顯示離職</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="送出" class="btn btn-default" style="margin-top:-8px">
                    </p>
                </form>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=40>NO</th>
                            <th>會館</th>
                            <th>姓名</th>
                            <th>職稱</th>
                            <th>排約次數</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>台北</td>
                            <td>林馨彤</td>
                            <td>排約秘書</td>
                            <td>104</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>台北</td>
                            <td>李至喬</td>
                            <td>愛情顧問</td>
                            <td>89</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>台北</td>
                            <td>余宗嶼</td>
                            <td>服務部督導</td>
                            <td>85</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>台北</td>
                            <td>高銀寶</td>
                            <td>排約助理</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>台北</td>
                            <td>崔慶三</td>
                            <td>客戶經理</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>台北</td>
                            <td>張棟崴</td>
                            <td>活動企劃</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>台北</td>
                            <td>排約測試</td>
                            <td>test</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>台北</td>
                            <td>許凱甯</td>
                            <td>諮詢顧問</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>台北</td>
                            <td>陳玉涵</td>
                            <td>諮詢顧問</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>台北</td>
                            <td>陳稚翔</td>
                            <td>諮詢顧問</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>台北</td>
                            <td>黃明儀</td>
                            <td>客戶經理</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>台北</td>
                            <td>詹善宇</td>
                            <td>諮詢顧問</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>台北</td>
                            <td>暫存名單</td>
                            <td>諮詢顧問</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>台北</td>
                            <td>上傳</td>
                            <td>活動企劃</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>台北</td>
                            <td>王英華</td>
                            <td>排約秘書</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>台北</td>
                            <td>台北Key</td>
                            <td>會計</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>台北</td>
                            <td>台北KEYIN</td>
                            <td>KEYIN</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>台北</td>
                            <td>台北主任</td>
                            <td>會計</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>台北</td>
                            <td>台北督導</td>
                            <td>督導</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>台北</td>
                            <td>目前交往中</td>
                            <td>諮詢顧問</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td>台北</td>
                            <td>年紀小名單</td>
                            <td>系統工作</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>台北</td>
                            <td>高語鍹</td>
                            <td>客戶經理</td>
                            <td>0</td>
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
require_once("./include/_bottom.php");
?>