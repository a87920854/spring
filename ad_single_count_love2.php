<?php
	error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_single_count_love2.php
	//後台對應位置：名單/發送記錄>排約人次統計(年度總表)
	//改版日期：2021.12.6
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");

    $st = SqlFilter($_REQUEST["st"],"tab");
    if ( $st == "send"){
        $yy = SqlFilter($_REQUEST["yy"],"tab");
        $branch = SqlFilter($_REQUEST["branch"],"tab");
        $shown = SqlFilter($_REQUEST["shown"],"tab");
        $ii = cint($_REQUEST["ii"]);
        if ( $topage == 1 ){
            $ii = 1;
            echo "<table id='outtable' width='100%' height='80' align='center' class='table table-striped table-bordered bootstrap-datatable'>";
            echo "<tr>";
            echo "<th width='40'>NO</th>";
            echo "<th>會館</th>";
            echo "<th>姓名</th>";
            echo "<th>職稱</th>";
            echo "<th>".$yy."年一月</th>";
            for ( $i=2;$i<=12;$i++ ){
                echo "<th>".monthname($i)."</th>";
            }
            echo "<th>排約次數</th>";
            echo "</tr>";
        }

        if ( $shown == "1" ){
            //qsql = ""
            $subSQL = "";
        }else{
            //qsql = " and p_work=1";
            $subSQL = " And p_work = 1";
        }
        
        $oldbranch = $branch;
        if ( $branch != "" ){
            $branch = str_replace(",", "','", $branch);
            $subSQL = $subSQL." And (personnel_data.p_branch in ('".$branch."'))";
        }else{
            echo "<tr><td colspan='8'>請選擇會館</td></tr>";
            exit;
        }

        if ( $_SESSION["MM_UserAuthorization"] == "admin" ){        
            $SQL  = "Select personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user,personnel_data.p_job2, lovecount FROM personnel_data ";
            $SQL .= "outer APPLY (select sum(score) as lovecount from love_data_re where (love_data_re.all_single = personnel_data.p_user OR ";
            $SQL .= "love_data_re.all_single2 = personnel_data.p_user) AND (love_data_re.love_time2 BETWEEN '".$yy."/1/1  00:00' AND '".$yy."/12/31 23:59')) love_data_re ";
            $SQL .= "WHERE p_user <> '' and lovecount > 0 and p_work=1".$subSQL."  order by lovecount desc";
        }elseif ( $_SESSION["MM_UserAuthorization"] == "love" ){
            $SQL  = "Select personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user,personnel_data.p_job2, lovecount FROM personnel_data ";
            $SQL .= "outer APPLY (select sum(score) as lovecount from love_data_re where (love_data_re.all_single = personnel_data.p_user OR ";
            $SQL .= "love_data_re.all_single2 = personnel_data.p_user) AND (love_data_re.love_time2 BETWEEN '".$yy."/1/1  00:00' AND '".$yy."/12/31 23:59')) love_data_re ";
            $SQL .= "WHERE p_user <> '' and lovecount > 0 and  p_work=1".$subSQL."  order by lovecount desc";
        }elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" ||  $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
            $SQL  = "Select personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user,personnel_data.p_job2, lovecount FROM personnel_data ";
            $SQL .= "outer APPLY (select sum(score) as lovecount from love_data_re where (love_data_re.all_single = personnel_data.p_user OR ";
            $SQL .= "love_data_re.all_single2 = personnel_data.p_user) AND (love_data_re.love_time2 BETWEEN '".$yy."/1/1  00:00' AND '".$yy."/12/31 23:59')) love_data_re ";
            $SQL .= "WHERE (personnel_data.p_branch = '".$_SESSION["branch"]."') and p_user <> '' and lovecount > 0 and  p_work=1  order by lovecount desc";
        }else{
            $SQL  = "Select personnel_data.p_branch, personnel_data.p_name, personnel_data.p_other_name, personnel_data.p_user,personnel_data.p_job2, lovecount FROM personnel_data ";
            $SQL .= "outer APPLY (select sum(score) as lovecount from love_data_re where (love_data_re.all_single = personnel_data.p_user OR ";
            $SQL .= "love_data_re.all_single2 = personnel_data.p_user) AND (love_data_re.love_time2 BETWEEN '".$yy."/1/1  00:00' AND '".$yy."/12/31 23:59')) love_data_re WHERE ";
            $SQL .= "(personnel_data.p_user = '".$_SESSION["MM_username"]."') and p_user <> '' and lovecount > 0 and  p_work=1  order by lovecount desc";
        }

        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
        if ( count($result) > 0 ){
            $ii = 0;
            foreach($result as $re){
                $ii++;
                echo "<tr>";
                echo "<td>".ii&"</td>";
                echo "<td>".$re["p_branch"]."</td>";
                echo "<td>".$re["p_name"]."</td>";	
                echo "<td>".$re["p_job2"]."</td>";
                for ( $i=1;$i<=12;$i++){
                    $fday = $yy."/".$i."/1 00:00";
                    $lday = dateadd("m", 1, $fday ) - 1 ." 23:59"

                    date("m",strtotime("-1 day"));
                           qrs.open "select sum(score) as ls from love_data_re where love_data_re.love_time2 BETWEEN '"&fday&"' AND '"&lday&"' and (love_data_re.all_single = '"&rs("p_user")&"' OR love_data_re.all_single2 = '"&rs("p_user")&"')", SPCon, 1, 1
                           if not qrs.eof then
                               ls = qrs("ls")
                           else
                               ls = 0
                           end if
                           qrs.close
                           response.write "<td>"&ls&"</td>"
                           next
                                    lovecount = rs("lovecount")
                                    if lovecount = "" or isnull(lovecount) then
                                        lovecount = 0
                                    end if
                      response.write "<td>"&lovecount&"</td>"
                       response.write "</tr>"
                       ii = ii+1
                       rs.MoveNext
                      Loop
                      End IF
                      rs.close
                      
          set rs=nothing
          if topage = TotalPage then
              response.write "<script type=""text/javascript"">button_set(1);outmsg_show(""已讀取 "&TotalPage&" 資料完畢。"");</script>"
          else          
            response.write "<script type=""text/javascript"">outmsg_show(""目前讀取 "&topage&" / "&TotalPage&" 資料..請稍候..<img src='img/wait_loading.gif' align='middle'>"");conutice_ajax('"&yy&"','"&oldbranch&"','"&shown&"','"&ii&"', '"&topage&"')</script>"
          end if
  
  response.end
  end if



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