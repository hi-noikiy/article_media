<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/functionym.php");
sesCheck();
$sj=date("Y-m-d H:i:s");
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."' and shopzt=2";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("openshop3.php");}
$ncapv=1;
$ses=" where zt<>99 and userid=".$rowuser[id];
if($_GET[zt]=="1"){$ses=$ses." and zt=1";}
elseif($_GET[zt]=="2"){$ses=$ses." and zt=2";}
if($_GET[t1v]!=""){$ses=$ses." and tit like '%".$_GET[t1v]."%'";}
$t2v=$_GET[t2v];if(is_numeric($t2v)){$ses=$ses." and id=".$t2v;}
$t3v=$_GET[t3v];if(is_numeric($t3v)){$ses=$ses." and money2>=".$t3v."";}
$t3v=$_GET[t3v];if(is_numeric($t3v)){$ses=$ses." and money2>=".$t3v."";}
$t5v=$_GET[t5v];if(is_numeric($t5v)){$ses=$ses." and xsnum>=".$t5v."";}
$t6v=$_GET[t6v];if(is_numeric($t6v)){$ses=$ses." and xsnum<=".$t6v."";}
$t7v=$_GET[t7v];if(is_numeric($t7v)){$ses=$ses." and kcnum>=".$t7v."";}
$t8v=$_GET[t8v];if(is_numeric($t8v)){$ses=$ses." and kcnum<=".$t8v."";}
if($_GET[sd1v]!=""){$ses=$ses." and ty1id=".$_GET[sd1v]."";}
if($_GET[ifxj]=="1"){$ses=$ses." and ifxj=1";$ncapv=3;}
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
<link href="css/product.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function psel(){
 str="t1v="+document.getElementById("t1").value;
 str=str+"&t2v="+document.getElementById("t2").value;
 str=str+"&t3v="+document.getElementById("t3").value;
 str=str+"&t4v="+document.getElementById("t4").value;
 str=str+"&t5v="+document.getElementById("t5").value;
 str=str+"&t6v="+document.getElementById("t6").value;
 str=str+"&t7v="+document.getElementById("t7").value;
 str=str+"&t8v="+document.getElementById("t8").value;
 str=str+"&sd1v="+document.getElementById("sd1").value;
 location.href="productlistym.php?"+str;
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��Ʒ�б�</li>
</ul>
<? $leftid=1;include("leftym.php");?>

<!--RB-->
<div class="right rightn">

 <!--����B-->
 <div class="prosel">
 <ul class="u1">
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" value="<?=$_GET[t1v]?>" id="t1" class="inp" style="width:194px;" /></li>
 <li class="l1">����ID��</li>
 <li class="l2"><input type="text" value="<?=$_GET[t2v]?>" id="t2" class="inp" style="width:194px;"/></li>
 <li class="l1">������Ŀ��</li>
 <li class="l2">
 <select id="sd1"class="inp" >
 <option value="">����</option>
 <? while1("*","epzhu_typeym where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>"<? if($row1[id]==$_GET[sd1v]){?> selected="selected"<? }?>><?=$row1[type1]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">�۸�</li>
 <li class="l2"><input type="text" class="inp" value="<?=$_GET[t3v]?>" style="width:80px;" id="t3" /><span class="fd">��</span><input type="text" class="inp" value="<?=$_GET[t4v]?>" style="width:80px;" id="t4"/></li>
 <li class="l1">��������</li>
 <li class="l2"><input type="text" class="inp" value="<?=$_GET[t5v]?>" style="width:80px;" id="t5"/><span class="fd">��</span><input type="text" class="inp" value="<?=$_GET[t6v]?>" style="width:80px;" id="t6"/></li>
 <li class="l1">�������</li>
 <li class="l2"><input type="text" class="inp" value="<?=$_GET[t7v]?>" style="width:80px;" id="t7"/><span class="fd">��</span><input type="text" class="inp" value="<?=$_GET[t8v]?>" style="width:80px;" id="t8"/></li>
 <li class="ltj"><input type="button" onclick="psel()" class="bt1" value="����" /> <input type="button" onclick="gourl('productlistym.php')" class="bt2" value="����" /></li>
 </ul>
 </div>
 <!--����E-->
 <!--��������һվ��ԭ������www.yizhanw.com-->
 <!-- <div class="fbdh-QQ282-92383">
  <a href="./productlist.php">����Դ��-�б�</a> 
  <a href="/user/productlistym.php">��������-�б�</a> </div>
    <!--��������һվ��ԭ����������-->
 <!--�б�B-->
 <div class="prolist">
  <ul class="procz">
  <li class="l1"><label><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</label></li>
  <li class="l2">
  <a href="javascript:void(0);" onclick="NcheckDEL(1,'epzhu_proym')" class="a1">������/�¼�</a>
  <a href="javascript:void(0);" onclick="NcheckDEL(2,'epzhu_proym')" class="a1">ɾ��ѡ��</a>
  <a href="javascript:void(0);" onclick="NcheckDEL(7,'epzhu_proym')" class="a1">������Ʒ</a>
  <span class="fd">˵��������һ����Ʒ������<strong class="feng"><?=$rowcontrol[sxjf]?></strong>���֣���ʣ��<strong class="blue"><?=$rowuser[jf]?></strong>���� ��<a href="jfbank.php">�һ�����</a>��</span>
  </li>
  <li class="l3"><a href="productlxym.php">+�������Ʒ</a></li>
  </ul>
  <ul class="u1">
  <li class="l1">��Ʒ��Ϣ(���ҵ�<?=returncount("epzhu_proym".$ses)?>��)</li>
  <li class="l2">�ۼ�(Ԫ)</li>
  <li class="l3">���</li>
  <li class="l4">����</li>
  <li class="l5">�������</li>
  <li class="l6">����</li>
  </ul>
  <?
  pagef($ses,10,"epzhu_proym","order by lastsj desc");while($row=mysql_fetch_array($res)){
  $au1="productym.php?bh=".$row[bh];
  $au2="../productym/view".$row[id].".html";
  ?>
  <ul class="u2">
  <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
  <li class="l2">
  ��Ʒ���룺<?=$row[bh]?>&nbsp;&nbsp;&nbsp;&nbsp;
  ������Ŀ��<?=returntype(1,$row[ty1id])." - ".returntype(2,$row[ty2id])?>
  </li>
   <li class="l3"><?=$xjv?></li>
  
  

  <li class="l5"style="
    width: 422px;
">
  
 <a class="tit" href="<?=$au2?>" target="_blank" class="a1"><?=returntitdian($row["tit"],50)?></a>
  �ۼۣ�<?=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id])?>Ԫ&nbsp;&nbsp;&nbsp;
  </li>
 <li class="l6">
 <div class="gstate"><?  if(1==$row[ifxj]){?><span class='red'><i>�b</i>���¼�</span><? }else{?><span><i>�b</i>������</span><? }?>&nbsp;&nbsp;|&nbsp;&nbsp;<?=returnztv($row[zt])?> <br><?=$row[ztsm]?></div>
 <div class="note_icon"> <!--<a href="" target="_blank" title="������ʧ�ܣ��˿�������֧���������⸶�𣨽��׶��5~10%��"><i class="protect">��</i></a>-->
 

 <? if($row[fhxs]==1){?><a href="" title="�ֶ�������Ʒ�����º����һ��յ����������ʼ�����������" target="_blank"><i>�ֶ�����</i></a><? }else{?><a href="" title="�Զ�������Ʒ�����º󣬼����յ����Ը���Ʒ�ķ��������أ�����" target="_blank"><i class="send">�Զ�����</i></a><? }?>
 
 
 <? if($row[azsf]==0){?><a class="installing" title="��Ѱ�װ,����鿴��ϸҪ��"><i class="install0">��������</i></a></div><? }else{?><a class="installing" title="�շѰ�װ(<?=$row[anzhuang]?>Ԫ),����鿴��ϸҪ��"><i class="install40">�շѰ�װ</i></a><? }?>
 
 </li>
  <li class="l7">
  <? if(4==$row[fhxs]){?><?=$row[kcnum]?><br>��<a href="kclist.php?bh=<?=$row[bh]?>" class="blue">������</a>��<? }else{?>
  <?=$row[kcnum]?>
  <? }?>
  </li>
  <li class="l8"><?=$row[xsnum]?></li>
  <li class="l9"><?=$row[lastsj]?></li>
  <li class="l10">
  <a href="<?=$au1?>" class="a1">�޸�</a>
  <a href="<?=$au2?>" target="_blank" class="a2">Ԥ��</a>
  </li>
  
  </ul>
  
  
  
  
  
  <ul class="c_g_spe"style="

    float: left;
    border: #e4e4e6 solid 1px;
    border-top: 0;
    height: 40px;
    width: 1000px;
    margin: 0 10px;
    padding-top: 20px;">
  ���� <? 
   $a=preg_split("/xcf/",$row[tysx]);
   $sx1arr=array();
   $sxall="xcf";
   $m=0;
   for($i=0;$i<=count($a);$i++){
	$ai=$a[$i];
    if($ai!=""){
	if(!is_numeric($ai)){$z1=preg_split("/:/",$ai);$ai=$z1[0];}
    while1("*","epzhu_typesxym where id=".$ai);if($row1=mysql_fetch_array($res1)){
    if(!in_array($row1[name1],$sx1arr)){$sx1arr[$m]=$row1[name1];$m++;}
	if(!is_numeric($a[$i])){$z1=preg_split("/:/",$a[$i]);$v=$z1[1];}else{$v=$row1[name2];}
	$sxall=$sxall.$row1[name1].":".$v."xcf";
	}
	}
   }
   for($i=0;$i<count($sx1arr);$i++){
   ?>

<cite><?=$sx1arr[$i]?>��</cite> <? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?> 

<? }?>  </ul >





  <? }?>

  <?
  $nowurl="productlistym.php";
  $nowwd="zt=".$_GET[zt]."&t1v=".$_GET[t1v]."&t2v=".$_GET[t2v]."&t3v=".$_GET[t3v]."&t4v=".$_GET[t4v]."&t5v=".$_GET[t5v]."&t6v=".$_GET[t6v]."&t7v=".$_GET[t7v]."&t8v=".$_GET[t8v]."&sd1v=".$_GET[sd1]."&ifxj=".$_GET[ifxj];
  include("page.html");
  ?>

 </div>
 <!--�б�E-->
 
</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>