<?
include("../../config/conn.php");
include("../../config/function.php");
include("../../config/xy.php");
sesCheck_m();
$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript">
function favshopdel(x){
 if(!confirm("ȷ���Ƴ���")){return false;}
 layer.open({type: 2,content: '�����Ƴ�'});
 $.get("favshopdel.php",{id:x},function(result){
 location.reload();
 });
}
</script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('index.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">�ҹ�ע�ĵ���</div>
 <div class="d3"></div>
</div>

 <?
 if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
 pagef(" where userid=".$userid,10,"epzhu_shopfav","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","epzhu_user where id=".$row[shopid]);$row1=mysql_fetch_array($res1);
 $sucnum=returnjgdw($row[xinyong],"",returnxy($row[id],1));
 ?>
 <div class="favshop box">
 <div class="d1"><img border="0" src="<?=returntppd("../../upload/".$row1[id]."/shop.jpg","../img/none180x180.gif")?>" width="40" height="40" /></div>
 <div class="d2"><?=$row1[shopname]?><br><img src="../../img/dj/<?=returnxytp($sucnum)?>" /></div>
 <div class="d3"><img src="img/cardel.png" onClick="favshopdel(<?=$row[id]?>)" height="14" /></div>
 </div>
 <? }?>
 <div class="npa">
 <?
 $nowurl="favshop.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>
 
</body>
</html>