<?php get_header();

$events = get_posts(array(
    'post_type' => 'events',
    'meta_query' => array(
        array(
            'key' => 'event_location', // name of custom field
            'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
            'compare' => 'LIKE'
        )
    )
));
?>
<div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-bottom u-padding-top-large">
    <h2 class="u-10/12@tablet u-8/12@desktop u-7/12@wide u-margin-bottom-tiny"><?= $post->post_title; ?></h2>
    <div class="u-10/12@tablet u-8/12@desktop u-7/12@wide o-flex o-flex--wrap u-margin-bottom-tiny">
        <?php if (get_field('practical_address')): ?>
            <p class="u-1/1 u-margin-bottom-small"><?= get_field('practical_address') ?></p>
        <?php endif; ?>
        <?php if (get_field('practical_parkings')): ?>
            <p class="o-flex o-flex--centered-v u-1/1@mobile u-1/2@tablet u-margin-bottom-tiny c-practical-icon c-practical-icon--location"><?= get_field('practical_parkings'); ?></p>
        <?php endif; ?>
        <?php if (get_field('practical_buses')): ?>
            <p class="o-flex o-flex--centered-v u-1/1@mobile u-1/2@tablet u-margin-bottom-tiny c-practical-icon c-practical-icon--bus"><?= __('bus: ', 'stla') ?><?= get_field('practical_buses'); ?></p>
        <?php endif; ?>
    </div>
    <?php if (get_field('practical_description')): ?>
        <div class="u-1/1@mobile u-10/12@tablet u-8/12@desktop u-7/12@wide c-article">
            <?php $locationimage = get_field('practical_image');
            $thumb = $locationimage['sizes']['location-big'];
            $alt = $locationimage['alt'];
            ?>
            <?php if($locationimage):?>
                <img src="<?= $thumb?>" alt="">
            <?php endif;?>
            <!--<img src="http://fillmurray.com/600/268" alt="image du">-->
            <?= get_field('practical_description') ?>
            <a href="https://www.google.com/maps/search/?api=1&query=<?= get_field('practical_address') ?>" title="<?= __('Ouvrir sur Google maps la carte de ','stla').$post->post_title;?>">
                <img src="https://maps.googleapis.com/maps/api/staticmap?markers=color:red|label:L|<?= get_field('practical_address') ?>&zoom=15&size=600x268&scale=2&key=AIzaSyDQT630KW4SabyiAeZWxylHlbPpmO9CEWU" alt="<?= __('Carte de sur google maps la carte de ','stla').$post->post_title;?>" width="600" height="268">
            </a>
        </div>
    <?php endif; ?>
</div>
<?php if ($events): ?>
    <div class="o-content-wrapper o-flex o-flex--wrap u-padding-bottom-large">
        <div class="content-wrapper--light-purple o-flex o-flex--wrap u-1/1 u-margin-vertical-large">
            <section class="events-section u-1/1@mobile u-1/1 o-flex o-flex--wrap">
                <h3 class="u-my-420 u-1/1"><?=__('Les événements qui ont lieu à cette adresse','stla');?></h3>
                    <?php foreach ($events as $event): ?>
                        <?php
                        $startdate = get_field('event_date-starting', $event->ID, false);
                        $date = new DateTime($startdate);
                        ?>
                        <article class="c-event o-flex u-margin-bottom u-1/1@mobile u-1/2@desktop">
                            <a class="o-flex" href="<?= the_permalink($event->ID); ?>">
                                <time datetime="<?= $date->format('Y-m-j'); ?>" class="c-event__date o-flex__item o-flex u-2/12@mobile o-flex--column o-flex--centered">
                                    <span class="o-flex__item"><?= $date->format('M'); ?></span>
                                    <span class="o-flex__item c-event__date-day"><?= $date->format('j'); ?></span>
                                    <span class="o-flex__item"><?= $date->format('Y'); ?></span>
                                </time>
                                <div class="o-flex o-flex--wrap u-margin-left-small">
                                    <h4 class="o-flex__item u-margin-bottom-tiny"><?= $event->post_title;?></h4>
                                    <?php $location = get_field('event_location', $event->ID);?>
                                    <?php $address = get_field('practical_address', $location->ID) ?>
                                    <?php if($address):?>
                                    <p class="o-flex__item u-margin-bottom-tiny"><?= $address;?></p>
                            <?php endif;?>
                                </div>
                            </a>
                        </article>
                    <?php endforeach; ?>
            </section>
            <a  href="<?= stla_get_page_url('archive-events.php'); ?>"
                class="cta-button c-link c-link--forward c-link--upper" title="<?= __('Consulter les autres événements','stla');?>"><?= __('Consulter les autres événements','stla');?></a>
        </div><!--END Events section-->
    </div>
<?php endif; ?>
<!--The partners list-->
<?php get_template_part('partials/content', 'partners'); ?>
<div class="site-cache" id="site-cache"></div>
<?php get_footer(); ?>
