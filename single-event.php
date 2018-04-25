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

            // for current event - find rvsp's with acf matching id
            $attending = new WP_Query(array(
              'post_type' => 'rsvp',
              'meta_query' => array(
                array(
                  'key' => 'rsvp_event_id',
                  'compare' => '=',
                  'value' => get_the_ID()
                )
              )
            ));

            // check if current user is rsvped
            $rsvped = false;
            if (is_user_logged_in()) {
              $rsvpQuery = new WP_Query(array(
                'author' => get_current_user_id(),
                'post_type' => 'rsvp',
                'meta_query' => array(
                  array(
                    'key' => 'rsvp_event_id',
                    'compare' => '=',
                    'value' => get_the_ID()
                  )
                )
              ));
              if ($rsvpQuery->found_posts) {
                $rsvped = true;
              }
            } 

            ?>

            <!-- HTML -->
            <header class='event-heading'>
              <h1 class='event-heading--title'><?php the_title();?></h1>
              <!-- probably remove later -->
              <?php echo ($rsvped) ? 'You are attending': 'Please RSVP if you are attending';  ?>
              <button class='event-heading--rsvp btn' data-rsvp='<?php echo $rsvped ? "yes" : "" ?>' data-event='<?php the_ID(); ?>'>
                <?php echo $rsvped ? 'Attending' : 'RSVP <i class="fas fa-users"></i>' ?>
              </button>
            </header>
            
            <div class='event-info'>
              <?php $eventDate = new DateTime(get_field('event_date')); ?>

              <div class='event-info--date'><?php echo $eventDate->format('d M'); ?></div>
              <span class='event-info--attending'><?php echo $attending->found_posts; ?> Attending</span>
            </div>
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
