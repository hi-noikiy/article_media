<?
include("../config/conn.php");
include("../config/function.php");
include("../config/xy.php");
sesCheck();
while0("*","epzhu_user where uid='".$_SESSION[SHOPUSER]."'");if(!$row=mysql_fetch_array($res)){php_toheader("un.php");}
createDir("../upload/".$row[id]."/");
$userdj=returnuserdj($row[id]);
if(empty($userdj)){
while1("*","epzhu_userdj where zt=0 order by xh asc");if($row1=mysql_fetch_array($res1)){$userdj=$row1[name1];}
}
$usertx="../upload/".$row[id]."/user.jpg";if(!is_file($usertx)){$usertx="img/nonetx.gif";}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>�ҵĹ�������</title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/jquery.m.js"></script><script language="javascript" src="static/js/layui.js"></script><script language="javascript" src="static/js/common.js"></script><script language="javascript" src="static/js/member.js"></script><link href="static/css/member.css" rel="stylesheet" type="text/css" /><link href="static/css/layui.css" rel="stylesheet" type="text/css" /></head>
<body>
<!--ͷ��-->
<div class="uhead">
	<div class="umain" >
	<a class="logo" href="#"><img src="static/picture/logos.png"></a>
	<form class="layui-form uso first_search" action="" method="post" target="_blank">
				<div class="layui-input-inline" style="width:79px;">
				<div class="uso-select">
				<input type="text" placeholder="������" value="������" readonly="" class="layui-input layui-unselect"> <i class='icons'></i>
				<dl class='first_select'>
				<dd value="order"  tips="�۳�������"  class="layui-this">������</dd><dd value="qq"  tips="���QQ"  >���QQ</dd><dd value="phone"  tips="��ҵ绰"  >��ҵ绰</dd><dd value="nice"  tips="����ǳ�"  >����ǳ�</dd>				</dl>
				</div>
				</div>
				<div class="layui-input-inline first_input">
					<input name="first_input" class="layui-input Search-inp" placeholder="�������۳�������" style="width:150px;" autocomplete="off" value="" maxlength="20" type="text"> 
					<a title="���">X</a>
				</div> 
				<input type="hidden" name="first_select" value='order'>
				<input type="hidden" name="first_role" value='sell'>
		</form>
	<ul class="ubar">
		<li class="uinfo">
			<p>
				<img src="<?=$usertx?>" /><?=$row[nc]?>			</p>
	
			<div>
				<ol></ol>
				<ul class='u1'>
					<span>�� �<a href="paylog.php"><?=str_replace("-0.00","0",sprintf("%.2f",$row[money1]))?></a> Ԫ</span>
					<span>�� �֣�<a href="#"><?=$row[jf]?></a> </span>
				</ul>
				<ul class='u2'>
					<a href="<?=weburl?>user/un.php">�˳�</a>
				</ul>
			</div>
		<li class="message">
			<p>
		
				<i class="t_xx"></i>��Ϣ			</p>
			<div>
				<ol></ol>		
				<ul class='u2 MemberTopMessageList'>	 
				<cite class="MessageUnreadNot show"><p class="iconfont">&#xe6ae;</p>�ף���ǰû������Ϣ��</cite>				</ul>
				<ul class='u1'>
					<b class="MessageAllRead">û��δ������Ϣ</b> <a target="_blank" href="#" class='message_more'>�鿴����</a>
				</ul>
			</div>
		</li>
		<li class="hzlink">
			<p>
				<i class="t_dh"></i>����
			</p>
			<div>
				<ol></ol>
								<a target="_blank" href="#" style="border:0;">�ҵĵ���</a>
				<a target="_blank" href="#" style='border-bottom: 1px solid #F1F1F1;'>�ҵ�Ʒ��</a>
								<a target="_blank" href="/code" style="border:0">Դ�뼯��</a>
				<a target="_blank" href="/serve">�����г�</a>
				<a target="_blank" href="/productym/search_j236v.html">��������</a>
				<a target="_blank" href="/web/">��վ����</a>
				<a target="_blank" href="/task/">�������</a>
				<a target="_blank" href="/shop">�̼�ר��</a>
				<a target="_blank" href="http://www.epzhu.com/">��վ����</a>
			</div>		
		</li>
	</ul>
	</div>
</div>

<!--ͷ��-->
<div class="umain">
<div id="uleft" class="uleft">
	<a class="home" href="#"><i></i><span>��������</span></a>
		<div  class="cur"><i class="i_sell"></i><span>�����̼�</span><i></i></div>
	<ul>
		<a href="<?=weburl?>user/productlist.php" >��Ʒ����</a>
		<a href="/user/productlx.php">��������</a>
		<a href="<?=weburl?>user/adlx1.php">������������</a>
		<a href="<?=weburl?>user/sellorder.php">���۳��Ķ���</a>
		<a href="<?=weburl?>user/shop.php">���̹���</a> 
		<a href="<?=weburl?>user/baomoneylog.php">�̼ұ�֤��</a> 
	</ul>
	<div><i class="i_buy"></i><span>�������</span><i></i></div>
	<ul style="display:none">
		<a href="<?=weburl?>user/car.php"">���ﳵ</a>
		<a href="#" >��������</a>
		<a href="#">�������</a>
		<a href="<?=weburl?>user/order.php">������Ķ���</a>
	</ul>
	<div  class="cur"><i class="i_cw"></i><span>�������</span><i></i></div>
	<ul>
		<a href="<?=weburl?>user/pay.php">���߳�ֵ</a>
		<a href="<?=weburl?>user/tixian.php" lgu="lists/cashed">�������</a>
		<a href="<?=weburl?>user/paylog.php">������ϸ</a>
		<a href="<?=weburl?>user/jflog.php">������ϸ</a>
	</ul>
	<div  class="cur"><i class="i_user"></i><span>�û�����</span><i></i></div>
	<ul id="5">
		<a href="<?=weburl?>user/inf.php">��������</a>
		<a href="<?=weburl?>user/mobbd.php">��ȫ��֤</a>
		<a href="<?=weburl?>user/favpro.php" lgu="fav_shop">�ҵ��ղ�</a>
		<a href="#">��Ϣ��¼</a>
	</ul>
	</div>
<script>
$("#uleft div:not([class='noclick'])").on('click', function() {
	var hide=[1];
	$(this).attr('class') == 'cur'? $(this).removeClass('cur').next().hide() : $(this).addClass('cur').next().show();
	$("#uleft div:not([class='cur']) span").each(function(){
     hide.push($(this).html());
	 });
	$.cookie('user-left-hide',hide.join(','),{expires:365, path: '/', domain: 'yuanz.net'});
});
var role = readmeta('Or-Role'),
	ldu = role ? 'order/' + role : window.location.pathname.replace(/\d+/ig, '').split('/').splice(1, 2).join('/');
$("#uleft a").each(function() {
	var lmu = $(this).attr('href').substr(1),
		lgu = $(this).attr('lgu'),
		pd = new RegExp(ldu);
	if (lmu == ldu || pd.test(lgu)) {
		$('.home').removeClass('cur');
		$(this).addClass('cur').parent().show().parent().prev().addClass('cur');
		return false
	}
});
</script> 
<div class="uright">
<dl class="zhxx">
	<dt>
		<li class='icons'>�ʺ���Ϣ ��ID��<?=$row[id]?>��</li>	</dt>
	<dd>
		<ul class="avatar"><img src="<?=$usertx?>" /></ul>
		<ul class="info">
			<li class="l1">
				<strong>��ӭ����<?=$row[nc]?>  </strong> 
			</li>
			<li class="l2"><? $xy=returnjgdw($row[xinyong],"",returnxy($row[id],1));$xy1=returnxy($row[id],2);?>  <? if($row[shopzt]==2){?>
								�������ã�<img class='xy' src='../img/dj/<?=returnxytp($xy)?>' title='����ֵ<?=$xy?>'><? }?>
								
								
								&nbsp;&nbsp;������ã�<img class='xy' src='../img/dj/<?=returnxytp($xy1)?>' title='����ֵ<?=$xy1?>'>							</li>
			<li class="l2">�ϴε�¼IP: 
<?
   while1("*","epzhu_loginlog where userid=".$row[id]." and admin=1 order by id desc limit 2");$row1=mysql_fetch_array($res1);$psj=$row1[sj];$puip=$row1[uip];
   if($row1=mysql_fetch_array($res1)){$psj=$row1[sj];$puip=$row1[uip];}
   ?>

			<?=$puip?></li>
			<li class="l2">�ϴε�¼ʱ��:  <?=$psj?> <a href='#'>����>></a></li>
		</ul>
		<ul class="fund">
			<li class="l1">������<a href="paylog.php"><strong><font size=3><?=str_replace("-0.00","0",sprintf("%.2f",$row[money1]))?></font></strong></a> Ԫ</li>
			<li class="l1">�����<a href="paylog.php"><strong style='color:#f1453a'>0.00</strong></a> Ԫ</li>
			<li class="l1">���û��֣�<a href=""><strong class="blue"><?=$row[jf]?></strong></a></li>
			<li class="l2">
				<button class="layui-btn layui-btn-danger layui-btn-small" onclick="javascript:location.href='pay.php';">��ֵ</button>
				<button class="layui-btn layui-btn-primary layui-btn-small" onclick="javascript:location.href='tixian.php';">����</button>
			</li>
		</ul>
	</dd>
</dl>

  

<div class="mix">
	<div class="left" style='height:246px;'>
		<div class="mix_tit">
		<div class="mix_name">
			<span>���̶�̬</span><i></i>
		</div><!--
		<div class="mix_t_right"> <a href="#"  style="color:#666;">�����Ʒ� <font color="#333333">11</font></a></div>-->	</div> 
	<div class="mix_s_todo">
		<span>���ף�</span>
		<a href="sellorder.php?ddzt=wpay">�ȴ���(<em><i><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='wpay'")?></i></em>)</a><a href="sellorder.php?ddzt=db">������(<em><i><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='db'")?></i></em>)</a><a href="sellorder.php?ddzt=wait">������(<em><i><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='wait'")?></i></em>)</a><a href="sellorder.php?ddzt=back">���˿�(<em><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='back'")?></em>)</a><a href="sellorder.php?ddzt=suc">�ѳɽ�(<em><?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='suc'")?></em>)</a>	</div> 
		
	<div class="mix_s_todo">
		<span>��Ʒ��</span>
		<a href="#">������(<em>0</em>)</a>
		<a href="#">���¼�(<em>0</em>)</a>
		<a href="#">������(<em>0</em>)</a></li>
		</li>
	</div> 
	<div class="mix_s_info">
		<ul>
			<p class="tit">״̬</p>
			<p>���̣�<font color=#0b9a00><?=returnshopztv($row[shopzt])?></font>			</p>
			<p>������<font color=#0b9a00><?=$row[djl]?></font></p>
			<p class="certification">��֤��
			<a href='#'>
			
		 <? if(1==$row[ifmot]){?>	<i class='phone success' title='��ͨ���ֻ���֤'></i><? }?>
			<? if(1==$row[ifemail]){?><i class='success' title='��ͨ��������֤'></i><? }?>
			  <? if(2==$row[sfzrz]){?><i class='idcard success' title='��ͨ�������֤'></i><? }?>

			</a>
			</p>
		</ul>
		<ul>
			<p class="tit">����</p>
			<p><span><i class="icons good"></i></span><span><i class="icons normal"></i></span><span><i class="icons bad"></i></span></p>
			<p><span>����</span> <span>����</span><span>����</span></p>
			<p><span><a href="/lists/evaluation/filter/2" target="_blank"><?=returncount("epzhu_propj where selluserid=".$row[id]." and pjlx=1")?></a></a></span><span><?=returncount("epzhu_propj where selluserid=".$row[id]." and pjlx=2")?></span>   <span><a href="/lists/evaluation/filter/-1" target="_blank"><?=returncount("epzhu_propj where selluserid=".$row[id]." and pjlx=3")?></a></span></p>
		</ul>
		<ul style="border:0;width:21%">
			<p class="tit">����</p>
			<p>�������֣�<?=sprintf("%.2f",$row[pf1])?></p>
			<p>�������֣�<?=sprintf("%.2f",$row[pf2])?></p>
			<p>����̬�ȣ�<?=sprintf("%.2f",$row[pf3])?></p>
		</ul>
	</div> 
</div>

<!--<div class="mix right">
<div class="mix_tit">
 <div class="mix_name">
<span>��������</span>
</div> 
</div> 
<div class="mix_handle">
<a><span>���ڽ���</span> <em>3</em></a>
<a><span>�˿��</span> <em>1</em></a>
<a><span>��������</span> <em>2</em></a>
<a><span>�۳�����</span> <em>1</em></a>
</div>
</div>-->
	<div class="right" style='height:246px;' >
		<div class="mix_tit">
			<div class="mix_name"> 
				<span>����ͳ��</span> <a class='Dinote'>&#xe6a7</a>
			</div> <ul class="mix_change" style='float:right'>
				
						<cite class="curr">ȫ��</cite>
					</ul> 
		</div> 
		<div class="mix_s_lump">
		
								
							<div  > 
				<ul class="wrap" >
					<li class="item">
						<p class='tit'>������</p>
						<p class="focus">n<em>��</em></p>
						<p>�ɽ���&nbsp;<?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='suc'")?>&nbsp;��</p>
					</li>
					<li class="item">
						<p class='tit'>���׶�</h5>
						<p class="focus">n<em>Ԫ</em></p>
						<p>�ɽ���&nbsp;n&nbsp;Ԫ</p>
					</li>
					<li class="item">
						<p class='tit'>�˿���<a class="ppc" title='�˿���'>&#xe6c9;</a></p>
						<p class="focus">n<em>%</em> 
												</p>
						<p>�˿���&nbsp;<?=returncount("epzhu_order where selluserid=".$row[id]." and ddzt='back'")?>&nbsp;��</p>
					</li>
						<li class="item" >
						<p class='tit'>�͵���</p>
						<p class="focus">n<em>Ԫ</em></p>
						<p>�ɽ��͵��� n Ԫ</p>
					</li>
				</ul>
			</div>
					</div> 
	</div>
</div>

		<div class="mix ">
			<div class="left"  style='height:191px;'>
				<div class="mix_tit">
					<div class="mix_name">
					<span>�������</span>
					</div>
					<div class="mix_t_right" style="color:#666;">���׳ɹ� <a href="#">0</a> �ʣ��˿�ɹ� <a href="#">0</a> ��</div>				</div> 
				<div class="mix_b_todo">
					<li style='margin-left:3%;'><p>���ﳵ</p><a href="car.php" class="jh"><?=returncount("epzhu_order where ddzt='wpay' and userid=".$row[id])?></a></li>
					<li><p>�ȴ�����</p><a href="order.php?ddzt=wpay" class='tl'><?=returncount("epzhu_order where ddzt='wpay' and userid=".$row[id])?></a></li>
					<li><p>���ڽ���</p><a href="order.php?ddzt=db" ><?=returncount("epzhu_order where ddzt='db' and userid=".$row[id])?></a></li>
					<li><p>�����˿�</p><a class="ah" href="order.php?ddzb=back"><?=returncount("epzhu_order where ddzt='back' and userid=".$row[id])?></a></li>
				</div> 
			</div>

			<div class="right"  style='height:191px;'>
				<div class="mix_tit">
					<ul class="mix_change">
						<cite class='curr'>����֪ͨ</cite>
						<cite>�����Ƽ�</cite>
						<cite>��������</cite>
					</ul> 
				</div> 
				<div class="mix_t_list">
				<div>
				
				 <?
$i=1;			 
				 while1("*","epzhu_gg where zt<>99 order by sj desc limit 5");while($row1=mysql_fetch_array($res1)){?>
										<li><i class=""><?=$i?></i><a href="../help/ggview<?=$row1[id]?>.html"  title="<?=$row1[tit]?>" target='_blank'><?=returntitdian($row1[tit],40)?></a></li>
										 <? $i++;}?>
										
									</div> 

				<div class="hide">
				
				 <?
				 $i=1;
  $sql="select * from epzhu_forum where uid=1 order by time asc limit 6";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);while($row=mysql_fetch_array($res)){
  ?>           
		
										<li><i class=""><?=$i?></i><a href="http://www.epzhu.com/index.php/thread/<?=$row[id]?>.html" target="_blank" title="<?=$row[title]?>"><?=$row[title]?></a></li>
											 <? $i++;}?>
										
									
									</div> 
				<div class="hide">
											 <?
				 $i=1;
  $sql="select * from epzhu_forum where uid=1 order by time asc limit 6";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);while($row=mysql_fetch_array($res)){
  ?>           
		
										<li><i class=""><?=$i?></i><a href="http://www.epzhu.com/index.php/thread/<?=$row[id]?>.html" target="_blank" title="<?=$row[title]?>"><?=$row[title]?></a></li>
											 <? $i++;}?>
									</div> 
			</div> 
		</div>

 </div>
	<div class="mix">
		<div class="usertips scroll-box" times='6000' items='1'>
		<ul>
					<li>
				<dl>
					<dt>��ܰ��ʾ</dt>
					<dd><i class="icons l"></i><i class="icons"></i>һ���ϸ���̼ң����˱�֤��Ʒ�������⣬����̬��Ҳ����Ҫ������~~</dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt>�������</dt>
					<dd><i class="icons l"></i><i class="icons"></i>Դվ�����Ͳ��ͷ���ԭ�����£����Ը����ĵ��̴������벻���Ŀͻ�������Ŷ~~</dd>
				</dl>
			</li>
			<li>
				<dl>
					<dt>������ʾ</dt>
					<dd><i class="icons l"></i><i class="icons"></i>Դվ�Ͻ��κ��������½��׵���Ϊ�������Ƿ�ɹ��������ܵ���������~~</dd>
				</dl>
			</li>
			 
			 		</ul>
		</div>
	</div>
</div>
<div class="rl_foot">
<ul class="link">
<a target="_blank" href="#" target="_blank" rel="nofollow">��������</a>
<a href="#" target="_blank" rel="nofollow">������</a>
<a href="#" target="_blank" rel="nofollow">��ϵ����</a>
<a href="#" target="_blank" rel="nofollow">��˽����</a>
<a href="#" target="_blank" rel="nofollow">��������</a>
<a href="#" target="_blank" rel="nofollow">��վ��ͼ</a>
<a href="#" target="_blank" rel="nofollow">��������</a>
</ul>
<ul>Copyright &#169; 2009 - 2017  www.epzhu.com һƷ����  ��ICP��18005100�� �ͷ�QQ:<a title="��ϵ�ͷ�" style="color: #999;" class="qqlinks" href="#"  target="_blank">120036745</a></ul>

</div><script language="javascript">
$(".mix_change cite").live('click',function(){$(this).addClass('curr').siblings().removeClass('curr');$(this).closest('div').next('div').find("div:eq("+$(this).index()+")").removeClass('hide').siblings().addClass('hide')});$(".Dinote").on('click',function(){layer_ly('<div class=agreement><p><b>��������</b>���н��ױ����������������δ����Ľ��ף���</p><p><b>�ɽ�����</b>�ɹ����ױ��������׽����ҳɹ��Ľ��ף���</p><p><b>���׶</b>���н����ܶ�����������δ����Ľ��ף���</p><p><b>�ɽ��</b>�ɹ������ܶ���׽����ҳɹ��Ľ��ף���</p><p><b>�˿��ʣ�</b>�˿��������ռ���н��׽��������İٷֱȣ�</p><p><b>�˿�����</b>�˿���������������������˿�Ľ��ף���</p><p><b>�͵��ۣ�</b>���н��׵�ƽ���ۼۣ������������δ����Ľ��ף���</p><p><b>�ɽ��͵��ۣ�</b>�ɹ����׵�ƽ���ۼۣ����׽����ҳɹ��Ľ��ף���</p></div>','<b>����ͳ��˵��</b>',true,'560px','auto')});layui.use('form',function(){form=layui.form()});
</script>
</body>
</html>