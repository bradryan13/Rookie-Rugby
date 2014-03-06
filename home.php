<?php
/**
 * The home template file.
 * @package USA Wheel Chair Rugby
 */

get_header(); ?>

<script src="http://vjs.zencdn.net/4.4/video.js"></script>

<div id="hero" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="0">
	<?php if ( ! dynamic_sidebar( 'hero' ) ) : ?>
	<?php endif; ?>
	<div id="hero-video" class="video">
		<video id="hero-vid" class="video-js vjs-default-skin" controls="controls"
		 preload="auto" width="1200" height="500" poster="my_video_poster.png"
		 data-setup="{}">
         <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/webm">
		</video>
		<div id="vid-close"><a data="close" href="#">CLOSE THE VIDEO</a></div>
	</div>
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

 jQuery(document).ready(function ($) {
    
    var $container = $('#latest .posts')
      
    $container.isotope({
    	itemSelector : '.post',
    	masonry: {
    		columnWidth: 333.3333
  		}
    });

// filter items when filter link is clicked
$('#filters li').click(function(){
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector });
  return false;
});
});


videojs("hero-vid").ready(function(){
  var myPlayer = this;

  $( "a[data='video']" ).click(function(){
  myPlayer.play();
  });

});

</script>



<?php get_footer(); ?>