
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��װ����</title>
<?
include("../config/config.php");
include("../config/conn.php");
include("../config/function.php");
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$type=$_GET[type];
$bh=$_GET[bh];
$sql="select * from shop_".$type." where bh='".$bh."'";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);
if(!$row=mysql_fetch_array($res))
{Audit_alert("���ٱ�����Ϣ�����ڻ����δͨ����".$type,"/");}
$lxr=user($row[ubh],'name','sell');
$typename=split("\/",type($row[typesxid],"Դ������|��������|���ݿ�|ϵͳƷ��","code"));
$reporturl=$weburl.$type."/goods".$row[id].".html";
if($_POST[jvs]=="add"){
intotable("shop_jy","sj,uip,txt,uqq,ifread,type,uemail,reason,url,user","'".$sj."','".$uip."','".sqlzhuru($_POST[message])."','".sqlzhuru($_POST[qq])."',0,2,'".sqlzhuru($_POST[email])."','".sqlzhuru($_POST[report_reason])."','".sqlzhuru($_POST[url])."','".sqlzhuru($_POST[user])."'");//�½�
echo "<script>
$(document).ready(function() {
	layer.alert('���ľٱ����ύ�����ǻᾡ�촦��', 1, 'ȷ��', function(){
var index = parent.layer.getFrameIndex(window.name);
parent.layer.close(index);
});
				});
				</script>";
}
?>
<style  type="text/css">
.layui-layer-content{padding:0;background:#fff;color:#666;box-shadow:none}
</style>
<link href="/static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="/static/css/layui.css" rel="stylesheet" type="text/css" />

</head>
<div id="" class="layui-layer-content"><div class="ly_ins">
<table class="table1">
<tbody><tr>
	<td class="tyn">��Ʒ<br>��Ϣ
	</td>
	<td>
		<table class="table2">
	<tbody><tr>
		<td class="nm1">��Ʒ����</td>
		<td><span><a href="/code/goods<?=$row[id]?>.html" style="color:#247FBD" target="_blank"><?=$row[tit]?></a></span></td>
	</tr>
		<tr>
		<td class="nm1">��װ����</td>
	<td class="ly_aztisp">
		<font color="#ff0000">��<?=$row[azfy]?></font>��<font class="ly_azzt" color="#999999">�����֧�����ã���ѡ����</font>��	</td>
	</tr>
	</tbody></table>
	</td>
</tr>
<tr>
		<td class="tyn">����<br>����
	</td>
	<td>
<table class="table2">
<tbody><tr><td class="nm1">��������</td><td><?=$typename[3]?></td></tr><tr><td class="nm1">���ݿ�</td><td><?=$typename[4]?></td></tr></tbody></table></td></tr><tr><td class="tyn">����<br>����
	</td><td><table class="table2"><tbody><tr><td class="nm1">��������</td><td><?=$row[azzj]?></td></tr><tr><td class="nm1">����ϵͳ</td><td><?=$row[azxt]?></td></tr><tr><td class="nm1">web����</td><td><?=$row[azhj]?></td></tr></tbody></table>
	</td>
</tr>
<tr>
	<td class="tyn">����<br>˵��
	</td>
	<td>
		<table class="table2">
			<tbody><tr><td class="nm1">���Ҹ���</td><td style="color:#000"><?=$row[azbz]?></td></tr><tr>
		<td class="nm1">��װ��ʽ</td>
	<td><?=$row[azfs]?></td>

	</tr>
	</tbody></table>
	</td>
</tr>
</tbody></table>


  <div class="ins_notes">
	<li> <h3>ע�����˵����</h3></li>
<li><b>1.</b>����װ�������շ�ʱ�����ڹ��ﳵ�����У�����ѡ���Ƿ���Ҫ����÷���</li>
<li><b>2.</b>�������������Ǹ���Ʒ��֧�ֵĻ������������Ҽ���������Χ�ڿ��ṩ��װ����Ļ�����</li>
<li><b>3.</b> ����δ����װ����Ľ��ף����ڽ�����׷�ӹ���װ����</li>
<li><b>4.</b> ��ѻ����շѰ�װ�����޷��ṩ����Ҫ�󻷾�����������Ը������װ����</li>

	 </div>
  </div>


<span class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close1" href="javascript:;"></a></span><span class="layui-layer-resize"></span></div>

</body>
</html>