<?php

/**
 * Set SVG variable for inlining
 */
$laptop_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="820" height="462" viewBox="0 0 820 462">
  <g fill="none" fill-rule="evenodd">
    <rect id="lid" width="665" height="440" x="77.5" y="2.5" stroke="#E3E3E3" stroke-width="5" rx="26"/>
    <path id="frame" fill="#404040" d="M80,27.0008234 C80,14.8501041 89.8420343,5 102.006493,5 L717.993507,5 C730.147357,5 740,14.8508545 740,27.0008234 L740,417.999177 C740,430.149896 730.157966,440 717.993507,440 L102.006493,440 C89.8526425,440 80,430.149145 80,417.999177 L80,27.0008234 Z M110,35 L110,410 L710,410 L710,35 L110,35 Z"/>
    <path id="bottom" fill="#E6E5E5" d="M0,432 L820,432 L820,447 C820,455.284271 813.278927,462 805.000944,462 L14.9990557,462 C6.71530596,462 0,455.286093 0,447 L0,432 Z"/>
    <path id="lock" fill="#C9C9C9" d="M353,432 L467,432 L467,438.5 C467,442.089851 464.096284,445 460.50288,445 L359.49712,445 C355.90886,445 353,442.082546 353,438.5 L353,432 Z"/>
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






