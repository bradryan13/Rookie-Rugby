<?php
/**
 * The home template file.
 * @package USA Wheel Chair Rugby
 */

get_header(); ?>

<div id="hero" class="row">
	<?php if ( ! dynamic_sidebar( 'hero' ) ) : ?>
	<?php endif; ?>
</div>

<main>

	<section id="latest-news" class="content-area row">

		<div class="large-9 columns news-area">

			<header class="widget-header row">
					<div class="inner-wrapper">

	  				<div class="medium-10 columns">
			  			<h2 class="widget-title">Latest News</h2> 
					</div>

			  		<div class="medium-2 columns">
					</div>

				</div>
			</header>


			<div class="news row">

				<div class="medium-6 columns featured-post">
					<?php if ( ! dynamic_sidebar( 'main-top-left' ) ) : ?>
					<?php endif; ?>
				</div>

				<div class="medium-6 columns recent-posts">
					<?php if ( ! dynamic_sidebar( 'main-top-right' ) ) : ?>
					<?php endif; ?>
				</div>
				
			</div>

	</section> 

</main>

<?php get_footer(); ?>