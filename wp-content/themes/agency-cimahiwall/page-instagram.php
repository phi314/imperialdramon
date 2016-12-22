<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 12/7/16
 * Time: 6:35 AM
 */
?>
<?php get_header(); ?>
<!-- Instagram Section -->
<?php
    $args = array(
        'page_id' => '65'
    );
    $wp_query = new WP_Query( $args );
    if( $wp_query->have_posts() ): $wp_query->the_post()
?>

        <header class="blog" style="background-image: url('<?= get_the_post_thumbnail_url(); ?>')">
            <div class="container">
                <div class="intro-text">
                    <div class="intro-heading">Our Gallery</div>
                </div>
            </div>
        </header>

        <section id="instagram">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading"><i class="fa fa-instagram"></i> </h2>
                        <h2 class="section-heading"><?php the_title(); ?></h2>
                        <h3 class="section-subheading text-muted"><?php the_content(); ?></h3>
                    </div>
                </div>

                <?= do_shortcode('[wdi_feed id="1"]'); ?>

            </div>
        </section>

<?php endif; ?>

<?php get_footer(); ?>