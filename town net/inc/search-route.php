<?php

add_action('rest_api_init', townRegisterSearch);

function townRegisterSearch() {
    register_rest_route('town', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'townSearchResults'
    ));
}

function townSearchResults($data) {
    $mainQuery = new WP_Query(array(
        'post_type' => array ('post', 'page','officials'),
        's' => sanitize_text_field($data['term'])
    ));

    $results = array(
        'generalInfo' => x,
        'officials' => x,
        'attractions'
        
    );

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();
        array_push($results, array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
        ));
    }
    return $results;
}