<?php
/*
Template name: Page Pratique
*/
get_header();
$mycurrentpage = (get_query_var('paged', 1));
$args = [
    'posts_per_page' => 6,
    'post_type' => 'practical',
    //'paged' => $mycurrentpage
];
// query
$the_query = new WP_Query($args);
//$total_pages = $the_query->max_num_pages;
?>
<div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-vertical-large c-bg-color--yellow">
    <div role="navigation" aria-label="menu pour les expositions" class="o-wrapper--small c-bg-color--purple u-1/1">
        <ul role="menubar"
            class="c-nav-event o-flex u-1/1 u-margin-vertical-small u-margin-horizontal-none o-flex--space-between o-flex--wrap o-flex--lock-right">
            <li role="menuitem" tabindex="0" class="o-flex__item c-nav-event__li"><?= __('organizer par', 'stla') ?><a
                        aria-haspopup="true"
                        class="c-nav-event__option c-nav-event__option--icon-down u-padding-small"><?= __('lieu', 'stla'); ?></a>
                <ul role="menu" aria-hidden="true" aria-label="submenu"
                    class="c-nav-event__drop-menu c-nav-event__drop-menu--right u-margin-none o-flex o-flex--wrap">
                    <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Liege</a></li>
                    <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Outremeuse</a></li>
                    <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Ans</a></li>
                    <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Mons</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="o-content--wrapper u-padding-vertical-large o-flex o-flex--wrap u-1/1">
        <div class="u-7/12@desktop u-padding-right">
            <h2 class="u-my-420"><?= get_field('header_title') ? the_field('header_title') : $post->post_title; ?></h2>
            <p class="u-my-420"><?php nop_the_field('page_introduction') ?></p>
        </div>
    </div><!--END-intro text-->
    <section class="o-flex o-flex--wrap u-1/1">
        <div class="c-section__title-wrapper o-flex u-1/1">
            <h3 class="c-h--purple o-flex o-flex--centered-v"><?= __('Les differents lieu', 'stla'); ?></h3>
        </div>
        <?php if ($the_query->have_posts()): ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="c-article o-flex u-padding-tiny u-padding-bottom u-1/1@mobile u-1/2@tablet u-1/2@desktop u-4/12@wide">
                    <a href="<?php the_permalink();?>" class="c-bg-color--shadow-white c-anime--hover-up">
                        <div class="c-practical__element u-margin-none">
                            <img src="http://fillmurray.com/352/144" alt="Image de l'article">
                            <div class="o-flex o-flex--wrap u-margin-left-small u-margin-bottom-small">
                                <h4 class="u-margin-bottom-tiny u-1/1 c-practical__sub-title"><?= $post->post_title;?></h4>
                                <p class="u-margin-bottom-none"><?= get_field('practical_address')?></p>
                            </div>
                            <div class="o-flex o-flex--wrap u-margin-left-small u-margin-right-small u-margin-bottom-small">
                                <?php if(get_field('practical_parkings')):?>
                                <p class="o-flex o-flex--centered-v u-margin-bottom-tiny u-margin-right-large c-practical-icon c-practical-icon--location"><?= get_field('practical_parkings');?></p>
                                <?php endif;?>
                                <?php if(get_field('practical_buses')):?>
                                <p class="o-flex o-flex--centered-v u-margin-bottom-none c-practical-icon c-practical-icon--bus"><?=__('bus: ','stla')?><?= get_field('practical_buses');?></p>
                                <?php endif;?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
</div><!--END Content wrapper-->
<!--The partners list-->
<?php get_template_part('partials/content', 'partners'); ?>
<div class="site-cache" id="site-cache"></div>
<?php get_footer(); ?>
