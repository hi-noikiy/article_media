<?
include("../config/conn.php");//二次开发联系QQ:120036745//二-次开-发-联-系QQ:12-00-36-745
include("../config/function.php");
?>

<div class="bottom">
	<div class="main">
		<div class="footer">
			<div class="footer-nav left">
			 <? while1("*","epzhu_helptype where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>

					<dl>
						<dt><?=$row1[name1]?></dt>
						<dd>
						 <? 
 while2("*","epzhu_helptype where admin=2 and name1='".$row1[name1]."' order by xh asc limit 5");while($row2=mysql_fetch_array($res2)){
 $aurl="search_j".$row1[id]."v_k".$row2[id]."v.html";
 if(returncount("epzhu_help where ty1id=".$row1[id]." and ty2id=".$row2[id])==1){
 while3("id,ty1id,ty2id","epzhu_help where ty1id=".$row1[id]." and ty2id=".$row2[id]);$row3=mysql_fetch_array($res3);
 $aurl="view".$row3[id].".html";
 }
 ?>
<p><a href="<?=weburl?>help/<?=$aurl?>" target="_blank" rel="nofollow"><?=$row2[name2]?></a></p>
<? }?>
</dd>
</dl>
<? }?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
				
			</div>
			<div class="footer-contact">
					<div class="left">

						<b>管理客服</b>
											<?
$qq=preg_split("/,/",$rowcontrol[webqqv]);
for($qqi=0;$qqi<count($qq);$qqi++){
$qv=preg_split("/\*/",$qq[$qqi]);
if($qv[0]!=""){
if($qv[1]==""){$qtit="网站客服";}else{$qtit=$qv[1];}
?>
						
<?
}
}
?>						
	<p>Q Q：<a style='color: #007de4;'title="联系客服QQ" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$qv[0]?>&site=<?=weburl?>&menu=yes"><?=$qv[0]?></a></p>

	<p>电话：<?=$rowcontrol[webtelv]?></p>
	<p>邮箱：<?=$qv[0]?>@qq.com</p>
	<p>时间：24 x 7 周六日无休息</p>
	</div>
	<span><img src="../img/ewm.jpg" width="100" height="100" /></span>	
	<p>&nbsp;&nbsp;官方微信公众号</p>
	</div>
	</div>
		</div>
		<div class="footer-link">
				<div class="footer-link-a left">
					<p><a href="<?=weburl?>help/aboutview2.html" target="_blank" rel="nofollow">关于我们</a>  
					<a href="<?=weburl?>help/aboutview3.html" target="_blank" rel="nofollow">广告合作</a> 
					<a href="<?=weburl?>help/aboutview4.html" target="_blank" rel="nofollow">联系我们</a> 
					<a href="<?=weburl?>help/aboutview5.html" target="_blank" rel="nofollow">隐私条款</a> 
					<a href="<?=weburl?>help/aboutview6.html" target="_blank" rel="nofollow" title=6>免责声明</a> <em>我们致力于草根站长</em><em>&nbsp;&nbsp;&nbsp; 2013-2018 <?=webname?> 版权所有！&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</em> </p>
					<cite><?=webname?> www.yizhanw.com 网站备案号：<?=$rowcontrol[beian]?></cite>
				</div>
				<div class="footer-link-i">
				 <img src="../img/sm_124x47.png" height="40"></a>
				 <img src="../img/hangye_bottom_small.png"></a>
				 <img src="../img/kx_124x47.jpg" height="40"></a>
				 <img src="../img/cert_40_1.png" height="40"></a>
				 <img src="../img/yd_124x47.jpg" height="40"></a>
				</div>
			</div>

	</div>
</div>

