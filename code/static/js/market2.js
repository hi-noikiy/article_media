$(document).ready(function() {
$('.tkey a').click(function(){
  var i = $(this).attr('id');
  $("#eve"+i).get(0).click();
});

$('.buys').click(function(){
  var c = $(this).attr('id');
	layer.check('check',function(is){
    if(!is){
    layer.login('再继续',c);
	}else{
	  layer.cart(c);
	}
});
});

$('#ly_install').click(function(){//安装服务详情
var t ='install.php?type='+readmeta('Pg-Type')+'&bh='+readmeta('Item-Number');
layer.iframe(t,'安装服务详情',600,530);
});



$('#ly_report').click(function(){//举报
var t ='report.php?type='+readmeta('Pg-Type')+'&bh='+readmeta('Item-Number');
layer.iframe(t,'我要举报',580,370);
});
});

layer.cart = function(c,t){
    var space = {};
    space.layer = function(html){
        $.layer({
            type: 1,
            border: [4, 0.3, '#000'],
            shade: [0.01, '#000'],
            closeBtn: [0, true],
			shadeClose: true,
            title: ['我的购物车', 'border:none; background:#f2f2f2; color:#333;font-size:14px;'],
            area: ['auto', 'auto'],
            page: {
                html: html
            }
        });
		$("#acar").hide();
        $("#hcar").show();

		   $('.xubox_botton3').on('click', function(){
		layer.closeAll();
		});

		}
        
		$.post('/check/add_cart.php',{cc:c,bh:readmeta('Item-Number'),type:readmeta('Pg-Type')}, function(html){
         if(c=='acar'){
         space.layer(html);
		 }else{
		  location.href=$('.logo a').attr('href')+'member/car.html';
		 }
        });
		

        
}


$.fn.extend({     
   layer_top:function(){
	var topMain=$("#layer_top").offset().top+40;
	
	$(window).scroll(function(){

		if ($(window).scrollTop()>topMain){
		$("div").filter("#layer_top").addClass("topsp");
		$("div").filter("#layer_cont").addClass("contsp");
		}else{
		$("div").filter("#layer_top").removeClass("topsp");
		$("div").filter("#layer_cont").removeClass("contsp");
		}
	});
}});

$.fn.extend({     
   AdAdvance:function(){
	var listobj=this;
        var objs =$('dt',this);
	var view =objs.length-1;//parseInt( Math.random()*objs.length)
	objs.each(function(i){
	$(this).mouseover(function(){ $('dd',listobj).hide();$('.dropList-hover',listobj).attr("class",""); $(this).children("P").attr("class","dropList-hover");$(this).next().show()})
	if(i!=view)
	{
		$(this).next().hide();
	}
	else
	{
		$(this).next().show();
		$(this).children("P").attr("class","dropList-hover");
	}
	});
    }
}); 

 
 $.fn.extend({  
  menu_layer:function(){
	var c_aa = $("#c_aa").offset().top;
	var c_bb = $("#c_bb").offset().top;
	var c_cc = $("#c_cc").offset().top;
	//alert(tops);
	$(window).scroll(function(){
		var scroH = $(this).scrollTop()+120;
		if(scroH>=c_cc){
		
			set_cur(".c_cc");

		}else if(scroH>=c_bb){
		
			set_cur(".c_bb");
		}else if(scroH>=c_aa){
			set_cur(".c_aa");
		}
	});
$(".c_r_menu span").click(function() {
		var el = $(this).attr('class');
     	$('html, body').animate({
         	scrollTop: $("#"+el.replace(/cur/,"")).offset().top-46
     	}, 300);
		$(this).addClass("cur").siblings("span").removeClass("cur");	
 	});
}});

function set_cur(n){
		
	if($(".c_r_menu span").hasClass("cur")){
		$(".c_r_menu span").removeClass("cur");
	}
	$(".c_r_menu span"+n).addClass("cur");
}


  


$(function(){
	
		$('.fw_a').hover(function(){
			$(this).addClass('fw_on');
			$(this).siblings().removeClass('fw_on');
			var i = $('.fw_a').index($(this));
			$('.fw_txt').hide();
			$('.fw_txt').eq(i).show();
		},function(){//离开
			$('.fw_txt').hide();
		 	$(this).removeClass('fw_on');
	});
		
	});
 $(document).ready(function() {
	    $('.list .dlist').mouseenter(function(){	
		$this=$(this);            
        enter=setTimeout(function(){
			$this.css("border","1px solid #ff4400").find('.Layer').show();
			},500);  
        }).mouseleave(function(){      
	      clearTimeout(enter);       
	     $this.css("border","1px solid #e5e5e5").find('.Layer').hide();  
	     });	

		$(".list .slist").hover(function() {
		$(this).addClass("slcur");
	    }, function() {
		$(this).removeClass("slcur");
	    });

		$(".domainlist ul").hover(function() {
		$(this).addClass("domaincur");
	    }, function() {
		$(this).removeClass("domaincur");
	    });

		$(".tasklist ul").hover(function() {
		$(this).addClass("taskcur");
	    }, function() {
		$(this).removeClass("taskcur");
	    });

		$('#Comment').on('click', function(){ //评论
         var txt = $('#container').val();
        if(txt.length<5){
         layer.tips('评论不能少于5个字', '#container',{guide: 0, time: 2});return false;
        }
        var t = "pl&type1="+readmeta('Page-Type')+'&bh='+readmeta('Item-Number')+"&txt="+txt;
        layer.check(t,function(is){	
     	if(is!=false){
        if(!isNaN(is)){
        $.post('/check/newpl.php',{bh:is},
        function(data){//执行成功之后的回调函数
    	$('#container').val('');
        $('#info').prepend(data);});
	    var scroll_offset = $('#plv').offset(); 
     	$("body,html").animate({   
		scrollTop:scroll_offset.top 
	    },300); 
	    }else{
	    layer.alert(is, 5); 
	    }
	    }else{
         layer.dlts('评论','Comment');
	    }
	   });
	});

    $(".hf").hover(function(){
	    $(this).css({"background":'#FFF'})
        $(this).find("#hfcap").show();
    },function(){
		$(this).css({"background":'#FBFBFB'})
        $(this).find("#hfcap").hide();
    });
})


//推荐滚动
$(document).ready(function(){	
	var lb = $("#limit-buy"),
		lb_cur = 1,
		lbp_w = lb.find(".products").width();
		lb_timer = null;
	t = 1;
	function showLimitBuyProducts(){
		if(lb_cur < 1){
			lb_cur = 2;
		} else if(lb_cur > 2){
			lb_cur = 1;
		}
		$("#J-lbcp").html(lb_cur);
		var products = $("#limit-buy .products").hide().eq(lb_cur-1).show(),
			ta = products.find("textarea");
		if(ta.length){
			products.html(ta.val());
		}
	}
	lb_timer = setInterval(function(){
		lb_cur++;
		showLimitBuyProducts();
	}, 4000);
	
	$("#J-lbn .prev, #J-lb .btn-prev").click(function(){
		lb_cur--;
		showLimitBuyProducts();
	});
	$("#J-lbn .next, #J-lb .btn-next").click(function(){
		lb_cur++;
		showLimitBuyProducts();
	});
	$("#J-lb").hover(function(){
			clearInterval(lb_timer);
			lb_timer = null;
			$("#J-lb .btn-prev, #J-lb .btn-next").show();
		}, function(){
			lb_timer = setInterval(function(){
				lb_cur++;
				showLimitBuyProducts();
			}, 10000);
			$("#J-lb .btn-prev, #J-lb .btn-next").hide();
	});
});


 function Budget_r(){
	 $val=$("input[name='moneytype']:checked").val();
   $('.models .type strong').removeClass("cur");
   $('.models .set_up').hide();
   $('.c_b_'+$val).show();
   $('#b_b_'+$val).addClass("cur");
}
 function times_r(i){
	$c=$(i).attr('class');
	$n=$(i).attr('name');
	$v=$(i).val();
	if($c!='custom_inp'){
 
  if($v=='offer'){
	$('#cyc_notes').hide(); $('span.notes').show();
	$('.periods_'+$n).html('<font color=#247fbd>'+$v+'天</font>');
	return false; 
  }else if($v=='custom'){
   	 if($('#'+$n+'_custom input').val()<1){return false; }
		$v=$('#'+$n+'_custom input').val();
		}
	 if($n=='cyc'){$('#cyc_notes').show(); $('span.notes').hide();}
	$('.periods_'+$n).html('<font color=#247fbd>'+$v+'天</font>');
 }else{
 if($n=='periods_cyc'){$('#cyc_notes').show(); $('span.notes').hide(); }
  $('.'+$n).html('<font color=#247fbd>'+$v+'天</font>');
 }
 }

function shopso(y,x,z){
if(z!="shop"){
if(isNaN(document.getElementById("money1").value)){alert("价格输入有误！");document.getElementById("money1").select();return false;}	
if(isNaN(document.getElementById("money2").value)){alert("价格输入有误！");document.getElementById("money2").select();return false;}
var strs = new Array(); //定义一数组
var v = "";
strs=y.split("|"); 
for (i=0;i<strs.length;i++) 
{ 
if(strs[i]!=""){
v = v+"e"+strs[i]+"v_"; //分割后的字符输出 
}
} 
if(z=="code" || z=="ishop"){
c=document.getElementsByName("YSC1");
if(c[0].checked==true){ys=1;}else{ys=0;}
g=document.getElementsByName("JFC1");
if(g[0].checked==true){jf=1;}else{jf=0;}
d=document.getElementsByName("ZDC1");
if(d[0].checked==true){zd=1;}else{zd=0;}
wz=x+"_"+v+"i"+document.getElementById("money1").value+"v_j"+document.getElementById("money2").value+"v_l"+ys+"v_g"+jf+"v_d"+zd+"v_k"+encodeURIComponent(document.getElementById("likey").value)+"v.html";
}else{
wz=x+"_"+v+"i"+document.getElementById("money1").value+"v_j"+document.getElementById("money2").value+"v_k"+encodeURIComponent(document.getElementById("likey").value)+"v.html";
}
}else if(z=="shop"){
wz="index_k"+encodeURIComponent(document.getElementById("likey").value)+"v.html";
}
location.href=wz;
}



function ds(x){
	if(tit.value=="" || tit.value=='店内搜索'){alert("请输入关键词");tit.value='';tit.focus();return false;}
	location.href="/ishop"+x+"/code_i"+escape(di.value)+"v_j"+escape(gao.value)+"v_k"+encodeURIComponent(tit.value)+"v.html";
	}

function dshc(x){
  if (event.keyCode==13)   //回车键的键值为13
   ds(x)
}


function addo(){
layer.prompt({title: '请输入临时管理密码'}, function(val,elem){
      var data="addo&bh="+readmeta('Item-Number')+"&p="+val;
      layer.check(data,function(is){	
	        if(is!=false){
             location.href='/member/domain.html?bh='+readmeta('Item-Number');
	         }else{
   		     alert("密码错误，IP已记录，非本人请勿恶意尝试！");return false;
	         }
	         });  
})
}

function click_scroll(x,y){
	$.post('/comment/newpl.php',{bh:y},//如果你需要传参数的话，可以写在这里，格式为：{参数名：值,参数名：值...}
     function(data){//执行成功之后的回调函数
  $('#info').html(data);});
	var scroll_offset = $(x).offset(); 
	//得到pos这个div层的offset，包含两个值，top和left 
	$("body,html").animate({   
		scrollTop:scroll_offset.top 
		//让body的scrollTop等于pos的top，就实现了滚动 
	},300); 
	}
var checkSubmit = false; 
function post_buy(){
    if(checkSubmit==true){return false;layer.alert("您刚刚已发布过了，30秒后再试",5);} 
	var isOK = true;
	var type = readmeta('Pg-Type');
	var tit = $('#tit').val();
	var cstr=",";
	var qq = $('#qq').val();
	var tel = $('#tel').val();
	var has= UE.getEditor('container').hasContents();
	   if(tit==""){
	   scTop('tit');
       layer.tips('亲，不要忘记填写【标题】哦！', '#tit',{guide: 1, time: 5});$('#tit').focus(); return false;
       }
	   if(!has){
	   scTop('container');
	   layer.tips('【交易内容】不能为空,请认真填写', '#container',{guide: 1, time: 2}); return false; 
       }

if(type=='task'){
var budget=$("input[name='moneytype']:checked").val();
var fixed_price=$("#fixed_price").val();
var range_floor=$("#range_floor").val();
var range_cap=$("#range_cap").val();
var cyc=$("input[name='cyc']:checked").val();
var cycinp=$("input[name='periods_cyc']").val();
var dqsj=$("input[name='dqsj']:checked").val();
var dqsjinp=$("input[name='periods_dqsj']").val();
       if(budget==1){
	   if(fixed_price<5){
	   scTop('fixed_price');
	   layer.tips('【一口价金额】不能小于5元'+budget, '#fixed_price',{guide: 1, time: 2});
	   $('#fixed_price').focus();return false; 
	   }
       }else if(budget==2){
		if(range_floor<100){
	   scTop('range_floor');
	   layer.tips('【范围报价】下限不能低于100元', '#range_floor',{guide: 1, time: 2});
	   $('#range_floor').focus();return false; 
	   }else if((range_cap-range_floor)<1){
	   scTop('range_cap');
	   layer.tips('【范围报价】上限必须高于下限', '#range_cap',{guide: 1, time: 2});
	   $('#range_cap').focus();return false;
	   }
	   }
       if(cyc=='custom' && cycinp<1){
	   layer.tips('自定义【周期】不能小于1天', "input[name='periods_cyc']",{guide: 2, time: 2});
	   $("input[name='periods_cyc']").focus();return false;
	   }
	   if(dqsj=='custom' && dqsjinp<1){
	   layer.tips('自定义【有效期】不能小于1天', "input[name='periods_dqsj']",{guide: 2, time: 2});
	   $("input[name='periods_dqsj']").focus();return false;
	   }
}

	   $("select[name='sxd']").each(function(){    
	    if($(this).val()==''){
			var s = $('#'+$(this).attr('rel'));
			scTop($(this).attr('rel'));
			layer.tips('亲，不要忘记选择【'+s.html()+'】哦！',s,{guide: 1, time: 5});isOK = false;
		    return false; 
			}else{cstr=cstr+$(this).val()+",";}
	    });
		
        if(isOK){
		 if($("input[name='myfile']").val()){
			layer.load('正在上传附件，请稍等……', 0);}else{$('#tjbtn').hide();$('#tjing').show();}
		checkSubmit=true; 
		$("form").attr("target", "form-target"); 
		$("form").attr('action', '/check/buy_post_add.php?cstr='+cstr).submit();
		}else{
		return false;
		}
	    }
function post_bid(str){
	    var money = $('#money').val();
		var money = $('#money').val();
		var cyc = $('#cyc').val();
		var t_money = $('#t_money').html();
	    var range_floor = parseInt($('#range_floor').html());
		var range_cap = parseInt($('#range_cap').html());
		var t_cyc = $('#t_cyc').html();
		var ixt = $('.ixt').val();
		var vhide='';
		
       $('[name="hides"]:checked').each(function(){vhide+=$(this).val()+'|';})
	   if(t_money){
	   if(!money){
       layer.tips('请输入您的任务报价！', '#money',{guide: 1, time: 5});$('#money').focus(); return false;
       }else if(money<range_floor || money>range_cap){
       layer.tips(t_money, '#money',{guide: 1, time: 5});$('#money').focus(); return false;
       }
       }else{
       money=""; 
	   }

	  
	   if(t_cyc){
	   if(!cyc){
	   layer.tips('请输入任务周期！', '#cyc',{guide: 1, time: 2});$('#cyc').focus();return false; 
       }else if(cyc<1 || cyc>60){
       layer.tips('任务周期允许范围：1-60天', '#cyc',{guide: 1, time: 5});$('#cyc').focus(); return false;
       }
	   }else{
	   cyc=""; 
	   }

var t='bid&cyc='+cyc+'&money='+money+'&ixt='+ixt+'&hides='+vhide+'&ut='+readmeta('Up-time')+'&bh='+readmeta('Item-Number')+'&bbh='+str;

layer.check(t,function(is){	
if(is==0){
    layer.login('再继续','post_bid');
	}else{
	var arr =is.split('|');
	if(arr[0]==1){
     layer.alert(arr[1],1,'操作提示',function(index){layer.close(index);getData(1);return false;});
	}else if(arr[0]==6){
     layer.alert(arr[1],5,'操作提示',function(index){layer.close(index);return false;});
	}else{
	  layer.alert(arr[1],5,'操作提示');
	}

    }
	});
}

$(".small_pages a").live('click',function(){
		var c = $(this).attr("class");
		var t = $(this).attr("id");
		var p = parseInt($('.curPage').html());
		if(c!='no'){
			$(".small_pages input[type=text]").val('')
			if(t=='p_down'){p=p+1}else{p=p-1}
			getData(p);
		}
	});
$(".s_r_menu :radio").live('click',function(){
		getData(1,$(this).val());	
	});


$(".bid_b .qx,.bid_b .xz").live('click',function(){
		var c = $(this).attr("class");
		var b = $(this).attr("b_id");
        if(c=='qx'){
        $tisp="<b style='color:red'>确定取消此中标吗？</b><br>您只有<b>1</b>次取消重新选标的机会";
		}else{
		$tisp="<b style='color:#ff6600'>确定要选此投标吗？</b>";
		}
		layer.confirm($tisp,function(){
        bidcz(b,c);
        });
	
	});

function bidcz(b,c){ 
t='bidcz&bh='+readmeta('Item-Number')+'&bbh='+b+'&cz='+c;
layer.check(t,function(is){	
if(is==0){
    layer.login('再继续','post_bid');
	}else{
	var arr =is.split('|');
	if(arr[0]==1 || arr[0]==5){
     layer.alert(arr[1],$.trim(arr[0]),'操作提示',function(index){layer.close(index);getData(0,'g');return false;});
	}
    }
	});
}
$(".bid_tit .u2 span,.s_r_menu a").live('click',function(){
		var type=readmeta('Pg-Type');
	    var isOK = true;
	    var $rel = $(this).attr("rel");

		if($rel=='my'){
		layer.check('check',function(is){	
	    if(is==false){
        layer.login('再继续','mybid');
		return false;isOK = false;
		}
		});
		}

		if(isOK){ 
		$('.'+type+'_cur').removeClass();
		$(this).attr('class',type+'_cur');
		if($rel.indexOf('asc')>0){
		$(this).attr('rel',$rel.replace(/asc/g,"desc"));
		$(this).html($(this).html().replace(/↓/g,"↑"));
		}
		if($rel.indexOf('desc')>0){
		$(this).attr('rel',$rel.replace(/desc/g,"asc"));
		$(this).html($(this).html().replace(/↑/g,"↓"));
		}	
		if(type='shop'){
		$("#f-q").trigger("click");return false;
		}
		getData(1);
		}
	});

function refile(){ //清除FILE
$('#files').html('');
 var file = $("input[name='file']");
  file.after(file.clone().val(""));  
  file.remove();   
}
function getFile(is){ //FILE验证
var pos = is.value.lastIndexOf("\\");
var filename = is.value.substring(pos+1);
$('#files').html('&nbsp;'+filename+'&nbsp;<font color=red>删除</font>');
if(window.File && window.FileReader && window.FileList && window.Blob){
    if(is.files[0].size>5242880){
	 stopUpload(1);
	}
	}
	 var arr = ["rar","zip","docx","doc","txt"];
	 var type = is.value.substr(is.value.lastIndexOf(".")+1);
	if($.inArray(type,arr)<0){
     stopUpload(2);
	}
}

function stopUpload(rel){  //FILE回调
    switch (rel){                                
	case 1:                     
	    layer.alert("附件大小上限5M，可压缩后上传",5);refile();
	break;                 
	case 2:                     
	    layer.alert("<strong>附件格式不对，您可以压缩后上传</strong><br>允许格式：rar、zip、docx、doc、txt",5);refile();
	break;  
	case 3:                     
	   layer.alert("您刚刚已发布过了，30秒后再试",5);$('#tjbtn').show();$('#tjing').hide();
	   setTimeout(function () { 
       checkSubmit = false; 
    }, 30000);
	break;
	default:  
		location.href=rel;      
	}     
} 
