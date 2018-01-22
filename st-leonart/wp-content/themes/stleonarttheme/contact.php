<?php
/*
Template name: Page Contact
*/
get_header();
?>
<div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-bottom u-padding-top-large">
  <div class="o-flex u-1/1 c-bg-color--shadow-white o-flex--wrap">
    <div class="o-layout__item  u-1/1@mobile u-1/2@tablet u-1/2@desktop u-padding-vertical u-padding-horizontal o-flex__item c-bg-color--purple">
      <h4 class="u-margin-bottom-small c-h--white"><?=__('Nos informations de contact','stla');?></h4>
      <ul class="o-list-bare">
        <li><?= get_field('contact_address')?></li>
          <?php $number = get_field('contact_phone')?>
          <?php if ($number):?>
        <li><a class="c-link--yellow c-link--underlined" href="<?= 'tel:' . str_replace(' ', '', $number) ?>"><?= $number?></a></li>
       <?php endif;?>
          <?php $email = get_field('contact_email');?>
          <?php if ($email):?>
        <li><a class="c-link--yellow c-link--underlined" href="<?= 'mailto:' . $email ?>"><?= $email?></a></li>
          <?php endif;?>
      </ul>
      <div class="u-1/1">
        <h4 class="c-h--white">Suivez-nous sur</h4>
        <div class="o-flex o-flex--wrap c-social-nav o-flex--centered">
          <a class="c-social-nav__item u-1/4  o-flex__item" href="#">
            <span class="icon-fallback-text"><span class="c-social-icon c-social-icon--fab" aria-hidden="true">
            </span><span class="u-hidden-visually">Facebook</span>
          </span></a>
          <a class="c-social-nav__item u-1/4 o-flex__item" href="#">
            <span class="icon-fallback-text"><span class="c-social-icon c-social-icon--twtr" aria-hidden="true">
            </span><span class="u-hidden-visually">Twitter</span>
          </span></a>
          <a class="c-social-nav__item u-1/4 o-flex__item" href="#">
            <span class="icon-fallback-text"><span class="c-social-icon c-social-icon--inst" aria-hidden="true">
            </span><span class="u-hidden-visually">Instagram</span>
          </span></a>
          <a class="c-social-nav__item u-1/4 o-flex__item" href="#">
            <span class="icon-fallback-text"><span class="c-social-icon c-social-icon--mail" aria-hidden="true">
            </span><span class="u-hidden-visually">Mail</span>
          </span></a>
        </div>
      </div>
    </div>
    <div class="o-layout__item  u-1/1@mobile u-1/2@tablet u-1/2@desktop u-padding u-padding-bottom o-flex__item">
      <h2>Une question ou une sugestion ?</h2>
      <form class="c-contact__form u-margin-top o-flex o-flex--wrap u-1/1@tablet u-11/12@desktop" method="POST" name="contact_form" action="#">
        <main class="c-contact__main u-margin-bottom u-1/1">
          <div class="c-contact__group u-margin-top">
            <input class="c-contact__input u-padding-vertical-small" type="text" name="input_nom" placeholder="John Doe" required>
            <label class="c-contact__label">Nom et prenom *</label>
            <span class="c-contact__bar"></span>
          </div>
          <div class="c-contact__group u-margin-top">
            <input class="c-contact__input u-padding-vertical-small" type="email" name="input_email" placeholder="ex john@doe.com" required>
            <label class="c-contact__label">Email *</label>
            <span class="c-contact__bar"></span>
          </div>
          <div class="c-contact__group u-margin-top c-contact__group--error">
            <input class="c-contact__input u-padding-vertical-small" type="text" name="input_subject" required>
            <label class="c-contact__label">Quelle est le sujet ?*</label>
            <div class="c-contact__bar"></div>
            <span class="c-contact__error u-margin-bottom-large">Le champ est requis</span>
          </div>
          <div class="c-contact__group u-margin-top">
            <textarea class="c-contact__textarea u-padding-vertical-small" id="input_message" rows="3" name="input_message" placeholder="Ecrivez ici votre message…" required></textarea>
            <label class="c-contact__label" for="input_message">Quelle est votre message?*</label>
            <div class="c-contact__bar"></div>
          </div>
        </main>
        <div class="u-1/1">
          <button class="o-flex o-flex--centered-v c-btn c-btn--submit c-btn--small c-btn--primary" type="button" name="btn_signin">Envoyer le message</button>
        </div>
      </form>
    </div>
  </div>
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
