<?php if (is_single()): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('mb-40') ?>>

        <div class="card tr-radius fix">
            <div class="tr-post-thumbnail">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full', array('class' => 'card-img-top img-fluid hover-zoom', 'alt' => get_the_title())); ?>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <h2 class="">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <div class="mb-2 text-muted small">
                    <span><?php echo esc_html(get_the_date()); ?></span>
                    <span><?php echo esc_html__('by', 'curamedix') ?> <?php the_author_posts_link(); ?></span>
                </div>
                <div class="card-text">
                    <?php
                    the_content();
                    wp_link_pages([
                        'next_or_number' => 'next',
                        'previouspagelink' => esc_html__('« Prev', 'curamedix'),
                        'nextpagelink' => esc_html__('Next »', 'curamedix'),
                    ]);
                    ?>
                </div>
            </div>
        </div>
        <div class="tr-tags mt-30">
            <span> <?php echo esc_html__('Tags:','curamedix') ?> </span><?php curamedix_tags(); ?>
        </div>
    </article>
<?php else: ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('mb-40') ?>>

        <div class="card tr-radius fix">
            <div class="tr-post-thumbnail">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full', array('class' => 'card-img-top img-fluid hover-zoom', 'alt' => get_the_title())); ?>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <h2 class="">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <div class="mb-2 text-muted small">
                    <span><?php echo esc_html(get_the_date()); ?></span>
                    <span><?php echo esc_html__('by', 'curamedix') ?> <?php the_author_posts_link(); ?></span>
                </div>
                <p class="card-text"><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn tr-btn mt-10 mb-10"><?php echo esc_html__('Read More', 'curamedix') ?></a>
            </div>
        </div>

    </article>
<?php endif; ?>