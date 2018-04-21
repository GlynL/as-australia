<?php
  get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      <div class='atf container'>
        <img class='aligncenter' src="<?php echo get_theme_file_uri('/img/as-logo.PNG'); ?>" alt="AS Australia">
        <h2 class='textcenter'>AS QLD Membership</h2>
        <div class='textcenter cta'>
          <a class='btn' href="<?php echo site_url('membership'); ?>">Become a Member</a>
        </div>
        <div class='gallery gallery-columns-3'>
          <span class='gallery-item'>Benefit</span><span class='gallery-item'>Benefit</span><span class='gallery-item'>Benefit</span>
        </div>
      </div><!-- .atf -->

      <!-- events query -->
      <?php
      $today = date('Ymd');
      $homepageEvents = new WP_Query(array(
        'posts_per_page' => 1,
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
          array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
          )
        )
      ));
      ?>

      <div class='btf container container--full'>
        <div class='gallery gallery-columns-3'>
          <span class='gallery-item gallery-item--border'>
            <h3>Next Event</h3>
            <ul>
              <?php
              while($homepageEvents->have_posts()) {
                $homepageEvents->the_post(); ?>
                <li>
                  <h4 class='event-title'><?php the_title(); ?></h4>
                  <?php $eventDate = new DateTime(get_field('event_date')); ?>
                  <span class='date'><?php echo $eventDate->format('d M') ?></span>
                  <p class='description'><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                </li>
              <?php
              } ?>
            </ul>
          </span
          ><span class='gallery-item gallery-item--border'>
            <h3>About Us</h3>
            <p class='description'>Providing support & information to those suffering from AS.</p>
          </span
          ><span class='gallery-item'>
            <h3>Contact</h3>
            <p class='description'>Contact us now for mroe information</p>
          </span>
        </div>
      </div><!-- .btf -->
      

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
