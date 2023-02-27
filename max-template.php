<?php
/*
 * Template Name: Max New Template
 * Author: Maxenius Solutions
 */
get_header();
?>
<style type="text/css">
	
/*Code by Ham Start*/

.max_3u_sub_sub_cat_products{
    width: 45%; float: left; margin-right:3%;
}

.max_cat_product{
    background-color: lightgrey;padding-top: 15px;padding-bottom: 15px; text-align: center;
}

.max_3u_sub_sub_cat_pro_details{
    display: flex;
}

.max_3u_left_side_name_admin_content{
    width: 50%; float: left;margin-top: 10px;
}

.max_cat_img{
    width: 100%;height: 400px;text-align: center;margin-bottom: 20px;background-repeat: no-repeat;
    background-size: cover;
}

.max_3u_sub_sub_cat_pro{
    font-size: 88px; margin-top: 120px;font-family: Helvetica Neue; color: rgb( 255, 255, 255 );text-align: center;
}

.clashing{
    background-repeat: no-repeat; background-size: cover; width: 100%;width: 70%;
    margin-left: 88px; text-align: center;
}

.mini-menu{
	padding-top: 20px;
}

/*Code by Ham End*/

</style>
<body>
	<div class="max_sidebar">
	    <div id="Baramini">
	        <div id="Layer4-1" style="background:url('<?php echo get_stylesheet_directory_uri();?>/images/Layer4.png')">
					0
	        </div>
	        <div id="Ellipse1-1">
	            <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/Ellipse1.png"  alt="" id=""></a>
				<div class="text">
					<p>GUEST</p>
				</div>
	        </div>
	    </div>
		<nav role="navigation">
			<div id="menuToggle">
				<input type="checkbox" />
				<div></div>
				<div></div>
				<div></div>
				<ul id="menu">
					<a href="#">
						<li style="border-bottom: 1px solid black; padding-bottom: 5px;">INFO</li>
					</a>
					<a href="#">
						<li style="border-bottom: 1px solid black; padding-bottom: 5px;">About</li>
					</a>
					<a href="#">
						<li style="border-bottom: 1px solid black; padding-bottom: 5px;">Forum</li>
					</a>
					<a href="#">
						<li style="border-bottom: 1px solid black; padding-bottom: 4px;" z>Contact Us</li>
					</a>
				</ul>
			</div>
		</nav>
	</div>

	<div class="max_container" style="background:url('<?php echo get_stylesheet_directory_uri();?>/images/fundal.png')">
		<input type="hidden" id="max_bg_image" value="<?php echo get_stylesheet_directory_uri();?>/images/fundal.png'">
		<div class='max_u-3'>
			<div style='display:flex;align-items:center;flex-direction: row-reverse;margin-bottom: 50px;justify-content: flex-end;padding:0 20px'>
				<div id="layer_3-1">
					<img src="https://maxenius.agency/staging/customtheme/wp-content/themes/u3/images/layer_3.png" alt="" id="">
				</div>
				<div id="U-1">
					<img src="https://maxenius.agency/staging/customtheme/wp-content/themes/u3/images/U.png" alt="" id="">
				</div>
			</div>
	<div id="container-1">
		
	<!-- Code by Ham Start -->
	<?php
	global $wpdb;
	$categories = get_categories( array(
	    'taxonomy'   => 'product_cat', 
	    'orderby'    => 'name',
	    'parent'     => 0,
	    'hide_empty' => 0, 
	) );

  if( ! empty( $categories ) ) {

  foreach ($categories as $category) {

  	if ( strtolower( $category->name ) != 'uncategorized' ) {

  		$taxonomy = 'product_cat';
		$get_sub_cat_term_id = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}term_taxonomy WHERE parent={$category->term_id}",ARRAY_A);

	?>
		<ul class='container-main-ul'>
			<li>
				<span class="cat_id" data-id="<?php echo $category->term_id; ?>"><a href="#"><?php echo $category->cat_name; ?></a></span>
				<div id="menu2" class="menuappears" style="display: none;" data-id="<?php echo $category->term_id; ?>">
					<ul class="mini-menu">
						<?php 
						if( ! empty( $get_sub_cat_term_id ) ) {
						foreach( $get_sub_cat_term_id as $get_sub_cat_term_id_val ): 

						$get_sub_sub_cat_term_id = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}term_taxonomy WHERE parent={$get_sub_cat_term_id_val['term_id']}",ARRAY_A);

						if( ! empty( $get_sub_sub_cat_term_id['term_id'] ) ) {
						?>
						<li class='max_main_child' parent-cat="<?php echo $get_sub_cat_term_id_val['term_id']; ?>" data-id="<?php echo $get_sub_sub_cat_term_id['term_id']; ?>">
							<a href="#"><?php echo get_term( $get_sub_cat_term_id_val['term_id'] )->name; ?></a>
						</li>	
						<?php } else { ?>
						<li>
							<?php echo get_term( $get_sub_cat_term_id_val['term_id'] )->name; ?>
						</li>
						<?php } ?>
						<?php endforeach; } ?>
					</ul>
				</div>
			</li>
		</ul>
	<?php }}} ?>

			</div>
		</div>

		<div class='max_cats'>
			<div id="Layer8copy2-1" style="display: none;"></div>
			<div id="NEWBRUTALISTPRINTS-1" style="display: none;">
				<p>NEW BRUTALIST PRINTS</p>
			</div>

		<section class="max_3usub-sub-cat" style="display: none;width: 70%;float: right;">

			<div class="max_cat_img">
		    </div>

		    <div class="max_3u_sub_cat_append">
			</div>
		</section>
		</div>

		<div class='max_sub_cat_post'>
			
		<div id="rightscroll" style="display:none;">
		
			<div id="clash">
		<?php 

		if( ! empty( $categories ) ) {

		  foreach ($categories as $key => $category) {

			  	if ( strtolower( $category->name ) != 'uncategorized' ) {

			  		$taxonomy = 'product_cat';
					$get_sub_cat_term_id = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}term_taxonomy WHERE parent={$category->term_id}",ARRAY_A);
				if( ! empty( $get_sub_cat_term_id ) ) {

					foreach( $get_sub_cat_term_id as $get_sub_cat_term_id_val ) {

						$id = $get_sub_cat_term_id_val['term_id'];

						$get_sub_sub_cat_term_id = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}term_taxonomy WHERE parent=$id", ARRAY_A);

					if ( ! empty( $get_sub_sub_cat_term_id ) ) {
			?>
					<?php 
						$count=1;
						foreach ($get_sub_sub_cat_term_id as $key => $value) { 
								$thumbnail_id = $wpdb->get_row("SELECT meta_value FROM {$wpdb->prefix}termmeta WHERE term_id = {$value['term_id']} AND meta_key = 'thumbnail_id'");
								 $image = wp_get_attachment_url( $thumbnail_id->meta_value );

							?>
						<a class="max_3u-sub-sub-cat" style="display: none;" cat-parent-id="<?php echo $get_sub_cat_term_id_val['term_id']; ?>" data-term-id="<?php echo $value['term_id']; ?>" ><div class="clashing clash<?php echo $count; ?>" style="background-image: url('<?php echo $image ?>');">
							<p class="max_3u_sub_sub_cat_pro"><?php echo get_term( $value['term_id'] )->name; ?></p>
						</div></a>
			    <?php $count++; }}?>

			<?php }}}}} ?>
			</div>
		</div>		
	</div>
</div>