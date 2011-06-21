var S	= {
	ready														: function()
	{
		S.loadTweets();
		S.handleExternalLinks();
	},
	
	loadTweets													: function()
	{
		var t	= $( '#tweets' );
		
		$.getJSON( 'http://api.twitter.com/1/statuses/user_timeline.json?screen_name=ahmednuaman&count=5&callback=?', function(d)
		{
			if ( d.length )
			{
				var li	= $( 'li', t ).empty().remove();
				
				$.each( d, function()
				{
					var l	= li.clone();
					var h	= S.prepareLinks( this.text );
					
					l.html( h );
					
					t.append( l );
				});
				
				S.handleExternalLinks();
			}
			else
			{
				$( 'li', t ).text( 'Magical, the tweets didn\'t load. This is Ahmed\'s fault, damn arabs.' );
			}
		});
	},
	
	prepareLinks												: function(t)
	{
		t	= t.replace( /&/gim, '&amp;' ).replace( /</gim, '&lt;' ).replace( />/gim, '&gt;' ).replace( /"/gim, '&quot;' ).replace( /'/gim, '&#039;' ); 
		
		t	= t.replace( /((https?:\/\/|www\.)[^\s]+)/gim, function(m)
		{
			var l	= ( m.indexOf( 'http' ) === -1 ? 'http://' : '' ) + m;

			return '<a href="' + l + '" class="external">' + m + '</a>';
		});

		t	= t.replace( /\s(\@[^\s]+)\s?/gim, function(m)
		{
			m		= m.replace( /\s/gim, '' );

			var l	= 'http://twitter.com/' + m;

			return ' <a href="' + l + '" class="external">' + m + '</a> ';
		});

		t	= t.replace( /\s(\#[^\s]+)\s?/gim, function(m)
		{
			m		= m.replace( /\s/gim, '' );

			var l	= 'http://twitter.com/search?q=' + m;

			return ' <a href="' + l + '" class="external">' + m + '</a> ';
		});

		return t;
	},
	
	handleExternalLinks											: function()
	{
		$( 'a.external:not(.click_linked)' ).addClass( 'click_linked' ).click( function()
		{
			window.open( $( this ).attr( 'href' ) );
			
			return false;
		});
	}
};

$( document ).ready( S.ready );