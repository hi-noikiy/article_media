<!--LEFT B-->
<div class="treebox">
 <ul class="menu">
 <li class="level1<? if($leftid==99){?> level11<? }?>">
  <a href="<?=weburl?>user/" class="a0" id="ico99"><em></em>�ҵ�����<i></i></a>
 </li>
 <li class="level1<? if($leftid==1){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico1"><em></em>��������<i></i></a>
  <ul class="level2">
  <? 
  $sj=date("Y-m-d H:i:s");
  $sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
  $rowuser=mysql_fetch_array($resuser);
  if($sj>$rowuser[dqsj] && !empty($rowuser[dqsj])){updatetable("epzhu_user","shopzt=4 where shopzt=2 and id=".$rowuser[id]);}
  if(empty($pdpwd)){if(strcmp(sha1("123456"),$rowuser[pwd])==0){Audit_alert("��������Ϊ123456���������޸�","pwd.php");}}
  if(2!=$rowuser[shopzt] && 4!=$rowuser[shopzt]){
  ?>
  <li><a href="<?=weburl?>user/openshop1.php">��Ҫ����</a></li>
  <? }elseif(4==$rowuser[shopzt]){?>
  <li><a href="<?=weburl?>user/openshop4.php">���̵�������</a></li>
  <? }else{?>
  <li><a href="<?=weburl?>user/sellorder.php">Դ�붩��(<strong><?=returncount("epzhu_order where selluserid=".$rowuser[id]." and ddzt='wait'")?></strong>)</a></li>
  <li><a href="<?=weburl?>user/sellorderkf.php">��������(<strong><?=returncount("epzhu_orderkf where selluserid=".$rowuser[id]." and ddzt='wait'")?></strong>)</a> </li>

  <li><a href="<?=weburl?>user/shop.php">��������</a></li>
 <!-- <li><a href="<?=returnmyweb($rowuser[id],$rowuser[myweb])?>" target="_blank">Ԥ������</a></li>-->
  <li><a href="<?=weburl?>user/productlist.php">��Ʒ�б�</a></li>
  <li><a href="javascript:void(0)" class="share">��������</a></li>
  <li><a href="<?=weburl?>user/productlist.php?ifxj=1">�ֿ��еı���</a></li>
  <li><a href="<?=weburl?>user/propjlist.php">���۹���</a></li>
 <!-- <li><a href="<?=weburl?>user/sellorder.php">��������</a></li>-->
  <li><a href="<?=weburl?>user/adlx1.php">�������ϵͳ</a></li>
  <!--<li><a href="<?=weburl?>user/yunfeilist.php">�˷�ģ��</a></li>-->
  <? }?>
  </ul>
 </li>
 <li class="level1<? if($leftid==1){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico2"><em></em>�������<i></i></a>
  <ul class="level2">
  
 <li><a href="<?=weburl?>user/order.php">�ҵ�Դ��</a></li>
  <li><a href="<?=weburl?>user/orderkf.php">�ҵĿ���</a> </li>



  </ul>
 </li>
 <? if(empty($rowcontrol[iftask])){?>
 <li class="level1<? if($leftid==7){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico7"><em></em>�������<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/tasklist.php">���ǹ���</a></li>
  <li><a href="<?=weburl?>user/taskhflist.php">���ǽ��ַ�</a></li>
  <li><a href="<?=weburl?>task/taskadd.php" target="_blank">��������</a></li>
  </ul>
 </li>
 <? }?>
 <li class="level1<? if($leftid==6){?> level11<? }?>">
  <a href="javascript:void(0);" class="a1" id="ico6"><em></em>��������<i></i></a>
  <ul class="level2">
  <li><a href="<?=weburl?>user/newslist.php">�������</a></li>
  <li><a href="<?=weburl?>user/newslx.php">��ҪͶ��</a></li>
  </ul>
 </li>
 <li class="level1<? if($leftid==5){?> level11<? }?>">
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