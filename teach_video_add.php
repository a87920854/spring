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
            <li><a href="teach_video.php">教學影片</a></li>
            <li class="active">新增教學影片</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增教學影片</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                    <tbody>
                        <form action="?st=add" method="post" id="form1" onSubmit="return chk_form()">

                            <tr>
                                <td>
                                    類型： <select name="types" id="types" required>
                                        <option value="">請選擇</option>
                                        <option value="一般區">一般區</option>
                                        <option value="管制區">管制區(需督導授權)</option>
                                        <option value="限制區">限制區(需總公司授權)</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    限制觀看會館：
                                    <label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="台北" checked>台北</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="桃園" checked>桃園</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="新竹" checked>新竹</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="台中" checked>台中</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="台南" checked>台南</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="高雄" checked>高雄</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="八德" checked>八德</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="約專" checked>約專</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="迷你約" checked>迷你約</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="總管理處" checked>總管理處</label>&nbsp;&nbsp;
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    提供會館：
                                    <label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="radio" name="ownerbranch" value="台北" required>台北</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="radio" name="ownerbranch" value="桃園" required>桃園</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="radio" name="ownerbranch" value="新竹" required>新竹</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="radio" name="ownerbranch" value="台中" required>台中</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="radio" name="ownerbranch" value="台南" required>台南</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="radio" name="ownerbranch" value="高雄" required>高雄</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="radio" name="ownerbranch" value="八德" required>八德</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="radio" name="ownerbranch" value="約專" required>約專</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="radio" name="ownerbranch" value="迷你約" required>迷你約</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="radio" name="ownerbranch" value="總管理處" required>總管理處</label>&nbsp;&nbsp;
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="開發"> 開發</label>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="邀約" required> 邀約</label>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="訪談"> 訪談</label>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="排約"> 排約</label>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="企劃"> 企劃</label>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="教育訓練"> 教育訓練</label>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="行銷"> 行銷</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><input type="checkbox" style="width:20px;" name="onlybranch" value="1"> 僅督導可見</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    影片標題： <input name="title" type="text" id="title" class="form-control" value="" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    影片說明： <textarea type="text" name="notes" id="notes" class="form-control" style="width:80%;height:100px;font-size:13px;" rows=4></textarea>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    影片位置： <input name="url" type="text" id="url" value="" class="form-control" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div align="center">

                                        <input id="submit3" type="submit" value="確定新增" class="btn btn-info" style="width:50%;">
                                    </div>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    <hr>


    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>