<?
include("../config/conn.php");//二次开发联系QQ:120036745//二次开发联系QQ:120036745
include("../config/function.php");//二-次开-发-联-系Q-Q:12-00-3674-5
while1("*","epzhu_tp where bh='".$_GET[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){$tp="../".str_replace(".","-2.",$row1[tp]);
?>
<div class="d1">
<a href="../<?=$row1[tp]?>" class="a1" target="_blank"><img class="img" border="0" src="<?=$tp?>" /></a>
<a href="javascript:void(0);" class="a2" onClick="deltp('<?=$row1[id]?>')"><img src="img/delbtn.png" /></a>
</div>
<? }?>
