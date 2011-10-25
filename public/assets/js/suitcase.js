var S	= {
	resizeFunctions												: [ ],
	resizeFunctionsLength										: 0,
	
	ready														: function()
	{
		$( 'html' ).removeClass( 'no-js' );
		
		S.findTooltips();
		
		S.addResizeFunction( S.resizeLoader );
		
		$( window ).resize( S.handleResize ).resize();
		
		S.hideLoader();
	},
	
	findTooltips												: function()
	{
		$( '.tooltip, a > span' ).each( function()
		{
			var t	= $( this );
			var p	= t.parent();
			
			t.css({
				'margin-left'	: ( p.width() - t.outerWidth() ) / 2 + 'px'
			});
		});
	},
	
	resizeLoader												: function(w, h)
	{
		var c	= $( '#CanvasLoader' );
		
		c.css({
			'left'	: ( w - c.width() ) / 2,
			'top'	: ( h - c.height() ) / 2
		});
	},
	
	hideLoader													: function()
	{
		$( '#loader' ).addClass( 'fadeOut' ).bind( 'webkitTransitionEnd transitionend oTransitionEnd', function()
		{
			$( this ).addClass( 'hide' ).removeClass( 'fadeOut' );
		});
	},
	
	addResizeFunction											: function(f)
	{
		S.resizeFunctionsLength	= S.resizeFunctions.push( f );
	},
	
	handleResize												: function()
	{
		var win	= $( window );
		var h	= win.height();
		var w	= win.width();
		var f;
		var i;
		
		for ( i = 0; i < S.resizeFunctionsLength; i++ )
		{
			f	= S.resizeFunctions[ i ];
			
			f( w, h );
		}
	}
};

var cl = new CanvasLoader( 'loader' );
cl.setDensity( 12 );
cl.setRange( 0.4 );
cl.setSpeed( 1 );
cl.setFPS( 12 );
cl.setColor( '#0084ff' );

var _gaq=[['_setAccount','UA-352545-12'],['_trackPageview'],['_trackPageLoadTime']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));

$( document ).ready( S.ready );