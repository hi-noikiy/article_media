<?
header("Content-Type:text/html;charset=GB2312");
session_start();
include("../config/conn.php");//二次开发联系QQ:120036745//二-次开-发-联-系QQ:12-00-36-745
include("../config/function.php");
while2("*","epzhu_user where uid='".$_SESSION["SHOPUSER"]."'");$row2=mysql_fetch_array($res2);
$t1=$_GET[t1];
$t2=$_GET[t2];
if(empty($t1) && empty($t2)){
 if(empty($_SESSION[SHOPUSER])){echo "err2";exit;}
 $ses="uid='".$_SESSION[SHOPUSER]."'";
}else{
 $ses="uid='".$t1."' and pwd='".sha1($t2)."'";
}
while1("*","epzhu_user where ".$ses);
if(!$row1=mysql_fetch_array($res1)){echo "err1";exit;}
$_SESSION[SHOPUSER]=$row1[uid];
$money1=$row1[money1]; //可用金额
$jf=$row1[jf]; //可用积分
$djmoney=$row1[djmoney]; //冻结金额
$moneya=$money1+$djmoney;
echo "ok|".$row1[uid]."|".sprintf("%.2f",$moneya)."|".sprintf("%.2f",$djmoney)."|".sprintf("%.2f",$money1)."|".$jf."|".returntppd("../upload/".$row2[id]."/user.jpg","../user/img/nonetx.gif");
?>