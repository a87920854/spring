<!-- SCROLL TO TOP -->
<a href="#" id="toTop"></a>

</div>
<!-- /WRAPPER -->
</body>

</html>

<div class="system_pageload">頁面載入時間 0.375 毫秒</div>

<!-- JAVASCRIPT FILES -->
<script type="text/javascript">
	var plugin_path = 'assets/plugins/';
</script>
<?php //顯示路徑
$pattern = '/^\/|(php)$/';
$string = $_SERVER['PHP_SELF'];
$href = preg_replace($pattern, '', $string);
echo "<script type='text/javascript'> \$nowmtu = '" . $href . "';</script>";
?>

<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="js/util.js"></script>