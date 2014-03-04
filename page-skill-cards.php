<?php  
/*  
Template Name: Skill Cards  
*/  
?>



<?php get_header(); ?>

<script>

 jQuery(document).ready(function ($) {
    
    var $container = $('#skill-cards')
      
    $container.isotope({
      itemSelector : '.card',
      layoutMode: 'cellsByRow',
      cellsByRow: {
        columnWidth: 275,
        rowHeight: 390
      }
    });

// filter items when filter link is clicked
$('#filters li').click(function(){
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector });
  return false;
});

  });
</script>

<div class="row page-header" data-stellar-background-ratio="0.6">

  <div class="large-8 columns">
    <h1><?php echo get_the_title($ID); ?></h1>
  </div>

  <div class="large-4 columns">
    <div id="filters">
  <label>
    <select id="filter-options">
        <option value=".card">All</option>
        <option value=".Beginner">Beginner</option>
        <option value=".intermediate">Intermediate</option>
        <option value=".Advanced">Advanced</option>
    </select>  
  </label>  
</div>

  </div>
</div>

<div class="container">
<?php 

// args
$args = array(
	'numberposts' => -1,
  'posts_per_page'=> -1,
	'post_type' => 'skill-cards'
);
 
// get results
$the_query = new WP_Query( $args );
 
// The Loop
?>
<?php if( $the_query->have_posts() ): ?>
<div id="options" class="clearfix combo-filters">


  
</div>
<div id="skill-cards" class="row">
<section>
	<ul>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
  
     <?php if(get_field('objective')) {
       $princples = get_field('objective'); $objective = implode (" ", $objective); 
       $diffulties = get_field('difficulty'); $difficulty = implode (" ", $difficulty); 
      } 
    ?>


		<div class="card <?php echo $difficulty; ?> <?php echo $objective; ?> ">
			<div class="image">
				<img src="<?php the_field(card_image) ?>"/>
			</div>
			<div class="description">
      <div class="filter">
				<p> <a class="ajax-modal" data-fancybox-type="ajax" href="<?php echo get_permalink(); ?>"><?php the_field(objective) ?></a></p>
      </div>
			</div>
      <div class="comments">
           <?php  echo $comments; ?>
      </div>
      <div class="title">
        <a class="ajax-modal" data-fancybox-type="ajax"  href="?page_id=1178"><?php the_title(); ?></a>
        <a href="<?php echo get_permalink(); ?>"><p>Submitted by <?php echo get_the_author(); ?></p></a>
      </div>
      <div class="meta">
        <p><?php echo $difficulty; ?></p>
        <div class="ratings"> <?php if(function_exists('the_ratings')) { the_ratings(); } ?> </div>
      </div>
		</div>
		
	<?php endwhile; ?>
	</ul>
</section>
<?php endif; ?>
</div>



<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>


<?php get_footer(); ?>
<script type="text/javascript">

$( function() {     
  $( '#filter-options' ).dropdown();
});
</script>
