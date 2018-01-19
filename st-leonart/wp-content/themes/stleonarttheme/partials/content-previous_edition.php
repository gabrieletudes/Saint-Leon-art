<?php $eventspageID = stla_get_page_id('archive-events.php');?>
<div class="u-5/12@desktop">
    <h2 class="u-my-420"><?=__('L’edition ','stla'), get_field( 'previous_year',$eventspageID);?></h2>
    <dl class="o-flex u-1/1@desktop u-7/12@wide u-margin-bottom-none">
        <div class="c-event-last o-flex o-flex--wrap-reverse u-1/3">
            <dt class="c-event-last__data o-flex o-flex--centered o-flex__item u-1/1"><?=__('Participants','stla');?></dt>
            <dd class="c-event-last__desc o-flex o-flex--centered o-flex__item u-1/1 u-margin-none"><?= get_field( 'previous_participants',$eventspageID);?></dd>
        </div>
        <div class="c-event-last o-flex o-flex--wrap-reverse u-1/3">
            <dt class="c-event-last__data o-flex o-flex--centered o-flex__item u-1/1"><?=__('Artistes','stla');?></dt>
            <dd class="c-event-last__desc o-flex o-flex--centered o-flex__item u-1/1 u-margin-none"><?= get_field( 'previous_artists',$eventspageID);?></dd>
        </div>
        <div class="c-event-last o-flex o-flex--wrap-reverse u-1/3">
            <dt class="c-event-last__data o-flex o-flex--centered o-flex__item u-1/1"><?=__('Événements','stla');?></dt>
            <dd class="c-event-last__desc o-flex o-flex--centered o-flex__item u-1/1 u-margin-none"><?= get_field( 'previous_events',$eventspageID);?></dd>
        </div>
    </dl>
</div>