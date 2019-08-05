<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);if($rowuser[sfzrz]!=2 && $rowuser[sfzrz]!=3){php_toheader("smrz.php"); }

if($_POST[jvs]=="smrz"){
 zwzr();
 $sfz=sqlzhuru($_POST[tsfz]);
 if(strlen(stripos($sfz,"/"))>0 || strlen(stripos($sfz,";"))>0){Audit_alert("身份证号码格式有误！","smrz1.php");}
 updatetable("epzhu_user","uname='".sqlzhuru($_POST[tuname])."',sfz='".sqlzhuru($_POST[tsfz])."' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("smrz2.php"); 
}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>会员中心 <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="index.js"></script>

<script language="javascript">
function tj(){
 if((document.f1.tuname.value).replace("/\s/","")==""){layerts("请输入真实姓名");return false;}
 if((document.f1.tsfz.value).replace("/\s/","")==""){layerts("请输入身份证号码");return false;}
 layer.open({type: 2,content: '正在提交',shadeClose:false});
 f1.action="smrz1.php";
}
</script>

</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="javascript:window.history.go(-1);"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">实名认证</div>
 <div class="d3"></div>
</div>

<div class="tishi box">
<div class="d1">
认证步骤：<br>
<strong class="blue">一、填写真实姓名和身份证号码</strong><br>
二、上传身份证正面照片<br>
三、上传身份证反面照片<br>
四、上传手持身份证半身人像照片<br>
</div>
</div>

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="smrz" name="jvs" />
<div class="uk box">
 <div class="d1">真实姓名</div>
 <div class="d2"><input type="text" class="inp" name="tuname" value="<?=$rowuser[uname]?>" placeholder="请输入真实姓名" /></div>
</div>

<div class="uk box">
 <div class="d1">身份证号</div>
 <div class="d2"><input type="text" class="inp" name="tsfz" value="<?=$rowuser[sfz]?>" placeholder="请输入身份证号" /></div>
</div>

<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("下一步")?></div>
</div>
</form>

<? include("bottom.php");?>
</body>
</html>