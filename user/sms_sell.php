<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
</head>
<body>
<div class="smsmain">
 <span class="s1">���ж�����������ͬ����</span>
 <span id="s2">0%</span>
 <span class="s3">(�벻Ҫˢ�»�ر�ҳ��)</span>
</div>
<? $i=1;while1("*","epzhu_smsmail where userid=".$userid." and tyid=1 order by id asc");while($row1=mysql_fetch_array($res1)){?>
<span id="smsid<?=$i?>" style="display:none"><?=$row1[id]?></span>
<? $i++;}?>
</body>

<script language="javascript">
var nowsms=1; //��ǰִ�е�˳���
var allsms; //����SMS˳���

allsms=<?=$i-1?>;
if(allsms<=0){
timeset();
}else{
userChecksms();
}


//SMSMAILϵͳ
function timeset(){
parent.location.href="order.php";
}


function userChecksms(){
 url1 = "sms_sell_chk.php";
 $.get(url1,{id:document.getElementById("smsid"+nowsms).innerHTML},function(result){
 if(result!=""){
  a=parseInt(nowsms/allsms*100);
  document.getElementById("s2").innerHTML=a+"%";
  if(allsms>nowsms){nowsms=nowsms+1;setTimeout("userChecksms()",4000);}else{timeset();}
 }
 });
}

</script>

</html>