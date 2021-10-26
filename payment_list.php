<?php
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_master_index.php">督導管理系統</a></li>
            <li class="active">財務管理系統</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>財務管理系統</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p><input type="button" class="btn btn-info" onclick="Mars_popup('payment_pay_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=900,height=600,top=150,left=150');" value="新增收入憑證">
                        <!--       			<input type="button" class="btn btn-default" onclick="Mars_popup('payment_pay_add_.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=900,height=600,top=150,left=150');" value="新增憑證(新)">-->
                    </p>

                    <select name="branch" id="branch">
                        <option value="" selected>會館</option>
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
                    </select> <select name="keyword_type" id="keyword_type">
                        <option value="s2">姓名</option>
                        <option value="s3">身分證字號</option>
                        <option value="s1">編號</option>
                    </select>
                    <input id="keyword" name="keyword" id="keyword" type="text" class="form-control2">
                    <button id="search_send" class="btn btn-default" type="button">送出</button>
                </div>

                <div class="col-md-12 margin-top-20">

                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235686</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月28日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">3600</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">2700</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">2700</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">900</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235685</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月28日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">1100</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">800</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">唐慧琳</div>
                                            </td>
                                            <td>
                                                <div align="center">800</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">唐慧琳</div>
                                            </td>
                                            <td>
                                                <div align="center">300</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235684</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月28日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">300</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">300</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">八德</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">300</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">八德</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">0</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235580</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月27日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">2600</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">2000</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">2000</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">600</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235461</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月20日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br>唐慧琳</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">程傑敬</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">H128166152</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">57</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">大學</font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">入會-菁英專案三個月</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3">10000</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">10000</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">0</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">0</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">0</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">10000</font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">10000</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">唐慧琳</div>
                                            </td>
                                            <td>
                                                <div align="center">9700</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235459</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月21日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">300</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">300</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">唐慧琳</div>
                                            </td>
                                            <td>
                                                <div align="center">300</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">唐慧琳</div>
                                            </td>
                                            <td>
                                                <div align="center">0</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235458</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月21日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">900</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">900</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">八德</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">900</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">八德</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">0</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235457</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月21日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">2400</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">1800</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">1800</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">600</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235335</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月20日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">600</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">600</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">600</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">0</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235192</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月9日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">600</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">300</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">300</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">300</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235111</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月7日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">2100</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">1200</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">1200</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">900</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235110</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月7日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">2300</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">2000</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">2000</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">300</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235075</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月6日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">600</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">300</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">唐慧琳</div>
                                            </td>
                                            <td>
                                                <div align="center">300</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">唐慧琳</div>
                                            </td>
                                            <td>
                                                <div align="center">300</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235074</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月6日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">3000</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">2100</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">2100</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">900</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">235073</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月6日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">2400</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">1800</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">1800</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">600</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">234974</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年2月2日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">600</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">600</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">600</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">0</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">234922</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年1月31日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">1800</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">1200</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">1200</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">張利</div>
                                            </td>
                                            <td>
                                                <div align="center">600</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">234921</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年1月31日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">900</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">300</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">唐慧琳</div>
                                            </td>
                                            <td>
                                                <div align="center">600</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">唐慧琳</div>
                                            </td>
                                            <td>
                                                <div align="center">300</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">234920</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年1月31日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">3300</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">2400</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">八德</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">2400</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">八德</div>
                                            </td>
                                            <td>
                                                <div align="center">柯婉儀</div>
                                            </td>
                                            <td>
                                                <div align="center">900</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>


                    <table width="700" border="0" align="center" cellpadding="3">
                        <tr>
                            <td width="70" bgcolor="#FBE6E8">
                                <div align="center">編號</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">日期</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">服務成本</div>
                            </td>
                            <td width="95" bgcolor="#FBE6E8">
                                <div align="center">受理秘書</div>
                            </td>
                            <td width="80" bgcolor="#FBE6E8">
                                <div align="center">姓名</div>
                            </td>
                            <td width="90" bgcolor="#FBE6E8">
                                <div align="center">身分證字號</div>
                            </td>
                            <td width="60" bgcolor="#FBE6E8">
                                <div align="center">年次</div>
                            </td>
                            <td width="72" bgcolor="#FBE6E8">
                                <div align="center">學歷</div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#FF0000" size="3">234842</font>
                                </div>
                            </td>
                            <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">2021年1月30日</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">0/0</div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">(
                                        總管理處 )<br></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#FBE6E8" style="word-break:break-all">
                                <div align="center">摘要及說明</div>
                            </td>
                            <td bgcolor="#D7EBFF" style="word-break:break-all">
                                <div align="center">應收金額</div>
                            </td>
                            <td bgcolor="#E1FFE1" style="word-break:break-all">
                                <div align="center">實收金額</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">現金</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">超商繳費</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">轉帳</div>
                            </td>
                            <td bgcolor="#FFFFD2" style="word-break:break-all">
                                <div align="center">刷卡</div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">排約-</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000099" size="3"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#003300" size="3">600</font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066"></font>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <table width="450" border="0" align="center" cellpadding="3">
                                    <tr bgcolor="#FFEBD7">
                                        <td width="165">
                                            <div align="center">會館</div>
                                        </td>
                                        <td width="167">
                                            <div align="center">會館業績</div>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#F0F0F0">
                                        <td>
                                            <div align="center">總管理處</div>
                                        </td>
                                        <td>
                                            <div align="center">300</div>
                                        </td>
                                    </tr>

                                </table>
                                <table width="450" border="0" align="center" cellpadding="2">


                                </table>
                            </td>
                            <td colspan="4" width="50%" style="word-break:break-all">
                                <div align="center">
                                    <table width="325" border="0" align="center" cellpadding="3">
                                        <tr bgcolor="#F0E1E1">
                                            <td width="98">
                                                <div align="center">會館</div>
                                            </td>
                                            <td width="100">
                                                <div align="center">秘書</div>
                                            </td>
                                            <td width="101">
                                                <div align="center">秘書業績</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">唐慧琳</div>
                                            </td>
                                            <td>
                                                <div align="center">300</div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#F0F0F0">
                                            <td>
                                                <div align="center">總管理處</div>
                                            </td>
                                            <td>
                                                <div align="center">唐慧琳</div>
                                            </td>
                                            <td>
                                                <div align="center">300</div>
                                            </td>
                                        </tr>

                                    </table>
                            </td>
                        </tr>
                    </table>
                    <p></p>



                </div>
                <div class="text-center">共 286 筆、第 1 頁／共 15 頁&nbsp;&nbsp;
                    <ul class='pagination pagination-md'>
                        <li><a href=/payment_list.php?topage=1>第一頁</a></li>
                        <li class='active'><a href="#">1</a></li>
                        <li><a href=/payment_list.php?topage=2 class='text'>2</a></li>
                        <li><a href=/payment_list.php?topage=3 class='text'>3</a></li>
                        <li><a href=/payment_list.php?topage=4 class='text'>4</a></li>
                        <li><a href=/payment_list.php?topage=5 class='text'>5</a></li>
                        <li><a href=/payment_list.php?topage=6 class='text'>6</a></li>
                        <li><a href=/payment_list.php?topage=7 class='text'>7</a></li>
                        <li><a href=/payment_list.php?topage=8 class='text'>8</a></li>
                        <li><a href=/payment_list.php?topage=9 class='text'>9</a></li>
                        <li><a href=/payment_list.php?topage=10 class='text'>10</a></li>
                        <li><a href=/payment_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                        <li><a href=/payment_list.php?topage=15 class='text'>最後一頁</a></li>
                        <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="/payment_list.php?topage=1" selected>1</option>
                                <option value="/payment_list.php?topage=2">2</option>
                                <option value="/payment_list.php?topage=3">3</option>
                                <option value="/payment_list.php?topage=4">4</option>
                                <option value="/payment_list.php?topage=5">5</option>
                                <option value="/payment_list.php?topage=6">6</option>
                                <option value="/payment_list.php?topage=7">7</option>
                                <option value="/payment_list.php?topage=8">8</option>
                                <option value="/payment_list.php?topage=9">9</option>
                                <option value="/payment_list.php?topage=10">10</option>
                                <option value="/payment_list.php?topage=11">11</option>
                                <option value="/payment_list.php?topage=12">12</option>
                                <option value="/payment_list.php?topage=13">13</option>
                                <option value="/payment_list.php?topage=14">14</option>
                                <option value="/payment_list.php?topage=15">15</option>
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
require_once("./include/_bottom.php");
?>