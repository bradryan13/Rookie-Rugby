<?php  
/*  
Template Name: Skill Cards  
*/  
?>



<?php get_header(); ?>

<div class="row page-header" data-stellar-background-ratio="0.6">


    <div class="large-8 columns">
        <h1><?php echo get_the_title($ID); ?></h1>
    </div>

    <div class="large-4 columns">

    </div>

</div>


<?php

// GET Values for categories

$difficulty = $_GET['difficulty']; 


$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; // setup pagination


// args
$args = array(
    'posts_per_page'=> 20,
    'paged' => $paged,
    'post_type' => 'skill-cards',
);

if ($difficulty) {
    $args['tax_query'] = array(
        array(
            'taxonomy'=>'skill-diff',
            'field'=>'slug',
            'terms'=> $difficulty
            ),
    );
}


    // get results
    $the_query = new WP_Query( $args );
    if( $the_query->have_posts() ): ?>

<div id="content" class="light-grey-bg">

<div id="skill-cards" class="row">
    
    <section>

       <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 

        <?php $terms = get_the_terms( $post->ID , 'skill-diff' ); ?>

        <?php $posttags = get_the_tags(); ?> 

            <li class="card-wrapper">

                <div class="card">
                        

                    <div class="meta">
                        <?php foreach ( $terms as $term ) { echo $term->name; } ?>
                    </div>

                    <h2>
                        <a href="<?php echo get_permalink();?>"><?php the_title(); ?></a>
                    </h2>

                    <div class="image">
                        <?php the_post_thumbnail('card'); ?>
                    </div>

                    <div class="tags">
                        <ul>
                            <?php if ($posttags) { foreach($posttags as $tag) { echo '<li>' . $tag->name . '</li>'; } } ?>
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
