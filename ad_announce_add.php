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
            <li class="active">公告訊息</li>
            <li class="active">新增/修改公告訊息</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增/修改公告訊息</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="mform" method="post" action="ad_announce_add.php" class="form-inline" onSubmit="return chkform()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td>
                                    觀看會館：</td>
                                <td>
                                    <label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="all" checked> 所有會館</label>&nbsp;&nbsp;
                                    <label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="台北"> 台北</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="桃園"> 桃園</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="新竹"> 新竹</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="台中"> 台中</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="台南"> 台南</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="高雄"> 高雄</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="八德"> 八德</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="約專"> 約專</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="迷你約"> 迷你約</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="總管理處"> 總管理處</label>&nbsp;&nbsp;<label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="branch" value="好好玩旅行社"> 好好玩旅行社</label>&nbsp;&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td width="150" align="left" valign="middle">觀看權限：</td>
                                <td>
                                    <label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="look_for" value="all" checked> 所有權限</label>&nbsp;&nbsp;
                                    <label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="look_for" value="branch"> 督導/經裡</label>&nbsp;&nbsp;
                                    <label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="look_for" value="single"> 秘書</label>&nbsp;&nbsp;
                                    <label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="look_for" value="pay"> 會計部</label>&nbsp;&nbsp;
                                    <label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="look_for" value="love"> 排約部/服務經理</label>&nbsp;&nbsp;
                                    <label style="display:inline;"><input style="width:20px;" data-no-uniform="true" type="checkbox" name="look_for" value="action"> 企畫</label>&nbsp;&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td width="150" align="left" valign="middle">標題：</td>
                                <td><input name="title" id="title" value="2021年9月網站行銷相關名單恢復原本比例（9/1更新）" style="width:60%;" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">公告時間：</td>
                                <td>2021/9/1 下午 06:52:58</td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">內文：</td>
                                <td><small>要輸入內文才能送出</small><br><textarea id="notes" name="notes" style="width:100%;height:350px;" required><p><span style="color: rgb(255, 0, 0); font-size: 20px;">2021年9月起網站行銷相關名單恢復原本開發邀約受理比例如下：</span></p><p><br/></p><p><strong><span style="font-size: 18px;">會館及個人分配比例：30% 網站&nbsp; /30%邀約&nbsp; /40%受理</span></strong></p><p>若非業務區邀約：比照公告（來源業績：會館回總管理處/秘書回總管理處網站行銷）</p><p>凡是小女及優質男比照公告（發文字號：110通字第019號）<br/></p><p>男女</p><p>年次<br/></p><p>學歷</p><p><br/></p><p><span style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 15px; background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border: 1px solid rgb(0, 0, 0);">2018年行銷名單，比照開發資料補充說明，舊資料公告。</span></p><p><span style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; background-color: rgb(249, 249, 249); color: rgb(0, 0, 0); border: 1px solid rgb(0, 0, 0); font-size: 18px;">如果非行銷來源或升卡續卡，小女生及小男生（依優質單身資料庫）分配比例不變。&nbsp;&nbsp;</span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; margin-block: 1em; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: normal; background-color: rgb(249, 249, 249);"><span style="box-sizing: border-box; font-size: 20px; color: rgb(255, 0, 0);"><span style="box-sizing: border-box; font-weight: 700;">鼓勵小女生（76年次～90年次）</span></span></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; margin-block: 1em; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: normal; background-color: rgb(249, 249, 249);">&nbsp; &nbsp; &nbsp;小女生 5299方案：行銷來源10%，邀約45％，受理秘書45%&nbsp;<br/></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; margin-block: 1em; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: normal; background-color: rgb(249, 249, 249); outline: none !important;">&nbsp; &nbsp; &nbsp;<span style="color: rgb(255, 0, 0);">此分配僅限於<span style="box-sizing: border-box; text-decoration: none;">9/30</span>前</span>（延長到<span style="box-sizing: border-box; text-decoration-line: line-through;">7/31</span><span style="text-decoration: line-through;"><span style="text-decoration: line-through; box-sizing: border-box;">&nbsp;</span><span style="text-decoration: line-through; box-sizing: border-box; color: rgb(192, 0, 0); outline: none !important;">8/31</span></span><span style="box-sizing: border-box; color: rgb(192, 0, 0); outline: none !important;"> 9/30</span>)，如果非行銷來源，分配比例不變。</p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; margin-block: 1em; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: normal; background-color: rgb(249, 249, 249);">&nbsp; &nbsp; &nbsp;其他方案比照原比例分配&nbsp;</p><p><br/></p></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2 align="center"><input name="acts" id="acts" type="hidden" value="up"><input name="pid" type="hidden" id="pid" value="423">
                                    <input type="submit" value="確認送出" class="btn btn-info" style="width:50%;">
                                </td>
                            </tr>
                        </tbody>
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

<script type="text/javascript" src="assets/plugins/ueditor/ueditor.config.js?v=1.2"></script>
<script type="text/javascript" src="assets/plugins/ueditor/ueditor.all.min.js?v=1.9"></script>

<script language="JavaScript">
    $mtu = "ad_announce.";

    function chkform() {

    }

    $(function() {

        var ue = UE.getEditor("notes", {

            toolbars: [
                [
                    'bold', //加粗     
                    'italic', //斜体
                    'underline', //下划线
                    'strikethrough', //删除线
                    'subscript', //下标
                    'fontborder', //字符边框
                    'superscript', //上标
                    'formatmatch', //格式刷        
                    'justifyleft', //居左对齐
                    'justifyright', //居右对齐
                    'justifycenter', //居中对齐
                    'justifyjustify', //两端对齐
                    'forecolor', //字体颜色
                    'backcolor', //背景色
                    'fontfamily', //字体        
                    'fontsize', //字号
                    'lineheight', //行间距
                    'paragraph', //段落格式
                    '|',
                    'undo', //撤销
                    'redo', //重做
                    'source', //源代码
                    '|',
                    'removeformat', //清除格式
                ],
                [

                    'horizontal', //分隔线
                    '|',
                    'date', //日期
                    'time', //时间
                    'link', //超链接        
                    '|',

                    'insertparagraphbeforetable', //"表格前插入行"
                    'inserttable', //插入表格
                    'insertrow', //前插入行
                    'insertcol', //前插入列
                    'mergeright', //右合并单元格
                    'mergedown', //下合并单元格
                    'deleterow', //删除行
                    'deletecol', //删除列
                    'splittorows', //拆分成行
                    'splittocols', //拆分成列
                    'splittocells', //完全拆分单元格
                    'deletecaption', //删除表格标题        
                    'inserttitle', //插入标题
                    'mergecells', //合并多个单元格
                    'deletetable', //删除表格
                    '|',




                    'simpleupload', //单图上传
                    'insertimage', //多图上传
                    '|',
                    'spechars', //特殊字符
                    'searchreplace', //查询替换                        
                    'insertorderedlist', //有序列表
                    'insertunorderedlist', //无序列表        
                    'scrawl', //涂鸦
                    '|',
                    'selectall', //全选
                    'print', //打印
                    'preview', //预览
                    'cleardoc', //清空文档    
                ]

            ]


        });
    });
</script>