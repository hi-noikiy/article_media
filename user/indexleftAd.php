<!--LEFT B-->


 
<style>.treebox .ad1 img { width: 180px;height: 100px;}</style>






<!--LEFT B-->
<div class="treebox"><? adwhile("ADYIZHAN");?>

 <ul class="menu">

 <li class="level1<? if($leftid==1){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico99"><em></em>�ҵķ���<i></i></a>
  <ul class="level2">
 


 <li><a href="<?=weburl?>user/homedm.php">Դ�뽻��</a></li>
 <li><a href="<?=weburl?>user/homeym.php">��������</a> </li>
  <li><a href="<?=weburl?>user/homekf.php">��������</a> </li>
  <li><a href="<?=weburl?>user/homewz.php">��վ����</a> </li>
  <li><a href="<?=weburl?>user/homezh.php">�ʺŽ���</a> </li>
  <li><a href="<?=weburl?>user/homemg.php">��������</a> </li>
  <li><a href="<?=weburl?>user/homeyy.php">�ƹ㽻��</a> </li>

  </ul>
 </li>
 
 
 <ul class="menu">

 <li class="level1<? if($leftid==1){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico99"><em></em>ƽ̨���<i></i></a>
  <ul class="level2">
 




  <li><a href="<?=weburl?>user/adlx1.php">�������</a></li>

  </ul>
 </li>
 


 <li class="level1<? if($leftid==1){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico5"><em></em>�������<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/pay.php">��Ҫ��ֵ</a></li>
  <li><a href="<?=weburl?>user/paylog.php">�ʽ���ϸ</a></li>
  <li><a href="<?=weburl?>user/tixian.php">��Ҫ����</a></li>
  <li><a href="<?=weburl?>user/tixianlog.php">���ּ�¼</a></li>
  <li><a href="<?=weburl?>user/jflog.php">���ֹ���</a></li>
  <li><a href="<?=weburl?>user/baomoneylog.php">��֤�����</a></li>
  <li><a href="<?=weburl?>user/zfmm.php">��ȫ��</a></li>
  <li><a href="<?=weburl?>user/tjuid.php">���Ƽ��Ļ�Ա</a></li>
  </ul>
 </li>

 <li class="level1<? if($leftid==3){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico3"><em></em>��Ա����<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/inf.php">������Ϣ</a></li>
  <li><a href="<?=weburl?>user/qq.php">QQ��</a></li>
  <li><a href="<?=weburl?>user/touxiang.php">����ͷ��</a></li>
  <li><a href="<?=weburl?>user/mobbd.php">�ֻ���֤</a></li>
  <li><a href="<?=weburl?>user/emailbd.php">������֤</a></li>
  <li><a href="<?=weburl?>user/shdzlist.php">�ջ���ַ</a></li>
  <li><a href="<?=weburl?>user/pwd.php">�޸�����</a></li>
  </ul>
 </li>
 

 <li class="level1<? if($leftid==4){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico4"><em></em>��������<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/gdlist.php">�ҵĹ���</a></li>
  <li><a href="<?=weburl?>user/gdlx.php">�ύ����</a></li>
  </ul>
 </li>
   
  <li class="level1<? if($leftid==2){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico6"><em></em>��������<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/newslist.php">�������</a></li>
  <li><a href="<?=weburl?>user/newslx.php">��ҪͶ��</a></li>
  </ul>
 </li>
  <li class="level1<? if($leftid==7){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico7"><em></em>�������<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/tasklist.php">���ǹ���</a></li>
  <li><a href="<?=weburl?>user/taskhflist.php">���ǽ��ַ�</a></li>
  <li><a href="<?=weburl?>task/taskadd.php" target="_blank">��������</a></li>
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
//�ȴ�domԪ�ؼ������.
$(function(){
	$(".treebox .level1 .a1").click(function(){
		$(this).addClass('current')   //����ǰԪ�����"current"��ʽ
		.find('i').addClass('down')   //С��ͷ������ʽ
		.parent().next().slideDown('slow','easeOutQuad')  //��һ��Ԫ����ʾ
		.parent().siblings().children('a').removeClass('current')//��Ԫ�ص��ֵ�Ԫ�ص���Ԫ��ȥ��"current"��ʽ
		.find('i').removeClass('down').parent().next().slideUp('slow','easeOutQuad');//����
		 return false; //��ֹĬ��ʱ��
	});
})
</script>
<?
$luserid=returnuserid($_SESSION[SHOPUSER]);
sellmoneytj($luserid);
$autoses="(selluserid=".$luserid." or userid=".$luserid.")";
if(is_file("auto.php")){include("auto.php");}
?>
<!--��������js-->
<script  type="text/javascript">
	$('.share').shareConfig({
		Shade : true, //�Ƿ���ʾ���ֲ�
		Event:'click', //�����¼�
		Content : 'Share', //����DIV ID
		Title : 'ѡ���Ʒ��������' //��ʾ����
	});
</script>

<!--��������js-->