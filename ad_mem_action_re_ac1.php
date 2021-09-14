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
      <li class="active">單一活動紀錄</li>
    </ol>
  </header>
  <!-- /page title -->

  <div id="content" class="padding-20">
    <!-- content starts -->

    <div class="panel panel-default">
      <div class="panel-heading">
        <span class="title elipsis">
          <strong>單一活動紀錄 - 數量：25　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
          &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-info" onclick="Mars_popup('ad_mem_action_re_ac1_print.php?acre_sign1=&acre_sign2=&s6=','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');" value="列印本頁">
        </span>
      </div>

      <div class="panel-body">
        <div class="col-md-12">
          <form name="form1" method="post" action="ad_mem_action_re_ac1.php">
            <p>
              <span>
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
              </span>　活動時間：
              <input type="text" name="t1" id="t1" class="datepicker" autocomplete="off" placeholder="時間區間" value=""> ~ <input type="text" name="t2" id="t2" class="datepicker" autocomplete="off" placeholder="時間區間" value="">　會館：<select name="s6" id="s6">
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
              <input type="submit" value="送出" class="btn btn-default">
            </p>
        </div>

        <table class="table table-striped table-bordered bootstrap-datatable">
          <thead>
            <tr>
              <th>會館</th>
              <th>活動時間</th>
              <th>活動標題</th>
              <th width="40%">活動內容</th>
              <th>總金額</th>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2020/9/27 下午 02:00:00<br>
                  <font color=blue>活動新增(2020-09-28 11:10)</font>
                </div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=11934">175UP挺拔歐爸專屬！精選3</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=11934">你也想談一場韓劇式的Oopa戀愛嗎長腿歐巴專場即將展開，快來報名，一起談場像韓劇里甜到爆炸的戀愛吧<br>《175UP挺拔歐爸專屬》<br>①精準認識：175UP挺拔歐爸專屬<br>②專業篩選：讓你交</a>
              </td>
              <td>
                3276 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2020/9/20 下午 02:00:00<br>
                  <font color=blue>活動新增(2020-09-22 17:11)</font>
                </div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=11766">百萬小康男嘗鮮微約會</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=11766">《百萬小康男孩專屬約會場》<br>①精準認識：相同年齡七年級百萬男孩專屬<br>②專業篩選：讓你交友更放心更安全<br>③交往率高：前置配對、後續追蹤，加上多年配對經驗，讓適合的彼此絕不錯過</a>
              </td>
              <td>
                3589 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2020/9/19 下午 02:00:00<br>
                  <font color=blue>活動新增(2020-09-22 17:08)</font>
                </div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=11765">今晚我想來場約會《給彼此20</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=11765">【精準選擇異性來場一對一專屬質感約會】<br>①質感專屬約會：有效避免大量快速換桌，讓你輕鬆的好好地去認識彼此<br>②限定年齡層：讓你精準認識想認識的年齡對象<br>③專業篩選：讓你交友更放心更安全</a>
              </td>
              <td>
                3677 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2018/8/11 下午 02:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=6243">今年告別單身戀愛去</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=6243">工作忙生活圈小，沒機會認識另一半?又或者太過被動、太沒自信，總是等來等去，結果兩個人等啊等，也就不小心錯失了對方?

                  迎接好運的起點 2017年告別單身戀愛去

                  春天會館成立近30年，
                  以實</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2018/7/28 下午 02:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=6018">單身揪團抓寶貝</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=6018">單身揪團抓寶貝~火速出擊</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2018/6/23 下午 02:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=6015">雲端月老廟</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=6015">單身就是要去拜月老！
                  想要遇見Mr. right要拜月老?

                  如果想要更積極一點你可以多多參加活動認識新朋友!
                </a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2018/5/20 下午 02:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=6041">手機號碼看你的桃花愛情</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=6041">手機號碼是非常重要的！快來看看自己的手機號碼顯示著怎麼樣的運勢吧！</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2016/12/31 下午 02:30:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=6242">如何增加自己的戀愛運？</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=6242">聖&#35476;跨年前，我一定要努力擺脫單身！</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2016/10/1 下午 02:30:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=5822">元氣女孩</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=5822">元氣女孩</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2016/9/30 下午 02:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=6022">約會首選 單身菁英男孩</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=6022">客製 配對約會</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2016/9/30 上午 11:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=5646">人生最好的禮物</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=5646">人生最好的禮物</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2016/8/31 下午 02:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=5648">12星座男生遇到喜歡女生的表現</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=5648">12星座男生遇到喜歡女生的表現</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2016/8/18 下午 02:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=5788">閃耀愛情，近乎苛求</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=5788">閃耀愛情，近乎苛求</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2016/6/25 上午 08:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=5651">奔跑特別企劃</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=5651">即刻救援炸彈危機2天1夜(全省大會師)</a>
              </td>
              <td>
                80400 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2015/12/31 下午 02:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=5488">主題精緻排約</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=5488">1+1微約會 訂做專屬情人</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2015/12/31 下午 02:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=5050">戀愛志工 召募</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=5050">散播歡樂 散播愛 春天會館邀請您加入戀愛志工行列</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2015/12/24 下午 07:30:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=5498">終結孤單：甜蜜聖誕夜 下班晚餐微約會</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=5498">甜蜜聖誕夜 下班晚餐微約會</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2015/12/19 下午 01:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=5493">12月台北場爵士音樂</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=5493">爵士音樂 公益聯誼野餐會</a>
              </td>
              <td>
                13300 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2015/11/17 下午 07:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=5490">廠商贊助限量10名免費</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=5490">【微學習導讀會】慢一點，賣更快</a>
              </td>
              <td>
                0 元</td>
            </tr>

            <tr>
              <td>
                <div align="center">總管理處</div>
              </td>
              <td>
                <div align="center">2015/11/3 下午 07:00:00</div>
              </td>
              <td>
                <div align="center"><a href="ad_mem_action_re_ac2.php?ac_auto=5491">廠商贊助限量10名免費</a></div>
              </td>
              <td>
                <a href="ad_mem_action_re_ac2.php?ac_auto=5491">【好學講座】因為付出 所以「捷」出</a>
              </td>
              <td>
                0 元</td>
            </tr>

            </tbody>
        </table>
      </div>
      <div class="text-center">共 25 筆、第 1 頁／共 2 頁&nbsp;&nbsp;
        <ul class='pagination pagination-md'>
          <li><a href=/ad_mem_action_re_ac1.php?topage=1>第一頁</a></li>
          <li class='active'><a href="#">1</a></li>
          <li><a href=/ad_mem_action_re_ac1.php?topage=2 class='text'>2</a></li>
          <li><a href=/ad_mem_action_re_ac1.php?topage=2 class='text' title='Next'>下一頁</a></li>
          <li><a href=/ad_mem_action_re_ac1.php?topage=2 class='text'>最後一頁</a></li>
          <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
              <option value="/ad_mem_action_re_ac1.php?topage=1" selected>1</option>
              <option value="/ad_mem_action_re_ac1.php?topage=2">2</option>
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
require("./include/_bottom.php");
?>

<script language="JavaScript">
  $mtu = "ad_mem_action_re_list.";
</script>