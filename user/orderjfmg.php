<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/functionmg.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
$sj=date("Y-m-d H:i:s");
while0("*","epzhu_ordermg where orderbh='".$orderbh."' and ddzt='backerr' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("ordermg.php");}

if(sqlzhuru($_POST[jvs])=="jf"){
 zwzr();
 $txt=sqlzhuru1($_POST[content]);
 if(empty($txt)){Audit_alert("�����������ݲ���Ϊ�գ��������ԣ�","orderjfmg.php?orderbh=".$orderbh);}
 intotable("epzhu_ordermglogkf","orderbh,userid,selluserid,admin,txt,sj","'".$orderbh."',".$row[userid].",".$row[selluserid].",1,'".$txt."','".$sj."'");
 updatetable("epzhu_ordermg","ddzt='jf' where orderbh='".$orderbh."'");
 deletetable("epzhu_dbkf where orderbh='".$orderbh."' and userid=".$userid);
 deletetable("epzhu_tkkf where orderbh='".$orderbh."' and userid=".$userid);
 php_toheader("orderviewmg.php?orderbh=".$orderbh); 

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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ����ͷ�����</li>
</ul>
<? $leftid=2;include("leftmg.php");?>

<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0">��ѡ��</li>
 <li class="g_ac0_h g_bc0_h">��������</li>
 <li class="l1"><a href="ordermg.php">�ҵĶ���</a></li>
 </ul>
 <? include("ordervmg.php");?>
 
 <script language="javascript">
 function tj(){
 if(confirm("ȷ��Ҫ����ͷ�������")){}else{return false;}
 layer.msg('�����ύ����', {icon: 16  ,time: 0,shade :0.25});
 f1.action="orderjfmg.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1">
 <strong>* վ����ʾ��</strong><br>
 * <span class="red">����ͷ�����󣬶����ʽ𽫱�������ƽ̨��ֱ��ƽ̨�����걾�ξ���</span><br>
 * �ṩ��ϸ���˿��������ɣ����Ҹ���ͼƬ������������ƽ̨�����ξ��ף����״�������У�������ʱ�������ݡ�
 </li>
 <li class="l5"><script id="editor" name="content" type="text/plain" style="width:856px;height:380px;"><?=$row[txt]?></script></li>
 <li class="l4"><?=tjbtnr("����ͷ�����")?></li>
 </ul>
 <input type="hidden" value="jf" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>

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