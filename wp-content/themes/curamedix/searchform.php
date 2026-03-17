<div class="tr-sidebar-widget-content">
    <div class="tr-sidebar-search">
        <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
            <div class="tr-sidebar-search-input row">
                <input class="col-8" type="text" name="s" id="search" value="<?php the_search_query(); ?>"
                    placeholder="<?php echo esc_attr__('Enter your keywords...', 'curamedix'); ?>" />
                <button class="tr-sidebar-search-btn col-4 tr-btn" type="submit">
                    <?php echo esc_html__("Search","curamedix") ?>
                </button>
            </div>
        </form>
    </div>
</div>