<?php 

//get post ID 
$post_id = $_GET['ID'];
// $link = get_permalink($post_id);

$link = 'http://www.google.com';

// get the post content from ACF
$objective = get_field( "objective", $post_id );
$time = get_field( "time_allocation", $post_id );
$what_to_coach = get_field( "what_to_coach", $post_id );
$skill_progressions = get_field( "skill_progressions", $post_id );
$check_and_correct = get_field( "check_and_correct", $post_id ); 
$key_concepts = get_field( "key_concepts", $post_id ); 
$image = get_field( "image", $post_id ); 
$difficulty = implode(', ', get_field('difficulty', $post_id ));
$card_image = get_field( "card_image", $post_id );

// get checkbox values
?>

<!-- facebook script  -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=221046641356283";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<div id="skill-card">

	<div class="card-header row">
		<h3><img src="<?php echo get_template_directory_uri(); ?>/img/skill-card-header.jpg" width="100%" /> <span><?php echo get_the_title($post_id); ?></span> </h3>
	</div>

	<div class="card-body row">

		<div class="meta">
				<div class="group-items">
					<span class="meta-item"><span class="meta-label">Objective: </span></span> <span class="h-divider">|</span> <span class="meta-item"><span class="meta-label">Suggested Time Allocation: </span><?php echo $time; ?></span>
					<div class="meta-description"><?php echo $objective; ?> </div>
				</div>
		</div>

		<div class="row main-content">

			<div class="large-8 columns copy">
				<div class="group-items">
					<span class="meta-item"><span class="meta-label">What to Coach: </span></span> <span class="h-divider">|</span> <span class="meta-item"><span class="meta-label">Difficulty: </span><?php echo $difficulty; ?></span>
					<div class="meta-description"><?php echo $what_to_coach; ?> </div>
				</div>
			</div>

			<div class="large-4 columns image">
				<img src="<?php echo $image; ?>">
			</div>

		</div>

		<div class="sub-content row">

			<h2>Coaching Notes</h2>

			<div class="large-6 columns">
				<h3>Skill Progressions</h3>
				<?php echo $skill_progressions; ?>
			</div>

			<div class="large-6 columns">
				<h3>Check and Correct</h3>
				<?php echo $check_and_correct; ?>
			</div>

		</div>

	</div><!--  End modal body -->

	<div class="card-footer row">

			<!-- @TODO if user clicks on card again, social media doesn't show up.  -->
			<div class="facebook large-2 columns">
				<div class="fb-like" data-href="<?php echo $link ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
			</div>
			
			<div class="twitter large-2 columns">
				<a href="https://twitter.com/share" class="twitter-share-button" data-via="usayouthrugby" data-related="usayouthrugby" data-hashtags="rookierugby" data-dnt="true">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</div>

			<div class="perma-link large-2 columns">
				<a href="<?php echo $link ?>">Link</a>
			</div>

			<div class="favorite large-2 columns"></div>

			<div class="favorite large-4 columns">
			<a class="btn right" data-dismiss="modal">Close</a>
			</div>
	</div>

</div> <!-- End #skill-card  -->


