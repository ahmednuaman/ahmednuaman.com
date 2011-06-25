/*jslint browser: true, 
         eqeq: true, 
         plusplus: true, 
         regexp: true, 
         white: false */
/*global document, screen, window, $ */

var S	= {
	ease														: 'easeOutQuint',
	herosCarousel												: null,
	ignoreHashchange											: false,
	
	ready														: function()
	{
		S.detectBrowser();
		S.loadTweets();
		S.handleExternalLinks();
		S.addPlaceholder();
		S.startHerosCarousel();
		
		$( window ).hashchange( S.handleHash ).hashchange();
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
		
		$.getJSON( 'http://api.twitter.com/1/statuses/user_timeline.json?screen_name=ahmednuaman&count=7&callback=?', function(d)
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

			return '<a href="' + l + '">' + m + '</a>';
		});

		t	= t.replace( /(\@[A-z0-9_]+)/gim, function(m)
		{
			m		= m.replace( /\s/gim, '' );

			var l	= 'http://twitter.com/' + m.replace( /[^\d|^\w]+/gim, '' );

			return ' <a href="' + l + '">' + m + '</a>';
		});

		t	= t.replace( /\s(\#[A-z0-9_]+)/gim, function(m)
		{
			m		= m.replace( /\s/gim, '' );

			var l	= 'http://twitter.com/search?q=' + m;

			return ' <a href="' + l + '">' + m + '</a>';
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
	
	startHerosCarousel											: function()
	{
		var a	= $( '#carousel_controls a' );
		var t	= $( '#carousel' );
		var u	= $( 'ul', t );
		var m	= $( 'li:visible', u ).length;
		var w	= $( 'li:visible:first', u ).outerWidth();
		var i	= 0;
		var o	= false;
		var r;
		
		if ( !t.is( ':visible' ) )
		{
			return;
		}
		
		//u.width( m * w );
		
		t.unbind( 'mousedown touchstart' ).bind( 'mousedown touchstart', function()
		{
			o	= true;
			
			t.unbind( 'mousemove touchmove' ).bind( 'mousemove touchmove', function(e)
			{
				
			});
		}).unbind( 'mouseup touchend touchcancel' ).bind( 'mouseup touchend touchcancel', function()
		{
			o	= false;
		});
		
		a.unbind( 'mousedown touchstart' ).bind( 'mousedown touchstart', function()
		{
			S.ignoreHashchange	= true;
		});
		
		a.unbind( 'click' ).click( function()
		{
			//o					= true;
			
			i					= $( this ).index();
			
			a.removeClass( 'selected' );
			
			$( this ).addClass( 'selected' );
			
			var x	= m + 1;
			var j	= i + 1;
			var li;
			var l;
			
			while ( --x )
			{
				if ( x > j )
				{
					l	= w;
				}
				else if ( x < j )
				{
					l	= w * -1;
				}
				else
				{
					l	= 0;
				}
				
				li	= $( 'li:visible', u ).eq( x - 1 );
				
				li.css( 'left', l );
				
				if ( l === 0 )
				{
					li.addClass( 'top' );
				}
				else
				{
					li.removeClass( 'top' );
				}
			}
			
			if ( i === 0 )
			{
				$( 'li:visible:last', u ).css( 'left', w * -1 ).removeClass( 'hide' );
			}
			
			if ( i === m - 1 )
			{
				$( 'li:visible:first', u ).css( 'left', w ).removeClass( 'hide' );
			}
			
			/*u.stop( true ).css({
				'margin-left'	: i * w * -1 + 'px'
			}/*, 1000, S.ease, function()
			{
				//o	= false;
			}* /);*/
		}).eq( 0 ).click();
		
		S.herosCarousel	= setInterval( function()
		{
			if ( o )
			{
				return;
			}
			
			if ( i >= m )
			{
				i	= 0;
			}
			
			S.ignoreHashchange	= true;
			
			a.eq( i ).click();
			
			i++;
		}, 6000 );
		
		/*t.unbind( 'mouseenter' ).mouseenter( function()
		{
			o	= true;
			r	= Math.round( ( Number( u.css( 'margin-left' ).replace( 'px', '' ) ) * -1 ) / w );
			
			u.stop( true ).animate({
				'margin-left'	: r * w * -1 + 'px'
			}, 1000, S.ease );
		}).unbind( 'mouseleave' ).mouseleave( function()
		{
			o	= false;
		});*/
	},
	
	stopHerosCarousel											: function()
	{
		clearInterval( S.herosCarousel );
	},
	
	handleHash													: function()
	{
		if ( S.ignoreHashchange )
		{
			S.ignoreHashchange	= false;
			
			return;
		}
		
		var h	= window.location.hash.split( '/' );
		
		switch ( h[ 1 ] )
		{
			case 'carousel':
				$( '#carousel_controls a[href$="' + window.location.hash + '"]' ).click();
			
			break;
			
			default:
				return;
			
			break;
		}
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