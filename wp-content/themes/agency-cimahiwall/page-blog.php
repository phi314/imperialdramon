<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 12/7/16
 * Time: 6:35 AM
 */
?>
<?php get_header(); ?>
<!-- Header -->
<header>
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">House of Cimahiwall</div>
            <div class="intro-heading">The water is enough</div>
            <a href="#blog" class="page-scroll btn btn-xl"><?= get_the_title(); ?></a>
        </div>
    </div>
</header>

<!-- Blog Section -->
<section id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading"><?= get_the_title(); ?></h2>
                <h3 class="section-subheading text-muted">Sudahkah anda makan?</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_per_page' => 4
                    );
                    $wp_query = new WP_Query( $args );
                    $i = 0;
                    if( $wp_query->have_posts() ) : while( $wp_query->have_posts() ) : $wp_query->the_post();
                ?>
                <ul class="timeline">
                    <li class="<?= ($i++ % 2) == 1 ? 'timeline-inverted' : ''; ?>" >
                        <div class="timeline-image">
                            <?php the_post_thumbnail( 'thumbnail', ['class'=>'img-circle img-responsive']);; ?>
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
                </ul>
                <?php endwhile; else: ?>
                        <p>Sorry, no post yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>