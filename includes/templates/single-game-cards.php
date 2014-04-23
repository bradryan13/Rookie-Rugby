<?php get_header();  ?>

<div class="row page-header" data-stellar-background-ratio="0.6">
	<div class="large-8 columns">
    	<h1>Game Cards</h1>
  	</div>

  	<div class="large-4 columns">
   
	</div>

</div>

<main class="row light-grey-bg">

	<section class="large-9 columns">
	
		<div id="content">

		<?php get_template_part( 'includes/content/content', 'game-card' ); ?>
	
		</div>

	</section> <!-- End #game-card  -->

	<aside class="large-3 columns sidebar light-grey-bg">

		<?php if ( ! dynamic_sidebar( 'game-cards-sidebar' ) ) : ?>
		<?php endif; ?>	

	</aside>

</main>
<?php get_footer(); ?>

