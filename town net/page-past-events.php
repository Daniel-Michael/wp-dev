<?php
get_header();

pageBanner(array(
  'title' => 'Past Events',
  'subtitle' => 'An archive of past events held in town',
));?>

<div class="container container--narrow page-section">
  <?php
    $today = date('Ymd');
    $pastEvents = new WP_Query(array( // sets up the custom query for past events posts and creates the array
      'paged'           => get_query_var('paged', 1),
      'posts_per_page'  => '1',
      'post_type'       => 'event',
      'meta_key'        => 'event_date',
      'orderby'         => 'meta_value_num',
      'order'           => 'ASC',
      'meta_query'      => array(
        array(
          'key'         => 'event_date',
          'compare'     => '<',
          'value'       => $today,
          'type'        => 'numeric'
        )
      )
  ));

    while($pastEvents->have_posts()) {
      $pastEvents->the_post();
      get_template_part('template-parts/content-event');
      ?>
      <p>Return to <a href="/events">Events</a></p>
      <hr class="section-break">
    <?php }
    echo paginate_links(array(
      'total' => $pastEvents->max_num_pages
    ));
  ?>
  </div>



  <?php get_footer();

  ?>
