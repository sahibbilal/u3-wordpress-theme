<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class();?> >
<?php 
    if ( is_product() ) {
        ?>
        <style type="text/css">
            .select2-search--dropdown{
                display: none !important;
            }
            .max_summary .select2-selection--single, .max_summary .select2-selection__rendered{
                height: 50px;
                line-height: 47px !important;
                font-family: 'Helvetica Thin Cond Thin';
                font-weight: 600;
                font-size: 1.6rem !important;
                letter-spacing: 2px;
            }
            .single_variation{
                display: none !important;
            }
            .select2-results__option{
                font-size: 1.2rem !important;
                height: 50px;
                line-height: 47px !important;
                font-family: 'Helvetica Thin Cond Thin';
                font-weight: 600;
                font-size: 1.6rem !important;
                letter-spacing: 2px;
            }
            .select2-container--default .select2-results__option--selected{
                color: black;
            }
            .max_summary .select2-container--default .select2-selection--single .select2-selection__arrow b{
                border-style: none !important;
            }
            .max_summary .select2-container--default .select2-selection--single{
                border: 2px solid black !important;
                border-right: 0px !important;
                border-radius: unset !important;
            }
            .max_summary .select2-container{
                margin-bottom: 20px;
            }
            .max_summary .select2-container--default .select2-selection--single .select2-selection__arrow{
                background-image: url("<?php echo get_template_directory_uri().'/images/dropdown-icon.png' ?>");
                background-repeat: no-repeat;  
                bottom: 0px;
                border: 2px solid #000;
                background-position: center;
                background-size: 30px;
                top: 0 !important;
                right: 0 !important;
                height: 50px !important;
                width: 45px !important;
                padding-left: 25px;
                padding-right: 25px;
            }
            .woocommerce div.product form.cart .variations select {
                min-width: 40% !important;
            }
            .woocommerce div.product form.cart .variations{
                margin-bottom: 0px !important;
            }
            @media only screen and (max-width: 767px){
                .max_summary .select2-container--default .select2-selection--single .select2-selection__arrow{
                background-repeat: no-repeat;  
                bottom: 0px;
                /*border-top: 1px solid #000;*/
                border-left: 0px solid #000;
/*                border-bottom: 1px solid #000;
                border-right: 2px solid #000;*/
                background-position: center;
                background-size: 30px;
                top: 0 !important;
                right: 0 !important;
                height: 50px !important;
                width: 45px !important;
                padding-left: 25px;
                padding-right: 25px;
            }
        }
        @media only screen and (max-width: 768px){
            .max_u3_mob_get_back_icon{
                display: block;
                width: 34px;
                margin-top: 8px;   
            }
            .max_u3_toggle_checkbox, .max_u3_hamburger_bars{
                display: none;
            }
        }

        </style>
        <?php
    }
?>
<div class="max_3u_container">
    <div class="max_3u_header_pages_container">
        <div class="max_3u_header">
            <div class="max_3u_pages_menu">
                <nav role="navigation">
                    <div id="menuToggle">
                        
                        <img class="max_u3_mob_get_back_icon" src="<?php echo get_template_directory_uri().'/images/left-back.png' ?>">
                        
                        <input class="max_u3_toggle_checkbox" type="checkbox" />
                        <div class="max_u3_hamburger_bars"></div>
                        <div class="max_u3_hamburger_bars"></div>
                        <div class="max_u3_hamburger_bars"></div>
                        <nav class="menu_mobile">                                
                            <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'header',
                                'menu' => 'Header Menu Two',
                                'depth'             => 2,
                                'menu_class'        => 'menuPages',
                                'menu_id'           => 'menuPages',
                                'container'         => false,
                            ) );
                            ?>

                            <img class="max_u3_mob_right_angle" src="<?php echo get_template_directory_uri().'/images/mob-right-angle-two.png' ?>">
                            <img class="max_u3_mob_cross_icon" src="<?php echo get_template_directory_uri().'/images/mob-cross.png' ?>">
                            <div class="logo-mobile">
                                <a href="<?php echo get_home_url(); ?>">
                                    <img src="<?php echo get_template_directory_uri().'/images/mob-logo.png' ?>">
                                </a>
                            </div>
                            <div class="max_u3_short_mob_menu">
                                <img class="max_u3_mob_back_icon" src="<?php echo get_template_directory_uri().'/images/mob-back-arrow.png' ?>">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location'    => 'header',
                                        'menu' => 'Header Menu Two',
                                        'depth'             => 2,
                                        'menu_class'        => 'u3shortMenu',
                                        'menu_id'           => 'u3shortMenu',
                                        'container'         => false,
                                    ) );
                                ?>
                                <p class="max_mob_u3_all_rights_reserved">U3@ All rights reserved.</p>
                            </div>
                            <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'header',
                                'menu' => 'Header Menu',
                                'depth'             => 2,
                                'menu_class'        => 'main_ul u3_mob_main_menu',
                                'menu_id'           => 'main_ul_id',
                                'container'         => false,
                            ) );
                            ?>
                            <div class="max_u3_bottom_font_awesome_icons max_u3_font_cont_mob">
                                <div class="max_3u_font_awesome_icons_container">
                                    <a href="#" class="max_3u_icons_container_tag"><i class="fa fa-facebook-f"></i></a>
                                    <a href="#" class="max_3u_icons_container_tag"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="max_3u_icons_container_tag"><img class="max_u3_mob_font_menu_icons" src="<?php echo get_template_directory_uri() . '/images/google-plus-logo.png' ?>"></a>
                                    <a href="#" class="max_3u_icons_container_tag"><img class="max_u3_mob_font_menu_icons" src="<?php echo get_template_directory_uri() . '/images/instagram.png' ?>"></a>
                                    <a href="#" class="max_3u_icons_container_tag"><img class="max_u3_mob_font_menu_icons" src="<?php echo get_template_directory_uri() . '/images/pinterest.png' ?>"></a>
                                    <a href="#" class="max_3u_icons_container_tag"><img class="max_u3_mob_font_menu_icons" src="<?php echo get_template_directory_uri() . '/images/youtube-logotype.png' ?>"></a>
                                </div>
                            </div>
                            
                        </nav>
                    </div>
                    
                    <!-- <a href="<?php //echo get_home_url(); ?>" class="mobile_logo"> -->
                        <!-- <img src="<?php //echo get_template_directory_uri().'/images/logo-png.png' ?>"> -->
                    <!-- </a> -->
                    
                </nav>
                <?php
                    $log_name = '';
                    if( true == is_user_logged_in() ) {
                        $log_name = get_user_by( 'id', get_current_user_id() )->data->display_name;
                    } else if ( 'guest' == WC()->session->get( 'max_3u_guest_login_info' ) ) {
                        $log_name = 'GUEST';   
                    } else {
                        $log_name = 'GUEST';
                    }
                ?>
                <!-- max_3u_bag_guest_a_tag -->
                <div class="max_3u_vert_center_guest_bag_img">
                    <?php
                        global $woocommerce;
                    ?>
                    <a class="max_3u_bag_guest_a_tag" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" style="width: 100%;">
                        <div class="max_3u_bag_img">
                            <p class="max_3u_bag_img_p_tag"><?php echo $woocommerce->cart->cart_contents_count; ?></p>
                        </div>
                    </a>
                    <a class="max_3u_bag_guest_a_tag" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" style="width: 100%;">
                        <div class="max_3u_bag_guest">
                            <p class="max_3u_bag_guest_p_tag"><strong><?php echo $log_name; ?></strong></p>
                        </div>
                    </a>

                    <svg class="max-u3-header-search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"/></svg>

                </div>
            </div>

            <div class="max_3u_cat_menu">
                <div class="max_u3_desktop_logo">
                    <a href="<?php echo get_home_url(); ?>" class="logo">
                        <img src="<?php echo get_template_directory_uri().'/images/logo-png.png' ?>">
                    </a>
                </div>
                <div class="max_3u_cat_menu_inner">
                    <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'header',
                        'menu' => 'Header Menu',
                        'depth'             => 2,
                        'menu_class'        => 'main_ul main_ul_desktop',
                        'menu_id'           => 'main_ul_id',
                        'container'         => false,
                    ) );
                    ?>
                    <div class="max_3u_font_awesome_icons_section">
                        <div class="max_3u_font_awesome_icons_container">
                            <a href="#" class="max_3u_icons_container_tag"><i class="fa fa-facebook-f"></i></a>
                            <a href="#" class="max_3u_icons_container_tag"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="max_3u_icons_container_tag"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="max_3u_icons_container_tag"><i class="fa fa-youtube-play"></i></a>
                            <a href="#" class="max_3u_icons_container_tag"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="max_3u_icons_container_tag"><i class="fa fa-snapchat"></i></a>
                        </div>
                        <div class="max_3u_all_rights_reserved">
                            <p>U3@ All rights reserved.<br>
                            2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">

            jQuery('.max_u3_mob_get_back_icon').on('click', function(){
                window.history.back();
                return false;
            });
                    
        </script>
        <div class="max_3u_pages <?php echo apply_filters( 'woocommerce_page_class' , ''  ); ?>">
            <div class="top_header_search_form" >
            <form role="search" method="get" action="<?php echo site_url(); ?>" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search" style="float: right;">
                <div class="wp-block-search__inside-wrapper">
                    <input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s"  value="" placeholder="" style="background-color: transparent;border: unset; border-bottom: 1px solid;" required=""><button type="submit" style="background:transparent;border: unset;" class="wp-block-search__button "><i style="font-size: 1rem;" class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
            </div>

            <div class="max_u3_show_search_on_click" style="display: none;">
                <form role="search" method="get" action="<?php echo site_url(); ?>">
                    <div style="text-align: right;"><i class="fa fa-times max_u3_fa_time" aria-hidden="true"></i></div>
                    <br>
                    <input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s"  value="" placeholder="" style="background-color: transparent;border: unset; border-bottom: 1px solid;" required=""><button type="submit" style="background:transparent;border: unset;" class="wp-block-search__button "><i style="font-size: 1rem;" class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>

            <div class="max_page_content">