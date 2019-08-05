<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","epzhu_order where orderbh='".$orderbh."' and selluserid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}


if(sqlzhuru($_POST[jvs])=="tk"){
 zwzr();
 $pwd=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,zfmm","epzhu_user where pwd='".$pwd."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("登录密码有误！","selltk.php?orderbh=".$orderbh);}
 if($row[ddzt]!="back"){Audit_alert("未知错误！","sellorderview.php?orderbh=".$orderbh);}
 while1("*","epzhu_tk where selluserid=".$row[selluserid]." and orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
 $sj=date("Y-m-d H:i:s");
 //同意B
 if(sqlzhuru($_POST[R1])=="yes"){
  $allmoney=$row[money1]*$row[num];
  PointUpdateM($row[userid],$allmoney);
  PointIntoM($row[userid],"卖家同意退款申请",$allmoney);
  updatetable("epzhu_order","ddzt='backsuc',tksj='".$row1[sj]."',tkly='".$row1[tkly]."',tkjg='".sqlzhuru($_POST[t2])."',tkoksj='".$sj."' where selluserid=".$userid." and id=".$row[id]);
  deletetable("epzhu_tk where orderbh='".$orderbh."' and selluserid=".$userid);
  deletetable("epzhu_db where orderbh='".$orderbh."' and selluserid=".$userid);
 //同意E
 //不同意B
 }elseif(sqlzhuru($_POST[R1])=="no"){
  updatetable("epzhu_order","ddzt='backerr',tksj='".$row1[sj]."',tkly='".$row1[tkly]."',tkjg='".sqlzhuru($_POST[t2])."',tkoksj='".$sj."' where selluserid=".$userid." and id=".$row[id]);
  deletetable("epzhu_tk where orderbh='".$orderbh."' and selluserid=".$userid);
 }
 //不同意E

 
 php_toheader("sellorderview.php?orderbh=".$orderbh); 

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
 <div class="d1" onClick="gourl('sellorder.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">处理退款</div>
 <div class="d3"></div>
</div>

 <? 
 if($row[ddzt]=="back"){
 while1("*","epzhu_tk where selluserid=".$row[selluserid]." and orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){layerts("请输入登录密码");return false;}
 if(!confirm("确定提交吗？")){return false;}
 layer.open({type: 2,content: '正在提交',shadeClose:false});
 f1.action="selltk.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onSubmit="return tj()">
 <div class="tishi box">
 <div class="d1">
 <strong>站长提示：</strong><br>
 请在 <span class="red"><?=$row1[tkoksj]?></span> 前处理，否则系统默认您接受退款申请，款项会自动退回买家帐户<br>
 如果不同意本次退款，请先与买家沟通，以免引起不必要的纷争<br>
 退款理由：<span class="blue"><?=$row1[tkly]?></span><br>
 申请时间：<?=$row1[sj]?>
 </div>
 </div>
 <div class="uk box">
  <div class="d1">是否同意<span class="s1"></span></div>
  <div class="d2">
  <select name="R1" style="font-size:14px;">
  <option value="yes">同意</option>
  <option value="no">不同意</option>
  </select>
  </div>
  <div class="d3"><img src="../img/rightjian.png" height="13" /></div>
 </div>
 <div class="listcap box"><div class="d2">请填写原因：</div></div>
 <div class="orderpj box"><div class="d1"><textarea name="t2"></textarea></div></div>
 <div class="uk box">
  <div class="d1">登录密码<span class="s1"></span></div>
  <div class="d2"><input type="password" name="t1" class="inp" placeholder="请输入登录密码" /></div>
 </div>
 <div class="fbbtn box">
  <div class="d1"><? tjbtnr_m("提交")?></div>
 </div>
 <input type="hidden" value="tk" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <? }?>

 <? include("sellorderv.php");?>
 
 <? include("bottom.php");?>
</body>
</html>