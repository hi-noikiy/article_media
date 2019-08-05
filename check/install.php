
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>安装弹窗</title>
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
{Audit_alert("您举报的信息不存在或审核未通过！".$type,"/");}
$lxr=user($row[ubh],'name','sell');
$typename=split("\/",type($row[typesxid],"源码类型|开发语言|数据库|系统品牌","code"));
$reporturl=$weburl.$type."/goods".$row[id].".html";
if($_POST[jvs]=="add"){
intotable("shop_jy","sj,uip,txt,uqq,ifread,type,uemail,reason,url,user","'".$sj."','".$uip."','".sqlzhuru($_POST[message])."','".sqlzhuru($_POST[qq])."',0,2,'".sqlzhuru($_POST[email])."','".sqlzhuru($_POST[report_reason])."','".sqlzhuru($_POST[url])."','".sqlzhuru($_POST[user])."'");//新建
echo "<script>
$(document).ready(function() {
	layer.alert('您的举报已提交，我们会尽快处理', 1, '确定', function(){
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
	<td class="tyn">商品<br>信息
	</td>
	<td>
		<table class="table2">
	<tbody><tr>
		<td class="nm1">商品名称</td>
		<td><span><a href="/code/goods<?=$row[id]?>.html" style="color:#247FBD" target="_blank"><?=$row[tit]?></a></span></td>
	</tr>
		<tr>
		<td class="nm1">安装服务</td>
	<td class="ly_aztisp">
		<font color="#ff0000">￥<?=$row[azfy]?></font>（<font class="ly_azzt" color="#999999">需额外支付费用，可选服务</font>）	</td>
	</tr>
	</tbody></table>
	</td>
</tr>
<tr>
		<td class="tyn">运行<br>环境
	</td>
	<td>
<table class="table2">
<tbody><tr><td class="nm1">开发语言</td><td><?=$typename[3]?></td></tr><tr><td class="nm1">数据库</td><td><?=$typename[4]?></td></tr></tbody></table></td></tr><tr><td class="tyn">主机<br>环境
	</td><td><table class="table2"><tbody><tr><td class="nm1">主机类型</td><td><?=$row[azzj]?></td></tr><tr><td class="nm1">操作系统</td><td><?=$row[azxt]?></td></tr><tr><td class="nm1">web服务</td><td><?=$row[azhj]?></td></tr></tbody></table>
	</td>
</tr>
<tr>
	<td class="tyn">其他<br>说明
	</td>
	<td>
		<table class="table2">
			<tbody><tr><td class="nm1">卖家附言</td><td style="color:#000"><?=$row[azbz]?></td></tr><tr>
		<td class="nm1">安装方式</td>
	<td><?=$row[azfs]?></td>

	</tr>
	</tbody></table>
	</td>
</tr>
</tbody></table>


  <div class="ins_notes">
	<li> <h3>注意事项及说明：</h3></li>
<li><b>1.</b>【安装服务】需收费时，可在购物车结算中，自行选择是否需要购买该服务；</li>
<li><b>2.</b>【主机环境】非该商品仅支持的环境，而是卖家技术能力范围内可提供安装服务的环境；</li>
<li><b>3.</b> 对于未购买安装服务的交易，可在交易中追加购买安装服务；</li>
<li><b>4.</b> 免费或购买收费安装，而无法提供上述要求环境，即代表自愿放弃安装服务。</li>

	 </div>
  </div>


<span class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close1" href="javascript:;"></a></span><span class="layui-layer-resize"></span></div>

</body>
</html>