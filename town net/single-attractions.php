
<?php get_header();

  while(have_posts()) {
    the_post();
    pageBanner();
    ?>

    <div class="container container--narrow page-section">
            <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('attractions'); ?>"><i class="fa fa-home" aria-hidden="true"></i>Town Attractions</a> <span class="metabox__main"><?php the_title(); ?></span></p>
          </div>


      <div class="generic-content"><?php the_content(); ?></div>
      <?php

      $relatedOfficials = new WP_Query(array( // sets up the custom query for the related town official posts and creates the array
          'posts_per_page'  => -1,
          'post_type'       => 'official',
          'orderby'         => 'title',
          'order'           => 'ASC',
          'meta_query'      => array(
            array(
              'key' => 'related_attractions',
              'compare' => 'LIKE',
              'value' => '"' . get_the_ID() . '"'
            )
          )
      ));

      if ($relatedOfficials->have_posts()) {
        echo '<hr class="section-break">';
        echo '<h2 class="headline headline--small">' . get_the_title() . ' Town Officials</h2>';

        echo '<ul class="professor-cards">';
        while($relatedOfficials->have_posts()) {
          $relatedOfficials->the_post(); ?>
          <li class="professor-card__list-item">
            <a class="professor-card" href="<?php the_permalink(); ?>">
              <img class="professor-card_image" src="<?php the_post_thumbnail(); ?>">"
              <span class="professor-card__name"><?php the_title(); ?></span>
            </a>
          </li>
        <?php }
        echo '</ul>';
      }

      wp_reset_postdata();

      $today = date('Ymd');
      $homepageEvents = new WP_Query(array( // sets up the custom query for the homepage events posts and creates the array
          'posts_per_page'  => 2,
          'post_type'       => 'event',
          'meta_key'        => 'event_date',
          'orderby'         => 'meta_value_num',
          'order'           => 'ASC',
          'meta_query'      => array(
            array(
              'key'         => 'event_date',
              'compare'     => '>=',
              'value'       => $today,
              'type'        => 'numeric'
            ),
            array(
              'key' => 'related_attractions',
              'compare' => 'LIKE',
              'value' => '"' . get_the_ID() . '"'
            )
          )
      ));

      if ($homepageEvents->have_posts()) {
        echo '<hr class="section-break">';
        echo '<h2 class="headline headline--small">Upcoming ' . get_the_title() . ' Attractions</h2>';

        while($homepageEvents->have_posts()) {
          $homepageEvents->the_post();
          get_template_part('template-parts/content-event');
        }
      }

      wp_reset_postdata();
      
      $relatedAccommodation = get_field('related_accommodation');

      if($relatedAccommodation) {
        echo '<hr class="section-break">';
        echo '<h2 class="headline headline--small">' . get_the_title() . ' close by: </h2>';

        echo '<ul class="min-list link-list">';
        foreach($relatedAccommodation as $accommodation) {
          ?><li><a href="<?php echo get_the_permalink($accommodation);?>"><?php get_the_title($accommodation) ?></a></li>
          <?php
        }
        echo '</ul>';
      }

     ?>

    </div>

  <?php }
  get_footer();
 ?>
