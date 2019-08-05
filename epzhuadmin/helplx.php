<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:12-0036-745
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0601,")){Audit_alert("权限不够","default.php");}
$sj=date("Y-m-d H:i:s");
while1("*","epzhu_help where zt=99");
if($row1=mysql_fetch_array($res1)){
 updatetable("epzhu_help","sj='".$sj."' where id=".$row1[id]);$bh=$row1[bh];
 }else{
 $bh=time()."h".rnd_num(100);intotable("epzhu_help","bh,sj,zt,djl","'".$bh."','".$sj."',99,1");
}
php_toheader("help.php?bh=".$bh);
?>
