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
            <li><a href="index.asp">管理系統</a></li>
            <li><a href="ad_mem.asp">會員管理系統</a></li>
            <li class="active">收支明細 - 謝汶霖</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>收支明細 - 謝汶霖</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>全省實收總計：28000</p>
                <div id="resetdiv" class="collapse">
                    <p>
                    <form method="post" action="ad_mem_pay_detail.asp">
                        重置日期：<input type="text" name="reset_time" id="reset_time" placeholder="重置日期" class="datepicker" value="2021-12-03" required>
                        <input type="text" name="reset_beca" id="reset_beca" placeholder="請輸入重置原因" class="form-control2" required>
                        <input type="hidden" name="st" value="resetpay">
                        <input type="hidden" name="mem_username" value="A129734157">
                        <input type="submit" value="確定插入重置記錄" class="btn btn-xs btn-black">
                    </form>
                    </p>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable input_small">
                    <tbody>
                        <tr>
                            <td>
                                <table width="900" border="0" align="center" cellpadding="3">
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
                                                <font color="#FF0000" size="3">247661</font>
                                            </div>
                                        </td>
                                        <td height="30" bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">2021年11月30日</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">0/0</div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">(
                                                    台北 )<br>詹善宇</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">謝汶霖</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">A129734157</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">81</font>
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
                                                <font color="#000066">入會-菁英專案六個月</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000099" size="3">28000</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#003300" size="3">28000</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">1000</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">0</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">27000</font>
                                            </div>
                                        </td>
                                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                                            <div align="center">
                                                <font color="#000066">0</font>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan=4 bgcolor="#FBE6E8"></td>
                                        <td height="30" align="center" bgcolor="#FFFFD2" style="word-break:break-all"></td>
                                        <td height="30" align="center" bgcolor="#FFFFD2" style="word-break:break-all"></td>
                                        <td height="30" align="center" bgcolor="#FFFFD2" style="word-break:break-all">仲信</td>
                                        <td height="30" align="center" bgcolor="#FFFFD2" style="word-break:break-all"></td>
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
                                                        <div align="center">八德</div>
                                                    </td>
                                                    <td>
                                                        <div align="center">16800</div>
                                                    </td>
                                                </tr>

                                                <tr bgcolor="#F0F0F0">
                                                    <td>
                                                        <div align="center">台北</div>
                                                    </td>
                                                    <td>
                                                        <div align="center">11200</div>
                                                    </td>
                                                </tr>

                                            </table>
                                            <table width="450" border="0" align="center" cellpadding="2">


                                            </table>
                                        </td>
                                        <td colspan="4" width="50%" style="word-break:break-all">
                                            <div align="center">
                                                <table width="450" border="0" align="center" cellpadding="3">
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
                                                            <div align="center">劉宜姍</div>
                                                        </td>
                                                        <td>
                                                            <div align="center">11200</div>
                                                        </td>
                                                    </tr>

                                                    <tr bgcolor="#F0F0F0">
                                                        <td>
                                                            <div align="center">台北</div>
                                                        </td>
                                                        <td>
                                                            <div align="center">詹善宇</div>
                                                        </td>
                                                        <td>
                                                            <div align="center">11200</div>
                                                        </td>
                                                    </tr>

                                                    <tr bgcolor="#F0F0F0">
                                                        <td>
                                                            <div align="center">八德</div>
                                                        </td>
                                                        <td>
                                                            <div align="center">網站行銷</div>
                                                        </td>
                                                        <td>
                                                            <div align="center">5600</div>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>