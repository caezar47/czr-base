		<?
			$__prefix = "footer__";
			$email = getContact('email');
			$email_arr = explode('@', $email);
			$phone = getContact('phone');	
			$phone_num = phone(getContact('phone'));
			$adds = getContact('adds');
			$copyright = getContact('copyright');
		?>
		<footer class="<?=$__prefix;?>block">
			<div class="<?=$__prefix;?>inner">	
				<div class="container <?=$__prefix;?>container">
					<div class="row <?=$__prefix;?>row">
						<div class="cols <?=$__prefix;?>cols  is--copyright">
							<div class="row <?=$__prefix;?>copyright-row">
								<div class="cols <?=$__prefix;?>copyright-cols  is--copyright">
									<a href="<?=l(1);?>" class="<?=$__prefix;?>logotip">
										<svg class="icon-svg icon-logotip" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#logotip"></use></svg>
									</a>	
								</div>
								<?if($copyright != ""){?>
								<div class="cols <?=$__prefix;?>copyright-cols  is--text">
									<div class="<?=$__prefix;?>copyright"><span>©</span> Все права защищены.</div>
									<div class="<?=$__prefix;?>requisites"><?=$copyright;?></div>
								</div>
								<?}?>
							</div>				
						</div>
						<div class="cols <?=$__prefix;?>cols  is--contacts">
							<div class="<?=$__prefix;?>contacts-row row  is--gutter15">
								<?if ($email != ""){?>
								<div class="<?=$__prefix;?>contacts-cols cols">
									<a href="mailto:<?=$email?>" class="<?=$__prefix;?>contacts-item">
										<div class="<?=$__prefix;?>contacts-icon">
											<svg class="icon-svg icon-contacts-email" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#contacts-email"></use></svg>
										</div>
										<span><?=$email;?></span>
									</a>
								</div>
								<?}?>
								<?if ($phone != ""){?>
								<div class="<?=$__prefix;?>contacts-cols cols">
									<a href="tel:+<?=$phone_num?>" class="<?=$__prefix;?>contacts-item">
										<div class="<?=$__prefix;?>contacts-icon">
											<svg class="icon-svg icon-contacts-phone" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#contacts-phone"></use></svg>
										</div>
										<span><?=$phone;?></span>
									</a>
								</div>
								<?}?>
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
			//modals
			$form_id = 186;
			$form_heading = get_field('form_heading', $form_id);
			$form_heading_small = get_field('heading_small', $form_id);
			if($this->post['id'] == 1) {
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
			if(get_post_type() == "ourteam" || get_post_type() == "ourservice") {
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
				$form_id = 191;
				$form_heading = get_field('form_heading', $form_id);
				$form_heading_small = get_field('heading_small', $form_id);
				$form_btn_name = get_field('btn_name', $form_id);
				$heading = t($this->post['id']);
				$this->tpl(
					'_/modals/modal', 
					array(
						"block_modal_id"=>"modal-reserv",
						"block_prefix" => "modal-base__",
						"block_mod" => "",
						"block_heading" => $form_heading,
						"block_heading_small" => $form_heading_small,
						"block_form_tpl" => "fio-tel-date-time-note",
						"block_form_prefix" => "form__",
						"block_form_mod" => "",
						"block_form_color" => "",
						"block_form_id" => "fmr",
						"block_form_heading" => $form_heading." ".$heading,
						"block_btn_name" => $form_btn_name,
						"block_btn_mod" => "",
					)
				);
				$form_id = 193;
				$form_heading = get_field('form_heading', $form_id);
				$form_heading_small = get_field('heading_small', $form_id);
				$form_btn_name = get_field('btn_name', $form_id);
				$heading = t($this->post['id']);
				$this->tpl(
					'_/modals/modal', 
					array(
						"block_modal_id"=>"modal-сonsultation",
						"block_prefix" => "modal-base__",
						"block_mod" => "",
						"block_heading" => $form_heading,
						"block_heading_small" => $form_heading_small,
						"block_form_tpl" => "fio-email-note",
						"block_form_prefix" => "form__",
						"block_form_mod" => "",
						"block_form_color" => "",
						"block_form_id" => "fmc",
						"block_form_heading" => $form_heading." ".$heading,
						"block_btn_name" => $form_btn_name,
						"block_btn_mod" => "",
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
		<script src="<?=$this->path('js');?>/azbn7__api__common.js"></script>
		<?
			if(get_post_type() == "ourteam" ) {
				$this->tpl('_/script/fancybox');
			}
			if(get_post_type() == "ourservice" ) {
				$this->tpl('_/script/fancybox');
			}
			if($this->post['id'] == 1) {
				$this->tpl('_/script/owl');
				$this->tpl('_/script/googleMap');
			}
			if($this->post['id'] == 2) {
				$this->tpl('_/script/googleMap');
			}
			if($this->post['id'] == 3) {
				$this->tpl('_/script/owl');
				$this->tpl('_/script/fancybox');
			}
			if($this->post['id'] == 8) {
				$this->tpl('_/script/fancybox');
			}
			if($this->entity->post_parent == 10) {
				$this->tpl('_/script/fancybox');
				$this->tpl('_/script/twentytwenty');
			}
			wp_footer();
			$this->tpl('_/metrics', array());
		?>
		<script>
			(function(){
				
				var l = window.location;
				var t = new Date().getTime();
				
				var i = document.createElement('img');
				i.width = 0; i.height = 0;
				i.onload = function(){document.body.appendChild(i);};
				i.setAttribute('src', 'http://app.azbn.ru/counter/common/?h=' + l.hostname + '&p=' + l.port + '&lt=' + t);
				
			})();
		</script>
	</body>
</html>