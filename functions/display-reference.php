<?php

/**
 * Enque styles and scripts in head
 */
function va_references_styles() {
    wp_enqueue_style( 'references-styles', VA_REFERENCES_PLUGIN_URL . 'styles/references-styles.css' );
}
add_action('wp_enqueue_scripts', 'va_references_styles');




function va_references_display_reference() {

    $post_id = get_the_ID();
    $reference_link = esc_url( get_post_meta( $post_id, 'reference_link', true ) );
    $image = get_the_post_thumbnail_url( $post_id, 'medium_large' );

    $output = '';
    $output .= '<div class="col reference">';
    
    if ( $image ) {
        $output .= '<a href="' . esc_url( get_permalink() ) . '">';
        $output .= '<div class="laptop">';
        $output .= '<div class="laptop-screen"><img src="' . $image . '" alt="' . get_the_title() . '" /></div>';
        $output .= '<div class="laptop-body"></div>';
        $output .= '</div>'; // <-- .laptop
        $output .= '</a>';
    }

    $output .= '<h2><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></h2>';

    if ( has_excerpt() ) {
        $output .= '<p>' . get_the_excerpt() . '</p>';
    }

    if ( $reference_link ) {
        $output .= '<a target="_blank" rel="noopener nofollow" href="' . $reference_link . '">' . __( 'Go to website', 'va-references' ) . ' →</a>';
    }

    $output .= '</div>'; // <-- .col.reference
    echo $output;

}
