<!-- category product fillter -->
<div class="category-dropdown">
    <form method="get" action="">
        <select name="product_cat" onchange="if(this.value) window.location.href=this.value;">
            <option value="">Select Category</option>
            <?php
            $categories = get_terms(array(
                'taxonomy'   => 'product_cat',
                'hide_empty' => true,
                'parent'     => 0
            ));

            foreach ($categories as $category) {
                $args = ['product_cat' => $category->slug];

                foreach (['min_price', 'max_price'] as $filter) {
                    if (isset($_GET[$filter])) {
                        $args[$filter] = sanitize_text_field($_GET[$filter]);
                    }
                }

                $url  = add_query_arg($args, get_permalink(wc_get_page_id('shop')));

                $selected = (isset($_GET['product_cat']) && $_GET['product_cat'] === $category->slug) ? 'selected' : '';

                echo '<option value="' . esc_url($url) . '" ' . $selected . '>'
                    . esc_html($category->name) . ' (' . $category->count . ')'
                    . '</option>';

                // Subcategories
                $children = get_terms(array(
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => true,
                    'parent'     => $category->term_id
                ));
                    

                foreach ($children as $child) {
                    $args = ['product_cat' => $child->slug];
                    foreach (['min_price', 'max_price'] as $filter) {
                        if (isset($_GET[$filter])) {
                            $args[$filter] = sanitize_text_field($_GET[$filter]);
                        }
                    }

                    $url  = add_query_arg($args, get_permalink(wc_get_page_id('shop')));
                    $selected = (isset($_GET['product_cat']) && $_GET['product_cat'] === $child->slug) ? 'selected' : '';

                    echo '<option value="' . esc_url($url) . '" ' . $selected . '>'
                        . '-- ' . esc_html($child->name) . ' (' . $child->count . ')'
                        . '</option>';
                }
            }
            ?>
        </select>
    </form>
</div>

<div class="brand-dropdown">
    <form action="" method="get">
        <select name="product_brand" onchange="if(this.value) window.location.href=this.value;">
            <option value="">Select Brand</option>
            <?php
            $brands = get_terms(array(
                'taxonomy'   => 'product_brand',
                'hide_empty' => true,
                'parent'     => 0
            ));

            foreach ($brands as $brand) {
                $args = ['product_brand' => $brand->slug];

                foreach (['product_cat', 'min_price', 'max_price'] as $filter) {
                    if (isset($_GET[$filter])) {
                        $args[$filter] = sanitize_text_field($_GET[$filter]);
                    }
                }

                $url = add_query_arg($args, get_permalink(wc_get_page_id('shop')));

                $selected = (isset($_GET['product_brand']) && $_GET['product_brand'] === $brand->slug) ? 'selected' : '';

                echo '<option value="' . esc_url($url) . '" ' . $selected . '>'
                    . esc_html($brand->name) . ' (' . $brand->count . ')'
                    . '</option>';

                $children = get_terms(array(
                    'taxonomy'   => 'product_brand',
                    'hide_empty' => true,
                    'parent'     => $brand->term_id
                ));

                foreach ($children as $child) {
                    $args = ['product_brand' => $child->slug];
                    foreach (['product_cat', 'min_price', 'max_price'] as $filter) {
                        if (isset($_GET[$filter])) {
                            $args[$filter] = sanitize_text_field($_GET[$filter]);
                        }
                    }

                    $url = add_query_arg($args, get_permalink(wc_get_page_id('shop')));
                    $selected = (isset($_GET['product_brand']) && $_GET['product_brand'] === $child->slug) ? 'selected' : '';

                    echo '<option value="' . esc_url($url) . '" ' . $selected . '>'
                        . '-- ' . esc_html($child->name) . ' (' . $child->count . ')'
                        . '</option>';
                }
            }
            ?>
        </select>
    </form>
</div>


<!-- price product fillte  -->
<div class="price-dropdown">
    <form method="get" action="">
        <select name="price_range" onchange="if(this.value) window.location.href=this.value;">  
            <option value="">Select price</option>
            <?php
            
            $ranges = [
                ['min' => 0, 'max' => 20],
                ['min' => 21, 'max' => 40],
                ['min' => 41, 'max' => 60],
                ['min' => 61, 'max' => 80],
                ['min' => 81, 'max' => 100],
                ['min' => 101, 'max' => '']
            ];

            foreach ($ranges as $range) {
                $args = [];

                if ($range['min'] !== '') {
                    $args['min_price'] = $range['min'];
                }
                if ($range['max'] !== '') {
                    $args['max_price'] = $range['max'];
                }

                if (isset($_GET['product_cat'])) {
                    $args['product_cat'] = sanitize_text_field($_GET['product_cat']);
                }

                $url = add_query_arg($args, get_permalink(wc_get_page_id('shop')));

                $selected = '';
                if (
                    (isset($_GET['min_price']) && $_GET['min_price'] == $range['min']) &&
                    (isset($_GET['max_price']) && $_GET['max_price'] == $range['max'])
                ) {
                    $selected = 'selected';
                }
                if ($range['max'] === '' && isset($_GET['min_price']) && $_GET['min_price'] == $range['min']) {
                    $selected = 'selected';
                }

                echo '<option value="' . esc_url($url) . '"' . $selected . '>';
                if ($range['max'] !== '') {
                    echo wc_price($range['min']) . ' - ' .  ($range['max']);
                } else {
                    echo wc_price($range['min']) . '+';
                }
                echo '</option>';
            }
         
            ?>
        </select>
    </form>
</div>

<!-- clear all fillter  -->
<div class="clear">
    <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="clear-btn">
        Clear Filters
    </a>
</div>

