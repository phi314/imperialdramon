/*!
 * Start Bootstrap - Agency Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// Navigation Scripts to Show Header on Scroll-Up
jQuery(document).ready(function($) {


    jQuery('#slides').superslides({
        animation: 'slide',
        play: '6000'
    });

    // For fixed top bar
    $(window).scroll(function(){
        if($(window).scrollTop() >100 /*or $(window).height()*/){
            $(".navbar-fixed-top").addClass('past-main');
        }
        else{
            $(".navbar-fixed-top").removeClass('past-main');
        }
    });

});