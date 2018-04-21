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
          
          <?php 
          /* Start the Loop */
          while ( have_posts()) {
            the_post();
            ?>
            <h1><?php the_title();?></h1>
            <?php $eventDate = new DateTime(get_field('event_date')); ?>
            <div class='date'><?php echo $eventDate->format('d M'); ?></div>
            <p><?php the_content(); ?></p>

          <?php  
          }

          the_posts_navigation();
        ?>

      <h2><a class='a-event' href="<?php echo site_url('/events'); ?>">View All Events</a></h2>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
