<?php

/**
 * Main WordPress template file
 * This is the default template that WordPress uses if a more specific template is not found
 */

// Include header template
get_header() ?>

<!-- postbox area start -->
<section class="tr-page-area" id="main-content">
    <div class="container">
        <?php
        // The WordPress Loop - checks if there are posts and loops through them
        if (have_posts()):
            while (have_posts()):
                the_post();
        ?>
                <?php the_content(); ?>
               <?php  // Display comments section if comments are open or exist
						if (comments_open() || get_comments_number()) :
							comments_template();
						endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<!-- postbox area end -->

<?php
// Include footer template
get_footer();
