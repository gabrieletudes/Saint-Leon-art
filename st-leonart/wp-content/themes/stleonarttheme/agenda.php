<?php
/*
Template Name: Page Agenda
*/
get_header();
$theeventtypes = get_terms('types', 'fields=names');
$mycurrentpage = (get_query_var('paged', 1));
//check if there is a event type argument, if it is not empty and if the the given value is in the event types array
if ($_GET['type'] && !empty($_GET['type'] && in_array($_GET['type'], $theeventtypes))) {
  $thetype = htmlspecialchars($_GET['type']);
} else {
  $thetype = $theeventtypes;
}
$args = [
  'posts_per_page' => 6,
  'post_type' => 'events',
  'tax_query' => [
    [
      'taxonomy' => 'types',
      'field' => 'slug',
      'terms' => $thetype
    ]
  ]
];
// query
$the_query = new WP_Query($args);
//$total_pages = $the_query->max_num_pages;
?>
<?php if ($the_query->have_posts()): ?>
  <div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-top-small">
    <div role="navigation" aria-label="menu pour les expositions" class="o-wrapper--small c-bg-color--purple u-1/1">
      <ul role="menubar"
      class="c-nav-event o-flex u-1/1 u-margin-vertical-small u-margin-horizontal-none o-flex--space-between o-flex--wrap">
      <li role="menuitem" tabindex="0" class="o-flex__item c-nav-event__li">
        <a href="#" aria-haspopup="true"
        class="c-nav-event__option c-nav-event__option--icon-down u-padding-small"><?= __('Ordre', 'stla'); ?></a>
        <ul role="menu" tabindex="-1" aria-hidden="true" aria-label="submenu"
        class="c-nav-event__drop-menu c-nav-event__drop-menu--left u-margin-none o-flex o-flex--wrap">
        <li role="menuitem" tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small"
          href="<?= stla_get_page_url('archive-events.php')?>"><?= __('Thematique', 'stla'); ?></a>
        </li>
        <li role="menuitem" tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small"
          href="<?= stla_get_page_url('agenda.php')?>"><?= __('Chronologique', 'stla'); ?></a>
        </li>
      </ul>
    </li>
    <li role="menuitem" tabindex="0"
    class="o-flex__item c-nav-event__li"><?= __('organizer par', 'stla'); ?><a
    aria-haspopup="true"
    class="c-nav-event__option c-nav-event__option--icon-down u-padding-small"><?= __('type', 'stla'); ?></a>
    <ul role="menu" aria-hidden="true" aria-label="submenu"
    class="c-nav-event__drop-menu c-nav-event__drop-menu--right u-margin-none o-flex o-flex--wrap">
    <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small"
      href="<?= the_permalink(); ?>"><?= __('Tout', 'stla'); ?></a>
    </li>
    <?php $eventtypes = get_terms('types'); ?>
    <?php foreach ($eventtypes as $eventtype): ?>
      <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="<?= the_permalink() . '?type=' . $eventtype->name; ?>"><?= $eventtype->name; ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</li>
</ul>
</div>
<div class="o-content--wrapper u-padding-vertical-large o-flex o-flex--wrap u-1/1">
  <div class="u-7/12@desktop u-padding-right">
    <h2 class="u-my-420"><?= $post->post_title; ?></h2>
    <p class="u-my-420"><?= the_field('page_introduction',stla_get_page_id('archive-events.php')); ?></p>
  </div>
  <!--Previous event content-->
  <?php get_template_part('partials/content', 'previous_edition'); ?>
</div><!--END-intro text-->
</div>
<div class="o-content-wrapper o-flex o-flex--wrap u-padding-bottom-large">
  <section class="o-flex o-flex--wrap">
    <div class="c-section__title-wrapper o-flex u-1/1">
      <h3 class="c-h--purple o-flex o-flex--centered-v"><?= __('Nos', 'stla'); ?> <span
        class="u-hidden-visually"><?= isset($_GET['type']) ? lcfirst($thetype . 's') : __('événements', 'stla'); ?></span>
      </h3>
      <form action="">
        <select class="c-h c-event-type u-margin-bottom" id="type" name="type" onchange="this.form.submit();">
          <option class="c-event-type__elmnt"
          value=""><?= $_GET['type'] ? lcfirst($thetype . 's') : __('événements', 'stla'); ?></option>
          <?php foreach ($eventtypes as $eventtype): ?>
            <?php if ($eventtype->name != $_GET['type']): ?>
              <option class="c-event-type__elmnt"
              value="<?= $eventtype->name; ?>"><?= $eventtype->name; ?></option>
            <?php else: ?>
              <option class="c-event-type__elmnt" value=""><?= __('Tout', 'stla'); ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </form>
    </div>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
      <?php $term = get_field('article_type'); ?>
      <?php $locations = get_field('event_location'); ?>
      <article class="c-event o-flex u-margin-bottom-small u-1/1@mobile u-1/2@tablet u-1/2@desktop u-4/12@wide">
        <a class="o-flex u-11/12@desktop u-1/1@wide" href="<?php the_permalink(); ?>">
          <?php
          $startingdate = get_field('event_date-starting',false,false);
          $starting = new DateTime($startingdate);
          ?>
          <time datetime="<?= $starting->format('Y-m-j')?>" class="c-event__date o-flex__item o-flex u-2/12@mobile o-flex--column o-flex--centered">
            <span class="o-flex__item"><?= $starting->format('M')?></span>
            <span class="o-flex__item c-event__date-day"><?= $starting->format('j')?></span>
            <span class="o-flex__item"><?= $starting->format('Y')?></span>
          </time>
          <div class="o-flex o-flex--wrap u-margin-left-small">
            <h4 class="o-flex__item u-margin-bottom-tiny u-1/1">
              <?= $post->post_title; ?>
            </h4>
            <?php if ($locations): ?>
              <?php foreach ($locations as $location): ?>
                <p class="o-flex__item u-margin-bottom-tiny">
                  <?= get_field('practical_address', $location->ID) ?>
                </p>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </a>
      </article>
    <?php endwhile; ?>
  </section>
</div><!--END Content wrapper-->
<?php endif; ?>
<!--The partners list-->
<?php get_template_part('partials/content', 'partners'); ?>
<div class="site-cache" id="site-cache"></div>
<?php get_footer(); ?>
