<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/functionym.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$ses=" where userid=".$userid;
if($_GET[ddzt]!=""){$ses=$ses." and ddzt='".$_GET[ddzt]."'";}
if($_GET[t1v]!=""){$ses=$ses." and tit like '%".$_GET[t1v]."%'";}
if($_GET[t2v]!=""){$ses=$ses." and sj>='".$_GET[t2v]."'";}
if($_GET[t3v]!=""){$ses=$ses." and sj<='".$_GET[t3v]."'";}
if($_GET[t4v]!=""){$ses=$ses." and orderbh='".$_GET[t4v]."'";}
if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function psel(){
 str="t1v="+document.getElementById("t1").value;
 str=str+"&t2v="+document.getElementById("t2").value;
 str=str+"&t3v="+document.getElementById("t3").value;
 str=str+"&t4v="+document.getElementById("t4").value;
 str=str+"&ddzt="+document.getElementById("ddztv").value;
 location.href="orderym.php?"+str;
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<? if(returncount("epzhu_smsmail where userid=".$userid." and tyid=1")>0){?>
<script language="javascript">
layer.open({
  type: 2,
  area: ['300px', '180px'],
  title:["����ͬ��","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['sms_sell.php', 'no'] 
});
</script>
<? }?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �ҵĶ���</li>
</ul>
<? $leftid=2;include("leftym.php");?>

<!--RB-->
<div class="right">

 <!--����B-->
 <ul class="ordersel">
 <li class="l1">�������⣺</li>
 <li class="l2"><input type="text" value="<?=$_GET[t1v]?>" id="t1" style="width:150px;" /></li>
 <li class="l1">������ţ�</li>
 <li class="l2"><input type="text" value="<?=$_GET[t4v]?>" id="t4" style="width:150px;" /></li>
 <li class="l1">����״̬��</li>
 <li class="l2">
 <select id="ddztv">
 <option value="">����</option>
 <option value="wait"<? if($_GET[ddzt]=="wait"){?> selected="selected"<? }?>>�ȴ�����</option>
 <option value="db"<? if($_GET[ddzt]=="db"){?> selected="selected"<? }?>>�ȴ����ȷ��</option>
 <option value="suc"<? if($_GET[ddzt]=="suc"){?> selected="selected"<? }?>>���׳ɹ�</option>
 <option value="back"<? if($_GET[ddzt]=="back"){?> selected="selected"<? }?>>�˿�������</option>
 <option value="backerr"<? if($_GET[ddzt]=="backerr"){?> selected="selected"<? }?>>��ͬ����˿�</option>
 <option value="backsuc"<? if($_GET[ddzt]=="backsuc"){?> selected="selected"<? }?>>�˿�ɹ�</option>
 </select>
 </li>
 <li class="l1">�ɽ�ʱ�䣺</li>
 <li class="l3">
 <input type="text" value="<?=$_GET[t2v]?>" style="width:130px;" id="t2" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" />
 <span class="fd"> �� </span>
 <input type="text" value="<?=$_GET[t3v]?>" style="width:130px;" id="t3"readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" />
 </li>
 <li class="ltj"><input type="button" onclick="psel()" value="����" /> <input type="button" onclick="gourl('orderym.php')" value="����" /></li>
 </ul>
 <!--����E-->

 <ul class="typecap">
 <li class="l1">��Ʒ����</li>
 <li class="l2">�����ܶ�</li>
 <li class="l5">����</li>
 <li class="l3">����״̬</li>
 <li class="l4">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" onclick="xuan()" type="checkbox" /> ȫѡ</li>
 <li class="l2">
 </li>
 </ul>
 <!--�б�ʼ-->
 <?
 pagef($ses,10,"epzhu_orderym","order by sj desc");while($row=mysql_fetch_array($res)){
 $tp="../".returntp("bh='".$row[probh]."' order by iffm desc","-2");
 $cz="";
 if($row[ddzt]=="suc"){ //���׳ɹ�
  if(panduan("userid,orderbh","epzhu_propjym where orderbh='".$row[orderbh]."' and userid=".$userid)==0){
  $cz="<a href='orderpjym.php?orderbh=".$row[orderbh]."' class='btn feng'>����</a>";
  }else{
  //��ʼ�ж��Ƿ���Ĭ������
  $sqlpj="select * from epzhu_propjym where orderbh='".$row[orderbh]."' and userid=".$userid;mysql_query("SET NAMES 'GBK'");$respj=mysql_query($sqlpj);
  $rowpj=mysql_fetch_array($respj);
  if($rowpj['txt']!='��δ����'){
	$cz="<a href='orderpjym.php?orderbh=".$row[orderbh]."' class='blue'>������</a><br>";
  }else{
	$cz="<a href='orderpjym.php?orderbh=".$row[orderbh]."' class='btn feng'>����</a>";
  }
  }
  $cz=$cz."<a href='../productym/view".returnproid($row[probh]).".html' target=_blank>�ٴι���</a>";
 
 }elseif($row[ddzt]=="wait"){ //�ȴ�����
  $cz="<a href='http://wpa.qq.com/msgrd?v=1&uin=".returnqq($row[selluserid])."&site=".weburl."&menu=yes' target=_blank class='blue'>�������ҷ���</a>";
  $cz=$cz."<br><a href='ordercloseym.php?orderbh=".$row[orderbh]."' class='hui'>ȡ������</a>";
 
 }elseif($row[ddzt]=="backsuc"){ //�˿�ɹ�
  $cz="<a href='../productym/view".returnproid($row[probh]).".html' target=_blank>���¹���</a>";
 
 }elseif($row[ddzt]=="backerr"){ //�˿�ʧ�ܣ���ͬ���˿�
  $cz="<a href='shouhuoym.php?orderbh=".$row[orderbh]."' class='btn'>�ջ�</a>";
  $cz=$cz."<br><a href='ordertkym.php?orderbh=".$row[orderbh]."' class='blue'>�ٴ������˿�</a>";
  $cz=$cz."<br><a href='orderjfym.php?orderbh=".$row[orderbh]."' class='hui'>����ͷ�����</a>";

 }elseif($row[ddzt]=="db"){ //������
  $cz="<a href='shouhuoym.php?orderbh=".$row[orderbh]."' class='btn'>�ջ�</a>";
  $cz=$cz."<br><a href='ordertkym.php?orderbh=".$row[orderbh]."' class='hui'>�˿�</a>";

 }elseif($row[ddzt]=="close"){ //����ȡ��
  $cz="<a href='../productym/view".returnproid($row[probh]).".html' target=_blank>���¹���</a>";

 }elseif($row[ddzt]=="jf"){ //���״�����
  $cz="<a href='orderjf1ym.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";

 }elseif($row[ddzt]=="jfbuy"){ //���ʤ��
  $cz="<a href='orderjf1ym.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";

 }elseif($row[ddzt]=="jfsell"){ //����ʤ��
  $cz="<a href='orderjf1ym.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";
  
 }
 ?>
 <ul class="listcap">
 <? if($row[ddzt]=="wpay"){?><li class="l1"><input name="C1" id="ck<?=$row[id]?>" type="checkbox" value="<?=$row[id]?>" /></li><? }?>
 <li class="l2">������ţ�<?=$row[orderbh]?>  |  ʱ�䣺<?=$row[sj]?></li>
 <li class="l3"><a href="orderviewym.php?orderbh=<?=$row[orderbh]?>" class="lookdd">�鿴����</a></li>
 </ul>
 <ul class="typelist">
 <li class="l1">
 <a href="orderviewym.php?orderbh=<?=$row[orderbh]?>"><img class="tp" src="<?=returntppd($tp,"img/none60x60.gif")?>" width="50" height="50" align="left" /></a>
 <a title="<?=$row["tit"]?>" href="orderviewym.php?orderbh=<?=$row[orderbh]?>" class="a1"><?=returntitdian($row["tit"],100)?></a><br>
 </li>
 <li class="l0"></li>
 <li class="l2 hui"><strong class="feng"><?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></strong><br>(����:<?=returnjgdian($row[money1])?>)</li>
 <li class="l5"><?=$row[num]?></li>
 <li class="l3"><?=returnorderzt($row[ddzt])?></li>
 <li class="l4"><?=$cz?></li>
 </ul>
 <? }?>
 <!--�б����-->
 <div class="npa">
 <?
 $nowurl="orderym.php";
 $nowwd="ddzt=".$_GET[ddzt]."&t1v=".$_GET[t1v]."&t2v=".$_GET[t2v]."&t3v=".$_GET[t3v]."&t4v=".$_GET[t4];
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