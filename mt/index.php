<?
include("../config/conn.php");
include("../config/function.php");
$u=str_replace("http://","",weburl);
$u=str_replace("https://","",$u);
?>
<html>
<div class="yjcode"><? adwhile("ADTOP");?></div>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>�ֻ��津������ҳ��</title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function anzhuot(){
layer.open({
  type: 1,
  title: "�����ֻ�ɨ�����¶�ά��",
  closeBtn: 1,
  shadeClose: true,
  area: ['264px', '310px'],
  content: '<img src="<?=weburl?>tem/getqr.php?u=<?=weburl?>mt/anzhuo.php&size=7" />'
});
}
</script>
</head>
<body>
<? include("../tem/top--.html");?><? include("../tem/tongepzhu.html");?>


<div class="bfb bfb1 fontyh">
<div class="yjcode">

 <ul class="u1">
 <li class="l1">�ֻ���ҳ�����</li>
 <li class="l2"><a href="<?=weburl?>m" target="_blank"><?=$u?>m</a></li>
 <li class="l3">���ֻ�������ĵ�ַ���������ַ <span class="red"><?=$u?>m</span> ��ֱ�ӷ����ֻ���</li>
 </ul>

 <ul class="u3">
 <li class="l1">����·�ͼ������APP</li>
 <li class="l2"><a href="javascript:void(0);" onClick="anzhuot()" class="a1"></a></li>
 </ul>

 <ul class="u2">
 <li class="l1">ɨ���ά��ֱ�ӷ���</li>
 <li class="l2"><img src="<?=weburl?>tem/getqr.php?u=<?=weburl?>m&size=5" /></li>
 </ul>
 
</div>
</div>

<div class="yizhanw"> <div class="yizhanw2"><? include("../tem/bottom.html");?></div> </div>
</body>
</html>