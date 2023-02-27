<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<style type="text/css">
	.max_u3_show_info_at_767{
	    width: 100%;
	    padding-left: 10px;
	    padding-right: 8px;
	}
	.woocommerce div.product form.cart{
		margin: 0px 10px;
	}
	.max_author, .max_u3_hide_pro_title{
		margin-left: 10px;
	}
	#max_u3_s_p_title{
		font-size: 1.5rem;
	    font-family: "Helvetica Thin Cond";
	    text-align: left;
	    font-style: normal;
	    letter-spacing: 1px;
	    text-transform: uppercase;
	    display: inline-block;
	}
	.max_pro_price_767{
		font-size: 1.5rem !important;
	    display: inline-block;
	    color: #000000 !important;
	    font-family: 'Helvetica Thin Cond';
	    font-weight: bold;
	    letter-spacing: 2px;
	    float: right;
	}
	.max_summary .woocommerce-product-details__short-description{
		margin-left: 10px;
	}
	.max_author_link_two{
	    text-decoration: none;
	    color: #000;
	}
	.max_u3_author_by, .max_author_link_two{
		font-size: 1.5rem;
	    font-family: "Helvetica Thin Cond Thin";
	    text-align: left;
	    font-style: italic;
	    margin-bottom: 15px;
	    font-weight: bold;
	    padding-top: 5px;
	}
	.max_u3_show_div_one_at_767{
		display: flex;
	}
	.max_u3_show_div_two_at_767{
		margin-bottom: 4px;
		margin-top: 0px;
	}
	.max_u3_show_div_two_at_767 > p{
		font-size: 1rem;
	    font-family: "Helvetica Thin Cond";
	    letter-spacing: 1px;
	    display: inline-block;
	    float: right;
	    font-style: italic;
	    margin-top: 5px;
	}
	@media screen and (min-width: 768px) {
		.max_u3_show_info_at_767{
			display: none;
		}	
/*		.woocommerce-notices-wrapper{
			margin-bottom: 70px; 
		}*/
	}
	@media screen and (max-width: 767px) {
		.max_u3_author_by, .max_author_link_two {
			font-size: 0.9rem;
		}
		.max_3u_add_to_cart_btn > p {
			padding-left: 40px !important;
		}
		.woocommerce-notices-wrapper{
			margin-top: 150px;
		}
		.max_u3_show_div_two_at_767 > p{
			font-size: 0.7rem;
		}
		.max_author{
			margin-bottom: 0px;
			height: 490px;
		}
		.max_u3_show_info_at_767{
		    position: fixed;
		    z-index: 50;
		    background-color: #fafafa;
		    padding-left: 10px;
		    top: 76px;
		}
		.max_summary{
			margin-top: -40px;
		}
	}
</style>
<script type="text/javascript">
	var prevScrollpos = window.pageYOffset;
	var handal_t = '';
	function sliding_heading(argument) {
	  clearTimeout(handal_t);

	  handal_t = setTimeout(function(){
	    if(argument == 'Down'){
	    	jQuery('.max_u3_show_info_at_767').slideDown();		 	
	    }else if(argument == 'Up'){
	    	jQuery('.max_u3_show_info_at_767').slideUp();
	    }
	  }, 100);
	} 

	jQuery(window).scroll(function (event) {
	    var scroll = jQuery(window).scrollTop();
	    var currentScrollPos = window.pageYOffset;
		if( jQuery(window).width() <= 767 ) {
			 if (prevScrollpos > currentScrollPos) {
			 	sliding_heading('Down');
			 	// jQuery('.max_summary').css('margin-top', '30px');
			}else{
				sliding_heading('Up');				
			}
			prevScrollpos = currentScrollPos;
		}
	});
</script>
<?php
        $post_obj    = get_post( get_the_id() ); // The WP_Post object
        $author_id = $post_obj->post_author;
        $author      =  get_the_author_meta( 'display_name', $post_obj->post_author );

        $args = array(
            'post_type' => 'page',//it is a Page right?
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'author'  => $author_id,
            'meta_query' => array(
                                array(
                                    'key' => '_wp_page_template',
                                    'value' => 'max-template-artist.php', 
                                )
                            )
            );
        $my_query = new WP_Query($args);
        $author_link = '';
        if(count($my_query->posts) > 0)
        {
            foreach( $my_query->posts as $page ) {
                $page_id =  $page->ID;
                $author_link =  get_permalink($page_id);
            }
        }
    ?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="max_pro_images">
    	<div class="max_u3_show_info_at_767">
    		<div id="max_u3_show_div_one_at_767">
    				<?php the_title( '<h1 id="max_u3_s_p_title">', '</h1>' ); ?>
		            <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> max_pro_price_767"><?php echo woocommerce_price( $product->get_price() ); ?></p>
    		</div>
    		<div class="max_u3_show_div_two_at_767">
    			<span>
			    <?php if(!empty($author_link)){ ?>
			        <span class="max_u3_author_by">by</span>&nbsp;<a class="max_author_link_two" href="<?php echo $author_link ?>"><?php echo $author; ?></a>
			    <?php }else{ ?>
			        <?php echo $author; ?>
			    <?php } ?>
				</span>
				<?php
					if( 'yes' == get_post_meta($product->get_id(), 'max_3u_text_field_title', true) ) {
						echo '<p>* INTERESTED IN ACQUIRING THIS PIECE ?</p>';
					} else {
						echo '<p>* VAT INCLUDED / EXCLUDED SHIPPING COST</p>';
					}
				?>
			    
    		</div>
    	</div>
        <?php
        /**
         * Hook: woocommerce_before_single_product_summary.
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
        do_action( 'woocommerce_before_single_product_summary' );
        ?>
        <div class="max_clear"></div>
    </div>
	<div class="summary entry-summary max_summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>