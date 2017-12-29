<?
	$bg_prefix="bg-block__";
	$block_prefix="contacts-page__";
	$adds = getContact('adds');
	$email = getContact('email');
	$phone = getContact('phone');
	$phone_num = phone(getContact('phone'));
	$map = getContact('map');
	$clock = getContact('clock');
	$skype = getContact('skype');
?>
<div class="content-block <?=$block_prefix;?>content-block  <?=$bg_prefix;?>block" role="main">	
	<div class="container content-block__container <?=$block_prefix;?>container <?=$bg_prefix;?>container">
		<?
		// хлебные крошки первого уровня
		$this->tpl(
			'_/bread', 
			array(
				"block_prefix" => "breadcrumb__",
				"block_mod" => "is--heading  is--center"
			)
		);
		?>
		<div class="contacts-panel__block  is--panel">
			<div class="contacts-panel__row row  is--wrap  is--gutter  is--aic  is--panel">
				<div class="contacts-panel__cols cols  is--cols-screen-8  is--cols-sm-12  is--panel  is--map">
					<div class="contacts-panel__map  is--panel">
						<div class="contacts-panel__map-inner  is--panel">
							<div class="contacts-panel__map-item" id="map-google"></div>
						</div>
					</div>
				</div>
				<div class="contacts-panel__cols cols  is--cols-screen-4  is--cols-sm-12  is--panel">
					<div class="contacts-panel__inner"> 
						<?
						$this->tpl(
							'_/heading', 
							array(
								"block_prefix" => "page-header__",
								"block_mod" => "is--heading"
							)
						);
						?>	
						<?if ($phone != ""){?> 
						<div class="contacts-panel__item">	
							<div class="contact-item__item    ">
								<a href="tel:+<?=$phone_num;?>" class="contact-item__link    ">
									Тел: <span><?=$phone;?></span>
								</a>
							</div>			
						</div>
						<?}?>
						<?if ($email != ""){?> 
						<div class="contacts-panel__item">	
							<div class="contact-item__item    ">
								<a href="mailto:<?=$email;?>" class="contact-item__link    ">
									E-mail: <span><?=$email;?></span>
								</a>
							</div>			
						</div>
						<?}?>
						<?if ($adds != ""){?>
						<div class="contacts-panel__item   is--address">
							<div class="contact-item__item">
								Адрес: <?=$adds;?>
							</div>
						</div>
						<?}?>	
						<?if ($clock != ""){?>
						<div class="contacts-panel__item  is--clock">
							<div class="contact-item__item  is--clock">
								Ежедневно с <span><?=$clock;?></span>
							</div>
						</div>	
						<?}?>
						<div class="contacts-panel__item">
							<?
								$this->tpl(
									'_/social', 
									array(
										"block_prefix"=>"social__",
										"block_mod"=>"is--contacts",
									)
								);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?
		//фоновые картинки
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--flover-rect  is--contacts",
				"block_bg" => "bg-flover-rect.png",
			)
		);
	?>
</div>