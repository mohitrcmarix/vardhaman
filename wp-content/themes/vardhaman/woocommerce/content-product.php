<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined('ABSPATH') || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if (!is_a($product, WC_Product::class) || !$product->is_visible()) {
	return;
}
?>
<li <?php wc_product_class('', $product); ?>>

	<div class="product__item">
    <div class="product__item__pic">
        <a href="<?php the_permalink(); ?>" class="product-item-link">
            <?php echo $product->get_image(); ?>
        </a>
        <?php if ($product->is_on_sale()) : ?>
            <span class="label">Sale</span>
        <?php endif; ?>
    </div>

    <div class="product__item__text">
        <h6><?php the_title(); ?></h6>

        <?php if ($product->is_type('variable')) : ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-options">Select Options</a>
        <?php else : ?>
            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" 
               class="btn btn-cart ajax_add_to_cart add-cart" 
               data-quantity="1">
                + Add To Cart
            </a>
        <?php endif; ?>

        <div class="rating">
            <?php echo wc_get_rating_html($product->get_average_rating()); ?>
        </div>

        <h5 class="price">
            <?php
            if ($product->is_on_sale()) {
                echo $product->get_price_html();
            } else {
                if ($product->is_type('variable')) {
                    $min_price = $product->get_variation_price('min', true);
                    $max_price = $product->get_variation_price('max', true);
                    echo wc_price($min_price) . ' – ' . wc_price($max_price);
                } else {
                    echo $product->get_price_html();
                }
            }
            ?>
        </h5>
    </div>
</div>

</li>