<?php get_header(); ?>
<div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-vertical-large">
  <div class="u-1/1 u-margin-bottom-small">
    <?php $type = get_field('event_type',$post->id)?>
    <span class="c-event__label"><?= $type->name;?></span>
  </div>
  <h2 class="u-10/12@tablet u-8/12@desktop u-6/12@wide"><?= $post->post_title; ?></h2>
  <div class="u-1/1@mobile u-10/12@tablet u-8/12@desktop u-7/12@wide o-flex o-flex--space-between o-flex--wrap">
    <p class="o-flex c-event__hour">
      <span class="u-hidden-visually"><?= __('Horaire de l’événement', 'stla'); ?></span>
      <time datetime="<?= get_field('event_time-starting'); ?>"><?= get_field('event_time-starting'); ?></time>
      -
      <time datetime="<?= get_field('event_time-ending'); ?>"><?= get_field('event_time-ending'); ?></time>
    </p>
    <?php $locations = get_field('event_location'); ?>
    <?php if ($locations): ?>
      <p class="o-flex"><span class="u-hidden-visually"><?= __('Lieu de l’événement', 'stla'); ?></span>
        <?php foreach ($locations as $location): ?>
          <a href="<?= get_permalink($location->ID); ?>"
            class="c-link c-link--forward c-link--purple"><?= get_field('practical_address', $location->ID) ?></a>
          <?php endforeach; ?>
        </p>
      <?php endif; ?>
    </div>
    <div class="u-1/1@mobile u-10/12@tablet u-8/12@desktop u-7/12@wide c-article">
      <?= get_field('event_description') ?>
    </div>
  </div>
  <div class="o-content-wrapper c-bg-color--purple-light-20 o-flex o-flex--wrap u-padding-vertical-large c-bg-color--purple-light-40">
    <div class="o-flex u-padding-vertical-large o-flex--wrap u-1/1 u-padding-horizontal c-bg-color--shadow-white">
      <h3 class="c-h--yellow o-flex u-1/1@mobile"><?= __('Artistes participants', 'stla'); ?></h3>
      <?php $artists = get_field('event_artists'); ?>
      <?php if ($artists): ?>
        <?php foreach ($artists as $artist): ?>
          <a href="<?= get_permalink($artist->ID); ?>"
            class="c-artistcard u-padding-right-small u-margin-bottom-small u-1/2@mobile u-1/4@tablet u-1/4@desktop u-2/12@wide">
            <img class="c-artistcard__image u-margin-bottom-small o-flex__item"
            src="http://fillmurray.com/320/320"
            alt="there is not image yet">
            <span class="c-artistcard__name o-flex"><?= $artist->post_title; ?></span>
            <span class="c-artistcard__ability o-flex"><?= stla_the_skills($artist->ID, ', '); ?></span>
          </a>
        <?php endforeach; endif; ?>
      </div><!--END-Artiste participants-->
    </div>
    <div class="o-content-wrapper o-flex o-flex--wrap u-padding-vertical-large c-bg-color--purple">
      <a href="<?= stla_get_page_url('archive-events.php'); ?>"
        class="u-margin-bottom c-link c-link--back c-link--yellow c-link--upper"><?= __('Retourner aux événements', 'stla'); ?></a>
        <div class="u-1/1 o-flex--lock-top-left">
          <h4 class="c-h--white u-margin-bottom-small"><?= __('Partager l’événement sur', 'stla'); ?></h4>
          <div class="o-flex o-flex--wrap c-social-nav">
            <a class="c-social-nav__item u-padding-tiny" href="https://facebook.com/share.php?u=<?=the_permalink();?>" target="_blank" aria-label="<?=__('Partager sur Facebook','stla');?>">
              <span class="c-social-icon c-social-icon--fab" aria-hidden="true">
              </span>
              <span class="u-hidden-visually">Facebook</span>
            </a>
            <a class="c-social-nav__item u-padding-tiny u-margin-left" href="https://twitter.com/intent/tweet/?text=<?= $post->post_title;?>&amp;url=<?=the_permalink();?>" target="_blank" aria-label="<?=__('Partager sur Twitter','stla');?>">
              <span class="c-social-icon c-social-icon--twtr" aria-hidden="true">
              </span>
              <span class="u-hidden-visually">Twitter</span>
            </a>
            <a class="c-social-nav__item u-padding-tiny u-margin-left" href="mailto:?subject=<?= $post->post_title;?>&amp;body=<?=the_permalink()?>" target="_self" aria-label="<?=__('Partager par E-Mail','stla');?>">
              <span class="c-social-icon c-social-icon--mail" aria-hidden="true">
                <span class="u-hidden-visually">Mail</span>
              </a>
            </div>
          </div>
          <?php if (get_field('event_fb')): ?>
            <a href="<?= get_field('event_fb'); ?>"
              class="c-btn c-btn--link u-margin-top-small"><?= __('Participer à l’événement via Facebook', 'stla'); ?></a>
            <?php endif; ?>
          </div>
          <!--The partners list-->
          <?php get_template_part('partials/content', 'partners'); ?>
          <div class="site-cache" id="site-cache"></div>
          <?php get_footer(); ?>
