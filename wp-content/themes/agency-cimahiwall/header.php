<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 12/6/16
 * Time: 11:51 PM
 */
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php bloginfo( 'title' ); ?></title>

        <?php wp_head(); ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top" <?php body_class('index') ?>">

    <!-- BEGIN MENU -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- LOGO -->

                    <!-- TEXT BASED LOGO -->
                    <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo( 'title' ); ?></a>

                    <!-- IMG BASED LOGO  -->
                    <!--  <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo"></a> -->


                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <?php
                    $default = array(
                        'container' => 'ul',
                        'theme_location' => 'primary-menu',
                        'menu_id' => 'top-menu',
                        'menu_class' => 'nav navbar-nav navbar-right main_nav'
                    );

                    wp_nav_menu( $default );
                    ?>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    <!-- END MENU -->