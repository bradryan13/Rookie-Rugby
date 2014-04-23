<?php get_header();

get_template_part( 'includes/page-header');

$difficulty = $_GET['difficulty'];
$tags = $_GET['tag']; 

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; // setup pagination


// args
$args = array(
    'posts_per_page'=> -1,
    'paged' => $paged,
    'post_type' => 'game-cards',
);

if ($difficulty) {
    $args['tax_query'] = array(
        array(
            'taxonomy'=>'game-diff',
            'field'=>'slug',
            'terms'=> $difficulty,
            ),
    );
}

if ($tag) {
    $args['tag'] = $tag;
}

$game_difficulties = get_terms( 'game-diff', 'orderby=count&hide_empty=0' );

// get results
$the_query = new WP_Query( $args );
if( $the_query->have_posts() ): ?>

<div id="content" class="light-grey-bg">



<div id="game-cards" class="row">
    
    <section>

       <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-2">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 

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

<?php endif; ?>

</div>

<?php

$big = 999999999; 

echo paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '/page/%#%',
    'current' => max( 1, get_query_var('paged') ),
    'end_size'     => 1,
    'mid_size'     => 1,
    'total' => $the_query->max_num_pages
) );

wp_reset_query(); ?>

</div>

<?php get_footer(); ?>
