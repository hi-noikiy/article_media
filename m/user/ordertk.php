<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
$sj=date("Y-m-d H:i:s");
while0("*","epzhu_order where orderbh='".$orderbh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}

if(sqlzhuru($_POST[jvs])=="tk"){
 zwzr();
 $zfmm=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,zfmm","epzhu_user where pwd='".$zfmm."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("登录密码有误！","ordertk.php?orderbh=".$orderbh);}
 if($row[ddzt]!="db" && $row[ddzt]!="backerr"){Audit_alert("未知错误！","orderview.php?orderbh=".$orderbh);}
 $allmoney=$row[money1]*$row[num]+$row[yunfei];
 updatetable("epzhu_order","ddzt='back',tksj='".$sj."',tkly='".sqlzhuru($_POST[t2])."' where userid=".$userid." and id=".$row[id]);
 $oksj=date("Y-m-d H:i:s",strtotime("+".$rowcontrol[tksj]." day"));
 $sj=date("Y-m-d H:i:s");
 intotable("epzhu_tk","money1,sj,tkoksj,selluserid,userid,probh,tkly,orderbh","".$allmoney.",'".$sj."','".$oksj."',".$row[selluserid].",".$row[userid].",'".$row[probh]."','".sqlzhuru($_POST[t2])."','".$orderbh."'");
 while1("*","epzhu_db where orderbh='".$orderbh."' and userid=".$userid);$row1=mysql_fetch_array($res1);
 $dboksj=date("Y-m-d H:i:s",strtotime("+".$rowcontrol[tksj]." day",strtotime($row1[dboksj])));
 updatetable("epzhu_db","dboksj='".$dboksj."' where id=".$row1[id]);
 //通知B
 $sqluser="select id,mot,ifmot,email,ifemail from epzhu_user where id=".$row[selluserid];mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);if(!$rowuser=mysql_fetch_array($resuser)){Audit_alert("安全码有误！","ordertk.php?orderbh=".$orderbh);}
 if(!empty($rowuser[mot]) && $rowuser[ifmot]==1 && $rowcontrol[ifmob]=="on"){
 include("../../config/mobphp/mysendsms.php");
 $str="退款通知：有买家进行了退款，商品单价".$row[money1]."元，数量".$row[num]."，请尽快登录网站处理";
 @yjsendsms($rowuser[mot],$str);
 }
 if(!empty($rowuser[email]) && $rowuser[ifemail]==1 && !empty($rowcontrol[mailpwd])){
 require("../../config/mailphp/sendmail.php");
 $str="退款通知：有买家进行了退款，商品单价".$row[money1]."元，数量".$row[num]."，请尽快登录网站处理<hr>该邮件为系统发出，请勿回复<br>".webname." ".weburl;
 @yjsendmail("退款通知【".webname."】",$rowuser[email],$str,"../");
 }
 //通知E
 php_toheader("orderview.php?orderbh=".$orderbh); 

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
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('order.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">申请退款</div>
 <div class="d3"></div>
</div>

 <? if($row[ddzt]=="db" || $row[ddzt]=="backerr"){?>
 <script language="javascript">
 function tj(){
 if(document.f1.t2.value==""){layerts("请输入您的退款理由");return false;}
 if((document.f1.t1.value).replace("/\s/","")==""){layerts("请输入登录密码");return false;}
 if(!confirm("确认要申请退款吗？")){return false;}
 layer.open({type: 2,content: '正在提交',shadeClose:false});
 f1.action="ordertk.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onSubmit="return tj()">
 <div class="listcap box"><div class="d2">请填写退款理由</div></div>
 <div class="orderpj box"><div class="d1"><textarea name="t2"></textarea></div></div>
 <div class="uk box">
 <div class="d1">登录密码<span class="s1"></span></div>
 <div class="d2"><input type="password" name="t1" class="inp" placeholder="请输入登录密码" /></div>
 </div>
 <div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("申请退款")?></div>
 </div>
 <input type="hidden" value="tk" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <div class="tishi box">
 <div class="d1">
 <strong>* 站长提示：</strong><br>
 * <span class="red">申请退款前，请务必先与卖家沟通好，以免引起不必要的纷争</span><br>
 * 申请退款后，如果卖家在<?=$rowcontrol[tksj]?>天内未做出处理，系统将默认同意退款，款项将自动退回您的帐户<br>
 * 卖家也挺不容易，如果是商品存在问题，而卖家又能积极处理问题，您可以<a href="http://wpa.qq.com/msgrd?v=3&uin=<?=returnqq($row[selluserid])?>&site=<?=weburl?>&menu=yes"  class="blue">与卖家再协商下</a>。
 </div>
 </div>
 <? }?>
</body>
</html>