require([], function (){

	var isMobileInit = false;
	var loadMobile = function(){
		require([yiliaConfig.base_url+'/js/mobile.js'], function(mobile){
			mobile.init();
			isMobileInit = true;
		});
	}
	var isPCInit = false;
	var loadPC = function(){
		require([yiliaConfig.base_url+'/js/pc.js'], function(pc){
			pc.init();
			isPCInit = true;
		});
	}

	var browser={
	    versions:function(){
	    var u = window.navigator.userAgent;
	    return {
	        trident: u.indexOf('Trident') > -1, //IE内核
	        presto: u.indexOf('Presto') > -1, //opera内核
	        webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
	        gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
	        mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
	        ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
	        android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
	        iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1, //是否为iPhone或者安卓QQ浏览器
	        iPad: u.indexOf('iPad') > -1, //是否为iPad
	        webApp: u.indexOf('Safari') == -1 ,//是否为web应用程序，没有头部与底部
	        weixin: u.indexOf('MicroMessenger') == -1 //是否为微信浏览器
	        };
	    }()
	}

	$(window).bind("resize", function(){
		if(isMobileInit && isPCInit){
			$(window).unbind("resize");
			return;
		}
		var w = $(window).width();
		if(w >= 700){
			loadPC();
		}else{
			loadMobile();
		}
	});

	if(browser.versions.mobile === true || $(window).width() < 700){
		loadMobile();
	}else{
		loadPC();
	}

	//是否使用fancybox
	if(yiliaConfig.fancybox === true){
        $("<link>").attr({ rel: "stylesheet",type: "text/css",href: 'http://apps.bdimg.com/libs/fancybox/2.1.5/jquery.fancybox.min.css'}).appendTo("head");
		require(['http://apps.bdimg.com/libs/fancybox/2.1.5/jquery.fancybox.min.js'], function(pc){
			var isFancy = $(".isFancy");
			if(isFancy.length != 0){
				var imgArr = $(".article-inner img");
				for(var i=0,len=imgArr.length;i<len;i++){
					var src = imgArr.eq(i).attr("src");
					var title = imgArr.eq(i).attr("alt");
					imgArr.eq(i).replaceWith("<a href='"+src+"' title='"+title+"' rel='fancy-group' class='fancy-ctn fancybox'><img src='"+src+"' title='"+title+"'></a>");
				}
				$(".article-inner .fancy-ctn").fancybox();
			}
		});
		
	}
	if(yiliaConfig.prettify === true){
        if($("code").length>0){
        $("<link>").attr({ rel: "stylesheet",type: "text/css",href: yiliaConfig.base_url+"/css/desert.css"}).appendTo("head");
        require(['http://apps.bdimg.com/libs/prettify/r298/prettify.min.js'],function(){
             $("pre").addClass("prettyprint");
             prettyPrint();
        });
        }
	}
	
	//for fast add netease cloud music
	$(".article-entry a").each(function(){
        var re = /http:\/\/music\.163\.com\/#\/m\/song\?id=([0-9]+)/;
        var match = $(this).attr("href").match(re);
        if(match!=null){
            var w = $(this).parent().width();
            var h = $(this).height();
            if(w>510){
                w=510;
            }
            if(w<280){
                w=280;
            }
            $(this).replaceWith(
            $('<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width='+w+' height=86 src="http://music.163.com/outchain/player?type=2&id='+match[1]+'&auto=0&height=66"></iframe>')
            );
        }
	});
	
	$(".js-avatar").addClass("show").fadeIn();
	
	//是否开启动画
	if(yiliaConfig.animate === true && !browser.versions.mobile){
		if(yiliaConfig.isHome === true){
			//content
			function showArticle(){
				$(".article").each(function(){
					if( $(this).offset().top <= $(window).scrollTop()+$(window).height() && !($(this).hasClass('show')) ) {
						$(this).removeClass("hidden").addClass("show");
						$(this).addClass("is-hiddened");
					}else{
						if(!$(this).hasClass("is-hiddened")){
							$(this).addClass("hidden");
						}
					}
				});
			}
			$(window).on('scroll', function(){
				showArticle();
			});
			showArticle();
		}
		
	}
	
	//是否新窗口打开链接
	if(yiliaConfig.open_in_new == true){
		$(".article a[href]").attr("target", "_blank")
	}
	
});