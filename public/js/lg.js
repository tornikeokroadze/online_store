! function() {
    var e, t, i, n, o, s, r, a, l, d;
    t = window.device, e = {}, window.device = e, n = window.document.documentElement, d = window.navigator.userAgent.toLowerCase(), e.ios = function() {
        return e.iphone() || e.ipod() || e.ipad()
    }, e.iphone = function() {
        return !e.windows() && o("iphone")
    }, e.ipod = function() {
        return o("ipod")
    }, e.ipad = function() {
        return o("ipad")
    }, e.android = function() {
        return !e.windows() && o("android")
    }, e.androidPhone = function() {
        return e.android() && o("mobile")
    }, e.androidTablet = function() {
        return e.android() && !o("mobile")
    }, e.blackberry = function() {
        return o("blackberry") || o("bb10") || o("rim")
    }, e.blackberryPhone = function() {
        return e.blackberry() && !o("tablet")
    }, e.blackberryTablet = function() {
        return e.blackberry() && o("tablet")
    }, e.windows = function() {
        return o("windows")
    }, e.windowsPhone = function() {
        return e.windows() && o("phone")
    }, e.windowsTablet = function() {
        return e.windows() && o("touch") && !e.windowsPhone()
    }, e.fxos = function() {
        return (o("(mobile;") || o("(tablet;")) && o("; rv:")
    }, e.fxosPhone = function() {
        return e.fxos() && o("mobile")
    }, e.fxosTablet = function() {
        return e.fxos() && o("tablet")
    }, e.meego = function() {
        return o("meego")
    }, e.cordova = function() {
        return window.cordova && "file:" === location.protocol
    }, e.nodeWebkit = function() {
        return "object" == typeof window.process
    }, e.mobile = function() {
        return e.androidPhone() || e.iphone() || e.ipod() || e.windowsPhone() || e.blackberryPhone() || e.fxosPhone() || e.meego()
    }, e.tablet = function() {
        return e.ipad() || e.androidTablet() || e.blackberryTablet() || e.windowsTablet() || e.fxosTablet()
    }, e.desktop = function() {
        return !e.tablet() && !e.mobile()
    }, e.television = function() {
        var e;
        for (television = ["googletv", "viera", "smarttv", "internet.tv", "netcast", "nettv", "appletv", "boxee", "kylo", "roku", "dlnadoc", "roku", "pov_tv", "hbbtv", "ce-html"], e = 0; e < television.length;) {
            if (o(television[e])) return !0;
            e++
        }
        return !1
    }, e.portrait = function() {
        return 1 < window.innerHeight / window.innerWidth
    }, e.landscape = function() {
        return window.innerHeight / window.innerWidth < 1
    }, e.noConflict = function() {
        return window.device = t, this
    }, o = function(e) {
        return -1 !== d.indexOf(e)
    }, r = function(e) {
        var t;
        return t = new RegExp(e, "i"), n.className.match(t)
    }, i = function(e) {
        var t = null;
        r(e) || (t = n.className.replace(/^\s+|\s+$/g, ""), n.className = t + " " + e)
    }, l = function(e) {
        r(e) && (n.className = n.className.replace(" " + e, ""))
    }, e.ios() ? e.ipad() ? i("ios ipad tablet") : e.iphone() ? i("ios iphone mobile") : e.ipod() && i("ios ipod mobile") : e.android() ? e.androidTablet() ? i("android tablet") : i("android mobile") : e.blackberry() ? e.blackberryTablet() ? i("blackberry tablet") : i("blackberry mobile") : e.windows() ? e.windowsTablet() ? i("windows tablet") : e.windowsPhone() ? i("windows mobile") : i("desktop") : e.fxos() ? e.fxosTablet() ? i("fxos tablet") : i("fxos mobile") : e.meego() ? i("meego mobile") : e.nodeWebkit() ? i("node-webkit") : e.television() ? i("television") : e.desktop() && i("desktop"), e.cordova() && i("cordova"), s = function() {
        e.landscape() ? (l("portrait"), i("landscape")) : (l("landscape"), i("portrait"))
    }, a = Object.prototype.hasOwnProperty.call(window, "onorientationchange") ? "orientationchange" : "resize", window.addEventListener ? window.addEventListener(a, s, !1) : window.attachEvent ? window.attachEvent(a, s) : window[a] = s, s(), "function" == typeof define && "object" == typeof define.amd && define.amd ? define(function() {
        return e
    }) : "undefined" != typeof module && module.exports ? module.exports = e : window.device = e
}.call(this), window.matchMedia || (window.matchMedia = function() {
        "use strict";
        var t = window.styleMedia || window.media;
        if (!t) {
            var i, n = document.createElement("style"),
                e = document.getElementsByTagName("script")[0];
            n.type = "text/css", n.id = "matchmediajs-test", e.parentNode.insertBefore(n, e), i = "getComputedStyle" in window && window.getComputedStyle(n, null) || n.currentStyle, t = {
                matchMedium: function(e) {
                    var t = "@media " + e + "{ #matchmediajs-test { width: 1px; } }";
                    return n.styleSheet ? n.styleSheet.cssText = t : n.textContent = t, "1px" === i.width
                }
            }
        }
        return function(e) {
            return {
                matches: t.matchMedium(e || "all"),
                media: e || "all"
            }
        }
    }()),
    function(d, u, e) {
        "use strict";

        function t(e) {
            "object" == typeof module && "object" == typeof module.exports ? module.exports = e : "function" == typeof define && define.amd && define("picturefill", function() {
                return e
            }), "object" == typeof d && (d.picturefill = e)
        }

        function o(e) {
            for (var t, i, n, o, s, r = e || {}, a = 0, l = (t = r.elements || c.getAllElements()).length; a < l; a++)
                if (n = (i = t[a]).parentNode, s = o = void 0, "IMG" === i.nodeName.toUpperCase() && (i[c.ns] || (i[c.ns] = {}), r.reevaluate || !i[c.ns].evaluated)) {
                    if (n && "PICTURE" === n.nodeName.toUpperCase()) {
                        if (c.removeVideoShim(n), !1 === (o = c.getMatch(i, n))) continue
                    } else o = void 0;
                    (n && "PICTURE" === n.nodeName.toUpperCase() || !c.sizesSupported && i.srcset && h.test(i.srcset)) && c.dodgeSrcset(i), o ? (s = c.processSourceSet(o), c.applyBestCandidate(s, i)) : (s = c.processSourceSet(i), void 0 !== i.srcset && !i[c.ns].srcset || c.applyBestCandidate(s, i)), i[c.ns].evaluated = !0
                }
        }
        if (d.HTMLPictureElement) t(function() {});
        else {
            u.createElement("picture");
            var n, i, c = d.picturefill || {},
                h = /\s+\+?\d+(e\d+)?w/;
            c.ns = "picturefill", c.srcsetSupported = "srcset" in e, c.sizesSupported = "sizes" in e, c.curSrcSupported = "currentSrc" in e, c.trim = function(e) {
                    return e.trim ? e.trim() : e.replace(/^\s+|\s+$/g, "")
                }, c.makeUrl = (i = u.createElement("a"), function(e) {
                    return i.href = e, i.href
                }), c.restrictsMixedContent = function() {
                    return "https:" === d.location.protocol
                }, c.matchesMedia = function(e) {
                    return d.matchMedia && d.matchMedia(e).matches
                }, c.getDpr = function() {
                    return d.devicePixelRatio || 1
                }, c.getWidthFromLength = function(e) {
                    var t;
                    if (!e || -1 < e.indexOf("%") != 0 || !(0 < parseFloat(e) || -1 < e.indexOf("calc("))) return !1;
                    e = e.replace("vw", "%"), c.lengthEl || (c.lengthEl = u.createElement("div"), c.lengthEl.style.cssText = "border:0;display:block;font-size:1em;left:0;margin:0;padding:0;position:absolute;visibility:hidden", c.lengthEl.className = "helper-from-picturefill-js"), c.lengthEl.style.width = "0px";
                    try {
                        c.lengthEl.style.width = e
                    } catch (e) {}
                    return u.body.appendChild(c.lengthEl), (t = c.lengthEl.offsetWidth) <= 0 && (t = !1), u.body.removeChild(c.lengthEl), t
                }, c.detectTypeSupport = function(e, t) {
                    var i = new d.Image;
                    return i.onerror = function() {
                        c.types[e] = !1, o()
                    }, i.onload = function() {
                        c.types[e] = 1 === i.width, o()
                    }, i.src = t, "pending"
                }, c.types = c.types || {}, c.initTypeDetects = function() {
                    c.types["image/jpeg"] = !0, c.types["image/gif"] = !0, c.types["image/png"] = !0, c.types["image/svg+xml"] = u.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image", "1.1"), c.types["image/webp"] = c.detectTypeSupport("image/webp", "data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA=")
                }, c.verifyTypeSupport = function(e) {
                    var t = e.getAttribute("type");
                    if (null === t || "" === t) return !0;
                    var i = c.types[t];
                    return "string" == typeof i && "pending" !== i ? (c.types[t] = c.detectTypeSupport(t, i), "pending") : "function" == typeof i ? (i(), "pending") : i
                }, c.parseSize = function(e) {
                    var t = /(\([^)]+\))?\s*(.+)/g.exec(e);
                    return {
                        media: t && t[1],
                        length: t && t[2]
                    }
                }, c.findWidthFromSourceSize = function(e) {
                    for (var t, i = c.trim(e).split(/\s*,\s*/), n = 0, o = i.length; n < o; n++) {
                        var s = i[n],
                            r = c.parseSize(s),
                            a = r.length,
                            l = r.media;
                        if (a && (!l || c.matchesMedia(l)) && (t = c.getWidthFromLength(a))) break
                    }
                    return t || Math.max(d.innerWidth || 0, u.documentElement.clientWidth)
                }, c.parseSrcset = function(e) {
                    for (var t = [];
                        "" !== e;) {
                        var i, n = (e = e.replace(/^\s+/g, "")).search(/\s/g),
                            o = null;
                        if (-1 !== n) {
                            if ("," !== (i = e.slice(0, n)).slice(-1) && "" !== i || (i = i.replace(/,+$/, ""), o = ""), e = e.slice(n + 1), null === o) {
                                var s = e.indexOf(",");
                                e = -1 !== s ? (o = e.slice(0, s), e.slice(s + 1)) : (o = e, "")
                            }
                        } else i = e, e = "";
                        (i || o) && t.push({
                            url: i,
                            descriptor: o
                        })
                    }
                    return t
                }, c.parseDescriptor = function(e, t) {
                    var i, n = t || "100vw",
                        o = e && e.replace(/(^\s+|\s+$)/g, ""),
                        s = c.findWidthFromSourceSize(n);
                    if (o)
                        for (var r = o.split(" "), a = r.length - 1; 0 <= a; a--) {
                            var l = r[a],
                                d = l && l.slice(l.length - 1);
                            if ("h" !== d && "w" !== d || c.sizesSupported) {
                                if ("x" === d) {
                                    var u = l && parseFloat(l, 10);
                                    i = u && !isNaN(u) ? u : 1
                                }
                            } else i = parseFloat(parseInt(l, 10) / s)
                        }
                    return i || 1
                }, c.getCandidatesFromSourceSet = function(e, t) {
                    for (var i = c.parseSrcset(e), n = [], o = 0, s = i.length; o < s; o++) {
                        var r = i[o];
                        n.push({
                            url: r.url,
                            resolution: c.parseDescriptor(r.descriptor, t)
                        })
                    }
                    return n
                }, c.dodgeSrcset = function(e) {
                    e.srcset && (e[c.ns].srcset = e.srcset, e.srcset = "", e.setAttribute("data-pfsrcset", e[c.ns].srcset))
                }, c.processSourceSet = function(e) {
                    var t = e.getAttribute("srcset"),
                        i = e.getAttribute("sizes"),
                        n = [];
                    return "IMG" === e.nodeName.toUpperCase() && e[c.ns] && e[c.ns].srcset && (t = e[c.ns].srcset), t && (n = c.getCandidatesFromSourceSet(t, i)), n
                }, c.backfaceVisibilityFix = function(e) {
                    var t = e.style || {},
                        i = "webkitBackfaceVisibility" in t,
                        n = t.zoom;
                    i && (t.zoom = ".999", i = e.offsetWidth, t.zoom = n)
                }, c.setIntrinsicSize = (n = {}, function(e, t) {
                    var i;
                    e[c.ns] && !d.pfStopIntrinsicSize && (void 0 === e[c.ns].dims && (e[c.ns].dims = e.getAttribute("width") || e.getAttribute("height")), e[c.ns].dims || (t.url in n ? s(e, n[t.url], t.resolution) : ((i = u.createElement("img")).onload = function() {
                        if (n[t.url] = i.width, !n[t.url]) try {
                            u.body.appendChild(i), n[t.url] = i.width || i.offsetWidth, u.body.removeChild(i)
                        } catch (e) {}
                        e.src === t.url && s(e, n[t.url], t.resolution), e = null, i.onload = null, i = null
                    }, i.src = t.url)))
                }), c.applyBestCandidate = function(e, t) {
                    var i, n, o;
                    e.sort(c.ascendingSort), o = e[(n = e.length) - 1];
                    for (var s = 0; s < n; s++)
                        if ((i = e[s]).resolution >= c.getDpr()) {
                            o = i;
                            break
                        } o && (o.url = c.makeUrl(o.url), t.src !== o.url && (c.restrictsMixedContent() && "http:" === o.url.substr(0, "http:".length).toLowerCase() ? void 0 !== window.console && console.warn("Blocked mixed content image " + o.url) : (t.src = o.url, c.curSrcSupported || (t.currentSrc = t.src), c.backfaceVisibilityFix(t))), c.setIntrinsicSize(t, o))
                }, c.ascendingSort = function(e, t) {
                    return e.resolution - t.resolution
                }, c.removeVideoShim = function(e) {
                    var t = e.getElementsByTagName("video");
                    if (t.length) {
                        for (var i = t[0], n = i.getElementsByTagName("source"); n.length;) e.insertBefore(n[0], i);
                        i.parentNode.removeChild(i)
                    }
                }, c.getAllElements = function() {
                    for (var e = [], t = u.getElementsByTagName("img"), i = 0, n = t.length; i < n; i++) {
                        var o = t[i];
                        ("PICTURE" === o.parentNode.nodeName.toUpperCase() || null !== o.getAttribute("srcset") || o[c.ns] && null !== o[c.ns].srcset) && e.push(o)
                    }
                    return e
                }, c.getMatch = function(e, t) {
                    for (var i, n = t.childNodes, o = 0, s = n.length; o < s; o++) {
                        var r = n[o];
                        if (1 === r.nodeType) {
                            if (r === e) return i;
                            if ("SOURCE" === r.nodeName.toUpperCase()) {
                                null !== r.getAttribute("src") && console.warn("The `src` attribute is invalid on `picture` `source` element; instead, use `srcset`.");
                                var a = r.getAttribute("media");
                                if (r.getAttribute("srcset") && (!a || c.matchesMedia(a))) {
                                    var l = c.verifyTypeSupport(r);
                                    if (!0 === l) {
                                        i = r;
                                        break
                                    }
                                    if ("pending" === l) return !1
                                }
                            }
                        }
                    }
                    return i
                },
                function() {
                    function e() {
                        clearTimeout(i), i = setTimeout(t, 60)
                    }

                    function t() {
                        o({
                            reevaluate: !0
                        })
                    }
                    c.initTypeDetects(), o();
                    var i, n = setInterval(function() {
                        return o(), /^loaded|^i|^c/.test(u.readyState) ? void clearInterval(n) : void 0
                    }, 250);
                    d.addEventListener ? d.addEventListener("resize", e, !1) : d.attachEvent && d.attachEvent("onresize", e)
                }(), o._ = c, t(o)
        }

        function s(e, t, i) {
            t && e.setAttribute("width", parseInt(t / i, 10))
        }
    }(window, window.document, new window.Image),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["jquery"], function(e) {
            return t(e)
        }) : "object" == typeof module && module.exports ? module.exports = t(require("jquery")) : t(e.jQuery)
    }(this, function(m) {
        ! function() {
            "use strict";

            function t(e, t) {
                if (this.el = e, this.$el = m(e), this.s = m.extend({}, i, t), this.s.dynamic && "undefined" !== this.s.dynamicEl && this.s.dynamicEl.constructor === Array && !this.s.dynamicEl.length) throw "When using dynamic mode, you must also define dynamicEl as an Array.";
                return this.modules = {}, this.lGalleryOn = !1, this.lgBusy = !1, this.hideBartimeout = !1, this.isTouch = "ontouchstart" in document.documentElement, this.s.slideEndAnimatoin && (this.s.hideControlOnEnd = !1), this.s.dynamic ? this.$items = this.s.dynamicEl : "this" === this.s.selector ? this.$items = this.$el : "" !== this.s.selector ? this.s.selectWithin ? this.$items = m(this.s.selectWithin).find(this.s.selector) : this.$items = this.$el.find(m(this.s.selector)) : this.$items = this.$el.children(), this.$slide = "", this.$outer = "", this.init(), this
            }
            var i = {
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
            t.prototype.init = function() {
                var e = this;
                e.s.preload > e.$items.length && (e.s.preload = e.$items.length);
                var t = window.location.hash;
                0 < t.indexOf("lg=" + this.s.galleryId) && (e.index = parseInt(t.split("&slide=")[1], 10), m("body").addClass("lg-from-hash"), m("body").hasClass("lg-on") || (setTimeout(function() {
                    e.build(e.index)
                }), m("body").addClass("lg-on"))), e.s.dynamic ? (e.$el.trigger("onBeforeOpen.lg"), e.index = e.s.index || 0, m("body").hasClass("lg-on") || setTimeout(function() {
                    e.build(e.index), m("body").addClass("lg-on")
                })) : e.$items.on("click.lgcustom", function(t) {
                    try {
                        t.preventDefault(), t.preventDefault()
                    } catch (e) {
                        t.returnValue = !1
                    }
                    e.$el.trigger("onBeforeOpen.lg"), e.index = e.s.index || e.$items.index(this), m("body").hasClass("lg-on") || (e.build(e.index), m("body").addClass("lg-on"))
                })
            }, t.prototype.build = function(e) {
                var t = this;
                t.structure(), m.each(m.fn.lightGallery.modules, function(e) {
                    t.modules[e] = new m.fn.lightGallery.modules[e](t.el)
                }), t.slide(e, !1, !1, !1), t.s.keyPress && t.keyPress(), 1 < t.$items.length ? (t.arrow(), setTimeout(function() {
                    t.enableDrag(), t.enableSwipe()
                }, 50), t.s.mousewheel && t.mousewheel()) : t.$slide.on("click.lg", function() {
                    t.$el.trigger("onSlideClick.lg")
                }), t.counter(), t.closeGallery(), t.$el.trigger("onAfterOpen.lg"), t.$outer.on("mousemove.lg click.lg touchstart.lg", function() {
                    t.$outer.removeClass("lg-hide-items"), clearTimeout(t.hideBartimeout), t.hideBartimeout = setTimeout(function() {
                        t.$outer.addClass("lg-hide-items")
                    }, t.s.hideBarsDelay)
                }), t.$outer.trigger("mousemove.lg")
            }, t.prototype.structure = function() {
                var e, t = "",
                    i = "",
                    n = 0,
                    o = "",
                    s = this;
                for (m("body").append('<div class="lg-backdrop"></div>'), m(".lg-backdrop").css("transition-duration", this.s.backdropDuration + "ms"), n = 0; n < this.$items.length; n++) t += '<div class="lg-item"></div>';
                if (this.s.controls && 1 < this.$items.length && (i = '<div class="lg-actions"><button class="lg-prev lg-icon">' + this.s.prevHtml + '</button><button class="lg-next lg-icon">' + this.s.nextHtml + "</button></div>"), ".lg-sub-html" === this.s.appendSubHtmlTo && (o = '<div class="lg-sub-html"></div>'), e = '<div class="lg-outer ' + this.s.addClass + " " + this.s.startClass + '"><div class="lg" style="width:' + this.s.width + "; height:" + this.s.height + '"><div class="lg-inner">' + t + '</div><div class="lg-toolbar lg-group"><span class="lg-close lg-icon"></span></div>' + i + o + "</div></div>", m("body").append(e), this.$outer = m(".lg-outer"), this.$slide = this.$outer.find(".lg-item"), this.s.useLeft ? (this.$outer.addClass("lg-use-left"), this.s.mode = "lg-slide") : this.$outer.addClass("lg-use-css3"), s.setTop(), m(window).on("resize.lg orientationchange.lg", function() {
                        setTimeout(function() {
                            s.setTop()
                        }, 100)
                    }), this.$slide.eq(this.index).addClass("lg-current"), this.doCss() ? this.$outer.addClass("lg-css3") : (this.$outer.addClass("lg-css"), this.s.speed = 0), this.$outer.addClass(this.s.mode), this.s.enableDrag && 1 < this.$items.length && this.$outer.addClass("lg-grab"), this.s.showAfterLoad && this.$outer.addClass("lg-show-after-load"), this.doCss()) {
                    var r = this.$outer.find(".lg-inner");
                    r.css("transition-timing-function", this.s.cssEasing), r.css("transition-duration", this.s.speed + "ms")
                }
                setTimeout(function() {
                    m(".lg-backdrop").addClass("in")
                }), setTimeout(function() {
                    s.$outer.addClass("lg-visible")
                }, this.s.backdropDuration), this.s.download && this.$outer.find(".lg-toolbar").append('<a id="lg-download" target="_blank" download class="lg-download lg-icon"></a>'), this.prevScrollTop = m(window).scrollTop()
            }, t.prototype.setTop = function() {
                if ("100%" !== this.s.height) {
                    var e = m(window).height(),
                        t = (e - parseInt(this.s.height, 10)) / 2,
                        i = this.$outer.find(".lg");
                    e >= parseInt(this.s.height, 10) ? i.css("top", t + "px") : i.css("top", "0px")
                }
            }, t.prototype.doCss = function() {
                return !! function() {
                    var e = ["transition", "MozTransition", "WebkitTransition", "OTransition", "msTransition", "KhtmlTransition"],
                        t = document.documentElement,
                        i = 0;
                    for (i = 0; i < e.length; i++)
                        if (e[i] in t.style) return !0
                }()
            }, t.prototype.isVideo = function(e, t) {
                var i;
                if (i = this.s.dynamic ? this.s.dynamicEl[t].html : this.$items.eq(t).attr("data-html"), !e) return i ? {
                    html5: !0
                } : (console.error("lightGallery :- data-src is not pvovided on slide item " + (t + 1) + ". Please make sure the selector property is properly configured. More info - http://sachinchoolur.github.io/lightGallery/demos/html-markup.html"), !1);
                var n = e.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com|be-nocookie\.com)\/(?:watch\?v=|embed\/)?([a-z0-9\-\_\%]+)/i),
                    o = e.match(/\/\/(?:www\.)?vimeo.com\/([0-9a-z\-_]+)/i),
                    s = e.match(/\/\/(?:www\.)?dai.ly\/([0-9a-z\-_]+)/i),
                    r = e.match(/\/\/(?:www\.)?(?:vk\.com|vkontakte\.ru)\/(?:video_ext\.php\?)(.*)/i);
                return n ? {
                    youtube: n
                } : o ? {
                    vimeo: o
                } : s ? {
                    dailymotion: s
                } : r ? {
                    vk: r
                } : void 0
            }, t.prototype.counter = function() {
                this.s.counter && m(this.s.appendCounterTo).append('<div id="lg-counter"><span id="lg-counter-current">' + (parseInt(this.index, 10) + 1) + '</span> / <span id="lg-counter-all">' + this.$items.length + "</span></div>")
            }, t.prototype.addHtml = function(e) {
                var t, i, n = null;
                if (this.s.dynamic ? this.s.dynamicEl[e].subHtmlUrl ? t = this.s.dynamicEl[e].subHtmlUrl : n = this.s.dynamicEl[e].subHtml : (i = this.$items.eq(e)).attr("data-sub-html-url") ? t = i.attr("data-sub-html-url") : (n = i.attr("data-sub-html"), this.s.getCaptionFromTitleOrAlt && !n && (n = i.attr("title") || i.find("img").first().attr("alt"))), !t)
                    if (null != n) {
                        var o = n.substring(0, 1);
                        "." !== o && "#" !== o || (n = this.s.subHtmlSelectorRelative && !this.s.dynamic ? i.find(n).html() : m(n).html())
                    } else n = "";
                ".lg-sub-html" === this.s.appendSubHtmlTo ? t ? this.$outer.find(this.s.appendSubHtmlTo).load(t) : this.$outer.find(this.s.appendSubHtmlTo).html(n) : t ? this.$slide.eq(e).load(t) : this.$slide.eq(e).append(n), null != n && ("" === n ? this.$outer.find(this.s.appendSubHtmlTo).addClass("lg-empty-html") : this.$outer.find(this.s.appendSubHtmlTo).removeClass("lg-empty-html")), this.$el.trigger("onAfterAppendSubHtml.lg", [e])
            }, t.prototype.preload = function(e) {
                var t = 1,
                    i = 1;
                for (t = 1; t <= this.s.preload && !(t >= this.$items.length - e); t++) this.loadContent(e + t, !1, 0);
                for (i = 1; i <= this.s.preload && !(e - i < 0); i++) this.loadContent(e - i, !1, 0)
            }, t.prototype.loadContent = function(t, e, i) {
                function n(e) {
                    for (var t = [], i = [], n = 0; n < e.length; n++) {
                        var o = e[n].split(" ");
                        "" === o[0] && o.splice(0, 1), i.push(o[0]), t.push(o[1])
                    }
                    for (var s = m(window).width(), r = 0; r < t.length; r++)
                        if (parseInt(t[r], 10) > s) {
                            a = i[r];
                            break
                        }
                }
                var o, a, s, r, l, d, u = this,
                    c = !1;
                l = u.s.dynamic ? (u.s.dynamicEl[t].poster && (c = !0, s = u.s.dynamicEl[t].poster), d = u.s.dynamicEl[t].html, a = u.s.dynamicEl[t].src, u.s.dynamicEl[t].responsive && n(u.s.dynamicEl[t].responsive.split(",")), r = u.s.dynamicEl[t].srcset, u.s.dynamicEl[t].sizes) : (u.$items.eq(t).attr("data-poster") && (c = !0, s = u.$items.eq(t).attr("data-poster")), d = u.$items.eq(t).attr("data-html"), a = u.$items.eq(t).attr("href") || u.$items.eq(t).attr("data-src"), u.$items.eq(t).attr("data-responsive") && n(u.$items.eq(t).attr("data-responsive").split(",")), r = u.$items.eq(t).attr("data-srcset"), u.$items.eq(t).attr("data-sizes"));
                var h = !1;
                u.s.dynamic ? u.s.dynamicEl[t].iframe && (h = !0) : "true" === u.$items.eq(t).attr("data-iframe") && (h = !0);
                var p = u.isVideo(a, t);
                if (!u.$slide.eq(t).hasClass("lg-loaded")) {
                    if (h) u.$slide.eq(t).prepend('<div class="lg-video-cont lg-has-iframe" style="max-width:' + u.s.iframeMaxWidth + '"><div class="lg-video"><iframe class="lg-object" frameborder="0" src="' + a + '"  allowfullscreen="true"></iframe></div></div>');
                    else if (c) {
                        var f;
                        f = p && p.youtube ? "lg-has-youtube" : p && p.vimeo ? "lg-has-vimeo" : "lg-has-html5", u.$slide.eq(t).prepend('<div class="lg-video-cont ' + f + ' "><div class="lg-video"><span class="lg-video-play"></span><img class="lg-object lg-has-poster" src="' + s + '" /></div></div>')
                    } else p ? (u.$slide.eq(t).prepend('<div class="lg-video-cont "><div class="lg-video"></div></div>'), u.$el.trigger("hasVideo.lg", [t, a, d])) : u.$slide.eq(t).prepend('<div class="lg-img-wrap"><img class="lg-object lg-image" src="' + a + '" /></div>');
                    if (u.$el.trigger("onAferAppendSlide.lg", [t]), o = u.$slide.eq(t).find(".lg-object"), l && o.attr("sizes", l), r) {
                        o.attr("srcset", r);
                        try {
                            picturefill({
                                elements: [o[0]]
                            })
                        } catch (e) {
                            console.warn("lightGallery :- If you want srcset to be supported for older browser please include picturefil version 2 javascript library in your document.")
                        }
                    }
                    ".lg-sub-html" !== this.s.appendSubHtmlTo && u.addHtml(t), u.$slide.eq(t).addClass("lg-loaded")
                }
                u.$slide.eq(t).find(".lg-object").on("load.lg error.lg", function() {
                    var e = 0;
                    i && !m("body").hasClass("lg-from-hash") && (e = i), setTimeout(function() {
                        u.$slide.eq(t).addClass("lg-complete"), u.$el.trigger("onSlideItemLoad.lg", [t, i || 0])
                    }, e)
                }), p && p.html5 && !c && u.$slide.eq(t).addClass("lg-complete"), !0 === e && (u.$slide.eq(t).hasClass("lg-complete") ? u.preload(t) : u.$slide.eq(t).find(".lg-object").on("load.lg error.lg", function() {
                    u.preload(t)
                }))
            }, t.prototype.slide = function(e, t, i, n) {
                var o = this.$outer.find(".lg-current").index(),
                    s = this;
                if (!s.lGalleryOn || o !== e) {
                    var r = this.$slide.length,
                        a = s.lGalleryOn ? this.s.speed : 0;
                    if (!s.lgBusy) {
                        var l, d, u;
                        if (this.s.download)(l = s.s.dynamic ? !1 !== s.s.dynamicEl[e].downloadUrl && (s.s.dynamicEl[e].downloadUrl || s.s.dynamicEl[e].src) : "false" !== s.$items.eq(e).attr("data-download-url") && (s.$items.eq(e).attr("data-download-url") || s.$items.eq(e).attr("href") || s.$items.eq(e).attr("data-src"))) ? (m("#lg-download").attr("href", l), s.$outer.removeClass("lg-hide-download")) : s.$outer.addClass("lg-hide-download");
                        if (this.$el.trigger("onBeforeSlide.lg", [o, e, t, i]), s.lgBusy = !0, clearTimeout(s.hideBartimeout), ".lg-sub-html" === this.s.appendSubHtmlTo && setTimeout(function() {
                                s.addHtml(e)
                            }, a), this.arrowDisable(e), n || (e < o ? n = "prev" : o < e && (n = "next")), t) this.$slide.removeClass("lg-prev-slide lg-current lg-next-slide"), 2 < r ? (d = e - 1, u = e + 1, 0 === e && o === r - 1 ? (u = 0, d = r - 1) : e === r - 1 && 0 === o && (u = 0, d = r - 1)) : (d = 0, u = 1), "prev" === n ? s.$slide.eq(u).addClass("lg-next-slide") : s.$slide.eq(d).addClass("lg-prev-slide"), s.$slide.eq(e).addClass("lg-current");
                        else s.$outer.addClass("lg-no-trans"), this.$slide.removeClass("lg-prev-slide lg-next-slide"), "prev" === n ? (this.$slide.eq(e).addClass("lg-prev-slide"), this.$slide.eq(o).addClass("lg-next-slide")) : (this.$slide.eq(e).addClass("lg-next-slide"), this.$slide.eq(o).addClass("lg-prev-slide")), setTimeout(function() {
                            s.$slide.removeClass("lg-current"), s.$slide.eq(e).addClass("lg-current"), s.$outer.removeClass("lg-no-trans")
                        }, 50);
                        s.lGalleryOn ? (setTimeout(function() {
                            s.loadContent(e, !0, 0)
                        }, this.s.speed + 50), setTimeout(function() {
                            s.lgBusy = !1, s.$el.trigger("onAfterSlide.lg", [o, e, t, i])
                        }, this.s.speed)) : (s.loadContent(e, !0, s.s.backdropDuration), s.lgBusy = !1, s.$el.trigger("onAfterSlide.lg", [o, e, t, i])), s.lGalleryOn = !0, this.s.counter && m("#lg-counter-current").text(e + 1)
                    }
                    s.index = e
                }
            }, t.prototype.goToNextSlide = function(e) {
                var t = this,
                    i = t.s.loop;
                e && t.$slide.length < 3 && (i = !1), t.lgBusy || (t.index + 1 < t.$slide.length ? (t.index++, t.$el.trigger("onBeforeNextSlide.lg", [t.index]), t.slide(t.index, e, !1, "next")) : i ? (t.index = 0, t.$el.trigger("onBeforeNextSlide.lg", [t.index]), t.slide(t.index, e, !1, "next")) : t.s.slideEndAnimatoin && !e && (t.$outer.addClass("lg-right-end"), setTimeout(function() {
                    t.$outer.removeClass("lg-right-end")
                }, 400)))
            }, t.prototype.goToPrevSlide = function(e) {
                var t = this,
                    i = t.s.loop;
                e && t.$slide.length < 3 && (i = !1), t.lgBusy || (0 < t.index ? (t.index--, t.$el.trigger("onBeforePrevSlide.lg", [t.index, e]), t.slide(t.index, e, !1, "prev")) : i ? (t.index = t.$items.length - 1, t.$el.trigger("onBeforePrevSlide.lg", [t.index, e]), t.slide(t.index, e, !1, "prev")) : t.s.slideEndAnimatoin && !e && (t.$outer.addClass("lg-left-end"), setTimeout(function() {
                    t.$outer.removeClass("lg-left-end")
                }, 400)))
            }, t.prototype.keyPress = function() {
                var t = this;
                1 < this.$items.length && m(window).on("keyup.lg", function(e) {
                    1 < t.$items.length && (37 === e.keyCode && (e.preventDefault(), t.goToPrevSlide()), 39 === e.keyCode && (e.preventDefault(), t.goToNextSlide()))
                }), m(window).on("keydown.lg", function(e) {
                    !0 === t.s.escKey && 27 === e.keyCode && (e.preventDefault(), t.$outer.hasClass("lg-thumb-open") ? t.$outer.removeClass("lg-thumb-open") : t.destroy())
                })
            }, t.prototype.arrow = function() {
                var e = this;
                this.$outer.find(".lg-prev").on("click.lg", function() {
                    e.goToPrevSlide()
                }), this.$outer.find(".lg-next").on("click.lg", function() {
                    e.goToNextSlide()
                })
            }, t.prototype.arrowDisable = function(e) {
                !this.s.loop && this.s.hideControlOnEnd && (e + 1 < this.$slide.length ? this.$outer.find(".lg-next").removeAttr("disabled").removeClass("disabled") : this.$outer.find(".lg-next").attr("disabled", "disabled").addClass("disabled"), 0 < e ? this.$outer.find(".lg-prev").removeAttr("disabled").removeClass("disabled") : this.$outer.find(".lg-prev").attr("disabled", "disabled").addClass("disabled"))
            }, t.prototype.setTranslate = function(e, t, i) {
                this.s.useLeft ? e.css("left", t) : e.css({
                    transform: "translate3d(" + t + "px, " + i + "px, 0px)"
                })
            }, t.prototype.touchMove = function(e, t) {
                var i = t - e;
                15 < Math.abs(i) && (this.$outer.addClass("lg-dragging"), this.setTranslate(this.$slide.eq(this.index), i, 0), this.setTranslate(m(".lg-prev-slide"), -this.$slide.eq(this.index).width() + i, 0), this.setTranslate(m(".lg-next-slide"), this.$slide.eq(this.index).width() + i, 0))
            }, t.prototype.touchEnd = function(e) {
                var t = this;
                "lg-slide" !== t.s.mode && t.$outer.addClass("lg-slide"), this.$slide.not(".lg-current, .lg-prev-slide, .lg-next-slide").css("opacity", "0"), setTimeout(function() {
                    t.$outer.removeClass("lg-dragging"), e < 0 && Math.abs(e) > t.s.swipeThreshold ? t.goToNextSlide(!0) : 0 < e && Math.abs(e) > t.s.swipeThreshold ? t.goToPrevSlide(!0) : Math.abs(e) < 5 && t.$el.trigger("onSlideClick.lg"), t.$slide.removeAttr("style")
                }), setTimeout(function() {
                    t.$outer.hasClass("lg-dragging") || "lg-slide" === t.s.mode || t.$outer.removeClass("lg-slide")
                }, t.s.speed + 100)
            }, t.prototype.enableSwipe = function() {
                var t = this,
                    i = 0,
                    n = 0,
                    o = !1;
                t.s.enableSwipe && t.doCss() && (t.$slide.on("touchstart.lg", function(e) {
                    t.$outer.hasClass("lg-zoomed") || t.lgBusy || (e.preventDefault(), t.manageSwipeClass(), i = e.originalEvent.targetTouches[0].pageX)
                }), t.$slide.on("touchmove.lg", function(e) {
                    t.$outer.hasClass("lg-zoomed") || (e.preventDefault(), n = e.originalEvent.targetTouches[0].pageX, t.touchMove(i, n), o = !0)
                }), t.$slide.on("touchend.lg", function() {
                    t.$outer.hasClass("lg-zoomed") || (o ? (o = !1, t.touchEnd(n - i)) : t.$el.trigger("onSlideClick.lg"))
                }))
            }, t.prototype.enableDrag = function() {
                var t = this,
                    i = 0,
                    n = 0,
                    o = !1,
                    s = !1;
                t.s.enableDrag && t.doCss() && (t.$slide.on("mousedown.lg", function(e) {
                    t.$outer.hasClass("lg-zoomed") || t.lgBusy || m(e.target).text().trim() || (e.preventDefault(), t.manageSwipeClass(), i = e.pageX, o = !0, t.$outer.scrollLeft += 1, t.$outer.scrollLeft -= 1, t.$outer.removeClass("lg-grab").addClass("lg-grabbing"), t.$el.trigger("onDragstart.lg"))
                }), m(window).on("mousemove.lg", function(e) {
                    o && (s = !0, n = e.pageX, t.touchMove(i, n), t.$el.trigger("onDragmove.lg"))
                }), m(window).on("mouseup.lg", function(e) {
                    s ? (s = !1, t.touchEnd(n - i), t.$el.trigger("onDragend.lg")) : (m(e.target).hasClass("lg-object") || m(e.target).hasClass("lg-video-play")) && t.$el.trigger("onSlideClick.lg"), o && (o = !1, t.$outer.removeClass("lg-grabbing").addClass("lg-grab"))
                }))
            }, t.prototype.manageSwipeClass = function() {
                var e = this.index + 1,
                    t = this.index - 1;
                this.s.loop && 2 < this.$slide.length && (0 === this.index ? t = this.$slide.length - 1 : this.index === this.$slide.length - 1 && (e = 0)), this.$slide.removeClass("lg-next-slide lg-prev-slide"), -1 < t && this.$slide.eq(t).addClass("lg-prev-slide"), this.$slide.eq(e).addClass("lg-next-slide")
            }, t.prototype.mousewheel = function() {
                var t = this;
                t.$outer.on("mousewheel.lg", function(e) {
                    e.deltaY && (0 < e.deltaY ? t.goToPrevSlide() : t.goToNextSlide(), e.preventDefault())
                })
            }, t.prototype.closeGallery = function() {
                var t = this,
                    i = !1;
                this.$outer.find(".lg-close").on("click.lg", function() {
                    t.destroy()
                }), t.s.closable && (t.$outer.on("mousedown.lg", function(e) {
                    i = !!(m(e.target).is(".lg-outer") || m(e.target).is(".lg-item ") || m(e.target).is(".lg-img-wrap"))
                }), t.$outer.on("mousemove.lg", function() {
                    i = !1
                }), t.$outer.on("mouseup.lg", function(e) {
                    (m(e.target).is(".lg-outer") || m(e.target).is(".lg-item ") || m(e.target).is(".lg-img-wrap") && i) && (t.$outer.hasClass("lg-dragging") || t.destroy())
                }))
            }, t.prototype.destroy = function(e) {
                var t = this;
                e || (t.$el.trigger("onBeforeClose.lg"), m(window).scrollTop(t.prevScrollTop)), e && (t.s.dynamic || this.$items.off("click.lg click.lgcustom"), m.removeData(t.el, "lightGallery")), this.$el.off(".lg.tm"), m.each(m.fn.lightGallery.modules, function(e) {
                    t.modules[e] && t.modules[e].destroy()
                }), this.lGalleryOn = !1, clearTimeout(t.hideBartimeout), this.hideBartimeout = !1, m(window).off(".lg"), m("body").removeClass("lg-on lg-from-hash"), t.$outer && t.$outer.removeClass("lg-visible"), m(".lg-backdrop").removeClass("in"), setTimeout(function() {
                    t.$outer && t.$outer.remove(), m(".lg-backdrop").remove(), e || t.$el.trigger("onCloseAfter.lg")
                }, t.s.backdropDuration + 50)
            }, m.fn.lightGallery = function(e) {
                return this.each(function() {
                    if (m.data(this, "lightGallery")) try {
                        m(this).data("lightGallery").init()
                    } catch (e) {
                        console.error("lightGallery has not initiated properly")
                    } else m.data(this, "lightGallery", new t(this, e))
                })
            }, m.fn.lightGallery.modules = {}
        }()
    }),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["jquery"], function(e) {
            return t(e)
        }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
    }(0, function(i) {
        ! function() {
            "use strict";

            function e(e) {
                return this.core = i(e).data("lightGallery"), this.$el = i(e), !(this.core.$items.length < 2) && (this.core.s = i.extend({}, t, this.core.s), this.interval = !1, this.fromAuto = !0, this.canceledOnTouch = !1, this.fourceAutoplayTemp = this.core.s.fourceAutoplay, this.core.doCss() || (this.core.s.progressBar = !1), this.init(), this)
            }
            var t = {
                autoplay: !1,
                pause: 5e3,
                progressBar: !0,
                fourceAutoplay: !1,
                autoplayControls: !0,
                appendAutoplayControlsTo: ".lg-toolbar"
            };
            e.prototype.init = function() {
                var e = this;
                e.core.s.autoplayControls && e.controls(), e.core.s.progressBar && e.core.$outer.find(".lg").append('<div class="lg-progress-bar"><div class="lg-progress"></div></div>'), e.progress(), e.core.s.autoplay && e.$el.one("onSlideItemLoad.lg.tm", function() {
                    e.startlAuto()
                }), e.$el.on("onDragstart.lg.tm touchstart.lg.tm", function() {
                    e.interval && (e.cancelAuto(), e.canceledOnTouch = !0)
                }), e.$el.on("onDragend.lg.tm touchend.lg.tm onSlideClick.lg.tm", function() {
                    !e.interval && e.canceledOnTouch && (e.startlAuto(), e.canceledOnTouch = !1)
                })
            }, e.prototype.progress = function() {
                var e, t, i = this;
                i.$el.on("onBeforeSlide.lg.tm", function() {
                    i.core.s.progressBar && i.fromAuto && (e = i.core.$outer.find(".lg-progress-bar"), t = i.core.$outer.find(".lg-progress"), i.interval && (t.removeAttr("style"), e.removeClass("lg-start"), setTimeout(function() {
                        t.css("transition", "width " + (i.core.s.speed + i.core.s.pause) + "ms ease 0s"), e.addClass("lg-start")
                    }, 20))), i.fromAuto || i.core.s.fourceAutoplay || i.cancelAuto(), i.fromAuto = !1
                })
            }, e.prototype.controls = function() {
                var e = this;
                i(this.core.s.appendAutoplayControlsTo).append('<span class="lg-autoplay-button lg-icon"></span>'), e.core.$outer.find(".lg-autoplay-button").on("click.lg", function() {
                    i(e.core.$outer).hasClass("lg-show-autoplay") ? (e.cancelAuto(), e.core.s.fourceAutoplay = !1) : e.interval || (e.startlAuto(), e.core.s.fourceAutoplay = e.fourceAutoplayTemp)
                })
            }, e.prototype.startlAuto = function() {
                var e = this;
                e.core.$outer.find(".lg-progress").css("transition", "width " + (e.core.s.speed + e.core.s.pause) + "ms ease 0s"), e.core.$outer.addClass("lg-show-autoplay"), e.core.$outer.find(".lg-progress-bar").addClass("lg-start"), e.interval = setInterval(function() {
                    e.core.index + 1 < e.core.$items.length ? e.core.index++ : e.core.index = 0, e.fromAuto = !0, e.core.slide(e.core.index, !1, !1, "next")
                }, e.core.s.speed + e.core.s.pause)
            }, e.prototype.cancelAuto = function() {
                clearInterval(this.interval), this.interval = !1, this.core.$outer.find(".lg-progress").removeAttr("style"), this.core.$outer.removeClass("lg-show-autoplay"), this.core.$outer.find(".lg-progress-bar").removeClass("lg-start")
            }, e.prototype.destroy = function() {
                this.cancelAuto(), this.core.$outer.find(".lg-progress-bar").remove()
            }, i.fn.lightGallery.modules.autoplay = e
        }()
    }),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["jquery"], function(e) {
            return t(e)
        }) : "object" == typeof module && module.exports ? module.exports = t(require("jquery")) : t(e.jQuery)
    }(this, function(n) {
        ! function() {
            "use strict";

            function t() {
                return document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement
            }

            function e(e) {
                return this.core = n(e).data("lightGallery"), this.$el = n(e), this.core.s = n.extend({}, i, this.core.s), this.init(), this
            }
            var i = {
                fullScreen: !0
            };
            e.prototype.init = function() {
                var e = "";
                if (this.core.s.fullScreen) {
                    if (!(document.fullscreenEnabled || document.webkitFullscreenEnabled || document.mozFullScreenEnabled || document.msFullscreenEnabled)) return;
                    e = '<span class="lg-fullscreen lg-icon"></span>', this.core.$outer.find(".lg-toolbar").append(e), this.fullScreen()
                }
            }, e.prototype.requestFullscreen = function() {
                var e = document.documentElement;
                e.requestFullscreen ? e.requestFullscreen() : e.msRequestFullscreen ? e.msRequestFullscreen() : e.mozRequestFullScreen ? e.mozRequestFullScreen() : e.webkitRequestFullscreen && e.webkitRequestFullscreen()
            }, e.prototype.exitFullscreen = function() {
                document.exitFullscreen ? document.exitFullscreen() : document.msExitFullscreen ? document.msExitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitExitFullscreen && document.webkitExitFullscreen()
            }, e.prototype.fullScreen = function() {
                var e = this;
                n(document).on("fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg", function() {
                    e.core.$outer.toggleClass("lg-fullscreen-on")
                }), this.core.$outer.find(".lg-fullscreen").on("click.lg", function() {
                    t() ? e.exitFullscreen() : e.requestFullscreen()
                })
            }, e.prototype.destroy = function() {
                t() && this.exitFullscreen(), n(document).off("fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg")
            }, n.fn.lightGallery.modules.fullscreen = e
        }()
    }),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["jquery"], function(e) {
            return t(e)
        }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
    }(0, function(r) {
        ! function() {
            "use strict";

            function e(e) {
                return this.core = r(e).data("lightGallery"), this.$el = r(e), this.core.s = r.extend({}, t, this.core.s), this.core.s.pager && 1 < this.core.$items.length && this.init(), this
            }
            var t = {
                pager: !1
            };
            e.prototype.init = function() {
                var n, e, t, i = this,
                    o = "";
                if (i.core.$outer.find(".lg").append('<div class="lg-pager-outer"></div>'), i.core.s.dynamic)
                    for (var s = 0; s < i.core.s.dynamicEl.length; s++) o += '<span class="lg-pager-cont"> <span class="lg-pager"></span><div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="' + i.core.s.dynamicEl[s].thumb + '" /></div></span>';
                else i.core.$items.each(function() {
                    i.core.s.exThumbImage ? o += '<span class="lg-pager-cont"> <span class="lg-pager"></span><div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="' + r(this).attr(i.core.s.exThumbImage) + '" /></div></span>' : o += '<span class="lg-pager-cont"> <span class="lg-pager"></span><div class="lg-pager-thumb-cont"><span class="lg-caret"></span> <img src="' + r(this).find("img").attr("src") + '" /></div></span>'
                });
                (e = i.core.$outer.find(".lg-pager-outer")).html(o), (n = i.core.$outer.find(".lg-pager-cont")).on("click.lg touchend.lg", function() {
                    var e = r(this);
                    i.core.index = e.index(), i.core.slide(i.core.index, !1, !0, !1)
                }), e.on("mouseover.lg", function() {
                    clearTimeout(t), e.addClass("lg-pager-hover")
                }), e.on("mouseout.lg", function() {
                    t = setTimeout(function() {
                        e.removeClass("lg-pager-hover")
                    })
                }), i.core.$el.on("onBeforeSlide.lg.tm", function(e, t, i) {
                    n.removeClass("lg-pager-active"), n.eq(i).addClass("lg-pager-active")
                })
            }, e.prototype.destroy = function() {}, r.fn.lightGallery.modules.pager = e
        }()
    }),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["jquery"], function(e) {
            return t(e)
        }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
    }(0, function(d) {
        ! function() {
            "use strict";

            function e(e) {
                return this.core = d(e).data("lightGallery"), this.core.s = d.extend({}, t, this.core.s), this.$el = d(e), this.$thumbOuter = null, this.thumbOuterWidth = 0, this.thumbTotalWidth = this.core.$items.length * (this.core.s.thumbWidth + this.core.s.thumbMargin), this.thumbIndex = this.core.index, this.core.s.animateThumb && (this.core.s.thumbHeight = "100%"), this.left = 0, this.init(), this
            }
            var t = {
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
            };
            e.prototype.init = function() {
                var e = this;
                this.core.s.thumbnail && 1 < this.core.$items.length && (this.core.s.showThumbByDefault && setTimeout(function() {
                    e.core.$outer.addClass("lg-thumb-open")
                }, 700), this.core.s.pullCaptionUp && this.core.$outer.addClass("lg-pull-caption-up"), this.build(), this.core.s.animateThumb && this.core.doCss() ? (this.core.s.enableThumbDrag && this.enableThumbDrag(), this.core.s.enableThumbSwipe && this.enableThumbSwipe(), this.thumbClickable = !1) : this.thumbClickable = !0, this.toogle(), this.thumbkeyPress())
            }, e.prototype.build = function() {
                function t(e, t, i) {
                    var n, o = r.core.isVideo(e, i) || {},
                        s = "";
                    o.youtube || o.vimeo || o.dailymotion ? o.youtube ? n = r.core.s.loadYoutubeThumbnail ? "//img.youtube.com/vi/" + o.youtube[1] + "/" + r.core.s.youtubeThumbSize + ".jpg" : t : o.vimeo ? r.core.s.loadVimeoThumbnail ? (n = "//i.vimeocdn.com/video/error_" + l + ".jpg", s = o.vimeo[1]) : n = t : o.dailymotion && (n = r.core.s.loadDailymotionThumbnail ? "//www.dailymotion.com/thumbnail/video/" + o.dailymotion[1] : t) : n = t, a += '<div data-vimeo-id="' + s + '" class="lg-thumb-item" style="width:' + r.core.s.thumbWidth + "px; height: " + r.core.s.thumbHeight + "; margin-right: " + r.core.s.thumbMargin + 'px"><img src="' + n + '" /></div>', s = ""
                }
                var e, r = this,
                    a = "",
                    l = "";
                switch (this.core.s.vimeoThumbSize) {
                    case "thumbnail_large":
                        l = "640";
                        break;
                    case "thumbnail_medium":
                        l = "200x150";
                        break;
                    case "thumbnail_small":
                        l = "100x75"
                }
                if (r.core.$outer.addClass("lg-has-thumb"), r.core.$outer.find(".lg").append('<div class="lg-thumb-outer"><div class="lg-thumb lg-group"></div></div>'), r.$thumbOuter = r.core.$outer.find(".lg-thumb-outer"), r.thumbOuterWidth = r.$thumbOuter.width(), r.core.s.animateThumb && r.core.$outer.find(".lg-thumb").css({
                        width: r.thumbTotalWidth + "px",
                        position: "relative"
                    }), this.core.s.animateThumb && r.$thumbOuter.css("height", r.core.s.thumbContHeight + "px"), r.core.s.dynamic)
                    for (var i = 0; i < r.core.s.dynamicEl.length; i++) t(r.core.s.dynamicEl[i].src, r.core.s.dynamicEl[i].thumb, i);
                else r.core.$items.each(function(e) {
                    r.core.s.exThumbImage ? t(d(this).attr("href") || d(this).attr("data-src"), d(this).attr(r.core.s.exThumbImage), e) : t(d(this).attr("href") || d(this).attr("data-src"), d(this).find("img").attr("src"), e)
                });
                r.core.$outer.find(".lg-thumb").html(a), (e = r.core.$outer.find(".lg-thumb-item")).each(function() {
                    var t = d(this),
                        e = t.attr("data-vimeo-id");
                    e && d.getJSON("//www.vimeo.com/api/v2/video/" + e + ".json?callback=?", {
                        format: "json"
                    }, function(e) {
                        t.find("img").attr("src", e[0][r.core.s.vimeoThumbSize])
                    })
                }), e.eq(r.core.index).addClass("active"), r.core.$el.on("onBeforeSlide.lg.tm", function() {
                    e.removeClass("active"), e.eq(r.core.index).addClass("active")
                }), e.on("click.lg touchend.lg", function() {
                    var e = d(this);
                    setTimeout(function() {
                        (!r.thumbClickable || r.core.lgBusy) && r.core.doCss() || (r.core.index = e.index(), r.core.slide(r.core.index, !1, !0, !1))
                    }, 50)
                }), r.core.$el.on("onBeforeSlide.lg.tm", function() {
                    r.animateThumb(r.core.index)
                }), d(window).on("resize.lg.thumb orientationchange.lg.thumb", function() {
                    setTimeout(function() {
                        r.animateThumb(r.core.index), r.thumbOuterWidth = r.$thumbOuter.width()
                    }, 200)
                })
            }, e.prototype.setTranslate = function(e) {
                this.core.$outer.find(".lg-thumb").css({
                    transform: "translate3d(-" + e + "px, 0px, 0px)"
                })
            }, e.prototype.animateThumb = function(e) {
                var t = this.core.$outer.find(".lg-thumb");
                if (this.core.s.animateThumb) {
                    var i;
                    switch (this.core.s.currentPagerPosition) {
                        case "left":
                            i = 0;
                            break;
                        case "middle":
                            i = this.thumbOuterWidth / 2 - this.core.s.thumbWidth / 2;
                            break;
                        case "right":
                            i = this.thumbOuterWidth - this.core.s.thumbWidth
                    }
                    this.left = (this.core.s.thumbWidth + this.core.s.thumbMargin) * e - 1 - i, this.left > this.thumbTotalWidth - this.thumbOuterWidth && (this.left = this.thumbTotalWidth - this.thumbOuterWidth), this.left < 0 && (this.left = 0), this.core.lGalleryOn ? (t.hasClass("on") || this.core.$outer.find(".lg-thumb").css("transition-duration", this.core.s.speed + "ms"), this.core.doCss() || t.animate({
                        left: -this.left + "px"
                    }, this.core.s.speed)) : this.core.doCss() || t.css("left", -this.left + "px"), this.setTranslate(this.left)
                }
            }, e.prototype.enableThumbDrag = function() {
                var t = this,
                    i = 0,
                    n = 0,
                    o = !1,
                    s = !1,
                    r = 0;
                t.$thumbOuter.addClass("lg-grab"), t.core.$outer.find(".lg-thumb").on("mousedown.lg.thumb", function(e) {
                    t.thumbTotalWidth > t.thumbOuterWidth && (e.preventDefault(), i = e.pageX, o = !0, t.core.$outer.scrollLeft += 1, t.core.$outer.scrollLeft -= 1, t.thumbClickable = !1, t.$thumbOuter.removeClass("lg-grab").addClass("lg-grabbing"))
                }), d(window).on("mousemove.lg.thumb", function(e) {
                    o && (r = t.left, s = !0, n = e.pageX, t.$thumbOuter.addClass("lg-dragging"), (r -= n - i) > t.thumbTotalWidth - t.thumbOuterWidth && (r = t.thumbTotalWidth - t.thumbOuterWidth), r < 0 && (r = 0), t.setTranslate(r))
                }), d(window).on("mouseup.lg.thumb", function() {
                    s ? (s = !1, t.$thumbOuter.removeClass("lg-dragging"), t.left = r, Math.abs(n - i) < t.core.s.swipeThreshold && (t.thumbClickable = !0)) : t.thumbClickable = !0, o && (o = !1, t.$thumbOuter.removeClass("lg-grabbing").addClass("lg-grab"))
                })
            }, e.prototype.enableThumbSwipe = function() {
                var t = this,
                    i = 0,
                    n = 0,
                    o = !1,
                    s = 0;
                t.core.$outer.find(".lg-thumb").on("touchstart.lg", function(e) {
                    t.thumbTotalWidth > t.thumbOuterWidth && (e.preventDefault(), i = e.originalEvent.targetTouches[0].pageX, t.thumbClickable = !1)
                }), t.core.$outer.find(".lg-thumb").on("touchmove.lg", function(e) {
                    t.thumbTotalWidth > t.thumbOuterWidth && (e.preventDefault(), n = e.originalEvent.targetTouches[0].pageX, o = !0, t.$thumbOuter.addClass("lg-dragging"), s = t.left, (s -= n - i) > t.thumbTotalWidth - t.thumbOuterWidth && (s = t.thumbTotalWidth - t.thumbOuterWidth), s < 0 && (s = 0), t.setTranslate(s))
                }), t.core.$outer.find(".lg-thumb").on("touchend.lg", function() {
                    t.thumbTotalWidth > t.thumbOuterWidth && o ? (o = !1, t.$thumbOuter.removeClass("lg-dragging"), Math.abs(n - i) < t.core.s.swipeThreshold && (t.thumbClickable = !0), t.left = s) : t.thumbClickable = !0
                })
            }, e.prototype.toogle = function() {
                var e = this;
                e.core.s.toogleThumb && (e.core.$outer.addClass("lg-can-toggle"), e.$thumbOuter.append('<span class="lg-toogle-thumb lg-icon"></span>'), e.core.$outer.find(".lg-toogle-thumb").on("click.lg", function() {
                    e.core.$outer.toggleClass("lg-thumb-open")
                }))
            }, e.prototype.thumbkeyPress = function() {
                var t = this;
                d(window).on("keydown.lg.thumb", function(e) {
                    38 === e.keyCode ? (e.preventDefault(), t.core.$outer.addClass("lg-thumb-open")) : 40 === e.keyCode && (e.preventDefault(), t.core.$outer.removeClass("lg-thumb-open"))
                })
            }, e.prototype.destroy = function() {
                this.core.s.thumbnail && 1 < this.core.$items.length && (d(window).off("resize.lg.thumb orientationchange.lg.thumb keydown.lg.thumb"), this.$thumbOuter.remove(), this.core.$outer.removeClass("lg-has-thumb"))
            }, d.fn.lightGallery.modules.Thumbnail = e
        }()
    }),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["jquery"], function(e) {
            return t(e)
        }) : "object" == typeof module && module.exports ? module.exports = t(require("jquery")) : t(e.jQuery)
    }(this, function(c) {
        ! function() {
            "use strict";

            function e(e) {
                return this.core = c(e).data("lightGallery"), this.$el = c(e), this.core.s = c.extend({}, t, this.core.s), this.videoLoaded = !1, this.init(), this
            }
            var t = {
                videoMaxWidth: "855px",
                autoplayFirstVideo: !0,
                youtubePlayerParams: !1,
                vimeoPlayerParams: !1,
                dailymotionPlayerParams: !1,
                vkPlayerParams: !1,
                videojs: !1,
                videojsOptions: {}
            };
            e.prototype.init = function() {
                var n = this;
                n.core.$el.on("hasVideo.lg.tm", function(e, t, i, n) {
                    var o = this;
                    if (o.core.$slide.eq(t).find(".lg-video").append(o.loadVideo(i, "lg-object", !0, t, n)), n)
                        if (o.core.s.videojs) try {
                            videojs(o.core.$slide.eq(t).find(".lg-html5").get(0), o.core.s.videojsOptions, function() {
                                !o.videoLoaded && o.core.s.autoplayFirstVideo && this.play()
                            })
                        } catch (e) {
                            console.error("Make sure you have included videojs")
                        } else !o.videoLoaded && o.core.s.autoplayFirstVideo && o.core.$slide.eq(t).find(".lg-html5").get(0).play()
                }.bind(this)), n.core.$el.on("onAferAppendSlide.lg.tm", function(e, t) {
                    var i = this.core.$slide.eq(t).find(".lg-video-cont");
                    i.hasClass("lg-has-iframe") || (i.css("max-width", this.core.s.videoMaxWidth), this.videoLoaded = !0)
                }.bind(this)), n.core.doCss() && 1 < n.core.$items.length && (n.core.s.enableSwipe || n.core.s.enableDrag) ? n.core.$el.on("onSlideClick.lg.tm", function() {
                    var e = n.core.$slide.eq(n.core.index);
                    n.loadVideoOnclick(e)
                }) : n.core.$slide.on("click.lg", function() {
                    n.loadVideoOnclick(c(this))
                }), n.core.$el.on("onBeforeSlide.lg.tm", function(e, t, i) {
                    var n, o = this.core.$slide.eq(t),
                        s = o.find(".lg-youtube").get(0),
                        r = o.find(".lg-vimeo").get(0),
                        a = o.find(".lg-dailymotion").get(0),
                        l = o.find(".lg-vk").get(0),
                        d = o.find(".lg-html5").get(0);
                    if (s) s.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', "*");
                    else if (r) try {
                            $f(r).api("pause")
                        } catch (e) {
                            console.error("Make sure you have included froogaloop2 js")
                        } else if (a) a.contentWindow.postMessage("pause", "*");
                        else if (d)
                        if (this.core.s.videojs) try {
                            videojs(d).pause()
                        } catch (e) {
                            console.error("Make sure you have included videojs")
                        } else d.pause();
                    l && c(l).attr("src", c(l).attr("src").replace("&autoplay", "&noplay")), n = this.core.s.dynamic ? this.core.s.dynamicEl[i].src : this.core.$items.eq(i).attr("href") || this.core.$items.eq(i).attr("data-src");
                    var u = this.core.isVideo(n, i) || {};
                    (u.youtube || u.vimeo || u.dailymotion || u.vk) && this.core.$outer.addClass("lg-hide-download")
                }.bind(this)), n.core.$el.on("onAfterSlide.lg.tm", function(e, t) {
                    n.core.$slide.eq(t).removeClass("lg-video-playing")
                }), n.core.s.autoplayFirstVideo && n.core.$el.on("onAferAppendSlide.lg.tm", function(e, t) {
                    if (!n.core.lGalleryOn) {
                        var i = n.core.$slide.eq(t);
                        setTimeout(function() {
                            n.loadVideoOnclick(i)
                        }, 100)
                    }
                })
            }, e.prototype.loadVideo = function(e, t, i, n, o) {
                var s = "",
                    r = 1,
                    a = "",
                    l = this.core.isVideo(e, n) || {};
                if (i && (r = this.videoLoaded ? 0 : this.core.s.autoplayFirstVideo ? 1 : 0), l.youtube) a = "?wmode=opaque&autoplay=" + r + "&enablejsapi=1", this.core.s.youtubePlayerParams && (a = a + "&" + c.param(this.core.s.youtubePlayerParams)), s = '<iframe class="lg-video-object lg-youtube ' + t + '" width="560" height="315" src="//www.youtube.com/embed/' + l.youtube[1] + a + '" frameborder="0" allowfullscreen></iframe>';
                else if (l.vimeo) a = "?autoplay=" + r + "&api=1", this.core.s.vimeoPlayerParams && (a = a + "&" + c.param(this.core.s.vimeoPlayerParams)), s = '<iframe class="lg-video-object lg-vimeo ' + t + '" width="560" height="315"  src="//player.vimeo.com/video/' + l.vimeo[1] + a + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
                else if (l.dailymotion) a = "?wmode=opaque&autoplay=" + r + "&api=postMessage", this.core.s.dailymotionPlayerParams && (a = a + "&" + c.param(this.core.s.dailymotionPlayerParams)), s = '<iframe class="lg-video-object lg-dailymotion ' + t + '" width="560" height="315" src="//www.dailymotion.com/embed/video/' + l.dailymotion[1] + a + '" frameborder="0" allowfullscreen></iframe>';
                else if (l.html5) {
                    var d = o.substring(0, 1);
                    "." !== d && "#" !== d || (o = c(o).html()), s = o
                } else l.vk && (a = "&autoplay=" + r, this.core.s.vkPlayerParams && (a = a + "&" + c.param(this.core.s.vkPlayerParams)), s = '<iframe class="lg-video-object lg-vk ' + t + '" width="560" height="315" src="//vk.com/video_ext.php?' + l.vk[1] + a + '" frameborder="0" allowfullscreen></iframe>');
                return s
            }, e.prototype.loadVideoOnclick = function(i) {
                var n = this;
                if (i.find(".lg-object").hasClass("lg-has-poster") && i.find(".lg-object").is(":visible"))
                    if (i.hasClass("lg-has-video")) {
                        var e = i.find(".lg-youtube").get(0),
                            t = i.find(".lg-vimeo").get(0),
                            o = i.find(".lg-dailymotion").get(0),
                            s = i.find(".lg-html5").get(0);
                        if (e) e.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', "*");
                        else if (t) try {
                                $f(t).api("play")
                            } catch (i) {
                                console.error("Make sure you have included froogaloop2 js")
                            } else if (o) o.contentWindow.postMessage("play", "*");
                            else if (s)
                            if (n.core.s.videojs) try {
                                videojs(s).play()
                            } catch (i) {
                                console.error("Make sure you have included videojs")
                            } else s.play();
                        i.addClass("lg-video-playing")
                    } else {
                        i.addClass("lg-video-playing lg-has-video");
                        var r, a, l = function(e, t) {
                            if (i.find(".lg-video").append(n.loadVideo(e, "", !1, n.core.index, t)), t)
                                if (n.core.s.videojs) try {
                                    videojs(n.core.$slide.eq(n.core.index).find(".lg-html5").get(0), n.core.s.videojsOptions, function() {
                                        this.play()
                                    })
                                } catch (e) {
                                    console.error("Make sure you have included videojs")
                                } else n.core.$slide.eq(n.core.index).find(".lg-html5").get(0).play()
                        };
                        a = n.core.s.dynamic ? (r = n.core.s.dynamicEl[n.core.index].src, n.core.s.dynamicEl[n.core.index].html) : (r = n.core.$items.eq(n.core.index).attr("href") || n.core.$items.eq(n.core.index).attr("data-src"), n.core.$items.eq(n.core.index).attr("data-html")), l(r, a);
                        var d = i.find(".lg-object");
                        i.find(".lg-video").append(d), i.find(".lg-video-object").hasClass("lg-html5") || (i.removeClass("lg-complete"), i.find(".lg-video-object").on("load.lg error.lg", function() {
                            i.addClass("lg-complete")
                        }))
                    }
            }, e.prototype.destroy = function() {
                this.videoLoaded = !1
            }, c.fn.lightGallery.modules.video = e
        }()
    }),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["jquery"], function(e) {
            return t(e)
        }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
    }(0, function(c) {
        ! function() {
            "use strict";

            function e(e) {
                return this.core = c(e).data("lightGallery"), this.core.s = c.extend({}, n, this.core.s), this.core.s.zoom && this.core.doCss() && (this.init(), this.zoomabletimeout = !1, this.pageX = c(window).width() / 2, this.pageY = c(window).height() / 2 + c(window).scrollTop()), this
            }
            var t, i, n = {
                scale: 1,
                zoom: !0,
                actualSize: !0,
                enableZoomAfter: 300,
                useLeftForZoom: (t = !1, i = navigator.userAgent.match(/Chrom(e|ium)\/([0-9]+)\./), i && parseInt(i[2], 10) < 54 && (t = !0), t)
            };
            e.prototype.init = function() {
                var r = this,
                    e = '<span id="lg-zoom-in" class="lg-icon"></span><span id="lg-zoom-out" class="lg-icon"></span>';
                r.core.s.actualSize && (e += '<span id="lg-actual-size" class="lg-icon"></span>'), r.core.s.useLeftForZoom ? r.core.$outer.addClass("lg-use-left-for-zoom") : r.core.$outer.addClass("lg-use-transition-for-zoom"), this.core.$outer.find(".lg-toolbar").append(e), r.core.$el.on("onSlideItemLoad.lg.tm.zoom", function(e, t, i) {
                    var n = r.core.s.enableZoomAfter + i;
                    c("body").hasClass("lg-from-hash") && i ? n = 0 : c("body").removeClass("lg-from-hash"), r.zoomabletimeout = setTimeout(function() {
                        r.core.$slide.eq(t).addClass("lg-zoomable")
                    }, n + 30)
                });

                function t(e) {
                    var t = r.core.$outer.find(".lg-current .lg-image"),
                        i = (c(window).width() - t.prop("offsetWidth")) / 2,
                        n = (c(window).height() - t.prop("offsetHeight")) / 2 + c(window).scrollTop(),
                        o = (e - 1) * (r.pageX - i),
                        s = (e - 1) * (r.pageY - n);
                    t.css("transform", "scale3d(" + e + ", " + e + ", 1)").attr("data-scale", e), r.core.s.useLeftForZoom ? t.parent().css({
                        left: -o + "px",
                        top: -s + "px"
                    }).attr("data-x", o).attr("data-y", s) : t.parent().css("transform", "translate3d(-" + o + "px, -" + s + "px, 0)").attr("data-x", o).attr("data-y", s)
                }

                function a() {
                    1 < l ? r.core.$outer.addClass("lg-zoomed") : r.resetZoom(), l < 1 && (l = 1), t(l)
                }

                function n(e, t, i, n) {
                    var o, s = t.prop("offsetWidth");
                    o = r.core.s.dynamic ? r.core.s.dynamicEl[i].width || t[0].naturalWidth || s : r.core.$items.eq(i).attr("data-width") || t[0].naturalWidth || s, r.core.$outer.hasClass("lg-zoomed") ? l = 1 : s < o && (l = o / s || 2), n ? (r.pageX = c(window).width() / 2, r.pageY = c(window).height() / 2 + c(window).scrollTop()) : (r.pageX = e.pageX || e.originalEvent.targetTouches[0].pageX, r.pageY = e.pageY || e.originalEvent.targetTouches[0].pageY), a(), setTimeout(function() {
                        r.core.$outer.removeClass("lg-grabbing").addClass("lg-grab")
                    }, 10)
                }
                var l = 1,
                    o = !1;
                r.core.$el.on("onAferAppendSlide.lg.tm.zoom", function(e, t) {
                    var i = r.core.$slide.eq(t).find(".lg-image");
                    i.on("dblclick", function(e) {
                        n(e, i, t)
                    }), i.on("touchstart", function(e) {
                        o ? (clearTimeout(o), o = null, n(e, i, t)) : o = setTimeout(function() {
                            o = null
                        }, 300), e.preventDefault()
                    })
                }), c(window).on("resize.lg.zoom scroll.lg.zoom orientationchange.lg.zoom", function() {
                    r.pageX = c(window).width() / 2, r.pageY = c(window).height() / 2 + c(window).scrollTop(), t(l)
                }), c("#lg-zoom-out").on("click.lg", function() {
                    r.core.$outer.find(".lg-current .lg-image").length && (l -= r.core.s.scale, a())
                }), c("#lg-zoom-in").on("click.lg", function() {
                    r.core.$outer.find(".lg-current .lg-image").length && (l += r.core.s.scale, a())
                }), c("#lg-actual-size").on("click.lg", function(e) {
                    n(e, r.core.$slide.eq(r.core.index).find(".lg-image"), r.core.index, !0)
                }), r.core.$el.on("onBeforeSlide.lg.tm", function() {
                    l = 1, r.resetZoom()
                }), r.zoomDrag(), r.zoomSwipe()
            }, e.prototype.resetZoom = function() {
                this.core.$outer.removeClass("lg-zoomed"), this.core.$slide.find(".lg-img-wrap").removeAttr("style data-x data-y"), this.core.$slide.find(".lg-image").removeAttr("style data-scale"), this.pageX = c(window).width() / 2, this.pageY = c(window).height() / 2 + c(window).scrollTop()
            }, e.prototype.zoomSwipe = function() {
                var o = this,
                    s = {},
                    r = {},
                    a = !1,
                    l = !1,
                    d = !1;
                o.core.$slide.on("touchstart.lg", function(e) {
                    if (o.core.$outer.hasClass("lg-zoomed")) {
                        var t = o.core.$slide.eq(o.core.index).find(".lg-object");
                        d = t.prop("offsetHeight") * t.attr("data-scale") > o.core.$outer.find(".lg").height(), ((l = t.prop("offsetWidth") * t.attr("data-scale") > o.core.$outer.find(".lg").width()) || d) && (e.preventDefault(), s = {
                            x: e.originalEvent.targetTouches[0].pageX,
                            y: e.originalEvent.targetTouches[0].pageY
                        })
                    }
                }), o.core.$slide.on("touchmove.lg", function(e) {
                    if (o.core.$outer.hasClass("lg-zoomed")) {
                        var t, i, n = o.core.$slide.eq(o.core.index).find(".lg-img-wrap");
                        e.preventDefault(), a = !0, r = {
                            x: e.originalEvent.targetTouches[0].pageX,
                            y: e.originalEvent.targetTouches[0].pageY
                        }, o.core.$outer.addClass("lg-zoom-dragging"), i = d ? -Math.abs(n.attr("data-y")) + (r.y - s.y) : -Math.abs(n.attr("data-y")), t = l ? -Math.abs(n.attr("data-x")) + (r.x - s.x) : -Math.abs(n.attr("data-x")), (15 < Math.abs(r.x - s.x) || 15 < Math.abs(r.y - s.y)) && (o.core.s.useLeftForZoom ? n.css({
                            left: t + "px",
                            top: i + "px"
                        }) : n.css("transform", "translate3d(" + t + "px, " + i + "px, 0)"))
                    }
                }), o.core.$slide.on("touchend.lg", function() {
                    o.core.$outer.hasClass("lg-zoomed") && a && (a = !1, o.core.$outer.removeClass("lg-zoom-dragging"), o.touchendZoom(s, r, l, d))
                })
            }, e.prototype.zoomDrag = function() {
                var o = this,
                    s = {},
                    r = {},
                    a = !1,
                    l = !1,
                    d = !1,
                    u = !1;
                o.core.$slide.on("mousedown.lg.zoom", function(e) {
                    var t = o.core.$slide.eq(o.core.index).find(".lg-object");
                    u = t.prop("offsetHeight") * t.attr("data-scale") > o.core.$outer.find(".lg").height(), d = t.prop("offsetWidth") * t.attr("data-scale") > o.core.$outer.find(".lg").width(), o.core.$outer.hasClass("lg-zoomed") && c(e.target).hasClass("lg-object") && (d || u) && (e.preventDefault(), s = {
                        x: e.pageX,
                        y: e.pageY
                    }, a = !0, o.core.$outer.scrollLeft += 1, o.core.$outer.scrollLeft -= 1, o.core.$outer.removeClass("lg-grab").addClass("lg-grabbing"))
                }), c(window).on("mousemove.lg.zoom", function(e) {
                    if (a) {
                        var t, i, n = o.core.$slide.eq(o.core.index).find(".lg-img-wrap");
                        l = !0, r = {
                            x: e.pageX,
                            y: e.pageY
                        }, o.core.$outer.addClass("lg-zoom-dragging"), i = u ? -Math.abs(n.attr("data-y")) + (r.y - s.y) : -Math.abs(n.attr("data-y")), t = d ? -Math.abs(n.attr("data-x")) + (r.x - s.x) : -Math.abs(n.attr("data-x")), o.core.s.useLeftForZoom ? n.css({
                            left: t + "px",
                            top: i + "px"
                        }) : n.css("transform", "translate3d(" + t + "px, " + i + "px, 0)")
                    }
                }), c(window).on("mouseup.lg.zoom", function(e) {
                    a && (a = !1, o.core.$outer.removeClass("lg-zoom-dragging"), !l || s.x === r.x && s.y === r.y || (r = {
                        x: e.pageX,
                        y: e.pageY
                    }, o.touchendZoom(s, r, d, u)), l = !1), o.core.$outer.removeClass("lg-grabbing").addClass("lg-grab")
                })
            }, e.prototype.touchendZoom = function(e, t, i, n) {
                var o = this.core.$slide.eq(this.core.index).find(".lg-img-wrap"),
                    s = this.core.$slide.eq(this.core.index).find(".lg-object"),
                    r = -Math.abs(o.attr("data-x")) + (t.x - e.x),
                    a = -Math.abs(o.attr("data-y")) + (t.y - e.y),
                    l = (this.core.$outer.find(".lg").height() - s.prop("offsetHeight")) / 2,
                    d = Math.abs(s.prop("offsetHeight") * Math.abs(s.attr("data-scale")) - this.core.$outer.find(".lg").height() + l),
                    u = (this.core.$outer.find(".lg").width() - s.prop("offsetWidth")) / 2,
                    c = Math.abs(s.prop("offsetWidth") * Math.abs(s.attr("data-scale")) - this.core.$outer.find(".lg").width() + u);
                (15 < Math.abs(t.x - e.x) || 15 < Math.abs(t.y - e.y)) && (n && (a <= -d ? a = -d : -l <= a && (a = -l)), i && (r <= -c ? r = -c : -u <= r && (r = -u)), n ? o.attr("data-y", Math.abs(a)) : a = -Math.abs(o.attr("data-y")), i ? o.attr("data-x", Math.abs(r)) : r = -Math.abs(o.attr("data-x")), this.core.s.useLeftForZoom ? o.css({
                    left: r + "px",
                    top: a + "px"
                }) : o.css("transform", "translate3d(" + r + "px, " + a + "px, 0)"))
            }, e.prototype.destroy = function() {
                this.core.$el.off(".lg.zoom"), c(window).off(".lg.zoom"), this.core.$slide.off(".lg.zoom"), this.core.$el.off(".lg.tm.zoom"), this.resetZoom(), clearTimeout(this.zoomabletimeout), this.zoomabletimeout = !1
            }, c.fn.lightGallery.modules.zoom = e
        }()
    }),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["jquery"], function(e) {
            return t(e)
        }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
    }(0, function(i) {
        ! function() {
            "use strict";

            function e(e) {
                return this.core = i(e).data("lightGallery"), this.core.s = i.extend({}, t, this.core.s), this.core.s.hash && (this.oldHash = window.location.hash, this.init()), this
            }
            var t = {
                hash: !0
            };
            e.prototype.init = function() {
                var t, n = this;
                n.core.$el.on("onAfterSlide.lg.tm", function(e, t, i) {
                    history.replaceState ? history.replaceState(null, null, window.location.pathname + window.location.search + "#lg=" + n.core.s.galleryId + "&slide=" + i) : window.location.hash = "lg=" + n.core.s.galleryId + "&slide=" + i
                }), i(window).on("hashchange.lg.hash", function() {
                    t = window.location.hash;
                    var e = parseInt(t.split("&slide=")[1], 10); - 1 < t.indexOf("lg=" + n.core.s.galleryId) ? n.core.slide(e, !1, !1) : n.core.lGalleryOn && n.core.destroy()
                })
            }, e.prototype.destroy = function() {
                this.core.s.hash && (this.oldHash && this.oldHash.indexOf("lg=" + this.core.s.galleryId) < 0 ? history.replaceState ? history.replaceState(null, null, this.oldHash) : window.location.hash = this.oldHash : history.replaceState ? history.replaceState(null, document.title, window.location.pathname + window.location.search) : window.location.hash = "", this.core.$el.off(".lg.hash"))
            }, i.fn.lightGallery.modules.hash = e
        }()
    }),
    function(e, t) {
        "function" == typeof define && define.amd ? define(["jquery"], function(e) {
            return t(e)
        }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
    }(0, function(o) {
        ! function() {
            "use strict";

            function e(e) {
                return this.core = o(e).data("lightGallery"), this.core.s = o.extend({}, t, this.core.s), this.core.s.share && this.init(), this
            }
            var t = {
                share: !0,
                facebook: !0,
                facebookDropdownText: "Facebook",
                twitter: !0,
                twitterDropdownText: "Twitter",
                googlePlus: !0,
                googlePlusDropdownText: "GooglePlus",
                pinterest: !0,
                pinterestDropdownText: "Pinterest"
            };
            e.prototype.init = function() {
                var n = this,
                    e = '<span id="lg-share" class="lg-icon"><ul class="lg-dropdown" style="position: absolute;">';
                e += n.core.s.facebook ? '<li><a id="lg-share-facebook" target="_blank"><span class="lg-icon"></span><span class="lg-dropdown-text">' + this.core.s.facebookDropdownText + "</span></a></li>" : "", e += n.core.s.twitter ? '<li><a id="lg-share-twitter" target="_blank"><span class="lg-icon"></span><span class="lg-dropdown-text">' + this.core.s.twitterDropdownText + "</span></a></li>" : "", e += n.core.s.googlePlus ? '<li><a id="lg-share-googleplus" target="_blank"><span class="lg-icon"></span><span class="lg-dropdown-text">' + this.core.s.googlePlusDropdownText + "</span></a></li>" : "", e += n.core.s.pinterest ? '<li><a id="lg-share-pinterest" target="_blank"><span class="lg-icon"></span><span class="lg-dropdown-text">' + this.core.s.pinterestDropdownText + "</span></a></li>" : "", e += "</ul></span>", this.core.$outer.find(".lg-toolbar").append(e), this.core.$outer.find(".lg").append('<div id="lg-dropdown-overlay"></div>'), o("#lg-share").on("click.lg", function() {
                    n.core.$outer.toggleClass("lg-dropdown-active")
                }), o("#lg-dropdown-overlay").on("click.lg", function() {
                    n.core.$outer.removeClass("lg-dropdown-active")
                }), n.core.$el.on("onAfterSlide.lg.tm", function(e, t, i) {
                    setTimeout(function() {
                        o("#lg-share-facebook").attr("href", "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(n.getSahreProps(i, "facebookShareUrl") || window.location.href)), o("#lg-share-twitter").attr("href", "https://twitter.com/intent/tweet?text=" + n.getSahreProps(i, "tweetText") + "&url=" + encodeURIComponent(n.getSahreProps(i, "twitterShareUrl") || window.location.href)), o("#lg-share-googleplus").attr("href", "https://plus.google.com/share?url=" + encodeURIComponent(n.getSahreProps(i, "googleplusShareUrl") || window.location.href)), o("#lg-share-pinterest").attr("href", "http://www.pinterest.com/pin/create/button/?url=" + encodeURIComponent(n.getSahreProps(i, "pinterestShareUrl") || window.location.href) + "&media=" + encodeURIComponent(n.getSahreProps(i, "src")) + "&description=" + n.getSahreProps(i, "pinterestText"))
                    }, 100)
                })
            }, e.prototype.getSahreProps = function(e, t) {
                var i = "";
                if (this.core.s.dynamic) i = this.core.s.dynamicEl[e][t];
                else {
                    var n = this.core.$items.eq(e).attr("href"),
                        o = this.core.$items.eq(e).data(t);
                    i = "src" === t && n || o
                }
                return i
            }, e.prototype.destroy = function() {}, o.fn.lightGallery.modules.share = e
        }()
    }),
    function(e) {
        "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof exports ? module.exports = e : e(jQuery)
    }(function(h) {
        function t(e) {
            var t = e || window.event,
                i = v.call(arguments, 1),
                n = 0,
                o = 0,
                s = 0,
                r = 0,
                a = 0,
                l = 0;
            if ((e = h.event.fix(t)).type = "mousewheel", "detail" in t && (s = -1 * t.detail), "wheelDelta" in t && (s = t.wheelDelta), "wheelDeltaY" in t && (s = t.wheelDeltaY), "wheelDeltaX" in t && (o = -1 * t.wheelDeltaX), "axis" in t && t.axis === t.HORIZONTAL_AXIS && (o = -1 * s, s = 0), n = 0 === s ? o : s, "deltaY" in t && (n = s = -1 * t.deltaY), "deltaX" in t && (o = t.deltaX, 0 === s && (n = -1 * o)), 0 !== s || 0 !== o) {
                if (1 === t.deltaMode) {
                    var d = h.data(this, "mousewheel-line-height");
                    n *= d, s *= d, o *= d
                } else if (2 === t.deltaMode) {
                    var u = h.data(this, "mousewheel-page-height");
                    n *= u, s *= u, o *= u
                }
                if (r = Math.max(Math.abs(s), Math.abs(o)), (!g || r < g) && (f(t, g = r) && (g /= 40)), f(t, r) && (n /= 40, o /= 40, s /= 40), n = Math[1 <= n ? "floor" : "ceil"](n / g), o = Math[1 <= o ? "floor" : "ceil"](o / g), s = Math[1 <= s ? "floor" : "ceil"](s / g), y.settings.normalizeOffset && this.getBoundingClientRect) {
                    var c = this.getBoundingClientRect();
                    a = e.clientX - c.left, l = e.clientY - c.top
                }
                return e.deltaX = o, e.deltaY = s, e.deltaFactor = g, e.offsetX = a, e.offsetY = l, e.deltaMode = 0, i.unshift(e, n, o, s), m && clearTimeout(m), m = setTimeout(p, 200), (h.event.dispatch || h.event.handle).apply(this, i)
            }
        }

        function p() {
            g = null
        }

        function f(e, t) {
            return y.settings.adjustOldDeltas && "mousewheel" === e.type && t % 120 == 0
        }
        var m, g, e = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
            i = "onwheel" in document || 9 <= document.documentMode ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"],
            v = Array.prototype.slice;
        if (h.event.fixHooks)
            for (var n = e.length; n;) h.event.fixHooks[e[--n]] = h.event.mouseHooks;
        var y = h.event.special.mousewheel = {
            version: "3.1.12",
            setup: function() {
                if (this.addEventListener)
                    for (var e = i.length; e;) this.addEventListener(i[--e], t, !1);
                else this.onmousewheel = t;
                h.data(this, "mousewheel-line-height", y.getLineHeight(this)), h.data(this, "mousewheel-page-height", y.getPageHeight(this))
            },
            teardown: function() {
                if (this.removeEventListener)
                    for (var e = i.length; e;) this.removeEventListener(i[--e], t, !1);
                else this.onmousewheel = null;
                h.removeData(this, "mousewheel-line-height"), h.removeData(this, "mousewheel-page-height")
            },
            getLineHeight: function(e) {
                var t = h(e),
                    i = t["offsetParent" in h.fn ? "offsetParent" : "parent"]();
                return i.length || (i = h("body")), parseInt(i.css("fontSize"), 10) || parseInt(t.css("fontSize"), 10) || 16
            },
            getPageHeight: function(e) {
                return h(e).height()
            },
            settings: {
                adjustOldDeltas: !0,
                normalizeOffset: !0
            }
        };
        h.fn.extend({
            mousewheel: function(e) {
                return e ? this.bind("mousewheel", e) : this.trigger("mousewheel")
            },
            unmousewheel: function(e) {
                return this.unbind("mousewheel", e)
            }
        })
    }),

    (function() {

    "use strict";
  
    var app = {
        
        init: function() {

            this.lightGallery();

        },


        lightGallery: function() {

            $(".gallery-container").lightGallery({
                selector: '.gallery-item'
            });

        },

        
    }
 
        app.init();
 
    }());
