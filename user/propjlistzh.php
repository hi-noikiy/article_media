<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/functionzh.php");
sesCheck();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>

<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/productkf.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function ser(){
location.href="propjlistzh.php?&st1="+document.getElementById("st1").value+"&ifhf="+document.getElementById("sd1").value;
}
function hfonc(x){
layer.open({
  type: 2,
  shadeClose: true,
  area: ['622px', '215px'],
  title:["���ۻظ�","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['propjhfzh.php?id='+x, 'no'] 
});
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��Ʒ���۹���</li>
</ul>
<? $leftid=1;include("leftzh.php");?>

<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0">��ѡ��</li>
 <li class="g_ac0_h g_bc0_h"><a href="propjlistzh.php">��Ʒ����</a></li>
 </ul>

 <ul class="ksedi">
 <li class="l2">
 <a href="propjlistzh.php?ifhf=no" class="a1">�鿴����δ�ظ�����(��<?=returncount("epzhu_propjzh where selluserid=".$luserid." and (hf='' or hf is null)")?>��)</a>
 </li>
 <li class="l3">
  <input type="button" onclick="ser()" value="��ѯ" class="btn" />
  <select id="sd1">
  <option value="">ȫ��</option>
  <option value="no"<? if($_GET[ifhf]=="no"){?> selected="selected"<? }?>>δ�ظ�</option>
  <option value="yes"<? if($_GET[ifhf]=="yes"){?> selected="selected"<? }?>>�ѻظ�</option>
  </select>
  <span class="s1">�ظ������</span>
  <input type="text" id="st1" value="<?=$_GET[st1]?>" class="inp1" />
  <span class="s1">�ظ����ݣ�</span>
 </li>
 </ul>
  
 <?
 $ses=" where selluserid=".$luserid;
 if($_GET[ifhf]=="no"){$ses=$ses." and (hf='' or hf is null)";}
 if($_GET[ifhf]=="yes"){$ses=$ses." and hf<>''";}
 if($_GET[st1]!=""){$ses=$ses." and txt like '%".$_GET[st1]."%'";}
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,10,"epzhu_propjzh","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","epzhu_prozh where bh='".$row[probh]."'");$row1=mysql_fetch_array($res1);
 ?>
 <ul class="propjlist">
 <li class="l1">��Ʒ��Ϣ��</li>
 <li class="l2"><strong><a href="../productzh/view<?=$row1[id]?>.html" target="_blank"><?=$row1[tit]?></a></strong></li>
 <li class="l1">���ۻ�Ա��</li>
 <li class="l3"><?=returnnc($row[userid])?></li>
 <li class="l1">�������ͣ�</li>
 <li class="l3">����</li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l3"><?=$row[sj]?></li>
 <li class="l1">�������֣�</li>
 <li class="l3"><?=$row[pf1]?>��</li>
 <li class="l1">�������֣�</li>
 <li class="l3"><?=$row[pf2]?>��</li>
 <li class="l1">�ۺ����֣�</li>
 <li class="l3"><?=$row[pf3]?>��</li>
 </ul>
 <ul class="propjlist1">
 <li class="l1">�������ݣ�</li>
 <li class="l2">
 <?=$row[txt]?><br>
 <? 
 if(1==$row[iftp]){
 while2("*","epzhu_tp where bh='".$row[orderbh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$row2[tp]);
 ?>
 <a href="../<?=$row2[tp]?>" target="_blank"><img src="<?=$tp?>" style="margin:5px 0 0 0;" width="50" height="50" /></a>&nbsp;&nbsp;
 <? }}?>
 </li>
 </ul>
 <ul class="propjlist1">
 <li class="l1">�ظ����ݣ�</li>
 <li class="l2" style="cursor:pointer;" onclick="hfonc(<?=$row[id]?>)"><? if(empty($row[hf])){?><span class="hui">����δ�ظ���������лظ���</span><? }else{?><span class="green">�ظ�ʱ�䣺<?=$row[hfsj]?><br>�ظ����ݣ�<?=$row[hf]?></span><? }?></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="propjlistzh.php";
 $nowwd="ifhf=".$_GET[ifhf];
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>