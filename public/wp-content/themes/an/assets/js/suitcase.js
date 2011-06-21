/*jslint browser: true, 
         eqeq: true, 
         plusplus: true, 
         regexp: true, 
         white: false */
/*global document, screen, window, $ */

var S	= {
	ready														: function()
	{
		S.detectBrowser();
		S.loadTweets();
		S.handleExternalLinks();
		S.addPlaceholder();
	},
	
	addPlaceholder												: function()
	{
		if ( !Modernizr.input.placeholder )
		{
			$( '[placeholder]' ).focus( function()
			{
				var i	= $( this );
				
				if ( i.val() == i.attr( 'placeholder' ) )
				{
					i.val( '' );
				}
			}).blur( function()
			{
				var i	= $( this );
				
				if ( i.val() == '' )
				{
					i.val( i.attr( 'placeholder' ) );
				}
			}).blur();
		}
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
		$( 'a:not(.external):not(.internal)' ).each( function()
		{
			var h	= $( this ).attr( 'href' );
			
			if ( h.search( /https?\:\/\//i ) === 0 && h.indexOf( document.domain ) === -1 )
			{
				$( this ).addClass( 'external' ).click( function()
				{
					window.open( h );
					
					return false;
				});
			}
			else
			{
				$( this ).addClass( 'internal' );
			}
		});
	},
	
	detectBrowser												: function()
	{
		if ( $.browser.msie )
		{
			$( 'html' ).addClass( 'ie' );
			
			if ( $.browser.version == '9.0' )
			{
				$( 'html' ).addClass( 'ie9' );
			}
			else if ( $.browser.version == '8.0' )
			{
				$( 'html' ).addClass( 'ie8' );
			}
			else if ( $.browser.version == '7.0' )
			{
				$( 'html' ).addClass( 'ie7' );
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

			if ( $.browser.version.substr( 0, 3 ) == '1.9' )
			{
				$( 'html' ).addClass( 'ff3' );
			}
			else if ( $.browser.version.substr( 0, 3 ) == '2.0' )
			{
				$( 'html' ).addClass( 'ff4' );
			}
			else
			{
				$( 'html' ).addClass( 'ff2' );
			}
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
	}
};

$( document ).ready( S.ready );