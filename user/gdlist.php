<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();
$userid=returnuserid($_SESSION[SHOPUSER]);

if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
$ses=" where zt<>99 and userid=".$userid;

if($_GET[control]=="del"){
 deletetable("epzhu_gd where userid=".$userid." and bh='".$_GET[bh]."'");
 deletetable("epzhu_gdhf where userid=".$userid." and gdbh='".$_GET[bh]."'");
 php_toheader("gdlist.php?t=suc");
 
}
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
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function del(x){
 if(confirm("ȷ��ɾ���ù�����Ϣ��")){location.href="gdlist.php?control=del&bh="+x;}else{return false;}
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �����б�</li>
</ul>
<? $leftid=4;include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap12.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <? systs("��ϲ���������ɹ�!","gdlist.php")?>
 <ul class="gdcap">
 <li class="l1">�������</li>
 <li class="l2">��������</li>
 <li class="l3">�ύʱ��</li>
 <li class="l4">״̬</li>
 <li class="l5">����</li>
 </ul>
 <? pagef($ses,20,"epzhu_gd","order by sj desc");while($row=mysql_fetch_array($res)){?>
 <ul class="gdlist" onmouseover="this.className='gdlist gdlist1';" onmouseout="this.className='gdlist';">
 <li class="l1"><?=$row[bh]?></li>
 <li class="l2"><a href="gdhf.php?bh=<?=$row[bh]?>"><?=strgb2312(strip_tags($row[txt]),0,45)?></a></li>
 <li class="l3"><?=$row[sj]?></li>
 <li class="l4"><?=returngdzt($row[gdzt])?></li>
 <li class="l5">
 <a href="gdhf.php?bh=<?=$row[bh]?>">�鿴</a> | 
 <a href="javascript:void(0);" onclick="del('<?=$row[bh]?>')">ɾ��</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="gdlist.php";
 $nowwd="";
 include("page.html");
 ?>
 
</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>