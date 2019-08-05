<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/functionmg.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","epzhu_ordermg where orderbh='".$orderbh."' and (ddzt='db' or ddzt='backerr') and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("ordermg.php");}


if(sqlzhuru($_POST[jvs])=="sh"){
 zwzr();
 $zfmm=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,zfmm","epzhu_user where zfmm='".$zfmm."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("支付密码有误！","shouhuomg.php?orderbh=".$orderbh);}
 if($row[ddzt]!="db" && $row[ddzt]!="backerr"){Audit_alert("未知错误！","orderviewmg.php?orderbh=".$orderbh);}
 $allmoney=$row[money1]*$row[num]+$row[yunfei];
 $sellblm=returnsellbl($row[selluserid],$row[probh])*$allmoney; //卖家可得金额
 $ptyj=$allmoney-$sellblm;
 PointUpdateM($row[selluserid],$sellblm);
 PointIntoM($row[selluserid],"成功卖出商品，买方已确认收货，已自动扣除平台佣金".$ptyj."元",$sellblm);
 //推荐B
 $v=returntjuserid($userid);
 $tjmoney=returntjmoney($row[probh]);
 if(!empty($v) && !empty($tjmoney)){
 $tjm=$allmoney*$tjmoney;
 PointUpdateM($v,$tjm);
 PointIntoM($v,"您推荐的买家成功交易了".$allmoney."元，您获得相应佣金",$tjm);
 PointUpdateM($row[selluserid],$tjm*(-1));
 PointIntoM($row[selluserid],"买家由其他用户推荐进来(推荐人ID:".$v.")，扣除佣金",$tjm*(-1));
 }
 //推荐E
 $sj=date("Y-m-d H:i:s");
 updatetable("epzhu_ordermg","ddzt='suc',oksj='".$sj."' where userid=".$userid." and id=".$row[id]);
 deletetable("epzhu_dbkf where userid=".$userid." and orderbh='".$orderbh."'");
 php_toheader("orderviewmg.php?orderbh=".$orderbh); 

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
<link href="css/order.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 确认收货</li>
</ul>
<? $leftid=2;include("leftmg.php");?>

<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0">请选择：</li>
 <li class="g_ac0_h g_bc0_h">订单详情</li>
 <li class="l1"><a href="ordermg.php">我的订单</a></li>
 </ul>
 <? include("ordervmg.php");?>
 
 <? if($row[ddzt]=="db" || $row[ddzt]=="backerr"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){layer.alert('请输入支付密码', {icon:5});return false;}
 layer.msg('正在操作', {icon: 16  ,time: 0,shade :0.25});
 f1.action="shouhuomg.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1"><strong>确认收货</strong></li>
 <li class="l2">请输入您的支付密码：(<a href="zfmm.php" class="red">忘了支付密码？</a>)</li>
 <li class="l3"><input  name="t1" class="inp" size="30" type="password"/></li>
 <li class="l4"><?=tjbtnr("确认收货")?></li>
 </ul>
 <input type="hidden" value="sh" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>