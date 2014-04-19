

<article class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="story-header">

                <h1 class="title"><?php the_title(); ?></h1>

				<a class="ajax close-blog" href="/blog"> <i class="fa fa-times-circle-o"></i></a>

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

                <?php the_content(); ?>

            </div>

</article>


<?php edit_post_link( __( 'Edit', 'USAWCR' ), '<span class="edit-link">', '</span>' ); ?>
