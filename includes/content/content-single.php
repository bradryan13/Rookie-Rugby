<?php
/**
 * @package USA Wheel Chair Rugby
 */
?>
                  	


<?php 

//if there's a slideshow, load the script.
if (get_field('slideshow')) : ?>

	<script> 
	jQuery(document).ready(function ($) {
		 $(".slideshow").royalSlider({
		    imageScaleMode: "fill",
		    sliderDrag: false,
		    loop: true
		});
	});
	</script>
			  
<?php endif; 


//Extract information from YouTube
$youtube  = get_field('youtube_link');
$video_id = explode("?v=", $youtube);
$video_id = $video_id[1];
//get Video title
$xmlData = simplexml_load_string(file_get_contents("http://gdata.youtube.com/feeds/api/videos/{$video_id}?fields=title"));
$youtube_title = (string)$xmlData->title;
// get YouTube thumbnail
$youtube_thumb = 'http://img.youtube.com/vi/'.$video_id.'/maxresdefault.jpg';


//create the slideshow
$slideshow = get_field('slideshow');


//Set the hero
$designate_hero = get_field('designate_hero');

if($youtube && $designate_hero == 'video') {
    $hero = _e(wp_oembed_get($youtube)); 
} elseif ($slideshow && $designate_hero == 'slideshow' ) { 
	$hero = '<div class="slideshow rsDefault"></div>';
} else {
	$hero = '<div class="picture">'. the_post_thumbnail('main') . '</div>';
}

?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="story-header">
		
			


			<h1 class="title"><?php the_title(); ?></h1>
			<p class="meta">
					<?php 
					$categories = get_the_category($post->ID);
					foreach($categories as $category) :
						$children = get_categories( array ('parent' => $category->term_id ));
						$has_children = count($children);
						if ( $has_children == 0 ) {
					 	$cat = $category->name;
						}
					endforeach;
						$author = get_the_author();
						$author_link = get_the_author_meta('user_url');
						$email = get_the_author_meta('email');
						$image = get_avatar($email, 64);
						$category = get_the_category();
						$date = get_the_date('F j, Y');
						echo '<a href="'.$author_link.'">'.$image . '<span class="author">' . $author .'</span></a> on '. $date;
					?>
			</p>

		</div>

		<div class="story-content">
		<?php if($youtube && $designate_hero != 'video') { ?>
				<div class="youtube article-aside"> 
					<a class="various fancybox fancybox.iframe" href="http://www.youtube.com/embed/L9szn1QQfas?autoplay=1"><img src="<?php echo $youtube_thumb ?>"></a>
				</div>
		<?php }
		the_content(); ?>
		</div>	

		<div class="story-footer">
			<?php edit_post_link( __( 'Edit', 'USAWCR' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

		</article>



