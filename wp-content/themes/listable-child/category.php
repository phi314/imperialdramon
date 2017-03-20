<?php
/**
 * Category archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Listable
 */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main facetwp-template" role="main">

            <?php
            $category_id =  get_query_var( 'cat' );
            $blog_has_featured_image = !empty( listable_get_term_image_url( $category_id ) );
            // default image is 11116
            $image = wp_get_attachment_image_src( 11116, 'listable-featured-image' );

            if ( $blog_has_featured_image ) {
                $image = wp_get_attachment_image_src( listable_get_term_image_id( $category_id ), 'listable-featured-image' );
            }

            ?>
            <header class="page-header has-featured-image">
                <div class="page-header-background" style="background-image: url('<?php echo listable_get_inline_background_image( esc_url( $image[0] ) ); ?>')"></div>
                <div class="header-content">

                    <?php
                    $categories = get_categories();
                    if( $categories ):
                        echo '<ul class="category-list">';
                        echo '<li><a href="' . esc_sql( get_permalink( get_page_by_path( 'blog' ) ) ) . '">' . __('All', 'listable') . '</a></li>';


                    foreach ( $categories as $category ):
                            // Only show parent
                            if( $category->parent === 0) :

                                // Hide category if selected
                                if( $category->cat_ID !== $category_id ):
                                    ?>
                                    <li class="<?= $is_active; ?>"><a href="<?php echo esc_sql( get_category_link( $category->cat_ID ) ); ?>"><?php echo $category->cat_name; ?></a></li>
                                    <?php
                                endif;

                            endif;
                        endforeach;

                        echo '</ul>';
                    endif; ?>

                    <h1 class="page-title"><?php single_cat_title(); ?></h1>

                    <?php
                    $sub_categories = get_categories( array( 'child_of' => $category_id ) );
                    if( $sub_categories ):
                        echo '<ul class="category-list">';

                        foreach ( $sub_categories as $sub_category ): ?>
                            <li><a href="<?php echo esc_sql( get_category_link( $sub_category->cat_ID ) ); ?>"><?php echo $sub_category->cat_name; ?></a></li>
                        <?php endforeach;

                        echo '</ul>';
                    endif; ?>
                </div>
            </header>



            <?php if ( have_posts() ) : ?>

                <?php /* Start the Loop */ ?>

                <div class="postcards">
                    <div class="grid" id="posts-container">
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="grid__item  postcard">
                                <?php

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', get_post_format() );
                                ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php the_posts_navigation(); ?>
                </div>

            <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
            <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();