<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","epzhu_order where orderbh='".$orderbh."' and selluserid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("sellorder.php");}

if(sqlzhuru($_POST[jvs])=="fh"){
 zwzr();
 if($row[ddzt]!="wait"){Audit_alert("δ֪����","sellorderview.php?orderbh=".$orderbh);}
 $sj=date("Y-m-d H:i:s"); 
 $kdid=sqlzhuru($_POST[tkd]);
 if(!is_numeric($kdid)){$kdid=0;}
 updatetable("epzhu_order","fhsj='".$sj."',ddzt='db',kdid=".$kdid.",kddh='".sqlzhuru($_POST[tkddh])."' where ddzt='wait' and orderbh='".$orderbh."' and selluserid=".$userid);
 $oksj=date("Y-m-d H:i:s",strtotime("+".$rowcontrol[dbsj]." day"));
 $c_tit="�����Ѿ�������������뵣���׶Σ��ȴ����ȷ���ջ�";
 intotable("epzhu_db","money1,sj,selluserid,userid,dboksj,probh,tit,orderbh","".$row[money1]*$row[num].",'".$sj."',".$row[selluserid].",".$row[userid].",'".$oksj."','".$row[probh]."','".$c_tit."','".$orderbh."'");
 php_toheader("sellorderview.php?orderbh=".$orderbh); 
 
}
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
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('sellorder.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">����</div>
 <div class="d3"></div>
</div>

 <? include("sellorderv.php");?>

 <? if($row[ddzt]=="wait"){?>
 <script language="javascript">
 function tj(){
 if(!confirm("ȷ��Ҫ������")){return false;}
 layer.open({type: 2,content: '�����ύ',shadeClose:false});
 f1.action="fahuo.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onSubmit="return tj()">
 <? if($row[fhxs]==5){?>
 <div class="uk box" style="margin-top:10px;">
 <div class="d1">��ݹ�˾<span class="s1"></span></div>
 <div class="d2">
 <select name="tkd" style="font-size:13px;">
 <option value="0">������</option>
 <? while1("*","epzhu_kuaidi where zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>"><?=$row1[tit]?></option>
 <? }?>
 </select>
 </div>
 <div class="d3"><img src="../img/rightjian.png" height="13" /></div>
 </div>
 <div class="uk box">
 <div class="d1">��ݵ���<span class="s1"></span></div>
 <div class="d2"><input  name="tkddh" placeholder="�������ݵ���" class="inp" type="text"/></div>
 </div>
 <? }?>
 <div class="fbbtn box">
  <div class="d1"><? tjbtnr_m("����")?></div>
 </div>
 <input type="hidden" value="fh" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <div class="tishi box">
 <div class="d1">
 <strong>* վ����ʾ��</strong><br>
 * �����ܿ�ķ����ٶȽ������������Ҷ���������<br>
 * ��������Ϊ����ṩ���ʵ��ۺ����
 </div>
 </div>
 <? }?>

</body>
</html>