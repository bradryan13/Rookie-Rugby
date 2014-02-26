<?php 

//get post ID 
$post_id = $_GET['ID'];
// $link = get_permalink($post_id);

$link = 'http://www.google.com';

// get the post content from ACF
$equipment = get_field( "equipment", $post_id );
$space = get_field( "space", $post_id );
$time = get_field( "time", $post_id );
$how_to_play = get_field( "how_to_play", $post_id );
$game_progressions = get_field( "game_progressions", $post_id );
$key_skills = get_field( "key_skills", $post_id ); 
$key_concepts = get_field( "key_concepts", $post_id ); 
$image = get_field( "image", $post_id ); 
$difficulty = implode(', ', get_field('difficulty', $post_id )); 
$principles = implode(', ', get_field('principles', $post_id ));
$description = get_field( "description", $post_id ); 
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

<div>

<div class="modal-dialog">
	<div class="modal-content card">
		<div class="modal-header row">
					<h3><?php echo get_the_title($post_id); ?> </h3>
			 <div class="ratings"> <?php if(function_exists('the_ratings')) { the_ratings(); } ?> </div>
			<p class="pull-right"><?php echo get_the_author($post_id); ?></p>
		</div>

<div class="modal-body full-card row">

<div class="meta">
	<div class="meta-item"><span class="meta-label">Difficulty: </span><?php echo $difficulty; ?></div>	
	<div class="meta-item"><span class="meta-label">Suggested Time Allocation: </span><?php echo $time; ?></div>
	<div class="meta-item"><span class="meta-label">Equipment and Space Needed: </span><?php $none = ''; if($equipment = 'none'){echo $none; echo $space;} else { echo $equipment.' '; echo $space; } ?></div>
	<div class="meta-item"><span class="meta-label">Principles of Play: </span><?php echo $principles; ?></div>
</div>

<div class="row main-content">

	<div class="large-8 columns copy">
		<h3>How to play</h3>
		<?php echo $how_to_play; ?>
	</div>

	<div class="large-4 columns image">
		<img src="<?php echo $image; ?>">
	</div>

</div>

<div class="sub-content row">

	<div class="large-4 columns">
		<h3>Game Progressions</h3>
		<?php echo $game_progressions; ?>
	</div>

	<div class="large-4 columns">
		
		<h3>Key Skills</h3>
		<?php echo $key_skills; ?>

	</div>


	<div class="large-4 columns">
		<h3>Key Concepts</h3>
		<?php echo $key_concepts; ?>
	</div>

</div>

	<div class="modal-footer row">

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

			<div class="favorite large-2 columns">
			</div>

			<div class="favorite large-4 columns">
			<a class="btn right" data-dismiss="modal">Close</a>
			</div>


	</div>

</div>


