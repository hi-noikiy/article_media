<?
include("../config/conn.php");
include("../config/function.php");
$admin=intval($_GET[admin]);
$id=intval($_GET[id]);
if(empty($admin) || empty($id)){Audit_alert("��Դ����",weburl,"parent.");}
if($admin==1){
 while0("*","epzhu_pro where id=".$id);if(!$row=mysql_fetch_array($res)){Audit_alert("��Դ����",weburl,"parent.");}
 $au="/code/goods".$row[id].".html";
 $tit=$row[tit];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��װ��������</title>
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
	<td class="tyn">��Ʒ<br>��Ϣ
	</td>
	<td>
		<table class="table2">
	<tbody><tr>
		<td class="nm1">��Ʒ����</td>
		<td><span><a href="<?=$au?>" style="color:#247FBD" target="_blank"><?=$row[tit]?></a></span></td>
	</tr>
		<tr>
		<td class="nm1">��װ����</td>
		

       
		  <? if($row[azsf]==0){?><td class="ly_aztisp"><font color="#008000">����ṩ</font><? }?>	</td>
		  <? if($row[azsf]==1){?><td class="ly_aztisp"><font color="#ff0000">��<?=$row[anzhuang]?></font>��<font class="ly_azzt" color="#999999">�����֧�����ã���ѡ����</font>��<? }?></td>
	      <td class="ly_aztisp"><font color="#008000">
		  </font></td>
		 <table class="table2">

</tbody></table></td></tr><tr>

		<td class="tyn">����<br>����
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

<td class="nm1">α��̬</td><? if($row[azwjt]==1){?><td>����Ҫ</td></tr><? }?><? if($row[azwjt]==2){?><td>��Ҫ</td></tr><? }?>
</tbody>
</table>
</td></tr><tr>
    <td class="tyn">����<br>����
	</td><td><table class="table2"><tbody>
<td class="nm1">�������� </td><td><?=$row[azzj]?></td></tr>
	<td class="nm1">����ϵͳ</td><td><?=$row[azxt]?></td></tr>
	<td class="nm1">web����</td><td><?=$row[azhj]?></td></tr>
	</tbody>
	</table>
	</td>
</tr>
<tr>
	<td class="tyn">����<br>˵��
	</td>
	<td>
		<table class="table2">
	    <tbody>
		<? if($row[azbz]==1){?>
		<tr><td class="nm1">���Ҹ���</td><td style="color:#000"><?=$row[azbz]?></td></tr>
		<? }?>
		
		<tr>
	<td class="nm1">��װ��ʽ</td><td><?=$row[azfs]?></td></tr>
	</tbody>
	</table>
	</td>
</tr>
</tbody>
</table>
<div class="ins_notes">
<h3>ע�����˵����</h3>
<li><b>1.</b>����װ�������շ�ʱ�����ڹ��ﳵ�����У�����ѡ���Ƿ���Ҫ����÷���</li>
<li><b>2.</b>�������������Ǹ���Ʒ��֧�ֵĻ������������Ҽ���������Χ�ڿ��ṩ��װ����Ļ�����</li>
<li><b>3.</b> ����δ����װ����Ľ��ף����ڽ�����׷�ӹ���װ����</li>
<li><b>4.</b> ��ѻ����շѰ�װ�����޷��ṩ����Ҫ�󻷾�����������Ը������װ����</li>
	 </div>
  </div>





</body>
</html>