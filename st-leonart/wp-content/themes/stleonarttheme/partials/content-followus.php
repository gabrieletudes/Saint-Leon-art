<div class="u-1/1">
    <h4 class="c-h--white"><?=__('Suivez-nous sur','');?></h4>
    <div class="o-flex o-flex--wrap c-social-nav o-flex--lock-left">
        <?php $social_fb = get_field('contact_fb',stla_get_page_id('contact.php'));?>
        <?php if($social_fb):?>
        <a class="c-social-nav__item o-flex__item u-padding-tiny" href="<?= $social_fb?>" title="<?= __('Suivez nous sur Facebook', 'stla') ?>">
                <span class="c-social-icon c-social-icon--fab" aria-hidden="true">
                    <span class="u-hidden-visually">Facebook</span>
                </span>
        </a>
        <?php endif;?>
        <?php $social_tw = get_field('contact_tw',stla_get_page_id('contact.php'));?>
        <?php if($social_tw):?>
        <a class="c-social-nav__item o-flex__item u-padding-tiny u-margin-left" href="<?= $social_tw?>" title="<?= __('Suivez nous sur Twitter', 'stla') ?>">
                    <span class="c-social-icon c-social-icon--twtr" aria-hidden="true">
                        <span class="u-hidden-visually">Twitter</span>
                    </span>
        </a>
            <?php endif?>
        <?php $social_inst = get_field('contact_insta',stla_get_page_id('contact.php'));?>
        <?php if($social_inst):?>
        <a class="c-social-nav__item o-flex__item u-padding-tiny u-margin-left" href="<?= $social_inst?>" title="<?= __('Suivez nous sur Instagram', 'stla') ?>">
                <span class="c-social-icon c-social-icon--inst" aria-hidden="true">
                    <span class="u-hidden-visually">Instagram</span></span>
        </a>
        <?php endif;?>
    </div>
</div>
