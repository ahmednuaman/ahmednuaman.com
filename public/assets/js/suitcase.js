var S	= {
	cssAnimation												: 'webkitTransitionEnd transitionend oTransitionEnd',
	months														: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec' ],
	
	ready														: function()
	{
		var h	= document.getElementsByTagName( 'html' )[ 0 ].className	= '';
		
		S.findTooltips();
		S.loadPosts();
		S.loadTweets();
	},
	
	findTooltips												: function()
	{
		$( '.tooltip:not(.found)' ).each( function()
		{
			var t	= $( this );
			var p	= t.parent();
			
			t.addClass( 'found' )
			.prepend( '<span class="point"></span>' )
			.css({
				'margin-left'	: ( p.outerWidth() - t.outerWidth() ) * .5 + 'px'
			});
		});
	},
	
	loadPosts													: function()
	{
		$.getJSON( 'http://ahmednuaman.tumblr.com/api/read/json?type=text&filter=text&num=5&callback=?', function(d)
		{
			$( '#posts' ).bind( S.cssAnimation, function()
			{
				var l	= Number( d[ 'posts-total' ] );
				var ul	= $( this );
				var i;
				
				ul.unbind( S.cssAnimation ).empty();
				
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
		
		return '<li>&rarr; <a href="' + s.url + '">' + s[ 'regular-title' ] + ' ~ ' + S.truncate( s[ 'regular-body' ], 40, ' ...' ) + '</a><span class="tooltip">Posted at ' + d.getHours() + ':' + d.getMinutes() + ' on ' + d.getDate() + ' ' + S.months[ d.getMonth() ] + '</span></li>';
	},
	
	truncate													: function(s, l, a)
	{
		return s.length > l ? s.substr( 0, l ) + a : s;
	},
	
	loadTweets													: function()
	{
		$.getJSON( 'https://api.twitter.com/1/statuses/user_timeline.json?screen_name=ahmednuaman&count=5&callback=?', function(d)
		{
			$( '#tweets' ).bind( S.cssAnimation, function()
			{
				var l	= d.length;
				var ul	= $( this );
				var i;
				
				ul.unbind( S.cssAnimation ).empty();
				
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
		
		return '<li>&rarr; ' + S.prepareLinks( s.text ) + '<span class="tooltip">Posted at ' + d.getHours() + ':' + d.getMinutes() + ' on ' + d.getDate() + ' ' + S.months[ d.getMonth() ] + '</span></li>';
	},
	
	prepareLinks												: function(t, i)
	{
		t	= t.replace( /&/gim, '&amp;' ).replace( /</gim, '&lt;' ).replace( />/gim, '&gt;' );
		
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
};

// var _gaq=[['_setAccount','UA-352545-12'],['_trackPageview'],['_trackPageLoadTime']];
// (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
// g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
// s.parentNode.insertBefore(g,s)}(document,'script'));

$( document ).ready( S.ready );