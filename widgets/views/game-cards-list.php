<?php 

$game_args = array(
  'posts_per_page'=> 6,
  'post_type' => $postType,
);


$the_query = new WP_Query( $game_args ); 


?>

<div id="feed">

       <ul>

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 

        <?php $terms = get_the_terms( $post->ID , 'game-diff' ); ?>

            <li class="card-wrapper <?php echo $difficulty; ?>">

                <div class="card">
                        

                    <div class="meta">
                        <?php foreach ( $terms as $term ) { echo $term->name; } ?>
                    </div>

                    <h2>
                        <a class="ajax" href="<?php echo get_permalink();?>"><?php the_title(); ?></a>
                    </h2>

                    <div class="image">
                        <?php the_post_thumbnail('card'); ?>
                    </div>

                </div>
                
            </li>

        <?php endwhile; ?>
        
        </ul>

  
</div>