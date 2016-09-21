<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>大连再生资源交易所软件下载</title>
<link href="__PUBLIC__/css/base.css" type="text/css" rel="stylesheet">
<link href="__PUBLIC__/css/style_j.css" type="text/css" rel="stylesheet">
<link href="__PUBLIC__/images/yinzhiyi.ico" rel="shortcut icon" type="image/x-icon" />
<script src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
<style>
#new{display:none;color:black;height:100px;line-height:40px;font-size:14px;}
#new span{font-size:15px;color:red;font-weight:100}
#new input{width:80px;margin-right:10px;}
#new select{width:100px;margin-right:10px;}
</style>
</head>
<body>
<div id="top_bg" class="pf">
    <div class="w1000 top_bg_1 clearfix">
        <img class="fl" src="__PUBLIC__/images/logo1.png">
        <ul class="fr clearfix">
        	<li class="top_bg_li_1"><a href="http://zhibo.yohocat.com/index/index.html">软件下载</a></li>
            <li><a href="index.html">返回直播间</a></li>
        </ul>
    </div>
</div>
<div id="banner" class="tc"><img class="img-responsive" src="__PUBLIC__/images/banner.png"></div>
<div class="main_fr w1000">
	<h3>交易提示</h3>
     <div id="tab_h">
    <ul id="tab_wz_h" class="clearfix">
        <li><a class="hover" href="#">即时提示</a></li>
        <li><a href="#">历史提示</a></li>
    </ul>
    <ul id="tab_img_h">
        <li style="display:block;"> 
           <div id="hand_table">
                <table id="hand_tb" cellpadding="1" cellspacing="0" style="width:100%;">
                	<tbody>
                        <tr>
                             <th style="">&nbsp;&nbsp;单号&nbsp;&nbsp;</th>
                             <th style="">开仓时间</th>
                             <th style="">类型</th>
                             <th style="">仓位</th>
                             <th style="">商品</th>
                             <th style="">开仓价</th>
                             <th style="">止损价</th>
                             <th style="">止盈价</th>
                             <th style="">平仓时间</th>
                             <th style="">平仓价</th>
                             <th style="">获利点数</th>
                             <th style="">分析师</th>      
                        </tr>
                        <?php
 foreach ($list as $row) { ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['openTm'];?></td>
                            <td><?php  switch ($row['type']) { case 0: echo '现价买入'; break; case 1: echo '现价卖出'; break; case 2: echo '到价买入'; break; case 3: echo '到价卖出'; break; case 4: echo '限价买入'; break; case 5: echo '限价卖出'; break; } ?></td>
                            <td><?php echo $row['cWei'];?></td>
                            <td><?php  switch ($row['good']) { case 0: echo '再生银'; break; case 1: echo '再生镍'; break; case 2: echo '大连油'; break; } ?></td>
                            <td><?php echo $row['openPrice'];?></td>
                            <td><?php echo $row['endPrice'];?></td>
                            <td><?php echo $row['sucPrice'];?></td>
                            <td><?php echo $row['levelTm'];?></td>
                            <td><?php echo $row['levelPrice'];?></td>
                            <td><?php echo $row['get'];?></td>
                            <td><?php echo $row['userType'];?>--<?php echo $row['nickName'];?></td>
                        </tr>
                        <?php
 } ?>   
                    </tbody>
                </table>
                <?php echo '<br /><div style="color:black;">'.$page.'</span>';?>
            </div>     
        </li>
        <li>
            <div id="data_table">
                <table id="data_tb" cellpadding="1" cellspacing="0" style="width:100%;">
                	<tbody>
                        <tr>
                             <th style="">&nbsp;&nbsp;单号&nbsp;&nbsp;</th>
                             <th style="">开仓时间</th>
                             <th style="">类型</th>
                             <th style="">仓位</th>
                             <th style="">商品</th>
                             <th style="">开仓价</th>
                             <th style="">止损价</th>
                             <th style="">止盈价</th>
                             <th style="">平仓时间</th>
                             <th style="">平仓价</th>
                             <th style="">获利点数</th>
                             <th style="">分析师</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </li>              
    </ul>                    
</div><br />
    <div id="new" style="<?php if(!empty($_SESSION['empUserId'])){echo 'display:block;';}?>">
    <form method="post" action="">
        <span>发布新策略：</span><br />
        类型：  <select name="type">
                    <option value="0">现价买入</option>
                    <option value="1">现价卖出</option>
                    <option value="2">到价买入</option>
                    <option value="3">到价卖出</option>
                    <option value="4">限价买入</option>
                    <option value="5">限价卖出</option>
                </select>
        仓位：<input type="text" name="cWei" />
        商品：  <select name="good">
                    <option value="0">再生镍</option>
                    <option value="1">再生银</option>
                    <option value="2">大连油</option>
                </select>
        开仓价：<input type="text" name="openPrice" />
        止损价：<input type="text" name="endPrice" />
        止盈价：<input type="text" name="sucPrice" />
        <button type="button" id="sub">马上发布</button>
    </form>
    </div>
<script>
$(function(){
	$("#tab_wz_h li").click(function(){
		$(this).children("a").addClass("hover").parent().siblings().children().removeClass("hover");
		var i=$(this).index();
		$("#tab_img_h li").eq(i).show().siblings().hide();
	});
    $("#sub").click(function(){
        var type = $("select[name='type']").val();
        var cWei = $("input[name='cWei']").val();
        var good = $("select[name='good']").val();
        var openPrice = $("input[name='openPrice']").val();
        var endPrice = $("input[name='endPrice']").val();
        var sucPrice = $("input[name='sucPrice']").val();
        var rs=0;
        if(type=="" || cWei=="" || good=="" || endPrice=="" || openPrice=="" ||sucPrice==""){
            rs=1;
            alert("输入不能为空");
        }else{
            $("form").submit();
        }
    });
})
</script>
</div>

<div id="bottom">
	<div class="w1000">
    	<p>Copyright@2016 富升财经直播间</p>
    </div>
</div>

</body>
</html>