<?php
/*
 * Template Name: Home Page Heading
 * Author: Maxenius Solutions
 */
get_header();
$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()), 'thumbnail' );
?>
<style type="text/css">
    body {
        background: #fefefe;
        <?php if(!empty($url)){ ?>
        background-image: url(<?php echo $url ?>);
        background-size: cover;
        <?php } ?>
    }    
    .center_heading {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate( -50% ,-50%);
        color: #fff;    
        font-size: 2.2em;
        font-family: 'Helvetica Thin Cond thin';
        text-align: center;
        display: block;
        min-width: 60vw;
        letter-spacing: .25em;
        text-align: center;
    }/*
    .max_3u_cat_menu{
        display: flex !important;
    }
    */
</style>

<div class="max-u3-w--70">
    <div class="center_heading"> 
        <h1>
        <?php echo get_the_title(); ?>            
        </h1>
    </div>
</div>
<?php get_footer(); ?>