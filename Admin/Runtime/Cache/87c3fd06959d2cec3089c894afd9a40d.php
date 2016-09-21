<?php if (!defined('THINK_PATH')) exit();?><!-- 引入导航栏html模板 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>富升财经</title>
		<link rel="stylesheet" href="__PUBLIC__/css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="__PUBLIC__/css/invalid.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="__PUBLIC__/css/log.css" type="text/css" media="screen" />	
<!-- 		// <script type="text/javascript" src="__PUBLIC__/js/jquery-2.2.3.js"></script> -->
		<script type="text/javascript" src="__PUBLIC__/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/simpla.jquery.configuration.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/facebox.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery.datePicker.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery.date.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/log.js"></script>
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
			<a href="#">
				<img id="logo" src="__PUBLIC__/images/logo.png" alt="Simpla Admin logo" />
			</a>
			<div id="profile-links">
				欢迎回来, 
				<a href="#" title="Edit your profile">jess lu</a><br /><br />
				<a href="index.php" title="View the Site">查看网站</a> | <a href="#" title="登出">登出</a>
			</div>        
			<ul id="main-nav">
				<li>
					<a href="#" class="nav-top-item">
						系统设置
					</a>
					<ul>
						<li><a href="Index/subjectTable">课程表</a></li>
						<li><a href="#">添加管理员</a></li>
						<li><a href="#">管理管理员</a></li>
					</ul>       
				</li>
				<li>
					<a href="#" class="nav-top-item">
						博客设置
					</a>
					<ul>
						<li><a href="#">基本信息设定</a></li>
						<li><a href="#">添加管理员</a></li>
						<li><a href="#">管理管理员</a></li>
					</ul>
				</li>
				<li> 
					<a href="#" class="nav-top-item">
						文章管理
					</a>
					<ul>
						<li><a href="#">添加新文章</a></li>
						<li><a href="#">管理文章</a></li>
						<li><a href="#">管理文章评论</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="nav-top-item">
						文章类型管理
					</a>
					<ul>
						<li><a href="#">添加新的类别</a></li>
						<li><a href="#">管理文章类别</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<div id="main-content" class="index">
		<h2>欢迎管理员 Tony</h2>
		<p id="page-intro">你想要做什么?</p>
		<ul class="shortcut-buttons-set">
			<li>
				<a class="shortcut-button" href="#">
					<span>
						<img src="__PUBLIC__/images/pencil_48.png" alt="icon" /><br />写一篇新的文章
					</span>
				</a>
			</li>
			<li>
				<a class="shortcut-button" href="#">
					<span>
						<img src="__PUBLIC__/images/paper_content_pencil_48.png" alt="icon" /><br />管理文章
					</span>
				</a>
			</li>
			<li>
				<a class="shortcut-button" href="#">
					<span>
						<img src="__PUBLIC__/images/image_add_48.png" alt="icon" /><br />类别管理
					</span>
				</a>
			</li>
			<li>
				<a class="shortcut-button" href="#messages">
					<span>
						<img src="__PUBLIC__/images/comment_48.png" alt="icon" /><br />修改密码
					</span>
				</a>
			</li>
		</ul>
		<div class="clear"></div>
		<div class="content-box column-left">
			<div class="content-box-header">
				<h3>公司相关</h3>
			</div>
			<div class="content-box-content">
				<div class="tab-content default-tab">
					<h4>公司经营</h4>
					<p>
						大宗商品和贵金属电子交易平台技术支持和技术服务。
						实力会员单位诚聘优秀公司代理
						汽油 白银 铜 正规平台 资金安全
						商务局批文 中石大国资控股
						农行、建行托管 资金秒入秒出
						多元世纪软件，盘面稳定，不卡仓滑点
					</p>
				</div>    
			</div>
		</div>
		<div class="content-box column-right">
			<div class="content-box-header">
				<h3>系统使用规则</h3>
			</div>
			<div class="content-box-content">
				<div class="tab-content default-tab">
					<h4>注意点一</h4>
					<p>
						需要专业的后台管理员。
					</p>
				</div>     
			</div>
		</div>
		<div class="clear"></div>
		<div id="footer">
	<small>
		&#169; Copyright 2009 中俱来 <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
	</small>
</div>
	</div>
</div>
</body>
</html>