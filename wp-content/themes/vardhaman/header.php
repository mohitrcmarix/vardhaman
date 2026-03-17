<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="logo">
            <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
        </div>
        <nav class="site-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'nav-links',
                'container' => false,
                'depth' => 1,
                'fallback_cb' => false,
            ));
            ?>
        </nav>
    </header>