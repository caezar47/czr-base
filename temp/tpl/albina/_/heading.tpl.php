<?
$title = $param['page']['text'] != '' ? $param['page']['text'] : t($this->post['id']);
?>

<div class="<?=$param["block_prefix"];?>block  <?=$param["block_mod"];?>">
	<h1 class="<?=$param["block_prefix"];?>heading  <?=$param["block_mod"];?>"><span><?=$title;?></span></h1>
</div>