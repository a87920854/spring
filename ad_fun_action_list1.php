<?php
// require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">好好玩國內團控</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩國內團控 - 數量：500　<a href="?vst=full&s99=">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <a href="ad_fun_action_list1_add.php" class="btn btn-info"><i class="icon-plus-sign"></i> 新增國內活動</a>
                    <a href="ad_fun_action_list1_print.php?acre_sign1=&acre_sign2=" class="btn btn-info"><i class="icon-plus-sign"></i> 列印本頁</a>


                    <form id="searchform" action="ad_fun_action_list1.php?vst=full" method="post" target="_self" class="form-inline" onsubmit="return check_send_submit()">
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <tr>
                                <td><select name="s1">
                                        <option value="">活動類型</option>
                                        <option value="戶外活動">戶外活動</option>
                                        <option value="主題派對">主題派對</option>
                                        <option value="午茶聯誼">午茶聯誼</option>
                                        <option value="特別企劃">特別企劃</option>
                                    </select>
                                    &nbsp;&nbsp;
                                    <select name="s5">
                                        <option value="">開發者</option>
                                        <option value="13085797">好好玩</option>
                                        <option value="A129483299">黃子豪</option>
                                        <option value="a76182572003">jens wang</option>
                                        <option value="COOPER.WU">吳哈克</option>
                                        <option value="D120674564">安東尼</option>
                                        <option value="d122765148">杜乙兒</option>
                                        <option value="f127065118">王建維</option>
                                        <option value="Grisha">葛莉莎</option>
                                        <option value="H123898293">史丹利</option>
                                        <option value="hannah0807">曉娟</option>
                                        <option value="J122099279">阿綸</option>
                                        <option value="jackal6043">小傑</option>
                                        <option value="O100348849">甄韋翔</option>
                                        <option value="O200289687">賴怡安</option>
                                        <option value="ryanhu0204">Ryan</option>
                                        <option value="sheery03130513">點點</option>
                                        <option value="surfertony2001"> TONY</option>
                                        <option value="T123827391">阿樂</option>
                                        <option value="T124166182">郭文旗</option>
                                        <option value="teddy0825">小熊</option>
                                        <option value="V221540975">若忻</option>
                                    </select>
                                </td>
                                <td>活動時間：<input name="s21" id="s21" type="text" class="datepicker" autocomplete="off">～<input name="s22" id="s22" type="text" class="datepicker" autocomplete="off"></td>
                                <td>活動標題：<input name="s3" type="text" class="form-control"></td>
                                <td><input type="submit" value="搜尋" class="btn btn-default"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th width=180>活動時間</th>
                            <th width=70>活動類型</th>
                            <th width=70>活動地點</th>
                            <th width=300>活動標題</th>
                            <th></th>
                            <th width=40>花絮</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="center">3059</td>
                            <td class="center"><a href="webfile/funtour/upload_image/202182215515_action_684.jpg" class="fancybox"><img src="webfile/funtour/upload_image/202182215515_action_684.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/11/20 上午 10:00:00</td>
                            <td class="center">戶外踏青</td>
                            <td class="center">桃園市</td>
                            <td class="center">桃源仙谷遇見愛｜遊賞花田+祕境探索+烤肉饗宴+拍照任務【無法成團將不另行通知】</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：桃園阿綸　執行者：桃園阿綸</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3059">男：正取 2/備取 0 人、女：正取 0/備取 0 人、共：2 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3059" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3059"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3059" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3059"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3059','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3058</td>
                            <td class="center"><a href="webfile/funtour/upload_image/2021822151045_action_688.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2021822151045_action_688.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/11/7 上午 08:00:00</td>
                            <td class="center">戶外踏青</td>
                            <td class="center">新北市</td>
                            <td class="center">三峽傳藝輕旅｜藍染手作+客家擂茶體驗+童玩競賽+美食任務【無法成團將不另行通知】</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：桃園阿綸　執行者：桃園阿綸</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3058">男：正取 2/備取 0 人、女：正取 0/備取 0 人、共：2 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3058" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3058"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3058" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3058"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3058','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3051</td>
                            <td class="center"><a href="webfile/funtour/upload_image/2021814163023_action_711.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2021814163023_action_711.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/11/6 上午 08:30:00</td>
                            <td class="center">戶外踏青</td>
                            <td class="center">新竹縣</td>
                            <td class="center">竹語茶蘆控窯趣｜古農具導覽+團體控窯+草編DIY+擂茶DIY【無法成團將不另行通知】</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：桃園阿綸　執行者：桃園阿綸</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3051">男：正取 4/備取 0 人、女：正取 2/備取 0 人、共：6 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3051" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3051"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3051" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3051"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3051','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3055</td>
                            <td class="center"><a href="webfile/funtour/upload_image/20218221355_action_752.jpeg" class="fancybox"><img src="webfile/funtour/upload_image/20218221355_action_752.jpeg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/10/24 上午 09:00:00</td>
                            <td class="center">戶外踏青</td>
                            <td class="center">新北市</td>
                            <td class="center">北海岸踏浪趣｜探索金沙灣秘境＋超夯IG打卡熱點＋懷舊鐵路便當＋海灘分組遊戲【無法成團將不另行通知】</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：桃園阿綸　執行者：桃園阿綸</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3055">男：正取 7/備取 0 人、女：正取 0/備取 0 人、共：7 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3055" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3055"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3055" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3055"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3055','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3053</td>
                            <td class="center"><a href="webfile/funtour/upload_image/202182212233_action_142.jpg" class="fancybox"><img src="webfile/funtour/upload_image/202182212233_action_142.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/10/17 上午 08:30:00</td>
                            <td class="center">戶外踏青</td>
                            <td class="center">宜蘭縣</td>
                            <td class="center">宜蘭療癒輕旅行｜小動物餵食+DIY窯烤披薩+幸福手做禮+擠羊奶體驗【無法成團將不另行通知】</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：桃園阿綸　執行者：桃園阿綸</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3053">男：正取 5/備取 0 人、女：正取 3/備取 0 人、共：8 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3053" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3053"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3053" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3053"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3053','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3056</td>
                            <td class="center"><a href="webfile/funtour/upload_image/2021822133221_action_3.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2021822133221_action_3.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/10/3 下午 02:00:00</td>
                            <td class="center">午茶約會</td>
                            <td class="center">高雄市</td>
                            <td class="center">下午茶聯誼派對｜網美之旅+拍照任務【無法成團將不另行通知】</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：桃園阿綸　執行者：桃園阿綸</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3056">男：正取 4/備取 0 人、女：正取 0/備取 0 人、共：4 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3056" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3056"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3056" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3056"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3056','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3054</td>
                            <td class="center"><a href="webfile/funtour/upload_image/2021822125930_action_78.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2021822125930_action_78.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/10/2 下午 02:00:00</td>
                            <td class="center">午茶約會</td>
                            <td class="center">彰化縣</td>
                            <td class="center">野餐派對｜網美必拍+精緻美食+桌遊Party Game+互動遊戲【無法成團將不另行通知】</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：桃園阿綸　執行者：桃園阿綸</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3054">男：正取 2/備取 0 人、女：正取 0/備取 0 人、共：2 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3054" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3054"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3054" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3054"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3054','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3057</td>
                            <td class="center"><a href="webfile/funtour/upload_image/2021822134910_action_110.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2021822134910_action_110.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/9/25 下午 02:00:00</td>
                            <td class="center">主題系列</td>
                            <td class="center">高雄市</td>
                            <td class="center">歡樂休閒｜密室逃脫＋下午茶 🌟【無法成團將不另行通知】</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：桃園阿綸　執行者：桃園阿綸</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3057">男：正取 1/備取 0 人、女：正取 0/備取 0 人、共：1 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3057" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3057"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3057" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3057"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3057','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3049</td>
                            <td class="center"><a href="webfile/funtour/upload_image/202184142436_action_243.jpg" class="fancybox"><img src="webfile/funtour/upload_image/202184142436_action_243.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/9/25 下午 02:00:00</td>
                            <td class="center">午茶約會</td>
                            <td class="center">台北市</td>
                            <td class="center">愛×邂逅(7年級下午茶台北場)【無法成團將不另行通知】</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：桃園阿綸　執行者：桃園阿綸</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3049">男：正取 6/備取 0 人、女：正取 0/備取 0 人、共：6 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3049" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3049"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3049" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3049"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3049','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3052</td>
                            <td class="center"><a href="webfile/funtour/upload_image/2021814172728_action_229.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2021814172728_action_229.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/9/19 上午 10:00:00</td>
                            <td class="center">主題系列</td>
                            <td class="center">桃園市</td>
                            <td class="center">「粉」想見你 ‧｜玫瑰甜蜜烘焙派對【無法成團將不另行通知】</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：桃園阿綸　執行者：桃園阿綸</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3052">男：正取 2/備取 0 人、女：正取 0/備取 0 人、共：2 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3052" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3052"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3052" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3052"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3052','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3050</td>
                            <td class="center"><a href="webfile/funtour/upload_image/20218414407_action_14.jpg" class="fancybox"><img src="webfile/funtour/upload_image/20218414407_action_14.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/9/18 下午 02:00:00</td>
                            <td class="center">午茶約會</td>
                            <td class="center">台北市</td>
                            <td class="center">愛×萌芽(8年級下午茶台北場)【無法成團將不另行通知】</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：桃園阿綸　執行者：桃園阿綸</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3050">男：正取 3/備取 0 人、女：正取 1/備取 0 人、共：4 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3050" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3050"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3050" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3050"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3050','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3048</td>
                            <td class="center"><a href="webfile/funtour/upload_image/20218414413_action_65.jpg" class="fancybox"><img src="webfile/funtour/upload_image/20218414413_action_65.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/9/11 下午 02:00:00</td>
                            <td class="center">熟齡專區</td>
                            <td class="center">台北市</td>
                            <td class="center">愛×熟成(6年級下午茶台北場)【無法成團將不另行通知】</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：桃園阿綸　執行者：桃園阿綸</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3048">男：正取 4/備取 0 人、女：正取 2/備取 0 人、共：6 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3048" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3048"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3048" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3048"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3048','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3047</td>
                            <td class="center"><a href="webfile/funtour/upload_image/202178254_action_830.jpeg" class="fancybox"><img src="webfile/funtour/upload_image/202178254_action_830.jpeg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/8/14 下午 05:00:00</td>
                            <td class="center">主題系列</td>
                            <td class="center">台北市</td>
                            <td class="center">七夕遊艇特企｜夢幻微醺調酒＋專業超嗨DJ＋超閃亮耀眼戰袍</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：好好玩旅行社若忻　執行者：好好玩旅行社若忻</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3047">男：正取 2/備取 0 人、女：正取 0/備取 0 人、共：2 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3047" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3047"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3047" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3047"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3047','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3045</td>
                            <td class="center"><a href="webfile/funtour/upload_image/20217814314_action_766.jpg" class="fancybox"><img src="webfile/funtour/upload_image/20217814314_action_766.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/8/8 下午 01:00:00</td>
                            <td class="center">主題系列</td>
                            <td class="center">台北市</td>
                            <td class="center">大稻埕祈福半日遊｜霞海月老求姻緣＋騎行夕陽河畔＋戶外下午茶約會</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：好好玩旅行社若忻　執行者：好好玩旅行社若忻</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3045">男：正取 1/備取 0 人、女：正取 0/備取 0 人、共：1 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3045" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3045"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3045" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3045"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3045','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3044</td>
                            <td class="center"><a href="webfile/funtour/upload_image/20217812920_action_668.jpeg" class="fancybox"><img src="webfile/funtour/upload_image/20217812920_action_668.jpeg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/8/7 下午 02:00:00</td>
                            <td class="center">熟齡專區</td>
                            <td class="center">台北市</td>
                            <td class="center">熟齡愛戀約會｜55-65優質三高穩重男</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：好好玩旅行社若忻　執行者：好好玩旅行社若忻</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3044">男：正取 0/備取 0 人、女：正取 1/備取 0 人、共：1 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3044" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3044"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3044" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3044"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3044','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3043</td>
                            <td class="center"><a href="webfile/funtour/upload_image/20217812016_action_285.jpg" class="fancybox"><img src="webfile/funtour/upload_image/20217812016_action_285.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/8/1 下午 01:00:00</td>
                            <td class="center">小資首選</td>
                            <td class="center">桃園市</td>
                            <td class="center">日系午茶Dating｜療癒浮游花DIY+日式甜點套餐＋愛戀換桌約會</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：好好玩旅行社若忻　執行者：好好玩旅行社若忻</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3043">男：正取 1/備取 0 人、女：正取 1/備取 0 人、共：2 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3043" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3043"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3043" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3043"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3043','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3042</td>
                            <td class="center"><a href="webfile/funtour/upload_image/2021781034_action_592.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2021781034_action_592.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/7/31 上午 08:00:00</td>
                            <td class="center">戶外踏青</td>
                            <td class="center">南投縣</td>
                            <td class="center">脫單率超高爆團｜超靈驗月老祈福＋品嚐伊達邵美食＋日月潭風光遊湖</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：好好玩旅行社若忻　執行者：好好玩旅行社若忻</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3042">男：正取 1/備取 0 人、女：正取 3/備取 0 人、共：4 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3042" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3042"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3042" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3042"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3042','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3041</td>
                            <td class="center"><a href="webfile/funtour/upload_image/20217804651_action_23.jpeg" class="fancybox"><img src="webfile/funtour/upload_image/20217804651_action_23.jpeg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/7/25 下午 02:00:00</td>
                            <td class="center">午茶約會</td>
                            <td class="center">台北市</td>
                            <td class="center">微醺cheers派對｜68-78優質三高男</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：好好玩旅行社若忻　執行者：好好玩旅行社若忻</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3041">男：正取 0/備取 0 人、女：正取 1/備取 0 人、共：1 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3041" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3041"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3041" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3041"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3041','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3040</td>
                            <td class="center"><a href="webfile/funtour/upload_image/20217801935_action_570.jpg" class="fancybox"><img src="webfile/funtour/upload_image/20217801935_action_570.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/7/24 上午 09:00:00</td>
                            <td class="center">戶外踏青</td>
                            <td class="center">桃園市</td>
                            <td class="center">桃園IG私房秘境｜零距離親餵小鹿+超萌斑比DIY小物+漫步向日葵迷宮</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：好好玩旅行社若忻　執行者：好好玩旅行社若忻</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3040">男：正取 0/備取 0 人、女：正取 1/備取 0 人、共：1 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3040" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3040"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3040" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3040"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3040','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">3039</td>
                            <td class="center"><a href="webfile/funtour/upload_image/2021780036_action_947.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2021780036_action_947.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021/7/18 下午 01:00:00</td>
                            <td class="center">主題系列</td>
                            <td class="center">桃園市</td>
                            <td class="center">烘焙DIY派對｜戀夏甜蜜愛情果</td>
                            <td class="center">
                                <font color="blue">來源：推薦　開發者：好好玩旅行社若忻　執行者：好好玩旅行社若忻</font>

                                <br><br><a href="ad_fun_action_list_singup1.php?ac=3039">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td class="center">無</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="http://funtour.com.tw/eventdetail.php?id=3039" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_fun_action_list_singup1.php?ac=3039"><i class="icon-file"></i> 報名資料</a></li>

                                        <li><a href="ad_fun_action_pic.php?ac_auto=3039" target="_blank"><i class="icon-file"></i> 上傳花絮</a></li>
                                        <li><a href="ad_fun_action_list1_add.php?ac=3039"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list1.php?st=del&ac=3039','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_fun_action_list1.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_fun_action_list1.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_fun_action_list1.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_fun_action_list1.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_fun_action_list1.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_fun_action_list1.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_fun_action_list1.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_fun_action_list1.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_fun_action_list1.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_fun_action_list1.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_fun_action_list1.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_fun_action_list1.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_fun_action_list1.php?topage=1" selected>1</option>
                            <option value="/ad_fun_action_list1.php?topage=2">2</option>
                            <option value="/ad_fun_action_list1.php?topage=3">3</option>
                            <option value="/ad_fun_action_list1.php?topage=4">4</option>
                            <option value="/ad_fun_action_list1.php?topage=5">5</option>
                            <option value="/ad_fun_action_list1.php?topage=6">6</option>
                            <option value="/ad_fun_action_list1.php?topage=7">7</option>
                            <option value="/ad_fun_action_list1.php?topage=8">8</option>
                            <option value="/ad_fun_action_list1.php?topage=9">9</option>
                            <option value="/ad_fun_action_list1.php?topage=10">10</option>
                            <option value="/ad_fun_action_list1.php?topage=11">11</option>
                            <option value="/ad_fun_action_list1.php?topage=12">12</option>
                            <option value="/ad_fun_action_list1.php?topage=13">13</option>
                            <option value="/ad_fun_action_list1.php?topage=14">14</option>
                            <option value="/ad_fun_action_list1.php?topage=15">15</option>
                            <option value="/ad_fun_action_list1.php?topage=16">16</option>
                            <option value="/ad_fun_action_list1.php?topage=17">17</option>
                            <option value="/ad_fun_action_list1.php?topage=18">18</option>
                            <option value="/ad_fun_action_list1.php?topage=19">19</option>
                            <option value="/ad_fun_action_list1.php?topage=20">20</option>
                            <option value="/ad_fun_action_list1.php?topage=21">21</option>
                            <option value="/ad_fun_action_list1.php?topage=22">22</option>
                            <option value="/ad_fun_action_list1.php?topage=23">23</option>
                            <option value="/ad_fun_action_list1.php?topage=24">24</option>
                            <option value="/ad_fun_action_list1.php?topage=25">25</option>
                        </select></li>
                </ul>
            </div>

        </div>
        <!--/span-->

    </div>
    <!--/row-->


    <hr>
    </div>
    <!--/.fluid-container-->
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">好好玩證件審核</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩證件審核</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                    <tbody>
                        <tr>
                            <td>10005268</td>
                            <td>吳憲育</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10005268">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10005945</td>
                            <td>許博鈞</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10005945">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10006225</td>
                            <td>吳念誠</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10006225">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10006900</td>
                            <td>陳冠仰</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10006900">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10003373</td>
                            <td>陳冠豪</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10003373">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10003605</td>
                            <td>吳柏成</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10003605">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10003649</td>
                            <td>邱垂凱</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10003649">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10003739</td>
                            <td>謝宗穎</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10003739">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10003754</td>
                            <td>曾泓凱</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10003754">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10003885</td>
                            <td>林玫芳</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10003885">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10004061</td>
                            <td>王宜川</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10004061">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10004470</td>
                            <td>高雅瑩</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10004470">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10007022</td>
                            <td>鄭永忠</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10007022">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10007377</td>
                            <td>邱梓鴻</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10007377">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10007435</td>
                            <td>江明哲</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10007435">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10007533</td>
                            <td>吳永威</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10007533">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10007674</td>
                            <td>何兆康</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10007674">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10007741</td>
                            <td>劉澔翰</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10007741">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10007922</td>
                            <td>陳旭光</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10007922">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10007991</td>
                            <td>周信興</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10007991">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008038</td>
                            <td>陳以臻</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008038">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008239</td>
                            <td>陳秀琴</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008239">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008260</td>
                            <td>郭婉如</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008260">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008276</td>
                            <td>張凱綸</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008276">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008289</td>
                            <td>李昕峰</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008289">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008356</td>
                            <td>王翠華</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008356">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008360</td>
                            <td>洪宗民</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008360">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008418</td>
                            <td>李浩璋</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008418">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008419</td>
                            <td>何國睿</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008419">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008435</td>
                            <td>林采蒂</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008435">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008509</td>
                            <td>江雅鎮</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008509">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008528</td>
                            <td>陳菁秀</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008528">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008555</td>
                            <td>劉宇善</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008555">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008596</td>
                            <td>何成崑</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008596">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008619</td>
                            <td>林宗成</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008619">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008621</td>
                            <td>林聖儒</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008621">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008634</td>
                            <td>來子玠</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008634">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008647</td>
                            <td>test點</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008647">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008650</td>
                            <td>蘇紫婕</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008650">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008653</td>
                            <td>魏崢</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008653">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008656</td>
                            <td>林士傑</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008656">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008661</td>
                            <td>陳元吉</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008661">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008662</td>
                            <td>李孟浩</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008662">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008663</td>
                            <td>黃恩馨</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008663">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008665</td>
                            <td>鍾念庭</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008665">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008666</td>
                            <td>陳昭米</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008666">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008668</td>
                            <td>陳韋佑</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008668">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008669</td>
                            <td>呂宗翰</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008669">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008672</td>
                            <td>李佳婷</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008672">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008674</td>
                            <td>郭晏綾</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008674">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008675</td>
                            <td>楊雅珮</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008675">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008676</td>
                            <td>黃家珍</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008676">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008678</td>
                            <td>張貴鈞</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008678">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008684</td>
                            <td>游順賢</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008684">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008688</td>
                            <td>汪姿佑</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008688">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008689</td>
                            <td>游智安</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008689">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008691</td>
                            <td>張詠翔</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008691">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008692</td>
                            <td>楊家麟</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008692">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008694</td>
                            <td>徐書亞</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008694">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008698</td>
                            <td>張佳惠</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008698">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008705</td>
                            <td>陳宥澄</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008705">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008711</td>
                            <td>廖雁蘿</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008711">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008712</td>
                            <td>陳佩伶</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008712">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008717</td>
                            <td>張軍暉</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008717">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008725</td>
                            <td>蔡伯政</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008725">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008726</td>
                            <td>廖冠翔</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008726">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008727</td>
                            <td>陳又瑛</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008727">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008732</td>
                            <td>張小珊</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008732">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008733</td>
                            <td>施位勳</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008733">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008734</td>
                            <td>徐文軒</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008734">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008735</td>
                            <td>楊嘉靜</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008735">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008736</td>
                            <td>吳思瑩</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008736">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008737</td>
                            <td>汪聖閔</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008737">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008738</td>
                            <td>許耀宗</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008738">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008741</td>
                            <td>林聖賢</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008741">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008742</td>
                            <td>張裴茹</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008742">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008748</td>
                            <td>李志明</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008748">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008749</td>
                            <td>test</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008749">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008752</td>
                            <td>李小姐</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008752">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008756</td>
                            <td>&#20931;潔穎</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008756">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008758</td>
                            <td>夏元屏</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008758">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008762</td>
                            <td>呂學洋</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008762">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008763</td>
                            <td>陳克鋼</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008763">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008764</td>
                            <td>陳乙溎</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008764">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008766</td>
                            <td>鄭淳玲</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008766">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008769</td>
                            <td>郭員輔</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008769">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008770</td>
                            <td>范綱傑</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008770">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008771</td>
                            <td>郭德翎</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008771">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008772</td>
                            <td>藍澎暉</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008772">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008774</td>
                            <td>陶志強</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008774">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008776</td>
                            <td>葉姝彣</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008776">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008777</td>
                            <td>方健彥</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008777">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008783</td>
                            <td>郭玉雯</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008783">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008784</td>
                            <td>曾力瑋</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008784">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008785</td>
                            <td>黃佳進</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008785">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008786</td>
                            <td>黃宥儒</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008786">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008787</td>
                            <td>江佳璟</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008787">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008788</td>
                            <td>劉珈毓</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008788">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008789</td>
                            <td>劉雅雯</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008789">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008791</td>
                            <td>李杰凡</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008791">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008796</td>
                            <td>林建凱</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008796">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008797</td>
                            <td>高峻瑋</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008797">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008798</td>
                            <td>周俊廷</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008798">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008800</td>
                            <td>江瑭翊</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008800">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008801</td>
                            <td>黃建雄</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008801">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008803</td>
                            <td>劉荷碧</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008803">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008804</td>
                            <td>吳冠霖</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008804">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008808</td>
                            <td>童郁庭</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008808">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008809</td>
                            <td>潘志煌</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008809">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008810</td>
                            <td>梁為廣</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008810">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008811</td>
                            <td>翁琢鈞</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008811">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008812</td>
                            <td>陳逸蓉</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008812">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008815</td>
                            <td>林純巧</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008815">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008818</td>
                            <td>施閎仁</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008818">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008822</td>
                            <td>徐麗雯</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008822">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008823</td>
                            <td>李瓊紋</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008823">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008825</td>
                            <td>陳毓彬</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008825">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008827</td>
                            <td>吳宜澤</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008827">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008828</td>
                            <td>楊恩慈</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008828">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008829</td>
                            <td>郭品函</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008829">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008830</td>
                            <td>廖本凱</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008830">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008831</td>
                            <td>許瑞宇</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008831">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008832</td>
                            <td>陳俞文</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008832">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008833</td>
                            <td>葉宗霖</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008833">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008838</td>
                            <td>黃致涵</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008838">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008839</td>
                            <td>黃顯棟</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008839">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008842</td>
                            <td>薛福禧</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008842">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008843</td>
                            <td>陳嘉妤</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008843">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008844</td>
                            <td>李威辰</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008844">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008845</td>
                            <td>陳炳樺</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008845">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008846</td>
                            <td>歐順強</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008846">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008847</td>
                            <td>張煜昇</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008847">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008850</td>
                            <td>方士明</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008850">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008854</td>
                            <td>陸培民</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008854">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008857</td>
                            <td>江韋興</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008857">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008860</td>
                            <td>劉佳欣</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008860">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008861</td>
                            <td>趙偉志</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008861">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008862</td>
                            <td>楊雅菁</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008862">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008864</td>
                            <td>郭乃瑜</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008864">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008866</td>
                            <td>廖南姿</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008866">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008868</td>
                            <td>林德仁</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008868">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008870</td>
                            <td>呂學齡</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008870">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008872</td>
                            <td>周育鼎</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008872">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008875</td>
                            <td>林郁瑾</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008875">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008877</td>
                            <td>李庭瑋</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008877">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008881</td>
                            <td>鄭賀元</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008881">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008882</td>
                            <td>曾瑞瑜</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008882">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008883</td>
                            <td>許舜迪</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008883">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008884</td>
                            <td>張凱舜</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008884">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008890</td>
                            <td>張銘倫</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008890">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008892</td>
                            <td>陳佳君</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008892">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008894</td>
                            <td>沈浩崴</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008894">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008895</td>
                            <td>連健期</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008895">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008896</td>
                            <td>陳柏戎</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008896">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008897</td>
                            <td>張玉薇</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008897">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008898</td>
                            <td>曾文琦</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008898">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008899</td>
                            <td>林宏信</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008899">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008900</td>
                            <td>蔡明澤</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008900">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008901</td>
                            <td>王偉益</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008901">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008902</td>
                            <td>陳憲緯</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008902">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008903</td>
                            <td>張惇淳</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008903">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008904</td>
                            <td>蕭冠俞</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008904">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008906</td>
                            <td>唐文一</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008906">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008907</td>
                            <td>張繼元</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008907">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008908</td>
                            <td>黃聖昌</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008908">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008909</td>
                            <td>劉憲宇</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008909">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008910</td>
                            <td>鍾政賢</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008910">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008912</td>
                            <td>曾建中</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008912">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008913</td>
                            <td>林敬淳</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008913">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008914</td>
                            <td>陳唐羽</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008914">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008915</td>
                            <td>黃敬傑</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008915">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008916</td>
                            <td>楊政蒼</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008916">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008917</td>
                            <td>朱炎鍇</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008917">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008918</td>
                            <td>張吉東</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008918">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008919</td>
                            <td>余大任</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008919">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008920</td>
                            <td>王鼎棋</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008920">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008921</td>
                            <td>蔡凱宇</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008921">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008922</td>
                            <td>鄭暐霖</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008922">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008925</td>
                            <td>廖健傑</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008925">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008926</td>
                            <td>古博安</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008926">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008928</td>
                            <td>楊明翰</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008928">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008929</td>
                            <td>張智謙</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008929">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008931</td>
                            <td>黃令祺</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008931">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008932</td>
                            <td>許書涵</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008932">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008934</td>
                            <td>李存盛</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008934">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008936</td>
                            <td>林韋廷</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008936">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008937</td>
                            <td>蔡宏懋</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008937">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008938</td>
                            <td>李佑軒</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008938">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008940</td>
                            <td>張以琳</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008940">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008941</td>
                            <td>謝艾樺</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008941">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008942</td>
                            <td>鍾芳妤</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008942">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008943</td>
                            <td>劉毅恩</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008943">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008944</td>
                            <td>張恩慈</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008944">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008945</td>
                            <td>蕭子耘</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008945">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008946</td>
                            <td>許時瑞</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008946">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008947</td>
                            <td>林駿梃</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008947">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008948</td>
                            <td>黃智煜</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008948">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008949</td>
                            <td>陳震濃</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008949">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008950</td>
                            <td>楊宗憲</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008950">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008952</td>
                            <td>張舒雅</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008952">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008953</td>
                            <td>廖華田</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008953">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008955</td>
                            <td>傅介賢</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008955">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008956</td>
                            <td>吳佳翰</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008956">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008957</td>
                            <td>陳智銘</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008957">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008959</td>
                            <td>彭康強</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008959">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008960</td>
                            <td>王源鈐</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008960">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008961</td>
                            <td>楊志仁</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008961">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008963</td>
                            <td>謝治均</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008963">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008965</td>
                            <td>林振勤</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008965">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008967</td>
                            <td>張博超</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008967">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008969</td>
                            <td>許俊鎧</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008969">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008970</td>
                            <td>吳尚叡</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008970">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008971</td>
                            <td>王如溱</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008971">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008972</td>
                            <td>黃得軒</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008972">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008974</td>
                            <td>潘少華</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008974">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008975</td>
                            <td>張朝博</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008975">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008976</td>
                            <td>藍勻薇</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008976">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008977</td>
                            <td>林伯謙</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008977">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008978</td>
                            <td>陳燦杰</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008978">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008979</td>
                            <td>王念慈</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008979">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008992</td>
                            <td>鄭鴻暉</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008992">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008996</td>
                            <td>陳逸舟</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008996">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008997</td>
                            <td>邱婷琳</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008997">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10008998</td>
                            <td>陳怡萍</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10008998">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009000</td>
                            <td>王鈺翔</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009000">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009001</td>
                            <td>陳易聖</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009001">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009002</td>
                            <td>吳惠鈺</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009002">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009003</td>
                            <td>蕭新興</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009003">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009004</td>
                            <td>柯仲鴻</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009004">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009008</td>
                            <td>賴巧原</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009008">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009009</td>
                            <td>吳健民</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009009">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009010</td>
                            <td>謝承志</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009010">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009012</td>
                            <td>劉威煜</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009012">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009014</td>
                            <td>楊竣富</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009014">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009015</td>
                            <td>洪敏哲</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009015">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009016</td>
                            <td>洪敏峰</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009016">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009018</td>
                            <td>郭亮廷</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009018">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009019</td>
                            <td>蔡詠聖</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009019">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009023</td>
                            <td>邱垂文</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009023">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009025</td>
                            <td>游振暉</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009025">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009026</td>
                            <td>黃建雄</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009026">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009027</td>
                            <td>康鎧麟</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009027">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009029</td>
                            <td>歐政勳</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009029">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009030</td>
                            <td>曾志欽</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009030">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009032</td>
                            <td>盧永宸</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009032">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009033</td>
                            <td>李國瑞</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009033">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009034</td>
                            <td>楊喬仁</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009034">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009035</td>
                            <td>陳樹河</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009035">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009036</td>
                            <td>黃柏偉</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009036">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009037</td>
                            <td>許豪益</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009037">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009038</td>
                            <td>林國輝</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009038">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009039</td>
                            <td>謝宛蓉</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009039">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009040</td>
                            <td>范睿婷</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009040">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009041</td>
                            <td>林東燦</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009041">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009042</td>
                            <td>曾瑋琳</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009042">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009043</td>
                            <td>游巧筠</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009043">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009044</td>
                            <td>李朝翔</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009044">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009045</td>
                            <td>藍偉寧</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009045">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009046</td>
                            <td>高薏涵</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009046">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009047</td>
                            <td>林宗毅</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009047">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009048</td>
                            <td>連珮詩</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009048">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009049</td>
                            <td>周群翊</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009049">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009050</td>
                            <td>湯硯智</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009050">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009053</td>
                            <td>陳育聖</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009053">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009054</td>
                            <td>鄒易軒</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009054">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009056</td>
                            <td>廖儀蓁</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009056">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009057</td>
                            <td>林瑋</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009057">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009058</td>
                            <td>江元迪</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009058">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009059</td>
                            <td>林奕甫</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009059">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009060</td>
                            <td>呂紹志</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009060">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009061</td>
                            <td>翁鈺淳</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009061">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009062</td>
                            <td>陳盈盈</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009062">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009063</td>
                            <td>張立財</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009063">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009064</td>
                            <td>林佳宜</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009064">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009065</td>
                            <td>吳隆軒</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009065">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009066</td>
                            <td>李亞倫</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009066">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009067</td>
                            <td>趙威行</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009067">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009068</td>
                            <td>高誌佃</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009068">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009069</td>
                            <td>劉宇哲</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009069">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009070</td>
                            <td>李鎮宇</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009070">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009072</td>
                            <td>王志丞</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009072">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009073</td>
                            <td>陳希棟</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009073">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009074</td>
                            <td>簡意紋</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009074">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009076</td>
                            <td>吳青樺</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009076">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009077</td>
                            <td>黃聖淯</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009077">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009079</td>
                            <td>陳奕滄</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009079">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009080</td>
                            <td>詹歆梅</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009080">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009081</td>
                            <td>曾馨誼</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009081">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009082</td>
                            <td>林良維</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009082">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009083</td>
                            <td>吳蕙聿</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009083">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009084</td>
                            <td>吳亞函</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009084">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009085</td>
                            <td>張意慧</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009085">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009086</td>
                            <td>蕭一鵬</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009086">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009088</td>
                            <td>梁學寬</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009088">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009090</td>
                            <td>盧俊安</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009090">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009092</td>
                            <td>吳沛恩</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009092">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009093</td>
                            <td>鍾欣儒</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009093">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009096</td>
                            <td>洪裕晴</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009096">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009099</td>
                            <td>張惟容</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009099">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009101</td>
                            <td>胡訓豪</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009101">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009103</td>
                            <td>陳一忠</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009103">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009104</td>
                            <td>楊淑惠</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009104">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009106</td>
                            <td>范博閎</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009106">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009107</td>
                            <td>李彰</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009107">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009109</td>
                            <td>陳威樺</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009109">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009110</td>
                            <td>馮歆糸羽</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009110">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009111</td>
                            <td>楊子賢</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009111">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009112</td>
                            <td>施依婷</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009112">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009113</td>
                            <td>羅育宗</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009113">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009114</td>
                            <td>古如平</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009114">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009115</td>
                            <td>陳要宏</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009115">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009120</td>
                            <td>鄭智謙</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009120">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009121</td>
                            <td>林宏孺</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009121">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009123</td>
                            <td>曾俊彥</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009123">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009124</td>
                            <td>洪嘉伶</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009124">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009125</td>
                            <td>黃志魁</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009125">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009126</td>
                            <td>曾巧文</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009126">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009127</td>
                            <td>李芳儀</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009127">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009128</td>
                            <td>李佳穎</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009128">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009130</td>
                            <td>王惠齡</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009130">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009131</td>
                            <td>詹君瑜</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009131">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009132</td>
                            <td>李奕賢</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009132">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009134</td>
                            <td>邱建銘</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009134">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009135</td>
                            <td>江炯甫</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009135">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009138</td>
                            <td>夏煒璵</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009138">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009139</td>
                            <td>林彥丞</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009139">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009140</td>
                            <td>林昀臻</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009140">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009141</td>
                            <td>吳沛娜</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009141">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009142</td>
                            <td>何姍珊</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009142">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009143</td>
                            <td>詹淑慧</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009143">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009144</td>
                            <td>陳語涵</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009144">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009145</td>
                            <td>李伊雯</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009145">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009146</td>
                            <td>曾詩惠</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009146">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009148</td>
                            <td>朱怡潔</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009148">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009149</td>
                            <td>彭姿蓉</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009149">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009151</td>
                            <td>廖彥傑</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009151">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009156</td>
                            <td>林允中</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009156">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009157</td>
                            <td>蔡政樺</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009157">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009158</td>
                            <td>蘇妤芯</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009158">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009160</td>
                            <td>陳永宏</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009160">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009161</td>
                            <td>王文崇</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009161">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009162</td>
                            <td>陳信佑</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009162">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009163</td>
                            <td>黃薇琳</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009163">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009164</td>
                            <td>陳妍晴</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009164">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009166</td>
                            <td>吳新平</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009166">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009167</td>
                            <td>曾能翊</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009167">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009168</td>
                            <td>賴建華</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009168">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009169</td>
                            <td>沈詠瀅</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009169">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009170</td>
                            <td>劉亞瑋</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009170">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009171</td>
                            <td>詹勳明</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009171">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009172</td>
                            <td>曾元璽</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009172">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009174</td>
                            <td>張家智</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009174">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009176</td>
                            <td>梁筑鈞</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009176">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009177</td>
                            <td>陳婕婷</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009177">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009178</td>
                            <td>劉清富</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009178">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009180</td>
                            <td>張智鈞</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009180">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009181</td>
                            <td>彭孜婷</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009181">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009185</td>
                            <td>謝宜玲</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009185">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009186</td>
                            <td>鄧力豪</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009186">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009187</td>
                            <td>郭姿君</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009187">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009190</td>
                            <td>張智偉</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009190">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009193</td>
                            <td>TEST點點</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009193">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009194</td>
                            <td>劉家佑</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009194">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009195</td>
                            <td>Stella</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009195">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009197</td>
                            <td>藍晏全</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009197">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009198</td>
                            <td>張明仁</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009198">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009199</td>
                            <td>李庭葦</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009199">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009200</td>
                            <td>楊詔文</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009200">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009202</td>
                            <td>蔡如華</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009202">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009203</td>
                            <td>蔡青志</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009203">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009204</td>
                            <td>謝永芳</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009204">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009205</td>
                            <td>董作軒</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009205">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009206</td>
                            <td>陳宇新</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009206">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009208</td>
                            <td>邱育騏</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009208">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009209</td>
                            <td>張維麟</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009209">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009210</td>
                            <td>尹小君</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009210">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009212</td>
                            <td>TEST</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009212">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009216</td>
                            <td>劉孝先</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009216">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009217</td>
                            <td>鍾志明</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009217">進入審核</a></td>
                        </tr>
                        <tr>
                            <td>10009218</td>
                            <td>黃瑞祥</td>
                            <td><a href="ad_fun_mem_detail.php?mem_num=10009218">進入審核</a></td>
                        </tr>
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

<script type="text/javascript">
    $(function() {

    });

    function check_send_submit() {
        if (($("#s21").val() && !$("#s22").val()) || ($("#s22").val() && !$("#s21").val())) {
            alert("請正確選擇活動時間的兩個區間時間。");
            return false;
        }
        if ($("#s21").val() && $("#s22").val()) {
            if ($("#s21").val() > $("#s22").val()) {
                alert("起始活動時間不可以比結束活動時間大。");
                return false;
            }
        }

        return true;
    }
</script>