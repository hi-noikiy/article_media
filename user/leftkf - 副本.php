<!--LEFT B-->
<script>$(document).ready(function() {
    $(".level1").click(function() {
      $(".panel").slideToggle("slow");
    });
  });</script>
<style>div.panel,p.level1{margin:0px;padding:5px;text-align:center;background:#e5eecc;border:solid 1px #c3c3c3;  width: 178px;}div.panel{height:120px;display:none;  }</style>


<script>$(document).ready(function() {
    $(".level3").click(function() {
      $(".panel3").slideToggle("slow");
    });
  });</script>
<style>div.panel3,p.level1{margin:0px;padding:5px;text-align:center;background:#e5eecc;border:solid 1px #c3c3c3;    width: 178px;}div.panel3{height:120px;display:none;}</style>


<script>$(document).ready(function() {
    $(".level137").click(function() {
      $(".panell37").slideToggle("slow");
    });
  });</script>
<style>div.panell37,p.level1{margin:0px;padding:5px;text-align:center;background:#e5eecc;border:solid 1px #c3c3c3; width: 178px;}div.panell37{height:120px;display:none;}</style>

<script>$(document).ready(function() {
    $(".level14").click(function() {
      $(".panel14").slideToggle("slow");
    });
  });</script>
<style>div.panel14,p.level1{margin:0px;padding:5px;text-align:center;background:#e5eecc;border:solid 1px #c3c3c3; width: 178px;}div.panel14{height:120px;display:none;}</style>
<script>$(document).ready(function() {
    $(".level15").click(function() {
      $(".panel15").slideToggle("slow");
    });
  });</script>
<style>div.pane116,p.level1{margin:0px;padding:5px;text-align:center;background:#e5eecc;border:solid 1px #c3c3c3; width: 178px;}div.panel15{height:120px;display:none;}</style>
<script>$(document).ready(function() {
    $(".level16").click(function() {
      $(".panel16").slideToggle("slow");
    });
  });</script>
<style>div.panel17,p.level1{margin:0px;padding:5px;text-align:center;background:#e5eecc;border:solid 1px #c3c3c3; width: 178px;}div.panel16{height:120px;display:none;}</style>
<script>$(document).ready(function() {
    $(".level17").click(function() {
      $(".panel17").slideToggle("slow");
    });
  });</script>
<style>div.panel17,p.level1{margin:0px;padding:5px;text-align:center;background:#e5eecc;border:solid 1px #c3c3c3; width: 178px;}div.panel17{height:120px;display:none;}</style>
<div class="treebox">
  <ul class="menu">
    <li class="level21<? if($leftid==99){?> level11<? }?>">
      <a href="<?=weburl?>user/" class="a0" id="ico99">
        <em></em>后台总览
        <i></i>
      </a>
    </li></div>
    <!--这是卖家开始-->


	
<li class="level1<? if($leftid==1){?> level11<? }?>
         <a href="javascript:void(0);" class="a1" id="ico1"><i2>我是卖家</i2></a>
        <ul class="leve11">
          <div class="panel">
            <? $sj=date( "Y-m-d H:i:s"); $sqluser="select * from epzhu_user where uid='" .$_SESSION[SHOPUSER]. "'";mysql_query( "SET NAMES 'GBK'");$resuser=mysql_query($sqluser); $rowuser=mysql_fetch_array($resuser); if($sj>$rowuser[dqsj] && !empty($rowuser[dqsj])){updatetable("epzhu_user","shopzt=4 where shopzt=2 and id=".$rowuser[id]);} if(empty($pdpwd)){if(strcmp(sha1("123456"),$rowuser[pwd])==0){Audit_alert("您的密码为123456，请立即修改","pwd.php");}} if(2!=$rowuser[shopzt] && 4!=$rowuser[shopzt]){ ?>
              <li>
                <a href="<?=weburl?>user/openshop1.php">我要开店</a></li>
              <? }elseif(4==$rowuser[shopzt]){?>
                <li>
                  <a href="<?=weburl?>user/openshop4.php">店铺到期续费</a></li>
                <? }else{?>
                  <li>
                    <a href="<?=weburl?>user/shop.php">店铺设置</a></li>
                  <li>
                    <a href="<?=returnmyweb($rowuser[id],$rowuser[myweb])?>" target="_blank">预览店铺</a></li>
                  <li>
                    <a href="<?=weburl?>user/productlistkf.php">商品列表</a></li>
                  <li>
                    <a href="javascript:void(0)" class="share">发布出售</a></li>
                  <li>
                    <a href="<?=weburl?>user/productlistkf.php?ifxj=1">仓库中的宝贝</a></li>
                  <li>
                    <a href="<?=weburl?>user/propjlistkf.php">评价管理</a></li>
                  <!-- <li><a href="<?=weburl?>user/sellorder.php">订单管理</a></li>-->
                  <li>
                    <a href="<?=weburl?>user/adlx1.php">自助广告系统</a></li>
                  <li>
                    <a href="<?=weburl?>user/yunfeilist.php">运费模板</a></li>
                  <? }?></ul>
     
      </li>
      </div>
      
    

      <!--这是卖家结束-->
	  
	
	
	  
	  
      <!--这是买家开始-->
	  
<li class="level3<? if($leftid==2){?> level11<? }?>">
  <a2 href="javascript:void(0);" class="a1" id="ico2"><em></em>我的产品<i></i></a2>

    <ul class="level3">
          <div class="panel3">
  


 <li><a href="<?=weburl?>user/order.php">源码订单</a></li>
  <li><a href="<?=weburl?>user/orderkf.php">开发订单</a> </li>


  <li><a href="<?=weburl?>user/car.php">购物车</a></li>
  <li><a href="<?=weburl?>user/favpro.php">我的收藏</a></li>
  </ul>
 </li>
 <? if(empty($rowcontrol[iftask])){?>
    
          <!--这是买家结束-->
		 

 
          <!--我是任务开始--> <div class="treebox"style="width: 1200px;">
            <li class="level137<? if($leftid==1){?> level11<? }?>">
              <a href="javascript:void(0);" class="a1" id="ico7">
                <em></em>任务大厅
                <i></i>
              </a>
            </li>
            <div class="panell37">
              <ul class="level137">
                <li>
                  <li>
                    <a href="<?=weburl?>user/tasklist.php">这是雇主</a></li>
                  <li>
                    <a href="<?=weburl?>user/taskhflist.php">这是接手方</a></li>
                  <li>
                    <a href="<?=weburl?>task/taskadd.php" target="_blank">发起任务</a></li>
              </ul>
              </li>
            </div>
            <!--我是任务结束-->
            <!--我是互动开始-->
            <div class="treebox"style="width: 1200px;">
             <li class="level14<? if($leftid==6){?> level11<? }?>">
                <a href="javascript:void(0);" class="a1" id="ico6">
                  <i>互动管理
                  </i>
                <div class="panel14">
                  <ul class="level14">
                    <li>
                      <a href="<?=weburl?>user/newslist.php">稿件中心</a></li>
                    <li>
                      <a href="<?=weburl?>user/newslx.php">我要投稿</a></li>
                  </ul>
              </li>
              </div>
              
                </a>
              </li>
              <? }?>
                <!--我是互动结束-->
                <!--我是财务开始-->
                 <div class="treebox"style="width: 1200px;">
                   <li class="level15<? if($leftid==5){?> level11<? }?>">
                  <a href="javascript:void(0);" class="a1" id="ico5">
                    <i>财务管理
                   </i>
                    <div class="panel15">
                      <ul class="level15">
                        <li>
                          <a href="<?=weburl?>user/pay.php">我要充值</a></li>
                        <li>
                          <a href="<?=weburl?>user/paylog.php">资金明细</a></li>
                        <li>
                          <a href="<?=weburl?>user/tixian.php">我要提现</a></li>
                        <li>
                          <a href="<?=weburl?>user/tixianlog.php">提现记录</a></li>
                        <li>
                          <a href="<?=weburl?>user/jflog.php">积分管理</a></li>
                        <li>
                          <a href="<?=weburl?>user/baomoneylog.php">保证金管理</a></li>
                        <li>
                          <a href="<?=weburl?>user/zfmm.php">安全码</a></li>
                        <li>
                          <a href="<?=weburl?>user/tjuid.php">我推荐的会员</a></li>
                      </ul>
                  </li>
                </li>
                </div>
            
                  </a>
                </li>
                <!--我是财务结束-->
                <!--我是会员开始-->
               <div class="treebox"style="width: 1200px;">
                    <li class="level16<? if($leftid==3){?> level11<? }?>">
                  <a href="javascript:void(0);" class="a1" id="ico3">
                      <i>会员中心 </i>
                 
                  </a>
                    <div class="panel16">
                      <ul class="level16">
                        <li>
                          <a href="<?=weburl?>user/inf.php">基本信息</a></li>
                        <li>
                          <a href="<?=weburl?>user/qq.php">QQ绑定</a></li>
                        <li>
                          <a href="<?=weburl?>user/touxiang.php">设置头像</a></li>
                        <li>
                          <a href="<?=weburl?>user/mobbd.php">手机认证</a></li>
                        <li>
                          <a href="<?=weburl?>user/emailbd.php">邮箱认证</a></li>
                        <li>
                          <a href="<?=weburl?>user/shdzlist.php">收货地址</a></li>
                        <li>
                          <a href="<?=weburl?>user/pwd.php">修改密码</a></li>
                      </ul>
                  </li>
                </li>
                </div>
             
                </li>  </div>
                <!--我是会员结束-->
                <!--我是公单开始-->
                <div class="treebox"style="width: 1200px;">
                  <li class="level17<? if($leftid==4){?> level17<? }?>">
    <a href="javascript:void(0);" class="a1" id="ico4">
      <em></em>工单管理
      <i></i>
                    <div class="panel17">
                      <ul class="level17">
                        <li>
                          <a href="<?=weburl?>user/gdlist.php">我的工单</a></li>
                        <li>
                          <a href="<?=weburl?>user/gdlx.php">提交工单</a></li>
                      </ul>
                  </li>
  </ul>
  </div>
  
    </a>  </div>
    <!--我是公单结束-->
    <!--LEFT E-->
<!--<script language="javascript" src="<?=weburl?>user/js/easing.js"></script>-->
    <!--<link href="css/share.css" rel="stylesheet" type="text/css">-->
    