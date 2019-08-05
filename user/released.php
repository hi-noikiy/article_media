
<script type="text/javascript">
$("#newdk").live('click',function() {
if (!!$("#newdk").attr("checked")) {
$(".released a").attr("target","_blank");
}else{
$(".released a").attr("target","_self");
}
});
</script>
<style>
.released{float:left;width:440px;border:#ddd 1px solid;padding:40px 60px;background:#fff;}
.released div{background:#fff;float:left;width:100%;text-align:center;}
.released a{color:#3E98E2;float:left;margin:20px 0 0 20px ;padding:20px 35px;border:#CDE4F6 1px solid;font-size:28px;-moz-border-radius:6px;
-webkit-border-radius:6px;
border-radius: 6px;background:#EDF6FE;width:118px;}
.released a:hover{border:#C3DDF2 1px solid;background:#E4F3FF;color:#2387da;}
.released .buy a{color:#FF8521;border:#ffe0cc 1px solid;background:#fff8f4;}
.released .buy a:hover{border:#FACAAB 1px solid;background:#fff3e8;color:#f60;}
.released div.r_tisp{color:#666;font-size:22px;}
.released p{float:right;margin-right:20px;color:#666;}
.released i{float:left;background:url(http://static.928vip.cn/img/released_ico.png) 2px 0 no-repeat;width:50px;height:40px; }
.released span{float:left;line-height:40px;width:68px;}
.released .sale i.code{background-position:-2px -45px;}
.released .sale i.doamin{background-position:-58px -45px;}
.released .sale i.web{background-position:-58px 0;}
.released .buy i.code{background-position:-2px -135px;}
.released .buy i.doamin{background-position:-58px -135px;}
.released .buy i.web{background-position:-58px -90px;}
.released .buy i.task{background-position:0 -90px;}
</style>

<?if($_GET['type']=='sale'){?>
<div class="released">
<div class="r_tisp">请选择要出售的商品类型
</div>
<div class=<?=$_GET['type']?>>
<a href="http://163.928vip.cn/user/productlx.php"><i class="code"></i><span>源码</span></a>
<a href="http://163.928vip.cn/task/taskadd.php"><i></i><span>服务</span></a>
</div>
<div class=<?=$_GET['type']?>>
<a href="http://163.928vip.cn/user/newslx.php"><i class="web"></i><span>投稿</span></a>
<a href="http://163.928vip.cn/user/gdlx.php"><i class="doamin"></i><span>工单</span></a>
</div>
<?}else{?>
<div class="released">
<div class="r_tisp">请选择要求购的信息类型
</div>
<div class=<?=$_GET['type']?>>
<a href="/user/productlx.php"><i class="code"></i><span>源码</span></a>
<a href="/task/taskadd.php"><i></i><span>服务</span></a>
</div>
<div class=<?=$_GET['type']?>>
<a href="/user/newslx.php"><i class="web"></i><span>投稿</span></a>
<a href="/user/gdlx.php"><i class="doamin"></i><span>工单</span></a>
	</div>
<?}?>

<div style="padding:10px 0;"><p><input name="" id="newdk" style="margin:-3px 3px 0 0;vertical-align:middle;" type="checkbox" value="" /><label for='newdk'>新窗口打开发布页面</label></p>
	</div>
	</div>