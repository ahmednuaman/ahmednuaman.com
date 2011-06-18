var scripts	= [
	'jquery-core',
	'jquery-ui',
	'modernizr',
	'suitcase'
];

scripts.forEach( function(s)
{
	document.write( '<scr' + 'ipt src="assets/js/' + s + '.js"></scr' + 'ipt>' );
});