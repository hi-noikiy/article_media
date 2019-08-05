<?
include("../config/conn.php");
include("../config/function.php");
?>
<!--头部-->
<div class="main">
<div class="index_top">
<div class="t_left">
<div class="sidebar">
  <div class="sidebar_top"></div>
    <dl class="sidebar_item"style="background: url(/images/user-bg.png) center 0 no-repeat;">
      <dd  id="1">
       <div class="sidebar_menu" ><h3><i class='iconfont'>&#xe62c;</i><a href="<?=weburl?>product/search.html">网站源码</a></h3>
	   <p><a href="<?=weburl?>user/productlx.php">卖商品</a> <a href="<?=weburl?>product/">找商品</a>   <a href="<?=weburl?>product/">查看更多</a></p>
	  </div>
      <div class="sidebar_popup"  style="display: none;">
      <div class="sidebar_popup_con clearfix">
	  <div class="type"><div class="ht"> </div><a href="/code">共 <strong class="feng"><?=returncount("epzhu_pro where zt=0 and ifxj=0")?></strong> 件宝贝</a></div>
	  <? while1("*","epzhu_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
      <ul> 
	  <li class="att"><?=$row1[type1]?></li>
      <li class="con">
	  <? while2("*","epzhu_type where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>product/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?>   </ul>
	  <div class="type"><div class="ht"> </div><a href="/">本平台推荐</a></div>
      <ul>
	    <li class="att">广告推荐</li>
	  <li class="con">
	   <? autoAD("ADKK1");while0("*","epzhu_ad where adbh='ADKK1' and zt=0 order by xh asc limit 30");while($row=mysql_fetch_array($res)){?>
      <a href="<?=$row[aurl]?>" target="_blank" rel="nofollow"><img alt="<?=$row[tit]?>" border=0 src="gg/<?=$row[bh]?>.<?=$row[jpggif]?>" width="110" height="38"></a>
	  <? }?>
      </li>
      </ul>
      <? }?>
      </div>
      </div>

	   
       <dd id="3">
      <div class="sidebar_menu" ><h3><i class="iconfont"></i><a href="/">拼团组团</a></h3>
	  <p><a href="/">源码</a> <a href="/">开发</a>   <a href="/">插件</a>  <a href="/">软件</a> </p>
	  </div>
      <!-- 弹出层 -->
      <div class="sidebar_popup" style="display: none; ">
      <div class="sidebar_popup_con clearfix">
	   <div class="type"><div class="ht"> </div><a href="/code">共 <strong class="feng"><?=returncount("epzhu_proyy where zt=0 and ifxj=0")?></strong> 件宝贝</a></div>
      <ul>
	 <? while1("*","epzhu_typeyy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
     </ul> <ul>
	  <li class="att"><?=$row1[type1]?></li>
      <li class="con">
	  <? while2("*","epzhu_typeyy where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>productyy/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?>
      </li>
      <? }?>
      </div>
      </div>
      <dd id="2">
      <div class="sidebar_menu" ><h3><i class='iconfont' style='font-size:30px;'>&#xe622;</i><a href="/">技术服务</a></h3>
	  <p><a href="/">开发</a> <a href="/">搬家</a>   <a href="/">BUG</a>  <a href="/">维护</a> </p>
	  </div>
      <!-- 弹出层 -->
      <div class="sidebar_popup" style="display: none; ">
      <div class="sidebar_popup_con clearfix">
	   <div class="type"><div class="ht"> </div><a href="/code">共 <strong class="feng"><?=returncount("epzhu_prokf where zt=0 and ifxj=0")?></strong> 件宝贝</a></div>
      <ul>
	 <? while1("*","epzhu_typekf where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
    
	  <li class="att"><?=$row1[type1]?></li>
      <li class="con">
	  <? while2("*","epzhu_typekf where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>productkf/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?>
      </li>
      </ul><div class="type"><div class="ht"> </div><a href="/">本平台推荐</a></div>
      <ul>
	    <li class="att">优质推荐</li>
	  <li class="con">
	   <? autoAD("ADKK2");while0("*","epzhu_ad where adbh='ADKK2' and zt=0 order by xh asc limit 30");while($row=mysql_fetch_array($res)){?>
      <a href="<?=$row[aurl]?>" target="_blank" rel="nofollow"><img alt="<?=$row[tit]?>" border=0 src="gg/<?=$row[bh]?>.<?=$row[jpggif]?>" width="110" height="38"></a>
	  <? }?>
      </li>  
      <? }?>
      </div>
      </div>
       <dd id="3">
      <div class="sidebar_menu" >
  <h3><i class='iconfont' style='font-size:30px;'><img src="/images/1211.png" width="33" height="30"></i><a href="/">美工设计</a></h3>
  <p><a href="/">LOGO</a> <a href="/">广告图</a>  <a href="/">创意</a>
	  </div>
      <!-- 弹出层 -->
      <div class="sidebar_popup" style="display: none; ">
      <div class="sidebar_popup_con clearfix">
	   <div class="type"><div class="ht"> </div><a href="/code">共 <strong class="feng"><?=returncount("epzhu_promg where zt=0 and ifxj=0")?></strong> 件宝贝</a></div>
      <ul>
	 <? while1("*","epzhu_typemg where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
     </ul> <ul>
	  <li class="att"><?=$row1[type1]?></li>
      <li class="con">
	  <? while2("*","epzhu_typemg where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>productmg/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?>
      </li>
      <? }?>
      </div>
      </div>
       <dd id="3">
      <div class="sidebar_menu" ><h3><i class='iconfont' style='font-size:30px;'>&#xe62e;</i><a href="/">域名交易</a></h3>
	  <p><a href="/">域名</a> <a href="/">代备案</a> <a href="/">阿里云</a> </p>
	  </div>
      <!-- 弹出层 -->
      <div class="sidebar_popup" style="display: none; ">
      <div class="sidebar_popup_con clearfix">
	   <div class="type"><div class="ht"> </div><a href="/code">共 <strong class="feng"><?=returncount("epzhu_proym where zt=0 and ifxj=0")?></strong> 件宝贝</a></div>
      <ul>
	 <? while1("*","epzhu_typeym where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
     </ul> <ul>
	  <li class="att"><?=$row1[type1]?></li>
      <li class="con">
	  <? while2("*","epzhu_typeym where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>productkf/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?>
      </li>
      <? }?>
      </div>
      </div>
	  

      <dd id="4">
      <div class="sidebar_menu" > <h3><i class='iconfont'>&#xe62d;</i><a href="<?=weburl?>task/">任务大厅</a></h3>
	  <p><a href="user/taskhflist.php">接任务</a> <a href="task/taskadd.php">发任务</a></p>
	  </div>
      <!-- 弹出层 -->
      <div class="sidebar_popup" style="display: none; ">
      <div class="sidebar_popup_con clearfix"  >
	  <div class="type"><div class="ht"> </div><a href="//task.huzhan.com/">任务大厅</a></div>
	  <? while1("*","epzhu_tasktype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
      <ul>
	  <li class="att"><?=$row1[name1]?></li>
      <li class="con">
	  <? while2("*","epzhu_tasktype where admin=2 and name1='".$row1[name1]."' order by xh asc");while($row2=mysql_fetch_array($res2)){?>
      <a href="<?=weburl?>task/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[name2]?></a>
      <? }?>
      </li>
      </ul>
	  <? }?>
      </div>
      </div>
   </div>
   <!--主导航下拉结束-->
   </div> 
