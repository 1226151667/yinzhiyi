<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!---网页标题前logo小图标---->
<link rel="shortcut icon" href="__PUBLIC__/images/rj_y.ico" type="image/x-icon">
<!---/网页标题前logo小图标---->
<title>无标题文档</title>
<link href="__PUBLIC__/css/enroll_base.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/enroll_style.css" rel="stylesheet" type="text/css" />
<script src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
</head>
<body>
<div id="enroll_bg">
	<div id="enroll_t">
    	<font>欢迎注册富升财经直播间</font>
		<form method="post" action="<?php echo U('Index/enroll');?>">
			<ul>
				<li><input style="width:47%;float:left;" name="uname" class="enroll_i" type="text" placeholder="用户名">
					<input style="width:47%;float:left;" name="nickName" class="enroll_i" type="text" placeholder="昵称">
				</li>
				<li>
					<input style="width:47%;float:left;" name="pwd1" class="enroll_i" type="password" placeholder="密码">
					<input style="width:47%;float:left;" name="pwd2" class="enroll_i" type="password" placeholder="确认密码">
				</li>
				<li>
					<input style="width:47%;float:left;" name="qq" class="enroll_i" type="text" placeholder="QQ">
					<input style="width:47%;float:left;" name="phone" class="enroll_i" type="text" placeholder="手机">
				</li>
			</ul>
			<div class="erl-register-footer">
				<a id="BtnLogin_erl" class="pg-btn-submit dinline-block " tabindex="3" href="javascript:;">注 册</a>
			 </div>
         </form>
    </div>
</div>

<script>
$("#enroll_bg").height($(document).height());
$("#BtnLogin_erl").click(function(){
	var uname = $("input[name='uname']").val().trim();
	var nickName = $("input[name='nickName']").val().trim();
	var pwd1 = $("input[name='pwd1']").val().trim();
	var pwd2 = $("input[name='pwd2']").val().trim();
	var qq = $("input[name='qq']").val().trim();
	var phone = $("input[name='phone']").val().trim();
	var rs = 0;
	if(uname=='' || nickName=='' || pwd1=='' ||pwd2=='' || qq=='' || phone==''){
		rs = 1;
		alert("所有选项都是必填项");
	}
	if(pwd1!=pwd2){
		rs = 1;
		alert("两次输入的密码不一致");
	}
	if(rs == 0){
		$('form').submit();
	}
});
</script>

</body>
</html>