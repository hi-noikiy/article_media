<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/functionyy.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","epzhu_orderyy where orderbh='".$orderbh."' and selluserid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("sellorderyy.php");}

if(sqlzhuru($_POST[jvs])=="fh"){
 zwzr();
 if($row[ddzt]!="wait"){Audit_alert("δ֪����","sellorderviewyy.php?orderbh=".$orderbh);}
 $sj=date("Y-m-d H:i:s"); 
 $kdid=sqlzhuru($_POST[tkd]);
 if(!is_numeric($kdid)){$kdid=0;}
 updatetable("epzhu_orderyy","fhsj='".$sj."',ddzt='db',kdid=".$kdid.",kddh='".sqlzhuru($_POST[tkddh])."' where ddzt='wait' and orderbh='".$orderbh."' and selluserid=".$userid);
 while1("bh,ty1id","epzhu_proyy where bh='".$row[probh]."'");if($row1=mysql_fetch_array($res1)){$tyid=$row1[ty1id];}else{$tyid=0;}
 $dbsj=$rowcontrol[dbsj];
 $sqldb="select * from epzhu_typeyy where id=".$tyid;mysql_query("SET NAMES 'GBK'");$resdb=mysql_query($sqldb);if($rowdb=mysql_fetch_array($resdb)){
 if(!empty($rowdb[dbsj])){$dbsj=$rowdb[dbsj];}
 }
 $oksj=date("Y-m-d H:i:s",strtotime("+".$dbsj." day"));
 $c_tit="�����Ѿ�������������뵣���׶Σ��ȴ����ȷ���ջ�";
 intotable("epzhu_dbkf","money1,sj,selluserid,userid,dboksj,probh,tit,orderbh","".$row[money1]*$row[num].",'".$sj."',".$row[selluserid].",".$row[userid].",'".$oksj."','".$row[probh]."','".$c_tit."','".$orderbh."'");
 php_toheader("sellorderviewyy.php?orderbh=".$orderbh); 
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��������</li>
</ul>
<? $leftid=1;include("leftyy.php");?>

<!--RB-->
<div class="right">
 <? include("sellzfyy.php");?>
 <? include("sellordervyy.php");?>
 
 <? if($row[ddzt]=="wait"){?>
 <script language="javascript">
 function tj(){
 if(!confirm("ȷ��Ҫ������")){return false;}
 tjwait();
 f1.action="fahuoyy.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1">
 <strong>* ��ܰ��ʾ��</strong><br>
 * �����ܿ�ķ����ٶȽ������������Ҷ���������<br>
 * ��������Ϊ����ṩ���ʵ��ۺ����
 </li>
 <? if($row[fhxs]==5){?>
 <li class="l2"><span class="red">*</span> ��ݹ�˾��</li>
 <li class="l3">
 <select name="tkd" style="float:left;height:30px;font-size:14px;">
 <option value="0">������</option>
 <? while1("*","epzhu_kuaidi where zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>"><?=$row1[tit]?></option>
 <? }?>
 </select>
 </li>
 <li class="l2">��ݵ��ţ�</li>
 <li class="l3"><input  name="tkddh" class="inp" size="20" type="text"/></li>
 <? }?>
 <li class="l4"><?=tjbtnr("����")?></li>
 </ul>
 <input type="hidden" value="fh" name="jvs" />
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