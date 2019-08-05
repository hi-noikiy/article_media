<?
include("../config/conn.php");
include("../config/function.php");
$admin=intval($_GET[admin]);
$id=intval($_GET[id]);
if(empty($admin) || empty($id)){Audit_alert("来源错误！",weburl,"parent.");}
if($admin==1){
 while0("*","epzhu_pro where id=".$id);if(!$row=mysql_fetch_array($res)){Audit_alert("来源错误！",weburl,"parent.");}
 $au="/code/goods".$row[id].".html";
 $tit=$row[tit];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>安装服务详情</title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>

</head>
<body>


<div class="ly_ins">
<table class="table1">
<tbody><tr>
	<td class="tyn">商品<br>信息
	</td>
	<td>
		<table class="table2">
	<tbody><tr>
		<td class="nm1">商品名称</td>
		<td><span><a href="<?=$au?>" style="color:#247FBD" target="_blank"><?=$row[tit]?></a></span></td>
	</tr>
		<tr>
		<td class="nm1">安装服务</td>
		

       
		  <? if($row[azsf]==0){?><td class="ly_aztisp"><font color="#008000">免费提供</font><? }?>	</td>
		  <? if($row[azsf]==1){?><td class="ly_aztisp"><font color="#ff0000">￥<?=$row[anzhuang]?></font>（<font class="ly_azzt" color="#999999">需额外支付费用，可选服务</font>）<? }?></td>
	      <td class="ly_aztisp"><font color="#008000">
		  </font></td>
		 <table class="table2">

</tbody></table></td></tr><tr>

		<td class="tyn">运行<br>环境
	</td>
	<td>
<table class="table2">
   <?
   $a=preg_split("/xcf/",$row[tysx]);$sx1arr=array();$sxall="xcf";$m=0;for($i=0;$i<=count($a);$i++){
	$ai=$a[$i];if($ai!=""){if(!is_numeric($ai)){$z1=preg_split("/:/",$ai);$ai=$z1[0];}
    while1("*","epzhu_typesx where id=".$ai);if($row1=mysql_fetch_array($res1)){if(!in_array($row1[name1],$sx1arr)){$sx1arr[$m]=$row1[name1];$m++;}
	if(!is_numeric($a[$i])){$z1=preg_split("/:/",$a[$i]);$v=$z1[1];}else{$v=$row1[name2];}$sxall=$sxall.$row1[name1].":".$v."xcf";}}}for($i=0;$i<count($sx1arr);$i++){
    ?>
<tbody><tr><td class="nm1"><?=$sx1arr[$i]?></td><td> <? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?></td></tr>
  <? }?>

<td class="nm1">伪静态</td><? if($row[azwjt]==1){?><td>不需要</td></tr><? }?><? if($row[azwjt]==2){?><td>需要</td></tr><? }?>
</tbody>
</table>
</td></tr><tr>
    <td class="tyn">主机<br>环境
	</td><td><table class="table2"><tbody>
<td class="nm1">主机类型 </td><td><?=$row[azzj]?></td></tr>
	<td class="nm1">操作系统</td><td><?=$row[azxt]?></td></tr>
	<td class="nm1">web服务</td><td><?=$row[azhj]?></td></tr>
	</tbody>
	</table>
	</td>
</tr>
<tr>
	<td class="tyn">其他<br>说明
	</td>
	<td>
		<table class="table2">
	    <tbody>
		<? if($row[azbz]==1){?>
		<tr><td class="nm1">卖家附言</td><td style="color:#000"><?=$row[azbz]?></td></tr>
		<? }?>
		
		<tr>
	<td class="nm1">安装方式</td><td><?=$row[azfs]?></td></tr>
	</tbody>
	</table>
	</td>
</tr>
</tbody>
</table>
<div class="ins_notes">
<h3>注意事项及说明：</h3>
<li><b>1.</b>【安装服务】需收费时，可在购物车结算中，自行选择是否需要购买该服务；</li>
<li><b>2.</b>【主机环境】非该商品仅支持的环境，而是卖家技术能力范围内可提供安装服务的环境；</li>
<li><b>3.</b> 对于未购买安装服务的交易，可在交易中追加购买安装服务；</li>
<li><b>4.</b> 免费或购买收费安装，而无法提供上述要求环境，即代表自愿放弃安装服务。</li>
	 </div>
  </div>





</body>
</html>