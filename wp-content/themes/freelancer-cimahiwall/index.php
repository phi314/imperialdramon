<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 12/4/16
 * Time: 1:27 AM
 */
?>

<?php get_header(); ?>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="<?= get_template_directory_uri(). '/img/profile.png' ?>" alt="">
                    <div class="intro-text">
                        <span class="name"><?php bloginfo( 'name' ); ?></span>
                        <hr class="star-light">
                        <span class="skills"><?php bloginfo( 'description' ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php
                $i = 1;
                if( have_posts() ) : while( have_posts() ) : the_post();
                ?>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal<?= $i; ?>" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <?php the_post_thumbnail( 'full', ['class'=>'img-responsive']); ?>
                        </a>
                    </div>
                <?php $i++; endwhile; endif; ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <?php
                $args = [
                    'page_id' => 39
                ];

                $wp_query = new WP_Query($args);

                if( have_posts($wp_query) ) :  the_post();
            ?>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2><?php the_title(); ?></h2>
                        <hr class="star-light">
                    </div>
                </div>
                <div class="row">
                    <?php the_content(); ?>
                </div>
            <?php endif; wp_reset_query(); ?>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <?= do_shortcode( '[contact-form-7 id="22" title="Contact form 1" html_id="contactForm"]' ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Modals -->
    <?php

    $i = 1;
    if( have_posts() ) : while( have_posts() ) : the_post();

    ?>
        <div class="portfolio-modal modal fade" id="portfolioModal<?= $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2><?php the_title(); ?></h2>
                                <hr class="star-primary">
                                <?php the_post_thumbnail( 'full', ['class'=>'img-responsive']); ?>
                                <p><?php the_content(); ?></p>
                                <ul class="list-inline item-details">
                                    <li>Client:
                                        <strong><a href="http://startbootstrap.com"><?php the_tags( '' ); ?></a>
                                        </strong>
                                    </li>
                                    <li>Date:
                                        <strong><a href="http://startbootstrap.com"><?php the_time('d F Y'); ?></a>
                                        </strong>
                                    </li>
                                    <li>Service:
                                        <strong><a href="http://startbootstrap.com"><?php the_category( ' ' ); ?></a>
                                        </strong>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $i++; endwhile; endif; ?>

<?php get_footer(); ?>