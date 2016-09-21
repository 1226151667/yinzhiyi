<?php if (!defined('THINK_PATH')) exit();?><!-- 引入导航栏html模板 -->
<html xmlns="http://www.w3.org/1999/xhtml">
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

<script>
    $(function () {
    var date = new Date();
    var Y = date.getFullYear();
    var m = date.getMonth()+1;
    var mToc = ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"];
    var mNow = [];
    var newUe = [];
    var newTe = [];
    for(var i=0;i<m;i++){
        mNow[i] = mToc[i];
    }
    var newUeS = <?php echo $newUe;?>;
    var newTeS = <?php echo $newTe;?>;
    $(newUeS).each(function(i,v){
        newUe[i] = v;
    });
    $(newTeS).each(function(i,v){
        newTe[i] = v;
    });
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: Y+'年用户月增人数统计'
        },
        xAxis: {
            categories:mNow
        },
        yAxis: {
            min: 0,
            title: {
                text: '人数（个）'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} 个</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.0,
                borderWidth: 0
            }
        },
        series: [{
            name: '游客',
            data: newTe

        }, {
            name: '会员',
            data: newUe

        }]
    });
});				
  </script>
	<div id="main-content" class="index">
		<div id="indexTJ1">
			<div>
                在线游客<br />
                <span><?php echo $oTeCnt;?></span>
            </div>
            <div>
				今日新增游客<br />
				<span><?php echo $tTCnt;?></span>
			</div>
			<div>
				游客总数<br />
				<span><?php echo $tmpuserCnt;?></span>
			</div>
            <div>
                在线会员<br />
                <span><?php echo $oUeCnt;?></span>
            </div>
			<div>
				今日新增会员<br />
				<span><?php echo $tUCnt;?></span>
			</div>
			<div>
				会员总数<br />
				<span><?php echo $userCnt;?></span>
			</div>
		</div>
		<div class="indexClear"></div>
		<div id="container" style="min-width:700px;height:400px"></div>
		<div id="footer">
	<small>
		&#169; Copyright 2009 中俱来 <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
	</small>
</div>
	</div>
</div>
</body>
</html>