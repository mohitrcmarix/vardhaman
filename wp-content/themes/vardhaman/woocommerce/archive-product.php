<?php
/**
 * Template for displaying product archives (main shop page).
 *
 * Copy this file to yourtheme/woocommerce/archive-product.php to override.
 *
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
do_action('woocommerce_shop_loop_header');

// Custom filter template (if you have created filter.php in your theme)
?>
<div class="container">

	<div class="filter">
		<?php wc_get_template_part('filter'); ?>
	</div>
	<div class="products">
		<?php

		if (woocommerce_product_loop()):

			woocommerce_product_loop_start();

			while (have_posts()):
				the_post();
				wc_get_template_part('content', 'product');
			endwhile;

			woocommerce_product_loop_end();

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			// do_action('woocommerce_after_shop_loop');
		
			?>
			<div class="pagination">
				<?php
				global $wp_query;
			
				echo paginate_links(array(
					'base'               => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
					'format'             => '?paged=%#%',
					'total' => $wp_query->max_num_pages,
					'mid_size'=>2,
					'current' => max(1, get_query_var('paged')),
					'type' => 'list',
					'prev_text' => __('«'),
					'next_text' => __('»'),
					
				));

				/*
				global $wp_query;
					echo paginate_links(array(
						'base'               => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
						'format'             => '?paged=%#%',
						'total'              => $wp_query->max_num_pages,
						'current'            => max(1, get_query_var('paged')),
						'show_all'           => false,
						'end_size'           => 1,
						'mid_size'           => 2,
						'prev_next'          => true,
						'prev_text'          => __('«'),
						'next_text'          => __('»'),
						'type'               => 'list',
						'add_args'           => array(
							'product_cat' => isset($_GET['product_cat']) ? sanitize_text_field($_GET['product_cat']) : '',
							'min_price'   => isset($_GET['min_price']) ? sanitize_text_field($_GET['min_price']) : '',
							'max_price'   => isset($_GET['max_price']) ? sanitize_text_field($_GET['max_price']) : '',
						),
						'add_fragment'       => '',
						'before_page_number' => '',
						'after_page_number'  => '',
					));*/

				?>
			</div>

			<?php

		else:

			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action('woocommerce_no_products_found');

		endif;
		?>
	</div>
</div>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10
 */
// do_action('woocommerce_after_main_content');


/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// Uncomment if you want sidebar
// do_action('woocommerce_sidebar');

get_footer('shop');
