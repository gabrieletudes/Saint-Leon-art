<?php include('partials/header.php')?>
<div class="o-content-wrapper o-content-wrapper--max o-flex o-flex--wrap u-padding-top-small">
  <div role="navigation" aria-label="menu pour les expositions" class="o-wrapper--small c-bg-color--purple u-1/1">
    <ul role="menubar" class="c-nav-event o-flex u-1/1 u-margin-vertical-small u-margin-horizontal-none o-flex--space-between o-flex--wrap">
      <li role="menuitem" tabindex="0" class="o-flex__item c-nav-event__li">
        <a href="#" aria-haspopup="true" class="c-nav-event__option c-nav-event__option--icon-down u-padding-small">Ordre</a>
        <ul role="menu" tabindex="-1" aria-hidden="true" aria-label="submenu" class="c-nav-event__drop-menu c-nav-event__drop-menu--left u-margin-none o-flex o-flex--wrap">
          <li role="menuitem" tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Thematique</a></li>
          <li role="menuitem" tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Chronologique</a></li>
        </ul>
      </li>
      <li role="menuitem" tabindex="0" class="o-flex__item c-nav-event__li">organizer par<a aria-haspopup="true" class="c-nav-event__option c-nav-event__option--icon-down u-padding-small">type</a>
        <ul role="menu" aria-hidden="true" aria-label="submenu" class="c-nav-event__drop-menu c-nav-event__drop-menu--right u-margin-none o-flex o-flex--wrap">
          <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Expositions</a></li>
          <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Concerts</a></li>
          <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Spectacles</a></li>
          <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Parcours Artistiques</a></li>
          <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Concerts</a></li>
          <li tabindex="-1" class="o-flex u-1/1"><a class="u-1/1 u-padding-small" href="#">Oeuvres Urbaines</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="o-content--wrapper u-padding-vertical-large o-flex o-flex--wrap u-1/1">
    <div class="u-7/12@desktop u-padding-right">
      <h2 class="u-my-420">Programme</h2>
      <p class="u-my-420">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est eopksio laborum. Sed ut perspiciatis unde omnis istpoe natus error sit voluptatem.</p>
    </div>
    <div class="u-5/12@desktop">
      <h2 class="u-my-420">L'edition précédente</h2>
      <dl class="o-flex u-1/1@desktop u-7/12@wide u-margin-bottom-none">
        <div class="c-event-last o-flex o-flex--wrap-reverse u-1/3">
          <dt class="c-event-last__data o-flex o-flex--centered o-flex__item u-1/1">Participants</dt>
          <dd class="c-event-last__desc o-flex o-flex--centered o-flex__item u-1/1 u-margin-none">3000</dd>
        </div>
        <div class="c-event-last o-flex o-flex--wrap-reverse u-1/3">
          <dt class="c-event-last__data o-flex o-flex--centered o-flex__item u-1/1">Artistes</dt>
          <dd class="c-event-last__desc o-flex o-flex--centered o-flex__item u-1/1 u-margin-none">1000</dd>
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
      <h3 class="c-h--purple o-flex o-flex--centered-v">Nos <span class="u-hidden-visually">Expositions</span></h3>
      <select class="c-h c-event-type u-margin-bottom">
        <option class="c-event-type__elmnt" value="expositions">Expositions</option>
        <option class="c-event-type__elmnt" value="concerts">Concerts</option>
        <option class="c-event-type__elmnt" value="spectacles">Spectacles</option>
        <option class="c-event-type__elmnt" value="parcours-artistiques">Parcours Artistiques</option>
      </select>
    </div>
    <article class="c-event o-flex u-margin-bottom-small u-1/1@mobile u-1/2@tablet u-1/2@desktop u-4/12@wide">
      <a class="o-flex u-11/12@desktop u-1/1@wide" href="#">
        <div class="c-insta__element u-padding-bottom-small u-padding-right-small">
          <img src="http://fillmurray.com/90/90" alt="Image de l'evenemnt">
        </div>
        <div class="o-flex o-flex--wrap u-margin-right-small">
          <h4 class="o-flex__item u-margin-bottom-tiny">Atelier de l’artiste Musselman avec Musselman</h4>
          <address class="o-flex__item u-margin-bottom-tiny">
            36, Place Vivegnis 4000 Liège
          </address>
        </div>
      </a>
    </article>
    <article class="c-event o-flex u-margin-bottom-small u-1/1@mobile u-1/2@tablet u-1/2@desktop u-4/12@wide">
      <a class="o-flex u-11/12@desktop u-1/1@wide" href="#">
        <div class="c-insta__element u-padding-bottom-small u-padding-right-small">
          <img src="http://fillmurray.com/90/90" alt="Image de l'evenemnt">
        </div>
        <div class="o-flex o-flex--wrap u-margin-right-small">
          <h4 class="o-flex__item u-margin-bottom-tiny">Atelier de l’artiste Musselman avec Musselman</h4>
          <address class="o-flex__item u-margin-bottom-tiny">
            36, Place Vivegnis 4000 Liège
          </address>
        </div>
      </a>
    </article>
    <article class="c-event o-flex u-margin-bottom-small u-1/1@mobile u-1/2@tablet u-1/2@desktop u-4/12@wide">
      <a class="o-flex u-11/12@desktop u-1/1@wide" href="#">
        <div class="c-insta__element u-padding-bottom-small u-padding-right-small">
          <img src="http://fillmurray.com/90/90" alt="Image de l'evenemnt">
        </div>
        <div class="o-flex o-flex--wrap u-margin-right-small">
          <h4 class="o-flex__item u-margin-bottom-tiny">Atelier de l’artiste Musselman avec Musselman</h4>
          <address class="o-flex__item u-margin-bottom-tiny">
            36, Place Vivegnis 4000 Liège
          </address>
        </div>
      </a>
    </article>
    <article class="c-event o-flex u-margin-bottom-small u-1/1@mobile u-1/2@tablet u-1/2@desktop u-4/12@wide">
      <a class="o-flex u-11/12@desktop u-1/1@wide" href="#">
        <div class="c-insta__element  u-padding-bottom-small u-padding-right-small">
          <img src="http://fillmurray.com/90/90" alt="Image de l'evenemnt">
        </div>
        <div class="o-flex o-flex--wrap u-margin-right-small">
          <h4 class="o-flex__item u-margin-bottom-tiny">Atelier de l’artiste Musselman avec Musselman</h4>
          <address class="o-flex__item u-margin-bottom-tiny">
            36, Place Vivegnis 4000 Liège
          </address>
        </div>
      </a>
    </article>
    <article class="c-event o-flex u-margin-bottom-small u-1/1@mobile u-1/2@tablet u-1/2@desktop u-4/12@wide">
      <a class="o-flex u-11/12@desktop u-1/1@wide" href="#">
        <div class="c-insta__element  u-padding-bottom-small u-padding-right-small">
          <img src="http://fillmurray.com/90/90" alt="Image de l'evenemnt">
        </div>
        <div class="o-flex o-flex--wrap u-margin-right-small">
          <h4 class="o-flex__item u-margin-bottom-tiny">Atelier de l’artiste Musselman avec Musselman</h4>
          <address class="o-flex__item u-margin-bottom-tiny">
            36, Place Vivegnis 4000 Liège
          </address>
        </div>
      </a>
    </article>
  </section>
</div><!--END Content wrapper-->
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
