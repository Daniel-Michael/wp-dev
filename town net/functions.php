<?php

function pageBanner($args = NULL) {

  if (!$args['title']) {
    $args['title'] = get_the_title();
  }

  if(!$args['subtitle']) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }

  if(!$args['photo']) {
    if (get_field('page_banner_background_image')) {
      $args['photo'] = get_field('page_banner_background_image');
    } else {
      $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    }
  }

  ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo'] ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>
  </div>

<?php }

function townNet_files() {
  wp_enqueue_script('mySearch-js', get_theme_file_uri('/js/modules/Search.js'), NULL, 'microtime()', true);
  wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyBh9b1rNCp6kOi5JeMHiRP4klDymBeoEWk', NULL, 'microtime()', true);
  wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, 'microtime()', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('town_main_styles', get_stylesheet_uri(), NULL, microtime());
}
add_action('wp_enqueue_scripts', 'townNet_files');

function townNet_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'townNet_features');

function town_adjust_queries($query) {
  if (!is_admin() AND is_post_type_archive('accommodation') AND $query->is_main_query()) {
    $query->set('posts_per_page', '-1');
  }

  if (!is_admin() AND is_post_type_archive('attractions') AND $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', '-1');
  }

  if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('order-by', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key'         => 'event_date',
        'compare'     => '>=',
        'value'       => $today,
        'type'        => 'numeric'
      )
      ));
  }
}

add_action('pre_get_post', 'town_adjust_queries');

function townMapKey($api) {
  $api['key'] = 'AIzaSyBh9b1rNCp6kOi5JeMHiRP4klDymBeoEWk';
  return $api;
}

add_filter('acf/fields/google_map/api', 'townMapKey');

// function defer_parsing_of_js ( $url ) {
// if ( FALSE === strpos( $url, '.js' ) ) return $url;
// if ( strpos( $url, 'jquery.js' ) ) return $url;
// return "$url' defer ";
// }
// add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
