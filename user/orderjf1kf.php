<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/function.php");//��-�ο�-��-��-ϵQ-Q:12-00-3674-5
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
$sj=date("Y-m-d H:i:s");
while0("*","epzhu_orderkf where orderbh='".$orderbh."' and (ddzt='jf' or ddzt='jfbuy' or ddzt='jfsell') and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("orderkf.php");}

if(sqlzhuru($_POST[jvs])=="jf"){
 zwzr();
 $txt=sqlzhuru1($_POST[content]);
 if(empty($txt)){Audit_alert("�����������ݲ���Ϊ�գ��������ԣ�","orderjf1kf.php?orderbh=".$orderbh);}
 intotable("epzhu_orderlogkf","orderbh,userid,selluserid,admin,txt,sj","'".$orderbh."',".$row[userid].",".$row[selluserid].",1,'".$txt."','".$sj."'");
 php_toheader("orderjf1kf.php?orderbh=".$orderbh); 

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/order.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>

<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>

<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/userepzhucom.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ���׹�ͨ��¼</li>
</ul>
<? $leftid=2;include("leftkf.php");?>

<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0">��ѡ��</li>
 <li class="g_ac0_h g_bc0_h">��������</li>
 <li class="l1"><a href="orderkf.php">�ҵĶ���</a></li>
 </ul>
 <? include("ordervkf.php");?>
 
 <div class="jfgtlist">
  <div class="cap">&nbsp;&nbsp;��ͨ��¼</div>
  <ul class="u1 u0">
  <li class="l1"><img src="<?=returntppd("../upload/".$row[userid]."/user.jpg","img/nonetx.gif")?>" width="40" height="40" /></li>
  <li class="l2">[��] <?=$row[tkly]?><br><?=$row[tksj]?></li>
  </ul>
  <ul class="u1">
  <li class="l1"><img src="<?=returntppd("../upload/".$row[selluserid]."/user.jpg","img/nonetx.gif")?>" width="40" height="40" /></li>
  <li class="l2">[����] <?=$row[tkjg]?><br><?=$row[tkoksj]?></li>
  </ul>
  <? 
  while1("*","epzhu_orderlogkf where orderbh='".$orderbh."' and userid=".$userid." order by sj asc");while($row1=mysql_fetch_array($res1)){
  $txt=$row1[txt];
  if($row1[admin]==1){$tp=returntppd("../upload/".$row1[userid]."/user.jpg","img/nonetx.gif");$sf="��";}
  elseif($row1[admin]==2){$tp=returntppd("../upload/".$row1[useridhf]."/user.jpg","img/nonetx.gif");$sf="����";}
  elseif($row1[admin]==3){$tp="img/nonetx.jpg";$sf="ƽ̨";}
  ?>
  <ul class="u1">
  <li class="l1"><img src="<?=$tp?>" width="40" height="40" /></li>
  <li class="l2">[<?=$sf?>] <?=$txt?><br><?=$row1[sj]?></li>
  </ul>
  <? }?>
 </div>
 
 <? if($row[ddzt]=="jf"){?>
 <script language="javascript">
 function tj(){
 if(confirm("ȷ��Ҫ�ύ����������")){}else{return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="orderjf1kf.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1">
 <strong>* վ����ʾ��</strong><br>
 * <span class="red">��ƽ̨������׹����У������Լ����ύ�������������֤��</span><br>
 </li>
 <li class="l5"><script id="editor" name="content" type="text/plain" style="width:856px;height:380px;"><?=$row[txt]?></script></li>
 <li class="l4"><?=tjbtnr("�ύ����")?></li>
 </ul>
 <input type="hidden" value="jf" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
<script language="javascript">
//ʵ�����༭��
var ue= UE.getEditor('editor'
, {
            toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
                'removeformat', 'formatmatch' ,'|', 'forecolor',
                 'fontsize', '|',
                'link', 'unlink',
                'insertimage', 'emotion', 'attachment']
        ]
        });
</script>
</body>
</html>