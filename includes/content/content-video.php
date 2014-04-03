<?php $video = get_post_meta($post->ID, '__cbc_video_data'); ?>

<div id="video">
<div class="header row">


		<div class="columns small-8">
			<h1 class="title"><?php echo get_the_title($post_id); ?></h1>
		</div>

		<div class="columns small-4">
		</div>

</div>

<?php 

$video_id = $video[0]["video_id"];
$youtube_link = 'https://www.youtube.com/watch?v='.$video_id;

$xmlData = simplexml_load_string(file_get_contents("http://gdata.youtube.com/feeds/api/videos/{$video_id}"));

$youtube_desc = (string)$xmlData->content;

_e(wp_oembed_get($youtube_link)); 

 ?>


<div class="content row">

	<div class="meta">

		<div class="columns large-12"><p><?php echo $youtube_desc; ?></p></div>

	</div>

</div>
</div>

<?php
	// If comments are open or we have at least one comment, load up the comment template
	if ( comments_open() || '0' != get_comments_number() ) :
		comments_template();
	endif;
?>