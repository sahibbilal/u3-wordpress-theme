<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if(!isset($_GET['cpage'])){
	max_u3_my_account_menus();
}
if( !isset( $_GET['max_u3_login'] ) && !isset($_GET['cpage']) ) {
	return;
}
do_action( 'woocommerce_before_customer_login_form' ); 
$bg_image_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()), 'thumbnail' );
?>
<style type="text/css">
	.max_page_content {
	    padding-right: 10px;
	    background: unset;
	}
	.max_3u_my_account_login_page{
		width: 52%;
	}
	.max_3u_my_account_login_guest_con{
		width: 48%;
	}
	.max_3u_my_account_login_guest{
		padding-left: 20%;
		padding-right: 1%;
		max-width: 500px;
	}
	.max_3u_my_account_fields_container{
		max-width: 1400px;
		height: auto;
		display: flex;
	}
	.max_3u_my_account_fields{
		padding: 10px;
		padding-left: 13px;
		width: 99%;
		border: 1px solid;
		font-family: Open Sans;
		font-size: 1rem;
		font-weight: bold;
	}
	.max_3u_my_account_button, .max_3u_my_account_guest_button, .max_3u_my_account_sign_out_button{
		background-color: black;
		width: 100%;
		max-width: 150px;
		padding: 8px;
		font-family: Couture;
		border: unset;
		color: #fff;
		letter-spacing: 4px;
		font-size: 1.4rem;
		text-align: center;
	}
	.max_3u_pages::-webkit-scrollbar-track{
        background: transparent;   
    }
    .max_3u_pages::-webkit-scrollbar-thumb{
        background: transparent;
    }
	.max_3u_my_account_button{
		width: 170px;
		max-width: 170px;
	}
	.max_3u_my_account_sign_out_button{
		width: 175px;
		max-width: 175px;
	}
	.max_3u_my_account_guest_button{
		width: 100%;
		max-width: 350px;
		margin-top: 65px;
	}
	.entry-title{
		font-family: Couture;
		font-size: 1.8rem;
		text-align: center;
		text-transform: uppercase;	
		margin-top: 100px;	
	}
	.max_3u_my_account_fields_label{
		margin-left: 15px;
		font-family: Axis;
		font-size: 1rem;
		letter-spacing: 1px;
		font-weight: bold;
	}
	.max_3u_my_account_login_in_text{
		text-align: center;
		margin-bottom: 40px;
		font-family: Couture;
		font-size: 1.8rem;
	}
	.max_3u_my_account_fields_label_parent{
		padding-bottom: 5px;
	}
	.max_3u_my_account_fields_parent{
		padding-bottom: 20px;
	}
	.max_3u_forgot_password{
		color: black;
		font-family: Helvetica Thin;
		font-size: 1.1rem;
		display: block;
		text-align: right;
		/*margin-right: 1%;*/
		font-weight: bold;
		margin-top: 15px;
	}
	.max_3u_guest_div_p_tag{
		color: black;
		font-family: Helvetica Thin;
		font-size: 1.1rem;
		text-transform: uppercase;
		font-weight: bold;
	}
	.entry-header{
		max-width: 1400px;
		margin: 0 auto;
	}
	.max_3u_eye_svg, .max_3u_eye_slash_svg{
		margin-top: -37px;
	    /*position: absolute;*/
	    width: 20px;
/*	    right: 100px;*/
	    /*margin-right: 20px;*/
	    margin-left: 93%;
	}
	.max_3u_eye_svg{
		display: none;
	}
	@media screen and (max-width: 992px) {
		.max_3u_pages{
			width: 100%;
	    }	
		.max_3u_my_account_fields_container{
			display: unset;
		}
		.max_3u_my_account_login_page{
			width: 100%;
			padding-left: 20px;
		}
		.max_3u_my_account_login_guest_con{
			width: 100%;
			padding-left: 20px;
		}
		.max_3u_my_account_login_guest{
			margin-top: 50px;
			width: 100%;
			padding: 0 !important;
		}

	}
	.max_3u_return_pol{
		color: black; font-family: Helvetica Thin Cond; font-size: 1rem;margin-right: 20px;
	}

	@media screen and (max-width: 576px) {
/*		.max_3u_my_account_login_form{
			width: 90% !important;
		}*/
	}
	@media screen and (max-width: 768px) {
	    .max_page_content{
	        background: unset;
	    }
	}
	@media screen and (max-width: 767px) {
/*		.entry-header{
			padding-top: 100px;
		}*/
		.max_page_content{
			padding-right: 0px;
		}
		.max_3u_eye_svg, .max_3u_eye_slash_svg{
			margin-left: 90%;
		}
	}

	.max_pol_divs{
		margin-top: 85px;
	}
</style>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns col2-set" id="customer_login">

<?php endif; ?>

<?php 

	if( isset( $_POST['login_guest'] ) ) {
		if ( ! empty( $_POST['max_3u_guest_login'] ) ) {
			WC()->session->set( 'max_3u_guest_login_info' , $_POST['max_3u_guest_login'] );
			?>
			<script type="text/javascript">
				window.location = '<?php echo get_permalink( wc_get_page_id( 'checkout' ) ) ?>';
			</script>
			<?php
		}
	}
	if ( 'logger' == $_GET['checkout'] ) { 
	?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('.entry-title').html('CHECKOUT');
			});
		</script>
	<?php
	}
	if ( 'signup' != $_GET['cpage'] && 'logger' != $_GET['checkout'] && true != is_user_logged_in() ) {
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('.entry-title').html('SIGN IN');
			});
		</script>
		<style type="text/css">
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
				height: 100vh !important;
				overflow: hidden;
			    overflow-y: auto;
			    padding-bottom: 150px;
			}
			html.no-js.yes-js.js_active.js, html {
			    overflow: hidden; !important;
			}
			.max_3u_my_account_login_form{
				width: 52%;
				margin: auto;
				max-width: 1200px;
			}
			.max_3u_my_account_dont_have_acc, .max_3u_my_account_sign_in_diff{
				font-family: Helvetica Thin;
				font-size: 1.1rem;
				padding-top: 20%;
				/*padding-bottom: 5%;*/
			}
			.max_3u_my_account_sign_in_diff{
				display: none;
				padding-top: 0;
			}
			.max_u3_sign_in_inp_fields{
			    width: 100%;
			    padding: 12px;
			    margin-top: 10px;
			    margin-bottom: 25px;
			    border: 1px solid black;
			}

			@media only screen and (max-width: 992px){
				.max_u3_sign_in_inp_fields{
					margin-bottom: 15px;
				}
				.max_u3_sign_in_fields_cont{
					flex-wrap: wrap;
				}
				.max_3u_my_account_dont_have_acc{
					display: none;
				}
				.max_u3_sign_in_fields_div, .max_u3_sign_out_fields_div{
					width: 100% !important;
					margin-right: 6px;
				}
				.max_u3_sign_out_fields_div{
					margin-right: 12px;
					padding-left: 0px !important;
				}
				.max_u3_sigin_singout_or_cont{
					display: flex !important;
				}
				.max_u3_sign_out_fields_div > button{
					margin-top: 130px !important;
				}
				.max_3u_my_account_sign_in_diff{
					display: inline;
					float: right;
				}
			}
			@media only screen and (max-width: 768px){
				.max_u3_sigin_singout_or_cont{
					padding-right: 35px !important;
				}
			}

			@media only screen and (max-width: 600px){
				.max_u3_sign_in_inp_fields{
					margin-bottom: 20px;
					margin-top: 5px;
				}
				.max_3u_my_account_sign_in_diff{
					font-size: 0.9rem;
				}
/*				.max_u3_sign_in_fields_div, .max_u3_sign_out_fields_div{
					width: 100%;
					margin-right: 6px;
				}*/
			}

			.max_u3_sign_in_fields_cont{
			    width: 100%;
			    display: flex;
			    /*flex-wrap: wrap;*/
			    justify-content: space-between;
			}

			.max_u3_sign_in_fields_div, .max_u3_sign_out_fields_div{
				width: 50%;
			}
			.max_u3_sign_in_fields_div > form > label, .max_u3_sign_out_fields_div > form > label{
			    margin-left: 20px;
			    letter-spacing: 2px;
			    font-size: 1rem;
			    font-family: "Couture";
			}

			.max_u3_sign_in_fields_div, .max_u3_sign_out_fields_div{
				padding-left: 15px;
			}

			@media only screen and (max-width: 768px){
				.max_u3_sign_in_fields_div, .max_u3_sign_out_fields_div{
					margin-right: 15px !important;
				}
			}
			.max_u3_reg_error{
				display: none;
			}
			.max_u3_sign_in_fields_div > form{
				border: none !important;
			}
			.max_u3_sign_out_fields_div{
				display: flex;
				justify-content: center;
				align-items: center;
			}
			.max_u3_sign_out_fields_div > button{
				margin-top: 70px;
			}
			.max_u3_sigin_singout_or_cont{
			    display: none;padding-left: 40px;padding-right: 10px; width: 100%;overflow: hidden;
			}
			.max_u3_sign_in_form_fields_cont{
				width: 50%;
				margin: 0 auto;
			}
			.max_u3_sign_in_form_fields_cont > form{
				border: unset !important;
			}
			.max_u3_sign_in_form_fields_cont > form > label{
			    margin-left: 20px;
			    letter-spacing: 2px;
			    font-size: 1rem;
			    font-family: "Couture";
			}
		</style>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('.max_3u_eye_slash_svg').on('click', function(){
					jQuery(document).find('input[name=password]').attr('type', 'text');
				});
				jQuery('.max_3u_eye_svg').on('click', function(){
					jQuery(document).find('input[name=password]').attr('type', 'password');
				});
			});
		</script>
		<?php if( is_user_logged_in() ){ ?>
		<div class="max_3u_sign_in_form">
			<div class="max_u3_sign_in_fields_cont">
				<div class="max_u3_sign_in_fields_div">
					<h2 class="max_3u_my_account_dont_have_acc" style="text-align: center;margin-bottom: 35px;"><?php esc_html_e( 'SIGN IN WITH A DIFFERENT ACCOUNT', 'woocommerce' ); ?></h2>
					<form class="woocommerce-form woocommerce-form-login login" method="post">
						<?php do_action( 'woocommerce_login_form_start' ); ?>
			            <label>E-MAIL</label><h2 class="max_3u_my_account_sign_in_diff"><?php esc_html_e( 'SIGN IN WITH A DIFFERENT ACCOUNT', 'woocommerce' ); ?></h2>
			            <input type="text" name="username" id="username" autocomplete="username" class="max_u3_sign_in_inp_fields">
			            <label class="max_u3_reg_error">***Please fill the email field</label>
			            <label>PASSWORD</label>
			            <input type="password" style="margin-bottom:10px;" name="password" class="max_u3_sign_in_inp_fields">
			            <p class="max_3u_eye_svg">
							<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg></p><p class="max_3u_eye_slash_svg"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye-slash" class="svg-inline--fa fa-eye-slash fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path></svg>
						</p>
			            <label class="max_u3_reg_error">***Please fill the city field</label>
			            <?php do_action( 'woocommerce_login_form' ); ?>
			            <a class="max_3u_forgot_password" style="margin-bottom:10px;" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'FORGOT PASSWORD ?', 'woocommerce' ); ?></a>
			            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
			            <div style="text-align: center;">
			            	<button type="submit" style="float: none;" class="max_3u_my_account_button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'SIGN IN', 'woocommerce' ); ?>"><?php esc_html_e( 'SIGN IN', 'woocommerce' ); ?></button>
			        	</div>
			        	<?php do_action( 'woocommerce_login_form_end' ); ?>
		        	</form>
				</div>
				<div class="max_u3_sigin_singout_or_cont">
					<div style="width:45%; border: 1px solid black;height: 1px;margin-top: 10px;"></div><span style="font-family: 'Couture'; font-size: 1rem;margin-left: 10px;margin-right: 10px;letter-spacing: 1px;">OR</span><div style="width:47%; border: 1px solid black;height: 1px;margin-top: 10px;"></div>
				</div>
				<div class="max_u3_sign_out_fields_div">
					<button type="submit" class="max_3u_my_account_sign_out_button woocommerce-form-login__submit" name="logout" value="<?php esc_attr_e( 'SIGN OUT', 'woocommerce' ); ?>"><?php esc_html_e( 'SIGN OUT', 'woocommerce' ); ?></button>
				</div>
			</div>
		</div>
		<?php }else{ ?>
		<div class="max_3u_sign_in_form_two">
			<div class="max_u3_sign_in_form_fields_cont">
				<form class="woocommerce-form woocommerce-form-login login" method="post">
					<h2 class="max_3u_my_account_dont_have_acc" style="text-align: center;margin-bottom: 50px;"><?php esc_html_e( 'DONT HAVE AN ACCOUNT? I ', 'woocommerce' ); ?><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ).'?cpage=signup'; ?>" class="max_3u_my_account_dont_have_acc" style="color:black;">SIGN UP</a></h2>
					<?php do_action( 'woocommerce_login_form_start' ); ?>
		            <label>E-MAIL</label><h2 class="max_3u_my_account_sign_in_diff"><?php esc_html_e( 'DONT HAVE AN ACCOUNT? I ', 'woocommerce' ); ?><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ).'?cpage=signup'; ?>" class="max_3u_my_account_sign_in_diff" style="color:black;">SIGN UP</a></h2>
		            <input type="text" name="username" id="username" autocomplete="username" class="max_u3_sign_in_inp_fields">
		            <label class="max_u3_reg_error">***Please fill the email field</label>
		            <label>PASSWORD</label>
		            <input type="password" style="margin-bottom:10px;" name="password" id="password" class="max_u3_sign_in_inp_fields">
		            <p class="max_3u_eye_svg">
						<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg></p><p class="max_3u_eye_slash_svg"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye-slash" class="svg-inline--fa fa-eye-slash fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path></svg>
					</p>
					<?php do_action( 'woocommerce_login_form' ); ?>
		            <label class="max_u3_reg_error">***Please fill the city field</label>
		            <a class="max_3u_forgot_password" style="margin-bottom:10px;" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'FORGOT PASSWORD ?', 'woocommerce' ); ?></a>
		            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
		            <div style="text-align: center;">
		            	<button type="submit" style="float: none;" class="max_3u_my_account_button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'SIGN IN', 'woocommerce' ); ?>"><?php esc_html_e( 'SIGN IN', 'woocommerce' ); ?></button>
		        	</div>
		        	<?php do_action( 'woocommerce_login_form_end' ); ?>
	        	</form>
			</div>
		</div>
		<?php
	}}
	if ( 'logger' == $_GET['checkout'] && true != is_user_logged_in() ) {
?>

	<div class="max_3u_my_account_fields_container">
		<div class="max_3u_my_account_login_page">
			<table style="width: 100%;">
				<form class="woocommerce-form woocommerce-form-login login" method="post">
					<?php do_action( 'woocommerce_login_form_start' ); ?>
					<tr>
						<td>
							<h2 class="max_3u_my_account_login_in_text" style="text-align: center;margin-bottom: 35px;"><?php esc_html_e( 'LOG IN', 'woocommerce' ); ?></h2>
						</td>
					</tr>
					<tr>
						<td class="max_3u_my_account_fields_label_parent"><label class="max_3u_my_account_fields_label"><?php esc_html_e( 'E-MAIL', 'woocommerce' ); ?></label></td>
					</tr>
					<tr>
						<td class="max_3u_my_account_fields_parent"><input type="text" class="max_3u_my_account_fields"  name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"></td>
					</tr>
					<tr>
						<td class="max_3u_my_account_fields_label_parent"><label class="max_3u_my_account_fields_label"><?php esc_html_e( 'PASSWORD', 'woocommerce' ); ?></label></td>
					</tr>
					<?php do_action( 'woocommerce_login_form' ); ?>
					<tr>
						<td style="padding-bottom: 5px;position: relative;"><input type="password" class="max_3u_my_account_fields woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password">
<!-- 						<p class="max_3u_eye_svg"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg></p><p class="max_3u_eye_slash_svg"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye-slash" class="svg-inline--fa fa-eye-slash fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path></svg>
						</p> -->
						</td>
					</tr>
					<tr>
						<td style="padding-bottom: 10px;"><a class="max_3u_forgot_password" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'FORGOT PASSWORD ?', 'woocommerce' ); ?></a></td>
					</tr>
					<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
					<tr>
						<td style="text-align: center;"><button type="submit" class="max_3u_my_account_button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'SIGN IN', 'woocommerce' ); ?></button></td>
					</tr>
					<?php do_action( 'woocommerce_login_form_end' ); ?>
				</form>
			</table>
		</div>
	<?php } ?>
		<div class="max_3u_my_account_login_guest_con">
			<?php if ( 'guest' != WC()->session->get( 'max_3u_guest_login_info' ) && 'logger' == $_GET['checkout'] ) { ?>
				<div class="max_3u_my_account_login_guest">
					<h2 class="max_3u_my_account_login_in_text" style="text-align: left;"><?php esc_html_e( 'PURCHASE AS GUEST', 'woocommerce' ); ?></h2>
					<p class="max_3u_guest_div_p_tag">You can purchase as guest. You will just need to indicate the essential details to place your order.</p>
					<p class="max_3u_guest_div_p_tag" style="margin-top: 20px;">If you’d like, you can register and save your details at the end of the process for future purchases.</p>
					<form method="post">
						<input type="hidden" name="max_3u_guest_login" value="guest">
						<button type="submit" class="max_3u_my_account_guest_button" name="login_guest" value="<?php esc_attr_e( 'CONTINUE AS GUEST', 'woocommerce' ); ?>"><?php esc_html_e( 'CONTINUE AS GUEST', 'woocommerce' ); ?></button>
					</form>
				</div>
			
		</div>
	</div>
	<div class="max_pol_divs">
		<a class="max_3u_return_pol" href="https://maxenius.agency/staging/customtheme/return-policy/" class="max_3u_return_policy_service_a_tag">RETURN POLICY</a><a class="max_3u_return_pol" href="https://maxenius.agency/staging/customtheme/terms-and-conditions/" class="max_3u_return_policy_service_a_tag">TERMS OF SERVICE</a>
	</div>
	<?php } ?>
		
<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
		<div class="u-column1 col-1">

	</div>

</div>
<?php if ( 'signup' == $_GET['cpage'] && true != is_user_logged_in() ) { ?>

		<style type="text/css">
			html.no-js.yes-js.js_active.js, html {
			    overflow: hidden !important;
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
				height: 100vh !important;
				overflow: hidden;
			    overflow-y: auto;
			    padding-bottom: 50px;
			}
			.max_3u_pages::-webkit-scrollbar-track{
                background: transparent;   
            }
            .max_3u_pages::-webkit-scrollbar-thumb{
                background: transparent;
            }
			.max_u3_sign_up_address, .max_3u_register_user_form{
			    width: 100%;
			    display: flex;
			    /*flex-wrap: wrap;*/
			    justify-content: space-between;
			}

			.max_u3_sign_up_form_left_side, .max_u3_sign_up_form_left_side_div{
			    width: 45%;
/*			    margin-right: 70px;*/
			}

			.max_u3_sign_up_inp_fields, .max_u3_sign_up_form_inp_fields{
			    width: 100%;
			    padding: 12px;
			    margin-top: 10px;
			    margin-bottom: 25px;
			    border: 1px solid black;
			}

			.max_u3_sign_up_form_left_side > label, .max_u3_sign_up_form_right_side > label,
			.max_u3_sign_up_form_left_side_div > label, .max_u3_sign_up_form_right_side_div > label{
			    margin-left: 20px;
			    letter-spacing: 2px;
			    font-size: 1rem;
			    font-family: "Couture";
			}


			.max_u3_sign_up_form_right_side, .max_u3_sign_up_form_right_side_div{
			    width: 45%;
			    /*margin-right: 40px;*/
			}

			.max_3u_register_user{
				width: 100%;
				max-width: 1100px;
				margin: 0 auto;
			}
/*			.max_3u_register_user_form{
				width: 95%;
				display: flex;
				margin: 0px auto;
			}*/
			.max_3u_register_user_left_side, .max_3u_register_user_right_side{
				width: 100%;
			}

			.max_3u_register_user_left_side{
				padding-left: 5%;
				padding-right: 3%;
			}
			.max_3u_register_user_right_side{
				padding-left: 5%;
				padding-right: 3%;
			}
			.max_3u_register_form_label{
				font-family: Axis;
				font-size: 1.1rem;
				padding-left: 15px; 
				letter-spacing: 2px;
			}
			.max_3u_register_form_fields{
				/*margin-bottom: 5px;*/
				padding: 10px;
				padding-left: 13px;
				width: 100%;
				border: 1px solid;
				font-family: Open Sans;
				font-size: 1rem;
				font-weight: bold;
			}
			.max_3u_register_p_tag{
				padding-bottom: 10px;
			}
			.max_3u_register_form_name_del {
				text-align: center; font-family: Helvetica Thin; font-size: 1.3rem;margin-bottom: 70px;font-weight: bold;
				    margin-bottom: 5%;
    				margin-top: 15%;
			}
			.max_3u_register_notice{
				font-family: Helvetica Thin; font-size: 1.1rem;font-weight: bold;text-align: right;width: 100%;
			}
			.max_3u_register_user_left_side > p, .max_3u_register_user_right_side > p {
				width: fit-content;
			}
			.max_3u_sign_up_btn, .max_3u_sign_up_prev{
				padding: 7px;
				font-family: Couture;
				font-size: 1.7rem;
				letter-spacing: 4px;
				font-weight: bold;
				background-color: black;
				color: #fff;
				width: 180px;
				border:unset;
				float: right;
				margin-top: 10px;
				cursor: pointer;
			}
			.max_3u_sign_up_prev{
				float: none;
			}
			.max_page_content .woocommerce-error{
				max-width: 900px;
			}
			@media only screen and (max-width: 576px){
			    .max_3u_register_user_form {
			        /*display: unset !important;*/
			        /*width: 100% !important;*/
			    }
			    .max_3u_register_user_left_side, .max_3u_register_user_right_side{
			        width: 85% !important;
			        margin: auto;
			        padding: 0;
			    }
/*			    .max_3u_register_form_fields{
			        max-width: 310px !important;
			    }*/
			    .max_3u_register_user_right_side{
			        padding-left: 0 !important;
			    }
			    .max_3u_pages{			    	   
			    	
				    margin: 0 auto;
				    width: 100%;
				    padding-left: 10px !important;
			    }
			}
			.max_u3_sign_up_form_left_side, .max_u3_sign_up_form_right_side,
			.max_u3_sign_up_form_left_side_div, .max_u3_sign_up_form_right_side_div{
				padding-left: 15px;
			}
			@media only screen and (max-width: 768px){
				.max_u3_sign_up_form_left_side, .max_u3_sign_up_form_right_side,
				.max_u3_sign_up_form_left_side_div, .max_u3_sign_up_form_right_side_div{
					margin-right: 15px !important;
				}
				.max_u3_form_submit_div{
					margin-right: 15px !important;
				}
			}

			@media only screen and (max-width: 992px){
				.max_3u_pages{
					width: 100%;
					height: calc(100vh - 100px);
			    }		
			    .max_u3_skip_later_two{
					display: block !important;
					margin-bottom: 0px;
				}

				.max_3u_register_user_form {
			        /*display: unset !important;*/
			        /*width: 100% !important;*/
			    }
			    .max_3u_register_user_left_side, .max_3u_register_user_right_side{
			        width: 55%;
			        margin: auto;
			        padding: 0;
			    }
			    .max_3u_register_form_fields{
			        max-width: 100%;
			    }
			    .max_3u_register_user_right_side{
			        padding-left: 0 !important;
			    }
			    .max_u3_sign_up_address, .max_3u_register_user_form{
					flex-wrap: wrap;
				}
				.max_u3_sign_up_form_left_side, .max_u3_sign_up_form_right_side,
				.max_u3_sign_up_form_left_side_div, .max_u3_sign_up_form_right_side_div{
					width: 100%;
					margin-right: 6px;
				}
				.max_u3_sign_up_inp_fields, .max_u3_sign_up_form_inp_fields{
					margin-bottom: 15px;
				}
				.max_u3_skip_later, .max_u3_skip_later_two{
					margin-bottom: 10px;
				}
				.max_u3_skip_later{
					display: none;
				}
				.max_u3_save_user_info_sign_up{
					/*margin-top: 20px !important;*/
				}
				.max_u3_form_submit_div{
					margin-right: 6px;
				}
			}
			@media only screen and (min-width: 992px) and (max-width: 1280px){
			    .max_3u_register_user_form {
			        /*display: unset !important;*/
			        /*width: 100% !important;*/
			    }
			    .max_3u_register_user_left_side, .max_3u_register_user_right_side{
			        width: 45%;
			        margin: auto;
			        padding: 0;			        
			    }
			    .max_3u_register_form_fields{
			        max-width: 100%;
			    }
			    .max_3u_register_user_right_side{
			        padding-left: 0 !important;
			    }
			}
			@media only screen and (min-width: 992px) and (max-width: 1279px){
				.max_3u_register_user_left_side, .max_3u_register_user_right_side{
			        width: 60% !important;
			        margin: auto;
			        padding: 0;
			    }/*
			    .max_3u_pages{
			    	height: 150vh;
			    }*/
			}
			.max_u3_reg_error{
	            display: none;
	            color: black;
	            margin-left: 0px !important;
	            font-size: 0.8rem !important;
	            font-family: 'Helvetica Thin' !important;
	            font-weight: 700;
	            margin-bottom: 10px;
	        }
	        .max_u3_save_user_info_sign_up{
	            width: 160px;
	            max-width: 200px;
	            background: black;
	            color: #fff;
	            font-family: "Couture";
	            letter-spacing: 3px;
	            font-size: 1.4rem;
	            padding: 5px;
	            padding-left: 10px;
	            border: 1px solid black;
	            float: right;
	            margin-top: 10px;
	        }	
	        .max_u3_triangle_right{
			    width: 0;
			    height: 0;
			    border-top: 8px solid transparent;
			    border-left: 15px solid #fff;
			    display: inline-block;
			    margin-left: 20px;
			    border-bottom: 8px solid transparent;
	        }
	       	.max_u3_triangle_left{
				width: 0;
				height: 0;
			    border-top: 10px solid transparent;
			    border-right: 15px solid #fff;
			    display: inline-block;
			    margin-right: 20px;
			    border-bottom: 9px solid transparent;
	        }
	        .max_u3_skip_later, .max_u3_skip_later_two{
	            font-size: 1.3rem;
	            color: black;
	            /*text-align: right;*/
	            font-family: 'Helvetica Thin';
	            font-weight: 700;
	            margin-left: 10px;
	        }
	        #max_u3_sign_up_title, .max_3u_register_user_form{
				display: none;
			}
			.max_u3_btn_cont{
				display: flex;
			    width: 100%;
			    justify-content: end;
			}

			@media only screen and (max-width: 600px){

				.max_3u_pages{
					padding-left: 0px !important;
				}
				.max_u3_skip_later{
					display: none;
				}
				.max_u3_save_user_info_sign_up{
					margin-top: 0px;
				}

				.max_page_content{
					width: 100vw !important;
				}
				.max_u3_form_submit_cont{
					flex-wrap: wrap;
				}
				.max_u3_prev_btn_div{
					width: 100vw;
					padding-right: 15px;
				}
				.max_u3_prev_btn_div > button{
					width: 100%;
				}
				.max_u3_form_submit_div{
					width: 100%;
				    /*padding-right: 15px;*/
				    margin-left: 15px;
				}
				.max_u3_form_submit_div > button{
					width: 100%;
				}
				.max_u3_sign_up_inp_fields, .max_u3_sign_up_form_inp_fields{
					margin-bottom: 20px;
					margin-top: 5px;
				}
				.max_u3_skip_later, .max_u3_skip_later_two{
					font-size: 0.9rem !important;
				}
				.max_3u_register_form_name_del{
					font-size: 0.9rem !important;
				}
				.max_3u_register_form_name_del{
					margin-top: 0;
					margin-bottom: 10%;
				}
				.max_u3_sign_up_form_right_side > input[name=phone]{
					margin-bottom: 10px;
				}
			}
			.max_u3_form_submit_cont{
				display:none;justify-content: space-between;
			}
			.max_u3_prev_btn_div{
				padding-left: 15px;
			}
			.max_u3_skip_later_two{
				display: none;
			}
		</style>
		<?php	if ( 'signup' == $_GET['cpage'] ) { 
		?>
			<script type="text/javascript">
				jQuery(document).ready(function($){
					$('.entry-title').html('SIGN UP');
					$('.entry-header').css('max-width', '1000px');
					$('.entry-header').css('margin', '0 auto');
					// jQuery('.max_3u_eye_svg').on('click', function(){
					// 	if($(this).is(':visible')){
					// 		jQuery('input[name=password]').attr('type', 'password');
					// 	}
					// });
					// jQuery('.max_3u_eye_slash_svg').on('click', function(){
					// 	if($(this).is(':visible')){
					// 		jQuery('input[name=password]').attr('type', 'text');
					// 	}
					// });
					
					let count = 0;
		            jQuery('.max_u3_save_user_info_sign_up').on('click', function(e){
		                count = 0;
		                jQuery('input.max_u3_sign_up_inp_fields').each(function(){
		                    if( jQuery(this).val() == '' ) {
		                        count++;
		                    }
		                });
		                if(count > 0){
		                	jQuery('.max_u3_sign_up_inp_fields').css('margin-bottom', '10px');
		                }else{
							jQuery('.max_u3_sign_up_inp_fields').css('margin-bottom', '30px');
		                }
		                if(jQuery('.max_u3_sign_up_form_left_side > input[name=address]').val() == ''){
		                    jQuery('.max_u3_sign_up_form_left_side > input[name=address]').next().css('display', 'block');
		                }else{
		                    jQuery('.max_u3_sign_up_form_left_side > input[name=address]').next().css('display', 'none');
		                }
		                if(jQuery('.max_u3_sign_up_form_left_side > input[name=city]').val() == ''){
		                    jQuery('.max_u3_sign_up_form_left_side > input[name=city]').next().css('display', 'block');
		                }else{
		                    jQuery('.max_u3_sign_up_form_left_side > input[name=city]').next().css('display', 'none');
		                }
		                if(jQuery('.max_u3_sign_up_form_right_side > input[name=country]').val() == ''){
		                    jQuery('.max_u3_sign_up_form_right_side > input[name=country]').next().css('display', 'block');
		                }else{
		                    jQuery('.max_u3_sign_up_form_right_side > input[name=country]').next().css('display', 'none');
		                }
		                if(jQuery('.max_u3_sign_up_form_right_side > input[name=zip_code]').val() == ''){
		                    jQuery('.max_u3_sign_up_form_right_side > input[name=zip_code]').next().css('display', 'block');
		                }else{
		                    jQuery('.max_u3_sign_up_form_right_side > input[name=zip_code]').next().css('display', 'none');
		                }
		                if(jQuery('.max_u3_sign_up_form_right_side > input[name=phone]').val() == ''){
		                    jQuery('.max_u3_sign_up_form_right_side > input[name=phone]').next().css('display', 'block');
		                }else{
		                    jQuery('.max_u3_sign_up_form_right_side > input[name=phone]').next().css('display', 'none');
		                }
		                if(count == 0){
		                	jQuery('#max_u3_next_title').hide();
		                	jQuery('.max_3u_register_user_next_form').hide();
		                    jQuery('#max_u3_sign_up_title').show();
		                    jQuery('.max_3u_register_user_form').css('display', 'flex');
		                    jQuery('.max_u3_form_submit_cont').css('display', 'flex');
		                }
		            });
		            let newCount = 0;
		            jQuery('.max_3u_sign_up_btn').on('click', function(e){
		            	newCount = 0;
		            	jQuery('.max_u3_sign_up_form_inp_fields').each(function(){
		            		if($(this).val() == ''){
		            			newCount++;
		            		}
		            	});
		            	if(newCount > 0){
		                	jQuery('.max_u3_sign_up_form_inp_fields').css('margin-bottom', '5px');
		                }else{
							jQuery('.max_u3_sign_up_form_inp_fields').css('margin-bottom', '20px');
		                }
		            	if(jQuery('.max_u3_sign_up_form_left_side_div').find('input[name=username]').val() == ''){
		                    jQuery('.max_u3_sign_up_form_left_side_div').find('input[name=username]').next().css('display', 'block');
		                }else{
		                    jQuery('.max_u3_sign_up_form_left_side_div').find('input[name=username]').next().css('display', 'none');
		                }
		               	if(jQuery('.max_u3_sign_up_form_left_side_div').find('input[name=surname]').val() == ''){
		                    jQuery('.max_u3_sign_up_form_left_side_div').find('input[name=surname]').next().next().css('display', 'block');
		                }else{
		                    jQuery('.max_u3_sign_up_form_left_side_div').find('input[name=surname]').next().next().css('display', 'none');
		                }
		                if(jQuery('.max_u3_sign_up_form_right_side_div').find('input[name=email]').val() == ''){
		                    jQuery('.max_u3_sign_up_form_right_side_div').find('input[name=email]').next().css('display', 'block');
		                }else{
		                    jQuery('.max_u3_sign_up_form_right_side_div').find('input[name=email]').next().css('display', 'none');
		                }
		               	if(jQuery('.max_u3_sign_up_form_right_side_div').find('input[name=password]').val() == ''){
		                    jQuery('.max_u3_sign_up_form_right_side_div').find('input[name=password]').next().next().css('display', 'block');
		                }else{
		                    jQuery('.max_u3_sign_up_form_right_side_div').find('input[name=password]').next().next().css('display', 'none');
		                }
	            		if(newCount != 0){
	            			e.preventDefault();
	            		}
		            });
		            jQuery('.max_3u_sign_up_prev').on('click', function(){
	            		jQuery('#max_u3_next_title').show();
	                	jQuery('.max_3u_register_user_next_form').show();
	                    jQuery('#max_u3_sign_up_title').hide();
	                    jQuery('.max_3u_register_user_form').hide();
	                    jQuery('.max_u3_form_submit_cont').hide();
		            });
				});
			</script>
		<?php
		}
		?>
		<?php
			if( isset( $_POST['max_3u_sign_up_btn'] ) ) {
				if ( isset( $_POST['address'] ) && ! empty( $_POST['address'] ) ) {
					$address = sanitize_text_field( wp_unslash( $_POST['address'] ) );
				}
				if ( isset( $_POST['city'] ) && ! empty( $_POST['city'] ) ) {
					$city = sanitize_text_field( wp_unslash( $_POST['city'] ) );
				}
				if ( isset( $_POST['country'] ) && ! empty( $_POST['country'] ) ) {
					$country = sanitize_text_field( wp_unslash( $_POST['country'] ) );
				}
				if ( isset( $_POST['zip_code'] ) && ! empty( $_POST['zip_code'] ) ) {
					$zip_code = sanitize_text_field( wp_unslash( $_POST['zip_code'] ) );
				}
				if ( isset( $_POST['phone'] ) && ! empty( $_POST['phone'] ) ) {
					$phone = sanitize_text_field( wp_unslash( $_POST['phone'] ) );
				}
				if ( isset( $_POST['username'] ) && ! empty( $_POST['username'] ) ) {
					$username = sanitize_text_field( wp_unslash( $_POST['username'] ) );
				}
				if ( isset( $_POST['surname'] ) && ! empty( $_POST['surname'] ) ) {
					$surname = sanitize_text_field( wp_unslash( $_POST['surname'] ) );
				}
				if ( isset( $_POST['email'] ) && ! empty( $_POST['email'] ) ) {
					$email = sanitize_text_field( wp_unslash( $_POST['email'] ) );
				}
				if ( isset( $_POST['password'] ) && ! empty( $_POST['password'] ) ) {
					$password = sanitize_text_field( wp_unslash( $_POST['password'] ) );
				}

				if ( false == email_exists( $email ) ) {
					$user_id = wp_create_user( $username, $password, $email );
					update_user_meta( $user_id, '_surname', $surname );
					update_user_meta( $user_id, 'billing_address_1', $address );
					update_user_meta( $user_id, 'billing_city', $city );
					update_user_meta( $user_id, 'billing_state', $country );
					update_user_meta( $user_id, 'billing_postcode', $zip_code );
					update_user_meta( $user_id, 'billing_phone', $phone );
					if ( $user_id ) {
						wc_print_notice( __( 'User registered successfully now login to access dashboard.', 'woocommerce' ), 'success' );
					}
				} else {
					wc_print_notice( __( 'Email already exists.', 'woocommerce' ), 'error' );	
				}
			}
		?>
		<div class="max_3u_register_user">
			<?php do_action( 'woocommerce_register_form_start' ); ?>
			<form method="post">
				<h4 id="max_u3_next_title" class="max_3u_register_form_name_del">DELIVERY ADDRESS &nbsp; | &nbsp; WHERE YOU GONNA RECIEVE YOUR PACKAGES</h4>
				<div class="max_3u_register_user_next_form">
					<div class="max_u3_sign_up_address">
						<div class="max_u3_sign_up_form_left_side">
		                    <label>ADDRESS</label>
		                    <input type="text" name="address" class="max_u3_sign_up_inp_fields">
		                    <label class="max_u3_reg_error">***Please fill the address field</label>
		                    <label>CITY</label>
		                    <input type="text" style="margin-bottom:15px;" name="city" class="max_u3_sign_up_inp_fields">
		                    <label class="max_u3_reg_error">***Please fill the city field</label>
			                <a href="javascript:void(0)" class="max_u3_skip_later">SKIP FOR LATER</a>
						</div>
						<div class="max_u3_sign_up_form_right_side">
		                    <label>COUNTRY</label>
		                    <input type="text" name="country" class="max_u3_sign_up_inp_fields">
		                    <label class="max_u3_reg_error">***Please fill the country field</label>
		                    <label>ZIP CODE</label>
		                    <input type="number" name="zip_code" class="max_u3_sign_up_inp_fields">
		                    <label class="max_u3_reg_error">***Please fill the zip code field</label>
		                   	<label>MOBILE NUMBER</label>
		                    <input type="number" name="phone" class="max_u3_sign_up_inp_fields">
		                    <label class="max_u3_reg_error">***Please fill the mobile number field</label>
		                    <a href="javascript:void(0)" class="max_u3_skip_later_two">SKIP FOR LATER</a>
		                    <button type="button" name="max_u3_save_user_info_sign_up" class="max_u3_save_user_info_sign_up">NEXT<div class="max_u3_triangle_right"></div></button>
						</div>
					</div>
				</div>
				<h4 id="max_u3_sign_up_title" class="max_3u_register_form_name_del">NAME FOR DELIVERY &nbsp; I &nbsp; YOUR FUTURE LOG IN DETAILS</h4>
				<div class="max_3u_register_user_form">
					<div class="max_u3_sign_up_form_left_side_div">
	                    <label>NAME</label>
	                    <input type="text" name="username" class="max_u3_sign_up_form_inp_fields">
	                    <label class="max_u3_reg_error">***Please fill the username field</label>
	                    <label>SURNAME</label>
	                    <input type="text" style="margin-bottom:2px;" name="surname" class="max_u3_sign_up_form_inp_fields">
	                    <p class="max_3u_register_notice">*Make sure to provide real name and surname</p>
	                    <label class="max_u3_reg_error">***Please fill the surname field</label>
					</div>
					<div class="max_u3_sign_up_form_right_side_div">
	                    <label>EMAIL</label>
	                    <input type="email" name="email" class="max_u3_sign_up_form_inp_fields">
	                    <label class="max_u3_reg_error">***Please fill the email field</label>
	                    <label>PASSWORD</label>
	                    <input type="password" style="margin-bottom:5px" class="max_u3_sign_up_form_inp_fields" type="password" name="password" id="reg_password">
	<!--                     <p class="max_3u_eye_svg"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg></p><p class="max_3u_eye_slash_svg"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye-slash" class="svg-inline--fa fa-eye-slash fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path></svg> -->
	                    <p class="max_3u_register_notice">*Profile log in info</p>
	                    <label class="max_u3_reg_error">***Please fill the password field</label>
					</div>
				</div>
				<div class="max_u3_form_submit_cont">
					<div class="max_u3_prev_btn_div">
						<button type="button" name="max_3u_sign_up_prev" class="max_3u_sign_up_prev"><div class="max_u3_triangle_left"></div>PREV</button>
					</div>
					<div class="max_u3_form_submit_div">
						<button type="submit" name="max_3u_sign_up_btn" class="max_3u_sign_up_btn">SIGN UP</button>
					</div>
				</div>
			</form>
			<?php do_action( 'woocommerce_register_form_end' ); ?>
		</div>
<?php } ?>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>