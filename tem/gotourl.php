<?
include("../config/conn.php");//二次开发联系QQ:120036745//二-次开-发-联-系QQ:12-00-36-745
include("../config/function.php");
$u=htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
if($u!=""){
 $a=preg_split("/gotourl.php\?u=/",$u);
 php_toheader($a[1]);
}else{echo "暂无演示网址";}
?>