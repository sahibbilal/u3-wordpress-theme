<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
$bg_image_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()), 'thumbnail' );
?>
<style type="text/css">
	.site-content {
	    max-width: 1000px;
	    margin: 0 auto;
	}
	.max_3u_pages{
		<?php if(!empty($bg_image_url)){ ?>
	        background-image: url(<?php echo $bg_image_url ?>);			        
	    <?php }else{
	    	?>
			background-image: url("<?php echo get_template_directory_uri() . '/images/my-account-bg.png' ?>");
		<?php
	    } ?>
		background-size: cover;
		background-repeat: no-repeat;
		height: 100vh;
		overflow: hidden;
	    overflow-y: auto;
	    padding-bottom: 150px;
	}
	html.no-js.yes-js.js_active.js, html {
	    overflow: hidden; !important;
	}

	.max_3u_lost_password{
		padding: 10px;
		padding-left: 13px;
		width: 99%;
		border: 1px solid;
		font-family: Open Sans;
		font-size: 1rem;
		font-weight: bold;
	}
	.max_3u_my_account_lost_pass_username{
		margin-left: 15px;
		font-family: Axis;
		font-size: 1rem;
		letter-spacing: 1px;
		font-weight: bold;
	}
	.max_3u_lost_pass_btn{
		cursor: pointer;
		background-color: black;
		max-width: 300px;
		width: 100%;
		padding: 8px;
		font-family: Couture;
		color: #fff;
		letter-spacing: 4px;
		font-size: 1.4rem;
		text-align: center;
		border: unset;
	}
	.entry-title{
		font-family: Couture;
		font-size: 1.8rem;
		text-align: center;
		text-transform: uppercase;

	}
	.max_3u_lost_pass_msg{
		color: black;
		font-family: Helvetica Thin;
		font-size: 1.1rem;
		text-transform: uppercase;
		font-weight: bold;
		margin-top: 40px;
		margin-bottom: 40px;
	}
	.entry-header{
		max-width: 1400px;
	}
</style>

<form method="post" class="woocommerce-ResetPassword lost_reset_password">

	<p class="max_3u_lost_pass_msg"><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first" style="max-width: 400px;">
		<label for="user_login" class="max_3u_my_account_lost_pass_username"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
		<input class="woocommerce-Input woocommerce-Input--text input-text max_3u_lost_password" type="text" name="user_login" id="user_login" autocomplete="username" />
	</p>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

	<p class="woocommerce-form-row form-row">
		<input type="hidden" name="wc_reset_password" value="true" />
		<button type="submit" class="woocommerce-Button max_3u_lost_pass_btn" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
	</p>

	<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

</form>
<?php
do_action( 'woocommerce_after_lost_password_form' );
