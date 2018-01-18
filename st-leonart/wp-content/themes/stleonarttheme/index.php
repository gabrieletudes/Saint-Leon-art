<?php
get_header();
$today = date('Ymd');
$argsevent = [
    'posts_per_page' => 1,
    'post_type' => 'events',
    'meta_query' => [
        [
            'key' => 'event_date-starting',
            'compare' => '>=',
            'value' => $today,
        ],
        'relation' => 'OR',
        [
            'key' => 'event_date-ending',
            'compare' => '>=',
            'value' => $today,
        ]
    ]
];
// query
$events = new WP_Query($argsevent);
?>
<?php if ($events): ?>
    <div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap">
        <?php while ($events->have_posts()) : $events->the_post(); ?>
            <?php $locations = get_field('event_location'); ?>
            <?php
            $startdate = get_field('event_date-starting', false, false);
            $starttime = get_field('event_time-starting', false, false);
            $endingtime = get_field('event_time-ending', false, false);
            $date = new DateTime($startdate);
            $starttime = new DateTime($starttime);
            $endingtime = new DateTime($endingtime);
            ?>
            <div class="c-expointro u-padding-vertical-large u-1/2@desktop">
                <h2 class="u-my-420"><?= $post->post_title; ?></h2>
                <p class="u-my-420"><?= get_field('event_description'); ?></p>
                <?php if ($locations): ?>
                    <?php foreach ($locations as $location): ?>
                        <a class="c-event-promo o-flex o-flex--grids u-margin-top-small u-padding-small nana u-margin-left-none u-margin-bottom-small"
                           href="<?= the_permalink(); ?>">
                            <p class="c-event-promo__adress"><?= get_field('practical_address', $location->ID) ?></p>
                            <time datetime="<?= $date->format('Y-m-j'); ?>"
                                  class="c-event-promo__date u-1/2@mobile"><?= $date->format('j M Y'); ?></time>
                            <span class="c-event-promo__hour">
                    <time datetime="<?= $starttime->format('H:i'); ?>"><?= $starttime->format('H\hi'); ?></time> -
                    <time datetime="<?= $endingtime->format('H:i'); ?>"><?= $endingtime->format('H\hi'); ?></time>
                    </span>
                        </a>
                    <?php endforeach; endif; ?>
                <a href="<?= the_permalink(); ?>"
                   class="cta-button c-link c-link--forward c-link--upper u-margin-top"><?= __('Consulter l’événement', 'stla'); ?></a>
            </div><!--END-expointro-->
            <div class="u-padding-vertical-large u-1/2@desktop">
                <img src="http://fillmurray.com/462/300" alt="The image next">
            </div><!--END-image next-->
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div><!--END Content wrapper-->
<?php endif; ?>
<?php if ($artists): ?>
    <div class="o-content-wrapper c-bg-color--purple-light-20 o-flex o-flex--wrap u-padding-vertical-large c-bg-color--purple-light-40">
        <div class="o-flex u-padding-vertical-large o-flex--wrap u-1/1 u-padding-horizontal c-bg-color--shadow-white">
          <h3 class="c-h--yellow o-flex u-1/1@mobile">Nos artistes vedette</h3>
          <a href="#" class="c-artistcard u-padding-right-small u-margin-bottom-small u-1/2@mobile u-1/4@tablet u-1/4@desktop u-2/12@wide">
            <img class="c-artistcard__image u-margin-bottom-small o-flex__item" src="http://fillmurray.com/320/320" alt="there is not image yet">
            <span class="c-artistcard__name o-flex">Chaineux Jocelyne</span>
            <span class="c-artistcard__ability o-flex">Photographe, peintre figurative</span>
          </a>
          <a href="#" class="c-artistcard u-padding-right-small u-margin-bottom-small u-1/2@mobile u-1/4@tablet u-1/4@desktop u-2/12@wide">
            <img class="c-artistcard__image u-margin-bottom-small o-flex__item" src="http://fillmurray.com/320/320" alt="there is not image yet">
            <span class="c-artistcard__name o-flex">Chaineux Jocelyne</span>
            <span class="c-artistcard__ability o-flex">Photographe, peintre figurative</span>
          </a>
          <a href="#" class="c-artistcard u-padding-right-small u-margin-bottom-small u-1/2@mobile u-1/4@tablet u-1/4@desktop u-2/12@wide">
            <img class="c-artistcard__image u-margin-bottom-small o-flex__item" src="http://fillmurray.com/320/320" alt="there is not image yet">
            <span class="c-artistcard__name o-flex">Chaineux Jocelyne</span>
            <span class="c-artistcard__ability o-flex">Photographe, peintre figurative</span>
          </a>
          <a href="#" class="c-artistcard u-padding-right-small u-margin-bottom-small u-1/2@mobile u-1/4@tablet u-1/4@desktop u-2/12@wide">
            <img class="c-artistcard__image u-margin-bottom-small o-flex__item" src="http://fillmurray.com/320/320" alt="there is not image yet">
            <span class="c-artistcard__name o-flex">Chaineux Jocelyne</span>
            <span class="c-artistcard__ability o-flex">Photographe, peintre figurative</span>
          </a>
        </div><!--END-Artiste vedette-->
      </div><!--END Content wrapper-->
      <div class="o-content-wrapper--max o-flex o-flex--wrap o-flex--reversed">
        <div class="content-wrapper--light-purple o-flex o-flex--wrap u-1/1 u-2/3@desktop o-content-wrapper--padding-right u-padding-vertical-large">
          <section class="events-section u-1/1@mobile u-1/1 o-flex o-flex--wrap">
            <h3 class="u-my-420 u-1/1">NOS PROCHAINS ÉVÉNEMENTS</h3>
            <article class="c-event o-flex u-margin-bottom-small u-1/1@mobile u-1/2@desktop">
              <a class="o-flex" href="#">
                <time datetime="2017-11-03" class="c-event__date o-flex__item o-flex u-2/12@mobile o-flex--column o-flex--centered">
                  <span class="o-flex__item">oct</span>
                  <span class="o-flex__item c-event__date-day">28</span>
                  <span class="o-flex__item">2017</span>
                </time>
                <div class="o-flex o-flex--wrap u-margin-left-small">
                  <h4 class="o-flex__item u-margin-bottom-tiny">Atelier de l’artiste Musselman avec Musselman</h4>
                  <address class="o-flex__item u-margin-bottom-tiny">
                    36, Place Vivegnis 4000 Liège
                  </address>
                </div>
              </a>
            </article>
            <article class="c-event o-flex u-margin-bottom-small u-1/1@mobile u-1/2@desktop">
              <a class="o-flex" href="#">
                <time datetime="2017-11-03" class="c-event__date o-flex__item o-flex u-2/12@mobile o-flex--column o-flex--centered">
                  <span class="o-flex__item">oct</span>
                  <span class="o-flex__item c-event__date-day">28</span>
                  <span class="o-flex__item">2017</span>
                </time>
                <div class="o-flex o-flex--wrap u-margin-left-small">
                  <h4 class="o-flex__item u-margin-bottom-tiny">Atelier de l’artiste Musselman avec Musselman</h4>
                  <address class="o-flex__item u-margin-bottom-tiny">
                    36, Place Vivegnis 4000 Liège
                  </address>
                </div>
              </a>
            </article>
            <article class="c-event o-flex u-margin-bottom-small u-1/1@mobile u-1/2@desktop">
              <a class="o-flex" href="#">
                <time datetime="2017-11-03" class="c-event__date o-flex__item o-flex u-2/12@mobile o-flex--column o-flex--centered">
                  <span class="o-flex__item">oct</span>
                  <span class="o-flex__item c-event__date-day">28</span>
                  <span class="o-flex__item">2017</span>
                </time>
                <div class="o-flex o-flex--wrap u-margin-left-small">
                  <h4 class="o-flex__item u-margin-bottom-tiny">Atelier de l’artiste Musselman avec Musselman</h4>
                  <address class="o-flex__item u-margin-bottom-tiny">
                    36, Place Vivegnis 4000 Liège
                  </address>
                </div>
              </a>
            </article>
          </section>
          <a href="#" class="cta-button c-link c-link--forward c-link--upper u-margin-top-small">Consultez le programme</a>
        </div><!--END Events section-->
        <div class="section-wrapper o-wrapper o-flex o-wrapper--tiny o-flex--wrap u-1/1 u-1/3@desktop o-content-wrapper--padding-left u-padding-vertical-large c-bg-color--purple-light-05">
          <h3 class="u-1/1 c-h--white">Nos plus recent posts sur Instagram</h3>
          <div class="o-flex o-flex--wrap u-my-270">
            <a class="c-insta__element  u-padding-bottom-small u-padding-right-small" href="#">
              <img src="http://fillmurray.com/90/90" alt="Image de instagrame">
            </a>
            <a class="c-insta__element  u-padding-bottom-small u-padding-right-small" href="#">
              <img src="http://fillmurray.com/90/90" alt="Image de instagrame">
            </a>
            <a class="c-insta__element  u-padding-bottom-small u-padding-right-small" href="#">
              <img src="http://fillmurray.com/90/90" alt="Image de instagrame">
            </a>
            <a class="c-insta__element  u-padding-bottom-small u-padding-right-small" href="#">
              <img src="http://fillmurray.com/90/90" alt="Image de instagrame">
            </a>
            <a class="c-insta__element  u-padding-bottom-small u-padding-right-small" href="#">
              <img src="http://fillmurray.com/90/90" alt="Image de instagrame">
            </a>
            <a class="c-insta__element o-flex__item u-margin-bottom-small u-padding-right-small" href="#">
              <img src="http://fillmurray.com/90/90" alt="Image de instagrame">
            </a>
          </div>
          <div class="u-1/1">
            <h4 class="c-h--white">Suivez-nous sur</h4>
            <div class="o-flex o-flex--wrap c-social-nav o-flex--centered">
              <a class="c-social-nav__item u-1/4  o-flex__item" href="#">
                <span class="icon-fallback-text"><span class="c-social-icon c-social-icon--fab" aria-hidden="true">
                </span><span class="u-hidden-visually">Facebook</span>
              </a>
              <a class="c-social-nav__item u-1/4 o-flex__item" href="#">
                <span class="icon-fallback-text"><span class="c-social-icon c-social-icon--twtr" aria-hidden="true">
                </span><span class="u-hidden-visually">Twitter</span>
              </a>
              <a class="c-social-nav__item u-1/4 o-flex__item" href="#">
                <span class="icon-fallback-text"><span class="c-social-icon c-social-icon--inst" aria-hidden="true">
                </span><span class="u-hidden-visually">Instagram</span>
              </a>
              <a class="c-social-nav__item u-1/4 o-flex__item" href="#">
                <span class="icon-fallback-text"><span class="c-social-icon c-social-icon--mail" aria-hidden="true">
                </span><span class="u-hidden-visually">Mail</span>
              </a>
            </div>
          </div>
        </div><!--END Insta section-->
      </div>
      <div class="c-partner o-content-wrapper content-wrapper--light-purple o-flex o-flex--wrap u-padding-vertical-large c-bg-color--purple-light-15 o-flex--lock-left">
        <h3 class="o-flex u-1/1 c-h--white">Liste de nos partenaires</h3>
        <a class="c-partner__link u-padding-bottom-small u-padding-right-small" href="#">
          <img src="./assets/img/partners/arsenic.svg" alt="Logo de notre partenaire">
      <!--<object type="image/svg+xml" data="./src/img/logos-partners.svg#vervinckt">
          SVG n'est pas supporte sur votre navigateur, utilisez un navigateur plus rescent
      </object>-->
        </a>
        <a class="c-partner__link u-padding-bottom-small u-padding-right" href="#">
          <img src="./assets/img/partners/calg.svg" alt="Logo de notre partenaire">
        </a>
        <a class="c-partner__link u-padding-bottom-small u-padding-right" href="#">
          <img src="./assets/img/partners/cpcr.svg" alt="Logo de notre partenaire">
        </a>
        <a class="c-partner__link u-padding-bottom-small u-padding-right" href="#">
          <img src="./assets/img/partners/lehangar.svg" alt="Logo de notre partenaire">
        </a>
        <a class="c-partner__link u-padding-bottom-small u-padding-right" href="#">
          <img src="./assets/img/partners/liege.svg" alt="Logo de notre partenaire">
        </a>
        <a class="c-partner__link u-padding-bottom-small u-padding-right" href="#">
          <img src="./assets/img/partners/naos.svg" alt="Logo de notre partenaire">
        </a>
        <a class="c-partner__link u-padding-bottom-small u-padding-right" href="#">
          <img src="./assets/img/partners/pac.svg" alt="Logo de notre partenaire">
        </a>
        <a class="c-partner__link u-padding-bottom-small u-padding-right" href="#">
          <img src="./assets/img/partners/province.svg" alt="Logo de notre partenaire">
        </a>
        <a class="c-partner__link u-padding-bottom-small u-padding-right" href="#">
          <img src="./assets/img/partners/ravi.svg" alt="Logo de notre partenaire">
        </a>
        <a class="c-partner__link u-padding-bottom-small u-padding-right" href="#">
          <img src="./assets/img/partners/st-leonard.svg" alt="Logo de notre partenaire">
        </a>
        <a class="c-partner__link u-padding-bottom-small u-padding-right" href="#">
          <img src="./assets/img/partners/vervinckt.svg" alt="Logo de notre partenaire">
        </a>
      </div><!--END Partners section-->
      <div class="site-cache" id="site-cache"></div>
      <?php include('partials/footer.php')?>
