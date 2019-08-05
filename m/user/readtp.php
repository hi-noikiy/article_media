<?
include("../../config/conn.php");
include("../../config/function.php");
$admin=intval($_GET[admin]);
$sqluser="select * from epzhu_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){exit;}
$userid=$rowuser[id];
?>

<? if($admin==1){if(is_file("../../upload/".$userid."/shop.jpg")){?>
<div class="d1">
<img class="img" border="0" src="../../upload/<?=$userid?>/shop.jpg" />
<a href="javascript:void(0);" class="a2" onClick="deltp()"><img src="img/delbtn.png" /></a>
</div>

<? }}elseif($admin==2){if(is_file("../../upload/".$userid."/user.jpg")){?>
<div class="d1">
<img class="img" border="0" src="../../upload/<?=$userid?>/user.jpg" />
<a href="javascript:void(0);" class="a2" onClick="deltp()"><img src="img/delbtn.png" /></a>
</div>

<? }}elseif($admin==3){$tp="../../upload/".$userid."/".strgb2312($rowuser[sfz],0,15)."-1".".jpg";if(is_file($tp)){?>
<div class="d1">
<img class="img" border="0" src="<?=$tp?>" />
<a href="javascript:void(0);" class="a2" onClick="deltp()"><img src="img/delbtn.png" /></a>
</div>
<? }}elseif($admin==4){$tp="../../upload/".$userid."/".strgb2312($rowuser[sfz],0,15)."-2".".jpg";if(is_file($tp)){?>
<div class="d1">
<img class="img" border="0" src="<?=$tp?>" />
<a href="javascript:void(0);" class="a2" onClick="deltp()"><img src="img/delbtn.png" /></a>
</div>
<? }}elseif($admin==5){$tp="../../upload/".$userid."/".strgb2312($rowuser[sfz],0,15)."-3".".jpg";if(is_file($tp)){?>
<div class="d1">
<img class="img" border="0" src="<?=$tp?>" />
<a href="javascript:void(0);" class="a2" onClick="deltp()"><img src="img/delbtn.png" /></a>
</div>

<? }}elseif($admin==6){?>
<?
while1("*","epzhu_tp where bh='".$_GET[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){$tp="../../".str_replace(".","-2.",$row1[tp]);
?>
<div class="d1">
<a href="../../<?=$row1[tp]?>" class="a1" target="_blank"><img class="img" border="0" src="<?=$tp?>" /></a>
<a href="javascript:void(0);" class="a2" onClick="deltp('<?=$row1[id]?>')"><img src="img/delbtn.png" /></a>
</div>
<? }?>

<? }?>
