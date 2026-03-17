<footer class="site-footer">
    <div class="footer-columns">
        <div class="footer-about">
            <h4>About Us</h4>
            <p>We provide quality products and services to make your life easier. Trusted by thousands of happy customers.</p>
        </div>

        <div class="footer-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/')); ?>">Shop</a></li>
                <li><a href="<?php echo esc_url(home_url('/cart/')) ?>">Cart</a></li>
                <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
            </ul>
        </div>

        <div class="footer-contact">
            <h4>Contact</h4>
            <p>Email: info@vardhaman.com</p>
            <p>Phone: +91 98765 43210</p>
            <p>Address: Ahmedabad, India</p>
        </div>

        <div class="footer-links">
            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                <?php dynamic_sidebar( 'footer-2' ); ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
