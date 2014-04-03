<?php 

// get the post content from ACF
$objective = get_field( "objective");
$time = get_field( "time_allocation");
$what_to_coach = get_field( "what_to_coach");
$skill_progressions = get_field( "skill_progressions");
$check_and_correct = get_field( "check_and_correct"); 
?>

<div id="skill-card">

<div class="header row">

		<a class="ajax close" href="game-cards"><i class="fa fa-times-circle-o"></i></a>

		<div class="columns small-8">
			<h1 class="title"><?php echo get_the_title($post_id); ?></h1>
		</div>

		<div class="columns small-4">
		</div>

</div>

<div class="content row">

	<div class="meta">

		<h3>Objective</h3>

		<div class="columns large-12"><p><?php echo $objective; ?></p></div>

	</div>

	<h3>What to Coach</h3>
		<div class="columns large-12">
			<div class="image"><?php the_post_thumbnail('large'); ?> </div>
			<div class="description"><?php echo $what_to_coach; ?> </div>
		</div>
</div>

<div class="sub-content row">

	<h3>Coaching Notes</h3>

	<div class="large-6 columns">
		<h4>Skill Progressions</h4>
		<?php echo $skill_progressions; ?>
	</div>

	<div class="large-6 columns">
		<h4>Check and Correct</h4>
		<?php echo $check_and_correct; ?>
	</div>

</div>


<?php
	// If comments are open or we have at least one comment, load up the comment template
	if ( comments_open() || '0' != get_comments_number() ) :
		comments_template();
	endif;
?>

		<?php edit_post_link( __( 'Edit', 'USAWCR' ), '<span class="edit-link">', '</span>' ); ?>


</div>
