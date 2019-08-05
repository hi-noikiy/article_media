$(document).ready(function() {
	$("#code_hot dl:first").addClass("dropList-hover");
	$("#code_hot dl").mouseover(function() {
		$("#code_hot dl.dropList-hover").removeClass("dropList-hover");
		$(this).addClass("dropList-hover")
	});
	$(".shop-evaluation-label label").on("click",
	function() {
		var a = $(this).attr("data").split("|");
		$(".shop-evaluation-score p").each(function(b) {
			$(this).html(a[b])
		})
	});

	$(".fw_a").hover(function() {
		$(this).addClass("fw_on");
		$(this).siblings().removeClass("fw_on");
		var a = $(".fw_a").index($(this));
		$(".fw_txt cite").hide();
		$(".fw_txt cite").eq(a).show();
		$(this).hasClass("tpay") && $(this).find("i").html("&#xe659;")
	},
	function() {
		if (!$(this).hasClass("tpay")) return ! 1;
		$(".fw_txt cite").hide();
		$(this).removeClass("fw_on");
		$(this).find("i").html("&#xe658;")
	})
});

function showTipsWindown(title,id,width,height){
	tipsWindown(title,"id:"+id,width,height,"true","","true",id);
}
function confirmTerm(s) {
	parent.closeWindown();
	if(s == 1) {
		parent.document.getElementById("isread").checked = true;
	}
}
//弹出层调用
function popTips(){
	showTipsWindown("安装服务详情", 'simTestContent', 620, 550);
	area: '302px',
	$("#isread").attr("checked", false);
}
$(document).ready(function(){
	$("#isread").click(popTips);
	$("#isread-text").click(popTips);
	$("#isread22").click(popTips);
	
});
gelist = function(a, b, d) {
	a = a || 0;
	1 < a && scTop("#c_bb", 45);
	$.ajax({
		type: "POST",
		url: "",
		async: !0,
		data: "list=geva&pro=" + readmeta("Item-Number") + "&good=" + readmeta("Pg-Type") + "&page=" + a,
		dataType: "",
		success: function(a) {
			$.each(a,
			function(a, b) {
				$("." + a).empty();
				$("." + a).html(b)
			});			
			$(".c_r_menu").menu_layer();
			layer_photos()
		},
		error: function() {
		
			return ! 4
		}
	})
};
selist = function(a, b) {
	a = a || 0;
	var d = readmeta("Pg-Type");
	b = b || $(".filter-comment .IChecked").attr("data");
	1 < a && scTop("#shop_pg_scTop", 140);
	$.ajax({
		type: "",
		url: "",
		async: !0,
		data: "list=" + d + "&bh=" + readmeta("Item-Number") + "&filter=" + b + "&page=" + a,
		dataType: "",
		success: function(a) {
			$.each(a,
			function(a, b) {
				$("." + a).empty();
				$("." + a).html(b)
			});
			"bid" != d ? layer_photos() : getPageBar(a.curPage, a.totalPage)
		},
		error: function() {
			layer.msg("");
			return ! 1
		}
	})
};

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
function click_scroll(x,y){
	$.post('/comment/newpl.php',{bh:y},//如果你需要传参数的话，可以写在这里，格式为：{参数名：值,参数名：值...}
     function(data){//执行成功之后的回调函数
  $('#info').html(data);});
	var scroll_offset = $(x).offset();
	//得到pos这个div层的offset，包含两个值，top和left
	$("").animate({
		scrollTop:scroll_offset.top
		//让body的scrollTop等于pos的top，就实现了滚动
	},300);
	}



$.fn.extend({
   AdAdvance:function(){
	var listobj=this;
        var objs =$('dt',this);
	var view =objs.length-1;//parseInt( Math.random()*objs.length)
	objs.each(function(i){
	$(this).mouseover(function(){ $('dd',listobj).hide();$('.dropList-hover',listobj).attr("class",""); $(this).children("P").attr("class","dropList-hover");$(this).next().show()})
	if(i!=view){$(this).next().hide();}
	else
	{$(this).next().show();$(this).children("P").attr("class","dropList-hover");}
	});
    }
});

//重写
 $.fn.extend({
  menu_layer:function(){
	var c_aa = $("#c_aa").offset().top;
	var c_bb = $("#c_bb").offset().top;
	var c_cc = $("#c_cc").offset().top;
	//alert(tops);
	$(window).scroll(function(){var scroH = $(this).scrollTop()+120;
		if(scroH>=c_cc){set_cur(".c_cc");}else if(scroH>=c_bb){set_cur(".c_bb");
		}else if(scroH>=c_aa){set_cur(".c_aa");}
	});
$(".c_r_menu em").click(function() {
		var el = $(this).attr('class');$('html, body').animate({scrollTop: $("#"+el.replace(/cur/,"")).offset().top-46}, 300);$(this).addClass("cur").siblings("em").removeClass("cur");
 	});
}});

function set_cur(n){
if($(".c_r_menu em").hasClass("cur")){$(".c_r_menu em").removeClass("cur");
	}$(".c_r_menu em"+n).addClass("cur");
}

