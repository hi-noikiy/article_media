<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();
$userid=returnuserid($_SESSION[SHOPUSER]);
$id=$_GET[id];
while0("*","epzhu_dingdang where id=".$id." and ifauto=1 and ifok=0 and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("pay.php");}
$oksj=date('Y-m-d H:i:s',strtotime ("+15 minute",strtotime($row[sj])));
$dqsj=str_replace("-","/",$oksj);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript">
//����ʱ��ʼ
var responsesj;
var time_server_client,timerID,xs,time_end1,timerID1;

function show_time(djsid)
{
 var time_now,time_distance,str_time;
 var int_day,int_hour,int_minute,int_second;
 var time_now=new Date();
 time_now=time_now.getTime()+time_server_client;
 if(djsid==1){time_end=time_end1;timerID=timerID1;}
 
 time_distance=time_end-time_now;
 if(time_distance>0)
 {
  int_day=parseInt(Math.floor(time_distance/86400000))
  time_distance-=int_day*86400000;
  int_hour=parseInt(Math.floor(time_distance/3600000))
  time_distance-=int_hour*3600000;
  int_minute=parseInt(Math.floor(time_distance/60000))
  time_distance-=int_minute*60000;
  int_second=parseInt(Math.floor(time_distance/1000))
  mm = Math.floor((time_distance % 1000)/100);
   tv=int_minute+"��";
   tv=tv+int_second+"." + mm+"��";
   document.getElementById("djs"+djsid).innerHTML=tv;
   setTimeout("show_time("+djsid+")",100);
  }else{location.href="pay.php";}
}

var xmlHttpsj = false;
try {
  xmlHttpsj = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpsj = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpsj = false;
  }
}
if (!xmlHttpsj && typeof XMLHttpRequest != 'undefined') {
  xmlHttpsj = new XMLHttpRequest();
}


function updatePagesj() {
  if (xmlHttpsj.readyState == 4) {
   responsesj = xmlHttpsj.responseText;
   if(document.getElementById("dqsj1")){dsj1=document.getElementById("dqsj1").innerHTML;time_end1=new Date(dsj1);time_end1=time_end1.getTime();}//������ʱ��

time_now_server=new Date(responsesj);time_now_server=time_now_server.getTime();
time_now_client=new Date();time_now_client=time_now_client.getTime();
time_server_client=time_now_server-time_now_client;

   if(document.getElementById("dqsj1")){timerID1=setTimeout("show_time(1)",100);}
  }
}

function userChecksj(){
	if(document.getElementById("dqsj1")){
    var url = document.getElementById("webhttp").innerHTML+"tem/sjCheck.php";
    xmlHttpsj.open("post", url, true);
    xmlHttpsj.onreadystatechange = updatePagesj;
    xmlHttpsj.send(null);
	}
	}
//����ʱ����
</script>
</head>
<body>
<div class="yjcode">
<? include("top.php");?>
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ���ٳ�ֵ</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap2.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 </script>
 
 <ul class="czxz">
 <li class="l1">��ֵ����</li>
 <li class="l2">
<span id="dqsj1" style="display:none;"><?=$dqsj?></span>
<b>��ֵ��֪��</b><br>
1.���տ��˴���д��<strong class="s1"><?=$rowcontrol[seller_email]?></strong><br>
2.�ڸ�������д��<strong class="s1"><?=$row[money1]?></strong><br>
3.����˵������д��<strong class="s1"><?=$row[ddbh]?></strong> (�������ȷ��д����˵�������鸴�ƣ�,�������޷�����)<br>
4.����<strong class="s2">15</strong>��������ɸ����ʱ����Ч����ص���Ա�������³�ֵ (����ʱ��<strong class="s2" id="djs1">���ڼ���</strong>)<br>
 </li>
 <li class="l3">
 <form method="get" id="myform" name="myform" action="https://auth.alipay.com/login/index.htm" target="_blank">
 <input name="goto" value="https://shenghuo.alipay.com/send/payment/fill.htm?title=<?=$row[ddbh]?>" type="hidden">
 <input type="submit" value="֪���ˣ�����֧������վת��" />
 </form>
 </li>
 <li class="l4"><a href="paylog.php">����ת��</a></li>
 </ul>

</div> 
<!--RE-->

</div>
<script language="javascript">userChecksj();</script>
<? include("bottom.php");?>
</body>
</html>