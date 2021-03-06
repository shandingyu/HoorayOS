<?php
	require('../../global.php');
	require('inc/setting.inc.php');
	
	switch($ac){
		case 'update':
			$db->update(0, 0, 'tb_member', "skin = '$skin'", 'and tbid = '.$_SESSION['member']['id']);
			break;
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>皮肤设置</title>
<?php include('sysapp/global_css.php'); ?>
<link rel="stylesheet" href="../../img/ui/sys.css">
</head>

<body>
	<div class="title">
		<ul>
			<li><a href="../wallpaper/index.php">壁纸设置</a></li>
			<li class="focus">皮肤设置</li>
		</ul>
	</div>
	<ul class="skin">
		<li skin="default"><img src="../../img/ui/skin_default.png"></li>
		<li skin="qq"><img src="../../img/ui/skin_qq.png"></li>
		<li skin="mac"><img src="../../img/ui/skin_mac.png"></li>
		<li skin="chrome"><img src="../../img/ui/skin_chrome.png"></li>
		<li skin="ext"><img src="../../img/ui/skin_ext.png"></li>
	</ul>
<?php include('sysapp/global_js.php'); ?>
<script>
$(function(){
	$('.skin li').on('click',function(){
		var skin = $(this).attr('skin');
		$.ajax({
			url : 'index.ajax.php',
			data : 'ac=update&skin=' + skin,
			success : function(){
				window.parent.ZENG.msgbox.show("设置成功，如果没有更新请刷新页面", 4, 2000);
				window.parent.HROS.base.getSkin();
			}
		});
	});
});
</script>
</body>
</html>