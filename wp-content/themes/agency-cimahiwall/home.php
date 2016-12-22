<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 12/7/16
 * Time: 12:26 AM
 */
?>
<?php get_header(); ?>
    <header id="main-slider">
        <!-- BEGIN SLIDER AREA-->
        <div class="slider_area">
            <!-- BEGIN SLIDER-->
            <div id="slides">
                <ul class="slides-container">

                    <!-- THE FIRST SLIDE-->
                    <li>
                        <!-- FIRST SLIDE OVERLAY -->
                        <div class="slider_overlay"></div>
                        <!-- FIRST SLIDE MAIN IMAGE -->
                        <img src="<?= get_template_directory_uri() . '/img/Bandung Macet Hujan.jpg'; ?>" alt="House of Cimahiwall">
                        <!-- FIRST SLIDE CAPTION-->
                        <div class="slider_caption">
                            <h2>House of Cimahiwall, From Cimindi to Galaxy</h2>
                            <p>The Water is Enough Sire!</p>
                            <a href="#" class="slider_btn">Who We are</a>
                        </div>
                    </li>

                    <?php
                    $args = array(
                        'cat' => '13',
                        'post_per_page' => 5
                    );

                    $main_silder_query = new WP_Query( $args  );

                    if( $main_silder_query->have_posts() ) : while( $main_silder_query->have_posts() ) : $main_silder_query->the_post()
                        ?>
                        <li>
                            <!-- FIRST SLIDE OVERLAY -->
                            <div class="slider_overlay"></div>
                            <!-- FIRST SLIDE MAIN IMAGE -->
                            <?php if( has_post_thumbnail()):
                                the_post_thumbnail('full');
                            else: ?>
                                <img src="<?= get_template_directory_uri() . '/img/Bandung Macet Hujan.jpg'; ?>" alt="House of Cimahiwall">
                            <?php endif; ?>
                            <!-- FIRST SLIDE CAPTION-->
                            <div class="slider_caption">
                                <h2><?php the_field('slider_title'); ?></h2>
                                <p><?php the_field('slider_caption'); ?></p>
                                <a href="<?php the_field('slider_link'); ?>" class="slider_btn"><?php the_field('slider_link_caption'); ?></a>
                            </div>
                        </li>
                    <?php endwhile; endif; wp_reset_query(); ?>

                </ul>
                <!-- BEGAIN SLIDER NAVIGATION -->
                <nav class="slides-navigation">
                    <!-- PREV IN THE SLIDE -->
                    <a class="prev" href="/item1">
                        <span class="icon-wrap"></span>
                        <h3><strong>Prev</strong></h3>
                    </a>
                    <!-- NEXT IN THE SLIDE -->
                    <a class="next" href="/item3">
                        <span class="icon-wrap"></span>
                        <h3><strong>Next</strong></h3>
                    </a>
                </nav>
            </div>
            <!-- END SLIDER-->
        </div>
        <!-- END SLIDER AREA -->
    </header>

    <div class="clearfix"></div>

    <!-- Shop Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Product</h2>
                    <h3 class="section-subheading text-muted">Dipilih! Dipilih! Dipilih!</h3>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 8
                    );

                    $product_query = new WP_Query( $args );
                    if( $product_query->have_posts() ) : while( $product_query->have_posts() ) : $product_query->the_post();
                ?>
                <div class="col-sm-3">
                    <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="folio-image">
                            <?php the_post_thumbnail('post-thumbnail', array('class'=>'img-responsive')); ?>
                        </div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <div class="overlay-text">
                                    <div class="folio-info">
                                        <h3><?php the_title(); ?></h3>
                                    </div>
                                    <div class="folio-overview">
                                        <span class="folio-link"><a class="folio-read-more" href="<?php the_permalink(); ?>"><i class="fa fa-shopping-bag"></i></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; else: ?>
                    <h3 class="text-center">Sorry, no Products yet.</h3>
                <?php endif; wp_reset_query()?>
            </div>
        </div>
        <div id="portfolio-single-wrap">
            <div id="portfolio-single">
            </div>
        </div><!-- /#portfolio-single-wrap -->
    </section><!--/#portfolio-->

    <!-- Blog Section -->
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Blog</h2>
                    <h3 class="section-subheading text-muted">Sudahkah anda makan?</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 5
                            );
                            $wp_query = new WP_Query( $args );
                            $i = 0;
                            if( $wp_query->have_posts() ) : while( $wp_query->have_posts() ) : $wp_query->the_post();
                        ?>

                                <li class="<?= ($i++ % 2) == 1 ? 'timeline-inverted' : ''; ?>" >
                                    <div class="timeline-image">
                                        <?php the_post_thumbnail( 'thumbnail', array('class'=>'img-circle img-responsive'));; ?>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="subheading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p class="text-muted"><?php the_excerpt(); ?></p>
                                            <sub>oleh <?php the_author_posts_link(); ?>, <?php the_time('F Y'); ?></sub>
                                        </div>
                                    </div>
                                </li>

                        <?php endwhile; else: ?>
                            <p>Sorry, no post yet.</p>
                        <?php endif; ?>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part of our Story</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="instagram" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <?php
                    $args = array(
                        'page_id' => 65
                    );

                    $page_instagram_query = new WP_Query( $args );
                    if( $page_instagram_query->have_posts() ) : $page_instagram_query->the_post();
                ?>
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading"><i class="fa fa-instagram"></i> </h2>
                        <h2 class="section-heading"><?php the_title(); ?></h2>
                        <h3 class="section-subheading text-muted"><?php the_content(); ?></h3>
                    </div>
                <?php else: ?>
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading"><i class="fa fa-instagram"></i> </h2>
                            <h2 class="section-heading">Instagram</h2>
                            <h3 class="section-subheading text-muted">Ayo share fotomu bersama produk Cimahiwall</h3>
                        </div>
                <?php endif; ?>
                <div class="col-lg-12">
                    <?= do_shortcode('[wdi_feed id="1"]'); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>

