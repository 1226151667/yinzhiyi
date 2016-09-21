<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #white; font-size: 16px; }
.system-message{ text-align:center;padding-top:50px;height:100px;background:#ffa042;opacity:1;filter:alpha(opacity=100);}
/*.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }*/
.system-message .jump{ padding-top: 10px;color:white;}
.system-message .jump a{ color: white;}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 18px;color:white;}
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
#foot{
	font-size: 14px;
	line-height: 30px;
	background:#c27ba0;
	height:30px;
	text-align: center;
}
</style>
</head>
<body>
<div class="system-message">
<?php if(isset($message)): ?><!-- <h1>:)</h1> -->
<p class="success"><?php echo($message); ?></p>
<?php else: ?>
<!-- <h1>:(</h1> -->
<p class="error"><?php echo($error); ?></p><?php endif; ?>
<p class="detail"></p>
<p class="jump">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</p>
</div>
<div id="foot">欢迎访问富升财经</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>