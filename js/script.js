!function(a) {
    "function" == typeof define && define.amd ? define([ "jquery" ], a) : "object" == typeof exports ? module.exports = a : a(jQuery);
}(function(a) {
    function b(b) {
        var g = b || window.event, h = i.call(arguments, 1), j = 0, l = 0, m = 0, n = 0, o = 0, p = 0;
        if (b = a.event.fix(g), b.type = "mousewheel", "detail" in g && (m = -1 * g.detail), 
        "wheelDelta" in g && (m = g.wheelDelta), "wheelDeltaY" in g && (m = g.wheelDeltaY), 
        "wheelDeltaX" in g && (l = -1 * g.wheelDeltaX), "axis" in g && g.axis === g.HORIZONTAL_AXIS && (l = -1 * m, 
        m = 0), j = 0 === m ? l : m, "deltaY" in g && (m = -1 * g.deltaY, j = m), "deltaX" in g && (l = g.deltaX, 
        0 === m && (j = -1 * l)), 0 !== m || 0 !== l) {
            if (1 === g.deltaMode) {
                var q = a.data(this, "mousewheel-line-height");
                j *= q, m *= q, l *= q;
            } else if (2 === g.deltaMode) {
                var r = a.data(this, "mousewheel-page-height");
                j *= r, m *= r, l *= r;
            }
            if (n = Math.max(Math.abs(m), Math.abs(l)), (!f || f > n) && (f = n, d(g, n) && (f /= 40)), 
            d(g, n) && (j /= 40, l /= 40, m /= 40), j = Math[j >= 1 ? "floor" : "ceil"](j / f), 
            l = Math[l >= 1 ? "floor" : "ceil"](l / f), m = Math[m >= 1 ? "floor" : "ceil"](m / f), 
            k.settings.normalizeOffset && this.getBoundingClientRect) {
                var s = this.getBoundingClientRect();
                o = b.clientX - s.left, p = b.clientY - s.top;
            }
            return b.deltaX = l, b.deltaY = m, b.deltaFactor = f, b.offsetX = o, b.offsetY = p, 
            b.deltaMode = 0, h.unshift(b, j, l, m), e && clearTimeout(e), e = setTimeout(c, 200), 
            (a.event.dispatch || a.event.handle).apply(this, h);
        }
    }
    function c() {
        f = null;
    }
    function d(a, b) {
        return k.settings.adjustOldDeltas && "mousewheel" === a.type && b % 120 == 0;
    }
    var e, f, g = [ "wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll" ], h = "onwheel" in document || document.documentMode >= 9 ? [ "wheel" ] : [ "mousewheel", "DomMouseScroll", "MozMousePixelScroll" ], i = Array.prototype.slice;
    if (a.event.fixHooks) for (var j = g.length; j; ) a.event.fixHooks[g[--j]] = a.event.mouseHooks;
    var k = a.event.special.mousewheel = {
        version: "3.1.12",
        setup: function() {
            if (this.addEventListener) for (var c = h.length; c; ) this.addEventListener(h[--c], b, !1); else this.onmousewheel = b;
            a.data(this, "mousewheel-line-height", k.getLineHeight(this)), a.data(this, "mousewheel-page-height", k.getPageHeight(this));
        },
        teardown: function() {
            if (this.removeEventListener) for (var c = h.length; c; ) this.removeEventListener(h[--c], b, !1); else this.onmousewheel = null;
            a.removeData(this, "mousewheel-line-height"), a.removeData(this, "mousewheel-page-height");
        },
        getLineHeight: function(b) {
            var c = a(b), d = c["offsetParent" in a.fn ? "offsetParent" : "parent"]();
            return d.length || (d = a("body")), parseInt(d.css("fontSize"), 10) || parseInt(c.css("fontSize"), 10) || 16;
        },
        getPageHeight: function(b) {
            return a(b).height();
        },
        settings: {
            adjustOldDeltas: !0,
            normalizeOffset: !0
        }
    };
    a.fn.extend({
        mousewheel: function(a) {
            return a ? this.bind("mousewheel", a) : this.trigger("mousewheel");
        },
        unmousewheel: function(a) {
            return this.unbind("mousewheel", a);
        }
    });
}), function(a, b) {
    "function" == typeof define && define.amd ? define([ "jquery" ], function(a) {
        return b(a);
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(a.jQuery);
}(this, function(a) {
    !function() {
        "use strict";
        function b(b, d) {
            if (this.el = b, this.$el = a(b), this.s = a.extend({}, c, d), this.s.dynamic && "undefined" !== this.s.dynamicEl && this.s.dynamicEl.constructor === Array && !this.s.dynamicEl.length) throw "When using dynamic mode, you must also define dynamicEl as an Array.";
            return this.modules = {}, this.lGalleryOn = !1, this.lgBusy = !1, this.hideBartimeout = !1, 
            this.isTouch = "ontouchstart" in document.documentElement, this.s.slideEndAnimatoin && (this.s.hideControlOnEnd = !1), 
            this.s.dynamic ? this.$items = this.s.dynamicEl : "this" === this.s.selector ? this.$items = this.$el : "" !== this.s.selector ? this.s.selectWithin ? this.$items = a(this.s.selectWithin).find(this.s.selector) : this.$items = this.$el.find(a(this.s.selector)) : this.$items = this.$el.children(), 
            this.$slide = "", this.$outer = "", this.init(), this;
        }
        var c = {
            mode: "lg-slide",
            cssEasing: "ease",
            easing: "linear",
            speed: 600,
            height: "100%",
            width: "100%",
            addClass: "",
            startClass: "lg-start-zoom",
            backdropDuration: 150,
            hideBarsDelay: 6e3,
            useLeft: !1,
            closable: !0,
            loop: !0,
            escKey: !0,
            keyPress: !0,
            controls: !0,
            slideEndAnimatoin: !0,
            hideControlOnEnd: !1,
            mousewheel: !0,
            getCaptionFromTitleOrAlt: !0,
            appendSubHtmlTo: ".lg-sub-html",
            subHtmlSelectorRelative: !1,
            preload: 1,
            showAfterLoad: !0,
            selector: "",
            selectWithin: "",
            nextHtml: "",
            prevHtml: "",
            index: !1,
            iframeMaxWidth: "100%",
            download: !0,
            counter: !0,
            appendCounterTo: ".lg-toolbar",
            swipeThreshold: 50,
            enableSwipe: !0,
            enableDrag: !0,
            dynamic: !1,
            dynamicEl: [],
            galleryId: 1
        };
        b.prototype.init = function() {
            var b = this;
            b.s.preload > b.$items.length && (b.s.preload = b.$items.length);
            var c = window.location.hash;
            c.indexOf("lg=" + this.s.galleryId) > 0 && (b.index = parseInt(c.split("&slide=")[1], 10), 
            a("body").addClass("lg-from-hash"), a("body").hasClass("lg-on") || (setTimeout(function() {
                b.build(b.index);
            }), a("body").addClass("lg-on"))), b.s.dynamic ? (b.$el.trigger("onBeforeOpen.lg"), 
            b.index = b.s.index || 0, a("body").hasClass("lg-on") || setTimeout(function() {
                b.build(b.index), a("body").addClass("lg-on");
            })) : b.$items.on("click.lgcustom", function(c) {
                try {
                    c.preventDefault(), c.preventDefault();
                } catch (a) {
                    c.returnValue = !1;
                }
                b.$el.trigger("onBeforeOpen.lg"), b.index = b.s.index || b.$items.index(this), a("body").hasClass("lg-on") || (b.build(b.index), 
                a("body").addClass("lg-on"));
            });
        }, b.prototype.build = function(b) {
            var c = this;
            c.structure(), a.each(a.fn.lightGallery.modules, function(b) {
                c.modules[b] = new a.fn.lightGallery.modules[b](c.el);
            }), c.slide(b, !1, !1, !1), c.s.keyPress && c.keyPress(), c.$items.length > 1 ? (c.arrow(), 
            setTimeout(function() {
                c.enableDrag(), c.enableSwipe();
            }, 50), c.s.mousewheel && c.mousewheel()) : c.$slide.on("click.lg", function() {
                c.$el.trigger("onSlideClick.lg");
            }), c.counter(), c.closeGallery(), c.$el.trigger("onAfterOpen.lg"), c.$outer.on("mousemove.lg click.lg touchstart.lg", function() {
                c.$outer.removeClass("lg-hide-items"), clearTimeout(c.hideBartimeout), c.hideBartimeout = setTimeout(function() {
                    c.$outer.addClass("lg-hide-items");
                }, c.s.hideBarsDelay);
            }), c.$outer.trigger("mousemove.lg");
        }, b.prototype.structure = function() {
            var b, c = "", d = "", e = 0, f = "", g = this;
            for (a("body").append('<div class="lg-backdrop"></div>'), a(".lg-backdrop").css("transition-duration", this.s.backdropDuration + "ms"), 
            e = 0; e < this.$items.length; e++) c += '<div class="lg-item"></div>';
            if (this.s.controls && this.$items.length > 1 && (d = '<div class="lg-actions"><button class="lg-prev lg-icon">' + this.s.prevHtml + '</button><button class="lg-next lg-icon">' + this.s.nextHtml + "</button></div>"), 
            ".lg-sub-html" === this.s.appendSubHtmlTo && (f = '<div class="lg-sub-html"></div>'), 
            b = '<div class="lg-outer ' + this.s.addClass + " " + this.s.startClass + '"><div class="lg" style="width:' + this.s.width + "; height:" + this.s.height + '"><div class="lg-inner">' + c + '</div><div class="lg-toolbar lg-group"><span class="lg-close lg-icon"></span></div>' + d + f + "</div></div>", 
            a("body").append(b), this.$outer = a(".lg-outer"), this.$slide = this.$outer.find(".lg-item"), 
            this.s.useLeft ? (this.$outer.addClass("lg-use-left"), this.s.mode = "lg-slide") : this.$outer.addClass("lg-use-css3"), 
            g.setTop(), a(window).on("resize.lg orientationchange.lg", function() {
                setTimeout(function() {
                    g.setTop();
                }, 100);
            }), this.$slide.eq(this.index).addClass("lg-current"), this.doCss() ? this.$outer.addClass("lg-css3") : (this.$outer.addClass("lg-css"), 
            this.s.speed = 0), this.$outer.addClass(this.s.mode), this.s.enableDrag && this.$items.length > 1 && this.$outer.addClass("lg-grab"), 
            this.s.showAfterLoad && this.$outer.addClass("lg-show-after-load"), this.doCss()) {
                var h = this.$outer.find(".lg-inner");
                h.css("transition-timing-function", this.s.cssEasing), h.css("transition-duration", this.s.speed + "ms");
            }
            setTimeout(function() {
                a(".lg-backdrop").addClass("in");
            }), setTimeout(function() {
                g.$outer.addClass("lg-visible");
            }, this.s.backdropDuration), this.s.download && this.$outer.find(".lg-toolbar").append('<a id="lg-download" target="_blank" rel="noopener" download class="lg-download lg-icon"></a>'), 
            this.prevScrollTop = a(window).scrollTop();
        }, b.prototype.setTop = function() {
            if ("100%" !== this.s.height) {
                var b = a(window).height(), c = (b - parseInt(this.s.height, 10)) / 2, d = this.$outer.find(".lg");
                b >= parseInt(this.s.height, 10) ? d.css("top", c + "px") : d.css("top", "0px");
            }
        }, b.prototype.doCss = function() {
            return !!function() {
                var a = [ "transition", "MozTransition", "WebkitTransition", "OTransition", "msTransition", "KhtmlTransition" ], b = document.documentElement, c = 0;
                for (c = 0; c < a.length; c++) if (a[c] in b.style) return !0;
            }();
        }, b.prototype.isVideo = function(a, b) {
            var c;
            if (c = this.s.dynamic ? this.s.dynamicEl[b].html : this.$items.eq(b).attr("data-html"), 
            !a) return c ? {
                html5: !0
            } : (console.error("lightGallery :- data-src is not pvovided on slide item " + (b + 1) + ". Please make sure the selector property is properly configured. More info - http://sachinchoolur.github.io/lightGallery/demos/html-markup.html"), 
            !1);
            var d = a.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=|embed\/)?([a-z0-9\-\_\%]+)/i), e = a.match(/\/\/(?:www\.)?vimeo.com\/([0-9a-z\-_]+)/i), f = a.match(/\/\/(?:www\.)?dai.ly\/([0-9a-z\-_]+)/i), g = a.match(/\/\/(?:www\.)?(?:vk\.com|vkontakte\.ru)\/(?:video_ext\.php\?)(.*)/i);
            return d ? {
                youtube: d
            } : e ? {
                vimeo: e
            } : f ? {
                dailymotion: f
            } : g ? {
                vk: g
            } : void 0;
        }, b.prototype.counter = function() {
            this.s.counter && a(this.s.appendCounterTo).append('<div id="lg-counter"><span id="lg-counter-current">' + (parseInt(this.index, 10) + 1) + '</span> / <span id="lg-counter-all">' + this.$items.length + "</span></div>");
        }, b.prototype.addHtml = function(b) {
            var c, d, e = null;
            if (this.s.dynamic ? this.s.dynamicEl[b].subHtmlUrl ? c = this.s.dynamicEl[b].subHtmlUrl : e = this.s.dynamicEl[b].subHtml : (d = this.$items.eq(b)).attr("data-sub-html-url") ? c = d.attr("data-sub-html-url") : (e = d.attr("data-sub-html"), 
            this.s.getCaptionFromTitleOrAlt && !e && (e = d.attr("title") || d.find("img").first().attr("alt"))), 
            !c) if (void 0 !== e && null !== e) {
                var f = e.substring(0, 1);
                "." !== f && "#" !== f || (e = this.s.subHtmlSelectorRelative && !this.s.dynamic ? d.find(e).html() : a(e).html());
            } else e = "";
            ".lg-sub-html" === this.s.appendSubHtmlTo ? c ? this.$outer.find(this.s.appendSubHtmlTo).load(c) : this.$outer.find(this.s.appendSubHtmlTo).html(e) : c ? this.$slide.eq(b).load(c) : this.$slide.eq(b).append(e), 
            void 0 !== e && null !== e && ("" === e ? this.$outer.find(this.s.appendSubHtmlTo).addClass("lg-empty-html") : this.$outer.find(this.s.appendSubHtmlTo).removeClass("lg-empty-html")), 
            this.$el.trigger("onAfterAppendSubHtml.lg", [ b ]);
        }, b.prototype.preload = function(a) {
            var b = 1, c = 1;
            for (b = 1; b <= this.s.preload && !(b >= this.$items.length - a); b++) this.loadContent(a + b, !1, 0);
            for (c = 1; c <= this.s.preload && !(a - c < 0); c++) this.loadContent(a - c, !1, 0);
        }, b.prototype.loadContent = function(b, c, d) {
            var e, f, g, h, i, j, k = this, l = !1, m = function(b) {
                for (var c = [], d = [], e = 0; e < b.length; e++) {
                    var g = b[e].split(" ");
                    "" === g[0] && g.splice(0, 1), d.push(g[0]), c.push(g[1]);
                }
                for (var h = a(window).width(), i = 0; i < c.length; i++) if (parseInt(c[i], 10) > h) {
                    f = d[i];
                    break;
                }
            };
            k.s.dynamic ? (k.s.dynamicEl[b].poster && (l = !0, g = k.s.dynamicEl[b].poster), 
            j = k.s.dynamicEl[b].html, f = k.s.dynamicEl[b].src, k.s.dynamicEl[b].responsive && m(k.s.dynamicEl[b].responsive.split(",")), 
            h = k.s.dynamicEl[b].srcset, i = k.s.dynamicEl[b].sizes) : (k.$items.eq(b).attr("data-poster") && (l = !0, 
            g = k.$items.eq(b).attr("data-poster")), j = k.$items.eq(b).attr("data-html"), f = k.$items.eq(b).attr("href") || k.$items.eq(b).attr("data-src"), 
            k.$items.eq(b).attr("data-responsive") && m(k.$items.eq(b).attr("data-responsive").split(",")), 
            h = k.$items.eq(b).attr("data-srcset"), i = k.$items.eq(b).attr("data-sizes"));
            var p = !1;
            k.s.dynamic ? k.s.dynamicEl[b].iframe && (p = !0) : "true" === k.$items.eq(b).attr("data-iframe") && (p = !0);
            var q = k.isVideo(f, b);
            if (!k.$slide.eq(b).hasClass("lg-loaded")) {
                if (p) k.$slide.eq(b).prepend('<div class="lg-video-cont lg-has-iframe" style="max-width:' + k.s.iframeMaxWidth + '"><div class="lg-video"><iframe class="lg-object" frameborder="0" src="' + f + '"  allowfullscreen="true"></iframe></div></div>'); else if (l) {
                    var r = "";
                    r = q && q.youtube ? "lg-has-youtube" : q && q.vimeo ? "lg-has-vimeo" : "lg-has-html5", 
                    k.$slide.eq(b).prepend('<div class="lg-video-cont ' + r + ' "><div class="lg-video"><span class="lg-video-play"></span><img class="lg-object lg-has-poster" src="' + g + '" /></div></div>');
                } else q ? (k.$slide.eq(b).prepend('<div class="lg-video-cont "><div class="lg-video"></div></div>'), 
                k.$el.trigger("hasVideo.lg", [ b, f, j ])) : k.$slide.eq(b).prepend('<div class="lg-img-wrap"><img class="lg-object lg-image" src="' + f + '" /></div>');
                if (k.$el.trigger("onAferAppendSlide.lg", [ b ]), e = k.$slide.eq(b).find(".lg-object"), 
                i && e.attr("sizes", i), h) {
                    e.attr("srcset", h);
                    try {
                        picturefill({
                            elements: [ e[0] ]
                        });
                    } catch (a) {
                        console.warn("lightGallery :- If you want srcset to be supported for older browser please include picturefil version 2 javascript library in your document.");
                    }
                }
                ".lg-sub-html" !== this.s.appendSubHtmlTo && k.addHtml(b), k.$slide.eq(b).addClass("lg-loaded");
            }
            k.$slide.eq(b).find(".lg-object").on("load.lg error.lg", function() {
                var c = 0;
                d && !a("body").hasClass("lg-from-hash") && (c = d), setTimeout(function() {
                    k.$slide.eq(b).addClass("lg-complete"), k.$el.trigger("onSlideItemLoad.lg", [ b, d || 0 ]);
                }, c);
            }), q && q.html5 && !l && k.$slide.eq(b).addClass("lg-complete"), !0 === c && (k.$slide.eq(b).hasClass("lg-complete") ? k.preload(b) : k.$slide.eq(b).find(".lg-object").on("load.lg error.lg", function() {
                k.preload(b);
            }));
        }, b.prototype.slide = function(b, c, d, e) {
            var f = this.$outer.find(".lg-current").index(), g = this;
            if (!g.lGalleryOn || f !== b) {
                var h = this.$slide.length, i = g.lGalleryOn ? this.s.speed : 0;
                if (!g.lgBusy) {
                    if (this.s.download) {
                        var j;
                        (j = g.s.dynamic ? !1 !== g.s.dynamicEl[b].downloadUrl && (g.s.dynamicEl[b].downloadUrl || g.s.dynamicEl[b].src) : "false" !== g.$items.eq(b).attr("data-download-url") && (g.$items.eq(b).attr("data-download-url") || g.$items.eq(b).attr("href") || g.$items.eq(b).attr("data-src"))) ? (a("#lg-download").attr("href", j), 
                        g.$outer.removeClass("lg-hide-download")) : g.$outer.addClass("lg-hide-download");
                    }
                    if (this.$el.trigger("onBeforeSlide.lg", [ f, b, c, d ]), g.lgBusy = !0, clearTimeout(g.hideBartimeout), 
                    ".lg-sub-html" === this.s.appendSubHtmlTo && setTimeout(function() {
                        g.addHtml(b);
                    }, i), this.arrowDisable(b), e || (b < f ? e = "prev" : b > f && (e = "next")), 
                    c) {
                        this.$slide.removeClass("lg-prev-slide lg-current lg-next-slide");
                        var k, l;
                        h > 2 ? (k = b - 1, l = b + 1, 0 === b && f === h - 1 ? (l = 0, k = h - 1) : b === h - 1 && 0 === f && (l = 0, 
                        k = h - 1)) : (k = 0, l = 1), "prev" === e ? g.$slide.eq(l).addClass("lg-next-slide") : g.$slide.eq(k).addClass("lg-prev-slide"), 
                        g.$slide.eq(b).addClass("lg-current");
                    } else g.$outer.addClass("lg-no-trans"), this.$slide.removeClass("lg-prev-slide lg-next-slide"), 
                    "prev" === e ? (this.$slide.eq(b).addClass("lg-prev-slide"), this.$slide.eq(f).addClass("lg-next-slide")) : (this.$slide.eq(b).addClass("lg-next-slide"), 
                    this.$slide.eq(f).addClass("lg-prev-slide")), setTimeout(function() {
                        g.$slide.removeClass("lg-current"), g.$slide.eq(b).addClass("lg-current"), g.$outer.removeClass("lg-no-trans");
                    }, 50);
                    g.lGalleryOn ? (setTimeout(function() {
                        g.loadContent(b, !0, 0);
                    }, this.s.speed + 50), setTimeout(function() {
                        g.lgBusy = !1, g.$el.trigger("onAfterSlide.lg", [ f, b, c, d ]);
                    }, this.s.speed)) : (g.loadContent(b, !0, g.s.backdropDuration), g.lgBusy = !1, 
                    g.$el.trigger("onAfterSlide.lg", [ f, b, c, d ])), g.lGalleryOn = !0, this.s.counter && a("#lg-counter-current").text(b + 1);
                }
                g.index = b;
            }
        }, b.prototype.goToNextSlide = function(a) {
            var b = this, c = b.s.loop;
            a && b.$slide.length < 3 && (c = !1), b.lgBusy || (b.index + 1 < b.$slide.length ? (b.index++, 
            b.$el.trigger("onBeforeNextSlide.lg", [ b.index ]), b.slide(b.index, a, !1, "next")) : c ? (b.index = 0, 
            b.$el.trigger("onBeforeNextSlide.lg", [ b.index ]), b.slide(b.index, a, !1, "next")) : b.s.slideEndAnimatoin && !a && (b.$outer.addClass("lg-right-end"), 
            setTimeout(function() {
                b.$outer.removeClass("lg-right-end");
            }, 400)));
        }, b.prototype.goToPrevSlide = function(a) {
            var b = this, c = b.s.loop;
            a && b.$slide.length < 3 && (c = !1), b.lgBusy || (b.index > 0 ? (b.index--, b.$el.trigger("onBeforePrevSlide.lg", [ b.index, a ]), 
            b.slide(b.index, a, !1, "prev")) : c ? (b.index = b.$items.length - 1, b.$el.trigger("onBeforePrevSlide.lg", [ b.index, a ]), 
            b.slide(b.index, a, !1, "prev")) : b.s.slideEndAnimatoin && !a && (b.$outer.addClass("lg-left-end"), 
            setTimeout(function() {
                b.$outer.removeClass("lg-left-end");
            }, 400)));
        }, b.prototype.keyPress = function() {
            var b = this;
            this.$items.length > 1 && a(window).on("keyup.lg", function(a) {
                b.$items.length > 1 && (37 === a.keyCode && (a.preventDefault(), b.goToPrevSlide()), 
                39 === a.keyCode && (a.preventDefault(), b.goToNextSlide()));
            }), a(window).on("keydown.lg", function(a) {
                !0 === b.s.escKey && 27 === a.keyCode && (a.preventDefault(), b.$outer.hasClass("lg-thumb-open") ? b.$outer.removeClass("lg-thumb-open") : b.destroy());
            });
        }, b.prototype.arrow = function() {
            var a = this;
            this.$outer.find(".lg-prev").on("click.lg", function() {
                a.goToPrevSlide();
            }), this.$outer.find(".lg-next").on("click.lg", function() {
                a.goToNextSlide();
            });
        }, b.prototype.arrowDisable = function(a) {
            !this.s.loop && this.s.hideControlOnEnd && (a + 1 < this.$slide.length ? this.$outer.find(".lg-next").removeAttr("disabled").removeClass("disabled") : this.$outer.find(".lg-next").attr("disabled", "disabled").addClass("disabled"), 
            a > 0 ? this.$outer.find(".lg-prev").removeAttr("disabled").removeClass("disabled") : this.$outer.find(".lg-prev").attr("disabled", "disabled").addClass("disabled"));
        }, b.prototype.setTranslate = function(a, b, c) {
            this.s.useLeft ? a.css("left", b) : a.css({
                transform: "translate3d(" + b + "px, " + c + "px, 0px)"
            });
        }, b.prototype.touchMove = function(b, c) {
            var d = c - b;
            Math.abs(d) > 15 && (this.$outer.addClass("lg-dragging"), this.setTranslate(this.$slide.eq(this.index), d, 0), 
            this.setTranslate(a(".lg-prev-slide"), -this.$slide.eq(this.index).width() + d, 0), 
            this.setTranslate(a(".lg-next-slide"), this.$slide.eq(this.index).width() + d, 0));
        }, b.prototype.touchEnd = function(a) {
            var b = this;
            "lg-slide" !== b.s.mode && b.$outer.addClass("lg-slide"), this.$slide.not(".lg-current, .lg-prev-slide, .lg-next-slide").css("opacity", "0"), 
            setTimeout(function() {
                b.$outer.removeClass("lg-dragging"), a < 0 && Math.abs(a) > b.s.swipeThreshold ? b.goToNextSlide(!0) : a > 0 && Math.abs(a) > b.s.swipeThreshold ? b.goToPrevSlide(!0) : Math.abs(a) < 5 && b.$el.trigger("onSlideClick.lg"), 
                b.$slide.removeAttr("style");
            }), setTimeout(function() {
                b.$outer.hasClass("lg-dragging") || "lg-slide" === b.s.mode || b.$outer.removeClass("lg-slide");
            }, b.s.speed + 100);
        }, b.prototype.enableSwipe = function() {
            var a = this, b = 0, c = 0, d = !1;
            a.s.enableSwipe && a.doCss() && (a.$slide.on("touchstart.lg", function(c) {
                a.$outer.hasClass("lg-zoomed") || a.lgBusy || (c.preventDefault(), a.manageSwipeClass(), 
                b = c.originalEvent.targetTouches[0].pageX);
            }), a.$slide.on("touchmove.lg", function(e) {
                a.$outer.hasClass("lg-zoomed") || (e.preventDefault(), c = e.originalEvent.targetTouches[0].pageX, 
                a.touchMove(b, c), d = !0);
            }), a.$slide.on("touchend.lg", function() {
                a.$outer.hasClass("lg-zoomed") || (d ? (d = !1, a.touchEnd(c - b)) : a.$el.trigger("onSlideClick.lg"));
            }));
        }, b.prototype.enableDrag = function() {
            var b = this, c = 0, d = 0, e = !1, f = !1;
            b.s.enableDrag && b.doCss() && (b.$slide.on("mousedown.lg", function(d) {
                b.$outer.hasClass("lg-zoomed") || (a(d.target).hasClass("lg-object") || a(d.target).hasClass("lg-video-play")) && (d.preventDefault(), 
                b.lgBusy || (b.manageSwipeClass(), c = d.pageX, e = !0, b.$outer.scrollLeft += 1, 
                b.$outer.scrollLeft -= 1, b.$outer.removeClass("lg-grab").addClass("lg-grabbing"), 
                b.$el.trigger("onDragstart.lg")));
            }), a(window).on("mousemove.lg", function(a) {
                e && (f = !0, d = a.pageX, b.touchMove(c, d), b.$el.trigger("onDragmove.lg"));
            }), a(window).on("mouseup.lg", function(g) {
                f ? (f = !1, b.touchEnd(d - c), b.$el.trigger("onDragend.lg")) : (a(g.target).hasClass("lg-object") || a(g.target).hasClass("lg-video-play")) && b.$el.trigger("onSlideClick.lg"), 
                e && (e = !1, b.$outer.removeClass("lg-grabbing").addClass("lg-grab"));
            }));
        }, b.prototype.manageSwipeClass = function() {
            var a = this.index + 1, b = this.index - 1;
            this.s.loop && this.$slide.length > 2 && (0 === this.index ? b = this.$slide.length - 1 : this.index === this.$slide.length - 1 && (a = 0)), 
            this.$slide.removeClass("lg-next-slide lg-prev-slide"), b > -1 && this.$slide.eq(b).addClass("lg-prev-slide"), 
            this.$slide.eq(a).addClass("lg-next-slide");
        }, b.prototype.mousewheel = function() {
            var a = this;
            a.$outer.on("mousewheel.lg", function(b) {
                b.deltaY && (b.deltaY > 0 ? a.goToPrevSlide() : a.goToNextSlide(), b.preventDefault());
            });
        }, b.prototype.closeGallery = function() {
            var b = this, c = !1;
            this.$outer.find(".lg-close").on("click.lg", function() {
                b.destroy();
            }), b.s.closable && (b.$outer.on("mousedown.lg", function(b) {
                c = !!(a(b.target).is(".lg-outer") || a(b.target).is(".lg-item ") || a(b.target).is(".lg-img-wrap"));
            }), b.$outer.on("mouseup.lg", function(d) {
                (a(d.target).is(".lg-outer") || a(d.target).is(".lg-item ") || a(d.target).is(".lg-img-wrap") && c) && (b.$outer.hasClass("lg-dragging") || b.destroy());
            }));
        }, b.prototype.destroy = function(b) {
            var c = this;
            b || (c.$el.trigger("onBeforeClose.lg"), a(window).scrollTop(c.prevScrollTop)), 
            b && (c.s.dynamic || this.$items.off("click.lg click.lgcustom"), a.removeData(c.el, "lightGallery")), 
            this.$el.off(".lg.tm"), a.each(a.fn.lightGallery.modules, function(a) {
                c.modules[a] && c.modules[a].destroy();
            }), this.lGalleryOn = !1, clearTimeout(c.hideBartimeout), this.hideBartimeout = !1, 
            a(window).off(".lg"), a("body").removeClass("lg-on lg-from-hash"), c.$outer && c.$outer.removeClass("lg-visible"), 
            a(".lg-backdrop").removeClass("in"), setTimeout(function() {
                c.$outer && c.$outer.remove(), a(".lg-backdrop").remove(), b || c.$el.trigger("onCloseAfter.lg");
            }, c.s.backdropDuration + 50);
        }, a.fn.lightGallery = function(c) {
            return this.each(function() {
                if (a.data(this, "lightGallery")) try {
                    a(this).data("lightGallery").init();
                } catch (a) {
                    console.error("lightGallery has not initiated properly");
                } else a.data(this, "lightGallery", new b(this, c));
            });
        }, a.fn.lightGallery.modules = {};
    }();
}), function(a, b) {
    "function" == typeof define && define.amd ? define([ "jquery" ], function(a) {
        return b(a);
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(jQuery);
}(0, function(a) {
    !function() {
        "use strict";
        var b = {
            autoplay: !1,
            pause: 5e3,
            progressBar: !0,
            fourceAutoplay: !1,
            autoplayControls: !0,
            appendAutoplayControlsTo: ".lg-toolbar"
        }, c = function(c) {
            return this.core = a(c).data("lightGallery"), this.$el = a(c), !(this.core.$items.length < 2) && (this.core.s = a.extend({}, b, this.core.s), 
            this.interval = !1, this.fromAuto = !0, this.canceledOnTouch = !1, this.fourceAutoplayTemp = this.core.s.fourceAutoplay, 
            this.core.doCss() || (this.core.s.progressBar = !1), this.init(), this);
        };
        c.prototype.init = function() {
            var a = this;
            a.core.s.autoplayControls && a.controls(), a.core.s.progressBar && a.core.$outer.find(".lg").append('<div class="lg-progress-bar"><div class="lg-progress"></div></div>'), 
            a.progress(), a.core.s.autoplay && a.$el.one("onSlideItemLoad.lg.tm", function() {
                a.startlAuto();
            }), a.$el.on("onDragstart.lg.tm touchstart.lg.tm", function() {
                a.interval && (a.cancelAuto(), a.canceledOnTouch = !0);
            }), a.$el.on("onDragend.lg.tm touchend.lg.tm onSlideClick.lg.tm", function() {
                !a.interval && a.canceledOnTouch && (a.startlAuto(), a.canceledOnTouch = !1);
            });
        }, c.prototype.progress = function() {
            var a, b, c = this;
            c.$el.on("onBeforeSlide.lg.tm", function() {
                c.core.s.progressBar && c.fromAuto && (a = c.core.$outer.find(".lg-progress-bar"), 
                b = c.core.$outer.find(".lg-progress"), c.interval && (b.removeAttr("style"), a.removeClass("lg-start"), 
                setTimeout(function() {
                    b.css("transition", "width " + (c.core.s.speed + c.core.s.pause) + "ms ease 0s"), 
                    a.addClass("lg-start");
                }, 20))), c.fromAuto || c.core.s.fourceAutoplay || c.cancelAuto(), c.fromAuto = !1;
            });
        }, c.prototype.controls = function() {
            var b = this;
            a(this.core.s.appendAutoplayControlsTo).append('<span class="lg-autoplay-button lg-icon"></span>'), 
            b.core.$outer.find(".lg-autoplay-button").on("click.lg", function() {
                a(b.core.$outer).hasClass("lg-show-autoplay") ? (b.cancelAuto(), b.core.s.fourceAutoplay = !1) : b.interval || (b.startlAuto(), 
                b.core.s.fourceAutoplay = b.fourceAutoplayTemp);
            });
        }, c.prototype.startlAuto = function() {
            var a = this;
            a.core.$outer.find(".lg-progress").css("transition", "width " + (a.core.s.speed + a.core.s.pause) + "ms ease 0s"), 
            a.core.$outer.addClass("lg-show-autoplay"), a.core.$outer.find(".lg-progress-bar").addClass("lg-start"), 
            a.interval = setInterval(function() {
                a.core.index + 1 < a.core.$items.length ? a.core.index++ : a.core.index = 0, a.fromAuto = !0, 
                a.core.slide(a.core.index, !1, !1, "next");
            }, a.core.s.speed + a.core.s.pause);
        }, c.prototype.cancelAuto = function() {
            clearInterval(this.interval), this.interval = !1, this.core.$outer.find(".lg-progress").removeAttr("style"), 
            this.core.$outer.removeClass("lg-show-autoplay"), this.core.$outer.find(".lg-progress-bar").removeClass("lg-start");
        }, c.prototype.destroy = function() {
            this.cancelAuto(), this.core.$outer.find(".lg-progress-bar").remove();
        }, a.fn.lightGallery.modules.autoplay = c;
    }();
}), function(a, b) {
    "function" == typeof define && define.amd ? define([ "jquery" ], function(a) {
        return b(a);
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(jQuery);
}(0, function(a) {
    !function() {
        "use strict";
        var b = {
            fullScreen: !0
        }, c = function(c) {
            return this.core = a(c).data("lightGallery"), this.$el = a(c), this.core.s = a.extend({}, b, this.core.s), 
            this.init(), this;
        };
        c.prototype.init = function() {
            var a = "";
            if (this.core.s.fullScreen) {
                if (!(document.fullscreenEnabled || document.webkitFullscreenEnabled || document.mozFullScreenEnabled || document.msFullscreenEnabled)) return;
                a = '<span class="lg-fullscreen lg-icon"></span>', this.core.$outer.find(".lg-toolbar").append(a), 
                this.fullScreen();
            }
        }, c.prototype.requestFullscreen = function() {
            var a = document.documentElement;
            a.requestFullscreen ? a.requestFullscreen() : a.msRequestFullscreen ? a.msRequestFullscreen() : a.mozRequestFullScreen ? a.mozRequestFullScreen() : a.webkitRequestFullscreen && a.webkitRequestFullscreen();
        }, c.prototype.exitFullscreen = function() {
            document.exitFullscreen ? document.exitFullscreen() : document.msExitFullscreen ? document.msExitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitExitFullscreen && document.webkitExitFullscreen();
        }, c.prototype.fullScreen = function() {
            var b = this;
            a(document).on("fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg", function() {
                b.core.$outer.toggleClass("lg-fullscreen-on");
            }), this.core.$outer.find(".lg-fullscreen").on("click.lg", function() {
                document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement ? b.exitFullscreen() : b.requestFullscreen();
            });
        }, c.prototype.destroy = function() {
            this.exitFullscreen(), a(document).off("fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg");
        }, a.fn.lightGallery.modules.fullscreen = c;
    }();
}), function(a, b) {
    "function" == typeof define && define.amd ? define([ "jquery" ], function(a) {
        return b(a);
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(jQuery);
}(0, function(a) {
    !function() {
        "use strict";
        var b = {
            pager: !1
        }, c = function(c) {
            return this.core = a(c).data("lightGallery"), this.$el = a(c), this.core.s = a.extend({}, b, this.core.s), 
            this.core.s.pager && this.core.$items.length > 1 && this.init(), this;
        };
        c.prototype.init = function() {
            var b, c, d, e = this, f = "";
            if (e.core.$outer.find(".lg").append('<div class="lg-pager-outer"></div>'), e.core.s.dynamic) for (var g = 0; g < e.core.s.dynamicEl.length; g++) f += '<span class="lg-pager-cont"> <span class="lg-pager"></span><div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="' + e.core.s.dynamicEl[g].thumb + '" /></div></span>'; else e.core.$items.each(function() {
                f += e.core.s.exThumbImage ? '<span class="lg-pager-cont"> <span class="lg-pager"></span><div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="' + a(this).attr(e.core.s.exThumbImage) + '" /></div></span>' : '<span class="lg-pager-cont"> <span class="lg-pager"></span><div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="' + a(this).find("img").attr("src") + '" /></div></span>';
            });
            (c = e.core.$outer.find(".lg-pager-outer")).html(f), (b = e.core.$outer.find(".lg-pager-cont")).on("click.lg touchend.lg", function() {
                var b = a(this);
                e.core.index = b.index(), e.core.slide(e.core.index, !1, !0, !1);
            }), c.on("mouseover.lg", function() {
                clearTimeout(d), c.addClass("lg-pager-hover");
            }), c.on("mouseout.lg", function() {
                d = setTimeout(function() {
                    c.removeClass("lg-pager-hover");
                });
            }), e.core.$el.on("onBeforeSlide.lg.tm", function(a, c, d) {
                b.removeClass("lg-pager-active"), b.eq(d).addClass("lg-pager-active");
            });
        }, c.prototype.destroy = function() {}, a.fn.lightGallery.modules.pager = c;
    }();
}), function(a, b) {
    "function" == typeof define && define.amd ? define([ "jquery" ], function(a) {
        return b(a);
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(jQuery);
}(0, function(a) {
    !function() {
        "use strict";
        var b = {
            thumbnail: !0,
            animateThumb: !0,
            currentPagerPosition: "middle",
            thumbWidth: 100,
            thumbHeight: "80px",
            thumbContHeight: 100,
            thumbMargin: 5,
            exThumbImage: !1,
            showThumbByDefault: !0,
            toogleThumb: !0,
            pullCaptionUp: !0,
            enableThumbDrag: !0,
            enableThumbSwipe: !0,
            swipeThreshold: 50,
            loadYoutubeThumbnail: !0,
            youtubeThumbSize: 1,
            loadVimeoThumbnail: !0,
            vimeoThumbSize: "thumbnail_small",
            loadDailymotionThumbnail: !0
        }, c = function(c) {
            return this.core = a(c).data("lightGallery"), this.core.s = a.extend({}, b, this.core.s), 
            this.$el = a(c), this.$thumbOuter = null, this.thumbOuterWidth = 0, this.thumbTotalWidth = this.core.$items.length * (this.core.s.thumbWidth + this.core.s.thumbMargin), 
            this.thumbIndex = this.core.index, this.core.s.animateThumb && (this.core.s.thumbHeight = "100%"), 
            this.left = 0, this.init(), this;
        };
        c.prototype.init = function() {
            var a = this;
            this.core.s.thumbnail && this.core.$items.length > 1 && (this.core.s.showThumbByDefault && setTimeout(function() {
                a.core.$outer.addClass("lg-thumb-open");
            }, 700), this.core.s.pullCaptionUp && this.core.$outer.addClass("lg-pull-caption-up"), 
            this.build(), this.core.s.animateThumb && this.core.doCss() ? (this.core.s.enableThumbDrag && this.enableThumbDrag(), 
            this.core.s.enableThumbSwipe && this.enableThumbSwipe(), this.thumbClickable = !1) : this.thumbClickable = !0, 
            this.toogle(), this.thumbkeyPress());
        }, c.prototype.build = function() {
            function b(a, b, c) {
                var g, h = d.core.isVideo(a, c) || {}, i = "";
                h.youtube || h.vimeo || h.dailymotion ? h.youtube ? g = d.core.s.loadYoutubeThumbnail ? "//img.youtube.com/vi/" + h.youtube[1] + "/" + d.core.s.youtubeThumbSize + ".jpg" : b : h.vimeo ? d.core.s.loadVimeoThumbnail ? (g = "//i.vimeocdn.com/video/error_" + f + ".jpg", 
                i = h.vimeo[1]) : g = b : h.dailymotion && (g = d.core.s.loadDailymotionThumbnail ? "//www.dailymotion.com/thumbnail/video/" + h.dailymotion[1] : b) : g = b, 
                e += '<div data-vimeo-id="' + i + '" class="lg-thumb-item" style="width:' + d.core.s.thumbWidth + "px; height: " + d.core.s.thumbHeight + "; margin-right: " + d.core.s.thumbMargin + 'px"><img src="' + g + '" /></div>', 
                i = "";
            }
            var c, d = this, e = "", f = "";
            switch (this.core.s.vimeoThumbSize) {
              case "thumbnail_large":
                f = "640";
                break;

              case "thumbnail_medium":
                f = "200x150";
                break;

              case "thumbnail_small":
                f = "100x75";
            }
            if (d.core.$outer.addClass("lg-has-thumb"), d.core.$outer.find(".lg").append('<div class="lg-thumb-outer"><div class="lg-thumb lg-group"></div></div>'), 
            d.$thumbOuter = d.core.$outer.find(".lg-thumb-outer"), d.thumbOuterWidth = d.$thumbOuter.width(), 
            d.core.s.animateThumb && d.core.$outer.find(".lg-thumb").css({
                width: d.thumbTotalWidth + "px",
                position: "relative"
            }), this.core.s.animateThumb && d.$thumbOuter.css("height", d.core.s.thumbContHeight + "px"), 
            d.core.s.dynamic) for (var h = 0; h < d.core.s.dynamicEl.length; h++) b(d.core.s.dynamicEl[h].src, d.core.s.dynamicEl[h].thumb, h); else d.core.$items.each(function(c) {
                d.core.s.exThumbImage ? b(a(this).attr("href") || a(this).attr("data-src"), a(this).attr(d.core.s.exThumbImage), c) : b(a(this).attr("href") || a(this).attr("data-src"), a(this).find("img").attr("src"), c);
            });
            d.core.$outer.find(".lg-thumb").html(e), (c = d.core.$outer.find(".lg-thumb-item")).each(function() {
                var b = a(this), c = b.attr("data-vimeo-id");
                c && a.getJSON("//www.vimeo.com/api/v2/video/" + c + ".json?callback=?", {
                    format: "json"
                }, function(a) {
                    b.find("img").attr("src", a[0][d.core.s.vimeoThumbSize]);
                });
            }), c.eq(d.core.index).addClass("active"), d.core.$el.on("onBeforeSlide.lg.tm", function() {
                c.removeClass("active"), c.eq(d.core.index).addClass("active");
            }), c.on("click.lg touchend.lg", function() {
                var b = a(this);
                setTimeout(function() {
                    (d.thumbClickable && !d.core.lgBusy || !d.core.doCss()) && (d.core.index = b.index(), 
                    d.core.slide(d.core.index, !1, !0, !1));
                }, 50);
            }), d.core.$el.on("onBeforeSlide.lg.tm", function() {
                d.animateThumb(d.core.index);
            }), a(window).on("resize.lg.thumb orientationchange.lg.thumb", function() {
                setTimeout(function() {
                    d.animateThumb(d.core.index), d.thumbOuterWidth = d.$thumbOuter.width();
                }, 200);
            });
        }, c.prototype.setTranslate = function(a) {
            this.core.$outer.find(".lg-thumb").css({
                transform: "translate3d(-" + a + "px, 0px, 0px)"
            });
        }, c.prototype.animateThumb = function(a) {
            var b = this.core.$outer.find(".lg-thumb");
            if (this.core.s.animateThumb) {
                var c;
                switch (this.core.s.currentPagerPosition) {
                  case "left":
                    c = 0;
                    break;

                  case "middle":
                    c = this.thumbOuterWidth / 2 - this.core.s.thumbWidth / 2;
                    break;

                  case "right":
                    c = this.thumbOuterWidth - this.core.s.thumbWidth;
                }
                this.left = (this.core.s.thumbWidth + this.core.s.thumbMargin) * a - 1 - c, this.left > this.thumbTotalWidth - this.thumbOuterWidth && (this.left = this.thumbTotalWidth - this.thumbOuterWidth), 
                this.left < 0 && (this.left = 0), this.core.lGalleryOn ? (b.hasClass("on") || this.core.$outer.find(".lg-thumb").css("transition-duration", this.core.s.speed + "ms"), 
                this.core.doCss() || b.animate({
                    left: -this.left + "px"
                }, this.core.s.speed)) : this.core.doCss() || b.css("left", -this.left + "px"), 
                this.setTranslate(this.left);
            }
        }, c.prototype.enableThumbDrag = function() {
            var b = this, c = 0, d = 0, e = !1, f = !1, g = 0;
            b.$thumbOuter.addClass("lg-grab"), b.core.$outer.find(".lg-thumb").on("mousedown.lg.thumb", function(a) {
                b.thumbTotalWidth > b.thumbOuterWidth && (a.preventDefault(), c = a.pageX, e = !0, 
                b.core.$outer.scrollLeft += 1, b.core.$outer.scrollLeft -= 1, b.thumbClickable = !1, 
                b.$thumbOuter.removeClass("lg-grab").addClass("lg-grabbing"));
            }), a(window).on("mousemove.lg.thumb", function(a) {
                e && (g = b.left, f = !0, d = a.pageX, b.$thumbOuter.addClass("lg-dragging"), (g -= d - c) > b.thumbTotalWidth - b.thumbOuterWidth && (g = b.thumbTotalWidth - b.thumbOuterWidth), 
                g < 0 && (g = 0), b.setTranslate(g));
            }), a(window).on("mouseup.lg.thumb", function() {
                f ? (f = !1, b.$thumbOuter.removeClass("lg-dragging"), b.left = g, Math.abs(d - c) < b.core.s.swipeThreshold && (b.thumbClickable = !0)) : b.thumbClickable = !0, 
                e && (e = !1, b.$thumbOuter.removeClass("lg-grabbing").addClass("lg-grab"));
            });
        }, c.prototype.enableThumbSwipe = function() {
            var a = this, b = 0, c = 0, d = !1, e = 0;
            a.core.$outer.find(".lg-thumb").on("touchstart.lg", function(c) {
                a.thumbTotalWidth > a.thumbOuterWidth && (c.preventDefault(), b = c.originalEvent.targetTouches[0].pageX, 
                a.thumbClickable = !1);
            }), a.core.$outer.find(".lg-thumb").on("touchmove.lg", function(f) {
                a.thumbTotalWidth > a.thumbOuterWidth && (f.preventDefault(), c = f.originalEvent.targetTouches[0].pageX, 
                d = !0, a.$thumbOuter.addClass("lg-dragging"), e = a.left, (e -= c - b) > a.thumbTotalWidth - a.thumbOuterWidth && (e = a.thumbTotalWidth - a.thumbOuterWidth), 
                e < 0 && (e = 0), a.setTranslate(e));
            }), a.core.$outer.find(".lg-thumb").on("touchend.lg", function() {
                a.thumbTotalWidth > a.thumbOuterWidth && d ? (d = !1, a.$thumbOuter.removeClass("lg-dragging"), 
                Math.abs(c - b) < a.core.s.swipeThreshold && (a.thumbClickable = !0), a.left = e) : a.thumbClickable = !0;
            });
        }, c.prototype.toogle = function() {
            var a = this;
            a.core.s.toogleThumb && (a.core.$outer.addClass("lg-can-toggle"), a.$thumbOuter.append('<span class="lg-toogle-thumb lg-icon"></span>'), 
            a.core.$outer.find(".lg-toogle-thumb").on("click.lg", function() {
                a.core.$outer.toggleClass("lg-thumb-open");
            }));
        }, c.prototype.thumbkeyPress = function() {
            var b = this;
            a(window).on("keydown.lg.thumb", function(a) {
                38 === a.keyCode ? (a.preventDefault(), b.core.$outer.addClass("lg-thumb-open")) : 40 === a.keyCode && (a.preventDefault(), 
                b.core.$outer.removeClass("lg-thumb-open"));
            });
        }, c.prototype.destroy = function() {
            this.core.s.thumbnail && this.core.$items.length > 1 && (a(window).off("resize.lg.thumb orientationchange.lg.thumb keydown.lg.thumb"), 
            this.$thumbOuter.remove(), this.core.$outer.removeClass("lg-has-thumb"));
        }, a.fn.lightGallery.modules.Thumbnail = c;
    }();
}), function(a, b) {
    "function" == typeof define && define.amd ? define([ "jquery" ], function(a) {
        return b(a);
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(jQuery);
}(0, function(a) {
    !function() {
        "use strict";
        var b = {
            videoMaxWidth: "855px",
            youtubePlayerParams: !1,
            vimeoPlayerParams: !1,
            dailymotionPlayerParams: !1,
            vkPlayerParams: !1,
            videojs: !1,
            videojsOptions: {}
        }, c = function(c) {
            return this.core = a(c).data("lightGallery"), this.$el = a(c), this.core.s = a.extend({}, b, this.core.s), 
            this.videoLoaded = !1, this.init(), this;
        };
        c.prototype.init = function() {
            var b = this;
            b.core.$el.on("hasVideo.lg.tm", function(a, c, d, e) {
                if (b.core.$slide.eq(c).find(".lg-video").append(b.loadVideo(d, "lg-object", !0, c, e)), 
                e) if (b.core.s.videojs) try {
                    videojs(b.core.$slide.eq(c).find(".lg-html5").get(0), b.core.s.videojsOptions, function() {
                        b.videoLoaded || this.play();
                    });
                } catch (a) {
                    console.error("Make sure you have included videojs");
                } else b.videoLoaded || b.core.$slide.eq(c).find(".lg-html5").get(0).play();
            }), b.core.$el.on("onAferAppendSlide.lg.tm", function(a, c) {
                var d = b.core.$slide.eq(c).find(".lg-video-cont");
                d.hasClass("lg-has-iframe") || (d.css("max-width", b.core.s.videoMaxWidth), b.videoLoaded = !0);
            });
            var c = function(a) {
                if (a.find(".lg-object").hasClass("lg-has-poster") && a.find(".lg-object").is(":visible")) if (a.hasClass("lg-has-video")) {
                    var c = a.find(".lg-youtube").get(0), d = a.find(".lg-vimeo").get(0), e = a.find(".lg-dailymotion").get(0), f = a.find(".lg-html5").get(0);
                    if (c) c.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', "*"); else if (d) try {
                        $f(d).api("play");
                    } catch (a) {
                        console.error("Make sure you have included froogaloop2 js");
                    } else if (e) e.contentWindow.postMessage("play", "*"); else if (f) if (b.core.s.videojs) try {
                        videojs(f).play();
                    } catch (a) {
                        console.error("Make sure you have included videojs");
                    } else f.play();
                    a.addClass("lg-video-playing");
                } else {
                    a.addClass("lg-video-playing lg-has-video");
                    var g, h, i = function(c, d) {
                        if (a.find(".lg-video").append(b.loadVideo(c, "", !1, b.core.index, d)), d) if (b.core.s.videojs) try {
                            videojs(b.core.$slide.eq(b.core.index).find(".lg-html5").get(0), b.core.s.videojsOptions, function() {
                                this.play();
                            });
                        } catch (a) {
                            console.error("Make sure you have included videojs");
                        } else b.core.$slide.eq(b.core.index).find(".lg-html5").get(0).play();
                    };
                    b.core.s.dynamic ? (g = b.core.s.dynamicEl[b.core.index].src, h = b.core.s.dynamicEl[b.core.index].html, 
                    i(g, h)) : (g = b.core.$items.eq(b.core.index).attr("href") || b.core.$items.eq(b.core.index).attr("data-src"), 
                    h = b.core.$items.eq(b.core.index).attr("data-html"), i(g, h));
                    var j = a.find(".lg-object");
                    a.find(".lg-video").append(j), a.find(".lg-video-object").hasClass("lg-html5") || (a.removeClass("lg-complete"), 
                    a.find(".lg-video-object").on("load.lg error.lg", function() {
                        a.addClass("lg-complete");
                    }));
                }
            };
            b.core.doCss() && b.core.$items.length > 1 && (b.core.s.enableSwipe || b.core.s.enableDrag) ? b.core.$el.on("onSlideClick.lg.tm", function() {
                var a = b.core.$slide.eq(b.core.index);
                c(a);
            }) : b.core.$slide.on("click.lg", function() {
                c(a(this));
            }), b.core.$el.on("onBeforeSlide.lg.tm", function(c, d, e) {
                var f = b.core.$slide.eq(d), g = f.find(".lg-youtube").get(0), h = f.find(".lg-vimeo").get(0), i = f.find(".lg-dailymotion").get(0), j = f.find(".lg-vk").get(0), k = f.find(".lg-html5").get(0);
                if (g) g.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', "*"); else if (h) try {
                    $f(h).api("pause");
                } catch (a) {
                    console.error("Make sure you have included froogaloop2 js");
                } else if (i) i.contentWindow.postMessage("pause", "*"); else if (k) if (b.core.s.videojs) try {
                    videojs(k).pause();
                } catch (a) {
                    console.error("Make sure you have included videojs");
                } else k.pause();
                j && a(j).attr("src", a(j).attr("src").replace("&autoplay", "&noplay"));
                var l;
                l = b.core.s.dynamic ? b.core.s.dynamicEl[e].src : b.core.$items.eq(e).attr("href") || b.core.$items.eq(e).attr("data-src");
                var m = b.core.isVideo(l, e) || {};
                (m.youtube || m.vimeo || m.dailymotion || m.vk) && b.core.$outer.addClass("lg-hide-download");
            }), b.core.$el.on("onAfterSlide.lg.tm", function(a, c) {
                b.core.$slide.eq(c).removeClass("lg-video-playing");
            });
        }, c.prototype.loadVideo = function(b, c, d, e, f) {
            var g = "", h = 1, i = "", j = this.core.isVideo(b, e) || {};
            if (d && (h = this.videoLoaded ? 0 : 1), j.youtube) i = "?wmode=opaque&autoplay=" + h + "&enablejsapi=1", 
            this.core.s.youtubePlayerParams && (i = i + "&" + a.param(this.core.s.youtubePlayerParams)), 
            g = '<iframe class="lg-video-object lg-youtube ' + c + '" width="560" height="315" src="//www.youtube.com/embed/' + j.youtube[1] + i + '" frameborder="0" allowfullscreen></iframe>'; else if (j.vimeo) i = "?autoplay=" + h + "&api=1", 
            this.core.s.vimeoPlayerParams && (i = i + "&" + a.param(this.core.s.vimeoPlayerParams)), 
            g = '<iframe class="lg-video-object lg-vimeo ' + c + '" width="560" height="315"  src="//player.vimeo.com/video/' + j.vimeo[1] + i + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'; else if (j.dailymotion) i = "?wmode=opaque&autoplay=" + h + "&api=postMessage", 
            this.core.s.dailymotionPlayerParams && (i = i + "&" + a.param(this.core.s.dailymotionPlayerParams)), 
            g = '<iframe class="lg-video-object lg-dailymotion ' + c + '" width="560" height="315" src="//www.dailymotion.com/embed/video/' + j.dailymotion[1] + i + '" frameborder="0" allowfullscreen></iframe>'; else if (j.html5) {
                var k = f.substring(0, 1);
                "." !== k && "#" !== k || (f = a(f).html()), g = f;
            } else j.vk && (i = "&autoplay=" + h, this.core.s.vkPlayerParams && (i = i + "&" + a.param(this.core.s.vkPlayerParams)), 
            g = '<iframe class="lg-video-object lg-vk ' + c + '" width="560" height="315" src="http://vk.com/video_ext.php?' + j.vk[1] + i + '" frameborder="0" allowfullscreen></iframe>');
            return g;
        }, c.prototype.destroy = function() {
            this.videoLoaded = !1;
        }, a.fn.lightGallery.modules.video = c;
    }();
}), function(a, b) {
    "function" == typeof define && define.amd ? define([ "jquery" ], function(a) {
        return b(a);
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(jQuery);
}(0, function(a) {
    !function() {
        "use strict";
        var c = {
            scale: 1,
            zoom: !0,
            actualSize: !0,
            enableZoomAfter: 300,
            useLeftForZoom: function() {
                var a = !1, b = navigator.userAgent.match(/Chrom(e|ium)\/([0-9]+)\./);
                return b && parseInt(b[2], 10) < 54 && (a = !0), a;
            }()
        }, d = function(b) {
            return this.core = a(b).data("lightGallery"), this.core.s = a.extend({}, c, this.core.s), 
            this.core.s.zoom && this.core.doCss() && (this.init(), this.zoomabletimeout = !1, 
            this.pageX = a(window).width() / 2, this.pageY = a(window).height() / 2 + a(window).scrollTop()), 
            this;
        };
        d.prototype.init = function() {
            var b = this, c = '<span id="lg-zoom-in" class="lg-icon"></span><span id="lg-zoom-out" class="lg-icon"></span>';
            b.core.s.actualSize && (c += '<span id="lg-actual-size" class="lg-icon"></span>'), 
            b.core.s.useLeftForZoom ? b.core.$outer.addClass("lg-use-left-for-zoom") : b.core.$outer.addClass("lg-use-transition-for-zoom"), 
            this.core.$outer.find(".lg-toolbar").append(c), b.core.$el.on("onSlideItemLoad.lg.tm.zoom", function(c, d, e) {
                var f = b.core.s.enableZoomAfter + e;
                a("body").hasClass("lg-from-hash") && e ? f = 0 : a("body").removeClass("lg-from-hash"), 
                b.zoomabletimeout = setTimeout(function() {
                    b.core.$slide.eq(d).addClass("lg-zoomable");
                }, f + 30);
            });
            var d = 1, e = function(c) {
                var d, e, f = b.core.$outer.find(".lg-current .lg-image"), g = (a(window).width() - f.prop("offsetWidth")) / 2, h = (a(window).height() - f.prop("offsetHeight")) / 2 + a(window).scrollTop(), i = (c - 1) * (d = b.pageX - g), j = (c - 1) * (e = b.pageY - h);
                f.css("transform", "scale3d(" + c + ", " + c + ", 1)").attr("data-scale", c), b.core.s.useLeftForZoom ? f.parent().css({
                    left: -i + "px",
                    top: -j + "px"
                }).attr("data-x", i).attr("data-y", j) : f.parent().css("transform", "translate3d(-" + i + "px, -" + j + "px, 0)").attr("data-x", i).attr("data-y", j);
            }, f = function() {
                d > 1 ? b.core.$outer.addClass("lg-zoomed") : b.resetZoom(), d < 1 && (d = 1), e(d);
            }, g = function(c, e, g, h) {
                var i, j = e.prop("offsetWidth");
                i = b.core.s.dynamic ? b.core.s.dynamicEl[g].width || e[0].naturalWidth || j : b.core.$items.eq(g).attr("data-width") || e[0].naturalWidth || j;
                var k;
                b.core.$outer.hasClass("lg-zoomed") ? d = 1 : i > j && (k = i / j, d = k || 2), 
                h ? (b.pageX = a(window).width() / 2, b.pageY = a(window).height() / 2 + a(window).scrollTop()) : (b.pageX = c.pageX || c.originalEvent.targetTouches[0].pageX, 
                b.pageY = c.pageY || c.originalEvent.targetTouches[0].pageY), f(), setTimeout(function() {
                    b.core.$outer.removeClass("lg-grabbing").addClass("lg-grab");
                }, 10);
            }, h = !1;
            b.core.$el.on("onAferAppendSlide.lg.tm.zoom", function(a, c) {
                var d = b.core.$slide.eq(c).find(".lg-image");
                d.on("dblclick", function(a) {
                    g(a, d, c);
                }), d.on("touchstart", function(a) {
                    h ? (clearTimeout(h), h = null, g(a, d, c)) : h = setTimeout(function() {
                        h = null;
                    }, 300), a.preventDefault();
                });
            }), a(window).on("resize.lg.zoom scroll.lg.zoom orientationchange.lg.zoom", function() {
                b.pageX = a(window).width() / 2, b.pageY = a(window).height() / 2 + a(window).scrollTop(), 
                e(d);
            }), a("#lg-zoom-out").on("click.lg", function() {
                b.core.$outer.find(".lg-current .lg-image").length && (d -= b.core.s.scale, f());
            }), a("#lg-zoom-in").on("click.lg", function() {
                b.core.$outer.find(".lg-current .lg-image").length && (d += b.core.s.scale, f());
            }), a("#lg-actual-size").on("click.lg", function(a) {
                g(a, b.core.$slide.eq(b.core.index).find(".lg-image"), b.core.index, !0);
            }), b.core.$el.on("onBeforeSlide.lg.tm", function() {
                d = 1, b.resetZoom();
            }), b.zoomDrag(), b.zoomSwipe();
        }, d.prototype.resetZoom = function() {
            this.core.$outer.removeClass("lg-zoomed"), this.core.$slide.find(".lg-img-wrap").removeAttr("style data-x data-y"), 
            this.core.$slide.find(".lg-image").removeAttr("style data-scale"), this.pageX = a(window).width() / 2, 
            this.pageY = a(window).height() / 2 + a(window).scrollTop();
        }, d.prototype.zoomSwipe = function() {
            var a = this, b = {}, c = {}, d = !1, e = !1, f = !1;
            a.core.$slide.on("touchstart.lg", function(c) {
                if (a.core.$outer.hasClass("lg-zoomed")) {
                    var d = a.core.$slide.eq(a.core.index).find(".lg-object");
                    f = d.prop("offsetHeight") * d.attr("data-scale") > a.core.$outer.find(".lg").height(), 
                    ((e = d.prop("offsetWidth") * d.attr("data-scale") > a.core.$outer.find(".lg").width()) || f) && (c.preventDefault(), 
                    b = {
                        x: c.originalEvent.targetTouches[0].pageX,
                        y: c.originalEvent.targetTouches[0].pageY
                    });
                }
            }), a.core.$slide.on("touchmove.lg", function(g) {
                if (a.core.$outer.hasClass("lg-zoomed")) {
                    var h, i, j = a.core.$slide.eq(a.core.index).find(".lg-img-wrap");
                    g.preventDefault(), d = !0, c = {
                        x: g.originalEvent.targetTouches[0].pageX,
                        y: g.originalEvent.targetTouches[0].pageY
                    }, a.core.$outer.addClass("lg-zoom-dragging"), i = f ? -Math.abs(j.attr("data-y")) + (c.y - b.y) : -Math.abs(j.attr("data-y")), 
                    h = e ? -Math.abs(j.attr("data-x")) + (c.x - b.x) : -Math.abs(j.attr("data-x")), 
                    (Math.abs(c.x - b.x) > 15 || Math.abs(c.y - b.y) > 15) && (a.core.s.useLeftForZoom ? j.css({
                        left: h + "px",
                        top: i + "px"
                    }) : j.css("transform", "translate3d(" + h + "px, " + i + "px, 0)"));
                }
            }), a.core.$slide.on("touchend.lg", function() {
                a.core.$outer.hasClass("lg-zoomed") && d && (d = !1, a.core.$outer.removeClass("lg-zoom-dragging"), 
                a.touchendZoom(b, c, e, f));
            });
        }, d.prototype.zoomDrag = function() {
            var b = this, c = {}, d = {}, e = !1, f = !1, g = !1, h = !1;
            b.core.$slide.on("mousedown.lg.zoom", function(d) {
                var f = b.core.$slide.eq(b.core.index).find(".lg-object");
                h = f.prop("offsetHeight") * f.attr("data-scale") > b.core.$outer.find(".lg").height(), 
                g = f.prop("offsetWidth") * f.attr("data-scale") > b.core.$outer.find(".lg").width(), 
                b.core.$outer.hasClass("lg-zoomed") && a(d.target).hasClass("lg-object") && (g || h) && (d.preventDefault(), 
                c = {
                    x: d.pageX,
                    y: d.pageY
                }, e = !0, b.core.$outer.scrollLeft += 1, b.core.$outer.scrollLeft -= 1, b.core.$outer.removeClass("lg-grab").addClass("lg-grabbing"));
            }), a(window).on("mousemove.lg.zoom", function(a) {
                if (e) {
                    var i, j, k = b.core.$slide.eq(b.core.index).find(".lg-img-wrap");
                    f = !0, d = {
                        x: a.pageX,
                        y: a.pageY
                    }, b.core.$outer.addClass("lg-zoom-dragging"), j = h ? -Math.abs(k.attr("data-y")) + (d.y - c.y) : -Math.abs(k.attr("data-y")), 
                    i = g ? -Math.abs(k.attr("data-x")) + (d.x - c.x) : -Math.abs(k.attr("data-x")), 
                    b.core.s.useLeftForZoom ? k.css({
                        left: i + "px",
                        top: j + "px"
                    }) : k.css("transform", "translate3d(" + i + "px, " + j + "px, 0)");
                }
            }), a(window).on("mouseup.lg.zoom", function(a) {
                e && (e = !1, b.core.$outer.removeClass("lg-zoom-dragging"), !f || c.x === d.x && c.y === d.y || (d = {
                    x: a.pageX,
                    y: a.pageY
                }, b.touchendZoom(c, d, g, h)), f = !1), b.core.$outer.removeClass("lg-grabbing").addClass("lg-grab");
            });
        }, d.prototype.touchendZoom = function(a, b, c, d) {
            var e = this, f = e.core.$slide.eq(e.core.index).find(".lg-img-wrap"), g = e.core.$slide.eq(e.core.index).find(".lg-object"), h = -Math.abs(f.attr("data-x")) + (b.x - a.x), i = -Math.abs(f.attr("data-y")) + (b.y - a.y), j = (e.core.$outer.find(".lg").height() - g.prop("offsetHeight")) / 2, k = Math.abs(g.prop("offsetHeight") * Math.abs(g.attr("data-scale")) - e.core.$outer.find(".lg").height() + j), l = (e.core.$outer.find(".lg").width() - g.prop("offsetWidth")) / 2, m = Math.abs(g.prop("offsetWidth") * Math.abs(g.attr("data-scale")) - e.core.$outer.find(".lg").width() + l);
            (Math.abs(b.x - a.x) > 15 || Math.abs(b.y - a.y) > 15) && (d && (i <= -k ? i = -k : i >= -j && (i = -j)), 
            c && (h <= -m ? h = -m : h >= -l && (h = -l)), d ? f.attr("data-y", Math.abs(i)) : i = -Math.abs(f.attr("data-y")), 
            c ? f.attr("data-x", Math.abs(h)) : h = -Math.abs(f.attr("data-x")), e.core.s.useLeftForZoom ? f.css({
                left: h + "px",
                top: i + "px"
            }) : f.css("transform", "translate3d(" + h + "px, " + i + "px, 0)"));
        }, d.prototype.destroy = function() {
            var b = this;
            b.core.$el.off(".lg.zoom"), a(window).off(".lg.zoom"), b.core.$slide.off(".lg.zoom"), 
            b.core.$el.off(".lg.tm.zoom"), b.resetZoom(), clearTimeout(b.zoomabletimeout), b.zoomabletimeout = !1;
        }, a.fn.lightGallery.modules.zoom = d;
    }();
}), function(a, b) {
    "function" == typeof define && define.amd ? define([ "jquery" ], function(a) {
        return b(a);
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(jQuery);
}(0, function(a) {
    !function() {
        "use strict";
        var b = {
            hash: !0
        }, c = function(c) {
            return this.core = a(c).data("lightGallery"), this.core.s = a.extend({}, b, this.core.s), 
            this.core.s.hash && (this.oldHash = window.location.hash, this.init()), this;
        };
        c.prototype.init = function() {
            var b, c = this;
            c.core.$el.on("onAfterSlide.lg.tm", function(a, b, d) {
                history.replaceState ? history.replaceState(null, null, "#lg=" + c.core.s.galleryId + "&slide=" + d) : window.location.hash = "lg=" + c.core.s.galleryId + "&slide=" + d;
            }), a(window).on("hashchange.lg.hash", function() {
                b = window.location.hash;
                var a = parseInt(b.split("&slide=")[1], 10);
                b.indexOf("lg=" + c.core.s.galleryId) > -1 ? c.core.slide(a, !1, !1) : c.core.lGalleryOn && c.core.destroy();
            });
        }, c.prototype.destroy = function() {
            this.core.s.hash && (this.oldHash && this.oldHash.indexOf("lg=" + this.core.s.galleryId) < 0 ? history.replaceState ? history.replaceState(null, null, this.oldHash) : window.location.hash = this.oldHash : history.replaceState ? history.replaceState(null, document.title, window.location.pathname + window.location.search) : window.location.hash = "", 
            this.core.$el.off(".lg.hash"));
        }, a.fn.lightGallery.modules.hash = c;
    }();
}), function(a, b) {
    "function" == typeof define && define.amd ? define([ "jquery" ], function(a) {
        return b(a);
    }) : "object" == typeof exports ? module.exports = b(require("jquery")) : b(jQuery);
}(0, function(a) {
    !function() {
        "use strict";
        var b = {
            share: !0,
            facebook: !0,
            facebookDropdownText: "Facebook",
            twitter: !0,
            twitterDropdownText: "Twitter",
            googlePlus: !0,
            googlePlusDropdownText: "GooglePlus",
            pinterest: !0,
            pinterestDropdownText: "Pinterest"
        }, c = function(c) {
            return this.core = a(c).data("lightGallery"), this.core.s = a.extend({}, b, this.core.s), 
            this.core.s.share && this.init(), this;
        };
        c.prototype.init = function() {
            var b = this, c = '<span id="lg-share" class="lg-icon"><ul class="lg-dropdown" style="position: absolute;">';
            c += b.core.s.facebook ? '<li><a id="lg-share-facebook" target="_blank" rel="noopener"><span class="lg-icon"></span><span class="lg-dropdown-text">' + this.core.s.facebookDropdownText + "</span></a></li>" : "", 
            c += b.core.s.twitter ? '<li><a id="lg-share-twitter" target="_blank" rel="noopener"><span class="lg-icon"></span><span class="lg-dropdown-text">' + this.core.s.twitterDropdownText + "</span></a></li>" : "", 
            c += b.core.s.googlePlus ? '<li><a id="lg-share-googleplus" target="_blank" rel="noopener"><span class="lg-icon"></span><span class="lg-dropdown-text">' + this.core.s.googlePlusDropdownText + "</span></a></li>" : "", 
            c += b.core.s.pinterest ? '<li><a id="lg-share-pinterest" target="_blank" rel="noopener"><span class="lg-icon"></span><span class="lg-dropdown-text">' + this.core.s.pinterestDropdownText + "</span></a></li>" : "", 
            c += "</ul></span>", this.core.$outer.find(".lg-toolbar").append(c), this.core.$outer.find(".lg").append('<div id="lg-dropdown-overlay"></div>'), 
            a("#lg-share").on("click.lg", function() {
                b.core.$outer.toggleClass("lg-dropdown-active");
            }), a("#lg-dropdown-overlay").on("click.lg", function() {
                b.core.$outer.removeClass("lg-dropdown-active");
            }), b.core.$el.on("onAfterSlide.lg.tm", function(c, d, e) {
                setTimeout(function() {
                    a("#lg-share-facebook").attr("href", "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(b.getSahreProps(e, "facebookShareUrl") || window.location.href)), 
                    a("#lg-share-twitter").attr("href", "https://twitter.com/intent/tweet?text=" + b.getSahreProps(e, "tweetText") + "&url=" + encodeURIComponent(b.getSahreProps(e, "twitterShareUrl") || window.location.href)), 
                    a("#lg-share-googleplus").attr("href", "https://plus.google.com/share?url=" + encodeURIComponent(b.getSahreProps(e, "googleplusShareUrl") || window.location.href)), 
                    a("#lg-share-pinterest").attr("href", "http://www.pinterest.com/pin/create/button/?url=" + encodeURIComponent(b.getSahreProps(e, "pinterestShareUrl") || window.location.href) + "&media=" + encodeURIComponent(b.getSahreProps(e, "src")) + "&description=" + b.getSahreProps(e, "pinterestText"));
                }, 100);
            });
        }, c.prototype.getSahreProps = function(a, b) {
            var c = "";
            if (this.core.s.dynamic) c = this.core.s.dynamicEl[a][b]; else {
                var d = this.core.$items.eq(a).attr("href"), e = this.core.$items.eq(a).data(b);
                c = "src" === b ? d || e : e;
            }
            return c;
        }, c.prototype.destroy = function() {}, a.fn.lightGallery.modules.share = c;
    }();
}), function(a, b) {
    "use strict";
    var c = {
        item: 3,
        autoWidth: !1,
        slideMove: 1,
        slideMargin: 10,
        addClass: "",
        mode: "slide",
        useCSS: !0,
        cssEasing: "ease",
        easing: "linear",
        speed: 400,
        auto: !1,
        pauseOnHover: !1,
        loop: !1,
        slideEndAnimation: !0,
        pause: 2e3,
        keyPress: !1,
        controls: !0,
        prevHtml: "",
        nextHtml: "",
        rtl: !1,
        adaptiveHeight: !1,
        vertical: !1,
        verticalHeight: 500,
        vThumbWidth: 100,
        thumbItem: 10,
        pager: !0,
        gallery: !1,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: "middle",
        enableTouch: !0,
        enableDrag: !0,
        freeMove: !0,
        swipeThreshold: 40,
        responsive: [],
        onBeforeStart: function(a) {},
        onSliderLoad: function(a) {},
        onBeforeSlide: function(a, b) {},
        onAfterSlide: function(a, b) {},
        onBeforeNextSlide: function(a, b) {},
        onBeforePrevSlide: function(a, b) {}
    };
    a.fn.lightSlider = function(b) {
        if (0 === this.length) return this;
        if (this.length > 1) return this.each(function() {
            a(this).lightSlider(b);
        }), this;
        var d = {}, e = a.extend(!0, {}, c, b), f = {}, g = this;
        d.$el = this, "fade" === e.mode && (e.vertical = !1);
        var h = g.children(), i = a(window).width(), j = null, k = null, l = 0, m = 0, n = !1, o = 0, p = "", q = 0, r = !0 === e.vertical ? "height" : "width", s = !0 === e.vertical ? "margin-bottom" : "margin-right", t = 0, u = 0, v = 0, w = 0, x = null, y = "ontouchstart" in document.documentElement, z = {};
        return z.chbreakpoint = function() {
            if (i = a(window).width(), e.responsive.length) {
                var b;
                if (!1 === e.autoWidth && (b = e.item), i < e.responsive[0].breakpoint) for (var c = 0; c < e.responsive.length; c++) i < e.responsive[c].breakpoint && (j = e.responsive[c].breakpoint, 
                k = e.responsive[c]);
                if (void 0 !== k && null !== k) for (var d in k.settings) k.settings.hasOwnProperty(d) && ((void 0 === f[d] || null === f[d]) && (f[d] = e[d]), 
                e[d] = k.settings[d]);
                if (!a.isEmptyObject(f) && i > e.responsive[0].breakpoint) for (var g in f) f.hasOwnProperty(g) && (e[g] = f[g]);
                !1 === e.autoWidth && t > 0 && v > 0 && b !== e.item && (q = Math.round(t / ((v + e.slideMargin) * e.slideMove)));
            }
        }, z.calSW = function() {
            !1 === e.autoWidth && (v = (o - (e.item * e.slideMargin - e.slideMargin)) / e.item);
        }, z.calWidth = function(a) {
            var b = !0 === a ? p.find(".lslide").length : h.length;
            if (!1 === e.autoWidth) m = b * (v + e.slideMargin); else {
                m = 0;
                for (var c = 0; b > c; c++) m += parseInt(h.eq(c).width()) + e.slideMargin;
            }
            return m;
        }, (d = {
            doCss: function() {
                return !(!e.useCSS || !function() {
                    for (var a = [ "transition", "MozTransition", "WebkitTransition", "OTransition", "msTransition", "KhtmlTransition" ], b = document.documentElement, c = 0; c < a.length; c++) if (a[c] in b.style) return !0;
                }());
            },
            keyPress: function() {
                e.keyPress && a(document).on("keyup.lightslider", function(b) {
                    a(":focus").is("input, textarea") || (b.preventDefault ? b.preventDefault() : b.returnValue = !1, 
                    37 === b.keyCode ? g.goToPrevSlide() : 39 === b.keyCode && g.goToNextSlide());
                });
            },
            controls: function() {
                e.controls && (g.after('<div class="lSAction"><a class="lSPrev">' + e.prevHtml + '</a><a class="lSNext">' + e.nextHtml + "</a></div>"), 
                e.autoWidth ? z.calWidth(!1) < o && p.find(".lSAction").hide() : l <= e.item && p.find(".lSAction").hide(), 
                p.find(".lSAction a").on("click", function(b) {
                    return b.preventDefault ? b.preventDefault() : b.returnValue = !1, "lSPrev" === a(this).attr("class") ? g.goToPrevSlide() : g.goToNextSlide(), 
                    !1;
                }));
            },
            initialStyle: function() {
                var a = this;
                "fade" === e.mode && (e.autoWidth = !1, e.slideEndAnimation = !1), e.auto && (e.slideEndAnimation = !1), 
                e.autoWidth && (e.slideMove = 1, e.item = 1), e.loop && (e.slideMove = 1, e.freeMove = !1), 
                e.onBeforeStart.call(this, g), z.chbreakpoint(), g.addClass("lightSlider").wrap('<div class="lSSlideOuter ' + e.addClass + '"><div class="lSSlideWrapper"></div></div>'), 
                p = g.parent(".lSSlideWrapper"), !0 === e.rtl && p.parent().addClass("lSrtl"), e.vertical ? (p.parent().addClass("vertical"), 
                o = e.verticalHeight, p.css("height", o + "px")) : o = g.outerWidth(), h.addClass("lslide"), 
                !0 === e.loop && "slide" === e.mode && (z.calSW(), z.clone = function() {
                    if (z.calWidth(!0) > o) {
                        for (var b = 0, c = 0, d = 0; d < h.length && (b += parseInt(g.find(".lslide").eq(d).width()) + e.slideMargin, 
                        c++, !(b >= o + e.slideMargin)); d++) ;
                        var f = !0 === e.autoWidth ? c : e.item;
                        if (f < g.find(".clone.left").length) for (var i = 0; i < g.find(".clone.left").length - f; i++) h.eq(i).remove();
                        if (f < g.find(".clone.right").length) for (var j = h.length - 1; j > h.length - 1 - g.find(".clone.right").length; j--) q--, 
                        h.eq(j).remove();
                        for (var k = g.find(".clone.right").length; f > k; k++) g.find(".lslide").eq(k).clone().removeClass("lslide").addClass("clone right").appendTo(g), 
                        q++;
                        for (var l = g.find(".lslide").length - g.find(".clone.left").length; l > g.find(".lslide").length - f; l--) g.find(".lslide").eq(l - 1).clone().removeClass("lslide").addClass("clone left").prependTo(g);
                        h = g.children();
                    } else h.hasClass("clone") && (g.find(".clone").remove(), a.move(g, 0));
                }, z.clone()), z.sSW = function() {
                    l = h.length, !0 === e.rtl && !1 === e.vertical && (s = "margin-left"), !1 === e.autoWidth && h.css(r, v + "px"), 
                    h.css(s, e.slideMargin + "px"), m = z.calWidth(!1), g.css(r, m + "px"), !0 === e.loop && "slide" === e.mode && !1 === n && (q = g.find(".clone.left").length);
                }, z.calL = function() {
                    h = g.children(), l = h.length;
                }, this.doCss() && p.addClass("usingCss"), z.calL(), "slide" === e.mode ? (z.calSW(), 
                z.sSW(), !0 === e.loop && (t = a.slideValue(), this.move(g, t)), !1 === e.vertical && this.setHeight(g, !1)) : (this.setHeight(g, !0), 
                g.addClass("lSFade"), this.doCss() || (h.fadeOut(0), h.eq(q).fadeIn(0))), !0 === e.loop && "slide" === e.mode ? h.eq(q).addClass("active") : h.first().addClass("active");
            },
            pager: function() {
                var a = this;
                if (z.createPager = function() {
                    w = (o - (e.thumbItem * e.thumbMargin - e.thumbMargin)) / e.thumbItem;
                    var b = p.find(".lslide"), c = p.find(".lslide").length, d = 0, f = "", h = 0;
                    for (d = 0; c > d; d++) {
                        "slide" === e.mode && (e.autoWidth ? h += (parseInt(b.eq(d).width()) + e.slideMargin) * e.slideMove : h = d * (v + e.slideMargin) * e.slideMove);
                        var i = b.eq(d * e.slideMove).attr("data-thumb");
                        if (f += !0 === e.gallery ? '<li style="width:100%;' + r + ":" + w + "px;" + s + ":" + e.thumbMargin + 'px"><a href="#"><img src="' + i + '" /></a></li>' : '<li><a href="#">' + (d + 1) + "</a></li>", 
                        "slide" === e.mode && h >= m - o - e.slideMargin) {
                            d += 1;
                            var j = 2;
                            e.autoWidth && (f += '<li><a href="#">' + (d + 1) + "</a></li>", j = 1), j > d ? (f = null, 
                            p.parent().addClass("noPager")) : p.parent().removeClass("noPager");
                            break;
                        }
                    }
                    var k = p.parent();
                    k.find(".lSPager").html(f), !0 === e.gallery && (!0 === e.vertical && k.find(".lSPager").css("width", e.vThumbWidth + "px"), 
                    u = d * (e.thumbMargin + w) + .5, k.find(".lSPager").css({
                        property: u + "px",
                        "transition-duration": e.speed + "ms"
                    }), !0 === e.vertical && p.parent().css("padding-right", e.vThumbWidth + e.galleryMargin + "px"), 
                    k.find(".lSPager").css(r, u + "px"));
                    var l = k.find(".lSPager").find("li");
                    l.first().addClass("active"), l.on("click", function() {
                        return !0 === e.loop && "slide" === e.mode ? q += l.index(this) - k.find(".lSPager").find("li.active").index() : q = l.index(this), 
                        g.mode(!1), !0 === e.gallery && a.slideThumb(), !1;
                    });
                }, e.pager) {
                    var b = "lSpg";
                    e.gallery && (b = "lSGallery"), p.after('<ul class="lSPager ' + b + '"></ul>');
                    var c = e.vertical ? "margin-left" : "margin-top";
                    p.parent().find(".lSPager").css(c, e.galleryMargin + "px"), z.createPager();
                }
                setTimeout(function() {
                    z.init();
                }, 0);
            },
            setHeight: function(a, b) {
                var c = null, d = this;
                c = e.loop ? a.children(".lslide ").first() : a.children().first();
                var f = function() {
                    var d = c.outerHeight(), e = 0, f = d;
                    b && (d = 0, e = 100 * f / o), a.css({
                        height: d + "px",
                        "padding-bottom": e + "%"
                    });
                };
                f(), c.find("img").length ? c.find("img")[0].complete ? (f(), x || d.auto()) : c.find("img").on("load", function() {
                    setTimeout(function() {
                        f(), x || d.auto();
                    }, 100);
                }) : x || d.auto();
            },
            active: function(a, b) {
                this.doCss() && "fade" === e.mode && p.addClass("on");
                var c = 0;
                if (q * e.slideMove < l) {
                    a.removeClass("active"), this.doCss() || "fade" !== e.mode || !1 !== b || a.fadeOut(e.speed), 
                    c = !0 === b ? q : q * e.slideMove;
                    var d, f;
                    !0 === b && (d = a.length, f = d - 1, c + 1 >= d && (c = f)), !0 === e.loop && "slide" === e.mode && (c = !0 === b ? q - g.find(".clone.left").length : q * e.slideMove, 
                    !0 === b && (d = a.length, f = d - 1, c + 1 === d ? c = f : c + 1 > d && (c = 0))), 
                    this.doCss() || "fade" !== e.mode || !1 !== b || a.eq(c).fadeIn(e.speed), a.eq(c).addClass("active");
                } else a.removeClass("active"), a.eq(a.length - 1).addClass("active"), this.doCss() || "fade" !== e.mode || !1 !== b || (a.fadeOut(e.speed), 
                a.eq(c).fadeIn(e.speed));
            },
            move: function(a, b) {
                !0 === e.rtl && (b = -b), this.doCss() ? a.css(!0 === e.vertical ? {
                    transform: "translate3d(0px, " + -b + "px, 0px)",
                    "-webkit-transform": "translate3d(0px, " + -b + "px, 0px)"
                } : {
                    transform: "translate3d(" + -b + "px, 0px, 0px)",
                    "-webkit-transform": "translate3d(" + -b + "px, 0px, 0px)"
                }) : !0 === e.vertical ? a.css("position", "relative").animate({
                    top: -b + "px"
                }, e.speed, e.easing) : a.css("position", "relative").animate({
                    left: -b + "px"
                }, e.speed, e.easing);
                var c = p.parent().find(".lSPager").find("li");
                this.active(c, !0);
            },
            fade: function() {
                this.active(h, !1);
                var a = p.parent().find(".lSPager").find("li");
                this.active(a, !0);
            },
            slide: function() {
                var a = this;
                z.calSlide = function() {
                    m > o && (t = a.slideValue(), a.active(h, !1), t > m - o - e.slideMargin ? t = m - o - e.slideMargin : 0 > t && (t = 0), 
                    a.move(g, t), !0 === e.loop && "slide" === e.mode && (q >= l - g.find(".clone.left").length / e.slideMove && a.resetSlide(g.find(".clone.left").length), 
                    0 === q && a.resetSlide(p.find(".lslide").length)));
                }, z.calSlide();
            },
            resetSlide: function(a) {
                var b = this;
                p.find(".lSAction a").addClass("disabled"), setTimeout(function() {
                    q = a, p.css("transition-duration", "0ms"), t = b.slideValue(), b.active(h, !1), 
                    d.move(g, t), setTimeout(function() {
                        p.css("transition-duration", e.speed + "ms"), p.find(".lSAction a").removeClass("disabled");
                    }, 50);
                }, e.speed + 100);
            },
            slideValue: function() {
                var a = 0;
                if (!1 === e.autoWidth) a = q * (v + e.slideMargin) * e.slideMove; else {
                    a = 0;
                    for (var b = 0; q > b; b++) a += parseInt(h.eq(b).width()) + e.slideMargin;
                }
                return a;
            },
            slideThumb: function() {
                var a;
                switch (e.currentPagerPosition) {
                  case "left":
                    a = 0;
                    break;

                  case "middle":
                    a = o / 2 - w / 2;
                    break;

                  case "right":
                    a = o - w;
                }
                var b = q - g.find(".clone.left").length, c = p.parent().find(".lSPager");
                "slide" === e.mode && !0 === e.loop && (b >= c.children().length ? b = 0 : 0 > b && (b = c.children().length));
                var d = b * (w + e.thumbMargin) - a;
                d + o > u && (d = u - o - e.thumbMargin), 0 > d && (d = 0), this.move(c, d);
            },
            auto: function() {
                e.auto && (clearInterval(x), x = setInterval(function() {
                    g.goToNextSlide();
                }, e.pause));
            },
            pauseOnHover: function() {
                var b = this;
                e.auto && e.pauseOnHover && (p.on("mouseenter", function() {
                    a(this).addClass("ls-hover"), g.pause(), e.auto = !0;
                }), p.on("mouseleave", function() {
                    a(this).removeClass("ls-hover"), p.find(".lightSlider").hasClass("lsGrabbing") || b.auto();
                }));
            },
            touchMove: function(a, b) {
                if (p.css("transition-duration", "0ms"), "slide" === e.mode) {
                    var d = t - (a - b);
                    if (d >= m - o - e.slideMargin) if (!1 === e.freeMove) d = m - o - e.slideMargin; else {
                        var f = m - o - e.slideMargin;
                        d = f + (d - f) / 5;
                    } else 0 > d && (!1 === e.freeMove ? d = 0 : d /= 5);
                    this.move(g, d);
                }
            },
            touchEnd: function(a) {
                if (p.css("transition-duration", e.speed + "ms"), "slide" === e.mode) {
                    var b = !1, c = !0;
                    (t -= a) > m - o - e.slideMargin ? (t = m - o - e.slideMargin, !1 === e.autoWidth && (b = !0)) : 0 > t && (t = 0);
                    var d = function(a) {
                        var c = 0;
                        if (b || a && (c = 1), e.autoWidth) for (var d = 0, f = 0; f < h.length && (d += parseInt(h.eq(f).width()) + e.slideMargin, 
                        q = f + c, !(d >= t)); f++) ; else {
                            var g = t / ((v + e.slideMargin) * e.slideMove);
                            q = parseInt(g) + c, t >= m - o - e.slideMargin && g % 1 != 0 && q++;
                        }
                    };
                    a >= e.swipeThreshold ? (d(!1), c = !1) : a <= -e.swipeThreshold && (d(!0), c = !1), 
                    g.mode(c), this.slideThumb();
                } else a >= e.swipeThreshold ? g.goToPrevSlide() : a <= -e.swipeThreshold && g.goToNextSlide();
            },
            enableDrag: function() {
                var b = this;
                if (!y) {
                    var c = 0, d = 0, f = !1;
                    p.find(".lightSlider").addClass("lsGrab"), p.on("mousedown", function(b) {
                        return !(o > m && 0 !== m) && void ("lSPrev" !== a(b.target).attr("class") && "lSNext" !== a(b.target).attr("class") && (c = !0 === e.vertical ? b.pageY : b.pageX, 
                        f = !0, b.preventDefault ? b.preventDefault() : b.returnValue = !1, p.scrollLeft += 1, 
                        p.scrollLeft -= 1, p.find(".lightSlider").removeClass("lsGrab").addClass("lsGrabbing"), 
                        clearInterval(x)));
                    }), a(window).on("mousemove", function(a) {
                        f && (d = !0 === e.vertical ? a.pageY : a.pageX, b.touchMove(d, c));
                    }), a(window).on("mouseup", function(g) {
                        if (f) {
                            p.find(".lightSlider").removeClass("lsGrabbing").addClass("lsGrab"), f = !1;
                            var h = (d = !0 === e.vertical ? g.pageY : g.pageX) - c;
                            Math.abs(h) >= e.swipeThreshold && a(window).on("click.ls", function(b) {
                                b.preventDefault ? b.preventDefault() : b.returnValue = !1, b.stopImmediatePropagation(), 
                                b.stopPropagation(), a(window).off("click.ls");
                            }), b.touchEnd(h);
                        }
                    });
                }
            },
            enableTouch: function() {
                var a = this;
                if (y) {
                    var b = {}, c = {};
                    p.on("touchstart", function(a) {
                        c = a.originalEvent.targetTouches[0], b.pageX = a.originalEvent.targetTouches[0].pageX, 
                        b.pageY = a.originalEvent.targetTouches[0].pageY, clearInterval(x);
                    }), p.on("touchmove", function(d) {
                        if (o > m && 0 !== m) return !1;
                        var f = d.originalEvent;
                        c = f.targetTouches[0];
                        var g = Math.abs(c.pageX - b.pageX), h = Math.abs(c.pageY - b.pageY);
                        !0 === e.vertical ? (3 * h > g && d.preventDefault(), a.touchMove(c.pageY, b.pageY)) : (3 * g > h && d.preventDefault(), 
                        a.touchMove(c.pageX, b.pageX));
                    }), p.on("touchend", function() {
                        if (o > m && 0 !== m) return !1;
                        var d;
                        d = !0 === e.vertical ? c.pageY - b.pageY : c.pageX - b.pageX, a.touchEnd(d);
                    });
                }
            },
            build: function() {
                var b = this;
                b.initialStyle(), this.doCss() && (!0 === e.enableTouch && b.enableTouch(), !0 === e.enableDrag && b.enableDrag()), 
                a(window).on("focus", function() {
                    b.auto();
                }), a(window).on("blur", function() {
                    clearInterval(x);
                }), b.pager(), b.pauseOnHover(), b.controls(), b.keyPress();
            }
        }).build(), z.init = function() {
            z.chbreakpoint(), !0 === e.vertical ? (o = e.item > 1 ? e.verticalHeight : h.outerHeight(), 
            p.css("height", o + "px")) : o = p.outerWidth(), !0 === e.loop && "slide" === e.mode && z.clone(), 
            z.calL(), "slide" === e.mode && g.removeClass("lSSlide"), "slide" === e.mode && (z.calSW(), 
            z.sSW()), setTimeout(function() {
                "slide" === e.mode && g.addClass("lSSlide");
            }, 1e3), e.pager && z.createPager(), !0 === e.adaptiveHeight && !1 === e.vertical && g.css("height", h.eq(q).outerHeight(!0)), 
            !1 === e.adaptiveHeight && ("slide" === e.mode ? !1 === e.vertical ? d.setHeight(g, !1) : d.auto() : d.setHeight(g, !0)), 
            !0 === e.gallery && d.slideThumb(), "slide" === e.mode && d.slide(), !1 === e.autoWidth ? h.length <= e.item ? p.find(".lSAction").hide() : p.find(".lSAction").show() : z.calWidth(!1) < o && 0 !== m ? p.find(".lSAction").hide() : p.find(".lSAction").show();
        }, g.goToPrevSlide = function() {
            if (q > 0) e.onBeforePrevSlide.call(this, g, q), q--, g.mode(!1), !0 === e.gallery && d.slideThumb(); else if (!0 === e.loop) {
                if (e.onBeforePrevSlide.call(this, g, q), "fade" === e.mode) {
                    var a = l - 1;
                    q = parseInt(a / e.slideMove);
                }
                g.mode(!1), !0 === e.gallery && d.slideThumb();
            } else !0 === e.slideEndAnimation && (g.addClass("leftEnd"), setTimeout(function() {
                g.removeClass("leftEnd");
            }, 400));
        }, g.goToNextSlide = function() {
            var a = !0;
            "slide" === e.mode && (a = d.slideValue() < m - o - e.slideMargin), q * e.slideMove < l - e.slideMove && a ? (e.onBeforeNextSlide.call(this, g, q), 
            q++, g.mode(!1), !0 === e.gallery && d.slideThumb()) : !0 === e.loop ? (e.onBeforeNextSlide.call(this, g, q), 
            q = 0, g.mode(!1), !0 === e.gallery && d.slideThumb()) : !0 === e.slideEndAnimation && (g.addClass("rightEnd"), 
            setTimeout(function() {
                g.removeClass("rightEnd");
            }, 400));
        }, g.mode = function(a) {
            !0 === e.adaptiveHeight && !1 === e.vertical && g.css("height", h.eq(q).outerHeight(!0)), 
            !1 === n && ("slide" === e.mode ? d.doCss() && (g.addClass("lSSlide"), "" !== e.speed && p.css("transition-duration", e.speed + "ms"), 
            "" !== e.cssEasing && p.css("transition-timing-function", e.cssEasing)) : d.doCss() && ("" !== e.speed && g.css("transition-duration", e.speed + "ms"), 
            "" !== e.cssEasing && g.css("transition-timing-function", e.cssEasing))), a || e.onBeforeSlide.call(this, g, q), 
            "slide" === e.mode ? d.slide() : d.fade(), p.hasClass("ls-hover") || d.auto(), setTimeout(function() {
                a || e.onAfterSlide.call(this, g, q);
            }, e.speed), n = !0;
        }, g.play = function() {
            g.goToNextSlide(), e.auto = !0, d.auto();
        }, g.pause = function() {
            e.auto = !1, clearInterval(x);
        }, g.refresh = function() {
            z.init();
        }, g.getCurrentSlideCount = function() {
            var a = q;
            if (e.loop) {
                var b = p.find(".lslide").length, c = g.find(".clone.left").length;
                a = c - 1 >= q ? b + (q - c) : q >= b + c ? q - b - c : q - c;
            }
            return a + 1;
        }, g.getTotalSlideCount = function() {
            return p.find(".lslide").length;
        }, g.goToSlide = function(a) {
            q = e.loop ? a + g.find(".clone.left").length - 1 : a, g.mode(!1), !0 === e.gallery && d.slideThumb();
        }, g.destroy = function() {
            g.lightSlider && (g.goToPrevSlide = function() {}, g.goToNextSlide = function() {}, 
            g.mode = function() {}, g.play = function() {}, g.pause = function() {}, g.refresh = function() {}, 
            g.getCurrentSlideCount = function() {}, g.getTotalSlideCount = function() {}, g.goToSlide = function() {}, 
            g.lightSlider = null, z = {
                init: function() {}
            }, g.parent().parent().find(".lSAction, .lSPager").remove(), g.removeClass("lightSlider lSFade lSSlide lsGrab lsGrabbing leftEnd right").removeAttr("style").unwrap().unwrap(), 
            g.children().removeAttr("style"), h.removeClass("lslide active"), g.find(".clone").remove(), 
            h = null, x = null, n = !1, q = 0);
        }, setTimeout(function() {
            e.onSliderLoad.call(this, g);
        }, 10), a(window).on("resize orientationchange", function(a) {
            setTimeout(function() {
                a.preventDefault ? a.preventDefault() : a.returnValue = !1, z.init();
            }, 200);
        }), this;
    };
}(jQuery), function() {
    function toggleFocus() {
        for (var self = this; -1 === self.className.indexOf("nav-menu"); ) "li" === self.tagName.toLowerCase() && (-1 !== self.className.indexOf("focus") ? self.className = self.className.replace(" focus", "") : self.className += " focus"), 
        self = self.parentElement;
    }
    var container, button, menu, links, i, len;
    if ((container = document.getElementById("site-navigation")) && void 0 !== (button = container.getElementsByTagName("button")[0])) if (void 0 !== (menu = container.getElementsByTagName("ul")[0])) {
        for (menu.setAttribute("aria-expanded", "false"), -1 === menu.className.indexOf("nav-menu") && (menu.className += " nav-menu"), 
        button.onclick = function() {
            -1 !== container.className.indexOf("toggled") ? (container.className = container.className.replace(" toggled", ""), 
            button.setAttribute("aria-expanded", "false"), menu.setAttribute("aria-expanded", "false")) : (container.className += " toggled", 
            button.setAttribute("aria-expanded", "true"), menu.setAttribute("aria-expanded", "true"));
        }, i = 0, len = (links = menu.getElementsByTagName("a")).length; i < len; i++) links[i].addEventListener("focus", toggleFocus, !0), 
        links[i].addEventListener("blur", toggleFocus, !0);
        !function(container) {
            var touchStartFn, i, parentLink = container.querySelectorAll(".menu-item-has-children > a, .page_item_has_children > a");
            if ("ontouchstart" in window) for (touchStartFn = function(e) {
                var i, menuItem = this.parentNode;
                if (menuItem.classList.contains("focus")) menuItem.classList.remove("focus"); else {
                    for (e.preventDefault(), i = 0; i < menuItem.parentNode.children.length; ++i) menuItem !== menuItem.parentNode.children[i] && menuItem.parentNode.children[i].classList.remove("focus");
                    menuItem.classList.add("focus");
                }
            }, i = 0; i < parentLink.length; ++i) parentLink[i].addEventListener("touchstart", touchStartFn, !1);
        }(container);
    } else button.style.display = "none";
}(), /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function() {
    var element, id = location.hash.substring(1);
    /^[A-z0-9_-]+$/.test(id) && (element = document.getElementById(id)) && (/^(?:a|select|input|button|textarea)$/i.test(element.tagName) || (element.tabIndex = -1), 
    element.focus());
}, !1), $(document).ready(function() {
    $("#image-gallery").lightSlider({
        gallery: !0,
        item: 1,
        loop: !0,
        slideMargin: 0,
        thumbItem: 9,
        enableDrag: !1,
        currentPagerPosition: "left",
        onSliderLoad: function(el) {
            el.lightGallery({
                download: !1,
                selector: "#image-gallery .lslide"
            });
        }
    });
});