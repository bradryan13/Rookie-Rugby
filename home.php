<?php
/**
 * The home template file.
 * @package USA Wheel Chair Rugby
 */

get_header(); ?>

<div id="hero" data-stellar-background-ratio="0.6">
	<?php if ( ! dynamic_sidebar( 'hero' ) ) : ?>
	<?php endif; ?>
</div>

<div class="row" id="roles">
	<?php if ( ! dynamic_sidebar( 'top-a' ) ) : ?>
	<?php endif; ?>
</div>

<main>

	<section id="about" class="content-area row">
		
		<h1>Get started with <span>rugby.</span></h1>

		<div class="large-4 columns">
			<div class="image"><img src="wp-content/themes/rookie/img/box.jpg"></div>
		</div>
		
		<div class="large-4 columns">
			<ul>

				<li class="row"> 
					<div class="small-3 columns">
						<i class="fa fa-dribbble fa-2x"></i>
						</div>
					<div class="small-9 columns">
						<h3>Play with Flags</h3>
						<p>Bring Rookie Rugby to your local orgnization. Bring Rookie Rugby to your local orgnization.</p>
					</div>
				</li>

				<li class="row"> 
					<div class="small-3 columns"><i class="fa fa-dribbble fa-2x"></i></div>
					<div class="small-9 columns">
						<h3>Play with Flags</h3>
						<p>Bring Rookie Rugby to your local orgnization. Bring Rookie Rugby to your local orgnization.</p>
					</div>
				</li>

				<li class="row"> 
					<div class="small-3 columns"><i class="fa fa-dribbble fa-2x"></i></div>
					<div class="small-9 columns">
						<h3>Play with Flags</h3>
						<p>Bring Rookie Rugby to your local orgnization. Bring Rookie Rugby to your local orgnization.</p>
					</div>
				</li>
				
			</ul>
		</div>

		<div class="large-4 columns">
			<ul data-clearing>

				<li class="row"> 
					<div class="small-3 columns"><i class="fa fa-dribbble fa-2x"></i></div>
					<div class="small-9 columns">
						<h3>Play with Flags</h3>
						<p>Bring Rookie Rugby to your local orgnization. Bring Rookie Rugby to your local orgnization.</p>
					</div>
				</li>

				<li class="row"> 
					<div class="small-3 columns"><i class="fa fa-dribbble fa-2x"></i></div>
					<div class="small-9 columns">
						<h3>Play with Flags</h3>
						<p>Bring Rookie Rugby to your local orgnization. Bring Rookie Rugby to your local orgnization.</p>
					</div>
				</li>

				<li class="row"> 
					<div class="small-3 columns"><i class="fa fa-dribbble fa-2x"></i></div>
					<div class="small-9 columns">
						<h3>Play with Flags</h3>
						<p>Bring Rookie Rugby to your local orgnization. Bring Rookie Rugby to your local orgnization.</p>
					</div>
				</li>

			</ul>
		</div>


	</section> 

	<section id="feature" data-stellar-background-ratio="0.7"> 
		<h1>Rugby for all.</h1>
	</section>

</main>

<?php get_footer(); ?>