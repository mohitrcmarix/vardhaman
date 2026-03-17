<?php get_header(); ?>
<!-- error area start -->
<section class="tr-error-ptb pt-50 pb-50">
    <div class="container">
        <div class="col-12">
            <div class="tr-error-content text-center">
                <h3 class="tr-error-title"><?php echo esc_html__('404', 'curamedix'); ?></h3>
                <h4 class="tr-error-subtitle"><?php echo esc_html__('Page not found', 'curamedix'); ?></h4>
                <p><?php echo esc_html__("Whoops, this is embarrassing. Looks like the page you were looking for wasn't found.", "curamedix"); ?></p>
                <a class="tr-btn mt-20" href="<?php echo esc_url(home_url('/')); ?>">
                    <span><?php echo esc_html__("Back to Home", "curamedix"); ?></span>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- error area end -->

<?php get_footer(); ?>