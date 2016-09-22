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
				<a target="_blank" href="<?php echo __ROOT__.'/index.php';?>" title="View the Site">网站首页</a> | <a href="<?php echo U('Index/logout');?>" title="登出">登出</a>
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
						<li><a href="<?php echo U('Index/column');?>">栏目</a></li>
						<li><a href="<?php echo U('Index/announcement');?>">公告</a></li>
						<li><a href="<?php echo U('Index/say');?>">喊单</a></li>
						<li><a href="<?php echo U('Index/yy');?>">YY直播</a></li>
						<li><a href="<?php echo U('Index/subjectTable');?>">课程表</a></li>
						<li><a href="<?php echo U('Index/systemTable');?>">系统消息</a></li>
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
			</ul>
		</div>
	</div>
	
	<div id="main-content"> <!-- Main Content Section with everything -->
		<h2>欢迎管理员 <?php echo $uname;?></h2>
		<p id="page-intro">网站基础设置</p>
		<div class="clear"></div>
		<div class="content-box">
			<div class="content-box-header">
				<h3>网站基础设置</h3>
				<div class="clear"></div>
			</div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1">
					<div id="operate">
<!-- 					   <input type="text" name="likeName" />
					   <button class="search">搜&nbsp;&nbsp;&nbsp;索</button>
					   <button class="all">显示全部</button> -->
					   <button class="delete">删除选中项</button>
					   <button id="edit">添加</button>
					</div>
					<hr />
					<table>
						<thead>
							<tr>
							   <th>编号</th>
							   <th>选择</th>
							   <th>页面</th>
							   <th>标题</th>
							   <th>关键词</th>
							   <th>描述</th>
							   <th>qq弹窗</th>
							   <th>在线人数</th>
							   <th>图片(仅首页为logo,其余都作为banner)</th>             
							</tr>
						</thead>
						<tbody>
							<?php
 foreach($list as $row){ ?>
							<tr class="db">
								<td><?php echo $row['id'];?></td>
								<td><input type="checkbox" name="<?php echo $row['id'];?>" /></td>
								<td><a target="_blank" href="<?php echo __ROOT__.'/index.php/Index/'.$row['page'];?>"><?php echo $row['page'];?></a></td>
								<td><textarea disabled="disabled" rows="5" cols="15"><?php echo $row['title'];?></textarea></td>
								<td><textarea disabled="disabled" rows="5" cols="15"><?php echo $row['key'];?></textarea></td>
								<td><textarea disabled="disabled" rows="5" cols="15"><?php echo $row['description'];?></textarea></td>
								<td><?php echo $row['qq'];?></td>
								<td><?php echo $row['onlineCnt'];?></td>
								<td><img style="width:300px;" src="<?php echo $row['logo'];?>"></td>
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
		<form method="post" enctype="multipart/form-data" action="<?php echo U('Index/baseinfo');?>">
			<div class="log_ipt" style="display:none;">
				<label>id:</label>
				<input type="text"  name="id" />
			</div>
			<div class="log_ipt">
				<label>页面:</label>
				<input type="text" name="page" />*
			</div>
			<div class="log_ipt">
				<label>标题:</label>
				<textarea rows="4" name="title"></textarea>*
			</div>
			<div class="log_ipt">
				<label>关键词:</label>
				<textarea rows="4" name="key"></textarea>*
			</div>
			<div class="log_ipt set">
				<label>描述:</label>
				<textarea rows="4" name="description"></textarea>*
			</div>
			<div class="log_ipt">
				<label>qq:</label>
				<input type="text" name="qq" />
			</div>
			<div class="log_ipt">
				<label>在线人数:</label>
				<input type="text" name="onlineCnt" />
			</div>
			<div class="log_ipt">
				<label>图片:</label>
				<a class="file">上传图片
                    <input type="file" name="tp" />
                </a>
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
	// //模糊搜索
	// $("button[class='search']").click(function(){
	// 	var likeName = $("input[name='likeName']").val();
	// 	if(likeName==""){
	// 		alert("请输入搜索内容");
	// 	}else{
	// 		window.location.href="baseinfo/name/"+ likeName;
	// 	}
	// });
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
			window.location.href="baseinfo/del/"+ del;
		}
	});
	// //查看全部
	// $("button[class='all']").click(function(){
	// 	window.location.href="<?php echo U('Index/baseinfo');?>";
	// });
	//添加or修改
	$("button[name='sub']").click(function(){
		var title = $("textarea[name='title']").val().trim();
		var key = $("textarea[name='key']").val().trim();
		var description = $("textarea[name='description']").val().trim();
		var page = $("input[name='page']").val().trim();
		if(title=='' || key=='' || description=='' || page==""){
			alert("所有选项请必须填写");
		}else{
			$("form").submit();
		}
	});
	var edit = $(".db");
	edit.dblclick(function(){
		var id = $(this).find("input[type='checkbox']").attr("name");
		$.get(
			'<?php echo U("Index/baseinfo");?>',
			{id:id},
			function(data){
				$(".log_t span").text("修改页");
				$("textarea[name='title']").text(data.title);
				$("textarea[name='key']").text(data.key);
				$("textarea[name='description']").text(data.description);
				$("input[name='qq']").val(data.qq);
				$("input[name='page']").val(data.page);
				$("input[name='onlineCnt']").val(data.onlineCnt);
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