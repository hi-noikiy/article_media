<?php
include("../config/conn.php");//二次开发联系QQ:120036745//二-次开-发-联-系QQ:12-00-36-745
include("../config/function.php");
$type1id=$_GET[type1id];$type2id=$_GET[type2id];
if(!is_numeric($type1id)){$type1id=0;}
if(!is_numeric($type2id)){$type2id=0;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>选择商品分类</title>
<link href="../css/pty.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function type3cx(a,b){
parent.ptype4.location="../tem/protype4.php?type1id=<?=$type1id?>&type2id=<?=$type2id?>&type3id="+a;
parent.document.f1.type3id.value=a;
parent.document.getElementById("type3name").innerHTML=b+" >> ";;
parent.document.f1.type4id.value=0;
parent.document.getElementById("type4name").innerHTML="";
parent.document.f1.type5id.value=0;
parent.document.getElementById("type5name").innerHTML="";
}
</script>
</head>
<body>
 <? 
 if($type2id!=0){
 $type1name=returntype(1,$type1id);
 $type2name=returntype(2,$type2id);
 ?>
 <!--begin-->
  <div class="ptype2">
  <a href="javascript:void(0);" class="a1"><?=$type2name?> <img border="0" src="../img/jiandown.gif" width="7" height="4" /></a>
   <?
   while0("*","epzhu_type where type1='".$type1name."' and type2='".$type2name."' and admin=3 order by xh asc");while($row=mysql_fetch_array($res)){
   ?>
   <a href="javascript:type3cx(<?=$row[id]?>,'<?=$row[type3]?>');" class="a2"><?=$row[type3]?></a>
   <?
   }
   ?>
  </div>
 <!--end-->
 <? }?>
</body>
</html>