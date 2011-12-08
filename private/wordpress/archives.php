<? get_header(); ?>
<? get_search_form(); ?>
<h2>Archives by Month</h2>
<ul>
	<? wp_get_archives( 'type=monthly' ); ?>
</ul>
<h2>Archives by Subject</h2>
<ul>
	 <? wp_list_categories(); ?>
</ul>
<? get_footer(); ?>
