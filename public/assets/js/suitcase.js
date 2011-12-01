var S	= {
	carouselAnimating											: false,
	carouselIndex												: -1,
	carouselSets												: [ ],
	cssAnimation												: 'webkitAnimationEnd animationend oAnimationEnd',
	cssTransition												: 'webkitTransitionEnd transitionend oTransitionEnd',
	months														: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec' ],
	slowLoad													: 5000,
	
	ready														: function()
	{
		$( 'html' ).removeClass( 'no-js' );
		
		S.findTooltips();
		S.loadPosts();
		S.loadTweets();
		
		S.prepareCarousel();
		
		S.showPage();
	},
	
	findTooltips												: function()
	{
		$( '[title]' ).each( function()
		{
			var a	= $( this );
			var t	= $( '<span class="tooltip">' + $( this ).attr( 'title' ) + '</span>' ).prepend( '<span class="point"></span>' );
			
			t.appendTo( a ).css({
				'margin-left'	: ( a.outerWidth() - t.outerWidth() ) * .5 + 'px'
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
	
	prepareCarousel												: function()
	{
		S.carouselSets	= $( '#holder > ul > li' ).addClass( 'hide' );
		
		$( '#arrowleft, #arrowright' ).click( function(e)
		{
			if ( S.carouselAnimating )
			{
				return;
			}
			
			var c	= S.carouselIndex;
			
			S.carouselIndex	= S.carouselIndex + ( e.currentTarget.id === 'arrowleft' ? -1 : 1 );
			
			if ( S.carouselIndex < 0 )
			{
				S.carouselIndex	= S.carouselSets.length - 1;
			}
			
			if ( S.carouselIndex >= S.carouselSets.length )
			{
				S.carouselIndex	= 0;
			}
			
			S.showCarouselSet( c, e.currentTarget.id === 'arrowleft' );
		}).eq( 1 ).click();
	},
	
	showCarouselSet												: function(ci, l)
	{
		var c	= S.carouselSets.eq( ci );
		
		S.carouselAnimating	= true;
		
		if ( ci > -1 )
		{
			c.bind( S.cssAnimation, function()
			{
				c.unbind( S.cssAnimation ).removeAttr( 'class' ).addClass( 'hide' );
				
				S.showNextCarouselSet();
			}).addClass( 'leave' + ( l ? 'left' : 'right' ) );
		}
		else
		{
			S.showNextCarouselSet();
		}
	},
	
	showNextCarouselSet											: function()
	{
		var n	= S.carouselSets.eq( S.carouselIndex );
		
		n.bind( S.cssAnimation, function()
		{
			n.unbind( S.cssAnimation ).removeAttr( 'class' );
			
			S.carouselAnimating	= false;
		}).removeClass( 'hide' ).addClass( 'enter' /*+ ( !l ? 'left' : 'right' )*/ );
	},
	
	showPage													: function()
	{
		$( '#loader' ).bind( S.cssTransition, function()
		{
			$( this ).remove().unbind( S.cssTransition );
		}).addClass( 'loading' );
		
		$( '#page' ).removeClass( 'loading' );
	}
};

// var _gaq=[['_setAccount','UA-352545-12'],['_trackPageview'],['_trackPageLoadTime']];
// (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
// g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
// s.parentNode.insertBefore(g,s)}(document,'script'));

$( document ).ready( S.ready );