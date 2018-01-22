<!DOCTYPE html>
<html lang="fr" id="jsPage" class="no-js">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0 minimum-scale=1.0" />
  <link rel="stylesheet" href="<?php theme_asset('/css/inuitcss/main.css')?>">
  <link rel="shortcut icon" href="/favicon.png">
  <title><?= custom_wp_title($post->post_title);?></title>
</head>
<body>
  <div class="mr-hidder">
    <input class="u-hidden" type="checkbox" id="sidebartoggler" name="toggler" value="">
    <header class="c-header o-flex o-flex--lock-top o-flex--wrap">
      <div class="c-header__wrapper haha o-flex u-1/1 o-flex--wrap o-flex--space-between u-padding-horizontal-tiny u-padding-top-tiny">
        <label for="sidebartoggler" class="c-header__icon c-header__icon--menu o-flex o-flex--centered o-margin-left-tiny" id="c-header__icon"></label>
        <a href="#" class="o-block o-flex c-header__logo c-social-nav--hidde"><img class="u-padding-tiny" src="<?php theme_asset('/img/logo.svg');?>" alt="Logo" width="62" height="49">
        </a>
        <a href="#" class="c-header__icon c-header__icon--search o-flex o-margin-left-tiny c-social-nav--hidde o-flex--centered"></a>
        <div class="o-flex o-flex--wrap c-social-nav u-padding-left c-social-nav--hidde-m o-flex--centered">
            <?php $social_fb = get_field('contact_fb', stla_get_page_id('contact.php'));?>
            <?php if($social_fb):?>
                <a class="c-social-nav__item o-flex__item u-padding-tiny" href="<?= $social_fb?>" title="<?= __('Suivez nous sur Facebook', 'stla') ?>">
                <span class="c-social-icon c-social-icon--fab" aria-hidden="true">
                    <span class="u-hidden-visually">Facebook</span></span>
                </a>
            <?php endif;?>
            <?php $social_tw = get_field('contact_tw',stla_get_page_id('contact.php'));?>
            <?php if($social_tw):?>
                <a class="c-social-nav__item o-flex__item u-padding-tiny u-margin-left" href="<?= $social_tw?>" title="<?= __('Suivez nous sur Twitter', 'stla') ?>">
                <span class="c-social-icon c-social-icon--twtr" aria-hidden="true">
                    <span class="u-hidden-visually">Twitter</span></span>
                </a>
            <?php endif?>
            <?php $social_inst = get_field('contact_insta',stla_get_page_id('contact.php'));?>
            <?php if($social_inst):?>
                <a class="c-social-nav__item o-flex__item u-padding-tiny u-margin-left" href="<?= $social_inst?>" title="<?= __('Suivez nous sur Instagram', 'stla') ?>">
                <span class="c-social-icon c-social-icon--inst" aria-hidden="true">
                    <span class="u-hidden-visually">Instagram</span></span>
                </a>
            <?php endif;?>
        </div>
        <nav class="c-header__nav titi o-flex o-flex__item u-2/3@mobile u-4/12@tablet u-11/12@desktop o-flex--lock-top-left o-flex--wrap">
            <h1 class="u-hidden-visually" ><?= __('Main navigation','stla');?></h1>
            <a href="#" class="o-block o-flex c-header__nav-logo u-margin-right-small"><img class="u-padding-tiny" src="<?php theme_asset('/img/logo.svg');?>" alt="Logo" width="62" height="49"></a>
            <?php foreach (stla_get_nav_items('header') as $item): ?>
                <a href="<?= $item->url;?>" class="c-header__nav-item c-header__nav-item--<?= $item->icon;?> o-flex__item u-margin-right" data-hover="<?= $item->label;?>"><?= $item->label;?></a>
            <?php endforeach; ?>
          <div class="o-flex o-flex--wrap c-social-nav u-margin-top-large u-padding-left c-social-nav--hidde">
              <?php $social_fb = get_field('contact_fb',stla_get_page_id('contact.php'));?>
              <?php if($social_fb):?>
                  <a class="c-social-nav__item o-flex__item u-padding-tiny" href="<?= $social_fb?>" title="<?= __('Suivez nous sur Facebook', 'stla') ?>">
                <span class="c-social-icon c-social-icon--fab" aria-hidden="true">
                    <span class="u-hidden-visually">Facebook</span></span>
                  </a>
              <?php endif;?>
              <?php $social_tw = get_field('contact_tw',stla_get_page_id('contact.php'));?>
              <?php if($social_tw):?>
                  <a class="c-social-nav__item o-flex__item u-padding-tiny u-margin-left" href="<?= $social_tw?>" title="<?= __('Suivez nous sur Twitter', 'stla') ?>">
                <span class="c-social-icon c-social-icon--twtr" aria-hidden="true">
                    <span class="u-hidden-visually">Twitter</span></span>
                  </a>
              <?php endif?>
              <?php $social_inst = get_field('contact_insta',stla_get_page_id('contact.php'));?>
              <?php if($social_inst):?>
                  <a class="c-social-nav__item o-flex__item u-padding-tiny u-margin-left" href="<?= $social_inst?>" title="<?= __('Suivez nous sur Instagram', 'stla') ?>">
                <span class="c-social-icon c-social-icon--inst" aria-hidden="true">
                    <span class="u-hidden-visually">Instagram</span></span>
                  </a>
              <?php endif;?>
          </div>
        </nav>
      </div>
    </header>
    <div class="site-pusher">
      <div class="o-flex c-header__back o-content-wrapper o-flex--wrap o-flex--centered  o-flex--lock-left" style="background: linear-gradient(0deg,rgba(202,67,57,0.6),rgba(202,67,57,0.6)), url('<?= get_field('header_image') ? get_field('header_image') : get_field('header_image',10)?>') center center; background-size: cover;">
        <div class="u-1/1@mobile u-6/12@tablet u-5/12@desktop u-3/12@wide">
        <h1 class="c-header__title o-flex__item o-flex o-flex--wrap u-padding-small u-11/12@mobile u-10/12 u-margin-bottom-none"><span class="u-1/1"><?=__('Saint Léon’art','stla')?> </span><small class="u-1/1 c-header__title--small"><?=__('Un parcours artistique à Liège','stla')?></small></h1>
        <a href="<?= stla_get_page_url('archive-events.php');?>" class="o-flex__item o-flex o-flex--wrap c-header__sub-title u-padding-small"><?=__('Venez decouvrir nos événements ','stla')?><span class="o-flex__item u-1/1"><?=__('Du 24 out au 30 octobre a Liege','stla');?></span>
        </a>
        </div>
          <!--The breadcrumbs-->
          <?php if (!is_front_page()): ?>
          <?php get_template_part('partials/content', 'breadcrumbs'); ?>
            <?php endif;?>
      </div>
