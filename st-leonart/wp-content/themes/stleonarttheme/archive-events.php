<?php
/*
Template name: Page Evenements
*/
get_header();

$mycurrentpage = (get_query_var('paged', 1));
$args = [
    'posts_per_page' => 6,
    'post_type' => 'events',
    //'paged' => $mycurrentpage
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
                       class="c-nav-event__option c-nav-event__option--icon-down u-padding-small"><?=__('Ordre','stla');?></a>
                    <ul role="menu" tabindex="-1" aria-hidden="true" aria-label="submenu"
                        class="c-nav-event__drop-menu c-nav-event__drop-menu--left u-margin-none o-flex o-flex--wrap">
                        <li role="menuitem" tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small"
                                                                                  href="#"><?=__('Thematique','stla');?></a>
                        </li>
                        <li role="menuitem" tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small"
                                                                                  href="#"><?=__('Chronologique','stla');?></a>
                        </li>
                    </ul>
                </li>
                <li role="menuitem" tabindex="0"
                    class="o-flex__item c-nav-event__li"><?= __('organizer par', 'stla'); ?><a
                            aria-haspopup="true"
                            class="c-nav-event__option c-nav-event__option--icon-down u-padding-small"><?= __('type', 'stla'); ?></a>
                    <ul role="menu" aria-hidden="true" aria-label="submenu"
                        class="c-nav-event__drop-menu c-nav-event__drop-menu--right u-margin-none o-flex o-flex--wrap">
                        <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Expositions</a>
                        </li>
                        <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Concerts</a>
                        </li>
                        <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Spectacles</a>
                        </li>
                        <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Parcours
                                Artistiques</a></li>
                        <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Concerts</a>
                        </li>
                        <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Oeuvres
                                Urbaines</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="o-content--wrapper u-padding-vertical-large o-flex o-flex--wrap u-1/1">
            <div class="u-7/12@desktop u-padding-right">
                <h2 class="u-my-420"><?= $post->post_title; ?></h2>
                <p class="u-my-420"><?php nop_the_field('page_introduction'); ?></p>
            </div>
            <div class="u-5/12@desktop">
                <h2 class="u-my-420"><?= __('L’edition précédente', 'stla'); ?></h2>
                <dl class="o-flex u-1/1@desktop u-7/12@wide u-margin-bottom-none">
                    <div class="c-event-last o-flex o-flex--wrap-reverse u-1/3">
                        <dt class="c-event-last__data o-flex o-flex--centered o-flex__item u-1/1">Participants</dt>
                        <dd class="c-event-last__desc o-flex o-flex--centered o-flex__item u-1/1 u-margin-none">3000
                        </dd>
                    </div>
                    <div class="c-event-last o-flex o-flex--wrap-reverse u-1/3">
                        <dt class="c-event-last__data o-flex o-flex--centered o-flex__item u-1/1">Artistes</dt>
                        <dd class="c-event-last__desc o-flex o-flex--centered o-flex__item u-1/1 u-margin-none">1000
                        </dd>
                    </div>
                    <div class="c-event-last o-flex o-flex--wrap-reverse u-1/3">
                        <dt class="c-event-last__data o-flex o-flex--centered o-flex__item u-1/1">Événements</dt>
                        <dd class="c-event-last__desc o-flex o-flex--centered o-flex__item u-1/1 u-margin-none">300</dd>
                    </div>
                </dl>
            </div>
            <p class="u-my-420"></p>
        </div><!--END-intro text-->
    </div>
    <div class="o-content-wrapper o-flex o-flex--wrap u-padding-bottom-large">
        <section class="o-flex o-flex--wrap">
            <div class="c-section__title-wrapper o-flex u-1/1">
                <h3 class="c-h--purple o-flex o-flex--centered-v">Nos <span class="u-hidden-visually">Expositions</span>
                </h3>
                <select class="c-h c-event-type u-margin-bottom">
                    <option class="c-event-type__elmnt" value="expositions">Expositions</option>
                    <option class="c-event-type__elmnt" value="concerts">Concerts</option>
                    <option class="c-event-type__elmnt" value="spectacles">Spectacles</option>
                    <option class="c-event-type__elmnt" value="parcours-artistiques">Parcours Artistiques</option>
                </select>
            </div>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php $term = get_field('article_type'); ?>
                <?php $locations = get_field('event_location'); ?>
                <article class="c-event o-flex u-margin-bottom-small u-1/1@mobile u-1/2@tablet u-1/2@desktop u-4/12@wide">
                    <a class="o-flex u-11/12@desktop u-1/1@wide" href="<?php the_permalink();?>">
                        <div class="c-insta__element u-padding-bottom-small u-padding-right-small">
                            <img src="http://fillmurray.com/90/90" alt="Image de l'evenemnt">
                        </div>
                        <div class="o-flex o-flex--wrap u-margin-right-small">
                            <h4 class="o-flex__item u-margin-bottom-tiny">
                                <?= $post->post_title; ?>
                            </h4>
                            <?php if ($locations): ?>
                                <?php foreach ($locations as $location): ?>
                                    <address class="o-flex__item u-margin-bottom-tiny">
                                        <?= get_field('practical_address', $location->ID) ?>
                                    </address>
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