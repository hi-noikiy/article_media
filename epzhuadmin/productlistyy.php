<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/functionyy.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$ses=" where zt<>99";
if($_GET[zt]=="1"){$ses=$ses." and zt=1";}
elseif($_GET[zt]=="2"){$ses=$ses." and zt=2";}
if($_GET[st1]!=""){$ses=$ses." and tit like '%".$_GET[st1]."%'";}
if($_GET[st2]!=""){$ses=$ses." and mybh='".$_GET[st2]."'";}
if($_GET[st3]!=""){$ses=$ses." and userid='".returnuserid($_GET[st3])."'";}
if($_GET[sd1]!=""){$ses=$ses." and ty1id=".$_GET[sd1];}
if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/product.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="productlistyy.php?st1="+document.getElementById("st1").value+"&st3="+document.getElementById("st3").value+"&sd1="+document.getElementById("sd1").value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu3").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_productyy.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="productlistyy.php">��Ʒ�б�</a>
 </div>
 <!--B-->
 <ul class="psel">
 <li class="l1">�������ƣ�</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">������Ŀ��</li>
 <li class="l2">
 <select id="sd1">
 <option value="">==����==</option>
 <? while1("*","epzhu_typeyy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>"<? if($_GET[sd1]==$row1[id]){?> selected="selected"<? }?>><?=$row1[type1]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">������Ա��</li><li class="l2"><input value="<?=$_GET[st3]?>" type="text" id="st3" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:checkDEL(12,'epzhu_proyy')" class="a2">������</a>
 <a href="javascript:checkDEL(13,'epzhu_proyy')" class="a2">��/�¼�</a>
 <a href="javascript:checkDEL(14,'epzhu_proyy')" class="a1">ɾ��</a>
 </li>
 </ul>
 <ul class="productcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">��Ʒ����</li>
 <li class="l3">�۸�</li>
 <li class="l4">���</li>
 <li class="l5">������</li>
 <li class="l6">������</li>
 <li class="l7">����</li>
 </ul>
 <?
 pagef($ses,10,"epzhu_proyy","order by lastsj desc");while($row=mysql_fetch_array($res)){
 $aurl="./productyy.php?bh=".$row[bh];
 if(0==$row[ifxj]){$xjv="<span class='blue'>�ϼ�</span>";}else{$xjv="<span class='red'>���¼�</span>";}
 ?>
 <ul class="productlist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">
 <a href="<?=$aurl?>"><img border="0" class="imgtp" src="<?=returntppd("../".returntp("bh='".$row[bh]."' order by xh asc","-2"),"../img/none60x60.gif")?>" width="52" height="52" align="left" /></a>
 <? if($row[iftj]>0){?><span class="red">�Ƽ�<?=$row[iftj]?> </span><? }?>
 <? if(!empty($row[iftuan])){?><span class="red">�Ź� </span><? }?>
 <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1"><?=returntitdian($row["tit"],43)?></a><br>
 <?=$xjv." | ".returnztv($row[zt],$row[ztsm])."<br>".returntypem(1,$row[myty1id])." - ".returntypem(2,$row[myty2id])?>
 </li>
 <li class="l3"><strong class="feng"><?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?></strong><br><s class="hui">ԭ��<?=returnjgdw($row[money1],"Ԫ","����")?></s></li>
 <li class="l4"><?=$row[kcnum]?><? if(4==$row[fhxs]){?><br>��<a href="kclist.php?bh=<?=$row[bh]?>" class="blue">������</a>��<? }?></li>
 <li class="l5"><?=$row[xsnum]?></li>
 <li class="l6"><?=$row[lastsj]?></li>
 <li class="l7">
 <a href="<?=$aurl?>">�༭��Ʒ</a><span></span>
 <a href="../productyy/view<?=$row[id]?>.html" target="_blank">Ԥ��</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="productlistyy.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1]."&st3=".$_GET[st3]."&sd1=".$_GET[sd1];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>