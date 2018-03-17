<?php

function va_references_add_meta_box() {
    add_meta_box(
        'reference-details',                        // The HTML id attribute for the metabox section
        __('Reference Details', 'va-references'),   // The title of metabox section
        'va_references_meta_box_callback',          // The metabox callback function
        'va-references',                            // Your custom post type slug
        'normal',                                   // Position can be 'normal', 'side', and 'advanced'
        'default'                                   // Priority can be 'high' or 'low'
    );
}
add_action( 'add_meta_boxes', 'va_references_add_meta_box' );

function va_references_meta_box_callback( $post ) {
    $post_id = get_post_custom( $post->ID );
    $reference_link = isset( $post_id['reference_link'] ) ? esc_url( $post_id['reference_link'][0] ) : "";
    wp_nonce_field( 'reference_details_nonce_action', 'reference_details_nonce' );
    echo '<label>' . __('Reference Link URL', 'va-references') . '</label><br/><input type="text" name="reference_link" id="reference_link" size="100" value="'. esc_url( $reference_link ) .'" /><br/>';
}

function va_references_save_meta_box( $post_id ) {

    // Check if our nonce is set.
    if ( ! isset( $_POST['reference_details_nonce'] ) ) {
        return;
    }

    $nonce = $_POST['reference_details_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'reference_details_nonce_action' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if( isset( $_POST['reference_link'] ) ) {
        update_post_meta( $post_id, 'reference_link', esc_url( $_POST['reference_link'] ) );
    }

}
add_action( 'save_post', 'va_references_save_meta_box' );
