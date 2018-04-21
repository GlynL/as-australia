<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package as-australia
 */

get_header();
?>

	<div id="primary" class="content-area container">
    <main id="main" class="site-main">
      <header class="page-header">
        <h1 class='page-title'>Events</h1>
        <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
      </header><!-- .page-header -->
      
        <?php if ( have_posts() ) :
            
          /* Start the Loop */
          while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', get_post_type() );

          endwhile;

          echo paginate_links();  

        else : 
        ?>
        <p>You have no upcoming events.</p>

        <?php
        endif;
        ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
