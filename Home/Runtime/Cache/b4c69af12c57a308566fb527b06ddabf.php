<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!---网页标题前logo小图标---->
<link rel="shortcut icon" href="__PUBLIC__/images/rj_y.ico" type="image/x-icon">
<!---/网页标题前logo小图标---->
<title>无标题文档</title>
<link href="__PUBLIC__/css/land_base.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/land_style.css" rel="stylesheet" type="text/css" />
<script src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
</head>
<body>
<div id="login_bg">
	<div id="land_t">
    	<font>富升财经直播间</font>
		<form method="post" action="">
			<ul>
				<li><input name="uname" class="land_i" type="text" placeholder="请输入用户名"></li>
				<li>
					<input name="pwd" class="land_i" type="password" placeholder="请输入密码">
				</li>
			</ul>
			<div class="clearfix" id="land_pass">
				<label class="fl land_load">
				<!-- <input type="checkbox" name="psw" class="psw" value="psw" />&nbsp;&nbsp;下次自动等登录</label> -->
				<!-- <a class="rpsw fr" href="#">忘记密码？</a> -->
			</div>
			<div class="crm-register-footer">
				<a id="BtnLogin" class="pg-btn-submit dinline-block " tabindex="3" href="javascript:;">登 录</a>
			 </div>
		 </form>
         <p class="crm-loginfooter-info">
            没有账号?
            <a class="register_link" tabindex="6" href="enroll">免费注册</a>
         </p>
    </div>
</div>

<script>
$("#login_bg").height($(document).height());
$(document).keydown(function(event){
	if(event.keyCode==13){
		$("#BtnLogin").click();
	}
});
$("#BtnLogin").click(function(){
	var uname = $("input[name='uname']").val().trim();
	var pwd = $("input[name='pwd']").val().trim();
	if(uname=='' || pwd==''){
		alert("输入不能为空");
	}else{
		$('form').submit();
	}
});
</script>

</body>
</html>