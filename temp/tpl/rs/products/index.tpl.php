<?
	$__prefix = $param["block_prefix"];
	$__mod = $param["block_mod"];

	$heading_prefix="page-header__";
	$heading_mod="is--heading  is--center";
	$heading = t($id);

	$__prefix_block = "products-panel__";

	$products = $this->getItems(array(
		'post_type' => 'ourproduct',
		'posts_per_page' => -1,
		'orderby' => 'date',
		'order'   => 'DESC',
	));	
?> 
<div class="content-block <?=$__prefix;?>content-block  <?=$__prefix_bg;?>block" role="main">	
	<div class="container content-block__container <?=$__prefix;?>container <?=$__prefix_bg;?>container">
		<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
			<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><span><?=$heading;?></span></h1>
		</div>

		<div class="<?=$__prefix_block;?>block">
			<div class="<?=$__prefix_block;?>row row  is--gutter  is--wrap">
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
</div>