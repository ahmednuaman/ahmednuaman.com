$	= jQuery;

var Suitcase	= function(window)
{
	var eventTransitionEnd	= 'transitionend oTransitionEnd webkitTransitionEnd msTransitionEnd';
	var heroCurrentX		= 0;
	var heroMarginX			= 0;
	
	var hasTouch;
	var hasTransitions;
	var hero;
	var heroMinX;
	var heroMoveX;
	var heroTestX;
	var heroTestRoundedX;
	var heroStartX;
	var heroUl;
	var heroWidth;
	var panels;
	var panelsLength;
	var panelWidth;
	var tap;
	
	function ready()
	{
		detectBrowser();
		
		loadTweets();
		
		prepareHero();
		
		window.on( 'orientationchange', handleResize ).resize( handleResize ).resize();
	}
	
	function detectBrowser()
	{
		if ( $.browser.msie )
		{
			$( 'html' ).addClass( 'ie' );
			
			if ( $.browser.version )
			{
				$( 'html' ).addClass( 'ie' + Number( $.browser.version ) );
			}
			else
			{
				$( 'html' ).addClass( 'ie6' );
			}
		}

		if ( $.browser.webkit )
		{
			$( 'html' ).addClass( 'webkit' );
			
			if ( navigator.userAgent.indexOf( 'Chrome' ) === -1 )
			{
				$( 'html' ).addClass( 'safari' );
			}
			else
			{
				$( 'html' ).addClass( 'chrome' );
			}
		}

		if ( $.browser.mozilla )
		{
			$( 'html' ).addClass( 'ff' );
		}
		
		if ( $.browser.opera )
		{
			$( 'html' ).addClass( 'opera' );
		}

		if ( navigator.userAgent.indexOf( 'Windows' ) != -1 )
		{
			$( 'html' ).addClass( 'windows' );
		}
		else if ( navigator.userAgent.indexOf( 'Mac' ) != -1 )
		{
			$( 'html' ).addClass( 'mac' );
		}
		
		if ( navigator.userAgent.indexOf( 'iPad' ) != -1 )
		{
			$( 'html' ).addClass( 'ipad' ).addClass( 'ios' );
		}
		
		if ( navigator.userAgent.indexOf( 'iPhone' ) != -1 )
		{
			$( 'html' ).addClass( 'iphone' ).addClass( 'ios' );
		}
		
		if ( navigator.userAgent.indexOf( 'OS 3_' ) != -1 )
		{
			$( 'html' ).addClass( 'ios3' );
		}
		
		if ( navigator.userAgent.indexOf( 'OS 4_' ) != -1 )
		{
			$( 'html' ).addClass( 'ios4' );
		}
		
		if ( navigator.userAgent.indexOf( 'OS 5_' ) != -1 )
		{
			$( 'html' ).addClass( 'ios5' );
		}
		
		if ( window.devicePixelRatio )
		{
			if ( window.devicePixelRatio > 1 )
			{
				$( 'html' ).addClass( 'retina' );
			}
		}
		
		$( 'html' ).removeClass( 'no-js' );
		
		hasTransitions	= $( 'html' ).hasClass( 'csstransitions' );
		
		hasTouch		= $( 'html' ).hasClass( 'touch' );
		
		tap				= 'click';
	}
	
	function prepareHero()
	{
		hero	= $( '#hero' );
		
		heroUl	= hero.find( 'ul' );
		
		if ( hero.length )
		{
			panels	= hero.find( 'li' );
			
			hero.on( 'mousedown touchstart', handleHeroTouchStart );
			
			window.on( 'mouseup touchend mouseleave', handleHeroTouchEnd ).resize();
		}
	}
	
	function handleHeroTouchStart(e)
	{
		if ( !hasTouch )
		{
			e.preventDefault();
		}
		
		heroUl.removeClass( 'snapping' ).stop( true );
		
		heroStartX	= getX( e );
		
		hero.on( 'mousemove touchmove', handleHeroTouchMove );
	}
	
	function handleHeroTouchMove(e)
	{
		if ( !hasTouch )
		{
			e.preventDefault();
		}
		
		heroMoveX		= getX( e );
		
		heroCurrentX	= ( heroMoveX - heroStartX ) + heroMarginX;
		
		if ( heroCurrentX > 0 )
		{
			heroCurrentX	= 0;
		}
		else if ( heroCurrentX < heroMinX )
		{
			heroCurrentX	= heroMinX;
		}
		
		heroUl.css( 'margin-left', heroCurrentX + 'px' );
	}
	
	function handleHeroTouchEnd(e)
	{
		heroMarginX	= heroCurrentX || 0;
		
		hero.off( 'mousemove touchmove', handleHeroTouchMove );
		
		heroLiClassAssign();
		
		snapHero();
	}
	
	function snapHero()
	{
		heroTestX			= heroCurrentX / panelWidth;
		
		heroTestRoundedX	= Math.round( heroTestX );
		
		if ( heroTestX !== heroTestRoundedX )
		{
			heroMarginX	= heroTestRoundedX * panelWidth;
			
			if ( hasTransitions )
			{
				heroUl.on( eventTransitionEnd, handleHeroSnapEnd ).addClass( 'snapping' ).css( 'margin-left', heroMarginX + 'px' );
			}
			else
			{
				heroUl.animate({
					'margin-left'	: heroMarginX + 'px'
				}, 'normal', 'easeOutExpo', handleHeroSnapEnd );
			}
		}
	}
	
	function handleHeroSnapEnd(e)
	{
		if ( hasTransitions )
		{
			heroUl.off( 'transitionend oTransitionEnd webkitTransitionEnd msTransitionEnd', handleHeroSnapEnd ).removeClass( 'snapping' );
		}
		
		heroLiClassAssign();
	}
	
	function heroLiClassAssign()
	{
		var el;
		var pos;
		
		heroUl.find( 'li' ).each( function()
		{
			el	= $( this );
			pos	= el.position().left;
			
			if ( pos >= 0 && pos < panelWidth )
			{
				el.addClass( 'master' );
			}
			else
			{
				el.removeClass( 'master' );
			}
		});
	}
	
	function handleResize(e)
	{
		if ( hero.length )
		{
			panelsLength	= panels.length;
			
			panelWidth		= $( panels[ 0 ] ).outerWidth();
			
			if ( isNaN( panelWidth ) )
			{
				setTimeout( $( window ).resize, 100 );
				
				return;
			}
			
			heroWidth		= panelsLength * panelWidth;
			
			heroMinX		= hero.outerWidth() - heroWidth;
			
			heroUl.width( heroWidth );
			
			snapHero();
			
			handleMediaChange();
			
			heroLiClassAssign();
		}
	}
	
	function handleMediaChange()
	{
		$( '#bio' ).off( tap );
		
		if ( matchMedia( '(max-width: 480px)' ).matches )
		{
			$( '#bio' ).on( tap, function(e)
			{
				$( this ).toggleClass( 'more' );
			});
		}
	}
	
	function getMarginLeft(el)
	{
		return parseFloat( el.css( 'margin-left' ) );
	}
	
	function getX(e)
	{
		if ( hasTouch )
		{
			return getTouchX( e );
		}
		else
		{
			return e.pageX;
		}
	}
	
	function getTouchX(e)
	{
		e	= e.originalEvent;
		
		if ( !!e.touches )
		{
			if ( e.touches.length )
			{
				return e.touches[ 0 ].pageX;
			}
		}
		
		return e.pageX;
	}
	
	function loadTweets()
	{
		var ul	= $( '#tweets' );
		var data;
		var li;
		var lin;
		var status;
		
		if ( ul.length )
		{
			li	= ul.find( 'li' ).remove();
			
			ul.append( '<li>Loading tweets...</li>' );
			
			$.getJSON( 'http://api.twitter.com/1/statuses/user_timeline.json?screen_name=ahmednuaman&count=5&callback=?', function(d)
			{
				data	= d;
				
				if ( hasTransitions )
				{
					ul.on( eventTransitionEnd, handleFadeOut ).addClass( 'fadeout' );
				}
				else
				{
					ul.fadeOut( 'normal', handleFadeOut );
				}
			});
		}
		
		function handleFadeOut()
		{
			ul.empty();
			
			for ( var i = 0; i < data.length; i++ )
			{
				status	= data[ i ];
				
				lin		= li.clone();
				
				lin.html( formatTweet( status.text ) );
				
				ul.append( lin );
			}
			
			if ( hasTransitions )
			{
				ul.off( eventTransitionEnd, handleFadeOut ).css( 'opacity', 0 ).removeClass( 'fadeout' )
					.on( eventTransitionEnd, handleFadeIn ).addClass( 'fadein' );
			}
			else
			{
				ul.fadeIn( 'normal', handleFadeIn );
			}
		}
		
		function handleFadeIn()
		{
			if ( hasTransitions )
			{
				ul.off( eventTransitionEnd, handleFadeIn ).removeAttr( 'style' ).removeClass( 'fadein' );
			}
		}
	}
	
	function formatTweet(t)
	{
		t	= t.replace( /((https?:\/\/|www\.)[^\s]+)/gim, function(m)
		{
			var l	= ( m.indexOf( 'http' ) === -1 ? 'http://' : '' ) + m;
			
			return '<a href="' + l + '" class="external">' + m + '</a>';
		});
		
		t	= t.replace( /\s?(\@[^\s]+)\s?/gim, function(m)
		{
			m		= m.replace( /\s/gim, '' );
			
			var l	= 'http://twitter.com/' + m;
			
			return ' <a href="' + l + '" class="external">' + m + '</a> ';
		});
		
		t	= t.replace( /\s?(\#[^\s]+)\s?/gim, function(m)
		{
			m		= m.replace( /\s/gim, '' );
			
			var l	= 'http://twitter.com/search?q=' + m;
			
			return ' <a href="' + l + '" class="external">' + m + '</a> ';
		});
		
		return t;
	}
	
	return ready;
};

(function($)
{
	// add easing funcs
	$.extend($.easing,
	{
		def: 'easeOutExpo',
		easeOutExpo: function (x, t, b, c, d) {
			return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
		}
	});
})( jQuery );

// GA
var _gaq=[['_setAccount','UA-352545-12'],['_trackPageview'],['_trackPageLoadTime']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));

// make it safe to use console.log always
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());

/* Modernizr 2.5.3 (Custom Build) | MIT & BSD
 * Build: http://www.modernizr.com/download/#-cssanimations-csstransitions-touch-printshiv-cssclasses-teststyles-testprop-testallprops-prefixes-domprefixes
 */
;window.Modernizr=function(a,b,c){function z(a){j.cssText=a}function A(a,b){return z(m.join(a+";")+(b||""))}function B(a,b){return typeof a===b}function C(a,b){return!!~(""+a).indexOf(b)}function D(a,b){for(var d in a)if(j[a[d]]!==c)return b=="pfx"?a[d]:!0;return!1}function E(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:B(f,"function")?f.bind(d||b):f}return!1}function F(a,b,c){var d=a.charAt(0).toUpperCase()+a.substr(1),e=(a+" "+o.join(d+" ")+d).split(" ");return B(b,"string")||B(b,"undefined")?D(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),E(e,b,c))}var d="2.5.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={},r={},s={},t=[],u=t.slice,v,w=function(a,c,d,e){var f,i,j,k=b.createElement("div"),l=b.body,m=l?l:b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),k.appendChild(j);return f=["&#173;","<style>",a,"</style>"].join(""),k.id=h,(l?k:m).innerHTML+=f,m.appendChild(k),l||(m.style.background="",g.appendChild(m)),i=c(k,a),l?k.parentNode.removeChild(k):m.parentNode.removeChild(m),!!i},x={}.hasOwnProperty,y;!B(x,"undefined")&&!B(x.call,"undefined")?y=function(a,b){return x.call(a,b)}:y=function(a,b){return b in a&&B(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=u.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(u.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(u.call(arguments)))};return e});var G=function(c,d){var f=c.join(""),g=d.length;w(f,function(c,d){var f=b.styleSheets[b.styleSheets.length-1],h=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"",i=c.childNodes,j={};while(g--)j[i[g].id]=i[g];e.touch="ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch||(j.touch&&j.touch.offsetTop)===9},g,d)}([,["@media (",m.join("touch-enabled),("),h,")","{#touch{top:9px;position:absolute}}"].join("")],[,"touch"]);q.touch=function(){return e.touch},q.cssanimations=function(){return F("animationName")},q.csstransitions=function(){return F("transition")};for(var H in q)y(q,H)&&(v=H.toLowerCase(),e[v]=q[H](),t.push((e[v]?"":"no-")+v));return z(""),i=k=null,e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.testProp=function(a){return D([a])},e.testAllProps=F,e.testStyles=w,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+t.join(" "):""),e}(this,this.document),function(a,b){function g(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function h(){var a=k.elements;return typeof a=="string"?a.split(" "):a}function i(a){var b={},c=a.createElement,e=a.createDocumentFragment,f=e();a.createElement=function(a){var e=(b[a]||(b[a]=c(a))).cloneNode();return k.shivMethods&&e.canHaveChildren&&!d.test(a)?f.appendChild(e):e},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+h().join().replace(/\w+/g,function(a){return b[a]=c(a),f.createElement(a),'c("'+a+'")'})+");return n}")(k,f)}function j(a){var b;return a.documentShived?a:(k.shivCSS&&!e&&(b=!!g(a,"article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}audio{display:none}canvas,video{display:inline-block;*display:inline;*zoom:1}[hidden]{display:none}audio[controls]{display:inline-block;*display:inline;*zoom:1}mark{background:#FF0;color:#000}")),f||(b=!i(a)),b&&(a.documentShived=b),a)}function o(a){var b,c=a.getElementsByTagName("*"),d=c.length,e=RegExp("^(?:"+h().join("|")+")$","i"),f=[];while(d--)b=c[d],e.test(b.nodeName)&&f.push(b.applyElement(p(b)));return f}function p(a){var b,c=a.attributes,d=c.length,e=a.ownerDocument.createElement(m+":"+a.nodeName);while(d--)b=c[d],b.specified&&e.setAttribute(b.nodeName,b.nodeValue);return e.style.cssText=a.style.cssText,e}function q(a){var b,c=a.split("{"),d=c.length,e=RegExp("(^|[\\s,>+~])("+h().join("|")+")(?=[[\\s,>+~#.:]|$)","gi"),f="$1"+m+"\\:$2";while(d--)b=c[d]=c[d].split("}"),b[b.length-1]=b[b.length-1].replace(e,f),c[d]=b.join("}");return c.join("{")}function r(a){var b=a.length;while(b--)a[b].removeNode()}function s(a){var b,c,d=a.namespaces,e=a.parentWindow;return!n||a.printShived?a:(typeof d[m]=="undefined"&&d.add(m),e.attachEvent("onbeforeprint",function(){var d,e,f,h=a.styleSheets,i=[],j=h.length,k=Array(j);while(j--)k[j]=h[j];while(f=k.pop())if(!f.disabled&&l.test(f.media)){for(d=f.imports,j=0,e=d.length;j<e;j++)k.push(d[j]);try{i.push(f.cssText)}catch(m){}}i=q(i.reverse().join("")),c=o(a),b=g(a,i)}),e.attachEvent("onafterprint",function(){r(c),b.removeNode(!0)}),a.printShived=!0,a)}var c=a.html5||{},d=/^<|^(?:button|form|map|select|textarea)$/i,e,f;(function(){var a=b.createElement("a");a.innerHTML="<xyz></xyz>",e="hidden"in a,f=a.childNodes.length==1||function(){try{b.createElement("a")}catch(a){return!0}var c=b.createDocumentFragment();return typeof c.cloneNode=="undefined"||typeof c.createDocumentFragment=="undefined"||typeof c.createElement=="undefined"}()})();var k={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:j};a.html5=k,j(b);var l=/^$|\b(?:all|print)\b/,m="html5shiv",n=!f&&function(){var c=b.documentElement;return typeof b.namespaces!="undefined"&&typeof b.parentWindow!="undefined"&&typeof c.applyElement!="undefined"&&typeof c.removeNode!="undefined"&&typeof a.attachEvent!="undefined"}();k.type+=" print",k.shivPrint=s,s(b)}(this,document);

/*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas. Dual MIT/BSD license */
/*! NOTE: If you're already including a window.matchMedia polyfill via Modernizr or otherwise, you don't need this part */
window.matchMedia=window.matchMedia||(function(e,f){var c,a=e.documentElement,b=a.firstElementChild||a.firstChild,d=e.createElement("body"),g=e.createElement("div");g.id="mq-test-1";g.style.cssText="position:absolute;top:-100em";d.style.background="none";d.appendChild(g);return function(h){g.innerHTML='&shy;<style media="'+h+'"> #mq-test-1 { width: 42px; }</style>';a.insertBefore(d,b);c=g.offsetWidth==42;a.removeChild(d);return{matches:c,media:h}}})(document);

/*! Respond.js v1.1.0: min/max-width media query polyfill. (c) Scott Jehl. MIT/GPLv2 Lic. j.mp/respondjs  */
(function(e){e.respond={};respond.update=function(){};respond.mediaQueriesSupported=e.matchMedia&&e.matchMedia("only all").matches;if(respond.mediaQueriesSupported){return}var w=e.document,s=w.documentElement,i=[],k=[],q=[],o={},h=30,f=w.getElementsByTagName("head")[0]||s,g=w.getElementsByTagName("base")[0],b=f.getElementsByTagName("link"),d=[],a=function(){var D=b,y=D.length,B=0,A,z,C,x;for(;B<y;B++){A=D[B],z=A.href,C=A.media,x=A.rel&&A.rel.toLowerCase()==="stylesheet";if(!!z&&x&&!o[z]){if(A.styleSheet&&A.styleSheet.rawCssText){m(A.styleSheet.rawCssText,z,C);o[z]=true}else{if((!/^([a-zA-Z:]*\/\/)/.test(z)&&!g)||z.replace(RegExp.$1,"").split("/")[0]===e.location.host){d.push({href:z,media:C})}}}}u()},u=function(){if(d.length){var x=d.shift();n(x.href,function(y){m(y,x.href,x.media);o[x.href]=true;u()})}},m=function(I,x,z){var G=I.match(/@media[^\{]+\{([^\{\}]*\{[^\}\{]*\})+/gi),J=G&&G.length||0,x=x.substring(0,x.lastIndexOf("/")),y=function(K){return K.replace(/(url\()['"]?([^\/\)'"][^:\)'"]+)['"]?(\))/g,"$1"+x+"$2$3")},A=!J&&z,D=0,C,E,F,B,H;if(x.length){x+="/"}if(A){J=1}for(;D<J;D++){C=0;if(A){E=z;k.push(y(I))}else{E=G[D].match(/@media *([^\{]+)\{([\S\s]+?)$/)&&RegExp.$1;k.push(RegExp.$2&&y(RegExp.$2))}B=E.split(",");H=B.length;for(;C<H;C++){F=B[C];i.push({media:F.split("(")[0].match(/(only\s+)?([a-zA-Z]+)\s?/)&&RegExp.$2||"all",rules:k.length-1,hasquery:F.indexOf("(")>-1,minw:F.match(/\(min\-width:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/)&&parseFloat(RegExp.$1)+(RegExp.$2||""),maxw:F.match(/\(max\-width:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/)&&parseFloat(RegExp.$1)+(RegExp.$2||"")})}}j()},l,r,v=function(){var z,A=w.createElement("div"),x=w.body,y=false;A.style.cssText="position:absolute;font-size:1em;width:1em";if(!x){x=y=w.createElement("body");x.style.background="none"}x.appendChild(A);s.insertBefore(x,s.firstChild);z=A.offsetWidth;if(y){s.removeChild(x)}else{x.removeChild(A)}z=p=parseFloat(z);return z},p,j=function(I){var x="clientWidth",B=s[x],H=w.compatMode==="CSS1Compat"&&B||w.body[x]||B,D={},G=b[b.length-1],z=(new Date()).getTime();if(I&&l&&z-l<h){clearTimeout(r);r=setTimeout(j,h);return}else{l=z}for(var E in i){var K=i[E],C=K.minw,J=K.maxw,A=C===null,L=J===null,y="em";if(!!C){C=parseFloat(C)*(C.indexOf(y)>-1?(p||v()):1)}if(!!J){J=parseFloat(J)*(J.indexOf(y)>-1?(p||v()):1)}if(!K.hasquery||(!A||!L)&&(A||H>=C)&&(L||H<=J)){if(!D[K.media]){D[K.media]=[]}D[K.media].push(k[K.rules])}}for(var E in q){if(q[E]&&q[E].parentNode===f){f.removeChild(q[E])}}for(var E in D){var M=w.createElement("style"),F=D[E].join("\n");M.type="text/css";M.media=E;f.insertBefore(M,G.nextSibling);if(M.styleSheet){M.styleSheet.cssText=F}else{M.appendChild(w.createTextNode(F))}q.push(M)}},n=function(x,z){var y=c();if(!y){return}y.open("GET",x,true);y.onreadystatechange=function(){if(y.readyState!=4||y.status!=200&&y.status!=304){return}z(y.responseText)};if(y.readyState==4){return}y.send(null)},c=(function(){var x=false;try{x=new XMLHttpRequest()}catch(y){x=new ActiveXObject("Microsoft.XMLHTTP")}return function(){return x}})();a();respond.update=a;respond.getMediaStyles='food';function t(){j(true)}if(e.addEventListener){e.addEventListener("resize",t,false)}else{if(e.attachEvent){e.attachEvent("onresize",t)}}})(this);

$( document ).ready( new Suitcase( $( window ) ) );