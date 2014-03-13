<?php  
/*  
Template Name: Organizations  
*/  

get_header(); ?>

<div class="row page-header organizations" data-stellar-background-ratio="0.6">

	<div class="large-9 columns">
		<h1>Organizations</h1>
	</div>

	<div class="large-3 columns">
		
	</div>
</div>

<main class="row">

	<aside class="large-3 medium-3 columns sidebar" data-snap-ignore="true">

		<?php if ( ! dynamic_sidebar( 'organizations-sidebar' ) ) : ?>
		<?php endif; ?>	

	</aside>


	<section class="content-wrapper large-9 medium-9 columns">
		<div class="page-type" id="content">
		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>