<meta charset="utf-8" />

<script src="js/jquery-1.8.3.js"></script>
<script src="js/util.js"></script>
<b>建立一個新小組</b>
<form method="post" action="team_manager_add.php?st=add" onsubmit="return chk_form()">
    <p>
        隸屬會館：<select name="branch" id="branch">

            <option value="" selected>請選擇</option>
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
        </select>
    </p>
    <p>小組名稱：<input type="text" style="width:50%;" name="team_name" id="team_name" value=""></p>
    <p>小組組長：<select name="team_leader" id="team_leader">
            <option value="">請選擇</option>
        </select></p>
    <p>小組目標：<input type="text" style="width:50%;" name="team_point" id="team_point" value="">(請輸入數字)</p>

    <p><input type="submit" value="確認送出"></p>
</form>

<script type="text/javascript">
    $(function() {
        $("#branch").on("change", function() {
            pay_personnel_get2("branch", "team_leader");
        });

    });

    function chk_form() {
        if (!$("#branch").val()) {
            alert("請選擇會館。");
            return false;
        }
        if (!$("#team_name").val()) {
            alert("請輸入小組名稱。");
            $("#team_name").focus();
            return false;
        }
        if (!$("#team_leader").val()) {
            alert("請選擇小組組長。");
            return false;
        }
        if (!$("#team_point").val()) {
            alert("請選擇小組目標。");
            return false;
        }
        var $re = /^\d+$/;
        if (!$re.test($("#team_point").val())) {
            alert("小組目標只能輸入數字。");
            $("#team_point").val("");
            $("#team_point").focus();
            return false;
        }
        return true;
    }
</script>