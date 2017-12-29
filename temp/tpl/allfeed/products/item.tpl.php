<?
	$id = $this->post['id'];
	$__prefix="content-block__";
	$__mod="is--full";

	$heading = t($id);
	$heading_prefix="page-header__";
	$heading_mod="is--page-heading  is--center";
	$bread_prefix="breadcrumb__";
	$bread_mod="is--center";

	$index_page = l(1);
	$parent_page_title = t(5);
	$parent_page_link = l(5);

	$content_prefix = "products-panel-card__";
	$content_mod ="is--card";

	$preview = $this->mdl('Imgs')->postImg($id, '493x340');
	if($preview == ""){
		$preview = "http://via.placeholder.com/493x340";
	};
	$appearance = $this->Azbn->getMeta($id, 'appearance');
	$activity = $this->Azbn->getMeta($id, 'activity');
	$composition = $this->Azbn->getMeta($id, 'composition');
	$solubility = $this->Azbn->getMeta($id, 'solubility');
	$manufacturer = $this->Azbn->getMeta($id, 'manufacturer');
	$ph = $this->Azbn->getMeta($id, 'ph');
	$application = $this->Azbn->getMeta($id, 'application');
	$scope = $this->Azbn->getMeta($id, 'scope');
	$file = get_field('file', $id);
	$short_text = $this->Azbn->getMeta($id, 'short_text');
	$note = c($id);
?>
<main class="<?=$__prefix;?>panel  <?=$__mod;?>"  role="main">
	<div class="<?=$__prefix;?>container container  <?=$__mod;?>">
		<div class="<?=$__prefix;?>elem">
			<div class="text__container <?=$content_prefix;?>block">
				<div class="text__inner">					
					<div class="<?=$heading_prefix;?>panel  <?=$heading_mod;?>">
						<div class="<?=$bread_prefix;?>block  <?=$bread_mod;?>">
							<ul class="<?=$bread_prefix;?>list  <?=$bread_mod;?>">
								<li class="<?=$bread_prefix;?>list-item">
									<a href="<?=$index_page;?>" class="<?=$bread_prefix;?>list-link">Главная</a>
								</li>
								<li class="<?=$bread_prefix;?>list-item">
									<a href="<?=$parent_page_link;?>" class="<?=$bread_prefix;?>list-link"><?=$parent_page_title;?></a>
								</li>
								<?
								$categories = get_the_terms($id, 'ourproducts-categories');			
								if(count($categories)) {
									foreach($categories as $cat) {
										$link = get_category_link($cat->term_id);
								?>					
									<li class="<?=$bread_prefix;?>list-item"><a href="<?=$link;?>" class="<?=$bread_prefix;?>list-link"><?=$cat->name;?></a></li>
								<?
									}
								}
								?>
								<li class="<?=$bread_prefix;?>list-item is--active">
									<span class="<?=$bread_prefix;?>list-link"><?=$heading;?></span>
								</li>
							</ul>
						</div>		
						<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
							<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><?=$heading;?></h1>		
						</div> 
					</div>
					<div class="<?=$content_prefix;?>desc-panel">
						<div class="<?=$content_prefix;?>row row  is--gutter  is--wrap">
							<div class="<?=$content_prefix;?>cols cols  is--cols-6  is--preview">
								<img src="<?=$preview;?>" alt="<?=$heading;?>">
							</div>
							<div class="<?=$content_prefix;?>cols cols  is--cols-6  is--note">
								<h3 class="<?=$content_prefix;?>heading">Описание</h3>
								<div class="<?=$content_prefix;?>desc">
									<?if($short_text != ""){?>
									<div class="<?=$content_prefix;?>desc-elem"><?=$short_text;?></div>
									<?}?>
									<?if($application != ""){?>
									<div class="<?=$content_prefix;?>desc-elem">
										<span>Применение:</span> <?=$application;?>
									</div>
									<?}?>
									<?if($appearance != ""){?>
									<div class="<?=$content_prefix;?>desc-elem">
										<span>Внешний вид:</span> <?=$appearance;?>
									</div>
									<?}?>
									<?if($activity != ""){?>
									<div class="<?=$content_prefix;?>desc-elem">
										<span>Активность:</span> <?=$activity;?>
									</div>
									<?}?>
									<?if($density != ""){?>
									<div class="<?=$content_prefix;?>desc-elem">
										<span>Плотность:</span> <?=$density;?>
									</div>
									<?}?>
									<?if($composition != ""){?>
									<div class="<?=$content_prefix;?>desc-elem">
										<span>Состав:</span> <?=$composition;?>
									</div>
									<?}?>
									<?if($scope != ""){?>
									<div class="<?=$content_prefix;?>desc-elem">
										<span>Объём:</span> <?=$scope;?>
									</div>
									<?}?>
									<?if($solubility != ""){?>
									<div class="<?=$content_prefix;?>desc-elem">
										<span>Растворимость:</span> <?=$solubility;?>
									</div>
									<?}?>
									<?if($ph != ""){?>
									<div class="<?=$content_prefix;?>desc-elem">
										<span>pH:</span> <?=$ph;?>
									</div>
									<?}?>
									<?if($manufacturer != ""){?>
									<div class="<?=$content_prefix;?>desc-elem">
										<span>Производитель:</span> <?=$manufacturer;?>
									</div>
									<?}?>
								</div>
								<?if($file != ""){?>
								<a href="<?=$file;?>" target="_blank" class="btn-link__item  is--icon">
									<span class="btn-link__icon  is--icon">
										<svg class="icon-svg icon-icon-download" role="img">
											<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?=$this->path('img');?>/svg/sprite.svg#icon-download"></use>
										</svg>
									</span>
									<span class="btn-link__name  is--icon">Скачать описание</span>
								</a>
								<?}?>
							</div>
						</div>
					</div>
					<?if($note != ""){?>
					<div class="text__block <?=$content_prefix;?>text  <?=$content_mod;?>">
						<?=$note;?>
					</div>
					<?}?>
					
				</div>
				<?
					$form_id = 129;
					$form_heading = $this->Azbn->getMeta($form_id, 'form_heading');
					$form_heading_small = $this->Azbn->getMeta($form_id, 'form_heading_small');
					$form_btn_name = $this->Azbn->getMeta($form_id, 'form_btn_name');
					$this->tpl(
						'_/form/panel', 
						array(
							"block_tpl" => "order-product",
							"block_prefix" => "form-panel__",
							"block_mod" => "",
							"block_heading" => $form_heading,
							"block_heading_small" => $form_heading_small,
							"block_form_heading" => $form_heading,
							"block_form_product" => $heading,
							"block_form_prefix" => "form__",
							"block_form_mod" => "is--inline",
							"block_form_color" => "is--white",
							"block_form_id" => "fsp",
							"block_btn_name" => $form_btn_name,
							"block_btn_mod" => "is--block  is--white",
						)
					);
				?>
			</div>	
		</div>
	</div>
</main>