$(document).ready(function(){
	//设置登录表单（即#log）屏幕居中
	var logHeight=$('#log').height(); //获取登录表单的高度
	var logWidth=$('#log').width(); //获取登录表单的宽度
	var winHeight = winHeight=$(window).height(); //获取窗口的高度
	var winWidth = winWidth=$(window).width(); //获取窗口的宽度
	var top = (winHeight-logHeight)/2; //登录表单离的上边距
	var left = (winWidth-logWidth)/2; //登录表单的左边距
	$('#log').css('left',left);       //设置登录表单的左边距
	$('#log').css('top',top);        //设置登录表单的上边距
	//当窗口大小发生变化时再次调整使登录表单居中
	$(window).resize(function(){
		winHeight=$(window).height();
		winWidth=$(window).width();
		top =(winHeight-logHeight)/2;
		left =(winWidth-logWidth)/2;
		$('#log').css('left',left);
		$('#log').css('top',top);
	});
	//点击登录弹出登录表单
	$('#edit').click(function(){
		// var id = $("form input").eq(0).attr("name");
		var ipt = $(".log_ipt input");
		var txt = $(".log_ipt textarea");
		$.each(ipt,function(i,v){
			$(v).val("");	
		});
		$.each(txt,function(i,v){
			$(v).html("");
		});
		$(".log_t span").text("添加页");
		$("body").append("<div id='mask'></div>");  
		$("#mask").addClass("mask").fadeIn("slow",function(){
			$(".log_t").css({
				"display":"block",
				"opacity":"1",
				"filter":"alpha(opacity=100)",
		});
		}); //使用雾罩把屏幕罩住
		$('#log').fadeIn("slow");
	});
	//关闭按钮鼠标滑过
	$('.close').mouseover(function(){
		$(this).css('color','black');
	});
	$('.close').mouseout(function(){
		$(this).css('color','#999');
	});
	$('.close').click(function(){
		$("#mask").fadeOut("slow");
		$('#log').fadeOut("slow");
	});
});