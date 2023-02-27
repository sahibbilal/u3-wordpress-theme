<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

if ( is_checkout() ) {
?>
<style type="text/css">
	.max_3u_checkout_overview_container{
		width: 100%;
		display: none;
	}
	.max_3u_left_side_ship_payment{
		width: 49%;
		height: auto;
		border-right: 2px solid black;
	}
	.max_3u_pages .entry-title {
		display: none;
	}
	.max_3u_right_side_your_products{
		width: 49%;
		height: auto;
	}
	.max_3u_right_side_your_products > h1{
		padding: 0px 0px 20px 20px;
		font-family: Couture;
		font-weight: bold;
	}
	.max_3u_left_side_ship_payment_table li{
		list-style: none;
		font-family: Open Sans;
		font-size: 1.07rem;
	}
	.max_3u_left_side_ship_payment_table li:nth-child(1){
		list-style: none;
		font-family: Open Sans;
		font-size: 1.07rem;
		font-weight: bold;
	}
	.max_3u_left_side_ship_payment_table ul{
		margin-left: 0px;
		line-height: 25px;
	}
	.max_3u_left_side_ship_payment_table h1{
		margin-bottom: 20px;
		font-size: 2.2rem;
		font-family: Couture;
		font-weight: bold;
	}
	.max_3u_left_side_ship_payment_table td{
		padding-bottom: 0px;
	}
	.max_3u_return_policy_service_a_tag{
		color: black;
	    font-size: 1rem;
	    font-family: 'Helvetica Thin Cond';
	    letter-spacing: 0.05em;
	}
	.max_3u_checkout_bottom_line{
		width: 80%;
		height: 2px;
		margin-bottom: 20px;
		margin-top: 20px;
		background-color: black;
	}
	.max_3u_checkout_bottom_line_two{
		width: 100%;
		height: 2px;
		background-color: black;
		margin: 20px 0px;
	}
	.max_3u_checkout_bottom_line_three{
		width: 95%;
		height: 2px;
		background-color: black;
	}
	.max_3u_image_div{
		width: 100%;
		padding: 10px;
		height: 110px;
		background-color: grey;
	}
	.max_3u_pro_attr{
		width: 100%;
		height: 100px;
    	margin-left: 20px;
	}
	.max_3u_pro_attr > ul > li{		
    	font-family: 'Helvetica Thin Cond';
	}
	.max_3u_pro_attr > ul > li:nth-child(1){
		font-style: italic;
	}
	.max_3u_right_side_products_table li{
		list-style: none;
	}
	.max_3u_right_side_products_table{
		padding-left: 20px;
		table-layout: fixed;
		width: 100%;
	}
	.max_3u_right_side_products_table ul{
		margin-left: 0px;
	}
	#max_3u_go_back{
		width: 30%;
		padding: 4px;
		height: 40px;
		font-size: 1.5rem;
		border:2px solid black;
		background-color: #fff;
		font-family: Couture;
		font-weight: 700;
	}
	#max_3u_confirm_buy{
		width: 60%;
		padding: 4px;
		height: 40px;
		background-color: black;
		color: #fff;
		font-size: 1.5rem;
		font-family: Couture;
		font-weight: 700;
	}
	#max_3u_proceed_to_pay{
		width: 80%;
		padding: 4px;
		height: 40px;
		background-color: black;
		float: right;
		color: #fff;
		font-size: 1.5rem;
		font-family: Couture;
		font-weight: 700;
	}
	.max_3u_return_terms_checkout{
		display: flex;
		justify-content: space-between;
		margin-top: 20px;
		padding: 15px 0px 15px 20px;
		width: 45%;
		margin-right: 2%;
	}
	.max_3u_return_terms_checkout_two{
		display: flex;
		margin-top: 20px;
		padding: 15px 0px 15px 20px;
		width: 45%;
		margin-right: 2%;
	}
	.max_3u_return_terms_checkout_two > a:nth-child(1){
		margin-right: 20px;
	}
	.max_3u_confirm_back_checkout_buttons{
		width: 48%;
		display: flex;
		margin-left: 20px;
		margin-top: 20px;
		justify-content: space-between;
	}
	.max_3u_proceed_to_pay_checkout_button{
		width: 48%;
		margin-left: 20px;
		margin-top: 20px;
	}
	.max_3u_extra_policies_buttons{
		display: flex;
		width: 100%;
		height: auto;
	}
	.max_3u_ship_payment_your_products{
		width: 100%;
		display: flex;
		padding-left: 20px;
	}
	.max_3u_angle_down{
		margin-top: -20px;
    	margin-left: 5px;
    	font-size: 2.5rem;
	}
	.max_3u_angle_up{
		margin-top: -20px;
    	margin-left: 5px;
    	font-size: 2.5rem;
    	display: none;
	}
	.woocommerce-checkout-review-order-table{
		display: none;
	}
	#order_review{
		display: none;
		width: 95%;
		margin-left: 20px;
	}
	.max_3u_shipping_checkout_fields, .max_3u_billing_checkout_fields{
		padding: 8px;
	    margin: 10px 0px 15px 0px;
	    width: 80%;
	}
	.max_3u_shipping_table, .max_3u_billing_table{
		width: 100%;padding-left: 20px;margin-bottom: 20px;
	}
	.max_3u_shipping_table{
		display: none;
	}
	.max_3u_shipping_table tr td{
		width: 50%;
	}
	.max_3u_billing_table tr td{
		width: 50%;
	}

	.max_3u_shipping_table tr td label{
		font-family: Axis;
	}
	.max_3u_billing_table tr td label{
		font-family: Axis;
	}
	.max_3u_shipping_table tr td p{
		font-family: Helvetica Thin;
		margin-right: 90px;
    	margin-bottom: 10px;
    	text-align: right;
    	font-size: 0.7rem;
	}
	.max_3u_billing_table tr td p{
		font-family: Helvetica Thin;
		margin-right: 90px;
    	margin-bottom: 10px;
    	text-align: right;
    	font-size: 0.7rem;
	}
	.max_3u_billing_table tr td a{
		font-family: Helvetica Thin;
		margin-right: 90px;
		color: black;
    	font-size: 0.9rem;
	}
	.max_3u_shipping_table tr td a{
		font-family: 'Helvetica Thin';
		margin-right: 90px;
		color: black;
    	font-size: 0.9rem;
	}
	.max_3u_use_this_address{
		width: 250px;
	    padding: 6px;
	    padding-left: 10px;
		background-color: black;
		color: #fff;
		margin-right: 20%;
		border: unset;
		margin-bottom: 5px;
		letter-spacing: 3px;
		float: right;
		font-size: 1.1rem;
		font-family: Couture;
		font-weight: 700;	
	}
	.max_3u_billing_checkout_fields select{
		border-color: black !important;
		padding: 13px;
		width: 80% !important;
	}
	#select2-billing_country-container{
		border-color: black !important;
		padding: 8px;
		width: 80% !important;
	}
	.max_3u_billing_checkout_fields input{
		padding: 13px;
		width: 80% !important;
	}
	.max_3u_billing_checkout_fields label{
		margin-left: 15px;
		font-family: Axis;
		font-size: 1rem;
	}
	.max_3u_wrapper_ship_bill_fields{
		display: none;
	}
	.max_3u_ship_to_another_address{
		padding-left: 20px;
    	margin-bottom: 20px;
	}
	.woocommerce-billing-fields__field-wrapper > p:nth-child(even){
		width: 50%;
		padding-left: 20px;
		display: inline-block;
	}
	.woocommerce-billing-fields__field-wrapper > p:nth-child(odd){
		width: 50%;
		display: inline-block;
	}
	#billing_email{
		margin-bottom: 80px;
	}
	#billing_first_name_field{
		display: inline-block;
	}
	#billing_last_name_field{
		display: inline-block;
		float: right;
	}
	#billing_country_field{
		display: inline-block;
	}
	#billing_address_1_field{
		display: inline-block;
		float: right;
	}
	#billing_city_field{
		display: inline-block;
	}
	#billing_postcode_field{
		display: inline-block;
		float: right;
	}
	.select2-selection--single{
		height: 40px !important;
	}
	.select2-container--default{
		width: 80% !important;
	}
	.max_3u_use_this_address_con{
		width: 100%;
		height: 200px;
		justify-content: end;
		display: flex;
		padding-right: 10%;
	}
	.woocommerce-billing-fields > h3{
		display: none;
	}
	.woocommerce-billing-fields{
		padding-left: 20px;
	}
	.max_3u_checkout_title{
		text-align: center;
		margin-bottom: 60px;
		font-family: Couture;
		font-size: 2rem;
	}
	.max_3u_titles{
		text-align: center;
		font-family: Helvetica Thin Cond;
		font-size: 1.1rem;
		font-weight: bold;
	}
    #billing_country{
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

    .modify_camps{
    	float: right;
    	margin-right: 20%;
    	font-family: Helvetica Thin Cond;
    	color: black;
    	font-size: 1.1rem;
    }
</style>
<?php } ?>
<?php if ( 'guest' == WC()->session->get( 'max_3u_guest_login_info' ) || is_user_logged_in() == true ) { ?>
<script type="text/javascript">
	jQuery(document).ready(function($){
		$('#billing_email_field').append('<p class="form-row max_3u_billing_checkout_fields"><span class="woocommerce-input-wrapper"><button class="max_3u_use_this_address" type="button" id="max_3u_use_this_address" name="max_3u_use_this_address">USE THIS ADDRESS</button><br><br><a href="#" class="modify_camps">MODIFY CAMPS</a></span></p>');
		// $('.woocommerce-billing-fields__field-wrapper p:last-child').after('');
	});
</script>

<h1 style="max-width: 1400px;" class="max_3u_checkout_title">CHECK OUT</h1>
<form style="max-width: 1400px;" name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
<div class="max_3u_checkout_checkout">
	<div class="step">		
		<h2 class="max_3u_titles">SHIPPING ADDRESS</h2>
		<div style="display: flex;margin: 10px 20px;"><p class="max_3u_checkout_bottom_line_three"></p><i data-id="shipping" class="fa fa-angle-down max_3u_angle_down" aria-hidden="true"></i><i data-id="shipping" class="fa fa-angle-up max_3u_angle_up" aria-hidden="true"></i></div>
		<div class="woocommerce-billing-fields__field-wrapper max_3u_wrapper_ship_bill_fields max_3u_checkout_step">
			<?php
				do_action( 'woocommerce_checkout_billing' );
			?>
		</div>
	</div>
	<div class="step">		
		<h2 class="max_3u_titles">PAYMENT METHOD</h2>
		<div style="display: flex;margin: 10px 20px;"><p class="max_3u_checkout_bottom_line_three"></p><i data-id="payment" class="fa fa-angle-down max_3u_angle_down" aria-hidden="true"></i><i data-id="payment" class="fa fa-angle-up max_3u_angle_up" aria-hidden="true"></i></div>
		<div id="order_review" class="woocommerce-checkout-review-order max_3u_checkout_step">
			<?php do_action( 'woocommerce_checkout_order_review' ); ?>
		</div>
	</div>
	<div class="step">
	<h2 class="max_3u_titles">OVERVIEW</h2>
	<div style="display: flex;margin: 10px 20px;"><p class="max_3u_checkout_bottom_line_three"></p><i data-id="overview" class="fa fa-angle-down max_3u_angle_down" aria-hidden="true"></i><i data-id="overview" class="fa fa-angle-up max_3u_angle_up" aria-hidden="true"></i></div>
	<div class="max_3u_checkout_overview_container max_3u_checkout_step">
			<div class="max_3u_right_side_your_products">				
				<table class="max_3u_right_side_products_table">
					<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) { 

						$author_id = get_post_field ( 'post_author', $cart_item['data']->get_id() );
						$display_name = get_the_author_meta( 'display_name' , $author_id ); 
						$product = wc_get_product( $cart_item['data']->get_id() );
						$price = ($product->get_price());
						$_product = new WC_Product_Variation( $cart_item['variation_id'] );
					    $variation_data = $_product->get_variation_attributes();
					    $variation_detail = woocommerce_get_formatted_variation( $variation_data, true );

					?>
						<tr>
							<td style="width: 100px;">
								<div class="max_3u_image_div1">
								<img style="height: 100%;" width="100px" src="<?php echo woocommerce_get_product_thumbnail($product); ?>" alt="" />
								</div>
							</td>
							<td style="height: auto;">
								<div class="max_3u_pro_attr">
									<h4 style="margin-bottom: 0px;"><a style="text-decoration: none;color: black;" href="<?php echo get_permalink( $cart_item['data']->get_id() ) ?>"><?php echo get_the_title( $cart_item['data']->get_id() ); ?></a></h4>
									<ul>
										<li>by&nbsp;<?php echo $display_name; ?></li>
										<?php foreach ($variation_data as $key => $value) { ?>
											<li><?php echo $value; ?></li>
										<?php } ?>
										<li><?php echo wc_price($price); ?></li>
									</ul>
								</div>
							</td>
						</tr>
						<tr><td colspan="2"><p class="max_3u_checkout_bottom_line_two"></p></td></tr>
					<?php } ?>
					<tr>
						<td style="width: 50%;"><p>TOTAL + SHIPPING</p></td>
						<td style="width: 50%;text-align: right;"><p id="max_3u_order_total"><?php echo WC()->cart->total.get_woocommerce_currency_symbol(); ?></p></td>
					</tr>
				</table>
			</div>

		</div>

	</div>
	<div style="display: none;">

		<div class="max_3u_ship_payment_your_products">
			<div class="max_3u_left_side_ship_payment">
				<table class="max_3u_left_side_ship_payment_table">
					<tr>
						<td>
							<h1>SHIPPING TO</h1>
							<ul>
								<li id="max_3u_gabriel_exemplu">GABRIAL EXEMPLU</li>
								<li id="max_3u_gabriel_address">via Mirabello 21 / C</li>
								<li id="max_3u_gabriel_city">Bologna PD</li>
								<li id="max_3u_gabriel_postcode">italia 37865</li>
							</ul>
						</td>
					</tr>
					<tr><td><p class="max_3u_checkout_bottom_line"></p></td></tr>
					<tr>
						<td>
							<h1>CHOSEN PAYMENT METHOD</h1>
							<ul>
								<li>GABRIAL EXEMPLU</li>
								<li>via Mirabello 21 / C</li>
								<li>Bologna PD</li>
								<li>italia 37865</li>
							</ul>
						</td>
					</tr>
					<tr><td><p class="max_3u_checkout_bottom_line"></p></td></tr>
					<tr>
						<td>
							<h1>SHIPPING WITH</h1>
							<ul>
								<li>GABRIAL EXEMPLU</li>
								<li>via Mirabello 21 / C</li>
								<li>Bologna PD</li>
								<li>italia 37865</li>
							</ul>
						</td>
					</tr>
				</table>
			</div>
			<div class="max_3u_right_side_your_products">
				<h1>YOUR PRODUCTS</h1>
				<table class="max_3u_right_side_products_table">
					<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) { 

						$author_id = get_post_field ( 'post_author', $cart_item['data']->get_id() );
						$display_name = get_the_author_meta( 'display_name' , $author_id ); 
						$product = wc_get_product( $cart_item['data']->get_id() );
						$price = $product->get_price();
						$_product = new WC_Product_Variation( $cart_item['variation_id'] );
					    $variation_data = $_product->get_variation_attributes();
					    $variation_detail = woocommerce_get_formatted_variation( $variation_data, true );

					?>
						<tr>
							<td style="width: 40%;"><div class="max_3u_image_div"><img style="height: 100%;width: 100%;" src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" alt="No image Found" /></div></td>
							<td style="height: auto;">
								<div class="max_3u_pro_attr">
									<h4 style="margin-bottom: 0px;"><a style="text-decoration: none;color: black;" href="<?php echo get_permalink( $cart_item['data']->get_id() ) ?>"><?php echo get_the_title( $cart_item['data']->get_id() ); ?></a></h4>
									<ul>
										<li>by&nbsp;<?php echo $display_name; ?></li>
										<?php foreach ($variation_data as $key => $value) { ?>
											<li><?php echo $value; ?></li>
										<?php } ?>
										<li><?php echo $price.get_woocommerce_currency_symbol(); ?></li>
									</ul>
								</div>
							</td>
						</tr>
						<tr><td colspan="2"><p class="max_3u_checkout_bottom_line_two"></p></td></tr>
					<?php } ?>
					<tr>
						<td style="width: 50%;"><p>TOTAL + SHIPPING</p></td>
						<td style="width: 50%;text-align: right;"><p id="max_3u_order_total"><?php echo WC()->cart->total.get_woocommerce_currency_symbol(); ?></p></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="max_3u_extra_policies_buttons">
			<div class="max_3u_return_terms_checkout">
				<a href="https://maxenius.agency/staging/customtheme/return-policy/" class="max_3u_return_policy_service_a_tag">RETURN POLICY</a>
				<a href="https://maxenius.agency/staging/customtheme/terms-and-conditions/" class="max_3u_return_policy_service_a_tag">TERMS OF SERVICE</a>
			</div>
			<div class="max_3u_confirm_back_checkout_buttons">
				<button type="button" id="max_3u_go_back">GO BACK</button>
				<button type="button" id="max_3u_confirm_buy">CONFIRM AND BUY</button>
			</div>
		</div>


	</div>
	<div class="max_3u_extra_policies_buttons" style="margin-top: 80px;">
		<div class="max_3u_return_terms_checkout_two">
			<a href="https://maxenius.agency/staging/customtheme/return-policy/" class="max_3u_return_policy_service_a_tag" class="max_3u_return_policy_service_a_tag">RETURN POLICY</a>
			<a href="https://maxenius.agency/staging/customtheme/terms-and-conditions/" class="max_3u_return_policy_service_a_tag">TERMS OF SERVICE</a>
		</div>
		<div class="max_3u_proceed_to_pay_checkout_button">
			<button type="button" id="max_3u_proceed_to_pay">PROCEED TO PAYMENT</button>
		</div>
	</div>
</div>
<?php } else { 
	if ( wp_safe_redirect( get_permalink( get_option('woocommerce_myaccount_page_id') ) . '/?checkout=logger' ) ) {
    	exit;
	}
 } ?>

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php //do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php //do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
	
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	
	<h3 id="order_review_heading"><?php //esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
