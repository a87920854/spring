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
            <li class="active">申辦分期會員服務記錄表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>申辦分期會員服務記錄表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <form action="?st=search" method="post" target="_self" class="form-inline">
                    <p>日期：<input type="text" name="date1" id="date1" class="datepicker" autocomplete="off" value="2021/09/01" autocomplete="off"> ~ <input type="text" name="date2" id="date2" class="datepicker" autocomplete="off" value="2021/09/28" autocomplete="off"></p>
                    <p>性別：
                        <label><input type="radio" name="sex" id="sex" value="男"> 男</label>
                        <label><input type="radio" name="sex" id="sex" value="女"> 女</label>
                        &nbsp;&nbsp;

                        <select name="branch" id="branch">
                            <option value="">請選擇會館</option>
                            <option value="台北">台北</option>
                            <option value="桃園">桃園</option>
                            <option value="新竹">新竹</option>
                            <option value="台中">台中</option>
                            <option value="台南">台南</option>
                            <option value="高雄">高雄</option>
                            <option value="八德">八德</option>
                            <option value="約專">約專</option>
                            <option value="迷你約">迷你約</option>
                            <option value="總管理處">總管理處</option>
                        </select>　
                        <select name="single" id="single">
                            <option value="">請選擇秘書</option>
                        </select>

                        &nbsp;&nbsp;<input type="submit" value="送出" class="btn btn-default">
                    </p>
                </form>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=40>NO</th>
                            <th>入會日期</th>
                            <th>邀約會館</th>
                            <th>邀約秘書</th>
                            <th>受理會館</th>
                            <th>受理秘書</th>
                            <th>來源</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>備註</th>
                            <th>排約次數</th>
                            <th>金額</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2021/9/5</td>
                            <td>台中</td>
                            <td>洪筠芳</td>
                            <td>台中</td>
                            <td>洪筠芳</td>
                            <td>舊資料再開發</td>
                            <td><a href="ad_mem_detail.php?mem_num=2081580" target="_blank">林建宏</a> <a href="ad_mem_pay_detail.php?mem_username=L123862731&uname=林建宏" class="btn btn-xs btn-warning">收支</a></td>
                            <td>男</td>
                            <td>1988/12/9</td>
                            <td>仲信</td>
                            <td>0</td>
                            <td>20000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2021/8/29</td>
                            <td>台南</td>
                            <td>黃芳敏</td>
                            <td>台北</td>
                            <td>崔慶三</td>
                            <td>流水陌call</td>
                            <td><a href="ad_mem_detail.php?mem_num=2080834" target="_blank">陳俊龍</a> <a href="ad_mem_pay_detail.php?mem_username=V121174522&uname=陳俊龍" class="btn btn-xs btn-warning">收支</a></td>
                            <td>男</td>
                            <td>1985/7/18</td>
                            <td>匯款</td>
                            <td>2</td>
                            <td>98000</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2021/9/6</td>
                            <td>高雄</td>
                            <td>蕭哲聰</td>
                            <td>台中</td>
                            <td>鄭郁湘</td>
                            <td>流水陌call</td>
                            <td><a href="ad_mem_detail.php?mem_num=2082100" target="_blank">陳韋杉</a> <a href="ad_mem_pay_detail.php?mem_username=M122754857&uname=陳韋杉" class="btn btn-xs btn-warning">收支</a></td>
                            <td>男</td>
                            <td>1996/8/23</td>
                            <td>仲信</td>
                            <td>1</td>
                            <td>123000</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>2021/9/5</td>
                            <td>台北</td>
                            <td>高語鍹</td>
                            <td>台北</td>
                            <td>高語鍹</td>
                            <td>行銷活動</td>
                            <td><a href="ad_mem_detail.php?mem_num=2081933" target="_blank">陳建達</a> <a href="ad_mem_pay_detail.php?mem_username=F126722329&uname=陳建達" class="btn btn-xs btn-warning">收支</a></td>
                            <td>男</td>
                            <td>1986/5/5</td>
                            <td>仲信</td>
                            <td>1</td>
                            <td>28000</td>
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

<script type="text/javascript">
    $(function() {
        $("#branch").on("change", function() {
            personnel_get_send("branch", "single");
        });



    });
</script>