<?php
/*
Template Name: Page Artistes
*/
get_header();
$theskills = get_terms('skills', 'fields=names');
//check if
if($_GET['profession'] && !empty($_GET['profession'] && in_array($_GET['profession'], $theskills))){
    $theskill = htmlspecialchars($_GET['profession']);
}else{
    $theskill = $theskills;
}

$mycurrentpage = (get_query_var('paged', 1));
$args = [
    'posts_per_page' => 6,
    'post_type' => 'artists',
    'tax_query' => [
            [
                    'taxonomy' => 'skills',
                    'field' => 'slug',
                    'terms' => $theskill
            ]
    ]
];
// query
$the_query = new WP_Query($args);
//$total_pages = $the_query->max_num_pages;
?>
<?php if ($the_query->have_posts()): ?>
<div class="o-content-wrapper c-bg-color--purple-light-20 o-flex o-flex--wrap u-padding-vertical-large c-bg-color--purple-light-40">
    <div role="navigation" aria-label="menu pour les expositions"
         class="o-wrapper--small c-bg-color--purple u-1/1 u-margin-bottom">
        <ul role="menubar"
            class="c-nav-event o-flex u-1/1 u-margin-vertical-small u-margin-horizontal-none o-flex--lock-right o-flex--wrap">
            <li role="menuitem" tabindex="0" class="o-flex__item c-nav-event__li"><?= __('organizer par', 'stla'); ?><a
                        aria-haspopup="true" class="c-nav-event__option c-nav-event__option--icon-down u-padding-small"><?= __('profession','stla');?></a>
                <ul role="menu" aria-hidden="true" aria-label="submenu"
                    class="c-nav-event__drop-menu c-nav-event__drop-menu--right u-margin-none o-flex o-flex--wrap">
                    <li tabindex="-1" class="o-flex u-1/1">
                        <a class="u-1/1 u-padding-small" href="<?= the_permalink();?>"><?=__('Tout','stla');?></a>
                    </li>
                    <?php $skills = get_terms('skills');?>
                    <?php foreach($skills as $skill): ?>
                    <li tabindex="-1" class="o-flex u-1/1">
                        <a class="u-1/1 u-padding-small" id="titina" href="<?= the_permalink().'?profession='.$skill->name;?>"><?= $skill->name ?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </li>
        </ul>
    </div>
    <div class="o-flex u-padding-vertical-large o-flex--wrap u-1/1 u-padding-horizontal c-bg-color--shadow-white">
        <h3 class="c-h--yellow u-1/1"><?= __('Nos ', 'stla') . (isset($_GET['profession']) ? $theskill : __('artistes','stla')); ?></h3>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <a href="<?= the_permalink()?>"
                   class="c-artistcard u-padding-right-small u-margin-bottom-small u-1/2@mobile u-1/4@tablet u-1/4@desktop u-2/12@wide">
                    <img class="c-artistcard__image u-margin-bottom-small o-flex__item" src="http://fillmurray.com/320/320" alt="there is not image yet">
                    <span class="c-artistcard__name o-flex"><?= $post->post_title;?></span>
                    <?php if( $skills ): ?>
                    <span class="c-artistcard__ability o-flex">
                       <?= stla_the_skills($post->ID,', ');?>
                    </span>
                    <?php endif;?>
                </a>
    <?php endwhile; ?>
    </div><!--END-Nos artistes-->
</div><!--END Content wrapper-->
<?php endif; ?>
<!--The partners list-->
<?php get_template_part('partials/content', 'partners'); ?>
<div class="site-cache" id="site-cache"></div>
<?php get_footer(); ?>
