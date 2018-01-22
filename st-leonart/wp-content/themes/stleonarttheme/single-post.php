<?php
/*
 Template Name: Single Article
*/
get_header();

$date = new DateTime($post->post_date);
$type = get_field('article_type');
?>
<div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-bottom u-padding-top-large">
<h2 class="u-10/12@tablet u-8/12@desktop u-6/12@wide"><?= $post->post_title;?></h2>
<div class="o-flex o-flex--lock-top-left u-1/1 u-margin-bottom-small">
  <time datetime="<?= $date->format('Y-m-j');?>" class="c-article__date u-margin-bottom-tiny"><?= $date->format('j M Y');?></time>
  <p class="c-article__label u-margin-bottom-tiny"><?= $type->name;?></p>
</div>
<div class="u-1/1@mobile u-10/12@tablet u-8/12@desktop u-7/12@wide c-article">
<?= get_field('article_content')?>
</div>
</div>
<div class="o-content-wrapper o-flex o-flex--wrap u-padding-bottom-large">
  <div class="content-wrapper--light-purple o-flex o-flex--wrap u-1/1 u-margin-vertical-large">
      <?php get_template_part('partials/content', 'few_events'); ?>
  </div><!--END Events section-->
</div>
<!--The partners list-->
<?php get_template_part('partials/content', 'partners'); ?>
<div class="site-cache" id="site-cache"></div>
<?php get_footer(); ?>
