<?
include("../config/conn.php");
include("../config/function.php");

//��¼��֤��ʼ
if($_GET[control]=="login"){
 zwzr();
 $uid=sqlzhuru($_POST[login_name]);$pwd=sqlzhuru($_POST[login_pass]);
 if(empty($uid) || empty($pwd)){Audit_alert("�ʺŻ������������󣬷�������","openw.php");}
 while0("id,uid,pwd,zt","epzhu_user where uid='".$uid."' and pwd='".sha1($pwd)."'");if(!$row=mysql_fetch_array($res)){php_toheader("openw.php?t=err");}
 if(0==$row[zt]){php_toheader("openw.php?t=jy");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("epzhu_loginlog","admin,userid,sj,uip","1,".$row[id].",'".$sj."','".$uip."'");
 $_SESSION["SHOPUSER"]=$uid;
 php_toheader("openw.php?t=suc");
}
//��¼��֤����

?>


<!DOCTYPE html><html><head>
<meta charset="UTF-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>��¼</title>
<script language="javascript" src="open/jquery.m.js"></script><script language="javascript" src="open/layui.js"></script><link href="open/basic.css" rel="stylesheet" type="text/css">
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript" src="open/login.js"></script>
<script language="javascript">
//��¼��ʼ
function login(){
 if(document.f1.login_name.value==""){objdis("ts","");objhtml("ts","�������˺�");objdis("xuan","none");return false;}	
 if(document.f1.login_pass.value==""){objdis("ts","");objhtml("ts","����������");objdis("xuan","none");return false;}	
 layer.msg('���ڵ�¼', {icon: 16  ,time: 0,shade :0.25});
 f1.action="openw.php?control=login";
}
function objdis(x,y){
document.getElementById(x).style.display=y;
}

function objhtml(x,y){
document.getElementById(x).innerHTML=y;
}
function miaos(){
parent.location.reload();
}
</script>
</head>
<style>
.suc{float:left;width:410px;font-size:14px;color:#6B6B6B;background:url(../img/suc.jpg) no-repeat;background-position:110px 120px;padding:130px 0 0 240px;height:50px;line-height:35px;text-align:center;height:250px;text-align:left;}
.suc strong{font-size:16px;color:#ff6600;}
</style>
<body style="background:#fff;">
<? if($_GET[t]=="suc"){?>
  <div class="suc">
  <strong>��¼�ɹ��������֮ǰ�Ĳ���</strong><br>
  <span id="miao">5</span>����Զ���ת(��δ��ת,��ˢ��)
  </div>
  <script language="javascript">
  setTimeout("miaos()",4000);
  </script>
  <? }else{?>




 <form name="f1" method="post" onSubmit="return login()">
<div class="lay-login" id="logingt">
	<cite class="login_type"><a class="curr" data-login="name">�ʺ������¼</a> <a data-login="phone">�ֻ���֤��¼</a></cite>
	<div class="login_box">
		<dl>
			<dd>
				<em class=""></em>
				<input class="text login-input" type="text" autocomplete="off"  name="login_name" id="login_name"  placeholder="��¼����/�ֻ���">
			</dd>    
		</dl>
	
		<dl>
			<dd>
				<em class="password"></em>
				<input class="text login-input" type="password" lay-verify="pass" autocomplete="off"  name="login_pass" id="login_pass"  placeholder="��¼����">
			</dd>    
		</dl>
	</div>
	<div class="login_box hide">
		<dl>
			<dd>
				<em class="phone"></em>
				<input class="text login-input" type="text" lay-verify="phone" autocomplete="off" name="login_phone" placeholder="�������ֻ�����">
			<input onclick="sendbtn(this,100);" type="button" data="phone" value="��ȡ��֤��" id="Sendbtn">

			</dd>    
		</dl>

		<dl>
			<dd>
				<em class="password"></em>
				<input class="text login-input" type="text" lay-verify="vcode" autocomplete="off" name="vcode" placeholder="�ֻ���֤��">
			</dd>    
		</dl>
	</div>
	<dl class="captcha_box">
		<dd><input type="submit" class="fontyh" id="login_submit_button" value="������¼">
		
		</dd>    
	</dl>

	<dl>
		<dd class="link">
			<div class="left Big-ICheckbox RememberMe">
				<label>
					<i></i>��ס��
				</label>
			</div>
			<a class="right" href="../reg/getmm.php" target="_blank">�������룿</a>
		</dd>
	</dl>

	<dl>
		<h4><i></i><span>�õ������˺�ֱ�ӵ�¼</span></h4>
		<dd class="three-login">
			<a class="icons" href="<?=weburl?>config/qq/oauth/index.php"></a>
			<a class="icons" id="wechat"></a>
			<a class="icons" id="alipay"></a>
			<a class="icons" id="sina"></a>
			<a class="icons" id="baidu" style="margin-right:0"></a>
		</dd>
	</dl>
	<dl>
		<dd>
		<a class="reg-tips" href="../reg/reg.php" target="_blank">��û�˺ţ�30�룬���ɼ��뻥վ��</a>
		</dd>    
	</dl>
</div>	<input type="hidden" value="login" name="jvs" />

</form>
  <script language="javascript">
  <? for($i=1;$i<=2;$i++){?>
  $('#t<?=$i?>').bind('input propertychange', function() {
   if(document.getElementById("t<?=$i?>").value==""){document.getElementById("t<?=$i?>").className="inp1 bg<?=$i?>";}else{document.getElementById("t<?=$i?>").className="inp1";}
  });
  <? }?>
  <? if($_GET[t]=="err"){?>
  objdis("ts","");objhtml("ts","�ʺ������������󣬷�������");objdis("xuan","none");
  <? }elseif($_GET[t]=="jy"){?>
  objdis("ts","");objhtml("ts","�����ʺ��ѱ�����");objdis("xuan","none");
  <? }?>
  </script>
  <? }?>

</body></html>