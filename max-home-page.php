<?php
/*
 * Template Name: Home Page
 * Author: Maxenius Solutions
 */



add_action('wp_head', function(){
    $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()), 'thumbnail' );
    
?>

<style type="text/css">
    .home {
        background: #fefefe;
        <?php if(!empty($url)){ ?>
        background-image: url(<?php echo $url ?>);
        background-size: cover;
        <?php } ?>
    }
    .n2-section-smartslider{
        width: 100vw !important;
        display: none;
    }
    .max_u3_home_page_div{
        display: none;
    }
    @media only screen and (max-width: 767px){
        .n2-section-smartslider{
            display: block;
        }
        .max_3u_pages_menu{
            background: transparent;
        }
        .max_u3_home_page_div{
            display: none;
        }
        body{
            background-image: none;
        }
        .max_u3_show_search_on_click{
            background: transparent;
        }
    }
</style>
<script type="text/javascript">
    jQuery(document).ready(function(){
    if( jQuery(window).width() > 768 ) {
        jQuery('body').css('background-image', "url('<?php echo $url ?>')");
    }
    if( jQuery(window).width() < 767 ) {
            jQuery('.n2-section-smartslider').css('display', 'block');
    }
            var home_page_img_url = jQuery('#max_u3_home_page_img').val();
            // jQuery(window).resize(function() {
            //     if(jQuery(window).width() == 768){
            //         jQuery('.max_3u_pages').css('width', '100%');
            //         jQuery('.max_page_content').css('border-right', 'unset');
            //         jQuery('.max_3u_pages_menu').css('background-color', 'white');
            //     }
            //     if(jQuery(window).width() <= 767){
            //         if( jQuery('.main_ul_desktop > li').hasClass('current-menu-ancestor') ){
            //             var cat_name = jQuery('.main_ul_desktop > li.current-menu-ancestor').find('a').html();
            //             if( cat_name == 'Prints' ) {
            //                 jQuery('body').css('background-image', 'unset');
            //                 jQuery('.max-u3-w--70').css('display', 'none');
            //                 jQuery('.n2-section-smartslider').css('display', 'block');
            //                 jQuery('.max_u3_arrow_up').css('display', 'none');
            //                 jQuery('.max_3u_pages_menu').css('background-color', 'transparent'); 
            //             }
            //             jQuery('.max_page_content').css('border-right', '0px');
            //             jQuery('.max_3u_pages').css('width', '100%');
            //         }
                    // if( jQuery('.u3_mob_main_menu > li').hasClass('current-menu-ancestor') ){
                    //     var cat_name = jQuery('.u3_mob_main_menu > li.current-menu-ancestor').find('a').html();
                    //     if( cat_name == 'Prints' ) {
                    //         jQuery('body').css('background-image', 'unset');
                    //         jQuery('.max-u3-w--70').css('display', 'none');
                    //         jQuery('.n2-section-smartslider').css('display', 'block');
                    //         jQuery('.max_u3_arrow_up').css('display', 'none');
                    //         jQuery('.max_3u_pages_menu').css('background-color', 'transparent');
                    //     }
                    // }
            //     }else{
            //             jQuery('.max_u3_arrow_up').css('display', 'none');
            //             // if( jQuery(window).width() > 768 ) {
            //             //     // jQuery('.max_3u_pages_menu').css('background-color', '#d8c48d');
            //             //     // jQuery('.max_page_content').css('border-right', '20px solid #fff');
            //             // }
            //             jQuery('.max-u3-w--70').css('display', 'block');
            //             jQuery('.columns-4').css('display', 'none');
            //             jQuery('.n2-section-smartslider').css('display', 'none');
            //     }
            // });
                jQuery('.max_u3_slider_drop_down').on('click', function(){
                    jQuery('.max_3u_pages_menu').css('background-color', '#fafafa');
                    jQuery('.columns-4').slideDown();
                    jQuery('.max_u3_arrow_up').slideDown();
                    jQuery('.max_u3_show_search_on_click').css('background-color', '#fafafa');
                    jQuery('.n2-section-smartslider').slideUp();
                });

                jQuery('.max_u3_arrow_up_img').on('click', function(){
                    jQuery('.max_3u_pages_menu').css('background-color', 'transparent');
                    jQuery('.columns-4').slideUp();
                    jQuery('.max_u3_arrow_up').hide();
                    jQuery('.max_u3_show_search_on_click').css('background-color', 'transparent');
                    jQuery('.n2-section-smartslider').slideDown();
                });
                var prevScrollpos = window.pageYOffset;
                jQuery(window).scroll(function (event) {
                    if( jQuery('.u3_mob_main_menu > li').hasClass('current-menu-ancestor') ){
                        var cat_name = jQuery('.u3_mob_main_menu > li.current-menu-ancestor').find('a').html();
                    }
                    var scroll = jQuery(window).scrollTop();
                    var currentScrollPos = window.pageYOffset;

                    if( jQuery(window).width() <= 767 ) {
                         if (prevScrollpos > currentScrollPos) {
                            if( jQuery('.n2-section-smartslider').is(':visible') ){
                                
                            }else{
                                // if( cat_name == 'Prints' ) {
                                    jQuery('.max_u3_arrow_up').slideDown();
                                // }
                            }
                        }else{
                            // if( cat_name == 'Prints' ) {
                                jQuery('.max_u3_arrow_up').slideUp();
                            // }

                        }
                        prevScrollpos = currentScrollPos;
                    }
                });
            });
</script>

<?php
}); 


$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()), 'thumbnail' );

get_header();
if( wp_is_mobile() ) {
    echo do_shortcode('[smartslider3 slider="3"]');
    echo do_shortcode('[max_u3_display_print_home_products]');
}
?>
<div class="max_u3_home_page_div">
    <input type="hidden" id="max_u3_home_page_img" name="max_u3_home_page_img" value="<?php echo ! empty( $url ) ? $url : '' ?>">
    <?php print_r( the_content() ); ?>
</div>
<?php 
get_footer(); ?>