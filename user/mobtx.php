<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
while1("uid,email,ifemail","epzhu_user where uid='".$_SESSION[SHOPUSER]."'");$row1=mysql_fetch_array($res1);
if(empty($row1[email]) || $row1[ifemail]==0){echo "err";exit;}

require("../config/mailphp/sendmail.php");
$yz=MakePass(6);
$str="��֤�룺<font color='red' style='font-size:18px;'>".$yz."</font>,������Ǳ��˲���������Դ���Ϣ����".webname."��<hr>���ʼ�Ϊϵͳ����������ظ�";
yjsendmail("��ȫ���޸ġ�".webname."��",$row1[email],$str);
updatetable("epzhu_user","getpwd='".$yz."' where uid='".$_SESSION[SHOPUSER]."'");
?>