<?php
/* Template Name: photo / item - Фотографии / запись */

$b_tpl = 'photo';

the_post();
$Azbn->post['id'] = get_the_ID();
$Azbn->post['meta'] = $Azbn->getMetas($Azbn->post['id']);

$Azbn->tpl('_/header', array());
$Azbn->tpl($b_tpl.'/item', array());
$Azbn->tpl('_/footer', array());
