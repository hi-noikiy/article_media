<?
include("../config/conn.php");
include("../config/function.php");
if($_SESSION["SHOPUSER"]!=""){php_toheader("../user/");}

//�޸ĸ��ļ���Ҫͬ���޸���reg/reg.php��reg/qqreturnlast.php ��m/reg/reg.php

//д�����ݿ⿪ʼ
if($_GET[action]=="add"){
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 zwzr();
 
 //��Ҫ������֤B
 if(1==$rowcontrol[regmob]){
 $mot=$_SESSION["REGMOT"];
 $motyz=sqlzhuru($_POST[t9]);
 $ifmot=1;
 if($motyz!=$_SESSION["REGMOTYZ"] || empty($motyz)){Audit_alert("������֤�벻��ȷ���������ԣ�","reg.php");}
 $_SESSION["REGMOT"]="";
 $_SESSION["REGMOTYZ"]="";
 }
 //��Ҫ������֤E
 
 if(strtolower($_SESSION["authnum_session"])!=strtolower(sqlzhuru($_POST["t5"]))){Audit_alert("��֤�벻��ȷ�������޸���֤�룡","reg.php");}
 
 include("../tem/uc/reg.php");
 
 $uid=sqlzhuru(trim($_POST[t1]));
 $pwd=sqlzhuru($_POST[t2]);
 $nc=sqlzhuru($_POST[t4]);
 $uqq=sqlzhuru($_POST[t6]);
 $email=sqlzhuru($_POST[t7]);
 include("reg_tem.php");
 
 include("../tem/uc/reg1.php");
 
 php_toheader("../user/");
 
}
//д�����ݿ����


//�Ƽ���ID COOKIE��
$tid=$_GET[tid];
if(!empty($tid)){
 $Month = 864000 + time();
 setcookie(tjuserid,$tid, $Month,'/');
}

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ע���Ա - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/layer.js"></script>



<script language="javascript" src="js/jquery.m.js"></script>
<script language="javascript" src="js/layui/layui.js"></script>
<script language="javascript" src="js/common.js"></script>
<script language="javascript" src="js/member.js"></script>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/member.css" rel="stylesheet" type="text/css" />
<link href="css/layui.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<style>
html {overflow-y: scroll; overflow:-moz-scrollbars-vertical;}
</style>
 <!--[if IE 6]>
 <script src="../js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script> 
 <script type="text/javascript"> 
 DD_belatedPNG.fix('*'); 
 </script> 
 <![endif]-->
</head>
<body>
<div class="loginHead">
    	<div class="main clearfix">
    		<div class="logo fl"><a href="../" target="_blank"><img src="/img/logo.png"></a></div>
    		<div class="loginBtnBar fr"><span class="gray fz14">�����ʺţ�</span><a class="rlbtn fz16" href="./">������¼</a></div>
    	</div>	
    </div>


<div class="loginMain">
    	<div class="mainMin">
    		<!--registeredStep Star -->
    		<div class="registeredStep">
    			
    		</div>
    		<!--registeredStep End -->

            <!--registeredInfo Star -->
            <div class="registeredInfo clearfix">	
    <div class="reg-tab"> <h1 class="t"><i class="icon"></i>ע���Ա</h1></div>
				<div class="reg-from">						
				            <div class="formInfo">
							 
			<form class="layui-form" name="f1" method="post" onSubmit="return tj()">
			
			
                        <dl class="clearfix">
                            <dt>ע���ʺţ�</dt>
                            <dd>
                                
								 <input class="text checkLen"  name="t1" autocomplete="off" disableautocomplete onBlur="userCheck()">
  
  
  <span class="s1" id="imgts1"></span>
  <span class="s2" id="ts1"></span>
								
                            </dd>    
                        </dl>
						
						
						<dl class="clearfix">
                            <dt>�������룺</dt>
                            <dd>
                               <input type="password" class="text checkLen" name="t2" autocomplete="off" disableautocomplete onBlur="pwd1chk()">
  <span class="s1" id="imgts2"></span>
  <span class="s2" id="ts2"></span>
  </dd>    
                        </dl>      
                        <dl class="clearfix">
                            <dt>ȷ�����룺</dt>
                            <dd>			
<input type="password" class="text checkLen" name="t3" autocomplete="off" disableautocomplete onBlur="pwd2chk()">
  <span class="s1" id="imgts3"></span>
  <span class="s2" id="ts3"></span>
  </dd>    
                        </dl> 
                        <dl class="clearfix">
                            <dt>�����ǳƣ�</dt>
                            <dd>
                           <input type="text" class="text checkLen" name="t4" autocomplete="off" disableautocomplete onBlur="ncCheck()">
  <span class="s1" id="imgts4"></span>
  <span class="s2" id="ts4"></span>
  </dd>    
                        </dl>     
                        <dl class="clearfix">
                            <dt>��ϵQQ��</dt>
                            <dd>
                           <input type="text" class="text checkLen" name="t6" autocomplete="off" disableautocomplete onBlur="qqCheck()">
  <span class="s1" id="imgts6"></span>
  <span class="s2" id="ts6"></span>
  </dd>    
                        </dl>      
						<dl class="clearfix">
                            <dt>�������䣺</dt>
                            <dd>
                           <input type="text" class="text checkLen" name="t7" autocomplete="off" disableautocomplete onBlur="yxCheck()">
  <span class="s1" id="imgts7"></span>
  <span class="s2" id="ts7"></span>
  </dd>    
                        </dl>           
						<dl class="clearfix">
                            <dt>��֤�룺</dt>
                            <dd>
                          <input type="text" class="text checkLen" name="t5" autocomplete="off" disableautocomplete onBlur="yzmCheck()"> 
  <img src="../config/getYZM.php" onClick="this.src='../config/getYZM.php?'+Math.random();" class="img1" />
  <span class="s1" id="imgts5"></span>
  <span class="s2" id="ts5"></span>
  
  </dd>    
                        </dl> 

						
			 <? if(1==$rowcontrol[regmob]){?>			
						
						<dl class="clearfix">
                            <dt>�ֻ����룺</dt>
                            <dd>
                    <input type="text" class="text checkLen" name="t8" autocomplete="off" disableautocomplete onBlur="motCheck()">
  <span class="s1" id="imgts8"></span>
  <span class="s2" id="ts8"></span>
  </dd>    
                        </dl> 
						
						
						
						<dl class="clearfix">
                            <dt>�ֻ���֤�룺</dt>
                            <dd>
                    <input type="text" class="text checkLen" name="t9" autocomplete="off" disableautocomplete onBlur="motyzmCheck()"> 
  <a href="javascript:void(0);" id="fs1" class="a1" onClick="yzonc()">��ȡ��֤��</a>
  <a href="javascript:void(0);" id="fs2" class="a1" style="display:none;">�����С���(<span id="sjzouv" class="red">120</span>��)</span></a>
  <span class="s1" id="imgts9"></span>
  <span class="s2" id="ts9"></span>
  </dd>    
                        </dl> 
						  <? }?>
						
						
                        <dl class="provision">
                            <dd class="clearfix">
							

							����ϸ�Ķ���ͬ����վ</span>
							<a href="../help/aboutview1.html" class="feng" target="_blank">��<?=webname?>ע��Э�顷</a>

                          </dd>    
                        </dl> 
											
							
                        <dl class="clearfix">
                            <dd>
                               
  <input class="text greenBtn submit" type="submit" value="ͬ������Э�鲢ע��"></li>
                            </dd>    
                        </dl> 
                       					</form>
					                    </div> 
				</div>
				

				
				
			<div class="login-three">
                         	<h3>�������˺ſ��ٵ�¼</h3>
							
							
											  <a href="<?=weburl?>config/qq/oauth/index.php" target="_blank" class="login_click" id="a1"></a>
  <? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);?>
  <a href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect" target="_blank" class="login_click" id="wechat"></a>
  <? }?>
							</div>	
				
				
            </div>
         

<div class="rl_foot">
<ul class="link">
<a target="_blank" href="<?=weburl?>help/aboutview2.html" rel="nofollow">��������</a>
<a href="<?=weburl?>user/adlx1.php" target="_blank" rel="nofollow">������</a>
<a href="<?=weburl?>help/search_j13v_k29v.html" target="_blank" rel="nofollow">��ϵ����</a>
<a href="<?=weburl?>/help/search_j12v_k25v.html" target="_blank" rel="nofollow">��������</a>
<a href="<?=weburl?>/help/aboutview5.html" target="_blank" rel="nofollow">��������</a>
<a href="<?=weburl?>help/search_j10v_k20v.html" target="_blank" rel="nofollow">����ָ��</a>
<a href="<?=weburl?>help/gglist.html" target="_blank" rel="nofollow">��������</a>
</ul>

											<?
$qq=preg_split("/,/",$rowcontrol[webqqv]);
for($qqi=0;$qqi<count($qq);$qqi++){
$qv=preg_split("/\*/",$qq[$qqi]);
if($qv[0]!=""){
if($qv[1]==""){$qtit="��վ�ͷ�";}else{$qtit=$qv[1];}
?>

						<?
}
}
?>
<script type="text/javascript" src="//tajs.qq.com/stats?sId=57383124" charset="UTF-8"></script>

</div>
</div></div>





</body>
</html>