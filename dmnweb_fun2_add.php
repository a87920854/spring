<meta charset="utf-8" />

<script src="js/jquery-1.8.3.js"></script>
<form action="?st=save" method="post" target="_self" onsubmit="return chk_form()">
    <input type="hidden" name="t" value="">
    <input type="hidden" name="an" value="">
    <div>頁面檔名：<input type="text" name="page" id="page" style="width:60%;" value="">(如 index.php)</div>
    <br>
    <div style="line-height:30px;">標題(title)：<input type="text" name="title" id="title" style="width:60%;" value=""></div>
    <div style="line-height:30px;" style="line-height:30px;">描述(description)：<input type="text" name="description" id="description" style="width:60%;" value=""></div>
    <div style="line-height:30px;">關鍵字(keywords)：<input type="text" name="keywords" id="keywords" style="width:60%;" value=""></div>
    <div style="text-align:center;margin: 0 auto;"><input type="submit" value="送出"></div>
</form>
<script type="text/javascript">
    function chk_form() {
        if (!$("#page").val()) {
            alert("plz input page");
            $("#page").focus();
            return false;
        }
        if (!$("#title").val()) {
            alert("plz input title");
            $("#title").focus();
            return false;
        }
        if (!$("#description").val()) {
            alert("plz input description");
            $("#description").focus();
            return false;
        }
        if (!$("#keywords").val()) {
            alert("plz input keywords");
            $("#keywords").focus();
            return false;
        }
        return true;
    }
</script>