<?php

    /*****************************************/
    //檔案名稱：teach_video_add.php
    //後台對應位置：管理系統/教學影片>新增教學影片
    //改版日期：2022.1.24
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
    if($_SESSION["MM_UserAuthorization"] != "admin"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    if($_REQUEST["st"] == "add"){
        if($_REQUEST["an"] != ""){     
            $SQL = "SELECT * FROM teach_video where auton='".SqlFilter($_REQUEST["an"],"int");
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch();
            if(!$result){
                call_alert("資料讀取錯誤。","ClOsE",0);
            }
            $title = SqlFilter($_REQUEST["title"],"tab");
            $types = SqlFilter($_REQUEST["types"],"tab");
            $types2 = SqlFilter($_REQUEST["types2"],"tab");            
            if($_REQUEST["notes"] != ""){
                $notes = str_ireplace("\r\n","",$_REQUEST["notes"]);
                $notes = SqlFilter($notes,"tab");
            }else{
                $notes = NULL;
            }
            if($_REQUEST["branch"] != ""){
                $branch = implode(",",$_REQUEST["branch"]);
            }
            $ownerbranch = SqlFilter($_REQUEST["ownerbranch"],"tab"); 
            if($_REQUEST["onlybranch"] == "1"){
                $onlybranch = 1;
            }else{
                $onlybranch = 0;
            }
            $vurl = $_REQUEST["url"];
            if($vurl != ""){
                if(strpos($vurl,"?v=") != false){
                    if(strpos($vurl,"&") != false){                        
                        $vurl = substr($vurl,strpos($vurl,"&"));
                    }
                }
            }
            $SQL = "UPDATE teach_video SET title='', types='', types2='', notes='', branch='', ownerbranch='', onlybranch='', url='' WHERE auton='".SqlFilter($_REQUEST["an"],"int");
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
        }else{
            $title = SqlFilter($_REQUEST["title"],"tab");
            $types = SqlFilter($_REQUEST["types"],"tab");
            $types2 = SqlFilter($_REQUEST["types2"],"tab");            
            if($_REQUEST["notes"] != ""){
                $notes = str_ireplace("\r\n","",$_REQUEST["notes"]);
                $notes = SqlFilter($notes,"tab");
            }else{
                $notes = NULL;
            }
            if($_REQUEST["branch"] != ""){
                $branch = implode(",",$_REQUEST["branch"]);
            }
            $ownerbranch = SqlFilter($_REQUEST["ownerbranch"],"tab"); 
            if($_REQUEST["onlybranch"] == "1"){
                $onlybranch = 1;
            }else{
                $onlybranch = 0;
            }
            $vurl = $_REQUEST["url"];
            if($vurl != ""){
                if(strpos($vurl,"?v=") != false){
                    if(strpos($vurl,"&") != false){                        
                        $vurl = substr($vurl,strpos($vurl,"&"));
                    }
                }
            }
            $times = date("Y/m/d H:i:s");
            $SQL = "INSERT INTO teach_video (title,types,types2,notes,branch,ownerbranch,onlybranch,url,times) VALUES ('".$title."','".$types."','".$types2."','".$notes."','".$branch."','".$ownerbranch."','".$onlybranch."','".$vurl."','".$times."')";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            reURL("teach_video.php");
        }
    }

    if($_REQUEST["an"] != ""){
        $SQL = "SELECT * FROM teach_video where auton='".SqlFilter($_REQUEST["an"],"int");
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            call_alert("資料讀取錯誤。","ClOsE",0);
        }else{
            $types = $result["types"];
            $branch = $result["branch"];
            $title = $result["title"];
            $notes = $result["notes"];
            $onlybranch = $result["onlybranch"];
            $ownerbranch = $result["ownerbranch"];
            $types2 = $result["types2"];
            if($notes != ""){
                $notes = str_ireplace("\r\n","",$notes);                
            }
            $vurl = $result["url"];
            $fsq = "&an=".SqlFilter($_REQUEST["an"],"int");
            $fsb = "修改";
        }
    }else{
        $branch = "all";
	    $fsb = "新增";
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="teach_video.php">教學影片</a></li>
            <li class="active"><?php echo $fsb; ?>教學影片</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $fsb; ?>教學影片</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                    <tbody>
                        <form action="?st=add<?php echo $fsq; ?>" method="post" id="form1" onSubmit="return chk_form()">

                            <tr>
                                <td>
                                    類型： <select name="types" id="types" required>
                                        <option value="">請選擇</option>
                                        <option value="一般區"<?php if($types == "一般區") echo " selected"; ?>>一般區</option>
                                        <option value="管制區"<?php if($types == "管制區") echo " selected"; ?>>管制區(需督導授權)</option>
                                        <option value="限制區"<?php if($types == "限制區") echo " selected"; ?>>限制區(需總公司授權)</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    限制觀看會館：
                                    <?php
                                        // if(is_null($branch)) $branch = "all";       
                                        $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' and admin_name<>'好好玩旅行社' Order By admin_SOrt";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($result as $re){
                                            if(member_array($branch, $re["admin_name"]) == "1"){
                                                $cc = " checked";
                                            }else{
                                                $cc = "";
                                            }
                                            if($branch == "all"){
                                                $cc = " checked";
                                            }
                                            echo "<label style='display:inline;'><input style='width:20px;' data-no-uniform='true' type='checkbox' name='branch[]' value='".$re["admin_name"]."'".$cc.">".$re["admin_name"]."</label>&nbsp;&nbsp;";
                                        }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    提供會館：
                                    <?php
                                        // if(is_null($ownerbranch)) $ownerbranch = "all";                                                       
                                        $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' and admin_name<>'好好玩旅行社' Order By admin_SOrt";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($result as $re){
                                            if(member_array($ownerbranch, $re["admin_name"]) == "1"){
                                                $cc = " checked";
                                            }else{
                                                $cc = "";
                                            }
                                            if($ownerbranch == "all"){
                                                $cc = " checked";
                                            }
                                            echo "<label style='display:inline;'><input style='width:20px;' data-no-uniform='true' type='radio' name='ownerbranch' value='".$re["admin_name"]."'".$cc." required>".$re["admin_name"]."</label>&nbsp;&nbsp;";
                                        }
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="開發"<?php if($types2 == "開發") echo " checked"; ?>> 開發</label>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="邀約"<?php if($types2 == "邀約") echo " checked"; ?>> 邀約</label>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="訪談"<?php if($types2 == "訪談") echo " checked"; ?>> 訪談</label>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="排約"<?php if($types2 == "排約") echo " checked"; ?>> 排約</label>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="企劃"<?php if($types2 == "企劃") echo " checked"; ?>> 企劃</label>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="教育訓練"<?php if($types2 == "教育訓練") echo " checked"; ?>> 教育訓練</label>
                                    <label style="display:inline;"><input type="radio" style="width:20px;" name="types2" value="行銷"<?php if($types2 == "行銷") echo " checked"; ?>> 行銷</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><input type="checkbox" style="width:20px;" name="onlybranch" value="1"<?php if($onlybranch == 1) echo " checked"; ?>> 僅督導可見</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    影片標題： <input name="title" type="text" id="title" class="form-control" value="<?php echo $title; ?>" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    影片說明： <textarea type="text" name="notes" id="notes" class="form-control" style="width:80%;height:100px;font-size:13px;" rows=4><?php echo $notes; ?></textarea>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    影片位置： <input name="url" type="text" id="url" value="<?php echo $vurl; ?>" class="form-control" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div align="center">

                                        <input id="submit3" type="submit" value="確定<?php echo $fsb; ?>" class="btn btn-info" style="width:50%;">
                                    </div>
                                </td>
                            </tr>
                        </form>
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