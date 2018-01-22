<?php
/*
Template name: Page Contact
*/
get_header();
?>
<div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-bottom u-padding-top-large">
  <div class="o-flex u-1/1 c-bg-color--shadow-white o-flex--wrap">
    <div class="o-layout__item  u-1/1@mobile u-1/2@tablet u-1/2@desktop u-padding-vertical u-padding-horizontal o-flex__item c-bg-color--purple">
      <h4 class="u-margin-bottom-small c-h--white"><?=__('Nos informations de contact','stla');?></h4>
      <ul class="o-list-bare">
        <li><?= get_field('contact_address')?></li>
          <?php $number = get_field('contact_phone')?>
          <?php if ($number):?>
        <li><a class="c-link--yellow c-link--underlined" href="<?= 'tel:' . str_replace(' ', '', $number) ?>"><?= $number?></a></li>
       <?php endif;?>
          <?php $email = get_field('contact_email');?>
          <?php if ($email):?>
        <li><a class="c-link--yellow c-link--underlined" href="<?= 'mailto:' . $email ?>"><?= $email?></a></li>
          <?php endif;?>
      </ul>
        <!--Follow us-->
        <?php get_template_part('partials/content', 'followus'); ?>
    </div>
    <div class="o-layout__item  u-1/1@mobile u-1/2@tablet u-1/2@desktop u-padding u-padding-bottom o-flex__item">
      <h2><?=__('Une question ou une sugestion ?','stla');?></h2>
        <?= get_field('contact_form');?>
    </div>
  </div>
</div>
<!--The partners list-->
<?php get_template_part('partials/content', 'partners'); ?>
<div class="site-cache" id="site-cache"></div>
<?php get_footer(); ?>
