var S	= {
	cssAnimation												: 'webkitAnimationEnd animationend oAnimationEnd',
	cssTransition												: 'webkitTransitionEnd transitionend oTransitionEnd',
	menuY														: 0,
	months														: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec' ],
	slowLoad													: 5000,
	
	ready														: function()
	{
		$( 'html' ).removeClass( 'no-js' );
		
		S.findTooltips();
		S.loadPosts();
		S.loadTweets();
		S.drawGradients();
		S.addLettering();
		
		S.menuY	= $( '#menubar' ).offset().top;
		
		$( window ).scroll( S.handleScrolling ).scroll();
	},
	
	findTooltips												: function()
	{
		$( '[title]' ).each( function()
		{
			var a	= $( this ); console.log(a);
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
		var t	= setTimeout( function()
		{
			$( 'li', ul ).append( ' Well, this is magical...' );
		}, S.slowLoad );
		
		var r	= $.getJSON( 'http://ahmednuaman.tumblr.com/api/read/json?type=text&filter=text&num=5&callback=?', function(d)
		{
			clearTimeout( t );
			
			ul.bind( S.cssTransition, function()
			{
				var l	= Number( d[ 'posts-total' ] );
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
		var d	= new Date( s[ 'date-gmt' ] );
		
		return '<li title="Posted at ' + d.getHours() + ':' + d.getMinutes() + ' on ' + d.getDate() + ' ' + S.months[ d.getMonth() ] + '">&rarr; <a href="' + s.url + '">' + s[ 'regular-title' ] + ' ~ ' + S.truncate( s[ 'regular-body' ], 40, ' ...' ) + '</a></li>';
	},
	
	truncate													: function(s, l, a)
	{
		return s.length > l ? s.substr( 0, l ) + a : s;
	},
	
	loadTweets													: function()
	{
		var ul	= $( '#tweets' );
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
	
	handleScrolling												: function(e)
	{
		var c	= 'fixed';
		var m	= $( '#menubar' );
		var t	= m.hasClass( c );
		var y	= e.currentTarget.pageYOffset;
		
		if ( !t && y > S.menuY )
		{
			m.addClass( c );
		}
		
		if ( y <= S.menuY )
		{
			m.removeClass( c );
		}
	}
};

// var _gaq=[['_setAccount','UA-352545-12'],['_trackPageview'],['_trackPageLoadTime']];
// (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
// g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
// s.parentNode.insertBefore(g,s)}(document,'script'));

$( document ).ready( S.ready );