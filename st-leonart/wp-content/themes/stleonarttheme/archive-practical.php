<?php
/*
Template name: Page Pratique
*/
get_header();
$thelocalities = get_terms('localities', 'fields=names');
//check if there is a localite argument, if it is not empty and if the the given value is in the localities array
if($_GET['localite'] && !empty($_GET['localite'] && in_array($_GET['localite'], $thelocalities))){
    $thelocality = htmlspecialchars($_GET['localite']);
}else{
    $thelocality = $thelocalities;
}
$args = [
    'posts_per_page' => 6,
    'post_type' => 'practical',
    'tax_query' => [
        [
            'taxonomy' => 'localities',
            'field' => 'slug',
            'terms' => $thelocality
        ]
    ]
];
// query
$the_query = new WP_Query($args);
?>
<div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-vertical-large c-bg-color--yellow">
    <div role="navigation" aria-label="menu pour les expositions" class="o-wrapper--small c-bg-color--purple u-1/1">
        <ul role="menubar"
            class="c-nav-event o-flex u-1/1 u-margin-vertical-small u-margin-horizontal-none o-flex--space-between o-flex--wrap o-flex--lock-right">
            <li role="menuitem" tabindex="0" class="o-flex__item c-nav-event__li"><?= __('organizer par', 'stla') ?><a
                        aria-haspopup="true"
                        class="c-nav-event__option c-nav-event__option--icon-down u-padding-small"><?= __('localité', 'stla'); ?></a>
                <ul role="menu" aria-hidden="true" aria-label="submenu"
                    class="c-nav-event__drop-menu c-nav-event__drop-menu--right u-margin-none o-flex o-flex--wrap">
                    <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="<?= the_permalink();?>"><?=__('Tout','stla')?></a></li>
                    <?php $localities = get_terms('localities');?>
                    <?php if($localities):?>
                        <?php foreach($localities as $locality): ?>
                    <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="<?= the_permalink().'?localite='.$locality->name;?>"><?= $locality->name?></a></li>
                    <?php endforeach; endif;?>
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
            <h3 class="c-h--purple o-flex o-flex--centered-v"><?= __('Les differents lieu','stla'), isset($_GET['localite']) ? ' à '.$thelocality :'';?></h3>
        </div>
        <?php if ($the_query->have_posts()): ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="c-article o-flex u-padding-tiny u-padding-bottom u-1/1@mobile u-1/2@tablet u-1/2@desktop u-4/12@wide">
                    <a href="<?php the_permalink();?>" class="c-bg-color--shadow-white c-anime--hover-up">
                        <div class="c-practical__element u-margin-none">
                            <img src="https://maps.googleapis.com/maps/api/staticmap?markers=color:red|label:L|<?= get_field('practical_address') ?>&zoom=15&size=352x144&scale=2&key=AIzaSyDQT630KW4SabyiAeZWxylHlbPpmO9CEWU" alt="<?= __('Carte de sur google maps la carte de ','stla').$post->post_title;?>" width="352" height="144">
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
