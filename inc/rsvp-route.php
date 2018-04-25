<?php

$event = new WP_Query(array(
  ''
));

function rsvpAttend() {
  $post = file_get_contents('php://input');
  $event = json_decode($post);

  if (is_user_logged_in()) {
    // check if user already rsvp'ed
    $rsvpStatus = new WP_Query(array(
      'author' => get_current_user_id(),
      'post_type' => 'rsvp',
      'meta_query' => array(
        array(
          'key' => 'rsvp_event_id',
          'compare' => '= ',
          'value' => $event->{'eventId'},
        )
      )
    ));
    // make sure user hasnt' rsvp'ed already && rsvp event id actually belongs to an event
    if ($rsvpStatus->found_posts === 0 && get_post_type($event->{'eventId'}) === 'event') {
      return wp_insert_post(array(
        'post_type' => 'rsvp',
        'post_status' => 'publish',
        'meta_input' => array(
          'rsvp_event_id' => $event->{'eventId'}
        )
      ));
    } else {
      return("You have already RSVP'ed");
    }
    
  } else {
    // using exit doesn't retunr the message
    return("Only logged in users can RSVP to an event.");

  }
}

function rsvpUnattend() {
  $post = file_get_contents('php://input');
  $event = json_decode($post);
  wp_delete_post($event->{'eventId'}, true);
  return 'unattend api';
}

function asAustraliaRsvpRoutes() {
  register_rest_route('asAustralia/v1', 'manageRsvp', array(
    'methods' => 'POST',
    'callback' => 'rsvpAttend'
  ));

  register_rest_route('asAustralia/v1', 'manageRsvp', array(
    'methods' => 'DELETE',
    'callback' => 'rsvpUnattend'
  ));
}

add_action('rest_api_init', 'asAustraliaRsvpRoutes');