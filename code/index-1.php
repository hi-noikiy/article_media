<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<?=$seokey?>">
<meta name="description" content="<?=$seodes?>">
<title><?=$tit?> - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/jquery.m.js"></script><script language="javascript" src="static/js/layui.js"></script><script language="javascript" src="static/js/common.js"></script><script language="javascript" src="static/js/market.js"></script><link href="static/css/market.css" rel="stylesheet" type="text/css" /><script language="javascript" src="static/js/tipso.min.js"></script>



 <!--[if IE 6]>
 <script src="../js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script> 
 <script type="text/javascript"> 
 DD_belatedPNG.fix('*'); 
 </script> 
 <![endif]-->


</head>
<body>

<? include("../tem/top--.html");?>
	<? include("../tem/tongepzhu.html");?>
<script language="javascript">topjconc(1,'��Ʒ');document.getElementById("topt").value="<?=$skey?>";</script>

<div class="main rowElem">
<!--�б�ʼ-->
<div class="list_left">
<!--��߿�ʼ-->
<style>

</style>
	<div class="screen_box">
		<div class="screen_switch">
			<div class='screen_alink'>
				<a class="curr">
					<i class='web'></i>
					<span>��վ����</span>
				</a>
				<div class='line'></div>
				<a href="/entrust/">
					<i class='web'></i>
					<span>�ٷ�����</span>
				</a>
				<div class='line'></div>
				<a href='#'>
					<i></i>
					<span>��վ��</span>
				</a>
			</div>
			<div class='screen_count'>
				��ǰ����<em<span id="jgcount"></span></em>����վ
			</div>
		</div>
				<div class="screen_lists">
				
				
				
		<div class='screen_list'><div class='screen_name'><i id='isx-151'></i><span>����</span>��</div><div class='screen_con'>
		<? while1("*","epzhu_typewz where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$row1[id]?>v.html" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="screen_default"<? }else{?> class=""<? }?>><?=$row1[type1]?></a>
		<? }?>
		</div></div>
		
		 <? 
 $si=0;
 $sbarr=array();
 while1("*","epzhu_typesxwz where admin=1 and typeid=".$ty1id." and ifsel=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ev="e".$row1[id]."_";
 $sbarr[$si]=$ev;
 ?>
		
		
		<div class='screen_list'><div class='screen_name'><i id='isx-154'></i><span>�۸�</span>��</div><div class='screen_con'>
		
		<? while2("*","epzhu_typesxwz where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <a href="<?=rentser($ev,$row2[id],'','');?>" <? if(check_in("_".$ev.$row2[id]."v",$getstr)){?> class="screen_default"<? }else{?> class="g_ac0"<? }?>><?=$row2[name2]?></a>
 <? }?>
		
		
		
		</div></div>
		 <? 
 $si++;
 }
 for($si=0;$si<count($sbarr);$si++){if(returnsx($sbarr[$si])!=-1){$nsx="xcf".returnsx($sbarr[$si])."xcf";$ses=$ses." and tysx like '%".$nsx."%'";}}
 ?>
		


		</div>
	</div>

	<div class="sort_box left" id='layer_top'>
		<dl class='sort_top'>
			<div class="sort_order left">
								<a  class="curr">�ۺ�</a>
								<a href="/order/time">����</a>
								<a href="/order/ip">����</a>
								<a href="/order/br">Ȩ��</a>
								<a href="/order/am">�۸�</a>
							</div>
			<div class="sort_input left">
				<div class="sort_money">
					<ul>
						<li>
							<input data='am' placeholder="��" type="text" value="">
						</li>
						<li class="sep">-</li>
						<li>
							<input data='dm' placeholder="��" type="text" value="">
						</li>
						<li>
							<button class="submit shopso" type="button">ȷ��</button>
						</li>
					</ul>
				</div>
				<div class="sort_search">
					<input data="key" type="text" value="" id="keys">
					<button class="submit shopso" type="button">ȷ��</button>
				</div>
			</div>
			<div class="sort_page right">
				<a href="javascript:void(0);" id='l'><i class="icons"></i></a>
				<span class="b">1</span>
				<span>/ 47</span>
				<a href="javascript:void(0);" id="r" ><i class="icons"></i></a>
			 </div>
			<div class="sort_checkbox"  style='padding:12px;'>
				<a onclick="location.href='/sold/1'"/>
					<em></em>
				</a>
							<a onclick="location.href='/bond/1'"/><i class='icons'></i>�����⸶</a>
						</div>
		</dl>
	</div> 
	<div class="wlist">
		<div class="list_items">
								<dl>
					<dt>
								<em>��700</em>
								<span>
					www.ysxt8.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3783/" target="_blank">
								<img src="static/picture/1535440404443.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>��վ����һ�� ����� ϵͳ����վ��������������ͷ�ɼ�����ɽϵͳ��??www.ysxt8.com��ϵ? ? ? ?qq 201542412�ǳ�����? лл</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3783/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.ysxt8.com" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3783/" target="_blank">								һ��Ư����ϵͳ����վ��վ����							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1524121538883.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>���ƾ�Ʒ</b></p>"  src="//iu.huzhan.com/sign/1524121538883.jpg!t40"/>
								<cite class='left'>IP��100��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="153543957910" title="����鿴����վ������ͳ��" t-bg="#71a3f5">&#xe6b1;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��2.5��</em>
								<span>
					www.6an888.top</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3937/" target="_blank">
								<img src="static/picture/1544586150916.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>��������Ϣ��ʱ�䣺2021��4��16�� 00:00 �������ã������� 2��4G 1�״��� Windows Server  2008 R2 ��ҵ�� 64λ���İ� ����1�����ݣ�...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3937/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.6an888.top" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3937/" target="_blank">								����Դ�뽻���̳ǣ�֧�ֵ�������ǩ��ֵ����֧����,֧���Զ�����ϵͳ��֧���̼���פ����...							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1526175243260.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>��Ʒ��Ȥ��</b></p>"  src="//iu.huzhan.com/sign/1526175243260.jpg!t40"/>
								<cite class='left'>IP��100��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="154458400867" title="����鿴����վ������ͳ��" t-bg="#71a3f5">&#xe6b1;</em>								<cite class="note_icon left"><a class="tips" T-w="300" title="�Ѽ����������̼��ѽ��ɱ�֤�� <b style=color:#FCF302>300.00</b> Ԫ<br>������ʧ�ܣ��˿�����������֧�������⸶��" target=_blank href="https://www.huzhan.com/protection/"><i class="protect">��</i></a></cite>		
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��1��</em>
								<span>
					www.ken74.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3940/" target="_blank">
								<img src="static/picture/1544711490552.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>ios��ҵǩ��������https://www.ken74.com/����վ��������վԭ�����±Ƚ϶࣬������д��</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3940/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.ken74.com" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3940/" target="_blank">								ios��ҵǩ����վ����							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1534487498250.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>ios��ҵǩ��</b></p>"  src="//iu.huzhan.com/sign/1534487498250.jpg!t40"/>
								<cite class='left'>IP��1000��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154471051465" title="�鿴����վͳ�ƽ�ͼ���� <b>1</b> �ţ�">&#xe6b5;</em>								<cite class="note_icon left"><a class="tips" T-w="300" title="�Ѽ����������̼��ѽ��ɱ�֤�� <b style=color:#FCF302>300.00</b> Ԫ<br>������ʧ�ܣ��˿�����������֧�������⸶��" target=_blank href="https://www.huzhan.com/protection/"><i class="protect">��</i></a></cite>		
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��1500</em>
								<span>
					www.vipaikan.cn</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3920/" target="_blank">
								<img src="static/picture/1543808710372.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>����ӰԺ�����˴��һ��Ӱ����վ�������˵���ֱ�������ֲ��ţ���Ӱ�����߲���������һ���Ӱ����վ���ǳ�����ǰ����...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3920/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.vipaikan.cn" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3920/" target="_blank">								����Ӱ����վ���ۣ��кܴ����ֵ�ռ�							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/none.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>Ӱ����վ����</b></p>"  src="//iu.huzhan.com/sign/none.jpg!t40"/>
								<cite class='left'>IP��100��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154380739851" title="�鿴����վͳ�ƽ�ͼ���� <b>1</b> �ţ�">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��12��</em>
								<span>
					www.songzifc.cn</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3892/" target="_blank">
								<img src="static/picture/1541585323955.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>SZ��ҵԴ����www.songzifc.cn����վ���ۣ�����+������+���ݣ�ת���嵥���ռ�+����+��վȫ�ף������ȥ����ֱ����Ӫ׬Ǯ������...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3892/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.songzifc.cn" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3892/" target="_blank">								��ҵԴ����www.songzifc.cn������+������+��վ���ݣ�							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1511142234749.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>������ҵԴ����</b></p>"  src="//iu.huzhan.com/sign/1511142234749.jpg!t40"/>
								<cite class='left'>IP��100��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154158504299" title="�鿴����վͳ�ƽ�ͼ���� <b>1</b> �ţ�">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��500</em>
								<span>
					www.a5ym.cn</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3886/" target="_blank">
								<img src="static/picture/1541256576698.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>����Դ���̳ǣ�www.a5ym.cn���ͼ۳���ת���嵥���ռ�+����+��վȫ�ף������ȥ����ֱ����Ӫ׬Ǯ������ҵ����չ����Ͼ����...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3886/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.a5ym.cn" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3886/" target="_blank">								www.a5ym.cn����Դ���̳�							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1511142234749.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>������ҵԴ����</b></p>"  src="//iu.huzhan.com/sign/1511142234749.jpg!t40"/>
								<cite class='left'>IP��100��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154125646551" title="�鿴����վͳ�ƽ�ͼ���� <b>1</b> �ţ�">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��2��</em>
								<span>
					www.tukebbs.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3919/" target="_blank">
								<img src="static/picture/1543548109248.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>�ÿ�Դ������������������Ϣ����վ������Ϣ��Դ�����ֻ���&nbsp; ����֧�� ��Ա���� ���һ���QQ��¼&nbsp; ͳͳȫ��ģ�</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3919/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.tukebbs.com" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3919/" target="_blank">								����վԴ����-��ҵԴ����-�ÿ�Դ����-��Ա����-����֧��							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1543235206809.png!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>�þ�Դ����</b></p>"  src="//iu.huzhan.com/sign/1543235206809.png!t40"/>
								<cite class='left'>IP��3000��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="154354782286" title="����鿴����վ������ͳ��" t-bg="#71a3f5">&#xe6b1;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��1500</em>
								<span>
					www.i5432.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3882/" target="_blank">
								<img src="static/picture/1540777622732.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>��վ�����������վ����Ʒ�ѱ��������Զ��ɼ������ֻ��档�Ʒ��������������������������������&nbsp;http://www.i5432.com��...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3882/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.i5432.com" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3882/" target="_blank">								�������վ����Ʒ�ѱ��������Զ��ɼ������ֻ���							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1524121538883.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>���ƾ�Ʒ</b></p>"  src="//iu.huzhan.com/sign/1524121538883.jpg!t40"/>
								<cite class='left'>IP��100��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="154077692937" title="����鿴����վ������ͳ��" t-bg="#71a3f5">&#xe6b1;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��6000</em>
								<span>
					www.52kvip.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3945/" target="_blank">
								<img src="static/picture/1544865092154.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>��ƻ��ϵͳ��ĵ�Ӱ��վ�������Զ�������Ƶ��Ŀǰ�����������������棬���ϵ����ҡ�</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3945/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.52kvip.com" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3945/" target="_blank">								�ᰮ��Ӱ������ѿ�vip��Ӱ����վ����							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1504709794528.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>ССС׬</b></p>"  src="//iu.huzhan.com/sign/1504709794528.jpg!t40"/>
								<cite class='left'>IP��1900��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154486473088" title="�鿴����վͳ�ƽ�ͼ���� <b>2</b> �ţ�">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��2��</em>
								<span>
					www.92kvip.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3704/" target="_blank">
								<img src="static/picture/1531365800153.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>�����Զ��ɼ�����ĿǰIP3000���ٶ��������������У��ѹ������������ǳ��ã�ÿ��������û�ͨ���������������վ������...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3704/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.92kvip.com" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3704/" target="_blank">								�Զ��ɼ���Ӱ��վ�ͼ۳���							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1504709794528.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>ССС׬</b></p>"  src="//iu.huzhan.com/sign/1504709794528.jpg!t40"/>
								<cite class='left'>IP��3000��BR��3 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="153136497280" title="�鿴����վͳ�ƽ�ͼ���� <b>2</b> �ţ�">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��900</em>
								<span>
					izplin.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3944/" target="_blank">
								<img src="static/picture/1544820895822.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>������վ����ƻ��cms�ں˵�Ӱ������dy.izplin.com? ? ? ? ? ? ? ? ? ? ? ���г�����100Ԫ���ڸ�������ϵͳ��Ҳ�����ã���c...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3944/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://izplin.com" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3944/" target="_blank">								����Ʒ����!����������Ȩ�ɲ顿���ºƿղ���ģ��+���ֲ�����+������+����+����3����վ							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1499133574304.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>ʥ������Ƽ�</b></p>"  src="//iu.huzhan.com/sign/1499133574304.jpg!t40"/>
								<cite class='left'>IP��100��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="154481924994" title="����鿴����վ������ͳ��" t-bg="#71a3f5">&#xe6b1;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��4500</em>
								<span>
					www.tuitaow.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3028/" target="_blank">
								<img src="static/picture/1497256653683.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>�����й�ƽ̨�����ܵ�������������פ��������������Ʒ���磺Դ�뽻�ף���棬**�ȳ�ȡ20%�ֳɣ�ϵͳ�����÷ֳɵ㣩����...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3028/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.tuitaow.com" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3028/" target="_blank">								��ҵ���������й�ƽ̨,���ֿ���Ӫ����������������������							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1465777190180.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>΢΢����</b></p>"  src="//iu.huzhan.com/sign/1465777190180.jpg!t40"/>
								<cite class='left'>IP��100��BR��1 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="149725644462" title="����鿴����վ������ͳ��" t-bg="#71a3f5">&#xe6b1;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��3000</em>
								<span>
					www.erbaobao.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3914/" target="_blank">
								<img src="static/picture/1543543883913.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>�۹�ϵͳ�������ƺţ�����֤����ͬ����������ƺ��Զ����Ͳ��</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3914/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.erbaobao.com" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3914/" target="_blank">								7��������ĸӤ������վ���ۣ������ƺ�ȫ�Զ�����							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/none.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>99����</b></p>"  src="//iu.huzhan.com/sign/none.jpg!t40"/>
								<cite class='left'>IP��100��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154354346230" title="�鿴����վͳ�ƽ�ͼ���� <b>1</b> �ţ�">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��1000</em>
								<span>
					www.mingnai.net</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3915/" target="_blank">
								<img src="static/picture/1543551181889.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>�۹�ϵͳ������ͷ�ɼ�����ȫ�Զ����ƺ����Ͳ��������˫ƴ�����׼��䣬���ڱ���û��ʱ������ֵͼ۳��ۡ�</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3915/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.mingnai.net" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3915/" target="_blank">								˫ƴ��������վ�ͼ۳���							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/none.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>99����</b></p>"  src="//iu.huzhan.com/sign/none.jpg!t40"/>
								<cite class='left'>IP��100��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154355101455" title="�鿴����վͳ�ƽ�ͼ���� <b>1</b> �ţ�">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��800</em>
								<span>
					www.0563dw.com</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3830/" target="_blank">
								<img src="static/picture/1536910520309.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>�Ա���è�Ż݄����°汾+�ֻ���+��ҳ��+PC������һ����վԴ��۸�����������һ������ˣ�������������</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3830/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.0563dw.com" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3830/" target="_blank">								�Ա���è�Ż݄����˹������Ա�����վԴ�룩���ƣ���Ʒ��							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1537138624410.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>С����֮��</b></p>"  src="//iu.huzhan.com/sign/1537138624410.jpg!t40"/>
								<cite class='left'>IP��1000��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="153691035737" title="����鿴����վ������ͳ��" t-bg="#71a3f5">&#xe6b1;</em>								<cite class="note_icon left"><a class="tips" T-w="300" title="�Ѽ����������̼��ѽ��ɱ�֤�� <b style=color:#FCF302>300.00</b> Ԫ<br>������ʧ�ܣ��˿�����������֧�������⸶��" target=_blank href="https://www.huzhan.com/protection/"><i class="protect">��</i></a></cite>		
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��6500</em>
								<span>
					www.bjkkb.com.cn</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3844/" target="_blank">
								<img src="static/picture/1537927076833.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>���ֻ��棬���ɼ����ֶ��ɼ�/�Զ��ɼ�������ת�� ����ֱ����Ӫ �������Ͷ��?ӯ��ģʽ�� 1.�Ա���Ӷ��5%~55%�� 2.�����...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3844/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.bjkkb.com.cn" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3844/" target="_blank">								˫ʮһ�Ż�ȯ������һ ���ֻ�վ ���ɼ�							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/m1464798215286.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>��Ѱ���װ</b></p>"  src="//iu.huzhan.com/sign/m1464798215286.jpg!t40"/>
								<cite class='left'>IP��500��BR��1 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="153792671031" title="�鿴����վͳ�ƽ�ͼ���� <b>3</b> �ţ�">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��1800</em>
								<span>
					kangri.wang</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3906/" target="_blank">
								<img src="static/picture/1543027841690.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>û���ͳ�ƴ��������λҲ���ǰ�����վ�������</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3906/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://kangri.wang" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3906/" target="_blank">								��Ӱ��վ ������ĵ� ����Ӧ ˫ƴ����							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/m1464798215286.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>��Ѱ���װ</b></p>"  src="//iu.huzhan.com/sign/m1464798215286.jpg!t40"/>
								<cite class='left'>IP��100��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154302761660" title="�鿴����վͳ�ƽ�ͼ���� <b>1</b> �ţ�">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��660</em>
								<span>
					www.kanwx.net</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3939/" target="_blank">
								<img src="static/picture/1544666071266.jpg">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>��վ����һ�������С˵��վ����Ʒ�������Զ��ɼ����£����ֻ��档����ѧ�� http://www.kanwx.net�ֻ��� http://m.kanwx.netQQ:8626...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3939/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.kanwx.net" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3939/" target="_blank">								��վ����һ�������С˵��վ���Զ��ɼ����£����ֻ���							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1524121538883.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>���ƾ�Ʒ</b></p>"  src="//iu.huzhan.com/sign/1524121538883.jpg!t40"/>
								<cite class='left'>IP��100��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips links" id="154466582471" title="����鿴����վ������ͳ��" t-bg="#71a3f5">&#xe6b1;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��3000</em>
								<span>
					www.gvemr.cn</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3943/" target="_blank">
								<img src="static/picture/1544823190265.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>վ̫�� Ҳ�ܲ�������Ҳûɶ�ɽ��ܵ� �Լ�����ַ��&nbsp;</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3943/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.gvemr.cn" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3943/" target="_blank">								����**,���**,**Դ��,������**����վ!							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1531842099892.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>Դ�뿧</b></p>"  src="//iu.huzhan.com/sign/1531842099892.jpg!t40"/>
								<cite class='left'>IP��200��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154482293722" title="�鿴����վͳ�ƽ�ͼ���� <b>1</b> �ţ�">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
							<dl>
					<dt>
								<em>��300</em>
								<span>
					www.wiymsc.cn</span>
					</dt>
						<dd>
						<div class="pic">
							<a href="https://web.huzhan.com/3887/" target="_blank">
								<img src="static/picture/1541256650695.png">
							</a>
							<div class='ly'>
								<span></span>
								<span class='cdes'>���͵�Ӱ��վ��www.wiymsc.cn���ͼ۳���ת���嵥���ռ�+����+��վȫ�ף������ȥ����ֱ����Ӫ׬Ǯ������ҵ����չ����Ͼ����...</span>
								<cite>
									<a class='webinfo' href='https://web.huzhan.com/3887/' target="_blank" title='�鿴��վ����'><em>&#xe630;</em>�鿴����</a>
									<a class='weburl' href="http://www.wiymsc.cn" target="_blank" rel="nofollow" title='ֱ�������վ'><em>&#xe664;</em>�����վ</a>
								</cite>
							</div>
						</div><a class="tit" href="https://web.huzhan.com/3887/" target="_blank">								��Ӱȫվ���� �Զ��ɼ�+��Ա�շ�							</a>
						<div class="info">
						
								<img class="pic_Layer tips" target="_blank"  T-fc='#333' T-bg='#fff' T-cr='#333' T-pos='right' T-bc='#ddd'  T-bw='3px' T-w='126'  title="<img src='static/picture/1511142234749.jpg!t100' width=100 height=100><p style='line-height:16px;padding:8px 0 0 0'><b>������ҵԴ����</b></p>"  src="//iu.huzhan.com/sign/1511142234749.jpg!t40"/>
								<cite class='left'>IP��100��BR��0 </cite>
								<cite class='right'>
								<em class="see_stats tips " id="154125631222" title="�鿴����վͳ�ƽ�ͼ���� <b>1</b> �ţ�">&#xe6b5;</em>										
								</cite>
						</div>
					</dd>
				 </dl>
			 
		</div>
	</div>
 
	<div id="page" total="47"><ul><li class="ohave">1</li><li><a href="/page/2" data-page="2">2</a></li><li><a href="/page/3" data-page="3">3</a></li><li><a href="/page/4" data-page="4">4</a></li><a href="/page/47" data-page="47">... 47</a></ul></div>	</div>
	<div class='list_right'>
		<div class="lrtop">
			<div class="lrtop_help">
				<dl class='tit'>
					<cite>
					<a class="curr">��Ұ���</a>
					<a class="">���Ұ���</a>
					</cite>
				</dl>
				<dl class="post">
					<div>
						<a class="curr"><em><i class='iconfont'>&#xe6de;</i></em><p>��ι���</p></a>
						<a class=""><em><i class='iconfont'>&#xe6df;</i></em><p>����ջ�</p></a>
						<a class=""><em><i class='iconfont' style='font-size: 28px;line-height: 33px;'>&#xe818;</i></em><p>��������</p></a>
					</div>
					<div class='hide'>
							<a class="curr"><em><i class='iconfont'>&#xe6de;</i></em><p>��γ���</p></a>
							<a class=""><em><i class='iconfont'>&#xe6df;</i></em><p>��η���</p></a>
							<a class=""><em><i class='iconfont' style='font-size: 28px;line-height: 33px;'>&#xe818;</i></em><p>���׹���</p></a>
					</div>
				</dl>	
			</div>
			<div class='lrtop_help' style='padding:18px 0;'>
				<a href='//www.huzhan.com/entrusts/' target='_blank'><img src='static/picture/ds.gif'></a>
			</div>
			<div class='lrtop_xu'>
				<dl class='tit'>
					<em></em> <span>��վ����</span>
				</dl>
				<dl class="box scroll-box" times='3000' items='3'>
					<ul>
					
						<li>
								<a href="https://demand.huzhan.com/6595/" target="_blank" title='��һ��Ӱ���ڵ�Դ�룬���ܴϵͳ��Ҳ�У���΢�� 2631870682'>
									<i>ϣ��1</i><b>@���</b> 
									<div>��һ��Ӱ���ڵ�Դ�룬���ܴϵͳ��Ҳ�У���΢�� 2631870682</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6573/" target="_blank" title='�ո�����ӪVpay�������̳ǣ������ּ���'>
									<i>��˹�ٷ�</i><b>@���</b> 
									<div>�ո�����ӪVpay�������̳ǣ������ּ���</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6566/" target="_blank" title='��һ�ݷ���˽���վ'>
									<i>����͢</i><b>��600</b> 
									<div>��һ�ݷ���˽���վ</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6552/" target="_blank" title='��������ģ����̳���վ'>
									<i>�������׷����</i><b>��10000</b> 
									<div>��������ģ����̳���վ</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6526/" target="_blank" title='���ʦר�õ�����վ����'>
									<i>ZHENYUNZHE</i><b>@���</b> 
									<div>���ʦר�õ�����վ����</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6503/" target="_blank" title='h5Դ���������е�Դ��'>
									<i>��dasd</i><b>@���</b> 
									<div>h5Դ���������е�Դ��</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6501/" target="_blank" title='��������Ҫ����360���ر�����������M��'>
									<i>����֮��</i><b>��3000</b> 
									<div>��������Ҫ����360���ر�����������M��</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6499/" target="_blank" title='��һ�����Ǻ�ԣ���Ϸ'>
									<i>�ܵ»�</i><b>��2000</b> 
									<div>��һ�����Ǻ�ԣ���Ϸ</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6496/" target="_blank" title='���Žӿ��޸�.���Է������ŵ�'>
									<i>һ��Ī���</i><b>��500</b> 
									<div>���Žӿ��޸�.���Է������ŵ�</div>
								</a>
								</li>
											
						<li>
								<a href="https://demand.huzhan.com/6439/" target="_blank" title='��Ƶ��վ���������û�Ա�շѣ�'>
									<i>���</i><b>@���</b> 
									<div>��Ƶ��վ���������û�Ա�շѣ�</div>
								</a>
								</li>
											
					</ul>
				</dl>
				<dl class='post'><a href='https://my.huzhan.com/reg/' target="_blank"><i class='icons i-post'></i><span>��������</span></a><a href='https://demand.huzhan.com/web/' target="_blank"><i class='icons i-all'></i><span>ȫ������</span></a></dl>
			 </div>
		</div>
	</div>	
</div>
<div class="bottom">
	<div class="main">
		<div class="footer">
			<div class="footer-nav left">
					<dl>
						<dt>���ָ��</dt>
						<dd>
							<p><a href="https://www.huzhan.com/help/view/1?z81" target="_blank" rel="nofollow">��ι���</a></p>
							<p><a href="https://www.huzhan.com/help/view/15" target="_blank" rel="nofollow">������Ʒ</a></p>
							<p><a href="https://www.huzhan.com/help/list/26" target="_blank" rel="nofollow">������ʽ</a></p>
							<p><a href="https://www.huzhan.com/help/view/50" target="_blank" rel="nofollow">���֧��</a></p>
						</dd>
					</dl>
					<dl>
						<dt>����ָ��</dt>
						<dd>
							<p><a href="https://www.huzhan.com/help/list/14" target="_blank" rel="nofollow">�̼�Э��</a></p>
							<p><a href="https://www.huzhan.com/help/list/16" target="_blank" rel="nofollow">��������</a></p>
							<p><a href="https://www.huzhan.com/help/list/17" target="_blank" rel="nofollow">��������</a></p>
							<p><a href="https://www.huzhan.com/help/view/65" target="_blank" rel="nofollow">�շѱ�׼</a></p>
						</dd>
					</dl>
					<dl>
						<dt>��ȫ����</dt>
						<dd>
							<p><a href="https://www.huzhan.com/help/view/57" target="_blank" rel="nofollow">�����ƭ</a></p>
							<p><a href="https://www.huzhan.com/help/view/80" target="_blank" rel="nofollow">��������</a></p>
							<p><a href="https://www.huzhan.com/help/view/81" target="_blank" rel="nofollow">����թƭ</a></p>
							<p><a href="https://www.huzhan.com/protection/" target="_blank" rel="nofollow">���ѱ���</a></p>
						</dd>
					</dl>
					<dl>
						<dt>��������</dt>
						<dd>
							<p><a href="https://www.huzhan.com/help/view/8" target="_blank" rel="nofollow">���ע��</a></p>
							<p><a href="https://www.huzhan.com/help/list/7" target="_blank" rel="nofollow">��������</a></p>
							<p><a href="https://www.huzhan.com/help/view/15" target="_blank" rel="nofollow">��������</a></p>
							<p><a href="https://www.huzhan.com/help/view/58" target="_blank" rel="nofollow">��������</a></p>
						</dd>
					</dl>
					<dl>
						<dt>��������</dt>
						<dd>
							<p><a href="https://my.huzhan.com/central/certification" target="_blank" rel="nofollow">��֤����</a></p>
							<p><a href="https://my.huzhan.com/central/security" target="_blank" rel="nofollow">�˻���ȫ</a></p>
							<p><a href="https://my.huzhan.com/lists/cashed/" target="_blank" rel="nofollow">���ֲ�ѯ</a></p>
							<p><a href="//bbs.huzhan.com/post/suggest" target="_blank" rel="nofollow">Ͷ�߽���</a></p>
						</dd>
					</dl>
				
			</div>
			<div class="footer-contact right">
					<dl class="left">
						<b>����ͷ�</b>
						<p>QQ��<a style='color:#007de4;' target="_blank" title="��ϵ�ͷ�QQ" class="service-qq" href="	
						http://crm2.qq.com/page/portalpage/wpa.php?uin=4008853986&cref=https%3A%2F%2Fid.b.qq.com%2Fcrm%2Findex.php%3Frr%3Dwpa&ref=https%3A%2F%2Fid.b.qq.com%2Fcrm%2Findex.php%3Frr%3Dwpa%2Fstyle%26id%3Dwpa_setting_a01&pt=undefined&f=1&ty=1&ap=&as=&aty=0&a=" rel="nofollow">4008853986</a></p>
						<p>�绰��0551-63836297</p>
						<p>���䣺kefu@huzhan.com</p>
						<p>ʱ�䣺9:00-23:00</p>
					</dl>
					<div class="left">
						<span><img src="static/picture/wechat_code.jpg" width="100" height="100"></span>
						<p>��վ�ٷ�΢��</p>
					</div>
				</div>

		</div>
		<div class="footer-link">
				<div class="footer-link-a left">
					<p><a href="https://www.huzhan.com/html/about/" target="_blank" rel="nofollow">��������</a>  
					<a href="https://www.huzhan.com/html/about/ads" target="_blank" rel="nofollow">������</a> 
					<a href="https://www.huzhan.com/html/about/lxwm" target="_blank" rel="nofollow">��ϵ����</a> 
					<a href="https://www.huzhan.com/html/about/yinsi" target="_blank" rel="nofollow">��˽����</a> 
					<a href="https://www.huzhan.com/html/about/mianze" target="_blank" rel="nofollow" title=6>��������</a> 
					<a href="https://www.huzhan.com/html/about/map" target="_blank" rel="nofollow">��վ��ͼ</a> |<em>&nbsp;&nbsp;&nbsp;? 2009-2017 Huzhan.com ��Ȩ���� </em> </p>
					<cite>���ջ�������Ƽ����޹�˾ | ��ICP��14008076��-1 | �������34010202600118��</cite>
				</div>
				<div class="footer-link-i right">
					<a key="549be5a0c274e72498ca6b18" target="_blank" rel="nofollow" logo_size="124x47" logo_type="realname" href="https://v.yunaq.com/certificate?domain=www.huzhan.com"><img src="static/picture/yunaqgw.png" height="40"></a>
					<a id="_pingansec_bottomimagesmall_hangye" href="http://si.trustutn.org/info?sn=696151023018102817576&amp;certType=1" target="_blank" rel="nofollow"><img src="static/picture/hangye_bottom_small.png"></a>
					<a key="549be5a0c274e72498ca6b18" target="_blank" rel="nofollow" logo_size="124x47" logo_type="realname" href="http://www.cn-ecusc.org.cn/cert/aqkx/site/?site=www.huzhan.com"><img src="static/picture/kx_124x47.jpg" height="40"></a>
					<a id="_pinganTrust" target="_blank" rel="nofollow" href="http://c.trustutn.org/s/huzhan.com"><img src="static/picture/cert_40_1.png" height="40"></a>
					<a id="_pinganTrust" target="_blank" rel="nofollow" href="http://www.yundun.com"><img src="static/picture/yd_124x47.jpg" height="40"></a>
				</div>
			</div>

	</div>
</div>

<script type="text/javascript" src="static/js/adec6b2cd7ca4ab59276b0bcb59c14f8.js" charset="UTF-8"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?eba69878d464d1cba0610b2a3e86b8dc";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<div class='fixed-right' style='_right:330px;'>
	<div class='fixed-main'>
		<div class='fixed-right-bg'></div>
		<div class='fixed-tab'>
			<div class='fixed-tab-top'>
				<cite data-click='my' data-rtime='0' class='click-cite'>
					<a class='i'><i class='fi-my'></i><p>�ҵ�</p></a>
					<div class='i-bg'></div><div class='i-bgy'></div>
				</cite>
				
				<cite data-click='message' data-rtime='0' class='click-cite'>
					<a class='i'><i class='fi-message'></i><p>��Ϣ</p>
						<span class="message-count">
													</span>
					</a>
					<div class='i-bg'></div><div class='i-bgy'></div>
				</cite>
				<cite data-click='browse' data-rtime='0' class='click-cite'>
					<a class='i'><i class='fi-browse'></i><p>�㼣</p></a>
					<div class='i-bg'></div><div class='i-bgy'></div>
				</cite>
				<cite data-click='cart' data-rtime='0' class='click-cite'>
					<a class='i'><i class='fi-cart'></i><p>��<br>��<br>��</p>
						<span class="cart-count">
													</span>
					</a>
					<div class='i-bg'></div><div class='i-bgy'></div>
				</cite>
				</div><div class="fixed-tab-bottom simple-box">				<cite hover='1'>
					<a class='i'><i class='fi-service'></i><p>�ͷ�</p></a>
					<div class='i-bg'></div>
					<div class='i-bgy'></div>
					<div class="fixed-hover-box fixed-service-box">
						<h3><b>��վ�ٷ��ͷ�</b></h3>
						<div class='fixed-service-list'>
							<p><span>�ͷ�QQ��</span><a class="service-qq" href="http://crm2.qq.com/page/portalpage/wpa.php?uin=4008853986&cref=https%3A%2F%2Fid.b.qq.com%2Fcrm%2Findex.php%3Frr%3Dwpa&ref=https%3A%2F%2Fid.b.qq.com%2Fcrm%2Findex.php%3Frr%3Dwpa%2Fstyle%26id%3Dwpa_setting_a01&pt=undefined&f=1&ty=1&ap=&as=&aty=0&a=" target="_blank" title="��ϵ�ͷ�QQ" rel="nofollow">
							4008853986</a></p>
							
							<p>
							<span>�ͷ��绰��</span>0551-63836297
							</p>
							<p>
							<span>�ͷ����䣺</span>kefu@huzhan.com
							</p>
							<p class='gray'>�����������Ͷ�ߡ��ٱ����ʺš��ʽ��ƽ̨ʹ�����⣻<br>
							��Ʒ��������ѯ����Ʒ����ҳ������ʾ���̼ҿͷ�QQ��</p>
						</div>
					</div>	
				</cite>
				<cite hover='1'>
					<a class='i fixed-stretch'><i class='fi-stretch'></i></a>
					<div class='i-bg'></div>
					<div class='i-bgy'></div>
					<div class="fixed-hover-box fixed-stretch-box">
						<h3><em>����ģʽ</em><span>����ģʽ</span></h3>
					</div>	
				</cite>
							</div>			<div class='fixed-tab-gotop'>
				<cite class='gotop' hover='1'>
					<a class='i'><i class='fi-gotop'></i></a>
					<div class='i-bg'></div>
					<div class='i-bgy'></div>
					<div class="fixed-hover-box fixed-gotop-box">
						<h3>���ض���</h3>
					</div>
				</cite>
			</div>
		</div>
		<div class='fixed-click'>
		    <div class="fixed-click-box fixed-login-box">
				<h3>���ȵ�¼</h3>
				<div class='fixed-login'>
					<div class='fixed-list-bt'></div>
				</div>				
			</div>	
			<div class="fixed-click-box fixed-browse-box">
				<h3>
					<strong>�����¼</strong>
					<a class='refresh' title='ˢ�£���ҳ��'><i></i></a>
					<div class="action">
						<a class="browse_empty" title="��������¼">��ռ�¼</a>
					</div>
				</h3>
				<div class='fixed-browse-list fixed-list'>
					<div class='fixed-list-bt'></div>
					<div id='list'>
					</div>
					<div class='fixed-list-bt'></div>
				</div>
				<div class='fixed-click-bottom'>
					<div class="info">
					<span>����¼100������ǰ��<b id='count'>0</b>��</span>
					</div>
					<div class="sort_page right">
						<a href="javascript:void(0);" id="l" data-ajax='browse'><i class="icons"></i></a>
						<span class="b" id='curr-page'>1</span>
						<span>/</span>
						<span id='total-page'>1</span>
						<a href="javascript:void(0);" id="r" data-ajax='browse'><i class="icons"></i></a>
					</div>
				</div>
			</div>				
			<div class="fixed-click-box fixed-cart-box">
				<h3>
					<strong>���ﳵ</strong>
					<a class='refresh' title='ˢ�£���ҳ��'><i></i></a>
					<div class="action">
						<a href="https://my.huzhan.com/cart/" title="ȫ���鿴���ﳵ">ȫ��</a>
						<a class="cart_empty" title="��չ��ﳵ">���</a>
					</div>
					<div class="sort_page right">
						<a href="javascript:void(0);" id="l" data-ajax='browse'><i class="icons"></i></a>
						<span class="b" id='curr-page'>1</span>
						<span>/</span>
						<span id='total-page'>0</span>
						<a href="javascript:void(0);" id="r" data-ajax='browse'><i class="icons"></i></a>
					</div>
				</h3>
				<div class='fixed-cart-list fixed-list'>
					<div class='fixed-list-bt'></div>
					<form class="layui-form" cart=1>
						<div class="cart" id='list'>
						</div>	
						<div id="cartdata">
						</div>
						<div class='fixed-click-bottom cartNav'>
							<cite><input name="cartxuan" type="checkbox" lay-filter="cart" lay-skin='cart' value="1" checked="checked"> </cite>
							<div class="info">
							<b id="myjifen" class='hide'>0</b>
							<span>ѡ��<em id="allnumber">0</em>�����ϼ� <b>��<b id="allmoney">0</b></b></span>
							</div>
							<a onclick="carjs()" class="cartjs" title='����ѡ����Ʒ'>����</a><a class='form_render'></a>
						</div>		
					</form>
				</div>
			</div>		
			
			<div class="fixed-click-box fixed-message-box">
				<h3>
					<strong>վ����Ϣ</strong>
					<a class='refresh' title='ˢ�£���ҳ��'><i></i></a>
					<div class="action">
						<a href="https://my.huzhan.com/lists/message" title="ȫ���鿴">ȫ���鿴</a>
						<a class="message_empty" title="ȫ����Ϊ�Ѷ�">ȫ����Ϊ�Ѷ�</a>
					</div>
				</h3>
				<div class='fixed-message-list fixed-list'>
					<div class='fixed-list-bt'></div>
					<div id='list'>
					</div>
					<div class='fixed-list-bt'></div>
				</div>
				<div class='fixed-click-bottom'>
					<div class="info">
					<span>��ǰ��<b id='count'>0</b>����Ϣ</span>
					</div>
					<div class="sort_page right">
					<a href="javascript:void(0);" id="l" data-ajax='message'><i class="icons"></i></a>
					<span class="b" id='curr-page'>1</span>
					<span>/</span>
					<span id='total-page'>0</span>
					<a href="javascript:void(0);" id="r" data-ajax='message'><i class="icons"></i></a>
					</div>
				</div>					
			</div>	
			<div class="fixed-click-box fixed-my-box ">
				<h3>
					<strong>�ҵ���Ϣ</strong>
					<a class='refresh' data-time='' title='ˢ�£���ҳ��'><i></i></a>
					<div class="action">
						<a class="logout" onclick="UCheck('ajax_logout')">�˳���¼</a>
					</div>
				</h3>
				<div class='fixed-my fixed-list'>
					<div class='fixed-list-bt'></div>
					<dt>
						<div id='sign'><a class='sign'></a></div>
						<a href="https://my.huzhan.com/setup/info" id='avatar'><img src="static/picture/none.jpg"></a>
						<span>
						<p id='name'>���ã���ӭ������վ��</p>
						<p><em>��<a id="money" href="https://my.huzhan.com/lists/money">0.00</a> Ԫ</em></p>
						<p><em>���֣�<a id='jifen' href="https://my.huzhan.com/lists/jifen">0</a> ����</em></p>
						</span>
					</dt>
					<dd>
						<a>
							<b>������</b>
							<em id='buy-info-number'>0</em>
						</a>
						<a>
							<b>���뽻��</b>
							<em id='buy-deal-number'>0</em>
						</a>
						<a>
							<b>������Ʒ</b>
							<em id='sale-info-number'>0</em>
						</a>
						<a>
							<b>�۳�����</b>
							<em id='sale-deal-number'>0</em>
						</a>
					</dd>
					<nav>
						<a href="https://my.huzhan.com/onpay/" class='first'><i class='a-1'>&#xe68e;</i><p>��ֵ</p>  </a>
						<a href="https://my.huzhan.com/form/cashed" class='first'><i class='a-2'>&#xe706;</i><p>����</p>  </a>
						<a href="https://my.huzhan.com/lists/money" class='first'><i class='a-3'>&#xe695;</i><p>��Ŀ</p> </a>
						<a href="https://my.huzhan.com/lists/fav" class='first'><i class='a-4'>&#xe693;</i><p>�ղ�</p> </a>
						<a href="https://my.huzhan.com/central/security"><i class='a-5'>&#xe69b;</i><p>��ȫ</p> </a>
						<a href="https://my.huzhan.com/central/certification"><i class='a-6'>&#xe501;</i><p>��֤</p></a>
						<a href="https://my.huzhan.com/demand/ing"><i class='a-7'>&#xe690;</i><p>����</p></a>
						<a href="https://my.huzhan.com/custom/"><i class='a-8'>&#xe69d;</i><p>����</p></a>
					</nav>
					<div class='fixed-list-bt'></div>
				</div>
			</div>
		</div>	
		<div class='fixed-loading'>
			<span><i></i></span>
		</div>	
	</div>
</div>
</body>
</html>