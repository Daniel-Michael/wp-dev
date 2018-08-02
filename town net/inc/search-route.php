<?php

add_action('rest_api_init', townRegisterSearch);

function townRegisterSearch() {
    register_rest_route('town', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'townSearchResults'
    ));
}

function townSearchResults() {
    return 'Congrats on creating a route';
}
