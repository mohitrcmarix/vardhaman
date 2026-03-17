<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">
    <h2 class="entry-title">
      <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
    </h2>
    <!-- <div class="entry-meta">
      <span class="posted-on"><?php echo get_the_date(); ?></span>
      <span class="author"><?php the_author_posts_link(); ?></span>
    </div> -->
  </header>

  <?php if ( has_post_thumbnail() ) : ?>
    <div class="post-thumbnail">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'medium' ); ?>
      </a>
    </div>
  <?php endif; ?>

  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>

</article>
