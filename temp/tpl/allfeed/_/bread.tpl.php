<?
	$title = $param['block_heading'] != '' ? $param['block_heading'] : t($this->post['id']);
	$__prefix = $param["block_prefix"];
	$__mod = $param["block_mod"];
	$index_page_link = l(1);
?>

<div class="<?=$__prefix;?>block  <?=$__mod;?>">
	<ul class="<?=$__prefix;?>list  <?=$__mod;?>">
		<li class="<?=$__prefix;?>list-item">
			<a href="<?=$index_page_link;?>" class="<?=$__prefix;?>list-link">Главная</a>
		</li>
		<li class="<?=$__prefix;?>list-item is--active"><?=$title;?></li>
	</ul>
</div>