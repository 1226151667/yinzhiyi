$(function(){
	//操作yy
	function setYY(){
		var yy = $("#yy");
		var yyP = $("#yyP");
		if(yy.css("display")=="none"){
			yy.css("display","block");
			yyP.css("display","none");
		}else{
			yyP.css("display","block");
			yy.css("display","none");
		}
	}
    function setYYn(){
        yyP.css("display","block");
        yy.css("display","none");
    }
    function setYYy(){
        yy.css("display","block");
        yyP.css("display","none");
    }
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
	$('.login').click(function(){
		setYYn();
		$("body").append("<div id='mask'></div>");  
		$("#mask").addClass("mask").fadeIn("slow"); //使用雾罩把屏幕罩住
		$('#log').fadeIn("slow");
	});
	//关闭按钮鼠标滑过
	$('.close').mouseover(function(){
		$(this).css('color','black');
	});
	$('.close').mouseout(function(){
		$(this).css('color','999');
	});
	$('.close').click(function(){
		setYYy();
		$("#mask").fadeOut("slow");
		$('#log').fadeOut("slow");
	});
//公告

	//设置登录表单（即#log）屏幕居中
	var logHeight=$('#gGaoLog').height(); //获取登录表单的高度
	var logWidth=$('#gGaoLog').width(); //获取登录表单的宽度
	var winHeight = winHeight=$(window).height(); //获取窗口的高度
	var winWidth = winWidth=$(window).width(); //获取窗口的宽度
	var top = (winHeight-logHeight)/2; //登录表单离的上边距
	var left = (winWidth-logWidth)/2; //登录表单的左边距
	$('#gGaoLog').css('left',left);       //设置登录表单的左边距
	$('#gGaoLog').css('top',top);        //设置登录表单的上边距
	//当窗口大小发生变化时再次调整使登录表单居中
	$(window).resize(function(){
		winHeight=$(window).height();
		winWidth=$(window).width();
		top =(winHeight-logHeight)/2;
		left =(winWidth-logWidth)/2;
		$('#gGaoLog').css('left',left);
		$('#gGaoLog').css('top',top);
	});
	//点击登录弹出登录表单
	$("marquee[class='gGao']").click(function(){
		setYYn();		
		$("body").append("<div id='mask'></div>");  
		$("#mask").addClass("mask").fadeIn("slow"); //使用雾罩把屏幕罩住
		$('#gGaoLog').fadeIn("slow");
	});
	//关闭按钮鼠标滑过
	$('.close').mouseover(function(){
		$(this).css('color','black');
	});
	$('.close').mouseout(function(){
		$(this).css('color','999');
	});
	$('.close').click(function(){
		setYYy();
		$("#mask1").fadeOut("slow");
		$('#gGaoLog').fadeOut("slow");
	});

//大转盘

    var log3Height=$('.rotary').height(); //获取登录表单的高度
    var log3Width=$('.rotary').width(); //获取登录表单的宽度
    var win3Height = $(window).height(); //获取窗口的高度
    var win3Width = $(window).width(); //获取窗口的宽度
    var top3 = (win3Height-log3Height)/2; //登录表单离的上边距
    var left3 = (win3Width-log3Width)/2; //登录表单的左边距
    $('.rotary').css('left',left3);       //设置登录表单的左边距
    $('.rotary').css('top',top3);        //设置登录表单的上边距
    //当窗口大小发生变化时再次调整使登录表单居中
    $(window).resize(function(){
        win3Height=$(window).height();
        win3Width=$(window).width();
        top3 =(win3Height-log3Height)/2;
        left3 =(win3Width-log3Width)/2;
        $('.rotary').css('left',left3);
        $('.rotary').css('top',top3);
    });
    //点击登录弹出登录表单
    $("a[class='charge']").click(function(){
    	setYYn();
        $("body").append("<div id='mask'></div>");  
        $("#mask").addClass("mask").fadeIn("slow"); //使用雾罩把屏幕罩住
        $('.rotary').fadeIn("slow");
    });
    //关闭按钮鼠标滑过
    $('.close').mouseover(function(){
        $(this).css('color','black');
    });
    $('.close').mouseout(function(){
        $(this).css('color','999');
    });
    $('.close').click(function(){
    	setYYy();
        $("#mask1").fadeOut("slow");
        $('.rotary').fadeOut("slow");
    });


//修改密码

    var log4Height=$('.pwdEdit').height(); //获取登录表单的高度
    var log4Width=$('.pwdEdit').width(); //获取登录表单的宽度
    var win4Height = $(window).height(); //获取窗口的高度
    var win4Width = $(window).width(); //获取窗口的宽度
    var top4 = (win4Height-log4Height)/2; //登录表单离的上边距
    var left4 = (win4Width-log4Width)/2; //登录表单的左边距
    $('.pwdEdit').css('left',left4);       //设置登录表单的左边距
    $('.pwdEdit').css('top',top4);        //设置登录表单的上边距
    //当窗口大小发生变化时再次调整使登录表单居中
    $(window).resize(function(){
        win4Height=$(window).height();
        win4Width=$(window).width();
        top4 =(win4Height-log4Height)/2;
        left4 =(win4Width-log4Width)/2;
        $('.pwdEdit').css('left',left4);
        $('.pwdEdit').css('top',top4);
    });
    //点击登录弹出登录表单
    $("li[class='editPwd']").click(function(){
    	setYYn();
        $("body").append("<div id='mask'></div>");  
        $("#mask").addClass("mask").fadeIn("slow"); //使用雾罩把屏幕罩住
        $('.pwdEdit').fadeIn("slow");
    });
    //关闭按钮鼠标滑过
    $('.close').mouseover(function(){
        $(this).css('color','black');
    });
    $('.close').mouseout(function(){
        $(this).css('color','999');
    });
    $('.close').click(function(){
    	setYYy();
        $("#mask").fadeOut("slow");
        $('.pwdEdit').fadeOut("slow");
    });


//个人资料

    var log5Height=$('.ownInfo').height(); //获取登录表单的高度
    var log5Width=$('.ownInfo').width(); //获取登录表单的宽度
    var win5Height = $(window).height(); //获取窗口的高度
    var win5Width = $(window).width(); //获取窗口的宽度
    var top5 = (win5Height-log5Height)/2; //登录表单离的上边距
    var left5 = (win5Width-log5Width)/2; //登录表单的左边距
    $('.ownInfo').css('left',left5);       //设置登录表单的左边距
    $('.ownInfo').css('top',top5);        //设置登录表单的上边距
    //当窗口大小发生变化时再次调整使登录表单居中
    $(window).resize(function(){
        win5Height=$(window).height();
        win5Width=$(window).width();
        top5 =(win5Height-log5Height)/2;
        left5 =(win5Width-log5Width)/2;
        $('.ownInfo').css('left',left5);
        $('.ownInfo').css('top',top5);
    });
    //点击登录弹出登录表单
    $("li[class='infoOwn']").click(function(){
    	setYYn();
        $("body").append("<div id='mask'></div>");  
        $("#mask").addClass("mask").fadeIn("slow"); //使用雾罩把屏幕罩住
        $('.ownInfo').fadeIn("slow");
    });
    //关闭按钮鼠标滑过
    $('.close').mouseover(function(){
        $(this).css('color','black');
    });
    $('.close').mouseout(function(){
        $(this).css('color','999');
    });
    $('.close').click(function(){
    	setYYy();
        $("#mask").fadeOut("slow");
        $('.ownInfo').fadeOut("slow");
    });

    //系统消息
    var sysH = $(".system").height();
    var sysW = $(".system").width();
    var winH = $(window).height();
    var winW = $(window).width();
    var left = (winW-sysW)/2;
    var top = (winH-sysH)/2;

    var cW = $(".system span").width();
    var cLeft = (sysW-cW);
    $(".system span").css("margin-left",cLeft);

    $(".system").css("left",left);
    $(".system").css("top",top);
    $(window).resize(function(){
        winH = $(window).height();
        winW = $(window).width();
        left = (winW-sysW)/2;
        top = (winH-sysH)/2;
        $(".system").css("left",left);
        $(".system").css("top",top);

        cW = $(".system span").width();
        cLeft = (sysW-cW);
        $(".system span").css("margin-left",cLeft);
    });
});