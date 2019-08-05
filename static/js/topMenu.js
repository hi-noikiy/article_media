function async_topMenu(object) {
    //避免鼠标触发时，前面的ajax尚未执行完毕
    $(object).children("div").html('<img src="/images/default/icon_loading.gif" title="数据加载中" style="width:32px; height:32px; padding:20px 0 20px 240px;">');
    if (running) {
        return false;
    }
    running = true;
}
var running = false;//是否在运行中
var delay = 200;
var allCateTimer = null;


$('div#nav > ul > li').hover(
    function(ev){
        var $this = this;
        allCateTimer = setTimeout(function() {
            var bottomHeight = document.documentElement.clientHeight - ev.clientY;
            
            if (bottomHeight <= 250) {
                $($this).addClass('over').find('div.submenubox').addClass('submenuboxBottom').removeClass('disn');
            } else {
                $($this).addClass('over').find('div.submenubox').removeClass('submenuboxBottom').removeClass('disn');
            }
            //兼容IE6隐藏所有select 元素
            $("select").each(function() {
              if ($(this).css('visibility') != 'hidden') {
                $(this).addClass('menuVisible').css('visibility', 'hidden');
              }
            });
            if ($($this).find("div").size()<= 0) {
                async_topMenu($this);
            }
        }, delay);
    },
    function(){
        var $this = this;
        if (allCateTimer) {
            clearTimeout(allCateTimer);
        }
        allCateTimer = setTimeout(function() { 
            $($this).removeClass('over').find('div.submenubox').addClass('disn');}, delay);
    }
);