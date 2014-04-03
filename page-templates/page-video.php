<?php  
/*  
Template Name: Videos 
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

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; // setup pagination

// args
$args = array(
    'posts_per_page'=>18,
    'paged' => $paged,
    'post_type' => 'video',
);


    // get results
    $the_query = new WP_Query( $args );
    if( $the_query->have_posts() ): ?>

<div id="content" class="light-grey-bg">

<div id="videos" class="row">

    <section>

       <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-2">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 
        
        <?php $video = get_post_meta($post->ID, '__cbc_video_data'); ?>

            <li class="card-wrapper">

                <div class="card">

                    <div class="meta">
                        <?php echo $video[0]["category"]; ?>
                    </div>

                    <h2>
                        <a class="ajax" href="<?php cbc_video_post_permalink();?>"<?php cbc_output_video_data();?>><?php the_title(); ?></a>
                    </h2>

                    <div class="image">
                        <img src="<?php echo $video[0]["thumbnails"][1]; ?>">
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
