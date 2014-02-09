<?php $the_query = new WP_Query( $args ); ?>
 
<?php if( $the_query->have_posts() ): ?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	<div class="post row">

		<div class="article-image large-3 columns">
			<a class="<?php echo $linkClass ?>" href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('small');?></a>
		</div>

		<div class="article-copy large-9 columns">
			<h3><a class="<?php echo $linkClass ?>" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p><?php the_field('short_desc'); ?></p>
		</div>

	</div>

<?php endwhile; ?>
<?php endif; ?>
