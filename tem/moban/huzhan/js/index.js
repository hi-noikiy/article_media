﻿(function(e) {
    var t = function(n, l) {
        var a = e.extend({},
        e.fn.nivoSlider.defaults, l),
        g = {
            currentSlide: 0,
            currentImage: "",
            totalSlides: 0,
            randAnim: "",
            running: !1,
            paused: !1,
            stop: !1
        },
        f = e(n);
        f.data("nivo:vars", g);
        f.css("position", "relative");
        f.addClass("nivoSlider");
        var k = f.children();
        k.each(function() {
            var d = e(this),
            h = "";
            d.is("img") || (d.is("a") && (d.addClass("nivo-imageLink"), h = d), d = d.find("img:first"));
            var b = d.width();
            0 == b && (b = d.attr("width"));
            var a = d.height();
            0 == a && (a = d.attr("height"));
            b > f.width() && f.width(b);
            a > f.height() && f.height(a);
            "" != h && h.css("display", "none");
            d.css("display", "none");
            g.totalSlides++
        });
        0 < a.startSlide && (a.startSlide >= g.totalSlides && (a.startSlide = g.totalSlides - 1), g.currentSlide = a.startSlide);
        e(k[g.currentSlide]).is("img") ? g.currentImage = e(k[g.currentSlide]) : g.currentImage = e(k[g.currentSlide]).find("img:first");
        e(k[g.currentSlide]).is("a") && e(k[g.currentSlide]).css("display", "block");
        f.css("background", 'url("' + g.currentImage.attr("src") + '") no-repeat');
        f.append(e('<div class="nivo-caption"><p></p></div>').css({
            display: "none",
            opacity: a.captionOpacity
        }));
        var t = function(d) {
            var h = e(".nivo-caption", f);
            if ("" != g.currentImage.attr("title") && void 0 != g.currentImage.attr("title")) {
                var b = g.currentImage.attr("title");
                "#" == b.substr(0, 1) && (b = e(b).html());
                "block" == h.css("display") ? h.find("p").fadeOut(d.animSpeed,
                function() {
                    e(this).html(b);
                    e(this).fadeIn(d.animSpeed)
                }) : h.find("p").html(b);
                h.fadeIn(d.animSpeed)
            } else h.fadeOut(d.animSpeed)
        };
        t(a);
        var m = 0; ! a.manualAdvance && 1 < k.length && (m = setInterval(function() {
            q(f, k, a, !1)
        },
        a.pauseTime));
        if (a.controlNav) {
            l = e('<div class="nivo-controlNav"></div>');
            f.append(l);
            for (var p = 0; p < k.length; p++) if (a.controlNavThumbs) {
                var r = k.eq(p);
                r.is("img") || (r = r.find("img:first"));
                a.controlNavThumbsFromRel ? l.append('<a class="nivo-control" rel="' + p + '"><img src="' + r.attr("rel") + '" alt="" /></a>') : l.append('<a class="nivo-control" rel="' + p + '"><img src="' + r.attr("src").replace(a.controlNavThumbsSearch, a.controlNavThumbsReplace) + '" alt="" /></a>')
            } else l.append('<a class="nivo-control" rel="' + p + '">' + (p + 1) + "</a>");
            e(".nivo-controlNav a:eq(" + g.currentSlide + ")", f).addClass("active");
            e(".nivo-controlNav a", f).live("click",
            function() {
                if (g.running || e(this).hasClass("active")) return ! 1;
                clearInterval(m);
                m = "";
                f.css("background", 'url("' + g.currentImage.attr("src") + '") no-repeat');
                g.currentSlide = e(this).attr("rel") - 1;
                q(f, k, a, "control")
            })
        }
        a.keyboardNav && e(window).keypress(function(d) {
            if ("37" == d.keyCode) {
                if (g.running) return ! 1;
                clearInterval(m);
                m = "";
                g.currentSlide -= 2;
                q(f, k, a, "prev")
            }
            if ("39" == d.keyCode) {
                if (g.running) return ! 1;
                clearInterval(m);
                m = "";
                q(f, k, a, "next")
            }
        });
        a.pauseOnHover && f.hover(function() {
            g.paused = !0;
            clearInterval(m);
            m = ""
        },
        function() {
            g.paused = !1;
            "" != m || a.manualAdvance || (m = setInterval(function() {
                q(f, k, a, !1)
            },
            a.pauseTime))
        });
        f.bind("nivo:animFinished",
        function() {
            g.running = !1;
            e(k).each(function() {
                e(this).is("a") && e(this).css("display", "none")
            });
            e(k[g.currentSlide]).is("a") && e(k[g.currentSlide]).css("display", "block");
            "" != m || g.paused || a.manualAdvance || (m = setInterval(function() {
                q(f, k, a, !1)
            },
            a.pauseTime));
            a.afterChange.call(this)
        });
        var u = function(d, h, b) {
            for (var a = 0; a < h.slices; a++) {
                var c = Math.round(d.width() / h.slices);
                a == h.slices - 1 ? d.append(e('<div class="nivo-slice"></div>').css({
                    left: c * a + "px",
                    width: d.width() - c * a + "px",
                    height: "0px",
                    opacity: "0",
                    background: 'url("' + b.currentImage.attr("src") + '") no-repeat -' + (c + a * c - c) + "px 0%"
                })) : d.append(e('<div class="nivo-slice"></div>').css({
                    left: c * a + "px",
                    width: c + "px",
                    height: "0px",
                    opacity: "0",
                    background: 'url("' + b.currentImage.attr("src") + '") no-repeat -' + (c + a * c - c) + "px 0%"
                }))
            }
        },
        v = function(d, a, b) {
            for (var h = Math.round(d.width() / a.boxCols), c = Math.round(d.height() / a.boxRows), g = 0; g < a.boxRows; g++) for (var f = 0; f < a.boxCols; f++) f == a.boxCols - 1 ? d.append(e('<div class="nivo-box"></div>').css({
                opacity: 0,
                left: h * f + "px",
                top: c * g + "px",
                width: d.width() - h * f + "px",
                height: c + "px",
                background: 'url("' + b.currentImage.attr("src") + '") no-repeat -' + (h + f * h - h) + "px -" + (c + g * c - c) + "px"
            })) : d.append(e('<div class="nivo-box"></div>').css({
                opacity: 0,
                left: h * f + "px",
                top: c * g + "px",
                width: h + "px",
                height: c + "px",
                background: 'url("' + b.currentImage.attr("src") + '") no-repeat -' + (h + f * h - h) + "px -" + (c + g * c - c) + "px"
            }))
        },
        q = function(d, a, b, g) {
            var c = d.data("nivo:vars");
            c && c.currentSlide == c.totalSlides - 1 && b.lastSlide.call(this);
            if ((!c || c.stop) && !g) return ! 1;
            b.beforeChange.call(this);
            g ? ("prev" == g && d.css("background", 'url("' + c.currentImage.attr("src") + '") no-repeat'), "next" == g && d.css("background", 'url("' + c.currentImage.attr("src") + '") no-repeat')) : d.css("background", 'url("' + c.currentImage.attr("src") + '") no-repeat');
            c.currentSlide++;
            c.currentSlide == c.totalSlides && (c.currentSlide = 0, b.slideshowEnd.call(this));
            0 > c.currentSlide && (c.currentSlide = c.totalSlides - 1);
            e(a[c.currentSlide]).is("img") ? c.currentImage = e(a[c.currentSlide]) : c.currentImage = e(a[c.currentSlide]).find("img:first");
            b.controlNav && (e(".nivo-controlNav a", d).removeClass("active"), e(".nivo-controlNav a:eq(" + c.currentSlide + ")", d).addClass("active"));
            t(b);
            e(".nivo-slice", d).remove();
            e(".nivo-box", d).remove();
            "random" == b.effect && (a = "sliceDownRight sliceDownLeft sliceUpRight sliceUpLeft sliceUpDown sliceUpDownLeft fold fade boxRandom boxRain boxRainReverse boxRainGrow boxRainGrowReverse".split(" "), c.randAnim = a[Math.floor(Math.random() * (a.length + 1))], void 0 == c.randAnim && (c.randAnim = "fade")); - 1 != b.effect.indexOf(",") && (a = b.effect.split(","), c.randAnim = a[Math.floor(Math.random() * a.length)], void 0 == c.randAnim && (c.randAnim = "fade"));
            c.running = !0;
            if ("sliceDown" == b.effect || "sliceDownRight" == b.effect || "sliceDownRight" == c.randAnim || "sliceDownLeft" == b.effect || "sliceDownLeft" == c.randAnim) {
                u(d, b, c);
                var f = 0,
                h = 0;
                a = e(".nivo-slice", d);
                if ("sliceDownLeft" == b.effect || "sliceDownLeft" == c.randAnim) a = e(".nivo-slice", d)._reverse();
                a.each(function() {
                    var a = e(this);
                    a.css({
                        top: "0px"
                    });
                    h == b.slices - 1 ? setTimeout(function() {
                        a.animate({
                            height: "100%",
                            opacity: "1.0"
                        },
                        b.animSpeed, "",
                        function() {
                            d.trigger("nivo:animFinished")
                        })
                    },
                    100 + f) : setTimeout(function() {
                        a.animate({
                            height: "100%",
                            opacity: "1.0"
                        },
                        b.animSpeed)
                    },
                    100 + f);
                    f += 50;
                    h++
                })
            } else if ("sliceUp" == b.effect || "sliceUpRight" == b.effect || "sliceUpRight" == c.randAnim || "sliceUpLeft" == b.effect || "sliceUpLeft" == c.randAnim) {
                u(d, b, c);
                h = f = 0;
                a = e(".nivo-slice", d);
                if ("sliceUpLeft" == b.effect || "sliceUpLeft" == c.randAnim) a = e(".nivo-slice", d)._reverse();
                a.each(function() {
                    var a = e(this);
                    a.css({
                        bottom: "0px"
                    });
                    h == b.slices - 1 ? setTimeout(function() {
                        a.animate({
                            height: "100%",
                            opacity: "1.0"
                        },
                        b.animSpeed, "",
                        function() {
                            d.trigger("nivo:animFinished")
                        })
                    },
                    100 + f) : setTimeout(function() {
                        a.animate({
                            height: "100%",
                            opacity: "1.0"
                        },
                        b.animSpeed)
                    },
                    100 + f);
                    f += 50;
                    h++
                })
            } else if ("sliceUpDown" == b.effect || "sliceUpDownRight" == b.effect || "sliceUpDown" == c.randAnim || "sliceUpDownLeft" == b.effect || "sliceUpDownLeft" == c.randAnim) {
                u(d, b, c);
                var k = h = f = 0;
                a = e(".nivo-slice", d);
                if ("sliceUpDownLeft" == b.effect || "sliceUpDownLeft" == c.randAnim) a = e(".nivo-slice", d)._reverse();
                a.each(function() {
                    var a = e(this);
                    0 == h ? (a.css("top", "0px"), h++) : (a.css("bottom", "0px"), h = 0);
                    k == b.slices - 1 ? setTimeout(function() {
                        a.animate({
                            height: "100%",
                            opacity: "1.0"
                        },
                        b.animSpeed, "",
                        function() {
                            d.trigger("nivo:animFinished")
                        })
                    },
                    100 + f) : setTimeout(function() {
                        a.animate({
                            height: "100%",
                            opacity: "1.0"
                        },
                        b.animSpeed)
                    },
                    100 + f);
                    f += 50;
                    k++
                })
            } else if ("fold" == b.effect || "fold" == c.randAnim) u(d, b, c),
            h = f = 0,
            e(".nivo-slice", d).each(function() {
                var a = e(this),
                c = a.width();
                a.css({
                    top: "0px",
                    height: "100%",
                    width: "0px"
                });
                h == b.slices - 1 ? setTimeout(function() {
                    a.animate({
                        width: c,
                        opacity: "1.0"
                    },
                    b.animSpeed, "",
                    function() {
                        d.trigger("nivo:animFinished")
                    })
                },
                100 + f) : setTimeout(function() {
                    a.animate({
                        width: c,
                        opacity: "1.0"
                    },
                    b.animSpeed)
                },
                100 + f);
                f += 50;
                h++
            });
            else if ("fade" == b.effect || "fade" == c.randAnim) {
                u(d, b, c);
                var l = e(".nivo-slice:first", d);
                l.css({
                    height: "100%",
                    width: d.width() + "px"
                });
                l.animate({
                    opacity: "1.0"
                },
                2 * b.animSpeed, "",
                function() {
                    d.trigger("nivo:animFinished")
                })
            } else if ("slideInRight" == b.effect || "slideInRight" == c.randAnim) u(d, b, c),
            l = e(".nivo-slice:first", d),
            l.css({
                height: "100%",
                width: "0px",
                opacity: "1"
            }),
            l.animate({
                width: d.width() + "px"
            },
            2 * b.animSpeed, "",
            function() {
                d.trigger("nivo:animFinished")
            });
            else if ("slideInLeft" == b.effect || "slideInLeft" == c.randAnim) u(d, b, c),
            l = e(".nivo-slice:first", d),
            l.css({
                height: "100%",
                width: "0px",
                opacity: "1",
                left: "",
                right: "0px"
            }),
            l.animate({
                width: d.width() + "px"
            },
            2 * b.animSpeed, "",
            function() {
                l.css({
                    left: "0px",
                    right: ""
                });
                d.trigger("nivo:animFinished")
            });
            else if ("boxRandom" == b.effect || "boxRandom" == c.randAnim) {
                v(d, b, c);
                var m = b.boxCols * b.boxRows,
                f = h = 0;
                a = x(e(".nivo-box", d));
                a.each(function() {
                    var a = e(this);
                    h == m - 1 ? setTimeout(function() {
                        a.animate({
                            opacity: "1"
                        },
                        b.animSpeed, "",
                        function() {
                            d.trigger("nivo:animFinished")
                        })
                    },
                    100 + f) : setTimeout(function() {
                        a.animate({
                            opacity: "1"
                        },
                        b.animSpeed)
                    },
                    100 + f);
                    f += 20;
                    h++
                })
            } else if ("boxRain" == b.effect || "boxRain" == c.randAnim || "boxRainReverse" == b.effect || "boxRainReverse" == c.randAnim || "boxRainGrow" == b.effect || "boxRainGrow" == c.randAnim || "boxRainGrowReverse" == b.effect || "boxRainGrowReverse" == c.randAnim) {
                v(d, b, c);
                var m = b.boxCols * b.boxRows,
                n = f = h = 0,
                p = 0,
                q = [];
                q[n] = [];
                a = e(".nivo-box", d);
                if ("boxRainReverse" == b.effect || "boxRainReverse" == c.randAnim || "boxRainGrowReverse" == b.effect || "boxRainGrowReverse" == c.randAnim) a = e(".nivo-box", d)._reverse();
                a.each(function() {
                    q[n][p] = e(this);
                    p++;
                    p == b.boxCols && (n++, p = 0, q[n] = [])
                });
                for (a = 0; a < 2 * b.boxCols; a++) {
                    g = a;
                    for (var r = 0; r < b.boxRows; r++) 0 <= g && g < b.boxCols && (function(a, f, g, h, l) {
                        var k = e(q[a][f]),
                        m = k.width(),
                        n = k.height();
                        "boxRainGrow" != b.effect && "boxRainGrow" != c.randAnim && "boxRainGrowReverse" != b.effect && "boxRainGrowReverse" != c.randAnim || k.width(0).height(0);
                        h == l - 1 ? setTimeout(function() {
                            k.animate({
                                opacity: "1",
                                width: m,
                                height: n
                            },
                            b.animSpeed / 1.3, "",
                            function() {
                                d.trigger("nivo:animFinished")
                            })
                        },
                        100 + g) : setTimeout(function() {
                            k.animate({
                                opacity: "1",
                                width: m,
                                height: n
                            },
                            b.animSpeed / 1.3)
                        },
                        100 + g)
                    } (r, g, f, h, m), h++),
                    g--;
                    f += 100
                }
            }
        },
        x = function(a) {
            for (var d, b, e = a.length; e; d = parseInt(Math.random() * e), b = a[--e], a[e] = a[d], a[d] = b);
            return a
        },
        w = function(a) {
            this.console && "undefined" != typeof console.log && console.log(a)
        };
        this.stop = function() {
            e(n).data("nivo:vars").stop || (e(n).data("nivo:vars").stop = !0, w("Stop Slider"))
        };
        this.start = function() {
            e(n).data("nivo:vars").stop && (e(n).data("nivo:vars").stop = !1, w("Start Slider"))
        };
        a.afterLoad.call(this);
        return this
    };
    e.fn.nivoSlider = function(n) {
        return this.each(function(l, a) {
            l = e(this);
            if (l.data("nivoslider")) return l.data("nivoslider");
            a = new t(this, n);
            l.data("nivoslider", a)
        })
    };
    e.fn.nivoSlider.defaults = {
        effect: "random",
        slices: 15,
        boxCols: 8,
        boxRows: 4,
        animSpeed: 500,
        pauseTime: 3E3,
        startSlide: 0,
        directionNav: !0,
        directionNavHide: !0,
        controlNav: !0,
        controlNavThumbs: !1,
        controlNavThumbsFromRel: !1,
        controlNavThumbsSearch: ".jpg",
        controlNavThumbsReplace: "_thumb.jpg",
        keyboardNav: !0,
        pauseOnHover: !0,
        manualAdvance: !1,
        captionOpacity: .8,
        prevText: "Prev",
        nextText: "Next",
        beforeChange: function() {},
        afterChange: function() {},
        slideshowEnd: function() {},
        lastSlide: function() {},
        afterLoad: function() {}
    };
    e.fn._reverse = [].reverse
})(jQuery);
$(function() {
    function e(a) {
        var e = -a * n;
        $("#focus ul").stop(!0, !1).animate({
            left: e
        },
        300);
        $("#focus .btn span").stop(!0, !1).animate({
            opacity: "0.4"
        },
        300).eq(a).stop(!0, !1).animate({
            opacity: "1"
        },
        300)
    }
    $("#slider").nivoSlider({
        controlNav: !0
    });
    $(".sidebar_item dd").hover(function() {
        $(this).find(".sidebar_menu").addClass("sidebar_focus");
        $(this).find(".sidebar_popup").show(0)
    },
    function() {
        $(this).find(".sidebar_menu").removeClass("sidebar_focus");
        $(this).find(".sidebar_popup").hide(0)
    });
    $(".c_d_rank ul").hover(function() {
        $(this).addClass("cur").siblings().removeClass("cur")
    });
   
    $("#scrollDiv").Scroll({
        line: 1,
        speed: 500,
        timer: 3E3,
        up: "but_up",
        down: "but_down"
    });
    for (var n = $("#focus").width(), l = $("#focus ul li").length, a = 0, g, f = "<div class='btnBg'></div><div class='btn'>", k = 0; k < l; k++) f += "<span></span>";
    f += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
    $("#focus").append(f);
    $("#focus .btnBg").css("opacity", 0);
    $("#focus .btn span").css("opacity", .4).mouseenter(function() {
        a = $("#focus .btn span").index(this);
        e(a)
    }).eq(0).trigger("mouseenter");
    $("#focus .preNext").css("opacity", 0).hover(function() {
        $(this).stop(!0, !1).animate({
            opacity: "0.5"
        },
        300)
    },
    function() {
        $(this).stop(!0, !1).animate({
            opacity: "0.0"
        },
        300)
    });
    $("#focus .pre").click(function() {--a; - 1 == a && (a = l - 1);
        e(a)
    });
    $("#focus .next").click(function() {
        a += 1;
        a == l && (a = 0);
        e(a)
    });
    $("#focus ul").css("width", n * l);
    $("#focus").hover(function() {
        clearInterval(g)
    },
    function() {
        g = setInterval(function() {
            e(a);
            a++;
            a == l && (a = 0)
        },
        4E3)
    }).trigger("mouseleave")
});