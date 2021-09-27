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
            <li><a href="ad_action_note.php">工作日誌</a></li>
            <li class="active">最新聯絡情形</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>工作日誌 - 最新聯絡情形 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p>
                        <a href="ad_action_note.php" class="btn btn-danger">工作項目列表</a>
                        <a href="ad_action_note_new.php" class="btn btn-warning">最新聯絡情形</a>

                    <form name="form1" method="post" action="?vst=full" class="form-inline" onsubmit="return chk_form()">
                        　聯絡時間：
                        <input type="text" name="d1" id="d1" class="datepicker" autocomplete="off"> 至 <input type="text" name="d2" id="d2" class="datepicker" autocomplete="off">
                        <select name="branch" id="branch" class="form-control">
                            <option value="">選擇會館</option>
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
                        <select name="wtype" id="wtype" class="form-control">
                            <option value="">工作類型</option>
                            <option value="會館事務">會館事務</option>
                            <option value="會員服務">會員服務</option>
                            <option value="廠商開發">廠商開發</option>
                            <option value="舉辦活動">舉辦活動</option>
                            <option value="活動推廣">活動推廣</option>
                            <option value="其他">其他</option>
                        </select>
                        <input type="submit" name="Submit" class="btn btn-default" value="送出">
                    </form>
                    </p>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=60>工作類型</th>
                            <th width=50>會館</th>
                            <th width=60>秘書</th>
                            <th>工作項目</th>
                            <th width=200>內容</th>
                            <th width=160>聯絡時間</th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center">會員服務</td>
                            <td align="center">八德</td>
                            <td align="center">柯婉儀</td>
                            <td align="left">◇公司上班◇<br>1.會員聯絡<br>2.相關表單維護<br>3.會員關懷<br>4.會館排約/排後關懷<br>5.會員交接-張威烈、陳宇朋</td>
                            <td align="center"></td>
                            <td align="center">2021-09-08 22:28</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11062','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">劉宜姍</td>
                            <td align="left">14:30~17:00訪談一男 自成交總額4萬 先付20000 再分2個月各10000尾款<br></td>
                            <td align="center"></td>
                            <td align="center">2021-09-08 21:02</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11061','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">其他</td>
                            <td align="center">高雄</td>
                            <td align="center">郭文旗</td>
                            <td align="left">搜尋 社群經營 收集名單 的行銷方法<br></td>
                            <td align="center"></td>
                            <td align="center">2021-09-08 21:01</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11060','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">于庭萱 LiLy</td>
                            <td align="left">公司上班<br>1:30-2:00陌call<br>2:00-3:00練習訪談<br>3:00-6:00dmn新舊名單<br>6:00-6:30吃飯<br>6:30-9:00dmn新舊名單<br><br>公司名單通數:76<br>邀約:3<br><br><br>追蹤今日訪客到訪狀態<br><br>外館明天未接訪客再提醒<br><br>舊名單持續聯絡中，已寄訊推播<br><br>瞭解前幾日因疫情未到，或已邀約未到之訪客原因，約視訊訪談時</td>
                            <td align="center"></td>
                            <td align="center">2021-09-08 21:00</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11059','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">杜佳臻 Macy</td>
                            <td align="left">公司上班<br>2:10-3:40 練攤卡<br>3:50-4:30 陌call<br>4:30-6:30 dmn舊名單<br>6:30-7:00 晚餐<br>7:00-9:00 dmn舊名單<br>邀約: 1 桃園<br></td>
                            <td align="center"></td>
                            <td align="center">2021-09-08 21:00</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11058','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">劉宜姍</td>
                            <td align="left">邀約:1女 9/10 </td>
                            <td align="center"></td>
                            <td align="center">2021-09-08 21:00</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11057','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">林嘉芮 芮芮</td>
                            <td align="left">DMN 83 CALL<br>陌call 1400-1430 <br>已邀1人</td>
                            <td align="center"></td>
                            <td align="center">2021-09-08 20:59</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11056','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">八德督導</td>
                            <td align="left">1.推(9/12文昭)線上課程<br>2.分發名單<br>3.活動處理(報名/取消)</td>
                            <td align="center"></td>
                            <td align="center">2021-09-08 19:32</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11055','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會員服務</td>
                            <td align="center">八德</td>
                            <td align="center">柯婉儀</td>
                            <td align="left">◇公司上班◇<br>1.會員聯絡<br>2.相關表單維護<br>3.會員關懷<br>4.會館排約/排後關懷<br></td>
                            <td align="center"></td>
                            <td align="center">2021-09-08 14:32</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11054','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">周靖雯 Bella</td>
                            <td align="left">邀約4<br><br>9/7(二)1:30~10:24</td>
                            <td align="center"></td>
                            <td align="center">2021-09-07 22:24</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11053','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">于庭萱 LiLy</td>
                            <td align="left">公司上班<br>1:30-2:00陌call<br>2:00-3:00上課<br>3:00-5:30dmn新舊名單<br>5:30-6:30吃飯<br>6:30-9:30dmn新舊名單<br><br>公司名單通數:77<br>邀約:2<br><br><br>追蹤今日訪客到訪狀態<br><br>外館明天未接訪客再提醒<br><br>舊名單持續聯絡中，已寄訊推播<br><br>瞭解前幾日因疫情未到，或已邀約未到之訪客原因，約視訊訪談時 </td>
                            <td align="center"></td>
                            <td align="center">2021-09-07 21:30</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11052','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">杜佳臻 Macy</td>
                            <td align="left">公司上班<br>2:00-2:10聽CALL<br>2:10-2:30 陌call<br>2:30-3:00上分期課<br>3:00-5:30dmn舊名單<br>5:40-6:10晚餐<br>6:10-9:00dmn舊名單<br>邀約:1<br></td>
                            <td align="center"></td>
                            <td align="center">2021-09-07 21:03</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11051','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會員服務</td>
                            <td align="center">約專</td>
                            <td align="center">珍珍</td>
                            <td align="left">1.排約<br>2.關懷<br>3.邀約經營<br>4.電訪</td>
                            <td align="center"></td>
                            <td align="center">2021-09-07 21:00</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11050','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">林嘉芮 芮芮</td>
                            <td align="left">DMN 77 CALL<br>陌call 1400-1430 1530-1600<br>已邀1人</td>
                            <td align="center"></td>
                            <td align="center">2021-09-07 20:59</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11049','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">柯素月 Joy</td>
                            <td align="left">打新名單 <br>打有到未參.已邀約未到..已邀約.重點經營名單<br>4邀約<br>9/16*1 9/12*1 9/10*1 9/20*1<br></td>
                            <td align="center"></td>
                            <td align="center">2021-09-07 20:59</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11048','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會員服務</td>
                            <td align="center">八德</td>
                            <td align="center">周靖雯 Bella</td>
                            <td align="left">線上成交1~39000<br>談訪1~4W<br>邀約1</td>
                            <td align="center"></td>
                            <td align="center">2021-09-07 14:24</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11047','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會員服務</td>
                            <td align="center">台北</td>
                            <td align="center">Ethan</td>
                            <td align="left">9/5：一對一穿搭改造諮詢*2</td>
                            <td align="center"></td>
                            <td align="center">2021-09-07 14:02</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11046','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">于庭萱 LiLy</td>
                            <td align="left">公司上班<br>1:30-2:00陌call<br>3:00-4:00dmn新舊名單<br>4:00-5:30dmn新舊名單<br>5:30-6:30接待訪客吃飯<br>6:30-9:08dmn新舊名單<br><br>公司名單通數:96<br>邀約:1<br><br><br>追蹤今日訪客到訪狀態<br><br>外館明天未接訪客再提醒<br><br>舊名單持續聯絡中，已寄訊推播<br><br>瞭解前幾日因疫情未到，或已邀約未到之訪客原因，約視訊訪談時</td>
                            <td align="center"></td>
                            <td align="center">2021-09-06 21:10</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11045','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">其他</td>
                            <td align="center">高雄</td>
                            <td align="center">郭文旗</td>
                            <td align="left">撰寫 憑實力單身 文章系列<br></td>
                            <td align="center"></td>
                            <td align="center">2021-09-06 21:01</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11044','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館事務</td>
                            <td align="center">八德</td>
                            <td align="center">杜佳臻 Macy</td>
                            <td align="left">公司上班<br>2:00-2:30聽call<br>3:00-5:00陌call<br>5:30-6:10晚餐<br>6:10-9:00 dmn舊名單<br>邀約: 0<br></td>
                            <td align="center"></td>
                            <td align="center">2021-09-06 20:56</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_action_note_new.php?st=del&an=11043','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_action_note_new.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_action_note_new.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_action_note_new.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_action_note_new.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_action_note_new.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_action_note_new.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_action_note_new.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_action_note_new.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_action_note_new.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_action_note_new.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_action_note_new.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_action_note_new.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_action_note_new.php?topage=1" selected>1</option>
                            <option value="/ad_action_note_new.php?topage=2">2</option>
                            <option value="/ad_action_note_new.php?topage=3">3</option>
                            <option value="/ad_action_note_new.php?topage=4">4</option>
                            <option value="/ad_action_note_new.php?topage=5">5</option>
                            <option value="/ad_action_note_new.php?topage=6">6</option>
                            <option value="/ad_action_note_new.php?topage=7">7</option>
                            <option value="/ad_action_note_new.php?topage=8">8</option>
                            <option value="/ad_action_note_new.php?topage=9">9</option>
                            <option value="/ad_action_note_new.php?topage=10">10</option>
                            <option value="/ad_action_note_new.php?topage=11">11</option>
                            <option value="/ad_action_note_new.php?topage=12">12</option>
                            <option value="/ad_action_note_new.php?topage=13">13</option>
                            <option value="/ad_action_note_new.php?topage=14">14</option>
                            <option value="/ad_action_note_new.php?topage=15">15</option>
                            <option value="/ad_action_note_new.php?topage=16">16</option>
                            <option value="/ad_action_note_new.php?topage=17">17</option>
                            <option value="/ad_action_note_new.php?topage=18">18</option>
                            <option value="/ad_action_note_new.php?topage=19">19</option>
                            <option value="/ad_action_note_new.php?topage=20">20</option>
                            <option value="/ad_action_note_new.php?topage=21">21</option>
                            <option value="/ad_action_note_new.php?topage=22">22</option>
                            <option value="/ad_action_note_new.php?topage=23">23</option>
                            <option value="/ad_action_note_new.php?topage=24">24</option>
                            <option value="/ad_action_note_new.php?topage=25">25</option>
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
    $mtu = "ad_action_note.";
    $(function() {

    });

    function chk_form() {
        if ($("d1").val() || $("d2").val()) {
            if (!$("d1").val() || !$("d2").val()) {
                alert("請選擇起始日期和結束日期。");
                return false;
            }
        }
        return true;
    }
</script>