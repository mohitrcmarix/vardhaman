<?php
// Silence is golden.
get_header();
?>
<section>
	<div class="container mt-30" id="main-content">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<?php
				// The WordPress Loop - checks if there are posts and loops through them
				if (have_posts()):
					while (have_posts()):
						the_post();
						// Load template part based on post format
						get_template_part('template-parts/content', get_post_format());
					endwhile;
				endif; ?>
				<div class="tr-pagination">
					<?php curamedix_pagination(); ?>
				</div>
			</div>
			<?php if (is_active_sidebar('blog-sidebar')): ?>
				<div class="col-lg-4 pl-20">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php
get_footer();
