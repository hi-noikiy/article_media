<?
include("../config/conn.php");//���ο�����ϵQQ:120036745//��-�ο�-��-��-ϵQQ:12-00-36-745
include("../config/function.php");
?>
<div class="header">	
<div class="general">
<div class="main">
<li style=" position: relative; float: left; background: #fff; width: 216px; height: 158px; top: -50px; left: -8px; box-shadow: 0 -6px 10px rgba(0,0,0,.2); "> </li>
<li class="logo"><a href="<?=weburl?>"></a></li>
	<li class="search Search-box" onmouseover="topover()" onmouseout="topout()">
	<span class="searchtype">��Դ��</span><i></i>
	<form name="topf1" method="post" onsubmit="return topftj()">
	<input  name="topt" id="topt" type="text" class="searchval Search-inp"/>
	<input type="image" src="<?=weburl?>homeimg/so.png">
	<ul class="searchlist" style="display:none;"> 
	<li data='serve'>  <a href="javascript:void();" onclick="topjconc(1,'��Դ��')">��Դ��</a></li>
	<li data='domain'> <a href="javascript:void();" onclick="topjconc(2,'�ѿ���')">�ѿ���</a></li> 
   <li data='domain1'> <a href="javascript:void();" onclick="topjconc(10,'������')">������</a></li> 
	

    </ul>
    </form>
    </li>	
    <li class="t_ads">
    <? adread("ADI05",235,60)?>
    </li>
	</div>
	</div>
	  <div class="yizhanwdaohang">
    <div class="nav1">
    <div class="main">
    <ul class="navlist">
    <a href="<?=weburl?>" class="first cur">��ҳ</a>
    <? while1("*","epzhu_ad where adbh='ADI02' and type1='����' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
    <a href="<?=$row1[aurl]?>"><?=$row1[tit]?></a>
    <? }?>
	 <cite>
	 <a href="<?=weburl?>help/ggview13.html" target="_blank">�ֳ��ƹ�</a>
	 <a href="<?=weburl?>help/ggview14.html" target="_blank">VIP��Ȩ��</a>
	 </cite>
	 </ul>
		</div>
	</div>
</div></div>
<!--ͷ��-->
