<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//��-�ο�-��-��-ϵQQ:12-00-36-745
include("../config/function.php");
$u=htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
if($u!=""){
 $a=preg_split("/gotourl.php\?u=/",$u);
 php_toheader($a[1]);
}else{echo "������ʾ��ַ";}
?>