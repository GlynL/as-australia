<?php

add_action('rest_api_init', 'asAustraliaRsvpRoutes');

function rsvpAtttend() {

}

function rsvpUnattend() {
  
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