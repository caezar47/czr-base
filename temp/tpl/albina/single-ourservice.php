<?php
/* Template Name: service / item - Услуги / запись */

$b_tpl = 'services';

//the_post();
$Azbn->entity = $Azbn->getEntity();
$Azbn->post['id'] = &$Azbn->entity->ID;
//$Azbn->entity_meta = $Azbn->getMetas($Azbn->post['id']);
//$Azbn->post['meta'] = &$Azbn->entity_meta;

$Azbn->tpl('_/header', array());
$Azbn->tpl($b_tpl.'/item', array());
$Azbn->tpl('_/footer', array()); 