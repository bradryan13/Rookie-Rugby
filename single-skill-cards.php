<?php get_header();  ?>

<div class="row page-header" data-stellar-background-ratio="0.6">
	<div class="large-8 columns">
    	<h1>Skill Cards</h1>
  	</div>

  	<div class="large-4 columns">
   
	</div>

</div>

<main class="row light-grey-bg">

	<section id="skill-card" class="large-9 columns">
	
		<div id="content">

		<?php get_template_part( 'includes/content/content', 'skill-card' ); ?>
	
		</div>

	</section> <!-- End #skill-card  -->

	<aside class="large-3 columns sidebar light-grey-bg">

		<?php if ( ! dynamic_sidebar( 'skill-cards-sidebar' ) ) : ?>
		<?php endif; ?>	

	</aside>

</main>
<?php get_footer(); ?>

