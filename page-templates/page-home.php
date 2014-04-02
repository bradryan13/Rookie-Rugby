<?php  
/*  
Template Name: Home
*/  

get_header(); ?>


<div id="hero">
	<?php if ( ! dynamic_sidebar( 'hero' ) ) : ?>
	<?php endif; ?>
</div>

<div class="row" id="roles">
	<?php if ( ! dynamic_sidebar( 'top-a' ) ) : ?>
	<?php endif; ?>
</div>

<main>

	<section id="latest">

		<div class="row">
			
			<div class="title large-8 columns">
			   <h1>Latest from the </br>Rookie Rugby Community...</h1>
			</div>
			
			<div class="large-4 columns"></div>

		</div>

		<div class="posts">

		<div class="grid-sizer"></div>

			<?php $args = array( 'post_type' => 'latest', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<div class="post">
				<?php the_post_thumbnail('latest'); ?> 
				<p><?php the_content();?></p>
				<div class="author row">
					<div class="author-image">
						<?php echo get_avatar( get_the_author_meta('ID'), 50 ); ?>
					</div>
					<div class="author-info">
						<a class="name"><?php the_author_meta('display_name'); ?></a>
						<div class="meta"> <?php the_time(); ?> • <?php the_time('F j, Y'); ?> </div>
					</div>
				</div>
			</div>
		
			<?php endwhile; ?>
			
		</div>


	</section> 


</main>

<script>

$( document ).ready(function() {

var $container = $('#latest .posts').isotope({
    itemSelector: '.post',
    masonry: {
    columnWidth: '.grid-sizer'
    }
});

});

</script>


<?php get_footer(); ?>