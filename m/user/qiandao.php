<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");

while1("*","epzhu_qiandao where userid=".$userid." order by sj desc limit 1");
if($row1=mysql_fetch_array($res1)){
$a_ux = strtotime($sj);
$a_date = date('Y-m-d',$a_ux);
$b_date = date('Y-m-d',strtotime($row1[sj]));
if($a_date==$b_date){$ifq=1;}else{$ifq=0;}
}else{$ifq=0;}

//��������ʼ
if($_POST[jvs]=="qd"){
 zwzr();
 if(1==$ifq){Audit_alert("������ǩ���������ظ�ǩ��","qiandao.php");}
 $uip=$_SERVER["REMOTE_ADDR"];
 $qdjf=$rowcontrol[qdjf];
 $lxd=0;
 while1("*","epzhu_qiandaojf order by daynum desc limit 1");if($row1=mysql_fetch_array($res1)){
  for($i=2;$i<=$row1[daynum];$i++){
   $iv=$i-1;
   $sjv=date("Y-m-d",strtotime("-".$iv." day"));
   $sj1=$sjv." 00:00:00";
   $sj2=$sjv." 23:59:59";
   while2("*","epzhu_qiandao where userid=".$userid." and sj>='".$sj1."' and sj<='".$sj2."'");if(!$row2=mysql_fetch_array($res2)){break;}else{$lxd++;}
  }
  if($lxd>0){
  $dnum=$lxd+1;
  while3("*","epzhu_qiandaojf where daynum<=".$dnum." order by daynum desc limit 1");if($row3=mysql_fetch_array($res3)){$qdjf=$row3[jf];$lx="(����ǩ��".$dnum."��)";}
  }
 }
 intotable("epzhu_qiandao","userid,sj,uip,tit,jf","".$userid.",'".$sj."','".$uip."','".sqlzhuru($_POST[t1]).$lx."',".$qdjf."");
 PointInto($userid,"ÿ��ǩ��",$qdjf);
 PointUpdate($userid,$qdjf); 
 php_toheader("qiandao.php");
}
//����������

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
function tj(){
if((document.f1.t1.value).replace(/\s/,"")==""){alert("����д��������");document.f1.t1.focus();return false;}
layer.open({type: 2,content: '�����ύ',shadeClose:false});
f1.action="qiandao.php?control=add";
}
</script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('./')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">ÿ��ǩ��</div>
 <div class="d3"></div>
</div>

<? while1("*","epzhu_qiandaojf order by daynum desc limit 1");if($row1=mysql_fetch_array($res1)){?>
<div class="prots box"><div class="d1">����ǩ����߿ɻ��<strong class="feng"><?=$row1[jf]?></strong>�֣�����ǵ�Ҳ��ǩ��Ŷ^_^</div></div>
<? }?>

<? if(0==$ifq){?>
<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="qd" name="jvs" />
<div class="uk box">
 <div class="d1">��������<span class="s1"></span></div>
 <div class="d2"><input type="text" name="t1" class="inp" value="��ʱǩ���Ǹ���ϰ��^_^ ǩ���÷�����" /></div>
</div>

<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("ǩ��׬����")?></div>
</div>
</form>
<? }?>

<?
$ses=" where userid=".$rowuser[id];
pagef($ses,30,"epzhu_qiandao","order by sj desc");while($row=mysql_fetch_array($res)){
?>
<div class="jflog box">
<div class="d1"><?=$row[tit]?><br><span class="hui"><?=$row[sj]?></span></div>
<div class="d2">+<?=abs($row[jf])?></div>
</div>
<? }?>

<div class="npa">
<?
$nowurl="qiandao.php";
$nowwd="";
require("page.html");
?>
</div>


<? include("bottom.php");?>
</body>
</html>