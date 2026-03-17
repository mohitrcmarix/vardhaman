<?php
/**
 * Theme activation notice.
 *
 * @package CuraMedix
 */

defined( 'ABSPATH' ) || exit;

/**
 * Documentation URL constant.
 */
if ( ! defined( 'CURAMEDIX_DOC_URL' ) ) {
    define( 'CURAMEDIX_DOC_URL', 'https://muhammadtarekreza.com/documentation/curamedix/' );
}
if ( ! defined( 'CURAMEDIX_VIDEO_URL' ) ) {
    define( 'CURAMEDIX_VIDEO_URL', 'https://youtu.be/PkCvSFw2rHA' );
}

/**
 * Set transient to display activation notice.
 *
 * @return void
 */
function curamedix_activation_notice() {
    set_transient( 'curamedix_activation_notice', true, 30 * MINUTE_IN_SECONDS );
}
add_action( 'after_switch_theme', 'curamedix_activation_notice' );

/**
 * Display activation notice with links to documentation.
 *
 * @return void
 */
function curamedix_display_activation_notice() {
    if ( ! get_transient( 'curamedix_activation_notice' ) ) {
        return;
    }
    $nonce = wp_create_nonce( 'curamedix_dismiss_notice' );
    ?>
    <div class="notice notice-info is-dismissible" id="curamedix-activation-notice" data-nonce="<?php echo esc_attr( $nonce ); ?>">
        <p>
            <strong><?php esc_html_e( 'Thank you for installing CuraMedix!', 'curamedix' ); ?></strong><br>
            <?php esc_html_e( 'Ready to create a stunning website? Check the documentation to get started.', 'curamedix' ); ?>
        </p>
        <p>
            <a href="<?php echo esc_url( CURAMEDIX_DOC_URL ); ?>" class="button button-primary" target="_blank" rel="noopener noreferrer">
                <?php esc_html_e( 'View Documentation', 'curamedix' ); ?>
            </a>
            <a href="<?php echo esc_url( CURAMEDIX_VIDEO_URL ); ?>" class="button" target="_blank" rel="noopener noreferrer">
                <?php esc_html_e( 'Getting Started Video', 'curamedix' ); ?>
            </a>
        </p>
    </div>
    <?php
}
add_action( 'admin_notices', 'curamedix_display_activation_notice' );

/**
 * Handle AJAX request to dismiss notice.
 *
 * @return void
 */
function curamedix_dismiss_notice_ajax() {
    // Verify user has admin access
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( 'Unauthorized' );
    }

    // Verify nonce for security
    check_ajax_referer( 'curamedix_dismiss_notice' );

    // Delete the transient from server
    delete_transient( 'curamedix_activation_notice' );

    // Send success response
    wp_send_json_success( 'Notice dismissed' );
}
add_action( 'wp_ajax_curamedix_dismiss_notice', 'curamedix_dismiss_notice_ajax' );
