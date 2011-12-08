var S	= {
	cssAnimation												: 'webkitAnimationEnd animationend oAnimationEnd',
	cssTransition												: 'webkitTransitionEnd transitionend oTransitionEnd',
	menuY														: 0,
	months														: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec' ],
	narrow														: false,
	slowLoad													: 5000,
	
	ready														: function()
	{
		S.detectBrowser();
		
		S.findTooltips();
		S.loadPosts();
		S.loadTweets();
		S.drawGradients();
		S.addLettering();
		S.sortScrolling();
		S.addMinimalist();
		
		S.menuY	= $( '#menubar' ).offset().top;
		
		$( window ).scroll( S.handleScrolling ).scroll().resize( S.handleResize ).resize();
	},
	
	detectBrowser												: function()
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
			$( 'html' ).addClass( 'ipad' );
		}
		
		$( 'html' ).removeClass( 'no-js' );
	},
	
	findTooltips												: function()
	{
		$( '[title]' ).each( function()
		{
			var a	= $( this );
			var t	= $( '<span class="tooltip">' + $( this ).attr( 'title' ) + '</span>' ).prepend( '<span class="point"></span>' );
			
			t.appendTo( a ).css({
				'margin-left'	: ( a.width() - t.outerWidth() ) * .5 + 'px'
			});
			
			a.removeAttr( 'title' );
		});
	},
	
	loadPosts													: function()
	{
		var ul	= $( '#posts' );
		
		if ( !ul.length )
		{
			return;
		}
		
		var t	= setTimeout( function()
		{
			$( 'li', ul ).append( ' Well, this is magical...' );
		}, S.slowLoad );
		
		var r	= $.getJSON( 'http://ahmednuaman.com/blog/api/get_recent_posts/?callback=?', function(d)
		{
			clearTimeout( t );
			
			ul.bind( S.cssTransition, function(e)
			{
				var l	= d[ 'posts' ].length;
				var i;
				
				ul.unbind( S.cssTransition ).empty();
				
				for ( i = 0; i < l; i++ )
				{
					ul.append( S.formatPost( d.posts[ i ] ) );
				}
				
				S.findTooltips();
				
				ul.removeClass( 'fadeOut' );
			}).addClass( 'fadeOut' );
		});
	},
	
	formatPost													: function(s)
	{
		var d	= new Date( s[ 'date' ] );
		
		return '<li title="Posted at ' + d.getHours() + ':' + d.getMinutes() + ' on ' + d.getDate() + ' ' + S.months[ d.getMonth() ] + '">&rarr; <a href="' + s.url + '">' + s[ 'title_plain' ] + ' ~ ' + S.truncate( s[ 'excerpt' ], 40, ' ...' ) + '</a></li>';
	},
	
	truncate													: function(s, l, a)
	{
		return s.length > l ? s.substr( 0, l ) + a : s;
	},
	
	loadTweets													: function()
	{
		var ul	= $( '#tweets' );
		
		if ( !ul.length )
		{
			return;
		}
		
		var t	= setTimeout( function()
		{
			$( 'li', ul ).append( ' Well, this is magical...' );
		}, S.slowLoad );
		
		var r	= $.getJSON( 'https://api.twitter.com/1/statuses/user_timeline.json?screen_name=ahmednuaman&count=5&callback=?', function(d)
		{
			clearTimeout( t );
			
			ul.bind( S.cssTransition, function()
			{
				var l	= d.length;
				var i;
				
				ul.unbind( S.cssTransition ).empty();
				
				for ( i = 0; i < l; i++ )
				{
					ul.append( S.formatTweet( d[ i ] ) );
				}
				
				S.findTooltips();
				
				ul.removeClass( 'fadeOut' );
			}).addClass( 'fadeOut' );
		});
	},
	
	formatTweet													: function(s)
	{
		var d	= new Date( s.created_at );
		
		return '<li title="Posted at ' + d.getHours() + ':' + d.getMinutes() + ' on ' + d.getDate() + ' ' + S.months[ d.getMonth() ] + '">&rarr; ' + S.prepareLinks( s.text ) + '</li>';
	},
	
	prepareLinks												: function(t, i)
	{
		//t	= t.replace( /&/gim, '&amp;' ).replace( /</gim, '&lt;' ).replace( />/gim, '&gt;' );
		
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
	},
	
	drawGradients												: function()
	{
		if ( !$.support.canvas )
		{
			return;
		}
		
		$( '.thumbnail canvas' ).each( function()
		{
			var c	= $( this ).get( 0 ).getContext( '2d' );
			var p	= $( this ).parent();
			var g;
			
			$( this ).attr({
				height	: p.outerHeight(),
				width	: p.outerWidth()
			});
			
			c.save();
			c.beginPath();
			c.moveTo(0.0, 383.0);
			c.bezierCurveTo(0.0, 337.5, 0.0, 0.0, 0.0, 0.0);
			c.bezierCurveTo(0.0, 0.0, 501.5, 0.0, 620.0, 0.0);
			c.bezierCurveTo(323.5, 54.0, 113.5, 191.5, 0.0, 383.0);
			c.closePath();
			g = c.createLinearGradient(87.6, -73.5, 343.8, 231.8);
			g.addColorStop(0.00, 'rgba(255, 255, 255, .05)');
			g.addColorStop(1.00, 'rgba(255, 255, 255, .15)');
			c.fillStyle = g;
			c.fill();
			c.restore();
		});
	},
	
	addLettering												: function()
	{
		$( 'h1' ).lettering();
	},
	
	handleScrolling												: function()
	{
		var c	= 'fixed';
		var m	= $( '#menubar' );
		var t	= m.hasClass( c );
		var y	= $( window ).scrollTop();
		
		if ( !t && y > S.menuY )
		{
			m.addClass( c );
		}
		
		if ( y <= S.menuY )
		{
			m.removeClass( c );
		}
	},
	
	sortScrolling												: function()
	{
		$( 'a[href^="#"]' ).click( function(e)
		{
			var y	= $( e.currentTarget.hash ).offset().top - $( '#menubar' ).outerHeight();
			
			$( 'html, body' ).animate({
				scrollTop	: y
			}, 2000, 'easeInOutExpo' );
			
			return false;
		});
	},
	
	addMinimalist												: function()
	{
		$( 'h1' ).click( function()
		{
			if ( S.narrow )
			{
				return;
			}
			
			$( 'html' ).addClass( 'minimalist' );
			
			S.reset();
		});
	},
	
	repositionTooltips											: function()
	{
		$( '.tooltip' ).each( function()
		{
			var t	= $( this );
			var p	= t.parent();
			
			t.css({
				'margin-left'	: ( p.width() - t.outerWidth() ) * .5 + 'px'
			});
		});
	},
	
	handleResize												: function()
	{
		var w	= $( window ).width();
		
		S.narrow	= w < 1080; 
		
		if ( S.narrow )
		{
			$( 'html' ).removeClass( 'minimalist' );
			
			S.reset();
		}
	},
	
	reset														: function()
	{
		S.menuY	= $( '#menubar' ).offset().top;
		
		S.repositionTooltips();
	}
};

$.extend($.easing,
{
	def: 'easeOutQuad',
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	}
});

var _gaq=[['_setAccount','UA-352545-12'],['_trackPageview'],['_trackPageLoadTime']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));

$( document ).ready( S.ready );