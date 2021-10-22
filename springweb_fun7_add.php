<meta charset="utf-8" />

<script src="js/jquery-1.8.3.js"></script>
<form action="?st=save" method="post" target="_self" onsubmit="return chk_form()">
    <input type="hidden" name="t" value="">
    <input type="hidden" name="an" value="">
    <div>問題：<input type="text" name="quest" id="quest" style="width:80%;" value=""></div>
    <br>
    <div>答案：<textarea name="ans" id="ans" style="width:80%;height:100px;"></textarea></div>
    <div style="text-align:center;margin 0 auto;"><input type="submit" value="送出"></div>
</form>
<script type="text/javascript">
    function chk_form() {
        if (!$("#quest").val()) {
            alert("plz input question");
            $("#quest").focus();
            return false;
        }
        if (!$("#ans").val()) {
            alert("plz input answer");
            $("#ans").focus();
            return false;
        }

        return true;
    }
</script>