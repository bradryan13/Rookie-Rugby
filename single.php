<?php get_header(); ?>

        <div class="row page-header" data-stellar-background-ratio="0.6">


            <div class="large-8 columns">
                <h1>Blog</h1>
            </div>

            <div class="large-4 columns">

            </div>

        </div>

<main class="row">

	<section class="content-wrapper large-9 medium-9 columns">
		<div class="page-type" id="content">
		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'includes/content/content', 'blog' ); ?>

			<?php endwhile; // end of the loop. ?>
		</div>
	</section>

	<aside class="large-3 medium-3 columns sidebar" data-snap-ignore="true">

		BLOG SIDEBAR

	</aside>

</main>

<?php get_footer(); ?>