<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();

$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
$bh=time()."p".$userid;
$ty1id=$_GET[ty1id];
deletetable("epzhu_protype where userid=".$userid." and zt=99");
while1("*","epzhu_protype where id=".$ty1id." and userid=".$userid." and admin=1");
if(!$row1=mysql_fetch_array($res1)){Audit_alert("��Դ����","protypelist.php","parent.");}

$nxh=returnxh("epzhu_protype"," and userid=".$userid." and admin=2 and name1='".$row1[name1]."' and zt=0");

intotable("epzhu_protype","bh,userid,name1,admin,xh,sj,zt","'".$bh."',".$userid.",'".$row1[name1]."',2,".$nxh.",'".$sj."',99");

php_toheader("protype2.php?bh=".$bh);
?>
