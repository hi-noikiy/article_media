

$(document).ready(function () {
	$('#search_all').click(function(){
		search(1);
	});
	$("a.btn-diy").hover(function(){
		var str = $(this).attr("_title");
		var color = $(this).attr("color");
		var that = this;
		layer.tips(str, that, {tips: [1, color]});
	},function(){
		layer.closeAll('tips');
	});
	$("#top_qrcode").click(function(){
		layer.open({type: 4,content: ['<div style="padding:30px;text-align:center;"><img src=\''+weburl+'static/img/qrcode.png\'><br/><span class="text-danger mb0"><span class="f24">扫一扫</span><br>或在手机浏览器直接输入本站网址</span></div>', '#top_qrcode'],tips: [1, '#fff'],closeBtn: 0,shadeClose:true});
	})
});