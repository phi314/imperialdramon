<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 12/7/16
 * Time: 6:35 AM
 */
?>
<?php get_header(); ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="fa fa-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="fa fa-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <?php
                        $args = [
                            'post_type' => 'product',
                            'posts_per_page' => 9
                        ];

                        $wp_query = new WP_Query( $args );
                        if( $wp_query->have_posts() ) : while( $wp_query->have_posts() ) : $wp_query->the_post();
                            $product = new WC_Product( get_the_ID() );
                    ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                            <div class="caption">
                                <h4><a href="<?= $product->get_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <sup><?= $product->get_price_html(); ?></sup>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; endif;; ?>



                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

<?php get_footer(); ?>