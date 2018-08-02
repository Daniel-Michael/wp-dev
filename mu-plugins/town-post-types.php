<?php

function town_post_types() {
// accommodation post type
  register_post_type('accommodation', array(
      'supports'    => array('title', 'editor'),
      'rewrite'     => array('slug' => 'accommodation'),
      'has_archive' => true,
      'public'      => true,
      'labels'      => array(
        'name'          => 'Accommodation',
        'add_new_item'  => 'Add New Accommodation',
        'edit_item'     => 'Edit Accommodation',
        'all_items'     => 'All Accommodation',
      ),
      'menu_icon' => 'dashicons-admin-multisite'
    ));
    // Event post type
    register_post_type('event', array(
      'supports'    => array('title', 'editor'),
      'rewrite'     => array('slug' => 'events'),
      'has_archive' => true,
      'public'      => true,
      'labels'      => array(
        'name'          => 'Events',
        'add_new_item'  => 'Add New Event',
        'edit_item'     => 'Edit Event',
        'all_items'     => 'All Events',
        'singular_name' => 'Event',
      ),
      'menu_icon' => 'dashicons-calendar'
    ));

    // Attractions post type
    register_post_type('attractions', array(
        'supports'    => array('title', 'editor'),
        'has_archive' => true,
        'public'      => true,
        'labels'      => array(
          'name'          => 'Attractions',
          'add_new_item'  => 'Add New Attraction',
          'edit_item'     => 'Edit Attraction',
          'all_items'     => 'All Attractions',
        ),
        'menu_icon' => 'dashicons-palmtree'
      ));

      // Officials post type
      register_post_type('official', array(
        'show_in_rest'  => true,
        'supports'      => array('title', 'editor', 'thumbnail'),
          'rewrite'     => array('slug' => 'officials'),
          'public'      => true,
          'labels'      => array(
            'name'          => 'Officials',
            'add_new_item'  => 'Add New Official',
            'edit_item'     => 'Edit Officials',
            'all_items'     => 'All Officials',
          ),
          'menu_icon' => 'dashicons-welcome-learn-more'
        ));
}
add_action('init', 'town_post_types');
