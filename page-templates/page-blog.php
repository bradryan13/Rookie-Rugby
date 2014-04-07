<?php  
/*  
Template Name: Blog Page 
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

<main class="row">

<?php


// args
$args = array(
    'posts_per_page'=> 20,
    'paged' => $paged,
    'post_type' => 'post',
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

    // get results
    $the_query = new WP_Query( $args );
    if( $the_query->have_posts() ): ?>

<div id="content" class="large-9 columns">
    
    <section id="articles">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 


            <article class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="story-header">

                        <a href="<?php echo get_permalink(); ?>"><h1 class="title"><?php the_title(); ?></h1></a>

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

                        <?php global $more; $more = 0; the_content(); ?>

                    </div>

        </article>
                
        <?php endwhile; ?>
        

    </section>

<?php endif; ?>

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

<div class="large-3 columns">

</div>

</main>
<?php get_footer(); ?>
