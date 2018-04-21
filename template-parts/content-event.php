<div>
  <a class='a-event' href="<?php the_permalink(); ?>"><h2 class='event-title'><?php the_title(); ?></h2></a>
  <?php $eventDate = new DateTime(get_field('event_date')); ?>
  <div class='date'><?php echo $eventDate->format('d M'); ?></div>
  <p><?php echo (has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 10, '...')); ?></p>
  
</div>
