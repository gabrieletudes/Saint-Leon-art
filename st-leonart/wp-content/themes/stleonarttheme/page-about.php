<?php
/*
Template Name: Page About
*/
get_header();
?>
<div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-bottom u-padding-top-large">
  <h2 class="u-10/12@tablet u-8/12@desktop u-6/12@wide"><?= get_field('header_title') ? the_field('header_title') : $post->post_title; ?></h2>
  <div class="u-1/1@mobile u-10/12@tablet u-8/12@desktop u-7/12@wide c-article">
    <?php the_field('page_introduction'); ?>
  </div>
</div>
<div class="o-content-wrapper o-flex o-flex--wrap u-padding-bottom-large">
  <?php get_template_part('partials/content','previous_edition');?>
  <div class="content-wrapper--light-purple o-flex o-flex--wrap u-1/1 u-margin-vertical-large">
    <?php get_template_part('partials/content', 'few_events'); ?>
  </div><!--END Events section-->
</div>
<!--The partners list-->
<?php get_template_part('partials/content', 'partners'); ?>
<!--END Partners section-->
<div class="site-cache" id="site-cache"></div>
<?php get_footer(); ?>
