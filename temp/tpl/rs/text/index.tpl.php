<?
	$__prefix_bg="bg-block__";
	$__prefix="text-page__";
	$heading_prefix="page-header__";
	$heading_mod="is--heading  is--center";
	$content = c($this->post['id']);
?>
<div class="content-block <?=$__prefix;?>content-block  <?=$__prefix_bg;?>block" role="main">	
	<div class="container content-block__container <?=$__prefix;?>container <?=$__prefix_bg;?>container">
		<div class="text__container">
			<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
				<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><span><?=t();?></span></h1>
			</div>
			<div class="text__block">
				<?=$content;?>
			</div>
		</div>
	</div>
</div>