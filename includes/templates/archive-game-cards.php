<?php get_header();

$page_header = 'Game Cards';

include(locate_template('includes/page-header.php')); ?>

<div id="content" class="light-grey-bg">

<?php if ( have_posts() ) : ?>

<div id="game-cards" class="row">

<section>



<?php $difficulty = $_GET["difficulty"]; ?>

<?php  $game_diff = get_terms('game-diff' ); 

?>
<select id="dynamic_select">
  <option value="/games">All</option>
  <?php foreach ($game_diff as $term) : ?> <option <?php if ($term->name == $difficulty ) echo 'selected'; ?> value="/games/?difficulty=<?php echo $term->name ?>"><?php echo $term->name ?></option> <?php endforeach; ?>
</select>

<script>
    $(function(){
      // bind change event to select
      $('#dynamic_select').bind('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>

       <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-2">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php $terms = get_the_terms( $post->ID , 'game-diff' ); ?>

                <?php $posttags = get_the_tags(); ?> 

                <li class="card-wrapper mix <?php foreach ( $terms as $term ) { echo $term->name; } ?>">

                    <div class="card">
                            

                        <div class="meta">
                            <?php foreach ( $terms as $term ) { echo '<a class="ajax" href="?difficulty=' . $term->name . '">' . $term->name . '</a>'  ; } ?>
                        </div>

                        <h2>
                            <a class="ajax" href="<?php echo get_permalink();?>"><?php the_title(); ?></a>
                        </h2>

                        <div class="image">
                            <img src="<?php the_field('image'); ?>">
                        </div>

                        <div class="tags">
                            <ul>
                                <?php if ($posttags) { foreach($posttags as $tag) { echo '<li><a class="ajax" href="?tag=' . $tag->name . ' "> ' . $tag->name . '</a></li>'; } } ?>
                            </ul>
                        </div>

                    </div>
                    
                </li>

    <?php endwhile; ?>
        
        </ul>

    </section>

</div>

<?php paginate(); ?>


<?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>

</div>



<?php get_footer(); ?>

