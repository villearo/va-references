<?php

get_header();


    // define query parameters based on attributes
    $options = array(
        'post_type' => 'va-references',
        'order' => 'desc',
        'orderby' => 'date',
        'posts_per_page' => -1,
        'columns' => 3,
    );
    $query = new WP_Query( $options );




    if ( $query->have_posts() ) : ?>
        <div class="nested grid-<?php echo $columns ?>_md-<?php echo $columns_mobile ?>_sm-1">

            <?php while ( $query->have_posts() ) :
                $query->the_post();

                va_references_display_reference();

            endwhile;

            wp_reset_postdata(); ?>

        </div>
    <?php endif;



get_footer();
