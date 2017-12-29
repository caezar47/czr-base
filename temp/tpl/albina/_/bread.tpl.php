<?
$title = $param['page']['text'] != '' ? $param['page']['text'] : t($this->post['id']);
?>

<div class="<?=$param["block_prefix"];?>block  <?=$param["block_mod"];?>">
	<ul class="<?=$param["block_prefix"];?>list  <?=$param["block_mod"];?>">
		<li class="<?=$param["block_prefix"];?>list-item">
			<a href="<?=l(1);?>" class="<?=$param["block_prefix"];?>list-link">Главная</a>
		</li>
		<li class="<?=$param["block_prefix"];?>list-item is--active"><?=$title;?></li>
	</ul>
</div>