<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>富升财经</title>
		<link rel="stylesheet" href="__PUBLIC__/css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="__PUBLIC__/css/invalid.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="__PUBLIC__/css/log.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="__PUBLIC__/css/subjectTable.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="__PUBLIC__/css/ipBanTable.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="__PUBLIC__/css/index.css" type="text/css" media="screen" />
		<link href="__PUBLIC__/images/yinzhiyi.ico" rel="shortcut icon" type="image/x-icon" />
		<script type="text/javascript" src="__PUBLIC__/js/jquery-2.2.3.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/simpla.jquery.configuration.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/facebox.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery.datePicker.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery.date.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/log.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/subjectTable.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/ipBanTable.js"></script>
		<!-- 柱形图专用 -->
  		<script type="text/javascript" src="__PUBLIC__/js/highcharts.js"></script>
  		<script type="text/javascript" src="__PUBLIC__/js/exporting.js"></script>
		<!--[if IE]><script type="text/javascript" src="__PUBLIC__/js/jquery.bgiframe.js"></script><![endif]-->
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="__PUBLIC__/js/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->	
	
	</head>
<body>
<div id="body-wrapper">
	<div id="sidebar">
		<div id="sidebar-wrapper">
			<h1 id="sidebar-title">
				<a href="#">富升财经后台管理</a>
			</h1>
			<a href="<?php echo U('Index/index');?>">
				<img id="logo" src="__PUBLIC__/images/logo.png" alt="Simpla Admin logo" />
			</a>
			<div id="profile-links">
				欢迎回来, 
				<a href="#" title="Edit your profile"><?php echo $uname;?></a><br /><br />
				<a href="/yinzhiyi/index.php" title="View the Site">网站首页</a> | <a href="<?php echo U('Index/logout');?>" title="登出">登出</a>
			</div>        
			<ul id="main-nav">
				<li>
					<a href="<?php echo U('Index/index');?>" class="nav-top-item">
						管理端
					</a>
					<ul>
						<li><a href="<?php echo U('Index/index');?>">首页</a></li>
						<li><a href="<?php echo U('Index/baseinfo');?>">网站基础设置</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="nav-top-item">
						系统
					</a>
					<ul>
						<li><a href="<?php echo U('Index/announcement');?>">公告</a></li>
						<li><a href="<?php echo U('Index/say');?>">喊单</a></li>
						<li><a href="<?php echo U('Index/yy');?>">YY直播</a></li>
						<li><a href="<?php echo U('Index/subjectTable');?>">课程表</a></li>
						<li><a href="<?php echo U('Index/ipBanTable');?>">IP屏蔽</a></li>
						<li><a href="<?php echo U('Index/systemTable');?>">系统消息</a></li>
						<li><a href="#">抽奖记录</a></li>
						<li><a href="#">短信记录</a></li>
					</ul>       
				</li>
				<li> 
					<a href="#" class="nav-top-item">
						用户
					</a>
					<ul>
						<li><a href="<?php echo U('Index/user');?>">全部会员</a></li>
						<li><a href="<?php echo U('Index/userType');?>">会员分组</a></li>
						<li><a href="<?php echo U('Index/tmpuser');?>">全部游客</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="nav-top-item">
						管理员
					</a>
					<ul>
						<li><a href="<?php echo U('Index/empUser');?>">全部管理员</a></li>
						<li><a href="<?php echo U('Index/empUserType');?>">管理员分组</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="nav-top-item">
						功能
					</a>
					<ul>
						<li><a href="#">添加新的类别</a></li>
						<li><a href="#">管理文章类别</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	
	<div id="main-content"> <!-- Main Content Section with everything -->
		<h2>欢迎管理员 <?php echo $uname;?></h2>
		<p id="page-intro">全部管理员</p>
		<div class="clear"></div>
		<div class="content-box">
			<div class="content-box-header">
				<h3>全部管理员</h3>
				<div class="clear"></div>
			</div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
<!-- 					<div class="tbTop" name="Index">ipban</div>
					<div class="tbBody" name="ip">IP</div>
					<div class="tbBody" name="nickname">昵称</div>
					<div class="tbBody" name="group">分组</div>
					<div class="tbBody" name="manageIp">操作者IP</div>
					<div class="tbBody" name="tm">时间</div>
					<div class="tbBody" name="note">备注</div>  -->
					<div id="operate">
					   <input type="text" name="likeName" />
					   <button class="search">搜&nbsp;&nbsp;&nbsp;索</button>
					   <button class="all">显示全部</button>
					   <button class="delete">删除选中项</button>
					   <button id="edit">添加</button>
					</div>
					<hr />
					<table>
						<thead>
							<tr>
							   <th>编号</th>
							   <th>选择</th> 
							   <th>用户名</th>
							   <th>昵称</th>
							   <th>性别</th>
							   <th>手机</th>
							   <th>所在组</th>
							   <th>添加时间</th>
							</tr>
						</thead>
						<tbody>
							<?php
 foreach($list as $row){ ?>
							<tr class="db">
								<td><?php echo $row['id'];?></td>
								<td><input type="checkbox" name="<?php echo $row['id'];?>" /></td>
								<td><?php echo $row['uname'];?></td>
								<td><?php echo $row['nickName'];?></td>
								<td><?php $sex = ($row['sex']==0)?"男":"女";echo $sex;?></td>
								<td><?php echo $row['phone'];?></td>
								<td><?php echo $row['rankName'];?></td>
								<td><?php echo $row['tm'];?></td>
							</tr>
							<?php
 } ?>
						</tbody>
					</table>
					<?php echo '<br />'.$page;?>
				</div>
			</div>
		</div>
		<div id="footer">
	<small>
		&#169; Copyright 2009 中俱来 <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
	</small>
</div>
	</div>

	<div id="log" class="subjectTable">
		<div class="log_t">
			<span>添加页</span>
			<a class="close">×</a>
		</div>
		<form method="post" action="<?php echo U('Index/empUser');?>">
			<div class="log_ipt" style="display:none;">
				<label>id:</label>
				<input type="text"  name="id" />
			</div>
			<div class="log_ipt">
				<label>用户名:</label>
				<input type="text" name="uname" />*
			</div>
			<div class="log_ipt">
				<label>昵称:</label>
				<input type="text" name="nickName" />*
			</div>
			<div class="log_ipt set">
				<label>登录密码:</label>
				<input type="password" name="pwd1" />*
			</div>
			<div class="log_ipt reset" style="display:none;">
				<label>重置密码:</label>
				<input type="password" name="pwd1" placeholder="需要重置密码，在此填写" />
			</div>
			<div class="log_ipt">
				<label>再次输入:</label>
				<input type="password" name="pwd2" />
			</div>
			<div class="log_ipt">
				<label>性别:</label>
				<select name="sex">
					<option value="0">男</option>
					<option value="1">女</option>
				</select>
			</div>
			<div class="log_ipt">
				<label>电话:</label>
				<input type="text" name="phone" />
			</div>
			<div class="log_ipt">
				<label>所在组:</label>
				<select name="rankId">
					<?php
 foreach($rankList as $row){ ?>
					<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
					<?php
 } ?>
				</select>*
			</div>
			<div class="sub">
				<span>所有选项请认真填写</span><br />
				<button name="sub" type="button">提&nbsp;&nbsp;&nbsp;&nbsp;交</button>
			</div>
		</form>
	</div>
</div>
</body>
<script>
$(function(){
	//模糊搜索
	$("button[class='search']").click(function(){
		var likeName = $("input[name='likeName']").val();
		if(likeName==""){
			alert("请输入搜索内容");
		}else{
			window.location.href="empUser/name/"+ likeName;
		}
	});
	//删除
	$("button[class='delete']").click(function(){
		var checkbox = $("input[type='checkbox']");
		var del = "";
		$.each(checkbox,function(i,v){
			var rs = $(v).is(":checked");
			if(rs){
				var id = $(v).attr("name");
				del += id+",";	
			}
		});
		if(del == ""){
			alert("没有选择的项");
		}else{
			window.location.href="empUser/del/"+ del;
		}
	});
	//查看全部
	$("button[class='all']").click(function(){
		window.location.href="<?php echo U('Index/empUser');?>";
	});
	//添加or修改
	$("button[name='sub']").click(function(){
		var pageType = $(".log_t span").html();
		var uname = $("input[name='uname']").val();
		var nickName = $("input[name='nickName']").val();
		var pwd1 = $("input[name='pwd1']").val();
		var pwd2 = $("input[name='pwd2']").val();
		var rs = 0;
		if(pageType=="修改页"){
			if(uname=="" || nickName==""){
				alert("所有带*号项都是必填项");
				rs=1;
			}
			if(pwd1 !="" && pwd2 !="" ){
				if(pwd1!=pwd2){
					alert("两次输入的密码不一致");
					rs=1;
				}
			}
		}
		if(pageType=="添加页"){
			if(uname=="" || nickName=="" ||　pwd1==""){
				alert("所有带*号项都是必填项");
				rs=1;
			}
			if(pwd1 != pwd2){
				alert("两次输入的密码不一致");
				rs=1;
			}
		}
		if(rs==0){
			$("form").submit();
		}
	});
	$("#edit").click(function(){
		$(".set").css({'display':'block'});
		$(".reset").css({'display':'none'});
	});
	var edit = $(".db");
	edit.dblclick(function(){
		var id = $(this).find("input[type='checkbox']").attr("name");
		$.get(
			'<?php echo U("Index/empUser");?>',
			{id:id},
			function(data){
				$(".log_t span").text("修改页");
				$(".set").css({'display':'none'});
				$(".reset").css({'display':'block'});
				$("input[name='uname']").val(data.uname);
				$("input[name='nickName']").val(data.nickName);
				$("input[name='phone']").val(data.phone);
				var rank = $("select[name='rankId']");
				var sexs = $("select[name='sex']");
				rank.find("option[value='"+data.rankId+"']").attr("selected","selected");
				sexs.find("option[value='"+data.sex+"']").attr("selected","selected");
				$("input[name='id']").val(data.id);
			},
			"json"
		);
		$(".log_t").css({
			"display":"block",
			"opacity":"1",
			"filter":"alpha(opacity=100)",
		});
		$("body").append("<div id='mask'></div>");  
		$("#mask").addClass("mask").fadeIn("slow"); //使用雾罩把屏幕罩住
		$('#log').fadeIn("slow");
	});
});
</script>
</html>