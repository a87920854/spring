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

                <div id="outdiv"></div>
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