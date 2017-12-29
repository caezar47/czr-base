<?
	$title = $param['block_heading'] != '' ? $param['block_heading'] : t($this->post['id']);
	$__prefix = $param["block_prefix"];
	$__mod = $param["block_mod"];
?>
<div class="<?=$__prefix;?>block  <?=$__mod;?>">
	<h1 class="<?=$__prefix;?>heading  <?=$__mod;?>"><?=$title;?></h1>
</div>