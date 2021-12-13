<?php
    /*****************************************/
    //檔案名稱：ad_fun_action_fast.php
    //後台對應位置：好好玩管理系統/好好玩國外團控>出團情報>ajax
    //改版日期：2021.12.10
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    // 更新
    if($_REQUEST["st"] == "save_edit"){
        $dd = $_REQUEST["dd"];
	    $vv = $_REQUEST["v"];
        if($dd != ""){
            switch($_REQUEST["t"]){
                case "sp":
                    $SQL = "update travel_fast set sp='".$vv."' where auton=".$dd;
                    break;
                case "people":
                    $SQL = "update travel_fast set people='".$vv."' where auton=".$dd;
                    break;
                case "notes":
                    $SQL = "update travel_fast set notes='".$vv."' where auton=".$dd;
                    break;
            }
        }
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        echo $vv;
    }

    // 自動產生日期
    if($_REQUEST["st"] == "get_travel"){
        $SQL = "select dates from travel_date where ac_auto = ".SqlFilter($_REQUEST["ac_auto"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
        if($result){
            foreach($result as $re){
                $dd = $dd . $re["dates"] . ",";
            }            
        }else{
            echo "error";
        }
        if(substr($dd,-1) == ","){
            $dd = Date_EN(substr($dd,0,-1),1);
        }
        echo $dd;
    }
    
    // 自動產生備註
    if($_REQUEST["st"] == "get_travel_note"){
        $SQL = "select notes from travel_date where ac_auto = ".SqlFilter($_REQUEST["ac_auto"],"int"). " and datediff(d, dates, '".SqlFilter($_REQUEST["dates"],"tab")."') = 0";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
        if($result){
            foreach($result as $re){
                echo $re["notes"];
            }
        }
    }
?>