<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 1/11/17
 * Time: 10:38 AM
 */
?>

<?php if( have_posts() ) : ?>

    <?php get_job_manager_template('job-listings-job_vacancy-start.php'); ?>

        <?php while( have_posts() ) : the_post(); ?>
             <?php get_job_manager_template_part( 'content', 'job_listing' ); ?>
        <?php endwhile; ?>

    <?php get_job_manager_template('job-listings-job_vacancy-end.php'); ?>

<?php else:
    do_action( 'job_manager_output_jobs_no_results');
endif; ?>
