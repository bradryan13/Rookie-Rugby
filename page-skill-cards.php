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

<div id="content">

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
    });
</script>

<div id="skill-cards" class="row">
    
    <section>

       <ul>

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 
        <?php if(get_field('objective')) { $difficulty = get_field('difficulty'); $difficulty = implode (" ", $difficulty); } ?>

            <div class="card <?php echo $difficulty; ?>">
                
                <div class="image">
                    <?php the_post_thumbnail('card'); ?>
                </div>
                    
                <div class="description">
                    <div class="filter">
                        <p><a href="<?php echo get_permalink(); ?>"><?php the_field(objective) ?></a></p>
                    </div>
                </div>

                <h2 class="title">
                    <?php the_title(); ?>
                </h2>

                <div class="meta">
                    <p>Submitted by <?php echo get_the_author(); ?></p>
                    <p><?php echo $difficulty; ?></p>
                </div>
                
            </div>

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
