<?php
/*
Template Name: Archives
*/
get_header();
$thecategory = get_terms('category', 'fields=names');
//check if there is a article type argument, if it is not empty and if the the given value is in the category array
if($_GET['type'] && !empty($_GET['type'] && in_array($_GET['type'], $thecategory))){
    $thecat = htmlspecialchars($_GET['type']);
}else{
    $thecat = $thecategory;
}
$args = [
    'posts_per_page' => 6,
    'post_type' => 'post',
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $thecat
        ]
    ]
];
// query
$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()): ?>
<div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-top-small">
  <div role="navigation" aria-label="menu pour les expositions" class="o-wrapper--small c-bg-color--purple u-1/1">
    <ul role="menubar" class="c-nav-event o-flex u-1/1 u-margin-vertical-small u-margin-horizontal-none o-flex--space-between o-flex--wrap">
      <li role="menuitem" tabindex="0" class="o-flex__item c-nav-event__li">
        <a href="#" aria-haspopup="true" class="c-nav-event__option c-nav-event__option--icon-down u-padding-small"><?=__('Année');?></a>
        <ul role="menu" tabindex="-1" aria-hidden="true" aria-label="submenu" class="c-nav-event__drop-menu c-nav-event__drop-menu--left u-margin-none o-flex o-flex--wrap">
          <li role="menuitem" tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="<?= the_permalink().'?annee=2017'?>"><time datetime="2017" class="u-margin-left-small">2017</time></a></li>
          <li role="menuitem" tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="<?= the_permalink().'?annee=2017'?>"><time datetime="2016" class="u-margin-left-small">2016</time></a></li>
        </ul>
      </li>
      <li role="menuitem" tabindex="0" class="o-flex__item c-nav-event__li"><?= __('organizer par', 'stla'); ?><a aria-haspopup="true" class="c-nav-event__option c-nav-event__option--icon-down u-padding-small"><?=__('type','stla');?></a>
        <ul role="menu" aria-hidden="true" aria-label="submenu" class="c-nav-event__drop-menu c-nav-event__drop-menu--right u-margin-none o-flex o-flex--wrap">
            <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="<?= the_permalink();?>"><?=__('Tout','stla');?></a>
            </li>
            <?php $categorys = get_terms('category');?>
            <?php foreach($categorys as $category): ?>
          <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="<?= the_permalink().'?type='.$category->name;?>"><?= $category->name;?></a></li>
            <?php endforeach;?>
        </ul>
      </li>
    </ul>
  </div>
  <div class="o-content--wrapper u-padding-vertical-large o-flex o-flex--wrap u-1/1">
    <div class="u-7/12@desktop u-padding-right">
      <h2 class="u-my-420"><?= $post->post_title; ?></h2>
      <p class="u-my-420"><?php nop_the_field('page_introduction');?></p>
    </div>
  </div><!--END-intro text-->
</div>
<div class="o-content-wrapper o-flex o-flex--wrap u-padding-bottom-large">
  <section class="o-flex o-flex--wrap">
    <div class="c-section__title-wrapper o-flex u-1/1">
      <h3 class="c-h--purple o-flex o-flex--centered-v"><?= isset($_GET['type']) ? __('Nos articles sur les ','stla') .lcfirst($thecat.'s') : __('Nos articles','stla') ;?></h3>
    </div>
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <?php $date = new DateTime($post->post_date); ?>
    <article class="c-article o-flex u-margin-bottom-small u-1/1@mobile u-1/2@tablet u-1/2@desktop u-4/12@wide">
          <div class="o-flex u-12/12@desktop u-1/1@wide o-flex--lock-top-left">
            <div class="c-article__element u-padding-bottom-small u-padding-right-small">
              <img src="http://fillmurray.com/96/96" alt="Image de l'article">
            </div>
            <div class="o-flex o-flex--wrap">
              <div class="o-flex o-flex--lock-top">
                <time datetime="" class="c-article__date u-margin-bottom-tiny"><?= $date->format('j M Y');?></time>
                  <?php $articlecat = get_field('article_type');?>
                  <?php if($articlecat):?>
                <p class="c-article__label u-margin-bottom-tiny"><?= $articlecat->name;?></p>
                  <?php endif;?>
              </div>
              <h4 class="o-flex__item u-margin-bottom-tiny u-11/12@tablet u-1/1"><a href="<?php the_permalink();?>"><?= $post->post_title;?></a></h4>
            </div>
          </div>
        </article>
      <?php endwhile;?>
  </section>
</div><!--END Content wrapper-->
<?php endif;?>
<!--The partners list-->
<?php get_template_part('partials/content', 'partners'); ?>
<div class="site-cache" id="site-cache"></div>
<?php get_footer(); ?>
