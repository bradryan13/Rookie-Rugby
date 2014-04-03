<?php 

// get the post content from ACF
$description = get_field("description");
$how_to_play = get_field("how_to_play");
$game_progressions = get_field( "game_progressions");
$key_skills = get_field( "key_skills");
$key_concepts = get_field("key_concepts");
?>

		<?php edit_post_link( __( 'Edit', 'USAWCR' ), '<span class="edit-link">', '</span>' ); ?>

<div id="game-card">

<div class="header row">

		<a class="ajax" href="game-cards">BACK</a>

		<div class="columns small-8">
			<h1 class="title"><?php echo get_the_title($post_id); ?></h1>
		</div>

		<div class="columns small-4">
		</div>

</div>

<div class="content row">

	<div class="meta">
		<h3>Description</h3>
		<div class="columns large-12"><p><?php echo $description; ?></p></div>
	</div>

	<h3>How to Play</h3>
		<div class="columns large-12">
			<div class="image"><?php the_post_thumbnail('large'); ?> </div>
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


<?php
// If comments are open or we have at least one comment, load up the comment template
if ( comments_open() || '0' != get_comments_number() ) :
	comments_template();
endif;
?>
</div>