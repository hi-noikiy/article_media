<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/functionyy.php");
sesCheck();
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."' and shopzt=2";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("openshop3.php");}
$userid=$rowuser[id];

//������ʼ
if($_GET[control]=="add"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $bh=time()."-".$userid;
 createDir("../upload/".$userid."/".$bh."/");
 intotable("epzhu_proyy","bh,userid,sj,lastsj,uip,ty1id,ty2id,ty3id,ty4id,ty5id,zt,djl,xsnum,yhxs,ifxj,pf1,pf2,pf3,iftj,fhxs","'".$bh."',".$userid.",'".$sj."','".$sj."','".$uip."',".sqlzhuru($_POST[type1id]).",".sqlzhuru($_POST[type2id]).",".sqlzhuru($_POST[type3id]).",".sqlzhuru($_POST[type4id]).",".sqlzhuru($_POST[type5id]).",99,0,0,1,0,5,5,5,0,1");
 php_toheader("productyy.php?bh=".$bh); 
 

}elseif($_GET[control]=="update"){
 zwzr();
 updatetable("epzhu_proyy","ty1id=".sqlzhuru($_POST[type1id]).",ty2id=".sqlzhuru($_POST[type2id]).",ty3id=".sqlzhuru($_POST[type3id]).",ty4id=".sqlzhuru($_POST[type4id]).",ty5id=".sqlzhuru($_POST[type5id])." where userid=".$userid." and id=".$_GET[id]);
 php_toheader("productyy.php?bh=".$_GET[bh]); 

}
//��������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>

<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="../css/pty.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/ptyeyy.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��Ʒ�༭</li>
</ul>
<? $leftid=1;include("leftyy.php");?>
<!--RB-->
<div class="right">
 <? systs("��ϲ���������ɹ�!","shop.php")?>
 
 <? include("rcap3.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_bc0_h";
 </script>

 <!--begin-->
 <? if($_GET[action]==""){?>
 <form name="f1" method="post" onsubmit="return tjadd('productlxyy.php',0)">
 <input type="hidden" name="type1id" value="0" />
 <input type="hidden" name="type2id" value="0" />
 <input type="hidden" name="type3id" value="0" />
 <input type="hidden" name="type4id" value="0" />
 <input type="hidden" name="type5id" value="0" />
 <div class="productlx">
 
  <div class="ptype">
  <a href="javascript:void(0);" class="a1">ѡ����� <img border="0" src="../img/jiandown.gif" width="7" height="4" /></a>
  <? while1("*","epzhu_typeyy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:typeonc(<?=$row1[id]?>,'<?=$row1[type1]?>')" class="a2"><?=$row1[type1]?></a>
  <? }?>
  </div>
  
  <div class="ptype">
  <iframe name="ptype2" id="ptype2" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0"></iframe>
  </div>
  
  <div class="ptype">
  <iframe name="ptype3" id="ptype3" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0"></iframe>
  </div>
  
  <div class="ptype">
  <iframe name="ptype4" id="ptype4" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0"></iframe>
  </div>
  
  <div class="ptype">
  <iframe name="ptype5" id="ptype5" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0"></iframe>
  </div>
  
  <div class="sel">
  <strong>����ǰѡ����ǣ�</strong>
  <span id="type1name"></span>
  <span id="type2name"></span>
  <span id="type3name"></span>
  <span id="type4name"></span>
  <span id="type5name"></span>
  </div>
  <div class="fb"><input type="submit" value="�����Ķ����¹������ڷ�����Ʒ" /></div>
  <div class="gz"><input id="C1" checked="checked" type="checkbox" value="1" /> �����Ķ���<a href="../help/aboutview8.html" class="feng" target="_blank">��Ʒ������֪����</a>����ͬ��</div>
  
 </div>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","epzhu_proyy where id=".$_GET[id]."");if(!$row=mysql_fetch_array($res)){php_toheader("productlistyy.php");}
 ?>
 <form name="f1" method="post" onsubmit="return tjupdate('productlxyy.php',<?=$_GET[id]?>,'<?=$row[bh]?>')">
 <input type="hidden" name="type1id" value="<?=$row[ty1id]?>" />
 <input type="hidden" name="type2id" value="<?=$row[ty2id]?>" />
 <input type="hidden" name="type3id" value="<?=$row[ty3id]?>" />
 <input type="hidden" name="type4id" value="<?=$row[ty4id]?>" />
 <input type="hidden" name="type5id" value="<?=$row[ty5id]?>" />
 <div class="productlx">
 
  <div class="ptype">
  <a href="javascript:void(0);" class="a1">ѡ����� <img border="0" src="../img/jiandown.gif" width="7" height="4" /></a>
  <? while1("*","epzhu_typeyy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:typeonc(<?=$row1[id]?>,'<?=$row1[type1]?>')" class="a2"><?=$row1[type1]?></a>
  <? }?>
  
  </div>
  
  <div class="ptype">
  <iframe name="ptype2" id="ptype2" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0" src="../tem/protype2yy.php?type1id=<?=$row[ty1id]?>"></iframe>
  </div>
  
  <div class="ptype">
  <iframe name="ptype3" id="ptype3" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0" src="../tem/protype3yy.php?type1id=<?=$row[ty1id]?>&type2id=<?=$row[ty2id]?>"></iframe>
  </div>
  
  <div class="ptype">
  <iframe name="ptype4" id="ptype4" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0" src="../tem/protype4yy.php?type1id=<?=$row[ty1id]?>&type2id=<?=$row[ty2id]?>&type3id=<?=$row[ty3id]?>"></iframe>
  </div>
  
  <div class="ptype">
  <iframe name="ptype5" id="ptype5" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0" src="../tem/protype5yy.php?type1id=<?=$row[ty1id]?>&type2id=<?=$row[ty2id]?>&type3id=<?=$row[ty3id]?>&type4id=<?=$row[ty4id]?>"></iframe>
  </div>
  
  <div class="sel">
  ����ǰѡ����ǣ�
  <span id="type1name"><?=returntype(1,$row[ty1id])?> >> </span>
  <span id="type2name"><?=returntype(2,$row[ty2id])?> >> </span>
  <span id="type3name"><?=returntype(3,$row[ty3id])?> >> </span>
  <span id="type4name"><?=returntype(4,$row[ty4id])?> >> </span>
  <span id="type5name"><?=returntype(5,$row[ty5id])?></span>
  </div>
  <div class="fb"><input type="submit" value="�����Ķ����¹������ڷ�����Ʒ" /></div>
  <div class="gz"><input id="C1" checked="checked" type="checkbox" value="1" /> �����Ķ���<a href="../help/aboutview8.html" class="feng" target="_blank">��Ʒ������֪����</a>����ͬ��</div>

 </div>
 </form>
 
 <? }?>
 <!--end-->
 
</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>