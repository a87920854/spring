<?php
    /*****************************************/
    //檔案名稱：ad_fun_counts_ajax.php
    //後台對應位置：好好玩管理系統/企業委辦>發送(ajax)
    //改版日期：2021.12.15
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    function weekchinesename($n){
        switch($n){
            case 1:
                return "一";
                break;
            case 2:
                return "二";
                break;
            case 3:
                return "三";
                break;
            case 4:
                return "四";
                break;
            case 5:
                return "五";
                break;
            case 6:
                return "六";
                break;
            case 0:
                return "日";
                break;
            default:
                return "不明";
        }
    }

    if($_REQUEST["st"] == "send"){
        $start_time = Date_EN(SqlFilter($_REQUEST["start_time"],"tab"),1) . " 00:00";
        $end_time = Date_EN(SqlFilter($_REQUEST["end_time"],"tab"),1) . " 23:59";
        $fullmaxday = abs(round((strtotime(SqlFilter($_REQUEST["end_time"],"tab")) - strtotime(SqlFilter($_REQUEST["ostart_time"],"tab")))/3600/24));
        $maxday = abs(round((strtotime(SqlFilter($_REQUEST["end_time"],"tab")) - strtotime(SqlFilter($_REQUEST["start_time"],"tab")))/3600/24));

        if($maxday < 0){
            echo "在 ".$start_time." ～ ".$end_time." 間沒有資料或日期選擇不正確。";
        }

        if($maxday == 0){
            $smaxday = 1;
        }else{
            $smaxday = $fullmaxday + 1;
        }

        if($_REQUEST["start_time"] == $_REQUEST["ostart_time"]){
            echo "<div>在 ".$start_time." ～ ".$end_time." 間統計、共 ".$smaxday." 天：</div>";
            echo "<table id='outtable' width='100%' height=80 align='center' class='table table-striped table-bordered bootstrap-datatable'>";
            echo "<tr><td>註冊時間</td><td>星期</td><td>網站會員註冊</td><td colspan=3>MATCH回登</td><td>未完成-總</td><td>未完成-新</td><td>國內活動報名-總</td><td>國內活動報名-新</td><td>國外活動報名-總</td><td>國外活動報名-新</td></tr>";
            echo "<tr><td></td><td></td><td></td><td>Girl</td><td>Boy</td><td>ALL</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
        }

        if($maxday > 10){
            $forday = 9;
        }else{
            $forday = $maxday;
        }

        for($i=0; $i<=$forday; $i++){
            $total1 = 0;
            $total2 = 0;
			$total21 = 0;
            $total3 = 0;
            $total31 = 0;
            $total4 = 0;
            $total4g = 0;
            $total4b = 0;
            $total41 = 0;
            $total5 = 0;
            $total51 = 0;
            $total6 = 0;
            $total61 = 0;
            $showdate = date("Y/m/d", strtotime($start_time.("+".$i." day")));

            $SQL = "select count(mem_auto) as tt from member_data where year(mem_time) = ".date("Y",strtotime($showdate))." and month(mem_time) = ".date("m",strtotime($showdate))." and day(mem_time) = ".date("d",strtotime($showdate));
            $rs = $FunConn->query($SQL);
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $total1 = $result["tt"];
            }

            $SQL = "select count(k_id) as tt from love_keyin where year(k_time) = ".date("Y",strtotime($showdate))." and month(k_time) = ".date("m",strtotime($showdate))." and day(k_time) = ".date("d",strtotime($showdate))." and all_kind <> '國外旅遊' and is_local=0";
            $rs = $FunConn->query($SQL);
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $total2 = $result["tt"];
            }

            if($total2 > 0){
                $SQL = "select count(k_id) as tt from love_keyin as dba where year(k_time) = ".date("Y",strtotime($showdate))." and month(k_time) = ".date("m",strtotime($showdate))." and day(k_time) = ".date("d",strtotime($showdate))." and all_kind <> '國外旅遊' and is_local=0 And ((SELECT count(k_mobile) FROM love_keyin Where k_mobile = dba.k_mobile and k_time <= dba.k_time) <= 1) And ((SELECT count(mem_mobile) FROM member_data Where mem_mobile = dba.k_mobile and mem_time <= dba.k_time) <= 1)";
                $rs = $FunConn->query($SQL);
                $result = $rs->fetch(PDO::FETCH_ASSOC);
                if($result){
                    $total21 = $result["tt"];
                }
            }

            $SQL = "select count(k_id) as tt from love_keyin where year(k_time) = ".date("Y",strtotime($showdate))." and month(k_time) = ".date("m",strtotime($showdate))." and day(k_time) = ".date("d",strtotime($showdate))." and all_kind = '國外旅遊' and is_local=0";
            $rs = $FunConn->query($SQL);
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $total3 = $result["tt"];
            }

            if($total3 > 0){
                $SQL = "select count(k_id) as tt from love_keyin as dba where year(k_time) = ".date("Y",strtotime($showdate))." and month(k_time) = ".date("m",strtotime($showdate))." and day(k_time) = ".date("d",strtotime($showdate))." and all_kind = '國外旅遊' and is_local=0 And ((SELECT count(k_mobile) FROM love_keyin Where k_mobile = dba.k_mobile and k_time <= dba.k_time) <= 1) And ((SELECT count(mem_mobile) FROM member_data Where mem_mobile = dba.k_mobile and mem_time <= dba.k_time) <= 1)";
                $rs = $FunConn->query($SQL);
                $result = $rs->fetch(PDO::FETCH_ASSOC);
                if($result){
                    $total31 = $result["tt"];
                }
            }

            $SQL = "select count(mem_auto) as tt from member_data where year(ff_time) = ".date("Y",strtotime($showdate))." and month(ff_time) = ".date("m",strtotime($showdate))." and day(ff_time) = ".date("d",strtotime($showdate))." and not ff is null";
            $rs = $FunConn->query($SQL);
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $total4 = $result["tt"];
            }

            $SQL = "select count(mem_auto) as tt from member_data where mem_sex='女' and year(ff_time) = ".date("Y",strtotime($showdate))." and month(ff_time) = ".date("m",strtotime($showdate))." and day(ff_time) = ".date("d",strtotime($showdate))." and not ff is null";
            $rs = $FunConn->query($SQL);
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $total4g = $result["tt"];
            }

            $SQL = "select count(mem_auto) as tt from member_data where mem_sex='男' and year(ff_time) = ".date("Y",strtotime($showdate))." and month(ff_time) = ".date("m",strtotime($showdate))." and day(ff_time) = ".date("d",strtotime($showdate))." and not ff is null";
            $rs = $FunConn->query($SQL);
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $total4b = $result["tt"];
            }

            $SQL = "select count(auton) as tt from mobile_reply where year(times) = ".date("Y",strtotime($showdate))." and month(times) = ".date("m",strtotime($showdate))." and day(times) = ".date("d",strtotime($showdate));
            $rs = $FunConn->query($SQL);
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $total6 = $result["tt"];
            }

            if($total6 > 0){
                $SQL = "select count(auton) as tt from mobile_reply as dba where year(times) = ".date("Y",strtotime($showdate))." and month(times) = ".date("m",strtotime($showdate))." and day(times) = ".date("d",strtotime($showdate))." And ((SELECT count(mem_mobile) FROM member_data Where mem_mobile = dba.mobile and mem_time <= dba.times) <= 1) And ((SELECT count(k_mobile) FROM love_keyin Where k_mobile = dba.mobile and k_time <= dba.times) <= 1)";
                $rs = $FunConn->query($SQL);
                $result = $rs->fetch(PDO::FETCH_ASSOC);
                if($result){
                    $total61 = $result["tt"];
                }
            }

            $nowday = $nowday+1;
            echo "<tr><td>".$showdate."</td>";
            echo "<td>".weekchinesename(date('w', strtotime($showdate)))."</td>";
            echo "<td>".$total1."</td>";
            echo "<td>".$total4g."</td>";
            echo "<td>".$total4b."</td>";
            echo "<td>".$total4."</td>";         
            echo "<td>".$total6."</td>";
            echo "<td>".$total61."</td>";
            echo "<td>".$total2."</td>";
            echo "<td>".$total21."</td>";
            echo "<td>".$total3."</td>";
            echo "<td>".$total31."</td></tr>";
 
        }        

        if($maxday - $nowday >= 1){
            $nowdays = $forday + SqlFilter(($_REQUEST["nowdays"]),"int") + 1;
            echo "<script type='text/javascript'>outmsg_show('目前讀取 ".$nowdays." / ".($fullmaxday+1)." 筆資料..請稍候..');conutice_ajax('".date("Y/m/d",strtotime($start_time.("+".($forday+1)." day")))."','".SqlFilter($_REQUEST["ostart_time"],"tab")."','".SqlFilter($_REQUEST["end_time"],"tab")."','".$nowdays."')</script>";
        }

        if($maxday < 10 || $forday == $maxday){
            echo "<script type='text/javascript'>setTimeout(function(){button_set(1);outmsg_show('已讀取 ".($fullmaxday + 1)." 筆資料完畢。')},50);</script>";
        }
        
        
    }
?>