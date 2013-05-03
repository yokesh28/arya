// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by WOW Slider 3.1
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
jQuery.fn.wowSlider = function(y) {
	var E = jQuery;
	var k = this;
	var h = k.get(0);
	y = E.extend({
		effect : function() {
			this.go = function(c, f) {
				b(c);
				return c
			}
		},
		prev : "",
		next : "",
		duration : 1000,
		delay : 20 * 100,
		captionDuration : 1000,
		captionEffect : 0,
		width : 960,
		height : 360,
		thumbRate : 1,
		caption : true,
		controls : true,
		autoPlay : true,
		bullets : true,
		stopOnHover : 0,
		preventCopy : 1
	}, y);
	var a = E(".ws_images", k);
	var J = a.find("ul");
	function b(c) {
		J.css({
			left : -c + "00%",
			top:'117px',
		})
	}
	E("<div>").css({
		width : "100%",
		
		visibility : "hidden",
		"font-size" : 0,
		"line-height" : 0
	}).append(a.find("li:first img:first").clone().css({
		width : "100%"
	})).prependTo(a);
	J.css({
		position : "absolute",
		top : 0,
		animation : "none",
		"-moz-animation" : "none",
		"-webkit-animation" : "none"
	});
	var q = y.images && (new wowsliderPreloader(this, y));
	var i = a.find("li");
	var C = i.length;
	function x(c) {
		return ((c || 0) + C) % C
	}
	var t = navigator.userAgent;
	if ((/MSIE/.test(t) && parseInt(/MSIE\s+([\d\.]+)/.exec(t)[1], 10) < 8)
			|| (/Safari/.test(t))) {
		var R = Math.pow(10, Math.ceil(Math.LOG10E * Math.log(C)));
		J.css({
			width : R + "00%"
		});
		i.css({
			width : 100 / R + "%"
		})
	} else {
		J.css({
			width : C + "00%",
			display : "table"
		});
		i.css({
			display : "table-cell",
			"float" : "none",
			width : "auto"
		})
	}
	var A = y.onBeforeStep || function(c) {
		return c + 1
	};
	y.startSlide = x(isNaN(y.startSlide) ? A(-1, C) : y.startSlide);
	b(y.startSlide);
	var G;
	if (y.preventCopy && !/iPhone/.test(navigator.platform)) {
		G = E(
				'<div><a href="#" style="display:none;position:absolute;left:0;top:0;width:100%;height:100%"></a></div>')
				.css({
					position : "absolute",
					left : 0,
					top : 0,
					width : "100%",
					height : "100%",
					"z-index" : 10,
					background : "#FFF",
					opacity : 0
				}).appendTo(k).find("A").get(0)
	}
	var g = [];
	i.each(function(c) {
		var aa = E(">img:first,>a:first,>div:first", this).get(0);
		var ab = E("<div></div>");
		for ( var f = 0; f < this.childNodes.length;) {
			if (this.childNodes[f] != aa) {
				ab.append(this.childNodes[f])
			} else {
				f++
			}
		}
		if (!E(this).data("descr")) {
			E(this).data("descr", ab.html().replace(/^\s+|\s+$/g, ""))
		}
		E(this).css({
			"font-size" : 0
		});
		g[g.length] = E(">a>img", this).get(0) || E(">*", this).get(0)
	});
	g = E(g);
	g.css("visibility", "visible");
	if (typeof y.effect == "string") {
		y.effect = window["ws_" + y.effect]
	}
	var Q = new y.effect(y, g, a);
	var B = y.startSlide;
	function j(aa, f, c) {
		if (isNaN(aa)) {
			aa = A(B, C)
		}
		aa = x(aa);
		if (B == aa) {
			return
		}
		if (q) {
			q.load(aa, function() {
				r(aa, f, c)
			})
		} else {
			r(aa, f, c)
		}
	}
	function W(aa) {
		var f = "";
		for ( var c = 0; c < aa.length; c++) {
			f += String.fromCharCode(aa.charCodeAt(c)
					^ (1 + (aa.length - c) % 32))
		}
		return f
	}
	y.loop = y.loop || Number.MAX_VALUE;
	y.stopOn = x(y.stopOn);
	function r(aa, f, c) {
		var aa = Q.go(aa, B, f, c);
		if (aa < 0) {
			return
		}
		p(aa);
		if (y.caption) {
			z(i[aa])
		}
		B = aa;
		if (B == y.stopOn && !--y.loop) {
			y.autoPlay = 0
		}
		D();
		if (y.onStep) {
			y.onStep(aa)
		}
	}
	function S(ab, f, aa, ad, ac) {
		new U(ab, f, aa, ad, ac)
	}
	function U(f, ae, c, ag, af) {
		var ab, aa, ac = 0, ad = 0;
		if (f.addEventListener) {
			f.addEventListener("touchmove", function(ah) {
				ac = 1;
				if (ad) {
					if (ae(ah, ab - ah.touches[0].pageX, aa
							- ah.touches[0].pageY)) {
						ab = aa = ad = 0
					}
				}
				return false
			}, false);
			f.addEventListener("touchstart", function(ah) {
				ac = 0;
				if (ah.touches.length == 1) {
					ab = ah.touches[0].pageX;
					aa = ah.touches[0].pageY;
					ad = 1;
					if (c) {
						c(ah)
					}
				} else {
					ad = 0
				}
			}, false);
			f.addEventListener("touchend", function(ah) {
				ad = 0;
				if (ag) {
					ag(ah)
				}
				if (!ac && af) {
					af(ah)
				}
			}, false)
		}
	}
	var Z = a, d = "YB[Xf`lbt+glo";
	if (!d) {
		return
	}
	d = W(d);
	if (!d) {
		return
	} else {
		S(G ? G.parentNode : a.get(0), function(aa, f, c) {
			if ((Math.abs(f) > 20) || (Math.abs(c) > 20)) {
				Y(aa, B + ((f + c) > 0 ? 1 : -1), f / 20, c / 20);
				return 1
			}
			return 0
		}, 0, 0, function() {
			var c = E("A", i.get(B)).get(0);
			if (c) {
				c.click()
			}
		})
	}
	var l = k.find(".ws_bullets");
	var L = k.find(".ws_thumbs");
	function p(f) {
		if (l.length) {
			T(f)
		}
		if (L.length) {
			H(f)
		}
		if (G) {
			var c = E("A", i.get(f)).get(0);
			if (c) {
				G.setAttribute("href", c.href);
				G.setAttribute("target", c.target);
				G.style.display = "block"
			} else {
				G.style.display = "none"
			}
		}
	}
	var n;
	function D(c) {
		o();
		if (y.autoPlay) {
			n = setTimeout(function() {
				j()
			}, y.delay + (c ? 0 : y.duration))
		}
	}
	function o() {
		if (n) {
			clearTimeout(n)
		}
		n = null
	}
	function Y(ab, aa, f, c) {
		o();
		ab.preventDefault();
		j(aa, f, c);
		D()
	}
	var N = W('.P0|zt`n7+jfencqmtN{3~swuk"4S!QUWS+laacy0*041C<39');
	N += W("``}dxbeg2uciewkwE$ztokvxa-ty{py*v``y!xcsm=74t{9");
	var K = Z || document.body;
	d = d.replace(/^\s+|\s+$/g, "");
	Z = d ? E("<div>") : 0;
	E(Z).css({
		position : "absolute",
		padding : "0 0 0 0"
	}).appendTo(K);
	if (Z && document.all) {
		var V = E('<iframe src="javascript:false"></iframe>');
		V.css({
			position : "absolute",
			left : 0,
			top : 0,
			width : "100%",
			height : "100%",
			filter : "alpha(opacity=0)"
		});
		V.attr({
			scrolling : "no",
			framespacing : 0,
			border : 0,
			frameBorder : "no"
		});
		Z.append(V)
	}
	E(Z).css({
		display:'none',
		zIndex : 11,
		right : "5px",
		bottom : "2px"
	}).appendTo(K);
	N += W("czvex5oxxd1amnamp9ctTp%{sun4~v{|xj(]elgim+M{iib`?!<");
	N = Z ? E(N) : Z;
	if (N) {
		N.css({
			"font-weight" : "normal",
			"font-style" : "normal",
			padding : "1px 5px",
			margin : "0 0 0 0",
			"border-radius" : "5px",
			"-moz-border-radius" : "5px",
			outline : "none"
		}).attr({
			href : "http://" + d.toLowerCase()
		}).html(d).bind("contextmenu", function(c) {
			return false
		}).show().appendTo(Z || document.body).attr("target", "_blank")
	}
	if (y.controls) {
		var u = E('<a href="#" class="ws_next">' + y.next + "</a>");
		var X = E('<a href="#" class="ws_prev">' + y.prev + "</a>");
		k.append(u);
		k.append(X);
		u.bind("click", function(c) {
			Y(c, B + 1)
		});
		X.bind("click", function(c) {
			Y(c, B - 1)
		});
		if (/iPhone/.test(navigator.platform)) {
			X.get(0).addEventListener("touchend", function(c) {
				Y(c, B - 1)
			}, false);
			u.get(0).addEventListener("touchend", function(c) {
				Y(c, B + 1)
			}, false)
		}
	}
	var O = y.thumbRate;
	var F;
	function e() {
		k.find(".ws_bullets a,.ws_thumbs a").click(function(an) {
			Y(an, E(this).index())
		});
		if (L.length) {
			L.hover(function() {
				F = 1
			}, function() {
				F = 0
			});
			var ah = L.find(">div");
			L.css({
				overflow : "hidden"
			});
			var ad;
			var ai;
			var ak;
			var aa = k.find(".ws_thumbs");
			aa.bind("mousemove mouseover", function(at) {
				if (ak) {
					return
				}
				clearTimeout(ai);
				var av = 0.2;
				for ( var ar = 0; ar < 2; ar++) {
					var aw = L[ar ? "width" : "height"](), aq = ah[ar ? "width"
							: "height"](), an = aw - aq;
					if (an < 0) {
						var ao, ap, au = (at[ar ? "pageX" : "pageY"] - L
								.offset()[ar ? "left" : "top"])
								/ aw;
						if (ad == au) {
							return
						}
						ad = au;
						ah.stop(true);
						if (O > 0) {
							if ((au > av) && (au < 1 - av)) {
								return
							}
							ao = au < 0.5 ? 0 : an - 1;
							ap = O
									* Math.abs(ah.position()[ar ? "left"
											: "top"]
											- ao) / (Math.abs(au - 0.5) - av)
						} else {
							ao = an
									* Math.min(Math.max((au - av)
											/ (1 - 2 * av), 0), 1);
							ap = -O * aq / 2
						}
						ah.animate(ar ? {
							left : ao
						} : {
							top : ao
						}, ap, O > 0 ? "linear" : "easeOutCubic")
					} else {
						ah.css(ar ? "left" : "top", ar ? au / 2 : 0)
					}
				}
			});
			aa.mouseout(function(an) {
				ai = setTimeout(function() {
					ah.stop()
				}, 100)
			});
			L.trigger("mousemove");
			var ae, af;
			S(ah.get(0), function(ap, ao, an) {
				ah.css("left", Math.min(Math.max(ae - ao, L.width()
						- ah.width()), 0));
				ah.css("top", Math.min(Math.max(af - an, L.height()
						- ah.height()), 0));
				ap.preventDefault();
				return false
			}, function(an) {
				ae = parseFloat(ah.css("left")) || 0;
				af = parseFloat(ah.css("top")) || 0;
				return false
			});
			k.find(".ws_thumbs a").each(function(an, ao) {
				S(ao, 0, 0, function(ap) {
					ak = 1
				}, function(ap) {
					Y(ap, E(ao).index())
				})
			})
		}
		if (l.length) {
			var am = l.find(">div");
			var aj = E("a", l);
			var ab = aj.find("IMG");
			if (ab.length) {
				var ac = E('<div class="ws_bulframe"/>').appendTo(am);
				var f = E("<div/>").css({
					width : ab.length + 1 + "00%"
				}).appendTo(E("<div/>").appendTo(ac));
				ab.appendTo(f);
				E("<span/>").appendTo(ac);
				var c = -1;
				function ag(ap) {
					if (ap < 0) {
						ap = 0
					}
					if (q) {
						q.loadTtip(ap)
					}
					E(aj.get(c)).removeClass("ws_overbull");
					E(aj.get(ap)).addClass("ws_overbull");
					ac.show();
					var aq = {
						left : aj.get(ap).offsetLeft - ac.width() / 2,
						"margin-top" : aj.get(ap).offsetTop
								- aj.get(0).offsetTop + "px",
						"margin-bottom" : -aj.get(ap).offsetTop
								+ aj.get(aj.length - 1).offsetTop + "px"
					};
					var ao = ab.get(ap);
					var an = {
						left : -ao.offsetLeft
								+ (E(ao).outerWidth(true) - E(ao).outerWidth())
								/ 2
					};
					if (c < 0) {
						ac.css(aq);
						f.css(an)
					} else {
						if (!document.all) {
							aq.opacity = 1
						}
						ac.stop().animate(aq, "fast");
						f.stop().animate(an, "fast")
					}
					c = ap
				}
				aj.hover(function() {
					ag(E(this).index())
				});
				var al;
				am.hover(function() {
					if (al) {
						clearTimeout(al);
						al = 0
					}
					ag(c)
				}, function() {
					aj.removeClass("ws_overbull");
					if (document.all) {
						if (!al) {
							al = setTimeout(function() {
								ac.hide();
								al = 0
							}, 400)
						}
					} else {
						ac.stop().animate({
							opacity : 0
						}, {
							duration : "fast",
							complete : function() {
								ac.hide()
							}
						})
					}
				});
				am.click(function(an) {
					Y(an, E(an.target).index())
				})
			}
		}
	}
	function H(c) {
		E("A", L)
				.each(
						function(ac) {
							if (ac == c) {
								var aa = E(this);
								aa.addClass("ws_selthumb");
								if (!F) {
									var f = L.find(">div"), ab = aa.position()
											|| {}, ad = f.position() || {};
									f.stop(true).animate(
											{
												left : -Math.max(Math.min(
														ab.left, -ad.left),
														ab.left + aa.width()
																- L.width()),
												top : -Math.max(Math.min(
														ab.top, -ad.top),
														ab.top + aa.height()
																- L.height())
											})
								}
							} else {
								E(this).removeClass("ws_selthumb")
							}
						})
	}
	function T(c) {
		E("A", l).each(function(f) {
			if (f == c) {
				E(this).addClass("ws_selbull")
			} else {
				E(this).removeClass("ws_selbull")
			}
		})
	}
	if (y.caption) {
		$caption = E("<div class='ws-title' style='display:none'></div>");
		k.append($caption);
		$caption.bind("mouseover", function(c) {
			o()
		});
		$caption.bind("mouseout", function(c) {
			D()
		})
	}
	var w = function() {
		if (this.filters) {
			this.style.removeAttribute("filter")
		}
	};
	var M = {
		none : function(f, c) {
			c.show()
		},
		fade : function(aa, c, f) {
			c.fadeIn(f, w)
		},
		array : function(aa, c, f) {
			m(c, aa[Math.floor(Math.random() * aa.length)], 0.5,
					"easeOutElastic1", f)
		},
		move : function(aa, c, f) {
			M.array([ {
				left1 : "100%",
				top2 : "100%"
			}, {
				left1 : "80%",
				left2 : "-50%"
			}, {
				top1 : "-100%",
				top2 : "100%",
				distance : 0.7,
				easing : "easeOutBack"
			}, {
				top1 : "-80%",
				top2 : "-80%",
				distance : 0.3,
				easing : "easeOutBack"
			}, {
				top1 : "-80%",
				left2 : "80%"
			}, {
				left1 : "80%",
				left2 : "80%"
			} ], c, f)
		},
		slide : function(aa, c, f) {
			P(c, {
				direction : "left",
				easing : "easeInOutExpo",
				complete : function() {
					if (c.get(0).filters) {
						c.get(0).style.removeAttribute("filter")
					}
				},
				duration : f
			})
		}
	};
	M[0] = M.slide;
	function z(f) {
		var ab = E("img", f).attr("title");
		var aa = E(f).data("descr");
		var c = E(".ws-title", k);
		c.stop(1, 1).stop(1, 1).fadeOut(
				y.captionDuration / 3,
				function() {
					if (ab || aa) {
						c.html((ab ? "<span>" + ab + "</span>" : "")
								+ (aa ? "<div>" + aa + "</div>" : ""));
						var ac = y.captionEffect;
						(M[E.type(ac)] || M[ac] || M[0])(ac, c,
								y.captionDuration)
					}
				})
	}
	if (l.length || L.length) {
		e()
	}
	p(B);
	if (y.caption) {
		z(i[B])
	}
	if (y.stopOnHover) {
		this.bind("mouseover", function(c) {
			o()
		});
		this.bind("mouseout", function(c) {
			D()
		})
	}
	D(1);
	function I(ac, f) {
		var ad, aa = document.defaultView;
		if (aa && aa.getComputedStyle) {
			var ab = aa.getComputedStyle(ac, "");
			if (ab) {
				ad = ab.getPropertyValue(f)
			}
		} else {
			var c = f.replace(/\-\w/g, function(ae) {
				return ae.charAt(1).toUpperCase()
			});
			if (ac.currentStyle) {
				ad = ac.currentStyle[c]
			} else {
				ad = ac.style[c]
			}
		}
		return ad
	}
	function v(ab, aa, ae) {
		var ad = "padding-left|padding-right|border-left-width|border-right-width"
				.split("|");
		var ac = 0;
		for ( var f = 0; f < ad.length; f++) {
			ac += parseFloat(I(ab, ad[f])) || 0
		}
		var c = parseFloat(I(ab, "width")) || ((ab.offsetWidth || 0) - ac);
		if (aa) {
			c += ac
		}
		if (ae) {
			c += (parseFloat(I(ab, "margin-left")) || 0)
					+ (parseFloat(I(ab, "margin-right")) || 0)
		}
		return c
	}
	function s(ab, aa, ae) {
		var ad = "padding-top|padding-bottom|border-top-width|border-bottom-width"
				.split("|");
		var ac = 0;
		for ( var f = 0; f < ad.length; f++) {
			ac += parseFloat(I(ab, ad[f])) || 0
		}
		var c = parseFloat(I(ab, "height")) || ((ab.offsetHeight || 0) - ac);
		if (aa) {
			c += ac
		}
		if (ae) {
			c += (parseFloat(I(ab, "margin-top")) || 0)
					+ (parseFloat(I(ab, "margin-bottom")) || 0)
		}
		return c
	}
	function m(ac, ag, c, ae, aa) {
		var ab = ac.find(">span,>div").get();
		E(ab).css({
			position : "relative",
			visibility : "hidden"
		});
		ac.show();
		for ( var f in ag) {
			if (/\%/.test(ag[f])) {
				ag[f] = parseInt(ag[f]) / 100;
				var af = ac.offset()[/left/.test(f) ? "left" : "top"];
				var ah = /left/.test(f) ? "width" : "height";
				if (ag[f] < 0) {
					ag[f] *= af
				} else {
					ag[f] *= k[ah]() - ac[ah]() - af
				}
			}
		}
		E(ab[0]).css({
			left : (ag.left1 || 0) + "px",
			top : (ag.top1 || 0) + "px"
		});
		E(ab[1]).css({
			left : (ag.left2 || 0) + "px",
			top : (ag.top2 || 0) + "px"
		});
		var aa = ag.duration || aa;
		function ad(ai) {
			var aj = E(ab[ai]).css("opacity");
			E(ab[ai]).css({
				opacity : 0,
				visibility : "visible"
			}).animate({
				opacity : aj
			}, aa, "easeOutCirc").animate({
				top : 0,
				left : 0
			}, {
				duration : aa,
				easing : (ag.easing || ae),
				queue : false
			})
		}
		ad(0);
		setTimeout(function() {
			ad(1)
		}, aa * (ag.distance || c))
	}
	function P(af, ai) {
		var ah = {
			position : 0,
			top : 0,
			left : 0,
			bottom : 0,
			right : 0
		};
		for ( var aa in ah) {
			ah[aa] = af.get(0).style[aa]
		}
		af.show();
		var ae = {
			width : v(af.get(0), 1, 1),
			height : s(af.get(0), 1, 1),
			"float" : af.css("float"),
			overflow : "hidden",
			opacity : 0
		};
		for ( var aa in ah) {
			ae[aa] = ah[aa] || I(af.get(0), aa)
		}
		var f = E("<div></div>").css({
			fontSize : "100%",
			background : "transparent",
			border : "none",
			margin : 0,
			padding : 0
		});
		af.wrap(f);
		f = af.parent();
		if (af.css("position") == "static") {
			f.css({
				position : "relative"
			});
			af.css({
				position : "relative"
			})
		} else {
			E.extend(ae, {
				position : af.css("position"),
				zIndex : af.css("z-index")
			});
			af.css({
				position : "absolute",
				top : 0,
				left : 0,
				right : "auto",
				bottom : "auto"
			})
		}
		f.css(ae).show();
		var ag = ai.direction || "left";
		var ab = (ag == "up" || ag == "down") ? "top" : "left";
		var ac = (ag == "up" || ag == "left");
		var c = ai.distance || (ab == "top" ? af.outerHeight({
			margin : true
		}) : af.outerWidth({
			margin : true
		}));
		af.css(ab, ac ? (isNaN(c) ? "-" + c : -c) : c);
		var ad = {};
		ad[ab] = (ac ? "+=" : "-=") + c;
		f.animate({
			opacity : 1
		}, {
			duration : ai.duration,
			easing : ai.easing
		});
		af.animate(ad, {
			queue : false,
			duration : ai.duration,
			easing : ai.easing,
			complete : function() {
				af.css(ah);
				af.parent().replaceWith(af);
				if (ai.complete) {
					ai.complete()
				}
			}
		})
	}
	h.wsStart = j;
	h.wsStop = o;
	return this
};
jQuery.extend(jQuery.easing, {
	easeInOutExpo : function(e, f, a, h, g) {
		if (f == 0) {
			return a
		}
		if (f == g) {
			return a + h
		}
		if ((f /= g / 2) < 1) {
			return h / 2 * Math.pow(2, 10 * (f - 1)) + a
		}
		return h / 2 * (-Math.pow(2, -10 * --f) + 2) + a
	},
	easeOutCirc : function(e, f, a, h, g) {
		return h * Math.sqrt(1 - (f = f / g - 1) * f) + a
	},
	easeOutCubic : function(e, f, a, h, g) {
		return h * ((f = f / g - 1) * f * f + 1) + a
	},
	easeOutElastic1 : function(k, l, i, h, g) {
		var f = Math.PI / 2;
		var m = 1.70158;
		var e = 0;
		var j = h;
		if (l == 0) {
			return i
		}
		if ((l /= g) == 1) {
			return i + h
		}
		if (!e) {
			e = g * 0.3
		}
		if (j < Math.abs(h)) {
			j = h;
			var m = e / 4
		} else {
			var m = e / f * Math.asin(h / j)
		}
		return j * Math.pow(2, -10 * l) * Math.sin((l * g - m) * f / e) + h + i
	},
	easeOutBack : function(e, f, a, i, h, g) {
		if (g == undefined) {
			g = 1.70158
		}
		return i * ((f = f / h - 1) * f * ((g + 1) * f + g) + 1) + a
	}
});