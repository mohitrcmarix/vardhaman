<!-- footer area start -->
<footer class="tr-footer-ptb p-relative bg-navy-blue white">
    <div class="container">

        <?php if (is_active_sidebar('footer-widget-1') || is_active_sidebar('footer-widget-2') || is_active_sidebar('footer-widget-3') || is_active_sidebar('footer-widget-4')) : ?>

            <div class="tr-footer-widget-border pt-90">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <?php dynamic_sidebar('footer-widget-1') ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <?php dynamic_sidebar('footer-widget-2') ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <?php dynamic_sidebar('footer-widget-3') ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <?php dynamic_sidebar('footer-widget-4') ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</footer>
<!-- footer area end -->