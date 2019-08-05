$(document).ready(function() {
	$("#code_hot dl:first").addClass("dropList-hover");
	$("#code_hot dl").mouseover(function() {
		$("#code_hot dl.dropList-hover").removeClass("dropList-hover");
		$(this).addClass("dropList-hover")
	});
	$(".shop-evaluation-label label").on("click", function() {
		var a = $(this).attr("data").split("|");
		$(".shop-evaluation-score p").each(function(b) {
			$(this).html(a[b])
		})
	});
	0 < $(".shop_nav a").length && 0 < $(".shop_nav a[href='" + location.href + "']").length && $(".shop_nav a[href='" + location.href + "']").addClass("cur");
	$("#shop_search").click(function() {
		var a = "";
		$(this).closest("div").find(":text").each(function() {
			"" != $(this).val() && (a += $(this).attr("name") + "/" + $(this).val() + "/")
		});
		if ("" == a) return layer.alert("亲，至少需要输入1项搜索内容！", {
			icon: 0
		}, function(a) {
			$("#shop_key").focus();
			layer.close(a)
		}), !1;
		location.href = $("input:radio[name='good_type']:checked").val() + a
	});
	$("#sobid").click(function() {
		var a = $(this).closest("ul").find(":text");
		if ("" == a.val()) return layer.alert("亲，请输入要搜索的投标号！", {
			icon: 0
		}, function(b) {
			a.focus();
			layer.close(b)
		}), !1;
		selist(0, Number(a.val()));
		$("#sobid_reset").show();
		$("#sobid_reset,.filter-comment label").click(function() {
			$(".bid_tit :text").val("");
			$("#sobid_reset").hide();
			"sobid_reset" == $(this).attr("id") && selist()
		})
	});
	$("#brand_button[data-number]").click(function() {
		$.get("/html/claimed/" + $(this).data("number"), function(a) {
			layer.open({
				type: 1,
				title: !1,
				shade: [.3, "#000"],
				area: ["420px"],
				content: a
			})
		})
	});
	$(".cartadd").live("click", function(a) {
		var b = $(this),
			c = b.attr("id"),
			d = b.attr("mode"),
			f = b.attr("title"),
			e = b.attr("data"),
			g = b.attr("scene");
		if (0 == d) return layer.confirm(("code" != g ? '<b style="color:blue">购买前请确保您已与卖家沟通确认了交易商品细节！</b><p style="color:#666;">否则不建议您直接购买，避免当前商品卖家已停售或售出！</p>' : '<b style="color:blue">该商品需商家【手动发货】，请确认已与商家取得联系！</b><p style="color:#666;">若商家不在线，不建议您购买，以免长时间等待其发货！</p>') + '<div class="layui-layer-btn layui-layer-btn-" style="position: absolute;left:0;bottom: 0;padding:0;width:100%;"><a class="layui-layer-btn0 cartadd" id="' + c + '" title="' + f + '" data="' + e + '" info="' + b.attr("info") + '">' + f + '</a><a class="layui-layer-btn1" target="_blank">联系商家</a></div>', {
			icon: 0,
			area: ["450px", "185px"],
			btn: !1
		}, function(a) {
			layer.close(a)
		}, function(a) {
			layer.close(a);
			SellContact()
		}), !1;
		Aform("cartadd", "action=" + e + "&info=" + $(this).attr("info"), function(b) {
			if (-2 == b.state && "undefined" == typeof b.info) return layer_login("再继续", c);
			"add" == e && 1 == b.state ? $.ajax({
				url: "//statics.huzhan.com/js/jquery.fly.min.js",
				dataType: "script",
				cache: !0
			}).done(function() {
				var b = $(".cart-count").offset(),
					c = $(".G-image").attr("src");
				$('<img style="display:block;width:50px;height:50px;border-radius:50px;position:fixed;z-index:9999" src="' + c + '">').fly({
					start: {
						left: a.clientX,
						top: a.clientY - 40
					},
					end: {
						left: b.left + 20,
						top: b.top - $(".fixed-tab").offset().top + 30,
						width: 0,
						height: 0
					},
					onEnd: function() {
						var a = parseInt($(".cart-count em").html()),
							b = $(".click-cite[data-click=cart]");
						$(".cart-count").html("<em>" + (isNaN(a) ? 1 : a + 1) + "</em>");
						$(".cartadd[data=add]").hide().siblings().removeAttr("mode").addClass("cart_in");
						b.data("rtime", 0);
						this.destory()
					}
				})
			}) : Rs(b)
		})
	});
	$(".report").click(function() {
		layer.load();
		$.get("/html/report", {
			good: $(this).attr("good"),
			number: $(this).attr("number")
		}, function(a) {
			layer_ly(a, !1, !0, "800px")
		})
	});
	$(".clist dt,.wlist .pic").mouseenter(function() {
		var a = $(this);
		enter = setTimeout(function() {
			a.find(".ly").show()
		}, 300)
	}).mouseleave(function() {
		clearTimeout(enter);
		$(this).find(".ly").hide()
	});
	$(".list .slist").hover(function() {
		$(this).addClass("slcur")
	}, function() {
		$(this).removeClass("slcur")
	});
	$(".tlist ul,.tasklist ul").hover(function() {
		$(this).addClass("curr")
	}, function() {
		$(this).removeClass("curr")
	});
	$(".fw_a").hover(function() {
		$(this).addClass("fw_on");
		$(this).siblings().removeClass("fw_on");
		var a = $(".fw_a").index($(this));
		$(".fw_txt cite").hide();
		$(".fw_txt cite").eq(a).show();
		$(this).hasClass("tpay") && $(this).find("i").html("&#xe659;")
	}, function() {
		if (!$(this).hasClass("tpay")) return !1;
		$(".fw_txt cite").hide();
		$(this).removeClass("fw_on");
		$(this).find("i").html("&#xe658;")
	});
	$(".wlqq").click(function() {
		$(this).next().find("a:first").click()
	});
	$(".Jqnav a").on("click", function() {
		$(this).addClass("curr").siblings().removeClass("curr");
		$($(this).parent().parent().next().children().get($(this).index())).removeClass("hide").siblings().addClass("hide")
	});
	$(".demo").click(function() {
		if (1 == $(this).attr("tips")) return !0;
		$.post("/html/demo/", {
			U: this.href,
			M: $(this).attr("mode")
		}, function(a) {
			layer_ly(a, !1, !1, "495px")
		});
		return !1
	});
	$(".sort_page a:not([data-ajax])").click(function() {
		var a = $("#page .ohave"),
			b = $(this).attr("id");
		a = ("l" == b ? a.prev() : a.next()).find("a");
		if (0 >= a.length) return layer.alert("亲，已经是" + ("l" == b ? "第一" : "最后一") + "页啦！", {
			icon: 5
		}), !1;
		location.href = a.attr("href")
	});
	$(".sort_page a[data-ajax]").click(function() {
		var a = parseInt($(this).siblings("#curr-page").html()),
			b = parseInt($(this).siblings("#total-page").html());
		a = "l" == $(this).attr("id") ? a - 1 : a + 1;
		if (a > b || 0 >= a) return layer.alert("亲，已经是" + (a < b ? "第一" : "最后一") + "页啦！", {
			icon: 5
		});
		fixed_tool(a)
	});
	$(".sort_select dl").hover(function() {
		var a = $(this).attr("data");
		a = $(this).find("a[data='" + a + "']");
		(0 >= a.length ? $(this).find("a:first") : a).addClass("curr");
		$(this).addClass("curr").siblings("dl").removeClass("curr");
		$(this).find("dd").show()
	}, function() {
		$(this).removeClass("curr").find("dd").hide()
	});
	$(".lrtop cite  a").click(function() {
		$(this).addClass("curr").siblings().removeClass("curr").closest("dl").next(".post").find("div:eq(" + $(this).index() + ")").removeClass("hide").siblings().addClass("hide")
	});
	$(".shopso").click(function() {
		var a = $(this).closest("div");
		if (0 >= a.find('input[value!=""]').length) return layer.alert("亲，搜索内容不能为空！", {
			icon: 5
		}, function(b) {
			a.find("input:eq(0)").focus();
			layer.close(b)
		}), !1;
		var b = window.location.pathname.split("/"),
			c = $.inArray("page", b);
		0 < c && b.splice(c, 2);
		$.each($('.sort_input :text[data!=""],.jsearch :text[data!=""]'), function(a, c) {
			a = $(c).attr("data");
			c = $.trim($(c).val());
			var d = $.inArray(a, b);
			"" == c ? 0 < d && b.splice(d, 2) : 0 < d ? b[d + 1] = c : b.push(a, c)
		});
		b = $.grep(b, function(a) {
			return 0 < a.length
		});
		$url = b.join("/");
		location.href = "/" + $url
	})
});
$(".j-number a").live("click", function() {
	var a = $(this).parent().find(".j-number-input"),
		b = parseInt(a.attr("maxval")),
		c = $(this).attr("class");
	c = parseInt(a.val()) + ("up" == c ? 1 : -1);
	0 > c || 0 == b ? a.val(0) : 0 >= c && 0 != b ? a.val(1) : 0 > b ? a.val(9999 > c ? c : 9999) : c > b ? a.val(b) : a.val(c);
	Jtotal()
});
$(".j-number-input").live("blur", function() {
	var a = parseInt($(this).attr("maxval")),
		b = parseInt($(this).val());
	b = 0 < b ? b : 1;
	0 > b || 0 == a ? $(this).val(0) : 0 >= b && 0 != a ? $(this).val(1) : 0 > a ? $(this).val(9999 > b ? b : 9999) : b > a ? $(this).val(a) : $(this).val(b);
	Jtotal()
});

function Jtotal() {
	var a = $(".jifen_cart input[name=piece]");
	if (0 == a.length) return !1;
	var b = $("input[name=j-jifen]").val(),
		c = $("input[name=j-money]").val(),
		d = parseFloat($(".my-money").html()),
		f = parseInt($(".my-jifen").html());
	a = a.val();
	var e = $("input[name=paytype]:checked").val(),
		g = $(".lay-submit");
	if (0 < b) if (b *= a, b <= f) $(".lj-jifen").html(b + "积分");
	else {
		$(".lj-jifen").html('（积分不足<font color="red">' + b + "</font>积分，无法兑换）");
		var h = 1
	}
	if (0 < c) if (a *= c, a <= d) $(".lj-money").html(a + "元");
	else {
		$(".lj-money").html('（余额不足<font color="red">' + a + '</font>元，请先<a href="<?=weburl?>onpay/' + a + '" class="blue" target="_blank">充值</a>）');
		var k = 1
	}
	"jm" == e && (1 == h || 1 == k) || "j" == e && 1 == h || "m" == e && 1 == k ? g.attr("disabled", !0).addClass("layui-btn-disabled") : g.attr("disabled", !1).removeClass("layui-btn-disabled")
}
$(".upbid").live("click", function() {
	var a = $(this).attr("id");
	$.post("/html/upbid", {
		number: a
	}, function(b) {
		if (-2 == b) return layer_lp("查看统计", a), !1;
		layer_ly(b, " ", !1)
	})
});
$(".outbid").live("click", function() {
	var a = $(this);
	layer.confirm("<b>您确定要<font color=red>淘汰此标</font>吗？</b><br><font color=#999999>淘汰后该投标无法再修改和选中标！</font>", {
		icon: 3
	}, function(b) {
		Aform("outbid", "number=" + a.attr("number"), function(b) {
			1 == b.state ? a.closest("li").empty().closest("dt").find(".bicon").html('<i class="out"><font style="font-size:16px;">&#xe64b;</font>淘汰</i>') : Rs(b)
		});
		layer.close(b)
	})
});
$(".sobid").live("click", function() {
	scTop(".layui-form");
	$("input[name=sobid]").val($(this).html());
	$("#sobid").click()
});
$(".computing_act i:not(.no)").live("click", function() {
	var a = $("#p_number").val(),
		b = 1;
	"sub" == $(this).attr("data") && (b = -1);
	a = parseInt(a) + b;
	$("#p_number").val(a);
	1 >= a ? $(".computing_act i[data='sub']").addClass("no") : $(".computing_act i[data='sub']").removeClass("no")
});
$("#p_down,#p_up").live("click", function() {
	var a = $(this).attr("class"),
		b = $(this).attr("id"),
		c = parseInt($(".curPage").html());
	"no" != a && ($(".small_pages input[type=text]").val(""), gelist("p_up" == b ? c - 1 : c + 1))
});
$(".gopage").live("click", function() {
	var a = $(this).prev().val();
	a > parseInt($(".totalPage").html()) ? layer.alert("不能超过最大页数：" + $(".totalPage").html(), {
		icon: 0
	}) : 1 > a ? layer.alert("不能低于最小页数：1", {
		icon: 0
	}) : gelist(a)
});

function set_cur(a) {
	$(".c_r_menu em").hasClass("cur") && $(".c_r_menu em").removeClass("cur");
	$(".c_r_menu em" + a).addClass("cur")
}
function getPageBar(a, b) {
	$("#p_up,#p_down").addClass("no");
	1 < a && $("#p_up").removeClass("no");
	a < b && $("#p_down").removeClass("no")
}
$(".ICheckbox:not([data-input]) label,.Big-ICheckbox:not([data-input]) label").live("click", function() {
	$(this).toggleClass("IChecked")
});
$(".IRadio label,.Big-IRadio label").live("click", function() {
	$(this).addClass("IChecked").siblings("label").removeClass("IChecked")
});
$(".filter-comment label").live("click", function() {
	selist()
});
gelist = function(a, b, c) {
	a = a || 0;
	1 < a && scTop("#c_bb", 45);
	$.ajax({
		type: "POST",
		url: "/apage/",
		async: !0,
		data: "list=geva&pro=" + readmeta("Item-Number") + "&good=" + readmeta("Pg-Type") + "&page=" + a,
		dataType: "json",
		success: function(a) {
			$.each(a, function(a, b) {
				$("." + a).empty();
				$("." + a).html(b)
			});
			getPageBar(a.curPage, a.totalPage);
			$(".c_r_menu").menu_layer();
			layer_photos()
		},
		error: function() {
			layer.msg("加载失败，请重试！");
			layer.close(loading);
			return !1
		}
	})
};
selist = function(a, b) {
	a = a || 0;
	var c = readmeta("Pg-Type");
	b = b || $(".filter-comment .IChecked").attr("data");
	1 < a && scTop("#shop_pg_scTop", 140);
	$.ajax({
		type: "POST",
		url: "/apage/",
		async: !0,
		data: "list=" + c + "&bh=" + readmeta("Item-Number") + "&filter=" + b + "&page=" + a,
		dataType: "json",
		success: function(a) {
			$.each(a, function(a, b) {
				$("." + a).empty();
				$("." + a).html(b)
			});
			"bid" != c ? layer_photos() : getPageBar(a.curPage, a.totalPage)
		},
		error: function() {
			layer.msg("加载失败，请重试！");
			return !1
		}
	})
};
$.fn.extend({
	layer_top: function() {
		var a = $(this).offset().top + 40,
			b = $(this);
		$(window).scroll(function() {
			$(window).scrollTop() > a ? b.addClass("fixed") : b.removeClass("fixed")
		})
	}
});
$.fn.extend({
	menu_layer: function() {
		var a = $("#c_aa").offset().top,
			b = $("#c_bb").offset().top,
			c = $("#c_cc").offset().top;
		$(window).scroll(function() {
			var d = $(this).scrollTop() + 46;
			d >= c ? set_cur(".c_cc") : d >= b ? set_cur(".c_bb") : d >= a && set_cur(".c_aa")
		});
		$(".c_r_menu em:not([a])").click(function() {
			var a = $(this).attr("class").replace(/cur/, "");
			$("html,body").scrollTop($("#" + a).offset().top - 43);
			$(this).addClass("cur").siblings("em").removeClass("cur")
		})
	}
});
$.fn.extend({
	insertAtCaret: function(a) {
		var b = $(this)[0];
		if (document.selection) this.focus(), sel = document.selection.createRange(), sel.text = a, this.focus();
		else if (b.selectionStart || "0" == b.selectionStart) {
			var c = b.selectionStart,
				d = b.selectionEnd,
				f = b.scrollTop;
			b.value = b.value.substring(0, c) + a + b.value.substring(d, b.value.length);
			this.focus();
			b.selectionStart = c + a.length;
			b.selectionEnd = c + a.length;
			b.scrollTop = f
		} else this.value += a, this.focus()
	}
});
$(".exchange-btn a:not(.not)").live("click", function() {
	layer.load();
	var a = $(this),
		b = $(this).attr("number");
	Aform("u", "", function(c) {
		if (-2 == c.state) return layer_login("兑换", "." + a.attr("class")), layer.closeAll("loading"), !1;
		$.post("/deal/exchange", {
			number: b,
			piece: $("input[name=piece]").val()
		}, function(a) {
			layer_ly(a, "兑换", !1, "700px")
		})
	})
});
$(".demo_box .layui-btn").live("click", function() {
	layer.closeAll();
	return $(this).hasClass("demo_web") ? !0 : SellContact()
});
function anzhuang(x,y){
layer.open({
  type: 2,
  area: ['600px', '580px'],
  title:["安装服务详情","text-align:left"],
  skin: 'layui-layer-title', //加上边框
  content:['../tem/check.php?admin='+x+"&id="+y, 'no'] 
});
}
