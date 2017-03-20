<?php
/**
 * The template for displaying the WP Job Manager end part of the listings list
 *
 * @package Listable
 */
?>


</div><!-- .grid.list.job_listings -->
<?php get_template_part( 'assets/svg/loader-svg' ); ?>

<script>
    (function($) {
        $(document).on('keyup','.facetwp-facet-search_job input[type="text"]', function(e) {
            if (e.which === 13) {
                facetwp_redirect_to_job_vacancy();
            }
        });
    })(jQuery);

    function facetwp_redirect_to_job_vacancy() {
        //wait a little bit
        setTimeout(
            function() {
                //if the user presses ENTER/RETURN in a text field then redirect
                FWP.parse_facets();
                FWP.set_hash();

                var query_string = FWP.build_query_string();
                if ('' != query_string) {
                    query_string = '?' + query_string;
                }
                window.location.href = query_string;
                return false;
            }, 700);

    }
</script>