<?
include("../../config/conn.php");
include("../../config/function.php");
$getstr=$_GET[str];

$ses=" where zt=0 and ifxj=0";
$tit="��Ʒ�б�";
$ty1id=returnsx("j");
if($ty1id!=-1){
 $sqlty1="select * from epzhu_type where admin=1 and id=".$ty1id;mysql_query("SET NAMES 'GBK'");$resty1=mysql_query($sqlty1);$rowty1=mysql_fetch_array($resty1);
 $ty1name=$rowty1[type1];
 $ses=$ses." and ty1id=".$ty1id;
 if(empty($rowty1[seotit])){$tit=$ty1name;}else{$tit=$rowty1[seotit];}
 $seokey=$rowty1[seokey];
 $seodes=$rowty1[seodes];
}
$ty2id=returnsx("k");if($ty2id!=-1){$ty2name=returntype(2,$ty2id);$ses=$ses." and ty2id=".$ty2id;}
if(returnsx("s")!=-1){
 $skey=safeEncoding(returnsx("s"));
 $a=preg_split("/\s/",$skey);
 $bs="(";
 for($i=0;$i<=count($a);$i++){
 if(!empty($a[$i])){$bs=$bs."tit like '%".$a[$i]."%' and ";}
 }
 $ses=$ses." and ".$bs." tit<>'')";
}

$hydj="��Ա�Ż�";
if(returnsx("g")!=-1){
 $ifuserdj=returnsx("g");
 if($ifuserdj==1){
 $hydj="�Ѳ���ȼ��Ż�";
 $ses=$ses." and ifuserdj=1";
 }elseif($ifuserdj==2){
 $hydj="δ����ȼ��Ż�";
 $ses=$ses." and ifuserdj=0";
 }
}

if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
$px="order by lastsj desc";
$pxsm="����ʽ";
$pxv=returnsx("f");
$pxvarr=array("Ĭ������","������ʱ��","�����Ӹߵ���","�����ӵ͵���","��ע�Ӹߵ���","��ע�ӵ͵���","�۸�Ӹߵ���","�۸�ӵ͵���");
if($pxv==1){$px="order by lastsj asc";$pxsm=$pxvarr[1];}
elseif($pxv==2){$px="order by xsnum desc";$pxsm=$pxvarr[2];}
elseif($pxv==3){$px="order by xsnum asc";$pxsm=$pxvarr[3];}
elseif($pxv==4){$px="order by djl desc";$pxsm=$pxvarr[4];}
elseif($pxv==5){$px="order by djl asc";$pxsm=$pxvarr[5];}
elseif($pxv==6){$px="order by money2 desc";$pxsm=$pxvarr[6];}
elseif($pxv==7){$px="order by money2 asc";$pxsm=$pxvarr[7];}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="keywords" content="<?=$seokey?>">
<meta name="description" content="<?=$seodes?>">
<title><?=$tit?> - <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<div id="zhezhao"></div>
<div class="topfix">
<!--ͷ��B-->
<div class="indextop box">
 <div class="d1" onClick="javascript:history.go(-1);"><img src="../img/leftjian.png" /></div>
 <div class="d2" onClick="gourl('../search/main.php')"><span class="s1"><img src="../img/ser.png" /></span><span class="s2">�����������ؼ��ʣ�</span></div>
</div>
<!--ͷ��E-->

<!--ѡ��1B-->
<div class="psel box">
 <div class="search">
 
  <div class="d1" onClick="sertjonc(1,3)"><span class="s1"><? if($ty2id!=-1){echo $ty2name;}elseif($ty1id!=-1){echo $ty1name;}else{echo "ȫ������";}?></span><span class="s2"><img src="../img/jiandown.png" /></span></div>
  <div class="d1" onClick="sertjonc(2,3)"><span class="s1"><?=$pxsm?></span><span class="s2"><img src="../img/jiandown.png" /></span></div>
  <div class="d1" onClick="sertjonc(3,3)"><span class="s1"><?=$hydj?></span><span class="s2"><img src="../img/jiandown.png" /></span></div>
 
 </div>
</div>
<!--ѡ��1E-->
</div>
<div class="ntopv box"><div class="d1"></div></div>

<!--ѡ��2B-->
<div class="sertj box" id="sertj1" style="display:none;">
 <div class="d1">
 <a href="<?=rentser('j','','k','');?>" <? if(check_in("_jv",$getstr) || !check_in("_j",$getstr)){?> class="nx"<? }?>>����</a>
 <? while1("*","epzhu_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=rentser('j',$row1[id],'k','');?>" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="nx"<? }?>><?=$row1[type1]?></a>
 <? }?>
 </div>
 <? if(returnsx("j")!=-1){?>
 <div class="d1">
 <a href="<?=rentser('k','','','');?>" <? if(check_in("_kv",$getstr) || !check_in("_k",$getstr)){?> class="nx"<? }?>>����</a>
 <? while2("*","epzhu_type where admin=2 and type1='".$ty1name."' order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <a href="<?=rentser('k',$row2[id],'','');?>" <? if(check_in("_k".$row2[id]."v",$getstr)){?> class="nx"<? }?>><?=$row2[type2]?></a>
 <? }?>
 </div>
 <? }?>
</div>
<div class="sertj box" id="sertj2" style="display:none;">
 <div class="d1">
 <a href="<?=rentser('f','','','');?>" <? if(check_in("_fv",$getstr) || !check_in("_f",$getstr)){?> class="nx"<? }?>>����</a>
 <? for($i=1;$i<=7;$i++){?>
 <a href="<?=rentser('f',$i,'','');?>" <? if(check_in("_f".$i."v",$getstr)){?> class="nx"<? }?>><?=$pxvarr[$i]?></a>
 <? }?>
 </div>
</div>
<div class="sertj box" id="sertj3" style="display:none;">
 <div class="d1">
 <a href="<?=rentser('g','','','');?>" <? if(check_in("_gv",$getstr) || !check_in("_g",$getstr)){?> class="nx"<? }?>>����</a>
 <a href="<?=rentser('g',1,'','');?>" <? if(check_in("_g1v",$getstr)){?> class="nx"<? }?>>���Ż�</a>
 <a href="<?=rentser('g',2,'','');?>" <? if(check_in("_g2v",$getstr)){?> class="nx"<? }?>>���Ż�</a>
 </div>
</div>
<!--ѡ��2E-->

<? 
pagef($ses,10,"epzhu_pro",$px);while($row=mysql_fetch_array($res)){
$tp="../../".returntp("bh='".$row[bh]."' order by xh asc","-2");
$au="view".$row[id].".html";
$sqlsell="select * from epzhu_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$ressell=mysql_query($sqlsell);$rowsell=mysql_fetch_array($ressell);
?>
<div class="list1 box">
 <div class="d1"><span class="s0"><img src="img/shop.png" width="14" /></span><span class="s1"><?=$rowsell[shopname]?></span></div>
 <div class="d2"><? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){echo "[�Զ�����]";}?></div>
</div>
<div class="list2 box" onclick="gourl('<?=$au?>')">
 <div class="d1"><img border="0" src="<?=returntppd($tp,"../img/none70x70.gif")?>" width="80" height="80" /></div>
 <div class="d2">
  <a href="<?=$au?>" class="a1"><?=$row[tit]?></a>
  <div class="dn1">
  <? if($rowsell[baomoney]>0){?>
  <span class="s2">�ѽɱ�֤��</span>
  <? }?>
  </div>
  <div class="dn2">��<strong><?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?></strong></div>
 </div>
</div>
<? }?>

<div class="npa">
<?
$nowurl="search";
$nowwd="";
require("../tem/page.html");
?>
</div>

<? include("../tem/bottom.php");?>
</body>
</html>