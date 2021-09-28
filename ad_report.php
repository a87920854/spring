<!doctype html>
<html lang="en-US">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>SD CRM MEMBER REPORT - Timeline</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css?v=1.5" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap.datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, maximum-scale=5, minimum-scale=1.0, initial-scale=1, user-scalable=0" />
    <style>
        @font-face {
            font-family: 'FontAwesome';
            src: url('assets/fonts/fontawesome-webfont.eot?v=4.4.0');
            src: url('assets/fonts/fontawesome-webfont.eot?#iefix&v=4.4.0') format('embedded-opentype'),
                url('assets/fonts/fontawesome-webfont.woff2?v=4.4.0') format('woff2'),
                url('assets/fonts/fontawesome-webfont.woff?v=4.4.0') format('woff'),
                url('assets/fonts/fontawesome-webfont.ttf?v=4.4.0') format('truetype'),
                url('assets/fonts/fontawesome-webfont.svg?v=4.4.0#fontawesomeregular') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        ul.timeline {
            list-style-type: none;
            position: relative;

        }

        ul.timeline:before {
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }

        ul.timeline>li {
            margin-left: 10px;
            padding-left: 15px;
            border-top: 1px solid #ccc;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        ul.timeline>li:before {
            content: ' ';
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #22c0e8;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }

        ul.timeline li:nth-child(even) {
            background: #fff
        }

        ul.timeline li:nth-child(odd) {
            background: #fff2e6
        }

        ul.timeline li:last-child {
            border-bottom: 1px solid #ccc;
        }

        ul.timeline li p {
            color: #333333;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        ul.timeline li .names {
            color: #595959;
        }

        table td {
            padding: 5px;
        }

        h4 {
            padding-left: 50px;
            font-size: 16px;
            font-weight: bold;
            color: #336699;
        }

        .row {
            margin-left: -15px;
            margin-right: 5px;
        }


        #toTop {
            font-size: 38px;
            line-height: 33px;
            background-color: rgba(63, 159, 217, 0.6);
            color: #FFF;
            position: fixed;
            height: 35px;
            width: 40px;
            right: 6px;
            bottom: 6px;
            text-align: center;
            text-transform: uppercase;
            opacity: 0.9;
            filter: alpha(opacity=90);
            text-decoration: none;
            display: none;
            z-index: 1000;

            -webkit-border-radius: 4px !important;
            -moz-border-radius: 4px !important;
            border-radius: 4px !important;

            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            -o-transition: all 0.2s;
            transition: all 0.2s;
        }

        #toTop:hover {
            background-color: rgba(63, 159, 217, 0.9);
        }

        #toTop:before {
            font-family: "fontawesome";
            content: "\f102";
        }

        #toClose {
            font-size: 38px;
            line-height: 33px;
            background-color: rgba(249, 6, 6, 0.6);
            color: #FFF;
            position: fixed;
            height: 35px;
            width: 40px;
            right: 6px;
            bottom: 56px;
            text-align: center;
            text-transform: uppercase;
            opacity: 0.9;
            filter: alpha(opacity=90);
            text-decoration: none;
            display: none;
            z-index: 1000;

            -webkit-border-radius: 4px !important;
            -moz-border-radius: 4px !important;
            border-radius: 4px !important;

            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            -o-transition: all 0.2s;
            transition: all 0.2s;
        }

        #toClose:hover {
            background-color: rgba(249, 6, 6, 0.9);
        }

        #toClose:before {
            font-family: "fontawesome";
            content: "\f00d";
        }
    </style>
</head>

<body>

    <div class="content">
        <div class="row">
            <div>
                <h4>0975772688 - 回報系統 <a href="#m" onclick="fastmove()" class="btn btn-default btn-xs pull-right">快速回報內容</a><a href="#c" onclick="window.close()" class="btn btn-danger btn-xs pull-right" style="margin-right:5px;">關閉本頁</a></h4>
            </div>
            <ul class="timeline">
                <li>
                    <div class="cont"><span class="label" style="background-color:#ff6600">公</span>&nbsp;&nbsp;<b><span class="label label-primary">2021-09-08 20:17</span>&nbsp;&nbsp;<span class="names">台中-台中督導 回報 <span class="hide">member[4221875]</span></span>&nbsp;&nbsp;詹前程&nbsp;&nbsp;<span class="label label-success">系統紀錄 - 成功</span></b>&nbsp;&nbsp;<a href="?st=del&la=4221875&k_id=1984554&lu=K122260199&ty=member&s=97348077" class="btn btn-xs btn-default">刪</a>
                        <p>由 陳素娟/陳素娟 處理 詹前程(主) 與 傅琪庭(被) 於 2021/9/8 下午 06:00:00 預訂排約，結果：成功</p>
                    </div>
                </li>
                <li>
                    <div class="cont"><span class="label" style="background-color:#ff6600">公</span>&nbsp;&nbsp;<b><span class="label label-primary">2021-09-08 20:16</span>&nbsp;&nbsp;<span class="names">台中-陳素娟 回報 <span class="hide">member[4221860]</span></span>&nbsp;&nbsp;詹前程&nbsp;&nbsp;<span class="label label-success">系統紀錄</span></b>&nbsp;&nbsp;<a href="?st=del&la=4221860&k_id=1984554&lu=K122260199&ty=member&s=97348077" class="btn btn-xs btn-default">刪</a>
                        <p>由 陳素娟 處理 詹前程 與 傅琪庭 於 2021/9/8 下午 06:00:00 至 台中 排約 - 系統紀錄</p>
                    </div>
                </li>
                <li>
                    <div class="cont"><span class="label" style="background-color:#666699">私</span>&nbsp;&nbsp;<b><span class="label label-primary">2021-09-08 18:45</span>&nbsp;&nbsp;<span class="names">台中-台中督導 回報 <span class="hide">member[4221313]</span></span>&nbsp;&nbsp;詹前程&nbsp;&nbsp;<span class="label label-success">系統紀錄</span></b>&nbsp;&nbsp;<a href="?st=del&la=4221313&k_id=1984554&lu=K122260199&ty=member&s=97348077" class="btn btn-xs btn-default">刪</a>
                        <p>台中督導於2021/9/8 下午 06:45:15新增本會員，會員權益為璀璨VIP會員-二年期 - 效期至2021/9/8~2023/9/8</p>
                    </div>
                </li>
                <li>
                    <div class="cont"><span class="label" style="background-color:#666699">私</span>&nbsp;&nbsp;<b><span class="label label-primary">2021-09-07 20:56</span>&nbsp;&nbsp;<span class="names">台南-彭春福 回報 <span class="hide">member[4219729]</span></span>&nbsp;&nbsp;詹前程&nbsp;&nbsp;<span class="label label-success">已邀約</span></b>&nbsp;&nbsp;<a href="?st=del&la=4219729&k_id=1984554&lu=K122260199&ty=member&s=E222367725" class="btn btn-xs btn-default">刪</a>
                        <p>由 台中督導 回報約見結果： 參加／收費情形：刷125000 優3000 - 系統紀錄</p>
                    </div>
                </li>
                <li>
                    <div class="cont"><span class="label" style="background-color:#666699">私</span>&nbsp;&nbsp;<b><span class="label label-primary">2021-09-07 20:56</span>&nbsp;&nbsp;<span class="names">台中-彭春福 回報 <span class="hide">member[4219728]</span></span>&nbsp;&nbsp;詹前程&nbsp;&nbsp;<span class="label label-success">已邀約</span></b>&nbsp;&nbsp;<a href="?st=del&la=4219728&k_id=1984554&lu=K122260199&ty=member&s=97348077" class="btn btn-xs btn-default">刪</a>
                        <p>由 台中督導 回報約見結果： 參加／收費情形：刷125000 優3000 - 系統紀錄</p>
                    </div>
                </li>
                <li>
                    <div class="cont"><span class="label" style="background-color:#666699">私</span>&nbsp;&nbsp;<b><span class="label label-primary">2021-09-07 20:53</span>&nbsp;&nbsp;<span class="names">台南-台南督導 回報 <span class="hide">member[4219704]</span></span>&nbsp;&nbsp;詹前程&nbsp;&nbsp;<span class="label label-success">已成交</span></b>&nbsp;&nbsp;<a href="?st=del&la=4219704&k_id=1984554&lu=K122260199&ty=member&s=12989178" class="btn btn-xs btn-default">刪</a>
                        <p>刷125000優3千。</p>
                    </div>
                </li>
                <li>
                    <div class="cont"><span class="label" style="background-color:#666699">私</span>&nbsp;&nbsp;<b><span class="label label-primary">2021-09-07 15:54</span>&nbsp;&nbsp;<span class="names">台南-吳琪雅 回報 <span class="hide">system[4218398]</span></span>&nbsp;&nbsp;詹前程&nbsp;&nbsp;<span class="label label-success">已邀約</span></b>&nbsp;&nbsp;<a href="?st=del&la=4218398&k_id=1984554&lu=K122260199&ty=member&s=E222367725" class="btn btn-xs btn-default">刪</a>
                        <p>由 開發：胡淑貞，邀約：吳琪雅 預約 2021/9/7 下午 06:30:00 由 台南 邀約至 台中 參觀(會館約見)，聯絡情形及接待注意事項： - 系統紀錄</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <center>
        <form id="report_cont" method="post" action="?st=send&ty=member" onsubmit="return check_sform()">
            <table width="90%" border="1" cellpadding="1">
                <tr>
                    <td colspan=4 style="color:#fff;background:#336699">新增回報紀錄</td>
                </tr>
                <tr>
                    <td style="width:80px;">處理情形</td>
                    <td style="text-align:left">
                        <select name="log_2" id="log_2" class="form-control">
                            <option value="" selected>請選擇</option>
                            <option value="" disabled>--- 會員約見 ---</option>
                            <option value="升卡約見">升卡約見</option>
                            <option value="續約約見">續約約見</option>
                            <option value="" disabled>--- 已入會 ---</option>
                            <option value="已成交">已成交</option>
                            <option value="已是全卡會員">已是全卡會員</option>
                            <option value="" disabled>--- 已邀約 ---</option>
                            <option value="已邀約">已邀約</option>
                            <option value="已邀約本週">已邀約本週</option>
                            <option value="已邀約本月">已邀約本月</option>
                            <option value="已邀約未到現場">已邀約未到現場</option>
                            <option value="可邀約A">可邀約A</option>
                            <option value="可邀約B">可邀約B</option>
                            <option value="可邀約C">可邀約C</option>
                            <option value="邀約完需再次提醒">邀約完需再次提醒</option>
                            <option value="" disabled>--- 需加強 ---</option>
                            <option value="未接">未接</option>
                            <option value="未接4次以上">未接4次以上</option>
                            <option value="未接1">未接1</option>
                            <option value="未接2">未接2</option>
                            <option value="未接3">未接3</option>
                            <option value="預約聯絡">預約聯絡</option>
                            <option value="有到未參">有到未參</option>
                            <option value="長期經營">長期經營</option>
                            <option value="重點經營">重點經營</option>
                            <option value="到期未續約">到期未續約</option>
                            <option value="需加強推廣活動">需加強推廣活動</option>
                            <option value="需要再排約">需要再排約</option>
                            <option value="已來訪考慮中">已來訪考慮中</option>
                            <option value="" disabled>--- 排約狀況 ---</option>
                            <option value="已排約">已排約</option>
                            <option value="約後關懷">約後關懷</option>
                            <option value="排約未滿5次">排約未滿5次</option>
                            <option value="排約無效">排約無效</option>
                            <option value="" disabled>--- 公開資料 ---</option>
                            <option value="名單資訊">名單資訊</option>
                            <option value="客訴反映">客訴反映</option>
                            <option value="聯繫狀況">聯繫狀況</option>
                            <option value="排約注意">排約注意</option>
                            <option value="" disabled>--- 休息中 ---</option>
                            <option value="請假三個月">請假三個月</option>
                            <option value="請假半年">請假半年</option>
                            <option value="請假一年">請假一年</option>
                            <option value="" disabled>--- 活動咖 ---</option>
                            <option value="課程">課程</option>
                            <option value="喜歡戶外活動">喜歡戶外活動</option>
                            <option value="喜歡室內活動">喜歡室內活動</option>
                            <option value="喜歡國外旅遊">喜歡國外旅遊</option>
                            <option value="" disabled>--- 重覆 ---</option>
                            <option value="重覆名單">重覆名單</option>
                            <option value="舊會員">舊會員</option>
                            <option value="" disabled>--- 無效 ---</option>
                            <option value="無效">無效</option>
                            <option value="黑名單">黑名單</option>
                            <option value="不要再聯絡">不要再聯絡</option>
                            <option value="拒絕">拒絕</option>
                            <option value="暫時拒絕">暫時拒絕</option>
                            <option value="空號">空號</option>
                            <option value="手機號暫停">手機號暫停</option>
                            <option value="已結婚">已結婚</option>
                            <option value="目前交往中">目前交往中</option>
                            <option value="年紀太小">年紀太小</option>
                            <option value="總管理回收名單">總管理回收名單</option>
                            <option value="條件不符暫不約">條件不符暫不約</option>
                            <option value="已解約">已解約</option>
                        </select>
                        <div class="input-group" style="margin-top:10px;">
                            <input type="text" style="width:160px;display:none;" name="log_6" id="log_6" class="datepicker form-control" placeholder="點此選擇下次通話日期" autocomplete="off">
                            <select name="log_6_time1" id="log_6_time1" class="form-control" style="width:auto;display:none;">
                                <option value="10">10 時</option>
                                <option value="11">11 時</option>
                                <option value="12">12 時</option>
                                <option value="13">13 時</option>
                                <option value="14">14 時</option>
                                <option value="15">15 時</option>
                                <option value="16">16 時</option>
                                <option value="17">17 時</option>
                                <option value="18">18 時</option>
                                <option value="19">19 時</option>
                                <option value="20">20 時</option>
                                <option value="21">21 時</option>
                                <option value="22">22 時</option>
                            </select><select name="log_6_time2" id="log_6_time2" class="form-control" style="width:auto;display:none;">
                                <option value="00">00 分</option>
                                <option value="30">30 分</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:80px;">內容</td>
                    <td style="text-align:left"><input type="text" name="log_4" id="log_4" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td style="width:80px;">回報時間</td>
                    <td style="text-align:left"><small>2021/9/28 下午 03:29:52 由 JACK<span class="hide">(JACK0906)</span> 回報</small></td>
                </tr>
                <input type="hidden" name="k_id" value="1984554">
                <input type="hidden" name="k_mobile" value="0975772688">
                <input type="hidden" name="log_name" value="JACK">
                <input type="hidden" name="log_username" value="詹前程">
                <input type="hidden" name="log_aid" value="2082523">
                <input type="hidden" name="log_fid" value="K122260199">
                <input type="hidden" name="log_branch" value="總管理處">
                <input type="hidden" name="ty" value="member">
                <tr>
                    <td colspan=4 align="center"><input id="bsub" type="submit" class="btn btn-primary" style="width:60%" value="新增回報"></td>
                </tr>
            </table>
        </form>
        <a href="#c" onclick="window.close()" class="btn btn-danger" style="width:100%;margin-top:15px;margin-bottom:5px;">關閉本頁</a>
        <p style="text-align:center;font-size:11px;color:#666">頁面載入時間 0.0625 毫秒</p>

    </center>
    <a href="#" id="toTop"></a>
    <a href="#" id="toClose" onclick="window.close()"></a>
    <script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap.datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap.datepicker/locales/bootstrap-datepicker.tw.min.js"></script>


    <script language="JavaScript">
        function check_sform() {
            if (!$("#log_2").val() || $("#log_2").val() == "請選擇") {
                alert("請選擇處理情形。");
                return false;
            }
            $("#bsub").attr("disabled", true);
            return true;
        }
        $(function() {

            $("#log_2").val("已排約");

            $("#log_2").on("change", function() {
                var $val = $(this).val();
                $("#log_6").hide();
                $("#log_6_time1").hide();
                $("#log_6_time2").hide();
                if ($val == "已邀約")
                    if (confirm("確定前往預約約見時間。")) {
                        location.href = "ad_invite_add.asp?st=read&keyword=2082523";
                    }
                if ($val == "升卡約見")
                    if (confirm("確定前往預約約見時間。")) {
                        location.href = "ad_invite_add.asp?st=read&keyword=2082523&mem=1";
                    }
                if ($val == "續約約見")
                    if (confirm("確定前往預約約見時間。")) {
                        location.href = "ad_invite_add.asp?st=read&keyword=2082523&mem=2";
                    }
                if ($val == "黑名單")
                    if (confirm("確定將此人的電話號碼加入黑名單嗎？")) {
                        window.open('call_view.asp?st=add&r=1&phone_num=0975772688', 'pph', 'scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=450,height=200,top=10,left=10')
                    }
                if ($val == "預約聯絡") {
                    $("#log_6").show();
                    $("#log_6_time1").show();
                    $("#log_6_time2").show();
                    $("#log_6").datepicker({
                        format: 'yyyy/mm/dd',
                        language: 'tw',
                        todayBtn: 'linked',
                        autoclose: true,
                        startDate: 'today'
                    });
                }
            });
            $("#toTop").bind("click", function(e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 800);
            });
        });

        function fastmove() {
            $("#log_4").focus();
        }
        $(window).scroll(function() {
            _toTop();
        });

        /* Scroll To Top */
        function _toTop() {
            _scrollTop = jQuery(document).scrollTop();

            if (_scrollTop > 100) {

                if (jQuery("#toTop").is(":hidden")) {
                    jQuery("#toTop").show();
                }

                if (jQuery("#toClose").is(":hidden")) {
                    jQuery("#toClose").show();
                }

            } else {

                if (jQuery("#toTop").is(":visible")) {
                    jQuery("#toTop").hide();
                }
                if (jQuery("#toClose").is(":visible")) {
                    jQuery("#toClose").hide();
                }

            }

        }
    </script>
</body>

</html>