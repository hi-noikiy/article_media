<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();

$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'utf8'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader(gloweb);}

//入库操作开始
if($_POST[jvs]=="bao"){
 zwzr();
 $t1=floatval($_POST[t1]);
 if($t1>$rowuser[money1]){Audit_alert("余额不足","baomoney1.php");}
 if($t1<=0){Audit_alert("未知错误","baomoney1.php");}
 PointIntoB($rowuser[id],"缴纳保证金",$t1);
 PointUpdateB($rowuser[id],$t1); 
 PointIntoM($rowuser[id],"缴纳保证金",$t1*(-1));
 PointUpdateM($rowuser[id],$t1*(-1)); 
 php_toheader("baomoney1.php?t=suc");
}
//入库操作结束 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function tj(){
if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入保证金数量");document.f1.t1.focus();return false;}	
if(!confirm("确定要缴纳保证金吗？")){return false;}
tjwait();
f1.action="baomoney1.php";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 缴纳保证金</li>
</ul>
<? $leftid=5;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap15.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>

 <? systs("恭喜您，操作成功!","baomoney1.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="bao" name="jvs" />
 <ul class="uk">
 <li class="l1">可用余额：</li>
 <li class="l21"><?=$rowuser[money1]?>元 <a href="pay.php" class="red">【充值】</a></li>
 <li class="l1">剩余保证金：</li>
 <li class="l21"><?=$rowuser[baomoney]?>元</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 缴纳保证金：</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("缴纳保证金")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>