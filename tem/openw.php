<?
include("../config/conn.php");
include("../config/function.php");

//登录验证开始
if($_GET[control]=="login"){
 zwzr();
 $uid=sqlzhuru($_POST[t1]);$pwd=sqlzhuru($_POST[t2]);
 if(empty($uid) || empty($pwd)){Audit_alert("帐号或密码输入有误，返回重试","openw.php");}
 while0("id,uid,pwd,zt","epzhu_user where uid='".$uid."' and pwd='".sha1($pwd)."'");if(!$row=mysql_fetch_array($res)){php_toheader("openw.php?t=err");}
 if(0==$row[zt]){php_toheader("openw.php?t=jy");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("epzhu_loginlog","admin,userid,sj,uip","1,".$row[id].",'".$sj."','".$uip."'");
 $_SESSION["SHOPUSER"]=$uid;
 php_toheader("openw.php?t=suc");
}
//登录验证结束

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>登录/注册弹窗</title>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<style type="text/css">
body{margin:0;font-size:12px;text-align:left;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;}
p{margin:2pt 0 0 0;}
*{margin:0 auto;padding:0;}
ul{list-style-type:none;margin:0;padding:0;}
a{color:#333;text-decoration:none;}
a:hover{color:#ff6600;}
input{outline:medium;}
.yjcode{width:650px;height:380px;float:left;background:url(../img/tangbg.jpg) center center no-repeat;}
.yjcode .loginleft{float:left;width:167px;margin:30px 63px 0 20px;font-size:18px;font-weight:700;text-align:center;}
.yjcode .loginleft img{margin:0 0 30px 0;}
.yjcode .loginleft a{color:#999;}
.yjcode .loginleft a:hover{text-decoration:none;color:#009900;}
.yjcode .loginright{float:left;width:350px;text-align:left;color:#5F5F5F;}
.yjcode .loginright .u1{float:left;width:350px;margin:20px 0 0 0;}
.yjcode .loginright .u1 li{float:left;}
.yjcode .loginright .u1 .l99{width:200px;height:40px;font-size:20px;}
.yjcode .loginright .u1 .l98{width:150px;font-size:14px;height:36px;padding:4px 0 0 0;text-align:right;}
.yjcode .loginright .u1 .l98 a{color:#4E9C4E;}
.yjcode .loginright .u1 .l2{width:350px;height:57px;}
.yjcode .loginright .u1 .l2 .inp1{float:left;background-color:#fff;height:48px;width:348px;border-radius:5px;border:#CCCCCC solid 1px;color:#8D8D8D;font-size:14px;padding-left:10px;}
.yjcode .loginright .u1 .l2 .inp2{float:left;background-color:#fff;height:48px;width:186px;border-radius:5px;border:#CCCCCC solid 1px;color:#8D8D8D;font-size:14px;padding-left:10px;}
.yjcode .loginright .u1 .l2 .bg1{background:url(../img/tangts1.png) left center no-repeat;background-color:#fff;}
.yjcode .loginright .u1 .l2 .bg2{background:url(../img/tangts2.png) left center no-repeat;background-color:#fff;}
.yjcode .loginright .u1 .l3{width:350px;margin:7px 0 0 0;font-size:14px;}
.yjcode .loginright .u1 .l3 input{float:left;margin:3px 0 0 0;}
.yjcode .loginright .u1 .l3 span{float:left;}
.yjcode .loginright .u1 .l3 a{float:right;color:#009900;}
.yjcode .loginright .u1 .l3 a:hover{text-decoration:none;color:#009900;}
.yjcode .loginright .u1 .l3 #ts{float:left;width:308px;height:32px;font-size:14px;border:#DCDCDC solid 1px;background:url(../img/tangts.png) no-repeat;background-position:10px 13px;background-color:#FFFAE1;padding:13px 0 0 40px;}
.yjcode .loginright .u1 .l4{width:350px;margin:14px 0 0 0;}
.yjcode .loginright .u1 .l4 input{float:left;width:350px;height:46px;font-size:16px;color:#fff;border:0;border-radius:5px;cursor:pointer;background-color:#009900;}
.yjcode .qtfs{float:left;margin:20px 0 0 20px;width:610px;}
.yjcode .qtfs li{float:left;}
.yjcode .qtfs .l1{margin:10px 0 0 0;width:230px;border-top:#ddd solid 1px;}
.yjcode .qtfs .l2{text-align:center;width:150px;}
.yjcode .qtfsv{float:left;margin:10px 0 0 0;width:650px;text-align:left;}
.yjcode .qtfsv a{float:left;color:#999;padding:4px 0 0 20px;width:80px;height:20px;}
.yjcode .qtfsv a:hover{color:#ff6600;text-decoration:none;}
.yjcode .qtfsv .a1{background:url(../img/qqsmall.png) left center no-repeat;margin:0 50px 0 40px;}
.yjcode .qtfsv .a2{background:url(../img/wxsmall.gif) left center no-repeat;margin:0 50px 0 0;}
.yjcode .qtfsv .a3{background:url(../img/motsmall.png) left center no-repeat;margin:0 70px 0 0;}
.yjcode .qtfsv .a4{background:url(../img/zhsmall.png) left center no-repeat;}
.suc{float:left;width:410px;font-size:14px;color:#6B6B6B;background:url(../img/suc.jpg) no-repeat;background-position:110px 120px;padding:130px 0 0 240px;height:50px;line-height:35px;text-align:center;height:250px;text-align:left;}
.suc strong{font-size:16px;color:#ff6600;}
</style>
<script language="javascript">
//登录开始
function login(){
 if(document.f1.t1.value==""){objdis("ts","");objhtml("ts","请输入账号");objdis("xuan","none");return false;}	
 if(document.f1.t2.value==""){objdis("ts","");objhtml("ts","请输入密码");objdis("xuan","none");return false;}	
 layer.msg('正在登录', {icon: 16  ,time: 0,shade :0.25});
 f1.action="openw.php?control=login";
}
function objdis(x,y){
document.getElementById(x).style.display=y;
}

function objhtml(x,y){
document.getElementById(x).innerHTML=y;
}
function miaos(){
parent.location.reload();
}
</script>
</head>
<body>

 
  <? if($_GET[t]=="suc"){?>
  <div class="suc">
  <strong>登录成功，请继续之前的操作</strong><br>
  <span id="miao">5</span>秒后自动跳转(如未跳转,请刷新)
  </div>
  <script language="javascript">
  setTimeout("miaos()",4000);
  </script>
  <? }else{?>
  <div class="yjcode">
  <div class="loginleft">
  <a href="<?=weburl?>config/qq/oauth/index.php" target="_blank"><img src="../img/qqtang.png" width="167" height="167" /><br>QQ账号直接登录</a>
  </div>
  <div class="loginright">
  <form name="f1" method="post" onSubmit="return login()">
  <input type="hidden" value="login" name="jvs" />
  <ul class="u1">
  <li class="l99">账号密码登录</li>
  <li class="l98">还没有账号？<a href="../reg/reg.php" target="_blank">立即注册</a></li>
  <li class="l2">
  <input type="text" class="inp1 bg1" name="t1" id="t1" autocomplete="off">
  </li>
  <li class="l2">
  <input type="password" class="inp1 bg2" name="t2" id="t2" autocomplete="off">
  </li>
  <li class="l3">
  <div id="xuan">
  <input name="C1" type="checkbox" value="" checked>
  <span>记住登录状态</span>
  <a href="../reg/getmm.php" target="_blank">忘记密码</a>
  </div>
  <div id="ts" style="display:none;"></div>
  </li>
  <li class="l4"><input type="submit" class="fontyh" value="登 录"></li>
  </ul>
  </form>
  </div>
  <ul class="qtfs">
  <li class="l1">&nbsp;</li>
  <li class="l2">其他账号登录</li>
  <li class="l1">&nbsp;</li>
  </ul>
  <div class="qtfsv">
  <a href="<?=weburl?>config/qq/oauth/index.php" target="_blank" class="a1">QQ登录</a>
  <? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);?>
  <a href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect" target="_blank" class="a2">微信登录</a>
  <? }?>
  <? if($rowcontrol[ifmob]=="on"){?><a href="../reg/index.php?lx=mot" target="_blank" class="a3">手机短信登录</a><? }?>
  <a href="../reg/index.php" target="_blank" class="a4">账号密码登录</a>
  </div>
  <script language="javascript">
  <? for($i=1;$i<=2;$i++){?>
  $('#t<?=$i?>').bind('input propertychange', function() {
   if(document.getElementById("t<?=$i?>").value==""){document.getElementById("t<?=$i?>").className="inp1 bg<?=$i?>";}else{document.getElementById("t<?=$i?>").className="inp1";}
  });
  <? }?>
  <? if($_GET[t]=="err"){?>
  objdis("ts","");objhtml("ts","帐号密码输入有误，返回重试");objdis("xuan","none");
  <? }elseif($_GET[t]=="jy"){?>
  objdis("ts","");objhtml("ts","您的帐号已被禁用");objdis("xuan","none");
  <? }?>
  </script>
  </div>
  <? }?>

</body>
</html>