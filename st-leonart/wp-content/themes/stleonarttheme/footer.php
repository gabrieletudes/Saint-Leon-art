<div class="">
  <footer class="c-footer o-content-wrapper u-padding-vertical-large c-bg-color--purple">
      <div class="o-flex o-flex--wrap">
        <div class="o-layout__item  u-1/1@mobile u-3/12@desktop o-flex o-flex--wrap u-padding-right-small o-flex__item u-margin-bottom">
          <h3 class="u-hidden-visually c-h--white">Footer</h3>
          <a href="#" class="o-flex o-flex--lock-left u-margin-bottom"><img class="o-flex--lock-left" src="<?php theme_asset('/img/logo.svg')?>" alt="Logo" width="62" height="49"></a>
            <p>
            <?php stla_the_excerpt(135,stla_get_page_id('page-about.php'),'page_introduction')?>
            </p>
            <!--Follow us-->
            <?php get_template_part('partials/content', 'followus'); ?>
      </div>
        <div class="o-layout__item  u-1/1@mobile u-4/12@tablet u-2/12@desktop u-padding-right-small o-flex__item">
          <h4 class="u-margin-bottom-small c-h--white"><?=__('Menu','stla')?></h4>
          <ul class="o-list-bare">
              <?php foreach (stla_get_nav_items('header') as $item): ?>
            <li><a class="c-link--yellow c-link--underlined" href="<?= $item->url?>"><?= $item->label;?></a></li>
              <?php endforeach;?>
          </ul>
        </div>
        <div class="o-layout__item  u-1/1@mobile u-6/12@tablet u-3/12@desktop u-padding-right-small o-flex__item">
          <h4 class="u-margin-bottom-small c-h--white"><?=__('Contactez-nous','stla');?></h4>
          <ul class="o-list-bare">
            <li><?= get_field('contact_address', stla_get_page_id('contact.php'))?></li>
              <?php $number = get_field('contact_phone',stla_get_page_id('contact.php'))?>
              <?php if ($number):?>
            <li><a class="c-link--yellow c-link--underlined" href="<?= 'tel:' . str_replace(' ', '', $number) ?>"><?= $number?></a></li>
              <?php endif;?>
              <?php $email = get_field('contact_email',stla_get_page_id('contact.php'));?>
              <?php if ($email):?>
            <li><a class="c-link--yellow c-link--underlined" href="<?= 'mailto:' . $email ?>"><?= $email?></a></li>
              <?php endif;?>
          </ul>
        </div>
        <div class="c-newsletter o-layout__item  u-1/1@mobile u-3/4@tablet u-4/12@desktop c-bg-color--shadow-white u-padding u-padding-bottom-large o-flex o-flex--wrap">
          <h4 class="c-h--purple"><?= __('NEWSLETTER','stla');?></h4>
          <p class="c-h--purple u-1/1"><?= __('Abonnez-vous à notre newsletter pour rester informé de nos derniers événements');?></p>
        <!--<form action="" class="c-newsletter-form o-flex o-flex--wrap">
          <input class="c-newsletter-form__input u-padding-small" type="text" name="" placeholder="marco.polo@email.com" value="">
          <button class="o-flex o-flex--centered-v c-btn c-btn--submit c-btn--small c-btn--primary" type="submit" name=""><?=__('Souscrir','stla');?></button>
        </form>-->
            <div class="c-newsletter-form o-flex o-flex--wrap">
            <?= do_shortcode('[mc4wp_form id="220"]')?>
            </div>
        </div>
      </div>
    </footer>
    <p class=" u-hidden-visuallyo-content-wrapper u-padding-vertical-small u-margin-bottom-none c-bg-color--purple-light-10 o-flex o-flex--wrap o-flex--centered">
      <small class="o-flex__item u-margin-right u-margin-right@mobile-none"><?= __('Copyright © 2017 Saint Leon’art. Tous droits réservés.','stla');?></small>
      <small class="o-flex__item"><?=__('Crafted with ','stla');?><span class="c-footer__icon--heart"><?=__('love','stla');?></span><?= __(' by ','stla');?><a class="c-footer__maker-link c-link--underlined" href="http://martinz.be">MARTINZ</a></small>
    </p>
  </div>
</div><!--END Site Pusher-->
</div><!--END Hidder-->
<script type="text/javascript" src="<?php theme_asset('/js/jquery-2.2.1.min.js');?>"></script>
<script type="text/javascript" src="<?php theme_asset('/js/script.js');?>"></script>
</body>
</html>
