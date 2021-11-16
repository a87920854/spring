<?php

    /*****************************************/
	//檔案名稱：ad_fun_love_f.php
	//後台對應位置：好好玩管理系統/好好玩國內報名>功能(進階搜尋)
	//改版日期：2021.11.15
	//改版設計人員：Jack
	//改版程式人員：Jack
	/*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
	if ($_SESSION["MM_Username"] == "") {
		call_alert("請重新登入。", "login.php", 0);
	}

    if($_SESSION["MM_UserAuthorization"] == "action"){
        call_alert("您沒有查看此頁的權限。", "login.php", 0);
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li>

                <a href="ad_fun_action1.php">好好玩國內活動</a>

            </li>
            <li class="active">報名系統搜尋</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>報名系統搜尋</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="searchform" action="" method="post" target="_self" class="form-inline" onsubmit="return take_action()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td>類別：
                                    <select id="search_page">
                                        <option value="" selected>請選擇</option>
                                        <option value="ad_fun_action1.php?sear=1&vst=full">好好玩國內活動</option>
                                        <option value="ad_fun_action3.php?sear=1&vst=full">好好玩國內活動-資料版</option>
                                        <option value="ad_fun_action2.php?sear=1&vst=full">好好玩國外旅遊</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>手機：
                                    <input name="s2" type="text" id="s2" size="20" maxlength="10" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>姓名：
                                    <input name="s3" type="text" id="s3" size="20" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>信箱：
                                    <input name="s1" type="text" id="s1" size="20" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>地區：
                                    <select name="s11" id="s11">
                                        <option value="">請選擇</option>
                                        <option value="台北">台北</option>
                                        <option value="桃園">桃園</option>
                                        <option value="新竹">新竹</option>
                                        <option value="台中">台中</option>
                                        <option value="台南">台南</option>
                                        <option value="高雄">高雄</option>
                                        <option value="廈門">廈門</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td>年次：
                                    <select name="s27" id="s27">
                                        <option value="" selected>請選擇</option>
                                        <?php 
                                            for($i=20;$i<=80;$i++){
                                                echo "<option value='".(date("Y")-$i)."'>".(date("Y")-$i)." - ".$i." 歲</option>";
                                            }                                            
                                        ?>                                  
                                    </select> ~ <select name="s28" id="s28">
                                        <option value="" selected>請選擇</option>                
                                        <?php 
                                            for($i=20;$i<=80;$i++){
                                                echo "<option value='".(date("Y")-$i)."'>".(date("Y")-$i)." - ".$i." 歲</option>";
                                            }                                            
                                        ?>       
                                    </select>
                                </td>
                            </tr>
                            <td>自訂來源：
                                <select name="s97" id="s97">
                                    <option value="">請選擇</option>
                                    <?php
                                        $SQL = "select distinct k_cc from love_keyin where not k_cc is null and k_cc <> ''";
                                        $rs = $FunConn->prepare($SQL);
                                        $rs->execute();
                                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                        if($result){
                                            foreach($result as $re){
                                                echo "<option value='".$re["k_cc"]."'>".trim($re["k_cc"])."</option>";
                                            }                                            
                                        }
                                    ?>
                                </select>
                            </td>
                            </tr>
                            <tr>
                                <td>會館：
                                    <select name="branch" id="branch">
                                        <?php                                            
                                            $SQL = "Select * From branch_data Where admin_sOrt<>99 ".$subSQL."Order By admin_SOrt";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $re){ ?>
                                                <option value="<?php echo $re["admin_name"];?>"<?php if ( SqlFilter($_REQUEST["branch"],"tab") == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
                                        <?php }?>
                                    </select> <select name="single" id="single">
                                        <option value="">請選擇</option>
                                        <?php
                                            if ( $_REQUEST["flag"] == "1" ){ 
                                                $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' Order By p_desc2 Desc, lastlogintime Desc";
                                            }else{
                                                $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' And p_work=1 Order By p_desc2 Desc, lastlogintime Desc";
                                            }
                                            if ( $branch != "" ){
                                                $rs_er = $SPConn->prepare($SQL_er);
                                                $rs_er->execute();
                                                $result_er=$rs_er->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($result_er as $re_er){
                                                    if ( $re_er["p_name"] != "" ){ $p_name = $re_er["p_name"]; }
                                                    if ( $re_er["p_other_name"] != "" ){ $p_name = $re_er["p_other_name"]; }
                                                    echo "<option value='".$re_er["p_user"]."'";
                                                    if ( $single == $re_er["p_user"] ){ echo " selected";}
                                                    echo ">".$p_name."</option>";
                                                }
                                            }
                                        ?>
                                    </select> <label><input type="checkbox" id="showout"> 顯示離職</label>
                                </td>
                            </tr>
                            <tr>
                                <td>活動日期：
                                    <select name="a3">
                                        <option value="" selected>請選擇</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    年
                                    <select name="a4">
                                        <option value="">請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    月至
                                    <select name="b3">
                                        <option value="">請選擇</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    年
                                    <select name="b4">
                                        <option value="">請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    月
                                </td>
                            </tr>
                            <tr>
                                <td>資料時間：
                                    <select name="a1">
                                        <option value="" selected>請選擇</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    年
                                    <select name="a2">
                                        <option value="">請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    月至
                                    <select name="b1">
                                        <option value="">請選擇</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    年
                                    <select name="b2">
                                        <option value="">請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    月
                                </td>
                            </tr>
                            <tr>
                                <td><input type="reset" name="reset" value="清空條件" style="height:28px;">　<input type="submit" name="Submit" value="開始搜尋" style="height:28px;"></td>
                            </tr>
                            </font>
                    </table>
                </form>
                </td>
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
    $mtu = "ad_fun_action1.";


    function take_action() {
        if (!$("#search_page").val()) {
            alert("請選擇要搜尋的類別。");
            return false;
        }
        $("#searchform").attr("action", $("#search_page").val());
        return true;
    }
    $(function() {
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");
        });
        $("#showout").on("click", function() {
            if (!$("#s6").val()) {
                alert("請先選擇會館。");
                $(this).prop("checked", false);
                return false;
            }
            if ($(this).prop("checked")) {
                personnel_get_funsend("s6", "s7", 1);
            } else {
                personnel_get_funsend("s6", "s7", 0);
            }
        });
    });
</script>