<div class="开发qq28292-383">
<!--LEFT B-->
<div class="wwwyizhanwcom">
 <ul class="menu">
 <li class="level1<? if($leftid==99){?> level11<? }?>">
  <a href="<?=weburl?>user/" class="a0" id="ico99"><em></em>会员中心<i></i></a>
 </li>
 
 <li class="level1<? if($leftid==2){?> level11<? }?>">

  <ul class="level2">

 <li><a href="<?=weburl?>user/homeym.php">源码交易</a></li>
 <li><a href="<?=weburl?>user/homeym.php">域名交易</a> </li>
  <li><a href="<?=weburl?>user/homekf.php">开发服务</a> </li>
  <li><a href="<?=weburl?>user/homewz.php">网站交易</a> </li>
  <li><a href="<?=weburl?>user/homezh.php">帐号交易</a> </li>
  <li><a href="<?=weburl?>user/homemg.php">美工服务</a> </li>
  <li><a href="<?=weburl?>user/homeyy.php">推广交易</a> </li>

  </ul>
 </li>
 
</div>
<!--LEFT E-->

<script>
//等待dom元素加载完毕.
$(function(){
	$(".wwwyizhanwcom .level1 .a1").click(function(){
		$(this).addClass('current')   //给当前元素添加"current"样式
		.find('i').addClass('down')   //小箭头向下样式
		.parent().next().slideDown('slow','easeOutQuad')  //下一个元素显示
		.parent().siblings().children('a').removeClass('current')//父元素的兄弟元素的子元素去除"current"样式
		.find('i').removeClass('down').parent().next().slideUp('slow','easeOutQuad');//隐藏
		 return false; //阻止默认时间
	});
})
</script>
</div>