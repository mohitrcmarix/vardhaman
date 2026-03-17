<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}?>
<!-- Skip link -->
<a class="skip-link" href="#main-content"><?php echo esc_html__( 'Skip to content', 'curamedix' ); ?></a>

<?php get_template_part('template-parts/header/header'); ?>