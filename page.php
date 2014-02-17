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

<div class="row page-header" data-stellar-background-ratio="0.6">

	<div class="large-8 columns">
		<h1>Teachers</h1>
	</div>

	<div class="large-4 columns">
		
	</div>
</div>

<main class="row">

	<aside class="large-3 medium-3 columns sidebar" data-snap-ignore="true">

		<?php if ( ! dynamic_sidebar( 'teacher-sidebar' ) ) : ?>
		<?php endif; ?>	

	</aside>


	<section class="content-wrapper large-9 medium-9 columns">
		<div id="content">
		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>