/*
@author:		Ahmed Nuaman (ahmed@firestartermedia.com)
@date:			2009-05-14

Web Site Designed, Programmed and Maintained by FireStarter Media Limited, www.firestartermedia.com, hello@firestartermedia.com.
The design and code are copyright FireStarter Media Limited.
Copyright (c) FireStarter Media Limited. All rights reserved.
*/

var currentFeature												= -1;
var featureStopped												= false;
var featureSpeed												= 10000;
var featureTimeout;

function ready()
{
	initLinkTracking();
	initBadCSS();
	initMainfeature();
	initMenuCatcher();
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
	$('head').append('<style> #menu li a, #mobileMainfeature > ul > li { -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; } </style>');
}

function initMainfeature()
{
	$('#mobileMainfeature').css( 'display', 'block' );
	
	$('#mobileMainfeature ul').after( '<a href="javascript:;" onclick="showNextFeature(); pageTracker._trackPageview( \'mobileMainfeatureNextArrow\' )" class="right">Next &raquo;</a>' + 
								 '<a href="javascript:;" onclick="showPreviousFeature(); pageTracker._trackPageview( \'mobileMainfeaturePreviousArrow\' )" class="left">&laquo; Previous</a><br /><br />' );
								
	$('#mobileMainfeature').mouseover(function()
	{
		featureStopped = true;
		
		clearTimeout( featureTimeout );
	});
	
	$('#mobileMainfeature').mouseout(function()
	{
		featureStopped = false;
		
		featureTimeout = setTimeout( showNextFeature, featureSpeed );
	});
	
	showNextFeature();
}

function showNextFeature()
{
	var features = $('#mobileMainfeature > ul > li');
	
	clearTimeout( featureTimeout );
	
	if ( currentFeature >= features.length - 1 )
	{
		currentFeature = 0;
	}
	else
	{
		currentFeature++;
	}
	
	features.hide();
	
	features.eq( currentFeature ).fadeIn();
	
	if ( !featureStopped )
	{
		featureTimeout = setTimeout( showNextFeature, featureSpeed );
	}
}

function showPreviousFeature()
{
	var features = $('#mobileMainfeature > ul > li');
	
	clearTimeout( featureTimeout );
	
	if ( currentFeature <= 0)
	{
		currentFeature = features.length - 1;
	}
	else
	{
		currentFeature--;
	}

	features.hide();

	features.eq( currentFeature ).fadeIn();

	if ( !featureStopped )
	{
		featureTimeout = setTimeout( showNextFeature, featureSpeed );
	}
}

function initMenuCatcher()
{
	// $(window).scroll(function(){
	// 		console.log( $('#menu').scrollTop() );
	// 	});
}

function visitThisLink(t)
{
	var link = ( $(t).length > 0 ? $(t).attr( 'href' ) : t );
	var external = ( link.indexOf( 'http://' + document.domain ) === 0 || link.indexOf( 'http://' ) === -1 ? false : true );
	
	pageTracker._trackPageview( 'visitingLink-Mobile-' + ( external ? 'External' : 'Internal' ) + '-' + link );
	
	window.open( link, ( external ? '_blank' : '_self' ) );
}

function scrollTo(t)
{
	pageTracker._trackPageview( 'scrollingTo-Mobile-' + t );
	
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
	pageTracker._trackPageview( 'scrollingTo-Mobile-top' );
	
	$.scrollTo( $('#header'), { 
		duration: 1000,
		easing: 'easeOutQuad'
		});
}

$(document).ready( ready );