/*
@author:		Ahmed Nuaman (ahmed@firestartermedia.com)
@date:			2009-04-08

Web Site Designed, Programmed and Maintained by FireStarter Media Limited, www.firestartermedia.com, hello@firestartermedia.com.
The design and code are copyright FireStarter Media Limited.
Copyright (c) FireStarter Media Limited. All rights reserved.
*/

var currentRecommendation										= -1;
var recommendationStopped										= false;
var recommendationSpeed											= 10000;
var recommendationTimeout;

function ready()
{
	detectBrowser();
	initLinkTracking();
	initBadCSS();
	
	if ( document.location.href.indexOf( 'blog' ) == -1 )
	{
		initMainfeature();
		initRecommendations();
		//initFeeds();
	}
	else
	{
		initBlogMainfeature();
		initSearchFocus();
	}
	
	detectHash();
}

function detectHash()
{
	var hash = document.location.hash.replace( '#', '' );
	
	if ( hash )
	{
		scrollTo( hash );
	}
}

function detectBrowser()
{
	if ( $.browser.msie )
	{
		if ( $.browser.version == '8.0' )
		{
			$('body').addClass( 'ie8' );
		}
		else if ( $.browser.version == '7.0' )
		{
			$('body').addClass( 'ie7' );
		} 
		else
		{
			$('body').addClass( 'ie6' );
		}
	}

	if ( $.browser.safari )
	{
		if ( navigator.userAgent.indexOf( 'Safari' ) != -1 )
		{
			$('body').addClass( 'safari' );
			
			initSafariSearch();
		}
		else
		{
			$('body').addClass( 'chrome' );
		}
	}

	if ( $.browser.mozilla )
	{
		if ( $.browser.version.substr( 0, 3 ) == '1.9' )
		{
			$('body').addClass( 'ff3' );
		}
		else
		{
			$('body').addClass( 'ff2' );
		}
	}

	if ( navigator.userAgent.indexOf( 'Windows' ) != -1 )
	{
		$('body').addClass( 'windows' );
	}
	else if ( navigator.userAgent.indexOf( 'Mac' ) != -1 )
	{
		$('body').addClass( 'mac' );
	}
}

function initSafariSearch()
{
	if ( $('#searchinput').length > 0)
	{
		var input = document.getElementById( 'searchinput' );
	
		input.setAttribute( 'type', 'search' );
		input.setAttribute( 'results', '5' );
		input.setAttribute( 'placeholder', 'Search...' );
		input.setAttribute( 'autosave', 'com.ahmednuaman' );
		input.setAttribute( 'width', '70%' );
	
		$('#searchimage').hide();
		$('#searchsubmit').hide();
	}
}

function initSearchFocus()
{
	$('#searchinput').focus(function()
	{
		$(this).val( $(this).val() == 'Search...' ? '' : $(this).val() );
	});
	
	$('#searchinput').blur(function()
	{
		$(this).val( $(this).val() == '' ? 'Search...' : $(this).val() );
	});
}

function initLinkTracking()
{
	var links = $('a');
	
	for ( var i = 0; i < links.length; i++ )
	{
		if ( !$(links[i]).attr( 'onclick' ) )
		{
			$(links[i]).click(function()
			{
				visitThisLink( this ); 
			
				return false;
			});
		}
	}
}

function initBadCSS()
{
	$('head').append('<style> .corners, .thumbnails div, .commentlist li, #menu li a, .entry img, .tags li a, .border, .avatar { -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; } </style>');
}

function initMainfeature()
{
	$('#mainfeatureInner').flash(
		{
			src: '/assets/flash/mainfeature.swf',
			width: 1000,
			height: 450,
			flashvars: { 
				xmlURL: '/gzip-service.php?f=assets/xml/work.xml' 
			},
			wmode: 'transparent'
		},
		{ 
			version: 9,
			update: false
		}
	);
}

function initBlogMainfeature()
{
	$('#blogMainfeatureInner').flash(
		{
			src: '/assets/flash/blogmainfeature.swf',
			width: 900,
			height: 200,
			flashvars: { 
				xmlURL: '/gzip-service.php?f=assets/xml/work.xml' 
			},
			wmode: 'transparent'
		},
		{ 
			version: 9,
			update: false
		}
	);
}

function initRecommendations()
{
	$('#recommendations').css( 'display', 'block' );
	
	$('#recommendations').after( '<a href="javascript:;" onclick="showNextRecommendation(); pageTracker._trackPageview( \'recommendationNextArrow\' )" class="right">Next &raquo;</a>' + 
								 '<a href="javascript:;" onclick="showPreviousRecommendation(); pageTracker._trackPageview( \'recommendationPreviousArrow\' )" class="left">&laquo; Previous</a><br /><br />' );
								
	$('#recommendations').mouseover(function()
	{
		recommendationStopped = true;
		
		clearTimeout( recommendationTimeout );
	});
	
	$('#recommendations').mouseout(function()
	{
		recommendationStopped = false;
		
		recommendationTimeout = setTimeout( showNextRecommendation, recommendationSpeed );
	});
	
	showNextRecommendation();
}

function showNextRecommendation()
{
	var recommendations = $('#recommendations > li');
	
	clearTimeout( recommendationTimeout );
	
	if ( currentRecommendation >= recommendations.length - 1 )
	{
		currentRecommendation = 0;
	}
	else
	{
		currentRecommendation++;
	}
	
	recommendations.hide();
	
	recommendations.eq( currentRecommendation ).fadeIn();
	
	if ( !recommendationStopped )
	{
		recommendationTimeout = setTimeout( showNextRecommendation, recommendationSpeed );
	}
}

function showPreviousRecommendation()
{
	var recommendations = $('#recommendations > li');
	
	clearTimeout( recommendationTimeout );
	
	if ( currentRecommendation <= 0)
	{
		currentRecommendation = recommendations.length - 1;
	}
	else
	{
		currentRecommendation--;
	}
	
	recommendations.hide();
	
	recommendations.eq( currentRecommendation ).fadeIn();
	
	if ( !recommendationStopped )
	{
		recommendationTimeout = setTimeout( showNextRecommendation, recommendationSpeed );
	}
}

/*
function initFeeds()
{
	$.get( '/blog-service.php' );
	$.get( '/twitter-service.php' );
}*/

function visitThisLink(t)
{
	var link = ( $(t).length > 0 ? $(t).attr( 'href' ) : t );
	var external = ( link.indexOf( 'http://' + document.domain ) === 0 || link.indexOf( 'http://' ) === -1 ? false : true );
	
	pageTracker._trackPageview( 'visitingLink-' + ( external ? 'External' : 'Internal' ) + '-' + link );
	
	window.open( link, ( external ? '_blank' : '_self' ) );
}

function scrollTo(t)
{
	pageTracker._trackPageview( 'scrollingTo-' + t );
	
	$.scrollTo( $('#' + t), { 
		duration: 1000,
		easing: 'easeOutQuad', 
		offset: { top: ( ( $(window).height() / 2 ) - ( $('#' + t).height() / 2 ) ) * -1 },
		onAfter: function()
			{
				$('#' + t).effect( 'pulsate', { times: 1 }, 1000 );
			} 
		});
}

function scrollBackUp()
{
	pageTracker._trackPageview( 'scrollingTo-top' );
	
	$.scrollTo( $('#header'), { 
		duration: 1000,
		easing: 'easeOutQuad'
		});
}

$(document).ready( ready );