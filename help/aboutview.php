<?
include("../config/conn.php");
include("../config/function.php");
$id=$_GET[id];
while0("*","epzhu_onecontrol where tyid=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=returnonecon($row[tyid])?> - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script><div class="yjcode"><? adwhile("ADTOP");?></div>
</head>
<body>
<? include("../tem/top--.html");?>
<? include("../tem/tongepzhu.html");?>

<div class="yjcode">
 
 <div class="abouttxt"><?=$row[txt]?></div>
 
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>