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
        <em></em>��̨����
        <i></i>
      </a>
    </li></div>
    <!--�������ҿ�ʼ-->


	
<li class="level1<? if($leftid==1){?> level11<? }?>
         <a href="javascript:void(0);" class="a1" id="ico1"><i2>��������</i2></a>
        <ul class="leve11">
          <div class="panel">
            <? $sj=date( "Y-m-d H:i:s"); $sqluser="select * from epzhu_user where uid='" .$_SESSION[SHOPUSER]. "'";mysql_query( "SET NAMES 'GBK'");$resuser=mysql_query($sqluser); $rowuser=mysql_fetch_array($resuser); if($sj>$rowuser[dqsj] && !empty($rowuser[dqsj])){updatetable("epzhu_user","shopzt=4 where shopzt=2 and id=".$rowuser[id]);} if(empty($pdpwd)){if(strcmp(sha1("123456"),$rowuser[pwd])==0){Audit_alert("��������Ϊ123456���������޸�","pwd.php");}} if(2!=$rowuser[shopzt] && 4!=$rowuser[shopzt]){ ?>
              <li>
                <a href="<?=weburl?>user/openshop1.php">��Ҫ����</a></li>
              <? }elseif(4==$rowuser[shopzt]){?>
                <li>
                  <a href="<?=weburl?>user/openshop4.php">���̵�������</a></li>
                <? }else{?>
                  <li>
                    <a href="<?=weburl?>user/shop.php">��������</a></li>
                  <li>
                    <a href="<?=returnmyweb($rowuser[id],$rowuser[myweb])?>" target="_blank">Ԥ������</a></li>
                  <li>
                    <a href="<?=weburl?>user/productlistkf.php">��Ʒ�б�</a></li>
                  <li>
                    <a href="javascript:void(0)" class="share">��������</a></li>
                  <li>
                    <a href="<?=weburl?>user/productlistkf.php?ifxj=1">�ֿ��еı���</a></li>
                  <li>
                    <a href="<?=weburl?>user/propjlistkf.php">���۹���</a></li>
                  <!-- <li><a href="<?=weburl?>user/sellorder.php">��������</a></li>-->
                  <li>
                    <a href="<?=weburl?>user/adlx1.php">�������ϵͳ</a></li>
                  <li>
                    <a href="<?=weburl?>user/yunfeilist.php">�˷�ģ��</a></li>
                  <? }?></ul>
     
      </li>
      </div>
      
    

      <!--�������ҽ���-->
	  
	
	
	  
	  
      <!--������ҿ�ʼ-->
	  
<li class="level3<? if($leftid==2){?> level11<? }?>">
  <a2 href="javascript:void(0);" class="a1" id="ico2"><em></em>�ҵĲ�Ʒ<i></i></a2>

    <ul class="level3">
          <div class="panel3">
  


 <li><a href="<?=weburl?>user/order.php">Դ�붩��</a></li>
  <li><a href="<?=weburl?>user/orderkf.php">��������</a> </li>


  <li><a href="<?=weburl?>user/car.php">���ﳵ</a></li>
  <li><a href="<?=weburl?>user/favpro.php">�ҵ��ղ�</a></li>
  </ul>
 </li>
 <? if(empty($rowcontrol[iftask])){?>
    
          <!--������ҽ���-->
		 

 
          <!--��������ʼ--> <div class="treebox"style="width: 1200px;">
            <li class="level137<? if($leftid==1){?> level11<? }?>">
              <a href="javascript:void(0);" class="a1" id="ico7">
                <em></em>�������
                <i></i>
              </a>
            </li>
            <div class="panell37">
              <ul class="level137">
                <li>
                  <li>
                    <a href="<?=weburl?>user/tasklist.php">���ǹ���</a></li>
                  <li>
                    <a href="<?=weburl?>user/taskhflist.php">���ǽ��ַ�</a></li>
                  <li>
                    <a href="<?=weburl?>task/taskadd.php" target="_blank">��������</a></li>
              </ul>
              </li>
            </div>
            <!--�����������-->
            <!--���ǻ�����ʼ-->
            <div class="treebox"style="width: 1200px;">
             <li class="level14<? if($leftid==6){?> level11<? }?>">
                <a href="javascript:void(0);" class="a1" id="ico6">
                  <i>��������
                  </i>
                <div class="panel14">
                  <ul class="level14">
                    <li>
                      <a href="<?=weburl?>user/newslist.php">�������</a></li>
                    <li>
                      <a href="<?=weburl?>user/newslx.php">��ҪͶ��</a></li>
                  </ul>
              </li>
              </div>
              
                </a>
              </li>
              <? }?>
                <!--���ǻ�������-->
                <!--���ǲ���ʼ-->
                 <div class="treebox"style="width: 1200px;">
                   <li class="level15<? if($leftid==5){?> level11<? }?>">
                  <a href="javascript:void(0);" class="a1" id="ico5">
                    <i>�������
                   </i>
                    <div class="panel15">
                      <ul class="level15">
                        <li>
                          <a href="<?=weburl?>user/pay.php">��Ҫ��ֵ</a></li>
                        <li>
                          <a href="<?=weburl?>user/paylog.php">�ʽ���ϸ</a></li>
                        <li>
                          <a href="<?=weburl?>user/tixian.php">��Ҫ����</a></li>
                        <li>
                          <a href="<?=weburl?>user/tixianlog.php">���ּ�¼</a></li>
                        <li>
                          <a href="<?=weburl?>user/jflog.php">���ֹ���</a></li>
                        <li>
                          <a href="<?=weburl?>user/baomoneylog.php">��֤�����</a></li>
                        <li>
                          <a href="<?=weburl?>user/zfmm.php">��ȫ��</a></li>
                        <li>
                          <a href="<?=weburl?>user/tjuid.php">���Ƽ��Ļ�Ա</a></li>
                      </ul>
                  </li>
                </li>
                </div>
            
                  </a>
                </li>
                <!--���ǲ������-->
                <!--���ǻ�Ա��ʼ-->
               <div class="treebox"style="width: 1200px;">
                    <li class="level16<? if($leftid==3){?> level11<? }?>">
                  <a href="javascript:void(0);" class="a1" id="ico3">
                      <i>��Ա���� </i>
                 
                  </a>
                    <div class="panel16">
                      <ul class="level16">
                        <li>
                          <a href="<?=weburl?>user/inf.php">������Ϣ</a></li>
                        <li>
                          <a href="<?=weburl?>user/qq.php">QQ��</a></li>
                        <li>
                          <a href="<?=weburl?>user/touxiang.php">����ͷ��</a></li>
                        <li>
                          <a href="<?=weburl?>user/mobbd.php">�ֻ���֤</a></li>
                        <li>
                          <a href="<?=weburl?>user/emailbd.php">������֤</a></li>
                        <li>
                          <a href="<?=weburl?>user/shdzlist.php">�ջ���ַ</a></li>
                        <li>
                          <a href="<?=weburl?>user/pwd.php">�޸�����</a></li>
                      </ul>
                  </li>
                </li>
                </div>
             
                </li>  </div>
                <!--���ǻ�Ա����-->
                <!--���ǹ�����ʼ-->
                <div class="treebox"style="width: 1200px;">
                  <li class="level17<? if($leftid==4){?> level17<? }?>">
    <a href="javascript:void(0);" class="a1" id="ico4">
      <em></em>��������
      <i></i>
                    <div class="panel17">
                      <ul class="level17">
                        <li>
                          <a href="<?=weburl?>user/gdlist.php">�ҵĹ���</a></li>
                        <li>
                          <a href="<?=weburl?>user/gdlx.php">�ύ����</a></li>
                      </ul>
                  </li>
  </ul>
  </div>
  
    </a>  </div>
    <!--���ǹ�������-->
    <!--LEFT E-->
<!--<script language="javascript" src="<?=weburl?>user/js/easing.js"></script>-->
    <!--<link href="css/share.css" rel="stylesheet" type="text/css">-->
    