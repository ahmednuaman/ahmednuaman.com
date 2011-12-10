<?php
get_header();

if ( have_posts() ) 
{
	$post = $posts[0]; // Hack. Set $post so that the_date() works. 
	if ( is_category() )
	{ 
		$t	= 'Archive for the &#x201C;' . single_cat_title( '', false ) . '&#x201D; Category';
	}
	elseif ( is_tag() )
	{ 
		$t	= 'Posts Tagged &#x201C;' . single_tag_title( '', false ) . '&#x201D;';
	}
	elseif ( is_day() )
	{ 
		$t	= 'Archive for ' . the_time('F jS, Y');
	}
	elseif ( is_month() )
	{ 
		$t	= 'Archive for ' . the_time('F, Y');
	}
	elseif ( is_year() )
	{ 
		$t	= 'Archive for ' . the_time('Y');
	}
	elseif ( is_author() )
	{ 
		$t	= 'Author Archive';
	}
	elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) )
	{ 
		$t	= 'Blog Archives';
	}
	
	ahmed_loop( $t );
}
else
{
	ahmed_404(); 
}

get_footer();
?>