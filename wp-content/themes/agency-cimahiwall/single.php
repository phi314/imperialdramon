<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 12/7/16
 * Time: 12:26 AM
 */
?>
<?php get_header(); ?>

<?php if( have_posts() ) : the_post(); ?>
    <!-- Header -->
    <header class="intro-header" style="background-image: url('<?= get_the_post_thumbnail_url(); ?>')">
        <div class="intro-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1><?php the_title(); ?></h1>
                        <h2 class="subheading"><?php the_field('subheading'); ?></h2>
                        <span class="meta">Posted by <?php the_author_posts_link(); ?> on <?php the_time('d F, Y'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Aricle -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </article>
<?php else: ?>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">House of Cimahiwall</div>
                <div class="intro-heading">No page found.</div>
                <a href="<?php home_url(); ?>" class="page-scroll btn btn-xl">Home</a>
            </div>
        </div>
    </header>
<?php endif; ?>

<?php get_footer(); ?>

