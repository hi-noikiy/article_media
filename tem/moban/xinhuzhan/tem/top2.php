<?
include("../config/conn.php");
include("../config/function.php");
?>
<!--ͷ��-->
<div class="main">
<div class="index_top">
<div class="t_left">
<div class="sidebar">
  <div class="sidebar_top"></div>
    <dl class="sidebar_item"style="background: url(/images/user-bg.png) center 0 no-repeat;">
      <dd  id="1">
       <div class="sidebar_menu" ><h3><i class='iconfont'>&#xe62c;</i><a href="<?=weburl?>product/search.html">��վԴ��</a></h3>
	   <p><a href="<?=weburl?>user/productlx.php">����Ʒ</a> <a href="<?=weburl?>product/">����Ʒ</a>   <a href="<?=weburl?>product/">�鿴����</a></p>
	  </div>
      <div class="sidebar_popup"  style="display: none;">
      <div class="sidebar_popup_con clearfix">
	  <div class="type"><div class="ht"> </div><a href="/code">�� <strong class="feng"><?=returncount("epzhu_pro where zt=0 and ifxj=0")?></strong> ������</a></div>
	  <? while1("*","epzhu_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
      <ul> 
	  <li class="att"><?=$row1[type1]?></li>
      <li class="con">
	  <? while2("*","epzhu_type where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>product/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?>   </ul>
	  <div class="type"><div class="ht"> </div><a href="/">��ƽ̨�Ƽ�</a></div>
      <ul>
	    <li class="att">����Ƽ�</li>
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
      <div class="sidebar_menu" ><h3><i class="iconfont">�}</i><a href="/">ƴ������</a></h3>
	  <p><a href="/">Դ��</a> <a href="/">����</a>   <a href="/">���</a>  <a href="/">���</a> </p>
	  </div>
      <!-- ������ -->
      <div class="sidebar_popup" style="display: none; ">
      <div class="sidebar_popup_con clearfix">
	   <div class="type"><div class="ht"> </div><a href="/code">�� <strong class="feng"><?=returncount("epzhu_proyy where zt=0 and ifxj=0")?></strong> ������</a></div>
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
      <div class="sidebar_menu" ><h3><i class='iconfont' style='font-size:30px;'>&#xe622;</i><a href="/">��������</a></h3>
	  <p><a href="/">����</a> <a href="/">���</a>   <a href="/">BUG</a>  <a href="/">ά��</a> </p>
	  </div>
      <!-- ������ -->
      <div class="sidebar_popup" style="display: none; ">
      <div class="sidebar_popup_con clearfix">
	   <div class="type"><div class="ht"> </div><a href="/code">�� <strong class="feng"><?=returncount("epzhu_prokf where zt=0 and ifxj=0")?></strong> ������</a></div>
      <ul>
	 <? while1("*","epzhu_typekf where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
    
	  <li class="att"><?=$row1[type1]?></li>
      <li class="con">
	  <? while2("*","epzhu_typekf where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
	  <a href="<?=weburl?>productkf/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html"><?=$row2[type2]?></a>
	  <? }?>
      </li>
      </ul><div class="type"><div class="ht"> </div><a href="/">��ƽ̨�Ƽ�</a></div>
      <ul>
	    <li class="att">�����Ƽ�</li>
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
  <h3><i class='iconfont' style='font-size:30px;'><img src="/images/1211.png" width="33" height="30"></i><a href="/">�������</a></h3>
  <p><a href="/">LOGO</a> <a href="/">���ͼ</a>  <a href="/">����</a>
	  </div>
      <!-- ������ -->
      <div class="sidebar_popup" style="display: none; ">
      <div class="sidebar_popup_con clearfix">
	   <div class="type"><div class="ht"> </div><a href="/code">�� <strong class="feng"><?=returncount("epzhu_promg where zt=0 and ifxj=0")?></strong> ������</a></div>
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
      <div class="sidebar_menu" ><h3><i class='iconfont' style='font-size:30px;'>&#xe62e;</i><a href="/">��������</a></h3>
	  <p><a href="/">����</a> <a href="/">������</a> <a href="/">������</a> </p>
	  </div>
      <!-- ������ -->
      <div class="sidebar_popup" style="display: none; ">
      <div class="sidebar_popup_con clearfix">
	   <div class="type"><div class="ht"> </div><a href="/code">�� <strong class="feng"><?=returncount("epzhu_proym where zt=0 and ifxj=0")?></strong> ������</a></div>
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
      <div class="sidebar_menu" > <h3><i class='iconfont'>&#xe62d;</i><a href="<?=weburl?>task/">�������</a></h3>
	  <p><a href="user/taskhflist.php">������</a> <a href="task/taskadd.php">������</a></p>
	  </div>
      <!-- ������ -->
      <div class="sidebar_popup" style="display: none; ">
      <div class="sidebar_popup_con clearfix"  >
	  <div class="type"><div class="ht"> </div><a href="//task.huzhan.com/">�������</a></div>
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
   <!--��������������-->
   </div> 
