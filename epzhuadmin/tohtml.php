<?php
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:12-0036-745
include("../config/function.php");
AdminSes_audit();
switch($_GET["admin"])
{
 case "0":
 case "":
 $nstr="&nbsp;&nbsp;1���ճ�����ͨ�����滺��������";
 $nwz="&nbsp;&nbsp;���滺������";
 break;
 case "1":
 $nstr="&nbsp;&nbsp;1��ͬ���������ڵ������˿��еĶ���״̬<br>&nbsp;&nbsp;2��ͬ�����е��̵���״̬���";
 $nwz="&nbsp;&nbsp;����/����״̬�������";
 break;
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link rel="stylesheet" href="layui/css/layui.css">
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
<!--
var xmlHttp = false;
try {
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp = false;
  }
}
if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
  xmlHttp = new XMLHttpRequest();
}
function callServer(url) {
  xmlHttp.open("post", url, true);
  xmlHttp.onreadystatechange = updatePage;
  xmlHttp.send(null);  
}

function updatePage() {
  if (xmlHttp.readyState == 4) {
   var response = xmlHttp.responseText;
   response=response.replace(/[\r\n]/g,'');
   if(response=="ok"){
   <? if($_GET[bkpage]!=""){?>
   location.href="<?=$_GET[bkpage]?>?t=suc";
   <? }else{?>
   location.href="tohtml.php?t=suc&admin="+document.getElementById("nadmin").innerHTML;return false;
   <? }?>
   }else{alert("����ʧ�ܣ����¼�ۺ����www.yjcode.com���ҽ������\n"+response);window.location.reload();return false;}
  }
}


function startHTML(adminnum){
layer.msg('���ڴ�������', {icon: 16  ,time: 0,shade :0.25});
callServer("after_html.php?admin="+adminnum);
}
//-->
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","tohtml.php?backadmin=".$_GET[backadmin]);}?>
 
 <!--begin-->
 <div class="rkuang" style="margin-top:10px;">
 <div class="control"><strong><?=$nwz?></strong></div>
 <div class="htmlnts"><?=$nstr?></div>
 <ul class="uk">
 <li class="l3"><input type="button" value="��ʼ����" class="btn1" onclick="startHTML(<?=$_GET[admin]?>)" /></li>
 </ul>
 </div>
 <span id="nadmin" style="display:none"><?=$_GET[admin]?></span>
 </div>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
<? if($_GET[action]=="gx"){?>
<script language="javascript">
startHTML(<?=$_GET[admin]?>);
</script>
<? }?>

</body>
</html>