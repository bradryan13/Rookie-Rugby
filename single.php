<?php
/**
 * The Template for displaying all single posts.
 *
 * @package USA Wheel Chair Rugby
 */

get_header(); ?>

<main class="row">
	
	<section class="large-9 columns content">
	
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'single' ); ?>
		<?php endwhile; // end of the loop. ?>

	</section>

	<aside class="large-3 columns sidebar">
			
		<?php if ( ! dynamic_sidebar( 'sidebar-right' ) ) : ?>
		<?php endif; ?>
	
	</aside>

</main>

<?php get_footer(); ?>