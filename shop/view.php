<?
include("../config/conn.php");//二次-开发-联系QQ:1200-36745//二-次开-发-联-系QQ:12-00-36-745
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$myweb=$_GET[str];
if(empty($myweb)){$uid=$_GET[id];$ses="id=".$uid."";}else{$ses="myweb='".$myweb."'";}
$sqluser="select * from epzhu_user where zt=1 and (shopzt=2 or shopzt=4) and ".$ses;mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("./");}
if(4==$rowuser[shopzt]){php_toheader("dqview".$rowuser[id].".html");}
$uid=$rowuser[id];
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$rowuser[shopname]?>的网上店铺 - <?=webname?></title>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<link href="<?=weburl?>shop/shop.css" rel="stylesheet" type="text/css" />
<link href="<?=weburl?>shop/css/market.css" rel="stylesheet" type="text/css" />
<link href="<?=weburl?>shop/css/basic.css" rel="stylesheet" type="text/css" />
<link href="<?=weburl?>shop/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=weburl?>shop/css/me.css" rel="stylesheet" type="text/css">
<link href="<?=weburl?>shop/css/layer.css" rel="stylesheet" type="text/css">
<script language="javascript" src="<?=weburl?>shop/js/jquery.m.js"></script>
<script language="javascript" src="<?=weburl?>shop/js/layui/layui.js"></script>
<script language="javascript" src="<?=weburl?>shop/js/common.js"></script>
<script language="javascript" src="<?=weburl?>shop/js/market.js"></script>

</head>
<body class="narrow">
<div class="yjcode"><? adwhile("ADTOP");?></div>

<? include("top2.php");?>
<? include("top.php");?>
<script language="javascript">
//document.getElementById("shopmenu1").className="a1";
</script>


<!--头部-->
<!--[if IE 6]>
<script src="//static.928vip.cn/js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script> 
<script type="text/javascript"> 
DD_belatedPNG.fix('*'); 
</script> 
<![endif]-->

<!--头部-->
 <div class="shop_goods shop_class2">

<div class="Store_slide">
<? $ses="epzhu_shopbannar where userid=".$rowuser[id]." and zt=0";if(returncount($ses)>0){?>
<!--切换B-->
<div class="banner" id="banner" >
<? $i=0;while1("*",$ses." order by xh asc");while($row1=mysql_fetch_array($res1)){?>
<a href="<?=$row1[aurl]?>" class="d1"<? if(2==$row1[targ]){?> target="_blank"<? }?> style="background:url(../upload/<?=$row1[userid]?>/shopbannar_<?=$row1[bh]?>.jpg) center no-repeat;"></a>
<? $i++;}?>
<div class="d2" id="banner_id">
<ul style="margin-left:-<?=16*$i/2?>px;">
<? for($j=0;$j<$i;$j++){?><li></li><? }?>
</ul>
</div>
</div>
</div>

 <div class="shop_goods shop_class">
 
<script type="text/javascript">banner();</script>
<!--切换E-->
<div class="bfb"></div>
<? }?>

<? include("left.php");?>
  <div class="shop_right">
<div class="shop_file ">
<ul>    
<em>店铺公告</em><div class="line"></div>
</ul>
<ul>  
<?=$rowuser[seodes]?></ul>
<!--<ul>   
<em>服务领域</em><div class="line"></div>
</ul>
<ul class="skill"> 
  <? 
  while1("*","epzhu_protype where zt=0 and admin=1 and userid=".$uid." order by xh asc");while($row1=mysql_fetch_array($res1)){
  ?>
 <span> <a href="<?=weburl?>shop/prolist_i<?=$rowuser[id]?>v_j<?=$row1[id]?>v.html"><?=$row1[name1]?></a></span>
  <? }?>
</ul>-->
<ul> 
<em>交易动态</em><div class="line"></div>
</ul>
<div class="scrollbox">
					<div id="scrollDiv" class="scroll-box" times='3000' items='2'>
    <ul style="margin-top:0;border-bottom: #CCC dashed 1px;">
   <? $i=0;while1("*","epzhu_order where (ddzt='wait' or ddzt='db' or ddzt='suc') and selluserid=".$uid." order by sj desc limit 20");while($row1=mysql_fetch_array($res1)){?>
 <li>
								<strong><?=returnnc($row1[userid])?></strong> 
								购买了<a class=ls title="<?=returntitdian($row1[tit],90)?>" 
								href="<?=weburl?>code/goods289432.html" target=_blank><?=returntitdian($row1[tit],90)?></a> 
								成交价：<font  color="#ff6600"><?=$row1[money1]?>.00元</font>
								<span style="color:#f00">[<?=returnorderzt($row1[ddzt])?>]</span>
							</li>	
   <? $i++;}?>	
 </ul>
    </div>
</div>

</div>

<div class="shop_ibox"> 
<div class="shop_ibox shop_index_tit">
<strong>推荐源码</strong> <a href='prolist_i<?=$uid?>v.html' title="查看全部商品">More></a>
</div>
<div class="shop_ibox "> 
<div class="shop_igoods igoods_big"> 
  <? 
  while1("*","epzhu_pro where userid=".$uid." and zt=0 and ifxj=0 order by lastsj desc limit 8");while($row1=mysql_fetch_array($res1)){
  $au="../product/view".$row1[id].".html";
  $tp="../".returntp("bh='".$row1[bh]."' order by iffm desc","-2");
  ?>
 <ul>
   <a href="<?=$au?>" class="pic" target="_blank">
   <img src="<?=returntppd($tp,"../img/none180x180.gif")?>">
   </a>
   <li class="sinfo">
    <a href="<?=$au?>" class="sname"title="<?=$row[tit]?>"><?=strgb2312($row1[tit],0,50)?> </a>
	<p class="sprice"><em><b>￥<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?>元</b></em>
	 
   <div class="pull-right smgray text-right mt5 ">
  
	<? if($row1[yysweb]){?><a class="btn btn-info btn-dijia  btn-diy" href="javascript:;" _title="<?=$rowuser[baomoney]?>" color="#FF0303"><span class="m1">安</span></a><? }?>
	 
	<? if($rowuser[baomoney]>0){?><a class="btn btn-warning btn-bao btn-diy" href="javascript:;" _title='该商家已加入保证金计划<br>已缴纳 &lt;b&gt;<?=$rowuser[baomoney]?>&lt;/b&gt; 元保证金' color="#FF7E00"><span class="m1">保</span></a><? }else{?><a class="btn btn-warning btn-bao btn-diy" href="javascript:;" _title='该商家没有加入保证金计划<br> &lt;b&gt;&lt;/b&gt;详细测试再下单' color="#FF7E00"><span class="m1">保</span></a><? }?>
	
	<? if($row1[fhxs]==1){?> <a class="btn btn-success btn-auto btn-diy" href="javascript:;" _title="手动发货商品，拍下后，卖家会收到待发货的邮件、短信提醒" color="#4cae4c"><span class="m1">手</span></a><? }?>
	
	<? if($row1[fhxs]==2){?><a class="btn btn-successs btn-autoo btn-diy" href="javascript:;" _title="自动发货商品，拍下后，即可收到来自该商品的发货（下载）链接" color="#ffa800"><span class="m1">远</span></a><? }?>
	
	<? if($row1[fhxs]==3){?><a class="btn btn-default btn-nolocal btn-diy" href="javascript:;" _title="自动发货商品，拍下后，即可收到来自该商品的解压包" color="#999"><span class="m1">本</span></a><? }?>
	
	<? if($row1[fhxs]==4){?><a class="btn btn-default btn-nolocal btn-diy" href="javascript:;" _title="自动发货商品，拍下后，即可收到来自该商品的点卡账号密码" color="#999"><span class="m1">点</span></a><? }?>					
    
	<? if($row1[fhxs]==5){?><a class="btn btn-innfo btn-dijjia btn-diy"  href="javascript:;" _title="物流发货商品，拍下后，您在3到4天内，会收到该订单的快递包裹<p>请注意签收" color="#286090"><span class="m1">物</span></a><? }?>
	
   <? if($row1[ifuserdj]==1){?><a class="btn btn-info btn-dijia btn-diy" href="javascript:;" _title="VIP用户，可享受不同的优惠折扣" color="#46b8da"><span class="m1">折</span></a><? }?>
	</span></li>
</li>
</ul>
 <? }?> 
</div> 
  <?
  $a1=returncount("epzhu_propj where selluserid=".$uid." and pf1=1")+returncount("epzhu_propj where selluserid=".$uid." and pf2=1")+returncount("epzhu_propj where selluserid=".$uid." and pf3=1");
  $a2=returncount("epzhu_propj where selluserid=".$uid." and pf1=2")+returncount("epzhu_propj where selluserid=".$uid." and pf2=2")+returncount("epzhu_propj where selluserid=".$uid." and pf3=2");
  $a3=returncount("epzhu_propj where selluserid=".$uid." and pf1=3")+returncount("epzhu_propj where selluserid=".$uid." and pf2=3")+returncount("epzhu_propj where selluserid=".$uid." and pf3=3");
  $a4=returncount("epzhu_propj where selluserid=".$uid." and pf1=4")+returncount("epzhu_propj where selluserid=".$uid." and pf2=4")+returncount("epzhu_propj where selluserid=".$uid." and pf3=4");
  $a5=returncount("epzhu_propj where selluserid=".$uid." and pf1=5")+returncount("epzhu_propj where selluserid=".$uid." and pf2=5")+returncount("epzhu_propj where selluserid=".$uid." and pf3=5");
  $al=$a1+$a2+$a3+$a4+$a5;
  if($al==0){$a1v=0;$a2v=0;$a3v=0;$a4v=0;$a5v=0;}
  else{
  $a1v=sprintf("%.1f",$a1/$al*100);
  $a2v=sprintf("%.1f",$a2/$al*100);
  $a3v=sprintf("%.1f",$a3/$al*100);
  $a4v=sprintf("%.1f",$a4/$al*100);
  $a5v=sprintf("%.1f",$a5/$al*100);
  }
  $hp=returncount("epzhu_propj where selluserid=".$uid." and pjlx=1");
  $pa=returncount("epzhu_propj where selluserid=".$uid."");
  if($pa==0){$av="100";}else{$av=sprintf("%.2f",$hp/$pa*100);}
  ?>
  
  <!--店铺开发推荐-->
<div class="shop_ibox"> 
<div class="shop_ibox shop_index_tit">
<strong>推荐开发</strong> <a href='prolist_i<?=$uid?>v.html' title="查看全部商品">More></a>
</div>
<div class="shop_ibox "> 
  <div class="shop_igoods igoods_big"> 
  <? 
  while1("*","epzhu_prokf where userid=".$uid." and zt=0 and ifxj=0 order by lastsj desc limit 12");while($row1=mysql_fetch_array($res1)){
  $au="../productkf/view".$row1[id].".html";
  $tp="../".returntp("bh='".$row1[bh]."' order by iffm desc","-2");
  ?>
 <ul>
   <a href="<?=$au?>" class="pic" target="_blank">
   <img src="<?=returntppd($tp,"../img/none180x180.gif")?>">
   </a>
   <li class="sinfo">
    <a href="<?=$au?>" class="sname"title="<?=$row[tit]?>"><?=strgb2312($row1[tit],0,50)?> </a>
	<p class="sprice"><em><b>￥<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?>元</b></em>
	 
   <div class="pull-right smgray text-right mt5 ">
  
	<? if($row1[yysweb]){?><a class="btn btn-info btn-dijia  btn-diy" href="javascript:;" _title="<?=$rowuser[baomoney]?>" color="#FF0303"><span class="m1">安</span></a><? }?>
	 
	<? if($rowuser[baomoney]>0){?><a class="btn btn-warning btn-bao btn-diy" href="javascript:;" _title='该商家已加入保证金计划<br>已缴纳 &lt;b&gt;<?=$rowuser[baomoney]?>&lt;/b&gt; 元保证金' color="#FF7E00"><span class="m1">保</span></a><? }else{?><a class="btn btn-warning btn-bao btn-diy" href="javascript:;" _title='该商家没有加入保证金计划<br> &lt;b&gt;&lt;/b&gt;详细测试再下单' color="#FF7E00"><span class="m1">保</span></a><? }?>
	
	<? if($row1[fhxs]==1){?> <a class="btn btn-success btn-auto btn-diy" href="javascript:;" _title="手动发货商品，拍下后，卖家会收到待发货的邮件、短信提醒" color="#4cae4c"><span class="m1">手</span></a><? }?>
	
	<? if($row1[fhxs]==2){?><a class="btn btn-successs btn-autoo btn-diy" href="javascript:;" _title="自动发货商品，拍下后，即可收到来自该商品的发货（下载）链接" color="#ffa800"><span class="m1">远</span></a><? }?>
	
	<? if($row1[fhxs]==3){?><a class="btn btn-default btn-nolocal btn-diy" href="javascript:;" _title="自动发货商品，拍下后，即可收到来自该商品的解压包" color="#999"><span class="m1">本</span></a><? }?>
	
	<? if($row1[fhxs]==4){?><a class="btn btn-default btn-nolocal btn-diy" href="javascript:;" _title="自动发货商品，拍下后，即可收到来自该商品的点卡账号密码" color="#999"><span class="m1">点</span></a><? }?>					
    
	<? if($row1[fhxs]==5){?><a class="btn btn-innfo btn-dijjia btn-diy"  href="javascript:;" _title="物流发货商品，拍下后，您在3到4天内，会收到该订单的快递包裹<p>请注意签收" color="#286090"><span class="m1">物</span></a><? }?>
	
   <? if($row1[ifuserdj]==1){?><a class="btn btn-info btn-dijia btn-diy" href="javascript:;" _title="VIP用户，可享受不同的优惠折扣" color="#46b8da"><span class="m1">折</span></a><? }?>
	</span></li>
</li>
</ul>
 <? }?> 
</div> 
  <?
  $a1=returncount("epzhu_propj where selluserid=".$uid." and pf1=1")+returncount("epzhu_propj where selluserid=".$uid." and pf2=1")+returncount("epzhu_propj where selluserid=".$uid." and pf3=1");
  $a2=returncount("epzhu_propj where selluserid=".$uid." and pf1=2")+returncount("epzhu_propj where selluserid=".$uid." and pf2=2")+returncount("epzhu_propj where selluserid=".$uid." and pf3=2");
  $a3=returncount("epzhu_propj where selluserid=".$uid." and pf1=3")+returncount("epzhu_propj where selluserid=".$uid." and pf2=3")+returncount("epzhu_propj where selluserid=".$uid." and pf3=3");
  $a4=returncount("epzhu_propj where selluserid=".$uid." and pf1=4")+returncount("epzhu_propj where selluserid=".$uid." and pf2=4")+returncount("epzhu_propj where selluserid=".$uid." and pf3=4");
  $a5=returncount("epzhu_propj where selluserid=".$uid." and pf1=5")+returncount("epzhu_propj where selluserid=".$uid." and pf2=5")+returncount("epzhu_propj where selluserid=".$uid." and pf3=5");
  $al=$a1+$a2+$a3+$a4+$a5;
  if($al==0){$a1v=0;$a2v=0;$a3v=0;$a4v=0;$a5v=0;}
  else{
  $a1v=sprintf("%.1f",$a1/$al*100);
  $a2v=sprintf("%.1f",$a2/$al*100);
  $a3v=sprintf("%.1f",$a3/$al*100);
  $a4v=sprintf("%.1f",$a4/$al*100);
  $a5v=sprintf("%.1f",$a5/$al*100);
  }
  $hp=returncount("epzhu_propj where selluserid=".$uid." and pjlx=1");
  $pa=returncount("epzhu_propj where selluserid=".$uid."");
  if($pa==0){$av="100";}else{$av=sprintf("%.2f",$hp/$pa*100);}
  ?>
  
  
   <div class="shop_ibox shop_index_tit">
  <strong>源码评价</strong>    <a href='evaluation' title="查看全部评价">More></a>
</div>
<table class="shop-evaluation-table">
<tbody>
     <tr>
                <th width="10%">好评率</th>
                <th  width="40%" class="shop-evaluation-label IRadio">
                        <label class="IChecked" data="14|0|0">
                            <i></i>一月内
                        </label>
                        <label class=""  data="41|0|0">
                            <i></i>三月内
                        </label>
                        <label class=""  data="104|0|1">
                            <i></i>半年内
                        </label>
                        <label class=""  data="139|1|1">
                            <i></i>总计
                        </label>
                </th>
                <th  width="40%" rowspan="2" colspan="1">
<div class="scoreLeft">
            <dl>
              <dt>服务态度</dt>
              <dd><span class="mask"></span><span class="num"><?=$mspf?></span></dd>
            </dl>
            <dl>
              <dt>工作效率</dt>
              <dd><span class="mask"></span><span class="num"><?=$fhpf?></span></dd>
            </dl>
            <dl  style='border:0'>
              <dt>完成质量</dt>
              <dd><span class="mask"></span><span class="num"><?=$shpf?></span></dd>
            </dl>
          </div>
  </th>
   </tr>        
     <tr>
     <td>
                <? 
			    $z1=returncount("epzhu_propj where selluserid=".$rowuser[id]." and pjlx=1");
				$z2=returncount("epzhu_propj where selluserid=".$rowuser[id]." and pjlx=2");
				$z3=returncount("epzhu_propj where selluserid=".$rowuser[id]." and pjlx=3");
				$zz=$z1+$z2+$z3;
				$bzz=$zz/100;
				$czz=$z2+$z3;
				$zczz=($bzz*$czz)*100;
				$bfb=100-$zczz;
				?>
                    <span style="color: #fa6d2f;"><?= $bfb?>%</span>
                </td>
                <td class="shop-evaluation-score">
					<li>
					<span><div><i id="eval" class="ico-good"></i></div><em>好评</em><p><?=$z1?></p></span>
					</li>
					<li>
					<span><div><i id="eval" class="ico-normal"></i></div><em>中评</em><p><?=$z2?></p></span>
					</li>
					<li style="border:0">
					<span><div><i id="eval" class="ico-bad"></i></div><em>差评</em><p><?=$z3?></p></span>
					</li>                      
                </td>
            </tr>
            </tbody>
        </table>
<?
 function page($page){//分页
       if($page == ""){
		   $page = 1;
	   }
	   $page_size = 5; //每页多少条数据
	   $_pageNum = 10; //最多显示多少个页码
	   $query = "select count(*) as total from epzhu_propj where selluserid='".$_GET['id']."'";
	   $result = mysql_query($query);
	   $rownum = mysql_fetch_row($result);
	   $message_count = $rownum[0];
	   $page_count = ceil($message_count / $page_size);
	   $offset = ($page-1) * $page_size;
	   $pages = $page_count;
	   $_start = $page - floor($_pageNum / 2); //计算开始页
	   $_start = $_start < 1 ? 1 : $_start;
	   $_end = $page + floor($_pageNum / 2); //计算结束页
	   $_end = $_end > $pages? $pages : $_end;
	   $_curPageNum = $_end - $_start + 1;
	   // 左调整
	  if($_curPageNum < $_pageNum && $_start > 1){
		   $_start = $_start - ($_pageNum - $_curPageNum);
		   $_start = $_start < 1 ? 1 : $_start;
		   $_curPageNum = $_end - $_start + 1;
	}
	   // 右边调整
	  if($_curPageNum < $_pageNum && $_end < $pages){
		   $_end = $_end + ($_pageNum - $_curPageNum);
		   $_end = $_end > $pages? $pages : $_end;
	}
	$data['offset']=$offset;
	$data['page_count']=$page_count;
	$data['page']=$page;
	$data['_start']=$_start;
	$data['_end']=$_end;
	$data['page_size']=$page_size;
	return $data;
}
 ?>
<div class="shop_evaluation shop_ibox" style="margin-bottom:15px;">
<ul class="c_r_page s_ajax_page">
<?php	
    $data=page($_GET['page']);	
	if($data['page']!= 1){
     echo '<a id="p_up" href=view' . $_GET['id'] . '_' . ($data['page']-1) . '.html> &lt; </a>';
     }
    for ($i = $data['_start']; $i <= $data['_end']; $i++){
     if($i == $data['page']){
         $_pageHtml .= '<b class="curPage">'.$i.'</b>';
         }
     }
     if($data['page'] < $data['page_count']){
     
     }
?>

<div class="filter-comment IRadio shop_cur" id="shop_pg_scTop">
<label data="q" class="IChecked"><i></i><span>全部</span></label>
<label data="2"><i></i><span>好评</span></label>
<label data="0"><i></i><span>中评</span></label>
<label data="-1"><i></i><span>差评</span></label>
<label data="zj"><i></i><span>有追加</span></label>
<label data="hf"><i></i><span>有回复</span></label>
<label data="fzp"><i></i><span>非系统自评</span></label>
</div> 
 </ul>
<script>
 function page(){
	 var page = document.getElementById("num").value
	 var id=<?=$_GET['id']?>;
	 window.location.href='view'+id+'_'+page+'.html';
 }
 </script>
<div class="eList">
 <? 
 while1("*","epzhu_propj where selluserid=".$rowuser[id]." order by sj desc limit ".$data['offset'].",".$data['page_size']."");while($row1=mysql_fetch_array($res1)){
 $usertx="../upload/".$row1[userid]."/user.jpg";
 if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);} 
 
 $sqlpro="select * from epzhu_pro where bh='".$row1[probh]."'";
 mysql_query("SET NAMES 'GBK'");
 $respro=mysql_query($sqlpro);
 $rowpro=mysql_fetch_array($respro);
 $sj=date("Y-m-d H:i:s");
 $nowmoney=returnyhmoney($rowpro[yhxs],$rowpro[money2],$rowpro[money3],$sj,$rowpro[yhsj1],$rowpro[yhsj2],$rowpro[id]);
 if($row1[pjlx]==1){$ico='good';}elseif($row1[pjlx]==2){$ico='normal';}elseif($row1[pjlx]==3){$ico='bad';}
 ?>
 <ul>
<? $pf=round(($row1[pf1]+$row1[pf2]+$row1[pf3])/3,2);$userxy1=returnxy($row1[userid],2);?>
<div class="elistRight">
<div class="box1">交易商品：<a target="_blank" href="<?=weburl?>product/view<?= $rowpro['id']?>.html"><?= $rowpro['tit']?></a>&nbsp;&nbsp;成交价：<span class="feng">￥<?=$nowmoney?>.00元</span> </div>
<div class="box2"><p style="
    font-size: 12px;
"><i class="ico-<?= $ico?>" style="margin:0 3px 0 -3px;vertical-align:middle" id="eval"></i> <?=strip_tags($row1[txt])?></p>

<? while2("*","epzhu_tp where bh='".$row1[orderbh]."' order by xh asc");while($rowt=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$rowt[tp]);?>
<a href="../<?=$rowt[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;
  <? 
   }
   ?>
	</p><p class="gray f12"><?=$row1[sj]?></p>
						
						
						<? if(!empty($row1[hf])){?>
						<div class="hfcon"> <div class="j-border"></div>

								  <div class="j-background"></div><span><p class="tit" style="color:#e74851">卖家回复：</p><p><?=$row1[hf]?></p><p class="gray"><?=$row1[hfsj]?></p></span></div><? }?></div>
		<div class="box3">
		<div class="pingfen_btn">本次综合评分：<span><?=$pf?>.00</span><div class="pingfen_box">
		<dl>
		<dd>服务态度</dd><s><div style="width:<?=$pf/5*76?>px;"><img src="/img/pf<?=$row1[pf1]?>.png" title="<?=$row1[pf1]?>分"></div></s><dd><em><?=$row1[pf1]?>分</em></dd>
		</dl>
		<dl>
		<dd>工作效率</dd><s><div style="width:<?=$pf/5*76?>px;"><img src="/img/pf<?=$row1[pf2]?>.png" title="<?=$row1[pf2]?>分"></div></s><dd><em><?=$row1[pf2]?>分</em></dd>
		</dl>
		<dl>
		<dd>商品质量</dd><s><div style="width:<?=$pf/5*76?>px;"><img src="/img/pf<?=$row1[pf3]?>.png" title="<?=$row1[pf3]?>分"></div></s><dd><em><?=$row1[pf3]?>分</em></dd>
		</dl>
		</div>
		</div>
		</div>
		</div>
		<div class="elistLeft">   
		<img src="<?=$usertx?>" class="userpic" width="50" height="50">
		<p><?=returnnc($row1[userid])?><br><img class="xy" src="../img/dj/<?=returnxytp($userxy1)?>" title="信用值：<?=$userxy1?>"></p>
	</div>
    </ul>
		<?
		}
		?>	

</div> 
</div>    <div class="shop_ibox shop_index_tit">
  <strong>开发评价</strong>    <a href='evaluation' title="查看全部评价">More></a>
</div><table class="shop-evaluation-table">
<tbody>
     <tr>
                <th width="10%">好评率</th>
                <th  width="40%" class="shop-evaluation-label IRadio">
                        <label class="IChecked" data="14|0|0">
                            <i></i>一月内
                        </label>
                        <label class=""  data="41|0|0">
                            <i></i>三月内
                        </label>
                        <label class=""  data="104|0|1">
                            <i></i>半年内
                        </label>
                        <label class=""  data="139|1|1">
                            <i></i>总计
                        </label>
                </th>
                <th  width="40%" rowspan="2" colspan="1">
<div class="scoreLeft">
            <dl>
              <dt>服务态度</dt>
              <dd><span class="mask"></span><span class="num"><?=$mspf?></span></dd>
            </dl>
            <dl>
              <dt>工作效率</dt>
              <dd><span class="mask"></span><span class="num"><?=$fhpf?></span></dd>
            </dl>
            <dl  style='border:0'>
              <dt>完成质量</dt>
              <dd><span class="mask"></span><span class="num"><?=$shpf?></span></dd>
            </dl>
          </div>
  </th>
   </tr>        
     <tr>
     <td>
                <? 
			    $z1=returncount("epzhu_propjwz where selluserid=".$rowuser[id]." and pjlx=1");
				$z2=returncount("epzhu_propjwz where selluserid=".$rowuser[id]." and pjlx=2");
				$z3=returncount("epzhu_propjwz where selluserid=".$rowuser[id]." and pjlx=3");
				$zz=$z1+$z2+$z3;
				$bzz=$zz/100;
				$czz=$z2+$z3;
				$zczz=($bzz*$czz)*100;
				$bfb=100-$zczz;
				?>
                    <span style="color: #fa6d2f;"><?= $bfb?>%</span>
                </td>
                <td class="shop-evaluation-score">
					<li>
					<span><div><i id="eval" class="ico-good"></i></div><em>好评</em><p><?=$z1?></p></span>
					</li>
					<li>
					<span><div><i id="eval" class="ico-normal"></i></div><em>中评</em><p><?=$z2?></p></span>
					</li>
					<li style="border:0">
					<span><div><i id="eval" class="ico-bad"></i></div><em>差评</em><p><?=$z3?></p></span>
					</li>                      
                </td>
            </tr>
            </tbody>
        </table><div class="shop_evaluation shop_ibox" style="margin-bottom:15px;">
<ul class="c_r_page s_ajax_page">
<?php	
    $data=page($_GET['page']);	
	if($data['page']!= 1){
     echo '<a id="p_up" href=view' . $_GET['id'] . '_' . ($data['page']-1) . '.html> &lt; </a>';
     }
    for ($i = $data['_start']; $i <= $data['_end']; $i++){
     if($i == $data['page']){
         $_pageHtml .= '<b class="curPage">'.$i.'</b>';
         }
     }
     if($data['page'] < $data['page_count']){
     
     }
?>

<div class="filter-comment IRadio shop_cur" id="shop_pg_scTop">
<label data="q" class="IChecked"><i></i><span>全部</span></label>
<label data="2"><i></i><span>好评</span></label>
<label data="0"><i></i><span>中评</span></label>
<label data="-1"><i></i><span>差评</span></label>
<label data="zj"><i></i><span>有追加</span></label>
<label data="hf"><i></i><span>有回复</span></label>
<label data="fzp"><i></i><span>非系统自评</span></label>
</div> 
 </ul>
<script>
 function page(){
	 var page = document.getElementById("num").value
	 var id=<?=$_GET['id']?>;
	 window.location.href='view'+id+'_'+page+'.html';
 }
 </script>
<div class="eList">
 <? 
 while1("*","epzhu_propjwz where selluserid=".$rowuser[id]." order by sj desc limit ".$data['offset'].",".$data['page_size']."");while($row1=mysql_fetch_array($res1)){
 $usertx="../upload/".$row1[userid]."/user.jpg";
 if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);} 
 
 $sqlpro="select * from epzhu_prowz where bh='".$row1[probh]."'";
 mysql_query("SET NAMES 'GBK'");
 $respro=mysql_query($sqlpro);
 $rowpro=mysql_fetch_array($respro);
 $sj=date("Y-m-d H:i:s");
 $nowmoney=returnyhmoney($rowpro[yhxs],$rowpro[money2],$rowpro[money3],$sj,$rowpro[yhsj1],$rowpro[yhsj2],$rowpro[id]);
 if($row1[pjlx]==1){$ico='good';}elseif($row1[pjlx]==2){$ico='normal';}elseif($row1[pjlx]==3){$ico='bad';}
 ?>
 <ul>
<? $pf=round(($row1[pf1]+$row1[pf2]+$row1[pf3])/3,2);$userxy1=returnxy($row1[userid],2);?>
<div class="elistRight">
<div class="box1">交易商品：<a target="_blank" href="<?=weburl?>productkf/view<?= $rowpro['id']?>.html"><?= $rowpro['tit']?></a>&nbsp;&nbsp;成交价：<span class="feng">￥<?=$nowmoney?>.00元</span> </div>
<div class="box2"><p style="
    font-size: 12px;
"><i class="ico-<?= $ico?>" style="margin:0 3px 0 -3px;vertical-align:middle" id="eval"></i> <?=strip_tags($row1[txt])?></p>

<? while2("*","epzhu_tp where bh='".$row1[orderbh]."' order by xh asc");while($rowt=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$rowt[tp]);?>
<a href="../<?=$rowt[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;
  <? 
   }
   ?>
	</p><p class="gray f12"><?=$row1[sj]?></p>
						
						
						<? if(!empty($row1[hf])){?>
						<div class="hfcon"> <div class="j-border"></div>

								  <div class="j-background"></div><span><p class="tit" style="color:#e74851">卖家回复：</p><p><?=$row1[hf]?></p><p class="gray"><?=$row1[hfsj]?></p></span></div><? }?></div>
		<div class="box3">
		<div class="pingfen_btn">本次综合评分：<span><?=$pf?>.00</span><div class="pingfen_box">
		<dl>
		<dd>服务态度</dd><s><div style="width:<?=$pf/5*76?>px;"><img src="/img/pf<?=$row1[pf1]?>.png" title="<?=$row1[pf1]?>分"></div></s><dd><em><?=$row1[pf1]?>分</em></dd>
		</dl>
		<dl>
		<dd>工作效率</dd><s><div style="width:<?=$pf/5*76?>px;"><img src="/img/pf<?=$row1[pf2]?>.png" title="<?=$row1[pf2]?>分"></div></s><dd><em><?=$row1[pf2]?>分</em></dd>
		</dl>
		<dl>
		<dd>商品质量</dd><s><div style="width:<?=$pf/5*76?>px;"><img src="/img/pf<?=$row1[pf3]?>.png" title="<?=$row1[pf3]?>分"></div></s><dd><em><?=$row1[pf3]?>分</em></dd>
		</dl>
		</div>
		</div>
		</div>
		</div>
		<div class="elistLeft">   
		<img src="<?=$usertx?>" class="userpic" width="50" height="50">
		<p><?=returnnc($row1[userid])?><br><img class="xy" src="../img/dj/<?=returnxytp($userxy1)?>" title="信用值：<?=$userxy1?>"></p>
	</div>
    </ul>
		<?
		}
		?>	

</div> 
 </div> 
</div> 
</div> 
</div> </div>  </div>  </div> 

 </div>  </div> 


<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>