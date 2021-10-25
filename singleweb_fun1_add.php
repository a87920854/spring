<meta charset="utf-8" />
<script src="js/jquery-1.8.3.js"></script>
<form action="?st=save" method="post" target="_self" onsubmit="return chk_form()">
    <input type="hidden" name="t" value="ed">
    <input type="hidden" name="an" value="22">
    <div>頁面檔名：<input type="text" name="page" id="page" style="width:60%;" value="index.asp">(如 index.asp)</div>
    <br>
    <div style="line-height:30px;">標題(title)：<input type="text" name="title" id="title" style="width:60%;" value="約會專家 - 穿越不同交友平台，約到最適合的情人"></div>
    <div style="line-height:30px;" style="line-height:30px;">描述(description)：<input type="text" name="description" id="description" style="width:60%;" value="約會專家是一個結合多家大型交友聯誼網站、實體婚友配對、及頂尖兩性愛情的媒合平台。"></div>
    <div style="line-height:30px;">關鍵字(keywords)：<input type="text" name="keywords" id="keywords" style="width:60%;" value="約會,主題約會,戀愛,交友,聯誼,相親,婚友社,配對,愛情,Dating"></div>
    <div style="text-align:center;margin 0 auto;"><input type="submit" value="送出"></div>
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