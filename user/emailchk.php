<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
if(empty($_SESSION[SHOPUSER])){echo "ok";exit;}
$email=$_GET[email];
if(empty($email)){echo "True";exit;}
if(panduan("uid,email,ifemail","epzhu_user where email='".$email."' and ifemail=1")==1){echo "True";exit;}

require("../config/mailphp/sendmail.php");
$yz=MakePass(6);
$str="��֤�룺<font color='red' style='font-size:18px;'>".$yz."</font>,�����ڽ�������󶨣�������Ǳ��˲���������Դ���Ϣ����".webname."��<hr>���ʼ�Ϊϵͳ����������ظ�";
yjsendmail("����󶨡�".webname."��",$email,$str);
updatetable("epzhu_user","bdemail='".$yz."',email='".$email."' where uid='".$_SESSION[SHOPUSER]."'");echo "ok";exit;

?>