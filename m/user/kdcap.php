<?
if($rowcontrol[ifsell]=="off"){
if(strstr($rowcontrol[shoprz],"xcf1xcf")){if($rowuser[ifmot]!=1){php_toheader("openshoprz.php");}}
if(strstr($rowcontrol[shoprz],"xcf2xcf")){if($rowuser[ifemail]!=1){php_toheader("openshoprz.php");}}
if(strstr($rowcontrol[shoprz],"xcf3xcf")){if($rowuser[sfzrz]!=1 && $rowuser[sfzrz]!=0){php_toheader("openshoprz.php");}}
}
?>
<div class="kdcap box">
 <div class="d1" id="step1">1.��������</div>
 <div class="d2"><img src="img/jianright.png" /></div>
 <div class="d1" id="step2">2.���ɷ���</div>
 <div class="d2"><img src="img/jianright.png" /></div>
 <div class="d1" id="step3">3.��˽��</div>
</div>
