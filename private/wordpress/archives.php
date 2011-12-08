<?php get_header(); ?>
<?php get_search_form(); ?>
<h3>Archives by Month</h3>
<ul>
	<?php wp_get_archives( 'type=monthly' ); ?>
</ul>
<h3>Archives by Subject</h3>
<ul>
	 <?php wp_list_categories(); ?>
</ul>
<?php get_footer(); ?>
