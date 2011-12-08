<? if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( $_SERVER['SCRIPT_FILENAME'] ) == 'searchform.php' ) die ('Please do not load this page directly. Thanks!'); ?>
<div>
	<form method="get" id="searchform" action="<? bloginfo('home'); ?>/"> 
		<div>
			<input type="text" value="<?=( $search_text ? $search_text : 'Search...' );?>" name="s" id="searchinput" /> 
			<input type="submit" id="searchsubmit" value="&raquo;" />
		</div>
	</form>
</div>