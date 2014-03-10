<?php 

// get the post content from ACF
$objective = get_field( "objective");
$time = get_field( "time_allocation");
$what_to_coach = get_field( "what_to_coach");
$skill_progressions = get_field( "skill_progressions");
$check_and_correct = get_field( "check_and_correct"); 
?>

<div class="header row">
	<h2><?php echo get_the_title($post_id); ?></h2>

	<div class="meta">

		<h3>Objective</h3>

		<div class="columns large-12"><p><?php echo $objective; ?></p></div>

	</div>

</div>

<div class="content row">

	<h3>What to Coach</h3>

	<div class="large-7 columns copy">
			<div class="description"><?php echo $what_to_coach; ?> </div>
	</div>

	<div class="large-5 columns image">
		<?php the_post_thumbnail('card'); ?>
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