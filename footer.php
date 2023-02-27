
		<?php
		if ( is_product() ) {
			global $product;
			$product_instance = wc_get_product($product->get_id());
			
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				// $("#pa_size option:first").attr('selected','selected');
				// $(document.body).find('select option').prop("selectedIndex", 0).change();
				$(document.body).on('change', 'select', function(){
					if( $('.woocommerce-variation-price').find('ins span bdi').html() == undefined ) {
						$('.max_pro_price').html( $('.woocommerce-variation-price').find('span span bdi').html() );
						$('.max_pro_price_767').html( $('.woocommerce-variation-price').find('span span bdi').html() );
						
					} else {
						$('.max_pro_price').html( $('.woocommerce-variation-price').find('ins span bdi').html() );
						$('.max_pro_price_767').html( $('.woocommerce-variation-price').find('ins span bdi').html() );
						
					}
					// console.log($('.in-stock').html());
					if ( $('.in-stock').html() == undefined ) {
						$('.max_3u_pro_stock_div').remove();
						$('.max_3u_copy_left_two').css('display', 'none');
					} else {
						$('.max_3u_pro_stock_div').remove();
						var stock = $('.in-stock').html().replace(" in stock", '');
						var num = stock;
						// console.log(num);
						var digits = num.toString().split('');
						var realDigits = digits.map(Number);
						var html = '';
						html += '<div class="max_3u_pro_stock_main_div">';
						$.each(realDigits, function(x, y){

							html += '<div class="max_3u_pro_stock_div">';
							html += '<p class="max_3u_stock_left_p_tag">';
							html += y;
							html += '</p>';
							html += '</div>';
				
						});
						html += '</div>';
						if ( html != '' ) {
							if(  $(window).width() <= 767 ) {
								$('.max_3u_copy_left_two').css('display', 'block');
							} else {
								$('.max_3u_copy_left_two').css('display', 'inline-block');
							}
							
							$('.max_3u_pro_stock').css('display', 'none');
							$('.max_3u_copy_left').css('display', 'none');
							$('.max_3u_copy_left_two').before(html);
						}
					} 
				});

				$(document.body).on('click', '.reset_variations', function(){
					$('.price').empty();
					$('.max_3u_pro_stock').css('display', 'inline-block');
					$('.max_3u_copy_left').css('display', 'inline-block');
					$('.max_3u_pro_stock_div').remove();
					$('.max_3u_copy_left_two').css('display', 'none');
					$('.max_pro_price').html($('.max_3u_price_currency').attr('data-id')+' '+$('.max_3u_price_currency').attr('data-curr-symbol'));
					$('.max_pro_price_767').html($('.max_3u_price_currency').attr('data-id')+' '+$('.max_3u_price_currency').attr('data-curr-symbol'));
					
				});
			});
		</script>
                <div class="max_3u_single_product_long_description">
					<?php
						if( ! empty( $product_instance->get_description() ) || ! empty( $product->get_short_description() ) ) {
						?>
						<h3 class="max_3u_info">+ Info</h3>
						<?php
						 echo '<p class="max_u3_short_desc_footer">'.$product->get_short_description().'</p>';
						 echo $product_instance->get_description(); 
						}
						
					?>

					<div class="max_3u_long_desc_footer_line"></div>
					<div style="width: 100%; margin: 0px auto;">
						<?php if ( is_active_sidebar('product-footer') ) { dynamic_sidebar('product-footer'); } ?>
						<div class="max_3u_return_policy_footer">
							<?php

		                        wp_nav_menu( array(

		                            'theme_location'    => 'footer',

		                            'menu' => 'Footer Menu',

		                            'depth'             => 2,

		                            'menu_class'        => 'max_3u_footer_menu',

		                            'menu_id'           => 'max_3u_footer_menu',

		                            'container'         => false,

		                        ) );

							?>
						</div>
					</div>
					<br>
				</div>
    	<?php
    		}
    	?>
    	<style type="text/css">
    		.social_contact_artist{
    			display: table;
    			margin: 0px auto;
			    text-align: center;
			    padding-left: 20px;
    		}
    		.social_contact_artist > li{
    			display: inline-block;
    			margin-right: 45px;
    		}
    		#Layer_1{
    			width: 30px;
    		}
    		.max_3u_artist_mihu{
    			font-family: 'Open Sans'; font-size: 1.1rem;
    			text-decoration: none;
    			color: black;
    		}
    		.max_3u_artist_mihu > svg{
    			width: 30px;
    		}
    	</style>
    	<?php
    		$auth_id = $post->post_author; 
    		$facebook   = get_user_meta( $auth_id, 'facebook', true ); 
            $instagram  = get_user_meta( $auth_id, 'instagram', true ); 
            $twitter    = get_user_meta( $auth_id, 'twitter', true ); 

    	 	if ( is_page_template( 'max-template-artist.php' ) ) {
    			if ( ! empty( $facebook ) || ! empty( $instagram ) || ! empty( $twitter ) ) {
    	?>
	        <ul class="social_contact_artist">
	        	<?php 
	                if ( ! empty( $facebook )){
	                	$facebook_url = str_replace('@', '', $facebook);
	            ?>
	            <li>
	            	<a target="_blank" href="https://www.facebook.com/<?php echo $facebook_url ?>" class="max_3u_artist_mihu">
		            	<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
							width="30" height="30"
							viewBox="0 0 30 30"
							style=" fill:#000000;">    <path d="M12,27V15H8v-4h4V8.852C12,4.785,13.981,3,17.361,3c1.619,0,2.475,0.12,2.88,0.175V7h-2.305C16.501,7,16,7.757,16,9.291V11 h4.205l-0.571,4H16v12H12z"></path></svg><br>
		            	<?php echo $facebook; ?>
	            	</a>
	            </li>
	        	<?php } ?>
	        	<?php if ( ! empty( $instagram )){ 
	        		$instagram_url = str_replace('@', '', $instagram);?>
	            <li>
	            	<a target="_blank" href="https://www.instagram.com/<?php echo $instagram_url ?>" class="max_3u_artist_mihu">
		                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 30 30" style=" fill:#000000;">    <path d="M 9.9980469 3 C 6.1390469 3 3 6.1419531 3 10.001953 L 3 20.001953 C 3 23.860953 6.1419531 27 10.001953 27 L 20.001953 27 C 23.860953 27 27 23.858047 27 19.998047 L 27 9.9980469 C 27 6.1390469 23.858047 3 19.998047 3 L 9.9980469 3 z M 22 7 C 22.552 7 23 7.448 23 8 C 23 8.552 22.552 9 22 9 C 21.448 9 21 8.552 21 8 C 21 7.448 21.448 7 22 7 z M 15 9 C 18.309 9 21 11.691 21 15 C 21 18.309 18.309 21 15 21 C 11.691 21 9 18.309 9 15 C 9 11.691 11.691 9 15 9 z M 15 11 A 4 4 0 0 0 11 15 A 4 4 0 0 0 15 19 A 4 4 0 0 0 19 15 A 4 4 0 0 0 15 11 z"></path></svg>
		                <br>
		                <?php echo $instagram; ?>
	            	</a>
	            </li>
	        	<?php }
	        	if ( ! empty( $twitter )){ 
	        		$twitter_url = str_replace('@', '', $twitter);?>
	        	<li>
	            	<a target="_blank" target="_blank" href="https://twitter.com/<?php echo $twitter_url ?>" class="max_3u_artist_mihu">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve">
						<g id="XMLID_826_">
							<path id="XMLID_827_" d="M302.973,57.388c-4.87,2.16-9.877,3.983-14.993,5.463c6.057-6.85,10.675-14.91,13.494-23.73
								c0.632-1.977-0.023-4.141-1.648-5.434c-1.623-1.294-3.878-1.449-5.665-0.39c-10.865,6.444-22.587,11.075-34.878,13.783
								c-12.381-12.098-29.197-18.983-46.581-18.983c-36.695,0-66.549,29.853-66.549,66.547c0,2.89,0.183,5.764,0.545,8.598
								C101.163,99.244,58.83,76.863,29.76,41.204c-1.036-1.271-2.632-1.956-4.266-1.825c-1.635,0.128-3.104,1.05-3.93,2.467
								c-5.896,10.117-9.013,21.688-9.013,33.461c0,16.035,5.725,31.249,15.838,43.137c-3.075-1.065-6.059-2.396-8.907-3.977
								c-1.529-0.851-3.395-0.838-4.914,0.033c-1.52,0.871-2.473,2.473-2.513,4.224c-0.007,0.295-0.007,0.59-0.007,0.889
								c0,23.935,12.882,45.484,32.577,57.229c-1.692-0.169-3.383-0.414-5.063-0.735c-1.732-0.331-3.513,0.276-4.681,1.597
								c-1.17,1.32-1.557,3.16-1.018,4.84c7.29,22.76,26.059,39.501,48.749,44.605c-18.819,11.787-40.34,17.961-62.932,17.961
								c-4.714,0-9.455-0.277-14.095-0.826c-2.305-0.274-4.509,1.087-5.294,3.279c-0.785,2.193,0.047,4.638,2.008,5.895
								c29.023,18.609,62.582,28.445,97.047,28.445c67.754,0,110.139-31.95,133.764-58.753c29.46-33.421,46.356-77.658,46.356-121.367
								c0-1.826-0.028-3.67-0.084-5.508c11.623-8.757,21.63-19.355,29.773-31.536c1.237-1.85,1.103-4.295-0.33-5.998
								C307.394,57.037,305.009,56.486,302.973,57.388z"/>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						</svg>
						<br>
						<?php echo $twitter; ?>
					</a>
	            </li>
	        	<?php } ?>
	        </ul>
	    	<?php } ?>
        		<div class="max_3u_long_desc_footer_line"></div>
					<div style="width: 100%; margin: 0px auto;">
						<?php if ( is_active_sidebar('product-footer') ) { dynamic_sidebar('product-footer'); } ?>
						<div class="max_3u_return_policy_footer">
							<?php

		                        wp_nav_menu( array(

		                            'theme_location'    => 'footer',

		                            'menu' => 'Footer Menu',

		                            'depth'             => 2,

		                            'menu_class'        => 'max_3u_footer_menu',

		                            'menu_id'           => 'max_3u_footer_menu',

		                            'container'         => false,

		                        ) );

							?>
					</div>
				</div>
				<br>
    	<?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
