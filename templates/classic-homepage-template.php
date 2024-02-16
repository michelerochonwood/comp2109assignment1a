<?php

/**
 * Template Name: Classic Homepage
 * Template Post Type: page
 * 
 */
get_header();
if(have_posts()) : while (have_posts()) : the_post();
    the_content();
endwhile; else:
?>
<p>Sorry, no content found.</p>

<?php
endif; 
get_footer();
?>