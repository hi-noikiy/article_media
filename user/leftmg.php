<!--LEFT B-->
<div class="treebox">
 <ul class="menu">
 <li class="level1<? if($leftid==99){?> level11<? }?>">
  <a href="<?=weburl?>user/" class="a0" id="ico99"><em></em>网站开发<i></i></a>
 </li>
 <li class="level1<? if($leftid==1){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico1"><em></em>我是卖家<i></i></a>
  <ul class="level2">
  <? 
  $sj=date("Y-m-d H:i:s");
  $sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
  $rowuser=mysql_fetch_array($resuser);
  if($sj>$rowuser[dqsj] && !empty($rowuser[dqsj])){updatetable("epzhu_user","shopzt=4 where shopzt=2 and id=".$rowuser[id]);}
  if(empty($pdpwd)){if(strcmp(sha1("123456"),$rowuser[pwd])==0){Audit_alert("您的密码为123456，请立即修改","pwd.php");}}
  if(2!=$rowuser[shopzt] && 4!=$rowuser[shopzt]){
  ?>
  <li><a href="<?=weburl?>user/openshop1.php">我要开店</a></li>
  <? }elseif(4==$rowuser[shopzt]){?>
  <li><a href="<?=weburl?>user/openshop4.php">店铺到期续费</a></li>
  <? }else{?>
    <li><a href="<?=weburl?>user/sellordermg.php">开发订单(<strong><?=returncount("epzhu_ordermg where selluserid=".$rowuser[id]." and ddzt='wait'")?></strong>)</a></li>

  <li><a href="<?=weburl?>user/shop.php">店铺设置</a></li>
  <li><a href="<?=returnmyweb($rowuser[id],$rowuser[myweb])?>" target="_blank">预览店铺</a></li>
  <li><a href="<?=weburl?>user/productlistmg.php">商品列表</a></li>
  <li><a href="javascript:void(0)" class="share">发布出售</a></li>
  <li><a href="<?=weburl?>user/productlistmg.php?ifxj=1">仓库中的宝贝</a></li>
  <li><a href="<?=weburl?>user/propjlistmg.php">评价管理</a></li>
  <li><a href="<?=weburl?>user/sellordermg.php">订单管理</a></li>
  <li><a href="<?=weburl?>user/adlx1.php">自助广告系统</a></li>
  <!--<li><a href="<?=weburl?>user/yunfeilist.php">运费模板</a></li>-->
  <? }?>
  </ul>
 </li>
 <li class="level1<? if($leftid==1){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico2"><em></em>我是买家<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/ordermg.php">我的订单</a></li>
  <li><a href="<?=weburl?>user/carmg.php">购物车</a></li>
  <li><a href="<?=weburl?>user/favpromg.php">我的收藏</a></li>
  </ul>
 </li>
 <? if(empty($rowcontrol[iftask])){?>
 <li class="level1<? if($leftid==7){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico7"><em></em>任务大厅<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/tasklist.php">我是雇主</a></li>
  <li><a href="<?=weburl?>user/taskhflist.php">我是接手方</a></li>
  <li><a href="<?=weburl?>task/taskadd.php" target="_blank">发起任务</a></li>
  </ul>
 </li>
 <? }?>
  </ul>
 </li>
 </ul>
</div>
<!--LEFT E-->
<script language="javascript" src="<?=weburl?>user/js/easing.js"></script>
<link href="css/share.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="js/share.js"></script>
<script>
//等待dom元素加载完毕.
$(function(){
	$(".treebox .level1 .a1").click(function(){
		$(this).addClass('current')   //给当前元素添加"current"样式
		.find('i').addClass('down')   //小箭头向下样式
		.parent().next().slideDown('slow','easeOutQuad')  //下一个元素显示
		.parent().siblings().children('a').removeClass('current')//父元素的兄弟元素的子元素去除"current"样式
		.find('i').removeClass('down').parent().next().slideUp('slow','easeOutQuad');//隐藏
		 return false; //阻止默认时间
	});
})
</script>
<?
$luserid=returnuserid($_SESSION[SHOPUSER]);
sellmoneytj($luserid);
$autoses="(selluserid=".$luserid." or userid=".$luserid.")";
if(is_file("auto.php")){include("auto.php");}
?>
<!--发布弹出js-->
<script  type="text/javascript">
	$('.share').shareConfig({
		Shade : true, //是否显示遮罩层
		Event:'click', //触发事件
		Content : 'Share', //内容DIV ID
		Title : '选择产品发布类型' //显示标题
	});
</script>

<!--发布结束js-->