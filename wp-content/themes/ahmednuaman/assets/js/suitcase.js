$	= jQuery;

var Suitcase	= function(window)
{
	function ready()
	{
		detectBrowser();
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
	}
	
	return ready;
};

// GA
var _gaq=[['_setAccount','UA-352545-12'],['_trackPageview'],['_trackPageLoadTime']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));

// make it safe to use console.log always
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());

/* Modernizr 2.5.3 (Custom Build) | MIT & BSD
 * Build: http://www.modernizr.com/download/#-cssanimations-csstransitions-printshiv-cssclasses-teststyles-testprop-testallprops-domprefixes
 */
;window.Modernizr=function(a,b,c){function y(a){j.cssText=a}function z(a,b){return y(prefixes.join(a+";")+(b||""))}function A(a,b){return typeof a===b}function B(a,b){return!!~(""+a).indexOf(b)}function C(a,b){for(var d in a)if(j[a[d]]!==c)return b=="pfx"?a[d]:!0;return!1}function D(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:A(f,"function")?f.bind(d||b):f}return!1}function E(a,b,c){var d=a.charAt(0).toUpperCase()+a.substr(1),e=(a+" "+n.join(d+" ")+d).split(" ");return A(b,"string")||A(b,"undefined")?C(e,b):(e=(a+" "+o.join(d+" ")+d).split(" "),D(e,b,c))}var d="2.5.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m="Webkit Moz O ms",n=m.split(" "),o=m.toLowerCase().split(" "),p={},q={},r={},s=[],t=s.slice,u,v=function(a,c,d,e){var f,i,j,k=b.createElement("div"),l=b.body,m=l?l:b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),k.appendChild(j);return f=["&#173;","<style>",a,"</style>"].join(""),k.id=h,(l?k:m).innerHTML+=f,m.appendChild(k),l||(m.style.background="",g.appendChild(m)),i=c(k,a),l?k.parentNode.removeChild(k):m.parentNode.removeChild(m),!!i},w={}.hasOwnProperty,x;!A(w,"undefined")&&!A(w.call,"undefined")?x=function(a,b){return w.call(a,b)}:x=function(a,b){return b in a&&A(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=t.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(t.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(t.call(arguments)))};return e}),p.cssanimations=function(){return E("animationName")},p.csstransitions=function(){return E("transition")};for(var F in p)x(p,F)&&(u=F.toLowerCase(),e[u]=p[F](),s.push((e[u]?"":"no-")+u));return y(""),i=k=null,e._version=d,e._domPrefixes=o,e._cssomPrefixes=n,e.testProp=function(a){return C([a])},e.testAllProps=E,e.testStyles=v,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+s.join(" "):""),e}(this,this.document),function(a,b){function g(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function h(){var a=k.elements;return typeof a=="string"?a.split(" "):a}function i(a){var b={},c=a.createElement,e=a.createDocumentFragment,f=e();a.createElement=function(a){var e=(b[a]||(b[a]=c(a))).cloneNode();return k.shivMethods&&e.canHaveChildren&&!d.test(a)?f.appendChild(e):e},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+h().join().replace(/\w+/g,function(a){return b[a]=c(a),f.createElement(a),'c("'+a+'")'})+");return n}")(k,f)}function j(a){var b;return a.documentShived?a:(k.shivCSS&&!e&&(b=!!g(a,"article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}audio{display:none}canvas,video{display:inline-block;*display:inline;*zoom:1}[hidden]{display:none}audio[controls]{display:inline-block;*display:inline;*zoom:1}mark{background:#FF0;color:#000}")),f||(b=!i(a)),b&&(a.documentShived=b),a)}function o(a){var b,c=a.getElementsByTagName("*"),d=c.length,e=RegExp("^(?:"+h().join("|")+")$","i"),f=[];while(d--)b=c[d],e.test(b.nodeName)&&f.push(b.applyElement(p(b)));return f}function p(a){var b,c=a.attributes,d=c.length,e=a.ownerDocument.createElement(m+":"+a.nodeName);while(d--)b=c[d],b.specified&&e.setAttribute(b.nodeName,b.nodeValue);return e.style.cssText=a.style.cssText,e}function q(a){var b,c=a.split("{"),d=c.length,e=RegExp("(^|[\\s,>+~])("+h().join("|")+")(?=[[\\s,>+~#.:]|$)","gi"),f="$1"+m+"\\:$2";while(d--)b=c[d]=c[d].split("}"),b[b.length-1]=b[b.length-1].replace(e,f),c[d]=b.join("}");return c.join("{")}function r(a){var b=a.length;while(b--)a[b].removeNode()}function s(a){var b,c,d=a.namespaces,e=a.parentWindow;return!n||a.printShived?a:(typeof d[m]=="undefined"&&d.add(m),e.attachEvent("onbeforeprint",function(){var d,e,f,h=a.styleSheets,i=[],j=h.length,k=Array(j);while(j--)k[j]=h[j];while(f=k.pop())if(!f.disabled&&l.test(f.media)){for(d=f.imports,j=0,e=d.length;j<e;j++)k.push(d[j]);try{i.push(f.cssText)}catch(m){}}i=q(i.reverse().join("")),c=o(a),b=g(a,i)}),e.attachEvent("onafterprint",function(){r(c),b.removeNode(!0)}),a.printShived=!0,a)}var c=a.html5||{},d=/^<|^(?:button|form|map|select|textarea)$/i,e,f;(function(){var a=b.createElement("a");a.innerHTML="<xyz></xyz>",e="hidden"in a,f=a.childNodes.length==1||function(){try{b.createElement("a")}catch(a){return!0}var c=b.createDocumentFragment();return typeof c.cloneNode=="undefined"||typeof c.createDocumentFragment=="undefined"||typeof c.createElement=="undefined"}()})();var k={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:j};a.html5=k,j(b);var l=/^$|\b(?:all|print)\b/,m="html5shiv",n=!f&&function(){var c=b.documentElement;return typeof b.namespaces!="undefined"&&typeof b.parentWindow!="undefined"&&typeof c.applyElement!="undefined"&&typeof c.removeNode!="undefined"&&typeof a.attachEvent!="undefined"}();k.type+=" print",k.shivPrint=s,s(b)}(this,document);

$( document ).ready( new Suitcase( window ) );