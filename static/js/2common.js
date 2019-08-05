var Durl = window.location.pathname;
$(document).ready(function() {
$(".checkLen").each(function(){  
        checkLen(this,parseInt($(this).attr('d_len')))
    });
$('.checkLen').live('keyup', function(){
        checkLen(this,parseInt($(this).attr('d_len')))
    });
$(".o_number").live('keyup',function(){  
        var txt=$(this).val();     
        $(this).val(txt.replace(/\D|^0/g,''));     
    });
	
$('#list_count').html($('#nums').html());
$('.login_qq').on('click', function(){//QQ登陆
login_qq();
});
$('.login_alipay').on('click', function(){//支付宝登陆
login_alipay();
});
$('#ly_browse').on('click', function(){//最近浏览
layer.iframe('browse.php','最近浏览记录',800,430);
});
$('#ly_kfqq').on('click', function(){//最近浏览
layer.iframe('qq.html','管理客服',370,200);
});

$('.uim p,.uim a').live('click', function(){//Q
var	$this=$(this);
var $im="";
var $tit="客服";
if($this.parent().hasClass('mb')){$tit="方式";}
var $arr = $this.parent().attr("uinfo").split("|");
   $this.siblings().each(function(){
    $im+=$(this).html()+",";
	})
$.get("/check/uqq.php?cim="+$this.html()+"&im="+$im,{cim:$this.html(),im:$im}, function(html){
	layer.ly(html,'<img src="'+$arr[1]+'" style="width:20px;height:20px;float:left;"><strong style="float:left;max-width:100px;overflow:hidden;color:#ff6600;padding:0 5px;">'+$arr[0]+'</strong> <span style="color:#666;line-height:20px;float:left;">联系'+$tit+'</span>',true);
});
});
$('.imfav').on('click', function(){//收藏
  var fid = $(this).attr("id");
  var t = "fav&ty="+fid+"&bh="+readmeta('Item-Number');
layer.check(t,function(is){
    if(is!=false){
	layer.alert(is, 1); 
	}
	else{
	 layer.dlts('收藏',fid);
	}
});
});

$('#released').live('click', function(){//发布
$this=$(this);
$.get('/check/released.php?type='+$this.attr('data_type'), function(html){
	layer.ly(html,$this.html(),true);
});
});

$('.gopage').on('click', function(){//分页跳转
var pagenum =$(this).prev().val();
if(pagenum>parseInt($('.totalPage').html())){
	layer.alert('不能超过最大页数：'+$('.totalPage').html(),5);
}else if(pagenum<1){
	layer.alert('不能低于最小页数：1',5);
}else{
	getData(pagenum);
	}
});

});


logout = function(){ 
	layer.check('logout',function(is){	
	if(	Durl.split("/")[1]!='member'){
    layer.msg(is,3,{
    type:9, 
    rate: 'bottom', 
    shade: [0]
    });
	UCheck();
	}else{
    location.reload()
	}
	});
}

sign = function(){ //每日签到
layer.check('sign',function(is){	
	if(is!=false){
	layer.alert(is, 1); 
	}else{
    layer.dlts('签到','login_sign');
	}
	UCheck();
	});
	}
//登陆提示
layer.dlts = function(mb,ckid){ 
	$.layer({
    shade: [0],
    area: ['auto','auto'],
    dialog: {
        msg: '亲，要先<font color="red">登陆</font>才能<font color="#ff6600">'+mb+'</font>哦！',
        btns: 2,                    
        type: 4,
        btn: ['去登陆','打酱油'],
        yes: function(){
		 layer.closeAll();
         layer.login('再'+mb,ckid);
        }, no: function(){
            layer.msg('好吧，亲，那您就继续打酱油吧！', 2);
        }
    }
	});
}

//弹出iframe
layer.iframe = function(u,t,w,h){ 
 $.layer({
            type : 2,
            title: t,
			shade: [0.05, '#000'],
            shadeClose: true,
            area: [w, h],                     
            iframe: {
				scrolling: 'no',
                src : '/check/'+u
            } 
        });
}

//弹出层
layer.ly = function(html,tit,sc){ 
 $.layer({
            type: 1,
            border: [4, 0.3, '#000'],
            shade: [0.05, '#000'],
            closeBtn: [0, true],
	        shadeClose: sc,
            title: [tit, 'font-weight:700; background:#f2f2f2; color:red;font-size:14px;'],
            area: ['auto', 'auto'],
            page: {
                html: html
            }
               
        });
}

//QQ登陆
login_qq = function(){ 
		openwindow('/api_login/qq/','QQ登陆',710,400)
}

//支付宝登陆
login_alipay = function(){ 
setCookie("apay_url",Durl,"5");
openwindow('/api_login/alipay/','支付宝登陆',950,680);
}

function openwindow(url,name,iWidth,iHeight)
{
var url; 
var iWidth; 
var iHeight;
var iTop = (window.screen.availHeight-30-iHeight)/2; 
var iLeft = (window.screen.availWidth-10-iWidth)/2; 
window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizable=yes,location=yes,status=no');
}

//更新登陆
function UCheck(){
layer.check('check',function(is){
	if(is!=false){
	var arr = is.split('|');
		$(".no_login").hide();  
		$("#t_ok_login").show().html(arr[0]);
		$("#i_ok_login").show().html(arr[1]);
	    $("#c_ok_login").show().html(arr[2]);
		$("#m_ok_q").show().html(arr[3]);
		$("#m_ok_t").show().html(arr[4]);
		$("#m_ok_e").show().html(arr[5]);
	}else{
	   $(".no_login").show();  
	   $(".ok_login").hide();
	}
});
}

//验证
layer.check = function(t,callback){
          $.ajax({
              type: "POST",
              url: "/check/Check.php",
              async: false,      //是否ajax同步
              data: "type="+t,
              success: function(datas) {
			  var str = datas;
				if(datas == 0){
					callback(false);
				} else {
				  callback(str);
				}
              }, error: function(){
            layer.closeLoad();
            layer.msg('亲,请到首页点退出！谢谢');
           return false;
		    }
          });
		   
}



//执行登陆

layer.login = function(title,t){
    var space = {};
    space.layer = function(html){
		if(title==''){title='再继续';}
        $.layer({
            type: 1,
            border: [4, 0.3, '#000'],
            shade: [0.1, '#000'],
            closeBtn: [0, true],
			shadeClose: true,
            title: ['亲！先登个录'+(title||''), 'border:none; background:#f2f2f2; color:#333;font-size:12px;'],
            area: ['400px', 'auto'],
            page: {
                html: html
            }
        });
     $('.BB_button').on('click', function(){
            var data = {
                username: $('#login_name').val(), 
                password: $('#login_pass').val()
            }
            if(!isEmail(data.username)){
              layer.tips('请输入正确的帐号(邮箱)', '#login_name',{guide: 1, time: 2}); return false;
            }
            if(data.password.length<6){
              layer.tips('请输入正确的密码(6-20位)', '#login_pass',{guide: 1, time: 2});return false;
            }
	        var data="login&login_name="+data.username+"&login_pass="+data.password;
      layer.check(data,function(is){	
	        if(is!=false){
	         UCheck();
             layer.msg('登陆成功！',2,1, function(){
					layer.closeAll();
					$("#"+t).trigger("click");
					});
	         }else{
   		            layer.tips('密码错误，请重输入', '#login_pass',{guide: 1, time: 2}); return false;
	         }
	         });     
              return false;
      });
    }
    layer.check('check',function(is){
    if(is==false){
		$.get('/check/login.html', function(html){
            space.layer(html);
        });
		}else{
		  layer.alert('亲,你已经登陆啦！');
			}
});      
}

//切换TAB
$(document).ready(function(){
	var $tab_li = $('.tab-hd span');
	$tab_li.hover(function(){

		$(this).addClass('active').siblings().removeClass('active');
		var index = $tab_li.index(this);
       $('.tab-bd > span').eq(index).show().siblings().hide();
			
	});
});


//大图异步
$(document).ready(function(){
  imagePreview();
  });
  this.imagePreview = function(){ 
  xOffset = -20;
  yOffset = 20;
  $(".pic_Layer").hover(function(e){
  this.t = this.title;
  this.title = ""; 
  var c = (this.t != "") ? "<br />" + this.t : "";
  $("body").append("<p id='preview'><img src='"+ this.src.replace(/\/s/,"/") +"' />"+ c +"</p>");         
  $("#preview")
   .css("top",(e.pageY - xOffset) + "px")
   .css("left",(e.pageX + yOffset) + "px")
   .fadeIn("fast");      
    },
  function(){	
  this.title = this.t; 
  $("#preview").remove();
    }); 
  $(".pic_Layer").mousemove(function(e){
  $("#preview")
   .css("top",(e.pageY - xOffset) + "px")
   .css("left",(e.pageX + yOffset) + "px");
 });   
};

//通栏导航层
$(document).ready(function(){
    var canHide = false; //标记是否可隐藏层
    function doHide(id){   //是否隐藏层中这里处理
     if(canHide){
    $(id).hide();   //先将层隐藏起来
		$(".toggle_center").removeClass("mcur");
	 }
    }
   
    $(".toggle_center").hover(function(){ //鼠标进入
     $(this).parent().next().show(); //显示
	 $(this).addClass("mcur");
     canHide = false; //标记不可隐藏
    },function(){  
	 $this=$(this).parent().next();
     canHide = true; //鼠标移出可隐藏
     window.clearTimeout(t); //将上次的定时器清除,重新设置
     var t = window.setTimeout(function(){doHide($this)},300); //在间隔1000毫秒后执行是否隐藏处理
    }
    );
    //主要依靠定时器来将两者关联起来
    $(".toggle_pop,.rev_pop").hover(function(){ //鼠标进入
     canHide = false;    //不可隐藏
    },function(){
	 $this=$(this);
     canHide = true;     //鼠标移出可隐藏
     window.clearTimeout(t);
     var t = window.setTimeout(function(){doHide($this)},300);
    });
   });


 function mobilejudge(x){//判断手机
	var partten = /^\d{10,13}$/;
    if (!partten.test(x)){
        return false;
    }else{
		return true;
	}
}
function isEmail(str){//判断邮箱
var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
return reg.test(str);
}
function doname(str){//判断域名
	var doname = /^([\w-]+\.)+((com)|(net)|(org)|(gov\.cn)|(info)|(cc)|(com\.cn)|(net\.cn)|(org\.cn)|(name)|(biz)|(tv)|(cn)|(mobi)|(name)|(sh)|(ac)|   (io)|(tw)|(com\.tw)|(hk)|(com\.hk)|(ws)|(travel)|(us)|(tm)|(la)|(me\.uk)|(org\.uk)|(ltd\.uk)|(plc\.uk)|(in)|(eu)|(it)|(jp))$/;
    return doname.test(str);
}

function checkLen(i,cLen) {
        var str = $(i).val();
        myinfo = getStrleng(str,cLen);
        if(myinfo[0] > cLen * 2) {
          $(i).val(str.substring(0, myinfo[1]- 1));
		  $count=0;
        }else{
		$count=Math.floor((cLen * 2 - myinfo[0]) / 2);
        }
		$check_tisp=$(i).siblings('#check_count');
		if($check_tisp.length>0){
			$check_tisp.children('b').html($count);
		}
    }
function getStrleng(str,cLen) {
        myLen = 0;
        i = 0;
        for (; (i < str.length) && (myLen <= cLen * 2); i++) {
            if (str.charCodeAt(i) > 0 && str.charCodeAt(i) < 128)
                myLen++;
            else
                myLen += 2;
        }	
	         return [myLen,i]
}

function readmeta(str){ //获取META
return $("meta[name="+str+"]").attr("content");
}

function scTop(str,add){
if(!add){add=0;}
$("html, body").animate({scrollTop: $('#'+str).offset().top-add}, 800);
}



function $$$$$(_sId){
 return document.getElementById(_sId);
 }
function hide(_sId)
 {$$$$$(_sId).style.display = $$$$$(_sId).style.display == "none" ? "" : "none";}
function pick(v) {
$('#searchtype').html($(v).html());
$('#searchtype').removeClass().addClass($(v).attr('id'));
hide('st')
}
function topseahc(){
	if (event.keyCode==13)
    topsearch();
}
function topsearch(){
var sv = $('#sv');
if(sv.val().replace(/\s/,"")==""){
layer.alert("请输入搜索关键词",5, '搜索结果', function(index){sv.focus();layer.close(index);return false;
});}else{
var type = $('#searchtype').attr("class"); 
if(type=="seashop"){
topform.action="/shop/index_k"+encodeURIComponent(sv.val())+"v.html";
}else if(type=="seadomain"){
topform.action="/domain/goodslist_k"+encodeURIComponent(sv.val())+"v.html";
}else{
topform.action="/code/goodslist_k"+encodeURIComponent(sv.val())+"v.html";
}
$("form[name='topform']").submit();
}
}

var iflogin;

var xmlHttpses = false;
try {
  xmlHttpses = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpses = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpses = false;
  }
}
if (!xmlHttpses && typeof XMLHttpRequest != 'undefined') {
  xmlHttpses = new XMLHttpRequest();
}

function b(){
	h = $(window).height();
	t = $(document).scrollTop();
	if(t > h){
		$('#ly_gotop').show();
	}else{
		$('#ly_gotop').hide();
	}
}
$(document).ready(function(e) {
	b();
	$('#ly_gotop').click(function(){
		$("html,body").animate({ scrollTop: 0 },300);
	})

	
});
$(window).scroll(function(e){
	b();		
});

$(function(){
updateEndTime();
});
//倒计时函数
function updateEndTime()
{
var date = new Date();
var time = date.getTime();

$(".ttime").each(function(i){
var endDate =this.getAttribute("endTime"); //结束时间字符串
var endDate1 = eval('new Date('+ endDate.replace(/\d+(?=-[^-]+$)/, function (a) { return parseInt(a, 10) - 1; }).match(/\d+/g) + ')');
var endTime = endDate1.getTime();
var lag = (endTime - time) / 1000;   
if(lag > 0)
{var second = Math.floor(lag % 60); 
var minite = Math.floor((lag / 60) % 60);
var hour = Math.floor((lag / 3600) % 24);
var day = Math.floor((lag / 3600) / 24);
$(this).html(day+"天"+hour+"小时"+minite+"分"+second+"秒");
}
else
$(this).html("己结束");
});
setTimeout("updateEndTime()",1000);
}



//写cookies 时间（分）
function setCookie(name,value,times)
{
var exp = new Date(); 
exp.setTime(exp.getTime() + times*60*1000);
document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path=/";
}
//读取cookies
function getCookie(name)
{
var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
if(arr=document.cookie.match(reg)) return unescape(arr[2]);
else return null;
}
//删除cookies
function delCookie(name)
{
var exp = new Date();
exp.setTime(exp.getTime() - 1);
var cval=getCookie(name);
if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}



var total,pageSize,totalPage;
//获取数据
function getData(page,ac){ 
	var type=readmeta('Pg-Type');
	if(!page){page=1;times=0;} 
	if(page>=2){
	if(type!='task'){scTop(type+'_pg_scTop',83)}else{scTop(type+'_pg_scTop');}
	times=500;}
    var ing = layer.load({shade:false});
	setTimeout(function(){
	$.ajax({
		type: 'POST',
		url: '/check/pages.php',
		async:true,
	    dataType: 'json', 
		data: "pageNum="+page+"&types="+type+"&bh="+readmeta('Item-Number')+"&list="+$("."+type+"_cur").attr("rel")+"&cz="+ac,
			success:function(data){
			get_list(data);
			layer.close(ing);
			getPageBar(page,data.totalPage);
		},
		error:function(){
		var d=new Date();
  
		layer.alert("<b>信息加载失败，确定重新加载！</b><br>最后加载时间："+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds(),5,'提示信息',function(index){layer.close(index);getData(0,'g');});
		}
	});
	},times)
}


//更新分页
function getPageBar(cpg,tpg){
	$('#p_up,#p_down').addClass('no');
	//如果是第一页
	if(cpg>1){
	$('#p_up').removeClass('no');
	}
	if(cpg<tpg){
     $('#p_down').removeClass('no');
	}
}





      //图片上传预览    IE是用了滤镜。
        function previewImage(file,is)
        {
          var MAXWIDTH  = $('#'+is).width(); 
          var MAXHEIGHT = $('#'+is).height();
          var div = document.getElementById(is);
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }

