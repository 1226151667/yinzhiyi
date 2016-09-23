<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<title><?php echo $baseInfo['title'];?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="keywords" content="<?php echo $baseInfo['key'];?>" />
<meta name="description" content="<?php echo $baseInfo['description'];?>" />
<link href="__PUBLIC__/css/base.css" rel="stylesheet">
<link href="__PUBLIC__/images/yinzhiyi.ico" rel="shortcut icon" type="image/x-icon" />
<link  type="text/css" href="__PUBLIC__/css/bootstrap-b.min.css" rel="stylesheet" >
<link href="__PUBLIC__/css/lighter.css" rel="stylesheet">
<link rel="stylesheet" href="__PUBLIC__/css/validationEngine.jquery.css" type="text/css"/>
<script src="__PUBLIC__/js/jquery.min.js"></script>
<script src="__PUBLIC__/js/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/bootstrap-ie.js"></script>
<script src="__PUBLIC__/js/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="__PUBLIC__/js/jquery.validationEngine.min.js" type="text/javascript" charset="utf-8"></script>
<script>
// qq弹窗
$(function(){
    var qq_list = new Array();
    var baseInfo = <?php echo $baseInfo['qq'];?>;
    $(baseInfo).each(function(i,v){
        qq_list[i] = v;
    });
    //随机
    var qq_i = Math.floor(Math.random()*qq_list.length);
    var src = "tencent://message/?uin="+qq_list[qq_i]+"&Site=&menu=yes";
    $('.qq_iframe').attr('src',src);
    var src1 = "http://wpa.qq.com/msgrd?v=3&uin="+qq_list[qq_i]+"&site=qq&menu=yes";
    $("#qq_src1").attr("href",src1);
    qq_i = Math.floor(Math.random()*qq_list.length);
    src1 = "http://wpa.qq.com/msgrd?v=3&uin="+qq_list[qq_i]+"&site=qq&menu=yes";
    $("#qq_src2").attr("href",src1);
    qq_i = Math.floor(Math.random()*qq_list.length);
    src1 = "http://wpa.qq.com/msgrd?v=3&uin="+qq_list[qq_i]+"&site=qq&menu=yes";
    $("#qq_src3").attr("href",src1);
    qq_i = Math.floor(Math.random()*qq_list.length);
    src1 = "http://wpa.qq.com/msgrd?v=3&uin="+qq_list[qq_i]+"&site=qq&menu=yes";
    $("#qq_src4").attr("href",src1);
    qq_i = Math.floor(Math.random()*qq_list.length);
    src1 = "http://wpa.qq.com/msgrd?v=3&uin="+qq_list[qq_i]+"&site=qq&menu=yes";
    $("#qq_src5").attr("href",src1);
})
if(window.ActiveXObject)//判断浏览器是否属于IE
{
    var browser=navigator.appName 
    var b_version=navigator.appVersion 
    var version=b_version.split(";"); 
    var trim_Version=version[1].replace(/[ ]/g,""); 
    if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE6.0") 
    { 
        alert("本网站由于采用HTML5，不支持IE6，请使用高版本IE或其他浏览器"); 
       	// window.location='http://yun.ximotech.com/sys';
    } 
}
</script>
<style>
/*整体色彩风格*/
body{height:100%;background: url("__PUBLIC__/images/551121af96d13.jpg");}
#gongg_wz{background: url("__PUBLIC__/images/551121af96d13.jpg");filter:alpha(opacity=80); -moz-opacity:0.8; opacity:0.8;}
a{filter:alpha(opacity=100); -moz-opacity:1; opacity:1;}
#back .tm{background:rgba(0,0,0,0.3);}
.name{background: url("__PUBLIC__/images/551121af96d13.jpg");filter:alpha(opacity=80); -moz-opacity:0.8; opacity:0.8;}
#qq_1{background: url("__PUBLIC__/images/551121af96d13.jpg");filter:alpha(opacity=80); -moz-opacity:0.8; opacity:0.8;}
#qq{background: url("__PUBLIC__/images/551121af96d13.jpg");filter:alpha(opacity=80); -moz-opacity:0.8; opacity:0.8;}
#tab_wz{background: url("__PUBLIC__/images/551121af96d13.jpg");filter:alpha(opacity=80); -moz-opacity:0.8; opacity:0.8;}
#tab_img{background: url("__PUBLIC__/images/551121af96d13.jpg");filter:alpha(opacity=80); -moz-opacity:0.8; opacity:0.8;}
</style>
</head>
<body>
<!-- 随机弹出多个企鹅号之一 -->
<iframe style="display:none;" class="qq_iframe" src=""></iframe>
<!---top-->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-inner">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">
                    <img class="img-responsive" src="<?php echo $baseInfo['logo'];?>">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">        
                <ul class="nav navbar-nav ">
                    <li class="active">
                        <a href="#"><img src="__PUBLIC__/images/diann.png">&nbsp;&nbsp;保存到桌面</a>
                    </li>
                    <li class="active">
                        <a href="http://zhibo.yohocat.com/index/index.html">
                            <img src="__PUBLIC__/images/xiaz.png">&nbsp;&nbsp;下载软件
                        </a>
                    </li>         
                    <li class="">
                        <a target="_blank" id="qq_src1" href="http://wpa.qq.com/msgrd?v=3&uin=800800011&site=qq&menu=yes">
                            <img border="0" src="__PUBLIC__/images/qq.png" alt="" title=""/>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?php $type= !isset($_SESSION['tmpUserId'])?'user':'tmpUser'; echo $type;?>">
                        <a href="#">
                            <img style="width:30px; height:30px;" src="<?php $pic = '__PUBLIC__/images/User14.png'; if(isset($_SESSION['userId'])){ $pic = $userInfo['pic']; } if(isset($_SESSION['empUserId'])){ $pic = $empUserInfo['pic']; } echo $pic; ?>
                            ">
                            <?php  if(isset($_SESSION['userId'])){ $nickName=$userInfo['nickName']; } if(isset($_SESSION['empUserId'])){ $nickName=$empUserInfo['nickName']; } if(isset($_SESSION['tmpUserId'])){ $nickName=$tmpUserInfo['uname']; } echo $nickName; ?>
                        </a>
                        <ul class="userInfo">
                            <li>消息</li>
                            <li class="infoOwn">个人资料</li>
                            <li class="editPwd">修改密码</li>
                            <li><a href="<?php echo U('Index/index?logout=ok');?>">退出登录</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="http://118.145.4.142:16927/SelfOpenAccount/firmController.fir?funcflg=getMember&memNo=750"><img src="__PUBLIC__/images/kaihu.png"></a>
                    </li>
                    <li <?php if(!isset($_SESSION['tmpUserId'])){echo 'style="display:none"';}?>>
                        <a href="<?php echo U("Index/land");?>">
                            <img src="__PUBLIC__/images/login.png">
                        </a>
                    </li>
                    <li <?php if(!isset($_SESSION['tmpUserId'])){echo 'style="display:none"';}?>>
                        <a href="<?php echo U("Index/enroll");?>">
                            <img src="__PUBLIC__/images/registration.png">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--/top-->

<!--content-->
<div class="jumbotron1 " id="help">
    <div class="container">  
        <div class="row">
            <div class="col-md-2 clearfix content-left" id="tb"> 
                <table id="tb_1">
                    <tr>
                        <td style="width:50%;">
                            <a href="<?php echo U("Index/index_c");?>">
                                <img src="__PUBLIC__/images/left_t_1.png">
                            </a>
                        </td>
                        <td style="width:50%; padding-left:1%;">
                            <a href="<?php echo U('Index/index_j');?>">
                                <img src="__PUBLIC__/images/left_t_2.png">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?php echo U('Index/index_1');?>">
                                <img src="__PUBLIC__/images/left_t_3.png">
                            </a>
                        </td>
                        <td class="login" style="width:50%; padding-left:1%;">
                            <a href="#">
                                <img src="__PUBLIC__/images/left_t_6.png">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%; padding-left:1%;">
                            <a href="#">
                                <img src="__PUBLIC__/images/erweima.png">
                            </a>
                        </td>
                    </tr>
                </table>
                <div id="tab">
                    <ul id="tab_wz" class="clearfix">
                        <li>
                            <a class="hover" href="#">在线会员<br>（<?php echo $baseInfo['onlineCnt'];?>）</a>
                        </li>
                        <li>
                            <a href="#">我的客服<br>（0）</a>
                        </li>
                    </ul>
                    <ul id="tab_img">
                        <li id="onlineUser" style="display:block;">
                        </li>
                        <li id="ownCustom"></li>
                    </ul>     
                </div>
            </div>
            <div class="col-md-6 content-center" id="sp_2"><!-- yy：http://yy.com/s/23614648/23614648/yyscene.swf -->
                <div id="yyTop">
                    <ul>
                        <li class="laoshi">
                            <a id="laoshi">当前老师：</a>
                            <select <?php $sdis='disabled="disabled" style="background:none;color:white; line-height:25px;width:55px; border:0 none;appearance:none;-moz-appearance:none;-webkit-appearance:none;"';if(isset($empUserInfo['ls'])){ $sdis=""; } echo $sdis;?> name="laoshi">
                                <?php
 foreach ($lsList as $row) { ?>
                                <option <?php if($row['isSay']==1){echo 'selected="selected"';}?> id="<?php echo $row['id'];?>"><?php echo $row['nickName'];?></option>
                                <?php
 } ?>
                            </select>
                        </li>
                        <li class="yyRefresh"><a id="yyRefresh">刷新</a></li>
                    </ul>
                </div>  
                <div class="thumbnail_2">
                    <div class="caption_2">
                        <div id="yyP" style="display:none;width:100%;height:500px;background:#020E16"></div>
                        <embed id="yy"  align="middle" allowfullscreen="true" width="100%" height="500px" allowscriptaccess="always" mode="transparent" quality="high" src="http://yy.com/s/<?php echo $yyH['num'].'/'.$yyH['num'];?>/yyscene.swf" type="application/x-shockwave-flash"></embed>
                      <!--   <gs:video-live allowfullscreen="true" width="100%" height="420px"  id="videoComponent" site="jzyzbs.gensee.com"ctx="webcast" ownerid="d7e73f4524c245999bc80cf679f41e05" /> -->  
                    </div>
                </div>
                <div id="gongg">
                    <ul id="gongg_wz" class="clearfix">
                        <?php
 foreach ($colList as $key=>$row) { ?>
                            <li><a <?php if($key==0){echo 'class="hover"';}?>><?php echo $row['name'];?></a></li>
                        <?php
 } ?>
                    </ul>
                    <ul id="gongg_img">
                        <?php
 foreach ($colList as $key=>$row) { ?>
                            <li style="<?php if($key==0){echo 'display:block;';}?>">
                                <img src="<?php echo $row['aFilePath'];?>" style="width:100%; height:310px;">
                            </li>
                        <?php
 } ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 content-right">  
                <div class="thumbnail">
                    <div class="caption">
                        <div class="name">
                            公告：<marquee style="width:90%;height:30px;line-height:30px;padding-top:5px;" scrollAmount="6" onmouseout="this.start();" onmouseover="this.stop();" direction="left" class="gGao"><?php echo $gGaoList['name'];?></marquee>
                        </div>
                        <div id="back" class="clearfix">
                            <ul class="fr">
                                <li>
                                    <a href="#"><img src="__PUBLIC__/images/dimensionCode.png"><br>二维码</a>
                                </li>
                                <li>
                                    <a href="#"><img src="__PUBLIC__/images/GetFolowers.png"><br>鲜花</a>
                                </li>
                                <li>
                                    <a  class="charge"><img src="__PUBLIC__/images/rotateMain.png"><br>抽奖</a>
                                </li>
                            </ul>
                            <?php
 $htm = ''; $now = date("Y-m-d"); foreach($chatList as $row){ if($row['toUserName']){ $toUserName = " <span class='dui'>对</span> <img style='width:30px;height:30px;' src='".$row['toUserPic']."' /><span onclick='getToUser(this)' userType='".$row['toUserType']."' name='".$row['toUserId']."' class='userId'>".$row['toUserName']."</span>"; }else{ $toUserName = ''; } $time = strtotime($row['tm']); $tm = date("H:i:s",$time); $htm .= "<span name='".$row['id']."' class='tm'>[".$tm."]</span>&nbsp;&nbsp;<img style='width:30px;height:30px;' src='".$row['userPic']."' /><span userType='".$row['userType']."' name='".$row['userId']."' class='userId'>".$row['userName']."</span> ".$toUserName."<br /><br /><span class='content'>".$row['content']."</span><br /><br />"; } echo $htm; ?>
                        </div>
                        <div id="qq">
                    	   <ul class="clearfix">
                        	    <li>
                                    <img src="__PUBLIC__/images/jpkf.png">
                                </li>
                                <li>
                                    <a id="qq_src2" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=800800011&site=qq&menu=yes">
                                        <img border="0" src="__PUBLIC__/images/counseling_style_52.gif" alt="" title=""/>
                                    </a>
                                </li>
                                <li>
                                    <a id="qq_src3" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=800800011&site=qq&menu=yes">
                                        <img border="0" src="__PUBLIC__/images/counseling_style_52.gif" alt="" title=""/>
                                    </a>
                                </li>
                                <li>
                                    <a id="qq_src4" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=800800011&site=qq&menu=yes">
                                        <img border="0" src="__PUBLIC__/images/counseling_style_52.gif" alt="" title=""/>
                                    </a>
                                </li>
                                <li>
                                    <a id="qq_src5" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=800800011&site=qq&menu=yes">
                                        <img border="0" src="__PUBLIC__/images/counseling_style_52.gif" alt="" title=""/>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <form method="post" action="">
                            <div id="qq_1">
                        	    <ul class="clearfix">
                            	   <li class="biaoqing">
                                        <a>
                                            <img src="__PUBLIC__/images/biaoqing.png">
                                        </a>
                                    </li>
                                    <li class="hecai">
                                        <a>
                                            <img src="__PUBLIC__/images/caitiao.png">
                                        </a>
                                    </li>
                                    <li class="ww">
                                        <a>
                                            <img src="__PUBLIC__/images/ww.gif">
                                        </a>
                                    </li>
                                    <!-- 上传图片还没开发 -->
                                    <li class="tp">
                                        <a class="file">上传图片
                                            <input type="file" name="tp" />
                                        </a>
                                    </li>
                                    <li>
                                        <span toUserType="3" class="toUserId" name="0" href="#">
                                            对&nbsp;<font>所有人</font>
                                            <img class="remove" style="display:none;" src="__PUBLIC__/images/del.png" />&nbsp;说
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div id="textarea">
                        	    <table>
                            	    <tr>
                                        <td class="td1">
                                            <!-- <textarea placeholder="观望一天，不如咨询一遍，请输入你的问题" cols="61px" style="height:73px;" name="jianjie"></textarea> -->
                                            <div id="content" contenteditable="true"></div>
                                        </td>
                                        <td class="td2">
                                            <img id="chatSub" src="__PUBLIC__/images/btnSendMsg.png">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /content -->

<!-- 弹出框 -->
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.2.3.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/login.js"></script>

<!-- 表情 -->
<div id="biaoq">
    <div id="bq">
        <table class="bq bqMin" cellpadding:0px;cellspacing:0px;>
          <tr>
              <td><img src="__PUBLIC__/images/kx.gif" alt="狂笑" title="狂笑" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/jx.gif" alt="贱笑" title="贱笑" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/tx.gif" alt="偷笑" title="偷笑" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/qx.gif" alt="窃笑" title="窃笑" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/ka.gif" alt="可爱" title="可爱" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/kiss.gif" alt="kiss" title="kiss" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/up.gif" alt="up" title="up" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/bq.gif" alt="抱歉" title="抱歉" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/bx.gif" alt="鼻血" title="鼻血" width="28" height="28" /></td></tr>
                <tr><td><img src="__PUBLIC__/images/bs.gif" alt="鄙视" title="鄙视" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/dy.gif" alt="得意" title="得意" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/fd.gif" alt="发呆" title="发呆" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/gd.gif" alt="感动" title="感动" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/glian.gif" alt="鬼脸" title="鬼脸" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/hx.gif" alt="害羞" title="害羞" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/jxia.gif" alt="惊吓" title="惊吓" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/zong.gif" alt="囧" title="囧" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/kl.gif" alt="可怜" title="可怜" width="28" height="28" /></td></tr>
                <tr><td><img src="__PUBLIC__/images/kle.gif" alt="困了" title="困了" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/ld.gif" alt="来电" title="来电" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/lh.gif" alt="流汗" title="流汗" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/qf.gif" alt="气愤" title="气愤" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/qs.gif" alt="潜水" title="潜水" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/qiang.gif" alt="强" title="强" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/sx.gif" alt="伤心" title="伤心" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/suai.gif" alt="衰" title="衰" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/sj.gif" alt="睡觉" title="睡觉" width="28" height="28" /></td></tr>
                <tr><td><img src="__PUBLIC__/images/tz.gif" alt="陶醉" title="陶醉" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/wbk.gif" alt="挖鼻孔" title="挖鼻孔" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/wq.gif" alt="委屈" title="委屈" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/xf.gif" alt="兴奋" title="兴奋" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/yw.gif" alt="疑问" title="疑问" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/yuan.gif" alt="晕" title="晕" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/zj.gif" alt="再见" title="再见" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/zan.gif" alt="赞" title="赞" width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/zb.gif" alt="装逼" title="装逼" width="28" height="28" /></td></tr>
                <tr><td><img src="__PUBLIC__/images/bd.gif" alt="被电" title="被电" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/gl.gif" alt="给力" title="给力" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/hjd.gif" alt="好激动" title="好激动" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/jyl.gif" alt="加油啦" title="加油啦" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/jjdx.gif" alt="贱贱地笑" title="贱贱地笑" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/lll.gif" alt="啦啦啦" title="啦啦啦" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/lm.gif" alt="来嘛" title="来嘛" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/lx.gif" alt="流血" title="流血" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/lgze.gif" alt="路过这儿" title="路过这儿" width="22" height="22" /></td></tr>
                <tr><td><img src="__PUBLIC__/images/qkn.gif" alt="切克闹" title="切克闹" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/qgz.gif" alt="求关注" title="求关注" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/tzuang.gif" alt="推撞" title="推撞" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/ww.gif" alt="威武" title="威武" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/wg.gif" alt="围观" title="围观" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/xhh.gif" alt="笑哈哈" title="笑哈哈" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/zc.gif" alt="招财" title="招财" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/zf.gif" alt="转发" title="转发" width="22" height="22" /></td>
                <td><img src="__PUBLIC__/images/zz.gif" alt="转转" title="转转" width="22" height="22" /></td></tr>
        </table>
        <table class="bq bqMax" style="display:none;">
            <tr>
                <td><img src="__PUBLIC__/images/1.gif"  width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/2.gif"  width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/3.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/4.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/5.gif"   width="28" height="28"/></td>
                <td><img src="__PUBLIC__/images/6.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/7.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/8.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/9.gif"   width="28" height="28" /></td>
             </tr>
                 <tr>
                     <td><img src="__PUBLIC__/images/10.gif"   width="28" height="28" /></td>
                       <td><img src="__PUBLIC__/images/11.gif"  width="28" height="28" /></td>
                       <td><img src="__PUBLIC__/images/12.gif"   width="28" height="28" /></td>
                       <td><img src="__PUBLIC__/images/13.gif"   width="28" height="28" /></td>
                     <td><img src="__PUBLIC__/images/14.gif"   width="28" height="28" /></td>
                     <td><img src="__PUBLIC__/images/15.gif"   width="28" height="28" /></td>
                  <td><img src="__PUBLIC__/images/16.gif"   width="28" height="28" /></td>
                      <td><img src="__PUBLIC__/images/17.gif"   width="28" height="28" /></td>
                  <td><img src="__PUBLIC__/images/18.gif"   width="28" height="28" /></td>
                </tr>
            <tr>
                  <td><img src="__PUBLIC__/images/19.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/20.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/21.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/22.gif"  width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/23.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/24.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/25.gif"   width="28" height="28" /></td>
                 <td><img src="__PUBLIC__/images/26.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/27.gif"   width="28" height="28" /></td>
            </tr>
            <tr>
                <td><img src="__PUBLIC__/images/28.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/29.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/30.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/31.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/32.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/33.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/34.gif"   width="28" height="28" /></td>
                <td><img src="__PUBLIC__/images/35.gif"  width="28" height="28" /></td>
                 <td><img src="__PUBLIC__/images/36.gif"   width="28" height="28" /></td>
            </tr> 
        </table>
    </div>
    <div class="qiehuan">
        <dl>
            <dt class="curq">默认</dt>
            <dt class="big">大表情</dt>
        </dl>
    </div>
</div>

<!-- 课程表  -->
<div id="log">
	<div class="log_t clearfix">
    	<div class="log_t_1 fl">
		 课表安排
        </div>
		<a class="close fl">×</a>
	</div>
    <div id="tb_xingq">
    	<table id="tb_xingq_1" border="1" cellpadding="5" cellspacing="0" bordercolor="#999999">
        	<tr>
            	<th>上课时间</th>
            	<th>星期一</th>
                <th>星期二</th>
                <th>星期三</th>
                <th>星期四</th>
                <th>星期五</th>
                <th>星期六</th>
                <th>星期日</th>
            </tr>
            <?php
 foreach($subjectList as $row){ ?>
            <tr>
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
        </table>
    </div>
</div>

<!-- 公告栏 -->
<div id="gGaoLog">
    <div class="log_t">
         系统公告
        <a class="close">×</a>
    </div>
    <p><?php echo $gGaoList['content'];?></p>    
</div>
<!-- /公告栏 -->

<!-- 修改密码 -->
<div class="log pwdEdit">
    <div class="log_t">
        <span>修改密码</span>
        <a class="close">×</a>
    </div>
    <div class="log_ipt">
        <label>旧 密 码:</label>
        <input type="password" name="oldPwd" />*
    </div>
    <div class="log_ipt">
        <label>新 密 码:</label>
        <input type="password" name="newPwd1" />*
    </div>
    <div class="log_ipt">
        <label>再次输入:</label>
        <input type="password" name="newPwd2" />*
    </div>
    <div class="sub">
        <span>所有选项请认真填写</span><br />
        <button name="sub" type="button">提&nbsp;&nbsp;&nbsp;&nbsp;交</button>
    </div>
</div>

<!-- 个人资料 -->
<div class="log ownInfo">
    <div class="log_t">
        <span>个人资料</span>
        <a class="close">×</a>
    </div>
    <div class="log_ipt">
        <label>昵 称:</label>
        <input type="text" name="nickName" />*
    </div>
    <div class="log_ipt">
        <label>客户经理:</label>
        <input style="border:none;background:white;" type="text" disabled="disabled" name="empNickName" />
    </div>
    <div class="log_ipt">
        <label>所在组:</label>
        <input style="border:none;background:white;" type="text" disabled="disabled" name="rankName" />
    </div>
    <div class="log_ipt">
        <label>性 别:</label>
        <select name="sex">
            <option value="0">男</option>
            <option value="1">女</option>
        </select>
    </div>
    <div class="log_ipt">
        <label>QQ:</label>
        <input type="text" name="qq" />
    </div>
    <div class="log_ipt">
        <label>邮箱:</label>
        <input type="text" name="email" />
    </div>
    <div class="sub">
        <span>所有选项请认真填写</span><br />
        <button name="sub" type="button">保&nbsp;&nbsp;&nbsp;&nbsp;存</button>
    </div>
</div>

<!-- 抽奖 -->
<div class="rotary">
    <div class="log_t">
        <a class="close">×</a>
    </div>
    <div class="rotaryArrow" id="rotaryArrow"></div>
    <div id="list">
        <h3>中奖名单</h3>
        <ul id="demo1">
            <li>183****851 抽中了 5元话费</li>
            <li>183****851 抽中了 20元话费</li>
            <li>183****851 抽中了 暖宝宝</li>
            <li>183****851 抽中了 充电宝</li>
            <li>183****851 抽中了 小音箱</li>
            <li>183****851 抽中了 iPhone 6</li>
            <li>183****851 抽中了 1000元</li>
            <li>183****851 抽中了 5元话费</li>
            <li>183****851 抽中了 20元话费</li>
            <li>183****851 抽中了 iPhone 6</li>
            <li>183****851 抽中了 1000元</li>
            <li>183****851 抽中了 充电宝</li>
            <li>183****851 抽中了 小音箱</li>
            <li>183****851 抽中了 iPhone 6</li>
            <li>183****851 抽中了 暖宝宝</li>
            <li>183****851 抽中了 充电宝</li>
            <li>183****851 抽中了 小音箱</li>
            <li>183****851 抽中了 5元话费</li>
            <li>183****851 抽中了 20元话费</li>
            <li>183****851 抽中了 iPhone 6</li>
            <li>183****851 抽中了 1000元</li>
        </ul>
        <div id="demo2"></div>
    </div>
    <div class="result" id="result">
        <p id="resultTxt"></p>
        <a href="javascript:" id="resultBtn" title="关闭">关闭</a>
    </div>
</div>
<!-- 系统消息 -->
    <?php
 foreach ($sysList as $key=>$row) { ?>
        <div style="z-index:<?php $z=$key+999999;echo $z;?>" name=<?php echo $row['cycle'];?> id="<?php echo 'sys'.$row['id']; ?>" class="system">
            <span>关闭</span>
            <img src="<?php echo $row['aFilePath'];?>" />
        </div>
    <?php
 } ?>

<!--/弹出框-->
<script src="__PUBLIC__/js/jquery.min.js"></script>
<script src="__PUBLIC__/js/jquery.rotate.min.js"></script>
<script>
$(function(){
    var $rotaryArrow = $('#rotaryArrow');
    var $result = $('#result');
    var $resultTxt = $('#resultTxt');
    var $resultBtn = $('#result');
    $rotaryArrow.click(function(){
        var data = [0, 1, 2, 3, 4, 5, 6, 7];
        data = data[Math.floor(Math.random()*data.length)];
        switch(data){
            case 1:
                rotateFunc(0,0,'很遗憾，这次您未抽中奖，继续加油吧'); 
                // rotateFunc(1,87,'恭喜您获得了 <em>5</em> 元话费');
                break;
            case 2:
                rotateFunc(0,0,'很遗憾，这次您未抽中奖，继续加油吧'); 
                // rotateFunc(2,43,'恭喜您获得了 <em>20</em> 元话费');
                break;
            case 3:
                rotateFunc(0,0,'很遗憾，这次您未抽中奖，继续加油吧'); 
                // rotateFunc(3,134,'恭喜您获得了 <em>小音箱</em> 一套');
                break;
            case 4: 
                rotateFunc(0,0,'很遗憾，这次您未抽中奖，继续加油吧');
                // rotateFunc(4,177,'恭喜您获得了 <em>iPhone 6</em> 一台');
                break;
            case 5:
                rotateFunc(0,0,'很遗憾，这次您未抽中奖，继续加油吧'); 
                // rotateFunc(5,223,'恭喜您获得了 <em>暖宝宝</em> 一个');
                break;
            case 6: 
                rotateFunc(0,0,'很遗憾，这次您未抽中奖，继续加油吧');
                // rotateFunc(6,268,'恭喜您获得了 <em>充电宝</em> 一个');
                break;
            case 7: 
                rotateFunc(0,0,'很遗憾，这次您未抽中奖，继续加油吧');
                // rotateFunc(7,316,'恭喜您获得了 <em>1000</em> 元账号');
                break;
            default:
                rotateFunc(0,0,'很遗憾，这次您未抽中奖，继续加油吧');
        }
    });

    var rotateFunc = function(awards,angle,text){  //awards:奖项，angle:奖项对应的角度
        $rotaryArrow.stopRotate();
        $rotaryArrow.rotate({
            angle: 0,
            duration: 5000,
            animateTo: angle + 3600,  //angle是图片上各奖项对应的角度，1440是让指针固定旋转4圈
            callback: function(){
                $resultTxt.html(text);
                $result.show();
            }
        });
    };

    $resultBtn.click(function(){
        $result.hide();
    });
});
</script>
<script> 
    var speed=40 
    var demo=document.getElementById("list"); 
    var demo2=document.getElementById("demo2"); 
    var demo1=document.getElementById("demo1"); 
    demo2.innerHTML=demo1.innerHTML 
    function Marquee(){
        if(demo2.offsetTop-demo.scrollTop<=0)
            demo.scrollTop-=demo1.offsetHeight
        else{
            demo.scrollTop++
        }
    }
    var MyMar=setInterval(Marquee,speed)
    demo.onmouseover=function(){clearInterval(MyMar)}
    demo.onmouseout=function(){MyMar=setInterval(Marquee,speed)}
</script> 

<script>

/**********游客栏切换***********/
$(function(){
	$("#tab_wz li").click(function(){
		$(this).children("a").addClass("hover").parent().siblings().children().removeClass("hover");
		var i=$(this).index();
		$("#tab_img li").eq(i).show().siblings().hide();
		})
	});

/**********公告栏切换***********/	
$(function(){
	$("#gongg_wz li").click(function(){
		$(this).children("a").addClass("hover").parent().siblings().children().removeClass("hover");
		var i=$(this).index();
		$("#gongg_img li").eq(i).show().siblings().hide();
		})
	});
	
	$("#all").height($(document).height());

</script>

</body>
<script>
/****************用户资料********************/
$(".user").mouseover(function(){
    $(".userInfo").show();
});
$(".user").mouseout(function(){
    $(".userInfo").hide();
});
/*******************修改密码***************************/
$(".pwdEdit .sub button").click(function(){
    var oldPwd = $("input[name='oldPwd']").val().trim();
    var newPwd1 = $("input[name='newPwd1']").val().trim();
    var newPwd2 = $("input[name='newPwd2']").val().trim();
    var pwdRs1 = 0;
    var pwdRs2 = 0;
    var pwdRs3 = 0;
    if(oldPwd=='' || newPwd1=='' || newPwd2==''){
        pwdRs1=1;
    }
    if(newPwd2 != newPwd1){
        pwdRs2=1;
    }
    if(newPwd1==oldPwd){
        pwdRs3=1;
    }
    if(pwdRs1==1){
        alert("所有选项请认真填写");
    }
    if(pwdRs2==1){
        alert("新密码两次输入不一致");
    }
    if(pwdRs3==1){
        alert("新密码跟旧密码一致");
    }
    if(pwdRs1==0 && pwdRs2==0 && pwdRs3==0){
        $.get(
            '<?php echo U("Index/index");?>',
            {oldPwd:oldPwd,newPwd1:newPwd1,newPwd2:newPwd2,editPwd:'ok'},
            function(data){
                if(data==0){
                    alert("修改成功");
                    window.location='<?php echo U("Index/land");?>';
                }
                if(data==1){
                    alert("所有选项都是必填项");
                }
                if(data==2){
                    alert("新密码两次输入不一致");
                }
                if(data==3){
                    alert("新密码与旧密码一致");
                }
                if(data==4){
                    alert("修改密码失败");
                }
                if(data==5){
                    alert("旧密码错误");
                }
            },
            "text"
        );
    }
});

/***************个人资料**********************/
var ownInfo = $(".ownInfo");
$("li[class='infoOwn']").click(function(){
    $.get(
        '<?php echo U("Index/index");?>',
        {ownInfo:'ok'},
        function(data){
            ownInfo.find("input[name='nickName']").val(data.nickName);
            ownInfo.find("input[name='empNickName']").val(data.empNickName);
            ownInfo.find("input[name='rankName']").val(data.rankName);
            ownInfo.find("input[name='qq']").val(data.qq);
            ownInfo.find("input[name='email']").val(data.email);
            if(data.sex==0){
                ownInfo.find("option[value='0']").attr("selected","selected");
            }
            if(data.sex==1){
                ownInfo.find("option[value='1']").attr("selected","selected");
            }
        },
        "json"
    );
});
ownInfo.find("button").click(function(){
    var nickName = ownInfo.find("input[name='nickName']").val().trim();
    var sex = ownInfo.find("select[name='sex']").val().trim();
    var qq = ownInfo.find("input[name='qq']").val().trim();
    var email = ownInfo.find("input[name='email']").val().trim();
    if(nickName==''){
        alert("昵称不能为空");
    }else{
        $.post(
            '<?php echo U("Index/index");?>',
            {nickName:nickName,sex:sex,qq:qq,email:email,editOwnInfo:'ok'},
            function(data){
                if(data==1){
                    alert("昵称不能为空");
                }
                if(data==2){
                    alert("修改失败");
                }
                if(data==0){
                    alert("修改成功");
                    window.location="<?php echo U('Index/index');?>";
                }
            },
            "text"
        );
    }
});

/***************聊天室***************/  
    //前导零  
    function AppendZero(num, length) {  
        return ( "0" + num ).substr( -length );  
    }
    //日期格式  
    function date(strTime,Yrs,mrs,drs,Hrs,irs,srs){
        var date = new Date();
        if(strTime!=0){
            date.setTime(strTime*1000);
        }
        var Y = date.getFullYear();
        var m = date.getMonth()+1;
        var d = date.getDate();
        var H = date.getHours();
        var i = date.getMinutes();
        var s = date.getSeconds();
        var time = "";
        if(Yrs==1){
            time+=Y+"-";
        }
        if(mrs==1){
            time+=AppendZero(m,2)+"-";
        }
        if(drs==1){
            time+=AppendZero(d,2)+" ";
        }
        if(Hrs==1){
            time+=AppendZero(H,2)+":";
        }else{
            time+="00:";
        }
        if(irs==1){
            time+=AppendZero(i,2)+":";
        }else{
            time+="00:";
        }
        if(srs==1){
            time+=AppendZero(s,2);
        }else{
            time+="00";
        }
        return time;
    }

    function scroll(){
        var scrollHeight = $("#back")[0].scrollHeight+500;
        $("#back").scrollTop(scrollHeight);
    }
    var num= $("#back span").length;
    if(num>0){
        scroll();
    }
    //选择聊天对象
    function getToUser(obj){
        var userId = $(obj).attr("name");
        var userType = $(obj).attr("userType");
        var userName = $(obj).text();
        $("span[class='toUserId'] img").css("display","inline");
        $("span[class='toUserId'] font").text(userName);
        $("span[class='toUserId']").attr("name",userId);
        $("span[class='toUserId']").attr("toUserType",userType);
    }
    $("span[class='userId']").click(function(){
        var userId = $(this).attr("name");
        var userType = $(this).attr("userType");
        var userName = $(this).text();
        $("span[class='toUserId'] img").css("display","inline");
        $("span[class='toUserId'] font").text(userName);
        $("span[class='toUserId']").attr("name",userId);
        $("span[class='toUserId']").attr("toUserType",userType);
    });
    $("img[class='remove']").click(function(){
    $("span[class='toUserId'] img").css("display","none");
        $("span[class='toUserId'] font").text("所有人");
        $("span[class='toUserId']").attr("name","0");
        $("span[class='toUserId']").attr("toUserType","3");
    });
    //enter键绑定点击事件
    $(document).keydown(function(event){  
        if(event.keyCode==13){  
           $("#chatSub").click();
           $("#content").html("");
           return false;//禁用换行的作用
        }
    });
    //聊天输入框获得和失去焦点
    // $("#content").focus(function(){
    //     $(this).empty();  
    // });
    $("#chatSub").click(function(){
        var toUserId = $("span[class='toUserId']").attr("name");
        var toUserType = $("span[class='toUserId']").attr("toUserType");
        var content = $("#content").html().trim();
        // content = "<span class="contentText">"+.content.+"</span>";
        if(content==''){
            alert("内容不能为空");
        }else{
            $("#content").html("");
            $.post(
                '<?php echo U("Index/index");?>',
                {content:content,toUserId:toUserId,toUserType:toUserType},
                function(data){
                },
                "json"
            );
        }
    });
    var chatMaxId = $("span[class='tm']").eq(-1).attr("name");
    function refresh(){
        $.get(
            '<?php echo U("Index/index");?>',
            {refresh:"ok",chatMaxId:chatMaxId},
            function(data){
                var htm0 = '';
                $(data).each(function(i,v){
                    if(chatMaxId==null){
                        chatMaxId = v.id;
                    }else{
                        ++chatMaxId;     
                    }
                    var stringTime = date(0,1,1,1,0,0,0);
                    // var time0 = Date.parse(new Date(stringTime))/1000;
                    var time1 = Date.parse(new Date(v.tm))/1000;
                    // if(time1>time0){
                        var Tm = date(time1,false,false,false,true,true,true);
                    // }else{
                        // var Tm = v.tm;
                    // }
                    if(v.toUserName == ""){
                        var toUserName = '';
                    }else{
                        var toUserName = ' <span class="dui">对</span> <img style="height:30px;widht:30px;" src="'+v.toUserPic+'" /><span onclick="getToUser(this)" userType="'+v.toUserType+'" name="'+v.toUserId+'" class="userId">'+v.toUserName+'</span>';
                    }
                    htm0 = htm0+'<span name="'+v.id+'" class="tm">['+Tm+']</span>&nbsp;&nbsp;<img style="height:30px;widht:30px;" src="'+v.userPic+'" /><span onclick="getToUser(this)" userType="'+v.userType+'" name="'+ v.userId +'" class="userId">'+ v.userName +'</span>'+toUserName+'<br /><br /><span class="content">'+ v.content +'</span><br /><br />';
                    $("#back").append(htm0);
                    scroll();
                });
            },
            "json"
        );
    }
    var ref = self.setInterval("refresh()",1000);
/****************在线用户列表****************/
function onlineUser(){
    $.get(
            '<?php echo U("Index/index");?>',
            {onlineUser:"ok"},
            function(data){
                var onlineUserHtm = "";
                $(data).each(function(i,v){
                    // onlineUserHtm += '<a href="#"><dl id="tab_img_l" class="clearfix"><dd class="f1"><img src="' +v.userPic+ '" />&nbsp;&nbsp;<em>'+v.userName+ '</em></dd><dd class="fr"><img src="' +v.userPic+ '" /></dd></dl></a>';
                    onlineUserHtm += '<a href="#"><span style="font-size:14px;color:#bb3d00;float:left;margin:10px;"><img src="'+v.userPic+'" style="height:30px;width:30px;" />'+v.userName+'</span><span style="float:right;margin:10px;"><img style="height:30px;width:30px;" src="'+v.userPic+'" /></span></a>';
                });
                $("#onlineUser").empty();
                $("#onlineUser").append(onlineUserHtm);
            },
            "json"
        );
}
var online = self.setInterval("onlineUser()",1000);
/****************表情********************/
var qqL = $("#qq").offset().left;
var qqT = $("#qq").offset().top;
var bqH = $("#biaoq").height();
var bqW = $("#biaoq").width();
var bqL = qqL+5;
var bqT = qqT-bqH-6;
var left = $("#biaoq").css("left",bqL);
var top = $("#biaoq").css("top",bqT); 
//窗口大小变化时
$(window).resize(function(){
    qqL = $("#qq").offset().left;
    qqT = $("#qq").offset().top;
    bqL = qqL+5;
    bqT = qqT-bqH-6;
    $("#biaoq").css("left",bqL);
    $("#biaoq").css("top",bqT); 
});
$(".biaoqing").click(function(){
    var dp = $("#biaoq").css("display");
    if(dp=="none"){
        $("#biaoq").show();
    }else{
        $("#biaoq").hide();
    }
});
$("dt[class='big']").click(function(){
    var bigH = $(".bqMax").height();
    $("#biaoq").css("height",243);
    $(".bqMax").css("height",243);
    $(this).css({'background':'#0072e3','color':'white','opacity':'0.8','filter':'alpha(opacity=80)'});
    $("dt[class='curq']").css({'background':'white','color':'black'});
    $(".bqMin").hide();
    $(".bqMax").show();
});
$("dt[class='curq']").click(function(){
    $(this).css({'background':'#0072e3','color':'white','opacity':'0.8','filter':'alpha(opacity=80)'});
    $("dt[class='big']").css({'background':'white','color':'black'});
    $(".bqMax").hide();
    $(".bqMin").show();
});
//选中表情
$("#biaoq td img").click(function(){
    var bqPath = $(this).attr("src");
    var bqImg = '<img class="contentImg" src="'+bqPath+'" />';
    $("#content").append(bqImg);
    $("#biaoq").hide();
});
//V(5个表情)
$(".ww").click(function(){
    var vHtm = '<img class="contentImg" src="/yinzhiyi/Home/Public/images/ww.gif"><img class="contentImg" src="/yinzhiyi/Home/Public/images/wg.gif"><img class="contentImg" src="/yinzhiyi/Home/Public/images/xhh.gif"><img class="contentImg" src="/yinzhiyi/Home/Public/images/gl.gif"><img class="contentImg" src="/yinzhiyi/Home/Public/images/xf.gif">';
    $("#content").append(vHtm);
});
//喝彩
$(".hecai").click(function(){
    var hcHtm = '<img class="contentImg" src="/yinzhiyi/Home/Public/images/zanS.gif"><img class="contentImg" src="/yinzhiyi/Home/Public/images/xianhua.gif"><img class="contentImg" src="/yinzhiyi/Home/Public/images/zhangsheng.gif">';
    $("#content").append(hcHtm);
});
/****************yy********************/
$("#yyRefresh").click(function(){
    var yySrc = $("#yy").attr("src");
    // yySrc = yySrc+"?re="+Math.random();
    // $("#yy").attr("src",yySrc);
    var embed = '<embed id="yy"  align="middle" allowfullscreen="true" width="100%" height="500px" allowscriptaccess="always" mode="transparent" quality="high" src="'+yySrc+'" type="application/x-shockwave-flash"></embed>';
    $("embed").remove();
    $("#yyP").after(embed);
});
/****************老师***********************/
$("select[name='laoshi']").change(function(){
    var lsId = $(this).find("option:selected").attr("id");
    $.get(
            '<?php echo U("Index/index");?>',
            {lsId:lsId},
            null,
            "json"
        );
});
/*****************系统消息******************/
//不能单个定时弹出图片，是同时弹出，周期为时间最短的那个来算
var a = $(".system");
if(a && a.length>0){
    var yy = $("#yy");
    var yyP = $("#yyP");
    $(".system span").click(function(){
        $(this).parent().css("display","none");
        var tmp =  $(".system").css("display");
        if(tmp=="none"){
            yy.css("display","block");
            yyP.css("display","none");
        }
    });
    function yyS(){
        yy.css("display","none");
        yyP.css("display","block");
    }
    yyS();
    function sysIn(){
        yyS();
        var x = $(".system");
        x.css("display","block");
    }
    $(a).each(function(i,v){
        var cycle = $(v).attr("name")*1000;
        var sysD = self.setInterval("sysIn()",cycle);    
    });
    $("#mask").click(function(){
        $(a).each(function(i,v){
            $(".system").css("display","none");
        });
    });
}
</script>
</html>