<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>博客后台管理系统 | 登录</title>
	<link rel="stylesheet" href="__PUBLIC__/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="__PUBLIC__/css/invalid.css" type="text/css" media="screen" />	
	<link href="__PUBLIC__/images/yinzhiyi.ico" rel="shortcut icon" type="image/x-icon" />
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="__PUBLIC__/css/ie.css" type="text/css" media="screen" />
	<![endif]-->
	<script type="text/javascript" src="__PUBLIC__/js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/simpla.jquery.configuration.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/facebox.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.wysiwyg.js"></script>
	<!--[if IE 6]>
		<script type="text/javascript" src="__PUBLIC__/js/DD_belatedPNG_0.0.7a.js"></script>
		<script type="text/javascript">
			DD_belatedPNG.fix('.png_bg, img, li');
		</script>
	<![endif]-->
</head>
<body id="login">
<div id="login-wrapper" class="png_bg">
	<div id="login-top">
		<h1>博客后台管理系统</h1>
		<img id="logo" src="__PUBLIC__/images/logo.png" alt="Simpla Admin logo" />
	</div>
	<div id="login-content">
		<form action="" method="post">
			<div class="notification information png_bg">
				<div>
					请输入用户名和密码登录
				</div>
			</div>
			<p>
				<label>用户名</label>
				<input class="text-input" name="uname" type="text" />
			</p>
			<div class="clear"></div>
			<p>
				<label>密码</label>
				<input class="text-input" name="pwd" type="password" />
			</p>
			<div class="clear"></div>
			<p id="remember-password">
				<input type="checkbox" name="remember" value="1" />记住我
			</p>
			<div class="clear"></div>
			<p>
				<!-- <input class="button" name="sub" type="submit" value="登录" /> -->
				<button style="width:100%;height:35px;" class="button" type="button">登 录</button>
			</p>
		</form>
	</div>
</div>
</body>
<script>
//enter键绑定点击事件
$(document).keydown(function(event){  
    if(event.keyCode==13){  
       $("button[class='button']").click();
    }
}); 
$("button[class='button']").click(function(){
	var uname = $("input[name='uname']").val();
	var pwd = $("input[name='pwd']").val();
	if(uname=='' || pwd==''){
		alert("输入不能为空");
	}else{
		$.post('<?php echo U(Index/login);?>',{uname:uname,pwd:pwd},function(data){
			if(data==0){
				window.location.href='<?php echo U("Index/index");?>';
			}
			if(data==1){
				alert("输入不能为空");
			}
			if(data==2){
				alert("密码错误");
			}
			if(data==3){
				alert("用户名不存在");
			}
		},"json");
	}
});
</script>
</html>