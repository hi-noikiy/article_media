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
$('.login_qq').on('click', function(){//QQ��½
login_qq();
});
$('.login_alipay').on('click', function(){//֧������½
login_alipay();
});
$('#ly_browse').on('click', function(){//������
layer.iframe('browse.php','��������¼',800,430);
});
$('#ly_kfqq').on('click', function(){//������
layer.iframe('qq.html','����ͷ�',370,200);
});

$('.uim p,.uim a').live('click', function(){//Q
var	$this=$(this);
var $im="";
var $tit="�ͷ�";
if($this.parent().hasClass('mb')){$tit="��ʽ";}
var $arr = $this.parent().attr("uinfo").split("|");
   $this.siblings().each(function(){
    $im+=$(this).html()+",";
	})
$.get("/check/uqq.php?cim="+$this.html()+"&im="+$im,{cim:$this.html(),im:$im}, function(html){
	layer.ly(html,'<div class="layui-layer-title" style="cursor: move;"><img src="https://i.hmbwz.com/tx/snone.jpg" style="width:20px;height:20px;margin-left:-10px;float:left;margin-top:10px;padding:1px;border: 1px solid #ddd;"><strong style="float:left;max-width:130px;overflow:hidden;color:#ff6600;padding:0 5px;"">'+$arr[0]+'</strong> <span style="color:#666;float:left;">��ϵ'+$tit+'</span></div>',true);
});
});
$('.imfav').on('click', function(){//�ղ�
  var fid = $(this).attr("id");
  var t = "fav&ty="+fid+"&bh="+readmeta('Item-Number');
layer.check(t,function(is){
    if(is!=false){
	layer.alert(is, 1); 
	}
	else{
	 layer.dlts('�ղ�',fid);
	}
});
});

$('#released').live('click', function(){//����
$this=$(this);
$.get('/check/released.php?type='+$this.attr('data_type'), function(html){
	layer.ly(html,$this.html(),true);
});
});

$('.gopage').on('click', function(){//��ҳ��ת
var pagenum =$(this).prev().val();
if(pagenum>parseInt($('.totalPage').html())){
	layer.alert('���ܳ������ҳ����'+$('.totalPage').html(),5);
}else if(pagenum<1){
	layer.alert('���ܵ�����Сҳ����1',5);
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
sign = function(){ //ÿ��ǩ��
layer.check('sign',function(is){	
	if(is!=false){
	layer.alert(is, 1); 
	}else{
    layer.dlts('ǩ��','login_sign');
	}
	UCheck();
	});
	}
//��½��ʾ
layer.dlts = function(mb,ckid){ 
	$.layer({
    shade: [0],
    area: ['auto','auto'],
    dialog: {
        msg: '�ף�Ҫ��<font color="red">��½</font>����<font color="#ff6600">'+mb+'</font>Ŷ��',
        btns: 2,                    
        type: 4,
        btn: ['ȥ��½','����'],
        yes: function(){
		 layer.closeAll();
         layer.login('��'+mb,ckid);
        }, no: function(){
            layer.msg('�ðɣ��ף������ͼ������Ͱɣ�', 2);
        }
    }
	});
}

//����iframe
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

//������
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

//QQ��½
login_qq = function(){ 
		openwindow('https://www.hmbwz.com/api_login/qq/','QQ��½',710,400)
}

//֧������½
login_alipay = function(){ 
setCookie("apay_url",Durl,"5");
openwindow('https://www.hmbwz.com/api_login/alipay/','֧������½',950,680);
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

//���µ�½
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

//��֤
layer.check = function(t,callback){
          $.ajax({
              type: "POST",
              url: "/check/Check.php",
              async: false,      //�Ƿ�ajaxͬ��
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
            layer.msg('��,�뵽��ҳ���˳���лл');
           return false;
		    }
          });
		   
}



//ִ�е�½

layer.login = function(title,t){
    var space = {};
    space.layer = function(html){
		if(title==''){title='�ټ���';}
        $.layer({
            type: 1,
            border: [4, 0.3, '#000'],
            shade: [0.1, '#000'],
            closeBtn: [0, true],
			shadeClose: true,
            title: ['�ף��ȵǸ�¼'+(title||''), 'border:none; background:#f2f2f2; color:#333;font-size:12px;'],
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
              layer.tips('��������ȷ���ʺ�(����)', '#login_name',{guide: 1, time: 2}); return false;
            }
            if(data.password.length<6){
              layer.tips('��������ȷ������(6-20λ)', '#login_pass',{guide: 1, time: 2});return false;
            }
	        var data="login&login_name="+data.username+"&login_pass="+data.password;
      layer.check(data,function(is){	
	        if(is!=false){
	         UCheck();
             layer.msg('��½�ɹ���',2,1, function(){
					layer.closeAll();
					$("#"+t).trigger("click");
					});
	         }else{
   		            layer.tips('���������������', '#login_pass',{guide: 1, time: 2}); return false;
	         }
	         });     
              return false;
      });
    }
    layer.check('check',function(is){
    if(is==false){
		$.get('/check/login.php', function(html){
            space.layer(html);
        });
		}else{
		  layer.alert('��,���Ѿ���½����');
			}
});      
}

//�л�TAB
$(document).ready(function(){
	var $tab_li = $('.tab-hd span');
	$tab_li.hover(function(){

		$(this).addClass('active').siblings().removeClass('active');
		var index = $tab_li.index(this);
       $('.tab-bd > span').eq(index).show().siblings().hide();
			
	});
});


//��ͼ�첽
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

//ͨ��������
$(document).ready(function(){
    var canHide = false; //����Ƿ�����ز�
    function doHide(id){   //�Ƿ����ز������ﴦ��
     if(canHide){
    $(id).hide();   //�Ƚ�����������
		$(".toggle_center").removeClass("mcur");
	 }
    }
   
    $(".toggle_center").hover(function(){ //������
     $(this).parent().next().show(); //��ʾ
	 $(this).addClass("mcur");
     canHide = false; //��ǲ�������
    },function(){  
	 $this=$(this).parent().next();
     canHide = true; //����Ƴ�������
     window.clearTimeout(t); //���ϴεĶ�ʱ�����,��������
     var t = window.setTimeout(function(){doHide($this)},300); //�ڼ��1000�����ִ���Ƿ����ش���
    }
    );
    //��Ҫ������ʱ���������߹�������
    $(".toggle_pop,.rev_pop").hover(function(){ //������
     canHide = false;    //��������
    },function(){
	 $this=$(this);
     canHide = true;     //����Ƴ�������
     window.clearTimeout(t);
     var t = window.setTimeout(function(){doHide($this)},300);
    });
   });


 function mobilejudge(x){//�ж��ֻ�
	var partten = /^\d{10,13}$/;
    if (!partten.test(x)){
        return false;
    }else{
		return true;
	}
}
function isEmail(str){//�ж�����
var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
return reg.test(str);
}
function doname(str){//�ж�����
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

function readmeta(str){ //��ȡMETA
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
layer.alert("�����������ؼ���",5, '�������', function(index){sv.focus();layer.close(index);return false;
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
//����ʱ����
function updateEndTime()
{
var date = new Date();
var time = date.getTime();

$(".ttime").each(function(i){
var endDate =this.getAttribute("endTime"); //����ʱ���ַ���
var endDate1 = eval('new Date('+ endDate.replace(/\d+(?=-[^-]+$)/, function (a) { return parseInt(a, 10) - 1; }).match(/\d+/g) + ')');
var endTime = endDate1.getTime();
var lag = (endTime - time) / 1000;   
if(lag > 0)
{var second = Math.floor(lag % 60); 
var minite = Math.floor((lag / 60) % 60);
var hour = Math.floor((lag / 3600) % 24);
var day = Math.floor((lag / 3600) / 24);
$(this).html(day+"��"+hour+"Сʱ"+minite+"��"+second+"��");
}
else
$(this).html("������");
});
setTimeout("updateEndTime()",1000);
}



//дcookies ʱ�䣨�֣�
function setCookie(name,value,times)
{
var exp = new Date(); 
exp.setTime(exp.getTime() + times*60*1000);
document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path=/";
}
//��ȡcookies
function getCookie(name)
{
var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
if(arr=document.cookie.match(reg)) return unescape(arr[2]);
else return null;
}
//ɾ��cookies
function delCookie(name)
{
var exp = new Date();
exp.setTime(exp.getTime() - 1);
var cval=getCookie(name);
if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}



var total,pageSize,totalPage;
//��ȡ����
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
  
		layer.alert("<b>��Ϣ����ʧ�ܣ�ȷ�����¼��أ�</b><br>������ʱ�䣺"+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds(),5,'��ʾ��Ϣ',function(index){layer.close(index);getData(0,'g');});
		}
	});
	},times)
}


//���·�ҳ
function getPageBar(cpg,tpg){
	$('#p_up,#p_down').addClass('no');
	//����ǵ�һҳ
	if(cpg>1){
	$('#p_up').removeClass('no');
	}
	if(cpg<tpg){
     $('#p_down').removeClass('no');
	}
}





      //ͼƬ�ϴ�Ԥ��    IE�������˾���
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
          else //����IE
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