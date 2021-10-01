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
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">排約人次統計-總表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>排約人次統計 - 總表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <form id="sform" action="?st=search" method="post" target="_self" onsubmit="return sends()">
                    <p>
                        <select name="yy" id="yy">
                            <option value="2014">2014 年</option>
                            <option value="2015">2015 年</option>
                            <option value="2016">2016 年</option>
                            <option value="2017">2017 年</option>
                            <option value="2018">2018 年</option>
                            <option value="2019">2019 年</option>
                            <option value="2020">2020 年</option>
                            <option value="2021" selected>2021 年</option>

                        </select>&nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="checkbox" name="branch" value="台北"> 台北</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="桃園"> 桃園</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="新竹"> 新竹</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="台中"> 台中</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="台南"> 台南</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="高雄"> 高雄</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="八德"> 八德</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="約專"> 約專</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="迷你約"> 迷你約</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="總管理處"> 總管理處</label>&nbsp;&nbsp;
                        <label><input type="checkbox" name="shown" value="1"> 顯示離職</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="送出" class="btn btn-default" style="margin-top:-8px">
                    </p>
                </form>

                <div id="outdiv">
                    <table id="outtable" width="100%" height="80" align="center" class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <th width="40">NO</th>
                                <th>會館</th>
                                <th>姓名</th>
                                <th>職稱</th>
                                <th>2020年一月</th>
                                <th>二月</th>
                                <th>三月</th>
                                <th>四月</th>
                                <th>五月</th>
                                <th>六月</th>
                                <th>七月</th>
                                <th>八月</th>
                                <th>九月</th>
                                <th>十月</th>
                                <th>十一月</th>
                                <th>十二月</th>
                                <th>排約次數</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>台北</td>
                                <td>余宗嶼</td>
                                <td>服務部督導</td>
                                <td>145</td>
                                <td>212</td>
                                <td>201</td>
                                <td>276</td>
                                <td>236</td>
                                <td>175</td>
                                <td>263</td>
                                <td>226</td>
                                <td>186</td>
                                <td>214</td>
                                <td>203</td>
                                <td>194</td>
                                <td>2531</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>台北</td>
                                <td>林馨彤</td>
                                <td>排約秘書</td>
                                <td>92</td>
                                <td>144</td>
                                <td>97</td>
                                <td>141</td>
                                <td>159</td>
                                <td>108</td>
                                <td>141</td>
                                <td>172</td>
                                <td>156</td>
                                <td>142</td>
                                <td>140</td>
                                <td>165</td>
                                <td>1657</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>台北</td>
                                <td>李至喬</td>
                                <td>愛情顧問</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>24</td>
                                <td>53</td>
                                <td>65</td>
                                <td>66</td>
                                <td>208</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>台北</td>
                                <td>高語鍹</td>
                                <td>客戶經理</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>5</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>台北</td>
                                <td>台北督導</td>
                                <td>督導</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                            </tr>
                            <script type="text/javascript">
                                button_set(1);
                                outmsg_show("已讀取 1 資料完畢。");
                            </script>
                        </tbody>
                    </table>
                </div>
                <div id="outmsg" height=20 style="font-size:12px;display:none">讀取資料中...<img src='img/wait_loading.gif' align='middle'></div>

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
    $mtu = "ad_single_count_love";
    $(function() {

    });

    function sends() {
        $cbx_group = $("input:checkbox[name='branch']");
        if (!$cbx_group.is(":checked")) {
            alert("請選擇會館。");
            return false;
        }

        $bv = $("input:checkbox[name='branch']:checked").map(function(_, el) {
            return $(el).val();
        }).get().join(",");

        button_set(0);
        if ($("#outtable")) $("#outtable").html("");
        $("#outmsg").html("讀取資料中...<img src='img/wait_loading.gif' align='middle'>");
        $("#outmsg").show();
        $.ajax({
            url: 'ad_single_count_love2.php?st=send',
            data: {
                yy: $("#yy").val(),
                branch: $bv,
                shown: $("#shown").val()
            },
            error: function(xhr) {
                alert('Ajax request 發生錯誤');
                button_set(1);
            },
            success: function(response) {
                $("#outdiv").html(response);
            }
        });

        return false;
    }

    function outmsg_show(msg) {
        $("#outmsg").html(msg);
        //$('html, body').animate({scrollTop: $('body').height()}, 200);
    }

    function button_set(n) {
        if (n) {
            $(":button").attr("disabled", false);
            $(":submit").attr("disabled", false);
        } else {
            $(":button").attr("disabled", true);
            $(":submit").attr("disabled", true);
        }
    }

    function conutice_ajax(n1, n2, n3, n4, n5) {
        setTimeout(function() {
            $.ajax({
                url: 'ad_single_count_love2.php?st=send',
                data: {
                    yy: n1,
                    branch: n2,
                    shown: n3,
                    ii: n4,
                    topage: parseInt(n5) + 1
                },
                error: function(xhr) {
                    alert('Ajax request 發生錯誤');
                    button_set(1);
                },
                success: function(response) {
                    if ($("#outtable")) $("#outtable").append(response);
                    else $("#outdiv").html(response);
                }
            })
        }, 1000);
    }
</script>