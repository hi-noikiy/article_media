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
});
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
