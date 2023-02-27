<?php
/*
 * Template Name: Artist
 * Author: Maxenius Solutions
 */
get_header();
?>

<div class="max-u3-info-w--70">
    <div class="info-title info-title1">
        <h1><?php echo get_the_title(); ?></h1>
    </div>
    <div class="info-image-container">
        <div class="info-left-image">
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()), 'thumbnail' ); ?>
            <img src="<?php echo $url ?>"  width="100%"/>
        </div>
    </div>
    <div class="info-p">
        <?php echo get_the_content(); ?>
    </div>
    <div class="info-p1">
        <button data-id="<?php echo get_the_id() ?>" id="contact_artist">CONTACT THE ARTIST</button>
    </div>
    
</div>
<?php
    echo do_shortcode('[max_contact_artist_modal]');
?>
<?php get_footer(); ?>