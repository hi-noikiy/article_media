<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//��-�ο�-��-��-ϵQQ:12-00-36-745
include("../config/function.php");
?>
<!--ͷ��-->
<div class="main">
<div class="index_top">
<div class="t_left">
<div class="sidebar">
  <div class="sidebar_top">���ֱͨ��</div>
    <dl class="sidebar_item">
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


      <dd id="2">
      <div class="sidebar_menu" ><h3><i class='iconfont' style='font-size:30px;'>&#xe622;</i><a href="/">��������</a></h3>
	  <p><a href="/">App����</a> <a href="/">���</a>   <a href="/">BUG</a>  <a href="/">ά��</a> </p>
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
      <div class="sidebar_menu" ><h3><i class='iconfont' style='font-size:30px;'>&#xe62e;</i><a href="/">��������</a></h3>
	  <p><a href="/">����</a> <a href="/">δ����</a>   <a href="/">�ѱ���</a>  <a href="/">������</a> </p>
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
	  <p><a href="user/taskhflist.php">������</a> <a href="task/taskadd.php">������</a> <a href="<?=weburl?>user/tasklist.php">�ҵ�����</a> </p>
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
	  <dd id="5">
      <div class="sidebar_menu"> <h3><i class='iconfont'>&#xe623;</i><a href="<?=weburl?>user/">��Ա����</a></h3>
	  <p><a href="<?=weburl?>user/"></a> <a href="<?=weburl?>user/">�����ҵĻ�Ա����</a>
	  </div>
      <!-- ������ -->
      <div class="sidebar_popup"  style="display: none; ">
      <div class="sidebar_popup_con clearfix" >
	  <div class="type"><div class="ht"> </div><a href="<?=weburl?>user/">�������</a></div>
      <ul>
	  <li class="att">���ù���</li>
      <li class="con">
      <a href="<?=weburl?>user/order.php">�ҵĶ���</a>
      <a href="<?=weburl?>user/favpro.php">�ҵ��ղ�</a>
      <a href="<?=weburl?>user/car.php">���ﳵ</a>
      <a href="<?=weburl?>user/tasklist.php">�ҵ�����</a>
      </li>
      </ul>
	  <li class="att">�������</li>
      <li class="con">
      <a href="<?=weburl?>user/pay.php">��Ҫ��ֵ</a>
      <a href="<?=weburl?>user/tixian.php">��Ҫ����</a>
      <a href="<?=weburl?>user/tixianlog.php">������ϸ</a>
      <a href="<?=weburl?>user/jflog.php">������ϸ</a>
      <a href="<?=weburl?>user/zfmm.php">��ȫ������</a>
      </li>
      </ul>
	  <ul>
	  <li class="att">��������</li>
      <li class="con">
      <a href="<?=weburl?>user/inf.php">��������</a>
      <a href="<?=weburl?>user/touxiang.php">�û�ͷ��</a>
      <a href="<?=weburl?>user/mobbd.php">�ֻ���֤</a>
      <a href="<?=weburl?>user/emailbd.php">������֤</a>
      </li>
      </ul>
	  <div class="type hr"><div class="ht"> </div><a href="<?=weburl?>user/">��������</a></div>
      </li>
      </ul>
   	  <li class="att ar">��������</li>
      <li class="con cr">
      <a href="<?=weburl?>user/shop.php">��������</a>
      <a href="<?=weburl?>user/productlist.php">�ҵı���</a>
      <a href="<?=weburl?>user/sellorder.php">�ҵĶ���</a>
      </li>
      </ul>
     </div>
    </div>
    <!--��ԱE-->
   </div>
   <!--��������������-->
   </div> 
   <!--��E-->