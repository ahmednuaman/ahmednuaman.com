<?php if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( $_SERVER['SCRIPT_FILENAME'] ) == 'searchform.php' ) die ('Please do not load this page directly. Thanks!'); ?>
<div>
	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"> 
		<div>
			<input type="search" name="s" placeholder="Search el blog!" /> 
		</div>
	</form>
</div>