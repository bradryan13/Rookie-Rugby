<?php 

$skill_args = array(
  'posts_per_page'=> 20,
  'post_type' => $postType,
);


$the_query = new WP_Query( $skill_args ); 


?>

<div id="feed-header">
	<a href="#" id="filter">Skill Cards</a>
</div>

<div id="feed">



<ul id="feed-content">

<?php if( $the_query->have_posts() ): ?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	<li class="post">

		<div class="copy">
			<a class="<?php echo $linkClass ?>" href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('small');?> <?php the_title(); ?></a>
		</div>

	</li>
<?php endwhile; ?>
<?php endif; ?>
</ul>
</div>