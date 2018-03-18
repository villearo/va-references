<?php

/**
 * Set SVG variable for inlining
 */
$laptop_svg = '<svg width="820px" height="434px" viewBox="0 0 820 434" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <radialGradient cx="50%" cy="0%" fx="50%" fy="0%" r="50%" gradientTransform="translate(0.500000,0.000000),scale(0.036585,1.000000),translate(-0.500000,-0.000000)" id="radialGradient-1">
                <stop stop-color="#EFEFEF" offset="0%"></stop>
                <stop stop-color="#E4E4E4" offset="75.6609996%"></stop>
                <stop stop-color="#EFEFEF" offset="100%"></stop>
            </radialGradient>
        </defs>
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="laptop">
                <rect id="bezel" stroke="#E3E3E3" stroke-width="5" x="77.5" y="2.5" width="665" height="409" rx="27"></rect>
                <path d="M80,27.0076984 C80,14.8531822 89.8420343,5 102.006493,5 L717.993507,5 C730.147357,5 740,14.8487474 740,27.0076984 L740,386.992302 C740,399.146818 730.157966,409 717.993507,409 L102.006493,409 C89.8526425,409 80,399.151253 80,386.992302 L80,27.0076984 Z M110,35 L110,379 L710,379 L710,35 L110,35 Z" id="Combined-Shape" fill="#404040"></path>
                <path d="M0,404 L820,404 L820,419 C820,427.284271 813.278927,434 805.000944,434 L14.9990557,434 C6.71530596,434 0,427.286093 0,419 L0,404 Z" id="Rectangle" fill="url(#radialGradient-1)"></path>
                <path d="M353,404 L467,404 L467,410.5 C467,414.089851 464.096284,417 460.50288,417 L359.49712,417 C355.90886,417 353,414.082546 353,410.5 L353,404 Z" id="Rectangle-2" fill="#C9C9C9"></path>
            </g>
        </g>
    </svg>';

/**
 * Output single reference
 */
function va_references_display_reference() {

    $post_id = get_the_ID();
    $reference_link = esc_url( get_post_meta( $post_id, 'reference_link', true ) );
    $image = get_the_post_thumbnail_url( $post_id, 'medium_large' );

    $output = '';
    $output .= '<div class="col reference">';
    
    if ( $image ) {
        global $laptop_svg;
        //$output .= '<a class="laptop" href="' . esc_url( get_permalink() ) . '">';
        $output .= '<a class="laptop" target="_blank" rel="noopener nofollow" href="' . $reference_link . '">';
        $output .= '<div>';
        $output .= $laptop_svg;
        $output .= '<img src="' . $image . '" alt="' . get_the_title() . '" />';
        $output .= '</div>';
        $output .= '</a>';
    }

    //$output .= '<h3><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></h3>';
    $output .= '<h3>' . get_the_title() . '</h3>';
    $output .= '<p>' . get_the_excerpt() . '</p>';

    if ( $reference_link ) {
        $output .= '<a target="_blank" rel="noopener nofollow" href="' . $reference_link . '">' . __( 'Go to website', 'va-references' ) . ' →</a>';
    }

    $output .= '</div>'; // <-- .col.reference
    echo $output;

}






