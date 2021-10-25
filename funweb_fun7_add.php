<meta charset="utf-8" />

<script src="js/jquery-1.8.3.js"></script>
<script src="js/jquery.uploadify-3.1.min.js"></script>
<link href='css/uploadify.css' rel='stylesheet'>
<form method="post" action="?st=edit" onsubmit="return chk_form()">
    <p>活動訊息：<input type="text" name="n1" id="n1" value="" style="width:60%;"></p>
    <p>連結位置：<input type="text" name="n2" id="n2" value="" style="width:60%;">(無可免填)</p>
    <input type="hidden" name="aa" id="aa" value="">
    <div class="button">
        <div class="buttonContent"><input type="submit" value="確定送出"></div>
</form>

<script type="text/javascript">
    $(function() {});

    function chk_form() {
        if (!$("#n1").val()) {
            alert("最少要輸入活動訊息。");
            $("#n1").focus();
            return false;
        }
        return true;
    }
</script>