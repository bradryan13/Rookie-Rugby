<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

// get the post content from ACF
$description = get_field("description");
$how_to_play = get_field("how_to_play");
$game_progressions = get_field( "game_progressions");
$key_skills = get_field( "key_skills");
$key_concepts = get_field("key_concepts");

//get WP values 

$author = get_the_author();
$image = get_avatar($email, 64); 
$terms = get_the_terms( $post->ID , 'game-diff' ); 
$posttags = get_the_tags(); 


?>


<div id="game-card">

<div class="header row">

		<a class="ajax close"> <i class="fa fa-times-circle-o"></i></a>

			<h1 class="title inc-meta"><?php echo get_the_title($post_id); ?></h1>

	<div class="row meta">
		<div class="columns medium-5 author">Submitted by:  <a href="<?php echo $author_link ?>">  <?php echo $image . $author ?></a></div>
		<div class="columns medium-3 category">Difficulty: <?php foreach ( $terms as $term ) { echo $term->name; } ?></div>
		<div class="columns medium-4 tags"><ul><?php if ($posttags) { foreach($posttags as $tag) { echo '<li>' . $tag->name . '</li>'; } } ?></ul></div>
	</div>


</div>

<div class="content row">

	<div class="description">
		<h3>Description</h3>
		<div class="columns large-12"><p><?php echo $description; ?></p></div>
	</div>

	<h3>How to Play</h3>
		<div class="columns large-12">
	<div class="image"><img src="<?php the_field('image'); ?>"></div>
			<div class="description"><?php echo $how_to_play; ?> </div>
		</div>
</div>

<div class="sub-content row">

	<h3>Coaching Notes</h3>

	<div class="large-4 columns">
		<h4>Game Progressions</h4>
		<?php echo $game_progressions; ?>
	</div>

	<div class="large-4 columns">
		<h4>Key Skills</h4>
		<?php echo $key_skills; ?>
	</div>

	<div class="large-4 columns">
		<h4>Key Concepts</h4>
		<?php echo $key_concepts; ?>
	</div>

</div>

<div class="row" id="comments">

<?php
// If comments are open or we have at least one comment, load up the comment template
if ( comments_open() || '0' != get_comments_number() ) :
	comments_template();
endif;
?>

</div>

		<?php edit_post_link( __( 'Edit', 'USAWCR' ), '<span class="edit-link">', '</span>' ); ?>

</div>

<?php endwhile; else: ?>

	<p>Sorry, this post does not exist</p>

<?php endif; ?>