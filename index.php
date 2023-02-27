<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://maxenius.agency
 *
 * @package WordPress
 * @subpackage u3
 * @since U3 1.0
 */
?>
<?php get_header(); ?>
    <body>
        <div class="site-content">
            <?php
            if ( have_posts() ) :

                while ( have_posts() ) :

                    the_post();
                    ?>

                    <article <?php post_class(); ?>>

                        <header class="entry-header">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        </header><! – .entry-header – >

                        <div class="entry-content">
                            <?php the_content( esc_html__( 'Continue reading &rarr;', 'my-custom-theme' ) ); ?>
                        </div><! – .entry-content – >

                    </article><! – #post-## – >

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile;

            else :
                ?>
                <article class="no-results">

                    <header class="entry-header">
                        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'my-custom-theme' ); ?></h1>
                    </header><! – .entry-header – >

                    <div class="entry-content">
                        <p><?php esc_html_e( 'It looks like nothing was found at this location.', 'my-custom-theme' ); ?></p>
                    </div><! – .entry-content – >

                </article><! – .no-results – >
            <?php
            endif;
            ?>
        </div><! – .site-content – >

<?php
get_footer();
