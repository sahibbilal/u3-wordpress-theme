<?php

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' ,10 );
function enqueue_scripts() {

    wp_enqueue_script( 'jquery' );
    //wp_enqueue_script( 'max-jquery-js', get_template_directory_uri() . '/assets/js/jquery.js' , array(), time(), true);
    wp_enqueue_script( 'max-custom-js', get_template_directory_uri() . '/assets/js/custom.js' ,array('jquery'), time(), true);
 
    wp_enqueue_style( 'max-custom-css1', get_template_directory_uri() . '/style.css' ,array() , filemtime(get_template_directory() . '/style.css'), false);
    wp_enqueue_style( 'max-custom-css-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,300', true );
    wp_enqueue_style( 'max-custom-css-font-awesome', get_template_directory_uri() . '/assets/font_awesome/css/font-awesome.min.css', true );

    wp_localize_script( 'max-custom-js', 'max_3u_ajax_url', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    // Add Select 2 library css file to perform filters to admin panel.
    wp_register_style( 'max_3u_custom_select_2_css', get_template_directory_uri()  . '/assets/select2_search/dist/css/select2.min.css', array(), '1.1.0' );
    wp_enqueue_style( 'max_3u_custom_select_2_css' );
    // Add Select 2 library js file to perform filters to admin panel.
    wp_register_script( 'max_3u_custom_select_2_js', get_template_directory_uri()  . '/assets/select2_search/dist/js/select2.min.js', array(), '1.1.0', true );
    wp_enqueue_script( 'max_3u_custom_select_2_js' );

}

add_shortcode('max_u3_display_print_home_products', 'max_u3_print_home_products');
function max_u3_print_home_products(){
    global $post;
    $post_slug = $post->post_name;
    if( $post_slug == 'home-page' ) : 
        ?>
            <style type="text/css">
                .max_bg_thumb img {
                    width: 100% !important;
                }
                .columns-4{
                    width: 100%;
                    background: #fafafa;
                    padding-left: 5px;
                    margin-top: 100px;
                    display: none;
                }
                .columns-4 > li{
                    width: 48%;
                    list-style: none;
                    display: inline-block;
                }
                .columns-4 > li:nth-child(even){
                    margin-left: 5px;
                }
                .woocommerce-loop-product__title{
                    font-family: "Helvetica Thin Cond";
                    text-transform: uppercase;
                    color: #000;
                    padding-left: 5px;
                    letter-spacing: .08em;
                    font-size: 1.2rem;
                    width: 125px;
                }
                .add-to-wishlist-before_image .yith-wcwl-add-to-wishlist i{
                    font-size: 1.5rem;
                }
                .yith-wcwl-add-button > a{
                    color: black !important;
                }
               .yith-wcwl-add-to-wishlist{
                    top: 31vh !important;
                    position: relative !important;
                    left: 105px !important;
                    display: inline-block;
                }
                .max_bg_thumb{
                    margin-bottom: 5px;
                }
                .max_author{
                    display: none;
                }

                .price{
                    display: none;
                }
                .woocommerce-loop-product__link{
                    text-decoration: none;
                }
                .max_u3_arc_shop_price{
                    font-family: "Helvetica Thin Cond";
                    font-size: 0.9rem;
                    padding: 3px 0 0 0.25em;
                    font-style: unset;
                    letter-spacing: 2px;
                    font-weight: bold;
                    color: black;
                    display: block;
                    font-weight: bold;
                }
                ul.heateor_sss_sharing_ul li:nth-child(1){
                    display: none;
                }
                .heateorSssMoreBackground{
                    top: -39px;
                    position: relative !important;
                    left: 140px;
                    background: unset !important;
                }
                .heateorSssMoreSvg{
                    background-size: 50px !important;
                    background-image: url('data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2038%2038%22%3E%3Ccircle%20cx%3D%2210%22%20cy%3D%2215%22%20r%3D%223%22%20fill%3D%22%23000%22%3E%3C%2Fcircle%3E%3Ccircle%20cx%3D%2220%22%20cy%3D%2210%22%20r%3D%223%22%20fill%3D%22%23000%22%3E%3C%2Fcircle%3E%3Ccircle%20cx%3D%2220%22%20cy%3D%2220%22%20r%3D%223%22%20fill%3D%22%23000%22%3E%3C%2Fcircle%3E%3Cpath%20d%3D%22M%2010%2015%20L%2020%2010%20m%200%2010%20L%2010%2015%22%20stroke-width%3D%222%22%20stroke%3D%22%23000%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E') !important;
                }
                .max_u3_arrow_up{
                    width: 100%;
                    background: #fafafa;
                    height: 50px;
                    position: fixed;
                    z-index: 50;
                    top: 75px;
                    text-align: center;
                    display: none;
                }
                .max_u3_arrow_up_img{
                    margin-top: 25px;
                    width: 20px;
                }
                @media only screen and (max-width: 767px){
                    .max_3u_pages {
                        width: 100%;
                    }
                    .heateorSssMoreSvg{
                        background-image: url('<?php echo get_template_directory_uri().'/images/share-icon.png' ?>') !important;
                        background-repeat: no-repeat;
                        background-size: 14px !important;
                        background-position: center;
                    }
                    .heateorSssMoreBackground{
                        left: 40vw;
                    }
                    .yith-wcwl-add-to-wishlist{
                        top: 225px !important;
                        left: 30vw !important;
                    }
                    .add-to-wishlist-before_image .yith-wcwl-add-to-wishlist i{
                        font-size: 1.3rem !important;
                    }
                }

            </style>
            <div class="max_u3_arrow_up">
                 <img class="max_u3_arrow_up_img" src="<?php echo get_template_directory_uri().'/images/up-arrow.png' ?>">
            </div>
            <ul class="products columns-4">
                <?php
                    $args = array(
                        'post_type' => 'product',
                        'product_cat' => 'Prints',
                        );
                    $loop = new WP_Query( $args );
                    if ( $loop->have_posts() ) {
                        while ( $loop->have_posts() ) : $loop->the_post();
                            // do_action( 'woocommerce_shop_loop' );
                            wc_get_template_part( 'content', 'product' );
                        endwhile;
                    } else {
                        echo __( 'No products found' );
                    }
                   wp_reset_postdata();
                ?>
            </ul>
        <?php
    endif;
}

function wpb_custom_new_menu() {
  register_nav_menu('menu2',__( 'Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );
function admin_bar(){
        if(is_user_logged_in()){
        show_admin_bar( true );
        add_filter( 'show_admin_bar', '__return_true' , 1000 );
    }
}
add_action('init', 'admin_bar' );

function wpb_demo_shortcode_2() {
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 10,
        'product_cat'    => 'hoodies'
    );

    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();
        global $product;
        echo '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.get_the_title().'</a>';
    endwhile;

    wp_reset_query();
}

add_shortcode('product1', 'wpb_demo_shortcode_2');


//Ajax calls
add_action( 'wp_ajax_max_3u_term_id_method', 'max_3u_term_id_method' );
add_action( 'wp_ajax_nopriv_max_3u_term_id_method', 'max_3u_term_id_method' );

function max_3u_term_id_method() {
    global $wpdb;
    if ( ! empty( $_POST['max_3u_term_id'] ) ) {
        $term_id = $_POST['max_3u_term_id'];
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 10,
            'product_cat'    => get_term( $term_id )->name
        );
        $thumbnail_id = $wpdb->get_row("SELECT meta_value FROM {$wpdb->prefix}termmeta WHERE term_id = {$term_id} AND meta_key = 'thumbnail_id'");
        $image = wp_get_attachment_url( $thumbnail_id->meta_value );
        $loop = new WP_Query( $args );
        $new_arr = [];
        while ( $loop->have_posts() ) : $loop->the_post();
            global $product;
            $author_id = get_post_field( 'post_author', $product->ID );
            $author_name = get_the_author_meta( 'display_name', $author_id );
            $new_arr[] = [
                get_permalink(),
                get_the_post_thumbnail_url($product->ID),
                get_the_title(),
                $product->get_price(),
                $image,
                get_term( $term_id )->name,
                $author_name,
                get_woocommerce_currency_symbol()
            ];
        endwhile;
        echo json_encode( $new_arr );
        wp_reset_query();
    }
    exit;
}

function max_u3_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 500,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
}
add_action( 'after_setup_theme', 'max_u3_add_woocommerce_support' );

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-thumbnails', array( 'post' ) );          // Posts only
add_theme_support( 'post-thumbnails', array( 'page' ) );          // Pages only
add_theme_support( 'custom-logo' );

add_action( 'wp_enqueue_scripts', 'pe_custom_product_style' );
function pe_custom_product_style() {
    if ( is_product() ){
        wp_register_style( 'product_css', get_stylesheet_directory_uri() . '/single-product.css', false, '1.0.0', 'all' );
        wp_enqueue_style('product_css');
    }
}

add_filter('woocommerce_product_related_posts_query', '__return_empty_array', 100);

function max_get_product_variations($cart_item) {
    $product_id = $cart_item['variation_id'];

    if($cart_item['variation_id'] == 0 ){
        $product_id = $cart_item['product_id'];
    }

    $product = wc_get_product($product_id);
    $html = '';
    $html .= '<div class="max_product_attr">';
    if($product->is_type('variation')){
        $variations = $product->get_variation_attributes();
        foreach ($variations as $single){
            $html .= $single.'<br />';
        }
    }
    $html .= '</div>';
    return $html;
//    $variations_id = wp_list_pluck( $variations, 'variation_id' );
/*    $current_products = $product->get_children();
    foreach ($current_products as $value) {
        $single_variation=new WC_Product_Variation($value);
//        echo '<option  value="'.$value.'">'.implode(" / ", $single_variation->get_variation_attributes()).'-'.get_woocommerce_currency_symbol().$single_variation->price.'</option>';
    }*/
}

/**

 * @snippet       Rename State Field Label @ WooCommerce Checkout

*/
add_filter( 'woocommerce_billing_fields', 'max_3u_modify_billing_fields', 20, 1 );
function max_3u_modify_billing_fields($fields) {
    $fields['billing_country']['class'] = array('max_3u_billing_checkout_fields');
    $fields['billing_first_name']['class'] = array('max_3u_billing_checkout_fields');
    $fields['billing_last_name']['class'] = array('max_3u_billing_checkout_fields');
    $fields['billing_email']['class'] = array('max_3u_billing_checkout_fields');
    $fields['billing_city']['class'] = array('max_3u_billing_checkout_fields');
    $fields['billing_postcode']['class'] = array('max_3u_billing_checkout_fields');
    $fields['billing_address_1']['class'] = array('max_3u_billing_checkout_fields');
    
    $fields['billing_address_1']['label'] = 'ADDRESS';
    $fields['billing_first_name']['label'] = 'NAME';
    $fields['billing_last_name']['label'] = 'LAST NAME';
    $fields['billing_country']['label'] = 'COUNTRY';
    $fields['billing_email']['label'] = 'EMAIL';
    $fields['billing_city']['label'] = 'CITY';
    $fields['billing_postcode']['label'] = 'ZIP CODE';
    return $fields;
}


add_filter( 'woocommerce_checkout_fields' , 'max_3u_remove_checkout_fields' ); 

function max_3u_remove_checkout_fields( $fields ) { 

    unset($fields['billing']['billing_state']); 
    unset($fields['billing']['billing_phone']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_company']);
    
    return $fields; 

}
// add_filter( 'woocommerce_shipping_fields', 'max_3u_modify_shipping_fields', 20, 1 );
// function max_3u_modify_shipping_fields($fields) {
//     $fields['shipping_country']['label'] = '';
//     $fields['shipping_country']['class'] = array('max_3u_shipping_checkout_fields');
//     $fields['shipping_state']['required'] = false;
//     return $fields;
// }




/* mo start */
function register_size_image() {
   add_image_size( 'category_thumb', 1360, 323,true );
   add_image_size( 'product_thumb', 440, 422,true );
}

add_action( 'after_setup_theme', 'register_size_image' );


function size_of_category_thumb($u)
{
    return array(1360, 323,true);
}
add_filter('subcategory_archive_thumbnail_size', 'size_of_category_thumb');

function size_of_product_thumb($u)
{
    return array(440, 422,true);
}
add_filter('single_product_archive_thumbnail_size', 'size_of_product_thumb');

/* disable category page title */
if(is_product_category())
{
    add_filter( 'woocommerce_show_page_title', '__return_false' ); 
}

add_filter('woocommerce_page_class' , function(){
    if (is_tax('product_cat') && is_archive('product_cat')) {    
        return 'woocommerce';
    }
} ,10, 1);

add_action('woocommerce_shop_loop_item_title', 'poduct_title_append', 11);

function poduct_title_append()
{
    global $product;
    $price = '';
    if( ! empty( $product->min_variation_price ) ) {
        $price .= woocommerce_price($product->min_variation_price);
    } else {
        $price .= woocommerce_price($product->get_price());
    }
    
    ?>
     <em class="max_author">
        <?php
            $post_obj    = get_post( get_the_id() ); // The WP_Post object
            $author      =  get_the_author_meta( 'display_name', $post_obj->post_author );
        ?>
        by <?php echo ucfirst( $author ); ?>
    </em>
    <em class="max_u3_arc_shop_price"><?php echo $price; ?></em>
    <?php
}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');


/* thumnail update start */
add_action('init', function(){
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
    add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
});

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
    function woocommerce_template_loop_product_thumbnail() {
        echo woocommerce_get_product_thumbnail();
    } 
}

if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {   
    function woocommerce_get_product_thumbnail( $size = 'product_thumb' ) {
        global $post, $woocommerce;
        $output = '<div class="max_bg_thumb">';

        if ( has_post_thumbnail() ) {               
            $output .= get_the_post_thumbnail( $post->ID, $size );
        } else {
             $output .= wc_placeholder_img( $size );
             // Or alternatively setting yours width and height shop_catalog dimensions.
             // $output .= '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="300px" height="300px" />';
        }                       
        $output .= '</div>';
        return $output;
    }
}
/* thumnail update end */

add_filter('woocommerce_currency_symbol', 'max_change_existing_currency_symbol', 10, 2);

function max_change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'EUR': $currency_symbol = 'EUR '; break;
     }
     return $currency_symbol;
}



add_action( 'woocommerce_before_subcategory', 'before_imageless_category', 9, 1 );
function before_imageless_category( $category ) {
    if( ! get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true ) ) {
        echo '<div class="no-category-image">';
    }
    remove_action('woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
    add_action('woocommerce_before_subcategory_title', 'custom_subcategory_thumbnail', 10, 1 );
}

add_action( 'woocommerce_after_subcategory', 'after_imageless_category', 11, 1 );
function after_imageless_category( $category ) {
    if( ! get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true ) ) {
        echo '</div>';
    }
}

function custom_subcategory_thumbnail( $category ) {
    $small_thumbnail_size = apply_filters( 'subcategory_archive_thumbnail_size', 'woocommerce_thumbnail' );
    $dimensions           = wc_get_image_size( $small_thumbnail_size );
    $thumbnail_id         = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );

    if ( $thumbnail_id ) {
        $image        = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size );
        $image        = $image[0];
        $image_srcset = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $thumbnail_id, $small_thumbnail_size ) : false;
        $image_sizes  = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $thumbnail_id, $small_thumbnail_size ) : false;
    } else {
     //   return;
    }

    if ( $image ) {
        // Prevent esc_url from breaking spaces in urls for image embeds.
        // Ref: https://core.trac.wordpress.org/ticket/23605.
        $image = str_replace( ' ', '%20', $image );

        // Add responsive image markup if available.
        if ( $image_srcset && $image_sizes ) {
            echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" srcset="' . esc_attr( $image_srcset ) . '" sizes="' . esc_attr( $image_sizes ) . '" />';
        } else {
            echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" />';
        }
    }
}


add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
                'navigation-widgets',
            )
        );

// Add theme support for selective refresh for widgets.
add_theme_support( 'customize-selective-refresh-widgets' );

function u3_one_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Filters', 'u3' ),
            'id'            => 'archive-filter',
            'description'   => esc_html__( 'Add widgets here to appear in your archive page.', 'u3' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Product page footer', 'u3' ),
            'id'            => 'product-footer',
            'description'   => esc_html__( 'Add widgets here to appear in your product page.', 'u3' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    // Register sidebar to add logo image in comming soon page.
    register_sidebar(
        array(
            'name'          => esc_html__( 'Comming soon page image logo', 'u3' ),
            'id'            => 'comming-soon-image-logo',
            'description'   => esc_html__( 'Add widgets here to add logo image in comming soon page.', 'u3' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'u3_one_widgets_init' );

add_theme_support( 'woocommerce' );
//add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );





function max_add_author_post_type_support() {
    add_post_type_support( 'product',  array(  'author' ) );
    add_post_type_support( 'post', 'author' );
    add_post_type_support( 'page', 'author' );

}
add_action( 'init', 'max_add_author_post_type_support', 12 );

/*
add_filter('query_var', 'max_filter_var');
function max_filter_var($public_query_vars) {
    $public_query_vars[] = 'filter_artist';
    $public_query_vars[] = 'added';
    return $public_query_vars;
}*/

function fwp_archive_per_page( $query ) {
    if ( is_archive( 'product-cat' ) && $query->is_main_query() ) {
        //$query->set( 'posts_per_page', 2 );
        if(isset($_GET['medium'])){
            $filter_artist = esc_html($_GET['medium']);
            if(!empty($filter_artist)){
                $author__in['relation'] = 'AND';
                $filter_artist_array = explode(',', $filter_artist);
                $author__in[] =     array(
                                        'operator' => 'IN',
                                        'field' => 'term_taxonomy_id',
                                        'taxonomy' => 'product_visibility',
                                        'terms' => $filter_artist_array
                                    ); 

                $query->set('tax_query', $author__in );
            }
        }
        if(isset($_GET['added'])){
            $added = esc_html($_GET['added']);
            if($added == 'newest'){
                $query->set( 'orderby', 'title' );
                $query->set('order', 'DESC');
            }else if($added == 'oldest'){
                $query->set('orderby', 'title' );
                $query->set('order', 'ASC');
            }
            $query->set( 'post_type', [ 'post', 'product' ] );
        }
        if(isset($_GET['filter_artist'])){        
            $filter_artist = esc_html($_GET['filter_artist']);
            if(!empty($filter_artist)){
                $author__in = explode(',', $filter_artist);
                $query->set('author__in', $author__in );
            }
            // echo '<pre>'; print_r($query); exit;
        }
    }
}
add_filter( 'pre_get_posts', 'fwp_archive_per_page' );



add_action( 'wp_ajax_max_range_select_save', 'max_range_select_save' );
add_action( 'wp_ajax_nopriv_max_range_select_save', 'max_range_select_save' );

function max_range_select_save() {
    if(isset($_REQUEST['range'])){
        $range = intval($_REQUEST['range']);
        if($range !== '' ){
            setcookie("max_range_select", $range, time() + (3600 * 24 * 365), COOKIEPATH, COOKIE_DOMAIN);  /* expire in 1 year */
            echo 'saved';
        }
    }
    wp_die();
}
add_action( 'wp_ajax_max_contact_artist', 'max_contact_artist' );
add_action( 'wp_ajax_nopriv_max_contact_artist', 'max_contact_artist' );

function max_contact_artist() {
    $options        = $_POST['options'];
    $your_msg       = $_POST['your_msg'];
    $customer_email = $_POST['customer_email'];
    $author_id      = $_POST['author_id'];
    $author_email   = get_the_author_meta( 'email' , $author_id );
    $message        = '';
    $message        .= $your_msg;
    $message        .= "\r\n".'This Message Sent By: '. $customer_email;
    $admin_email        = get_option('admin_email');
    $subject = $options;
    $headers = 'From: '. $admin_email . "\r\n" .
        'Reply-To: ' . $admin_email . "\r\n";

    //Here put your Validation and send mail
    $sent = wp_mail($author_email, $subject, strip_tags($message), $headers);
    if($sent) {
        echo 200;
    }//message sent!
    else  {
        echo 201;
    }
    wp_die();
}

/* mo end */


/**
 * Display the custom checkbox field.
 * @since 1.0.0
 */
function max_3u_create_custom_checkbox_field() {
 $args = array(
     'id' => 'max_3u_text_field_title',
     'label' => __( 'Show Contact Artist Button', 'max_3u' ),
     // 'class' => 'max-3u-custom-checkbox-field',
     'desc_tip' => true,
     'description' => __( 'This checkbox is used to show contact the artist button on single product page', 'max_3u' ),
 );

 woocommerce_wp_checkbox( $args );
}
add_action( 'woocommerce_product_options_general_product_data', 'max_3u_create_custom_checkbox_field' );

/**
 * Save the custom checkbox field
 * @since 1.0.0
 */
function max_3u_save_custom_field( $post_id ) {
 $product = wc_get_product( $post_id );
 $title = isset( $_POST['max_3u_text_field_title'] ) ? $_POST['max_3u_text_field_title'] : '';
 $product->update_meta_data( 'max_3u_text_field_title', sanitize_text_field( $title ) );
 $product->save();
}
add_action( 'woocommerce_process_product_meta', 'max_3u_save_custom_field' );

/**
 * contact artist modal shortcode function
 * @since 1.0.0
 */
function max_contact_artist_modal_function( ) {
    ?>
    <!-- The Modal -->
    <div id="max_3u_popup_container" class="max_3u_popup_container">
      <!-- Modal content -->
      <div class="max_3u_modal-content">
        <span class="max_3u_close">&times;</span>
            <div class="popup_card_outer">
                <!-- <div class="popup_card"> -->
                    <div class="prc">
                        <div class="max_u_r_contacting">YOU ARE CONTACTING</div>
                        <div class="max_contacting_artist_name"><?php echo the_author_meta( 'display_name' , get_post_field ('post_author', get_the_id()) ); ?></div>
                        <div style="width: 90%; margin: 0px auto;height: 2px; background-color: black;margin-top: 20px;"></div>
                        <div class="max_contacting_invlp">
                            <svg xmlns="http://www.w3.org/2000/svg" class="my_env" version="1.0" width="75.000000pt" height="56.000000pt" viewBox="0 0 75.000000 56.000000" preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,56.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                    <path d="M0 280 l0 -280 375 0 375 0 0 280 0 280 -375 0 -375 0 0 -280z m549 103 c-73 -76 -143 -144 -155 -152 -28 -18 -28 -18 -193 152 l-134 137 308 0 308 0 -134 -137z m-402 -210 l-107 -108 0 215 0 215 107 -108 108 -107 -108 -107z m563 105 l0 -213 -107 107 -108 108 105 105 c58 58 106 105 107 105 2 0 3 -96 3 -212z m-389 -63 c22 -19 46 -35 54 -35 8 0 33 17 56 37 l40 37 107 -107 107 -107 -310 0 -310 0 105 105 c58 58 106 105 109 105 2 0 21 -16 42 -35z"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="plc">
                        <form class="my_form">
                            <table>
                                <tr>
                                    <td style="padding-top: 20px;"><label for="abc" class="max_reading">REGARDING</label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select id="abc" name="abc">
                                            <option value="">PLEASE SELECT</option>
                                            <option value="COMMISSION">COMMISSION</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="def" class="max_message">your Message</label></td>
                                </tr>
                                <tr>
                                    <td><textarea id="your_msg" name="your_msg" rows="4" cols="50" style="resize:none"></textarea></td>
                                </tr>
                                <tr>
                                    <td><label for="email" class="max_email">EMAIL<span style="font-family: 'Helvetica Thin Cond';font-size: 1rem;font-weight:bold; float: right;letter-spacing: 0.5px;">*You will be contacted back on this email address</span></label></td>
                                </tr>
                                <tr>
                                    <td><input type="text" id="email" name="email"></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;"><input type="hidden" value="<?php echo get_post_field ('post_author', get_the_id()); ?>" id="author_id" name="author_id">
                                    <button type="button" id="submit_msg" name="submit_msg">SUBMIT MESSAGE</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                <!-- </div> -->
                <!-- content end-->
            </div><!--content outer end-->
      </div>

    </div>
    <style>

        /*POPUP start*/
        .max_3u_popup_container {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .max_reading, .max_message, .max_email{
            font-family: 'Axis-Extrabold';
            font-size: 1.01rem;
            padding-left: 14px;
            letter-spacing: 1px;
        }

        /* Modal Content/Box */
        .max_3u_modal-content {
            background-color: #fefefe;
            margin: 7% 30%;
            padding: 20px;
            position: relative;
            border: 1px solid #888;
            width: 100%;
            max-width: 900px;
        }

        /* The Close Button */
        .max_3u_close {
            float: right;
            font-size: 28px;
            position: absolute;
            font-weight: bold;
            right: 0;
            top: -30px;
            left: 100%;
            background: black;
            width: 30px;
            height: 30px;
            color: #fff;
            text-align: center;
            border-radius: 20px;
        }

        .max_3u_close:hover,
        .max_3u_close:focus {
          color: #fff;
          text-decoration: none;
          cursor: pointer;
        }
        .max_3u_left_contact{
            text-align: center;
            width: 70%;
        }
        .error_msg{
            color: red;
            margin: 0 !important;
            font-size: 11px !important;
            font-weight: 100 !important;
            font-font: Helvetica Thin !important;
        }
        .artist_modal {
            display: none;
            position: absolute;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .max_3u_pages{
            position: relative;
        }
        .popup_card_outer {
            width: 100%;
            height: auto;
            display: flex;
        }
        .popup_card {
            width: 100%;
            height: 100%;
            position: relative;
            background: #fff;
            height: auto;
            display: block;
        }
        .prc {
            width: 35%;
            margin-top: 0;         
        }
        .prc div.max_u_r_contacting{
            font-family: 'Helvetica Thin';
            font-size: 1.3rem;
            padding: 120px 0 0px 0px;
            letter-spacing: 2px;
            max-width: 100%;
            overflow: auto;
            font-weight: bold;
            text-align: center;
        }
        #abc{
            background-image: url("<?php echo get_template_directory_uri().'/images/caret.png' ?>");
            background-repeat: no-repeat;
            bottom: 0px;
            border: 2px solid #000;
            background-position: center;
            background-size: 10px;
            appearance: none;
            background-position-x: 97%;
            /*background-position-y: 5px;*/
        }
        .prc div.max_contacting_artist_name {
            font-family: "Couture";
            font-size: 2.5rem;
            padding: 50px 0px 0px 0;
            max-width: 100%;
            overflow: auto;
            text-align: center;
            word-break: break-word;
        }
        .prc div.max_contacting_invlp {
            width: 100%;
            text-align: center;
            margin: 70px 0 0 0;
            /*padding: 35px;*/
        }
        .my_env {
            width: 65px;
        }
        .plc {
            width: 65%;
            padding-left: 40px;
        }
        #abc, #email {
            height: 45px;
        }
        #your_msg {
            height: 136px;
        }

        #email {
            margin: 5px 0px 20px 0px !important;
        }
        #submit_msg {
            font-size: 1.5rem;
            color: white;
            border: none;
            background: black;
            font-family: "Helvetica Thin Cond";
            padding: 10px;
            cursor: pointer;
            letter-spacing: 3px;
            width: 300px;
        }
        /* The artist_modal_hide Button */
        .poup_artist_modal_hide {
            color: white;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            /*border: solid 1px black;*/
            height: 30px;
            width: 30px;
            border-radius: 50%;
            background: black;
            text-align: center;
            top: -30px;
            right: -30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .max_3u_popup_label_field_con{
            padding-top: 20px;
        }
        .my_form{
            display: grid;
        }
        .my_form div{
            padding-right: 5%;
        }
        .artist_modal_hide:hover,
        .artist_modal_hide:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
            color: white;
        }
        
        #email,
        #abc,
        #your_msg {
            /*margin: 5px 0 0 0;*/
            margin: 5px 0px 30px 0px; 
            font-family: Open Sans;
            padding-left: 10px;
            font-weight: bold;
            font-size: 1.06rem;
            width: 100%;
        }
        #abc > option{
            font-family: Open Sans;
            font-size: 1.06rem;
        }
        @media only screen and (max-width: 992px) and (min-width:768px){
            .prc div.max_u_r_contacting{
                font-size: 18px;
            }
        }
        @media only screen and (max-width: 992px) {
            .info-p1{
                width: 100%;
            }
            .max_3u_pages{
                width: 100% !important;
                margin: 0 !important;
            }
            .max-u3-info-w--70{
                padding:0 20px ;
            }
        }
        @media(max-width:767px){
            .popup_card_outer {
                display: flex;
                margin: 50px 0;
            }
            .max_u-3 {
                z-index: 0;
                display: none;
            }
            .popup_card {
                width: 100%;
                margin: 0;
                height: auto;
                padding: 30px 0;
            }
            .popup_card {
                width: 75%;
                padding: 15px;
                margin: 0 0 0 100px;
            }
            .prc {
                width: 100%;
            }
            .prc div.max_u_r_contacting{
                margin: 0;
                padding: 30px 0;
            }
            .prc div.max_contacting_artist_name {
                margin: 0;
                padding: 0;
            }
            .prc div.max_contacting_invlp {
                margin: 0;
            }
            
            #email,
            #abc,
            #your_msg {
                margin: 0;
                width: 100%;
            }
            #submit_msg {
                margin: 28px 0 0 0;
                width: 100%;
            }
        }

        /*POPUP end*/
    </style>
    <script type="text/javascript">   
        jQuery(document).ready(function(){
            
            jQuery(".max_3u_close").on('click', function(){
                jQuery("#max_3u_popup_container").hide();
            });

            jQuery("#contact_artist").on('click', function(){
                jQuery("#max_3u_popup_container").show();
            });

            jQuery('#submit_msg').click(function (){
                var getSiteAdminURL = max_3u_ajax_url.ajax_url;
                var getSiteURL = getSiteAdminURL.replace('/wp-admin/admin-ajax.php', '');
                var options = jQuery('#abc').val();
                if(options == ''){
                    jQuery('#abc').closest('div').find('.error_msg').remove();
                    jQuery('#abc').css({'border': '1px solid red'});
                    jQuery('#abc').closest('div').find('#abc').after('<label class="error_msg" style="color: red">Please select an option</label>');
                    return false;
                }else{
                    jQuery('#abc').css({'border': '1px solid black'});
                    jQuery('#abc').closest('div').find('.error_msg').remove();
                }
                var your_msg = jQuery('#your_msg').val();
                if(your_msg == ''){
                    jQuery('#your_msg').closest('div').find('.error_msg').remove();
                    jQuery('#your_msg').css({'border': '1px solid red'});
                    jQuery('#your_msg').closest('div').find('#your_msg').after('<label class="error_msg" style="color: red">Please enter a message</small>');
                    return false;
                }else{
                    jQuery('#your_msg').css({'border': '1px solid black'});
                    jQuery('#your_msg').closest('div').find('.error_msg').remove();
                }
                var customer_email = jQuery('#email').val();
                var re = /\S+@\S+\.\S+/;
                var msg = re.test(customer_email);
                if(msg){
                    jQuery('#email').css({'border': '1px solid black'})
                    jQuery('#email').closest('div').find('.error_msg').remove();
                }else{
                    jQuery('#email').closest('div').find('.error_msg').remove();
                    jQuery('#email').css({'border': '1px solid red'});
                    jQuery('#email').closest('div').find('#email').after('<label class="error_msg" style="color: red">Please enter a valid email</small>');
                    return false;
                }
                jQuery(this).attr('disabled', true);
                var fd = new FormData();
                fd.append('options', options);
                fd.append('your_msg', your_msg);
                fd.append('action', 'max_contact_artist');
                fd.append('customer_email', customer_email);
                fd.append('author_id', jQuery('#author_id').val());
                jQuery.ajax({
                    type: "post",
                    url: getSiteAdminURL,
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        if (res == 200) {
                            location.reload();
                        }else{
                            jQuery(this).attr('disabled', false);
                        }
                    },
                });
            });
        });
    </script>
    <?php
}
add_shortcode( 'max_contact_artist_modal', 'max_contact_artist_modal_function' );

// Disables the block editor from managing widgets in the Gutenberg plugin.
// add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// // Disables the block editor from managing widgets.
// add_filter( 'use_widgets_block_editor', '__return_false' );


  
add_action('wp_footer', 'max_animation_links');

function max_animation_links(){
?>

<style type="text/css">
    .pages_list{
        display: none;
    }
    .home .max_3u_cat_menu {
        background-color: transparent;
    }
    .max_3u_cat_menu{
        display: flex !important;
        flex-direction: column;
    }
    .max_3u_font_awesome_icons_section {        
        position: fixed;
        bottom: 30px;
    }
    .bg_white .max_3u_font_awesome_icons_section,
    .bg_white .max_3u_cat_menu{
        background: #fff;        
        -webkit-transition: background-color 700ms linear;
        -o-transition: background-color 700ms linear;
        -moz-transition: background-color 700ms linear;
        -ms-transition: background-color 700ms linear;
        transition: background-color 700ms linear;
    }
    .max_3u_cat_menu .sub-menu
    {
        /*transition: opacity 1s ease-out;*/
        /*transition: height 0ms 400ms, opacity 400ms 0ms;*/
        /*opacity: 0;*/
        /*height: auto;*/
        /*-webkit-transition: height 500ms, left 500ms;
        -moz-transition: height 500ms, left 500ms;
        -o-transition: height 500ms, left 500ms;
        transition: height 500ms, left 500ms;*/
        max-height: 0;
        opacity: 0;
        transition: max-height 1000ms, opacity 30ms;
        -webkit-transition: max-height 1000ms, opacity 30ms;

    }
    .main_ul > .current-menu-ancestor > ul.sub-menu,
    .current-menu-item .sub-menu{
        opacity: 1;
        /* display: block; */
        /*height: auto;*/
        /*transition: opacity 1s ease-out;*/
        /*animation: fade-in 1s;*/
        /*transition: height 0ms 1000ms, opacity 600ms 0ms;*/
        max-height: 800px;
        opacity: 1;
        transition: max-height 0, opacity 0ms;
        -webkit-transition: max-height 0, opacity 0ms;
    }
     
/*    .main_ul > .menu-item-has-children > ul {
        display: block;
        margin: 0;
    }*/
     
    .center_heading {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate( -50% ,-50%);
        color: #fff;    
        font-size: 2.2em;
        font-family: 'Helvetica Thin Cond thin';
        text-align: center;
        display: block;
        min-width: 60vw;
        letter-spacing: .25em;
        text-align: center;
    }

    @media only screen and (max-width: 768px){
        .max_u3_print_shop_now > div > a > div > div{
            font-family: 'Axis-Extrabold' !important;
            font-weight: bold !important;
            font-size: 1.5rem !important;
            letter-spacing: 1px;
        }
        .n2-ss-slider .n2-ss-slider-wrapper-inside .n2-ss-slider-controls{
            top: -26vh !important;
        }
        .max_u3_prints_text > h1{
            font-family: 'Helvetica Thin Cond' !important;
            font-size: 2rem !important;
            font-weight: bold !important;
            color: black !important;
        }
        .max_u3_print_shop_now{
            /*margin-bottom: 30px !important;*/
        }
        .max_u3_prints_text_two{
            margin-bottom: 35px !important;
        }

        .max_u3_prints_text_two > h1{
            font-family: 'Helvetica Thin Cond Thin' !important;
            font-size: 2rem !important;
            font-weight: bold !important;
            color: black !important;
        }
        .n2-bullet{
            border: 1px solid black !important;
            padding: 6px !important;
            margin-left: 10px !important;
            background: transparent !important;
        }
        .max_u3_prints_text{
            /*margin-bottom: 40px !important;*/
            margin-top: 8vh !important;
        }
        .max_u3_all_prints_text{
            position: relative;
            top: 25vh;
        }
        .max_u3_all_prints_text > div > div > p{
            font-family: 'Couture' !important;
            font-size: 0.9rem !important;
            color: black !important;
            letter-spacing: 1px !important;
        }
        .max_u3_all_prints_text > div > div  > p{
            -webkit-animation-name: bounce;
            -webkit-animation-duration: 0.5s;
            -webkit-animation-direction: alternate;
            -webkit-animation-timing-function: cubic-bezier(
            .5, 0.05, 1, .5);
            -webkit-animation-iteration-count: infinite;
        }
        @-webkit-keyframes bounce {
            from {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
            to {
                -webkit-transform: translate3d(0, 10px, 0);
                transform: translate3d(0, 10px, 0);
            }
        }
        .n2-ss-slider{
            height: 100vh;
        }
        .max_u3_slider_drop_down{
            position: relative;
            top: 28vh;
        }
        .n2-active{
            background: #e7b9a8 !important;
        }
    }
</style>
<?php    
global $wpdb;

$args = array(
        'post_type' => 'page',//it is a Page right?
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => 'max-home-page-text.php', // template name as stored in the dB
            )
        )
    );
$my_query = new WP_Query($args);
//echo '<pre>'; print_r($my_query);
//$mypages = get_pages( array( 'child_of' => 0, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );
if(count($my_query->posts) > 0)
{
    foreach( $my_query->posts as $page ) {
        $page_id =  $page->ID;
        $page_url =  get_permalink($page_id);
        $page_image_url = wp_get_attachment_url( get_post_thumbnail_id($page_id), 'thumbnail' );
        ?>
        <div class="pages_list" data-pageid="<?php echo $page_id ?>" data-pageurl="<?php echo $page_url ?>" data-imageurl="<?php echo $page_image_url ?>" >            
            <?php echo $page->post_title; ?>    
        </div>
        <?php
    }   
 }
?>
<div class="max_home_content"></div>
<script type="text/javascript">
    jQuery(document).ready(function(){
         jQuery('#main_ul_id.main_ul > li > a').on('click', function(e){
            
            var new_window = true;

            e.preventDefault();
            var that = jQuery(this);
            // jQuery('#main_ul_id.main_ul > .menu-item-has-children').removeClass('current-menu-item');
            jQuery('#main_ul_id.main_ul > .menu-item-has-children > a').not(that).closest('li').find('ul').animate({height: "auto"}, 300);
            jQuery('#main_ul_id.main_ul > .menu-item-has-children > a').not(that).closest('li').find('ul').slideUp(300);

            if( that.closest('li').find('ul').is(':visible') ) {
                return false;
            } 
    
            // jQuery('li').removeClass('current-menu-item');
            jQuery('li').removeClass('current-menu-ancestor');

            jQuery(this).closest('li').find('ul').animate({height: "auto"}, 300);
            jQuery(this).closest('li').find('ul').slideDown(300);

            var href = that.attr('href');

            setTimeout(function(){
                {   
                    
                    jQuery('.home').css('background-image', 'unset');
                    jQuery('.max_3u_font_awesome_icons_section').css('background', 'white');
                    if( jQuery(window).width() > 768 ) {
                        jQuery('.max_page_content').css('border', '20px solid #fff');
                        jQuery('.max_3u_pages').css('width', 'calc(100% - 350px)');
                        jQuery('.max_page_content').css('border-left', 'none');
                        jQuery('.max_page_content').css('border-top', 'none');
                    }
                    if( jQuery(window).width() > 768 && jQuery(window).width() < 992 ) {
                        jQuery('.max_page_content').css('border-right', '0px');
                    }
                    jQuery('.max_page_content').css('margin-top', '0px');
                    jQuery('.top_header_search_form').css('background', 'white');
                    jQuery('.top_header_search_form').css('padding-right', '15px');
                    that.parent('li').addClass('current-menu-item');
                    that.parent('li').addClass('current-menu-ancestor');

                    // console.log(new_window + 'd');
                }
            },100);
 

            
            jQuery('.pages_list').each(function(){

                var mtch = jQuery(this).attr('data-pageurl');
                var imageurl = jQuery(this).attr('data-imageurl');
                var match = mtch.match('/' + href + '/i');

                
                    if(imageurl.length > 0){
                        jQuery('.max_page_content').css('background-image', 'url(' + imageurl + ')');
                        jQuery('.max_page_content').css('background-size', 'cover');
                    }
                
                    if(mtch.match(href)){ 
                        if( jQuery(window).width() >= 768 ) {    
                    //if(match){     
                            var heading = jQuery.trim(jQuery(this).html());
                            
                            jQuery('.max_page_content').html('<div class="max-u3-w--70"><div class=center_heading><h1>' + heading + '</h1></div></div>');            
                        // }
                        new_window = false;
                        }else{
                            jQuery('.n2-section-smartslider').show();
                            new_window = false;
                        }
                    }
            });
            
            

            if(new_window == true){
                window.location = href;
            }

            
         }); 
    });
</script>
 <?php
 if( is_product() ) { ?>
    <style type="text/css">
        @media only screen and (max-width: 768px){
            .menu_mobile{
                display: none !important;
            }
        }
    </style>
    <?php
    }
}
add_action( 'personal_options_update', 'save_user_profile_social_fields' );
add_action( 'edit_user_profile_update', 'save_user_profile_social_fields' );

function save_user_profile_social_fields( $user_id ) {
    if ( empty( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'update-user_' . $user_id ) ) {
        return;
    }
    
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
    update_user_meta( $user_id, 'instagram', $_POST['instagram'] );
    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
}


add_action( 'show_user_profile', 'max_user_profile_social_fields' );
add_action( 'edit_user_profile', 'max_user_profile_social_fields' );

function max_user_profile_social_fields( $user ) { ?>
    <h3><?php _e("Social contact information", "blank"); ?></h3>

    <table class="form-table">
    <tr>
        <th><label for="facebook"><?php _e("Facebook"); ?></label></th>
        <td>
            <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your facebook id."); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="instagram"><?php _e("Instagram"); ?></label></th>
        <td>
            <input type="text" name="instagram" id="instagram" value="<?php echo esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your instagram id."); ?></span>
        </td>
    </tr>
    <tr>
    <th><label for="twitter"><?php _e("Twitter"); ?></label></th>
        <td>
            <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your twitter id."); ?></span>
        </td>
    </tr>
    </table>
<?php }

//Make dots instead of gallery images in woocommerce.
//add_filter( 'woocommerce_single_product_carousel_options', 'max_u3_custom_update_woo_flexslider_options' );
function max_u3_custom_update_woo_flexslider_options( $options ) {

    $options['controlNav'] = wp_is_mobile() ? true : 'thumbnails';
    $options['allowOneSlide'] = true;

    return $options;
}

//Woocommerce get price html 
add_filter('woocommerce_variable_price_html', 'max_u3_custom_variation_price', 10, 2);
function max_u3_custom_variation_price( $price, $product ) {
    $price = '';
    if( ! empty( $product->min_variation_price ) ) {
        $price .= woocommerce_price($product->min_variation_price);
    } else {
        $price .= woocommerce_price($product->get_price());
    }
    return $price;
}

function max_3u_end_guest() {
    WC()->session->__unset( 'max_3u_guest_login_info' );
}
add_action('wp_login', 'max_3u_end_guest');


add_filter ( 'woocommerce_account_menu_items', 'max_u3_one_more_link' );

function max_u3_one_more_link( $menu_links ){

    // we will hook "anyuniquetext123" later
    if( !is_user_logged_in() ){
        $new = array( 'max-u3-sign-in' => 'SIGN IN', 'max-u3-preferences' => 'PREFERENCES' );
    }else{
        $new = array( 'max-u3-preferences' => 'PREFERENCES' );
    }

    // or in case you need 2 links
    // $new = array( 'link1' => 'Link 1', 'link2' => 'Link 2' );

    // array_slice() is good when you want to add an element between the other ones
    if ( array_key_exists( "max-u3-sign-in", $new ) == false ) {
        $menu_links = array_slice( $menu_links, 0, 5, true ) 
        + $new 
        + array_slice( $menu_links, 5, NULL, true );
    }else{ 
        $menu_links = array_slice( $menu_links, 0, 1, true ) 
        + $new 
        + array_slice( $menu_links, 1, NULL, true );
    }

    return $menu_links;
 
 
}

add_action( 'init', 'max_u3_add_endpoint' );
function max_u3_add_endpoint() {

    // WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
    add_rewrite_endpoint( 'max-u3-preferences', EP_PAGES );

}

// function max_u3_save_user_info(){
//     if ( isset( $_POST['max_u3_save_user_info_btn'] ) ) {
//         $name = '';
//         $last_name = '';
//         $email = '';
//         $address = '';
//         $city = '';
//         $zip_code = '';
//         $country = '';
//         $user_info = [];
//         $error_count = 0;

//         if ( ! empty( $_POST['new_name'] ) ) {
//             $name = sanitize_text_field( wp_unslash( $_POST['new_name'] ) );
//         }
//         if ( ! empty( $_POST['new_last_name'] ) ) {
//             $last_name = sanitize_text_field( wp_unslash( $_POST['new_last_name'] ) );
//         }
//         if ( ! empty( $_POST['new_email'] ) ) {
//             $email = sanitize_text_field( wp_unslash( $_POST['new_email'] ) );
//         }
//         if ( ! empty( $_POST['address'] ) ) {
//             $address = sanitize_text_field( wp_unslash( $_POST['address'] ) );
//         }
//         if ( ! empty( $_POST['city'] ) ) {
//             $city = sanitize_text_field( wp_unslash( $_POST['city'] ) );
//         }
//         if ( ! empty( $_POST['zip_code'] ) ) {
//             $zip_code = sanitize_text_field( wp_unslash( $_POST['zip_code'] ) );
//         }
//         if ( ! empty( $_POST['country'] ) ) {
//             $country = sanitize_text_field( wp_unslash( $_POST['country'] ) );
//         }

//         $user_info = array(
//             'name' => $name,
//             'last_name' => $last_name,
//             'email' => $email,
//             'address' => $address,
//             'city' => $city,
//             'zip_code' => $zip_code,
//             'country' => $country
//         );
//         update_user_meta( get_current_user_id(), 'max_u3_user_info', $user_info );

//         wp_safe_redirect( get_permalink( get_option('woocommerce_myaccount_page_id') ).'/max-u3-preferences' );
//     }
// }

function max_u3_save_user_unit_currency(){
    if ( isset( $_POST['max_u3_modify_curr_units_btn'] ) ) {
        $max_u3_selected_unit = '';
        if ( ! empty( $_POST['max_u3_selected_unit'] ) ) {
            $max_u3_selected_unit = sanitize_text_field( wp_unslash( $_POST['max_u3_selected_unit'] ) );
        }
        update_user_meta( get_current_user_id(), 'max_u3_user_selected_unit', $max_u3_selected_unit );
        wp_safe_redirect( get_permalink( get_option('woocommerce_myaccount_page_id') ).'/max-u3-preferences' );
    }
}

function max_u3_save_user_selected_color(){
    if ( isset( $_POST['max_u3_modify_palette_color_btn'] ) ) {
        $max_u3_selected_color = '';
        if ( ! empty( $_POST['max_u3_selected_color'] ) ) {
            $max_u3_selected_color = sanitize_text_field( wp_unslash( $_POST['max_u3_selected_color'] ) );
        }
        update_user_meta( get_current_user_id(), 'max_u3_user_selected_color', $max_u3_selected_color );
        wp_safe_redirect( get_permalink( get_option('woocommerce_myaccount_page_id') ).'/max-u3-preferences' );
    }   
}

add_action( 'woocommerce_account_max-u3-preferences_endpoint', 'max_u3_my_account_endpoint_content' );

function max_u3_my_account_endpoint_content() {
    $unit = '';
    $color = '';
    $user_new_info = '';

    $unit = get_user_meta( get_current_user_id() ,'max_u3_user_selected_unit', true );
    $color = get_user_meta( get_current_user_id() ,'max_u3_user_selected_color', true );
    $user_new_info = get_user_meta( get_current_user_id(), 'max_u3_user_info', true );
    // of course you can print dynamic content here, one of the most useful functions here is get_current_user_id()
    ?>
    <style type="text/css">
        .entry-header{
            display: none;
        }
        .max_u3_pref_heading{
            font-size: 2rem;
            font-family: "Couture";
            text-align: center;
            display: block;
            letter-spacing: 2px;
        }
        .max_u3_preferences_container{
            width: 100%;
        }
        .max_u3_preferences_container > h5{
            font-size: 1.3rem;
            font-family: "Couture";
            letter-spacing: 2px;
            margin-top: 50px;
            margin-bottom: 40px;
        }
        .max_u3_my_account_address{
            width: 100%;
            display: flex;
            /*flex-wrap: wrap;*/
            justify-content: space-between;
        }
        .max_u3_form_left_side{
            width: 45%;
            margin-right: 70px;
        }
        .max_u3_form_right_side{
            width: 45%;
            margin-right: 40px;
        }
        .max_u3_inp_fields{
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid black;
        }
        .max_u3_form_left_side > label, .max_u3_form_right_side > form > label{
            margin-left: 20px;
            letter-spacing: 2px;
            font-size: 1rem;
            font-family: "Couture";
        }
        .max_u3_email_info{
            font-size: 0.8rem;
            text-align: right;
            font-family: 'Helvetica Thin';
            font-weight: 700;
        }
        .max_u3_save_user_info_btn{
            width: 190px;
            max-width: 200px;
            background: black;
            color: #fff;
            font-family: "Couture";
            letter-spacing: 3px;
            font-size: 1.4rem;
            padding: 7px;
            border: 1px solid black;
            float: right;
            margin-top: 30px;
        }
        .max_u3_my_account_hr{
            width: auto;
            border: 1px solid black;
            margin-top: 90px;
        }
        .max_u3_h_four_tag{
            font-size: 1.5rem;
            font-family: "Axis";
            letter-spacing: 2px;
            margin-top: 40px;
            margin-bottom: 30px;
        }
        .max_u3_colors_palette_cont{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .max_u3_select_color{
            width: 75%;
            display: flex;
        }
        .max_u3_save_colors_palette_color{
            margin-right: 45px;
        }
        .max_u3_colors_palette_c2c997,.max_u3_colors_palette_e3a893, .max_u3_colors_palette_ccb577, .max_u3_colors_palette_8fc8c1, .max_u3_colors_palette_d4cc8d{
            width: 10%;
            height: 70px;
            margin-right: 30px;
        }
        .max_u3_colors_palette_c2c997{
            background: #c2c997;
        }
        .max_u3_colors_palette_e3a893{
            background: #e3a893;
        }
        .max_u3_colors_palette_ccb577{
            background: #ccb577;
        }
        .max_u3_colors_palette_8fc8c1{
            background: #8fc8c1;
        }
        .max_u3_colors_palette_d4cc8d{
            background: #d4cc8d;
        }
        .max_u3_select_currency_container{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .max_u3_currency_meters{
            width: 45%;
            display: flex;
            margin-right: 20px;
        }
        .max_u3_save_currency{
            width: 45%;
            margin-right: 45px;
        }
        .max_u3_modify_palette_color{
            width: 190px;
            max-width: 200px;
            background: black;
            color: #fff;
            margin-top: 28px;
            font-family: "Couture";
            letter-spacing: 3px;
            font-size: 1.4rem;
            padding: 7px;
            border: 1px solid black;
            float: right;
        }
        .max_u3_modify_curr_units_btn{
            width: 190px;
            margin-top: 15px;
            max-width: 200px;
            background: black;
            color: #fff;
            font-family: "Couture";
            letter-spacing: 3px;
            font-size: 1.4rem;
            padding: 7px;
            border: 1px solid black;
            float: right;
        }
        .max_u3_currency_unit_cm, .max_u3_currency_unit_inc{
            min-width: 80px;
            max-width: 80px;
            height: 70px;
            margin-right: 30px;
            text-align: center;
            border: 1px solid black;
            background: #fff;
            color: black;
        }
        .max_u3_currency_unit_cm > p, .max_u3_currency_unit_inc > p{
            line-height: 68px;
            font-family: 'Helvetica Thin Cond';
            font-size: 1.3rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .max_u3_error_msg{
            display: none;
            color: red;
            margin-left: 0px !important;
            font-size: 0.8rem !important;
            font-family: 'Helvetica Thin' !important;
            font-weight: 700;
            margin-bottom: 10px;
        }
        @media only screen and (max-width: 992px){
            .max_u3_form_left_side, .max_u3_form_right_side, .max_u3_save_colors_palette_color, .max_u3_save_currency {
                width: 100%;
                margin-right: 0px;
                padding-left: 10px;
                padding-right: 10px;
            }
            .max_u3_preferences_container > h5{
                padding-left: 5px;
            }
            .max_u3_h_four_tag{
                padding-left: 5px;
            }
            .max_u3_select_color{
                padding-left: 10px;
                width: 100%;
            }
            .max_u3_modify_palette_color, .max_u3_modify_curr_units_btn{
                /*float: none;*/
                padding-right: 10px;
            }

            .max_u3_currency_meters{
                width: 100%;
                margin-right: 0px;
                padding-left: 10px;
            }
            .max_u3_h_four_tag{
                padding-left: 10px;
            }
        }
        @media only screen and (max-width: 600px){
            .max_u3_colors_palette_c2c997, .max_u3_colors_palette_e3a893, .max_u3_colors_palette_ccb577, .max_u3_colors_palette_8fc8c1, .max_u3_colors_palette_d4cc8d{
                min-width: 18%;
                max-width: 18%;
                margin-right: 2%;
            }
            .max_u3_my_account_address{
                flex-wrap: wrap;
            }
            .max_u3_inp_fields{
                margin-top: 10px;
                margin-bottom: 25px;
            }
            .max_u3_email_info{
                margin-bottom: 10px;
            }
        }
    </style>
    <h2 class="max_u3_pref_heading">PREFERENCES</h2>
     <div class="max_u3_preferences_container">
    <h5>NAME / ADDRESS</h5>
        <?php //max_u3_save_user_info(); ?>
        <div class="max_u3_my_account_address">
            <div class="max_u3_form_left_side">
                <label>NAME</label>
                <input type="text" name="name" class="max_u3_inp_fields" value="<?php echo $user_new_info['name'] ?>">
                <label class="max_u3_error_msg">***Please fill the name field</label>
                <label>LAST NAME</label>
                <input type="text" name="last_name" class="max_u3_inp_fields" value="<?php echo $user_new_info['last_name'] ?>">
                <label class="max_u3_error_msg">***Please fill the last name field</label>
                <label>EMAIL</label>
                <input style="margin-bottom: 2px" type="email" name="email" class="max_u3_inp_fields" value="<?php echo $user_new_info['email'] ?>">
                <label class="max_u3_error_msg">***Please fill the email field</label>
                <p class="max_u3_email_info">*You will recieve updates on the status of your orders on this email address</p>
            </div>
            <div class="max_u3_form_right_side">
                <form method="post">
                    <input type="hidden" name="new_name" class="max_u3_inp_fields" value="<?php echo $user_new_info['name'] ?>">
                    <input type="hidden" name="new_last_name" class="max_u3_inp_fields" value="<?php echo $user_new_info['last_name'] ?>">
                    <input type="hidden" name="new_email" class="max_u3_inp_fields" value="<?php echo $user_new_info['email'] ?>">
                    <label>ADDRESS</label>
                    <input type="text" style="margin-bottom: 2px;" name="address" class="max_u3_inp_fields" value="<?php echo $user_new_info['address'] ?>">
                    <p class="max_u3_email_info">*Include street number and apartment number</p>
                    <label class="max_u3_error_msg">***Please fill the address field</label>
                    <label>CITY</label>
                    <input type="text" name="city" class="max_u3_inp_fields" value="<?php echo $user_new_info['city'] ?>">
                    <label class="max_u3_error_msg">***Please fill the city field</label>
                    <label>ZIP CODE</label>
                    <input type="text" name="zip_code" class="max_u3_inp_fields" value="<?php echo $user_new_info['zip_code'] ?>">
                    <label class="max_u3_error_msg">***Please fill the zip code field</label>
                    <label>COUNTRY</label>
                    <input type="text" name="country" class="max_u3_inp_fields" value="<?php echo $user_new_info['country'] ?>">
                    <label class="max_u3_error_msg">***Please fill the country field</label>
                    <button type="submit" name="max_u3_save_user_info_btn" class="max_u3_save_user_info_btn">MODIFY</button>
                </form>
            </div>
        </div>
        <hr class="max_u3_my_account_hr">
        <h4 class="max_u3_h_four_tag">SITE COLOR PALETTE</h4>
        <div class="max_u3_colors_palette_cont">
            <div class="max_u3_select_color">
                <div style="border: <?php echo ! empty( $color ) && 'c2c997' == $color ? '4px solid black' : '' ?>" data-color="c2c997" class="max_u3_colors_palette_c2c997"></div>
                <div style="border: <?php echo ! empty( $color ) && 'e3a893' == $color ? '4px solid black' : '' ?>" data-color="e3a893" class="max_u3_colors_palette_e3a893"></div>
                <div style="border: <?php echo ! empty( $color ) && 'ccb577' == $color ? '4px solid black' : '' ?>" data-color="ccb577" class="max_u3_colors_palette_ccb577"></div>
                <div style="border: <?php echo ! empty( $color ) && '8fc8c1' == $color ? '4px solid black' : '' ?>" data-color="8fc8c1" class="max_u3_colors_palette_8fc8c1"></div>
                <div style="border: <?php echo ! empty( $color ) && 'd4cc8d' == $color ? '4px solid black' : '' ?>" data-color="d4cc8d" class="max_u3_colors_palette_d4cc8d"></div>
            </div>
            <div class="max_u3_save_colors_palette_color">
                <?php max_u3_save_user_selected_color() ?>
                <form method="post">
                    <input type="hidden" name="max_u3_selected_color" id="max_u3_selected_color">
                    <button type="submit" name="max_u3_modify_palette_color_btn" class="max_u3_modify_palette_color">MODIFY</button>
                </form>
            </div>
        </div>
        <hr class="max_u3_my_account_hr">
        <h4 class="max_u3_h_four_tag" style="margin-bottom:50px">UNITS / CURRENCY</h4>
        <div class="max_u3_select_currency_container">
            <div class="max_u3_currency_meters">
                <div style="border: <?php echo ! empty( $unit ) && 'cm' == $unit ? '4px solid black' : '' ?>" data-unit="cm" class="max_u3_currency_unit_cm">
                    <p>cm</p>
                </div>
                <div style="border: <?php echo ! empty( $unit ) && 'in' == $unit ? '4px solid black' : '' ?>" data-unit="in" class="max_u3_currency_unit_inc">
                    <p>in</p>
                </div>
            </div>
            <div class="max_u3_save_currency">
                <?php max_u3_save_user_unit_currency() ?>
                <form method="post">
                    <input type="hidden" name="max_u3_selected_unit" id="max_u3_selected_unit">
                    <button type="submit" name="max_u3_modify_curr_units_btn" class="max_u3_modify_curr_units_btn">MODIFY</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.max_u3_select_color').find('div').on('click', function(){
                jQuery('.max_u3_select_color').find('div').each(function(){
                    jQuery(this).css('border', 'none');
                });
                jQuery(this).css('border', '4px solid black');
                jQuery('#max_u3_selected_color').val(jQuery(this).attr('data-color'));
            });
            jQuery('.max_u3_currency_meters').find('div').on('click', function(){
                jQuery('.max_u3_currency_meters').find('div').each(function(){
                    jQuery(this).css('border', '1px solid black');
                });
                jQuery(this).css('border', '4px solid black');
                jQuery('#max_u3_selected_unit').val(jQuery(this).attr('data-unit'));
            });
            jQuery('.max_u3_form_left_side').find('input[name=name]').on('keyup', function(){
                jQuery('.max_u3_form_right_side').find('input[name=new_name]').val(jQuery(this).val());
            });
            jQuery('.max_u3_form_left_side').find('input[name=last_name]').on('keyup', function(){
                jQuery('.max_u3_form_right_side').find('input[name=new_last_name]').val(jQuery(this).val());
            });
            jQuery('.max_u3_form_left_side').find('input[name=email]').on('keyup', function(){
                jQuery('.max_u3_form_right_side').find('input[name=new_email]').val(jQuery(this).val());
            });
            let count = 0;
            jQuery('.max_u3_save_user_info_btn').on('click', function(e){
                count = 0;
                jQuery('.max_u3_inp_fields').each(function(){
                    if( jQuery(this).val() == '' ) {
                        count++;
                    }
                });
                if(jQuery('.max_u3_form_left_side > input[name=name]').val() == ''){
                    jQuery('.max_u3_form_left_side > input[name=name]').next().css('display', 'block');
                }else{
                    jQuery('.max_u3_form_left_side > input[name=name]').next().css('display', 'none');
                }
                if(jQuery('.max_u3_form_left_side > input[name=last_name]').val() == ''){
                    jQuery('.max_u3_form_left_side > input[name=last_name]').next().css('display', 'block');
                }else{
                    jQuery('.max_u3_form_left_side > input[name=last_name]').next().css('display', 'none');
                }
                if(jQuery('.max_u3_form_left_side > input[name=email]').val() == ''){
                    jQuery('.max_u3_form_left_side > input[name=email]').next().css('display', 'block');
                }else{
                    jQuery('.max_u3_form_left_side > input[name=email]').next().css('display', 'none');
                }
                if(jQuery('.max_u3_form_right_side > form > input[name=address]').val() == ''){
                    jQuery('.max_u3_form_right_side > form > input[name=address]').next().next().css('display', 'block');
                }else{
                    jQuery('.max_u3_form_right_side > form > input[name=address]').next().next().css('display', 'none');
                }
                if(jQuery('.max_u3_form_right_side > form > input[name=city]').val() == ''){
                    jQuery('.max_u3_form_right_side > form > input[name=city]').next().css('display', 'block');
                }else{
                    jQuery('.max_u3_form_right_side > form > input[name=city]').next().css('display', 'none');
                }
                if(jQuery('.max_u3_form_right_side > form > input[name=zip_code]').val() == ''){
                    jQuery('.max_u3_form_right_side > form > input[name=zip_code]').next().css('display', 'block');
                }else{
                    jQuery('.max_u3_form_right_side > form > input[name=zip_code]').next().css('display', 'none');
                }
                if(jQuery('.max_u3_form_right_side > form > input[name=country]').val() == ''){
                    jQuery('.max_u3_form_right_side > form > input[name=country]').next().css('display', 'block');
                }else{
                    jQuery('.max_u3_form_right_side > form > input[name=country]').next().css('display', 'none');
                }
                if(count != 0){
                    jQuery('.max_u3_inp_fields').css('margin-bottom', '5px');
                }else{
                    if(jQuery(window).width() <= 600 ){
                        jQuery('.max_u3_inp_fields').css('margin-bottom', '25px');
                    }else{
                        jQuery('.max_u3_inp_fields').css('margin-bottom', '20px');
                    }
                }
                if(count != 0){
                    e.preventDefault();
                }
            });
        });
    </script>
    <?php

}

add_filter( 'woocommerce_get_endpoint_url', 'max_u3_hook_endpoint', 10, 4 );
function max_u3_hook_endpoint( $url, $endpoint, $value, $permalink ){
 
    if( $endpoint === 'max-u3-sign-in' ) {
 
        // ok, here is the place for your custom URL, it could be external
        $url = get_permalink( get_option('woocommerce_myaccount_page_id') ).'?max_u3_login';
 
    }
    return $url;
 
}



add_filter('woocommerce_login_redirect', 'max_u3_wc_login_redirect'); 

function max_u3_wc_login_redirect( $redirect_to ) {

   $redirect_to = get_permalink( get_option('woocommerce_myaccount_page_id') );
   return $redirect_to;

}

function max_u3_my_account_menus(){
    if( ! isset( $_GET['max_u3_login'] ) ) {
    ?>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                function max_u3_resize_my_account_nav_menus(){
                    let size = jQuery(window).height() - 45;
                    jQuery('.max_u3_my_account_slides_container > nav > ul > li').css('height', size/3);
                }
                jQuery(window).resize(function(){                           
                    max_u3_resize_my_account_nav_menus();
                });
                max_u3_resize_my_account_nav_menus();
            });
        </script>

        <style type="text/css">
            @media only screen and (max-width: 768px) {
                .max_u3_my_account_slides_container{
                    margin-top: 80px;
                }
            }
            .max_u3_my_account_slides_container{
                width: 100%;
            }
            .entry-header{
                display: none;
            }
            .max_u3_my_account_slides_container > nav{
                width: 100% !important;
                float: none;
            }
            .max_u3_my_account_slides_container > nav > ul > li {
                width: 100%;
                position: relative;
                margin-bottom: 15px;
                background-image: url(http://localhost/theme-animation/wp-content/themes/u3/images/bg-comming-soon-o.jpg);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
            .max_u3_my_account_slides_container > nav > ul > li > a {
                position: absolute;
                top: 50%;
                left: 50%;
                display: block;
                transform: translate(-50%, -50%);
                font-family: 'Helvetica Thin Cond';
                font-size: 4rem;
                letter-spacing: 0.5rem;
                color: #fff;
                text-transform: uppercase;
                text-decoration: none;
                text-align: center;
                width: 100%;
            }
        </style>
        <div class="max_u3_my_account_slides_container">
            <?php echo do_action( 'woocommerce_account_navigation' ); ?>
        </div>
    <?php
    }
}