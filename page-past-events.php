<?php
  get_header();
?>

<div id="primary" class="content-area container">
  <main id="main" class="site-main">
    <header class="page-header">
      <h1 class='page-title'>Past Events</h1>
      <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
    </header><!-- .page-header -->

  <?php
    $pastEvents = new WP_Query(array(
      'paged' => get_query_var('paged', 1),
      'post_type' => 'event',
      'meta_key' => 'event_date',
      'orderby' => 'meta_value_num',
      'meta_query' => array(
        array(
          'key' => 'event_date',
          'compare' => '<',
          'value' => date('Ymd'),
          'type' => 'numeric'
        )
      )
    ));

    while ($pastEvents->have_posts()) {
      $pastEvents->the_post();
      get_template_part('template-parts/content-event');
    }
      echo paginate_links(array(
        'total' => $pastEvents->max_num_pages,
      ));  
  ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>

<!-- 
  make new link 
  
 -->