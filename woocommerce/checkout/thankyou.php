<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>
<style>
    .entry-header,
    .max_thankyou{
        display: none;
    }
    .max_thankyou_content h2{
        margin-top: 30px;
        margin-bottom: 40px;
        font-family: 'MYRIADPRO-BOLD' !important;
        font-weight: 600;
        text-align: center;
    }
    .max_thankyou_contentp1{
        font-family: 'MYRIADPRO-Light' !important;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 17px;
    }
    .max_thankyou_content_content{
        padding-top: 50px;
        display: flex;
        width: 100%;
        font-family: 'MYRIADPRO-Light' !important;
    }
    .max_thankyou_content_content_left,
    .max_thankyou_content_content_right{
        width: 50%;
    }
    .max_thankyou_order,
    .max_thankyou_contact{
        width: 55%;
    }
    .max_thankyou_contact{
        margin-top: 50px;
    }
    .max_thankyou_btn{
        margin-top: 30px;
        width: 100%;
        padding: 10px;
        text-transform: uppercase;
        background: black;
        color: #fff;
        border: 1px solid #000000;
        font-size: 16px;
    }
    .max_thankyou_content_content_right .max_thankyou_order{
        margin: 0 0 0 auto;
        padding-right: 36px;
        width: 60%;
    }
    .font_bold{
        font-weight: bold;
    }
    .max_thankyou_content_p{
        font-size: 13px;
        font-weight: 600;
    }
    .max_thankyou_content_footer{
        width: 100%;
        padding-right: 41px;
        margin-top: 90px;
    }
    .footer_btn{
        width: 21%;
        border: 2px solid black;
        padding: 7px;
        text-align: center;
        text-transform: uppercase;
        margin: 0 0 0 auto;
        font-family: 'MYRIADPRO-BOLD' !important;
        font-weight: bold;
        letter-spacing: 1px;
        font-size: 18px;
    }
</style>
<div class="woocommerce-order">
    <div class="max_thankyou_content">
        <div class="max_thankyou_content_header">
            <h2>
                THANK YOU FOR YOUR PURCHASE
            </h2>
            <p class="max_thankyou_contentp1">
                we have recieved your order placement  and we're working on it. you will recieve an email when your package will be shipped.
            </p>
        </div>
        <div class="max_thankyou_content_content">
            <div class="max_thankyou_content_content_left">
                <div class="max_thankyou_order">
                    <p class="max_thankyou_content_p">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                    <button class="max_thankyou_btn" value="My order">my order</button>
                </div>
                <div class="max_thankyou_contact">
                    <p class="max_thankyou_content_p">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has.
                    </p>
                    <button class="max_thankyou_btn" value="My order">contact us</button>
                </div>
            </div>
            <div class="max_thankyou_content_content_right">
                <div class="max_thankyou_order">
                    <p class="max_thankyou_content_p">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                    <button class="max_thankyou_btn font_bold" value="My order">save info</button>
                </div>
            </div>

        </div>
        <div class="max_thankyou_content_footer">
            <div class="footer_btn">
                back to home
            </div>
        </div>
    </div>
    <div class="max_thankyou">
        <?php
        if ( $order ) :

            do_action( 'woocommerce_before_thankyou', $order->get_id() );
            ?>

            <?php if ( $order->has_status( 'failed' ) ) : ?>

                <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

                <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                    <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
                    <?php if ( is_user_logged_in() ) : ?>
                        <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
                    <?php endif; ?>
                </p>

            <?php else : ?>

                <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

                <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                    <li class="woocommerce-order-overview__order order">
                        <?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
                        <strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                    </li>

                    <li class="woocommerce-order-overview__date date">
                        <?php esc_html_e( 'Date:', 'woocommerce' ); ?>
                        <strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                    </li>

                    <?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
                        <li class="woocommerce-order-overview__email email">
                            <?php esc_html_e( 'Email:', 'woocommerce' ); ?>
                            <strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                        </li>
                    <?php endif; ?>

                    <li class="woocommerce-order-overview__total total">
                        <?php esc_html_e( 'Total:', 'woocommerce' ); ?>
                        <strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                    </li>

                    <?php if ( $order->get_payment_method_title() ) : ?>
                        <li class="woocommerce-order-overview__payment-method method">
                            <?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
                            <strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
                        </li>
                    <?php endif; ?>

                </ul>

            <?php endif; ?>

            <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
            <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

        <?php else : ?>

            <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

        <?php endif; ?>
    </div>

</div>
