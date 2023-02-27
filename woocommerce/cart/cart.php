<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<style type="text/css">
    /*.max_3u_header{*/
    /*    display: none !important;*/
    /*}*/
    .max_author{
        font-size: 0.81rem;
        font-family: 'Helvetica Thin Cond';
    }
    .max_u3_cart_total_label{
        display: flex !important;
    }
    .entry-header{
        display: none;
    }
    .entry-content{
        margin: 30px 40px 30px 0px;
    }
    .max_cart_header{
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        border-bottom: 2px solid #000000;
        margin-bottom: 50px;
    }
    .max_cart_total{
        font-family: 'Helvetica Thin Cond' !important;
        font-weight: 800;
        letter-spacing: 1px;
    }
    .entry-title{
        font-family: "Couture";
    }
    .woocommerce table.shop_table{
        border:0px ;

    }
    .shop_table{
        font-family: 'Helvetica Thin Cond' !important;
    }
    .product-name a{
        text-decoration: none;
        color: black;
        font-size: 1.25rem;
        font-weight: 700;
        text-transform: uppercase;
    }
    .woocommerce-Price-amount amount{
        font-size: 24px;
        font-weight: 700;
    }
    .product-price{
        position: relative;
        text-align: right;
        padding-right: 25px;
    }
    .product-thumbnail{
        width: 120px !important;
        padding-top: 0 !important;
        /*display: flex;*/
        align-items: center;
        justify-content: center;
    }
    .woocommerce table.shop_table td{
        padding-bottom: 0 !important;
        padding-top: 10px !important;
    }
    .product-price a{
        /*position: absolute;*/
        /*top: 65px;*/
        /*right: 2px;*/
        font-family: 'Helvetica Thin Cond' !important;
    }
    .product-price a.remove{
        color: black !important;
        font-size: 1.3em;
        font-weight: bolder;
    }
    .remove-title{
        /*padding-right: 10px;*/
    }
    .wc-proceed-to-checkout div a{
        width: 100%;
    }
    button.button{
        margin-top: 20px !important;
    }
    .wc-proceed-to-checkout div a,
    .wc-proceed-to-checkout div{
        display: flex;
        align-items: center;
    }


    .wc-proceed-to-checkout{
        border: 2px solid black;
        text-transform: uppercase;
        height: 35px;
        font-family: 'Helvetica Thin Cond' !important;
        color: black;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-weight: 600;
        padding: 0 0 0 10px !important;
    }
    .wc-proceed-to-checkout strong{
        padding-right: 15px;
    }
    .checkout-button{
        background-color: black !important;
        text-transform: uppercase;
        font-family: 'Helvetica Thin Cond' !important;
        letter-spacing: 2px;
        font-weight: bold;
        text-align: right;
        /*margin-left: 49.8px !important;*/
        margin-bottom: 0 !important;
        border-radius: 0px !important;
        font-size: 17px !important;
        padding: 7px 10px !important;
    }
    .coupon input{
        padding: 10px;
        border: 1px solid rgba(0,0,0,.1);
        border-radius: 3px;
        width: 100px !important;
    }
    .woocommerce table.shop_table td{
        border-top:0px !important;
    }
    .product-name,
    .product-price{
        border-bottom: 1px solid rgba(0,0,0,.1);
    }
    .product-thumbnail > a > img{
        width: auto !important;
    }
    .product-thumbnail a{
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ebe9eb;
    }
    .max_add_to_wishlist_from_cart{
        display: flex;
        align-items: center;
        justify-content: end;
        margin-bottom: 10px;
    }
    .max_add_to_wishlist_from_cart a i{
        padding-left: 5px;
        margin-right: 0 !important;
    }
    .max_add_to_wishlist_from_cart a{
        display: flex;
        align-items: center;
        justify-content: end;
        background: none;
        border: 0px;
        cursor: pointer;
        padding-right: 5px;
        font-size: 0.68rem;
        flex-direction: row-reverse;
        color: black;
        text-decoration: none;
    }

    .woocommerce a.remove:hover{
        color: black !important;
        background: none !important;
    }
    .max_pro_option1{
        font-size: 0.68rem;
    }
    .max_cart_custom_links{
        float: left;
        width: 52%;
    }
    .cart-collaterals{
        position: fixed;
        bottom: 0px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 70% !important;
        padding: 20px 0;
        background: white;
        border-top: 2px solid;
    }
    .woocommerce{
        position: relative;
        padding-bottom: 50px;
    }
    .max_cart_custom_links a{
        font-size: 10px;
        color: black;
        display: inline;
        font-family: 'Helvetica Thin Cond' !important;
        margin-right: 15px;
        font-weight: 600;
    }
    .max_cart_custom_links_sm{
        display: none;
    }
    .woocommerce-Price-amount.amount{
        font-weight: bold;
        font-size: 1.31rem !important;
        padding-right: 5px;
        letter-spacing: 2px;
    }
    @media only screen and (min-width: 993px) {
        .entry-content {
            margin: 30px 0px 30px 0px;
        }
        .entry-title {
            font-size: 18px;
            padding-left: 10px;
        }
        .max_cart_total {
            padding-right: 10px !important;
            display: flex;
            align-items: center;
        }
        .max_cart_custom_links {
            width: 40%;
        }
        .woocommerce .cart-collaterals .cart_totals{
            width: 60% !important;
        }
    }

    @media only screen and (max-width: 992px) {
        .max_3u_header_pages_container{
            display: block !important;
        }
/*        .max_3u_bag_guest{
            height: 65px !important;
        }*/
        .max_cart_total{
            padding-right: 10px !important;
            display: flex;
            align-items: center;
        }
        .wc-proceed-to-checkout{
            height: auto !important;
        }
        .max_3u_pages{
            width: 100% !important;
            margin: 0 !important;
        }

        .wc-proceed-to-checkout{
            justify-content: space-between !important;
        }
        .entry-title {
            font-size: 18px;
            padding-left: 10px;
        }
        .entry-content{
            margin: 30px 0px 30px 0px;
        }
        .product-name a {
            font-size: 1rem;
        }
        .woocommerce button.button{
            margin-top: 20px;
        }
        .max_cart_custom_links {
            width: 100%;
        }
        .woocommerce .cart-collaterals .cart_totals{
            width: 100% !important;
            /*margin-top: 36px;*/
        }
        .wc-proceed-to-checkout div a{
            font-size: 13px !important;
            margin-left: 20px !important;
            display: block;
            width: 100% !important;
            margin: 0 !important;
        }
        .heateor_sss_sharing_ul{
            display: none !important;
        }
        .woocommerce table.shop_table_responsive tr td::before, .woocommerce-page table.shop_table_responsive tr td::before {
            content: "";
        }
        .product-price{
             text-align: right !important;
            width: 45%;
         }
        .woocommerce table.shop_table_responsive tr td{
            text-align: left !important;
            width: 55%;
        }
        .woocommerce table.shop_table_responsive tr, .woocommerce-page table.shop_table_responsive tr{
            display: flex !important;
        }
        .woocommerce-Price-amount{
            text-align: right;
            width: 100%;
            display: block;
        }
        .max_pro_option1{
            text-align: right;
        }
        .cart-collaterals{
            width: 100% !important;
            justify-content: center;
            padding:20px 10px;
        }
    }
    @media only screen and (max-width: 992px) and (min-width: 768px)  {
        .woocommerce #content table.cart .product-thumbnail, .woocommerce table.cart .product-thumbnail, .woocommerce-page #content table.cart .product-thumbnail, .woocommerce-page table.cart .product-thumbnail{
            display: block;
        }
    }
    @media only screen and (min-width: 768px){
        .wc-proceed-to-checkout div{
            width: 50% !important;
        }
    }
    @media only screen and (max-width: 767px){
        .max_cart_custom_links_md{
            display: none;
        }
        #max_get_var{
            font-family: 'Helvetica Thin Cond';
            letter-spacing: 2px;
            font-size: 1.1rem;
            line-height: 28px;
            font-weight: bold;
        }
        #u3-cart-price{
            padding-right: 6px;
        }
        .product-thumbnail > a > img{
            width: 100% !important;
            max-width: unset !important;
        }
        .max_3u_bag_guest{
            /*height: 65px !important;*/
        }
        .max_add_to_wishlist_from_cart a i{
            font-size: 0.9rem;
        }
        .woocommerce table.shop_table_responsive tr td{
            width: 51vw !important;
        }

        .max_product_attr{
            letter-spacing: 2px;
            font-size: 1.2rem;
            font-weight: bold;
            line-height: 30px;
            font-family: 'Helvetica Thin Cond';
        }
        .entry-content{
            margin-top: 100px !important;
        }
        .woocommerce-page table.shop_table_responsive tr td.product-price{
            display: none !important;
        }
        .max_cart_custom_links_sm{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .wc-proceed-to-checkout{
            border: unset !important;
            width: 395px !important;
            padding-left: 0 !important;
        }
/*        .max_3u_header_pages_container{
            width: 410px !important;
        }*/
        .mobile_logo{
            display: none;
        }
        button[name="update_cart"] {
            display: none !important;
        }

        .top_header_search_form{
            display: none;
            margin-top: 80px;
        }
        .wc-proceed-to-checkout{
            width: 100% !important;
        }
        .max-u3-header-search-icon{
            font-size: 2rem !important;
            line-height: 65px !important;
            display: flex !important;
        }

        .max_3u_bag_img{
            /*background-size: 26px !important;*/
            /*margin-top: 10px !important;*/
            /*height: 45px !important;*/
        }
        .wc-proceed-to-checkout .max_u3_cart_total_btn > a{
            line-height: 33px !important;
            width: 100% !important;
            padding: 10px !important;
            padding-bottom: 20px !important;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px !important;
        }
        .max_u3_cart_total_btn{
            position: fixed !important;
            width: 100%;
            left: 0;
        }

        .wc-proceed-to-checkout .max_u3_cart_total_btn > a > img{
            height: 30px;
            width: 30px;
        }
        .max_u3_cart_total_label{
            display: none !important;
        }
        .max_cart_total{
            position: fixed;
            z-index: 50;
            top: 79px;
            background-color: #fafafa;
            /*padding-left: 0px;*/
        }
        .woocommerce table.shop_table{
            margin-top: 8px !important;
        }

        .wc-proceed-to-checkout div a{
            font-size: 1.7rem !important;
            letter-spacing: 5px;
            padding-left: 40px !important;
        }
        .max_cart_header{
            border-bottom: unset !important;
            margin-bottom: 0 !important;
        }
        .product-name a {
            font-size: 1.3rem;
            letter-spacing: 1px;
        }
        .max_add_to_wishlist_from_cart a span{
            font-size: 1.1rem !important;
            font-weight: bold;
            text-transform: lowercase;
            letter-spacing: 1px;
        }
        .max_add_to_wishlist_from_cart{
            padding-top: 10px;
        }
        .remove-title{
            font-size: 1.1rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .max_author{
            margin-top: -5px;
            font-style: italic; 
            color: #292929;
        }
        .woocommerce table.shop_table td.product-name{
            padding-top: 15px !important;
            padding-left: 0 !important;
        }
        .cart-collaterals{
            width: 60% !important;
            display: block !important;
            border-top: unset !important;
        }
        .woocommerce .cart-collaterals .cart_totals{
            width: 100% !important;
        }
        .max_cart_custom_links{
            display: none !important;
        }
        .hide-title{
            display: none;
        }
        .u3-cart-total{
            font-size: 1.6rem;
            font-family: 'Helvetica Thin Cond' !important;
            letter-spacing: 4px;
        }
        #u3-cart-price > strong > .woocommerce-Price-amount.amount{
            font-size: 1.6rem !important;
            font-family: 'Helvetica Thin Cond' !important;
        }
        .max_cart_total{
            width: 100%;
            justify-content: space-between;
            padding: 10px;
            padding-left: 18px;
            padding-top: 0px;
        }
        #menuToggle{
            margin-top: 10px;
        }
        .hide-pro-price{
            display: none !important;
        }
        .woocommerce-Price-amount{
            text-align: left;
        }
        .max_pro_option1{
            text-align: left;
            line-height: 1.3rem;
        }
        .max_pro_option1 > em{
            font-size: 0.9rem;
            color: #292929;
        }
        .hide-itemz-price-u3{
            margin-top: 10px;
        }
        .hide-767{
            display: flex !important;
        }
        .woocommerce #content table.cart .product-thumbnail, .woocommerce table.cart .product-thumbnail, .woocommerce-page #content table.cart .product-thumbnail, .woocommerce-page table.cart .product-thumbnail{
            display: block;
        }
        #add_payment_method table.cart .product-thumbnail, .woocommerce-cart table.cart .product-thumbnail, .woocommerce-checkout table.cart .product-thumbnail{
            width: 49vw !important;
        }
        .max_add_to_wishlist_from_cart{
            display: flex;
            justify-content: unset;
            margin-bottom: 0 !important;
        }
        .woocommerce a.remove {
            display: block;
            font-size: 1.7rem;
            height: 1em;
            width: 1em;
            text-align: center;
            line-height: 1;
            background: transparent;
            color: black !important;
            text-decoration: none;
            font-weight: 700;
            border: 0;
        }
        .hide-itemz-price-u3{
            display: block !important;
        }
        .max-u3-cart-hr{
            display: block !important;
            height: 0.5px;
            color: black;
            width: 90%;
            margin: 0px auto;
        }
    }
    .hide-767, .hide-itemz-price-u3, .max-u3-hide-767-tr{
        display: none;
    }
</style>

<script type="text/javascript">
    var prevScrollpos = window.pageYOffset;
    jQuery(window).scroll(function (event) {
        var scroll = jQuery(window).scrollTop();
        var currentScrollPos = window.pageYOffset;

        if( jQuery(window).width() <= 767 ) {
             if (prevScrollpos > currentScrollPos) {

                jQuery('.max_cart_total').slideDown();


            }else{
                
                jQuery('.max_cart_total').slideUp();

            }
            prevScrollpos = currentScrollPos;
        }
    });
</script>

<div class="max_shopping_cart">
    <header class="max_cart_header">
        <?php the_title( '<h1 class="entry-title hide-title">', '</h1>' ); ?>
        <div class="max_cart_total">
            <div id="u3-cart-total">
                <span class="u3-cart-total">TOTAL</span>
            </div>
            <div id="u3-cart-price"> 
                <?php wc_cart_totals_order_total_html(); ?>
            </div>
        </div>
    </header>
    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <?php do_action( 'woocommerce_before_cart_table' ); ?>

        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
            <thead style="display: none">
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
                    <th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
                    <th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
                    <th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                <?php
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                        <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                            <td class="product-remove" style="display: none">
                                <?php
                                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                            esc_html__( 'Remove this item', 'woocommerce' ),
                                            esc_attr( $product_id ),
                                            esc_attr( $_product->get_sku() )
                                        ),
                                        $cart_item_key
                                    );
                                ?>
                            </td>

                            <td class="product-thumbnail">
                                <?php
                                    $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                    if ( ! $product_permalink ) {
                                        echo $thumbnail; // PHPCS: XSS ok.
                                    } else {
                                        printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                                    }
                                ?>
                                <div class="max_add_to_wishlist_from_cart hide-767">
                                    <a href="?add_to_wishlist=<?php echo $product_id; ?>" class="add_to_wishlist single_add_to_wishlist" data-product-id="<?php echo $product_id; ?>" data-original-product-id="<?php echo $product_id; ?>" data-title="Save For Later" rel="nofollow">
                                             
                                        <span style="margin-left: 15px;">Save For Later</span>
                                        <i style="padding-left: 7px;" class="yith-wcwl-icon fa fa-heart"></i> 
                                    </a>
                                </div>
                                <div class="remove-scetion hide-767">
                                    
                                    <?php
                                        echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                            'woocommerce_cart_item_remove_link',
                                            sprintf(
                                                '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                esc_html__( 'Remove this item', 'woocommerce' ),
                                                esc_attr( $product_id ),
                                                esc_attr( $_product->get_sku() )
                                            ),
                                            $cart_item_key
                                        );

                                    ?>
                                    <span style="margin-left: 10px;" class="remove-title">remove</span>
                                </div>
                            </td>

                            <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                <?php
                                    if ( ! $product_permalink ) {
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                    } else {
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                    }
                                    ?>
                                    <div class="max_author">
                                        <?php
                                        $post_obj    = get_post( $product_id ); // The WP_Post object
                                        $author      =  get_the_author_meta( 'display_name', $post_obj->post_author );
                                        ?>
                                        by <?php echo $author; ?>
                                    </div>
                                    <?php

                                    $html .= '<span id="max_get_var">';
                                    if($_product->is_type('variation')){
                                        $variations = $_product->get_variation_attributes();
                                        foreach ($variations as $single){
                                            $html .= ucfirst( str_replace( '-', ' ', $single ) ).'<br />';
                                        }
                                    }
                                    $html .= '</span>';

                                    echo $html;


                                    do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                    // Meta data.
                                    echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                    // Backorder notification.
                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                    }

                                    ?>
                                    <div class="hide-itemz-price-u3">
                                    <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.

                                    ?>
                                    <p class="max_pro_option1">* <em>VAT INCLUDED / EXCLUDED SHIPPING COST</em></p>
                                    </div>
                            </td>

                            <td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                <div class="hide-pro-price">
                                <div class="remove-scetion" style="display: flex;align-items: center;justify-content: end">
                                    <span class="remove-title">Remove</span>
                                    <?php
                                        echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                            'woocommerce_cart_item_remove_link',
                                            sprintf(
                                                '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                esc_html__( 'Remove this item', 'woocommerce' ),
                                                esc_attr( $product_id ),
                                                esc_attr( $_product->get_sku() )
                                            ),
                                            $cart_item_key
                                        );
                                    ?>
                                </div>
                                <div class="max_add_to_wishlist_from_cart">
                                    <a href="?add_to_wishlist=<?php echo $product_id; ?>" class="add_to_wishlist single_add_to_wishlist" data-product-id="<?php echo $product_id; ?>" data-original-product-id="<?php echo $product_id; ?>" data-title="Save For Later" rel="nofollow">
                                        <i class="yith-wcwl-icon fa fa-heart"></i>      <span>Save For Later</span>
                                    </a>
                                </div>
                                <?php
                                    echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.

                                ?>
                                <br />
                                <p class="max_pro_option1">* <em>VAT INCLUDED / EXCLUDED SHIPPING COST</em></p>
                                </div>
                            </td>

                            <td class="product-quantity" style="display: none" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                <?php
                                    if ( $_product->is_sold_individually() ) {
                                        $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                    } else {
                                        $product_quantity = woocommerce_quantity_input(
                                            array(
                                                'input_name'   => "cart[{$cart_item_key}][qty]",
                                                'input_value'  => $cart_item['quantity'],
                                                'max_value'    => $_product->get_max_purchase_quantity(),
                                                'min_value'    => '0',
                                                'product_name' => $_product->get_name(),
                                            ),
                                            $_product,
                                            false
                                        );
                                    }

                                    echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                ?>
                            </td>

                            <td class="product-subtotal" style="display: none" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                                <?php
                                    echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                ?>
                            </td>
                        </tr>
                        <tr class="max-u3-hide-767-tr">
                            <td style="margin-top: 10px;width: 100% !important;padding-left: 0;margin-bottom: 20px;background-color: unset;"><hr class="max-u3-cart-hr"></td>
                        </tr>
                        <?php
                    }
                }
                ?>

                <?php do_action( 'woocommerce_cart_contents' ); ?>

                <tr>
                    <td colspan="6" class="actions">

                        <?php if ( wc_coupons_enabled() ) { ?>
                            <div class="coupon">
                                <label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
                                <?php do_action( 'woocommerce_cart_coupon' ); ?>
                            </div>
                        <?php } ?>

                        <button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

                        <?php do_action( 'woocommerce_cart_actions' ); ?>

                        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                    </td>
                </tr>

                <?php do_action( 'woocommerce_after_cart_contents' ); ?>
            </tbody>
        </table>
        <?php do_action( 'woocommerce_after_cart_table' ); ?>
    </form>

    <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

    <div class="cart-collaterals">
        <div class="max_cart_custom_links max_cart_custom_links_md">
            <a href="<?php echo get_home_url()?>/return_policy">RETURN POLICY</a>
            <a href="<?php echo get_home_url()?>/terms_of_services">TERMS OF SERVICES</a>
        </div>
        <?php
            /**
             * Cart collaterals hook.
             *
             * @hooked woocommerce_cross_sell_display
             * @hooked woocommerce_cart_totals - 10
             */
            do_action( 'woocommerce_cart_collaterals' );
        ?>
        <div class="max_cart_custom_links max_cart_custom_links_sm">
            <a href="<?php echo get_home_url()?>/return_policy">RETURN POLICY</a>
            <a href="<?php echo get_home_url()?>/terms_of_services">TERMS OF SERVICES</a>
        </div>
    </div>
    <?php do_action( 'woocommerce_after_cart' ); ?>
</div>