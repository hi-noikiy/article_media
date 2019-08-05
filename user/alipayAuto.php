<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
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
<title>用户管理面板 - <?=webname?></title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript">
//倒计时开始
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
   tv=int_minute+"分";
   tv=tv+int_second+"." + mm+"秒";
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
   if(document.getElementById("dqsj1")){dsj1=document.getElementById("dqsj1").innerHTML;time_end1=new Date(dsj1);time_end1=time_end1.getTime();}//结束的时间

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
//倒计时结束
</script>
</head>
<body>
<div class="yjcode">
<? include("top.php");?>
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 快速充值</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap2.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 </script>
 
 <ul class="czxz">
 <li class="l1">充值流程</li>
 <li class="l2">
<span id="dqsj1" style="display:none;"><?=$dqsj?></span>
<b>充值须知：</b><br>
1.在收款人处填写：<strong class="s1"><?=$rowcontrol[seller_email]?></strong><br>
2.在付款金额填写：<strong class="s1"><?=$row[money1]?></strong><br>
3.付款说明请填写：<strong class="s1"><?=$row[ddbh]?></strong> (请务必正确填写付款说明（建议复制）,否则金额无法到账)<br>
4.请在<strong class="s2">15</strong>分钟内完成付款，超时将无效，需回到会员中心重新充值 (倒计时：<strong class="s2" id="djs1">正在加载</strong>)<br>
 </li>
 <li class="l3">
 <form method="get" id="myform" name="myform" action="https://auth.alipay.com/login/index.htm" target="_blank">
 <input name="goto" value="https://shenghuo.alipay.com/send/payment/fill.htm?title=<?=$row[ddbh]?>" type="hidden">
 <input type="submit" value="知道了，进入支付宝网站转帐" />
 </form>
 </li>
 <li class="l4"><a href="paylog.php">我已转帐</a></li>
 </ul>

</div> 
<!--RE-->

</div>
<script language="javascript">userChecksj();</script>
<? include("bottom.php");?>
</body>
</html>