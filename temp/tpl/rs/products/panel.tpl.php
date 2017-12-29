<?
	$__prefix = $param["block_prefix"];
	$__mod = $param["block_mod"];
	$__heading_mod = $param["block_heading_mod"];

	$products = get_field("products", $id);
	$products_heading = get_field("products_heading", $id);
?>
<div class="<?=$__prefix;?>block  <?=$__mod;?>">
	<div class="<?=$__prefix;?>container container">
		<div class="page-header__block  <?=$__heading_mod;?>">
			<h2 class="page-header__heading  <?=$__heading_mod;?>"><span><?=$products_heading;?></span></h2>		
		</div>
		<div class="<?=$__prefix;?>row row  is--gutter  is--wrap  <?=$__mod;?>">
			<?				
				foreach($products as $id) {
					$title = t($id);
					$link = l($id);
					$title_small = get_field("title_small", $id);
					$form = get_field("form", $id);

					$preview = $this->Imgs->postImg($id, '495x400');
			?>	
			<div class="<?=$__prefix;?>cols cols  is--cols-screen-4  is--cols-sm-4">
				<div class="products-card__item">
					<a href="<?=$link;?>" class="products-card__preview">
						<img src="<?=$preview;?>" alt="<?=$title;?>" class="img-responsive">
					</a>	
					<h3 class="products-card__heading">
						<a href="<?=$link;?>"><?=$title;?></a>
					</h3>
					<?if ($title_small != ""){?>		
					<div class="products-card__heading-small"><?=$title_small;?></div>
					<?}?>	
					<?if ($form != ""){?>
					<div class="products-card__note"><span>Форма выпуска:</span> <?=$form;?></div>
					<?}?>
					<div class="products-card__btn">
						<button type="button" class="btn__item" data-toggle="modal" data-target="#modal-order" data-heading="<?=$title;?>"><span>Заказать крем</span></button>
					</div>
				</div>
			</div>
			<?}?>
		</div>
	</div>
</div>