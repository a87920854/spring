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
            <li class="active">秘書資料 - 在職</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>秘書資料 - 在職 - 數量：179</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <div class="btn-group pull-left">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                            <li><a href="ad_secretary.php?work=1"><i class="icon-resize-full"></i> 切換至離職區</a></li>

                            <li><a href="ad_secretary_fix.php"><i class="icon-edit"></i> 新增秘書資料</a></li>
                        </ul>
                    </div>

                    <form name="form1" method="post" action="ad_secretary.php" class="form-inline">
                        　會館：
                        <select name="p_branch" id="p_branch" style="width:100px;">
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
                        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="身分證字號 / 姓名 / 編號">

                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>照片</th>
                            <th>會館</th>
                            <th>姓名</th>
                            <th>別名</th>
                            <th>帳號</th>
                            <th>密碼</th>
                            <th>職務</th>
                            <th>等級</th>
                            <th></th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center">359</td>
                            <td align="center">無</td>
                            <td align="center">台北
                            </td>
                            <td align="center">台北督導
                            </td>
                            <td align="center">台北督導</td>
                            <td align="center">89867482</td>
                            <td align="center">tywey489647</td>
                            <td align="center">督導</td>
                            <td align="center">會館督導</td>
                            <td align="center">在職</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_secretary_photo.php?p_auto=359"><i class="icon-camera"></i> 照片</a></li>

                                        <li><a href="ad_secretary_fix.php?p_auto=359"><i class="icon-edit"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_secretary.php?st=del&p_auto=359','','width=300,height=200,top=100,left=100')"><i class="icon-ban-circle"></i> 關閉</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_secretary.php?st=fulldel&p_auto=359','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 永久刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">360</td>
                            <td align="center">無</td>
                            <td align="center">桃園
                            </td>
                            <td align="center">桃園督導
                            </td>
                            <td align="center">桃園會館</td>
                            <td align="center">79980443</td>
                            <td align="center">79980</td>
                            <td align="center">督導</td>
                            <td align="center">會館督導</td>
                            <td align="center">在職</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_secretary_photo.php?p_auto=360"><i class="icon-camera"></i> 照片</a></li>

                                        <li><a href="ad_secretary_fix.php?p_auto=360"><i class="icon-edit"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_secretary.php?st=del&p_auto=360','','width=300,height=200,top=100,left=100')"><i class="icon-ban-circle"></i> 關閉</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_secretary.php?st=fulldel&p_auto=360','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 永久刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="text-center">共 179 筆、第 1 頁／共 9 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_secretary.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_secretary.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_secretary.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_secretary.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_secretary.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_secretary.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_secretary.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_secretary.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_secretary.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_secretary.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_secretary.php?topage=9 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_secretary.php?topage=1" selected>1</option>
                            <option value="/ad_secretary.php?topage=2">2</option>
                            <option value="/ad_secretary.php?topage=3">3</option>
                            <option value="/ad_secretary.php?topage=4">4</option>
                            <option value="/ad_secretary.php?topage=5">5</option>
                            <option value="/ad_secretary.php?topage=6">6</option>
                            <option value="/ad_secretary.php?topage=7">7</option>
                            <option value="/ad_secretary.php?topage=8">8</option>
                            <option value="/ad_secretary.php?topage=9">9</option>
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
require_once("./include/_bottom.php")
?>