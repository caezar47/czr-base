<?
	$__prefix_bg="bg-block__";
	$__prefix="products-page__";
	$heading_prefix="page-header__";
	$heading_mod="is--heading  is--center";
	$id = $this->post['id'];
	$heading = t($id);
	$__prefix_block = "products-card-panel__";


	$preview_get = get_field('preview_full', $id);
	$preview = $this->Imgs->rawImg($preview_get, '765x565');
	if($preview == ""){
		$preview = "http://via.placeholder.com/765x565";
	};

	$title_small = get_field('title_small', $id);
	$application = get_field('application', $id);
	$distributor = get_field('distributor', $id);
	$life = get_field('life', $id);
	$form = get_field('form', $id);
	$note = c($id);
	$component = get_field('component', $id);
	$analysis = get_field('analysis', $id);
?>
<div class="content-block <?=$__prefix;?>content-block  <?=$__prefix_bg;?>block" role="main">	
	<div class="container content-block__container <?=$__prefix;?>container <?=$__prefix_bg;?>container">
		<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
			<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><span><?=$heading?></span></h1>
		</div>
		<div class="<?=$__prefix_block;?>block">
			<div class="<?=$__prefix_block;?>decs">
				<div class="<?=$__prefix_block;?>row row  is--gutter  is--wrap  is--aic">
					<div class="<?=$__prefix_block;?>cols cols  is--cols-screen-6  is--cols-sm-6  is--cols-xs-l-6">						
						<picture class="<?=$__prefix_block;?>preview-picture"> 
							<img src="<?=$preview;?>" alt="<?=$heading?>">
						</picture>
					</div>
					<div class="<?=$__prefix_block;?>cols cols  is--cols-screen-6  is--cols-sm-12">
						<div class="<?=$__prefix_block;?>text-block">
							<?if($title_small != ""){?>
							<h4 class="<?=$__prefix_block;?>heading-small"><?=$title_small;?></h4> 
							<?}?> 
							<div class="<?=$__prefix_block;?>text-decs-panel">
								<?if($application != ""){?>
								<div class="<?=$__prefix_block;?>text-decs">
									<p class="is--color-blue">Применение:</p>
									<p><?=$application;?></p>
								</div>
								<?}?>
								<?if($distributor != ""){?>
								<div class="<?=$__prefix_block;?>text-decs">
									<p class="is--color-blue">Генеральный дистрибьютор:</p>
									<p><?=$distributor;?></p>
								</div>
								<?}?>
								<?if($form != ""){?>
								<div class="<?=$__prefix_block;?>text-decs">
									<p><span class="is--color-blue">Форма выпуска:</span> <?=$form;?></p>
								</div>
								<?}?>
								<?if($life != ""){?>
								<div class="<?=$__prefix_block;?>text-decs">
									<p><span class="is--color-blue">Срок годности:</span> <?=$life;?></p>
								</div>	
								<?}?>				
							</div>					
							<div class="<?=$__prefix_block;?>btn">
								<button type="button" class="btn__item is--sm" data-toggle="modal" data-target="#modal-order"><span>Заказать крем</span></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="products-card-panel__note <?=$__prefix_bg;?>block">
		<?
			//фоновые картинки
			$this->tpl(
				'_/bg', 
				array(
					"block_prefix" => "bg-block__",
					"block_mod" => "is--r  is--text",
					"block_bg" => "bg-r.png",
				)
			);
			$this->tpl(
				'_/bg', 
				array(
					"block_prefix" => "bg-block__",
					"block_mod" => "is--s  is--text",
					"block_bg" => "bg-s.png",
				)
			);
		?>
		<div class="products-card-panel__note-container <?=$__prefix_bg;?>container">
			<?if($note != ""){?>
			<div class="products-card-panel__note-item">
				<h3 class="products-card-panel__note-heading">Описание</h3>	
				<div class="text__block">
					<?=$note;?>
				</div>
			</div>
			<?}?>
			<?if($component != "") {?>
			<div class="products-card-panel__note-item">
				<h3 class="products-card-panel__note-heading">Основные компоненты</h3>
				<div class="products-card-panel__component">
					<div class="products-card-panel__component-row  row  is--wrap  is--gutter">
						<?				
						foreach($component as $id) {
							$heading = t($id);
							$note = c($id);
							$preview = $this->Imgs->postImg($id, '100x75');
							if ($preview == ""){
								$preview = 'http://via.placeholder.com/100x75';
							}
						?>	
						<div class="products-card-panel__component-cols  cols  is--cols-screen-6">
							<div class="products-component-card__item">
								<div class="products-component-card__row row  is--gutter15">
									<div class="products-component-card__cols  cols  is--preview">
										<img src="<?=$preview;?>" alt="<?=$heading;?>">
									</div>
									<div class="products-component-card__cols  cols  is--note">
										<div class="products-component-card__note">
											<h4 class="products-component-card__heading"><?=$heading;?></h4>
											<div class="products-component-card__text"><?=$note;?></div>
										</div>
									</div>
								</div>
							</div>	
						</div>
						<? } ?>
					</div>
				</div>
			</div>
			<?}?>
			<?if($analysis != "") {?>
			<div class="products-card-panel__note-item">
				<h3 class="products-card-panel__note-heading">Анализ крема</h3>	
				<div class="text__block">
					<?=$analysis;?>
				</div>
			</div>
			<?}?>
		</div>
	</div>
</div>