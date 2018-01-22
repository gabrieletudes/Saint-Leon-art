<?php if( have_rows('partners_information',182) ): ?>
<div class="c-partner o-content-wrapper content-wrapper--light-purple o-flex o-flex--wrap u-padding-vertical-large c-bg-color--purple-light-15 o-flex--lock-left">
    <h3 class="o-flex u-1/1 c-h--white"><?=__('Liste de nos partenaires','stla');?></h3>
    <?php // loop through the rows of data
    while ( have_rows('partners_information',182) ) : the_row(); ?>
       <?php $image  = get_sub_field('partner_logo')?>
        <?php $link  = get_sub_field('partner_link')?>
    <a class="c-partner__link u-margin-bottom-small u-margin-right-small" href="<?= $link?>" title="<?=__('Visiter le site de ','stla').$image['alt'];?>">
        <img src="<?=$image['url'];?>" alt="<?=$image['alt'];?>">
    </a>
        <?php endwhile;?>
</div><!--END Partners section-->
<?php endif;?>
