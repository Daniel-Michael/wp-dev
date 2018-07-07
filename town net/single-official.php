<?php

  get_header();

  while(have_posts()) {
    the_post();
    pageBanner();

    ?>


    <div class="container container--narrow page-section">

      <div class="generic-content">
        <div class="row group">

          <div class="one-third">
            <?php the_post_thumbnail(); ?>
          </div>

            <div class="two-thirds">
              <?php the_content(); ?>
            </div>

        </div>
      </div>

      <?php

        $relatedAttractions = get_field('related_attractions');

        if ($relatedAttractions) {
          echo '<hr class="section-break">';
          echo '<h2 class="headline headline--medium">Town Official For: </h2>';
          echo '<ul class="link-list min-list">';
          foreach($relatedAttractions as $attraction) { ?>

            <li><a href="<?php echo get_the_permalink($attraction); ?>"><?php echo get_the_title($attraction); ?></a></li>
          <?php }
          echo '</ul>';
        }

       ?>
    </div>

  <?php }
  get_footer();
 ?>
