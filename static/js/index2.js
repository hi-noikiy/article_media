	// index login
	$('#index-login-form').live('submit', function(){
		var user_name = $('#index-login-form input[name=user_name]').val().replace(/(^\s+)|(\s+)$/g, '').toLowerCase();
		var user_pwd = $('#index-login-form input[name=user_pwd]').val();
		var captcha = $('#index-login-form input[name=captcha]').val().replace(/(^\s+)|(\s+)$/g, '');
		
		var u_n_reg = /^[a-z\d_\-\@\.]+$/gi;
		
		if(user_name == '' || user_name.length < 3 || user_name.length > 50 || !u_n_reg.test(user_name)) {
			$('#index-login-form input[name=user_name]').focus().parents('tr').find('em').removeClass().addClass('error').html('帐号不正确').show();
			return false;
		} else {
			$('#index-login-form input[name=user_name]').parents('tr').find('em').removeClass().html('').hide();
		}
		
		if(user_pwd == '' || user_pwd.length < 6 || user_pwd.length > 20) {
			$('#index-login-form input[name=user_pwd]').focus().parents('tr').find('em').removeClass().addClass('error').html('密码不正确').show();
			return false;
		} else {
			$('#index-login-form input[name=user_pwd]').parents('tr').find('em').removeClass().html('').hide();
		}
		
		if(captcha.length !=4) {
			$('#index-login-form input[name=captcha]').focus().val('').parents('tr').find('em').removeClass().addClass('error').html('验证码不正确').show();
			return false;
		} else {
			$('#index-login-form input[name=captcha]').parents('tr').find('em').removeClass().html('').hide();
		}

		$('#index-login-form input').trigger('blur');
		$('#index-login-form #loading_tips').removeClass().addClass('m_loading_8d6b6b');

		dynamic_login(function(){
			if(!sha1_vm_test()) {
				return false;
			}
			user_pwd = dynamic_encrypt(user_pwd);
			$.ajax({
					type: 'POST',
					url: '/member/login',
					data: {user_name:user_name,user_pwd:user_pwd,captcha:captcha,t:Math.random()},
					dataType: 'json',
					complete: function() {
						$('#index-login-form #loading_tips').removeClass();
					},
					success: function(ret) {
						if(ret.ok) {
							window.location.reload();
						} else {
							$('#index-login-form input[name='+ret.data.identify+']').focus().parents('tr').find('em').addClass('error').html(ret.reason).show();
							$('#index-login-form input[name=captcha]').val('');
							$('.captcha img').click();
						}
					}
			})
		});
		
		return false;
	});
	
	$('#index-login-form input').live('focus', function(){
		$(this).parent().addClass('focus');
	})
	$('#index-login-form input').live('blur', function(){
		$(this).parent().removeClass('focus');
	});
	
	$('.hdp .captcha img').live('click', function(){
		var self = this;
		var captchaImg = new Image();
		captchaImg.onload = function() {
			$(self).attr('src', captchaImg.src);
		}
		captchaImg.src = "/member/captcha?t=" + Math.random();
	});
	//$('#index-login-form input[name=user_name]').trigger('focus');
	
	//
	var n_c_ser = 0;
	function t_player(cur) {
		$('.hdp .pic_link ul > li').eq(n_c_ser).removeClass("xz");
		if(cur==null) {
			n_c_ser = ++n_c_ser % 3;
		} else {
			n_c_ser = cur;
		}
		
		if(n_c_ser !=0 ) {
			$('.hdp .pic ul > li').eq(0).children('div').remove();
		}
		$('.hdp .pic ul').animate({marginLeft:(-1 * n_c_ser * $('.hdp .pic ul > li').width()) + 'px'});
		$('.hdp .pic_link ul > li').eq(n_c_ser).addClass("xz");
	}
	var n_t = setInterval('t_player()', 5000);
	
	$('.hdp .pic_link ul > li,.hdp .pic ul>li').live('mouseover', function(){
		var self = this;
		clearInterval(n_t);
		$('.hdp .pic ul').stop();
		var mid = $(self).attr('mid');
		t_player(mid);
	})
	
	var current_serial_id = 4;
	$('.hy_lanmu li a').bind('click', function(e){
		var serial_id = $(this).parent().attr('serial_id');
		//if(checkHover(e, this.parent()) && serial_id != current_serial_id) {
			$('.hy_lanmu li:visible').removeClass('xz');
			$(this).parent().addClass('xz');
			$('.hytq_pic').children('ul:visible').hide().end().children('#tequan_' + serial_id).fadeIn('slow');
			current_serial_id = serial_id;
		//}
			
		return false;
	});
	$('.hy_lanmu li a').bind('focus', function(e) {
		$(this).trigger('blur');
	});
	
	var s_hy_c_ser = 0;
	function say_hy_player() {
		$('.hy_name ul li').eq(s_hy_c_ser).slideUp('slow', function(){
			s_hy_c_ser = ++s_hy_c_ser % ($('.hy_name ul li').length / 2);
			if(s_hy_c_ser == 0) {
				$('.hy_name ul').append($('.hy_name ul li:hidden').clone().show()).children(':hidden').remove();
			}
		});
	}
	$('.hy_name').hover(
		function(e){
			clearInterval(s_hy_t);
		},
		function(e){
			if(!checkHover(e, this)) {
				s_hy_t = setInterval('say_hy_player()', 3000);
			}
		}
	);
	$('.hy_name ul').append($('.hy_name ul li').clone());
	var s_hy_t = setInterval('say_hy_player()', 3000);
	
	var s_tms_c_ser = 0;
	function say_tms_player() {
		var _h = $.browser.msie && ($.browser.version.substr(0, 1) == '6') ? 64 : 62;
		marginTop = -(s_tms_c_ser +1) * _h;
		//alert(li_height + ', ' + marginTop + ', ' + $('.tms ul').css('marginTop'));
		$('.tms ul li').eq(s_tms_c_ser).parent().animate({marginTop: marginTop + 'px'}, 'slow', function(){
			//s_tms_c_ser = ++s_tms_c_ser % ($('.tms ul li').length / 2);
			s_tms_c_ser++;
			if(s_tms_c_ser >= $('.tms ul li').length / 2) {
				//$('.tms ul').append($('.tms ul li:hidden').clone().show()).children(':hidden').remove();
				$(this).css({marginTop: '0px'});
				s_tms_c_ser = 0;
			}
		});
	}
	$('.tms').hover(
		function(e){
			clearInterval(s_tms_t);
		},
		function(e){
			if(!checkHover(e, this)) {
				s_tms_t = setInterval('say_tms_player()', 3000);
			}
		}
	);
	$('.tms ul').append($('.tms ul li').clone());
	var s_tms_t = setInterval('say_tms_player()', 3000);
	
	//var swf_is_init = false;
    function show_new_guide(ob) {
    	if(!swfobject.hasFlashPlayerVersion('10.2.0')) {
    		$('<div><a href="http://www.adobe.com/go/getflashplayer" target="_blank">观看教程请安装Flash Player</a></div>')
    			.appendTo($('.hdp .pic ul>li').eq(0))
    			.css({position:'absolute',top:'10px',right:'5px',color:'#000'});
    		
    		return;
    	}
    	
    	var innerHtml = "";
		innerHtml += "<div class=\"new_guide\">";
		innerHtml += "	<div class=\"swf_box\">";
		innerHtml += "	    <div class=\"flash_content\">";
		innerHtml += "	    	<div id=\"flashContent\" class=\"flashContent\"></div>";
		innerHtml += "	    </div>";
		innerHtml += "	    <div class=\"flash_bg\"></div>";
		innerHtml += "    </div>";
		innerHtml += "</div>";
		innerHtml += "<div class=\"new_guide_bg\"></div>";	
		$('body').append(innerHtml);
		
        var swfVersionStr = "10.2.0";
        var xiSwfUrlStr = "/static/official/swf/playerProductInstall.swf";
        var flashvars = {};
        var params = {};
        params.quality = "high";
        params.bgcolor = "#000000";
        params.allowscriptaccess = "always";
        params.allowfullscreen = "true";
        params.wmode = "transparent";
        var attributes = {};
        attributes.id = "swf_new_guide";
        attributes.name = "swf_new_guide";
        attributes.align = "middle";
        swfobject.embedSWF(
            "/static/official/swf/swf_player.swf", "flashContent", 
            "695", "586", 
            swfVersionStr, xiSwfUrlStr, 
            flashvars, params, attributes);
        swfobject.createCSS("#flashContent", "display:block;text-align:left;");
        
    	$('.new_guide_bg').height($('body').height() > $(window).height() ? $('body').height() : $(window).height());
    }
    
    function hide_new_guide() {
    	$('.new_guide_bg').remove();
    	$('.new_guide').remove();
    }