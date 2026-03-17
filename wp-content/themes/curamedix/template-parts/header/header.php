<?php
$button_switch = get_theme_mod('curamedix_button_switch');
$button_text = get_theme_mod('curamedix_button_text',  esc_html__('CONTACT NOW', 'curamedix'));
$button_url = get_theme_mod('curamedix_button_url');
?>
<!-- Header start here -->
<header>
    <div class="tr-header-area">
        <div class="container tr-header-container">
            <div class="row align-items-center tr-header-row justify-content-between">
                <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                    <div class="tr-header-logo">
                        <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                            <div class="site-logo"><?php the_custom_logo(); ?></div>
                        <?php else : ?>
                            <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ($button_switch): ?>
                    <div class="col-lg-6 d-none d-lg-block">
                    <?php else: ?>
                        <div class="col-lg-9 d-none d-lg-block">
                        <?php endif; ?>
                        <div class="tr-header-menu d-flex justify-content-center">
                            <nav>
                                <?php curamedix_main_menu() ?>
                            </nav>
                        </div>
                        </div>
                        <?php if ($button_switch): ?>
                            <div class="col-lg-3 d-none d-lg-block">
                                <div class="tr-header-btn text-lg-end mt-16 mb-16">
                                    <a href="<?php echo esc_url($button_url); ?>" class="tr-btn"><?php echo esc_html($button_text) ?></a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="tr-nav-toogle col-2 d-flex justify-content-center d-lg-none">
                            <button class="tr-nav-toogle-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#tr-offcanvas" aria-controls="tr-offcanvas" aria-label="<?php echo esc_attr__('Open menu', 'curamedix'); ?>"><i class="fa fa-bars"></i></button>
                        </div>
                    </div>
            </div>
        </div>
</header>
<!-- Header end here -->

<!-- Offcanvas menu start here -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="tr-offcanvas">
    <div class="offcanvas-header tr-offcanvas-menu-header mb-40">
        <div class="tr-offcanvas-logo">
            <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php else : ?>
                <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            <?php endif; ?>
        </div>
        <div class="tr-offcanvas-close">
            <button type="button" class="tr-offcanvas-close-btn" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="offcanvas-body tr-offcanvas-menu-body">
        <nav>
            <?php curamedix_mobile_menu() ?>
        </nav>
    </div>
</div>
<!-- Offcanvas menu end here  -->

<?php
