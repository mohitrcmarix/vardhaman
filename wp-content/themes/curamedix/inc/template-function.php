<?php 

// menu 
function curamedix_main_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'container' => '',
        'menu_class' => '',
        'fallback_cb' => 'curamedix_Walker_Nav_Menu::fallback',
        'walker' => new curamedix_Walker_Nav_Menu,
    ));
}
function curamedix_mobile_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'mobile-menu',
        'container' => '',
        'menu_class' => '',
        'fallback_cb' => 'curamedix_Walker_Nav_Menu::fallback',
        'walker' => new curamedix_Walker_Nav_Menu,
    ));
}

// curamedix_kses
function curamedix_kses($custom_html_tags = '')
{
    $allowed_html = [
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'path' => array(
            'd' => true,
            'fill' => true,
            'stroke' => true,
            'stroke-width' => true,
            'stroke-linecap' => true,
            'stroke-linejoin' => true,
            'opacity' => true,
        ),
        'a' => [
            'class' => [],
            'href' => [],
            'title' => [],
            'target' => [],
            'rel' => [],
        ],
        'b' => [],
        'blockquote' => [
            'cite' => [],
        ],
        'cite' => [
            'title' => [],
        ],
        'code' => [],
        'del' => [
            'datetime' => [],
            'title' => [],
        ],
        'dd' => [],
        'div' => [
            'class' => [],
            'title' => [],
            'style' => [],
        ],
        'dl' => [],
        'dt' => [],
        'em' => [],
        'h1' => [],
        'h2' => [],
        'h3' => [],
        'h4' => [],
        'h5' => [],
        'h6' => [],
        'i' => [
            'class' => [],
        ],
        'img' => [
            'alt' => [],
            'class' => [],
            'height' => [],
            'src' => [],
            'width' => [],
        ],
        'li' => array(
            'class' => array(),
        ),
        'ol' => array(
            'class' => array(),
        ),
        'p' => array(
            'class' => array(),
        ),
        'q' => array(
            'cite' => array(),
            'title' => array(),
        ),
        'span' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'iframe' => array(
            'width' => array(),
            'height' => array(),
            'scrolling' => array(),
            'frameborder' => array(),
            'allow' => array(),
            'src' => array(),
        ),
        'strike' => array(),
        'br' => array(),
        'strong' => array(),
    ];

    return wp_kses($custom_html_tags, $allowed_html);
}

// curamedix tags 
function curamedix_tags()
{

    $post_tags = get_the_tags();


    if ($post_tags) {
        foreach ($post_tags as $item) {
            ?>
            <a href="<?php echo esc_url(get_tag_link($item)); ?>"><?php echo esc_html($item->name); ?></a>
            <?php
        }
    } else {
        ?>
        <i><?php echo esc_html__('No tags found', 'curamedix'); ?></i>
        <?php
    }
}

// curamedix pagination 
function curamedix_pagination()
{
    $pages = paginate_links(array(
        'type' => 'array',
        'prev_text' => __('<i class="fa fa-arrow-left"></i>', 'curamedix'),
        'next_text' => __('<i class="fa fa-arrow-right"></i>', 'curamedix'),
    ));
    if ($pages) {
        echo '<ul>';
        foreach ($pages as $page) {
            echo '<li>' . curamedix_kses($page) . '</li>';
        }
        echo '</ul>';
    }
}