<?php
/**
 * Search page of u3 theme.
 */
get_header();
global $wp_query;
?>
<style type="text/css">
    .max_u3_readmore{
        margin-top: 10px;
        margin-bottom: 20px;
    }
    .max_u3_readmore > a{
        color: #fff;
        padding: 10px;
        background: black;
        text-decoration: none;
        font-family: "Couture";
        letter-spacing: 2px;
    }
    .max_u3_search_post_title{
        margin-top: 10px;
        margin-bottom: 5px;
        font-size: 2rem;
        font-family: "Helvetica Thin Cond";
        text-align: left;
        font-style: normal;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    .max_u3_search_post_title > a{
        text-decoration: none;
        color: black;
    }
</style>
<div class="wapper">
  <div class="contentarea clearfix">
    <div class="content">
      <h1 class="search-title"> <?php echo $wp_query->found_posts; ?>
        <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>" </h1>

        <?php if ( have_posts() ) { ?>

            <ul>

            <?php while ( have_posts() ) { the_post(); ?>

               <li>
                 <h3 class="max_u3_search_post_title"><a href="<?php echo get_permalink(); ?>">
                   <?php the_title();  ?>
                 </a></h3>
                 <a href="<?php echo get_permalink(); ?>"><?php  the_post_thumbnail('medium') ?></a>
                 <div class="max_u3_readmore"> <a href="<?php the_permalink(); ?>">Read More</a></div>
               </li>

            <?php } ?>

            </ul>

           <?php echo paginate_links(); ?>

        <?php } ?>

    </div>
  </div>
</div>
<?php get_footer(); ?>