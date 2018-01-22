<?php
/*
 Template Name: Single Article
*/
get_header();
$events = get_posts(array(
    'post_type' => 'events',
    'meta_query' => array(
        array(
            'key' => 'event_artists', // name of custom field
            'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
            'compare' => 'LIKE'
        )
    )
));
?>
<div class="c-bg-color--purple-light-05">
    <div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-bottom u-padding-top-large"
         itemscope itemtype="http://schema.org/Person">
        <div class="u-margin-right u-margin-bottom">
            <?php $artistimage = get_field('artist_picture');
            $thumb = $artistimage['sizes']['artist-big'];
            $alt = $artistimage['alt'];
            ?>
            <?php if($artistimage):?>
                <img src="<?=$thumb;?>" alt="<?= $alt;?>">
            <?php else:?>
            <img src="http://fillmurray.com/240/304" alt="image du">
            <?php endif;?>
        </div>
        <div class="o-flex o-flex--lock-top-left o-flex--wrap u-10/12@mobile u-5/12@tablet u-8/12@desktop u-margin-bottom-small">
            <h2 class="c-h--white u-10/12@tablet u-8/12@desktop u-6/12@wide u-margin-bottom-small"
                itemprop="name"><?= $post->post_title; ?></h2>
            <div class="u-1/1">
            <p class="u-margin-bottom-tiny u-1/1 u-1/2@desktop"><span
                        class="u-hidden-visually"><?= __('Profession de l’artiste ', 'stla'); ?></span><?= stla_the_skills($post->ID, ', '); ?>
            </p>
            </div>
            <ul class="o-list-bare u-margin-right-large">
                <li class="u-margin-bottom-tiny"><?= get_field('artist_adress') ?></li>
                <?php $number = get_field('artist_phone-number'); ?>
                <?php if ($number): ?>
                    <li class="u-margin-bottom-tiny c-link--yellow c-link--underlined"><a
                                href="<?= 'tel:' . str_replace(' ', '', $number) ?>"><?= $number ?></a></li>
                <?php endif; ?>
                <?php $email = get_field('artist_social-email') ?>
                <?php if ($email): ?>
                    <li class="c-link--yellow c-link--underlined"><a href="<?= 'mailto:' . $email ?>"><?= $email; ?></a></li>
                <?php endif; ?>
            </ul>
            <div class="u-1/1">
                <h4 class="c-h--white"><?= __('Suivez cette artiste sur', ''); ?></h4>
                <div class="o-flex o-flex--wrap c-social-nav o-flex--lock-left">
                    <?php $artist_fb = get_field('artist_social-fb');?>
                    <?php if($artist_fb):?>
                    <a class="c-social-nav__item o-flex__item u-padding-tiny"
                       href="<?= get_field('artist_social-fb') ?>"
                       title="<?= __('Suivez ', '') . $post->post_title . __(' sur Facebook', 'stla') ?>">
                <span class="icon-fallback-text"><span class="c-social-icon c-social-icon--fab" aria-hidden="true">
                </span><span class="u-hidden-visually">Facebook</span>
                    </a>
                    <?php endif;?>
                    <?php $artist_tw = get_field('artist_social-tw');?>
                    <?php if($artist_tw):?>
                    <a class="c-social-nav__item o-flex__item u-padding-tiny u-margin-left"
                       href="<?= $artist_tw ?>"
                       title="<?= __('Suivez ', '') . $post->post_title . __(' sur Twitter', 'stla') ?>">
                <span class="icon-fallback-text"><span class="c-social-icon c-social-icon--twtr" aria-hidden="true">
                </span><span class="u-hidden-visually">Twitter</span>
                    </a>
                    <?php endif;?>
                    <?php $artist_insta = get_field('artist_social-insta');?>
                    <?php if($artist_insta):?>
                    <a class="c-social-nav__item o-flex__item u-padding-tiny u-margin-left"
                       href="<?= $artist_insta ?>"
                       title="<?= __('Suivez ', 'stla') . $post->post_title . __(' sur Instagram', 'stla') ?>">
                <span class="icon-fallback-text"><span class="c-social-icon c-social-icon--inst" aria-hidden="true">
                </span><span class="u-hidden-visually">Instagram</span>
                    </a>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="u-1/1@mobile u-10/12@tablet u-8/12@desktop u-7/12@wide c-article">
            <?= get_field('artist_description'); ?>
        </div>
    </div>
</div><!--end background-->
<?php if ($events): ?>
    <div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-bottom-large">
        <div class="content-wrapper--light-purple o-flex o-flex--wrap u-1/1 u-margin-vertical-large">
            <section class="events-section u-1/1@mobile u-1/1 o-flex o-flex--wrap">
                <h3 class="u-my-420 u-1/2@desktop u-6/12@wide u-margin-right-large"><?= __('Venez decouvir cette artiste a l’un des événements suivants', 'stla') ?></h3>
                <?php foreach ($events as $event): ?>
                    <?php
                    $startdate = get_field('event_date-starting', $event->ID, false);
                    $date = new DateTime($startdate);
                    ?>
                    <article class="c-event o-flex u-margin-bottom u-1/1@mobile u-1/2@desktop">
                        <a class="o-flex" href="<?= the_permalink($event->ID); ?>">
                            <time datetime="<?= $date->format('Y-m-j'); ?>"
                                  class="c-event__date o-flex__item o-flex u-2/12@mobile o-flex--column o-flex--centered">
                                <span class="o-flex__item"><?= $date->format('M'); ?></span>
                                <span class="o-flex__item c-event__date-day"><?= $date->format('j'); ?></span>
                                <span class="o-flex__item"><?= $date->format('Y'); ?></span>
                            </time>
                            <div class="o-flex o-flex--wrap u-margin-left-small">
                                <h4 class="o-flex__item u-margin-bottom-tiny"><?= $event->post_title; ?></h4>
                                <?php $locations = get_field('event_location', $event->ID); ?>
                                <?php foreach ($locations as $location): ?>
                                    <?php $address = get_field('practical_address', $location->ID); ?>
                                <?php endforeach; ?>
                                <?php if ($address): ?>
                                    <p class="o-flex__item u-margin-bottom-tiny"><?= $address; ?></p>
                                <?php endif; ?>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            </section>
            <a href="<?php stla_get_page_url('archive-events.php')?>"
               class="cta-button c-link c-link--forward c-link--upper cta-button--on-inversed u-margin-top-small" title="<?=__('Consulter
                les autres événements','stla');?>"><?=__('Consulter
                les autres événements','stla');?></a>
        </div><!--END Events section-->
    </div>
<?php endif; ?>
<!--The partners list-->
<?php get_template_part('partials/content', 'partners'); ?>
<div class="site-cache" id="site-cache"></div>
<?php get_footer(); ?>
