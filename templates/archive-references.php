<?php

get_header();
if(have_posts()) : while(have_posts()) : the_post();
	va_references_display_reference();
endwhile; endif;
get_footer();
