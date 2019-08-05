<!--LEFT B-->


 
<style>.treebox .ad1 img { width: 180px;height: 100px;}</style>






<!--LEFT B-->
<div class="treebox"><? adwhile("ADYIZHAN");?>

 <ul class="menu">

 <li class="level1<? if($leftid==1){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico99"><em></em>我的服务<i></i></a>
  <ul class="level2">
 


 <li><a href="<?=weburl?>user/homedm.php">源码交易</a></li>
 <li><a href="<?=weburl?>user/homeym.php">域名交易</a> </li>
  <li><a href="<?=weburl?>user/homekf.php">开发服务</a> </li>
  <li><a href="<?=weburl?>user/homewz.php">网站交易</a> </li>
  <li><a href="<?=weburl?>user/homezh.php">帐号交易</a> </li>
  <li><a href="<?=weburl?>user/homemg.php">美工服务</a> </li>
  <li><a href="<?=weburl?>user/homeyy.php">推广交易</a> </li>

  </ul>
 </li>
 
 
 <ul class="menu">

 <li class="level1<? if($leftid==1){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico99"><em></em>平台广告<i></i></a>
  <ul class="level2">
 




  <li><a href="<?=weburl?>user/adlx1.php">广告中心</a></li>

  </ul>
 </li>
 


 <li class="level1<? if($leftid==1){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico5"><em></em>财务管理<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/pay.php">我要充值</a></li>
  <li><a href="<?=weburl?>user/paylog.php">资金明细</a></li>
  <li><a href="<?=weburl?>user/tixian.php">我要提现</a></li>
  <li><a href="<?=weburl?>user/tixianlog.php">提现记录</a></li>
  <li><a href="<?=weburl?>user/jflog.php">积分管理</a></li>
  <li><a href="<?=weburl?>user/baomoneylog.php">保证金管理</a></li>
  <li><a href="<?=weburl?>user/zfmm.php">安全码</a></li>
  <li><a href="<?=weburl?>user/tjuid.php">我推荐的会员</a></li>
  </ul>
 </li>

 <li class="level1<? if($leftid==3){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico3"><em></em>会员中心<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/inf.php">基本信息</a></li>
  <li><a href="<?=weburl?>user/qq.php">QQ绑定</a></li>
  <li><a href="<?=weburl?>user/touxiang.php">设置头像</a></li>
  <li><a href="<?=weburl?>user/mobbd.php">手机认证</a></li>
  <li><a href="<?=weburl?>user/emailbd.php">邮箱认证</a></li>
  <li><a href="<?=weburl?>user/shdzlist.php">收货地址</a></li>
  <li><a href="<?=weburl?>user/pwd.php">修改密码</a></li>
  </ul>
 </li>
 

 <li class="level1<? if($leftid==4){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico4"><em></em>工单管理<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/gdlist.php">我的工单</a></li>
  <li><a href="<?=weburl?>user/gdlx.php">提交工单</a></li>
  </ul>
 </li>
   
  <li class="level1<? if($leftid==2){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico6"><em></em>互动管理<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/newslist.php">稿件中心</a></li>
  <li><a href="<?=weburl?>user/newslx.php">我要投稿</a></li>
  </ul>
 </li>
  <li class="level1<? if($leftid==7){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico7"><em></em>任务大厅<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/tasklist.php">我是雇主</a></li>
  <li><a href="<?=weburl?>user/taskhflist.php">我是接手方</a></li>
  <li><a href="<?=weburl?>task/taskadd.php" target="_blank">发起任务</a></li>
  </ul>
 </li>
 </ul>
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