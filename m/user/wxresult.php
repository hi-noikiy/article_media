<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$a=$_GET[a];
if($a=="order"){$urlv="order.php";$urlv1="car.php";}else{$urlv="paylog.php";$urlv1="pay.php";}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script type="text/javascript" src="js/adddate.js" ></script> 
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop2 box">
 <div class="d1" onClick="gourl('<?=$urlv?>')"><img src="img/topleft1.png" height="21" /></div>
 <div class="d2">������</div>
 <div class="d3"></div>
</div>

<div class="czts box">
 <div class="d1">
 <a href="<?=$urlv?>">����ɹ����鿴���</a>
 <a href="<?=$urlv1?>">����ʧ�ܣ����²���</a>
 </div>
</div>

</body>
</html>