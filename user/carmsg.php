<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//���ο�����ϵQQ:120036745
include("../config/functionmg.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$id=$_GET[id];
while0("*","epzhu_carmg where id=".$id." and userid=".$userid);if(!$row=mysql_fetch_array($res)){Audit_alert("·������","carmg.php",".parent");}

if($_GET[control]=="update"){
 $sj=date("Y-m-d H:i:s");	
 updatetable("epzhu_carmg","bz='".sqlzhuru1($_POST[content])."' where id=".$id." and userid=".$userid);
 php_toheader("carmsg.php?t=suc&id=".$id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���ﳵ����</title>
<style type="text/css">
body{margin:0;font-size:12px;text-align:left;color:#333;word-wrap:break-word;font-family:"Microsoft YaHei",΢���ź�,"MicrosoftJhengHei",����ϸ��,STHeiti,MingLiu;}
*{margin:0 auto;padding:0;}
ul{list-style-type:none;margin:0;padding:0;}
.red{color:#ff0000;}
.uk{float:left;width:590px;font-size:14px;padding:10px;}
.uk li{float:left;}
.uk .l0{width:590px;height:30px;}
.uk .l0 img{border:#f2f2f2 solid 1px;margin:0 10px;}
.uk .l1{width:590px;height:372px;}
.uk .l2{width:590px;height:55px;padding:13px 0 0 0;}
.uk .l2 input{cursor:pointer;float:left;width:590px;border:0;font-weight:700;color:#fff;background-color:#ff6600;height:35px;}
</style>
<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>

<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="../js/layui.js"></script>
<script language="javascript" src="../js/common.js"></script>
<script language="javascript">
function tj(){
layer.msg('���ڱ���', {icon: 16  ,time: 0,shade :0.25});
f1.action="carmsg.php?control=update&id=<?=$id?>";
}
<? if($_GET["t"]=="suc"){?>
parent.document.getElementById("text<?=$row[id]?>").value="<?=strip_tags($row[bz])?>";
var index = parent.layer.getFrameIndex(window.name); //��ȡ��������
parent.layer.close(index);
<? }?>
</script>
</head>
<body>
<form name="f1" method="post" onsubmit="return tj()">
<input type="hidden" value="carmsg" name="jvs" />
<ul class="uk">
<li class="l0">��ʾ�����<img src="img/fj.gif" />�����ϴ�����Ŷ(zip��rar���ļ�)</li>
<li class="l1"><script id="editor" name="content" type="text/plain" style="width:590px;height:320px;"><?=$row[bz]?></script></li>
<li class="l2"><?=tjbtnr("����")?></li>
</ul>
</form>
<script language="javascript">
//ʵ�����༭��
var ue= UE.getEditor('editor'
, {
            toolbars:[
            [
                'link',
                'insertimage', 'attachment']
        ]
        });
</script>
</body>
</html>