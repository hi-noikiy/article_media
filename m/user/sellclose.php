<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","epzhu_order where orderbh='".$orderbh."' and selluserid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("sellorder.php");}


if(sqlzhuru($_POST[jvs])=="close"){
 zwzr();
 $zfmm=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,zfmm","epzhu_user where pwd='".$zfmm."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("��¼��������","sellclose.php?orderbh=".$orderbh);}
 if($row[ddzt]!="wait"){Audit_alert("δ֪����","sellorderview.php?orderbh=".$orderbh);}
 $allmoney=$row[money1]*$row[num];
 PointUpdateM($row[userid],$allmoney);
 PointIntoM($row[userid],"����ȡ������",$allmoney);
 updatetable("epzhu_order","ddzt='close' where selluserid=".$userid." and id=".$row[id]);
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
 <div class="d2">ȡ������</div>
 <div class="d3"></div>
</div>

 <? include("sellorderv.php");?>
 <? if($row[ddzt]=="wait"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){layerts("�������¼����");return false;}
 layer.open({type: 2,content: '�����ύ',shadeClose:false});
 f1.action="sellclose.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onSubmit="return tj()">
 <div class="uk box">
  <div class="d1">��¼����<span class="s1"></span></div>
  <div class="d2"><input type="password" name="t1" class="inp" placeholder="�������¼����" /></div>
 </div>
 <div class="fbbtn box">
  <div class="d1"><? tjbtnr_m("ȡ������")?></div>
 </div>
 <input type="hidden" value="close" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <div class="tishi box">
 <div class="d1">
 <strong>* վ����ʾ��</strong><br>
 * ��δ������ȡ�������󣬷��ý�ֱ���˻�������ʺ�
 </div>
 </div>
 <? }?>
<? include("bottom.php");?>
</body>
</html>