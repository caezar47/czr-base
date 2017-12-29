		<?
			$__prefix = "footer__";
			$email = getContact('email');
			$email_arr = explode('@', $email);
			$phone = getContact('phone');	
			$phone_num = phone(getContact('phone'));
			$adds = getContact('adds');
			$copyright = getContact('copyright');

			$__prefix_cont = "social-contacts__";
			$__mod_cont = "is--footer";
		?>
		<footer class="<?=$__prefix;?>block">
			<div class="<?=$__prefix;?>inner">	
				<div class="container <?=$__prefix;?>container">
					<div class="row <?=$__prefix;?>row">
						<div class="cols <?=$__prefix;?>cols  is--left">
							<?if($copyright != ""){?>
							<div class="<?=$__prefix;?>copyright"> <?=$copyright;?> 2015-<?=date('Y');?>г.
							</div>
							<?}?>
						</div>
						<div class="cols <?=$__prefix;?>cols  is--center">
							<div class="<?=$__prefix_cont;?>block">
								<div class="<?=$__prefix_cont;?>row row  <?=$__mod_cont;?>">
									<?if ($phone != ""){?>
									<div class="<?=$__prefix_cont;?>cols cols  <?=$__mod_cont;?>">
										<a href="tel:+<?=$phone_num?>" class="<?=$__prefix_cont;?>item   <?=$__mod_cont;?>">
											<span class="<?=$__prefix_cont;?>item-icon  <?=$__mod_cont;?>"><svg class="icon-svg icon-contacts-tel" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#contacts-tel"></use></svg></span>
											<span class="<?=$__prefix_cont;?>item-name  <?=$__mod_cont;?>"><?=$phone;?></span>
										</a>
									</div>
									<?}?>
									<?if ($email != ""){?>
									<div class="<?=$__prefix_cont;?>cols cols  <?=$__mod_cont;?>">
										<a href="mailto:<?=$email?>" class="<?=$__prefix_cont;?>item   <?=$__mod_cont;?>">
											<span class="<?=$__prefix_cont;?>item-icon  <?=$__mod_cont;?>"><svg class="icon-svg icon-contacts-email" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#contacts-email"></use></svg></span>
											<span class="<?=$__prefix_cont;?>item-name  <?=$__mod_cont;?>"><?=$email;?></span>
										</a>
									</div>
									<?}?>
								</div>
							</div>
						</div>
						<div class="cols <?=$__prefix;?>cols  is--dorohovdesign">
							<div class="row <?=$__prefix;?>dorohovdesign-row"> 
								<div class="cols <?=$__prefix;?>dorohovdesign-cols  is--text">
									<div class="<?=$__prefix;?>dorohovdesign-text">Разработка сайта</div>
								</div>
								<div class="cols <?=$__prefix;?>dorohovdesign-cols  is--logotip">
									<a href="http://dorohovdesign.ru/" target="_blank" class="<?=$__prefix;?>dorohovdesign-logotip">
										<svg class="icon-svg icon-dorohovdesign" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#dorohovdesign"></use></svg>
									</a>
								</div>
							</div>				 
						</div>	
					</div>
				</div>
			</div>
		</footer>	
		<?
			if(get_post_type() == "ourproduct") {
				$form_id = 132;
				$form_heading = $this->Azbn->getMeta($form_id, 'form_heading');
				$form_heading_small = $this->Azbn->getMeta($form_id, 'form_heading_small');
				$form_btn_name = $this->Azbn->getMeta($form_id, 'form_btn_name');
				$this->tpl(
					'_/modals/message', 
					array(
						"block_modal_id"=>"modal-message",
						"block_prefix" => "modal-base__",
						"block_mod" => "",
						"block_heading" => $form_heading,
						"block_heading_small" => $form_heading_small,
					)
				);
			}
		?>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="<?=$this->path('js');?>/jquery-3.2.1.min.js" ></script>
		<script src="<?=$this->path('js');?>/document-ready.js" ></script>
		<script src="<?=$this->path('js');?>/bootstrap.min.js" ></script>
		<script src="<?=$this->path('js');?>/svg4everybody.min.js" ></script>
		<script>svg4everybody();</script>
		<?
			if($this->post['id'] == 2) {
				$this->tpl('_/script/googleMap');
			}
			if(is_single($post)){
				$this->tpl('_/script/fancybox');
			}
			wp_footer();
			$this->tpl('_/metrics', array());
		?>
	</body>
</html>