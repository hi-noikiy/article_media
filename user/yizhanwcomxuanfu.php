<div class="����qq28292-383">
<!--LEFT B-->
<div class="wwwyizhanwcom">
 <ul class="menu">
 <li class="level1<? if($leftid==99){?> level11<? }?>">
  <a href="<?=weburl?>user/" class="a0" id="ico99"><em></em>��Ա����<i></i></a>
 </li>
 
 <li class="level1<? if($leftid==2){?> level11<? }?>">

  <ul class="level2">

 <li><a href="<?=weburl?>user/homeym.php">Դ�뽻��</a></li>
 <li><a href="<?=weburl?>user/homeym.php">��������</a> </li>
  <li><a href="<?=weburl?>user/homekf.php">��������</a> </li>
  <li><a href="<?=weburl?>user/homewz.php">��վ����</a> </li>
  <li><a href="<?=weburl?>user/homezh.php">�ʺŽ���</a> </li>
  <li><a href="<?=weburl?>user/homemg.php">��������</a> </li>
  <li><a href="<?=weburl?>user/homeyy.php">�ƹ㽻��</a> </li>

  </ul>
 </li>
 
</div>
<!--LEFT E-->

<script>
//�ȴ�domԪ�ؼ������.
$(function(){
	$(".wwwyizhanwcom .level1 .a1").click(function(){
		$(this).addClass('current')   //����ǰԪ�����"current"��ʽ
		.find('i').addClass('down')   //С��ͷ������ʽ
		.parent().next().slideDown('slow','easeOutQuad')  //��һ��Ԫ����ʾ
		.parent().siblings().children('a').removeClass('current')//��Ԫ�ص��ֵ�Ԫ�ص���Ԫ��ȥ��"current"��ʽ
		.find('i').removeClass('down').parent().next().slideUp('slow','easeOutQuad');//����
		 return false; //��ֹĬ��ʱ��
	});
})
</script>
</div>