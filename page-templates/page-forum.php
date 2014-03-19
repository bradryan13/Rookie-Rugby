<?php  
/*  
Template Name: Forums  
*/  
?>



<?php get_header(); ?>

<div class="row page-header" data-stellar-background-ratio="0.6">

	<div class="large-9 columns">
		<h1>Forums</h1>
	</div>

	<div class="large-3 columns">
		
	</div>
</div>

<main class="row">

	<section class="content-wrapper large-9 medium-9 columns">
		<div id="content" class="forums-content">
		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'forums' ); ?>

			<?php endwhile; // end of the loop. ?>
		</div>
	</section>

	<aside class="large-3 medium-3 columns sidebar" data-snap-ignore="true">

		<?php if ( ! dynamic_sidebar( 'forums-sidebar' ) ) : ?>
		<?php endif; ?>	

	</aside>
</main>


<?php get_footer(); ?>
