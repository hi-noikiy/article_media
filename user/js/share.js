(function ($) {
    var ms = {
        init:function(obj,args){
            return (function(){
                ms.fillHtml(obj,args);
                ms.bindEvent(obj,args);
            })();
        },
        //填充html
        fillHtml:function(obj,args){
            return (function(){
                var layerHtml = "";
                if (args.Shade == true) {
                    layerHtml += '<div class="share_layer_shade"></div>';
                }
                layerHtml += '<div class="share_layer_box" id="layer_' + args.Content + '">';
                layerHtml += '<h3><b class="text">' + args.Title + '</b><a class="close"></a></h3>';
                layerHtml += '<div class="layer_content">';
                layerHtml += '<div id="' + args.Content + '"><ul>';
                layerHtml += '<li title="源码发布"><a class="share-qq"></a></li>';
        
                layerHtml += '<li title="网站开发"><a class="share-xl-weiBo"></a></li>';
			    layerHtml += '<li title="网站出售"><a class="share-tx-weiBo"></a></li>';
				layerHtml += '<li title="美工设计"><a class="share-people"</a></li>';
				layerHtml += '<li title="域名出售"><a class="share-tx-weiBo3"></a></li>';
                
			
			
			    layerHtml += '<li title="账号出售"> <a class="share-code">';			
				
             
				layerHtml += '<li title="营销运营"><a class="share-tx-weiBo1"></a></li>';

                $('body').prepend(layerHtml);
            })();
        },
        //绑定事件
        bindEvent:function(obj,args){
            return (function(){
                var $shareLayerBox = $('.share_layer_box');
                var $shareLayerShade = $('.share_layer_shade');
                var $ShareLi = $('#Share li');

                if (args.Event == "unload") {
                    $('#layer_' + args.Content).animate({
                        opacity: 'show',
                        marginTop: '-30%'
                    }, "slow", function () {
                        $($shareLayerShade).show();
                    });
                } else {
                    $(obj).on(args.Event, function () {
                        $('#layer_' + args.Content).animate({
                            opacity: 'show',
                            marginTop: '0'
                        }, "slow", function () {
                            $($shareLayerShade).show();
                        });
                    });
                }


                $($ShareLi).each(function () {
                    $(this).hover(function () {
                        $(this).find('a').animate({marginTop: 2}, 'easeInOutExpo');
                        $(this).find('span').animate({opacity: 0.2}, 'easeInOutExpo');
                    }, function () {
                        $(this).find('a').animate({marginTop: 12}, 'easeInOutExpo');
                        $(this).find('span').animate({opacity: 1}, 'easeInOutExpo');
                    });
                });

                $('.share_layer_box .close').on('click', function () {
                    $($shareLayerBox).animate({
                        opacity: 'hide',
                        marginTop: '-30%'
                    }, "slow", function () {
                        $($shareLayerShade).hide();
                    });
                });

                var share_url = encodeURIComponent(location.href);
                var share_title = encodeURIComponent(document.title);

                //源码发布
                $($ShareLi).find('a.share-qq').on('click', function () {
                    window.open("/user/productlx.php" );
                });

                //开发
                $($ShareLi).find('a.share-xl-weiBo').on('click', function () {
                    var param = {
                        url: share_url,
                        title: share_title,
                        rnd: new Date().valueOf()
                    };
                    var temp = [];
                    for (var p in param) {
                        temp.push(p + '=' + encodeURIComponent(param[p] || ''))
                    }
                    window.open("./productlxkf.php" );
                });

                //美工
                $($ShareLi).find('a.share-people').on('click', function () {
                    window.open("./productlxmg.php" );
                });

                //网站出售
                $($ShareLi).find('a.share-tx-weiBo1').on('click', function () {
                    window.open("./productlxyy.php" );
                });
				 //域名
                $($ShareLi).find('a.share-tx-weiBo3').on('click', function () {
                   window.open("./productlxym.php" );
                });
                //网站出售
                $($ShareLi).find('a.share-tx-weiBo').on('click', function () {
                  window.open("./productlxwz.php" );
                });
                // 账户出售
                $($ShareLi).find('a.share-code').on('click', function () {
                    window.open("./productlxzh.php" );
                });
				
               
         
				
				
            })();
        }
    };
    $.fn.shareConfig = function (options) {
        var args = $.extend({
            Shade: true,
            Event: "click",
            Content: "Share",
            Title: "分享"
        },options);
        ms.init(this, args);
    };
})(jQuery);
