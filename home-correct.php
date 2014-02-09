<?php
/**
 * The home template file.
 * @package USA Wheel Chair Rugby
 */

get_header(); ?>

	<div id="primary" class="content-area row">

  		<main class="large-9 columns">
  			<div class="news row">
				
				<div class="medium-6 columns">	
					<?php if ( ! dynamic_sidebar( 'main-top-left' ) ) : ?>
					<?php endif; ?>
				</div>


				<div class="medium-6 columns">	
					<?php if ( ! dynamic_sidebar( 'main-top-right' ) ) : ?>
					<?php endif; ?>
				</div>
  			
  			</div>
  		</main>

  		<aside class="large-3 columns">

				<div class="medium-6 columns">	
					<?php if ( ! dynamic_sidebar( 'sidebar-right' ) ) : ?>
					<?php endif; ?>
				</div>		

  		</aside>

	</div><!-- #primary -->

<?php get_footer(); ?>