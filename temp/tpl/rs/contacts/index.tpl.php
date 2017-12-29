<?
	$__prefix = "contacts-panel__";
	$__mod = "is--panel";
	$__heading_mod = "is--heading  is--center  is--contacts";
	if($param["block_tpl"] == "index"){
		$__prefix = $param["block_prefix"];
		$__mod = $param["block_mod"];
		$__heading_mod = $param["block_heading_mod"];
	}
	$heading = t(2);

	$bg_prefix="bg-block__";
	$block_prefix="contacts-page__";
	$adds = getContact('adds');
	$email = getContact('email');
	$phone = getContact('phone');
	$phone_num = phone(getContact('phone'));
	$map = getContact('map');
?>
<div class="<?=$__prefix;?>block  <?=$__mod;?>">
	<div class="<?=$__prefix;?>inner  <?=$__mod;?>">
		<div class="<?=$__prefix;?>container container">
			<div class="page-header__block  <?=$__heading_mod;?>">
				<h2 class="page-header__heading  <?=$__heading_mod;?>"><span><?=$heading;?></span></h2>		
			</div>
			<div class="<?=$__prefix;?>row row  is--wrap  is--gutter15">	
				<?if ($adds != ""){?>
				<div class="<?=$__prefix;?>cols cols">
					<div class="<?=$__prefix;?>item   is--address">
						<div class="contact-item__item  is--icon  is--nobg">
							<div class="contact-item__icon  is--icon  is--nobg">
								<svg class="icon-svg icon-contacts-location" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#contacts-location"></use></svg>
							</div>
							<?=$adds;?>							
						</div>
					</div>			
				</div>
				<?}?>
				<?if ($email != ""){?>
				<div class="<?=$__prefix;?>cols cols">
					<div class="<?=$__prefix;?>item ">
						<div class="contact-item__item  is--icon  is--nobg">
							<a href="mailto:<?=$email;?>" class="contact-item__link  is--icon  is--nobg">
								<div class="contact-item__icon  is--icon  is--nobg">
									<svg class="icon-svg icon-contacts-email" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#contacts-email"></use></svg>
								</div>
								<?=$email;?>
							</a>
						</div>
					</div>			
				</div>
				<?}?>
				<?if ($phone != ""){?>
				<div class="<?=$__prefix;?>cols cols">
					<div class="<?=$__prefix;?>item ">
						<div class="contact-item__item  is--icon  is--nobg">
							<a href="tel:+<?=$phone_num;?>" class="contact-item__link  is--icon  is--nobg">
								<div class="contact-item__icon  is--icon  is--nobg">
									<svg class="icon-svg icon-contacts-phone" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#contacts-phone"></use></svg>
								</div>
								<?=$phone;?>
							</a>
						</div>
					</div>			
				</div>
				<?}?>
			</div>
		</div>
	</div>
	<div class="<?=$__prefix;?>map  <?=$__mod;?>">
		<div class="<?=$__prefix;?>map-item" id="map-google"></div>
	</div>
</div>