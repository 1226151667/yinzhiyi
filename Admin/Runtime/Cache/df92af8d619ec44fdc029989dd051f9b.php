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
						<li><a href="<?php echo U('Index/announcement');?>">公告</a></li>
						<li><a href="<?php echo U('Index/say');?>">喊单</a></li>
						<li><a href="<?php echo U('Index/yy');?>">YY直播</a></li>
						<li><a href="<?php echo U('Index/subjectTable');?>">课程表</a></li>
						<li><a href="<?php echo U('Index/ipBanTable');?>">IP屏蔽</a></li>
						<li><a href="<?php echo U('Index/systemTable');?>">系统消息</a></li>
						<!-- <li><a href="#">抽奖记录</a></li> -->
						<!-- <li><a href="#">短信记录</a></li> -->
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
		<p id="page-intro">课程表管理</p>
		<div class="clear"></div>
		<a href="#" id="edit" class="button">修改课程表</a><br /><br />
		<div class="content-box">
			<div class="content-box-header">
				<h3>课程表</h3>
				<div class="clear"></div>
			</div>
			<div class="content-box-content">
				<div class="tab-content default-tab" id="tab1"> 
					<table>
						<thead>
							<tr>
							   <th>编号</th>
							   <th>时间</th>
							   <th>星期一</th>
							   <th>星期二</th>
							   <th>星期三</th>
							   <th>星期四</th>
 							   <th>星期五</th>
							   <th>星期六</th>
							   <th>星期日</th>
							</tr>
						</thead>
						<tbody>
							<?php
 foreach($list as $row){ ?>
							<tr id="tr<?php echo $row['id'];?>">
								<td><?php echo $row['id'];?></td>
								<td><?php echo $row['time'];?></td>
								<td><?php echo $row['one'];?></td>
								<td><?php echo $row['two'];?></td>
								<td><?php echo $row['three'];?></td>
								<td><?php echo $row['four'];?></td>
								<td><?php echo $row['five'];?></td>
								<td><?php echo $row['six'];?></td>
								<td><?php echo $row['seven'];?></td>
							</tr>
							<?php
 } ?>
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

	<div id="log" class="subjectTable">
		<form method="post" action="<?php echo U('Index/subjectTable');?>">
		<div class="log_t">
			修改课程表
			<a class="close">×</a>
		</div>
		<table class="table">
			<tr>
			   <th>编号</th>
			   <th>时间</th>
			   <th>星期一</th>
			   <th>星期二</th>
			   <th>星期三</th>
			   <th>星期四</th>
				   <th>星期五</th>
			   <th>星期六</th>
			   <th>星期日</th>
			   <th>操作</th>
			</tr>
			<?php
 foreach($list as $row){ ?>
			<tr id="tr<?php echo $row['id'];?>">
				<td><input disabled="disabled" name="id<?php echo $row['id'];?>" type="text" size="5" value="<?php echo $row['id'];?>"></td>
				<td><input name="time<?php echo $row['id'];?>" type="text" size="5" value="<?php echo $row['time'];?>"></td>
				<td><input name="one<?php echo $row['id'];?>" type="text" size="5" value="<?php echo $row['one'];?>"></td>
				<td><input name="two<?php echo $row['id'];?>" type="text" size="5" value="<?php echo $row['two'];?>"></td>
				<td><input name="three<?php echo $row['id'];?>" type="text" size="5" value="<?php echo $row['three'];?>"></td>
				<td><input name="four<?php echo $row['id'];?>" type="text" size="5" value="<?php echo $row['four'];?>"></td>
				<td><input name="five<?php echo $row['id'];?>" type="text" size="5" value="<?php echo $row['five'];?>"></td>
				<td><input name="six<?php echo $row['id'];?>" type="text" size="5" value="<?php echo $row['six'];?>"></td>
				<td><input name="seven<?php echo $row['id'];?>" type="text" size="5" value="<?php echo $row['seven'];?>"></td>
				<td>										
					<a href="subjectTable?delete=<?php echo $row['id'];?>" title="Delete"><img src="__PUBLIC__/images/cross.png" alt="Delete" /></a> </td>
			</tr>
			<?php
 } ?>
			<tr class="lastTr">
				<td colspan=5><button type="button" id="add">添   加</button></td>
				<td colspan=10><button type="button" id="del">移除</button></td>
			</tr>
		</table>
		<div class="sub">
			<span>所有选项请认真填写</span><br />
			<button name="sub" type="submit">提&nbsp;&nbsp;&nbsp;&nbsp;交</button>
		</div>
		</form>
		<!-- <div class="log_t">
			修改课程表
			<a class="close">×</a>
		</div>
		<form method="post" action="1.php">
			<div class="log_ipt">
				<label>时 间:</label>
				<input type="text" name="time" />
			</div>
			<div class="log_ipt">
				<label>星期一:</label>
				<input type="text" name="one" />
			</div>
			<div class="log_ipt">
				<label>星期二:</label>
				<input type="text" name="two" />
			</div>
			<div class="log_ipt">
				<label>星期三:</label>
				<input type="text" name="three" />
			</div>
			<div class="log_ipt">
				<label>星期四:</label>
				<input type="text" name="four" />
			</div>
			<div class="log_ipt">
				<label>星期五:</label>
				<input type="text" name="five" />
			</div>
			<div class="log_ipt">
				<label>星期六:</label>
				<input type="text" name="six" />
			</div>
			<div class="log_ipt">
				<label>星期日:</label>
				<input type="text" name="seven" />
			</div>
			<div class="sub">
				<span>所有选项请认真填写</span><br />
				<button name="sub" type="button">提&nbsp;&nbsp;&nbsp;&nbsp;交</button>
			</div>
		</form> -->
	</div>
</div>
</body>
<script>
$(function(){
function getRandom(n){
    return Math.floor(Math.random()*n+1);
}
$("#add").click(function(){
	var num = 'add'+getRandom(10000);
	var html = "<tr class='"+ num +"'><td><input disabled='disabled' name='id"+ num +"' type='text'></td><td><input name='time"+ num +"' type='text'></td><td><input name='one"+ num +"' type='text'></td><td><input name='two"+ num +"' type='text'></td><td><input name='three"+ num +"' type='text'></td><td><input name='four"+ num +"' type='text'></td><td><input name='five"+ num +"' type='text'></td><td><input name='six"+ num +"' type='text'></td><td><input name='seven"+ num +"' type='text'></td><td></td></tr>";
	var jb = $("#log table tr").eq(-1);
	// alert(jb);
	jb.before(html);
});
$("#del").click(function(){
	var count1 = $("#tab1 table tr").size();
	var count2 = $("#log table tr").size();
	var count3 = count2-count1;
	if(count3>1){
		jv = $("#log table tr").eq(-2);
		jv.remove();
	}else{
		alert("如果要删除原有数据，请点击操作栏删除按钮进行删除！");
	}
});
});
</script>
</html>