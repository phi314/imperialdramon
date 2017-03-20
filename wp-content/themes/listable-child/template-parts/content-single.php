<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Listable
 */

$has_image = false; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-featured"></div>
		<div class="header-content">
			<div class="entry-meta">
				<?php
				listable_posted_on();

				$post_categories = wp_get_post_categories( $post->ID );
				if ( ! is_wp_error( $post_categories ) ) {
					foreach ( $post_categories as $c ) {
						$cat = get_category( $c );
						echo '<a class="category-link" href="' . esc_sql( get_category_link( $cat->cat_ID ) ) . '">' . $cat->name . '</a>';
					}
				} ?>

			</div><!-- .entry-meta -->
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<span class="entry-subtitle"><?php echo get_the_excerpt(); ?></span>

			<?php if ( function_exists( 'sharing_display' ) ) : ?>
				<?php sharing_display( '', true ); ?>
			<?php endif; ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'listable' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

<?php
$args = array(
    'numberposts' => 3
);
$recent_posts = wp_get_recent_posts( $args );
?>

<!-- Recent Page -->
<div class="blog">
    <div class="postcards">
        <div class="grid" id="posts-container">
            <?php /* Start the Loop */ ?>
            <?php foreach ( $recent_posts as $recent ): ?>
                <div class="grid__item  postcard">
                    <?php

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', get_post_format( $recent['ID'] ) );
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php the_posts_navigation(); ?>
    </div>
</div>

