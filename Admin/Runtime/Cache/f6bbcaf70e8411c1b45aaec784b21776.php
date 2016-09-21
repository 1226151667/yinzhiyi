<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>博客后台管理系统</title>
		<link rel="stylesheet" href="__PUBLIC__/css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="__PUBLIC__/css/invalid.css" type="text/css" media="screen" />	
		<script type="text/javascript" src="__PUBLIC__/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/simpla.jquery.configuration.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/facebox.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery.datePicker.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery.date.js"></script>
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
				<a href="#">博客后台管理</a>
			</h1>
			<a href="#">
				<img id="logo" src="__PUBLIC__/images//logo.png" alt="Simpla Admin logo" />
			</a>
			<div id="profile-links">
				欢迎回来, 
				<a href="#" title="Edit your profile">John Doe</a><br /><br />
				<a href="#" title="View the Site">查看网站</a> | <a href="#" title="登出">登出</a>
			</div>        
			<ul id="main-nav">
				<li>
					<a href="#" class="nav-top-item no-submenu current">
						首页面板
					</a>       
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
	<div id="main-content"> <!-- Main Content Section with everything -->
		<h2>欢迎管理员 Tony</h2>
		<p id="page-intro">管理管理员</p>
		<div class="clear"></div>
		<a href="#" class="button">添加管理员</a><br /><br />
		<div class="content-box">
			<div class="content-box-header">
				<h3>管理员列表</h3>
				<div class="clear"></div>
			</div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1"> 
					<table>
						<thead>
							<tr>
							   <th>UID</th>
							   <th>管理员用户名</th>
							   <th>管理员真实姓名</th>
							   <th>操作</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>admin</td>
								<td>Tony</td>
								<td>
									<a href="#" title="Delete"><img src="__PUBLIC__/images/cross.png" alt="Delete" /></a> 
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>admin</td>
								<td>Tony</td>
								<td>
									<a href="#" title="Delete"><img src="__PUBLIC__/images/cross.png" alt="Delete" /></a> 
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>admin</td>
								<td>Tony</td>
								<td>
									<a href="#" title="Delete"><img src="__PUBLIC__/images/cross.png" alt="Delete" /></a> 
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>admin</td>
								<td>Tony</td>
								<td>
									<a href="#" title="Delete"><img src="__PUBLIC__/images/cross.png" alt="Delete" /></a> 
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>admin</td>
								<td>Tony</td>
								<td>
									<a href="#" title="Delete"><img src="__PUBLIC__/images/cross.png" alt="Delete" /></a> 
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>admin</td>
								<td>Tony</td>
								<td>
									<a href="#" title="Delete"><img src="__PUBLIC__/images/cross.png" alt="Delete" /></a> 
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>admin</td>
								<td>Tony</td>
								<td>
									<a href="#" title="Delete"><img src="__PUBLIC__/images/cross.png" alt="Delete" /></a> 
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>admin</td>
								<td>Tony</td>
								<td>
									<a href="#" title="Delete"><img src="__PUBLIC__/images/cross.png" alt="Delete" /></a> 
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="footer">
	<small>
		&#169; Copyright 2009 中俱来 <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
	</small>
</div>
	</div>
</div>
</body>
</html>