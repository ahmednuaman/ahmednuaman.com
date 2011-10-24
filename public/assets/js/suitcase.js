var S	= {
	resizeFunctions												: [ ],
	resizeFunctionsLength										: 0,
	
	ready														: function()
	{
		S.addResizeFunction( S.resizeLoader );
		
		$( window ).resize( S.handleResize ).resize();
	},
	
	resizeLoader												: function(w, h)
	{
		var c	= $( '#CanvasLoader' );
		
		c.css({
			'left'	: ( w - c.width() ) / 2,
			'top'	: ( h - c.height() ) / 2
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

$( document ).ready( S.ready );