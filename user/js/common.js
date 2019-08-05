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
	

$('#released').live('click', function(){//发布
$this=$(this);
$.get('/user/released.php?type='+$this.attr('data_type'), function(html){
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
                src : '/user/'+u
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
