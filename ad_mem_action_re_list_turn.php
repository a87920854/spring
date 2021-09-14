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
            <li><a href="ad_mem_action_re_list.php">活動明細表</a></li>
            <li class="active">待轉資料查詢</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>待轉資料查詢 - 數量：0</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <form action="ad_mem_action_re_list_turn.php" method="post" name="form1">
                        <p><span>
                                <div class="btn-group pull-left margin-right-10">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_action_re.php"><i class="fa fa-edit"></i> 新增活動明細</a></li>
                                        <li><a href="ad_mem_action_re_list.php"><i class="fa fa-th-large"></i> 活動明細表</a></li>
                                        <li><a href="ad_mem_action_re_day.php"><i class="fa fa-th-list"></i> 每日活動記錄</a></li>
                                        <li><a href="ad_mem_action_re_ac1.php"><i class="fa fa-th-list"></i> 單一活動記錄</a></li>
                                        <li><a href="ad_mem_action_re_list_turn.php"><i class="fa fa-share"></i> 待轉資料查詢</a></li>
                                        <li><a href="ad_mem_action_re_list_turn2.php"><i class="fa fa-arrow-circle-right"></i> 退費資料查詢</a></li>

                                    </ul>
                                </div>　
                            </span>
                            待轉日期： <input type="text" name="t1" id="t1" class="datepicker" autocomplete="off" placeholder="時間區間" value=""> ~ <input type="text" name="t2" id="t2" class="datepicker" autocomplete="off" placeholder="時間區間" value="">
                        </p>
                        <p>
                            會館：
                            <select name="s6" id="s6">
                                <option value="">請選擇</option>
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
                                <option value="好好玩旅行社">好好玩旅行社</option>
                            </select>
                            秘書：
                            <select name="s7" id="s7">
                                <option value="">請選擇</option>
                            </select>
                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>報名日期</th>
                            <th>活動日期和地區/活動名稱</th>
                            <th width="200">參加人員</th>
                            <th>收費金額</th>
                            <th width="120">活動備註</th>
                            <th width="80">處理會館</th>
                            <th width="80">處理秘書</th>
                            <th width="100">　</th>
                        </tr>
                        <tr>
                            <td colspan=9 height=200>目前沒有資料</td>
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

<script type="text/javascript">
    $mtu = "ad_mem_action_re_list.";
    $(function() {
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");

        });
    });
</script>