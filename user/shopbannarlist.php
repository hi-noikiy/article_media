<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
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
<link href="css/shop.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function add1(){
layer.open({
  type: 2,
  area: ['622px', '400px'],
  title:["�����ֲ�ͼƬ","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['shopbannarlx.php', 'no'] 
});
}
function upd(x){
layer.open({
  type: 2,
  area: ['622px', '400px'],
  title:["�����ֲ�ͼƬ","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['shopbannar.php?bh='+x, 'no'] 
});
}
function glover(x){
 document.getElementById("gl"+x).style.display="";
}
function glout(x){
 document.getElementById("gl"+x).style.display="none";
}
function del(x){
document.getElementById("chk"+x).checked=true;
NcheckDEL(17,'epzhu_shopbannar');
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �ֲ�ͼƬ</li>
</ul>
<? $leftid=1;include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap4.php");?>
 <script language="javascript">
 document.getElementById("rcap5").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:;" onclick="NcheckDEL(17,'epzhu_shopbannar')" class="a1">ɾ��</a>
 <a href="javascript:;" onclick="add1()" class="a2">���ͼƬ</a>
 </li>
 <li class="l3">
 </li>
 </ul>

 <ul class="shopbannarcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">ͼƬ��Ϣ</li>
 <li class="l3">����</li>
 <li class="l4">�༭ʱ��</li>
 <li class="l5"></li>
 </ul>
 <? 
 while1("*","epzhu_shopbannar where userid=".$luserid." and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
 if(1==$row1[targ]){$ifn="��ǰ���ڴ�";}else{$ifn="�´��ڴ�";}
 $at="../upload/".$row1[userid]."/shopbannar_".$row1[bh].".jpg";
 ?>
 <ul class="shopbannarlist">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row1[id]?>" value="<?=$row1[bh]?>" /></li>
 <li class="l2">
 <a href="<?=$at?>" target="_blank"><img src="<?=$at?>" align="left" width="70" height="70" /></a>
 <a href="<?=$row1[aurl]?>" target="_blank">
 <strong><?=$row1[tit]?></strong><br><?=$row1[aurl]?><br><span class="green"><?=$ifn?></span>
 </a>
 </li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l4"><?=$row1[sj]?></li>
 <li class="l5" onmouseover="glover(<?=$row1[id]?>)" onmouseout="glout(<?=$row1[id]?>)">
  <span class="s1">����</span>
  <div class="gl" style="display:none;" id="gl<?=$row1[id]?>">
  <a href="javascript:void(0);" onclick="upd('<?=$row1[bh]?>')">�޸���Ϣ</a>
  <a href="javascript:void(0);" onclick="del(<?=$row1[id]?>)">ɾ��ͼƬ</a>
  </div>
 </li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>