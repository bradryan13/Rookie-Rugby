<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package USA Wheel Chair Rugby
 */

get_header(); ?>

<main class="row">

	<aside class="large-3 medium-3 columns sidebar" data-snap-ignore="true">

		<?php if ( ! dynamic_sidebar( 'teacher-sidebar' ) ) : ?>
		<?php endif; ?>	

	</aside>


	<section class="content-wrapper large-9 medium-9 columns">
		<div id="content">
		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'includes/content/content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>