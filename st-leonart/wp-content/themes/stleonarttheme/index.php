<?php
get_header();
$today = date('Ymd');
$argsevent = [
  'posts_per_page' => 1,
  'post_type' => 'events',
  'meta_query' => [
    [
      'key' => 'event_date-starting',
      'compare' => '>=',
      'value' => $today,
    ],
    'relation' => 'OR',
    [
      'key' => 'event_date-ending',
      'compare' => '>=',
      'value' => $today,
    ]
  ]
];
$argsartists = [
  'posts_per_page' => 5,
  'post_type' => 'artists',
];

// query
$events = new WP_Query($argsevent);
$artists = new WP_Query($argsartists);
?>
<?php if ($events): ?>
  <div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap">
    <?php while ($events->have_posts()) : $events->the_post(); ?>
      <?php $locations = get_field('event_location'); ?>
      <?php
      $startdate = get_field('event_date-starting', false, false);
      $starttime = get_field('event_time-starting', false, false);
      $endingtime = get_field('event_time-ending', false, false);
      $date = new DateTime($startdate);
      $starttime = new DateTime($starttime);
      $endingtime = new DateTime($endingtime);
      ?>
      <div class="c-expointro u-padding-vertical-large u-1/2@desktop">
        <h2 class="u-my-420"><?= $post->post_title; ?></h2>
        <p class="u-my-420"><?= get_field('event_description'); ?></p>
        <?php if ($locations): ?>
          <?php foreach ($locations as $location): ?>
            <a class="c-event-promo o-flex o-flex--grids u-margin-top-small u-padding-small nana u-margin-left-none u-margin-bottom-small"
            href="<?= the_permalink(); ?>">
            <p class="c-event-promo__adress">
              <?= get_field('practical_address', $location->ID) ?>
            </p>
            <time datetime="<?= $date->format('Y-m-j'); ?>" class="c-event-promo__date u-1/2@mobile">
              <?= $date->format('j M Y'); ?>
            </time>
              <span class="c-event-promo__hour">
                <time datetime="<?= $starttime->format('H:i'); ?>">
                  <?= $starttime->format('H\hi'); ?>
                </time> -
                <time datetime="<?= $endingtime->format('H:i'); ?>">
                  <?= $endingtime->format('H\hi'); ?>
                </time>
              </span>
            </a>
          <?php endforeach; endif; ?>
          <a href="<?= the_permalink(); ?>"
            class="cta-button c-link c-link--forward c-link--upper u-margin-top"><?= __('Consulter l’événement', 'stla'); ?></a>
          </div><!--END-expointro-->
          <div class="u-padding-vertical-large u-1/2@desktop">
            <img src="http://fillmurray.com/462/300" alt="The image next">
          </div><!--END-image next-->
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div><!--END Content wrapper-->
    <?php endif; ?>
    <?php if ($artists): ?>
      <div class="o-content-wrapper c-bg-color--purple-light-20 o-flex o-flex--wrap u-padding-vertical-large c-bg-color--purple-light-40">
        <div class="o-flex u-padding-vertical-large o-flex--wrap u-1/1 u-padding-horizontal c-bg-color--shadow-white">
          <h3 class="c-h--yellow o-flex u-1/1@mobile"><?= __('Nos artistes vedette', 'stla'); ?></h3>
          <?php while ($artists->have_posts()) : $artists->the_post(); ?>
            <?php $terms = get_field('artist_skills'); ?>
            <a href="<?= the_permalink(); ?>"
              class="c-artistcard u-padding-right-small u-margin-bottom-small u-1/2@mobile u-1/4@tablet u-1/4@desktop u-2/12@wide">
              <img class="c-artistcard__image u-margin-bottom-small o-flex__item"
              src="http://fillmurray.com/320/320"
              alt="there is not image yet">
              <span class="c-artistcard__name o-flex">
                <?= $post->post_title; ?>
              </span>
              <?php if ($terms): ?>
                <span class="c-artistcard__ability o-flex"><?= stla_the_skills($post->ID, ', '); ?></span>
              <?php endif; ?>
            </a>
          <?php endwhile; ?>
        </div><!--END-Artiste vedette-->
      </div><!--END Content wrapper-->
    <?php endif; ?>
    <div class="o-content-wrapper--max o-flex o-flex--wrap o-flex--reversed">
      <div class="content-wrapper--light-purple o-flex o-flex--wrap u-1/1 u-2/3@desktop o-content-wrapper--padding-right u-padding-vertical-large o-flex--lock-top-left">
        <?php get_template_part('partials/content', 'few_events'); ?>
      </div><!--END Events section-->
      <div class="section-wrapper o-wrapper o-flex o-wrapper--tiny o-flex--wrap u-1/1 u-1/3@desktop o-content-wrapper--padding-left u-padding-vertical-large c-bg-color--purple-light-05">
        <h3 class="u-1/1 c-h--white"><?=__('Nos plus recent posts sur Instagram','stla');?></h3>
        <div class="o-flex o-flex--wrap u-my-270">
          <a class="c-insta__element  u-padding-bottom-small u-padding-right-small" href="#">
            <img src="http://fillmurray.com/90/90" alt="Image de instagrame">
          </a>
          <a class="c-insta__element  u-padding-bottom-small u-padding-right-small" href="#">
            <img src="http://fillmurray.com/90/90" alt="Image de instagrame">
          </a>
          <a class="c-insta__element  u-padding-bottom-small u-padding-right-small" href="#">
            <img src="http://fillmurray.com/90/90" alt="Image de instagrame">
          </a>
          <a class="c-insta__element  u-padding-bottom-small u-padding-right-small" href="#">
            <img src="http://fillmurray.com/90/90" alt="Image de instagrame">
          </a>
          <a class="c-insta__element  u-padding-bottom-small u-padding-right-small" href="#">
            <img src="http://fillmurray.com/90/90" alt="Image de instagrame">
          </a>
          <a class="c-insta__element o-flex__item u-margin-bottom-small u-padding-right-small" href="#">
            <img src="http://fillmurray.com/90/90" alt="Image de instagrame">
          </a>
        </div>
        <!--The Follow us content-->
        <?php get_template_part('partials/content', 'followus'); ?>
      </div><!--END Insta section-->
    </div>
    <div class="site-cache" id="site-cache"></div>
    <?php get_footer(); ?>
