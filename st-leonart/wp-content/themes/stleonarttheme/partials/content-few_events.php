<?php
$mycurrentpage = (get_query_var('paged', 1));
$today = date('Ymd');
$args = [
  'posts_per_page' => 6,
  'post_type' => 'events',
  'meta_query' => [
    [
      'key'		=> 'event_date-starting',
      'compare'	=> '>=',
      'value'		=> $today,
    ],
    'relation' => 'OR',
    [
      'key'		=> 'event_date-ending',
      'compare'	=> '>=',
      'value'		=> $today,
    ]
  ]
];
// query
$events = new WP_Query($args);
?>
<?php if ($events): ?>
  <section class="events-section u-1/1@mobile u-1/1 o-flex o-flex--wrap">
    <h3 class="u-my-420 u-1/1"><?= __('Nos événements en cours ou à venir','stla');?></h3>
    <?php while ($events->have_posts()) : $events->the_post(); ?>
      <?php $locations = get_field('event_location'); ?>
      <?php
      $startdate = get_field('event_date-starting', false, false);
      $date = new DateTime($startdate);
      ?>
      <article class="o-flex--lock-top c-event o-flex u-margin-bottom u-1/1@mobile u-1/2@desktop">
        <div class="u-1/1">
          <a class="o-flex" href="<?php the_permalink(); ?>">
            <time datetime="2017-11-03"
            class="c-event__date o-flex__item o-flex u-2/12@mobile o-flex--column o-flex--centered">
            <span class="o-flex__item"><?= $date->format('M'); ?></span>
            <span class="o-flex__item c-event__date-day"><?= $date->format('j'); ?></span>
            <span class="o-flex__item"><?= $date->format('Y'); ?></span>
          </time>
          <div class="o-flex o-flex--wrap u-margin-left-small">
            <h4 class="o-flex__item u-margin-bottom-tiny"><?= $post->post_title; ?></h4>
            <?php if ($locations): ?>
              <?php foreach ($locations as $location): ?>
                <address class="o-flex__item u-margin-bottom-tiny">
                  <?= get_field('practical_address', $location->ID) ?>
                </address>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </a>
      </div>
    </article>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</section>
<div class="o-flex u-margin-top-small">
  <a  href="<?= stla_get_page_url('archive-events.php'); ?>"
    class="cta-button c-link c-link--forward c-link--upper" title="<?= __('Consulter les autres événements','stla');?>"><?= __('Consulter les autres événements','stla');?></a>
  </div>
<?php endif; ?>
