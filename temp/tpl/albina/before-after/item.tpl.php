<?
	$bg_prefix="bg-block__";
	$block_prefix = "before-after-page__";
	$breadcrumb_prefix = "breadcrumb__";
	$breadcrumb_mod="is--heading  is--center";
	$heading_prefix="page-header__";
	$heading_mod="is--heading  is--center";

	$gallery = get_field("before_after_gallery", $id);
	$gallery_twentytwenty = get_field("before_after_gallery_twentytwenty", $id);
?>
<div class="content-block <?=$block_prefix;?>content-block  <?=$bg_prefix;?>block" role="main">	
	<div class="container content-block__container <?=$block_prefix;?>container <?=$bg_prefix;?>container">
		<div class="<?=$breadcrumb_prefix;?>block  <?=$breadcrumb_mod;?>">
			<ul class="<?=$breadcrumb_prefix;?>list  <?=$breadcrumb_mod;?>">
				<li class="<?=$breadcrumb_prefix;?>list-item">
					<a href="<?=l(1);?>" class="<?=$breadcrumb_prefix;?>list-link">Главная</a>
				</li>
				<li class="<?=$breadcrumb_prefix;?>list-item">
					<a href="<?=l(10);?>" class="<?=$breadcrumb_prefix;?>list-link"><?=t(10);?></a>
				</li>
				<li class="<?=$breadcrumb_prefix;?>list-item is--active"><?=t();?></li>
			</ul>
		</div>
		<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
			<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><span><?=t();?></span></h1>
		</div> 
		<div class="before-after-panel-card__block">
			<? if(count($gallery_twentytwenty)) {?>
			<div class="before-after-panel-card__row row  is--wrap  is--gutter  is--jcc  is--twentytwenty">
				<?		
				foreach($gallery_twentytwenty as $id) {
					$preview_before_get = get_field("preview_before", $id);

					$preview_after = $this->Imgs->postImg($id, '520x330');
					$preview_before = $this->Imgs->rawImg($preview_before_get, '520x330');
				?>	
				<div class="before-after-panel-card__cols cols  is--cols-4  is--twentytwenty">
					<div class="twentytwenty-container">
						<img src="<?=$preview_before;?>" alt="">
						<img src="<?=$preview_after;?>" alt="">
					</div>
				</div>
				<? } ?>
			</div> 
			<? } ?>
			<? if(count($gallery)) {?>
			<div class="before-after-panel-card__row row  is--wrap  is--gutter">
				<?		
				foreach($gallery as $id) {
					$preview = $this->Imgs->rawImg($id, '385x385');
					$preview_full = $this->Imgs->rawImg($id, 'fancybox_full');
				?>	
				<div class="before-after-panel-card__cols cols  is--cols-screen-3  is--cols-sm-6  is--cols-sm-l-3  is--cols-xs-l-6">
					<a href="<?=$preview_full;?>" data-fancybox="gallery"><img src="<?=$preview;?>" alt=""></a>
				</div>
				<? } ?>
			</div>
			<? } ?>
		</div>
	</div>
</div>