<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
sesCheck();
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
if(empty($rowuser[txyh]) || empty($rowuser[txname]) || empty($rowuser[txzh])){Audit_alert("您未设置收款帐号，请先设置","txsz.php");}

if(sqlzhuru($_POST[jvs])=="tixian"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $money1=sqlzhuru($_POST[t1]);
 if(!preg_match("/^[0-9,\.]+$/i",$money1)){Audit_alert("提现金额不正确","tixian.php");}
 $m=(float)$money1;
 if($m>$rowuser[money1] || $m<=0){Audit_alert("提现金额不正确，提现失败","tixian.php");}
 if($m<$rowcontrol[txdi]){Audit_alert("低于最低提现额，提现失败","tixian.php");}
 $bh=time()."tx".$rowuser[id];
 intotable("epzhu_tixian","bh,userid,money1,sj,uip,txyh,txname,txzh,txkhh,zt,sm","'".$bh."',".$rowuser[id].",".$m.",'".$sj."','".$uip."','".$rowuser[txyh]."','".$rowuser[txname]."','".$rowuser[txzh]."','".$rowuser[txkhh]."',4,''");
  PointUpdateM($rowuser[id],$m*(-1));
  PointIntoM($rowuser[id],"提现申请",$m*(-1));
  php_toheader("tixian.php?t=suc");
}
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
if((document.f1.t1.value).replace(/\s/,"")=="" || isNaN(document.f1.t1.value)){alert("请输入有效的提现金额");document.f1.t1.focus();return false;}	
if(parseFloat(document.f1.t1.value)<<?=$rowcontrol[txdi]?>){alert("单次提现不得低于<?=$rowcontrol[txdi]?>元");document.f1.t1.focus();return false;}	
if(confirm("确定要提现吗？")){tjwait();f1.action="tixian.php";}else{return false;}
}
</script>
</head>
<body>
<? include("../tem/top.html");?>


<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 我要提现</li>
</ul>
<? $leftid=5;include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap2.php");?>
 <script language="javascript">
 document.getElementById("rcap4").className="g_ac0_h g_bc0_h";
 </script>
 <? systs("恭喜您，操作成功，我们会尽快处理您的提现申请!","tixian.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="tixian" name="jvs" />
 <ul class="uk">
 <li class="l1">友情提示：</li>
 <li class="l21">1、如果不想用以下的收款帐号收款，您可以【<a href="txsz.php" class="feng">修改收款帐号信息</a>】</li>
 <? if(!empty($rowcontrol[txfl])){?>
 <li class="l1"></li>
 <li class="l21">2、提现需要扣除<?=$rowcontrol[txfl]*100?>%的手续费</li>
 <? }?>
 <li class="l1">可用余额：</li>
 <li class="l21 red"><strong style="font-family:Arial, Helvetica, sans-serif;font-size:16px;">￥<?=sprintf("%.2f",$rowuser[money1])?></strong></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span>提现金额：</li>
 <li class="l2"><input type="text" class="inp" name="t1" /> (单次提现不得低于<?=$rowcontrol[txdi]?>元)</li>
 <li class="l1">提现类型：</li>
 <li class="l21"><?=$rowuser[txyh]?></li>
 <li class="l1">卡号/账号：</li>
 <li class="l21 green" style="font-size:14px;"><strong><?=$rowuser[txzh]?></strong></li>
 <li class="l1"<? if($rowuser[txyh]=="支付宝" || $rowuser[txyh]=="财付通"){?> style="display:none;"<? }?>>开户行：</li>
 <li class="l21"<? if($rowuser[txyh]=="支付宝" || $rowuser[txyh]=="财付通"){?> style="display:none;"<? }?>><?=$rowuser[txkhh]?></li>
 <li class="l1">户名：</li>
 <li class="l21 green"><strong><?=$rowuser[txname]?></strong></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("下一步")?></li>
 </ul>
 </form>
 
</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>