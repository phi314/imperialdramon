<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 12/7/16
 * Time: 10:02 AM
 */
?>

<?php get_header(); ?>
<?php
    $args = array(
        'page_id' => '39'
    );
    $wp_query = new WP_Query( $args );
    if( $wp_query->have_posts() ): $wp_query->the_post()
?>
    <header class="intro-header" style="background-image: url('<?= get_the_post_thumbnail_url(); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>About us</h1>
                        <h2 class="subheading">House of Cimahiwall</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Aricle -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </article>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 class="section-subheading text-muted">Hadir untuk para Hadirin dan Hadirot.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="<?= wp_get_attachment_image_url(78);?>" class="img-responsive img-circle" alt="">
                        <h4>Cimahiwall</h4>
                        <p class="text-muted">Based on Cimindi</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="https://www.facebook.com/cimahiwall.cimindi" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="<?= get_permalink(65); ?>"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li><a href="<?= get_permalink(5); ?>"><i class="fa fa-shopping-cart"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted"></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php get_footer(); ?>