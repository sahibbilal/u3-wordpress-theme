<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;
$product_list_page = false;

if(is_product_category())
{
//get_header();
get_header( 'shop' );
    
  $category = get_queried_object();

	$term_id = $category->term_id;
	$taxonomy = $category->taxonomy;
	$checkData = '';
	$term_children = get_term_children( filter_var( $term_id, FILTER_VALIDATE_INT ), filter_var( $taxonomy, FILTER_SANITIZE_STRING ) );

    // Return false if we have an empty array or WP_Error object
    if (empty( $term_children ) || is_wp_error( $term_children ) ){

		$product_list_page	= true;
    }else{
		// wp_footer
			if ( wp_is_mobile() ) {	
                add_filter( 'woocommerce_show_page_title', '__return_true' );		
				?>
				<script type="text/javascript">	
					jQuery(document).ready(function($){
            if( jQuery(window).width() > 991 ) {
                if( jQuery(document.body).find('.product_filters').html() == undefined ) {
                    jQuery(document.body).find('.woocommerce-products-header__title').hide();
                    jQuery(document.body).find('.woocommerce-products-header').hide();
                    jQuery('.max_page_content').css('margin-top', '35px');
                }
            }
						if( jQuery(window).width() <= 991 ) {
							
							if( jQuery(document.body).find('.product_filters').html() != undefined ) {
								jQuery('.max_page_content').css('margin-top', '65px');
							}
							if( jQuery(document.body).find('.product_filters').html() == undefined ) {
								
								jQuery(document.body).find('.woocommerce-products-header__title').css('position', 'fixed');
								jQuery(document.body).find('.woocommerce-products-header__title').css('background-color', '#fafafa');
								jQuery(document.body).find('.woocommerce-products-header__title').css('top', '70px');
								// jQuery('.max_page_content').css('margin-top', '65px');
							}
						}
						if( jQuery(window).width() <= 767 ) {
							jQuery('.max_range_select').attr('max', '1');
						}


						
						resize_category_images_reload();
						jQuery(window).resize(function(){							
							resize_category_images_reload();
						});
					});
					function resize_category_images_reload(){
						let size = jQuery(window).height() - 140;
						jQuery('.products > li').css('height', size/3);
					}
				</script>
				<?php
				
			}else{
				?>
				<script type="text/javascript">
					jQuery(document).ready(function($){
						function resize_category_images_reload(){
							let size = jQuery(window).height() - 75;
							if( jQuery(document.body).find('.product_filters').html() == undefined ) {
								jQuery('.max_page_content').css('margin-top', '45px');
								jQuery('.products > li').css('height', size/3);
							}  
						}
						jQuery(window).resize(function(){							
							resize_category_images_reload();
						});
						resize_category_images_reload();
					});
				</script>
				<?php
				add_filter( 'woocommerce_show_page_title', '__return_false' ); 
			} 
    }

}

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title text-center page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );


	$filter = 0;
	$added = esc_html($_GET['added']);
	if(!empty($added)){
		$filter ++;
	}
	
	$selected_user = get_query_var('filter_artist', false); 
	$selected_users = esc_html($_GET['filter_artist']);
	$selected_user = [];
	if($selected_users){
		$selected_user = explode(',', $selected_users);
		$filter ++;
	}

	$name = '';
	$name_value_array = [];
	$attribute_taxonomies = wc_get_attribute_taxonomies();
	foreach($attribute_taxonomies as $attribute_taxonomy){
		$name = $attribute_taxonomy->attribute_name;
		if($name != 'medium') continue;
		//attribute_label
		//attribute_id
		$name_value = isset($_GET[$name]) ? esc_html($_GET[$name]) : '' ;
		if($name_value){
			$name_value_array = explode(',', ($name_value));
			$filter ++;
		}

		break;
	}

	
  	global $wp;
	$current_url = home_url(add_query_arg(array(), $wp->request));
	$max_range_select = isset( $_COOKIE['max_range_select'] ) ? $_COOKIE['max_range_select'] : '2';

	//setcookie("max_range_select", $value, time()+360000);  /* expire in 1 hour */
  
?>
<?php if($product_list_page == true){	
function loop_columns() {
	$max_range_select = isset( $_COOKIE['max_range_select'] ) ? $_COOKIE['max_range_select'] : '2';
	if($max_range_select == 2){
		return 4; 

	}else if($max_range_select == 1){
		return 3; 
	}else if($max_range_select == 0){
		return 2; 
	}else{
		return 4; 
	}
}
add_filter('loop_shop_columns', 'loop_columns', 999);
	dynamic_sidebar( 'archive-filter' )?>
<?php if($filter > 0 ){
	$div1 = 'content !important';
	$div2 = 'none !important';
}else{
	$div2 = 'flex !important';
	$div1 = 'none !important';
} ?>
<div class="product_filters"> 
	<span class="filter_d" style="display: <?php echo $div2 ?>;" >
		<span class="filter_d_text pointer" >
			
		 + <?php echo __('Filters', 'woocommerce') ?> <?php if($filter) echo "<span class=filter_count>($filter)</span>" ?> 
		 </span>
		<input type="range" name="" max="2" value="<?php echo $max_range_select ?>" class="max_range_select">
	</span>
	<div class="filter2_d" style="display: <?php echo $div1 ?>;">
		<div class="filter_border_right">
			<span class="filter_d2 pointer close_filter">Close</span>
			<span class="filter_d2 pointer clear_filter" data-url="<?php echo $current_url ?>">Clear</span>
			<span class="filter_d2">&nbsp</span>
		</div>	

<?php //echo do_shortcode('[searchandfilter id="wpf_616d4d2691323"]') ?>
<form class="ordering" method="get" action="<?php echo $current_url ?>/" >
	<?php 
	global $wpdb;
	$user_ids = $wpdb->get_results("
  select p.post_author 
      from $wpdb->posts p
     where p.post_type = 'product'
     and p.post_status = 'publish'
     GROUP by p.post_author 
     " );

	?>
	<div class="col-md-3">
		<?php if(!empty($user_ids)){ ?>
		<h4><?php _e('Artists', 'woocommerce') ?></h4>
		<?php foreach($user_ids as $user){
			$user_id =  $user->post_author;
			?>
		<li>		
			<label> <?php echo get_user_by( 'id', $user_id )->display_name ?>
				<input type="checkbox" class="filter_artist" value="<?php echo $user_id ?>" <?php if(in_array($user_id , $selected_user )) echo 'checked' ?>  >
			</label>
		</li>

			<?php
		} ?>

		<!-- <input type="checkbox" class="filter_artist" value="2" > -->

		<?php } ?>
		<input type="hidden" name="filter_artist" class="user_filters_ids" value="<?php echo $selected_user ?>">
	</div>
	<div class="col-md-3">
		<h4><?php _e('Mediums', 'woocommerce') ?></h4>
		<?php
			$term = get_terms(array(
				        'taxonomy' => 'pa_'.$attribute_taxonomy->attribute_name,
				        'hide_empty' => false,
				    ));
			//print_r($term);
			foreach($term as $k => $taxonomy){
				//print_r($taxonomy);
			?>
				<li>		
					<label> <?php echo $taxonomy->name ?>
						<input type="checkbox" value="<?php echo $taxonomy->term_id ?>" class="<?php echo $name ?>" <?php if(in_array( $taxonomy->term_id , $name_value_array) ) echo 'checked' ?>  >
					</label>
				</li>
			<?php
			}

		
		?>
		<input type="hidden" name="<?php echo $name ?>" class="<?php echo $name ?>_ids" value="<?php echo $name_value ?>">
		<script type="text/javascript">
			jQuery('.ordering .<?php echo $name ?>').on('change', function(){
				var userdata = [];
				var form = jQuery(this).closest('form');
				jQuery(".<?php echo $name ?>:checked").each(function(){
		            userdata.push(this.value);
		        });
				//jQuery('.user_filters_id').val(userdata);
				jQuery(".<?php echo $name ?>_ids").val(userdata.join(","));
				//form.find('.user_filters:checked').val('');				
			});
			
		</script>
	</div>
	<div class="col-md-3">
		<h4><?php _e('Added', 'woocommerce') ?></h4>
		<li>		
			<label> Newest
				<input type="radio" name="added" value="newest" <?php if($added == 'newest' ) echo 'checked' ?>  >
			</label>
		</li>
		<li>
			<label>
			Oldest
				<input type="radio" name="added" value="oldest" <?php if($added == 'oldest' ) echo 'checked' ?>>
			</label>		
		</li>
	<input type="hidden" name="paged" value="1" />
	</div>
	<?php //wc_query_string_form_fields( null, array( 'added', 'submit', 'paged', 'product-page' ) ); ?>
</form>
<div class="col-md-3">
	<input type="range" name="" max="2" value="<?php echo $max_range_select ?>" class="max_range_select">
</div>

</div>
</div>

	<?php
} ?>
</header>
<script type="text/javascript">
	jQuery(document).ready(function(){

	var search_class = jQuery('body').find('#wpadminbar').attr('id');

	if( jQuery(document.body).find('.product_filters').html() != undefined ) {
		var prevScrollpos = window.pageYOffset;
		var handal_t = '';
		// jQuery(document).find('.max_page_content ul.products > li').each(function(){
		// 	let url = jQuery(this).find('img').attr('src');
		// 	jQuery(this).css('background-image', 'url('+url+')');
		// 	jQuery(this).find('img').hide();
		// });
		// function sliding_heading(argument) {
		// clearTimeout(handal_t);

		// 	handal_t = setTimeout(function(){
		// 		if(argument == 'Down'){
		// 				// if(isWindows()){
		// 					jQuery('.woocommerce-products-header__title').css('transition', 'all 1s ease');
		// 					jQuery('.woocommerce-products-header__title').css('transform', 'translateY(0%)');
		// 					// jQuery('.filter_d').css('transition', 'all 1s ease');
		// 					// jQuery('.filter_d').css('transform', 'translateY(0%)');
		// 					// jQuery('.woocommerce-products-header__title').show();
		// 					// jQuery('.woocommerce-products-header__title').show();
		// 					// jQuery('.woocommerce-products-header__title').slideDown();
		// 					// if (jQuery(window).scrollTop() <= jQuery('.filter_d').offset().top){
		// 					// 	// jQuery('.filter_d').slideDown(); 
		// 					// 	console.log('hge');
		// 					// }	
		// 				// }	
		// 				// jQuery('.woocommerce-products-header__title').animate({marginTop: "4px"});
		// 		}else if(argument == 'Up'){
					
		// 			// jQuery('.max_page_content').animate({marginTop: "5px"});
		// 			// if(isWindows()){
		// 				// jQuery('.filter_d').slideUp();
		// 				// jQuery('.filter_d').css('transform', 'translateY(-100%)');
		// 				// jQuery('.filter_d').css('transition', 'all 5s ease');
		// 				// jQuery('.woocommerce-products-header__title').hide();
		// 				jQuery('.woocommerce-products-header__title').css('transition', 'all 1s ease');
		// 				jQuery('.woocommerce-products-header__title').css('transform', 'translateY(-100%)');
		// 				// jQuery('.woocommerce-products-header__title').animate({marginTop: '-20px'});	
		// 			// }
		// 			// jQuery('.woocommerce-products-header__title').slideUp();
					
		// 		}
		// 	}, 50);
		// } 
		function isMacintosh() {
		  return navigator.platform.indexOf('Mac') > -1
		}
		function isWindows() {
		  return navigator.platform.indexOf('Win') > -1
		}
		function isiPhone(){
	    return (
	        (navigator.platform.indexOf("iPhone") != -1) ||
	        (navigator.platform.indexOf("iPod") != -1)
	    );
		}
		// if(isiPhone()){
		// 	jQuery(window).scroll(function (event) {
		// 		var scroll = jQuery(window).scrollTop();
		// 		var currentScrollPos = window.pageYOffset;
		// 		if( jQuery(window).width() <= 767 ) {
		// 			if (prevScrollpos > currentScrollPos) {
		// 				sliding_heading('Down');
						
		// 				// jQuery(".max_page_content").css({"margin-top": "200px"});
		// 			}else{
		// 				sliding_heading('Up');

						
		// 				// jQuery(".max_page_content").css({"margin-top": "-200px"});
		// 			}
		// 			prevScrollpos = currentScrollPos;
		// 		}
		// 	});
		// }else{
		// 	jQuery(window).scroll(function (event) {
		// 		var scroll = jQuery(window).scrollTop();
		// 		var currentScrollPos = window.pageYOffset;
		// 		if( jQuery(window).width() <= 767 ) {
		// 			if (prevScrollpos > currentScrollPos) {
		// 				// sliding_heading('Down');
						
		// 				jQuery('.woocommerce-products-header__title').css('transition', 'all 1s ease');
		// 				jQuery('.woocommerce-products-header__title').css('transform', 'translateY(0%)');

		// 				// jQuery(".max_page_content").css({"margin-top": "200px"});
		// 			}else{
		// 				// sliding_heading('Up');
		// 				jQuery('.woocommerce-products-header__title').css('transition', 'all 1s ease');
		// 				jQuery('.woocommerce-products-header__title').css('transform', 'translateY(-100%)');
						
		// 				// jQuery(".max_page_content").css({"margin-top": "-200px"});
		// 			}
		// 			prevScrollpos = currentScrollPos;
		// 		}
		// 	});
		// }
	}
	var search_class = jQuery('body').find('#wpadminbar').attr('id');
	// if( search_class != undefined ){
	// 	jQuery('.top_header_search_form').css('top', '30px');
	// 	jQuery('.woocommerce-products-header').css('top', '60px');
	// }else{
		jQuery('.top_header_search_form').css('top', '0px');
		jQuery('.woocommerce-products-header').css('top', '30px');
		jQuery('.max_3u_pages_menu').css('top', '0');
	// }

	// if( jQuery.trim(jQuery('body').find('.woocommerce-products-header').html()) != '' ) {
	// 	jQuery('.max_page_content').css('margin-top', '140px');
	// }
	
	// jQuery(window).resize(function() {
	// 	var windowsize = jQuery(window).width();
	// 	if (windowsize <= 767) {
	// 		if( jQuery.trim(jQuery('body').find('.woocommerce-products-header').html()) != '' ) {
	// 			jQuery('.max_page_content').css('margin-top', '200px');
	// 		}
	// 	}else{
	// 		if(windowsize == 768) {
	// 			if( jQuery.trim(jQuery('body').find('.woocommerce-products-header').html()) != '' ) {
	// 				jQuery('.max_page_content').css('margin-top', '160px');
	// 			}
	// 		}else{
	// 			if( jQuery.trim(jQuery('body').find('.woocommerce-products-header').html()) != '' ) {
	// 				jQuery('.max_page_content').css('margin-top', '140px');
	// 			}
	// 		}
	// 	}
	// });
	if (jQuery(window).width() < 768) {
		if( jQuery(document.body).find('.product_filters').html() == undefined ) {
				jQuery('.max_page_content').css('margin-top', '110px');
				jQuery('h1.woocommerce-products-header__title').css('padding-top', '10px');
		}
		if( jQuery(document.body).find('.product_filters').html() != undefined ) {
			// jQuery('h1.woocommerce-products-header__title').css('padding-top', '20px');
			jQuery('.max_page_content').css('margin-top', '70px');
		}
	}

	if (jQuery(window).width() > 768) {
		if( jQuery(document.body).find('.product_filters').html() == undefined ) {
			jQuery('.max_page_content').css('margin-top', '65px');
		}
		if( jQuery(document.body).find('.product_filters').html() != undefined ) {
			jQuery('.max_page_content').css('margin-top', '110px');
		}
	}
	if (jQuery(window).width() == 768) {
		if( jQuery(document.body).find('.product_filters').html() != undefined ) {
			jQuery('.max_page_content').css('margin-top', '43px');
			jQuery('.filter_d_text').css('margin-left', '7px');
			jQuery('.product_filters input[type=range]').css('margin-left', '45px');
		} else {
			if( jQuery(document.body).find('.product_filters').html() == undefined ) {
				jQuery('.max_page_content').css('margin-top', '80px');
			}else{
				jQuery('.max_page_content').css('margin-top', '0px');
			}
			jQuery('h1.woocommerce-products-header__title').css('padding-top', '10px');
		}
	}


	//else{
	// 	if(jQuery(window).width() == 768) {
	// 		if( jQuery.trim(jQuery('body').find('.woocommerce-products-header').html()) != '' ) {
	// 			jQuery('.max_page_content').css('margin-top', '160px');
	// 		}
	// 	}else{
	// 		if( jQuery.trim(jQuery('body').find('.woocommerce-products-header').html()) != '' ) {
	// 			jQuery('.max_page_content').css('margin-top', '140px');
	// 		}
	// 	}
	// }
	});

</script>
<style type="text/css">
	
	/*
	ul#main_ul_id li.current-menu-item > a,
	ul#main_ul_id > li.current-menu-ancestor > a {
	    text-decoration: line-through;
	}
	*/
	.products > li:last-child{
	margin-bottom: 0px;
}
	ul#main_ul_id > li.current-menu-ancestor li {
	    text-decoration: none;
	}
	.max_3u_cat_menu #main_ul_id.main_ul .current-menu-ancestor > ul{
		display: block;
	}
	ul#main_ul_id > li {
	    text-decoration: none;
	}
	@media only screen and (min-width: 769px){
		.top_header_search_form{
			position: fixed;
			width: 100%;
			padding-right: 400px;
			z-index: 30;
			background: #fff;
		}
		h1.woocommerce-products-header__title{
			width: 70%;
		}
	}

/*	.max_page_content{
		margin-top: 110px;
	}*/

	@media only screen and (max-width: 768px){
		.woocommerce-products-header{
			top: 79px !important;
			width: 100% !important;
			background: #fafafa !important;
		}
		input.max_range_select:after{
			left: -2% !important;
		}
		.filter2_d{
			padding-top: 30px !important;
		}
		.max_u3_show_search_on_click{
			top: 60px !important;
		}
		.wp-block-search__button{
			padding: 0 !important;
			margin-left: 0 !important;
		}
		.wp-block-search__input{
			padding: 0 !important;
		}
		.woocommerce-products-header{
			position: unset !important;
			/*top: 70px;*/
			height: auto;
			z-index: 20;
			width: 100%;
			background: #fff;
		}
		.woocommerce-notices-wrapper{
			margin-top: 20px !important;
		}
		.woocommerce .products ul, .woocommerce ul.products{
			margin-top: 20px !important;
		}
		.woocommerce-products-header__title{
			position: fixed;
			background-color: #fafafa;
			z-index: 100;
		}
/*		.max_author{
			display: none;
		}*/
		.filter_d_text{
			width: 50%;
		}
		.woocommerce ul.products li.product a img{
			margin-bottom: 0px;
		}
		.columns-2{
			margin-top: 110px !important;
		}
		.filter_d{
			display: flex; 
			flex-direction: column-reverse;
			margin-left: 10px;
			padding-top: 20px;
		}
		h1.woocommerce-products-header__title{
			/*margin-top: 30px;*/
			width: 100%;
		}

		.woocommerce .products ul, .woocommerce ul.products{
			margin-left: 5px !important;
			margin-right: 5px !important;
			/*margin-top: 200px !important;*/
		}
		.product_filters input[type=range]{
			margin-top: 20px;
			margin-bottom: 20px;
			/*margin-left: 15px !important;*/
			max-width: 90% !important;
		}
/*		.max_page_content{
			margin-top: 150px !important;
		}*/
	}
	.woocommerce-products-header{
		position: fixed;
		/*top: 70px;*/
		height: auto;
		z-index: 20;
		width: 100%;
		background: #fff;
	}

	/* mo code start  */
	ul.products li.product-category {
	    list-style: none;
	    position: relative;
	    margin-top: 0;
	    margin-bottom: 15px !important;
	}
	ul.products li.product-category:last-child{
		margin-bottom: 0px !important;
	}

	li.product-category.product .no-category-image a {
	    background: #ccc;
	    display: block;
	    width: 100%;
	    max-height: 33.3vh;
	    min-height: 150px;
	}
	li.product-category.product .no-category-image a{
	    min-height: 150px;
	    height: 33.3vh;
	    width: 100%;
	    display: block;
	    background: #ccc;
	}
	li.product-category.product a {
	    width: 100%;
	    display: block;
	    background: #ccc;
	}
	li.product-category.product a img {
	    width: auto;
	    height: auto;
	    max-width: 100%;
	    display: block;
	    margin: 0 auto;
	    max-height: 28.3vh;
	    min-height: 176px;
	}
	@media only screen and (max-width: 767px){
/*	    li.product-category.product a img{
	        min-height: 28.5vh;
	    }*/
/*	    .max_page_content{
	    	margin-top: 200px;
	    }*/
	    ul.products li.product-category{
	    	/*margin-bottom: 0px !important;*/
	    }
/*	    ul.products ul.heateor_sss_sharing_ul{
	    	top: 285px;
	    }
		.add-to-wishlist-before_image .yith-wcwl-add-to-wishlist{
			top: -85px !important;
		}*/
	}
	li.product-category.product .woocommerce-loop-category__title .count {
	    display: none;
	}

	li.product-category.product h2 {
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	    color: #fff;
	    font-family: "Helvetica Thin Cond thin", sans-serif, arial;
	    font-size: 4rem !important;
	    letter-spacing: 0.5rem;
	    text-transform: uppercase;
	}
	.woocommerce ul.products li.product-category, .woocommerce-page ul.products li.product-category {
	     float: none; 
	     padding: 0; 
	     position: relative; 
	     width: 100%; 
	     margin-left: 0; 
	     padding-right: 5px;
	}
	.woocommerce ul.products li.product.type-product .price {
	    color: #000;
	    display: block;
	    font-weight: 400;
	    margin-bottom: .5em;
	    font-size: 1.053em;    
	    width: 100%;
	    text-align: right;
	    font-family: "Helvetica Thin Cond";
	    letter-spacing: .08em;
	    padding-right: .25em;
	    margin: 0;
	}
	.woocommerce ul.products li.product a .max_bg_thumb{
	    margin-bottom: .25em;
	}
	.woocommerce ul.products li.product .woocommerce-loop-category__title,
	.woocommerce ul.products li.product .woocommerce-loop-product__title,
	.woocommerce ul.products li.product h3{
	    padding: 0 0 0 .25em;
	    font-size: 1.153em;
	    max-width: calc(100% - 3em);
	    line-height: 1;
	    margin-top: 5px;
	}
	.woocommerce ul.products li.product.type-product .max_author{
	    color: #000;
	    font-family: "Helvetica Thin Cond";
	    padding: 0 0 0 .25em;
	    letter-spacing: .08em;
	}
	.woocommerce-loop-product__title{
    font-family: "Helvetica Thin Cond";
    text-transform: uppercase;
    color: #000;
    padding-left: 5px;
    letter-spacing: .08em;
    font-size: 1.2rem !important;
	}
	.columns-3 > li > a > .woocommerce-loop-product__title, .columns-4 > li > a > .woocommerce-loop-product__title{
    width: 130px;
	}
	.max_bg_thumb{
	    background: #fcfcfc;
	    display: flex;
	    background-size: cover;
	    background-repeat: no-repeat;
	    background-position: center;
	    /*
	    background: #e8e5dc;
	    padding: 0.9em 1em 1.1em 1em;
	    height: 12em;
	    */
	}
	.max_bg_thumb img{
	    max-width: 100% !important;
	    max-width: 100% !important;
	    margin: 0 auto !important;
	    /*
	    margin-bottom: 0 !important;
	    width: auto !important;
	    max-height: 12em !important;
	    box-shadow: 0.2em 0.3em 0.5em #999 !important;
	    border: .125em solid #000 !important;*/
	}


	@media (max-width: 767px){
	   /* .max_bg_thumb{
	        height: 8.5em;
	    }
	    .max_bg_thumb img{
	        max-height: 6.5em !important;
	    }*/
	    .woocommerce ul.products li.product.type-product .price {
	        font-size: 0.8em;
	    }
	    .add-to-wishlist-before_image .yith-wcwl-add-to-wishlist i{
	    	font-size: 1.2rem !important;
	    }
	    .clear_filter{
	    	margin-top: 4px;
	    }

	}
	.text-center{
	    text-align: center;
	}
	h1.woocommerce-products-header__title{
	    font-family: "Couture";
	    font-size: 1.5em;
	}

/*	    .woocommerce ul.products.columns-3 li.product, 
	    .woocommerce-page ul.products.columns-3 li.product {
	        width: 48% !important;
	    }*/

	    .columns-3 > li{
	    	width: 48% !important;
	    }
	    
	    .columns-2 > li{
	        width: 100% !important;
	    }
	    /*

	.columns-3 .max_bg_thumb{
	    height: 12em !important;
	}
	.columns-3 .max_bg_thumb img{
	    max-height: 12em !important;
	}
	.columns-2 .max_bg_thumb{
	    height: 19em !important;
	}
	.columns-2 .max_bg_thumb img{
	    max-height: 19em !important;
	}
	*/
	

	.col-md-3{
	    width: 25%;
	    float: left;
	}
	.ordering li{
	    list-style: none;
	}

	/* mo code end  */
	li.product-category.product{
	    width: 100% !important;
	}
	.woocommerce ul.products li.product-category.product .woocommerce-loop-category__title{
		padding: 0 !important;
		width: 100% !important;
	    max-width: 100%;
	    text-align: center;
    	word-break: break-word;
	}

	.add-to-wishlist-before_image .yith-wcwl-add-to-wishlist i {
	    font-size: 0.85rem;
	    margin: 0;
	}
	i.yith-wcwl-icon.fa.fa-heart,
	i.yith-wcwl-icon.fa.fa-heart-o {
	    color: #000;
	}

	ul.products ul.heateor_sss_sharing_ul {
	    position: absolute;
	    right: 5px;
	    left: auto;
	}
	ul.products .heateorSssSharing{
		margin: 0;
	}

	ul.products .add-to-wishlist-before_image .yith-wcwl-add-to-wishlist{
	    left: auto;
	    right: 32px;   
	    margin-top: 3px; 
	}
	.heateorSssMoreBackground {
	    background-color: transparent;
	}
	.heateorSssMoreSvg{background:url('data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2038%2038%22%3E%3Ccircle%20cx%3D%2210%22%20cy%3D%2215%22%20r%3D%223%22%20fill%3D%22%23000%22%3E%3C%2Fcircle%3E%3Ccircle%20cx%3D%2220%22%20cy%3D%2210%22%20r%3D%223%22%20fill%3D%22%23000%22%3E%3C%2Fcircle%3E%3Ccircle%20cx%3D%2220%22%20cy%3D%2220%22%20r%3D%223%22%20fill%3D%22%23000%22%3E%3C%2Fcircle%3E%3Cpath%20d%3D%22M%2010%2015%20L%2020%2010%20m%200%2010%20L%2010%2015%22%20stroke-width%3D%222%22%20stroke%3D%22%23000%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E') no-repeat center center;
		margin-top: 3px;
	}

	.columns-4 ul.heateor_sss_sharing_ul,
	.columns-4 .add-to-wishlist-before_image .yith-wcwl-add-to-wishlist {
	    top: 12.3em;   
	    bottom: 40px;
	    top: auto;
	}
	.columns-3 ul.heateor_sss_sharing_ul,
	.columns-3 .add-to-wishlist-before_image .yith-wcwl-add-to-wishlist {
	    top: 16.3em;
	    bottom: 40px;
	    top: auto;
	}
	.columns-2 ul.heateor_sss_sharing_ul,
	.columns-2 .add-to-wishlist-before_image .yith-wcwl-add-to-wishlist {
	    top: 23.3em;
	    bottom: 40px;
	    top: auto;
	}

	ul.heateor_sss_sharing_ul li{
		display: none;
	}
	ul.heateor_sss_sharing_ul li:last-child{
		display: block;
	}
	


	.filter_d2{
		display: block;
	}
	.filter2_d{
		display: flex;
		padding-top: 10px;
	}
	.filter_border_right{
		border-right: 1px solid;
		width: 70px;
		display: inline-block;
		margin-right: 15px;
	}
	form.ordering{
	    display: contents;
	    width: calc(100% - 100px);
	    padding-left: 10px;
	}
	input[type=range] {
	  width: 100%;
	  margin: 6.5px 0;
	  background-color: transparent;
	  -webkit-appearance: none;
	}
	input[type=range]:focus {
	  outline: none;
	}
	input[type=range]::-webkit-slider-runnable-track {
	  background: #000000;
	  border: 0;
	  border-radius: 0.9px;
	  width: 100%;
	  height: 0;
	  cursor: pointer;
	}
	input[type=range]::-webkit-slider-thumb {
	  margin-top: -6.5px;
	  width: 16px;
	  height: 16px;
	  background: #000000;
	  border: 0;
	  border-radius: 16px;
	  cursor: pointer;
	  -webkit-appearance: none;
	}
	input[type=range]:focus::-webkit-slider-runnable-track {
	  background: #262626;
	}
	input[type=range]::-moz-range-track {
	  background: #000000;
	  border: 0;
	  border-radius: 0.9px;
	  width: 100%;
	  height: 0;
	  cursor: pointer;
	}
	input[type=range]::-moz-range-thumb {
	  width: 16px;
	  height: 16px;
	  background: #000000;
	  border: 0;
	  border-radius: 16px;
	  cursor: pointer;
	}
	input[type=range]::-ms-track {
	  background: transparent;
	  border-color: transparent;
	  border-width: 7.5px 0;
	  color: transparent;
	  width: 100%;
	  height: 0;
	  cursor: pointer;
	}
	input[type=range]::-ms-fill-lower {
	  background: #000000;
	  border: 0;
	  border-radius: 1.8px;
	}
	input[type=range]::-ms-fill-upper {
	  background: #000000;
	  border: 0;
	  border-radius: 1.8px;
	}
	input[type=range]::-ms-thumb {
	  width: 16px;
	  height: 16px;
	  background: #000000;
	  border: 0;
	  border-radius: 16px;
	  cursor: pointer;
	  margin-top: 0px;
	  /*Needed to keep the Edge thumb centred*/
	}
	input[type=range]:focus::-ms-fill-lower {
	  background: #000000;
	}
	input[type=range]:focus::-ms-fill-upper {
	  background: #262626;
	}
	/*TODO: Use one of the selectors from https://stackoverflow.com/a/20541859/7077589 and figure out
	how to remove the virtical space around the range input in IE*/
	@supports (-ms-ime-align:auto) {
	  /* Pre-Chromium Edge only styles, selector taken from hhttps://stackoverflow.com/a/32202953/7077589 */
	  input[type=range] {
	    margin: 0;
	    /*Edge starts the margin from the thumb, not the track as other browsers do*/
	  }
	}
	.product_filters input.max_range_select {
	    vertical-align: middle;
	}
	.product_filters{
		font-family: "Helvetica Thin cond";
	    text-transform: uppercase;
	    letter-spacing: 0.08em;
	    margin-bottom: 1.6rem;
	}
	.product_filters .ordering{
		font-size: 1em;
	}
	    .product_filters input[type=range] {
	    max-width: 130px;
	}
	.product_filters [type="radio"] ,
	.product_filters [type="checkbox"] {
		vertical-align: top;
    	margin-top: 3px;
	}
	.product_filters [type="checkbox"],
	.product_filters [type="radio"]{
		display: none;
	}

	.product_filters [type="checkbox"]:checked,
	.product_filters [type="radio"]:checked{
		display: initial;
	}
	.product_filters [type="radio"]:checked:before ,
	.product_filters [type="checkbox"]:before {
	  position: relative;
	  display: block;
	  width: 11px;
	  height: 11px;
	  border: 1px solid #000000;
	  content: "";
	  background: #000;
	}

	.product_filters [type="checkbox"]:after {
	  position: relative;
	  display: block;
	  left: 2px;
	  top: -12px;
	  width: 11px;
	  height:1px;
	  border-width: 0;
	  border-style: solid;
	  border-color: #B3B3B3 #dcddde #dcddde #B3B3B3;
	  content: "";
	  background-image: linear-gradient(135deg, #B1B6BE 0%, #FFF 100%);
	  background-repeat: no-repeat;
	  background-position: center;
	}

	.product_filters [type="checkbox"]:checked:after {
	  background: #000;
	}

	.product_filters [type="checkbox"]:disabled:after {
	  -webkit-filter: opacity(0.4);
	}

	.product_filters [type="checkbox"]:not(:disabled):checked:hover:after {
	  background: #000;
	}

	.product_filters [type="checkbox"]:not(:disabled):hover:after {
	  background-image: linear-gradient(135deg, #8BB0C2 0%, #FFF 100%);
	  border-color: #85A9BB #92C2DA #92C2DA #85A9BB;
	}

	.product_filters [type="checkbox"]:not(:disabled):hover:before {
	  border-color: #3D7591;
	}

	/* Large checkboxes */
	.product_filters .large {
	  height: 22px;
	  width: 22px;
	}

	.product_filters .large[type="checkbox"]:before {
	  width: 20px;
	  height: 20px;
	}

	.product_filters .large[type="checkbox"]:after {
	  top: -20px;
	  width: 16px;
	  height: 16px;
	}

	/* Custom checkbox */
	.product_filters .large.custom[type="checkbox"]:checked:after {
	  background: #000;
	}

	.product_filters .large.custom[type="checkbox"]:not(:disabled):checked:hover:after {
	  background: #999;
	}
	.product_filters label{
		font-size: 0.9em;
	}
	.pointer{
		cursor: pointer;
	}

    .woocommerce ul.products.columns-4 li:nth-child(4n+1) {
        clear: both;
    }
    .woocommerce ul.products.columns-4 li:nth-child(4n) {
        margin-right: 0;
    }
	/*
	@media only screen and (min-width: 768px) and (max-width: 991px){	
		.max_3u_pages {
		    width: 63%;
		    margin-right: 2%;
		}
	}*/
	@media only screen and (max-width: 767px){
		.max_3u_pages {
		    width: 100% !important;
		}
		ul.products .add-to-wishlist-before_image .yith-wcwl-add-to-wishlist{
			right: 40px;
		}
		h1.woocommerce-products-header__title{
			font-size: 1.46rem;
			letter-spacing: 1px;
		}
		.columns-3 > li, .columns-4 > li{
			width: 49% !important;
		}
		.columns-2, .columns-3, .columns-4{
			background: #fafafa;
		}
		.columns-3{
			background: #fafafa;
		}
		.woocommerce ul.products li.product-category, .woocommerce-page ul.products li.product-category{
			padding-right: 0px;
		}
		/*
		#menuToggle {
		    height: 60px;
		}
		.max_3u_pages_menu {
		    height: 100px;
		    z-index: 999;
		}*/
        .heateorSssMoreSvg{
            background-image: url('<?php echo get_template_directory_uri().'/images/share-icon.png' ?>') !important;
            background-repeat: no-repeat;
            background-size: 14px !important;
            background-position: center;
        }
		ul.products .add-to-wishlist-before_image .yith-wcwl-add-to-wishlist{
			bottom: 17px;
			right: 50px;
		}
		.heateorSssMoreSvg{
			margin-top: 24px;
			background-size: 40px; 
		}
		.max_u3_arc_shop_price{
			display: inline-block !important;
		}
		.max_author{
			display: none !important;
		}

		.col-md-3 > .max_range_select{
			display: none;
		}
		.filter_border_right {
		    /*border-right: 1px solid;*/
		    width: 25%;
		    display: inline-block;
		    margin-right: 0;
		    padding: 10px;
		    height: 70px;
		}
		.col-md-3 {
		    width: 100%;
    		margin-bottom: 15px;
    		padding: 10px;
		}
		.col-md-3 > li{
			margin-top: 10px;
		}
		.woocommerce ul.products li.product-category.product .woocommerce-loop-category__title {
 		   font-size: 2em !important;
		}
		.price{
			display: none !important;
		}
		/*

		.columns-2 .max_bg_thumb {
		    height: 17em !important;
		}
		.columns-2 .max_bg_thumb img {
		    max-height: 15em !important;
		}*/
		.woocommerce ul.products.columns-2 li.product.type-product .price {
		    font-size: 1.3rem; 
		    /*margin-left: 5px;*/
		}
/*		.woocommerce ul.products.columns-2 li.product.type-product .price bdi{
			float: left;
		}*/
	}
	.woocommerce ul.products li.type-product, .woocommerce-page ul.products li.type-product {
	    float: left;
	    margin: 0 2% 2.992em 0;
	    padding: 0;
	    position: relative;
	    width: 23.4%;
	    margin-left: 0;
	}

	@media (min-width: 768px){
		/*

	    .columns-2 .max_bg_thumb{
	    height: 23em !important;
	    }
	    .columns-2 .max_bg_thumb img{
	        max-height: 23em !important;
	    }

	    .columns-3 .max_bg_thumb{
	        height: 16em !important;
	    }
	    .columns-3 .max_bg_thumb img{
	        max-height: 16em !important;
	    }

	    */

	    .woocommerce ul.products.columns-3 li.product:nth-child(2n), 
	    .woocommerce-page ul.products.columns-3 li.product:nth-child(2n){
	    	float: left;
    		clear: none!important;
	    }
	    /* [class*=columns-] */
	    ul.products.columns-3 li.product.type-product,
	    .woocommerce-page ul.products.columns-3 li.product.type-product{
	    	clear: none;
	    } 

	    .woocommerce ul.products.columns-3 li.last, 
	    .woocommerce-page ul.products.columns-3 li.last {
	        margin-right: 2.992em;
	    }

	    .woocommerce ul.products.columns-3 li:nth-child(3n+1) {
	        clear: both;
	    }
	    .woocommerce ul.products.columns-3 li:nth-child(3n) {
	        margin-right: 0;
	    }
	    .woocommerce ul.products.columns-3 li.first,
	    .woocommerce-page ul.products.columns-3 li.first {
	        clear: none;
	    }

	    .woocommerce ul.products.columns-3 li.product.type-product, 
	    .woocommerce-page ul.products.columns-3 li.product.type-product {
	        width: 31.8% !important;
    		margin-right: 2%;
	    }
	    .woocommerce-page ul.products.columns-3 li.product.type-product:nth-child(3n) {
		    margin-right: 0 !important;
		}

		.woocommerce-page ul.products.columns-2 li.product.type-product:nth-child(2n) {
		    margin-right: 0;
		}

	    .woocommerce ul.products.columns-2 li.product.type-product, 
	    .woocommerce-page ul.products.columns-2 li.product.type-product {
	        width: 47%;
    		margin: 0 4.5% 3.592em 0;
	    }

	}
	@media (min-width: 768px) and (max-width: 1024px){

		.woocommerce ul.products[class*=columns-] li.product, .woocommerce-page ul.products[class*=columns-] li.product{
			clear: none;
		}

	    .woocommerce ul.products.columns-4 li.type-product, 
	    .woocommerce-page ul.products.columns-4 li.type-product {
	        width: 23.4% !important;
	        margin-right: 1.6%;
	    }

	    .woocommerce ul.products.columns-3 li.product, 
	    .woocommerce-page ul.products.columns-3 li.product {
	        width: 29.45% !important;
	    }

	    .woocommerce ul.products.columns-2 li.product, 
	    .woocommerce-page ul.products.columns-2 li.product {
	        width: 46%;
	    }
	}
	.products > li.product-category > a > img{
		display: none !important;
	}
	.max_u3_arc_shop_price{
		font-family: "Helvetica Thin Cond";
		font-size: 0.9rem;
		padding: 4px 0 0 5px; 
		font-style: unset;
		font-weight: bold;
		letter-spacing: 2px;
		color: black;
	}
	.price{
		display: block;
	}
	.max_author{
		display: block;
	}
	.max_u3_arc_shop_price{
		display: none;
	}

</style>



<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();
			
	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );

?>
<script type="text/javascript">

	jQuery('.max_range_select').val(<?php echo $max_range_select ?>).trigger('change');

	jQuery('.ordering input').on('change', function(){
		var userdata = [];
		var form = jQuery(this).closest('form');
		jQuery(".filter_artist:checked").each(function(){
            userdata.push(this.value);
        });
		//jQuery('.user_filters_id').val(userdata);
		jQuery(".user_filters_ids").val(userdata.join(","));
		//form.find('.user_filters:checked').val('');
		setTimeout(function(){
			form.submit();
		},10)
	});
	jQuery(document).ready(function(){
		jQuery('.max_range_select').val(<?php echo $max_range_select ?>).trigger('change');

		if(jQuery(document).find('.filter_count').length > 0){
			jQuery('.filter_d').hide(); 
			jQuery('.filter2_d').show(); 
		}
		
		jQuery(document).on('click', '.filter_d_text', function(){
			jQuery('.filter_d').hide(); 
			jQuery('.filter2_d').show(); 
		});
		jQuery(document).on('click', '.clear_filter', function(){
			var location_clear = jQuery(this).attr('data-url');
			window.location = location_clear;
		});

		jQuery(document).on('click', '.close_filter', function(){
			jQuery('.filter_d').show(); 
			jQuery('.filter2_d').hide(); 
		});		
	});

	let src = '';
	jQuery('.products').find('li.product-category').each(function(){
		src = jQuery(this).find('a > img').attr('src');
		jQuery(this).css({"background-image" : "url("+src+")", "background-size" : "cover", "background-position" : "center"});

	});
</script>