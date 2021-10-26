<meta charset="utf-8" />
<script src="js/jquery-1.8.3.js"></script>
<p>禮物管理</p>
<form method="post" action="singleweb_fun15_add.asp?st=edit">
    <p>
        <label>禮物名稱：</label>
        <input type="text" id="names" name="names" value="" size=60 />
    </p>
    <p>
        <label>檔名：</label>
        <input type="text" id="url" name="url" value="" size=60 />
    </p>

    </div>
    <input type="hidden" name="an" value="">
    <div class="button"><input type="submit" value="送出"></div>
</form>

<script type="text/javascript">
    $(function() {
        $("#names").focus();
    });
</script>