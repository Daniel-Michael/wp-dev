<?php

add_action('rest_api_init', townRegisterSearch);

function townRegisterSearch() {
    register_rest_route('town', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'townSearchResults'
    ));
}

function townSearchResults($data) {
    $officials = new WP_Query(array(
        'post_type' => 'professor',
        's' => $data['term']
    0);

    $officialResults = array();

    while($officials->have_posts()) {
        $officials->the_post();
        array_push($officialResults, array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink()
        ));
    }
    return $officialResults;
}