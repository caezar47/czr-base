<?
	$id = $this->post['id'];
	$__prefix="content-block__";
	$__mod="is--full";
	$heading_prefix="page-header__";
	$heading_mod="is--page-heading  is--center";
	$content_prefix="kontakty-panel__";
	$content_elem_prefix="kontakty-item__";

	$content = c($id);

	$adds = getContact('adds');
	$adds2 = getContact('adds2');
	$email = getContact('email');
	$phone = getContact('phone');
	$phone_num = phone(getContact('phone'));
	$map = getContact('map');
?>
<main class="<?=$__prefix;?>panel  <?=$__mod;?>"  role="main">
	<div class="<?=$__prefix;?>container container  <?=$__mod;?>">
		<div class="<?=$heading_prefix;?>panel  <?=$heading_mod;?>">
			<?
			// хлебные крошки первого уровня
			$this->tpl(
				'_/bread', 
				array(
					"block_prefix" => "breadcrumb__",
					"block_mod" => "is--center"
				)
			);
			// заголовок страницы		
			$this->tpl(
				'_/heading', 
				array(
					"block_prefix" => "page-header__",
					"block_mod" => "is--page-heading  is--center"
				)
			);
			?>
		</div>
		<div class="<?=$content_prefix;?>block">
			<div class="<?=$content_prefix;?>row  row  is--wrap  is--gutter  is--aic">
				<?if ($adds != ""){?>
				<div class="<?=$content_prefix;?>cols cols">
					<div class="<?=$content_prefix;?>item">
						<div class="<?=$content_elem_prefix;?>item  is--icon">
							<div class="<?=$content_elem_prefix;?>icon  is--icon">
								<svg class="icon-svg icon-contacts-address" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#contacts-address"></use></svg>
							</div>
							<span>Офис:</span> <?=$adds;?>
						</div>	
					</div>	
				</div>
				<?}?>
				<?if ($adds2 != ""){?>
				<div class="<?=$content_prefix;?>cols cols">
					<div class="<?=$content_prefix;?>item">
						<div class="<?=$content_elem_prefix;?>item  is--icon">
							<div class="<?=$content_elem_prefix;?>icon  is--icon">
								<svg class="icon-svg icon-contacts-address" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#contacts-address"></use></svg>
							</div>
							<span>Склад:</span> <?=$adds2;?>
						</div>	
					</div>	
				</div>
				<?}?>
				<?if ($email != ""){?>
				<div class="<?=$content_prefix;?>cols cols">
					<div class="<?=$content_prefix;?>item">
						<div class="<?=$content_elem_prefix;?>item  is--icon">
							<a href="mailto:<?=$email;?>" class="<?=$content_elem_prefix;?>link  is--icon">
								<div class="<?=$content_elem_prefix;?>icon  is--icon">
									<svg class="icon-svg icon-contacts-email" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#contacts-email"></use></svg>
								</div>
								<?=$email;?>
							</a>	
						</div>	
					</div>	
				</div>
				<?}?>	
				<?if ($phone != ""){?>
				<div class="<?=$content_prefix;?>cols cols">
					<div class="<?=$content_prefix;?>item">
						<div class="<?=$content_elem_prefix;?>item  is--icon">
							<a href="tel:+<?=$phone_num;?>" class="<?=$content_elem_prefix;?>link  is--icon">
								<div class="<?=$content_elem_prefix;?>icon  is--icon">
									<svg class="icon-svg icon-contacts-tel" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#contacts-tel"></use></svg>
								</div>
								<?=$phone;?>
							</a>	
						</div>	
					</div>	
				</div>
				<?}?>	
			</div>	
			<?if ($map != ""){?>
			<div class="<?=$content_prefix;?>map" id="map-google" data-map='<?=$map;?>' ></div>
			<?}?>
		</div>
	</div>
</main>